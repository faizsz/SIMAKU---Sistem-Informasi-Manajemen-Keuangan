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
        /* Override langsung untuk menu aktif dan sub-menu aktif */
        .sidebar-light-primary .nav-sidebar .nav-link.active,
        .nav-sidebar .nav-link.active,
        .nav-treeview > .nav-item > .nav-link.active {
            background-color: rgba(78, 115, 223, 0.1) !important;
            color: #4e73df !important;
            border-left: 4px solid #4e73df !important;
            padding-left: calc(1rem - 4px) !important;
            font-weight: 600 !important;
        }

        .sidebar-light-primary .nav-sidebar .nav-link.active .nav-icon,
        .nav-sidebar .nav-link.active .nav-icon {
            color: #4e73df !important;
        }

        /* Hover state untuk menu aktif */
        .sidebar-light-primary .nav-sidebar .nav-link.active:hover,
        .nav-sidebar .nav-link.active:hover {
            background-color: rgba(78, 115, 223, 0.15) !important;
            color: #4e73df !important;
        }

        /* Styling untuk menu tidak aktif (High Legibility & Contrast) */
        .nav-sidebar .nav-item > .nav-link:not(.active) {
            color: #4b5563 !important;
            font-weight: 500 !important;
            border-left: 4px solid transparent !important;
            padding-left: calc(1rem - 4px) !important;
            transition: all 0.2s ease;
        }

        .nav-sidebar .nav-item > .nav-link:not(.active) .nav-icon {
            color: #4b5563 !important;
            transition: color 0.2s ease;
        }

        /* Hover state untuk menu tidak aktif */
        .nav-sidebar .nav-item > .nav-link:not(.active):hover {
            color: #1a202c !important;
            background-color: #f3f4f6 !important;
        }

        .nav-sidebar .nav-item > .nav-link:not(.active):hover .nav-icon {
            color: #1a202c !important;
        }

        /* Brand / Logo separator label */
        .nav-header {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.75rem 1rem 0.25rem !important;
            font-weight: 700;
            color: #94a3b8 !important;
        }

        /* Brand Image / Logo Styling (Flat Modern) */
        .brand-link .brand-image {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05) !important;
            border: 1px solid #e2e8f0;
            float: left;
            line-height: .8;
            margin-left: .8rem;
            margin-right: .5rem;
            margin-top: -3px;
            max-height: 33px;
            width: auto;
        }

        /* Force menu to display when parent is open */
        .nav-item.menu-open > .nav-treeview {
            display: block !important;
            margin-left: 0.5rem;
            padding-left: 0.75rem;
            border-left: 1px dotted #e0e0e0;
        }

        /* Hide menu when parent is closed */
        .nav-item:not(.menu-open) > .nav-treeview {
            display: none !important;
        }

        /* Atur ikon panah dropdown */
        .nav-sidebar .nav-link > .right {
            position: absolute;
            right: 1rem;
            top: 0.7rem;
            transition: transform 0.3s ease;
        }

        /* Rotate arrow when menu is open */
        .nav-item.menu-open > .nav-link > .right {
            transform: rotate(90deg);
        }

        /* Style untuk modal logout */
        #logoutModal .modal-content {
            border-radius: 10px;
            border: none;
        }

        #logoutModal .modal-body {
            padding: 30px;
        }

        #logoutModal .modal-title {
            font-weight: 600;
            color: #333;
            font-size: 1.2rem;
        }

        #logoutModal .btn {
            padding: 8px 20px;
            font-size: 14px;
        }

        #logoutModal .btn-outline-primary {
            border: 2px solid #4e73df;
            color: #4e73df;
            border-radius: 5px;
            background-color: transparent;
        }

        #logoutModal .btn-outline-primary:hover {
            background-color: #f8f9fc;
            color: #4e73df;
        }

        #logoutModal .btn-primary {
            background-color: #4e73df;
            border: none;
            border-radius: 5px;
            color: white;
        }

        #logoutModal .btn-primary:hover {
            background-color: #2e59d9;
        }

        /* User info styling */
        .navbar-nav .user-menu .user-info .user-name {
            font-weight: 600;
            font-size: 0.9rem;
            color: #333;
            cursor: pointer;
            transition: color 0.2s;
        }

        .navbar-nav .user-menu .user-info .user-name:hover {
            color: #4e73df;
            text-decoration: none;
        }

        /* Table styling */
        .table-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
            overflow: hidden;
        }

        .table-container .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            padding: 15px 20px;
            font-weight: 600;
        }

        /* Button styling */
        .btn-edit {
            background-color: #4e73df;
            border: none;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 500;
        }

        .btn-edit:hover {
            background-color: #2e59d9;
            color: white;
        }

        .btn-add {
            background-color: #4e73df;
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
        }

        .btn-add:hover {
            background-color: #2e59d9;
            color: white;
        }

        .btn-add i {
            margin-right: 6px;
        }
    </style>

    @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light bg-white">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
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
                            <i class="fas fa-file-invoice mr-2"></i> Tagihan UKT baru
                            <span class="float-right text-muted text-sm">3 jam yang lalu</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-check mr-2"></i> Pembayaran diterima
                            <span class="float-right text-muted text-sm">1 minggu yang lalu</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">Lihat Semua Notifikasi</a>
                    </div>
                </li>
                <!-- User -->
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle profile-link" data-toggle="dropdown">
                        <img src="{{ asset('assets/Profile.jpeg') }}" class="user-image rounded-circle" alt="User Image"
                             onerror="this.style.display='none';this.parentElement.innerHTML='{{ strtoupper(substr(Session::get('username','U'),0,1)) }}'">
                        <div class="user-info">
                            <span class="user-name" onclick="window.location.href='/profile'; event.stopPropagation(); return false;">{{ Session::get('username') ?? 'Mahasiswa' }}</span>
                            <span class="user-role">{{ Session::get('role') ?? 'Mahasiswa' }}</span>
                        </div>
                        <i class="fas fa-chevron-down profile-arrow"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <li class="user-header bg-primary">
                            <img src="{{ asset('assets/Profile.jpeg') }}" class="img-circle elevation-2" alt="User Image">
                            <p>
                                {{ Session::get('username') ?? 'Mahasiswa' }}
                                <small>{{ Session::get('email') ?? 'student@example.com' }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <a href="/profile" class="btn btn-default btn-flat">Profile</a>
                            <a href="#" class="btn btn-default btn-flat float-right" data-toggle="modal" data-target="#logoutModal">Keluar</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-2">
            <!-- Brand Logo -->
            <a href="/lihat-tagihan-ukt" class="brand-link">
                <img src="{{ asset('assets/Logo universitas.png') }}" alt="Logo" class="brand-image img-circle">
                <span class="brand-text font-weight-light">SIMAKU</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        
                        <li class="nav-header">Keuangan</li>

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

                        <li class="nav-header">Akun</li>

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

                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
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
            <!-- Content Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 align-items-center">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('header', 'Dashboard Keuangan Mahasiswa')</h1>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-sm-right">
                                @yield('header_button')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="icon fas fa-ban mr-2"></i> {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="icon fas fa-check mr-2"></i> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                SIMAKU - Sistem Keuangan Mahasiswa
            </div>
            <strong>Copyright &copy; {{ date('Y') }} Politeknik Negeri Semarang.</strong> All rights reserved.
        </footer>
    </div>

    <!-- Modal Konfirmasi Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center py-4">
                    <h5 class="modal-title mb-4" id="logoutModalLabel">LOGOUT FROM ACCOUNT</h5>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-outline-primary mr-3" data-dismiss="modal" style="min-width: 120px;">Batal</button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary" style="min-width: 120px;">Logout</button>
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
    $(document).ready(function() {
        if($.fn.Treeview) {
            $('[data-widget="treeview"]').Treeview('init');
        }

        // Custom dropdown toggle handler
        $('.nav-sidebar .nav-link').on('click', function(e) {
            var $this = $(this);
            var $parent = $this.parent();

            if ($parent.find('.nav-treeview').length > 0) {
                e.preventDefault();

                $parent.toggleClass('menu-open');

                var $icon = $this.find('.right');
                if ($parent.hasClass('menu-open')) {
                    $icon.removeClass('fa-angle-left').addClass('fa-angle-down');
                } else {
                    $icon.removeClass('fa-angle-down').addClass('fa-angle-left');
                }

                $parent.find('.nav-treeview').slideToggle(300);

                return false;
            }
        });

        // Pastikan dropdown terbuka sesuai halaman aktif saat load
        $('.nav-item.menu-open').each(function() {
            var $this = $(this);
            var $icon = $this.find('> .nav-link .right');
            $icon.removeClass('fa-angle-left').addClass('fa-angle-down');
            $this.find('.nav-treeview').show();
        });

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

        $(window).resize(function() {
            if ($(window).width() >= 992) {
                $('body').removeClass('sidebar-open');
            }
        });

        $('.navbar-nav .user-menu .user-name').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            window.location.href = "/profile";
        });
    });

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

            console.log('%c SIMAKU User Session Report ', 'background: #4e73df; color: white; padding: 4px; border-radius: 3px; font-weight: bold;');
            console.log(JSON.stringify(userReport, null, 2));

            window.userSessionReport = userReport;
        } catch(e) {
            console.error('Error generating user report:', e);
        }
    })();
    </script>

    @yield('scripts')
</body>
</html>