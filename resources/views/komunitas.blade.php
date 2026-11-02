<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Komunitas — Vibes Space Pidie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .explore-page {
            background: #fdfcff;
            min-height: 100vh;
            padding: 32px 0 90px;
            position: relative;
            overflow-x: hidden;
        }
        .explore-container {
            max-width: 1160px;
            margin: 0 auto;
            padding: 0 28px;
            position: relative;
            z-index: 1;
        }
        @media (max-width: 768px) {
            .explore-container { padding: 0 18px; }
        }
        .explore-header { margin-bottom: 28px; }
        .explore-title {
            font-size: 2rem;
            font-weight: 900;
            letter-spacing: -0.035em;
            line-height: 1.15;
            color: #0f172a;
            margin-bottom: 8px;
        }
        .explore-title .accent {
            background: linear-gradient(135deg, #8b5cf6, #ec4899, #f97316);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .explore-subtitle {
            font-size: 0.92rem;
            color: #64748b;
            font-weight: 500;
            line-height: 1.6;
            max-width: 560px;
        }
        .toolbar {
            display: flex;
            gap: 12px;
            margin: 28px 0 20px;
            align-items: center;
            flex-wrap: wrap;
        }
        .search-mini {
            flex: 1;
            min-width: 260px;
            position: relative;
            display: flex;
            align-items: center;
            background: #fff;
            border: 1.5px solid #e8eaf0;
            border-radius: 14px;
            padding: 4px 4px 4px 16px;
            transition: all 0.25s;
            box-shadow: 0 2px 8px rgba(139,92,246,0.04);
        }
        .search-mini:focus-within {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 4px rgba(139,92,246,0.1), 0 4px 16px rgba(139,92,246,0.1);
        }
        .search-mini svg {
            width: 18px;
            height: 18px;
            stroke: #8b5cf6;
            stroke-width: 2.2;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }
        .search-mini input {
            flex: 1;
            border: none;
            outline: none;
            padding: 10px 10px;
            font-size: 0.9rem;
            font-family: inherit;
            background: transparent;
            color: #0f172a;
            font-weight: 500;
            min-width: 0;
        }
        .search-mini input::placeholder { color: #94a3b8; }
        .search-mini button {
            padding: 9px 20px;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-family: inherit;
            font-size: 0.82rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.25s;
            white-space: nowrap;
            box-shadow: 0 4px 12px rgba(139,92,246,0.3);
        }
        .search-mini button:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(139,92,246,0.4);
        }
        .filter-tabs {
            display: flex;
            gap: 6px;
            margin-bottom: 24px;
            overflow-x: auto;
            scrollbar-width: none;
            padding: 4px;
            background: #fff;
            border: 1.5px solid #e8eaf0;
            border-radius: 14px;
            box-shadow: 0 2px 8px rgba(139,92,246,0.04);
        }
        .filter-tabs::-webkit-scrollbar { display: none; }
        .filter-tab {
            padding: 10px 16px;
            font-family: inherit;
            font-size: 0.82rem;
            font-weight: 700;
            color: #64748b;
            text-decoration: none;
            white-space: nowrap;
            border-radius: 10px;
            transition: all 0.22s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            flex-shrink: 0;
        }
        .filter-tab:hover {
            color: #6d28d9;
            background: #f5f3ff;
        }
        .filter-tab.active {
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff;
            box-shadow: 0 6px 16px rgba(139,92,246,0.35);
        }
        .filter-tab .count {
            padding: 2px 7px;
            background: rgba(0,0,0,0.06);
            border-radius: 999px;
            font-size: 0.68rem;
            font-weight: 900;
            color: inherit;
        }
        .filter-tab.active .count { background: rgba(255,255,255,0.28); }
        .community-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        @media (max-width: 900px) {
            .community-grid { grid-template-columns: repeat(2, 1fr); gap: 16px; }
        }
        @media (max-width: 600px) {
            .community-grid { grid-template-columns: 1fr; gap: 14px; }
        }
        .community-card {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            border: 1.5px solid #f0e9ff;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            text-decoration: none;
            color: inherit;
            position: relative;
        }
        .community-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(139,92,246,0.18);
            border-color: #ddd6fe;
        }
        .card-cover {
    position: relative;
    aspect-ratio: 16 / 10;
    overflow: hidden;
    background: linear-gradient(135deg, #f5f3ff, #fce7f3);
    display: flex;
    align-items: center;
    justify-content: center;
}
.card-cover img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: center;
    display: block;
    transition: transform 0.55s;
}
        .community-card:hover .card-cover img { transform: scale(1.06); }
        .card-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            padding: 5px 11px;
            border-radius: 8px;
            font-size: 0.66rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .card-badge.seni { background: linear-gradient(135deg, #a855f7, #7c3aed); }
        .card-badge.olahraga { background: linear-gradient(135deg, #10b981, #059669); }
        .card-badge.pendidikan { background: linear-gradient(135deg, #3b82f6, #2563eb); }
        .card-badge.alam { background: linear-gradient(135deg, #14b8a6, #0d9488); }
        .card-badge.kuliner { background: linear-gradient(135deg, #f97316, #ea580c); }
        .card-body {
            padding: 16px 18px 18px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            flex: 1;
        }
        .card-title {
            font-size: 1rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.015em;
            line-height: 1.3;
            margin: 0;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .card-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.75rem;
            color: #94a3b8;
            font-weight: 600;
        }
        .card-desc {
            font-size: 0.82rem;
            color: #64748b;
            line-height: 1.55;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-top: 2px;
        }
        .card-footer {
            margin-top: auto;
            padding-top: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid #f5f3ff;
        }
        .card-link {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 0.78rem;
            font-weight: 800;
            color: #8b5cf6;
            transition: gap 0.25s;
        }
        .community-card:hover .card-link {
            gap: 8px;
            color: #ec4899;
        }
        .card-link svg {
            width: 12px;
            height: 12px;
            stroke: currentColor;
            stroke-width: 2.5;
            fill: none;
        }
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: #fff;
            border-radius: 18px;
            border: 2px dashed #e9d5ff;
        }
        .empty-state .emoji {
            font-size: 3rem;
            margin-bottom: 14px;
            display: inline-block;
        }
        .empty-state h3 {
            font-size: 1.05rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 6px;
        }
        .empty-state p {
            font-size: 0.85rem;
            color: #64748b;
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .explore-page { padding: 20px 0 60px; }
            .explore-title { font-size: 1.6rem; }
            .explore-subtitle { font-size: 0.85rem; }
            .toolbar { gap: 8px; margin: 20px 0 16px; }
            .search-mini { min-width: 100%; padding: 3px 3px 3px 12px; border-radius: 12px; }
            .search-mini input { padding: 10px 6px; font-size: 16px; }
            .search-mini button { padding: 8px 14px; font-size: 0.78rem; border-radius: 9px; }
            .filter-tabs { padding: 3px; margin-bottom: 20px; }
            .filter-tab { padding: 9px 13px; font-size: 0.78rem; }
        }
    </style>
</head>
<body>

    @include('partials.navbar', ['active' => 'komunitas'])

    <main class="explore-page">
        <div class="explore-container">
            <div class="explore-header">
                <h1 class="explore-title">
                    Temukan <span class="accent">komunitas</span> yang cocok
                </h1>
                <p class="explore-subtitle">
                    Dari seni hingga kuliner — jelajahi {{ $communities->count() }} komunitas kreatif di Pidie.
                </p>
            </div>

            @if(session('success'))
                <div style="background:#ecfdf5;color:#065f46;padding:12px 16px;border-radius:12px;font-size:0.85rem;margin-bottom:16px;border:1.5px solid #a7f3d0;">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div style="background:#fef2f2;color:#991b1b;padding:12px 16px;border-radius:12px;font-size:0.85rem;margin-bottom:16px;border:1.5px solid #fecaca;">{{ session('error') }}</div>
            @endif

            <div class="toolbar">
                <form method="GET" action="{{ route('komunitas') }}" class="search-mini">
                    @if(request('filter'))
                        <input type="hidden" name="filter" value="{{ request('filter') }}">
                    @endif
                    <svg viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari komunitas atau minat..." autocomplete="off">
                    <button type="submit">Cari</button>
                </form>
            </div>

            <div class="filter-tabs">
                <a href="{{ route('komunitas', array_filter(['q' => request('q')])) }}"
                   class="filter-tab {{ !request('filter') || request('filter') === 'all' ? 'active' : '' }}">
                    Semua <span class="count">{{ $communities->count() }}</span>
                </a>
                <a href="{{ route('komunitas', array_filter(['filter' => 'seni', 'q' => request('q')])) }}"
                   class="filter-tab {{ request('filter') === 'seni' ? 'active' : '' }}">Seni</a>
                <a href="{{ route('komunitas', array_filter(['filter' => 'olahraga', 'q' => request('q')])) }}"
                   class="filter-tab {{ request('filter') === 'olahraga' ? 'active' : '' }}">Olahraga</a>
                <a href="{{ route('komunitas', array_filter(['filter' => 'pendidikan', 'q' => request('q')])) }}"
                   class="filter-tab {{ request('filter') === 'pendidikan' ? 'active' : '' }}">Pendidikan</a>
                <a href="{{ route('komunitas', array_filter(['filter' => 'alam', 'q' => request('q')])) }}"
                   class="filter-tab {{ request('filter') === 'alam' ? 'active' : '' }}">Alam</a>
                <a href="{{ route('komunitas', array_filter(['filter' => 'kuliner', 'q' => request('q')])) }}"
                   class="filter-tab {{ request('filter') === 'kuliner' ? 'active' : '' }}">Kuliner</a>
            </div>

            @if($communities->isEmpty())
                <div class="empty-state">
                    <div class="emoji">🔍</div>
                    <h3>Tidak ada komunitas ditemukan</h3>
                    <p>Coba kata kunci lain atau jelajahi semua kategori.</p>
                    <a href="{{ route('komunitas') }}" class="btn btn-primary">Lihat Semua</a>
                </div>
            @else
                <div class="community-grid">
                    @foreach($communities as $comm)
                        <a href="{{ route('komunitas.detail', $comm->slug) }}" class="community-card">
                            <div class="card-cover">
                                <img src="{{ $comm->cover }}" alt="{{ $comm->name }}" loading="lazy">
                                <span class="card-badge {{ $comm->category_slug }}">{{ $comm->category }}</span>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">{{ $comm->name }}</h3>
                                <div class="card-meta">
                                    <span>{{ $comm->members_count }} anggota</span>
                                    <span>·</span>
                                    <span>Pidie</span>
                                </div>
                                <p class="card-desc">{{ Str::limit($comm->description, 100) }}</p>
                                <div class="card-footer">
                                    <span class="card-link">
                                        Lihat detail
                                        <svg viewBox="0 0 24 24">
                                            <line x1="5" y1="12" x2="19" y2="12"/>
                                            <polyline points="12 5 19 12 12 19"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </main>

</body>
</html>