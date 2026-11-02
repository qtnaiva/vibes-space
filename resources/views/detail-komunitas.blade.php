<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $community->name }} — Vibes Space Pidie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .detail-cover {
            position: relative;
            height: 380px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(139,92,246,0.15);
            margin-bottom: 24px;
            background: linear-gradient(135deg, #f5f3ff, #fce7f3);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .detail-cover img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
            display: block;
            padding: 10px;
        }
        @media (max-width: 768px) {
            .detail-cover {
                height: auto;
                aspect-ratio: 16 / 10;
                border-radius: 16px;
                margin-bottom: 18px;
            }
            .detail-cover img { padding: 6px; }
        }

        /* ============================================================
           EVENT CARD dengan tombol Daftar / Batal
           ============================================================ */
        .ev-item {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 14px;
            background: #fff;
            border: 1.5px solid #f0e9ff;
            border-radius: 14px;
            transition: all 0.22s;
            margin-bottom: 10px;
        }
        .ev-item:hover {
            border-color: #ddd6fe;
            box-shadow: 0 4px 16px rgba(139,92,246,0.08);
        }
        .ev-item-main {
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }
        .ev-item-date {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            line-height: 1;
            box-shadow: 0 4px 12px rgba(139,92,246,0.3);
        }
        .ev-item-date strong { font-size: 1.3rem; font-weight: 900; }
        .ev-item-date span {
            font-size: 0.58rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-top: 2px;
        }
        .ev-item-info { flex: 1; min-width: 0; }
        .ev-item-info h4 {
            font-size: 0.92rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.3;
            margin: 0 0 4px;
        }
        .ev-item-meta {
            font-size: 0.72rem;
            color: #64748b;
            font-weight: 600;
            line-height: 1.5;
        }
        .ev-item-meta .row {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            margin-right: 10px;
        }
        .ev-item-desc {
            font-size: 0.76rem;
            color: #64748b;
            line-height: 1.55;
            margin-top: 6px;
            white-space: pre-line;
        }
        .ev-item-address {
            font-size: 0.72rem;
            color: #64748b;
            background: #f8fafc;
            padding: 5px 9px;
            border-radius: 7px;
            border-left: 3px solid #8b5cf6;
            margin-top: 6px;
            line-height: 1.5;
        }
        .ev-item-maps {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 10px;
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #bfdbfe;
            border-radius: 7px;
            font-size: 0.7rem;
            font-weight: 800;
            text-decoration: none;
            margin-top: 6px;
            transition: all 0.2s;
        }
        .ev-item-maps:hover {
            background: #3b82f6;
            color: #fff;
            border-color: #3b82f6;
        }

        /* Action row */
        .ev-item-actions {
            display: flex;
            gap: 6px;
            padding-top: 10px;
            border-top: 1px dashed #f1f5f9;
            flex-wrap: wrap;
        }
        .ev-item-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 8px 16px;
            border: none;
            border-radius: 9px;
            font-family: inherit;
            font-size: 0.76rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            line-height: 1.3;
        }
        .ev-item-btn svg {
            width: 12px;
            height: 12px;
            stroke: currentColor;
            stroke-width: 2.5;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .ev-item-btn.primary {
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff;
            box-shadow: 0 3px 10px rgba(139,92,246,0.3);
        }
        .ev-item-btn.primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 14px rgba(139,92,246,0.4);
        }
        .ev-item-btn.danger {
            background: #fef2f2;
            color: #dc2626;
            border: 1.5px solid #fecaca;
        }
        .ev-item-btn.danger:hover {
            background: #fee2e2;
            border-color: #dc2626;
        }
        .ev-item-btn.warning {
            background: #fffbeb;
            color: #b45309;
            border: 1.5px solid #fde68a;
        }
        .ev-item-btn.warning:hover {
            background: #fef3c7;
            border-color: #f59e0b;
        }
        .ev-item-btn.success {
            background: #ecfdf5;
            color: #047857;
            border: 1.5px solid #a7f3d0;
            cursor: default;
        }
        .ev-item-btn.info {
            background: #eff6ff;
            color: #2563eb;
            border: 1.5px solid #bfdbfe;
        }
        .ev-item-btn.info:hover {
            background: #dbeafe;
            border-color: #3b82f6;
        }

        .ev-item-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            border-radius: 7px;
            font-size: 0.66rem;
            font-weight: 800;
        }
        .ev-item-badge.registered {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
        }

        .ev-item-guest-note {
            font-size: 0.7rem;
            color: #94a3b8;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 4px 0;
        }
    </style>
