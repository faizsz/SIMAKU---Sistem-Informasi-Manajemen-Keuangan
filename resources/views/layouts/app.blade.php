<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIMAKU')</title>

    <!-- Load CSS first -->
    <!-- CSS AdminLTE -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
        /* ========================================= */
        /* PREMIUM LAYOUT OVERRIDES */
        /* ========================================= */
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');
        
        :root {
            --layout-bg: #f8fafc;
            --layout-surface: #ffffff;
            --layout-primary: #4338ca;
            --layout-primary-soft: #e0e7ff;
            --layout-border: #e2e8f0;
            --layout-text: #0f172a;
            --layout-text-muted: #64748b;
            --shadow-soft: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            --shadow-glass: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            background-color: var(--layout-bg) !important;
            color: var(--layout-text);
        }

        .wrapper {
            background-color: var(--layout-bg) !important;
        }

        .content-wrapper {
            background-color: transparent !important;
        }

        /* Glassmorphism Navbar */
        .main-header.navbar {
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--layout-border) !important;
            box-shadow: none !important;
            position: sticky;
            top: 0;
            z-index: 1039;
            padding: 0.75rem 1rem;
        }

        .navbar-page-title {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            font-size: 1.25rem !important;
            font-weight: 700 !important;
            color: var(--layout-text) !important;
            margin: 0 !important;
            letter-spacing: -0.02em !important;
        }

        /* Sidebar Styling */
        .main-sidebar {
            background-color: var(--layout-surface) !important;
            box-shadow: 1px 0 10px rgba(0,0,0,0.03) !important;
            border-right: 1px solid var(--layout-border) !important;
        }

        .brand-link {
            border-bottom: 1px solid var(--layout-border) !important;
            background: var(--layout-surface) !important;
            padding: 1.2rem 1rem !important;
            display: flex;
            align-items: center;
        }
        
        .brand-image {
            float: none;
            margin-right: 8px;
            margin-top: 0;
        }

        .brand-text {
            font-weight: 700 !important;
            color: var(--layout-text) !important;
            letter-spacing: -0.02em;
        }

        .sidebar {
            padding-top: 1rem;
        }

        /* Nav Pills (Sidebar Menu) */
        .nav-sidebar .nav-item {
            margin-bottom: 4px;
        }

        .nav-sidebar .nav-link {
            border-radius: 12px;
            margin: 0 12px;
            padding: 10px 16px;
            color: var(--layout-text-muted) !important;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .nav-sidebar .nav-link p {
            font-size: 0.95rem;
        }

        .nav-sidebar .nav-link:hover {
            background-color: #f1f5f9 !important;
            color: var(--layout-primary) !important;
            transform: translateX(2px);
        }

        /* Active Menu State */
        .sidebar-light-primary .nav-sidebar > .nav-item > .nav-link.active,
        .nav-treeview > .nav-item > .nav-link.active {
            background-color: var(--layout-primary-soft) !important;
            color: var(--layout-primary) !important;
            border-left: none !important;
            font-weight: 600;
            box-shadow: none !important;
        }

        .nav-sidebar .nav-link.active i {
            color: var(--layout-primary) !important;
        }

        .nav-treeview {
            padding-top: 5px;
            padding-bottom: 5px;
            background: transparent !important;
        }
        
        .nav-item.menu-open > .nav-treeview {
            border-left: 2px solid var(--layout-border);
            margin-left: 1.5rem;
            padding-left: 0;
            display: block !important;
        }

        .nav-treeview > .nav-item > .nav-link {
            padding-left: 1rem !important;
            margin-left: 8px;
            border-radius: 8px;
            font-size: 0.9rem;
        }
        
        /* Dropdown arrow */
        .nav-sidebar .nav-link > .right {
            position: absolute;
            right: 1.2rem;
            top: 0.85rem;
            transition: transform 0.3s ease;
        }
        .nav-item.menu-open > .nav-link > .right {
            transform: rotate(-90deg);
        }

        /* User Menu Navbar */
        .user-menu .profile-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 4px 12px !important;
            border-radius: 50px;
            background: var(--layout-border);
            transition: all 0.2s;
            border: 1px solid transparent;
            text-decoration: none;
        }
        
        .user-menu .profile-link:hover {
            background: #e2e8f0;
        }

        .user-menu .user-image {
            width: 32px;
            height: 32px;
            margin-top: 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .user-menu .user-info {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
            text-align: left;
        }

        .user-menu .user-name {
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--layout-text);
        }

        .user-menu .user-role {
            font-size: 0.7rem;
            color: var(--layout-text-muted);
            font-weight: 500;
            text-transform: capitalize;
        }

        .profile-arrow {
            font-size: 0.7rem;
            color: var(--layout-text-muted);
            margin-left: 4px;
        }

        /* Modals */
        .modal-content {
            border-radius: 16px;
            border: none;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .modal-body {
            padding: 30px;
        }

        .modal-title {
            font-weight: 700;
            color: var(--layout-text);
            font-size: 1.25rem;
        }

        .btn-outline-primary {
            border: 2px solid var(--layout-border);
            color: var(--layout-text);
            border-radius: 12px;
            font-weight: 600;
        }

        .btn-outline-primary:hover {
            background-color: var(--layout-bg);
            color: var(--layout-text);
            border-color: var(--layout-border);
        }

        .btn-primary {
            background-color: var(--layout-primary);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #312e81;
            transform: translateY(-1px);
        }
        
    </style>

    @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
    <!-- User Session Report Script - Added early to ensure it runs -->
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

                // Log immediately as a fallback
                console.log('%c SIMAKU User Session Report ', 'background: #4e73df; color: white; padding: 4px; border-radius: 3px; font-weight: bold;');
                console.log(JSON.stringify(userReport, null, 2));

                // Store in window object for debugging if needed
                window.userSessionReport = userReport;
            } catch(e) {
                console.error('Error generating user report:', e);
            }
        })();
    </script>

    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- Page Title Injected Here -->
                <li class="nav-item d-none d-sm-inline-block ml-3">
                    <h1 class="navbar-page-title">@yield('header', 'Dashboard')</h1>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto align-items-center">
                <!-- Page Actions / Buttons Injected Here -->
                <li class="nav-item mr-3 d-none d-sm-inline-block">
                    @yield('header_button')
                </li>
                
                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-primary navbar-badge">2</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">2 Notifikasi</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2 px-1 text-primary"></i> Tagihan UKT baru
                            <span class="float-right text-muted text-sm">3h</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2 px-1 text-success"></i> Pembayaran diterima
                            <span class="float-right text-muted text-sm">1w</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">Lihat Semua Notifikasi</a>
                    </div>
                </li>
                <!-- User -->
                <li class="nav-item dropdown user-menu ml-2">
                    <a href="#" class="nav-link dropdown-toggle profile-link" data-toggle="dropdown">
                        <img src="{{ asset('assets/Profile.jpeg') }}" class="user-image rounded-circle" alt="User Image">
                        <div class="user-info">
                            <span class="user-name" onclick="window.location.href='/profile'; event.stopPropagation(); return false;">{{ Session::get('username') ?? 'Username' }}</span>
                            <span class="user-role">{{ Session::get('role') ?? 'role' }}</span>
                        </div>
                        <i class="fas fa-chevron-down profile-arrow"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="border-radius: 12px; overflow: hidden; border: 1px solid var(--layout-border); box-shadow: var(--shadow-glass);">
                        <li class="user-header bg-primary">
                            <img src="{{ asset('assets/Profile.jpeg') }}" class="img-circle elevation-2" alt="User Image">
                            <p>
                                {{ Session::get('username') ?? 'Username' }}
                                <small>{{ Session::get('email') ?? 'user@example.com' }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <a href="/profile" class="btn btn-default btn-flat" style="border-radius: 8px;">Profile</a>
                            <a href="#" class="btn btn-default btn-flat float-right" data-toggle="modal" data-target="#logoutModal" style="border-radius: 8px;">Keluar</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary">
            <!-- Brand Logo -->
            <a href="/lihat-tagihan-ukt" class="brand-link">
                <img src="{{ asset('assets/Logo universitas.png') }}" alt="Logo" class="brand-image img-circle elevation-2">
                <span class="brand-text font-weight-light">SIMAKU</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item {{ request()->is('lihat-tagihan-ukt*') || request()->is('daftar-ulang*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('lihat-tagihan-ukt*') || request()->is('daftar-ulang*') ? 'active' : '' }}">    
                                <i class="nav-icon fas fa-border-all"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/lihat-tagihan-ukt" class="nav-link {{ request()->is('lihat-tagihan-ukt*') ? 'active' : '' }}">
                                        <i class="fas fa-file-invoice nav-icon" style="font-size: 0.85rem"></i>
                                        <p>Tagihan UKT</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/daftar-ulang" class="nav-link {{ request()->is('daftar-ulang*') ? 'active' : '' }}">
                                        <i class="fas fa-clipboard-list nav-icon" style="font-size: 0.85rem"></i>
                                        <p>Daftar Ulang UKT</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/beasiswa" class="nav-link {{ request()->is('beasiswa*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>Beasiswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/profile" class="nav-link {{ request()->is('profile*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/settings" class="nav-link {{ request()->is('settings*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>Settings</p>
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a href="#" class="nav-link text-danger" style="color: #e11d48 !important;" data-toggle="modal" data-target="#logoutModal">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Main content with top padding since header is removed -->
            <div class="content pt-4 pb-4">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="main-footer" style="background: transparent; border-top: 1px solid var(--layout-border); color: var(--layout-text-muted); padding: 1.5rem;">
            <div class="float-right d-none d-sm-inline font-weight-500">
                SIMAKU - Sistem Keuangan Mahasiswa
            </div>
            <strong>Copyright &copy; {{ date('Y') }}</strong> All rights reserved.
        </footer>
    </div>

    <!-- Modal Konfirmasi Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center py-4">
                    <div style="width: 60px; height: 60px; background: #fff1f2; color: #e11d48; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; margin: 0 auto 20px;">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                    <h5 class="modal-title mb-2" id="logoutModalLabel">Keluar dari Akun</h5>
                    <p class="text-muted mb-4">Apakah Anda yakin ingin keluar dari sesi ini?</p>
                    <div class="d-flex justify-content-center" style="gap: 8px;">
                        <button type="button" class="btn btn-outline-primary mr-2" data-dismiss="modal" style="min-width: 120px;">Batal</button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary" style="background: #e11d48; min-width: 120px;">Ya, Keluar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts - Load these after the HTML so the page renders faster -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

    <script>
    $(document).ready(function() {
        // Aktifkan treeview AdminLTE
        if($.fn.Treeview) {
            $('[data-widget="treeview"]').Treeview('init');
        }

        // Responsive sidebar handling
        $('.nav-link[data-widget="pushmenu"]').on('click', function() {
            if ($(window).width() < 992) {
                $('body').toggleClass('sidebar-open');
                $('body').removeClass('sidebar-collapse');
            } else {
                $('body').toggleClass('sidebar-collapse');
                $('body').removeClass('sidebar-open');
            }
            return false;
        });

        // Handle window resize
        $(window).resize(function() {
            if ($(window).width() >= 992) {
                $('body').removeClass('sidebar-open');
            }
        });

        $('.navbar-nav .user-menu .user-name').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation(); // Mencegah dropdown terbuka
            window.location.href = '/profile';
        });

        // Log the user session report again after page is fully loaded
        console.log('%c SIMAKU User Session Report (Ready) ', 'background: #4e73df; color: white; padding: 4px; border-radius: 3px; font-weight: bold;');
        console.log(JSON.stringify(window.userSessionReport, null, 2));
    });
    </script>

    @yield('scripts')
</body>
</html>