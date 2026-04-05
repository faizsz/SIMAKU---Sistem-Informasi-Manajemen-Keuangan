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

        /* ── BACKGROUND FOTO KAMPUS ──
         * Untuk ganti ke foto kampus sendiri:
         * Simpan foto di public/assets/kampus.jpg
         * lalu ubah background-image jadi:
         *   background-image: url('{{ asset("assets/kampus.jpg") }}');
         */
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
           LEFT PANEL — Branding + Demo
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
            margin-bottom: 2rem;
        }

        .logo-sq {
            width: 48px; height: 48px; flex-shrink: 0;
            background: rgba(255, 255, 255, 0.1);
            border: 1.5px solid rgba(255, 255, 255, 0.18);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
        }

        .logo-sq img { width: 34px; height: 34px; object-fit: contain; }

        .brand-text-title { font-size: 20px; font-weight: 700; color: #fff; letter-spacing: -0.3px; line-height: 1.1; }
        .brand-text-sub   { font-size: 11px; color: rgba(255, 255, 255, 0.38); margin-top: 2px; }

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
            margin-bottom: 0.9rem;
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
            font-size: 27px; font-weight: 700; color: #fff;
            line-height: 1.25; letter-spacing: -0.5px;
            margin-bottom: 0.75rem;
        }

        .welcome-heading em { font-style: italic; color: rgba(147, 197, 253, 0.9); }

        .welcome-desc {
            font-size: 13px; color: rgba(255, 255, 255, 0.48);
            line-height: 1.7; margin-bottom: 2rem;
            max-width: 340px;
        }

        /* Divider */
        .div-line { width: 100%; height: 1px; background: rgba(255,255,255,0.07); margin-bottom: 1.5rem; }

        /* Demo buttons */
        .demo-label {
            font-size: 9.5px; font-weight: 700;
            letter-spacing: 0.1em; text-transform: uppercase;
            color: rgba(255, 255, 255, 0.28);
            margin-bottom: 0.75rem;
        }

        .demo-btns { display: flex; flex-direction: column; gap: 8px; }

        .demo-btn {
            padding: 11px 14px; border-radius: 11px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.06);
            color: rgba(255, 255, 255, 0.8);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px; font-weight: 500; cursor: pointer;
            transition: all 0.18s;
            display: flex; align-items: center; gap: 10px; text-align: left;
        }

        .demo-btn:hover {
            background: rgba(255, 255, 255, 0.13);
            border-color: rgba(255, 255, 255, 0.22);
            color: #fff;
            transform: translateX(4px);
        }

        .demo-btn .btn-icon { font-size: 16px; width: 20px; text-align: center; flex-shrink: 0; }

        .role-badge {
            font-size: 9.5px; padding: 2px 7px;
            border-radius: 5px; font-weight: 700; letter-spacing: 0.04em;
        }

        .badge-mhs   { background: rgba(16, 185, 129, 0.2); color: #34d399; }
        .badge-staff { background: rgba(59, 130, 246, 0.2); color: #60a5fa; }
        .badge-admin { background: rgba(239, 68, 68, 0.2);  color: #f87171; }

        .demo-uname { font-size: 10.5px; color: rgba(255, 255, 255, 0.3); margin-top: 1px; }

        /* ════════════════════════════
           RIGHT PANEL — Login Form
           ════════════════════════════ */
        .right {
            flex: 0.9;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            padding: 3rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right h2 { font-size: 20px; font-weight: 700; color: #0f172a; letter-spacing: -0.3px; margin-bottom: 0.25rem; }
        .right > .sub { font-size: 12.5px; color: #64748b; margin-bottom: 1.75rem; }

        /* Alerts */
        .alert-error {
            background: #fef2f2; border: 1px solid #fecaca;
            color: #dc2626; font-size: 12.5px;
            padding: 9px 12px; border-radius: 9px; margin-bottom: 1rem;
        }

        .filled-notice {
            font-size: 12px; padding: 8px 12px;
            border-radius: 8px; border: 1px solid;
            margin-bottom: 1rem; display: none;
        }

        /* Form inputs */
        .input-group { margin-bottom: 1rem; }

        .input-group label {
            display: block; font-size: 12px;
            font-weight: 600; color: #374151; margin-bottom: 5px;
        }

        .input-group input {
            width: 100%; padding: 10px 14px;
            border: 1.5px solid #e2e8f0; border-radius: 10px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px; color: #0f172a; background: #f8fafc;
            outline: none; transition: border 0.15s, background 0.15s;
        }

        .input-group input:focus { border-color: #3b82f6; background: #fff; }

        .options-row {
            display: flex; justify-content: space-between;
            align-items: center; margin-bottom: 1.3rem;
        }

        .remember { display: flex; align-items: center; gap: 6px; font-size: 12.5px; color: #475569; cursor: pointer; }
        .remember input[type="checkbox"] { width: 13px; height: 13px; cursor: pointer; }

        .forgot { font-size: 12.5px; color: #3b82f6; text-decoration: none; }
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

        .copyright { text-align: center; font-size: 11px; color: #94a3b8; margin-top: 1.75rem; }

        /* ── Responsive: tablet & mobile ── */
        @media (max-width: 700px) {
            .page { flex-direction: column; }
            .left {
                padding: 2rem 1.75rem;
                border-right: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            }
            .welcome-heading { font-size: 22px; }
            .right { padding: 2rem 1.75rem; }
        }
    </style>
</head>
<body>

<div class="page">

    {{-- ════════════════════════════
         LEFT PANEL
         ════════════════════════════ --}}
    <div class="left">

        {{-- Brand --}}
        <div class="top-brand">
            <div class="logo-sq">
                <img src="{{ asset('assets/Logo universitas.png') }}" alt="Logo Polines">
            </div>
            <div>
                <div class="brand-text-title">SIMAKU</div>
                <div class="brand-text-sub">Politeknik Negeri Semarang</div>
            </div>
        </div>

        {{-- Welcome --}}
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
            Sistem ini adalah versi demo untuk keperluan presentasi tugas akhir.
            Anda bebas menjelajahi seluruh fitur menggunakan akun yang tersedia —
            pilih role di bawah dan login akan terisi otomatis.
        </p>

        <div class="div-line"></div>

        {{-- Demo Quick-Fill --}}
        <p class="demo-label">Pilih role untuk login demo</p>
        <div class="demo-btns">

            <button type="button" class="demo-btn"
                onclick="fillDemo('4.33.2.08', '12345678', 'Mahasiswa', 'mhs')">
                <span class="btn-icon">🎓</span>
                <div>
                    <div style="display:flex;align-items:center;gap:6px">
                        <span>Mahasiswa</span>
                        <span class="role-badge badge-mhs">MHS</span>
                    </div>
                    <div class="demo-uname">4.33.2.08 · ••••••••</div>
                </div>
            </button>

            <button type="button" class="demo-btn"
                onclick="fillDemo('199802102004210201', '12345678', 'Staff', 'staff')">
                <span class="btn-icon">👩‍💼</span>
                <div>
                    <div style="display:flex;align-items:center;gap:6px">
                        <span>Staff</span>
                        <span class="role-badge badge-staff">STAFF</span>
                    </div>
                    <div class="demo-uname">199802102004210201 · ••••••••</div>
                </div>
            </button>

            <button type="button" class="demo-btn"
                onclick="fillDemo('admin', '12345678', 'Administrator', 'admin')">
                <span class="btn-icon">🛡️</span>
                <div>
                    <div style="display:flex;align-items:center;gap:6px">
                        <span>Administrator</span>
                        <span class="role-badge badge-admin">ADMIN</span>
                    </div>
                    <div class="demo-uname">admin · ••••••••</div>
                </div>
            </button>

        </div>
    </div>

    {{-- ════════════════════════════
         RIGHT PANEL — Login Form
         ════════════════════════════ --}}
    <div class="right">

        <h2>Masuk ke akun</h2>
        <p class="sub">Atau isi username &amp; password secara manual</p>

        {{-- Error dari Laravel --}}
        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        {{-- Notifikasi setelah klik tombol demo --}}
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
    /**
     * Isi form otomatis dengan kredensial demo.
     * Dipanggil saat user klik salah satu tombol role.
     */
    function fillDemo(username, password, roleLabel, role) {
        document.getElementById('username').value = username;
        document.getElementById('password').value = password;

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

    /* Anti double-submit */
    document.getElementById('login-form').addEventListener('submit', function () {
        var btn = document.getElementById('signin-btn');
        btn.disabled    = true;
        btn.textContent = 'Sedang masuk...';
    });
</script>

</body>
</html>