@extends('layouts.admin-app')

@section('title', 'Kelola Pengguna')

@section('styles')
<style>
    .table-container .card-header {
        padding: 12px 20px;
    }

    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .table-container .card-title {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
        color: #5a5c69;
    }

    /* Filter Dropdown */
    .filter-select {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 8px 30px 8px 15px;
        font-size: 14px;
        outline: none;
        background-color: white;
        color: #5a5c69;
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 10px center;
        background-repeat: no-repeat;
        background-size: 14px 10px;
        transition: border-color 0.2s;
    }

    .filter-select:focus {
        border-color: #4e73df;
    }

    /* Search Box */
    .search-box {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 8px 15px;
        width: 250px;
        font-size: 14px;
        outline: none;
        transition: all 0.3s ease;
    }

    .search-box:focus {
        border-color: #4e73df;
        width: 280px;
        box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.1);
    }

    /* Role Badge Styling */
    .role-badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }

    .role-admin {
        background-color: #fff5f5;
        color: #c53030;
        border: 1px solid #fed7d7;
    }

    .role-staff {
        background-color: #fff3cd;
        color: #664d03;
        border: 1px solid #ffecb5;
    }

    .role-mahasiswa {
        background-color: #ebf8ff;
        color: #3182ce;
        border: 1px solid #bee3f8;
    }

    /* Status Badge Styling */
    .status-badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }

    .status-active {
        background-color: #d1f2eb;
        color: #0f5132;
        border: 1px solid #a3e3d0;
    }

    .status-inactive {
        background-color: #f8d7da;
        color: #842029;
        border: 1px solid #f5c2c7;
    }

    /* Table Custom Styling */
    .table thead th {
        background-color: #f8f9fc;
        font-weight: 600;
        color: #666;
        font-size: 14px;
        padding: 12px 15px;
        border-bottom: 2px solid #e3e6f0;
        white-space: nowrap;
        vertical-align: middle !important;
    }

    .table tbody td {
        padding: 12px 15px;
        font-size: 14px;
        color: #5a5c69;
        vertical-align: middle !important;
    }

    .table tbody tr:hover {
        background-color: #f8f9fc;
    }

    /* Pagination Styling */
    .pagination-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        padding: 10px 0;
    }

    .pagination-info {
        color: #6c757d;
        font-size: 14px;
    }

    .page-controls {
        display: flex;
        gap: 5px;
    }

    .page-btn {
        width: 32px;
        height: 32px;
        border: 1px solid #dee2e6;
        background-color: white;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s;
    }

    .page-btn:hover {
        background-color: #e9ecef;
        border-color: #adb5bd;
    }

    /* Pagination Link Styling */
    .page-btn {
        text-decoration: none;
        color: #6c757d;
    }

    .page-btn.active {
        background-color: #4e73df;
        color: white;
        border-color: #4e73df;
    }

    a.page-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    a.page-btn:hover {
        text-decoration: none;
        background-color: #e9ecef;
        border-color: #adb5bd;
    }

    .page-btn[disabled] {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* User info styling */
    .user-info {
        display: flex;
        flex-direction: column;
    }

    .username {
        font-weight: 600;
        color: #2d3748;
    }

    .nama-lengkap {
        font-size: 12px;
        color: #718096;
        margin-top: 2px;
    }

    /* Action buttons */
    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
        flex-wrap: nowrap;
    }

    .btn-action-edit {
        width: 32px;
        height: 32px;
        border-radius: 6px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #e5e7eb;
        background-color: white;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 14px;
        outline: none;
        color: #4b5563; /* Abu-abu gelap */
    }

    .btn-action-edit:hover {
        color: white;
        background-color: #4e73df; /* Biru */
        border-color: #4e73df;
    }

    @media (max-width: 768px) {
        .header-container {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .header-container form {
            width: 100%;
        }

        .header-container form > div {
            flex-direction: column;
            align-items: stretch !important;
            gap: 8px !important;
        }

        .search-box, .filter-select {
            width: 100% !important;
        }

        .action-buttons {
            flex-direction: column;
            gap: 4px;
        }
    }
</style>
@endsection

@section('header', 'Dashboard Kelola Pengguna')

@section('header_button')
<a href="{{ route('admin.kelola-pengguna.create') }}" class="btn-add">
    <i class="fas fa-plus"></i>
    Tambah Pengguna
</a>
@endsection

@section('content')
<div class="table-container">
    <div class="card-header">
        <div class="header-container">
            <h3 class="card-title">Semua Pengguna</h3>
            <form method="GET" action="{{ route('admin.kelola-pengguna') }}" id="filterForm" style="margin: 0;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    @if(request('role_filter') || request('status_filter') || request('search'))
                        <a href="{{ route('admin.kelola-pengguna') }}" class="btn btn-secondary" style="padding: 8px 15px; text-decoration: none; background-color: #6c757d; color: white; border-radius: 5px; font-size: 14px; margin: 0; white-space: nowrap;">
                            Reset
                        </a>
                    @endif

                    <select name="role_filter" class="filter-select" id="userRoleFilter" style="margin: 0;">
                        <option value="">Semua Role</option>
                        <option value="admin" {{ request('role_filter') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="staff" {{ request('role_filter') == 'staff' ? 'selected' : '' }}>Staff</option>
                        <option value="mahasiswa" {{ request('role_filter') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                    </select>

                    <select name="status_filter" class="filter-select" id="userStatusFilter" style="margin: 0;">
                        <option value="">Semua Status</option>
                        <option value="active" {{ request('status_filter') == 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="inactive" {{ request('status_filter') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>

                    <input type="text" name="search" placeholder="Cari username, email..." class="search-box" id="searchInput" value="{{ request('search') }}" style="margin: 0;">
                </div>
            </form>
        </div>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 70px; text-align: center;">No</th>
                    <th>Nama Pengguna</th>
                    <th>Email</th>
                    <th style="width: 180px; text-align: center;">Role Pengguna</th>
                    <th style="width: 150px; text-align: center;">Status Akun</th>
                    <th style="width: 120px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                    <tr>
                        <td style="text-align: center;">{{ ($users->firstItem() ?? 0) + $index }}</td>
                        <td>
                            <div class="user-info">
                                <span class="username">{{ $user['username'] }}</span>
                                @php
                                    $namaLengkap = '';
                                    if ($user['role'] === 'mahasiswa' && isset($user['mahasiswa']['nama_lengkap'])) {
                                        $namaLengkap = $user['mahasiswa']['nama_lengkap'];
                                    } elseif ($user['role'] === 'staff' && isset($user['staff']['nama_lengkap'])) {
                                        $namaLengkap = $user['staff']['nama_lengkap'];
                                    }
                                @endphp
                                @if($namaLengkap)
                                    <span class="nama-lengkap">{{ $namaLengkap }}</span>
                                @endif
                            </div>
                        </td>
                        <td>{{ $user['email'] }}</td>

                        <!-- Role badge -->
                        <td style="text-align: center;">
                            @switch($user['role'])
                                @case('admin')
                                    <span class="role-badge role-admin">Admin</span>
                                    @break
                                @case('staff')
                                    <span class="role-badge role-staff">Staff</span>
                                    @break
                                @case('mahasiswa')
                                    <span class="role-badge role-mahasiswa">Mahasiswa</span>
                                    @break
                                @default
                                    <span class="role-badge">{{ ucfirst($user['role']) }}</span>
                            @endswitch
                        </td>

                        <!-- Status badge -->
                        <td style="text-align: center;">
                            @if($user['is_active'])
                                <span class="status-badge status-active">Aktif</span>
                            @else
                                <span class="status-badge status-inactive">Tidak Aktif</span>
                            @endif
                        </td>

                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.kelola-pengguna.edit', $user['id']) }}" class="btn-action-edit" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            @if(request('role_filter') || request('status_filter') || request('search'))
                                Tidak ada pengguna yang sesuai dengan filter.
                            @else
                                Tidak ada data pengguna.
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        <div class="pagination-wrapper">
            <div class="pagination-info">
                @if($users->total() > 0)
                    Showing {{ $users->firstItem() ?? 0 }}-{{ $users->lastItem() ?? 0 }} of {{ $users->total() }}
                    @php
                        $filters = [];
                        if(request('role_filter')) $filters[] = 'Role: ' . ucfirst(request('role_filter'));
                        if(request('status_filter')) $filters[] = 'Status: ' . (request('status_filter') == 'active' ? 'Aktif' : 'Tidak Aktif');
                        if(request('search')) $filters[] = 'Search: "' . request('search') . '"';
                    @endphp
                    @if(count($filters) > 0)
                        (filtered by {{ implode(', ', $filters) }})
                    @endif
                @else
                    No users found
                @endif
            </div>
            <div class="page-controls">
                @if ($users->onFirstPage())
                    <button class="page-btn" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                @else
                    <a href="{{ $users->previousPageUrl() }}" class="page-btn">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @endif

                @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                    @if ($page == $users->currentPage())
                        <button class="page-btn active">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($users->hasMorePages())
                    <a href="{{ $users->nextPageUrl() }}" class="page-btn">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                @else
                    <button class="page-btn" disabled>
                        <i class="fas fa-chevron-right"></i>
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Auto-submit form when filter changes
    $('#userRoleFilter, #userStatusFilter').on('change', function() {
        $('#filterForm').submit();
    });

    // Search functionality with debounce
    let searchTimeout;
    $('#searchInput').on('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function() {
            $('#filterForm').submit();
        }, 500); // 500ms delay for better UX
    });

    // Handle Enter key for search
    $('#searchInput').on('keypress', function(e) {
        if (e.which === 13) { // Enter key
            $('#filterForm').submit();
        }
    });

    // Edit button functionality
    $('.btn-edit').on('click', function(e) {
        var row = $(this).closest('tr');
        var username = row.find('td:eq(1)').text();
        console.log('Editing user:', username);
    });

    // Add user button functionality
    $('.btn-add').on('click', function() {
        console.log('Adding new user');
    });

    // Clear search when clicking reset
    $('a[href*="admin.kelola-pengguna"]:contains("Reset")').on('click', function() {
        $('#searchInput').val('');
        $('#userRoleFilter').val('');
        $('#userStatusFilter').val('');
    });
});
</script>
@endsection