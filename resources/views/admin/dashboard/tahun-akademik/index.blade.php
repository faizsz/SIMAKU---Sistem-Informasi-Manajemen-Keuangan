@extends('layouts.admin-app')

@section('title', 'Kelola Tahun Akademik')

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

    /* Search Box */
    .search-box {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 8px 15px;
        width: 350px;
        font-size: 14px;
        outline: none;
        transition: all 0.3s ease;
    }

    .search-box:focus {
        border-color: #4e73df;
        width: 400px;
        box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.1);
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

    /* Tahun Akademik info styling */
    .tahun-akademik-info {
        display: flex;
        flex-direction: column;
    }

    .tahun-akademik-name {
        font-weight: 600;
        color: #2d3748;
    }

    .tahun-akademik-semester {
        font-size: 14px;
        color: #5a5c69;
        font-weight: 500;
    }

    /* Status Badge */
    .status-badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }

    .status-aktif {
        background-color: #d1f2eb;
        color: #0f5132;
        border: 1px solid #a3e3d0;
    }

    .status-non-aktif {
        background-color: #f3f4f6;
        color: #4b5563;
        border: 1px solid #e5e7eb;
    }

    /* Periode Text */
    .periode-text {
        font-size: 14px;
        color: #4a5568;
        font-weight: 500;
        white-space: nowrap;
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

    /* Action buttons */
    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
        flex-wrap: nowrap;
    }

    .btn-action-edit, .btn-action-delete {
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
    }

    .btn-action-edit {
        color: #4b5563; /* Abu-abu gelap */
    }

    .btn-action-edit:hover {
        color: white;
        background-color: #4e73df; /* Biru */
        border-color: #4e73df;
    }

    .btn-action-delete {
        color: #9ca3af; /* Abu-abu terang */
    }

    .btn-action-delete:hover {
        color: white;
        background-color: #e74a3b; /* Merah */
        border-color: #e74a3b;
    }

    @media (max-width: 768px) {
        .filter-row {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-left {
            margin-bottom: 10px;
            flex-wrap: wrap;
        }

        .search-box {
            width: 100%;
        }

        .action-buttons {
            flex-direction: column;
            gap: 4px;
        }

        .date-info {
            font-size: 11px;
        }
    }
</style>
@endsection

@section('header', 'Dashboard Kelola Tahun Akademik')

@section('header_button')
<a href="{{ route('admin.tahun-akademik.create') }}" class="btn-add">
    <i class="fas fa-plus"></i>
    Tambah Tahun Akademik
</a>
@endsection

@section('content')
<div class="table-container">
    <div class="card-header">
        <div class="header-container">
            <h3 class="card-title">Semua Tahun Akademik</h3>
            <form method="GET" action="{{ route('admin.tahun-akademik') }}" id="filterForm" style="margin: 0;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    @if(request('search') || (request('status') && request('status') !== 'all') || (request('semester') && request('semester') !== 'all'))
                        <a href="{{ route('admin.tahun-akademik') }}" class="btn btn-secondary" style="padding: 8px 15px; text-decoration: none; background-color: #6c757d; color: white; border-radius: 5px; font-size: 14px; margin: 0; white-space: nowrap;">
                            Reset
                        </a>
                    @endif

                    <!-- Filter Semester -->
                    <select name="semester" class="filter-select" onchange="this.form.submit()">
                        <option value="all" {{ request('semester') == 'all' ? 'selected' : '' }}>Semua Semester</option>
                        <option value="Ganjil" {{ request('semester') == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                        <option value="Genap" {{ request('semester') == 'Genap' ? 'selected' : '' }}>Genap</option>
                    </select>

                    <!-- Filter Status -->
                    <select name="status" class="filter-select" onchange="this.form.submit()">
                        <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua Status</option>
                        <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="non-aktif" {{ request('status') == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
                    </select>

                    <input type="text" name="search" placeholder="Cari tahun akademik..." class="search-box" id="searchInput" value="{{ request('search') }}" style="margin: 0;">
                </div>
            </form>
        </div>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 70px; text-align: center;">No</th>
                    <th>Tahun Akademik</th>
                    <th style="width: 120px; text-align: center;">Semester</th>
                    <th style="width: 180px;">Periode</th>
                    <th style="width: 130px; text-align: center;">Status</th>
                    <th style="width: 150px; text-align: center;">Tanggal Dibuat</th>
                    <th style="width: 180px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tahunAkademik as $index => $item)
                    <tr>
                        <td style="text-align: center;">{{ ($tahunAkademik->firstItem() ?? 0) + $index }}</td>
                        <td>
                            <div class="tahun-akademik-info">
                                <span class="tahun-akademik-name">{{ $item['tahun_akademik'] }}</span>
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <span class="tahun-akademik-semester">{{ $item['semester'] }}</span>
                        </td>
                        <td>
                            <span class="periode-text">
                                {{ \Carbon\Carbon::parse($item['tanggal_mulai'])->translatedFormat('d M Y') }} - {{ \Carbon\Carbon::parse($item['tanggal_selesai'])->translatedFormat('d M Y') }}
                            </span>
                        </td>
                        <td style="text-align: center;">
                            <span class="status-badge status-{{ $item['status'] }}">
                                {{ ucfirst($item['status']) }}
                            </span>
                        </td>
                        <td style="text-align: center;">
                            <small class="text-muted">
                                {{ \Carbon\Carbon::parse($item['created_at'])->format('d/m/Y') }}
                            </small>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.tahun-akademik.edit', $item['id']) }}" class="btn-action-edit" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <button type="button" class="btn-action-delete" onclick="confirmDelete({{ $item['id'] }}, '{{ $item['tahun_akademik'] }} - {{ $item['semester'] }}')" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            @if(request('search'))
                                Tidak ada tahun akademik yang sesuai dengan pencarian "{{ request('search') }}".
                            @else
                                Tidak ada data tahun akademik.
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
                @if($tahunAkademik->total() > 0)
                    Showing {{ $tahunAkademik->firstItem() ?? 0 }}-{{ $tahunAkademik->lastItem() ?? 0 }} of {{ $tahunAkademik->total() }}
                    @if(request('search'))
                        (filtered by Search: "{{ request('search') }}")
                    @endif
                @else
                    No tahun akademik found
                @endif
            </div>
            <div class="page-controls">
                @if ($tahunAkademik->onFirstPage())
                    <button class="page-btn" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                @else
                    <a href="{{ $tahunAkademik->previousPageUrl() }}" class="page-btn">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @endif

                @foreach ($tahunAkademik->getUrlRange(1, $tahunAkademik->lastPage()) as $page => $url)
                    @if ($page == $tahunAkademik->currentPage())
                        <button class="page-btn active">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($tahunAkademik->hasMorePages())
                    <a href="{{ $tahunAkademik->nextPageUrl() }}" class="page-btn">
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

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus tahun akademik <strong id="tahunAkademikName"></strong>?</p>
                <small class="text-muted">Tindakan ini tidak dapat dibatalkan.</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
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

    // Clear search and filters when clicking reset
    $('a[href*="admin.tahun-akademik"]:contains("Reset")').on('click', function() {
        $('#searchInput').val('');
        $('select[name="status"]').val('all');
        $('select[name="semester"]').val('all');
    });
});

// Delete confirmation function
function confirmDelete(id, name) {
    $('#tahunAkademikName').text(name);
    $('#deleteForm').attr('action', '/admin/tahun-akademik/' + id);
    $('#deleteModal').modal('show');
}
</script>
@endsection