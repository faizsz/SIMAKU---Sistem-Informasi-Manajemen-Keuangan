@extends('layouts.admin-app')

@section('title', 'Kelola Program Studi')

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

    /* Program Studi info styling */
    .prodi-info {
        display: flex;
        flex-direction: column;
    }

    .prodi-name {
        font-weight: 600;
        color: #2d3748;
    }

    .fakultas-name {
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
        .search-box, .filter-select {
            width: 100%;
        }

        .action-buttons {
            flex-direction: column;
            gap: 4px;
        }
    }
</style>
@endsection

@section('header', 'Dashboard Kelola Program Studi')

@section('header_button')
<a href="{{ route('admin.program-studi.create') }}" class="btn-add">
    <i class="fas fa-plus"></i>
    Tambah Program Studi
</a>
@endsection

@section('content')
<div class="table-container">
    <div class="card-header">
        <div class="header-container">
            <h3 class="card-title">Semua Program Studi</h3>
            <form method="GET" action="{{ route('admin.program-studi') }}" id="filterForm" style="margin: 0;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    @if(request('search') || request('fakultas_filter'))
                        <a href="{{ route('admin.program-studi') }}" class="btn btn-secondary" style="padding: 8px 15px; text-decoration: none; background-color: #6c757d; color: white; border-radius: 5px; font-size: 14px; margin: 0; white-space: nowrap;">
                            Reset
                        </a>
                    @endif

                    <select name="fakultas_filter" class="filter-select" id="fakultasFilter" onchange="this.form.submit()">
                        <option value="">Semua Fakultas</option>
                        @foreach($fakultasList as $fakultas)
                            <option value="{{ $fakultas['id'] }}" {{ request('fakultas_filter') == $fakultas['id'] ? 'selected' : '' }}>
                                {{ $fakultas['nama_fakultas'] }}
                            </option>
                        @endforeach
                    </select>

                    <input type="text" name="search" placeholder="Cari prodi..." class="search-box" id="searchInput" value="{{ request('search') }}" style="margin: 0;">
                </div>
            </form>
        </div>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 70px; text-align: center;">No</th>
                    <th>Nama Program Studi</th>
                    <th>Fakultas</th>
                    <th style="width: 150px; text-align: center;">Tanggal Dibuat</th>
                    <th style="width: 150px; text-align: center;">Terakhir Diubah</th>
                    <th style="width: 180px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($programStudi as $index => $item)
                    <tr>
                        <td style="text-align: center;">{{ ($programStudi->firstItem() ?? 0) + $index }}</td>
                        <td>
                            <div class="prodi-info">
                                <span class="prodi-name">{{ $item['nama_prodi'] }}</span>
                            </div>
                        </td>
                        <td>
                            <span class="fakultas-name" style="font-size: 14px; font-weight: 500; color: #4a5568;">{{ $item['nama_fakultas'] ?? 'Fakultas Tidak Ditemukan' }}</span>
                        </td>
                        <td style="text-align: center;">
                            <small class="text-muted">
                                {{ \Carbon\Carbon::parse($item['created_at'])->format('d/m/Y') }}
                            </small>
                        </td>
                        <td style="text-align: center;">
                            <small class="text-muted">
                                {{ \Carbon\Carbon::parse($item['updated_at'])->format('d/m/Y') }}
                            </small>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.program-studi.edit', $item['id']) }}" class="btn-action-edit" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <button type="button" class="btn-action-delete" onclick="confirmDelete({{ $item['id'] }}, '{{ $item['nama_prodi'] }}')" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            @if(request('search') || request('fakultas_filter'))
                                Tidak ada program studi yang sesuai dengan filter yang dipilih.
                            @else
                                Tidak ada data program studi.
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
                @if($programStudi->total() > 0)
                    Showing {{ $programStudi->firstItem() ?? 0 }}-{{ $programStudi->lastItem() ?? 0 }} of {{ $programStudi->total() }}
                    @if(request('search'))
                        (filtered by Search: "{{ request('search') }}")
                    @endif
                    @if(request('fakultas_filter'))
                        (filtered by Fakultas)
                    @endif
                @else
                    No program studi found
                @endif
            </div>
            <div class="page-controls">
                @if ($programStudi->onFirstPage())
                    <button class="page-btn" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                @else
                    <a href="{{ $programStudi->previousPageUrl() }}" class="page-btn">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @endif

                @foreach ($programStudi->getUrlRange(1, $programStudi->lastPage()) as $page => $url)
                    @if ($page == $programStudi->currentPage())
                        <button class="page-btn active">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($programStudi->hasMorePages())
                    <a href="{{ $programStudi->nextPageUrl() }}" class="page-btn">
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
                <p>Apakah Anda yakin ingin menghapus program studi <strong id="prodiName"></strong>?</p>
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

    // Fakultas filter change
    $('#fakultasFilter').on('change', function() {
        $('#filterForm').submit();
    });

    // Clear search when clicking reset
    $('a[href*="admin.program-studi"]:contains("Reset")').on('click', function() {
        $('#searchInput').val('');
        $('#fakultasFilter').val('');
    });
});

// Delete confirmation function
function confirmDelete(id, name) {
    $('#prodiName').text(name);
    $('#deleteForm').attr('action', '/admin/program-studi/' + id);
    $('#deleteModal').modal('show');
}
</script>
@endsection