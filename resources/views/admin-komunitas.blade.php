<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kelola Komunitas — Admin Vibes Space Pidie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-sidebar.css') }}">
    <style>
        /* ============================================================
           ADMIN KOMUNITAS — MINIMAL & RAPI
           ============================================================ */

        /* ---------- HERO ---------- */
        .ck-hero {
            position: relative;
            background: linear-gradient(135deg, #7c3aed 0%, #8b5cf6 40%, #ec4899 100%);
            border-radius: 16px;
            padding: 20px 22px;
            margin-bottom: 16px;
            overflow: hidden;
            color: #fff;
            box-shadow: 0 12px 32px rgba(124, 58, 237, 0.2);
        }
        .ck-hero::before {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            pointer-events: none;
        }
        .ck-hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }
        .ck-hero-title {
            font-size: 1.15rem;
            font-weight: 900;
            letter-spacing: -0.02em;
            line-height: 1.2;
            margin-bottom: 3px;
        }
        .ck-hero-sub {
            font-size: 0.78rem;
            color: rgba(255,255,255,0.85);
            font-weight: 500;
            line-height: 1.5;
        }
        .ck-hero-stats {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }
        .ck-hero-stat {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 6px 14px;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 10px;
            min-width: 60px;
        }
        .ck-hero-stat .num {
            font-size: 1.1rem;
            font-weight: 900;
            line-height: 1;
        }
        .ck-hero-stat .lbl {
            font-size: 0.6rem;
            font-weight: 700;
            color: rgba(255,255,255,0.8);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-top: 3px;
        }

        /* ---------- TOOLBAR ---------- */
        .ck-toolbar {
            display: flex;
            gap: 8px;
            margin-bottom: 16px;
            flex-wrap: wrap;
            align-items: center;
        }
        .ck-search {
            flex: 1;
            min-width: 220px;
            position: relative;
            display: flex;
            align-items: center;
            background: #fff;
            border: 1.5px solid #e8eaf0;
            border-radius: 10px;
            padding: 3px 3px 3px 12px;
            transition: all 0.25s;
        }
        .ck-search:focus-within {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 4px rgba(139,92,246,0.1);
        }
        .ck-search svg {
            width: 15px;
            height: 15px;
            stroke: #8b5cf6;
            stroke-width: 2.2;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }
        .ck-search input {
            flex: 1;
            border: none;
            outline: none;
            padding: 8px 8px;
            font-size: 0.84rem;
            font-family: inherit;
            background: transparent;
            color: #0f172a;
            font-weight: 500;
            min-width: 0;
        }
        .ck-search input::placeholder {
            color: #94a3b8;
        }

        .ck-filters {
            display: flex;
            gap: 3px;
            padding: 3px;
            background: #f8f5ff;
            border: 1.5px solid #ede9fe;
            border-radius: 10px;
            overflow-x: auto;
            scrollbar-width: none;
        }
        .ck-filters::-webkit-scrollbar { display: none; }
        .ck-filter {
            padding: 7px 12px;
            border: none;
            background: transparent;
            font-family: inherit;
            font-size: 0.72rem;
            font-weight: 800;
            color: #64748b;
            border-radius: 7px;
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.22s;
            flex-shrink: 0;
        }
        .ck-filter:hover {
            background: #fff;
            color: #6d28d9;
        }
        .ck-filter.active {
            background: #fff;
            color: #6d28d9;
            box-shadow: 0 2px 6px rgba(139,92,246,0.15);
        }

        /* ---------- CATEGORY TABS ---------- */
        .ck-categories {
            display: flex;
            gap: 6px;
            margin-bottom: 18px;
            overflow-x: auto;
            scrollbar-width: none;
            padding-bottom: 2px;
        }
        .ck-categories::-webkit-scrollbar { display: none; }
        .ck-cat-tab {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            background: #fff;
            border: 1.5px solid #e8eaf0;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.22s;
            white-space: nowrap;
            flex-shrink: 0;
            font-family: inherit;
        }
        .ck-cat-tab:hover {
            border-color: var(--cat-color, #8b5cf6);
            background: #fafbff;
        }
        .ck-cat-tab.active {
            border-color: var(--cat-color, #8b5cf6);
            background: var(--cat-bg, #f3efff);
            box-shadow: 0 4px 12px rgba(139,92,246,0.15);
        }
        .ck-cat-tab .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--cat-color, #8b5cf6);
            flex-shrink: 0;
        }
        .ck-cat-tab .name {
            font-size: 0.8rem;
            font-weight: 800;
            color: #334155;
        }
        .ck-cat-tab.active .name {
            color: var(--cat-color, #6d28d9);
        }
        .ck-cat-tab .count {
            padding: 1px 7px;
            background: #f1f5f9;
            border-radius: 999px;
            font-size: 0.65rem;
            font-weight: 900;
            color: #64748b;
            min-width: 18px;
            text-align: center;
        }
        .ck-cat-tab.active .count {
            background: var(--cat-color, #8b5cf6);
            color: #fff;
        }

        /* ---------- RESULT BAR ---------- */
        .ck-result-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
            flex-wrap: wrap;
        }
        .ck-result-text {
            font-size: 0.8rem;
            color: #64748b;
            font-weight: 600;
        }
        .ck-result-text strong {
            color: #0f172a;
            font-weight: 900;
        }
        .ck-clear-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 12px;
            background: #fff;
            border: 1.5px solid #e8eaf0;
            border-radius: 999px;
            font-size: 0.7rem;
            font-weight: 700;
            color: #64748b;
            cursor: pointer;
            transition: all 0.2s;
            font-family: inherit;
        }
        .ck-clear-btn:hover {
            border-color: #fecaca;
            color: #dc2626;
            background: #fef2f2;
        }

        /* ---------- GRID ---------- */
        .ck-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 10px;
        }
        @media (max-width: 900px) {
            .ck-grid {
                grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            }
        }
        @media (max-width: 640px) {
            .ck-grid {
                grid-template-columns: 1fr;
                gap: 8px;
            }
        }

        /* ---------- CARD ---------- */
        .ck-card {
            background: #fff;
            border: 1.5px solid #f0e9ff;
            border-radius: 12px;
            padding: 12px 14px;
            transition: all 0.22s cubic-bezier(0.4,0,0.2,1);
            display: flex;
            flex-direction: column;
            gap: 10px;
            position: relative;
        }
        .ck-card:hover {
            border-color: #ddd6fe;
            box-shadow: 0 6px 20px rgba(139,92,246,0.1);
        }
        .ck-card-top {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
        }
        .ck-card-avatar {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff;
            display: grid;
            place-items: center;
            font-weight: 900;
            font-size: 1rem;
            flex-shrink: 0;
            overflow: hidden;
            border: 1.5px solid #fff;
            box-shadow: 0 2px 6px rgba(139,92,246,0.15);
        }
        .ck-card-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .ck-card-info {
            flex: 1;
            min-width: 0;
        }
        .ck-card-info h4 {
            font-size: 0.88rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.01em;
            line-height: 1.3;
            margin: 0 0 3px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .ck-card-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.66rem;
            color: #94a3b8;
            font-weight: 600;
            flex-wrap: wrap;
        }
        .ck-card-meta span {
            display: inline-flex;
            align-items: center;
            gap: 3px;
        }

        .ck-card-status-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 6px;
            flex-wrap: wrap;
        }
        .ck-pill {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.64rem;
            font-weight: 800;
            white-space: nowrap;
            border: 1px solid transparent;
        }
        .ck-pill.status-approved {
            background: #ecfdf5;
            color: #047857;
            border-color: #a7f3d0;
        }
        .ck-pill.status-pending {
            background: #fffbeb;
            color: #b45309;
            border-color: #fde68a;
        }
        .ck-pill.status-rejected {
            background: #fef2f2;
            color: #b91c1c;
            border-color: #fecaca;
        }

        .ck-card-creator {
            font-size: 0.68rem;
            color: #64748b;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 50%;
        }
        .ck-card-creator strong {
            color: #0f172a;
            font-weight: 800;
        }

        .ck-card-actions {
            display: flex;
            gap: 5px;
            padding-top: 10px;
            border-top: 1px solid #f5f3ff;
        }
        .ck-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            padding: 7px 12px;
            border: none;
            border-radius: 7px;
            font-family: inherit;
            font-size: 0.7rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            white-space: nowrap;
            flex: 1;
        }
        .ck-btn svg {
            width: 11px;
            height: 11px;
            stroke: currentColor;
            stroke-width: 2.5;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .ck-btn.detail {
            background: #f5f3ff;
            color: #6d28d9;
            border: 1.5px solid #ddd6fe;
        }
        .ck-btn.detail:hover {
            background: #8b5cf6;
            color: #fff;
            border-color: #8b5cf6;
        }
        .ck-btn.delete {
            background: #fef2f2;
            color: #dc2626;
            border: 1.5px solid #fecaca;
            flex: 0 0 auto;
        }
        .ck-btn.delete:hover {
            background: #dc2626;
            color: #fff;
            border-color: #dc2626;
        }

        /* ---------- EMPTY ---------- */
        .ck-empty {
            text-align: center;
            padding: 60px 20px;
            background: #fff;
            border-radius: 14px;
            border: 2px dashed #ddd6fe;
        }
        .ck-empty-icon {
            font-size: 2.5rem;
            margin-bottom: 12px;
            display: inline-block;
            opacity: 0.4;
        }
        .ck-empty h3 {
            font-size: 0.95rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 4px;
        }
        .ck-empty p {
            font-size: 0.8rem;
            color: #94a3b8;
            font-weight: 500;
            margin-bottom: 14px;
        }

        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @media (max-width: 640px) {
            .ck-hero {
                padding: 16px 18px;
                border-radius: 14px;
                margin-bottom: 12px;
            }
            .ck-hero-title {
                font-size: 1.05rem;
            }
            .ck-hero-sub {
                font-size: 0.72rem;
            }
            .ck-hero-stats {
                width: 100%;
                gap: 4px;
            }
            .ck-hero-stat {
                flex: 1;
                min-width: 0;
                padding: 5px 8px;
            }
            .ck-hero-stat .num {
                font-size: 0.95rem;
            }
            .ck-hero-stat .lbl {
                font-size: 0.55rem;
            }

            .ck-toolbar {
                gap: 6px;
                margin-bottom: 12px;
            }
            .ck-search {
                min-width: 100%;
            }
            .ck-search input {
                padding: 9px 6px;
                font-size: 16px;
            }
            .ck-filters {
                width: 100%;
            }
            .ck-filter {
                padding: 7px 10px;
                font-size: 0.7rem;
            }

            .ck-categories {
                gap: 5px;
                margin-bottom: 14px;
            }
            .ck-cat-tab {
                padding: 8px 12px;
                border-radius: 10px;
                gap: 6px;
            }
            .ck-cat-tab .dot {
                width: 6px;
                height: 6px;
            }
            .ck-cat-tab .name {
                font-size: 0.74rem;
            }
            .ck-cat-tab .count {
                font-size: 0.6rem;
                padding: 1px 6px;
            }

            .ck-result-bar {
                margin-bottom: 12px;
            }
            .ck-result-text {
                font-size: 0.75rem;
            }

            .ck-card {
                padding: 10px 12px;
                border-radius: 10px;
            }
            .ck-card-avatar {
                width: 40px;
                height: 40px;
                font-size: 0.9rem;
                border-radius: 9px;
            }
            .ck-card-info h4 {
                font-size: 0.84rem;
            }
            .ck-card-meta {
                font-size: 0.62rem;
                gap: 6px;
            }
            .ck-card-creator {
                font-size: 0.64rem;
            }
            .ck-btn {
                padding: 8px 10px;
                font-size: 0.7rem;
                min-height: 38px;
            }
        }

        @media (max-width: 380px) {
            .ck-hero-title {
                font-size: 0.98rem;
            }
        }
    </style>
</head>
<body class="admin-body">

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    @include('partials.admin-sidebar', ['active' => 'komunitas'])

    <main class="admin-main">
        <div class="admin-topbar">
            <button class="admin-menu-toggle" onclick="toggleSidebar()" aria-label="Buka menu">
                <svg viewBox="0 0 24 24">
                    <line x1="3" y1="12" x2="21" y2="12"/>
                    <line x1="3" y1="6" x2="21" y2="6"/>
                    <line x1="3" y1="18" x2="21" y2="18"/>
                </svg>
            </button>
            <div>
                <h1 class="admin-page-title">Data Komunitas</h1>
                <p class="admin-page-sub">Kelola semua komunitas di platform</p>
            </div>
            <div class="admin-user-chip">
                <span>{{ auth()->user()->name }}</span>
                <div class="admin-user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            </div>
        </div>

        @if(session('success'))
            <div style="background:#ecfdf5;color:#065f46;padding:10px 14px;border-radius:10px;font-size:0.82rem;margin-bottom:14px;border:1.5px solid #a7f3d0;">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div style="background:#fef2f2;color:#991b1b;padding:10px 14px;border-radius:10px;font-size:0.82rem;margin-bottom:14px;border:1.5px solid #fecaca;">{{ session('error') }}</div>
        @endif

        @php
            $stats = [
                'total' => $communities->count(),
                'approved' => $communities->where('status', 'approved')->count(),
                'pending' => $communities->where('status', 'pending')->count(),
                'rejected' => $communities->where('status', 'rejected')->count(),
            ];
        @endphp

        <!-- HERO -->
        <div class="ck-hero">
            <div class="ck-hero-content">
                <div>
                    <h2 class="ck-hero-title">Kelola Komunitas</h2>
                    <p class="ck-hero-sub">Semua komunitas dikelompokkan berdasarkan kategori.</p>
                </div>
                <div class="ck-hero-stats">
                    <div class="ck-hero-stat">
                        <div class="num">{{ $stats['total'] }}</div>
                        <div class="lbl">Total</div>
                    </div>
                    <div class="ck-hero-stat">
                        <div class="num">{{ $stats['approved'] }}</div>
                        <div class="lbl">Disetujui</div>
                    </div>
                    <div class="ck-hero-stat">
                        <div class="num">{{ $stats['pending'] }}</div>
                        <div class="lbl">Menunggu</div>
                    </div>
                    <div class="ck-hero-stat">
                        <div class="num">{{ $stats['rejected'] }}</div>
                        <div class="lbl">Ditolak</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TOOLBAR -->
        <div class="ck-toolbar">
            <div class="ck-search">
                <svg viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                <input type="text" id="searchInput" placeholder="Cari nama komunitas..." autocomplete="off">
            </div>
            <div class="ck-filters" id="filterTags">
                <button class="ck-filter active" data-filter="all">Semua</button>
                <button class="ck-filter" data-filter="approved">Disetujui</button>
                <button class="ck-filter" data-filter="pending">Menunggu</button>
                <button class="ck-filter" data-filter="rejected">Ditolak</button>
            </div>
        </div>

        <!-- CATEGORY TABS -->
        @php
            $categories = [
                'seni'       => ['name' => 'Seni',       'color' => '#a855f7', 'bg' => '#f3e8ff'],
                'olahraga'   => ['name' => 'Olahraga',   'color' => '#10b981', 'bg' => '#d1fae5'],
                'pendidikan' => ['name' => 'Pendidikan', 'color' => '#3b82f6', 'bg' => '#dbeafe'],
                'alam'       => ['name' => 'Alam',       'color' => '#0d9488', 'bg' => '#ccfbf1'],
                'kuliner'    => ['name' => 'Kuliner',    'color' => '#f97316', 'bg' => '#ffedd5'],
            ];
        @endphp

        <div class="ck-categories" id="categoryTabs">
            <button class="ck-cat-tab active" data-cat="all" style="--cat-color: #8b5cf6; --cat-bg: #f3efff;">
                <span class="dot"></span>
                <span class="name">Semua</span>
                <span class="count">{{ $stats['total'] }}</span>
            </button>
            @foreach($categories as $key => $cat)
                @php $catCount = $communities->where('category_slug', $key)->count(); @endphp
                <button class="ck-cat-tab" data-cat="{{ $key }}" style="--cat-color: {{ $cat['color'] }}; --cat-bg: {{ $cat['bg'] }};">
                    <span class="dot"></span>
                    <span class="name">{{ $cat['name'] }}</span>
                    <span class="count">{{ $catCount }}</span>
                </button>
            @endforeach
        </div>

        <!-- RESULT BAR -->
        <div class="ck-result-bar">
            <div class="ck-result-text" id="resultText">
                Menampilkan <strong>{{ $stats['total'] }}</strong> komunitas
            </div>
        </div>

        <!-- GRID -->
        @if($communities->isEmpty())
            <div class="ck-empty">
                <div class="ck-empty-icon">&#128204;</div>
                <h3>Belum ada komunitas</h3>
                <p>Komunitas yang diajukan user akan tampil di sini.</p>
            </div>
        @else
            <div class="ck-grid" id="communityGrid">
                @foreach($communities as $comm)
                    <div class="ck-card"
                         data-status="{{ $comm->status }}"
                         data-name="{{ strtolower($comm->name) }}"
                         data-cat="{{ $comm->category_slug }}">
                        <div class="ck-card-top">
                            <div class="ck-card-avatar">
                                @if($comm->cover)
                                    <img src="{{ $comm->cover }}" alt="{{ $comm->name }}" onerror="this.style.display='none'">
                                @else
                                    {{ strtoupper(substr($comm->name, 0, 1)) }}
                                @endif
                            </div>
                            <div class="ck-card-info">
                                <h4>{{ $comm->name }}</h4>
                                <div class="ck-card-meta">
                                    <span>{{ $comm->members_count }} anggota</span>
                                    <span>·</span>
                                    <span>{{ $comm->created_at->translatedFormat('d M Y') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="ck-card-status-row">
                            @if($comm->status === 'approved')
                                <span class="ck-pill status-approved">Disetujui</span>
                            @elseif($comm->status === 'pending')
                                <span class="ck-pill status-pending">Menunggu</span>
                            @else
                                <span class="ck-pill status-rejected">Ditolak</span>
                            @endif
                            <span class="ck-card-creator"><strong>{{ $comm->creator->name ?? 'Anonim' }}</strong></span>
                        </div>

                        <div class="ck-card-actions">
                            <a href="{{ route('admin.komunitas.detail', $comm->slug) }}" class="ck-btn detail">
                                <svg viewBox="0 0 24 24">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                                Detail
                            </a>
                            <form action="{{ route('admin.komunitas.delete', $comm->id) }}" method="POST" style="display:contents;" onsubmit="return confirm('Hapus komunitas {{ $comm->name }}?\n\nSemua kegiatan dan anggota akan hilang permanen.')">
                                @csrf
                                <button type="submit" class="ck-btn delete">
                                    <svg viewBox="0 0 24 24">
                                        <polyline points="3 6 5 6 21 6"/>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="ck-empty" id="noResult" style="display:none;">
                <div class="ck-empty-icon">&#128269;</div>
                <h3>Tidak ditemukan</h3>
                <p>Coba ubah filter atau kata kunci pencarian.</p>
            </div>
        @endif
    </main>

    <script>
        let currentFilter = 'all';
        let currentSearch = '';
        let currentCategory = 'all';

        const filterTags = document.querySelectorAll('#filterTags .ck-filter');
        const catTabs = document.querySelectorAll('#categoryTabs .ck-cat-tab');
        const searchInput = document.getElementById('searchInput');
        const cards = document.querySelectorAll('#communityGrid .ck-card');
        const resultText = document.getElementById('resultText');
        const noResult = document.getElementById('noResult');

        function applyFilter() {
            let visibleCount = 0;

            cards.forEach(card => {
                const status = card.getAttribute('data-status');
                const name = card.getAttribute('data-name');
                const cat = card.getAttribute('data-cat');

                const matchFilter = currentFilter === 'all' || status === currentFilter;
                const matchSearch = !currentSearch || name.includes(currentSearch);
                const matchCat = currentCategory === 'all' || cat === currentCategory;

                const show = matchFilter && matchSearch && matchCat;
                card.style.display = show ? '' : 'none';
                if (show) visibleCount++;
            });

            if (resultText) {
                resultText.innerHTML = `Menampilkan <strong>${visibleCount}</strong> komunitas`;
            }

            if (noResult) {
                noResult.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        }

        filterTags.forEach(tag => {
            tag.addEventListener('click', function () {
                filterTags.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                currentFilter = this.getAttribute('data-filter');
                applyFilter();
            });
        });

        catTabs.forEach(tab => {
            tab.addEventListener('click', function () {
                catTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                currentCategory = this.getAttribute('data-cat');
                applyFilter();
            });
        });

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                currentSearch = this.value.trim().toLowerCase();
                applyFilter();
            });
        }
    </script>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>