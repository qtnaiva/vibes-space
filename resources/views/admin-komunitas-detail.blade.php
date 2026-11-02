<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $community->name }} — Admin Vibes Space Pidie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-sidebar.css') }}">
    <style>
        /* ============================================================
           ADMIN — DETAIL KOMUNITAS (PREMIUM MOBILE)
           ============================================================ */

        /* ---------- HERO ---------- */
        .kd-hero {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 18px;
            background: linear-gradient(135deg, #7c3aed, #ec4899);
            box-shadow: 0 16px 40px rgba(124, 58, 237, 0.22);
        }
        .kd-hero-cover {
    position: relative;
    width: 100%;
    aspect-ratio: 21 / 8;
    overflow: hidden;
    background: linear-gradient(135deg, #ede9fe, #fce7f3);
    display: flex;
    align-items: center;
    justify-content: center;
}
.kd-hero-cover img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: center;
    display: block;
}
        .kd-hero-cover-empty {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #a78bfa;
        }
        .kd-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 20%, rgba(15,23,42,0.92) 100%);
            pointer-events: none;
        }
        .kd-hero-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 24px 26px 20px;
            color: #fff;
            z-index: 2;
        }
        .kd-hero-badges {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }
        .kd-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            border-radius: 7px;
            font-size: 0.65rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #fff;
            box-shadow: 0 3px 10px rgba(0,0,0,0.25);
        }
        .kd-badge.cat-seni { background: linear-gradient(135deg, #a855f7, #7c3aed); }
        .kd-badge.cat-olahraga { background: linear-gradient(135deg, #10b981, #059669); }
        .kd-badge.cat-pendidikan { background: linear-gradient(135deg, #3b82f6, #2563eb); }
        .kd-badge.cat-alam { background: linear-gradient(135deg, #14b8a6, #0d9488); }
        .kd-badge.cat-kuliner { background: linear-gradient(135deg, #f97316, #ea580c); }
        .kd-badge.status-approved { background: linear-gradient(135deg, #10b981, #22c55e); }
        .kd-badge.status-pending { background: linear-gradient(135deg, #f59e0b, #f97316); }
        .kd-badge.status-rejected { background: linear-gradient(135deg, #ef4444, #dc2626); }

        .kd-hero-title {
            font-size: 1.6rem;
            font-weight: 900;
            letter-spacing: -0.03em;
            line-height: 1.2;
            margin-bottom: 6px;
            text-shadow: 0 2px 8px rgba(0,0,0,0.4);
        }
        .kd-hero-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            font-size: 0.78rem;
            color: rgba(255,255,255,0.92);
            font-weight: 600;
        }
        .kd-hero-meta span {
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        /* ---------- ACTION BAR ---------- */
        .kd-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 18px;
        }
        .kd-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 10px 16px;
            border: none;
            border-radius: 10px;
            font-family: inherit;
            font-size: 0.8rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.22s;
            text-decoration: none;
            white-space: nowrap;
        }
        .kd-btn svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            stroke-width: 2.5;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .kd-btn.approve {
            background: linear-gradient(135deg, #10b981, #22c55e);
            color: #fff;
            box-shadow: 0 4px 14px rgba(16,185,129,0.35);
        }
        .kd-btn.approve:hover { transform: translateY(-1px); }
        .kd-btn.reject {
            background: #fef2f2;
            color: #dc2626;
            border: 1.5px solid #fecaca;
        }
        .kd-btn.reject:hover { background: #fee2e2; }
        .kd-btn.public {
            background: #fff;
            color: #6d28d9;
            border: 1.5px solid #ddd6fe;
        }
        .kd-btn.public:hover { background: #f5f3ff; }
        .kd-btn.delete {
            background: #fef2f2;
            color: #dc2626;
            border: 1.5px solid #fecaca;
        }
        .kd-btn.delete:hover { background: #fee2e2; border-color: #dc2626; }
        .kd-btn.back {
            background: #fff;
            color: #64748b;
            border: 1.5px solid #e8eaf0;
            margin-right: auto;
        }
        .kd-btn.back:hover { background: #f8fafc; color: #0f172a; }

        /* ---------- GRID ---------- */
        .kd-grid {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 18px;
            align-items: flex-start;
        }

        /* ---------- CARD ---------- */
        .kd-card {
            background: #fff;
            border: 1.5px solid #f0e9ff;
            border-radius: 16px;
            padding: 20px 22px;
            margin-bottom: 16px;
        }
        .kd-card:last-child { margin-bottom: 0; }
        .kd-card-title {
            font-size: 0.88rem;
            font-weight: 800;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 14px;
        }
        .kd-card-title::before {
            content: '';
            width: 4px;
            height: 14px;
            background: linear-gradient(180deg, #7c3aed, #ec4899);
            border-radius: 2px;
        }
        .kd-description {
            font-size: 0.9rem;
            color: #475569;
            line-height: 1.7;
        }

        /* ---------- SIDEBAR ---------- */
        .kd-sidebar {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .kd-info-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .kd-info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 9px 0;
            border-bottom: 1px dashed #f1f5f9;
            font-size: 0.82rem;
            gap: 12px;
        }
        .kd-info-row:last-child { border-bottom: none; }
        .kd-info-label {
            color: #64748b;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
            flex-shrink: 0;
        }
        .kd-info-value {
            color: #0f172a;
            font-weight: 800;
            text-align: right;
            word-break: break-word;
        }

        .kd-mini-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }
        .kd-mini-stat {
            padding: 14px 10px;
            border-radius: 12px;
            text-align: center;
        }
        .kd-mini-stat.purple { background: #f3efff; }
        .kd-mini-stat.pink { background: #fce7f3; }
        .kd-mini-stat.purple .num { color: #8b5cf6; }
        .kd-mini-stat.pink .num { color: #ec4899; }
        .kd-mini-stat .num {
            font-size: 1.5rem;
            font-weight: 900;
            line-height: 1;
            letter-spacing: -0.02em;
        }
        .kd-mini-stat .lbl {
            font-size: 0.65rem;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-top: 4px;
        }

        .kd-member-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .kd-member {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px;
            border-radius: 10px;
            background: #fafbff;
            border: 1px solid #f1f5f9;
        }
        .kd-member-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff;
            display: grid;
            place-items: center;
            font-weight: 900;
            font-size: 0.82rem;
            flex-shrink: 0;
            overflow: hidden;
            border: 2px solid #fff;
        }
        .kd-member-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .kd-member-info {
            flex: 1;
            min-width: 0;
        }
        .kd-member-info strong {
            display: block;
            font-size: 0.8rem;
            font-weight: 800;
            color: #0f172a;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .kd-member-info small {
            display: block;
            font-size: 0.66rem;
            color: #94a3b8;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .kd-member-role {
            font-size: 0.58rem;
            font-weight: 800;
            padding: 2px 7px;
            border-radius: 999px;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .kd-member-role.owner { background: #fef3c7; color: #b45309; }
        .kd-member-role.member { background: #dbeafe; color: #1d4ed8; }

        .kd-event-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .kd-event {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 10px;
            background: #fafbff;
            border: 1px solid #f1f5f9;
        }
        .kd-event-date {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            line-height: 1;
        }
        .kd-event-date strong { font-size: 1rem; font-weight: 900; }
        .kd-event-date span {
            font-size: 0.55rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .kd-event-info {
            flex: 1;
            min-width: 0;
        }
        .kd-event-info strong {
            display: block;
            font-size: 0.82rem;
            font-weight: 800;
            color: #0f172a;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .kd-event-info small {
            display: block;
            font-size: 0.68rem;
            color: #94a3b8;
            font-weight: 600;
            margin-top: 1px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .kd-empty {
            text-align: center;
            padding: 24px 12px;
            color: #94a3b8;
            font-size: 0.8rem;
            font-weight: 600;
        }
        .kd-empty-icon {
            font-size: 2rem;
            margin-bottom: 8px;
            opacity: 0.5;
        }

        /* ============================================================
           RESPONSIVE — MOBILE
           ============================================================ */
        @media (max-width: 1024px) {
            .kd-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 640px) {
            .kd-hero { border-radius: 16px; margin-bottom: 14px; }
            .kd-hero-cover { aspect-ratio: 16 / 10; }
            .kd-hero-content { padding: 16px 18px 14px; }
            .kd-hero-title { font-size: 1.2rem; }
            .kd-hero-meta { gap: 8px; font-size: 0.72rem; }
            .kd-badge { font-size: 0.6rem; padding: 3px 8px; }

            .kd-actions { gap: 6px; margin-bottom: 14px; }
            .kd-btn {
                padding: 9px 12px;
                font-size: 0.74rem;
                min-height: 40px;
                flex: 1 1 auto;
            }
            .kd-btn.back { flex: 0 0 auto; min-width: 40px; padding: 9px 10px; }
            .kd-btn.back span { display: none; }

            .kd-card { padding: 16px 18px; border-radius: 14px; margin-bottom: 14px; }
            .kd-card-title { font-size: 0.82rem; }
            .kd-description { font-size: 0.85rem; }

            .kd-info-row { font-size: 0.78rem; padding: 8px 0; }

            .kd-mini-stat { padding: 12px 8px; }
            .kd-mini-stat .num { font-size: 1.3rem; }
            .kd-mini-stat .lbl { font-size: 0.6rem; }

            .kd-member { padding: 8px; }
            .kd-member-avatar { width: 32px; height: 32px; font-size: 0.75rem; }
            .kd-member-info strong { font-size: 0.75rem; }
            .kd-member-info small { font-size: 0.62rem; }

            .kd-event-date { width: 40px; height: 40px; }
            .kd-event-date strong { font-size: 0.92rem; }
            .kd-event-date span { font-size: 0.5rem; }
            .kd-event-info strong { font-size: 0.78rem; }
            .kd-event-info small { font-size: 0.64rem; }
        }

        @media (max-width: 380px) {
            .kd-hero-title { font-size: 1.05rem; }
            .kd-btn { font-size: 0.7rem; padding: 8px 10px; }
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
                <h1 class="admin-page-title">Detail Komunitas</h1>
                <p class="admin-page-sub">Informasi lengkap komunitas yang diajukan user</p>
            </div>
            <div class="admin-user-chip">
                <span>{{ auth()->user()->name }}</span>
                <div class="admin-user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            </div>
        </div>

        @if(session('success'))
            <div style="background:#ecfdf5;color:#065f46;padding:12px 16px;border-radius:12px;font-size:0.85rem;margin-bottom:16px;border:1.5px solid #a7f3d0;">✅ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div style="background:#fef2f2;color:#991b1b;padding:12px 16px;border-radius:12px;font-size:0.85rem;margin-bottom:16px;border:1.5px solid #fecaca;">❌ {{ session('error') }}</div>
        @endif

        <!-- HERO -->
        <div class="kd-hero">
            <div class="kd-hero-cover">
                @if($community->cover)
                    <img src="{{ $community->cover }}" alt="{{ $community->name }}">
                @else
                    <div class="kd-hero-cover-empty">🏘️</div>
                @endif
                <div class="kd-hero-overlay"></div>
            </div>
            <div class="kd-hero-content">
                <div class="kd-hero-badges">
                    <span class="kd-badge cat-{{ $community->category_slug }}">{{ $community->category }}</span>
                    @if($community->status === 'approved')
                        <span class="kd-badge status-approved">✅ Disetujui</span>
                    @elseif($community->status === 'pending')
                        <span class="kd-badge status-pending">⏳ Menunggu</span>
                    @else
                        <span class="kd-badge status-rejected">❌ Ditolak</span>
                    @endif
                </div>
                <h1 class="kd-hero-title">{{ $community->name }}</h1>
                <div class="kd-hero-meta">
                    <span>👥 {{ $community->members_count }} anggota</span>
                    <span>📍 Pidie</span>
                    <span>🗓️ {{ $community->created_at->translatedFormat('d M Y') }}</span>
                </div>
            </div>
        </div>

        <!-- ACTION BAR -->
        <div class="kd-actions">
            <a href="{{ route('admin.komunitas') }}" class="kd-btn back">
                <svg viewBox="0 0 24 24">
                    <line x1="19" y1="12" x2="5" y2="12"/>
                    <polyline points="12 19 5 12 12 5"/>
                </svg>
                <span>Kembali</span>
            </a>

            @if($community->status === 'pending')
                <button class="kd-btn approve" onclick="approveCommunity()">
                    <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                    Setujui
                </button>
                <button class="kd-btn reject" onclick="rejectCommunity()">
                    <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                    Tolak
                </button>
            @endif

            @if($community->status === 'approved')
                <a href="{{ route('komunitas.detail', $community->slug) }}" target="_blank" class="kd-btn public">
                    <svg viewBox="0 0 24 24">
                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                        <polyline points="15 3 21 3 21 9"/>
                        <line x1="10" y1="14" x2="21" y2="3"/>
                    </svg>
                    Lihat Publik
                </a>
            @endif

            <form action="{{ route('admin.komunitas.delete', $community->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus komunitas {{ $community->name }}?\n\nSemua kegiatan dan anggota akan hilang permanen.')">
                @csrf
                <button type="submit" class="kd-btn delete">
                    <svg viewBox="0 0 24 24">
                        <polyline points="3 6 5 6 21 6"/>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                    </svg>
                    Hapus
                </button>
            </form>
        </div>

        <!-- GRID -->
        <div class="kd-grid">
            <!-- MAIN COLUMN -->
            <div>
                <div class="kd-card">
                    <div class="kd-card-title">📝 Tentang Komunitas</div>
                    <p class="kd-description">{{ $community->description }}</p>
                </div>

                <!-- Kegiatan -->
                <div class="kd-card">
                    <div class="kd-card-title">📅 Kegiatan ({{ $events->count() }})</div>
                    @if($events->isEmpty())
                        <div class="kd-empty">
                            <div class="kd-empty-icon">📅</div>
                            Belum ada kegiatan
                        </div>
                    @else
                        <div class="kd-event-list">
                            @foreach($events as $ev)
                                <div class="kd-event">
                                    <div class="kd-event-date">
                                        <strong>{{ $ev->event_date->format('d') }}</strong>
                                        <span>{{ strtoupper($ev->event_date->translatedFormat('M')) }}</span>
                                    </div>
                                    <div class="kd-event-info">
                                        <strong>{{ $ev->title }}</strong>
                                        <small>📍 {{ $ev->location }} · {{ $ev->event_date->translatedFormat('d M Y') }}{{ $ev->event_time ? ' · ' . $ev->event_time : '' }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- SIDEBAR -->
            <div class="kd-sidebar">

                <!-- Mini Stats -->
                <div class="kd-card">
                    <div class="kd-card-title">📊 Statistik</div>
                    <div class="kd-mini-stats">
                        <div class="kd-mini-stat purple">
                            <div class="num">{{ $stats['members'] }}</div>
                            <div class="lbl">Anggota</div>
                        </div>
                        <div class="kd-mini-stat pink">
                            <div class="num">{{ $stats['events'] }}</div>
                            <div class="lbl">Kegiatan</div>
                        </div>
                    </div>
                </div>

                <!-- Info -->
                <div class="kd-card">
                    <div class="kd-card-title">ℹ️ Informasi</div>
                    <div class="kd-info-list">
                        <div class="kd-info-row">
                            <span class="kd-info-label">👤 Pembuat</span>
                            <span class="kd-info-value">{{ $community->creator->name ?? 'Anonim' }}</span>
                        </div>
                        <div class="kd-info-row">
                            <span class="kd-info-label">📧 Email</span>
                            <span class="kd-info-value">{{ $community->creator->email ?? '-' }}</span>
                        </div>
                        <div class="kd-info-row">
                            <span class="kd-info-label">📅 Dibuat</span>
                            <span class="kd-info-value">{{ $community->created_at->translatedFormat('d M Y') }}</span>
                        </div>
                        <div class="kd-info-row">
                            <span class="kd-info-label">🔖 Kategori</span>
                            <span class="kd-info-value">{{ $community->category }}</span>
                        </div>
                    </div>
                </div>

                <!-- Anggota -->
                <div class="kd-card">
                    <div class="kd-card-title">👥 Anggota ({{ $members->count() }})</div>
                    @if($members->isEmpty())
                        <div class="kd-empty">
                            <div class="kd-empty-icon">👥</div>
                            Belum ada anggota
                        </div>
                    @else
                        <div class="kd-member-list">
                            @foreach($members->take(8) as $m)
                                <div class="kd-member">
                                    <div class="kd-member-avatar">
                                        @if($m->avatar && \Storage::disk('public')->exists($m->avatar))
                                            <img src="{{ asset('storage/' . $m->avatar) }}" alt="{{ $m->name }}">
                                        @else
                                            {{ strtoupper(substr($m->name, 0, 1)) }}
                                        @endif
                                    </div>
                                    <div class="kd-member-info">
                                        <strong>{{ $m->name }}</strong>
                                        <small>{{ $m->email }}</small>
                                    </div>
                                    @if($m->id === $community->creator_id)
                                        <span class="kd-member-role owner">Pembuat</span>
                                    @else
                                        <span class="kd-member-role member">Anggota</span>
                                    @endif
                                </div>
                            @endforeach
                            @if($members->count() > 8)
                                <div style="text-align:center;font-size:0.72rem;color:#94a3b8;font-weight:600;padding:8px;">
                                    +{{ $members->count() - 8 }} anggota lainnya
                                </div>
                            @endif
                        </div>
                    @endif
                </div>

            </div>
        </div>

    </main>

    <script>
        const csrfToken = "{{ csrf_token() }}";
        const communitySlug = "{{ $community->slug }}";

        async function approveCommunity() {
            if (!confirm('Setujui komunitas ini? Komunitas akan tampil di halaman publik.')) return;

            try {
                const res = await fetch(`/admin/pengajuan/${encodeURIComponent(communitySlug)}/approve`, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    credentials: 'same-origin',
                });
                if (!res.ok) throw new Error('Gagal menyetujui');
                window.location.reload();
            } catch (e) {
                alert('Gagal menyetujui: ' + e.message);
            }
        }

        async function rejectCommunity() {
            const reason = (prompt('Alasan penolakan (opsional):') || '').trim() || 'Tidak memenuhi kriteria';
            if (!confirm('Tolak komunitas ini?\n\nAlasan: ' + reason)) return;

            try {
                const res = await fetch(`/admin/pengajuan/${encodeURIComponent(communitySlug)}/reject`, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    credentials: 'same-origin',
                    body: JSON.stringify({ reason }),
                });
                if (!res.ok) throw new Error('Gagal menolak');
                window.location.reload();
            } catch (e) {
                alert('Gagal menolak: ' + e.message);
            }
        }
    </script>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>