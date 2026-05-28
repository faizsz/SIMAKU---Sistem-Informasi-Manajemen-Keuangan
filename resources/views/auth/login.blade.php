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

        /* ── 🔥 DESIGN SYSTEM: Match Dashboard ── */
        :root {
            --primary:       #4338ca;
            --primary-soft:  #e0e7ff;
            --primary-text:  #3730a3;
            --primary-glow:  rgba(67, 56, 202, 0.15);

            --success:       #059669;
            --success-soft:  #d1fae5;

            --surface:       #ffffff;
            --bg:            #f1f5f9;        /* ← SAME AS DASHBOARD */
            --text:          #0f172a;
            --text-muted:    #64748b;
            --border:        #e2e8f0;
            --radius:        12px;
            --radius-lg:     16px;
            --shadow-md:     0 4px 12px rgba(0,0,0,0.08);
            --shadow-lg:     0 8px 24px rgba(0,0,0,0.12);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            background-color: var(--bg);   /* ← SOLID, NO IMAGE */
            color: var(--text);
        }

        /* ── CARD UTAMA: Clean & Consistent ── */
        .page {
            position: relative;
            display: flex;
            width: 100%;
            max-width: 980px;
            min-height: 560px;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            background: var(--surface);
            border: 1px solid var(--border);
        }

        /* ════════════════════════════
           LEFT PANEL — Branding Gradient
           ════════════════════════════ */
        .left {
            flex: 1.1;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-text) 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 3rem 2.75rem;
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        /* Subtle pattern overlay for depth */
        .left::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 20% 30%, rgba(255,255,255,0.12) 0%, transparent 40%),
                radial-gradient(circle at 80% 70%, rgba(255,255,255,0.08) 0%, transparent 45%);
            pointer-events: none;
        }

        .top-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 2.25rem;
            position: relative;
            z-index: 1;
        }

        .logo-sq {
            width: 52px; height: 52px; flex-shrink: 0;
            background: rgba(255, 255, 255, 0.15);
            border: 1.5px solid rgba(255, 255, 255, 0.25);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
        }

        .logo-sq img { width: 36px; height: 36px; object-fit: contain; }

        .brand-text-title {
            font-size: 22px; font-weight: 700; color: #fff;
            letter-spacing: -0.3px; line-height: 1.1;
        }

        .brand-text-sub {
            font-size: 11.5px; color: rgba(255, 255, 255, 0.6);
            margin-top: 3px;
        }

        .welcome-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 9.5px; font-weight: 700;
            letter-spacing: 0.1em; text-transform: uppercase;
            color: #fff;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 20px; padding: 4px 10px;
            margin-bottom: 1rem;
            width: fit-content;
            position: relative;
            z-index: 1;
        }

        .pulse {
            width: 6px; height: 6px; border-radius: 50%;
            background: #fff;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }

        .welcome-heading {
            font-size: 28px; font-weight: 700; color: #fff;
            line-height: 1.25; letter-spacing: -0.5px;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .welcome-heading em {
            font-style: italic;
            color: rgba(255, 255, 255, 0.9);
        }

        .welcome-desc {
            font-size: 13.5px; color: rgba(255, 255, 255, 0.7);
            line-height: 1.75; margin-bottom: 2.25rem;
            max-width: 340px;
            position: relative;
            z-index: 1;
        }

        .feature-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            position: relative;
            z-index: 1;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .feature-dot {
            width: 7px; height: 7px; border-radius: 50%;
            background: #fff;
            flex-shrink: 0;
            opacity: 0.9;
        }

        .feature-text {
            font-size: 12.5px;
            color: rgba(255, 255, 255, 0.75);
            line-height: 1.4;
        }

        /* ════════════════════════════
           RIGHT PANEL — Clean Form
           ════════════════════════════ */
        .right {
            flex: 0.9;
            background: var(--surface);
            padding: 2.25rem 2.5rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* ── Demo Quick-Fill ── */
        .demo-section {
            background: var(--primary-soft);
            border: 1.5px solid #c7d2fe;
            border-radius: var(--radius);
            padding: 14px 16px;
            margin-bottom: 1.4rem;
        }

        .demo-label {
            font-size: 9.5px; font-weight: 700;
            letter-spacing: 0.1em; text-transform: uppercase;
            color: var(--primary-text);
            margin-bottom: 10px;
            display: flex; align-items: center; gap: 6px;
        }

        .demo-label::before {
            content: '';
            display: inline-block;
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--primary);
            animation: pulse 2s infinite;
        }

        .demo-btns {
            display: flex;
            gap: 7px;
        }

        .demo-btn {
            flex: 1;
            padding: 9px 8px;
            border-radius: var(--radius);
            border: 1.5px solid var(--border);
            background: #fff;
            color: var(--text);
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
        .demo-btn .btn-role { font-size: 11px; font-weight: 700; color: var(--text); }

        .role-badge {
            font-size: 8.5px; padding: 1.5px 6px;
            border-radius: 4px; font-weight: 700; letter-spacing: 0.04em;
        }

        /* Role Colors - Admin uses Primary Purple */
        .badge-mhs   { background: var(--success-soft); color: var(--success); }
        .badge-staff { background: var(--primary-soft); color: var(--primary-text); }
        .badge-admin { background: #f5f3ff; color: var(--primary); border: 1px solid #ddd6fe; }

        .demo-btn:hover {
            border-color: var(--primary);
            background: var(--primary-soft);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px var(--primary-glow);
        }

        .demo-btn.active-mhs   { border-color: var(--success); background: var(--success-soft); }
        .demo-btn.active-staff { border-color: var(--primary); background: var(--primary-soft); }
        .demo-btn.active-admin { border-color: var(--primary); background: #f5f3ff; box-shadow: 0 0 0 3px rgba(67, 56, 202, 0.1); }

        /* ── Form ── */
        .right h2 {
            font-size: 19px; font-weight: 700; color: var(--text);
            letter-spacing: -0.3px; margin-bottom: 0.2rem;
        }

        .right > .sub {
            font-size: 12px; color: var(--text-muted);
            margin-bottom: 1.2rem;
        }

        .alert-error {
            background: #fef2f2; border: 1px solid #fecaca;
            color: #dc2626; font-size: 12.5px;
            padding: 9px 12px; border-radius: var(--radius); margin-bottom: 1rem;
        }

        .filled-notice {
            font-size: 12px; padding: 7px 12px;
            border-radius: var(--radius); border: 1px solid;
            margin-bottom: 0.9rem; display: none;
            font-weight: 500;
        }

        .input-group { margin-bottom: 0.9rem; }

        .input-group label {
            display: block; font-size: 12px;
            font-weight: 600; color: var(--text); margin-bottom: 5px;
        }

        .input-group input {
            width: 100%; padding: 10px 14px;
            border: 1.5px solid var(--border); border-radius: var(--radius);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13.5px; color: var(--text); background: #f8fafc;
            outline: none; transition: border 0.15s, background 0.15s, box-shadow 0.15s;
        }

        .input-group input:focus {
            border-color: var(--primary);
            background: #fff;
            box-shadow: 0 0 0 4px var(--primary-glow);
        }

        .options-row {
            display: flex; justify-content: space-between;
            align-items: center; margin-bottom: 1.1rem;
        }

        .remember { display: flex; align-items: center; gap: 6px; font-size: 12px; color: var(--text-muted); cursor: pointer; }
        .remember input[type="checkbox"] {
            width: 14px; height: 14px; cursor: pointer;
            accent-color: var(--primary);
        }

        .forgot { font-size: 12px; color: var(--primary); text-decoration: none; font-weight: 500; }
        .forgot:hover { text-decoration: underline; color: var(--primary-text); }

        .submit-btn {
            width: 100%; padding: 11px;
            background: var(--primary); color: #fff;
            border: none; border-radius: var(--radius);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px; font-weight: 600; cursor: pointer;
            transition: background 0.15s, transform 0.1s, box-shadow 0.15s;
            letter-spacing: 0.01em;
            box-shadow: 0 2px 8px var(--primary-glow);
        }

        .submit-btn:hover {
            background: var(--primary-text);
            transform: translateY(-1px);
            box-shadow: 0 4px 14px var(--primary-glow);
        }

        .submit-btn:active { transform: scale(0.99); }
        .submit-btn:disabled { opacity: 0.65; cursor: not-allowed; }

        .copyright { text-align: center; font-size: 11px; color: var(--text-muted); margin-top: 1.5rem; }

        /* ── Responsive ── */
        @media (max-width: 700px) {
            .page { flex-direction: column; }
            .left {
                padding: 2rem 1.75rem;
                border-right: none;
                border-bottom: 1px solid var(--border);
            }
            .welcome-heading { font-size: 22px; }
            .right { padding: 1.75rem 1.75rem 2rem; }
            .demo-btns { gap: 6px; }
        }

        /* ── Accessibility ── */
        .demo-btn:focus-visible,
        .input-group input:focus-visible,
        .submit-btn:focus-visible {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }
    </style>
</head>
<body>

<div class="page">

    {{-- ════════════════════════════
         LEFT PANEL — Branding
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
         RIGHT PANEL — Clean Form
         ════════════════════════════ --}}
    <div class="right">

        {{-- Demo Quick-Fill --}}
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
                    required
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
                    required
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

        <p class="copyright">Copyright &copy; {{ date('Y') }} Politeknik Negeri Semarang</p>
    </div>

</div>

<script>
    function fillDemo(username, password, roleLabel, role) {
        document.getElementById('username').value = username;
        document.getElementById('password').value = password;

        // Reset active state
        ['mhs', 'staff', 'admin'].forEach(function(r) {
            var el = document.getElementById('btn-' + r);
            el.classList.remove('active-mhs', 'active-staff', 'active-admin');
        });

        // Set active state
        document.getElementById('btn-' + role).classList.add('active-' + role);

        var styles = {
            mhs:   { color: 'var(--success)', background: 'var(--success-soft)', borderColor: '#a7f3d0' },
            staff: { color: 'var(--primary-text)', background: 'var(--primary-soft)', borderColor: '#c7d2fe' },
            admin: { color: 'var(--primary)', background: '#f5f3ff', borderColor: '#ddd6fe', boxShadow: '0 0 0 3px rgba(67, 56, 202, 0.1)' }
        };

        var notice = document.getElementById('filled-notice');
        var s = styles[role];
        notice.style.color = s.color;
        notice.style.background = s.background;
        notice.style.borderColor = s.borderColor;
        if (s.boxShadow) notice.style.boxShadow = s.boxShadow;
        notice.textContent = '✓ Role ' + roleLabel + ' dipilih — klik Masuk untuk melanjutkan';
        notice.style.display = 'block';

        document.getElementById('signin-btn').focus();
    }

    document.getElementById('login-form').addEventListener('submit', function () {
        var btn = document.getElementById('signin-btn');
        btn.disabled = true;
        btn.textContent = 'Sedang masuk...';
    });

    // Enter key submit
    document.querySelectorAll('.input-group input').forEach(input => {
        input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                document.getElementById('login-form').requestSubmit();
            }
        });
    });
</script>

</body>
</html>