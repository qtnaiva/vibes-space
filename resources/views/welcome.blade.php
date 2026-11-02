<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Vibes Space Pidie — Platform Komunitas Kreatif</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* ============================================================
           BERANDA MODERN — MOBILE FIRST & SMOOTH
           ============================================================ */
        body { background: #f8f9fc; overflow-x: hidden; }
        
        .home-wrap { 
            position: relative; 
            padding-bottom: 100px; 
            overflow: hidden;
        }
        
        /* Ornamen Latar Belakang */
        .home-wrap::before {
            content: '';
            position: absolute;
            top: -150px; right: -100px;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(139,92,246,0.12) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }
        .home-wrap::after {
            content: '';
            position: absolute;
            bottom: 10%; left: -150px;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(236,72,153,0.08) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        /* ---------- HERO SECTION ---------- */
        .hero-section {
            position: relative;
            max-width: 1160px;
            margin: 0 auto;
            padding: 40px 24px 60px;
            z-index: 2;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 40px;
            align-items: center;
        }

        .hero-text { position: relative; z-index: 3; }
        
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: #fff;
            border: 1.5px solid #ede9fe;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 800;
            color: #6d28d9;
            margin-bottom: 24px;
            box-shadow: 0 4px 12px rgba(139,92,246,0.06);
        }
        .hero-badge .live-dot {
            width: 7px; height: 7px;
            border-radius: 50%;
            background: #10b981;
            position: relative;
            flex-shrink: 0;
        }
        .hero-badge .live-dot::after {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 50%;
            background: #10b981;
            opacity: 0.4;
            animation: livePing 1.8s infinite;
        }
        @keyframes livePing { 0% { transform: scale(1); opacity: 0.4; } 100% { transform: scale(2.5); opacity: 0; } }

        .hero-title {
            font-size: 3.2rem;
            line-height: 1.05;
            font-weight: 900;
            letter-spacing: -0.04em;
            color: #0f172a;
            margin-bottom: 20px;
        }
        .hero-title .highlight {
            position: relative;
            display: inline-block;
            color: transparent;
            background: linear-gradient(135deg, #8b5cf6, #ec4899, #f97316);
            -webkit-background-clip: text;
            background-clip: text;
        }
        .hero-subtitle {
            font-size: 1rem;
            line-height: 1.7;
            color: #64748b;
            max-width: 480px;
            margin-bottom: 28px;
            font-weight: 500;
        }

        /* Search Bar */
        .search-wrap {
            position: relative;
            background: #fff;
            border-radius: 16px;
            padding: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
            max-width: 520px;
            box-shadow: 0 12px 32px rgba(139,92,246,0.08), 0 2px 8px rgba(0,0,0,0.02);
            border: 1.5px solid #f0e9ff;
            margin-bottom: 20px;
            transition: all 0.25s;
        }
        .search-wrap:focus-within {
            border-color: #a78bfa;
            box-shadow: 0 16px 40px rgba(139,92,246,0.12), 0 0 0 4px rgba(139,92,246,0.06);
        }
        .search-icon {
            width: 20px; height: 20px;
            padding-left: 14px;
            color: #a78bfa;
            flex-shrink: 0;
        }
        .search-wrap input {
            flex: 1;
            border: none;
            outline: none;
            padding: 12px 4px;
            font-size: 0.92rem;
            font-family: inherit;
            background: transparent;
            color: #0f172a;
            font-weight: 500;
            min-width: 0;
        }
        .search-wrap input::placeholder { color: #94a3b8; font-weight: 400; }
        .search-btn {
            padding: 10px 20px;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff;
            border: none;
            border-radius: 11px;
            font-family: inherit;
            font-size: 0.82rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 14px rgba(139,92,246,0.35);
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .search-btn:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(139,92,246,0.45); }

        /* CTA Buttons */
        .hero-cta {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 32px;
        }
        .btn-hero-primary {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 11px 22px;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 800;
            text-decoration: none;
            box-shadow: 0 8px 24px rgba(139,92,246,0.25);
            transition: all 0.25s;
            border: none;
            font-family: inherit;
        }
        .btn-hero-primary:hover { transform: translateY(-2px); box-shadow: 0 12px 32px rgba(139,92,246,0.4); }
        .btn-hero-secondary {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 11px 22px;
            background: #fff;
            color: #6d28d9;
            border: 1.5px solid #ddd6fe;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 800;
            text-decoration: none;
            transition: all 0.25s;
        }
        .btn-hero-secondary:hover { border-color: #8b5cf6; background: #f5f3ff; transform: translateY(-1px); }

        /* Stats */
        .hero-stats {
            display: flex;
            gap: 28px;
            flex-wrap: wrap;
        }
        .stat-item { display: flex; align-items: center; gap: 10px; }
        .stat-num { font-size: 1.5rem; font-weight: 900; color: #0f172a; letter-spacing: -0.02em; line-height: 1; }
        .stat-label { font-size: 0.72rem; color: #64748b; font-weight: 600; line-height: 1.3; }

        /* Hero Image */
        .hero-visual { position: relative; }
        .hero-image-card {
            position: relative;
            border-radius: 28px;
            padding: 16px;
            background: linear-gradient(135deg, #ede9fe 0%, #fce7f3 50%, #fed7aa 100%);
            box-shadow: 0 32px 80px rgba(139,92,246,0.18);
            transform: rotate(2deg);
            transition: transform 0.5s;
        }
        .hero-image-card:hover { transform: rotate(0deg) scale(1.02); }
        .hero-image-frame {
            position: relative;
            border-radius: 18px;
            overflow: hidden;
            background: #f8f5ff;
            aspect-ratio: 4 / 5;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero-image-frame img { width: 100%; height: 100%; object-fit: cover; }
        
        /* Stickers */
        .sticker-aktif {
            position: absolute; top: -15px; right: -15px;
            width: 68px; height: 68px; border-radius: 50%;
            background: linear-gradient(135deg, #fbbf24, #f97316);
            color: #fff; display: flex; flex-direction: column; align-items: center; justify-content: center;
            font-weight: 900; font-size: 0.65rem; line-height: 1.1; text-align: center;
            box-shadow: 0 8px 24px rgba(249,115,22,0.4); transform: rotate(-12deg); z-index: 5; border: 3px solid #fff;
        }
        .sticker-creator {
            position: absolute; bottom: 20px; left: -20px;
            padding: 10px 16px; background: rgba(255,255,255,0.95); border-radius: 14px;
            backdrop-filter: blur(12px); box-shadow: 0 12px 32px rgba(0,0,0,0.1);
            display: flex; align-items: center; gap: 10px; transform: rotate(-3deg); z-index: 5;
        }

        /* ---------- SECTION WRAPPER ---------- */
        .section-wrap {
            max-width: 1160px;
            margin: 0 auto;
            padding: 50px 24px;
            position: relative;
            z-index: 2;
        }
        .section-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 28px;
            flex-wrap: wrap;
        }
        .section-eyebrow {
            font-size: 0.72rem;
            font-weight: 800;
            color: #8b5cf6;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 6px;
        }
        .section-eyebrow::before {
            content: ''; width: 20px; height: 2px;
            background: linear-gradient(90deg, #8b5cf6, #ec4899);
            border-radius: 2px;
        }
        .section-title {
            font-size: 1.75rem;
            font-weight: 900;
            color: #0f172a;
            letter-spacing: -0.03em;
            line-height: 1.1;
        }
        .link-view-all {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: #8b5cf6;
            font-weight: 800;
            font-size: 0.82rem;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 999px;
            background: #f5f3ff;
            transition: all 0.25s;
            flex-shrink: 0;
        }
        .link-view-all:hover { background: linear-gradient(135deg, #8b5cf6, #ec4899); color: #fff; transform: translateX(3px); }

        /* ---------- KATEGORI ---------- */
        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 14px;
        }
        .category-card {
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            gap: 12px; padding: 24px 16px; background: #fff; border-radius: 18px;
            border: 1.5px solid #f0e9ff; text-decoration: none; color: #0f172a;
            transition: all 0.3s cubic-bezier(0.4,0,0.2,1); position: relative; overflow: hidden;
        }
        .category-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
            background: var(--cat-color, #8b5cf6); opacity: 0; transition: opacity 0.3s;
        }
        .category-card:hover { transform: translateY(-4px); border-color: var(--cat-color, #8b5cf6); box-shadow: 0 16px 40px rgba(139,92,246,0.12); }
        .category-card:hover::before { opacity: 1; }
        .cat-icon {
            width: 52px; height: 52px; border-radius: 15px; display: grid; place-items: center;
            flex-shrink: 0; transition: transform 0.3s;
            background: var(--cat-bg, #f5f3ff); color: var(--cat-color, #8b5cf6);
        }
        .cat-icon svg { width: 26px; height: 26px; stroke: currentColor; stroke-width: 2; fill: none; stroke-linecap: round; stroke-linejoin: round; }
        .category-card:hover .cat-icon { transform: scale(1.1) rotate(-5deg); }
        .cat-name { font-size: 0.88rem; font-weight: 800; text-align: center; line-height: 1.3; }
        .cat-count {
            font-size: 0.7rem; font-weight: 700; color: var(--cat-color, #8b5cf6);
            background: var(--cat-bg, #f5f3ff); padding: 3px 10px; border-radius: 999px;
        }

        /* ---------- GRID KOMUNITAS & KEGIATAN ---------- */
        .content-grid-3 { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; }
        .content-grid-2 { display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 16px; }

        /* ============================================================
           RESPONSIVE — MOBILE SMOOTH
           ============================================================ */
        @media (max-width: 900px) {
            .hero-section { grid-template-columns: 1fr; gap: 40px; padding: 30px 20px 50px; text-align: center; }
            .hero-title { font-size: 2.4rem; }
            .hero-subtitle, .search-wrap { margin-left: auto; margin-right: auto; }
            .hero-cta, .hero-stats { justify-content: center; }
            .hero-visual { max-width: 400px; margin: 0 auto; width: 100%; }
            .hero-image-card { transform: rotate(0deg); }
            .sticker-aktif { width: 60px; height: 60px; top: -12px; right: -12px; }
            .sticker-creator { left: -10px; bottom: 16px; }
        }

        @media (max-width: 640px) {
            .hero-section { padding: 24px 16px 40px; gap: 32px; }
            .hero-badge { padding: 7px 14px; font-size: 0.7rem; margin-bottom: 18px; }
            .hero-title { font-size: 2rem; letter-spacing: -0.03em; margin-bottom: 14px; }
            .hero-subtitle { font-size: 0.88rem; margin-bottom: 22px; }
            
            .search-wrap { padding: 5px; border-radius: 14px; margin-bottom: 14px; gap: 4px; }
            .search-icon { width: 18px; height: 18px; padding-left: 10px; }
            .search-wrap input { padding: 10px 4px; font-size: 16px; }
            .search-btn { padding: 9px 14px; font-size: 0.76rem; border-radius: 10px; }

            .hero-cta { gap: 8px; margin-bottom: 24px; }
            .btn-hero-primary, .btn-hero-secondary { padding: 10px 16px; font-size: 0.78rem; }

            .hero-stats { gap: 16px; }
            .stat-num { font-size: 1.15rem; }
            .stat-label { font-size: 0.68rem; }

            .hero-image-card { padding: 12px; border-radius: 22px; }
            .hero-image-frame { aspect-ratio: 4 / 4.2; border-radius: 14px; }
            .sticker-aktif { width: 56px; height: 56px; font-size: 0.58rem; top: -10px; right: -10px; border-width: 2.5px; }
            .sticker-creator { padding: 8px 12px; left: -10px; bottom: 12px; gap: 8px; }

            .section-wrap { padding: 36px 16px; }
            .section-header { margin-bottom: 20px; }
            .section-title { font-size: 1.3rem; }
            .section-eyebrow { font-size: 0.66rem; }
            .link-view-all { font-size: 0.76rem; padding: 6px 12px; }

            .category-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
            .category-card { padding: 18px 12px; gap: 10px; border-radius: 16px; }
            .cat-icon { width: 44px; height: 44px; border-radius: 12px; }
            .cat-icon svg { width: 22px; height: 22px; }
            .cat-name { font-size: 0.78rem; }
            .cat-count { font-size: 0.64rem; padding: 2px 8px; }

            .content-grid-3, .content-grid-2 { grid-template-columns: 1fr; gap: 14px; }
        }
    </style>
</head>
<body>

    @include('partials.navbar', ['active' => 'home'])

    <div class="home-wrap">

        <!-- ================= HERO SECTION ================= -->
        <section class="hero-section">
            <div class="hero-text">
                <div class="hero-badge">
                    <span class="live-dot"></span>
                    <span>Komunitas Kreatif Pidie</span>
                </div>

                <h1 class="hero-title">
                    Temukan <span class="highlight">Vibes</span>-mu<br>
                    di Pidie yang kreatif
                </h1>

                <p class="hero-subtitle">
                    Gabung komunitas sesuai minat & hobi kamu. Dari seni, olahraga, sampai kuliner — semua ada di sini.
                </p>

                <div class="search-wrap">
                    <span class="search-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        </svg>
                    </span>
                    <input type="text" id="heroSearch" placeholder="Cari komunitas atau minat...">
                    <button class="search-btn" onclick="doHeroSearch()">
                        Cari
                    </button>
                </div>

                <div class="hero-cta">
                    <a href="{{ route('komunitas') }}" class="btn-hero-primary">
                        Jelajahi Komunitas
                    </a>
                    <a href="{{ route('daftar') }}" class="btn-hero-secondary">
                        Mulai Bergabung
                    </a>
                </div>

                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-num">{{ $stats['komunitas'] }}</span>
                        <span class="stat-label">Komunitas<br>Aktif</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-num">{{ $stats['anggota'] }}</span>
                        <span class="stat-label">Anggota<br>Terdaftar</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-num">{{ $stats['kegiatan'] }}</span>
                        <span class="stat-label">Kegiatan<br>Mendatang</span>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-image-card">
                    <div class="hero-image-frame">
                        <img src="https://i.pinimg.com/1200x/f5/a1/89/f5a1891b65f964a484e550a055817e17.jpg" alt="Komunitas Kreatif Pidie" loading="eager">
                    </div>
                    <div class="sticker-aktif">
                        <span style="font-size: 1.1rem;">⚡</span>
                        <span>AKTIF</span>
                    </div>
                    <div class="sticker-creator">
                        <span style="width:8px;height:8px;border-radius:50%;background:#10b981;box-shadow:0 0 0 3px rgba(16,185,129,0.25);flex-shrink:0;"></span>
                        <div style="font-size:0.72rem;font-weight:800;color:#0f172a;line-height:1.2;">
                            Kreator Pidie
                            <small style="display:block;font-size:0.6rem;color:#64748b;font-weight:600;margin-top:1px;">lagi aktif sekarang</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= KATEGORI ================= -->
        <section class="section-wrap">
            <div class="section-header">
                <div>
                    <div class="section-eyebrow">Bidang Minat</div>
                    <h2 class="section-title">Jelajahi Kategori</h2>
                </div>
                <a href="{{ route('komunitas') }}" class="link-view-all">Lihat semua →</a>
            </div>
            <div class="category-grid" id="categoryGrid"></div>
        </section>

        <!-- ================= KOMUNITAS TERBARU ================= -->
        <section class="section-wrap">
            <div class="section-header">
                <div>
                    <div class="section-eyebrow">Baru Bergabung</div>
                    <h2 class="section-title">Komunitas Terbaru</h2>
                </div>
                <a href="{{ route('komunitas') }}" class="link-view-all">Lihat semua →</a>
            </div>
            <div class="content-grid-3" id="latestCommunities"></div>
        </section>

        <!-- ================= KEGIATAN MENDATANG ================= -->
        <section class="section-wrap">
            <div class="section-header">
                <div>
                    <div class="section-eyebrow">Jangan Sampai Ketinggalan</div>
                    <h2 class="section-title">Kegiatan Mendatang</h2>
                </div>
                <a href="{{ route('kegiatan') }}" class="link-view-all">Lihat semua →</a>
            </div>
            <div class="content-grid-2" id="latestEvents"></div>
        </section>

    </div>

    <script>
        // Search
        function doHeroSearch() {
            const q = document.getElementById('heroSearch').value.trim();
            window.location.href = "{{ route('komunitas') }}" + (q ? '?q=' + encodeURIComponent(q) : '');
        }
        document.getElementById('heroSearch').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') doHeroSearch();
        });

        // Ikon SVG Kategori
        const catIcons = {
            seni: '<svg viewBox="0 0 24 24"><circle cx="13.5" cy="6.5" r=".5" fill="currentColor"/><circle cx="17.5" cy="10.5" r=".5" fill="currentColor"/><circle cx="8.5" cy="7.5" r=".5" fill="currentColor"/><circle cx="6.5" cy="12.5" r=".5" fill="currentColor"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/></svg>',
            olahraga: '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M4.93 4.93l4.24 4.24"/><path d="M14.83 14.83l4.24 4.24"/><path d="M14.83 9.17l4.24-4.24"/><path d="M4.93 19.07l4.24-4.24"/></svg>',
            pendidikan: '<svg viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>',
            alam: '<svg viewBox="0 0 24 24"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>',
            kuliner: '<svg viewBox="0 0 24 24"><path d="M6 2v6a2 2 0 0 0 2 2h0a2 2 0 0 0 2-2V2"/><path d="M6 8v14"/><path d="M18 2c-2 0-3 1.5-3 4v6h6V6c0-2.5-1-4-3-4z"/><path d="M18 12v10"/></svg>'
        };

        const categories = @json($categories);
        const categoryCounts = @json($categoryCounts);
        const categoryGrid = document.getElementById('categoryGrid');

        categories.forEach(cat => {
            const count = categoryCounts[cat.key] ?? 0;
            const a = document.createElement('a');
            a.className = 'category-card';
            a.href = "{{ route('komunitas') }}?filter=" + cat.key;
            a.style.setProperty('--cat-color', cat.color);
            a.style.setProperty('--cat-bg', cat.bg);
            a.innerHTML = `
                <div class="cat-icon">${catIcons[cat.key] || catIcons.seni}</div>
                <div class="cat-name">${cat.name}</div>
                <div class="cat-count">${count} komunitas</div>
            `;
            categoryGrid.appendChild(a);
        });

        // Komunitas Terbaru
        const latestCommunities = @json($latestCommunities);
        const latestGrid = document.getElementById('latestCommunities');
        if (latestCommunities.length === 0) {
            latestGrid.innerHTML = `
                <div style="grid-column:1/-1; text-align:center; padding:40px; background:#fff; border-radius:16px; border:2px dashed #ddd6fe;">
                    <h4 style="font-size:0.95rem;font-weight:800;color:#0f172a;margin-bottom:4px;">Belum ada komunitas</h4>
                    <p style="font-size:0.8rem;color:#94a3b8;">Jadilah yang pertama!</p>
                </div>`;
        } else {
            latestCommunities.forEach(comm => {
                const card = document.createElement('div');
                card.className = 'card';
                card.innerHTML = `
                    <div class="card-cover"><img src="${comm.cover}" alt="${comm.name}" loading="lazy"></div>
                    <div class="card-body">
                        <span class="card-tag">${comm.category}</span>
                        <h4>${comm.name}</h4>
                        <p class="card-meta">📍 Pidie · 👥 ${comm.members_count} anggota</p>
                        <a href="/komunitas/${comm.slug}" class="btn btn-primary btn-sm mt-1">Lihat detail</a>
                    </div>`;
                latestGrid.appendChild(card);
            });
        }

        // Kegiatan Mendatang
        const latestEvents = @json($latestEvents);
        const eventsGrid = document.getElementById('latestEvents');
        if (latestEvents.length === 0) {
            eventsGrid.innerHTML = `
                <div style="grid-column:1/-1; text-align:center; padding:40px; background:#fff; border-radius:16px; border:2px dashed #ddd6fe;">
                    <h4 style="font-size:0.95rem;font-weight:800;color:#0f172a;margin-bottom:4px;">Belum ada kegiatan</h4>
                    <p style="font-size:0.8rem;color:#94a3b8;">Kegiatan dari komunitas akan tampil di sini.</p>
                </div>`;
        } else {
            const months = ['JAN','FEB','MAR','APR','MEI','JUN','JUL','AGU','SEP','OKT','NOV','DES'];
            latestEvents.forEach(ev => {
                const d = new Date(ev.event_date);
                const day = String(d.getDate()).padStart(2, '0');
                const month = months[d.getMonth()];
                const timeStr = ev.event_time ? ` · ${ev.event_time.substring(0,5)} WIB` : '';
                
                const card = document.createElement('div');
                card.className = 'event-card';
                card.innerHTML = `
                    <div class="event-date"><strong>${day}</strong><span>${month}</span></div>
                    <div class="event-info">
                        <h4>${ev.title}</h4>
                        <p>📍 ${ev.location}${timeStr}</p>
                        <p class="text-soft" style="font-size:0.78rem;margin-top:4px;">${ev.community?.name ?? ''}</p>
                    </div>`;
                eventsGrid.appendChild(card);
            });
        }
    </script>

</body>
</html>