<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Profil Saya — Vibes Space Pidie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .profile-page-modern { padding-bottom: 100px; background: #fafaff; min-height: 100vh; overflow-x: hidden; }
        .profile-banner-mesh {
            position: relative; height: 240px;
            background:
                radial-gradient(circle at 15% 20%, #a855f7 0%, transparent 45%),
                radial-gradient(circle at 85% 30%, #ec4899 0%, transparent 45%),
                radial-gradient(circle at 50% 90%, #f97316 0%, transparent 45%),
                linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            overflow: hidden; margin-bottom: -100px;
        }
        .profile-container { max-width: 1000px; margin: 0 auto; padding: 0 24px; position: relative; z-index: 5; }
        .profile-hero-card {
            background: rgba(255,255,255,0.96);
            backdrop-filter: blur(28px);
            border-radius: 28px; padding: 32px;
            box-shadow: 0 32px 80px rgba(139,92,246,0.18);
            border: 1.5px solid rgba(255,255,255,0.95);
            display: flex; align-items: flex-start; gap: 28px; flex-wrap: wrap;
            position: relative;
        }
        .profile-hero-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px;
            background: linear-gradient(90deg, #8b5cf6, #ec4899, #f97316, #f59e0b);
            border-radius: 28px 28px 0 0;
        }
        .avatar-hero { position: relative; flex-shrink: 0; }
        .avatar-hero .avatar-ring {
            width: 130px; height: 130px; border-radius: 50%;
            background: conic-gradient(from 0deg, #8b5cf6, #ec4899, #f97316, #f59e0b, #8b5cf6);
            padding: 5px;
            box-shadow: 0 16px 40px rgba(236,72,153,0.35), 0 0 0 8px rgba(255,255,255,0.5);
        }
        .avatar-hero .avatar-inner {
            width: 100%; height: 100%; border-radius: 50%;
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            color: #fff; display: grid; place-items: center;
            font-size: 3.2rem; font-weight: 900;
            border: 4px solid #fff; overflow: hidden;
        }
        .avatar-hero .avatar-inner img { width: 100%; height: 100%; object-fit: cover; }
        .avatar-hero .online-dot {
            position: absolute; bottom: 10px; right: 10px; width: 26px; height: 26px;
            border-radius: 50%; background: linear-gradient(135deg, #10b981, #22c55e);
            border: 3.5px solid #fff; box-shadow: 0 0 0 4px rgba(16,185,129,0.2); z-index: 2;
        }
        .avatar-upload-btn {
            position: absolute; bottom: -6px; left: 50%; transform: translateX(-50%);
            padding: 7px 14px; background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff; border: 2.5px solid #fff; border-radius: 999px;
            font-family: inherit; font-size: 0.72rem; font-weight: 800;
            cursor: pointer; display: inline-flex; align-items: center; gap: 5px;
            box-shadow: 0 8px 24px rgba(139,92,246,0.4);
            transition: all 0.22s; z-index: 3; white-space: nowrap;
        }
        .avatar-upload-btn:hover { transform: translateX(-50%) translateY(-2px); }
        .avatar-upload-btn svg { width: 13px; height: 13px; stroke: currentColor; stroke-width: 2.5; fill: none; }
        #avatarInput { display: none; }
        .info-hero { flex: 1; min-width: 240px; }
        .welcome-tag {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 6px 14px;
            background: linear-gradient(135deg, #ede9fe 0%, #fce7f3 100%);
            color: #6d28d9; border-radius: 999px;
            font-size: 0.72rem; font-weight: 800; margin-bottom: 10px;
            border: 1.5px solid #ddd6fe;
        }
        .info-hero h1 {
            font-size: 1.9rem; font-weight: 900;
            letter-spacing: -0.03em; line-height: 1.15;
            margin-bottom: 6px; color: #0f172a;
        }
        .info-hero .email-line {
            display: flex; align-items: center; gap: 6px;
            color: #64748b; font-size: 0.88rem; margin-bottom: 14px;
            font-weight: 500; word-break: break-all;
        }
        .meta-pills { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
        .meta-pill {
            display: inline-flex; align-items: center; gap: 5px;
            padding: 7px 14px; border-radius: 999px;
            font-size: 0.74rem; font-weight: 700; white-space: nowrap;
        }
        .meta-pill.role {
            background: linear-gradient(135deg, #f5f3ff 0%, #ede9fe 100%);
            color: #6d28d9; border: 1.5px solid #ddd6fe;
        }
        .meta-pill.date {
            background: linear-gradient(135deg, #f0fdfa 0%, #ccfbf1 100%);
            color: #0f766e; border: 1.5px solid #99f6e4;
        }
        .actions-hero { flex-shrink: 0; display: flex; flex-direction: column; gap: 8px; align-items: stretch; }
        .tabs-modern {
            display: flex; gap: 6px; margin-top: 24px; margin-bottom: 24px;
            padding: 6px; background: rgba(255,255,255,0.85);
            backdrop-filter: blur(16px); border-radius: 18px;
            border: 1.5px solid rgba(255,255,255,0.95);
            overflow-x: auto; scrollbar-width: none;
        }
        .tabs-modern::-webkit-scrollbar { display: none; }
        .tab-modern {
            flex: 1; min-width: 100px; padding: 12px 16px;
            border: none; background: transparent; font-family: inherit;
            font-weight: 700; font-size: 0.82rem; color: #64748b;
            border-radius: 12px; cursor: pointer;
            display: inline-flex; align-items: center; justify-content: center;
            gap: 6px; white-space: nowrap; transition: all 0.25s;
        }
        .tab-modern:hover { background: rgba(139,92,246,0.08); color: #6d28d9; }
        .tab-modern.active {
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff; box-shadow: 0 8px 24px rgba(139,92,246,0.35);
        }
        .tab-count {
            background: rgba(0,0,0,0.08); padding: 2px 8px;
            border-radius: 999px; font-size: 0.68rem; font-weight: 800;
            min-width: 22px; text-align: center;
        }
        .tab-modern.active .tab-count { background: rgba(255,255,255,0.3); }
        .tab-content-modern { animation: fadeSlideIn 0.4s; }
        @keyframes fadeSlideIn { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
        .empty-cantik {
            text-align: center; padding: 60px 24px;
            background: rgba(255,255,255,0.75); backdrop-filter: blur(16px);
            border-radius: 24px; border: 2px dashed #ddd6fe;
        }
        .empty-cantik .empty-emoji { font-size: 3.5rem; margin-bottom: 16px; display: inline-block; }
        .empty-cantik h4 { font-size: 1.1rem; font-weight: 800; color: #0f172a; margin-bottom: 6px; }
        .empty-cantik p { color: #64748b; font-size: 0.88rem; margin-bottom: 20px; max-width: 340px; margin-left: auto; margin-right: auto; line-height: 1.6; }
        .profile-alert {
            padding: 12px 16px; border-radius: 12px; font-size: 0.85rem;
            font-weight: 600; margin-bottom: 18px; display: flex; align-items: flex-start; gap: 8px;
        }
        .profile-alert.success { background: #ecfdf5; border: 1.5px solid #a7f3d0; color: #065f46; }
        .profile-alert.error { background: #fef2f2; border: 1.5px solid #fecaca; color: #991b1b; }
        .avatar-modal-overlay {
            position: fixed; inset: 0; background: rgba(15,23,42,0.65);
            backdrop-filter: blur(6px); z-index: 1000;
            display: none; align-items: center; justify-content: center; padding: 20px;
        }
        .avatar-modal-overlay.show { display: flex; }
        .avatar-modal-box {
            background: #fff; border-radius: 24px; width: 100%; max-width: 420px;
            padding: 24px; box-shadow: 0 30px 80px rgba(0,0,0,0.3);
            animation: modalSlide 0.3s cubic-bezier(0.4,0,0.2,1);
        }
        @keyframes modalSlide { from { opacity: 0; transform: translateY(30px) scale(0.97); } to { opacity: 1; transform: translateY(0) scale(1); } }
        .avatar-modal-header {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 18px; padding-bottom: 14px; border-bottom: 1px solid #eef0f5;
        }
        .avatar-modal-header h3 { font-size: 1.05rem; font-weight: 900; color: #0f172a; }
        .avatar-modal-close {
            width: 34px; height: 34px; border-radius: 50%;
            background: #f5f3ff; color: #6d28d9; border: none;
            font-size: 1.2rem; cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            transition: all 0.2s;
        }
        .avatar-modal-close:hover { background: #fee2e2; color: #dc2626; transform: rotate(90deg); }
        .avatar-preview-box {
            width: 150px; height: 150px; margin: 0 auto 18px;
            border-radius: 50%; background: linear-gradient(135deg, #8b5cf6, #ec4899);
            display: grid; place-items: center; overflow: hidden;
            border: 4px solid #f0e9ff;
            box-shadow: 0 12px 32px rgba(139,92,246,0.25);
            color: #fff; font-size: 3.5rem; font-weight: 900;
        }
        .avatar-preview-box img { width: 100%; height: 100%; object-fit: cover; }
        .upload-zone {
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            padding: 20px; border: 2px dashed #c4b5fd; border-radius: 14px;
            background: #fafaff; cursor: pointer; transition: all 0.2s;
            margin-bottom: 14px; text-align: center;
        }
        .upload-zone:hover { background: #f5f3ff; border-color: #8b5cf6; }
        .upload-zone-icon { font-size: 1.8rem; margin-bottom: 6px; }
        .upload-zone h4 { font-size: 0.86rem; font-weight: 800; color: #0f172a; margin-bottom: 3px; }
        .upload-zone p { font-size: 0.72rem; color: #94a3b8; font-weight: 600; }
        .avatar-modal-actions { display: flex; gap: 8px; }
        .avatar-btn {
            flex: 1; padding: 11px 16px; border-radius: 10px;
            font-family: inherit; font-size: 0.82rem; font-weight: 800;
            cursor: pointer; transition: all 0.2s;
            display: inline-flex; align-items: center; justify-content: center;
            gap: 5px; border: none;
        }
        .avatar-btn.cancel { background: #f1f5f9; color: #475569; }
        .avatar-btn.cancel:hover { background: #e2e8f0; }
        .avatar-btn.save {
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            color: #fff; box-shadow: 0 6px 20px rgba(139,92,246,0.35);
        }
        .avatar-btn.save:hover { transform: translateY(-1px); }
        .avatar-btn.save:disabled { opacity: 0.5; cursor: not-allowed; transform: none; }
        @media (max-width: 768px) {
            .profile-banner-mesh { height: 200px; margin-bottom: -80px; }
            .profile-hero-card {
                padding: 24px 18px 28px; border-radius: 22px;
                flex-direction: column; text-align: center;
                align-items: center; gap: 20px;
            }
            .avatar-hero .avatar-ring { width: 110px; height: 110px; }
            .avatar-hero .avatar-inner { font-size: 2.6rem; }
            .info-hero { min-width: 100%; }
            .info-hero h1 { font-size: 1.45rem; }
            .info-hero .email-line { justify-content: center; font-size: 0.82rem; }
            .meta-pills { justify-content: center; }
            .actions-hero { width: 100%; }
            .actions-hero .btn { width: 100%; padding: 12px; font-size: 0.85rem; }
            .tabs-modern { padding: 4px; border-radius: 14px; margin-top: 20px; margin-bottom: 18px; }
            .tab-modern { padding: 10px 12px; font-size: 0.76rem; min-width: 80px; border-radius: 10px; }
            .tab-count { font-size: 0.62rem; padding: 1px 6px; min-width: 18px; }
        }
        @media (max-width: 380px) {
            .info-hero h1 { font-size: 1.25rem; }
        }
    </style>
</head>
<body>

    @include('partials.navbar', ['active' => null])

    <main class="profile-page-modern">
        <div class="profile-banner-mesh"></div>

        <div class="profile-container">
            @if(session('success'))
                <div class="profile-alert success"><span>✓</span><span>{{ session('success') }}</span></div>
            @endif
            @if(session('error'))
                <div class="profile-alert error"><span>✕</span><span>{{ session('error') }}</span></div>
            @endif

            <div class="profile-hero-card">
                <div class="avatar-hero">
                    <div class="avatar-ring">
                        <div class="avatar-inner" id="avatarInner">
                            @if(auth()->user()->avatar && \Storage::disk('public')->exists(auth()->user()->avatar))
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}">
                            @else
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            @endif
                        </div>
                    </div>
                    <div class="online-dot"></div>
                    <button type="button" class="avatar-upload-btn" onclick="openAvatarModal()">
                        <svg viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                        Ganti Foto
                    </button>
                </div>

                <div class="info-hero">
                    <span class="welcome-tag">Halo, selamat datang</span>
                    <h1>{{ auth()->user()->name }}</h1>
                    <div class="email-line">
                        <span>📧</span>
                        <span>{{ auth()->user()->email }}</span>
                    </div>
                    <div class="meta-pills">
                        <span class="meta-pill role">
                            @if(auth()->user()->isAdmin()) Admin Platform
                            @elseif(auth()->user()->isPembuat()) Pembuat
                            @else Anggota @endif
                        </span>
                        <span class="meta-pill date">
                            Bergabung {{ auth()->user()->created_at->translatedFormat('d F Y') }}
                        </span>
                    </div>
                </div>

                <div class="actions-hero">
                    <a href="{{ route('buat-komunitas') }}" class="btn btn-primary">+ Buat Komunitas</a>
                </div>
            </div>

            <div class="tabs-modern">
                <button class="tab-modern active" onclick="switchTab('joined', event)">Diikuti <span class="tab-count">{{ $stats['joined'] ?? 0 }}</span></button>
                <button class="tab-modern" onclick="switchTab('created', event)">Dibuat <span class="tab-count">{{ $stats['created'] ?? 0 }}</span></button>
                <button class="tab-modern" onclick="switchTab('events', event)">Kegiatan <span class="tab-count">{{ $stats['events'] ?? 0 }}</span></button>
            </div>

            <!-- TAB 1: DIIKUTI -->
            <div id="tab-joined-content" class="tab-content-modern">
                @if($joinedCommunities->isEmpty())
                    <div class="empty-cantik">
                        <div class="empty-emoji">🎯</div>
                        <h4>Belum mengikuti komunitas</h4>
                        <p>Jelajahi komunitas kreatif di Pidie dan bergabunglah!</p>
                        <a href="{{ route('komunitas') }}" class="btn btn-primary">Jelajahi Komunitas</a>
                    </div>
                @else
                    <div class="card-grid">
                        @foreach($joinedCommunities as $comm)
                            <article class="card">
                                <div class="card-cover"><img src="{{ $comm->cover }}" alt="{{ $comm->name }}" loading="lazy"></div>
                                <div class="card-body">
                                    <span class="card-tag">{{ $comm->category }}</span>
                                    <h4>{{ $comm->name }}</h4>
                                    <p class="card-meta">📍 Pidie</p>
                                    <p class="card-desc">{{ Str::limit($comm->description, 100) }}</p>
                                    <a href="{{ route('komunitas.detail', $comm->slug) }}" class="btn btn-primary btn-sm mt-1">Lihat Detail</a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- TAB 2: DIBUAT -->
            <div id="tab-created-content" class="tab-content-modern" style="display:none;">
                @if($createdCommunities->isEmpty())
                    <div class="empty-cantik">
                        <div class="empty-emoji">🚀</div>
                        <h4>Belum membuat komunitas</h4>
                        <p>Mulai buat komunitas kreatifmu sendiri!</p>
                        <a href="{{ route('buat-komunitas') }}" class="btn btn-primary">+ Buat Komunitas</a>
                    </div>
                @else
                    <div class="card-grid">
                        @foreach($createdCommunities as $comm)
                            <article class="card">
                                <div class="card-cover"><img src="{{ $comm->cover }}" alt="{{ $comm->name }}" loading="lazy"></div>
                                <div class="card-body">
                                    <span class="card-tag">{{ $comm->category }}</span>
                                    <h4>{{ $comm->name }}</h4>
                                    <p class="card-meta">📍 Pidie</p>
                                    @if($comm->status === 'pending')
                                        <span class="admin-pill admin-pill-yellow" style="margin-bottom:8px; display:inline-block;">Menunggu Review</span>
                                        <p class="card-desc"><em>Menunggu persetujuan admin...</em></p>
                                    @elseif($comm->status === 'approved')
                                        <span class="admin-pill admin-pill-green" style="margin-bottom:8px; display:inline-block;">Disetujui</span>
                                        <p class="card-desc">{{ Str::limit($comm->description, 100) }}</p>
                                        <div style="display:flex; gap:8px; flex-wrap:wrap;">
                                            <a href="{{ route('kelola-komunitas', $comm->slug) }}" class="btn btn-primary btn-sm">⚙️ Kelola</a>
                                            <a href="{{ route('komunitas.detail', $comm->slug) }}" class="btn btn-outline btn-sm">Lihat Publik</a>
                                        </div>
                                    @else
                                        <span class="admin-pill admin-pill-red" style="margin-bottom:8px; display:inline-block;">Ditolak</span>
                                        <p class="card-desc">{{ $comm->reject_reason ?? 'Tidak memenuhi kriteria' }}</p>
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- TAB 3: KEGIATAN -->
            <div id="tab-events-content" class="tab-content-modern" style="display:none;">
                @if(isset($registeredEvents) && $registeredEvents->isEmpty())
                    <div class="empty-cantik">
                        <div class="empty-emoji">📅</div>
                        <h4>Belum mengikuti kegiatan</h4>
                        <p>Kegiatan yang kamu ikuti akan tampil di sini.</p>
                        <a href="{{ route('kegiatan') }}" class="btn btn-primary">Lihat Kegiatan</a>
                    </div>
                @elseif(isset($registeredEvents))
                    <div class="card-grid">
                        @foreach($registeredEvents as $event)
                            <article class="card">
                                <div class="card-body" style="padding: 20px;">
                                    <span class="card-tag" style="margin-bottom: 12px;">{{ $event->community->name ?? 'Kegiatan' }}</span>
                                    <h4 style="margin-bottom: 8px;">{{ $event->title }}</h4>
                                    <p class="card-meta" style="margin-bottom: 8px;">
                                        📅 {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }} 
                                        @if($event->event_time) · {{ substr($event->event_time, 0, 5) }} WIB @endif
                                    </p>
                                    <p class="card-meta" style="margin-bottom: 12px;">📍 {{ $event->location }}</p>
                                    
                                    <!-- TOMBOL DETAIL: Diarahkan ke halaman kegiatan dengan parameter ?open=id -->
                                    <a href="{{ route('kegiatan') }}?open={{ $event->id }}" class="btn btn-primary btn-sm mt-1">Detail</a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="empty-cantik">
                        <div class="empty-emoji">📅</div>
                        <h4>Data kegiatan tidak tersedia</h4>
                        <p>Silakan kembali ke halaman kegiatan untuk melihat daftar kegiatan.</p>
                        <a href="{{ route('kegiatan') }}" class="btn btn-primary">Lihat Kegiatan</a>
                    </div>
                @endif
            </div>
            
        </div>
    </main>

    <div class="avatar-modal-overlay" id="avatarModal" onclick="closeAvatarModal(event)">
        <div class="avatar-modal-box" onclick="event.stopPropagation()">
            <div class="avatar-modal-header">
                <h3>Ganti Foto Profil</h3>
                <button class="avatar-modal-close" onclick="closeAvatarModal()">×</button>
            </div>

            <div class="avatar-preview-box" id="avatarPreview">
                @if(auth()->user()->avatar && \Storage::disk('public')->exists(auth()->user()->avatar))
                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Preview">
                @else
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                @endif
            </div>

            <form id="avatarForm" action="{{ route('profil.avatar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="avatar" id="avatarInput" accept="image/jpeg,image/jpg,image/png,image/webp" onchange="previewAvatar(event)">
                <label for="avatarInput" class="upload-zone">
                    <div class="upload-zone-icon">📱</div>
                    <h4>Pilih Foto dari Galeri</h4>
                    <p>JPG, PNG, atau WEBP · Maks 3MB</p>
                </label>
                <div class="avatar-modal-actions">
                    <button type="button" class="avatar-btn cancel" onclick="closeAvatarModal()">Batal</button>
                    <button type="submit" class="avatar-btn save" id="avatarSaveBtn" disabled>Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function switchTab(tab, event) {
            const contents = ['tab-joined-content', 'tab-created-content', 'tab-events-content'];
            contents.forEach(id => {
                const el = document.getElementById(id);
                if (el) el.style.display = 'none';
            });

            document.querySelectorAll('.tab-modern').forEach(t => t.classList.remove('active'));
            
            if (event && event.target) {
                event.target.closest('.tab-modern').classList.add('active');
            }

            const activeContent = document.getElementById('tab-' + tab + '-content');
            if (activeContent) activeContent.style.display = 'block';
        }

        function openAvatarModal() {
            document.getElementById('avatarModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }
        function closeAvatarModal(e) {
            if (e && e.target !== e.currentTarget) return;
            document.getElementById('avatarModal').classList.remove('show');
            document.body.style.overflow = '';
            document.getElementById('avatarForm').reset();
            document.getElementById('avatarSaveBtn').disabled = true;
        }
        function previewAvatar(event) {
            const file = event.target.files[0];
            if (!file) return;
            if (file.size > 3 * 1024 * 1024) {
                alert('Ukuran foto terlalu besar. Maksimal 3MB.');
                event.target.value = '';
                return;
            }
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatarPreview').innerHTML =
                    '<img src="' + e.target.result + '" alt="Preview">';
                document.getElementById('avatarSaveBtn').disabled = false;
            };
            reader.readAsDataURL(file);
        }
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeAvatarModal();
        });
        document.getElementById('avatarForm').addEventListener('submit', function() {
            const btn = document.getElementById('avatarSaveBtn');
            btn.disabled = true;
            btn.textContent = 'Mengunggah...';
        });
    </script>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>