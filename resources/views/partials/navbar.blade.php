{{-- ============================================================
     NAVBAR PUBLIK — Component
     Pemakaian: @include('partials.navbar', ['active' => 'home'])
     Nilai active: 'home' | 'komunitas' | 'kegiatan' | null
     ============================================================ --}}

@php
    $active = $active ?? null;
@endphp

<header class="navbar">
    <div class="container navbar-inner">
        <a href="{{ route('home') }}" class="logo">
            <span class="logo-icon">V</span>
            <span class="logo-text">Vibes<span>Space</span></span>
        </a>
        <nav class="nav-links">
            <a href="{{ route('home') }}" class="{{ $active === 'home' ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('komunitas') }}" class="{{ $active === 'komunitas' ? 'active' : '' }}">Komunitas</a>
            <a href="{{ route('kegiatan') }}" class="{{ $active === 'kegiatan' ? 'active' : '' }}">Kegiatan</a>
        </nav>
        <div class="nav-actions">
            @auth
                <a href="{{ route('profil') }}" class="nav-user-avatar" title="{{ auth()->user()->name }}">
                    @if(auth()->user()->avatar && \Storage::disk('public')->exists(auth()->user()->avatar))
                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}">
                    @else
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    @endif
                </a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-outline">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline">Masuk</a>
                <a href="{{ route('daftar') }}" class="btn btn-primary">Daftar</a>
            @endauth
        </div>
    </div>
</header>

<style>
    .nav-user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #8b5cf6, #ec4899);
        color: #fff;
        display: grid;
        place-items: center;
        font-weight: 900;
        font-size: 0.95rem;
        overflow: hidden;
        border: 2.5px solid #fff;
        box-shadow: 0 4px 14px rgba(139,92,246,0.35);
        text-decoration: none;
        transition: all 0.22s;
        flex-shrink: 0;
    }
    .nav-user-avatar:hover {
        transform: scale(1.06);
        box-shadow: 0 6px 20px rgba(139,92,246,0.5);
    }
    .nav-user-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    @media (max-width: 640px) {
        .nav-user-avatar {
            width: 36px;
            height: 36px;
            font-size: 0.85rem;
        }
    }
</style>