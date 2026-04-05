<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — SIMAKU</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: fixed; inset: 0; z-index: 0;
            background-image: url('https://images.unsplash.com/photo-1607237138185-eedd9c632b0b?w=1400&q=80');
            background-size: cover;
            background-position: center;
            filter: blur(8px) brightness(0.38) saturate(0.7);
            transform: scale(1.07);
        }

        /* ── CARD UTAMA ── */
        .page {
            position: relative; z-index: 1;
            display: flex;
            width: 100%;
            max-width: 980px;
            min-height: 560px;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 32px 80px rgba(0, 0, 0, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.12);
        }

        /* ════════════════════════════
           LEFT PANEL — Branding only
           ════════════════════════════ */
        .left {
            flex: 1.1;
            background: rgba(8, 20, 55, 0.78);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 3rem 2.75rem;
            border-right: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Brand header */
        .top-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 2.25rem;
        }

        .logo-sq {
            width: 52px; height: 52px; flex-shrink: 0;
            background: rgba(255, 255, 255, 0.1);
            border: 1.5px solid rgba(255, 255, 255, 0.18);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
        }

        .logo-sq img { width: 36px; height: 36px; object-fit: contain; }

        .brand-text-title { font-size: 22px; font-weight: 700; color: #fff; letter-spacing: -0.3px; line-height: 1.1; }
        .brand-text-sub   { font-size: 11.5px; color: rgba(255, 255, 255, 0.4); margin-top: 3px; }

        /* Welcome badge */
        .welcome-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 9.5px; font-weight: 700;
            letter-spacing: 0.1em; text-transform: uppercase;
            color: rgba(99, 179, 237, 0.9);
            background: rgba(59, 130, 246, 0.15);
            border: 1px solid rgba(59, 130, 246, 0.25);
            border-radius: 20px; padding: 4px 10px;
            margin-bottom: 1rem;
            width: fit-content;
        }

        .pulse {
            width: 6px; height: 6px; border-radius: 50%;
            background: #60a5fa;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50%       { opacity: 0.3; }
        }

        /* Welcome heading */
        .welcome-heading {
            font-size: 28px; font-weight: 700; color: #fff;
            line-height: 1.25; letter-spacing: -0.5px;
            margin-bottom: 1rem;
        }

        .welcome-heading em { font-style: italic; color: rgba(147, 197, 253, 0.9); }

        .welcome-desc {
            font-size: 13.5px; color: rgba(255, 255, 255, 0.48);
            line-height: 1.75; margin-bottom: 2.25rem;
            max-width: 340px;
        }

        /* Feature list */
        .feature-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .feature-dot {
            width: 7px; height: 7px; border-radius: 50%;
            background: rgba(59, 130, 246, 0.7);
            flex-shrink: 0;
        }

        .feature-text {
            font-size: 12.5px;
            color: rgba(255, 255, 255, 0.42);
            line-height: 1.4;
        }

        /* ════════════════════════════
           RIGHT PANEL — Demo + Form
           ════════════════════════════ */
        .right {
            flex: 0.9;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            padding: 2.25rem 2.5rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* ── Demo Quick-Fill (sekarang di kanan, atas form) ── */
        .demo-section {
            background: #f8faff;
            border: 1.5px solid #e0e9ff;
            border-radius: 14px;
            padding: 14px 16px;
            margin-bottom: 1.4rem;
        }

        .demo-label {
            font-size: 9.5px; font-weight: 700;
            letter-spacing: 0.1em; text-transform: uppercase;
            color: #94a3b8;
            margin-bottom: 10px;
            display: flex; align-items: center; gap: 6px;
        }

        .demo-label::before {
            content: '';
            display: inline-block;
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #3b82f6;
            animation: pulse 2s infinite;
        }

        .demo-btns {
            display: flex;
            gap: 7px;
        }

        .demo-btn {
            flex: 1;
            padding: 9px 8px;
            border-radius: 10px;
            border: 1.5px solid #e2e8f0;
            background: #fff;
            color: #334155;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 11.5px; font-weight: 600;
            cursor: pointer;
            transition: all 0.16s;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            text-align: center;
        }

        .demo-btn .btn-emoji { font-size: 18px; line-height: 1; }

        .demo-btn .btn-role { font-size: 11px; font-weight: 700; color: #1e293b; }

        .role-badge {
            font-size: 8.5px; padding: 1.5px 6px;
            border-radius: 4px; font-weight: 700; letter-spacing: 0.04em;
        }

        .badge-mhs   { background: rgba(16, 185, 129, 0.12); color: #059669; }
        .badge-staff { background: rgba(59, 130, 246, 0.12); color: #2563eb; }
        .badge-admin { background: rgba(239, 68, 68, 0.12);  color: #dc2626; }

        .demo-btn:hover {
            border-color: #93c5fd;
            background: #f0f7ff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.12);
        }

        .demo-btn.active-mhs   { border-color: #10b981; background: #ecfdf5; }
        .demo-btn.active-staff { border-color: #3b82f6; background: #eff6ff; }
        .demo-btn.active-admin { border-color: #ef4444; background: #fef2f2; }

        /* ── Form ── */
        .right h2 { font-size: 19px; font-weight: 700; color: #0f172a; letter-spacing: -0.3px; margin-bottom: 0.2rem; }
        .right > .sub { font-size: 12px; color: #64748b; margin-bottom: 1.2rem; }

        /* Alerts */
        .alert-error {
            background: #fef2f2; border: 1px solid #fecaca;
            color: #dc2626; font-size: 12.5px;
            padding: 9px 12px; border-radius: 9px; margin-bottom: 1rem;
        }

        .filled-notice {
            font-size: 12px; padding: 7px 12px;
            border-radius: 8px; border: 1px solid;
            margin-bottom: 0.9rem; display: none;
        }

        /* Form inputs */
        .input-group { margin-bottom: 0.9rem; }

        .input-group label {
            display: block; font-size: 12px;
            font-weight: 600; color: #374151; margin-bottom: 5px;
        }

        .input-group input {
            width: 100%; padding: 10px 14px;
            border: 1.5px solid #e2e8f0; border-radius: 10px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13.5px; color: #0f172a; background: #f8fafc;
            outline: none; transition: border 0.15s, background 0.15s;
        }

        .input-group input:focus { border-color: #3b82f6; background: #fff; }

        .options-row {
            display: flex; justify-content: space-between;
            align-items: center; margin-bottom: 1.1rem;
        }

        .remember { display: flex; align-items: center; gap: 6px; font-size: 12px; color: #475569; cursor: pointer; }
        .remember input[type="checkbox"] { width: 13px; height: 13px; cursor: pointer; }

        .forgot { font-size: 12px; color: #3b82f6; text-decoration: none; }
        .forgot:hover { text-decoration: underline; }

        .submit-btn {
            width: 100%; padding: 11px;
            background: #1d4ed8; color: #fff;
            border: none; border-radius: 10px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px; font-weight: 600; cursor: pointer;
            transition: background 0.15s, transform 0.1s; letter-spacing: 0.01em;
        }

        .submit-btn:hover { background: #1e40af; }
        .submit-btn:active { transform: scale(0.99); }
        .submit-btn:disabled { opacity: 0.65; cursor: not-allowed; }

        .copyright { text-align: center; font-size: 11px; color: #94a3b8; margin-top: 1.5rem; }

        /* ── Responsive ── */
        @media (max-width: 700px) {
            .page { flex-direction: column; }
            .left {
                padding: 2rem 1.75rem;
                border-right: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            }
            .welcome-heading { font-size: 22px; }
            .right { padding: 1.75rem 1.75rem 2rem; }
            .demo-btns { gap: 6px; }
        }
    </style>
</head>
<body>

<div class="page">

    {{-- ════════════════════════════
         LEFT PANEL — Branding only
         ════════════════════════════ --}}
    <div class="left">

        <div class="top-brand">
            <div class="logo-sq">
                <img src="{{ asset('assets/Logo universitas.png') }}" alt="Logo Polines">
            </div>
            <div>
                <div class="brand-text-title">SIMAKU</div>
                <div class="brand-text-sub">Politeknik Negeri Semarang</div>
            </div>
        </div>

        <div class="welcome-badge">
            <span class="pulse"></span>
            Live Demo Project
        </div>

        <div class="welcome-heading">
            Selamat datang di<br>
            <em>demo interaktif</em><br>
            SIMAKU
        </div>

        <p class="welcome-desc">
            Sistem Informasi Manajemen Akademik dan Keuangan — platform terpadu
            untuk mahasiswa, staff, dan administrator Politeknik Negeri Semarang.
        </p>

        <div class="feature-list">
            <div class="feature-item">
                <span class="feature-dot"></span>
                <span class="feature-text">Manajemen akademik & keuangan mahasiswa</span>
            </div>
            <div class="feature-item">
                <span class="feature-dot"></span>
                <span class="feature-text">Dashboard staff & laporan administrasi</span>
            </div>
            <div class="feature-item">
                <span class="feature-dot"></span>
                <span class="feature-text">Panel administrator dengan kontrol penuh</span>
            </div>
            <div class="feature-item">
                <span class="feature-dot"></span>
                <span class="feature-text">Versi demo — bebas dijelajahi tanpa risiko</span>
            </div>
        </div>

    </div>

    {{-- ════════════════════════════
         RIGHT PANEL — Demo + Form
         ════════════════════════════ --}}
    <div class="right">

        {{-- Demo Quick-Fill — DIPINDAH KE SINI --}}
        <div class="demo-section">
            <div class="demo-label">Pilih role untuk login demo</div>
            <div class="demo-btns">

                <button type="button" class="demo-btn" id="btn-mhs"
                    onclick="fillDemo('4.33.2.08', '12345678', 'Mahasiswa', 'mhs')">
                    <span class="btn-emoji">🎓</span>
                    <span class="btn-role">Mahasiswa</span>
                    <span class="role-badge badge-mhs">MHS</span>
                </button>

                <button type="button" class="demo-btn" id="btn-staff"
                    onclick="fillDemo('199802102004210201', '12345678', 'Staff', 'staff')">
                    <span class="btn-emoji">👩‍💼</span>
                    <span class="btn-role">Staff</span>
                    <span class="role-badge badge-staff">STAFF</span>
                </button>

                <button type="button" class="demo-btn" id="btn-admin"
                    onclick="fillDemo('admin', '12345678', 'Administrator', 'admin')">
                    <span class="btn-emoji">🛡️</span>
                    <span class="btn-role">Admin</span>
                    <span class="role-badge badge-admin">ADMIN</span>
                </button>

            </div>
        </div>

        <h2>Masuk ke akun</h2>
        <p class="sub">Atau isi username &amp; password secara manual</p>

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <div class="filled-notice" id="filled-notice"></div>

        <form method="POST" action="{{ route('login.process') }}" id="login-form">
            @csrf

            <div class="input-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Masukkan username Anda"
                    value="{{ old('username') }}"
                    autocomplete="username"
                >
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="••••••••"
                    autocomplete="current-password"
                >
            </div>

            <div class="options-row">
                <label class="remember">
                    <input type="checkbox" name="remember" id="remember" checked>
                    Ingat saya
                </label>
                <a href="#" class="forgot">Lupa password?</a>
            </div>

            <button type="submit" class="submit-btn" id="signin-btn">
                Masuk
            </button>

        </form>

        <p class="copyright">Copyright &copy; 2025 Politeknik Negeri Semarang</p>
    </div>

</div>

<script>
    function fillDemo(username, password, roleLabel, role) {
        document.getElementById('username').value = username;
        document.getElementById('password').value = password;

        // Reset active state semua tombol
        ['mhs', 'staff', 'admin'].forEach(function(r) {
            var el = document.getElementById('btn-' + r);
            el.classList.remove('active-mhs', 'active-staff', 'active-admin');
        });

        // Set active state tombol yang dipilih
        document.getElementById('btn-' + role).classList.add('active-' + role);

        var styles = {
            mhs:   { color: '#059669', background: '#ecfdf5', borderColor: '#a7f3d0' },
            staff: { color: '#1d4ed8', background: '#eff6ff', borderColor: '#bfdbfe' },
            admin: { color: '#dc2626', background: '#fef2f2', borderColor: '#fecaca' }
        };

        var notice = document.getElementById('filled-notice');
        var s = styles[role];
        notice.style.color       = s.color;
        notice.style.background  = s.background;
        notice.style.borderColor = s.borderColor;
        notice.textContent = '✓ Role ' + roleLabel + ' dipilih — klik Masuk untuk melanjutkan';
        notice.style.display = 'block';
    }

    document.getElementById('login-form').addEventListener('submit', function () {
        var btn = document.getElementById('signin-btn');
        btn.disabled    = true;
        btn.textContent = 'Sedang masuk...';
    });
</script>

</body>
</html>