<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Masuk — Vibes Space Pidie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .login-page {
            min-height: 100vh;
            min-height: 100dvh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #fafaff;
            overflow: hidden;
        }
        .login-brand-panel {
            position: relative;
            background: linear-gradient(135deg, #7c3aed 0%, #8b5cf6 40%, #ec4899 100%);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 48px 56px;
            overflow: hidden;
            color: #fff;
        }
        .login-brand-panel::before {
            content: '';
            position: absolute;
            top: -100px; right: -100px;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            pointer-events: none;
        }
        .login-brand-panel::after {
            content: '';
            position: absolute;
            bottom: -150px; left: -80px;
            width: 380px; height: 380px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.10) 0%, transparent 70%);
            pointer-events: none;
        }
        .login-brand-top {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .login-brand-logo {
            width: 48px; height: 48px;
            border-radius: 14px;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(12px);
            border: 1.5px solid rgba(255,255,255,0.3);
            display: grid;
            place-items: center;
            font-size: 1.4rem;
            font-weight: 900;
            color: #fff;
            transform: rotate(-5deg);
        }
        .login-brand-name {
            font-size: 1.15rem;
            font-weight: 900;
            letter-spacing: -0.02em;
        }
        .login-brand-name span { opacity: 0.7; }
        .login-brand-center {
            position: relative;
            z-index: 2;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px 0;
        }
        .login-brand-headline {
            font-size: 2.6rem;
            font-weight: 900;
            letter-spacing: -0.04em;
            line-height: 1.1;
            margin-bottom: 20px;
        }
        .login-brand-headline em {
            font-style: normal;
            display: inline-block;
            position: relative;
        }
        .login-brand-headline em::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 0;
            right: 0;
            height: 8px;
            background: rgba(255,255,255,0.3);
            border-radius: 4px;
            z-index: -1;
        }
        .login-brand-desc {
            font-size: 1rem;
            line-height: 1.65;
            color: rgba(255,255,255,0.9);
            max-width: 420px;
            font-weight: 500;
        }
        .login-brand-features {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 32px;
        }
        .login-feature {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.9rem;
            font-weight: 600;
            color: rgba(255,255,255,0.95);
        }
        .login-feature-icon {
            width: 32px; height: 32px;
            border-radius: 10px;
            background: rgba(255,255,255,0.18);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.25);
            display: grid;
            place-items: center;
            font-size: 0.95rem;
            flex-shrink: 0;
        }
        .login-brand-footer {
            position: relative;
            z-index: 2;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.75);
            font-weight: 500;
        }
        .login-form-panel {
            display: flex;
            flex-direction: column;
            background: #fafaff;
            padding: 40px 48px;
            overflow-y: auto;
        }
        .login-form-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: auto;
        }
        .login-back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
            font-weight: 700;
            color: #64748b;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 999px;
            background: #fff;
            border: 1.5px solid #e8eaf0;
            transition: all 0.2s;
        }
        .login-back-link:hover {
            color: #6d28d9;
            border-color: #c4b5fd;
            background: #f5f3ff;
        }
        .login-back-link svg {
            width: 14px; height: 16px;
            stroke: currentColor;
            stroke-width: 2.5;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .login-form-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 0;
        }
        .login-form-card {
            width: 100%;
            max-width: 420px;
            animation: fadeSlideIn 0.5s ease both;
        }
        @keyframes fadeSlideIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .login-form-header {
            margin-bottom: 28px;
            text-align: left;
        }
        .login-form-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: linear-gradient(135deg, #ede9fe, #fce7f3);
            color: #6d28d9;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 14px;
            border: 1.5px solid #ddd6fe;
        }
        .login-form-title {
            font-size: 2rem;
            font-weight: 900;
            color: #0f172a;
            letter-spacing: -0.03em;
            line-height: 1.15;
            margin-bottom: 8px;
        }
        .login-form-sub {
            font-size: 0.92rem;
            color: #64748b;
            font-weight: 500;
            line-height: 1.6;
        }
        .login-alert {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 20px;
            line-height: 1.5;
        }
        .login-alert.error {
            background: #fef2f2;
            border: 1.5px solid #fecaca;
            color: #991b1b;
        }
        .login-alert.success {
            background: #ecfdf5;
            border: 1.5px solid #a7f3d0;
            color: #065f46;
        }
        .login-field {
            margin-bottom: 16px;
        }
        .login-field label {
            display: block;
            font-size: 0.82rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 8px;
        }
        .login-input-wrap {
            position: relative;
        }
        .login-input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            stroke: #94a3b8;
            stroke-width: 2;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            pointer-events: none;
            z-index: 2;
        }
        .login-input-wrap input {
            width: 100%;
            padding: 15px 16px 15px 48px;
            border: 2px solid #e8eaf0;
            border-radius: 14px;
            background: #fff;
            font-family: inherit;
            font-size: 0.95rem;
            color: #0f172a;
            font-weight: 500;
            transition: all 0.2s;
        }
        .login-input-wrap input::placeholder {
            color: #94a3b8;
            font-weight: 400;
        }
        .login-input-wrap input:focus {
            outline: none;
            border-color: #8b5cf6;
            box-shadow: 0 0 0 4px rgba(139,92,246,0.12);
        }
        .login-input-wrap input.has-toggle {
            padding-right: 52px;
        }
        .login-pw-toggle {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: transparent;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            transition: all 0.2s;
            z-index: 2;
        }
        .login-pw-toggle:hover {
            background: #f5f3ff;
            color: #6d28d9;
        }
        .login-pw-toggle svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            stroke-width: 2;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .login-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }
        .login-checkbox {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            color: #475569;
            font-weight: 600;
            cursor: pointer;
            user-select: none;
        }
        .login-checkbox input[type="checkbox"] {
            appearance: none;
            width: 18px;
            height: 18px;
            border: 2px solid #cbd5e1;
            border-radius: 5px;
            background: #fff;
            cursor: pointer;
            position: relative;
            flex-shrink: 0;
        }
        .login-checkbox input[type="checkbox"]:checked {
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            border-color: #8b5cf6;
        }
        .login-checkbox input[type="checkbox"]:checked::after {
            content: '';
            position: absolute;
            left: 4px;
            top: 1px;
            width: 5px;
            height: 9px;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
        .login-forgot {
            font-size: 0.85rem;
            color: #8b5cf6;
            font-weight: 700;
            text-decoration: none;
        }
        .login-forgot:hover {
            color: #6d28d9;
            text-decoration: underline;
        }
        .login-submit {
            width: 100%;
            padding: 15px 24px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            color: #fff;
            font-family: inherit;
            font-size: 0.95rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.25s;
            box-shadow: 0 8px 24px rgba(139,92,246,0.35);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 52px;
        }
        .login-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(139,92,246,0.5);
        }
        .login-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }
        .login-submit svg {
            width: 18px;
            height: 18px;
            stroke: currentColor;
            stroke-width: 2.5;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .login-footer {
            text-align: center;
            font-size: 0.88rem;
            color: #64748b;
            font-weight: 500;
            margin-top: 24px;
        }
        .login-footer a {
            color: #8b5cf6;
            font-weight: 800;
            text-decoration: none;
        }
        .login-footer a:hover {
            color: #6d28d9;
            text-decoration: underline;
        }
        .login-mobile-brand {
            display: none;
        }
        @media (max-width: 900px) {
            .login-page {
                grid-template-columns: 1fr;
                min-height: 100vh;
            }
            .login-brand-panel { display: none; }
            .login-form-panel {
                padding: 0;
                background: #fafaff;
                min-height: 100vh;
            }
            .login-mobile-brand {
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 28px 20px 22px;
                background: linear-gradient(135deg, #7c3aed 0%, #8b5cf6 40%, #ec4899 100%);
                position: relative;
                overflow: hidden;
            }
            .login-mobile-logo {
                width: 56px; height: 56px;
                border-radius: 16px;
                background: rgba(255,255,255,0.2);
                backdrop-filter: blur(12px);
                border: 1.5px solid rgba(255,255,255,0.3);
                display: grid;
                place-items: center;
                font-size: 1.6rem;
                font-weight: 900;
                color: #fff;
                margin-bottom: 12px;
            }
            .login-mobile-name {
                font-size: 1.2rem;
                font-weight: 900;
                color: #fff;
                margin-bottom: 4px;
            }
            .login-mobile-tagline {
                font-size: 0.78rem;
                color: rgba(255,255,255,0.85);
                font-weight: 600;
            }
            .login-form-top {
                padding: 16px 20px;
                background: #fafaff;
                margin-bottom: 0;
            }
            .login-form-wrapper {
                padding: 8px 20px 40px;
                align-items: flex-start;
            }
            .login-form-title { font-size: 1.6rem; }
            .login-input-wrap input {
                padding: 14px 16px 14px 46px;
                font-size: 16px;
                border-radius: 12px;
            }
            .login-input-wrap input.has-toggle { padding-right: 50px; }
            .login-input-icon { left: 14px; width: 18px; height: 18px; }
            .login-submit { padding: 14px 20px; min-height: 50px; }
        }
        @media (max-width: 380px) {
            .login-form-wrapper { padding: 4px 16px 32px; }
            .login-form-title { font-size: 1.4rem; }
        }
    </style>
</head>
<body>

    @include('partials.navbar')

    <div class="login-page">

        <aside class="login-brand-panel">
            <div class="login-brand-top">
                <div class="login-brand-logo">V</div>
                <div class="login-brand-name">Vibes<span>Space</span></div>
            </div>
            <div class="login-brand-center">
                <h1 class="login-brand-headline">
                    Temukan vibes<br>
                    <em>komunitas</em> terbaikmu
                </h1>
                <p class="login-brand-desc">
                    Bergabung dengan ribuan kreator Pidie. Dari seni, olahraga, kuliner, sampai pendidikan — semua ada di sini.
                </p>
                <div class="login-brand-features">
                    <div class="login-feature">
                        <div class="login-feature-icon">1</div>
                        <span>Temukan komunitas sesuai minatmu</span>
                    </div>
                    <div class="login-feature">
                        <div class="login-feature-icon">2</div>
                        <span>Ikuti kegiatan seru setiap minggu</span>
                    </div>
                    <div class="login-feature">
                        <div class="login-feature-icon">3</div>
                        <span>Buat komunitas kreatif sendiri</span>
                    </div>
                </div>
            </div>
            <div class="login-brand-footer">
                © {{ date('Y') }} Vibes Space Pidie
            </div>
        </aside>

        <main class="login-form-panel">

            <div class="login-mobile-brand">
                <div class="login-mobile-logo">V</div>
                <div class="login-mobile-name">VibesSpace</div>
                <div class="login-mobile-tagline">Komunitas Kreatif Pidie</div>
            </div>

            <div class="login-form-top">
                <a href="{{ route('home') }}" class="login-back-link">
                    <svg viewBox="0 0 24 24"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                    <span>Beranda</span>
                </a>
            </div>

            <div class="login-form-wrapper">
                <div class="login-form-card">

                    <div class="login-form-header">
                        <div class="login-form-badge">Selamat Datang Kembali</div>
                        <h2 class="login-form-title">Masuk ke akunmu</h2>
                        <p class="login-form-sub">Lanjutkan petualanganmu di Vibes Space Pidie</p>
                    </div>

                    @if(session('success'))
                        <div class="login-alert success">
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="login-alert error">
                            <span>{{ $errors->first() }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.post') }}" autocomplete="on">
                        @csrf

                        <div class="login-field">
                            <label for="email">Email</label>
                            <div class="login-input-wrap">
                                <svg class="login-input-icon" viewBox="0 0 24 24">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                    <polyline points="22,6 12,13 2,6"/>
                                </svg>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="nama@email.com"
                                    required
                                    autofocus
                                    autocomplete="email"
                                >
                            </div>
                        </div>

                        <div class="login-field">
                            <label for="password">Kata Sandi</label>
                            <div class="login-input-wrap">
                                <svg class="login-input-icon" viewBox="0 0 24 24">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                </svg>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="Masukkan kata sandi"
                                    required
                                    autocomplete="current-password"
                                    class="has-toggle"
                                >
                                <button type="button" class="login-pw-toggle" onclick="togglePassword()" id="pwToggle">
                                    <svg viewBox="0 0 24 24" id="pwIconShow">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                    <svg viewBox="0 0 24 24" id="pwIconHide" style="display:none;">
                                        <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                                        <line x1="1" y1="1" x2="23" y2="23"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="login-options">
                            <label class="login-checkbox">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span>Ingat saya</span>
                            </label>
                            <a href="#" class="login-forgot" onclick="event.preventDefault(); alert('Fitur lupa kata sandi belum tersedia.');">
                                Lupa kata sandi?
                            </a>
                        </div>

                        <button type="submit" class="login-submit" id="submitBtn">
                            <span>Masuk Sekarang</span>
                            <svg viewBox="0 0 24 24">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </button>
                    </form>

                    <div class="login-footer">
                        Belum punya akun? <a href="{{ route('daftar') }}">Daftar gratis</a>
                    </div>

                </div>
            </div>

        </main>

    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const iconShow = document.getElementById('pwIconShow');
            const iconHide = document.getElementById('pwIconHide');
            if (input.type === 'password') {
                input.type = 'text';
                iconShow.style.display = 'none';
                iconHide.style.display = 'block';
            } else {
                input.type = 'password';
                iconShow.style.display = 'block';
                iconHide.style.display = 'none';
            }
        }
        document.querySelector('form').addEventListener('submit', function () {
            const btn = document.getElementById('submitBtn');
            btn.disabled = true;
            btn.querySelector('span').textContent = 'Memproses...';
        });
    </script>

</body>
</html>