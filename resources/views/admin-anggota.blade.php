<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar Anggota — Admin Vibes Space Pidie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-sidebar.css') }}">
    <style>
        /* ============================================================
           ADMIN ANGGOTA — RAPI, WARNA, MODAL PROFIL
           ============================================================ */

        .ag-hero {
            position: relative;
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 40%, #ec4899 100%);
            border-radius: 16px;
            padding: 20px 22px;
            margin-bottom: 16px;
            overflow: hidden;
            color: #fff;
            box-shadow: 0 12px 32px rgba(59, 130, 246, 0.2);
        }
        .ag-hero::before {
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
        .ag-hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }
        .ag-hero-title {
            font-size: 1.15rem;
            font-weight: 900;
            letter-spacing: -0.02em;
            line-height: 1.2;
            margin-bottom: 3px;
        }
        .ag-hero-sub {
            font-size: 0.78rem;
            color: rgba(255,255,255,0.85);
            font-weight: 500;
            line-height: 1.5;
        }
        .ag-hero-stats {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }
        .ag-hero-stat {
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
        .ag-hero-stat .num {
            font-size: 1.1rem;
            font-weight: 900;
            line-height: 1;
        }
        .ag-hero-stat .lbl {
            font-size: 0.6rem;
            font-weight: 700;
            color: rgba(255,255,255,0.8);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-top: 3px;
        }

        .ag-toolbar {
            display: flex;
            gap: 8px;
            margin-bottom: 16px;
            flex-wrap: wrap;
            align-items: center;
        }
        .ag-search {
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
        .ag-search:focus-within {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 4px rgba(139,92,246,0.1);
        }
        .ag-search svg {
            width: 15px;
            height: 15px;
            stroke: #8b5cf6;
            stroke-width: 2.2;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }
        .ag-search input {
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
        .ag-search input::placeholder {
            color: #94a3b8;
        }

        .ag-filters {
            display: flex;
            gap: 3px;
            padding: 3px;
            background: #f8f5ff;
            border: 1.5px solid #ede9fe;
            border-radius: 10px;
            overflow-x: auto;
            scrollbar-width: none;
        }
        .ag-filters::-webkit-scrollbar { display: none; }
        .ag-filter {
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
        .ag-filter:hover {
            background: #fff;
            color: #6d28d9;
        }
        .ag-filter.active {
            background: #fff;
            color: #6d28d9;
            box-shadow: 0 2px 6px rgba(139,92,246,0.15);
        }

        .ag-result-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
            flex-wrap: wrap;
        }
        .ag-result-text {
            font-size: 0.8rem;
            color: #64748b;
            font-weight: 600;
        }
        .ag-result-text strong {
            color: #0f172a;
            font-weight: 900;
        }

        .ag-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 10px;
        }
        @media (max-width: 900px) {
            .ag-grid { grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); }
        }
        @media (max-width: 640px) {
            .ag-grid { grid-template-columns: 1fr; gap: 8px; }
        }

        .ag-card {
            background: #fff;
            border: 1.5px solid #f0e9ff;
            border-radius: 12px;
            padding: 12px 14px;
            transition: all 0.22s cubic-bezier(0.4,0,0.2,1);
            display: flex;
            flex-direction: column;
            gap: 10px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }
        .ag-card:hover {
            border-color: #ddd6fe;
            box-shadow: 0 6px 20px rgba(139,92,246,0.1);
            transform: translateY(-2px);
        }

        .ag-card-top {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .ag-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff;
            display: grid;
            place-items: center;
            font-weight: 900;
            font-size: 1.05rem;
            flex-shrink: 0;
            overflow: hidden;
            border: 2px solid #fff;
            box-shadow: 0 2px 8px rgba(139,92,246,0.2);
        }
        .ag-avatar.admin {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            box-shadow: 0 2px 8px rgba(245,158,11,0.3);
        }
        .ag-avatar.pembuat {
            background: linear-gradient(135deg, #a855f7, #7c3aed);
            box-shadow: 0 2px 8px rgba(168,85,247,0.3);
        }
        .ag-avatar.anggota {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            box-shadow: 0 2px 8px rgba(59,130,246,0.3);
        }
        .ag-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .ag-info {
            flex: 1;
            min-width: 0;
        }
        .ag-info h4 {
            font-size: 0.88rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.01em;
            line-height: 1.3;
            margin: 0 0 3px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .ag-info small {
            display: block;
            font-size: 0.7rem;
            color: #64748b;
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .ag-role-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.64rem;
            font-weight: 800;
            white-space: nowrap;
            border: 1px solid transparent;
            flex-shrink: 0;
        }
        .ag-role-badge.admin {
            background: #fffbeb;
            color: #b45309;
            border-color: #fde68a;
        }
        .ag-role-badge.pembuat {
            background: #f5f3ff;
            color: #6d28d9;
            border-color: #ddd6fe;
        }
        .ag-role-badge.anggota {
            background: #eff6ff;
            color: #1d4ed8;
            border-color: #bfdbfe;
        }

        .ag-card-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 6px;
            flex-wrap: wrap;
            padding: 8px 0;
            border-top: 1px solid #f5f3ff;
            border-bottom: 1px solid #f5f3ff;
        }
        .ag-meta-item {
            display: flex;
            flex-direction: column;
            gap: 1px;
            flex: 1;
            min-width: 0;
        }
        .ag-meta-item .lbl {
            font-size: 0.6rem;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .ag-meta-item .val {
            font-size: 0.82rem;
            font-weight: 800;
            color: #0f172a;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .ag-card-stats {
            display: flex;
            gap: 6px;
        }
        .ag-stat-mini {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 8px;
            flex: 1;
            min-width: 0;
        }
        .ag-stat-mini.blue {
            background: #eff6ff;
            border: 1px solid #dbeafe;
        }
        .ag-stat-mini.pink {
            background: #fdf2f8;
            border: 1px solid #fbcfe8;
        }
        .ag-stat-mini .num {
            font-size: 0.95rem;
            font-weight: 900;
            line-height: 1;
        }
        .ag-stat-mini.blue .num { color: #2563eb; }
        .ag-stat-mini.pink .num { color: #db2777; }
        .ag-stat-mini .lbl {
            font-size: 0.62rem;
            font-weight: 700;
            color: #64748b;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .ag-empty {
            text-align: center;
            padding: 60px 20px;
            background: #fff;
            border-radius: 14px;
            border: 2px dashed #ddd6fe;
        }
        .ag-empty-icon {
            font-size: 2.5rem;
            margin-bottom: 12px;
            display: inline-block;
            opacity: 0.4;
        }
        .ag-empty h3 {
            font-size: 0.95rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 4px;
        }
        .ag-empty p {
            font-size: 0.8rem;
            color: #94a3b8;
            font-weight: 500;
            margin-bottom: 14px;
        }

        /* ============================================================
           MODAL PROFIL
           ============================================================ */
        .ag-modal-overlay {
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
        .ag-modal-overlay.show {
            display: flex;
            opacity: 1;
        }
        .ag-modal {
            background: #fff;
            border-radius: 22px;
            width: 100%;
            max-width: 520px;
            max-height: 92vh;
            display: flex;
            flex-direction: column;
            box-shadow: 0 30px 80px rgba(0,0,0,0.35);
            animation: agModalSlide 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
        }
        @keyframes agModalSlide {
            from { opacity: 0; transform: translateY(30px) scale(0.96); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .ag-modal-header {
            position: relative;
            padding: 24px 24px 20px;
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 40%, #ec4899 100%);
            color: #fff;
            overflow: hidden;
            flex-shrink: 0;
        }
        .ag-modal-header::before {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            pointer-events: none;
        }
        .ag-modal-header.admin { background: linear-gradient(135deg, #f59e0b, #d97706); }
        .ag-modal-header.pembuat { background: linear-gradient(135deg, #a855f7, #7c3aed); }
        .ag-modal-header.anggota { background: linear-gradient(135deg, #3b82f6, #2563eb); }

        .ag-modal-close {
            position: absolute;
            top: 14px;
            right: 14px;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            color: #fff;
            border: 1px solid rgba(255,255,255,0.3);
            font-size: 1.2rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.22s;
            z-index: 3;
            line-height: 1;
        }
        .ag-modal-close:hover {
            background: rgba(239,68,68,0.9);
            transform: rotate(90deg);
        }

        .ag-modal-profile {
            display: flex;
            align-items: center;
            gap: 14px;
            position: relative;
            z-index: 2;
        }
        .ag-modal-avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: rgba(255,255,255,0.25);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.5);
            color: #fff;
            display: grid;
            place-items: center;
            font-weight: 900;
            font-size: 1.4rem;
            flex-shrink: 0;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        }
        .ag-modal-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .ag-modal-info {
            flex: 1;
            min-width: 0;
        }
        .ag-modal-name {
            font-size: 1.15rem;
            font-weight: 900;
            letter-spacing: -0.02em;
            line-height: 1.2;
            margin-bottom: 4px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.15);
            word-break: break-word;
        }
        .ag-modal-email {
            font-size: 0.8rem;
            color: rgba(255,255,255,0.9);
            font-weight: 500;
            word-break: break-all;
        }
        .ag-modal-role {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            background: rgba(255,255,255,0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.4);
            border-radius: 6px;
            font-size: 0.66rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-top: 8px;
        }

        .ag-modal-body {
            padding: 20px 22px;
            overflow-y: auto;
            flex: 1;
        }

        .ag-modal-section {
            margin-bottom: 18px;
        }
        .ag-modal-section:last-child { margin-bottom: 0; }
        .ag-modal-section-title {
            font-size: 0.72rem;
            font-weight: 800;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 10px;
        }

        .ag-modal-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
        }
        .ag-modal-stat {
            padding: 12px 10px;
            border-radius: 10px;
            text-align: center;
        }
        .ag-modal-stat.blue { background: #eff6ff; border: 1px solid #dbeafe; }
        .ag-modal-stat.pink { background: #fdf2f8; border: 1px solid #fbcfe8; }
        .ag-modal-stat.purple { background: #f5f3ff; border: 1px solid #ddd6fe; }
        .ag-modal-stat .num {
            font-size: 1.3rem;
            font-weight: 900;
            line-height: 1;
            letter-spacing: -0.02em;
            margin-bottom: 3px;
        }
        .ag-modal-stat.blue .num { color: #2563eb; }
        .ag-modal-stat.pink .num { color: #db2777; }
        .ag-modal-stat.purple .num { color: #7c3aed; }
        .ag-modal-stat .lbl {
            font-size: 0.62rem;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .ag-modal-info-list {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }
        .ag-modal-info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 9px 0;
            border-bottom: 1px solid #f5f3ff;
            font-size: 0.82rem;
            gap: 12px;
        }
        .ag-modal-info-row:last-child { border-bottom: none; }
        .ag-modal-info-label {
            color: #64748b;
            font-weight: 600;
            flex-shrink: 0;
        }
        .ag-modal-info-value {
            color: #0f172a;
            font-weight: 800;
            text-align: right;
            word-break: break-word;
        }

        .ag-community-list {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .ag-community-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 10px;
            background: #fafbff;
            border: 1px solid #f1f5f9;
            border-radius: 8px;
        }
        .ag-community-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #8b5cf6;
            flex-shrink: 0;
        }
        .ag-community-dot.pink { background: #ec4899; }
        .ag-community-info {
            flex: 1;
            min-width: 0;
        }
        .ag-community-info strong {
            display: block;
            font-size: 0.8rem;
            font-weight: 800;
            color: #0f172a;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .ag-community-info small {
            display: block;
            font-size: 0.66rem;
            color: #94a3b8;
            font-weight: 600;
            margin-top: 1px;
        }

        .ag-modal-footer {
            padding: 14px 22px;
            border-top: 1px solid #f1f5f9;
            background: #fafbff;
            flex-shrink: 0;
            display: flex;
            gap: 8px;
        }
        .ag-modal-btn {
            flex: 1;
            padding: 11px 16px;
            border: none;
            border-radius: 10px;
            font-family: inherit;
            font-size: 0.85rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            text-decoration: none;
        }
        .ag-modal-btn.close {
            background: #fff;
            color: #64748b;
            border: 1.5px solid #e8eaf0;
        }
        .ag-modal-btn.close:hover {
            background: #f8fafc;
            color: #0f172a;
        }

        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @media (max-width: 640px) {
            .ag-hero {
                padding: 16px 18px;
                border-radius: 14px;
                margin-bottom: 12px;
            }
            .ag-hero-title { font-size: 1.05rem; }
            .ag-hero-sub { font-size: 0.72rem; }
            .ag-hero-stats { width: 100%; gap: 4px; }
            .ag-hero-stat {
                flex: 1;
                min-width: 0;
                padding: 5px 8px;
            }
            .ag-hero-stat .num { font-size: 0.95rem; }
            .ag-hero-stat .lbl { font-size: 0.55rem; }

            .ag-toolbar { gap: 6px; margin-bottom: 12px; }
            .ag-search { min-width: 100%; }
            .ag-search input { padding: 9px 6px; font-size: 16px; }
            .ag-filters { width: 100%; }
            .ag-filter { padding: 7px 10px; font-size: 0.7rem; }

            .ag-result-bar { margin-bottom: 12px; }
            .ag-result-text { font-size: 0.75rem; }

            .ag-card { padding: 10px 12px; border-radius: 10px; }
            .ag-avatar { width: 42px; height: 42px; font-size: 0.95rem; }
            .ag-info h4 { font-size: 0.84rem; }
            .ag-info small { font-size: 0.66rem; }
            .ag-card-meta { padding: 7px 0; }
            .ag-meta-item .lbl { font-size: 0.56rem; }
            .ag-meta-item .val { font-size: 0.76rem; }
            .ag-stat-mini { padding: 5px 8px; }
            .ag-stat-mini .num { font-size: 0.85rem; }
            .ag-stat-mini .lbl { font-size: 0.58rem; }

            .ag-modal-overlay {
                padding: 0;
                align-items: flex-end;
            }
            .ag-modal {
                max-width: 100%;
                border-radius: 22px 22px 0 0;
                max-height: 92vh;
            }
            .ag-modal-header { padding: 20px 18px 16px; }
            .ag-modal-profile { gap: 12px; }
            .ag-modal-avatar { width: 56px; height: 56px; font-size: 1.25rem; }
            .ag-modal-name { font-size: 1rem; }
            .ag-modal-email { font-size: 0.74rem; }
            .ag-modal-body { padding: 16px 18px; }
            .ag-modal-stats { grid-template-columns: repeat(3, 1fr); gap: 6px; }
            .ag-modal-stat { padding: 10px 6px; }
            .ag-modal-stat .num { font-size: 1.1rem; }
            .ag-modal-stat .lbl { font-size: 0.56rem; }
            .ag-modal-info-row { font-size: 0.78rem; padding: 8px 0; }
            .ag-modal-footer {
                padding: 12px 18px;
                padding-bottom: max(12px, env(safe-area-inset-bottom));
            }
            .ag-modal-btn { min-height: 44px; }
            .ag-modal-close { width: 32px; height: 32px; top: 12px; right: 12px; }
        }

        @media (max-width: 380px) {
            .ag-hero-title { font-size: 0.98rem; }
        }
    </style>
</head>
<body class="admin-body">

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    @include('partials.admin-sidebar', ['active' => 'anggota'])

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
                <h1 class="admin-page-title">Daftar Anggota</h1>
                <p class="admin-page-sub">Semua user terdaftar di platform</p>
            </div>
            <div class="admin-user-chip">
                <span>{{ auth()->user()->name }}</span>
                <div class="admin-user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            </div>
        </div>

        <!-- HERO -->
        <div class="ag-hero">
            <div class="ag-hero-content">
                <div>
                    <h2 class="ag-hero-title">Kelola Anggota</h2>
                    <p class="ag-hero-sub">Klik card untuk melihat profil lengkap anggota</p>
                </div>
                <div class="ag-hero-stats">
                    <div class="ag-hero-stat">
                        <div class="num">{{ $stats['total'] }}</div>
                        <div class="lbl">Total</div>
                    </div>
                    <div class="ag-hero-stat">
                        <div class="num">{{ $stats['pembuat'] }}</div>
                        <div class="lbl">Pembuat</div>
                    </div>
                    <div class="ag-hero-stat">
                        <div class="num">{{ $stats['anggota'] }}</div>
                        <div class="lbl">Anggota</div>
                    </div>
                    <div class="ag-hero-stat">
                        <div class="num">{{ $stats['new_week'] }}</div>
                        <div class="lbl">Baru</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TOOLBAR -->
        <div class="ag-toolbar">
            <div class="ag-search">
                <svg viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                <input type="text" id="searchInput" placeholder="Cari nama atau email..." autocomplete="off">
            </div>
            <div class="ag-filters" id="filterTags">
                <button class="ag-filter active" data-filter="all">Semua</button>
                <button class="ag-filter" data-filter="pembuat">Pembuat</button>
                <button class="ag-filter" data-filter="anggota">Anggota</button>
            </div>
        </div>

        <!-- RESULT BAR -->
        <div class="ag-result-bar">
            <div class="ag-result-text" id="resultText">
                Menampilkan <strong>{{ $users->count() }}</strong> user
            </div>
        </div>

        <!-- GRID -->
        @if($users->isEmpty())
            <div class="ag-empty">
                <div class="ag-empty-icon">&#128100;</div>
                <h3>Belum ada anggota</h3>
                <p>Belum ada user yang mendaftar.</p>
            </div>
        @else
            <div class="ag-grid" id="anggotaGrid">
                @foreach($users as $u)
                    @php
                        $hasAvatar = $u->avatar && \Storage::disk('public')->exists($u->avatar);
                        $createdComms = $u->communities->map(function($c) {
                            return [
                                'name' => $c->name,
                                'category' => $c->category,
                                'status' => $c->status,
                            ];
                        })->values()->all();

                        $joinedComms = $u->joinedCommunities->map(function($c) {
                            return [
                                'name' => $c->name,
                                'category' => $c->category,
                            ];
                        })->values()->all();

                        $userJson = [
                            'id' => $u->id,
                            'name' => $u->name,
                            'email' => $u->email,
                            'role' => $u->role,
                            'avatar_url' => $hasAvatar ? asset('storage/' . $u->avatar) : null,
                            'initial' => strtoupper(substr($u->name, 0, 1)),
                            'created_at' => $u->created_at->translatedFormat('d F Y'),
                            'updated_at_human' => $u->updated_at->diffForHumans(),
                            'communities_count' => $u->communities_count,
                            'joined_count' => $u->joined_communities_count,
                            'created_communities' => $createdComms,
                            'joined_communities' => $joinedComms,
                        ];
                    @endphp
                    <div class="ag-card"
                         data-role="{{ $u->role }}"
                         data-search="{{ strtolower($u->name . ' ' . $u->email) }}"
                         data-user="{{ json_encode($userJson, JSON_HEX_APOS | JSON_HEX_QUOT) }}">
                        <div class="ag-card-top">
                            <div class="ag-avatar {{ $u->role }}">
                                @if($hasAvatar)
                                    <img src="{{ asset('storage/' . $u->avatar) }}" alt="{{ $u->name }}">
                                @else
                                    {{ strtoupper(substr($u->name, 0, 1)) }}
                                @endif
                            </div>
                            <div class="ag-info">
                                <h4>{{ $u->name }}</h4>
                                <small>{{ $u->email }}</small>
                            </div>
                            @if($u->role === 'admin')
                                <span class="ag-role-badge admin">Admin</span>
                            @elseif($u->role === 'pembuat')
                                <span class="ag-role-badge pembuat">Pembuat</span>
                            @else
                                <span class="ag-role-badge anggota">Anggota</span>
                            @endif
                        </div>

                        <div class="ag-card-meta">
                            <div class="ag-meta-item">
                                <span class="lbl">Bergabung</span>
                                <span class="val">{{ $u->created_at->translatedFormat('d M Y') }}</span>
                            </div>
                            <div class="ag-meta-item" style="text-align: right;">
                                <span class="lbl">Aktif</span>
                                <span class="val">{{ $u->updated_at->diffForHumans() }}</span>
                            </div>
                        </div>

                        <div class="ag-card-stats">
                            <div class="ag-stat-mini blue">
                                <div class="num">{{ $u->communities_count }}</div>
                                <div class="lbl">Dibuat</div>
                            </div>
                            <div class="ag-stat-mini pink">
                                <div class="num">{{ $u->joined_communities_count }}</div>
                                <div class="lbl">Diikuti</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="ag-empty" id="noResult" style="display:none;">
                <div class="ag-empty-icon">&#128269;</div>
                <h3>Tidak ditemukan</h3>
                <p>Coba ubah filter atau kata kunci pencarian.</p>
            </div>
        @endif
    </main>

    <!-- MODAL PROFIL ANGGOTA -->
    <div class="ag-modal-overlay" id="profileModal" onclick="closeProfileModal(event)">
        <div class="ag-modal" onclick="event.stopPropagation()">

            <div class="ag-modal-header" id="modalHeader">
                <button class="ag-modal-close" onclick="closeProfileModal()">&times;</button>
                <div class="ag-modal-profile">
                    <div class="ag-modal-avatar" id="modalAvatar">?</div>
                    <div class="ag-modal-info">
                        <div class="ag-modal-name" id="modalName">Nama User</div>
                        <div class="ag-modal-email" id="modalEmail">email@example.com</div>
                        <span class="ag-modal-role" id="modalRole">Anggota</span>
                    </div>
                </div>
            </div>

            <div class="ag-modal-body">

                <div class="ag-modal-section">
                    <div class="ag-modal-section-title">Statistik</div>
                    <div class="ag-modal-stats">
                        <div class="ag-modal-stat blue">
                            <div class="num" id="modalCommCreated">0</div>
                            <div class="lbl">Dibuat</div>
                        </div>
                        <div class="ag-modal-stat pink">
                            <div class="num" id="modalCommJoined">0</div>
                            <div class="lbl">Diikuti</div>
                        </div>
                        <div class="ag-modal-stat purple">
                            <div class="num" id="modalDaysAgo">0</div>
                            <div class="lbl">Hari</div>
                        </div>
                    </div>
                </div>

                <div class="ag-modal-section">
                    <div class="ag-modal-section-title">Informasi</div>
                    <div class="ag-modal-info-list">
                        <div class="ag-modal-info-row">
                            <span class="ag-modal-info-label">Bergabung</span>
                            <span class="ag-modal-info-value" id="modalJoinedDate">—</span>
                        </div>
                        <div class="ag-modal-info-row">
                            <span class="ag-modal-info-label">Terakhir Aktif</span>
                            <span class="ag-modal-info-value" id="modalLastActive">—</span>
                        </div>
                        <div class="ag-modal-info-row">
                            <span class="ag-modal-info-label">Role</span>
                            <span class="ag-modal-info-value" id="modalRoleInfo">—</span>
                        </div>
                    </div>
                </div>

                <div class="ag-modal-section" id="sectionCreated" style="display:none;">
                    <div class="ag-modal-section-title">Komunitas Dibuat</div>
                    <div class="ag-community-list" id="modalCreatedList"></div>
                </div>

                <div class="ag-modal-section" id="sectionJoined" style="display:none;">
                    <div class="ag-modal-section-title">Komunitas Diikuti</div>
                    <div class="ag-community-list" id="modalJoinedList"></div>
                </div>

            </div>

            <div class="ag-modal-footer">
                <button type="button" class="ag-modal-btn close" onclick="closeProfileModal()">Tutup</button>
            </div>
        </div>
    </div>

    <script>
        let currentFilter = 'all';
        let currentSearch = '';

        const filterTags = document.querySelectorAll('#filterTags .ag-filter');
        const searchInput = document.getElementById('searchInput');
        const cards = document.querySelectorAll('#anggotaGrid .ag-card');
        const resultText = document.getElementById('resultText');
        const noResult = document.getElementById('noResult');

        function applyFilter() {
            let visibleCount = 0;
            cards.forEach(card => {
                const role = card.getAttribute('data-role');
                const search = card.getAttribute('data-search');
                const matchFilter = currentFilter === 'all' || role === currentFilter;
                const matchSearch = !currentSearch || search.includes(currentSearch);
                const show = matchFilter && matchSearch;
                card.style.display = show ? '' : 'none';
                if (show) visibleCount++;
            });
            if (resultText) resultText.innerHTML = `Menampilkan <strong>${visibleCount}</strong> user`;
            if (noResult) noResult.style.display = visibleCount === 0 ? 'block' : 'none';
        }

        filterTags.forEach(tag => {
            tag.addEventListener('click', function () {
                filterTags.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                currentFilter = this.getAttribute('data-filter');
                applyFilter();
            });
        });

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                currentSearch = this.value.trim().toLowerCase();
                applyFilter();
            });
        }

        // ============================================================
        // MODAL PROFIL
        // ============================================================
        const profileModal = document.getElementById('profileModal');
        const modalHeader = document.getElementById('modalHeader');
        const modalAvatar = document.getElementById('modalAvatar');
        const modalName = document.getElementById('modalName');
        const modalEmail = document.getElementById('modalEmail');
        const modalRole = document.getElementById('modalRole');
        const modalCommCreated = document.getElementById('modalCommCreated');
        const modalCommJoined = document.getElementById('modalCommJoined');
        const modalDaysAgo = document.getElementById('modalDaysAgo');
        const modalJoinedDate = document.getElementById('modalJoinedDate');
        const modalLastActive = document.getElementById('modalLastActive');
        const modalRoleInfo = document.getElementById('modalRoleInfo');
        const sectionCreated = document.getElementById('sectionCreated');
        const sectionJoined = document.getElementById('sectionJoined');
        const modalCreatedList = document.getElementById('modalCreatedList');
        const modalJoinedList = document.getElementById('modalJoinedList');

        const roleLabels = { admin: 'Admin', pembuat: 'Pembuat', anggota: 'Anggota' };
        const statusLabels = { approved: 'Disetujui', pending: 'Menunggu', rejected: 'Ditolak' };

        cards.forEach(card => {
            card.addEventListener('click', function () {
                try {
                    const data = JSON.parse(this.getAttribute('data-user'));
                    openProfileModal(data);
                } catch (e) {
                    console.error('Failed to parse user data', e);
                }
            });
        });

        function openProfileModal(user) {
            modalHeader.className = 'ag-modal-header ' + (user.role || 'anggota');

            if (user.avatar_url) {
                modalAvatar.innerHTML = '<img src="' + user.avatar_url + '" alt="' + escapeHtml(user.name) + '">';
            } else {
                modalAvatar.textContent = user.initial || '?';
            }

            modalName.textContent = user.name || '-';
            modalEmail.textContent = user.email || '-';
            modalRole.textContent = roleLabels[user.role] || user.role || 'Anggota';

            modalCommCreated.textContent = user.communities_count || 0;
            modalCommJoined.textContent = user.joined_count || 0;

            // Calculate days since joined
            let daysAgo = 0;
            try {
                const joined = new Date(user.created_at);
                if (!isNaN(joined.getTime())) {
                    daysAgo = Math.floor((new Date() - joined) / (1000 * 60 * 60 * 24));
                }
            } catch(e) {}
            modalDaysAgo.textContent = daysAgo;

            modalJoinedDate.textContent = user.created_at || '—';
            modalLastActive.textContent = user.updated_at_human || '—';
            modalRoleInfo.textContent = roleLabels[user.role] || user.role || '—';

            // Created communities
            modalCreatedList.innerHTML = '';
            if (user.created_communities && user.created_communities.length > 0) {
                sectionCreated.style.display = 'block';
                user.created_communities.forEach(c => {
                    const item = document.createElement('div');
                    item.className = 'ag-community-item';
                    item.innerHTML =
                        '<span class="ag-community-dot"></span>' +
                        '<div class="ag-community-info">' +
                            '<strong>' + escapeHtml(c.name) + '</strong>' +
                            '<small>' + escapeHtml(c.category || '') + ' · ' + (statusLabels[c.status] || c.status || '') + '</small>' +
                        '</div>';
                    modalCreatedList.appendChild(item);
                });
            } else {
                sectionCreated.style.display = 'none';
            }

            // Joined communities
            modalJoinedList.innerHTML = '';
            if (user.joined_communities && user.joined_communities.length > 0) {
                sectionJoined.style.display = 'block';
                user.joined_communities.forEach(c => {
                    const item = document.createElement('div');
                    item.className = 'ag-community-item';
                    item.innerHTML =
                        '<span class="ag-community-dot pink"></span>' +
                        '<div class="ag-community-info">' +
                            '<strong>' + escapeHtml(c.name) + '</strong>' +
                            '<small>' + escapeHtml(c.category || '') + '</small>' +
                        '</div>';
                    modalJoinedList.appendChild(item);
                });
            } else {
                sectionJoined.style.display = 'none';
            }

            profileModal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeProfileModal(event) {
            if (event && event.target !== event.currentTarget) return;
            profileModal.classList.remove('show');
            document.body.style.overflow = '';
        }

        function escapeHtml(str) {
            if (str == null) return '';
            return String(str)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#39;');
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeProfileModal();
        });
    </script>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>