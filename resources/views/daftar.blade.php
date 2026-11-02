<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar — Vibes Space Pidie</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="navbar">
        <div class="container navbar-inner">
            <a href="{{ route('home') }}" class="logo">
                <span class="logo-icon">V</span>
                <span class="logo-text">Vibes<span>Space</span></span>
            </a>
            <nav class="nav-links">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('komunitas') }}">Komunitas</a>
                <a href="{{ route('kegiatan') }}">Kegiatan</a>
            </nav>
            <div class="nav-actions">
                @auth
                    <a href="{{ route('profil') }}" class="user-chip">
                        @if(auth()->user()->isAdmin()) 👑 Admin
                        @elseif(auth()->user()->isPembuat()) 🛡️ Pembuat
                        @else 👤 Anggota @endif
                        · {{ auth()->user()->name }}
                    </a>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-outline">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline">Masuk</a>
                    <a href="{{ route('daftar') }}" class="btn btn-primary active-btn">Daftar</a>
                @endauth
            </div>
        </div>
    </header>

    <main class="page-auth">
        <div class="auth-card">
            <div class="auth-header">
                <h2>Buat akun baru ✨</h2>
                <p class="text-soft">Gabung dengan komunitas kreatif di Pidie.</p>
            </div>

            @if($errors->any())
                <div style="background:#fef2f2;color:#991b1b;padding:10px 14px;border-radius:8px;font-size:0.85rem;margin-bottom:16px;border:1px solid #fecaca;">❌ {{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('daftar.post') }}">
                @csrf
                <div class="form-group">
                    <label>Nama lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama kamu" required autofocus>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required>
                </div>
                <div class="form-group">
                    <label>Kata sandi</label>
                    <input type="password" name="password" placeholder="Minimal 8 karakter" required>
                </div>
                <div class="form-group">
                    <label>Konfirmasi kata sandi</label>
                    <input type="password" name="password_confirmation" placeholder="Ulangi kata sandi" required>
                </div>
                <button type="submit" class="btn btn-primary btn-full mt-2">Buat akun</button>
            </form>

            <p class="auth-footer">Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
        </div>
    </main>

</body>
</html>