<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Buat Komunitas — Vibes Space Pidie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* ============================================================
           BUAT KOMUNITAS — PREMIUM MOBILE-FIRST
           ============================================================ */

        .create-page {
            min-height: calc(100vh - 72px);
            background: #fafaff;
            display: flex;
        }

        /* ============================================================
           LEFT PANEL (DESKTOP ONLY)
           ============================================================ */
        .create-left {
            flex: 0 0 42%;
            background:
                radial-gradient(circle at 20% 20%, #a855f7 0%, transparent 45%),
                radial-gradient(circle at 80% 40%, #ec4899 0%, transparent 45%),
                radial-gradient(circle at 40% 90%, #f97316 0%, transparent 45%),
                linear-gradient(135deg, #7c3aed 0%, #8b5cf6 50%, #ec4899 100%);
            padding: 60px 48px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: sticky;
            top: 72px;
            height: calc(100vh - 72px);
            overflow-y: auto;
            color: #fff;
        }
        .create-left::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 30% 40%, rgba(255,255,255,0.15) 0%, transparent 8%),
                radial-gradient(circle at 70% 25%, rgba(255,255,255,0.12) 0%, transparent 6%),
                radial-gradient(circle at 50% 75%, rgba(255,255,255,0.1) 0%, transparent 5%);
            pointer-events: none;
        }

        .create-left-top {
            position: relative;
            z-index: 2;
        }
        .create-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: rgba(255,255,255,0.18);
            backdrop-filter: blur(12px);
            border: 1.5px solid rgba(255,255,255,0.3);
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 24px;
        }
        .create-badge .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #10b981;
            box-shadow: 0 0 0 3px rgba(16,185,129,0.4);
            animation: liveDot 2s infinite;
        }
        @keyframes liveDot {
            0%, 100% { box-shadow: 0 0 0 3px rgba(16,185,129,0.4); }
            50% { box-shadow: 0 0 0 7px rgba(16,185,129,0.1); }
        }
        .create-headline {
            font-size: 2.4rem;
            font-weight: 900;
            letter-spacing: -0.04em;
            line-height: 1.1;
            margin-bottom: 16px;
        }
        .create-headline em {
            font-style: normal;
            display: inline-block;
            position: relative;
        }
        .create-headline em::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: 4px;
            height: 8px;
            background: rgba(255,255,255,0.3);
            border-radius: 4px;
            z-index: -1;
        }
        .create-desc {
            font-size: 0.95rem;
            line-height: 1.65;
            color: rgba(255,255,255,0.9);
            font-weight: 500;
            margin-bottom: 32px;
            max-width: 420px;
        }

        /* Preview card */
        .preview-label {
            font-size: 0.7rem;
            font-weight: 800;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.7);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .preview-label::before {
            content: '';
            width: 20px;
            height: 1px;
            background: rgba(255,255,255,0.5);
        }
        .preview-card {
            background: rgba(255,255,255,0.98);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.25);
            max-width: 340px;
            color: #0f172a;
            animation: floatCard 6s ease-in-out infinite;
        }
        @keyframes floatCard {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }
        .preview-cover {
            aspect-ratio: 16 / 10;
            background: linear-gradient(135deg, #f5f3ff, #fce7f3);
            position: relative;
            overflow: hidden;
        }
        .preview-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .preview-cover .preview-empty {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: #a78bfa;
        }
        .preview-cover .preview-empty .icon {
            font-size: 2rem;
        }
        .preview-cover .preview-empty .text {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }
        .preview-cat-badge {
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
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .preview-cat-badge.seni { background: linear-gradient(135deg, #a855f7, #7c3aed); }
        .preview-cat-badge.olahraga { background: linear-gradient(135deg, #10b981, #059669); }
        .preview-cat-badge.pendidikan { background: linear-gradient(135deg, #3b82f6, #2563eb); }
        .preview-cat-badge.alam { background: linear-gradient(135deg, #14b8a6, #0d9488); }
        .preview-cat-badge.kuliner { background: linear-gradient(135deg, #f97316, #ea580c); }

        .preview-body {
            padding: 16px 18px 18px;
        }
        .preview-title {
            font-size: 1rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 6px;
            line-height: 1.3;
        }
        .preview-meta {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.72rem;
            color: #94a3b8;
            font-weight: 600;
            margin-bottom: 8px;
        }
        .preview-desc {
            font-size: 0.8rem;
            color: #64748b;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Benefits */
        .create-benefits {
            position: relative;
            z-index: 2;
            margin-top: 32px;
        }
        .benefit-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 14px;
            font-size: 0.86rem;
            font-weight: 600;
            color: rgba(255,255,255,0.95);
        }
        .benefit-icon {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(8px);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 0.9rem;
        }

        /* ============================================================
           RIGHT PANEL (FORM)
           ============================================================ */
        .create-right {
            flex: 1;
            padding: 48px 56px 80px;
            max-width: 720px;
            margin: 0 auto;
            width: 100%;
        }

        .form-header {
            margin-bottom: 32px;
        }
        .form-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.82rem;
            font-weight: 700;
            color: #64748b;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 999px;
            background: #fff;
            border: 1.5px solid #e8eaf0;
            transition: all 0.2s;
            margin-bottom: 20px;
        }
        .form-back:hover {
            color: #6d28d9;
            border-color: #ddd6fe;
            background: #f5f3ff;
        }
        .form-back svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            stroke-width: 2.5;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .form-title {
            font-size: 1.75rem;
            font-weight: 900;
            letter-spacing: -0.03em;
            color: #0f172a;
            margin-bottom: 6px;
            line-height: 1.2;
        }
        .form-subtitle {
            font-size: 0.9rem;
            color: #64748b;
            font-weight: 500;
            line-height: 1.6;
        }

        /* Alert */
        .form-alert {
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: flex-start;
            gap: 8px;
            animation: shakeIn 0.4s ease;
        }
        @keyframes shakeIn {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-4px); }
            75% { transform: translateX(4px); }
        }
        .form-alert.error {
            background: #fef2f2;
            border: 1.5px solid #fecaca;
            color: #991b1b;
        }

        /* Form group */
        .form-group {
            margin-bottom: 22px;
        }
        .form-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.82rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 8px;
            letter-spacing: 0.01em;
        }
        .form-label .optional {
            font-size: 0.72rem;
            font-weight: 600;
            color: #94a3b8;
            text-transform: none;
            letter-spacing: 0;
        }
        .form-input,
        .form-textarea {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e8eaf0;
            border-radius: 12px;
            font-family: inherit;
            font-size: 0.92rem;
            color: #0f172a;
            font-weight: 500;
            background: #fff;
            transition: all 0.22s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .form-input:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #8b5cf6;
            box-shadow: 0 0 0 4px rgba(139,92,246,0.1);
        }
        .form-input::placeholder,
        .form-textarea::placeholder {
            color: #94a3b8;
            font-weight: 400;
        }
        .form-textarea {
            resize: vertical;
            min-height: 110px;
            line-height: 1.6;
        }
        .form-hint {
            font-size: 0.75rem;
            color: #94a3b8;
            font-weight: 500;
            margin-top: 6px;
            line-height: 1.5;
        }

        /* ============================================================
           CATEGORY PICKER
           ============================================================ */
        .category-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }
        .category-option {
            position: relative;
            cursor: pointer;
        }
        .category-option input[type="radio"] {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }
        .category-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 16px 8px;
            background: #fff;
            border: 2px solid #e8eaf0;
            border-radius: 14px;
            transition: all 0.22s cubic-bezier(0.4, 0, 0.2, 1);
            text-align: center;
        }
        .category-card .cat-emoji {
            font-size: 1.6rem;
            transition: transform 0.3s;
        }
        .category-card .cat-label {
            font-size: 0.74rem;
            font-weight: 800;
            color: #64748b;
            line-height: 1.2;
            transition: color 0.2s;
        }
        .category-option:hover .category-card {
            border-color: #ddd6fe;
            background: #fafaff;
            transform: translateY(-2px);
        }
        .category-option:hover .category-card .cat-emoji {
            transform: scale(1.15);
        }
        .category-option input[type="radio"]:checked + .category-card {
            border-color: transparent;
            color: #fff;
            box-shadow: 0 8px 20px rgba(139,92,246,0.3);
            transform: translateY(-2px);
        }
        .category-option input[type="radio"]:checked + .category-card .cat-label {
            color: #fff;
        }
        .category-option input[type="radio"]:checked + .category-card[data-cat="seni"] {
            background: linear-gradient(135deg, #a855f7, #7c3aed);
        }
        .category-option input[type="radio"]:checked + .category-card[data-cat="olahraga"] {
            background: linear-gradient(135deg, #10b981, #059669);
        }
        .category-option input[type="radio"]:checked + .category-card[data-cat="pendidikan"] {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
        }
        .category-option input[type="radio"]:checked + .category-card[data-cat="alam"] {
            background: linear-gradient(135deg, #14b8a6, #0d9488);
        }
        .category-option input[type="radio"]:checked + .category-card[data-cat="kuliner"] {
            background: linear-gradient(135deg, #f97316, #ea580c);
        }

        /* ============================================================
           COVER PICKER
           ============================================================ */
        .cover-tabs {
            display: flex;
            gap: 4px;
            padding: 4px;
            background: #f5f3ff;
            border-radius: 12px;
            margin-bottom: 12px;
        }
        .cover-tab {
            flex: 1;
            padding: 9px 14px;
            border: none;
            background: transparent;
            font-family: inherit;
            font-size: 0.8rem;
            font-weight: 700;
            color: #64748b;
            border-radius: 9px;
            cursor: pointer;
            transition: all 0.2s;
        }
        .cover-tab.active {
            background: #fff;
            color: #6d28d9;
            box-shadow: 0 2px 8px rgba(139,92,246,0.15);
        }
        .cover-tab-content { display: none; }
        .cover-tab-content.active { display: block; }

        .cover-upload-zone {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 28px 20px;
            border: 2px dashed #c4b5fd;
            border-radius: 14px;
            background: #fafaff;
            cursor: pointer;
            transition: all 0.2s;
            text-align: center;
        }
        .cover-upload-zone:hover {
            background: #f5f3ff;
            border-color: #8b5cf6;
        }
        .cover-upload-zone .icon {
            font-size: 1.8rem;
        }
        .cover-upload-zone .title {
            font-size: 0.88rem;
            font-weight: 800;
            color: #0f172a;
        }
        .cover-upload-zone .hint {
            font-size: 0.72rem;
            color: #94a3b8;
            font-weight: 600;
        }

        /* Cover preview */
        .cover-preview {
            position: relative;
            aspect-ratio: 16 / 9;
            border-radius: 14px;
            overflow: hidden;
            background: linear-gradient(135deg, #f5f3ff, #fce7f3);
            margin-bottom: 12px;
            border: 2px solid #f0e9ff;
        }
        .cover-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .cover-remove {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #dc2626;
            font-size: 1.1rem;
            font-weight: 900;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: all 0.2s;
        }
        .cover-remove:hover {
            background: #fee2e2;
            transform: rotate(90deg);
        }

        /* ============================================================
           SUBMIT
           ============================================================ */
        .submit-row {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1.5px solid #f0e9ff;
            flex-wrap: wrap;
        }
        .btn-cancel {
            padding: 13px 24px;
            background: #fff;
            color: #64748b;
            border: 1.5px solid #e8eaf0;
            border-radius: 12px;
            font-family: inherit;
            font-size: 0.88rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .btn-cancel:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            color: #0f172a;
        }
        .btn-submit {
            padding: 13px 32px;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-family: inherit;
            font-size: 0.9rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.25s;
            box-shadow: 0 8px 24px rgba(139,92,246,0.35);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(139,92,246,0.5);
        }
        .btn-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        /* ============================================================
           MOBILE HEADER (dipakai di HP)
           ============================================================ */
        .mobile-hero {
            display: none;
            position: relative;
            background: linear-gradient(135deg, #7c3aed 0%, #8b5cf6 50%, #ec4899 100%);
            padding: 24px 20px 28px;
            color: #fff;
            border-radius: 0 0 24px 24px;
            overflow: hidden;
        }
        .mobile-hero::before {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
            pointer-events: none;
        }
        .mobile-hero::after {
            content: '';
            position: absolute;
            bottom: -60px;
            left: -30px;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            pointer-events: none;
        }
        .mobile-hero .badge-m {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 999px;
            font-size: 0.65rem;
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 12px;
            position: relative;
            z-index: 2;
        }
        .mobile-hero .badge-m .dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #10b981;
            box-shadow: 0 0 0 2px rgba(16,185,129,0.5);
        }
        .mobile-hero h1 {
            font-size: 1.5rem;
            font-weight: 900;
            letter-spacing: -0.03em;
            line-height: 1.15;
            margin-bottom: 6px;
            position: relative;
            z-index: 2;
        }
        .mobile-hero h1 em {
            font-style: normal;
            display: inline-block;
            position: relative;
        }
        .mobile-hero h1 em::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: 2px;
            height: 6px;
            background: rgba(255,255,255,0.3);
            border-radius: 3px;
            z-index: -1;
        }
        .mobile-hero p {
            font-size: 0.82rem;
            color: rgba(255,255,255,0.9);
            font-weight: 500;
            line-height: 1.5;
            position: relative;
            z-index: 2;
        }

        /* Mobile preview - collapsible */
        .mobile-preview-toggle {
            display: none;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px;
            background: #fff;
            border: 1.5px solid #e8eaf0;
            border-radius: 12px;
            margin: 16px 16px 0;
            cursor: pointer;
            transition: all 0.2s;
            font-family: inherit;
        }
        .mobile-preview-toggle:hover {
            border-color: #c4b5fd;
            background: #fafaff;
        }
        .mobile-preview-toggle .left {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            font-weight: 800;
            color: #1e293b;
        }
        .mobile-preview-toggle .left .icon {
            font-size: 1.1rem;
        }
        .mobile-preview-toggle .arrow {
            font-size: 0.85rem;
            color: #94a3b8;
            transition: transform 0.3s;
        }
        .mobile-preview-toggle.open .arrow {
            transform: rotate(180deg);
        }

        .mobile-preview-body {
            display: none;
            padding: 0 16px;
            animation: slideDown 0.3s ease;
        }
        .mobile-preview-body.open {
            display: block;
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @media (max-width: 1024px) {
            .create-left { flex: 0 0 40%; padding: 48px 32px; }
            .create-headline { font-size: 2rem; }
            .create-right { padding: 40px 32px 70px; }
        }

        @media (max-width: 768px) {
            .create-page {
                flex-direction: column;
                min-height: auto;
            }
            .create-left {
                display: none;
            }
            .mobile-hero {
                display: block;
            }
            .mobile-preview-toggle {
                display: flex;
            }

            .create-right {
                padding: 20px 16px 60px;
                max-width: 100%;
            }

            .form-header {
                margin-bottom: 24px;
            }
            .form-back {
                font-size: 0.78rem;
                padding: 7px 12px;
                margin-bottom: 16px;
            }
            .form-title {
                font-size: 1.35rem;
            }
            .form-subtitle {
                font-size: 0.84rem;
            }

            .form-group {
                margin-bottom: 18px;
            }
            .form-label {
                font-size: 0.78rem;
                margin-bottom: 6px;
            }
            .form-input,
            .form-textarea {
                padding: 12px 14px;
                font-size: 16px; /* prevent iOS zoom */
                border-radius: 11px;
            }
            .form-textarea {
                min-height: 100px;
            }
            .form-hint {
                font-size: 0.72rem;
            }

            /* Category: 2 kolom */
            .category-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 8px;
            }
            .category-card {
                padding: 14px 10px;
                border-radius: 12px;
            }
            .category-card .cat-emoji {
                font-size: 1.4rem;
            }
            .category-card .cat-label {
                font-size: 0.72rem;
            }

            /* Cover tabs */
            .cover-tabs {
                padding: 3px;
                border-radius: 10px;
                margin-bottom: 10px;
            }
            .cover-tab {
                padding: 8px 12px;
                font-size: 0.76rem;
                border-radius: 8px;
            }
            .cover-upload-zone {
                padding: 22px 16px;
                border-radius: 12px;
            }
            .cover-upload-zone .icon {
                font-size: 1.6rem;
            }
            .cover-upload-zone .title {
                font-size: 0.84rem;
            }
            .cover-upload-zone .hint {
                font-size: 0.7rem;
            }
            .cover-preview {
                border-radius: 12px;
            }

            /* Submit */
            .submit-row {
                flex-direction: column-reverse;
                gap: 8px;
                margin-top: 24px;
                padding-top: 20px;
            }
            .btn-cancel,
            .btn-submit {
                width: 100%;
                padding: 14px 20px;
                font-size: 0.88rem;
            }
        }

        @media (max-width: 380px) {
            .mobile-hero h1 {
                font-size: 1.3rem;
            }
            .form-title {
                font-size: 1.2rem;
            }
            .category-card .cat-emoji {
                font-size: 1.25rem;
            }
        }

        /* ============================================================
           ANIMATIONS
           ============================================================ */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .form-group {
            animation: fadeUp 0.4s ease both;
        }
        .form-group:nth-child(1) { animation-delay: 0.05s; }
        .form-group:nth-child(2) { animation-delay: 0.1s; }
        .form-group:nth-child(3) { animation-delay: 0.15s; }
        .form-group:nth-child(4) { animation-delay: 0.2s; }
    </style>
</head>
<body>

    @include('partials.navbar', ['active' => null])

    <main class="create-page">

        <!-- ============================================================
             MOBILE HERO (only on HP)
             ============================================================ -->
        <div class="mobile-hero">
            <div class="badge-m">
                <span class="dot"></span>
                <span>Pengajuan Komunitas</span>
            </div>
            <h1>Wujudkan <em>komunitas</em> impianmu</h1>
            <p>Bagikan ide, kumpulkan teman, ciptakan ruang kreatif di Pidie.</p>
        </div>

        <!-- Mobile preview toggle -->
        <button type="button" class="mobile-preview-toggle" onclick="toggleMobilePreview(this)">
            <span class="left">
                <span class="icon">👁️</span>
                <span>Lihat Preview</span>
            </span>
            <span class="arrow">▼</span>
        </button>
        <div class="mobile-preview-body" id="mobilePreviewBody">
            <div class="preview-card" style="max-width:100%; animation:none; margin: 16px 0;">
                <div class="preview-cover">
                    <img id="previewCoverImgMobile" src="" alt="" style="display:none;">
                    <div class="preview-empty" id="previewEmptyMobile">
                        <div class="icon">🖼️</div>
                        <div class="text">Cover komunitas</div>
                    </div>
                    <span class="preview-cat-badge" id="previewCatBadgeMobile" style="display:none;">Kategori</span>
                </div>
                <div class="preview-body">
                    <div class="preview-title" id="previewTitleMobile">Nama Komunitas</div>
                    <div class="preview-meta">
                        <span>👥 1 anggota</span>
                        <span>📍 Pidie</span>
                    </div>
                    <div class="preview-desc" id="previewDescMobile">
                        Deskripsi komunitas akan tampil di sini...
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================
             LEFT PANEL (DESKTOP)
             ============================================================ -->
        <aside class="create-left">
            <div class="create-left-top">
                <div class="create-badge">
                    <span class="dot"></span>
                    <span>Pengajuan Komunitas</span>
                </div>

                <h1 class="create-headline">
                    Wujudkan<br>
                    <em>komunitas</em> impianmu
                </h1>

                <p class="create-desc">
                    Bagikan ide, kumpulkan teman, dan ciptakan ruang kreatif di Pidie. Kami akan review pengajuanmu dalam 1×24 jam.
                </p>

                <div class="preview-label">Live Preview</div>
                <div class="preview-card">
                    <div class="preview-cover">
                        <img id="previewCoverImg" src="" alt="" style="display:none;">
                        <div class="preview-empty" id="previewEmpty">
                            <div class="icon">🖼️</div>
                            <div class="text">Cover komunitas</div>
                        </div>
                        <span class="preview-cat-badge" id="previewCatBadge" style="display:none;">Kategori</span>
                    </div>
                    <div class="preview-body">
                        <div class="preview-title" id="previewTitle">Nama Komunitas</div>
                        <div class="preview-meta">
                            <span>👥 1 anggota</span>
                            <span>📍 Pidie</span>
                        </div>
                        <div class="preview-desc" id="previewDesc">
                            Deskripsi komunitas akan tampil di sini...
                        </div>
                    </div>
                </div>
            </div>

            <div class="create-benefits">
                <div class="benefit-item">
                    <div class="benefit-icon">⚡</div>
                    <span>Review cepat dalam 1×24 jam</span>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">🎯</div>
                    <span>Tampil di halaman publik otomatis</span>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">🛡️</div>
                    <span>Kelola anggota & kegiatan sendiri</span>
                </div>
            </div>
        </aside>

        <!-- ============================================================
             RIGHT PANEL (FORM)
             ============================================================ -->
        <section class="create-right">

            <div class="form-header">
                <a href="{{ route('profil') }}" class="form-back">
                    <svg viewBox="0 0 24 24">
                        <line x1="19" y1="12" x2="5" y2="12"/>
                        <polyline points="12 19 5 12 12 5"/>
                    </svg>
                    Kembali
                </a>
                <h2 class="form-title">Buat komunitas baru</h2>
                <p class="form-subtitle">Isi data di bawah ini dengan lengkap. Semua kolom bertanda * wajib diisi.</p>
            </div>

            @if(session('error'))
                <div class="form-alert error">
                    <span>❌</span>
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            @if($errors->any())
                <div class="form-alert error">
                    <span>❌</span>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('buat-komunitas.post') }}" id="createForm">
                @csrf

                <!-- NAMA -->
                <div class="form-group">
                    <label class="form-label">
                        <span>Nama Komunitas <span style="color:#dc2626;">*</span></span>
                        <span class="optional" id="charCount">0/100</span>
                    </label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Komunitas Catur Pidie"
                        class="form-input"
                        required
                        maxlength="100"
                        id="nameInput"
                    >
                    <div class="form-hint">Nama yang menarik dan mudah diingat akan lebih banyak menarik anggota.</div>
                </div>

                <!-- KATEGORI -->
                <div class="form-group">
                    <label class="form-label">
                        <span>Kategori <span style="color:#dc2626;">*</span></span>
                    </label>
                    <div class="category-grid">
                        <label class="category-option">
                            <input type="radio" name="category" value="seni" {{ old('category') == 'seni' ? 'checked' : '' }} required>
                            <div class="category-card" data-cat="seni">
                                <span class="cat-emoji">🎨</span>
                                <span class="cat-label">Seni</span>
                            </div>
                        </label>
                        <label class="category-option">
                            <input type="radio" name="category" value="olahraga" {{ old('category') == 'olahraga' ? 'checked' : '' }}>
                            <div class="category-card" data-cat="olahraga">
                                <span class="cat-emoji">⚽</span>
                                <span class="cat-label">Olahraga</span>
                            </div>
                        </label>
                        <label class="category-option">
                            <input type="radio" name="category" value="pendidikan" {{ old('category') == 'pendidikan' ? 'checked' : '' }}>
                            <div class="category-card" data-cat="pendidikan">
                                <span class="cat-emoji">📖</span>
                                <span class="cat-label">Pendidikan</span>
                            </div>
                        </label>
                        <label class="category-option">
                            <input type="radio" name="category" value="alam" {{ old('category') == 'alam' ? 'checked' : '' }}>
                            <div class="category-card" data-cat="alam">
                                <span class="cat-emoji">🌿</span>
                                <span class="cat-label">Alam</span>
                            </div>
                        </label>
                        <label class="category-option">
                            <input type="radio" name="category" value="kuliner" {{ old('category') == 'kuliner' ? 'checked' : '' }}>
                            <div class="category-card" data-cat="kuliner">
                                <span class="cat-emoji">🍜</span>
                                <span class="cat-label">Kuliner</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- DESKRIPSI -->
                <div class="form-group">
                    <label class="form-label">
                        <span>Deskripsi Komunitas <span style="color:#dc2626;">*</span></span>
                        <span class="optional" id="descCount">0/500</span>
                    </label>
                    <textarea
                        name="description"
                        placeholder="Ceritakan tentang komunitasmu: tujuan, kegiatan, siapa yang bisa bergabung..."
                        class="form-textarea"
                        required
                        maxlength="500"
                        id="descInput"
                    >{{ old('description') }}</textarea>
                    <div class="form-hint">Minimal 10 karakter. Semakin jelas deskripsi, semakin banyak yang tertarik bergabung.</div>
                </div>

                <!-- COVER -->
                <div class="form-group">
                    <label class="form-label">
                        <span>Foto Cover</span>
                        <span class="optional">Opsional</span>
                    </label>

                    <!-- Preview -->
                    <div class="cover-preview" id="coverPreview" style="display:none;">
                        <img id="coverPreviewImg" src="" alt="">
                        <button type="button" class="cover-remove" onclick="removeCover()" title="Hapus">×</button>
                    </div>

                    <!-- Tabs -->
                    <div class="cover-tabs">
                        <button type="button" class="cover-tab active" onclick="switchCoverMode('url', event)">🔗 Pakai URL</button>
                        <button type="button" class="cover-tab" onclick="switchCoverMode('upload', event)">📱 Upload File</button>
                    </div>

                    <!-- URL mode -->
                    <div class="cover-tab-content active" id="cover-url-mode">
                        <input
                            type="url"
                            name="cover"
                            id="coverUrlInput"
                            placeholder="https://contoh.com/foto-cover.jpg"
                            class="form-input"
                            value="{{ old('cover') }}"
                        >
                        <div class="form-hint">Tempel URL foto dari internet (Pinterest, Google, dll).</div>
                    </div>

                    <!-- Upload mode -->
                    <div class="cover-tab-content" id="cover-upload-mode">
                        <label for="coverFile" class="cover-upload-zone">
                            <span class="icon">📷</span>
                            <span class="title">Pilih foto dari galeri</span>
                            <span class="hint">JPG, PNG · Maks 3MB</span>
                        </label>
                        <input
                            type="file"
                            id="coverFile"
                            accept="image/jpeg,image/jpg,image/png,image/webp"
                            style="display:none;"
                            onchange="handleFileUpload(event)"
                        >
                        <div class="form-hint" id="uploadHint">Foto akan diupload setelah kamu submit form.</div>
                    </div>
                </div>

                <!-- SUBMIT -->
                <div class="submit-row">
                    <a href="{{ route('profil') }}" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-submit" id="submitBtn">
                        <span>📩</span>
                        <span>Ajukan Komunitas</span>
                    </button>
                </div>

            </form>

        </section>
    </main>

    <script>
        // ---------- LIVE PREVIEW (desktop & mobile) ----------
        const nameInput = document.getElementById('nameInput');
        const descInput = document.getElementById('descInput');
        const nameCount = document.getElementById('charCount');
        const descCount = document.getElementById('descCount');

        // Preview elements (desktop + mobile)
        const previewTitle = document.getElementById('previewTitle');
        const previewDesc = document.getElementById('previewDesc');
        const previewTitleMobile = document.getElementById('previewTitleMobile');
        const previewDescMobile = document.getElementById('previewDescMobile');

        nameInput.addEventListener('input', function () {
            const val = this.value.trim();
            nameCount.textContent = val.length + '/100';
            const display = val || 'Nama Komunitas';
            if (previewTitle) previewTitle.textContent = display;
            if (previewTitleMobile) previewTitleMobile.textContent = display;
        });

        descInput.addEventListener('input', function () {
            const val = this.value.trim();
            descCount.textContent = val.length + '/500';
            const display = val || 'Deskripsi komunitas akan tampil di sini...';
            if (previewDesc) previewDesc.textContent = display;
            if (previewDescMobile) previewDescMobile.textContent = display;
        });

        // Init on load
        if (nameInput.value) {
            nameCount.textContent = nameInput.value.length + '/100';
            if (previewTitle) previewTitle.textContent = nameInput.value;
            if (previewTitleMobile) previewTitleMobile.textContent = nameInput.value;
        }
        if (descInput.value) {
            descCount.textContent = descInput.value.length + '/500';
            if (previewDesc) previewDesc.textContent = descInput.value;
            if (previewDescMobile) previewDescMobile.textContent = descInput.value;
        }

        // ---------- PREVIEW CATEGORY ----------
        const previewCatBadge = document.getElementById('previewCatBadge');
        const previewCatBadgeMobile = document.getElementById('previewCatBadgeMobile');
        const catRadios = document.querySelectorAll('input[name="category"]');
        const catNames = {
            seni: 'Seni',
            olahraga: 'Olahraga',
            pendidikan: 'Pendidikan',
            alam: 'Alam',
            kuliner: 'Kuliner'
        };

        catRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.checked) {
                    const label = catNames[this.value];
                    if (previewCatBadge) {
                        previewCatBadge.textContent = label;
                        previewCatBadge.className = 'preview-cat-badge ' + this.value;
                        previewCatBadge.style.display = 'inline-block';
                    }
                    if (previewCatBadgeMobile) {
                        previewCatBadgeMobile.textContent = label;
                        previewCatBadgeMobile.className = 'preview-cat-badge ' + this.value;
                        previewCatBadgeMobile.style.display = 'inline-block';
                    }
                }
            });
            if (radio.checked) {
                const label = catNames[radio.value];
                if (previewCatBadge) {
                    previewCatBadge.textContent = label;
                    previewCatBadge.className = 'preview-cat-badge ' + radio.value;
                    previewCatBadge.style.display = 'inline-block';
                }
                if (previewCatBadgeMobile) {
                    previewCatBadgeMobile.textContent = label;
                    previewCatBadgeMobile.className = 'preview-cat-badge ' + radio.value;
                    previewCatBadgeMobile.style.display = 'inline-block';
                }
            }
        });

        // ---------- COVER PREVIEW ----------
        const coverPreview = document.getElementById('coverPreview');
        const coverPreviewImg = document.getElementById('coverPreviewImg');
        const previewCoverImg = document.getElementById('previewCoverImg');
        const previewEmpty = document.getElementById('previewEmpty');
        const previewCoverImgMobile = document.getElementById('previewCoverImgMobile');
        const previewEmptyMobile = document.getElementById('previewEmptyMobile');
        const coverUrlInput = document.getElementById('coverUrlInput');

        function setCover(src) {
            if (!src) {
                coverPreview.style.display = 'none';
                coverPreviewImg.src = '';
                if (previewCoverImg) {
                    previewCoverImg.style.display = 'none';
                    previewCoverImg.src = '';
                }
                if (previewEmpty) previewEmpty.style.display = 'flex';
                if (previewCoverImgMobile) {
                    previewCoverImgMobile.style.display = 'none';
                    previewCoverImgMobile.src = '';
                }
                if (previewEmptyMobile) previewEmptyMobile.style.display = 'flex';
                return;
            }
            coverPreview.style.display = 'block';
            coverPreviewImg.src = src;

            if (previewCoverImg) {
                previewCoverImg.src = src;
                previewCoverImg.style.display = 'block';
            }
            if (previewEmpty) previewEmpty.style.display = 'none';

            if (previewCoverImgMobile) {
                previewCoverImgMobile.src = src;
                previewCoverImgMobile.style.display = 'block';
            }
            if (previewEmptyMobile) previewEmptyMobile.style.display = 'none';
        }

        function removeCover() {
            setCover('');
            coverUrlInput.value = '';
            document.getElementById('coverFile').value = '';
        }

        coverUrlInput.addEventListener('input', function () {
            setCover(this.value.trim());
        });

        if (coverUrlInput.value) {
            setCover(coverUrlInput.value);
        }

        // ---------- COVER: FILE UPLOAD ----------
        function handleFileUpload(event) {
            const file = event.target.files[0];
            if (!file) return;

            if (file.size > 3 * 1024 * 1024) {
                alert('⚠️ Ukuran foto terlalu besar. Maksimal 3MB.');
                event.target.value = '';
                return;
            }
            if (!file.type.match('image.*')) {
                alert('⚠️ File harus berupa gambar.');
                event.target.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function (e) {
                setCover(e.target.result);
            };
            reader.readAsDataURL(file);
        }

        // ---------- COVER TABS ----------
        function switchCoverMode(mode, event) {
            document.querySelectorAll('.cover-tab').forEach(t => t.classList.remove('active'));
            event.target.closest('.cover-tab').classList.add('active');
            document.querySelectorAll('.cover-tab-content').forEach(c => c.classList.remove('active'));
            document.getElementById('cover-' + mode + '-mode').classList.add('active');
        }

        // ---------- MOBILE PREVIEW TOGGLE ----------
        function toggleMobilePreview(btn) {
            const body = document.getElementById('mobilePreviewBody');
            btn.classList.toggle('open');
            body.classList.toggle('open');
        }

        // ---------- SUBMIT ----------
        document.getElementById('createForm').addEventListener('submit', function (e) {
            if (!document.querySelector('input[name="category"]:checked')) {
                e.preventDefault();
                alert('⚠️ Pilih kategori terlebih dahulu.');
                return;
            }

            const btn = document.getElementById('submitBtn');
            btn.disabled = true;
            btn.innerHTML = '<span>⏳</span><span>Mengirim...</span>';
        });
    </script>

</body>
</html>