<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\PengajuanController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $stats = [
        'komunitas' => \App\Models\Community::where('status', 'approved')->count(),
        'anggota'   => \App\Models\User::where('role', '!=', 'admin')->count(),
        'kegiatan'  => \App\Models\Event::whereHas('community', fn($q) => $q->where('status', 'approved'))
                            ->where('event_date', '>=', now()->toDateString())
                            ->count(),
    ];

    $categories = [
        ['key' => 'seni',       'name' => 'Seni & Kreativitas',   'icon' => '🎨', 'color' => '#a855f7', 'bg' => '#f3e8ff'],
        ['key' => 'olahraga',   'name' => 'Olahraga & Kebugaran', 'icon' => '🏸', 'color' => '#10b981', 'bg' => '#d1fae5'],
        ['key' => 'pendidikan', 'name' => 'Pendidikan & Literasi', 'icon' => '📚', 'color' => '#3b82f6', 'bg' => '#dbeafe'],
        ['key' => 'alam',       'name' => 'Lingkungan & Alam',    'icon' => '🏕️', 'color' => '#0d9488', 'bg' => '#ccfbf1'],
        ['key' => 'kuliner',    'name' => 'Kuliner',              'icon' => '🍳', 'color' => '#f97316', 'bg' => '#ffedd5'],
    ];

    $categoryCounts = \App\Models\Community::where('status', 'approved')
        ->selectRaw('category_slug, COUNT(*) as total')
        ->groupBy('category_slug')
        ->pluck('total', 'category_slug')
        ->toArray();

    $latestCommunities = \App\Models\Community::where('status', 'approved')
        ->latest()->take(3)->get();

    $latestEvents = \App\Models\Event::whereHas('community', fn($q) => $q->where('status', 'approved'))
        ->where('event_date', '>=', now()->toDateString())
        ->orderBy('event_date')->take(4)->with('community')->get();

    return view('welcome', compact('stats', 'categories', 'categoryCounts', 'latestCommunities', 'latestEvents'));
})->name('home');

Route::get('/kegiatan', [EventController::class, 'index'])->name('kegiatan');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/daftar', [AuthController::class, 'showRegister'])->name('daftar');
Route::post('/daftar', [AuthController::class, 'register'])->name('daftar.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| PROFIL
|--------------------------------------------------------------------------
*/

Route::get('/profil', [AuthController::class, 'profile'])->name('profil')->middleware('auth');
Route::post('/profil/avatar', [AuthController::class, 'updateAvatar'])->name('profil.avatar')->middleware('auth');

/*
|--------------------------------------------------------------------------
| KOMUNITAS
|--------------------------------------------------------------------------
*/

Route::get('/komunitas', [CommunityController::class, 'index'])->name('komunitas');
Route::get('/komunitas/{slug}', [CommunityController::class, 'show'])->name('komunitas.detail');

Route::middleware('auth')->group(function () {
    Route::get('/buat-komunitas', [CommunityController::class, 'create'])->name('buat-komunitas');
    Route::post('/buat-komunitas', [CommunityController::class, 'store'])->name('buat-komunitas.post');

    Route::post('/komunitas/{slug}/join', [CommunityController::class, 'join'])->name('komunitas.join');
    Route::post('/komunitas/{slug}/leave', [CommunityController::class, 'leave'])->name('komunitas.leave');

    Route::get('/kelola-komunitas/{slug}', [CommunityController::class, 'manage'])->name('kelola-komunitas');
    Route::post('/kelola-komunitas/{slug}/update', [CommunityController::class, 'update'])->name('kelola-komunitas.update');
    Route::post('/kelola-komunitas/{slug}/delete', [CommunityController::class, 'destroy'])->name('kelola-komunitas.delete');

    Route::post('/kelola-komunitas/{slug}/events', [EventController::class, 'store'])->name('events.store');
    Route::post('/events/{id}/delete', [EventController::class, 'destroy'])->name('events.destroy');
    Route::post('/events/{id}/register', [EventController::class, 'register'])->name('events.register');
    Route::post('/events/{id}/unregister', [EventController::class, 'unregister'])->name('events.unregister');
});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    /* ---------- DASHBOARD ---------- */
    Route::get('/', function () {
        $stats = [
            'anggota'   => \App\Models\User::where('role', '!=', 'admin')->count(),
            'komunitas' => \App\Models\Community::where('status', 'approved')->count(),
            'pending'   => \App\Models\Community::where('status', 'pending')->count(),
            'kegiatan'  => \App\Models\Event::count(),
            'new_week'  => \App\Models\User::where('created_at', '>=', now()->subDays(7))->count(),
        ];

        $categoriesData = [
            ['key' => 'seni',       'name' => 'Seni & Kreativitas',   'icon' => '🎨', 'bg' => '#f3e8ff'],
            ['key' => 'olahraga',   'name' => 'Olahraga & Kebugaran', 'icon' => '🏸', 'bg' => '#d1fae5'],
            ['key' => 'pendidikan', 'name' => 'Pendidikan & Literasi', 'icon' => '📚', 'bg' => '#dbeafe'],
            ['key' => 'alam',       'name' => 'Lingkungan & Alam',    'icon' => '🏕️', 'bg' => '#ccfbf1'],
            ['key' => 'kuliner',    'name' => 'Kuliner',              'icon' => '🍳', 'bg' => '#ffedd5'],
        ];

        $approvedByCategory = \App\Models\Community::where('status', 'approved')
            ->selectRaw('category_slug, COUNT(*) as total')
            ->groupBy('category_slug')
            ->pluck('total', 'category_slug')
            ->toArray();

        return view('admin-dashboard', compact('stats', 'categoriesData', 'approvedByCategory'));
    })->name('dashboard');

    /* ---------- PENGAJUAN ---------- */
    Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
    Route::get('/pengajuan/data', [PengajuanController::class, 'data'])->name('pengajuan.data');
    Route::post('/pengajuan/{slug}/approve', [PengajuanController::class, 'approve'])->name('pengajuan.approve');
    Route::post('/pengajuan/{slug}/reject', [PengajuanController::class, 'reject'])->name('pengajuan.reject');

    /* ---------- KOMUNITAS ---------- */
    Route::get('/komunitas', function () {
        $communities = \App\Models\Community::with('creator')->orderBy('created_at', 'desc')->get();
        $stats = [
            'total'    => $communities->count(),
            'approved' => $communities->where('status', 'approved')->count(),
            'pending'  => $communities->where('status', 'pending')->count(),
            'rejected' => $communities->where('status', 'rejected')->count(),
        ];
        return view('admin-komunitas', compact('communities', 'stats'));
    })->name('komunitas');

    Route::get('/komunitas/{slug}', [CommunityController::class, 'adminShow'])->name('komunitas.detail');

    Route::post('/komunitas/{id}/delete', function ($id) {
        \App\Models\Community::findOrFail($id)->delete();
        return redirect()->route('admin.komunitas')->with('success', 'Komunitas berhasil dihapus.');
    })->name('komunitas.delete');

    /* ---------- ANGGOTA ---------- */
    Route::get('/anggota', function () {
        $users = \App\Models\User::with(['communities', 'joinedCommunities'])
            ->withCount(['communities', 'joinedCommunities'])
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total'    => $users->count(),
            'pembuat'  => $users->where('role', 'pembuat')->count(),
            'anggota'  => $users->where('role', 'anggota')->count(),
            'new_week' => $users->where('created_at', '>=', now()->subDays(7))->count(),
        ];

        return view('admin-anggota', compact('users', 'stats'));
    })->name('anggota');
});