{{-- ============================================================
     ADMIN SIDEBAR — COMPONENT
     Pemakaian: @include('partials.admin-sidebar', ['active' => 'dashboard'])
     Nilai active: 'dashboard' | 'pengajuan' | 'komunitas' | 'anggota'
     ============================================================ --}}

@php
    $active = $active ?? 'dashboard';
    $pendingCount = $pendingCount ?? \App\Models\Community::where('status', 'pending')->count();
@endphp

<aside class="admin-sidebar-fixed" id="adminSidebar">

    {{-- Brand Header --}}
    <a href="{{ route('admin.dashboard') }}" class="admin-brand">
        <div class="admin-brand-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                <path d="M2 17l10 5 10-5"/>
                <path d="M2 12l10 5 10-5"/>
            </svg>
        </div>
        <div class="admin-brand-text">
            <div class="admin-brand-title">Vibes Space</div>
            <div class="admin-brand-sub">Admin Panel</div>
        </div>
    </a>

    {{-- Navigation --}}
    <nav class="admin-nav">

        <div class="admin-nav-label"><span>Menu Utama</span></div>

        <a href="{{ route('admin.dashboard') }}"
           class="admin-nav-item {{ $active === 'dashboard' ? 'active' : '' }}">
            <span class="admin-nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="9" rx="1.5"/>
                    <rect x="14" y="3" width="7" height="5" rx="1.5"/>
                    <rect x="14" y="12" width="7" height="9" rx="1.5"/>
                    <rect x="3" y="16" width="7" height="5" rx="1.5"/>
                </svg>
            </span>
            <span class="admin-nav-text">Dashboard</span>
        </a>

        <a href="{{ route('admin.pengajuan') }}"
           class="admin-nav-item {{ $active === 'pengajuan' ? 'active' : '' }}">
            <span class="admin-nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                    <polyline points="22,6 12,13 2,6"/>
                </svg>
            </span>
            <span class="admin-nav-text">Pengajuan</span>
            @if($pendingCount > 0)
                <span class="admin-nav-badge">{{ $pendingCount }}</span>
            @endif
        </a>

        <a href="{{ route('admin.komunitas') }}"
           class="admin-nav-item {{ $active === 'komunitas' ? 'active' : '' }}">
            <span class="admin-nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </span>
            <span class="admin-nav-text">Komunitas</span>
        </a>

        <div class="admin-nav-label"><span>Manajemen</span></div>

        <a href="{{ route('admin.anggota') }}"
           class="admin-nav-item {{ $active === 'anggota' ? 'active' : '' }}">
            <span class="admin-nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            </span>
            <span class="admin-nav-text">Anggota</span>
        </a>

        <a href="{{ route('home') }}" target="_blank" class="admin-nav-item admin-nav-item-muted">
            <span class="admin-nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15 3 21 3 21 9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                </svg>
            </span>
            <span class="admin-nav-text">Lihat Publik</span>
        </a>

    </nav>

    {{-- Footer --}}
    <div class="admin-sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="admin-logout-btn">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
                <span>Keluar</span>
            </button>
        </form>
    </div>

</aside>