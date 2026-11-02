<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            $hasCommunity = $user->communities()->exists();

            if ($hasCommunity && $user->role === 'anggota') {
                $user->role = 'pembuat';
                $user->save();
            }

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Selamat datang kembali, Admin!');
            }

            return redirect()->route('komunitas')
                ->with('success', 'Selamat datang kembali, ' . $user->name . '!');
        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi salah.',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('daftar');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.min' => 'Nama minimal 2 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah terdaftar. Silakan masuk.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'anggota',
        ]);

        Auth::login($user);

        return redirect()->route('komunitas')
            ->with('success', 'Akun berhasil dibuat! Selamat datang, ' . $user->name . '!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'Kamu telah keluar.');
    }

    public function profile()
    {
        $user = Auth::user();
        $joinedCommunities = $user->joinedCommunities()->approved()->get();
        $createdCommunities = $user->communities()->get();
        $registeredEvents = $user->registeredEvents()->with('community')->get();

        $stats = [
            'joined' => $joinedCommunities->count(),
            'created' => $createdCommunities->count(),
            'events' => $registeredEvents->count(),
        ];

        return view('profil', compact(
            'user',
            'joinedCommunities',
            'createdCommunities',
            'registeredEvents',
            'stats'
        ));
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,jpg,png,webp|max:3072',
        ], [
            'avatar.required' => 'Pilih foto terlebih dahulu.',
            'avatar.image' => 'File harus berupa gambar.',
            'avatar.mimes' => 'Format harus JPG, PNG, atau WEBP.',
            'avatar.max' => 'Ukuran foto maksimal 3MB.',
        ]);

        try {
            $user = Auth::user();

            // Hapus avatar lama kalau ada
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Simpan avatar baru
            $path = $request->file('avatar')->store('avatars', 'public');

            $user->avatar = $path;
            $user->save();

            return redirect()->route('profil')
                ->with('success', 'Foto profil berhasil diperbarui!');
        } catch (\Throwable $e) {
            \Log::error('Upload avatar gagal: ' . $e->getMessage());
            return redirect()->route('profil')
                ->with('error', 'Gagal upload foto: ' . $e->getMessage());
        }
    }
}