</head>
<body>

    @include('partials.navbar', ['active' => 'komunitas'])

    <main class="page-komunitas">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <span>/</span>
                <a href="{{ route('komunitas') }}">Komunitas</a>
                <span>/</span>
                <span>{{ $community->name }}</span>
            </div>

            @if(session('success'))
                <div style="background:#ecfdf5;color:#065f46;padding:12px 16px;border-radius:12px;font-size:0.85rem;margin-bottom:20px;border:1.5px solid #a7f3d0;">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div style="background:#fef2f2;color:#991b1b;padding:12px 16px;border-radius:12px;font-size:0.85rem;margin-bottom:20px;border:1.5px solid #fecaca;">{{ session('error') }}</div>
            @endif

            <div class="detail-cover">
                <img src="{{ $community->cover }}" alt="{{ $community->name }}">
            </div>

            <div class="detail-header">
                <div class="detail-header-info">
                    <span class="card-tag">{{ $community->category }}</span>
                    <h1>{{ $community->name }}</h1>
                    <p class="text-soft">
                        Pidie · {{ $community->members_count }} anggota · Dibuat oleh {{ $community->creator->name ?? 'Anonim' }} · {{ $community->created_at->translatedFormat('d F Y') }}
                    </p>
                </div>

                <div style="display:flex; gap:8px; flex-wrap:wrap;">
                    @auth
                        @if($isCreator)
                            <a href="{{ route('kelola-komunitas', $community->slug) }}" class="btn btn-primary btn-lg" style="background:linear-gradient(135deg,#8b5cf6,#ec4899);">
                                Kelola Komunitas
                            </a>
                        @elseif($isMember)
                            <form action="{{ route('komunitas.leave', $community->slug) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-outline btn-lg" style="border-color:#dc2626;color:#dc2626;" onclick="return confirm('Yakin ingin keluar?')">
                                    Keluar Komunitas
                                </button>
                            </form>
                        @else
                            <form action="{{ route('komunitas.join', $community->slug) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-lg">+ Gabung Komunitas</button>
                            </form>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">+ Gabung Komunitas</a>
                    @endauth
                </div>
            </div>

            <div class="detail-content">
                <div class="detail-main">
                    <h3>Tentang komunitas</h3>
                    <p>{{ $community->description }}</p>

                    <h3 class="mt-3">Kegiatan mendatang</h3>
                    @if($events->isEmpty())
                        <div class="empty-filter">
                            <div class="empty-icon">📅</div>
                            <h4>Belum ada kegiatan mendatang</h4>
                        </div>
                    @else
                        <div class="event-list">
                            @foreach($events as $ev)
                                @php
                                    $isRegistered = in_array($ev->id, $registeredEventIds ?? []);
                                    // User dianggap member jika: creator, sudah join, atau flag dari controller
                                    $userIsMember = $isCreator || $isMember || ($ev->is_member ?? false);
                                @endphp

                                <div class="ev-item">
                                    <div class="ev-item-main">
                                        <div class="ev-item-date">
                                            @if($ev->event_date)
                                                <strong>{{ $ev->event_date->format('d') }}</strong>
                                                <span>{{ strtoupper($ev->event_date->translatedFormat('M')) }}</span>
                                            @else
                                                <strong>—</strong>
                                                <span>—</span>
                                            @endif
                                        </div>

                                        <div class="ev-item-info">
                                            <h4>{{ $ev->title }}</h4>
                                            <div class="ev-item-meta">
                                                <span class="row">
                                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                                    {{ $ev->location }}
                                                </span>
                                                @if($ev->event_date)
                                                    <span class="row">
                                                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                                        {{ $ev->event_date->translatedFormat('d F Y') }}
                                                        @if($ev->event_time) · {{ $ev->event_time }} WIB @endif
                                                    </span>
                                                @endif
                                            </div>

                                            @if($ev->description)
                                                <p class="ev-item-desc">{{ $ev->description }}</p>
                                            @endif

                                            @if($ev->address)
                                                <div class="ev-item-address">📍 {{ $ev->address }}</div>
                                            @endif

                                            @if($ev->maps_url)
                                                <a href="{{ $ev->maps_url }}" target="_blank" rel="noopener" class="ev-item-maps">
                                                    🗺️ Buka di Google Maps
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- ACTION ROW: tombol daftar / batal --}}
                                    <div class="ev-item-actions">
                                        @auth
                                            @if($isRegistered)
                                                {{-- Sudah terdaftar --}}
                                                <span class="ev-item-badge registered">
                                                    ✓ Terdaftar
                                                </span>
                                                <form action="/events/{{ $ev->id }}/unregister" method="POST" style="display:inline;" onsubmit="return confirm('Batalkan pendaftaran kegiatan ini?')">
                                                    @csrf
                                                    <button type="submit" class="ev-item-btn danger">
                                                        <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                                        Batalkan
                                                    </button>
                                                </form>
                                            @elseif($userIsMember)
                                                {{-- Sudah member → bisa daftar --}}
                                                <form action="/events/{{ $ev->id }}/register" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="ev-item-btn primary">
                                                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                                                        Daftar Kegiatan
                                                    </button>
                                                </form>
                                            @else
                                                {{-- Belum member → harus gabung dulu --}}
                                                <form action="{{ route('komunitas.join', $community->slug) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="ev-item-btn warning">
                                                        <svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
                                                        Gabung Dulu untuk Daftar
                                                    </button>
                                                </form>
                                            @endif
                                        @else
                                            {{-- Belum login --}}
                                            <a href="{{ route('login') }}" class="ev-item-btn primary">
                                                <svg viewBox="0 0 24 24"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                                                Masuk untuk Daftar
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <aside class="detail-sidebar">
                    <div class="sidebar-card">
                        <h4>Info komunitas</h4>
                        <ul class="sidebar-info">
                            <li><span>Kategori</span><strong>{{ $community->category }}</strong></li>
                            <li><span>Lokasi</span><strong>Pidie</strong></li>
                            <li><span>Anggota</span><strong>{{ $community->members_count }} orang</strong></li>
                            <li><span>Dibuat</span><strong>{{ $community->created_at->translatedFormat('d F Y') }}</strong></li>
                            <li><span>Pembuat</span><strong>{{ $community->creator->name ?? 'Anonim' }}</strong></li>
                        </ul>
                    </div>

                    <div class="sidebar-card">
                        <h4>Anggota komunitas</h4>
                        @if(!$canSeeMembers)
                            <div style="text-align:center;padding:20px 12px;">
                                <div style="font-size:2.5rem;margin-bottom:8px;">👥</div>
                                <strong style="font-size:1.5rem;color:#7c3aed;display:block;margin-bottom:4px;">{{ $community->members_count }}</strong>
                                <p class="text-soft" style="font-size:0.85rem;">anggota terdaftar</p>
                            </div>
                        @else
                            <div class="member-list">
                                @foreach($members->take(5) as $index => $member)
                                    <div class="member-avatar {{ ['', 'blue', 'pink', 'green', ''][$index % 5] }}" title="{{ $member->name }}">
                                        {{ strtoupper(substr($member->name, 0, 1)) }}
                                    </div>
                                @endforeach
                                @if($members->count() > 5)
                                    <span class="member-more">+ {{ $members->count() - 5 }} lainnya</span>
                                @endif
                            </div>
                        @endif
                    </div>
                </aside>
            </div>

            <div class="mt-5">
                <a href="{{ route('komunitas') }}" class="btn btn-outline">← Kembali ke daftar komunitas</a>
            </div>
        </div>
    </main>

</body>
</html>