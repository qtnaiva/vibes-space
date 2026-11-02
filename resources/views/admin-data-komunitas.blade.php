<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Data Komunitas — Admin Vibes Space Pidie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .admin-body {
            background: #f5f6fa;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            font-family: 'Plus Jakarta Sans', -apple-system, sans-serif;
            overflow-x: hidden;
        }
        .admin-sidebar-fixed {
            width: 272px;
            min-height: 100vh;
            background: #ffffff;
            padding: 22px 16px;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            z-index: 100;
            border-right: 1px solid #e8eaf0;
        }
        .admin-brand {
            display: flex; align-items: center; gap: 12px;
            padding: 6px 8px 24px;
            border-bottom: 1px solid #eef0f5;
            margin-bottom: 22px;
        }
        .admin-brand-icon {
            width: 46px; height: 46px;
            border-radius: 13px;
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-weight: 900; font-size: 1.3rem;
            box-shadow: 0 6px 20px rgba(139,92,246,0.3);
        }
        .admin-brand-text { display: flex; flex-direction: column; gap: 2px; }
        .admin-brand-title { color: #0f172a; font-weight: 900; font-size: 1rem; }
        .admin-brand-sub { color: #94a3b8; font-size: 0.7rem; font-weight: 700; text-transform: uppercase; }
        .admin-nav { flex: 1; display: flex; flex-direction: column; gap: 4px; }
        .admin-nav-label {
            font-size: 0.68rem; font-weight: 800; color: #94a3b8;
            text-transform: uppercase; padding: 12px 14px 6px;
        }
        .admin-nav-item {
            display: flex; align-items: center; gap: 12px;
            padding: 12px 14px; border-radius: 12px;
            color: #64748b; font-size: 0.88rem; font-weight: 700;
            text-decoration: none; transition: all 0.2s;
        }
        .admin-nav-item svg {
            width: 20px; height: 20px;
            stroke: currentColor; stroke-width: 2; fill: none;
        }
        .admin-nav-item:hover { background: #f8fafc; color: #1e293b; }
        .admin-nav-item.active {
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            color: #fff;
            box-shadow: 0 8px 24px rgba(139,92,246,0.35);
        }
        .admin-nav-badge {
            margin-left: auto;
            background: #ef4444; color: #fff;
            font-size: 0.68rem; font-weight: 800;
            padding: 3px 9px; border-radius: 999px;
            min-width: 24px; text-align: center;
        }
        .admin-sidebar-footer {
            padding-top: 16px; border-top: 1px solid #eef0f5; margin-top: 16px;
        }
        .admin-logout-btn {
            width: 100%; display: flex; align-items: center; gap: 10px;
            padding: 12px 14px; background: transparent;
            color: #ef4444; border: 1.5px solid #fecaca;
            border-radius: 12px; font-family: inherit;
            font-size: 0.85rem; font-weight: 800;
            cursor: pointer; transition: all 0.2s; text-align: left;
        }
        .admin-logout-btn:hover { background: #fef2f2; border-color: #ef4444; }
        .admin-main {
            flex: 1; margin-left: 272px;
            padding: 28px 32px 60px;
            min-height: 100vh;
        }
        .admin-topbar {
            display: flex; align-items: center; justify-content: space-between;
            gap: 20px; margin-bottom: 20px; flex-wrap: wrap;
        }
        .admin-page-title { font-size: 1.65rem; font-weight: 900; color: #0f172a; margin-bottom: 3px; }
        .admin-page-sub { color: #64748b; font-size: 0.86rem; }
        .admin-user-chip {
            display: flex; align-items: center; gap: 10px;
            padding: 6px 6px 6px 16px;
            background: #fff; border: 1px solid #e8eaf0;
            border-radius: 999px;
            font-size: 0.82rem; font-weight: 700; color: #1e293b;
        }
        .admin-user-avatar {
            width: 34px; height: 34px; border-radius: 50%;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-weight: 900; font-size: 0.85rem;
        }
        .admin-stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }
        .admin-stat-card {
            background: #fff;
            border: 1px solid #e8eaf0;
            border-radius: 16px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .stat-icon {
            width: 46px; height: 46px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }
        .stat-purple .stat-icon { background: #f3efff; }
        .stat-pink .stat-icon { background: #fce7f3; }
        .stat-orange .stat-icon { background: #ffedd5; }
        .stat-blue .stat-icon { background: #dbeafe; }
        .stat-info { display: flex; flex-direction: column; gap: 2px; }
        .stat-info span { font-size: 0.76rem; color: #64748b; font-weight: 700; }
        .stat-info strong { font-size: 1.6rem; font-weight: 900; color: #0f172a; line-height: 1; }
        .admin-toolbar {
            display: flex; justify-content: space-between;
            gap: 12px; margin-bottom: 20px; flex-wrap: wrap;
            align-items: center;
        }
        .admin-search-input {
            padding: 11px 18px;
            border: 1.5px solid #e8eaf0;
            border-radius: 12px;
            font-family: inherit;
            font-size: 0.88rem;
            min-width: 280px;
            flex: 1;
            max-width: 400px;
        }
        .admin-search-input:focus {
            outline: none;
            border-color: #8b5cf6;
            box-shadow: 0 0 0 4px rgba(139,92,246,0.1);
        }
        .filter-tags { display: flex; gap: 6px; flex-wrap: wrap; }
        .filter-tags .tag {
            padding: 9px 16px;
            background: #fff;
            border: 1.5px solid #e8eaf0;
            border-radius: 999px;
            font-family: inherit;
            font-size: 0.8rem;
            font-weight: 700;
            color: #64748b;
            cursor: pointer;
            text-decoration: none;
        }
        .filter-tags .tag:hover { border-color: #ddd6fe; color: #6d28d9; }
        .filter-tags .tag.active {
            background: #0f172a;
            color: #fff;
            border-color: #0f172a;
        }
        .admin-table-wrap {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #e8eaf0;
            overflow-x: auto;
        }
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }
        .admin-table thead th {
            padding: 14px 16px;
            text-align: left;
            font-size: 0.72rem;
            font-weight: 800;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            border-bottom: 2px solid #e8eaf0;
            background: #fafbfc;
            white-space: nowrap;
        }
        .admin-table tbody td {
            padding: 14px 16px;
            font-size: 0.86rem;
            color: #334155;
            border-bottom: 1px solid #eef0f5;
            vertical-align: middle;
        }
        .admin-table tbody tr:hover td { background: #fafbfc; }
        .admin-table tbody tr:last-child td { border-bottom: none; }
        .admin-table strong { color: #0f172a; font-weight: 800; }
        .admin-table .no-col { color: #cbd5e1; font-weight: 700; width: 50px; }
        .admin-pill {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 800;
            white-space: nowrap;
        }
        .admin-pill-purple { background: #f3e8ff; color: #7c3aed; }
        .admin-pill-green { background: #d1fae5; color: #047857; }
        .admin-pill-blue { background: #dbeafe; color: #1d4ed8; }
        .admin-pill-yellow { background: #fef3c7; color: #b45309; }
        .admin-pill-red { background: #fee2e2; color: #b91c1c; }
        .admin-pill-teal { background: #ccfbf1; color: #0f766e; }
        .admin-pill-orange { background: #ffedd5; color: #c2410c; }
        .action-btns {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }
        .btn-action {
            padding: 6px 12px;
            border-radius: 8px;
            font-family: inherit;
            font-size: 0.72rem;
            font-weight: 700;
            cursor: pointer;
            border: 1.5px solid transparent;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            white-space: nowrap;
        }
        .btn-action.view {
            background: #fff;
            border-color: #e8eaf0;
            color: #64748b;
        }
        .btn-action.view:hover {
            border-color: #8b5cf6;
            color: #8b5cf6;
        }
        .btn-action.approve {
            background: #ecfdf5;
            border-color: #a7f3d0;
            color: #047857;
        }
        .btn-action.approve:hover {
            background: #10b981;
            color: #fff;
            border-color: #10b981;
        }
        .btn-action.reject {
            background: #fef2f2;
            border-color: #fecaca;
            color: #b91c1c;
        }
        .btn-action.reject:hover {
            background: #ef4444;
            color: #fff;
            border-color: #ef4444;
        }
        .btn-action.delete {
            background: #fef2f2;
            border-color: #fecaca;
            color: #b91c1c;
        }
        .btn-action.delete:hover {
            background: #dc2626;
            color: #fff;
            border-color: #dc2626;
        }
        .result-info {
            margin-top: 16px;
            font-size: 0.85rem;
            color: #94a3b8;
            font-weight: 600;
        }
        .admin-empty {
            text-align: center;
            padding: 60px 20px;
            color: #94a3b8;
        }
        .admin-empty h3 {
            font-size: 1.05rem;
            color: #64748b;
            font-weight: 800;
            margin-bottom: 4px;
        }
        @media (max-width: 900px) {
            .admin-sidebar-fixed { transform: translateX(-100%); }
            .admin-sidebar-fixed.open { transform: translateX(0); }
            .admin-main { margin-left: 0; padding: 18px 16px 60px; }
            .admin-stats-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 640px) {
            .admin-stats-grid { grid-template-columns: 1fr; }
            .admin-search-input { min-width: 100%; max-width: 100%; }
        }
    </style>
</head>
<body class="admin-body">

    <aside class="admin-sidebar-fixed" id="adminSidebar">
        <div class="admin-brand">
            <div class="admin-brand-icon">V</div>
            <div class="admin-brand-text">
                <div class="admin-brand-title">Vibes Space</div>
                <div class="admin-brand-sub">Admin Panel</div>
            </div>
        </div>
        <nav class="admin-nav">
            <div class="admin-nav-label">Menu Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-item">
                <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/></svg>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.pengajuan') }}" class="admin-nav-item">
                <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                <span>Pengajuan</span>
                @if($stats['pending'] > 0)
                    <span class="admin-nav-badge">{{ $stats['pending'] }}</span>
                @endif
            </a>
            <a href="{{ route('admin.komunitas') }}" class="admin-nav-item active">
                <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                <span>Kelola Komunitas</span>
            </a>
            <div class="admin-nav-label">Manajemen</div>
            <a href="{{ route('admin.anggota') }}" class="admin-nav-item">
                <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <span>Daftar Anggota</span>
            </a>
        </nav>
        <div class="admin-sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="admin-logout-btn">
                    <svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    <span>Keluar Admin</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="admin-main">
        <div class="admin-topbar">
            <div>
                <h1 class="admin-page-title">Data Komunitas</h1>
                <p class="admin-page-sub">Semua komunitas yang terdaftar di Vibes Space Pidie.</p>
            </div>
            <div class="admin-user-chip">
                <span>{{ auth()->user()->name }}</span>
                <div class="admin-user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            </div>
        </div>

        @if(session('success'))
            <div style="background:#ecfdf5;color:#065f46;padding:12px 16px;border-radius:12px;font-size:0.85rem;margin-bottom:20px;border:1.5px solid #a7f3d0;">✅ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div style="background:#fef2f2;color:#991b1b;padding:12px 16px;border-radius:12px;font-size:0.85rem;margin-bottom:20px;border:1.5px solid #fecaca;">❌ {{ session('error') }}</div>
        @endif

        <div class="admin-stats-grid">
            <div class="admin-stat-card stat-purple">
                <div class="stat-icon">🏘️</div>
                <div class="stat-info">
                    <span>Total Komunitas</span>
                    <strong>{{ $stats['total'] }}</strong>
                </div>
            </div>
            <div class="admin-stat-card stat-pink">
                <div class="stat-icon">✅</div>
                <div class="stat-info">
                    <span>Disetujui</span>
                    <strong>{{ $stats['approved'] }}</strong>
                </div>
            </div>
            <div class="admin-stat-card stat-orange">
                <div class="stat-icon">⏳</div>
                <div class="stat-info">
                    <span>Menunggu</span>
                    <strong>{{ $stats['pending'] }}</strong>
                </div>
            </div>
            <div class="admin-stat-card stat-blue">
                <div class="stat-icon">❌</div>
                <div class="stat-info">
                    <span>Ditolak</span>
                    <strong>{{ $stats['rejected'] }}</strong>
                </div>
            </div>
        </div>

        <div class="admin-toolbar">
            <input type="text" id="searchInput" placeholder="🔍 Cari nama komunitas..." class="admin-search-input">
            <div class="filter-tags" id="filterTags">
                <button class="tag active" data-filter="all">Semua</button>
                <button class="tag" data-filter="approved">Disetujui</button>
                <button class="tag" data-filter="pending">Menunggu</button>
                <button class="tag" data-filter="rejected">Ditolak</button>
            </div>
        </div>

        @if($communities->isEmpty())
            <div class="admin-empty">
                <h3>Belum ada komunitas</h3>
                <p>Komunitas yang diajukan user akan tampil di sini.</p>
            </div>
        @else
            <div class="admin-table-wrap">
                <table class="admin-table" id="komunitasTable">
                    <thead>
                        <tr>
                            <th class="no-col">#</th>
                            <th>Nama Komunitas</th>
                            <th>Kategori</th>
                            <th>Pembuat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($communities as $index => $comm)
                            <tr data-status="{{ $comm->status }}" data-name="{{ strtolower($comm->name) }}">
                                <td class="no-col">{{ $index + 1 }}</td>
                                <td><strong>{{ $comm->name }}</strong></td>
                                <td>
                                    @php
                                        $catClass = match($comm->category_slug) {
                                            'seni' => 'admin-pill-purple',
                                            'olahraga' => 'admin-pill-green',
                                            'pendidikan' => 'admin-pill-blue',
                                            'alam' => 'admin-pill-teal',
                                            'kuliner' => 'admin-pill-orange',
                                            default => 'admin-pill-yellow',
                                        };
                                    @endphp
                                    <span class="admin-pill {{ $catClass }}">{{ $comm->category }}</span>
                                </td>
                                <td>{{ $comm->creator->name ?? 'Anonim' }}</td>
                                <td>
                                    @if($comm->status === 'approved')
                                        <span class="admin-pill admin-pill-green">✅ Disetujui</span>
                                    @elseif($comm->status === 'pending')
                                        <span class="admin-pill admin-pill-yellow">⏳ Menunggu</span>
                                    @else
                                        <span class="admin-pill admin-pill-red">❌ Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-btns">
                                        @if($comm->status === 'pending')
                                            <form action="{{ route('admin.pengajuan.approve', $comm->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn-action approve">✅ Setujui</button>
                                            </form>
                                            <form action="{{ route('admin.pengajuan.reject', $comm->id) }}" method="POST" style="display:inline;" onsubmit="return handleReject(event, this)">
                                                @csrf
                                                <input type="hidden" name="reason" class="reject-reason-input">
                                                <button type="submit" class="btn-action reject">❌ Tolak</button>
                                            </form>
                                        @endif
                                        <a href="{{ route('komunitas.detail', $comm->slug) }}" class="btn-action view" target="_blank">👁️ Lihat</a>
                                        <form action="{{ route('admin.komunitas.delete', $comm->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus komunitas ini? Semua kegiatan dan anggota akan hilang.')">
                                            @csrf
                                            <button type="submit" class="btn-action delete">🗑️ Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <p class="result-info" id="resultInfo">
                Menampilkan <strong>{{ $communities->count() }}</strong> komunitas
            </p>
        @endif
    </main>

    <script>
        // Filter + search (client-side, tanpa reload)
        let currentFilter = 'all';
        let currentSearch = '';

        const filterTags = document.querySelectorAll('#filterTags .tag');
        const rows = document.querySelectorAll('#komunitasTable tbody tr');
        const resultInfo = document.getElementById('resultInfo');

        function applyFilter() {
            let visible = 0;
            rows.forEach(row => {
                const status = row.getAttribute('data-status');
                const name = row.getAttribute('data-name');
                const matchFilter = currentFilter === 'all' || status === currentFilter;
                const matchSearch = !currentSearch || name.includes(currentSearch);
                const show = matchFilter && matchSearch;
                row.style.display = show ? '' : 'none';
                if (show) visible++;
            });
            if (resultInfo) {
                resultInfo.innerHTML = `Menampilkan <strong>${visible}</strong> komunitas`;
            }
        }

        filterTags.forEach(tag => {
            tag.addEventListener('click', function () {
                filterTags.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                currentFilter = this.getAttribute('data-filter');
                applyFilter();
            });
        });

        const searchInput = document.getElementById('searchInput');
        if (searchInput) {
            searchInput.addEventListener('input', function () {
                currentSearch = this.value.trim().toLowerCase();
                applyFilter();
            });
        }

        // Handle reject dengan prompt alasan
        function handleReject(event, form) {
            event.preventDefault();
            const reason = prompt('Alasan penolakan (opsional):', 'Tidak memenuhi kriteria');
            if (reason === null) return false; // batal
            form.querySelector('.reject-reason-input').value = reason || 'Tidak memenuhi kriteria';
            form.submit();
            return false;
        }
    </script>
</body>
</html>