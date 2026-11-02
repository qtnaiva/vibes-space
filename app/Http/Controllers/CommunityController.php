<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CommunityController extends Controller
{
    public function index(Request $request)
    {
        $query = Community::approved()->with('creator');

        if ($request->filled('filter') && $request->filter !== 'all') {
            $query->where('category_slug', $request->filter);
        }

        if ($request->filled('q')) {
            $keyword = $request->q;
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                  ->orWhere('description', 'like', "%{$keyword}%")
                  ->orWhere('category', 'like', "%{$keyword}%");
            });
        }

        $communities = $query->latest()->get();

        return view('komunitas', compact('communities'));
    }

    public function show($slug)
    {
        $community = Community::where('slug', $slug)
            ->approved()
            ->with(['creator', 'members', 'events'])
            ->firstOrFail();

        $members = $community->members;
        $events = $community->events()->orderBy('event_date', 'asc')->get();

        $isAdmin = Auth::check() && Auth::user()->isAdmin();
        $isCreator = Auth::check() && $community->isCreator(Auth::id());
        $isMember = Auth::check() && $community->hasMember(Auth::id());
        $canSeeMembers = $isAdmin || $isCreator;

        return view('detail-komunitas', compact(
            'community', 'members', 'events',
            'isAdmin', 'isCreator', 'isMember', 'canSeeMembers'
        ));
    }

    /**
     * Detail komunitas khusus admin — semua status, tampil di panel admin.
     */
    public function adminShow($slug)
    {
        $community = Community::where('slug', $slug)
            ->with(['creator', 'members', 'events'])
            ->firstOrFail();

        $members = $community->members;
        $events = $community->events()->orderBy('event_date', 'asc')->get();

        $stats = [
            'members' => $community->members_count,
            'events'  => $events->count(),
            'upcoming_events' => $events->where('event_date', '>=', now()->toDateString())->count(),
        ];

        return view('admin-komunitas-detail', compact('community', 'members', 'events', 'stats'));
    }

    public function create()
    {
        $existing = Community::where('creator_id', Auth::id())->first();
        if ($existing) {
            return redirect()->route('profil')
                ->with('error', 'Kamu sudah punya komunitas "' . $existing->name . '". Satu user hanya boleh punya 1 komunitas.');
        }

        return view('buat-komunitas');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'category' => 'required|in:seni,olahraga,pendidikan,alam,kuliner',
            'description' => 'required|min:10',
            'cover' => 'nullable|url',
        ], [
            'name.required' => 'Nama komunitas wajib diisi.',
            'name.min' => 'Nama minimal 3 karakter.',
            'category.required' => 'Kategori wajib dipilih.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.min' => 'Deskripsi minimal 10 karakter.',
        ]);

        $existing = Community::where('creator_id', Auth::id())->first();
        if ($existing) {
            return back()->withErrors(['name' => 'Kamu sudah punya komunitas. Satu user hanya boleh punya 1 komunitas.']);
        }

        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $counter = 1;
        while (Community::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $categoryMap = [
            'seni' => 'Seni & Kreativitas',
            'olahraga' => 'Olahraga & Kebugaran',
            'pendidikan' => 'Pendidikan & Literasi',
            'alam' => 'Lingkungan & Alam',
            'kuliner' => 'Kuliner',
        ];

        $community = Community::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'category' => $categoryMap[$request->category],
            'category_slug' => $request->category,
            'cover' => $request->cover ?: 'https://i.pinimg.com/1200x/29/ec/3b/29ec3b35f1ef9725235c2c38f1f22202.jpg',
            'creator_id' => Auth::id(),
            'members_count' => 1,
            'status' => 'pending',
        ]);

        $community->members()->attach(Auth::id());

        return redirect()->route('profil')
            ->with('success', 'Pengajuan komunitas berhasil! Admin akan mereview dalam waktu dekat.');
    }

    public function join($slug)
    {
        $community = Community::where('slug', $slug)->approved()->firstOrFail();

        if ($community->hasMember(Auth::id())) {
            return back()->with('error', 'Kamu sudah menjadi anggota komunitas ini.');
        }

        $community->members()->attach(Auth::id());
        $community->increment('members_count');

        return back()->with('success', 'Berhasil bergabung dengan ' . $community->name . '!');
    }

    public function leave($slug)
    {
        $community = Community::where('slug', $slug)->approved()->firstOrFail();

        if ($community->isCreator(Auth::id())) {
            return back()->with('error', 'Kamu adalah pembuat komunitas. Kamu tidak bisa keluar, tapi bisa hapus komunitas.');
        }

        if (!$community->hasMember(Auth::id())) {
            return back()->with('error', 'Kamu bukan anggota komunitas ini.');
        }

        $community->members()->detach(Auth::id());
        $community->decrement('members_count');

        return back()->with('success', 'Kamu telah keluar dari ' . $community->name . '.');
    }

    public function manage($slug)
    {
        $community = Community::where('slug', $slug)->firstOrFail();

        if (!$community->isCreator(Auth::id()) && !Auth::user()->isAdmin()) {
            abort(403, 'Kamu bukan pembuat komunitas ini.');
        }

        $members = $community->members;
        $events = $community->events()->orderBy('event_date', 'asc')->get();

        return view('kelola-komunitas', compact('community', 'members', 'events'));
    }

    public function update(Request $request, $slug)
    {
        $community = Community::where('slug', $slug)->firstOrFail();

        if (!$community->isCreator(Auth::id()) && !Auth::user()->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|min:3|max:100',
            'description' => 'required|min:10',
            'cover' => 'nullable|url',
        ]);

        $community->update([
            'name' => $request->name,
            'description' => $request->description,
            'cover' => $request->cover ?: $community->cover,
        ]);

        return back()->with('success', 'Info komunitas berhasil diperbarui!');
    }

    public function destroy($slug)
    {
        $community = Community::where('slug', $slug)->firstOrFail();

        if (!$community->isCreator(Auth::id()) && !Auth::user()->isAdmin()) {
            abort(403);
        }

        $community->delete();

        return redirect()->route('profil')
            ->with('success', 'Komunitas berhasil dihapus.');
    }
}