<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIMAKU')</title>

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* ========================================= */
        /* VARIABLES & BASE                          */
        /* ========================================= */
        :root {
            --bg:           #f1f5f9;
            --surface:      #ffffff;
            --border:       #e2e8f0;
            --border-soft:  #f0f4f8;
            --primary:      #4338ca;
            --primary-soft: #e0e7ff;
            --primary-text: #3730a3;
            --text:         #0f172a;
            --text-muted:   #64748b;
            --text-hint:    #94a3b8;
            --danger:       #e11d48;
            --success:      #059669;
            --sidebar-w:    240px;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            background-color: var(--bg) !important;
            color: var(--text);
        }

        .wrapper { background-color: var(--bg) !important; }
        .content-wrapper { background-color: transparent !important; margin-left: var(--sidebar-w) !important; }

        /* ========================================= */
        /* SIDEBAR                                   */
        /* ========================================= */
        .main-sidebar {
            width: var(--sidebar-w) !important;
            background-color: var(--surface) !important;
            border-right: 1px solid var(--border) !important;
            box-shadow: none !important;
        }

        /* 🔥 Brand - Updated with gradient & accent */
        .brand-link {
            height: 64px;
            padding: 0 18px !important;
            display: flex !important;
            align-items: center;
            gap: 10px;
            border-bottom: 2px solid var(--primary-soft) !important;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%) !important;
            text-decoration: none !important;
            position: relative;
            overflow: hidden;
            transition: background 0.2s ease;
        }

        /* Accent bar di kiri brand */
        .brand-link::before {
            content: '';
            position: absolute;
            left: 0; top: 0; bottom: 0;
            width: 3px;
            background: linear-gradient(to bottom, var(--primary), var(--primary-soft));
            opacity: 0.8;
        }

        .brand-logo-wrap {
            width: 34px; height: 34px; flex-shrink: 0;
            background: var(--primary-soft);
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 2px 6px rgba(67, 56, 202, 0.15);
            transition: transform 0.2s ease;
            z-index: 1;
        }

        .brand-link:hover .brand-logo-wrap {
            transform: scale(1.05);
        }

        .brand-logo-wrap img { width: 22px; height: 22px; object-fit: contain; }

        .brand-name {
            font-size: 16px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-text), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.02em;
            line-height: 1;
            z-index: 1;
        }

        .brand-sub {
            font-size: 11px;
            font-weight: 500;
            color: var(--text-hint);
            margin-top: 2px;
            z-index: 1;
        }

        /* Mini user profile in sidebar */
        .sidebar-user {
            margin: 14px 12px;
            padding: 12px;
            background: var(--bg);
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-user-avatar {
            width: 36px; height: 36px; flex-shrink: 0;
            border-radius: 50%;
            background: var(--primary-soft);
            display: flex; align-items: center; justify-content: center;
            font-size: 12px; font-weight: 700;
            color: var(--primary-text);
            overflow: hidden;
        }

        .sidebar-user-avatar img { width: 100%; height: 100%; object-fit: cover; }

        .sidebar-user-name {
            font-size: 13.5px;
            font-weight: 700;
            color: var(--text);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 140px;
        }

        .sidebar-user-role {
            font-size: 11px;
            font-weight: 500;
            color: var(--text-muted);
            margin-top: 1px;
            text-transform: capitalize;
        }

        /* Section labels */
        .nav-section-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.09em;
            text-transform: uppercase;
            color: var(--text-hint);
            padding: 14px 18px 6px;
        }

        /* Nav items */
        .sidebar { padding-top: 0 !important; overflow-y: auto; }

        .nav-sidebar .nav-item { margin: 0 10px 2px; }

        .nav-sidebar .nav-link {
            border-radius: 10px !important;
            padding: 10px 12px !important;
            margin: 0 !important;
            color: var(--text-muted) !important;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background 0.15s, color 0.15s, transform 0.15s;
            position: relative;
        }

        .nav-sidebar .nav-link i.nav-icon {
            width: 20px;
            text-align: center;
            font-size: 14px;
            margin-right: 0 !important;
            flex-shrink: 0;
            color: var(--text-hint);
            transition: color 0.15s;
        }

        .nav-sidebar .nav-link p {
            margin: 0 !important;
            font-size: 14px;
            font-weight: 600;
            line-height: 1;
        }

        .nav-sidebar .nav-link:hover {
            background: var(--bg) !important;
            color: var(--text) !important;
            transform: translateX(2px);
        }

        .nav-sidebar .nav-link:hover i.nav-icon { color: var(--primary); }

        /* Active state */
        .nav-sidebar .nav-link.active,
        .sidebar-light-primary .nav-sidebar > .nav-item > .nav-link.active {
            background: var(--primary-soft) !important;
            color: var(--primary) !important;
            font-weight: 600;
            box-shadow: none !important;
        }

        .nav-sidebar .nav-link.active i.nav-icon { color: var(--primary) !important; }

        /* Logout item */
        .nav-link-logout { color: var(--danger) !important; }
        .nav-link-logout i.nav-icon { color: var(--danger) !important; }
        .nav-link-logout:hover { background: #fff1f2 !important; color: var(--danger) !important; }

        /* Sidebar divider */
        .nav-divider {
            height: 1px;
            background: var(--border);
            margin: 10px 18px;
        }

        /* ========================================= */
        /* NAVBAR                                    */
        /* ========================================= */
        .main-header.navbar {
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border) !important;
            box-shadow: none !important;
            height: 64px;
            padding: 0 20px !important;
            left: var(--sidebar-w) !important;
            position: sticky;
            top: 0;
            z-index: 1039;
            display: flex;
            align-items: center;
        }

        .navbar-page-title {
            font-size: 18px !important;
            font-weight: 700 !important;
            color: var(--text) !important;
            letter-spacing: -0.02em !important;
            margin: 0 !important;
        }

        /* Notification bell */
        .notif-btn {
            width: 36px; height: 36px;
            border-radius: 9px;
            background: var(--bg);
            border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            position: relative;
            cursor: pointer;
            transition: background 0.15s;
            text-decoration: none;
        }

        .notif-btn:hover { background: var(--border-soft); }
        .notif-btn i { font-size: 14px; color: var(--text-muted); }

        .notif-dot {
            position: absolute; top: 7px; right: 7px;
            width: 7px; height: 7px; border-radius: 50%;
            background: var(--danger);
            border: 1.5px solid var(--surface);
        }

        /* User chip in navbar */
        .navbar-user-chip {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 5px 12px 5px 6px;
            border-radius: 50px;
            border: 1px solid var(--border);
            background: var(--surface);
            cursor: pointer;
            transition: background 0.15s, border-color 0.15s;
            text-decoration: none !important;
        }

        .navbar-user-chip:hover {
            background: var(--bg);
            border-color: #cbd5e1;
        }

        .navbar-chip-avatar {
            width: 28px; height: 28px; flex-shrink: 0;
            border-radius: 50%;
            overflow: hidden;
            background: var(--primary-soft);
            display: flex; align-items: center; justify-content: center;
            font-size: 10px; font-weight: 700; color: var(--primary-text);
        }

        .navbar-chip-avatar img { width: 100%; height: 100%; object-fit: cover; }

        .navbar-chip-name {
            font-size: 14px;
            font-weight: 700;
            color: var(--text);
            white-space: nowrap;
        }

        .navbar-chip-chevron { font-size: 10px; color: var(--text-hint); margin-left: 2px; }

        /* Dropdown menu */
        .navbar-user-chip + .dropdown-menu {
            border-radius: 12px !important;
            border: 1px solid var(--border) !important;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08) !important;
            padding: 6px !important;
            min-width: 180px;
        }

        .navbar-user-chip + .dropdown-menu .dropdown-item {
            border-radius: 8px !important;
            font-size: 14px;
            padding: 9px 12px;
            color: var(--text);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .navbar-user-chip + .dropdown-menu .dropdown-item i {
            font-size: 13px;
            color: var(--text-muted);
            width: 16px;
            text-align: center;
        }

        .navbar-user-chip + .dropdown-menu .dropdown-item:hover {
            background: var(--bg) !important;
        }

        .dropdown-item-logout { color: var(--danger) !important; }
        .dropdown-item-logout i { color: var(--danger) !important; }

        .dropdown-divider-custom {
            height: 1px;
            background: var(--border);
            margin: 5px 0;
        }

        /* ========================================= */
        /* CONTENT AREA                              */
        /* ========================================= */
        .content { padding: 28px 28px; }

        /* ========================================= */
        /* FOOTER                                    */
        /* ========================================= */
        .main-footer {
            background: transparent !important;
            border-top: 1px solid var(--border) !important;
            color: var(--text-hint) !important;
            font-size: 12px !important;
            padding: 14px 28px !important;
            margin-left: var(--sidebar-w);
        }

        /* ========================================= */
        /* MODALS                                    */
        /* ========================================= */
        .modal-content {
            border-radius: 18px !important;
            border: none !important;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
        }

        .modal-body { padding: 32px !important; }

        /* ========================================= */
        /* BUTTONS                                   */
        /* ========================================= */
        .btn {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            font-weight: 600 !important;
            border-radius: 10px !important;
            font-size: 13.5px !important;
            transition: all 0.15s !important;
        }

        .btn-primary {
            background: var(--primary) !important;
            border-color: var(--primary) !important;
        }

        .btn-primary:hover { background: #3730a3 !important; transform: translateY(-1px); }

        .btn-outline-secondary {
            border: 1.5px solid var(--border) !important;
            color: var(--text) !important;
            background: transparent !important;
        }

        .btn-danger-soft {
            background: #fff1f2 !important;
            color: var(--danger) !important;
            border: 1.5px solid #fecdd3 !important;
        }

        .btn-danger-soft:hover { background: #ffe4e6 !important; }

        /* 🔥 NEW: Button Primary Soft (for secondary confirmations) */
        .btn-primary-soft {
            background: var(--primary-soft) !important;
            color: var(--primary-text) !important;
            border: 1.5px solid #c7d2fe !important;
            font-weight: 600 !important;
        }

        .btn-primary-soft:hover {
            background: #c7d2fe !important;
            border-color: var(--primary) !important;
            color: var(--primary) !important;
            transform: translateY(-1px);
        }

        .btn-primary-soft:active {
            transform: translateY(0) scale(0.98);
        }

        /* ========================================= */
        /* RESPONSIVE                                */
        /* ========================================= */
        @media (max-width: 991px) {
            .content-wrapper { margin-left: 0 !important; }
            .main-footer { margin-left: 0 !important; }
            .main-header.navbar { left: 0 !important; }
        }
    </style>

    @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <script>
        (function() {
            try {
                const userReport = {
                    timestamp: new Date().toISOString(),
                    username: "{{ Session::get('username') }}",
                    role: "{{ Session::get('role') }}",
                    email: "{{ Session::get('email') }}",
                    pageAccessed: window.location.pathname,
                    sessionActive: {{ Session::has('token') ? 'true' : 'false' }}
                };
                window.userSessionReport = userReport;
                console.log('%c SIMAKU Session ', 'background:#4338ca;color:#fff;padding:3px 8px;border-radius:4px;font-weight:bold;');
                console.log(JSON.stringify(userReport, null, 2));
            } catch(e) {}
        })();
    </script>

    <div class="wrapper">

        <!-- ══════════════════════════════
             NAVBAR
        ══════════════════════════════ -->
        <nav class="main-header navbar navbar-expand navbar-light">

            <!-- Left: hamburger + page title -->
            <ul class="navbar-nav align-items-center">
                <li class="nav-item mr-3">
                    <a class="nav-link p-0" data-widget="pushmenu" href="#" role="button" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;border-radius:9px;background:var(--bg);border:1px solid var(--border);">
                        <i class="fas fa-bars" style="font-size:13px;color:var(--text-muted);"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <h1 class="navbar-page-title">@yield('header', 'Dashboard')</h1>
                </li>
            </ul>

            <!-- Right: actions + notif + user -->
            <ul class="navbar-nav ml-auto align-items-center" style="gap:10px;">

                <!-- Page-specific button slot -->
                @hasSection('header_button')
                <li class="nav-item d-none d-sm-inline-block">
                    @yield('header_button')
                </li>
                @endif

                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a class="notif-btn" data-toggle="dropdown" href="#" role="button">
                        <i class="far fa-bell"></i>
                        <span class="notif-dot"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="border-radius:14px;border:1px solid var(--border);box-shadow:0 8px 24px rgba(0,0,0,0.08);padding:6px;min-width:260px;">
                        <div style="padding:8px 12px 10px;border-bottom:1px solid var(--border);margin-bottom:4px;">
                            <span style="font-size:13px;font-weight:700;color:var(--text);">Notifikasi</span>
                            <span style="font-size:11px;color:var(--text-hint);margin-left:6px;">2 baru</span>
                        </div>
                        <a href="#" class="dropdown-item" style="border-radius:8px;font-size:13px;padding:9px 12px;display:flex;gap:10px;align-items:flex-start;">
                            <span style="width:28px;height:28px;border-radius:8px;background:#eff6ff;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="fas fa-file-invoice" style="font-size:12px;color:#3b82f6;"></i>
                            </span>
                            <div>
                                <div style="font-weight:600;color:var(--text);font-size:12.5px;">Tagihan UKT baru</div>
                                <div style="font-size:11px;color:var(--text-hint);margin-top:1px;">3 jam yang lalu</div>
                            </div>
                        </a>
                        <a href="#" class="dropdown-item" style="border-radius:8px;font-size:13px;padding:9px 12px;display:flex;gap:10px;align-items:flex-start;">
                            <span style="width:28px;height:28px;border-radius:8px;background:#f0fdf4;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="fas fa-check" style="font-size:12px;color:#16a34a;"></i>
                            </span>
                            <div>
                                <div style="font-weight:600;color:var(--text);font-size:12.5px;">Pembayaran diterima</div>
                                <div style="font-size:11px;color:var(--text-hint);margin-top:1px;">1 minggu yang lalu</div>
                            </div>
                        </a>
                        <div style="padding:8px 12px 4px;border-top:1px solid var(--border);margin-top:4px;">
                            <a href="#" style="font-size:12px;color:var(--primary);font-weight:600;text-decoration:none;">Lihat semua notifikasi →</a>
                        </div>
                    </div>
                </li>

                <!-- User dropdown -->
                <li class="nav-item dropdown">
                    <a href="#" class="navbar-user-chip dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <div class="navbar-chip-avatar">
                            <img src="{{ asset('assets/Profile.jpeg') }}" alt="Avatar"
                                 onerror="this.style.display='none';this.parentElement.innerHTML='{{ strtoupper(substr(Session::get('username','U'),0,1)) }}'">
                        </div>
                        <span class="navbar-chip-name">{{ Session::get('username', 'Username') }}</span>
                        <i class="fas fa-chevron-down navbar-chip-chevron"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="border-radius:12px;border:1px solid var(--border);box-shadow:0 8px 24px rgba(0,0,0,0.08);padding:6px;min-width:180px;margin-top:6px;">
                        <a href="/profile" class="dropdown-item">
                            <i class="fas fa-user"></i> Profile saya
                        </a>
                        <a href="/settings" class="dropdown-item">
                            <i class="fas fa-cog"></i> Pengaturan
                        </a>
                        <div class="dropdown-divider-custom"></div>
                        <a href="#" class="dropdown-item dropdown-item-logout" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt"></i> Keluar
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- ══════════════════════════════
             SIDEBAR
        ══════════════════════════════ -->
        <aside class="main-sidebar sidebar-light-primary elevation-0">

            <!-- 🔥 Brand - Updated -->
            <a href="/tagihan-ukt" class="brand-link">
                <div class="brand-logo-wrap">
                    <img src="{{ asset('assets/Logo universitas.png') }}" alt="Logo Polines">
                </div>
                <div>
                    <div class="brand-name">SIMAKU</div>
                    <div class="brand-sub">Politeknik Negeri Semarang</div>
                </div>
            </a>

            <div class="sidebar">

                <!-- Mini user profile -->
                <div class="sidebar-user">
                    <div class="sidebar-user-avatar">
                        <img src="{{ asset('assets/Profile.jpeg') }}" alt="Avatar"
                             onerror="this.style.display='none'">
                    </div>
                    <div style="overflow:hidden;">
                        <div class="sidebar-user-name">{{ Session::get('username', 'Username') }}</div>
                        <div class="sidebar-user-role">{{ Session::get('role', 'role') }}</div>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="mt-1">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <!-- Section: Keuangan -->
                        <li class="nav-item"><div class="nav-section-label">Keuangan</div></li>

                        <li class="nav-item">
                            <a href="/lihat-tagihan-ukt" class="nav-link {{ request()->is('lihat-tagihan-ukt*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-invoice"></i>
                                <p>Tagihan UKT</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/daftar-ulang" class="nav-link {{ request()->is('daftar-ulang*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>Daftar Ulang UKT</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/beasiswa" class="nav-link {{ request()->is('beasiswa*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>Beasiswa</p>
                            </a>
                        </li>

                        <!-- Divider -->
                        <li class="nav-item"><div class="nav-divider"></div></li>

                        <!-- Section: Akun -->
                        <li class="nav-item"><div class="nav-section-label">Akun</div></li>

                        <li class="nav-item">
                            <a href="/profile" class="nav-link {{ request()->is('profile*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Profile</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/settings" class="nav-link {{ request()->is('settings*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>Pengaturan</p>
                            </a>
                        </li>

                        <!-- Divider -->
                        <li class="nav-item"><div class="nav-divider"></div></li>

                        <li class="nav-item">
                            <a href="#" class="nav-link nav-link-logout" data-toggle="modal" data-target="#logoutModal">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>

        <!-- ══════════════════════════════
             CONTENT WRAPPER
        ══════════════════════════════ -->
        <div class="content-wrapper">
            <div class="content pt-4 pb-4">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- ══════════════════════════════
             FOOTER
        ══════════════════════════════ -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} Politeknik Negeri Semarang.</strong>
            <span class="float-right d-none d-sm-inline">SIMAKU — Sistem Informasi Keuangan Mahasiswa</span>
        </footer>

    </div>{{-- /.wrapper --}}

    <!-- ══════════════════════════════
         🔥 MODAL LOGOUT - UPDATED
    ══════════════════════════════ -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">

                    {{-- Icon dengan background soft primary --}}
                    <div style="width:56px;height:56px;background:var(--primary-soft);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 18px;">
                        <i class="fas fa-sign-out-alt" style="font-size:22px;color:var(--primary);"></i>
                    </div>

                    <h5 style="font-weight:700;color:var(--text);margin-bottom:8px;">Konfirmasi Keluar</h5>
                    <p style="font-size:13.5px;color:var(--text-muted);margin-bottom:24px;line-height:1.6;">
                        Anda akan keluar dari sesi ini. Login kembali untuk melanjutkan.
                    </p>

                    <div style="display:flex;gap:10px;">
                        <button type="button" class="btn btn-outline-secondary flex-fill" data-dismiss="modal">
                            Batal
                        </button>
                        <form action="{{ route('logout') }}" method="POST" style="flex:1;">
                            @csrf
                            {{-- Tombol primary soft, konsisten dengan tema --}}
                            <button type="submit" class="btn btn-primary-soft w-100">
                                Keluar
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

    <script>
    $(document).ready(function () {

        // Sidebar toggle responsive
        $('[data-widget="pushmenu"]').on('click', function (e) {
            e.preventDefault();
            if ($(window).width() < 992) {
                $('body').toggleClass('sidebar-open').removeClass('sidebar-collapse');
            } else {
                $('body').toggleClass('sidebar-collapse').removeClass('sidebar-open');
            }
        });

        $(window).on('resize', function () {
            if ($(window).width() >= 992) $('body').removeClass('sidebar-open');
        });

        // Session log
        console.log('%c SIMAKU Session (ready) ', 'background:#4338ca;color:#fff;padding:3px 8px;border-radius:4px;font-weight:bold;');
        console.log(JSON.stringify(window.userSessionReport, null, 2));
    });
    </script>

    @yield('scripts')
</body>
</html>