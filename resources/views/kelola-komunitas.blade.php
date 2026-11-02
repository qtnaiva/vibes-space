@php $slug = $slug ?? $community->slug ?? ''; @endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Kelola Komunitas — Vibes Space Pidie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .kelola-page { padding: 20px 0 100px; background: #fafaff; min-height: 100vh; }
        .kelola-container { max-width: 1080px; margin: 0 auto; padding: 0 24px; }
        @media (max-width: 640px) { .kelola-container { padding: 0 14px; } }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            background: #fff;
            border: 1.5px solid #e8eaf0;
            border-radius: 999px;
            font-family: inherit;
            font-size: 0.8rem;
            font-weight: 700;
            color: #64748b;
            text-decoration: none;
            transition: all 0.2s;
            margin-bottom: 16px;
        }
        .back-btn:hover { color: #6d28d9; border-color: #ddd6fe; background: #f5f3ff; }
        .back-btn svg { width: 14px; height: 14px; stroke: currentColor; stroke-width: 2.5; fill: none; stroke-linecap: round; stroke-linejoin: round; }

        .comm-hero { background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 8px 32px rgba(139,92,246,0.10); border: 1px solid #f0e9ff; margin-bottom: 20px; position: relative; }
        .comm-cover-wrap {
            position: relative;
            width: 100%;
            aspect-ratio: 21 / 8;
            background: linear-gradient(135deg, #f5f3ff, #fce7f3);
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .comm-cover-wrap img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
            display: block;
        }
        .comm-cover-wrap::after { content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, transparent 60%, rgba(0,0,0,0.3)); pointer-events: none; }
        .comm-cover-edit { position: absolute; bottom: 12px; right: 12px; padding: 7px 14px; background: rgba(255,255,255,0.95); color: #6d28d9; border: none; border-radius: 999px; font-size: 0.72rem; font-weight: 800; cursor: pointer; display: inline-flex; align-items: center; gap: 5px; box-shadow: 0 4px 16px rgba(0,0,0,0.15); transition: all 0.2s; font-family: inherit; z-index: 3; backdrop-filter: blur(10px); }
        .comm-cover-edit:hover { background: #fff; transform: translateY(-1px); }

        .comm-info { padding: 22px 24px; position: relative; }
        .btn-edit-hero { position: absolute; top: 18px; right: 20px; display: inline-flex; align-items: center; gap: 5px; padding: 7px 14px; background: linear-gradient(135deg, #8b5cf6, #ec4899); color: #fff; border: none; border-radius: 999px; font-size: 0.72rem; font-weight: 800; font-family: inherit; cursor: pointer; box-shadow: 0 4px 14px rgba(139,92,246,0.3); transition: all 0.2s; z-index: 4; }
        .comm-tag-row { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-bottom: 10px; padding-right: 100px; }
        .comm-tag { display: inline-block; padding: 4px 12px; border-radius: 999px; font-size: 0.68rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; background: #f3e8ff; color: #7c3aed; }
        .comm-title-big { font-size: 1.6rem; font-weight: 900; letter-spacing: -0.03em; line-height: 1.2; margin-bottom: 8px; color: #0f172a; padding-right: 100px; }
        .comm-meta-line { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; color: #64748b; font-size: 0.8rem; font-weight: 600; margin-bottom: 12px; }
        .comm-meta-line span { display: inline-flex; align-items: center; gap: 4px; }
        .comm-desc-text { color: #475569; font-size: 0.88rem; line-height: 1.65; margin-bottom: 16px; max-width: 780px; }
        .comm-actions-row { display: flex; gap: 8px; flex-wrap: wrap; }
        .btn-secondary { display: inline-flex; align-items: center; gap: 6px; padding: 9px 18px; background: #f5f3ff; color: #6d28d9; border: 1.5px solid #ddd6fe; border-radius: 999px; font-family: inherit; font-size: 0.8rem; font-weight: 700; cursor: pointer; transition: all 0.2s; text-decoration: none; }
        .btn-secondary:hover { background: #ede9fe; border-color: #8b5cf6; }
        .btn-danger-outline { display: inline-flex; align-items: center; gap: 6px; padding: 9px 18px; background: #fff; color: #dc2626; border: 1.5px solid #fecaca; border-radius: 999px; font-family: inherit; font-size: 0.8rem; font-weight: 700; cursor: pointer; transition: all 0.2s; }
        .btn-danger-outline:hover { background: #fef2f2; border-color: #dc2626; }

        .kelola-tabs { display: flex; gap: 6px; margin-bottom: 20px; padding: 5px; background: #fff; border-radius: 14px; border: 1px solid #f0e9ff; box-shadow: 0 2px 8px rgba(139,92,246,0.04); }
        .kelola-tab { flex: 1; padding: 10px 18px; border: none; background: transparent; font-family: inherit; font-weight: 700; font-size: 0.82rem; color: #64748b; border-radius: 10px; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; gap: 6px; white-space: nowrap; transition: all 0.25s; }
        .kelola-tab:hover { background: #f5f3ff; color: #6d28d9; }
        .kelola-tab.active { background: linear-gradient(135deg, #8b5cf6, #ec4899); color: #fff; box-shadow: 0 4px 14px rgba(139,92,246,0.3); }
        .kelola-panel { animation: fadeSlide 0.35s; }
        @keyframes fadeSlide { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        .events-section-head { display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-bottom: 14px; flex-wrap: wrap; }
        .events-section-title { display: flex; align-items: center; gap: 10px; }
        .events-section-title h3 { font-size: 1.05rem; font-weight: 800; color: #0f172a; margin: 0; }
        .events-section-title small { font-size: 0.75rem; color: #94a3b8; font-weight: 600; }
        .btn-add-event {
            display: inline-flex; align-items: center; gap: 5px;
            padding: 8px 16px;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff; border: none; border-radius: 999px;
            font-family: inherit; font-size: 0.78rem; font-weight: 800;
            cursor: pointer; box-shadow: 0 4px 14px rgba(139,92,246,0.3);
            transition: all 0.2s; white-space: nowrap;
        }
        .btn-add-event:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(139,92,246,0.4); }
        .btn-add-event svg { width: 13px; height: 13px; stroke: currentColor; stroke-width: 2.5; fill: none; stroke-linecap: round; stroke-linejoin: round; }

        .events-empty { text-align: center; padding: 40px 20px; background: #fff; border-radius: 16px; border: 2px dashed #ddd6fe; }
        .events-empty-icon { font-size: 2.8rem; margin-bottom: 10px; opacity: 0.5; display: block; }
        .events-empty h4 { font-size: 0.95rem; font-weight: 800; color: #0f172a; margin-bottom: 4px; }
        .events-empty p { font-size: 0.8rem; color: #94a3b8; font-weight: 500; margin: 0; max-width: 340px; margin-left: auto; margin-right: auto; line-height: 1.5; }

        .section-head-kelola { display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-bottom: 14px; flex-wrap: wrap; }
        .section-head-kelola h3 { font-size: 1.05rem; font-weight: 800; color: #0f172a; display: flex; align-items: center; gap: 8px; margin: 0; }
        .result-info { font-size: 0.78rem; color: #64748b; font-weight: 600; }
        .members-list-modern { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 10px; }
        .member-item { display: flex; align-items: center; gap: 12px; padding: 12px 14px; background: #fff; border: 1.5px solid #f0e9ff; border-radius: 12px; transition: all 0.22s; }
        .member-item:hover { border-color: #ddd6fe; box-shadow: 0 4px 16px rgba(139,92,246,0.08); background: #fafaff; }
        .member-item-avatar { width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, #8b5cf6, #ec4899); color: #fff; display: grid; place-items: center; font-weight: 800; font-size: 0.9rem; flex-shrink: 0; border: 2px solid #fff; box-shadow: 0 2px 6px rgba(139,92,246,0.2); overflow: hidden; }
        .member-item-avatar img { width: 100%; height: 100%; object-fit: cover; }
        .member-item-info { flex: 1; min-width: 0; }
        .member-item-info h5 { font-size: 0.86rem; font-weight: 800; color: #0f172a; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-bottom: 1px; }
        .member-item-info p { font-size: 0.7rem; color: #64748b; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin: 0; }
        .member-role-badge { font-size: 0.62rem; font-weight: 800; padding: 3px 8px; border-radius: 999px; white-space: nowrap; flex-shrink: 0; }
        .role-pembuat { background: #f5f3ff; color: #6d28d9; }
        .role-anggota { background: #dbeafe; color: #1d4ed8; }

        .empty-filter { text-align: center; padding: 30px 20px; background: #fff; border-radius: 14px; border: 2px dashed #ddd6fe; }
        .empty-filter .empty-icon { font-size: 2rem; margin-bottom: 8px; opacity: 0.6; }
        .empty-filter h4 { font-size: 0.9rem; font-weight: 800; color: #0f172a; margin-bottom: 3px; }
        .empty-filter p { font-size: 0.78rem; color: #94a3b8; font-weight: 500; margin: 0; }

        /* ============================================================
           MODAL — FIXED STRUCTURE: HEADER + BODY(SCROLL) + FOOTER
           ============================================================ */
        .modal-overlay-custom {
            position: fixed;
            inset: 0;
            background: rgba(15,23,42,0.72);
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
        .modal-overlay-custom.show { display: flex; opacity: 1; }

        .modal-box-custom {
            background: #fff;
            border-radius: 24px;
            width: 100%;
            max-width: 540px;
            box-shadow: 0 32px 80px rgba(15,23,42,0.35);
            animation: slideUpModal 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            max-height: calc(100vh - 40px);
            max-height: calc(100dvh - 40px);
            height: auto;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        @keyframes slideUpModal { from { transform: translateY(40px) scale(0.96); opacity: 0; } to { transform: translateY(0) scale(1); opacity: 1; } }

        .modal-header-custom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 20px 24px;
            border-bottom: 1px solid #f1f5f9;
            flex-shrink: 0;
        }
        .modal-header-custom h3 { font-size: 1.1rem; font-weight: 900; color: #0f172a; display: flex; align-items: center; gap: 8px; letter-spacing: -0.02em; }
        .modal-close-custom { width: 36px; height: 36px; border-radius: 50%; background: #f5f3ff; color: #6d28d9; border: none; font-size: 1.3rem; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.22s; flex-shrink: 0; line-height: 1; }
        .modal-close-custom:hover { background: #fee2e2; color: #dc2626; transform: rotate(90deg); }

        .modal-body-custom {
            padding: 24px;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
            flex: 1 1 auto;
            min-height: 0;
        }
        .modal-body-custom::-webkit-scrollbar { width: 8px; }
        .modal-body-custom::-webkit-scrollbar-track { background: transparent; }
        .modal-body-custom::-webkit-scrollbar-thumb { background: #ddd6fe; border-radius: 4px; }
        .modal-body-custom::-webkit-scrollbar-thumb:hover { background: #c4b5fd; }

        .modal-footer-custom {
            padding: 12px 20px;
            border-top: 1px solid #f1f5f9;
            background: #fafbff;
            flex-shrink: 0;
            display: flex;
            gap: 6px;
            justify-content: flex-end;
            flex-wrap: wrap;
        }

        .form-field { margin-bottom: 16px; }
        .form-field label { display: block; font-size: 0.8rem; font-weight: 700; color: #334155; margin-bottom: 6px; }
        .form-field input[type="text"], .form-field input[type="url"], .form-field textarea { width: 100%; padding: 11px 14px; border: 1.5px solid #e8eaf0; border-radius: 10px; font-family: inherit; font-size: 0.88rem; color: #0f172a; background: #fafaff; transition: all 0.2s; line-height: 1.5; }
        .form-field input:focus, .form-field textarea:focus { outline: none; border-color: #8b5cf6; background: #fff; box-shadow: 0 0 0 3px rgba(139,92,246,0.1); }
        .form-field textarea { resize: vertical; min-height: 60px; }
        .form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
        .field-hint { font-size: 0.7rem; color: #94a3b8; font-weight: 500; margin-top: 4px; line-height: 1.4; }

        .maps-field-wrap { display: flex; gap: 6px; align-items: stretch; }
        .maps-field-wrap input { flex: 1; min-width: 0; }
        .btn-maps-helper { display: inline-flex; align-items: center; justify-content: center; gap: 5px; padding: 0 16px; background: linear-gradient(135deg, #3b82f6, #2563eb); color: #fff; border: none; border-radius: 10px; font-family: inherit; font-size: 0.78rem; font-weight: 800; cursor: pointer; white-space: nowrap; transition: all 0.2s; box-shadow: 0 4px 12px rgba(59,130,246,0.3); flex-shrink: 0; }
        .btn-maps-helper:hover { transform: translateY(-1px); box-shadow: 0 6px 16px rgba(59,130,246,0.4); }
        .btn-maps-helper svg { width: 14px; height: 14px; stroke: currentColor; stroke-width: 2.5; fill: none; stroke-linecap: round; stroke-linejoin: round; flex-shrink: 0; }

        .cover-tabs { display: flex; gap: 5px; background: #f5f3ff; padding: 4px; border-radius: 10px; margin-bottom: 12px; }
        .cover-tab { flex: 1; padding: 8px 12px; border: none; background: transparent; font-family: inherit; font-size: 0.78rem; font-weight: 700; color: #64748b; border-radius: 7px; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; gap: 5px; transition: all 0.2s; }
        .cover-tab.active { background: #fff; color: #6d28d9; box-shadow: 0 2px 6px rgba(139,92,246,0.12); }
        .cover-tab-content { display: none; }
        .cover-tab-content.active { display: block; }
        .upload-btn-big { display: flex; align-items: center; justify-content: center; gap: 8px; padding: 16px; border: 2px dashed #c4b5fd; background: #fafaff; border-radius: 12px; color: #6d28d9; font-family: inherit; font-size: 0.85rem; font-weight: 700; cursor: pointer; transition: all 0.2s; width: 100%; }
        .upload-btn-big:hover { background: #f5f3ff; border-color: #8b5cf6; }

        .btn-save {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 7px 14px;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-family: inherit;
            font-size: 0.76rem;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 3px 10px rgba(139,92,246,0.25);
            transition: all 0.2s;
            line-height: 1.3;
        }
        .btn-save:hover { transform: translateY(-1px); box-shadow: 0 5px 14px rgba(139,92,246,0.4); }
        .btn-save svg { width: 12px; height: 12px; }

        .modal-footer-custom .btn-secondary {
            padding: 7px 14px;
            font-size: 0.76rem;
            border-radius: 8px;
            line-height: 1.3;
        }

        /* ============================================================
           EVENT MODAL
           ============================================================ */
        .event-modal { max-width: 620px; }
        .event-modal .modal-header-custom {
            background: linear-gradient(135deg, #7c3aed 0%, #8b5cf6 50%, #ec4899 100%);
            border-bottom: none;
            padding: 22px 26px;
            position: relative;
            overflow: hidden;
        }
        .event-modal .modal-header-custom::before {
            content: '';
            position: absolute;
            top: -40px; right: -40px;
            width: 140px; height: 140px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.18) 0%, transparent 70%);
            pointer-events: none;
        }
        .event-modal .modal-header-custom h3 { color: #fff; font-size: 1.15rem; position: relative; z-index: 2; }
        .event-modal .modal-header-custom h3 svg { width: 20px; height: 20px; stroke: #fff; stroke-width: 2.5; fill: none; stroke-linecap: round; stroke-linejoin: round; }
        .event-modal .modal-close-custom { background: rgba(255,255,255,0.2); color: #fff; border: 1px solid rgba(255,255,255,0.3); position: relative; z-index: 2; }
        .event-modal .modal-close-custom:hover { background: rgba(239,68,68,0.9); color: #fff; }

        .event-section { margin-bottom: 24px; }
        .event-section:last-child { margin-bottom: 0; }
        .event-section-head {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            padding-bottom: 10px;
            border-bottom: 1px dashed #ede9fe;
        }
        .event-section-icon {
            width: 28px; height: 28px;
            border-radius: 8px;
            background: linear-gradient(135deg, #f5f3ff, #ede9fe);
            display: grid;
            place-items: center;
            font-size: 0.85rem;
            flex-shrink: 0;
        }
        .event-section-title {
            font-size: 0.78rem;
            font-weight: 800;
            color: #6d28d9;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        /* ============================================================
           CUSTOM PICKER (DROPDOWN) — GLOBAL
           ============================================================ */
        .custom-picker { position: relative; width: 100%; }
        .custom-picker-trigger {
            width: 100%;
            padding: 12px 32px 12px 14px;
            border: 1.5px solid #e8eaf0;
            border-radius: 11px;
            font-family: inherit;
            font-size: 0.88rem;
            font-weight: 700;
            color: #0f172a;
            background: #fafaff;
            cursor: pointer;
            text-align: left;
            transition: all 0.22s;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            line-height: 1.4;
        }
        .custom-picker-trigger:hover { border-color: #c4b5fd; background: #fff; }
        .custom-picker-trigger.open { border-color: #8b5cf6; background: #fff; box-shadow: 0 0 0 4px rgba(139,92,246,0.12); }
        .custom-picker-trigger .picker-value { flex: 1; min-width: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .custom-picker-trigger .picker-value.placeholder { color: #94a3b8; font-weight: 600; }
        .custom-picker-chevron {
            width: 12px; height: 12px;
            stroke: #8b5cf6;
            stroke-width: 2.5;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            transition: transform 0.2s;
            flex-shrink: 0;
        }
        .custom-picker-trigger.open .custom-picker-chevron { transform: rotate(180deg); }

        .custom-picker-menu {
            position: absolute;
            top: calc(100% + 6px);
            left: 0;
            right: 0;
            background: #fff;
            border: 1.5px solid #ddd6fe;
            border-radius: 12px;
            box-shadow: 0 12px 32px rgba(139,92,246,0.18);
            max-height: 220px;
            overflow-y: auto;
            z-index: 120;
            display: none;
            padding: 6px;
            -webkit-overflow-scrolling: touch;
        }
        .custom-picker-menu.open { display: block; animation: pickerOpen 0.18s ease; }
        @keyframes pickerOpen { from { opacity: 0; transform: translateY(-6px); } to { opacity: 1; transform: translateY(0); } }
        .custom-picker-menu::-webkit-scrollbar { width: 6px; }
        .custom-picker-menu::-webkit-scrollbar-thumb { background: #ddd6fe; border-radius: 3px; }

        .custom-picker-option {
            padding: 9px 12px;
            border-radius: 8px;
            font-size: 0.88rem;
            font-weight: 700;
            color: #334155;
            cursor: pointer;
            transition: all 0.15s;
            text-align: left;
        }
        .custom-picker-option:hover { background: #f5f3ff; color: #6d28d9; }
        .custom-picker-option.selected {
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff;
        }

        /* Date picker grid (3 kolom) */
        .date-picker-grid { display: grid; grid-template-columns: 0.85fr 1.3fr 0.9fr; gap: 8px; }

        /* Time picker grid (jam : menit) */
        .time-picker-grid { display: grid; grid-template-columns: 1fr 24px 1fr; gap: 8px; align-items: center; }
        .time-separator { font-size: 1.4rem; font-weight: 900; color: #8b5cf6; text-align: center; line-height: 1; user-select: none; }

        /* Live preview */
        .datetime-preview {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            background: linear-gradient(135deg, #f5f3ff 0%, #fce7f3 100%);
            border: 1.5px solid #ddd6fe;
            border-radius: 12px;
            margin-top: 12px;
            opacity: 0;
            transform: translateY(-4px);
            transition: all 0.3s;
            pointer-events: none;
        }
        .datetime-preview.visible { opacity: 1; transform: translateY(0); }
        .datetime-preview-icon {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 1rem;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(139,92,246,0.3);
        }
        .datetime-preview-text { flex: 1; min-width: 0; }
        .datetime-preview-label {
            font-size: 0.62rem;
            font-weight: 800;
            color: #6d28d9;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 2px;
        }
        .datetime-preview-value {
            font-size: 0.88rem;
            font-weight: 900;
            color: #0f172a;
            letter-spacing: -0.01em;
        }
        .datetime-preview-value small {
            font-size: 0.72rem;
            font-weight: 700;
            color: #64748b;
            margin-left: 4px;
        }

        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @media (max-width: 640px) {
            .kelola-page { padding: 14px 0 70px; }
            .comm-cover-wrap { aspect-ratio: 16 / 9; }
            .comm-info { padding: 18px 16px; }
            .comm-title-big { font-size: 1.3rem; padding-right: 0; margin-top: 36px; }
            .comm-tag-row { padding-right: 0; }
            .btn-edit-hero { top: 12px; right: 12px; padding: 6px 12px; font-size: 0.68rem; }
            .comm-meta-line { font-size: 0.74rem; gap: 8px; margin-bottom: 10px; }
            .comm-desc-text { font-size: 0.82rem; margin-bottom: 14px; }
            .comm-actions-row { flex-direction: column; }
            .comm-actions-row .btn-secondary, .comm-actions-row .btn-danger-outline { width: 100%; justify-content: center; padding: 10px; font-size: 0.8rem; }
            .kelola-tab { font-size: 0.78rem; padding: 9px 14px; }
            .members-list-modern { grid-template-columns: 1fr; }
            .cover-tabs { flex-direction: column; }
            .events-section-head { gap: 8px; }
            .btn-add-event { padding: 7px 14px; font-size: 0.74rem; }
            .form-grid-2 { grid-template-columns: 1fr; }
            .maps-field-wrap { flex-direction: column; gap: 8px; }
            .btn-maps-helper { width: 100%; padding: 11px 16px; font-size: 0.8rem; }

            .modal-overlay-custom { padding: 0; align-items: flex-end; }
            .modal-box-custom {
                border-radius: 22px 22px 0 0;
                max-height: 94vh;
                max-height: 94dvh;
                max-width: 100%;
            }
            .modal-header-custom { padding: 16px 20px; }
            .modal-body-custom { padding: 20px; }
            .modal-footer-custom {
                padding: 10px 16px;
                padding-bottom: max(10px, env(safe-area-inset-bottom));
                gap: 5px;
            }

            /* Header event modal mobile */
            .event-modal .modal-header-custom { padding: 14px 16px; }
            .event-modal .modal-header-custom h3 { font-size: 0.95rem; gap: 6px; }
            .event-modal .modal-header-custom h3 svg { width: 16px; height: 16px; }
            .event-modal .modal-close-custom { width: 30px; height: 30px; font-size: 1.1rem; }
            .event-modal .modal-body-custom { padding: 16px; }

            /* Section */
            .event-section { margin-bottom: 18px; }
            .event-section-head { margin-bottom: 10px; padding-bottom: 8px; gap: 6px; }
            .event-section-icon { width: 24px; height: 24px; font-size: 0.72rem; border-radius: 7px; }
            .event-section-title { font-size: 0.68rem; letter-spacing: 0.05em; }

            /* Form field */
            .event-modal .form-field label { font-size: 0.72rem; margin-bottom: 5px; }
            .event-modal .form-field { margin-bottom: 12px; }
            .event-modal .form-field input[type="text"],
            .event-modal .form-field input[type="url"],
            .event-modal .form-field textarea {
                padding: 9px 11px;
                font-size: 16px;
                border-radius: 9px;
            }
            .event-modal .form-field textarea { min-height: 54px; }
            .event-modal .field-hint { font-size: 0.64rem; margin-top: 3px; }

            /* Custom picker mobile */
            .event-modal .custom-picker-trigger {
                padding: 9px 22px 9px 10px;
                font-size: 16px;
                border-radius: 9px;
            }
            .event-modal .custom-picker-chevron { width: 10px; height: 10px; }
            .event-modal .custom-picker-menu {
                max-height: 200px;
                border-radius: 10px;
                padding: 4px;
            }
            .event-modal .custom-picker-option {
                padding: 10px 11px;
                font-size: 0.9rem;
                border-radius: 7px;
            }

            /* Grid */
            .event-modal .date-picker-grid { gap: 5px; }
            .event-modal .time-picker-grid { gap: 5px; grid-template-columns: 1fr 16px 1fr; }
            .event-modal .time-separator { font-size: 1rem; }

            /* Maps helper */
            .event-modal .btn-maps-helper {
                padding: 8px 12px;
                font-size: 0.7rem;
                border-radius: 9px;
            }
            .event-modal .btn-maps-helper svg { width: 12px; height: 12px; }

            /* Live preview */
            .event-modal .datetime-preview {
                padding: 8px 10px;
                gap: 8px;
                margin-top: 10px;
                border-radius: 10px;
            }
            .event-modal .datetime-preview-icon {
                width: 28px; height: 28px;
                font-size: 0.8rem;
                border-radius: 8px;
            }
            .event-modal .datetime-preview-label { font-size: 0.56rem; }
            .event-modal .datetime-preview-value { font-size: 0.76rem; }
            .event-modal .datetime-preview-value small { font-size: 0.64rem; }

            /* Footer */
            .event-modal .modal-footer-custom { padding: 10px 16px; padding-bottom: max(10px, env(safe-area-inset-bottom)); gap: 6px; }
            .event-modal .btn-save { padding: 7px 14px; font-size: 0.74rem; border-radius: 7px; }
            .event-modal .btn-save svg { width: 11px; height: 11px; }
            .event-modal .modal-footer-custom .btn-secondary { padding: 7px 14px; font-size: 0.74rem; border-radius: 7px; }
        }
    </style>
</head>
<body>

    @include('partials.navbar', ['active' => null])

    <main class="kelola-page">
        <div class="kelola-container">

            <a href="{{ route('profil') }}" class="back-btn">
                <svg viewBox="0 0 24 24"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Kembali ke Profil
            </a>

            @if(session('success'))
                <div style="background:#ecfdf5;color:#065f46;padding:12px 16px;border-radius:12px;font-size:0.85rem;margin-bottom:16px;border:1.5px solid #a7f3d0;">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div style="background:#fef2f2;color:#991b1b;padding:12px 16px;border-radius:12px;font-size:0.85rem;margin-bottom:16px;border:1.5px solid #fecaca;">{{ session('error') }}</div>
            @endif

            <div id="manageContent">
                <div class="comm-hero">
                    <div class="comm-cover-wrap">
                        <img id="commCoverImg" src="{{ $community->cover }}" alt="Cover Komunitas">
                        <button class="comm-cover-edit" onclick="openCoverPicker()">Ganti Cover</button>
                    </div>
                    <div class="comm-info">
                        <button class="btn-edit-hero" onclick="openEditModal()">Edit Info</button>
                        <div class="comm-tag-row">
                            <span class="comm-tag">{{ $community->category }}</span>
                        </div>
                        <h1 class="comm-title-big">{{ $community->name }}</h1>
                        <div class="comm-meta-line">
                            <span>{{ $community->members_count }} anggota</span>
                            <span>·</span>
                            <span>{{ $community->created_at->translatedFormat('d M Y') }}</span>
                        </div>
                        <p class="comm-desc-text">{{ $community->description }}</p>
                        <div class="comm-actions-row">
                            <a href="{{ route('komunitas.detail', $community->slug) }}" class="btn-secondary" target="_blank">Lihat Publik</a>
                            <button class="btn-danger-outline" onclick="handleDeleteCommunity()">Hapus Komunitas</button>
                        </div>
                    </div>
                </div>

                <div class="kelola-tabs">
                    <button class="kelola-tab active" onclick="showTab('events', event)">Kegiatan</button>
                    <button class="kelola-tab" onclick="showTab('members', event)">Anggota</button>
                </div>

                <div id="tab-events" class="kelola-panel">
                    <div class="events-section-head">
                        <div class="events-section-title">
                            <h3>Kegiatan Komunitas</h3>
                            <small id="eventsCountText"></small>
                        </div>
                        <button class="btn-add-event" onclick="openAddEventModal()">
                            <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                            Buat Kegiatan
                        </button>
                    </div>
                    <div id="eventsList"></div>
                    <div class="events-empty" id="eventsEmpty" style="display:none;">
                        <div class="events-empty-icon">📅</div>
                        <h4>Belum ada kegiatan</h4>
                        <p>Klik tombol <strong>Buat Kegiatan</strong> di atas untuk menambahkan kegiatan pertama.</p>
                    </div>
                </div>

                <div id="tab-members" class="kelola-panel" style="display:none;">
                    <div class="section-head-kelola">
                        <h3>Daftar Anggota</h3>
                        <span class="result-info">{{ $members->count() }} anggota</span>
                    </div>
                    <div class="members-list-modern" id="membersList"></div>
                    <div class="empty-filter" id="membersEmpty" style="display:none;">
                        <div class="empty-icon">👥</div>
                        <h4>Belum ada anggota lain</h4>
                        <p>Bagikan komunitasmu agar orang lain bisa bergabung.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- MODAL EDIT INFO --}}
    <div class="modal-overlay-custom" id="editModal">
        <div class="modal-box-custom">
            <div class="modal-header-custom">
                <h3>Edit Info Komunitas</h3>
                <button class="modal-close-custom" onclick="closeEditModal()">×</button>
            </div>
            <form id="editInfoForm" action="{{ route('kelola-komunitas.update', $community->slug) }}" method="POST" style="display:contents;">
                @csrf
                <div class="modal-body-custom">
                    <div class="form-field">
                        <label>Nama Komunitas</label>
                        <input type="text" name="name" id="editName" value="{{ $community->name }}" required>
                    </div>
                    <div class="form-field">
                        <label>Deskripsi</label>
                        <textarea name="description" id="editDescription" rows="4" required>{{ $community->description }}</textarea>
                    </div>
                    <div class="form-field" style="margin-bottom:0;">
                        <label>URL Cover</label>
                        <input type="url" name="cover" id="editCoverValue" value="{{ $community->cover }}">
                    </div>
                </div>
                <div class="modal-footer-custom">
                    <button type="button" class="btn-secondary" onclick="closeEditModal()">Batal</button>
                    <button type="submit" class="btn-save">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL COVER PICKER --}}
    <div class="modal-overlay-custom" id="coverPickerModal">
        <div class="modal-box-custom">
            <div class="modal-header-custom">
                <h3>Ganti Foto Cover</h3>
                <button class="modal-close-custom" onclick="closeCoverPicker()">×</button>
            </div>
            <div class="modal-body-custom">
                <div class="cover-tabs">
                    <button type="button" class="cover-tab active" onclick="switchCoverMode('upload', event)">Upload</button>
                    <button type="button" class="cover-tab" onclick="switchCoverMode('url', event)">URL</button>
                </div>
                <div class="cover-tab-content active" id="cover-upload-mode">
                    <button type="button" class="upload-btn-big" onclick="document.getElementById('coverFileInput').click()">
                        Pilih foto dari galeri
                    </button>
                    <input type="file" id="coverFileInput" accept="image/*" style="display:none;" onchange="handleCoverUpload(event)">
                </div>
                <div class="cover-tab-content" id="cover-url-mode">
                    <div class="form-field">
                        <label>URL Foto</label>
                        <input type="url" id="coverUrlInput" placeholder="https://contoh.com/foto.jpg">
                    </div>
                    <button type="button" class="btn-save" style="width:100%;justify-content:center;" onclick="applyCoverFromUrl()">Pakai URL Ini</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ============================================================
         MODAL BUAT KEGIATAN — PREMIUM + CUSTOM PICKER
         ============================================================ --}}
    <div class="modal-overlay-custom" id="eventModal">
        <div class="modal-box-custom event-modal">
            <form id="addEventForm" action="{{ route('events.store', $community->slug) }}" method="POST" style="display:flex;flex-direction:column;min-height:0;height:100%;">
                @csrf

                <div class="modal-header-custom">
                    <h3>
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="18" rx="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                            <line x1="12" y1="14" x2="12" y2="18"/>
                            <line x1="10" y1="16" x2="14" y2="16"/>
                        </svg>
                        Buat Kegiatan Baru
                    </h3>
                    <button type="button" class="modal-close-custom" onclick="closeAddEventModal()">×</button>
                </div>

                <div class="modal-body-custom">

                    {{-- SECTION 1: INFORMASI DASAR --}}
                    <div class="event-section">
                        <div class="event-section-head">
                            <div class="event-section-icon">📝</div>
                            <span class="event-section-title">Informasi Dasar</span>
                        </div>

                        <div class="form-field">
                            <label>Judul Kegiatan <span style="color:#dc2626;">*</span></label>
                            <input type="text" name="title" placeholder="Contoh: Turnamen Catur Pidie 2025" required maxlength="150">
                        </div>

                        <div class="form-field" style="margin-bottom:0;">
                            <label>Deskripsi Kegiatan</label>
                            <textarea name="description" rows="3" placeholder="Ceritakan detail kegiatan, agenda, atau info penting..." maxlength="1000"></textarea>
                        </div>
                    </div>

                    {{-- SECTION 2: LOKASI --}}
                    <div class="event-section">
                        <div class="event-section-head">
                            <div class="event-section-icon">📍</div>
                            <span class="event-section-title">Lokasi</span>
                        </div>

                        <div class="form-field">
                            <label>Nama Tempat <span style="color:#dc2626;">*</span></label>
                            <input type="text" name="location" id="eventLocation" placeholder="Contoh: Gedung Serbaguna Sigli" required maxlength="150">
                        </div>

                        <div class="form-field">
                            <label>Alamat Lengkap</label>
                            <textarea name="address" id="eventAddress" rows="2" placeholder="Contoh: Jl. Ahmad Yani No. 12, Kec. Kota Sigli, Kab. Pidie" maxlength="255"></textarea>
                        </div>

                        <div class="form-field" style="margin-bottom:0;">
                            <label>Link Google Maps</label>
                            <div class="maps-field-wrap">
                                <input type="url" name="maps_url" id="eventMapsUrl" placeholder="https://maps.google.com/?q=..." maxlength="500">
                                <button type="button" class="btn-maps-helper" onclick="openGoogleMapsHelper()" title="Cari lokasi di Google Maps">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                        <circle cx="12" cy="10" r="3"/>
                                    </svg>
                                    Buka Maps
                                </button>
                            </div>
                            <div class="field-hint">
                                Klik <strong>"Buka Maps"</strong> → cari lokasi → Share → salin link → paste di sini
                            </div>
                        </div>
                    </div>

                    {{-- SECTION 3: JADWAL --}}
                    <div class="event-section">
                        <div class="event-section-head">
                            <div class="event-section-icon">📅</div>
                            <span class="event-section-title">Jadwal Kegiatan</span>
                        </div>

                        <div class="form-grid-2">
                            {{-- TANGGAL: 3 custom picker --}}
                            <div class="form-field" style="margin-bottom: 0;">
                                <label>Tanggal <span style="color:#dc2626;">*</span></label>
                                <div class="date-picker-grid">
                                    {{-- DAY --}}
                                    <div class="custom-picker" data-picker="day">
                                        <button type="button" class="custom-picker-trigger" onclick="togglePicker('day')">
                                            <span class="picker-value placeholder" id="dayValue">Tgl</span>
                                            <svg class="custom-picker-chevron" viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
                                        </button>
                                        <div class="custom-picker-menu" id="dayMenu">
                                            @for($d = 1; $d <= 31; $d++)
                                                <div class="custom-picker-option" data-value="{{ $d }}" onclick="selectPicker('day', '{{ $d }}')">{{ $d }}</div>
                                            @endfor
                                        </div>
                                        <input type="hidden" name="event_day" id="eventDay">
                                    </div>

                                    {{-- MONTH --}}
                                    <div class="custom-picker" data-picker="month">
                                        <button type="button" class="custom-picker-trigger" onclick="togglePicker('month')">
                                            <span class="picker-value placeholder" id="monthValue">Bulan</span>
                                            <svg class="custom-picker-chevron" viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
                                        </button>
                                        <div class="custom-picker-menu" id="monthMenu">
                                            @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $i => $bln)
                                                <div class="custom-picker-option" data-value="{{ $i + 1 }}" onclick="selectPicker('month', '{{ $i + 1 }}')">{{ $bln }}</div>
                                            @endforeach
                                        </div>
                                        <input type="hidden" name="event_month" id="eventMonth">
                                    </div>

                                    {{-- YEAR --}}
                                    <div class="custom-picker" data-picker="year">
                                        <button type="button" class="custom-picker-trigger" onclick="togglePicker('year')">
                                            <span class="picker-value placeholder" id="yearValue">Tahun</span>
                                            <svg class="custom-picker-chevron" viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
                                        </button>
                                        <div class="custom-picker-menu" id="yearMenu">
                                            @for($y = date('Y'); $y <= date('Y') + 3; $y++)
                                                <div class="custom-picker-option" data-value="{{ $y }}" onclick="selectPicker('year', '{{ $y }}')">{{ $y }}</div>
                                            @endfor
                                        </div>
                                        <input type="hidden" name="event_year" id="eventYear">
                                    </div>
                                </div>
                            </div>

                            {{-- JAM & MENIT --}}
                            <div class="form-field" style="margin-bottom: 0;">
                                <label>Jam <span style="color:#94a3b8;font-weight:600;">(24 Jam)</span></label>
                                <div class="time-picker-grid">
                                    {{-- HOUR --}}
                                    <div class="custom-picker" data-picker="hour">
                                        <button type="button" class="custom-picker-trigger" onclick="togglePicker('hour')">
                                            <span class="picker-value placeholder" id="hourValue">Jam</span>
                                            <svg class="custom-picker-chevron" viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
                                        </button>
                                        <div class="custom-picker-menu" id="hourMenu">
                                            @for($h = 0; $h <= 23; $h++)
                                                @php $hv = str_pad($h, 2, '0', STR_PAD_LEFT); @endphp
                                                <div class="custom-picker-option" data-value="{{ $hv }}" onclick="selectPicker('hour', '{{ $hv }}')">{{ $hv }}</div>
                                            @endfor
                                        </div>
                                        <input type="hidden" name="event_hour" id="eventHour">
                                    </div>

                                    <div class="time-separator">:</div>

                                    {{-- MINUTE --}}
                                    <div class="custom-picker" data-picker="minute">
                                        <button type="button" class="custom-picker-trigger" onclick="togglePicker('minute')">
                                            <span class="picker-value placeholder" id="minuteValue">Menit</span>
                                            <svg class="custom-picker-chevron" viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
                                        </button>
                                        <div class="custom-picker-menu" id="minuteMenu">
                                            @for($m = 0; $m <= 59; $m += 5)
                                                @php $mv = str_pad($m, 2, '0', STR_PAD_LEFT); @endphp
                                                <div class="custom-picker-option" data-value="{{ $mv }}" onclick="selectPicker('minute', '{{ $mv }}')">{{ $mv }}</div>
                                            @endfor
                                        </div>
                                        <input type="hidden" name="event_minute" id="eventMinute">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Live Preview Jadwal --}}
                        <div class="datetime-preview" id="datetimePreview">
                            <div class="datetime-preview-icon">🗓️</div>
                            <div class="datetime-preview-text">
                                <div class="datetime-preview-label">Jadwal yang dipilih</div>
                                <div class="datetime-preview-value" id="datetimePreviewValue">—</div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer-custom">
                    <button type="button" class="btn-secondary" onclick="closeAddEventModal()">Batal</button>
                    <button type="submit" class="btn-save">
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                        Simpan
                    </button>
                </div>

                <input type="hidden" name="event_date" id="hiddenEventDate">
                <input type="hidden" name="event_time" id="hiddenEventTime">
            </form>
        </div>
    </div>

    <script>
        const community = @json($community);
        const members = @json($members);
        const events = @json($events);
        const csrfToken = "{{ csrf_token() }}";

        /* ============================================================
           RENDER EVENTS & MEMBERS
           ============================================================ */
        function renderEvents() {
            const eventsList = document.getElementById('eventsList');
            const eventsEmpty = document.getElementById('eventsEmpty');
            const eventsCountText = document.getElementById('eventsCountText');

            eventsList.innerHTML = '';

            if (events.length === 0) {
                eventsEmpty.style.display = 'block';
                if (eventsCountText) eventsCountText.textContent = '';
                return;
            }
            eventsEmpty.style.display = 'none';
            if (eventsCountText) eventsCountText.textContent = events.length + ' kegiatan';

            const months = ['JAN','FEB','MAR','APR','MEI','JUN','JUL','AGU','SEP','OKT','NOV','DES'];
            events.forEach(ev => {
                const d = new Date(ev.event_date);
                const day = String(d.getDate()).padStart(2, '0');
                const month = months[d.getMonth()];
                const timeStr = ev.event_time ? ` · ${ev.event_time.substring(0, 5)} WIB` : '';

                const card = document.createElement('div');
                card.className = 'event-card-large';
                card.innerHTML = `
                    <div class="event-date"><strong>${day}</strong><span>${month}</span></div>
                    <div class="event-info">
                        <h4>${ev.title}</h4>
                        <p class="text-soft">📍 ${ev.location}${timeStr}</p>
                        ${ev.address ? `<p class="text-soft" style="font-size:0.78rem;background:#f8fafc;padding:6px 10px;border-radius:6px;border-left:3px solid #8b5cf6;margin-top:4px;">Alamat: ${ev.address}</p>` : ''}
                        ${ev.description ? `<p class="event-desc">${ev.description}</p>` : ''}
                        <div style="display:flex;gap:6px;flex-wrap:wrap;margin-top:6px;">
                            ${ev.maps_url ? `<a href="${ev.maps_url}" target="_blank" rel="noopener" style="display:inline-flex;align-items:center;gap:5px;padding:5px 10px;background:#eff6ff;color:#2563eb;border:1px solid #bfdbfe;border-radius:6px;font-size:0.72rem;font-weight:800;text-decoration:none;">Buka di Maps</a>` : ''}
                            <form action="/events/${ev.id}/delete" method="POST" style="display:inline;" onsubmit="return confirm('Hapus kegiatan ini?')">
                                <input type="hidden" name="_token" value="${csrfToken}">
                                <button type="submit" class="btn btn-outline btn-sm" style="border-color:#dc2626;color:#dc2626;">Hapus</button>
                            </form>
                        </div>
                    </div>`;
                eventsList.appendChild(card);
            });
        }
        renderEvents();

        function renderMembers() {
            const membersList = document.getElementById('membersList');
            const membersEmpty = document.getElementById('membersEmpty');
            membersList.innerHTML = '';
            if (members.length === 0) { membersEmpty.style.display = 'block'; return; }
            membersEmpty.style.display = 'none';

            members.forEach(m => {
                const isCreator = m.id === community.creator_id;
                const roleLabel = isCreator ? 'Pembuat' : 'Anggota';
                const hasAvatar = m.avatar;
                const avatarHtml = hasAvatar
                    ? `<img src="/storage/${m.avatar}" alt="${m.name}">`
                    : (m.name || 'U').charAt(0).toUpperCase();
                const item = document.createElement('div');
                item.className = 'member-item';
                item.innerHTML = `
                    <div class="member-item-avatar">${avatarHtml}</div>
                    <div class="member-item-info">
                        <h5>${m.name || 'Tanpa Nama'}</h5>
                        <p>${m.email || '-'}</p>
                    </div>
                    <span class="member-role-badge ${isCreator ? 'role-pembuat' : 'role-anggota'}">${roleLabel}</span>`;
                membersList.appendChild(item);
            });
        }
        renderMembers();

        function showTab(tab, event) {
            document.querySelectorAll('.kelola-panel').forEach(p => p.style.display = 'none');
            document.querySelectorAll('.kelola-tab').forEach(t => t.classList.remove('active'));
            document.getElementById('tab-' + tab).style.display = 'block';
            event.target.closest('.kelola-tab').classList.add('active');
        }

        /* ============================================================
           MODAL CONTROL
           ============================================================ */
        function openEditModal() { document.getElementById('editModal').classList.add('show'); }
        function closeEditModal() { document.getElementById('editModal').classList.remove('show'); }
        document.getElementById('editModal').addEventListener('click', function(e) { if (e.target === this) closeEditModal(); });

        function openCoverPicker() { document.getElementById('coverPickerModal').classList.add('show'); }
        function closeCoverPicker() { document.getElementById('coverPickerModal').classList.remove('show'); }
        document.getElementById('coverPickerModal').addEventListener('click', function(e) { if (e.target === this) closeCoverPicker(); });

        function switchCoverMode(mode, event) {
            document.querySelectorAll('.cover-tab').forEach(t => t.classList.remove('active'));
            event.target.classList.add('active');
            document.querySelectorAll('.cover-tab-content').forEach(c => c.classList.remove('active'));
            document.getElementById('cover-' + mode + '-mode').classList.add('active');
        }

        function applyCoverFromUrl() {
            const url = document.getElementById('coverUrlInput').value.trim();
            if (!url || !url.startsWith('http')) { alert('URL tidak valid'); return; }
            document.getElementById('commCoverImg').src = url;
            document.getElementById('editCoverValue').value = url;
            closeCoverPicker();
        }

        function handleCoverUpload(event) {
            const file = event.target.files[0];
            if (!file) return;
            if (file.size > 3 * 1024 * 1024) { alert('Maksimal 3MB'); return; }
            const reader = new FileReader();
            reader.onload = e => {
                document.getElementById('commCoverImg').src = e.target.result;
                document.getElementById('editCoverValue').value = e.target.result;
                closeCoverPicker();
            };
            reader.readAsDataURL(file);
        }

        function handleDeleteCommunity() {
            if (!confirm('Hapus komunitas ini? Semua data kegiatan & anggota akan hilang permanen.')) return;
            const confirmText = prompt('Ketik nama komunitas untuk konfirmasi:\n\n"' + community.name + '"');
            if (confirmText !== community.name) { alert('Nama tidak cocok. Batal.'); return; }
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/kelola-komunitas/' + community.slug + '/delete';
            form.innerHTML = `<input type="hidden" name="_token" value="${csrfToken}">`;
            document.body.appendChild(form);
            form.submit();
        }

        function openAddEventModal() { document.getElementById('eventModal').classList.add('show'); }
        function closeAddEventModal() {
            document.getElementById('eventModal').classList.remove('show');
            closeAllPickers();
        }
        document.getElementById('eventModal').addEventListener('click', function(e) { if (e.target === this) closeAddEventModal(); });

        function openGoogleMapsHelper() {
            const location = (document.getElementById('eventLocation')?.value || '').trim();
            const address = (document.getElementById('eventAddress')?.value || '').trim();
            let query = '';
            if (location && address) query = location + ', ' + address;
            else if (location) query = location;
            else if (address) query = address;
            const url = query
                ? 'https://www.google.com/maps/search/?api=1&query=' + encodeURIComponent(query)
                : 'https://www.google.com/maps';
            window.open(url, '_blank', 'noopener');
        }

        /* ============================================================
           CUSTOM PICKER LOGIC
           ============================================================ */
        const pickerState = {
            day:    { value: null, label: 'Tgl',   element: 'dayValue',    input: 'eventDay' },
            month:  { value: null, label: 'Bulan', element: 'monthValue',  input: 'eventMonth' },
            year:   { value: null, label: 'Tahun', element: 'yearValue',   input: 'eventYear' },
            hour:   { value: null, label: 'Jam',   element: 'hourValue',   input: 'eventHour' },
            minute: { value: null, label: 'Menit', element: 'minuteValue', input: 'eventMinute' },
        };

        const monthNames = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

        function togglePicker(key) {
            const menu = document.getElementById(key + 'Menu');
            const trigger = menu.previousElementSibling; // button
            const isOpen = menu.classList.contains('open');

            // Tutup semua picker lain
            closeAllPickers();

            if (!isOpen) {
                menu.classList.add('open');
                trigger.classList.add('open');

                // Scroll ke item yang sedang dipilih
                const selected = menu.querySelector('.custom-picker-option.selected');
                if (selected) {
                    setTimeout(() => {
                        selected.scrollIntoView({ block: 'center', behavior: 'smooth' });
                    }, 50);
                }
            }
        }

        function closeAllPickers() {
            document.querySelectorAll('.custom-picker-menu.open').forEach(m => m.classList.remove('open'));
            document.querySelectorAll('.custom-picker-trigger.open').forEach(t => t.classList.remove('open'));
        }

        function selectPicker(key, value) {
            const state = pickerState[key];
            state.value = value;

            const input = document.getElementById(state.input);
            if (input) input.value = value;

            // Update label
            let display = value;
            if (key === 'month') {
                display = monthNames[parseInt(value) - 1];
            }
            const labelEl = document.getElementById(state.element);
            if (labelEl) {
                labelEl.textContent = display;
                labelEl.classList.remove('placeholder');
            }

            // Tandai item terpilih
            const menu = document.getElementById(key + 'Menu');
            if (menu) {
                menu.querySelectorAll('.custom-picker-option').forEach(opt => opt.classList.remove('selected'));
                const sel = menu.querySelector(`.custom-picker-option[data-value="${value}"]`);
                if (sel) sel.classList.add('selected');
            }

            closeAllPickers();
            updateDatetimePreview();
        }

        // Klik di luar → tutup
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.custom-picker')) {
                closeAllPickers();
            }
        });

        /* ============================================================
           LIVE PREVIEW JADWAL
           ============================================================ */
        function updateDatetimePreview() {
            const day    = pickerState.day.value;
            const month  = pickerState.month.value;
            const year   = pickerState.year.value;
            const hour   = pickerState.hour.value;
            const minute = pickerState.minute.value;

            const previewEl = document.getElementById('datetimePreview');
            const valueEl = document.getElementById('datetimePreviewValue');

            if (day && month && year) {
                let text = `${parseInt(day)} ${monthNames[parseInt(month) - 1]} ${year}`;
                if (hour) {
                    text += `<small>· ${hour}:${minute || '00'} WIB</small>`;
                }
                valueEl.innerHTML = text;
                previewEl.classList.add('visible');
            } else {
                previewEl.classList.remove('visible');
            }
        }

        /* ============================================================
           SUBMIT — GABUNGKAN TANGGAL & JAM
           ============================================================ */
        document.getElementById('addEventForm').addEventListener('submit', function(e) {
            const day    = pickerState.day.value;
            const month  = pickerState.month.value;
            const year   = pickerState.year.value;
            const hour   = pickerState.hour.value;
            const minute = pickerState.minute.value;

            if (!day || !month || !year) {
                e.preventDefault();
                alert('⚠️ Pilih tanggal, bulan, dan tahun terlebih dahulu.');
                return;
            }

            const pad = n => String(n).padStart(2, '0');
            document.getElementById('hiddenEventDate').value = `${year}-${pad(month)}-${pad(day)}`;

            if (hour && minute) {
                document.getElementById('hiddenEventTime').value = `${hour}:${minute}`;
            } else if (hour) {
                document.getElementById('hiddenEventTime').value = `${hour}:00`;
            } else {
                document.getElementById('hiddenEventTime').value = '';
            }
        });

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                closeEditModal();
                closeCoverPicker();
                closeAddEventModal();
                closeAllPickers();
            }
        });
    </script>
</body>
</html>