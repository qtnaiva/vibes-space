<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Kegiatan — Vibes Space Pidie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .ev-page { background: #fafaff; min-height: 100vh; padding: 28px 0 90px; position: relative; overflow-x: hidden; }
        .ev-page::before { content: ''; position: absolute; top: -120px; right: -120px; width: 380px; height: 380px; border-radius: 50%; background: radial-gradient(circle, rgba(139,92,246,0.10) 0%, transparent 70%); pointer-events: none; }
        .ev-container { max-width: 900px; margin: 0 auto; padding: 0 24px; position: relative; z-index: 1; }
        .ev-header { margin-bottom: 22px; }
        .ev-breadcrumb { display: inline-flex; align-items: center; gap: 8px; padding: 6px 14px; background: #fff; border: 1.5px solid #ede9fe; border-radius: 999px; font-size: 0.7rem; font-weight: 800; color: #6d28d9; letter-spacing: 0.04em; text-transform: uppercase; margin-bottom: 14px; box-shadow: 0 2px 8px rgba(139,92,246,0.06); }
        .ev-breadcrumb .dot { width: 6px; height: 6px; border-radius: 50%; background: #10b981; box-shadow: 0 0 0 3px rgba(16,185,129,0.2); }
        .ev-title { font-size: 1.85rem; font-weight: 900; letter-spacing: -0.035em; line-height: 1.15; color: #0f172a; margin-bottom: 8px; }
        .ev-title .accent { background: linear-gradient(135deg, #8b5cf6, #ec4899, #f97316); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; }
        .ev-subtitle { font-size: 0.88rem; color: #64748b; font-weight: 500; line-height: 1.6; max-width: 540px; }
        .ev-filters { display: flex; gap: 6px; margin-bottom: 18px; overflow-x: auto; scrollbar-width: none; padding: 2px; }
        .ev-filters::-webkit-scrollbar { display: none; }
        .ev-filter { padding: 8px 16px; background: #fff; border: 1.5px solid #e8eaf0; border-radius: 999px; font-family: inherit; font-size: 0.76rem; font-weight: 800; color: #64748b; cursor: pointer; white-space: nowrap; transition: all 0.22s; flex-shrink: 0; display: inline-flex; align-items: center; gap: 5px; }
        .ev-filter:hover { border-color: #ddd6fe; color: #6d28d9; background: #f5f3ff; }
        .ev-filter.active { background: linear-gradient(135deg, #8b5cf6, #ec4899); color: #fff; border-color: transparent; box-shadow: 0 4px 12px rgba(139,92,246,0.3); }
        .ev-filter .count { padding: 1px 6px; background: rgba(0,0,0,0.06); border-radius: 999px; font-size: 0.62rem; font-weight: 900; min-width: 16px; text-align: center; }
        .ev-filter.active .count { background: rgba(255,255,255,0.28); }
        .ev-list { display: flex; flex-direction: column; gap: 10px; }
        .ev-card { background: #fff; border: 1.5px solid #f0e9ff; border-radius: 14px; overflow: hidden; transition: all 0.22s cubic-bezier(0.4, 0, 0.2, 1); display: grid; grid-template-columns: 68px 1fr auto; align-items: stretch; position: relative; cursor: pointer; }
        .ev-card:hover { border-color: #ddd6fe; box-shadow: 0 6px 20px rgba(139,92,246,0.1); transform: translateY(-1px); }
        .ev-card:active { transform: translateY(0); }
        .ev-date { background: linear-gradient(135deg, #8b5cf6, #7c3aed); color: #fff; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 12px 6px; text-align: center; position: relative; overflow: hidden; }
        .ev-date::before { content: ''; position: absolute; top: -20px; right: -20px; width: 60px; height: 60px; border-radius: 50%; background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%); pointer-events: none; }
        .ev-date.pink { background: linear-gradient(135deg, #ec4899, #db2777); }
        .ev-date.orange { background: linear-gradient(135deg, #f97316, #ea580c); }
        .ev-date.blue { background: linear-gradient(135deg, #3b82f6, #2563eb); }
        .ev-date.green { background: linear-gradient(135deg, #10b981, #059669); }
        .ev-date.teal { background: linear-gradient(135deg, #14b8a6, #0d9488); }
        .ev-date strong { font-size: 1.5rem; font-weight: 900; line-height: 1; position: relative; z-index: 1; }
        .ev-date span { font-size: 0.58rem; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase; margin-top: 3px; position: relative; z-index: 1; }
        .ev-date small { font-size: 0.52rem; font-weight: 700; opacity: 0.85; margin-top: 1px; position: relative; z-index: 1; }
        .ev-body { padding: 12px 14px; display: flex; flex-direction: column; gap: 5px; justify-content: center; min-width: 0; }
        .ev-name { font-size: 0.9rem; font-weight: 900; color: #0f172a; letter-spacing: -0.01em; line-height: 1.3; margin: 0; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; }
        .ev-meta { display: flex; flex-wrap: wrap; gap: 10px; font-size: 0.68rem; color: #64748b; font-weight: 600; }
        .ev-meta-item { display: inline-flex; align-items: center; gap: 4px; white-space: nowrap; }
        .ev-meta-item svg { width: 11px; height: 11px; stroke: #94a3b8; stroke-width: 2; fill: none; flex-shrink: 0; }
        .ev-community { display: inline-flex; align-items: center; gap: 4px; padding: 2px 8px; background: #f5f3ff; color: #6d28d9; border-radius: 999px; font-size: 0.58rem; font-weight: 800; width: fit-content; }
        .ev-community-dot { width: 4px; height: 4px; border-radius: 50%; background: #8b5cf6; }
        .ev-action { display: flex; align-items: center; justify-content: center; padding: 12px 14px 12px 6px; flex-shrink: 0; }
        .ev-arrow { width: 30px; height: 30px; border-radius: 50%; background: #f5f3ff; color: #8b5cf6; display: grid; place-items: center; transition: all 0.2s; }
        .ev-arrow svg { width: 14px; height: 14px; stroke: currentColor; stroke-width: 2.5; fill: none; stroke-linecap: round; stroke-linejoin: round; }
        .ev-card:hover .ev-arrow { background: linear-gradient(135deg, #8b5cf6, #ec4899); color: #fff; transform: translateX(2px); }
        .ev-badge-mini { display: inline-flex; align-items: center; gap: 3px; padding: 2px 7px; border-radius: 999px; font-size: 0.56rem; font-weight: 800; white-space: nowrap; }
        .ev-badge-mini.registered { background: #ecfdf5; color: #047857; }
        .ev-empty { text-align: center; padding: 60px 24px; background: #fff; border-radius: 20px; border: 2px dashed #ddd6fe; }
        .ev-empty-icon { font-size: 3rem; margin-bottom: 14px; display: inline-block; opacity: 0.5; }
        .ev-empty h3 { font-size: 1rem; font-weight: 900; color: #0f172a; margin-bottom: 6px; }
        .ev-empty p { font-size: 0.82rem; color: #94a3b8; font-weight: 500; max-width: 340px; margin: 0 auto; line-height: 1.6; }
        .ev-modal-overlay { position: fixed; inset: 0; background: rgba(15,23,42,0.72); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 1000; display: none; align-items: center; justify-content: center; padding: 20px; opacity: 0; transition: opacity 0.25s; }
        .ev-modal-overlay.show { display: flex; opacity: 1; }
        .ev-modal { background: #fff; border-radius: 24px; width: 100%; max-width: 560px; max-height: calc(100vh - 40px); max-height: calc(100dvh - 40px); display: flex; flex-direction: column; overflow: hidden; box-shadow: 0 32px 80px rgba(15,23,42,0.35); animation: slideUpModal 0.35s cubic-bezier(0.16, 1, 0.3, 1); position: relative; }
        @keyframes slideUpModal { from { transform: translateY(40px) scale(0.96); opacity: 0; } to { transform: translateY(0) scale(1); opacity: 1; } }
        .ev-modal-head { position: relative; background: linear-gradient(135deg, #7c3aed 0%, #8b5cf6 50%, #ec4899 100%); padding: 22px 24px; color: #fff; flex-shrink: 0; overflow: hidden; }
        .ev-modal-head::before { content: ''; position: absolute; top: -40px; right: -40px; width: 140px; height: 140px; border-radius: 50%; background: radial-gradient(circle, rgba(255,255,255,0.18) 0%, transparent 70%); pointer-events: none; }
        .ev-modal-head.pink { background: linear-gradient(135deg, #ec4899, #db2777); }
        .ev-modal-head.orange { background: linear-gradient(135deg, #f97316, #ea580c); }
        .ev-modal-head.blue { background: linear-gradient(135deg, #3b82f6, #2563eb); }
        .ev-modal-head.green { background: linear-gradient(135deg, #10b981, #059669); }
        .ev-modal-head.teal { background: linear-gradient(135deg, #14b8a6, #0d9488); }
        .ev-modal-close { position: absolute; top: 14px; right: 14px; width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.25); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); color: #fff; border: 1.5px solid rgba(255,255,255,0.4); cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.22s; z-index: 10; line-height: 1; padding: 0; box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
        .ev-modal-close:hover { background: rgba(239,68,68,0.95); border-color: rgba(239,68,68,1); transform: rotate(90deg) scale(1.05); box-shadow: 0 6px 16px rgba(239,68,68,0.4); }
        .ev-modal-close:active { transform: rotate(90deg) scale(0.95); }
        .ev-modal-close svg { width: 18px; height: 18px; stroke: currentColor; stroke-width: 2.5; fill: none; stroke-linecap: round; stroke-linejoin: round; pointer-events: none; }
        .ev-modal-date-block { display: flex; align-items: center; gap: 14px; position: relative; z-index: 2; margin-bottom: 12px; padding-right: 50px; }
        .ev-modal-date-badge { width: 56px; height: 56px; border-radius: 14px; background: rgba(255,255,255,0.22); backdrop-filter: blur(10px); border: 1.5px solid rgba(255,255,255,0.35); display: flex; flex-direction: column; align-items: center; justify-content: center; line-height: 1; flex-shrink: 0; }
        .ev-modal-date-badge strong { font-size: 1.4rem; font-weight: 900; }
        .ev-modal-date-badge span { font-size: 0.55rem; font-weight: 800; letter-spacing: 0.05em; margin-top: 2px; }
        .ev-modal-date-info { flex: 1; min-width: 0; }
        .ev-modal-date-info .day-name { font-size: 0.72rem; font-weight: 700; opacity: 0.9; margin-bottom: 2px; }
        .ev-modal-date-info .full-date { font-size: 0.92rem; font-weight: 900; letter-spacing: -0.01em; }
        .ev-modal-title { font-size: 1.25rem; font-weight: 900; letter-spacing: -0.02em; line-height: 1.25; position: relative; z-index: 2; text-shadow: 0 2px 8px rgba(0,0,0,0.15); word-break: break-word; }
        .ev-modal-body { padding: 20px 24px; overflow-y: auto; flex: 1; -webkit-overflow-scrolling: touch; min-height: 0; }
        .ev-modal-body::-webkit-scrollbar { width: 6px; }
        .ev-modal-body::-webkit-scrollbar-thumb { background: #ddd6fe; border-radius: 3px; }
        .ev-modal-section { margin-bottom: 18px; }
        .ev-modal-section:last-child { margin-bottom: 0; }
        .ev-modal-section-title { font-size: 0.7rem; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 8px; display: flex; align-items: center; gap: 6px; }
        .ev-modal-desc { font-size: 0.86rem; color: #334155; line-height: 1.7; white-space: pre-line; background: #fafbff; padding: 12px 14px; border-radius: 11px; border: 1px solid #f1f5f9; word-break: break-word; }
        .ev-modal-info-list { display: flex; flex-direction: column; gap: 2px; }
        .ev-modal-info-row { display: flex; align-items: flex-start; gap: 10px; padding: 9px 0; border-bottom: 1px dashed #f1f5f9; font-size: 0.82rem; }
        .ev-modal-info-row:last-child { border-bottom: none; }
        .ev-modal-info-icon { width: 28px; height: 28px; border-radius: 8px; background: #f5f3ff; display: grid; place-items: center; flex-shrink: 0; font-size: 0.8rem; }
        .ev-modal-info-content { flex: 1; min-width: 0; }
        .ev-modal-info-label { font-size: 0.62rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 1px; }
        .ev-modal-info-value { font-size: 0.82rem; font-weight: 800; color: #0f172a; word-break: break-word; line-height: 1.4; }
        .ev-maps-btn-modal { display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; background: #eff6ff; color: #2563eb; border: 1.5px solid #bfdbfe; border-radius: 9px; font-size: 0.76rem; font-weight: 800; text-decoration: none; transition: all 0.2s; margin-top: 4px; }
        .ev-maps-btn-modal:hover { background: #3b82f6; color: #fff; border-color: #3b82f6; }
        .ev-modal-footer { padding: 14px 24px; padding-bottom: max(14px, env(safe-area-inset-bottom)); border-top: 1px solid #f1f5f9; background: #fafbff; flex-shrink: 0; display: flex; gap: 8px; flex-wrap: wrap; }
        .ev-modal-footer .ev-btn-modal { flex: 1; padding: 11px 16px; border: none; border-radius: 10px; font-family: inherit; font-size: 0.82rem; font-weight: 800; cursor: pointer; transition: all 0.2s; display: inline-flex; align-items: center; justify-content: center; gap: 6px; text-decoration: none; line-height: 1.3; }
        .ev-modal-footer .ev-btn-modal svg { width: 14px; height: 14px; stroke: currentColor; stroke-width: 2.5; fill: none; stroke-linecap: round; stroke-linejoin: round; }
        .ev-btn-modal.primary { background: linear-gradient(135deg, #8b5cf6, #ec4899); color: #fff; box-shadow: 0 4px 14px rgba(139,92,246,0.35); }
        .ev-btn-modal.primary:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(139,92,246,0.5); }
        .ev-btn-modal.danger { background: #fef2f2; color: #dc2626; border: 1.5px solid #fecaca; }
        .ev-btn-modal.danger:hover { background: #fee2e2; border-color: #dc2626; }
        .ev-btn-modal.disabled { background: #f1f5f9; color: #94a3b8; border: 1.5px solid #e2e8f0; cursor: not-allowed; opacity: 0.7; }
        .ev-btn-modal.disabled:hover { transform: none; box-shadow: none; }
        @media (max-width: 768px) {
            .ev-page { padding: 18px 0 60px; }
            .ev-container { padding: 0 14px; }
            .ev-title { font-size: 1.45rem; }
            .ev-subtitle { font-size: 0.82rem; }
            .ev-filters { gap: 5px; margin-bottom: 14px; }
            .ev-filter { padding: 7px 12px; font-size: 0.7rem; }
            .ev-filter .count { font-size: 0.56rem; padding: 1px 5px; min-width: 14px; }
            .ev-card { grid-template-columns: 60px 1fr auto; border-radius: 12px; }
            .ev-date { padding: 10px 5px; }
            .ev-date strong { font-size: 1.35rem; }
            .ev-date span { font-size: 0.52rem; }
            .ev-date small { font-size: 0.48rem; }
            .ev-body { padding: 10px 12px; gap: 4px; }
            .ev-name { font-size: 0.84rem; }
            .ev-meta { font-size: 0.64rem; gap: 8px; }
            .ev-community { font-size: 0.56rem; padding: 2px 7px; }
            .ev-action { padding: 10px 12px 10px 0; }
            .ev-arrow { width: 26px; height: 26px; }
            .ev-arrow svg { width: 12px; height: 12px; }
            .ev-empty { padding: 44px 18px; border-radius: 16px; }
            .ev-empty-icon { font-size: 2.5rem; margin-bottom: 10px; }
            .ev-empty h3 { font-size: 0.92rem; }
            .ev-empty p { font-size: 0.76rem; }
            .ev-modal-overlay { padding: 0; align-items: flex-end; }
            .ev-modal { max-width: 100%; border-radius: 22px 22px 0 0; max-height: 94vh; max-height: 94dvh; }
            .ev-modal-head { padding: 18px 20px; }
            .ev-modal-title { font-size: 1.1rem; }
            .ev-modal-date-block { padding-right: 48px; }
            .ev-modal-close { width: 36px; height: 36px; top: 12px; right: 12px; }
            .ev-modal-close svg { width: 16px; height: 16px; }
            .ev-modal-body { padding: 18px 20px; }
            .ev-modal-desc { font-size: 0.82rem; padding: 10px 12px; }
            .ev-modal-info-row { font-size: 0.78rem; padding: 8px 0; }
            .ev-modal-footer { padding: 12px 20px; padding-bottom: max(12px, env(safe-area-inset-bottom)); gap: 6px; }
            .ev-modal-footer .ev-btn-modal { padding: 10px 14px; font-size: 0.78rem; min-height: 44px; }
        }
    </style>
</head>
<body>

    @include('partials.navbar', ['active' => 'kegiatan'])

    <main class="ev-page">
        <div class="ev-container">
            <div class="ev-header">
                <div class="ev-breadcrumb">
                    <span class="dot"></span>
                    <span>Kegiatan Komunitas Pidie</span>
                </div>
                <h1 class="ev-title">Kegiatan <span class="accent">Mendatang</span></h1>
                <p class="ev-subtitle">Klik kegiatan untuk melihat detail lengkap dan mendaftar.</p>
            </div>

            @if(session('success'))
                <div style="background:#ecfdf5;color:#065f46;padding:12px 16px;border-radius:12px;font-size:0.85rem;margin-bottom:16px;border:1.5px solid #a7f3d0;">✅ {{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div style="background:#fef2f2;color:#991b1b;padding:12px 16px;border-radius:12px;font-size:0.85rem;margin-bottom:16px;border:1.5px solid #fecaca;">❌ {{ session('error') }}</div>
            @endif

            <div class="ev-filters" id="filterTags">
                <button class="ev-filter active" data-filter="all">Semua <span class="count" id="countAll">0</span></button>
                <button class="ev-filter" data-filter="upcoming">Akan Datang <span class="count" id="countUpcoming">0</span></button>
                <button class="ev-filter" data-filter="registered">Terdaftar <span class="count" id="countRegistered">0</span></button>
            </div>

            <div class="ev-list" id="eventList"></div>

            <div class="ev-empty" id="emptyFilter" style="display:none;">
                <div class="ev-empty-icon">📅</div>
                <h3>Belum ada kegiatan</h3>
                <p>Pantau terus untuk kegiatan selanjutnya dari komunitas.</p>
            </div>
        </div>
    </main>

    <div class="ev-modal-overlay" id="evDetailModal">
        <div class="ev-modal" id="evModalBox">
            <div class="ev-modal-head" id="modalHead">
                <button type="button" class="ev-modal-close" id="btnCloseModal" aria-label="Tutup">
                    <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
                <div class="ev-modal-date-block">
                    <div class="ev-modal-date-badge">
                        <strong id="modalDateDay">—</strong>
                        <span id="modalDateMonth">—</span>
                    </div>
                    <div class="ev-modal-date-info">
                        <div class="day-name" id="modalDayName">—</div>
                        <div class="full-date" id="modalFullDate">—</div>
                    </div>
                </div>
                <h2 class="ev-modal-title" id="modalTitle">—</h2>
            </div>

            <div class="ev-modal-body">
                <div class="ev-modal-section">
                    <div class="ev-modal-info-list">
                        <div class="ev-modal-info-row">
                            <div class="ev-modal-info-icon">📍</div>
                            <div class="ev-modal-info-content">
                                <div class="ev-modal-info-label">Lokasi</div>
                                <div class="ev-modal-info-value" id="modalLocation">—</div>
                            </div>
                        </div>
                        <div class="ev-modal-info-row">
                            <div class="ev-modal-info-icon">⏰</div>
                            <div class="ev-modal-info-content">
                                <div class="ev-modal-info-label">Waktu</div>
                                <div class="ev-modal-info-value" id="modalTime">—</div>
                            </div>
                        </div>
                        <div class="ev-modal-info-row" id="modalCommunityRow">
                            <div class="ev-modal-info-icon">🏘️</div>
                            <div class="ev-modal-info-content">
                                <div class="ev-modal-info-label">Komunitas</div>
                                <div class="ev-modal-info-value" id="modalCommunity">—</div>
                            </div>
                        </div>
                        <div class="ev-modal-info-row" id="modalAddressRow">
                            <div class="ev-modal-info-icon">🗺️</div>
                            <div class="ev-modal-info-content">
                                <div class="ev-modal-info-label">Alamat Lengkap</div>
                                <div class="ev-modal-info-value" id="modalAddress">—</div>
                            </div>
                        </div>
                    </div>
                    <div id="modalMapsWrap" style="display:none; margin-top:8px;">
                        <a href="#" id="modalMapsLink" target="_blank" rel="noopener" class="ev-maps-btn-modal">🗺️ Buka di Google Maps</a>
                    </div>
                </div>

                <div class="ev-modal-section" id="modalDescSection">
                    <div class="ev-modal-section-title">📝 Deskripsi Kegiatan</div>
                    <div class="ev-modal-desc" id="modalDesc">—</div>
                </div>
            </div>

            <div class="ev-modal-footer" id="modalFooter"></div>
        </div>
    </div>

    <script>
        const events = @json($events);
        const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
        const csrfToken = "{{ csrf_token() }}";

        const eventList = document.getElementById('eventList');
        const emptyFilter = document.getElementById('emptyFilter');
        const dateColors = ['', 'pink', 'orange', 'blue', 'green', 'teal'];
        let currentFilter = 'all';
        let currentEvent = null;

        const monthNamesFull = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        const dayNames = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

        function escapeHtml(str) {
            if (str == null) return '';
            return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#39;');
        }

        const now = new Date();
        const upcomingEvents = events.filter(e => new Date(e.event_date) >= now);
        const registeredCount = events.filter(e => e.is_registered === true).length;
        document.getElementById('countAll').textContent = events.length;
        document.getElementById('countUpcoming').textContent = upcomingEvents.length;
        document.getElementById('countRegistered').textContent = registeredCount;

        function renderEvents(filter) {
            eventList.innerHTML = '';
            let filtered = events;
            if (filter === 'upcoming') filtered = events.filter(e => new Date(e.event_date) >= now);
            else if (filter === 'registered') filtered = events.filter(e => e.is_registered === true);

            if (filtered.length === 0) {
                emptyFilter.style.display = 'block';
                const h3 = emptyFilter.querySelector('h3');
                const p = emptyFilter.querySelector('p');
                if (filter === 'registered') { h3.textContent = 'Belum ada kegiatan terdaftar'; p.textContent = 'Daftar kegiatan yang kamu ikuti akan tampil di sini.'; }
                else if (filter === 'upcoming') { h3.textContent = 'Belum ada kegiatan mendatang'; p.textContent = 'Pantau terus untuk kegiatan selanjutnya.'; }
                else { h3.textContent = 'Belum ada kegiatan'; p.textContent = 'Kegiatan dari komunitas akan tampil di sini.'; }
                return;
            }
            emptyFilter.style.display = 'none';

            const months = ['JAN','FEB','MAR','APR','MEI','JUN','JUL','AGU','SEP','OKT','NOV','DES'];
            filtered.forEach((ev, idx) => {
                const d = new Date(ev.event_date);
                const day = String(d.getDate()).padStart(2, '0');
                const month = months[d.getMonth()];
                const year = d.getFullYear();
                const colorClass = dateColors[idx % dateColors.length];

                const card = document.createElement('div');
                card.className = 'ev-card';
                card.onclick = () => openDetailModal(ev.id, colorClass);

                card.innerHTML = `
                    <div class="ev-date ${colorClass}">
                        <strong>${day}</strong>
                        <span>${month}</span>
                        <small>${year}</small>
                    </div>
                    <div class="ev-body">
                        <h3 class="ev-name">${escapeHtml(ev.title)}</h3>
                        <div class="ev-meta">
                            <span class="ev-meta-item">
                                <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                ${escapeHtml(ev.location)}
                            </span>
                            <span class="ev-meta-item">
                                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                ${ev.event_time ? ev.event_time.substring(0,5) : 'All day'}
                            </span>
                        </div>
                        ${ev.community ? `
                            <div style="display:flex; gap:6px; flex-wrap:wrap; align-items:center;">
                                <span class="ev-community"><span class="ev-community-dot"></span>${escapeHtml(ev.community.name)}</span>
                                ${ev.is_registered ? `<span class="ev-badge-mini registered">✓ Terdaftar</span>` : ''}
                            </div>
                        ` : (ev.is_registered ? `<span class="ev-badge-mini registered" style="width:fit-content;">✓ Terdaftar</span>` : '')}
                    </div>
                    <div class="ev-action">
                        <div class="ev-arrow">
                            <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </div>
                    </div>
                `;
                eventList.appendChild(card);
            });
        }

        function openDetailModal(eventId, colorClass) {
            const ev = events.find(e => String(e.id) === String(eventId));
            if (!ev) return;
            currentEvent = ev;

            const d = new Date(ev.event_date);
            const months = ['JAN','FEB','MAR','APR','MEI','JUN','JUL','AGU','SEP','OKT','NOV','DES'];

            document.getElementById('modalHead').className = 'ev-modal-head ' + (colorClass || '');
            document.getElementById('modalDateDay').textContent = String(d.getDate()).padStart(2, '0');
            document.getElementById('modalDateMonth').textContent = months[d.getMonth()];
            document.getElementById('modalDayName').textContent = dayNames[d.getDay()];
            document.getElementById('modalFullDate').textContent = `${d.getDate()} ${monthNamesFull[d.getMonth()]} ${d.getFullYear()}`;
            document.getElementById('modalTitle').textContent = ev.title;
            document.getElementById('modalLocation').textContent = ev.location || '—';
            document.getElementById('modalTime').textContent = ev.event_time ? ev.event_time.substring(0,5) + ' WIB' : 'Sepanjang hari';

            if (ev.community) {
                document.getElementById('modalCommunityRow').style.display = 'flex';
                document.getElementById('modalCommunity').textContent = ev.community.name || '—';
            } else {
                document.getElementById('modalCommunityRow').style.display = 'none';
            }

            if (ev.address) {
                document.getElementById('modalAddressRow').style.display = 'flex';
                document.getElementById('modalAddress').textContent = ev.address;
            } else {
                document.getElementById('modalAddressRow').style.display = 'none';
            }

            if (ev.maps_url) {
                document.getElementById('modalMapsWrap').style.display = 'block';
                document.getElementById('modalMapsLink').href = ev.maps_url;
            } else {
                document.getElementById('modalMapsWrap').style.display = 'none';
            }

            if (ev.description && ev.description.trim()) {
                document.getElementById('modalDescSection').style.display = 'block';
                document.getElementById('modalDesc').textContent = ev.description;
            } else {
                document.getElementById('modalDescSection').style.display = 'none';
            }

            renderModalFooter(ev);
            document.getElementById('evDetailModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        // ============================================================
        // FOOTER MODAL — TOMBOL IKUT / BATALKAN
        // ============================================================
        function renderModalFooter(ev) {
            const footer = document.getElementById('modalFooter');
            const isMember = ev.is_member === true;
            const isRegistered = ev.is_registered === true;

            let html = '';

            if (!isLoggedIn) {
                html = `<a href="{{ route('login') }}" class="ev-btn-modal primary">
                    <svg viewBox="0 0 24 24"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                    Masuk untuk Ikut
                </a>`;
            } else if (isRegistered) {
                // SUDAH TERDAFTAR: Tampilkan tombol "Batalkan"
                html = `<form action="/events/${ev.id}/unregister" method="POST" onsubmit="return confirm('Batalkan pendaftaran kegiatan ini?')" style="flex:1;display:flex;">
                    <input type="hidden" name="_token" value="${csrfToken}">
                    <button type="submit" class="ev-btn-modal danger" style="width:100%;">
                        <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Batalkan
                    </button>
                </form>`;
            } else if (!isMember) {
                // BELUM JOIN KOMUNITAS: Tombol disabled "Gabung Dulu"
                html = `
                    <button type="button" class="ev-btn-modal disabled" disabled title="Kamu harus bergabung dengan komunitas dulu">
                        <svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
                        Gabung Dulu
                    </button>
                `;
            } else {
                // SUDAH JOIN, BELUM DAFTAR: Tombol "Ikut"
                html = `
                    <button type="button" onclick="simulateRegister(${ev.id})" class="ev-btn-modal primary" style="width:100%;">
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                        Ikut
                    </button>
                `;
            }

            footer.innerHTML = html;
        }

        // ============================================================
        // SIMULASI UI: Mengubah tombol Ikut menjadi Batalkan seketika
        // ============================================================
        function simulateRegister(eventId) {
            const ev = events.find(e => e.id == eventId);
            if (ev) ev.is_registered = true;
            renderModalFooter(ev);
        }

        function closeDetailModal() {
            document.getElementById('evDetailModal').classList.remove('show');
            document.body.style.overflow = '';
            currentEvent = null;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const overlay = document.getElementById('evDetailModal');
            const modalBox = document.getElementById('evModalBox');
            const btnClose = document.getElementById('btnCloseModal');

            btnClose.addEventListener('click', function(e) { e.stopPropagation(); e.preventDefault(); closeDetailModal(); });
            modalBox.addEventListener('click', function(e) { e.stopPropagation(); });
            overlay.addEventListener('click', function(e) { if (e.target === overlay) closeDetailModal(); });

            document.querySelectorAll('#filterTags .ev-filter').forEach(btn => {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('#filterTags .ev-filter').forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    currentFilter = this.getAttribute('data-filter');
                    renderEvents(currentFilter);
                });
            });

            document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeDetailModal(); });
        });

        renderEvents('all');

        // ============================================================
        // AUTO OPEN MODAL DARI URL (?open=ID)
        // ============================================================
        const urlParams = new URLSearchParams(window.location.search);
        const openEventId = urlParams.get('open');
        
        if (openEventId) {
            const evIndex = events.findIndex(e => String(e.id) === String(openEventId));
            const colorClass = evIndex !== -1 ? dateColors[evIndex % dateColors.length] : '';
            
            openDetailModal(openEventId, colorClass);
            
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    </script>

</body>
</html>