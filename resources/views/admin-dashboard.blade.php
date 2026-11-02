<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Dashboard — Admin Vibes Space Pidie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-sidebar.css') }}">
    <style>
        /* ============================================================
           DASHBOARD ADMIN — MOBILE FIRST, WARNA, UNIK
           ============================================================ */

        /* ---------- HERO GREETING ---------- */
        .dash-hero {
            position: relative;
            background:
                radial-gradient(circle at 20% 20%, rgba(168,85,247,0.5) 0%, transparent 45%),
                radial-gradient(circle at 80% 30%, rgba(236,72,153,0.5) 0%, transparent 45%),
                radial-gradient(circle at 50% 90%, rgba(249,115,22,0.4) 0%, transparent 45%),
                linear-gradient(135deg, #7c3aed 0%, #8b5cf6 40%, #ec4899 100%);
            border-radius: 20px;
            padding: 24px 26px;
            margin-bottom: 20px;
            overflow: hidden;
            color: #fff;
            box-shadow: 0 16px 40px rgba(124, 58, 237, 0.25);
        }
        .dash-hero::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.18) 0%, transparent 70%);
            pointer-events: none;
        }
        .dash-hero::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: 30%;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            pointer-events: none;
        }
        .dash-hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        .dash-hero-greeting {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.7rem;
            font-weight: 800;
            color: rgba(255,255,255,0.85);
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 8px;
        }
        .dash-hero-greeting .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #10b981;
            box-shadow: 0 0 0 4px rgba(16,185,129,0.3);
            animation: liveDot 2s infinite;
            flex-shrink: 0;
        }
        @keyframes liveDot {
            0%, 100% { box-shadow: 0 0 0 4px rgba(16,185,129,0.3); }
            50% { box-shadow: 0 0 0 8px rgba(16,185,129,0.05); }
        }
        .dash-hero-title {
            font-size: 1.5rem;
            font-weight: 900;
            letter-spacing: -0.03em;
            line-height: 1.15;
            margin-bottom: 4px;
        }
        .dash-hero-sub {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.88);
            font-weight: 500;
            line-height: 1.5;
            max-width: 440px;
        }
        .dash-hero-clock {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 14px;
            padding: 12px 18px;
            text-align: center;
            flex-shrink: 0;
            min-width: 110px;
        }
        .dash-hero-clock .time {
            font-size: 1.5rem;
            font-weight: 900;
            letter-spacing: -0.02em;
            line-height: 1;
            margin-bottom: 3px;
        }
        .dash-hero-clock .date {
            font-size: 0.66rem;
            font-weight: 700;
            color: rgba(255,255,255,0.75);
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        /* ---------- STAT CARDS ---------- */
        .dash-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-bottom: 20px;
        }
        .dash-stat {
            background: #fff;
            border-radius: 16px;
            border: 1.5px solid #f0e9ff;
            padding: 16px;
            position: relative;
            overflow: hidden;
            transition: all 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .dash-stat::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
        }
        .dash-stat.purple::before { background: linear-gradient(90deg, #8b5cf6, #a855f7); }
        .dash-stat.pink::before { background: linear-gradient(90deg, #ec4899, #f472b6); }
        .dash-stat.orange::before { background: linear-gradient(90deg, #f97316, #fb923c); }
        .dash-stat.blue::before { background: linear-gradient(90deg, #3b82f6, #60a5fa); }
        .dash-stat:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(139,92,246,0.15);
            border-color: transparent;
        }
        .dash-stat-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }
        .dash-stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 11px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
        }
        .dash-stat-icon svg {
            width: 20px;
            height: 20px;
            stroke-width: 2;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .dash-stat.purple .dash-stat-icon { background: #f3efff; }
        .dash-stat.purple .dash-stat-icon svg { stroke: #8b5cf6; }
        .dash-stat.pink .dash-stat-icon { background: #fce7f3; }
        .dash-stat.pink .dash-stat-icon svg { stroke: #ec4899; }
        .dash-stat.orange .dash-stat-icon { background: #ffedd5; }
        .dash-stat.orange .dash-stat-icon svg { stroke: #f97316; }
        .dash-stat.blue .dash-stat-icon { background: #dbeafe; }
        .dash-stat.blue .dash-stat-icon svg { stroke: #3b82f6; }

        .dash-stat-trend {
            display: inline-flex;
            align-items: center;
            gap: 3px;
            padding: 3px 8px;
            border-radius: 999px;
            font-size: 0.62rem;
            font-weight: 800;
            white-space: nowrap;
        }
        .dash-stat-trend.up {
            background: #d1fae5;
            color: #047857;
        }
        .dash-stat-trend.neutral {
            background: #f1f5f9;
            color: #64748b;
        }
        .dash-stat-label {
            font-size: 0.72rem;
            font-weight: 700;
            color: #64748b;
            margin-bottom: 2px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .dash-stat-value {
            font-size: 1.8rem;
            font-weight: 900;
            color: #0f172a;
            letter-spacing: -0.03em;
            line-height: 1.05;
        }
        .dash-stat-sub {
            font-size: 0.68rem;
            color: #94a3b8;
            font-weight: 600;
            margin-top: 3px;
        }

        /* ---------- PENDING ALERT ---------- */
        .dash-alert {
            background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
            border: 1.5px solid #fde68a;
            border-left: 4px solid #f59e0b;
            border-radius: 14px;
            padding: 14px 18px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }
        .dash-alert-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #fef3c7;
            border: 1.5px solid #fcd34d;
            display: grid;
            place-items: center;
            font-size: 1.2rem;
            flex-shrink: 0;
            animation: alertPulse 2.5s infinite;
        }
        @keyframes alertPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        .dash-alert-body {
            flex: 1;
            min-width: 200px;
        }
        .dash-alert-body h4 {
            font-size: 0.88rem;
            font-weight: 800;
            color: #78350f;
            margin-bottom: 2px;
        }
        .dash-alert-body p {
            font-size: 0.75rem;
            color: #92400e;
            font-weight: 500;
        }
        .dash-alert-btn {
            padding: 9px 16px;
            background: #f59e0b;
            color: #fff;
            border-radius: 9px;
            font-size: 0.78rem;
            font-weight: 800;
            text-decoration: none;
            white-space: nowrap;
            transition: all 0.2s;
            box-shadow: 0 4px 12px rgba(245,158,11,0.3);
        }
        .dash-alert-btn:hover {
            background: #d97706;
            transform: translateY(-1px);
        }

        /* ---------- KATEGORI CARD ---------- */
        .dash-card {
            background: #fff;
            border-radius: 18px;
            border: 1.5px solid #f0e9ff;
            padding: 20px;
            margin-bottom: 20px;
        }
        .dash-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            gap: 12px;
            flex-wrap: wrap;
        }
        .dash-card-title {
            font-size: 0.92rem;
            font-weight: 800;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .dash-card-title::before {
            content: '';
            width: 4px;
            height: 14px;
            background: linear-gradient(180deg, #7c3aed, #ec4899);
            border-radius: 2px;
        }
        .dash-card-link {
            font-size: 0.72rem;
            font-weight: 800;
            color: #8b5cf6;
            text-decoration: none;
            padding: 5px 12px;
            border-radius: 999px;
            background: #f5f3ff;
            transition: all 0.2s;
        }
        .dash-card-link:hover {
            background: #8b5cf6;
            color: #fff;
        }

        .dash-cat-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .dash-cat-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 12px;
            background: #fafbff;
            border: 1px solid #f1f5f9;
            transition: all 0.2s;
        }
        .dash-cat-item:hover {
            background: #fff;
            border-color: #e8eaf0;
            transform: translateX(3px);
        }
        .dash-cat-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            font-size: 1.05rem;
            flex-shrink: 0;
        }
        .dash-cat-info {
            flex: 1;
            min-width: 0;
        }
        .dash-cat-info strong {
            display: block;
            font-size: 0.8rem;
            font-weight: 800;
            color: #0f172a;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .dash-cat-info small {
            display: block;
            font-size: 0.66rem;
            color: #94a3b8;
            font-weight: 600;
            margin-top: 1px;
        }
        .dash-cat-bar {
            width: 60px;
            height: 6px;
            background: #f1f5f9;
            border-radius: 999px;
            overflow: hidden;
            flex-shrink: 0;
        }
        .dash-cat-bar-fill {
            height: 100%;
            border-radius: 999px;
            transition: width 0.5s ease;
        }
        .dash-cat-count {
            font-size: 0.85rem;
            font-weight: 900;
            color: #0f172a;
            min-width: 24px;
            text-align: right;
            flex-shrink: 0;
        }

        /* ============================================================
           RESPONSIVE
           ============================================================ */

        @media (max-width: 1024px) {
            .dash-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .dash-hero {
                padding: 20px 18px;
                border-radius: 16px;
                margin-bottom: 16px;
            }
            .dash-hero-title { font-size: 1.2rem; }
            .dash-hero-sub { font-size: 0.78rem; }
            .dash-hero-clock {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 14px;
                margin-top: 4px;
            }
            .dash-hero-clock .time { font-size: 1.2rem; margin-bottom: 0; }
            .dash-hero-clock .date { font-size: 0.6rem; }

            .dash-stats {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
                margin-bottom: 16px;
            }
            .dash-stat {
                padding: 12px 14px;
                border-radius: 14px;
            }
            .dash-stat-icon {
                width: 34px;
                height: 34px;
                border-radius: 9px;
            }
            .dash-stat-icon svg { width: 17px; height: 17px; }
            .dash-stat-value { font-size: 1.4rem; }
            .dash-stat-label { font-size: 0.65rem; }
            .dash-stat-sub { font-size: 0.62rem; }
            .dash-stat-trend { font-size: 0.56rem; padding: 2px 6px; }

            .dash-alert {
                padding: 12px 14px;
                border-radius: 12px;
                margin-bottom: 16px;
            }
            .dash-alert-icon { width: 34px; height: 34px; font-size: 1rem; }
            .dash-alert-body h4 { font-size: 0.8rem; }
            .dash-alert-body p { font-size: 0.7rem; }
            .dash-alert-btn {
                width: 100%;
                text-align: center;
                padding: 8px 12px;
                font-size: 0.74rem;
            }

            .dash-card {
                padding: 16px;
                border-radius: 16px;
                margin-bottom: 16px;
            }
            .dash-card-title { font-size: 0.84rem; }
            .dash-cat-item { padding: 9px 10px; gap: 10px; }
            .dash-cat-icon { width: 32px; height: 32px; font-size: 0.95rem; }
            .dash-cat-info strong { font-size: 0.75rem; }
            .dash-cat-info small { font-size: 0.62rem; }
            .dash-cat-bar { width: 40px; }
            .dash-cat-count { font-size: 0.78rem; }
        }

        @media (max-width: 380px) {
            .dash-stats { grid-template-columns: 1fr; }
            .dash-hero-title { font-size: 1.1rem; }
        }
    </style>
</head>
<body class="admin-body">

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    @include('partials.admin-sidebar', ['active' => 'dashboard'])

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
                <h1 class="admin-page-title">Dashboard</h1>
                <p class="admin-page-sub">Ringkasan aktivitas platform</p>
            </div>
            <div class="admin-user-chip">
                <span>{{ auth()->user()->name }}</span>
                <div class="admin-user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            </div>
        </div>

        @if(session('success'))
            <div style="background:#ecfdf5;color:#065f46;padding:12px 16px;border-radius:12px;font-size:0.85rem;margin-bottom:16px;border:1.5px solid #a7f3d0;">✅ {{ session('success') }}</div>
        @endif

        <!-- HERO -->
        <div class="dash-hero">
            <div class="dash-hero-content">
                <div>
                    <div class="dash-hero-greeting">
                        <span class="dot"></span>
                        <span>Panel Admin · Vibes Space Pidie</span>
                    </div>
                    <h1 class="dash-hero-title">Halo, {{ auth()->user()->name }} 👋</h1>
                    <p class="dash-hero-sub">Selamat datang kembali. Berikut ringkasan aktivitas platform hari ini.</p>
                </div>
                <div class="dash-hero-clock">
                    <div class="time" id="liveTime">--:--</div>
                    <div class="date" id="liveDate">Memuat...</div>
                </div>
            </div>
        </div>

        <!-- STAT CARDS -->
        <div class="dash-stats">
            <div class="dash-stat purple">
                <div class="dash-stat-top">
                    <div class="dash-stat-icon">
                        <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <span class="dash-stat-trend up">↑ +{{ $stats['new_week'] ?? 0 }}</span>
                </div>
                <div class="dash-stat-label">Total Anggota</div>
                <div class="dash-stat-value">{{ $stats['anggota'] }}</div>
                <div class="dash-stat-sub">{{ $stats['new_week'] ?? 0 }} baru minggu ini</div>
            </div>

            <div class="dash-stat pink">
                <div class="dash-stat-top">
                    <div class="dash-stat-icon">
                        <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    </div>
                    <span class="dash-stat-trend up">Aktif</span>
                </div>
                <div class="dash-stat-label">Komunitas Aktif</div>
                <div class="dash-stat-value">{{ $stats['komunitas'] }}</div>
                <div class="dash-stat-sub">Tampil di publik</div>
            </div>

            <div class="dash-stat orange">
                <div class="dash-stat-top">
                    <div class="dash-stat-icon">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    @if($stats['pending'] > 0)
                        <span class="dash-stat-trend up" style="background:#fef3c7;color:#b45309;">Perlu Review</span>
                    @else
                        <span class="dash-stat-trend neutral">Bersih</span>
                    @endif
                </div>
                <div class="dash-stat-label">Menunggu Review</div>
                <div class="dash-stat-value">{{ $stats['pending'] }}</div>
                <div class="dash-stat-sub">{{ $stats['pending'] > 0 ? 'Butuh persetujuan' : 'Tidak ada antrean' }}</div>
            </div>

            <div class="dash-stat blue">
                <div class="dash-stat-top">
                    <div class="dash-stat-icon">
                        <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    </div>
                    <span class="dash-stat-trend neutral">Total</span>
                </div>
                <div class="dash-stat-label">Total Kegiatan</div>
                <div class="dash-stat-value">{{ $stats['kegiatan'] }}</div>
                <div class="dash-stat-sub">Sepanjang waktu</div>
            </div>
        </div>

        <!-- PENDING ALERT -->
        @if($stats['pending'] > 0)
            <div class="dash-alert">
                <div class="dash-alert-icon">⏳</div>
                <div class="dash-alert-body">
                    <h4>{{ $stats['pending'] }} pengajuan menunggu review</h4>
                    <p>Segera review agar komunitas bisa tampil di halaman publik.</p>
                </div>
                <a href="{{ route('admin.pengajuan') }}" class="dash-alert-btn">Review Sekarang →</a>
            </div>
        @endif

        <!-- KATEGORI -->
        <div class="dash-card">
            <div class="dash-card-header">
                <div class="dash-card-title">Komunitas per Kategori</div>
                <a href="{{ route('admin.komunitas') }}" class="dash-card-link">Lihat semua →</a>
            </div>
            @php
                $maxCat = max(array_values($approvedByCategory) ?: [1]);
                $catColors = [
                    'seni' => ['bg' => '#f3e8ff', 'fill' => '#a855f7'],
                    'olahraga' => ['bg' => '#d1fae5', 'fill' => '#10b981'],
                    'pendidikan' => ['bg' => '#dbeafe', 'fill' => '#3b82f6'],
                    'alam' => ['bg' => '#ccfbf1', 'fill' => '#0d9488'],
                    'kuliner' => ['bg' => '#ffedd5', 'fill' => '#f97316'],
                ];
            @endphp
            <div class="dash-cat-list">
                @foreach($categoriesData as $cat)
                    @php
                        $count = $approvedByCategory[$cat['key']] ?? 0;
                        $percent = $maxCat > 0 ? ($count / $maxCat) * 100 : 0;
                        $color = $catColors[$cat['key']] ?? ['bg' => '#f3efff', 'fill' => '#8b5cf6'];
                    @endphp
                    <div class="dash-cat-item">
                        <div class="dash-cat-icon" style="background:{{ $cat['bg'] }};">{{ $cat['icon'] }}</div>
                        <div class="dash-cat-info">
                            <strong>{{ $cat['name'] }}</strong>
                            <small>{{ $count }} komunitas</small>
                        </div>
                        <div class="dash-cat-bar">
                            <div class="dash-cat-bar-fill" style="width:{{ $percent }}%; background:{{ $color['fill'] }};"></div>
                        </div>
                        <div class="dash-cat-count">{{ $count }}</div>
                    </div>
                @endforeach
            </div>
        </div>

    </main>

    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        function updateClock() {
            const now = new Date();
            const h = String(now.getHours()).padStart(2, '0');
            const m = String(now.getMinutes()).padStart(2, '0');
            const timeEl = document.getElementById('liveTime');
            const dateEl = document.getElementById('liveDate');
            if (timeEl) timeEl.textContent = `${h}:${m}`;
            if (dateEl) {
                const days = ['Min','Sen','Sel','Rab','Kam','Jum','Sab'];
                const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
                dateEl.textContent = `${days[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]}`;
            }
        }
        updateClock();
        setInterval(updateClock, 30000);
    </script>
</body>
</html>