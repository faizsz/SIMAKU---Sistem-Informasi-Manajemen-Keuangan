<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — SIMAKU</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
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

        /* ── BACKGROUND: foto kampus + blur + dark overlay ──
         *
         * Untuk pakai foto kampus sendiri, simpan foto di public/assets/kampus.jpg
         * lalu ganti background-image di bawah:
         *   background-image: url('{{ asset("assets/kampus.jpg") }}');
         *
         * Atau pakai foto Unsplash (free) sementara untuk demo:
         */
        body::before {
            content: '';
            position: fixed; inset: 0; z-index: 0;
            background-image: url('https://images.unsplash.com/photo-1607237138185-eedd9c632b0b?w=1400&q=80');
            background-size: cover;
            background-position: center;
            filter: blur(7px) brightness(0.42) saturate(0.75);
            transform: scale(1.07);
        }

        /* ── WRAPPER ── */
        .page {
            position: relative; z-index: 1;
            display: flex;
            width: 100%;
            max-width: 880px;
            min-height: 540px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 28px 72px rgba(0, 0, 0, 0.55);
            border: 1px solid rgba(255, 255, 255, 0.12);
        }

        /* ── LEFT PANEL ── */
        .left {
            flex: 1;
            background: rgba(10, 25, 60, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2.5rem 1.75rem;
            border-right: 1px solid rgba(255, 255, 255, 0.08);
        }

        .brand-logo {
            width: 70px; height: 70px;
            background: rgba(255, 255, 255, 0.1);
            border: 1.5px solid rgba(255, 255, 255, 0.2);
            border-radius: 17px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1.1rem;
        }

        .brand-logo img { width: 46px; height: 46px; object-fit: contain; }

        .brand-title { font-size: 24px; font-weight: 700; color: #fff; letter-spacing: -0.4px; margin-bottom: 0.3rem; }

        .brand-sub {
            font-size: 12px; color: rgba(255, 255, 255, 0.4);
            text-align: center; line-height: 1.55; max-width: 185px;
        }

        .divider { width: 36px; height: 1.5px; background: rgba(255,255,255,0.18); border-radius: 2px; margin: 1.4rem auto; }

        .demo-label {
            font-size: 10px; font-weight: 600;
            letter-spacing: 0.09em; text-transform: uppercase;
            color: rgba(255,255,255,0.3);
            margin-bottom: 0.65rem; text-align: center;
        }

        .demo-btns { display: flex; flex-direction: column; gap: 7px; width: 100%; }

        .demo-btn {
            padding: 9px 13px; border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.07);
            color: rgba(255,255,255,0.8);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 12.5px; font-weight: 500; cursor: pointer;
            transition: all 0.2s;
            display: flex; align-items: center; gap: 9px; text-align: left;
        }

        .demo-btn:hover {
            background: rgba(255,255,255,0.14);
            border-color: rgba(255,255,255,0.22);
            color: #fff; transform: translateX(3px);
        }

        .role-badge {
            font-size: 9.5px; padding: 2px 6px;
            border-radius: 5px; font-weight: 700; letter-spacing: 0.04em;
        }

        .badge-mhs   { background: rgba(16,185,129,0.22); color: #34d399; }
        .badge-staff { background: rgba(59,130,246,0.22); color: #60a5fa; }
        .badge-admin { background: rgba(239,68,68,0.22);  color: #f87171; }

        .demo-uname { font-size: 10.5px; color: rgba(255,255,255,0.32); margin-top: 1px; }

        /* ── RIGHT PANEL ── */
        .right {
            flex: 1;
            background: rgba(255, 255, 255, 0.93);
            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);
            padding: 2.75rem 2.25rem;
            display: flex; flex-direction: column; justify-content: center;
        }

        .right h1 { font-size: 21px; font-weight: 700; color: #0f172a; letter-spacing: -0.4px; margin-bottom: 0.25rem; }
        .right > .sub { font-size: 13px; color: #64748b; margin-bottom: 1.6rem; }

        .alert-error {
            background: #fef2f2; border: 1px solid #fecaca;
            color: #dc2626; font-size: 12.5px;
            padding: 9px 12px; border-radius: 9px; margin-bottom: 1rem;
        }

        .filled-notice {
            font-size: 12px; color: #059669;
            background: #ecfdf5; border: 1px solid #a7f3d0;
            border-radius: 8px; padding: 7px 11px;
            margin-bottom: 1rem; display: none;
        }

        .input-group { margin-bottom: 1rem; }

        .input-group label { display: block; font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 5px; }

        .input-group input {
            width: 100%; padding: 9px 13px;
            border: 1.5px solid #e2e8f0; border-radius: 9px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13.5px; color: #0f172a; background: #f8fafc;
            outline: none; transition: border 0.18s, background 0.18s;
        }

        .input-group input:focus { border-color: #3b82f6; background: #fff; }

        .options-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem; }

        .remember { display: flex; align-items: center; gap: 6px; font-size: 12.5px; color: #475569; cursor: pointer; }
        .remember input[type="checkbox"] { width: 13px; height: 13px; cursor: pointer; }

        .forgot { font-size: 12.5px; color: #3b82f6; text-decoration: none; }
        .forgot:hover { text-decoration: underline; }

        .submit-btn {
            width: 100%; padding: 10.5px;
            background: #1d4ed8; color: #fff;
            border: none; border-radius: 9px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13.5px; font-weight: 600; cursor: pointer;
            transition: background 0.18s, transform 0.1s; letter-spacing: 0.01em;
        }

        .submit-btn:hover { background: #1e40af; }
        .submit-btn:active { transform: scale(0.99); }
        .submit-btn:disabled { opacity: 0.65; cursor: not-allowed; }

        .copyright { text-align: center; font-size: 11px; color: #94a3b8; margin-top: 1.75rem; }

        @media (max-width: 620px) {
            .page { flex-direction: column; }
            .left { padding: 2rem 1.5rem; border-right: none; border-bottom: 1px solid rgba(255,255,255,0.08); }
            .right { padding: 2rem 1.5rem; }
        }
    </style>
</head>
<body>

<div class="page">

    {{-- ── LEFT: Branding + Demo Quick-Fill ── --}}
    <div class="left">
        <div class="brand-logo">
            <img src="{{ asset('assets/Logo universitas.png') }}" alt="Logo Polines">
        </div>
        <div class="brand-title">SIMAKU</div>
        <div class="brand-sub">Sistem Informasi Akademik Politeknik Negeri Semarang</div>

        <div class="divider"></div>

        <p class="demo-label">✦ Demo — klik untuk isi otomatis</p>
        <div class="demo-btns">

            <button type="button" class="demo-btn"
                onclick="fillDemo('4.33.2.08', '12345678', 'Mahasiswa', 'mhs')">
                <span style="font-size:17px">🎓</span>
                <div>
                    <div style="display:flex;align-items:center;gap:5px">
                        <span>Mahasiswa</span>
                        <span class="role-badge badge-mhs">MHS</span>
                    </div>
                    <div class="demo-uname">4.33.2.08 · ••••••••</div>
                </div>
            </button>

            <button type="button" class="demo-btn"
                onclick="fillDemo('199802102004210201', '12345678', 'Staff', 'staff')">
                <span style="font-size:17px">👩‍💼</span>
                <div>
                    <div style="display:flex;align-items:center;gap:5px">
                        <span>Staff</span>
                        <span class="role-badge badge-staff">STAFF</span>
                    </div>
                    <div class="demo-uname">199802102004210201 · ••••••••</div>
                </div>
            </button>

            <button type="button" class="demo-btn"
                onclick="fillDemo('admin', '12345678', 'Administrator', 'admin')">
                <span style="font-size:17px">🛡️</span>
                <div>
                    <div style="display:flex;align-items:center;gap:5px">
                        <span>Administrator</span>
                        <span class="role-badge badge-admin">ADMIN</span>
                    </div>
                    <div class="demo-uname">admin · ••••••••</div>
                </div>
            </button>

        </div>
    </div>

    {{-- ── RIGHT: Login Form ── --}}
    <div class="right">
        <h1>Selamat datang 👋</h1>
        <p class="sub">Masukkan username dan password Anda untuk melanjutkan</p>

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

            <button type="submit" class="submit-btn" id="signin-btn">Masuk</button>
        </form>

        <p class="copyright">Copyright &copy; 2025 Politeknik Negeri Semarang</p>
    </div>

</div>

<script>
    function fillDemo(username, password, roleLabel) {
        document.getElementById('username').value = username;
        document.getElementById('password').value = password;
        var notice = document.getElementById('filled-notice');
        notice.textContent = '✓ Kredensial ' + roleLabel + ' terisi — klik Masuk untuk login';
        notice.style.display = 'block';
    }

    document.getElementById('login-form').addEventListener('submit', function () {
        var btn = document.getElementById('signin-btn');
        btn.disabled = true;
        btn.textContent = 'Sedang masuk...';
    });
</script>

</body>
</html>