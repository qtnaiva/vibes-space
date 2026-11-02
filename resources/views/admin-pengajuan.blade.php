<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pengajuan — Admin Vibes Space Pidie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-sidebar.css') }}">
    <style>
        /* ============================================================
           PENGAJUAN ADMIN — PREMIUM
           ============================================================ */

        /* Hero */
        .pj-hero {
            position: relative;
            background: linear-gradient(135deg, #7c3aed 0%, #8b5cf6 40%, #ec4899 100%);
            border-radius: 20px;
            padding: 22px 24px;
            margin-bottom: 18px;
            overflow: hidden;
            color: #fff;
            box-shadow: 0 16px 40px rgba(124, 58, 237, 0.22);
        }
        .pj-hero::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 200px; height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.18) 0%, transparent 70%);
            pointer-events: none;
        }
        .pj-hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }
        .pj-hero-title {
            font-size: 1.35rem;
            font-weight: 900;
            letter-spacing: -0.025em;
            line-height: 1.2;
            margin-bottom: 4px;
        }
        .pj-hero-sub {
            font-size: 0.82rem;
            color: rgba(255,255,255,0.88);
            font-weight: 500;
            line-height: 1.5;
            max-width: 420px;
        }
        .pj-hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            background: rgba(255,255,255,0.18);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 999px;
            font-size: 0.76rem;
            font-weight: 800;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .pj-hero-badge .badge-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #fbbf24;
            box-shadow: 0 0 0 3px rgba(251,191,36,0.3);
            animation: pjPulse 2s infinite;
            flex-shrink: 0;
        }
        @keyframes pjPulse {
            0%, 100% { box-shadow: 0 0 0 3px rgba(251,191,36,0.3); }
            50% { box-shadow: 0 0 0 6px rgba(251,191,36,0.05); }
        }

        /* Tabs */
        .pj-tabs {
            display: flex;
            gap: 4px;
            margin-bottom: 18px;
            padding: 5px;
            background: #fff;
            border-radius: 14px;
            border: 1px solid #e8eaf0;
            overflow-x: auto;
            scrollbar-width: none;
            -webkit-overflow-scrolling: touch;
        }
        .pj-tabs::-webkit-scrollbar { display: none; }
        .pj-tab {
            padding: 10px 14px;
            border: none;
            background: transparent;
            font-family: inherit;
            font-weight: 800;
            font-size: 0.8rem;
            color: #64748b;
            border-radius: 10px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            white-space: nowrap;
            transition: all 0.25s;
            flex: 1;
            min-width: 0;
        }
        .pj-tab svg {
            width: 14px; height: 14px;
            stroke: currentColor;
            stroke-width: 2.5;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }
        .pj-tab:hover { background: #f5f3ff; color: #6d28d9; }
        .pj-tab.active {
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff;
            box-shadow: 0 6px 16px rgba(139,92,246,0.3);
        }
        .pj-tab-count {
            background: rgba(0,0,0,0.08);
            color: inherit;
            padding: 2px 7px;
            border-radius: 999px;
            font-size: 0.65rem;
            font-weight: 900;
            min-width: 18px;
            text-align: center;
        }
        .pj-tab.active .pj-tab-count {
            background: rgba(255,255,255,0.28);
        }

        /* List */
        .pj-list { display: flex; flex-direction: column; gap: 14px; }

        /* Card */
        .pj-card {
            background: #fff;
            border: 1px solid #e8eaf0;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.25s cubic-bezier(0.4,0,0.2,1);
            display: grid;
            grid-template-columns: 200px 1fr;
        }
        .pj-card:hover {
            border-color: #ddd6fe;
            box-shadow: 0 8px 24px rgba(139,92,246,0.1);
        }
        .pj-cover {
    position: relative;
    background: linear-gradient(135deg, #ede9fe, #fce7f3);
    overflow: hidden;
    aspect-ratio: 16 / 10;
    display: flex;
    align-items: center;
    justify-content: center;
}
.pj-cover img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: center;
    display: block;
    transition: transform 0.4s;
}
        .pj-card:hover .pj-cover img { transform: scale(1.04); }
        .pj-cover-fallback {
            width: 100%; height: 100%;
            display: flex; align-items: center; justify-content: center;
            color: #a78bfa;
            font-size: 2.2rem;
            font-weight: 900;
        }

        .pj-body {
            padding: 16px 18px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 0;
        }

        .pj-top-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 8px;
            flex-wrap: wrap;
        }
        .pj-category {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            background: #f3e8ff;
            color: #6d28d9;
            border-radius: 999px;
            font-size: 0.65rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .pj-status {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: 999px;
            font-size: 0.68rem;
            font-weight: 800;
            white-space: nowrap;
        }
        .pj-status.pending { background: #fef3c7; color: #b45309; }
        .pj-status.approved { background: #d1fae5; color: #047857; }
        .pj-status.rejected { background: #fee2e2; color: #b91c1c; }
        .pj-status svg {
            width: 11px; height: 11px;
            stroke: currentColor;
            stroke-width: 2.5;
            fill: none;
        }

        .pj-title {
            font-size: 1.02rem;
            font-weight: 900;
            color: #0f172a;
            letter-spacing: -0.015em;
            line-height: 1.3;
            margin: 0;
        }
        .pj-desc {
            font-size: 0.82rem;
            color: #64748b;
            line-height: 1.5;
            margin: 0;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .pj-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .pj-meta-item {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 0.72rem;
            color: #64748b;
            font-weight: 600;
        }
        .pj-meta-item svg {
            width: 12px; height: 12px;
            stroke: #94a3b8;
            stroke-width: 2;
            fill: none;
            flex-shrink: 0;
        }

        .pj-actions {
            display: flex;
            gap: 6px;
            margin-top: 4px;
            flex-wrap: wrap;
        }
        .pj-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 8px 14px;
            border: none;
            border-radius: 9px;
            font-family: inherit;
            font-size: 0.76rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.2s;
        }
        .pj-btn svg {
            width: 12px; height: 12px;
            stroke: currentColor;
            stroke-width: 2.5;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .pj-btn.approve {
            background: linear-gradient(135deg, #10b981, #22c55e);
            color: #fff;
            box-shadow: 0 3px 10px rgba(16,185,129,0.3);
        }
        .pj-btn.reject {
            background: #fef2f2;
            color: #dc2626;
            border: 1.5px solid #fecaca;
        }
        .pj-btn.detail {
            background: #fff;
            color: #6d28d9;
            border: 1.5px solid #ddd6fe;
        }
        .pj-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none !important;
        }

        .pj-reject-reason {
            margin-top: 2px;
            padding: 6px 10px;
            background: #fef2f2;
            border-left: 3px solid #dc2626;
            border-radius: 5px;
            font-size: 0.72rem;
            color: #991b1b;
            font-weight: 600;
            line-height: 1.45;
        }

        /* Empty */
        .pj-empty {
            text-align: center;
            padding: 60px 20px;
            background: #fff;
            border-radius: 20px;
            border: 2px dashed #ddd6fe;
        }
        .pj-empty svg {
            width: 52px; height: 52px;
            stroke: #cbd5e1;
            stroke-width: 1.5;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            margin-bottom: 12px;
        }
        .pj-empty h3 {
            font-size: 1rem;
            font-weight: 900;
            color: #0f172a;
            margin-bottom: 4px;
        }
        .pj-empty p {
            font-size: 0.82rem;
            color: #94a3b8;
            font-weight: 500;
        }

        /* ============================================================
           MODAL DETAIL — PREMIUM
           ============================================================ */
        .pj-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15,23,42,0.65);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            transition: opacity 0.25s;
        }
        .pj-modal-overlay.show {
            display: flex;
            opacity: 1;
        }
        .pj-modal {
            background: #fff;
            border-radius: 22px;
            width: 100%;
            max-width: 640px;
            max-height: 92vh;
            display: flex;
            flex-direction: column;
            box-shadow: 0 30px 80px rgba(0,0,0,0.35);
            animation: pjModalSlide 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
        }
        @keyframes pjModalSlide {
            from { opacity: 0; transform: translateY(30px) scale(0.96); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* Cover header */
        .pj-modal-cover {
            position: relative;
            width: 100%;
            aspect-ratio: 21 / 9;
            background: linear-gradient(135deg, #7c3aed, #ec4899);
            overflow: hidden;
            flex-shrink: 0;
        }
        .pj-modal-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        .pj-modal-cover-empty {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            color: rgba(255,255,255,0.8);
        }
        .pj-modal-cover-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 30%, rgba(15,23,42,0.85) 100%);
            pointer-events: none;
        }
        .pj-modal-cover-badges {
            position: absolute;
            top: 16px;
            left: 16px;
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            z-index: 2;
        }
        .pj-modal-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 0.68rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.25);
        }
        .pj-modal-badge.cat {
            background: rgba(255,255,255,0.95);
            color: #6d28d9;
            backdrop-filter: blur(12px);
        }
        .pj-modal-badge.pending { background: linear-gradient(135deg, #f59e0b, #f97316); }
        .pj-modal-badge.approved { background: linear-gradient(135deg, #10b981, #22c55e); }
        .pj-modal-badge.rejected { background: linear-gradient(135deg, #ef4444, #dc2626); }

        .pj-modal-close {
            position: absolute;
            top: 14px;
            right: 14px;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(12px);
            color: #475569;
            border: none;
            font-size: 1.3rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.22s;
            z-index: 3;
            line-height: 1;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .pj-modal-close:hover {
            background: #fee2e2;
            color: #dc2626;
            transform: rotate(90deg);
        }

        /* Title in cover */
        .pj-modal-title-block {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px 24px 18px;
            color: #fff;
            z-index: 2;
        }
        .pj-modal-title {
            font-size: 1.5rem;
            font-weight: 900;
            letter-spacing: -0.025em;
            line-height: 1.2;
            margin-bottom: 4px;
            text-shadow: 0 2px 8px rgba(0,0,0,0.4);
        }
        .pj-modal-meta-line {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            font-size: 0.75rem;
            color: rgba(255,255,255,0.9);
            font-weight: 600;
        }
        .pj-modal-meta-line span {
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        /* Body */
        .pj-modal-body {
            padding: 22px 24px;
            overflow-y: auto;
            flex: 1;
        }
        .pj-modal-section {
            margin-bottom: 20px;
        }
        .pj-modal-section:last-child { margin-bottom: 0; }
        .pj-modal-section-title {
            font-size: 0.78rem;
            font-weight: 800;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .pj-modal-desc {
            font-size: 0.88rem;
            color: #334155;
            line-height: 1.7;
            background: #fafbff;
            padding: 14px 16px;
            border-radius: 12px;
            border: 1px solid #f1f5f9;
        }
        .pj-modal-meta-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        .pj-modal-meta-item {
            padding: 12px 14px;
            background: #fafbff;
            border: 1px solid #f1f5f9;
            border-radius: 11px;
            display: flex;
            flex-direction: column;
            gap: 3px;
            min-width: 0;
        }
        .pj-modal-meta-item .label {
            font-size: 0.65rem;
            font-weight: 800;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }
        .pj-modal-meta-item .value {
            font-size: 0.82rem;
            font-weight: 800;
            color: #0f172a;
            word-break: break-word;
            line-height: 1.4;
        }

        /* Footer action */
        .pj-modal-footer {
            display: flex;
            gap: 8px;
            padding: 16px 24px;
            border-top: 1px solid #f1f5f9;
            background: #fafbff;
            flex-shrink: 0;
            flex-wrap: wrap;
        }
        .pj-modal-footer .pj-btn {
            flex: 1;
            min-width: 120px;
            padding: 12px 16px;
            font-size: 0.85rem;
        }

        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @media (max-width: 900px) {
            .pj-card { grid-template-columns: 160px 1fr; }
        }
        @media (max-width: 640px) {
            .pj-hero { padding: 18px; border-radius: 16px; margin-bottom: 14px; }
            .pj-hero-title { font-size: 1.15rem; }
            .pj-hero-sub { font-size: 0.76rem; }
            .pj-hero-badge {
                width: 100%;
                justify-content: center;
                padding: 8px 12px;
                font-size: 0.72rem;
                margin-top: 4px;
            }
            .pj-tabs { gap: 3px; padding: 4px; margin-bottom: 14px; border-radius: 12px; }
            .pj-tab { padding: 9px 10px; font-size: 0.72rem; gap: 4px; border-radius: 8px; }
            .pj-tab svg { width: 12px; height: 12px; }
            .pj-tab-count { font-size: 0.6rem; padding: 1px 6px; min-width: 16px; }
            .pj-list { gap: 12px; }
            .pj-card { grid-template-columns: 1fr; border-radius: 14px; }
            .pj-cover { aspect-ratio: 16 / 9; max-height: none; }
            .pj-cover-fallback { font-size: 2rem; }
            .pj-body { padding: 14px 14px 16px; gap: 7px; }
            .pj-title { font-size: 0.98rem; }
            .pj-desc { font-size: 0.78rem; -webkit-line-clamp: 3; }
            .pj-meta { gap: 8px; }
            .pj-meta-item { font-size: 0.68rem; }
            .pj-meta-item svg { width: 11px; height: 11px; }
            .pj-actions { margin-top: 6px; gap: 6px; }
            .pj-btn { flex: 1; padding: 10px 12px; font-size: 0.74rem; border-radius: 9px; min-height: 40px; }
            .pj-empty { padding: 40px 16px; border-radius: 16px; }
            .pj-empty svg { width: 44px; height: 44px; }
            .pj-empty h3 { font-size: 0.92rem; }
            .pj-empty p { font-size: 0.76rem; }

            /* MODAL MOBILE — bottom sheet */
            .pj-modal-overlay {
                padding: 0;
                align-items: flex-end;
            }
            .pj-modal {
                max-width: 100%;
                border-radius: 22px 22px 0 0;
                max-height: 92vh;
            }
            .pj-modal-cover {
                aspect-ratio: 16 / 9;
                max-height: 200px;
            }
            .pj-modal-title-block { padding: 16px 18px 14px; }
            .pj-modal-title { font-size: 1.15rem; }
            .pj-modal-meta-line { gap: 8px; font-size: 0.7rem; }
            .pj-modal-body { padding: 18px; }
            .pj-modal-meta-grid { grid-template-columns: 1fr; gap: 8px; }
            .pj-modal-desc { font-size: 0.82rem; padding: 12px 14px; }
            .pj-modal-footer {
                padding: 14px 18px;
                flex-direction: column;
                gap: 6px;
            }
            .pj-modal-footer .pj-btn {
                width: 100%;
                min-height: 44px;
                font-size: 0.82rem;
            }
            .pj-modal-close {
                width: 34px;
                height: 34px;
                top: 12px;
                right: 12px;
                font-size: 1.1rem;
            }
        }

        @keyframes pjFadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .pj-card { animation: pjFadeInUp 0.35s ease both; }
    </style>
</head>
<body class="admin-body">

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    @include('partials.admin-sidebar', ['active' => 'pengajuan'])

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
                <h1 class="admin-page-title">Pengajuan Komunitas</h1>
                <p class="admin-page-sub">Review dan kelola komunitas yang diajukan user</p>
            </div>
            <div class="admin-user-chip">
                <span>{{ auth()->user()->name ?? 'Admin' }}</span>
                <div class="admin-user-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</div>
            </div>
        </div>

        <div class="pj-hero">
            <div class="pj-hero-content">
                <div>
                    <h2 class="pj-hero-title">Kelola Pengajuan</h2>
                    <p class="pj-hero-sub">Review dan putuskan pengajuan komunitas dengan cepat.</p>
                </div>
                <div class="pj-hero-badge">
                    <span class="badge-dot"></span>
                    <span id="heroPendingCount">0 Menunggu</span>
                </div>
            </div>
        </div>

        <div class="pj-tabs">
            <button class="pj-tab active" onclick="switchFilter('pending', event)">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <span>Menunggu</span>
                <span class="pj-tab-count" id="countPending">0</span>
            </button>
            <button class="pj-tab" onclick="switchFilter('approved', event)">
                <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                <span>Disetujui</span>
                <span class="pj-tab-count" id="countApproved">0</span>
            </button>
            <button class="pj-tab" onclick="switchFilter('rejected', event)">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                <span>Ditolak</span>
                <span class="pj-tab-count" id="countRejected">0</span>
            </button>
        </div>

        <div class="pj-list" id="submissionList"></div>

        <div class="pj-empty" id="emptyState" style="display:none;">
            <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            <h3>Tidak ada pengajuan</h3>
            <p id="emptyText">Tidak ada pengajuan komunitas dengan status ini.</p>
        </div>
    </main>

    <!-- MODAL DETAIL -->
    <div class="pj-modal-overlay" id="detailModal" onclick="closeDetailModal(event)">
        <div class="pj-modal" onclick="event.stopPropagation()">

            <!-- Cover + Title -->
            <div class="pj-modal-cover">
                <img id="modalCover" src="" alt="">
                <div class="pj-modal-cover-overlay"></div>

                <div class="pj-modal-cover-badges">
                    <span class="pj-modal-badge cat" id="modalCategory">Kategori</span>
                    <span class="pj-modal-badge pending" id="modalStatus">Menunggu</span>
                </div>

                <button class="pj-modal-close" onclick="closeDetailModal()">×</button>

                <div class="pj-modal-title-block">
                    <h2 class="pj-modal-title" id="modalTitle">Nama Komunitas</h2>
                    <div class="pj-modal-meta-line">
                        <span>📍 Pidie</span>
                        <span id="modalMetaDate">🗓️ —</span>
                    </div>
                </div>
            </div>

            <!-- Body -->
            <div class="pj-modal-body">
                <div class="pj-modal-section">
                    <div class="pj-modal-section-title">📝 Deskripsi</div>
                    <div class="pj-modal-desc" id="modalDescription">Deskripsi...</div>
                </div>

                <div class="pj-modal-section">
                    <div class="pj-modal-section-title">ℹ️ Informasi Pengajuan</div>
                    <div class="pj-modal-meta-grid">
                        <div class="pj-modal-meta-item">
                            <span class="label">Pembuat</span>
                            <span class="value" id="modalCreator">—</span>
                        </div>
                        <div class="pj-modal-meta-item">
                            <span class="label">Email</span>
                            <span class="value" id="modalEmail">—</span>
                        </div>
                        <div class="pj-modal-meta-item">
                            <span class="label">Tanggal Pengajuan</span>
                            <span class="value" id="modalDate">—</span>
                        </div>
                        <div class="pj-modal-meta-item">
                            <span class="label">Kategori</span>
                            <span class="value" id="modalCategoryValue">—</span>
                        </div>
                    </div>
                </div>

                <div class="pj-modal-section" id="modalRejectSection" style="display:none;">
                    <div class="pj-modal-section-title">❌ Alasan Penolakan</div>
                    <div class="pj-reject-reason" id="modalRejectReason" style="margin:0;"></div>
                </div>
            </div>

            <!-- Footer -->
            <div class="pj-modal-footer" id="modalActions"></div>
        </div>
    </div>

    <script>
    (function () {
        'use strict';

        const CSRF = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const URL_DATA = "{{ route('admin.pengajuan.data') }}";
        const URL_BASE = "{{ url('/admin/pengajuan') }}";

        const state = { filter: 'pending', submissions: [], loading: false };

        function esc(str) {
            if (str == null) return '';
            return String(str)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#39;');
        }

        async function api(url, options = {}) {
            const res = await fetch(url, {
                credentials: 'same-origin',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': CSRF,
                    'X-Requested-With': 'XMLHttpRequest',
                    ...(options.headers || {}),
                },
                ...options,
            });
            let data = null;
            try { data = await res.json(); } catch (_) {}
            if (!res.ok) {
                const msg = (data && (data.message || data.error)) || `HTTP ${res.status}`;
                throw new Error(msg);
            }
            return data || {};
        }

        async function loadSubmissions() {
            if (state.loading) return;
            state.loading = true;
            const list = document.getElementById('submissionList');
            const empty = document.getElementById('emptyState');

            list.innerHTML = `
                <div class="pj-empty" style="display:block;">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <h3>Memuat data...</h3>
                    <p>Mengambil pengajuan dari server.</p>
                </div>`;
            empty.style.display = 'none';

            try {
                const data = await api(URL_DATA);
                state.submissions = Array.isArray(data.submissions) ? data.submissions : [];
                updateCounts();
                renderList();
            } catch (err) {
                list.innerHTML = `
                    <div class="pj-empty" style="display:block;">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                        <h3>Gagal memuat data</h3>
                        <p>${esc(err.message)}</p>
                    </div>`;
            } finally {
                state.loading = false;
            }
        }

        function updateCounts() {
            const c = { pending: 0, approved: 0, rejected: 0 };
            state.submissions.forEach(s => { if (c[s.status] != null) c[s.status]++; });
            document.getElementById('countPending').textContent = c.pending;
            document.getElementById('countApproved').textContent = c.approved;
            document.getElementById('countRejected').textContent = c.rejected;
            document.getElementById('heroPendingCount').textContent = c.pending + ' Menunggu';
        }

        function statusIcon(status) {
            if (status === 'pending') return '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>';
            if (status === 'approved') return '<svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>';
            return '<svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>';
        }
        function statusLabel(s) {
            return s === 'pending' ? 'Menunggu' : s === 'approved' ? 'Disetujui' : 'Ditolak';
        }

        function renderList() {
            const filtered = state.submissions.filter(s => s.status === state.filter);
            const list = document.getElementById('submissionList');
            const empty = document.getElementById('emptyState');
            const emptyText = document.getElementById('emptyText');

            list.innerHTML = '';

            if (filtered.length === 0) {
                empty.style.display = 'block';
                emptyText.textContent =
                    state.filter === 'pending' ? 'Belum ada pengajuan yang menunggu review.' :
                    state.filter === 'approved' ? 'Belum ada komunitas yang disetujui.' :
                                                   'Belum ada komunitas yang ditolak.';
                return;
            }
            empty.style.display = 'none';

            filtered.forEach((c, i) => {
                const card = document.createElement('div');
                card.className = 'pj-card';
                card.style.animationDelay = (i * 0.03) + 's';
                card.innerHTML = `
                    <div class="pj-cover">
                        ${c.cover
                            ? `<img src="${esc(c.cover)}" alt="${esc(c.name)}" onerror="this.style.display='none';this.parentElement.innerHTML='<div class=\\'pj-cover-fallback\\'>${esc((c.name || '?').charAt(0).toUpperCase())}</div>'">`
                            : `<div class="pj-cover-fallback">${esc((c.name || '?').charAt(0).toUpperCase())}</div>`}
                    </div>
                    <div class="pj-body">
                        <div class="pj-top-row">
                            <span class="pj-category">${esc(c.category || 'Umum')}</span>
                            <span class="pj-status ${esc(c.status)}">${statusIcon(c.status)} ${statusLabel(c.status)}</span>
                        </div>
                        <h3 class="pj-title">${esc(c.name)}</h3>
                        <p class="pj-desc">${esc(c.description)}</p>
                        <div class="pj-meta">
                            <span class="pj-meta-item">
                                <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                ${esc(c.creator || 'Anonim')}
                            </span>
                            <span class="pj-meta-item">
                                <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                ${esc(c.created || '-')}
                            </span>
                        </div>
                        ${c.status === 'rejected' && c.reject_reason
                            ? `<div class="pj-reject-reason"><strong>Alasan:</strong> ${esc(c.reject_reason)}</div>`
                            : ''}
                        <div class="pj-actions">
                            <button class="pj-btn detail" data-action="detail" data-slug="${esc(c.slug)}">
                                <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                Detail
                            </button>
                            ${c.status === 'pending' ? `
                                <button class="pj-btn approve" data-action="approve" data-slug="${esc(c.slug)}">
                                    <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                                    Setujui
                                </button>
                                <button class="pj-btn reject" data-action="reject" data-slug="${esc(c.slug)}">
                                    <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                    Tolak
                                </button>
                            ` : ''}
                        </div>
                    </div>
                `;
                list.appendChild(card);
            });
        }

        document.getElementById('submissionList').addEventListener('click', (e) => {
            const btn = e.target.closest('[data-action]');
            if (!btn) return;
            const { action, slug } = btn.dataset;
            if (action === 'detail') openDetail(slug);
            if (action === 'approve') handleApprove(slug, btn);
            if (action === 'reject') handleReject(slug, btn);
        });

        window.switchFilter = function (filter, event) {
            state.filter = filter;
            document.querySelectorAll('.pj-tab').forEach(t => t.classList.remove('active'));
            if (event && event.currentTarget) event.currentTarget.classList.add('active');
            renderList();
        };

        window.openDetail = function (slug) {
            const c = state.submissions.find(x => x.slug === slug);
            if (!c) return;

            // Cover
            const coverImg = document.getElementById('modalCover');
            if (c.cover) {
                coverImg.src = c.cover;
                coverImg.style.display = 'block';
            } else {
                coverImg.src = '';
                coverImg.style.display = 'none';
            }

            // Badges
            document.getElementById('modalCategory').textContent = c.category || 'Umum';
            const statusEl = document.getElementById('modalStatus');
            statusEl.textContent = statusLabel(c.status);
            statusEl.className = 'pj-modal-badge ' + c.status;

            // Title + meta
            document.getElementById('modalTitle').textContent = c.name || '-';
            document.getElementById('modalMetaDate').textContent = '🗓️ ' + (c.created || '—');

            // Body
            document.getElementById('modalDescription').textContent = c.description || '-';
            document.getElementById('modalCreator').textContent = c.creator || 'Anonim';
            document.getElementById('modalEmail').textContent = c.creator_email || '-';
            document.getElementById('modalDate').textContent = c.created || '-';
            document.getElementById('modalCategoryValue').textContent = c.category || 'Umum';

            // Reject reason
            const rejectSection = document.getElementById('modalRejectSection');
            const rejectReason = document.getElementById('modalRejectReason');
            if (c.status === 'rejected' && c.reject_reason) {
                rejectSection.style.display = 'block';
                rejectReason.textContent = c.reject_reason;
            } else {
                rejectSection.style.display = 'none';
            }

            // Footer actions
            const actions = document.getElementById('modalActions');
            if (c.status === 'pending') {
                actions.innerHTML = `
                    <button class="pj-btn reject" data-action="reject" data-slug="${esc(c.slug)}" style="background:#fff;border:1.5px solid #fecaca;color:#dc2626;">
                        <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Tolak
                    </button>
                    <button class="pj-btn approve" data-action="approve" data-slug="${esc(c.slug)}">
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                        Setujui
                    </button>`;
            } else {
                actions.innerHTML = `
                    <button class="pj-btn detail" data-action="close" style="width:100%;justify-content:center;">
                        Tutup
                    </button>`;
            }

            document.getElementById('detailModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        };

        window.closeDetailModal = function (e) {
            if (e && e.target !== e.currentTarget) return;
            document.getElementById('detailModal').classList.remove('show');
            document.body.style.overflow = '';
        };

        document.getElementById('modalActions').addEventListener('click', (e) => {
            const btn = e.target.closest('[data-action]');
            if (!btn) return;
            const { action, slug } = btn.dataset;
            if (action === 'close') { closeDetailModal(); return; }
            if (action === 'approve') handleApprove(slug, btn);
            if (action === 'reject') handleReject(slug, btn);
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeDetailModal();
        });

        async function handleApprove(slug, btn) {
            if (!confirm('Setujui komunitas ini? Komunitas akan tampil di halaman publik.')) return;
            if (btn) btn.disabled = true;
            try {
                await api(`${URL_BASE}/${encodeURIComponent(slug)}/approve`, { method: 'POST' });
                closeDetailModal();
                await loadSubmissions();
            } catch (err) {
                alert('Gagal menyetujui: ' + err.message);
                if (btn) btn.disabled = false;
            }
        }

        async function handleReject(slug, btn) {
            const reason = (prompt('Alasan penolakan (opsional):') || '').trim() || 'Tidak memenuhi kriteria';
            if (!confirm('Tolak komunitas ini?\n\nAlasan: ' + reason)) return;
            if (btn) btn.disabled = true;
            try {
                await api(`${URL_BASE}/${encodeURIComponent(slug)}/reject`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ reason }),
                });
                closeDetailModal();
                await loadSubmissions();
            } catch (err) {
                alert('Gagal menolak: ' + err.message);
                if (btn) btn.disabled = false;
            }
        }

        loadSubmissions();
    })();
    </script>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>