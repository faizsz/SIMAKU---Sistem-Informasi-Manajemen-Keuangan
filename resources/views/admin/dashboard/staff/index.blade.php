@extends('layouts.admin-app')

@section('title', 'Kelola Staff')

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
        min-width: 160px;
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

    /* Staff info styling */
    .staff-info {
        display: flex;
        flex-direction: column;
    }

    .staff-name {
        font-weight: 600;
        color: #2d3748;
    }

    .staff-nip {
        font-size: 14px;
        color: #5a5c69;
        font-weight: 500;
    }

    /* Jabatan badge */
    .jabatan-badge {
        display: inline-block;
        background-color: #d1f2eb;
        color: #0f5132;
        border: 1px solid #a3e3d0;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }

    /* Unit kerja styling */
    .unit-kerja {
        font-size: 14px;
        color: #4a5568;
        font-weight: 500;
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

@section('header', 'Dashboard Kelola Staff')

@section('header_button')
<a href="{{ route('admin.staff.create') }}" class="btn-add">
    <i class="fas fa-plus"></i>
    Tambah Staff
</a>
@endsection

@section('content')
<div class="table-container">
    <div class="card-header">
        <div class="header-container">
            <h3 class="card-title">Semua Staff</h3>
            <form method="GET" action="{{ route('admin.staff') }}" id="filterForm" style="margin: 0;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    @if(request('search') || request('jabatan_filter') || request('unit_filter'))
                        <a href="{{ route('admin.staff') }}" class="btn btn-secondary" style="padding: 8px 15px; text-decoration: none; background-color: #6c757d; color: white; border-radius: 5px; font-size: 14px; margin: 0; white-space: nowrap;">
                            Reset
                        </a>
                    @endif

                    <select name="jabatan_filter" class="filter-select" id="jabatanFilter" style="margin: 0;" onchange="this.form.submit()">
                        <option value="">Semua Jabatan</option>
                        @foreach($jabatanList as $jabatan)
                            <option value="{{ $jabatan }}" {{ request('jabatan_filter') == $jabatan ? 'selected' : '' }}>
                                {{ $jabatan }}
                            </option>
                        @endforeach
                    </select>

                    <select name="unit_filter" class="filter-select" id="unitFilter" style="margin: 0;" onchange="this.form.submit()">
                        <option value="">Semua Unit Kerja</option>
                        @foreach($unitList as $unit)
                            <option value="{{ $unit }}" {{ request('unit_filter') == $unit ? 'selected' : '' }}>
                                {{ $unit }}
                            </option>
                        @endforeach
                    </select>

                    <input type="text" name="search" placeholder="Cari nama staff atau NIP..." class="search-box" id="searchInput" value="{{ request('search') }}" style="margin: 0;">
                </div>
            </form>
        </div>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 70px; text-align: center;">No</th>
                    <th style="width: 150px; text-align: center;">NIP</th>
                    <th>Nama Lengkap</th>
                    <th style="width: 180px; text-align: center;">Jabatan</th>
                    <th>Unit Kerja</th>
                    <th style="width: 150px; text-align: center;">Tanggal Dibuat</th>
                    <th style="width: 150px; text-align: center;">Terakhir Diubah</th>
                    <th style="width: 180px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($staff as $index => $item)
                    <tr>
                        <td style="text-align: center;">{{ ($staff->firstItem() ?? 0) + $index }}</td>
                        <td style="text-align: center;">
                            <span class="staff-nip">{{ $item['nip'] }}</span>
                        </td>
                        <td>
                            <div class="staff-info">
                                <span class="staff-name">{{ $item['nama_lengkap'] }}</span>
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <span class="jabatan-badge">{{ $item['jabatan'] }}</span>
                        </td>
                        <td>
                            <span class="unit-kerja">{{ $item['unit_kerja'] }}</span>
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
                                <a href="{{ route('admin.staff.edit', $item['id']) }}" class="btn-action-edit" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <button type="button" class="btn-action-delete" onclick="confirmDelete({{ $item['id'] }}, '{{ $item['nama_lengkap'] }}')" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            @if(request('search') || request('jabatan_filter') || request('unit_filter'))
                                Tidak ada staff yang sesuai dengan filter yang dipilih.
                            @else
                                Tidak ada data staff.
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
                @if($staff->total() > 0)
                    Showing {{ $staff->firstItem() ?? 0 }}-{{ $staff->lastItem() ?? 0 }} of {{ $staff->total() }}
                    @if(request('search'))
                        (filtered by Search: "{{ request('search') }}")
                    @endif
                    @if(request('jabatan_filter'))
                        (filtered by Jabatan: {{ request('jabatan_filter') }})
                    @endif
                    @if(request('unit_filter'))
                        (filtered by Unit Kerja: {{ request('unit_filter') }})
                    @endif
                @else
                    No staff found
                @endif
            </div>
            <div class="page-controls">
                @if ($staff->onFirstPage())
                    <button class="page-btn" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                @else
                    <a href="{{ $staff->previousPageUrl() }}" class="page-btn">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @endif

                @foreach ($staff->getUrlRange(1, $staff->lastPage()) as $page => $url)
                    @if ($page == $staff->currentPage())
                        <button class="page-btn active">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($staff->hasMorePages())
                    <a href="{{ $staff->nextPageUrl() }}" class="page-btn">
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
                <p>Apakah Anda yakin ingin menghapus staff <strong id="staffName"></strong>?</p>
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

    // Jabatan filter change
    $('#jabatanFilter').on('change', function() {
        $('#filterForm').submit();
    });

    // Unit Kerja filter change
    $('#unitFilter').on('change', function() {
        $('#filterForm').submit();
    });

    // Clear search when clicking reset
    $('a[href*="admin.staff"]:contains("Reset")').on('click', function() {
        $('#searchInput').val('');
        $('#jabatanFilter').val('');
        $('#unitFilter').val('');
    });
});

// Delete confirmation function
function confirmDelete(id, name) {
    $('#staffName').text(name);
    $('#deleteForm').attr('action', '/admin/staff/' + id);
    $('#deleteModal').modal('show');
}

// Handle delete form submission
$('#deleteForm').on('submit', function(e) {
    e.preventDefault();

    var form = $(this);
    var submitBtn = form.find('button[type="submit"]');
    var originalText = submitBtn.html();

    // Show loading state
    submitBtn.prop('disabled', true);
    submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Menghapus...');

    // Submit form via AJAX
    $.ajax({
        url: form.attr('action'),
        method: 'POST',
        data: form.serialize(),
        success: function(response) {
            $('#deleteModal').modal('hide');

            // Show success message
            if (response.success) {
                // Refresh page after short delay
                setTimeout(function() {
                    window.location.reload();
                }, 500);

                // You can also show a toast notification here
                console.log('Staff berhasil dihapus');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error deleting staff:', error);

            // Reset button state
            submitBtn.prop('disabled', false);
            submitBtn.html(originalText);

            // Show error message
            alert('Terjadi kesalahan saat menghapus staff. Silakan coba lagi.');
        }
    });
});

// Reset modal when closed
$('#deleteModal').on('hidden.bs.modal', function() {
    var submitBtn = $('#deleteForm button[type="submit"]');
    submitBtn.prop('disabled', false);
    submitBtn.html('Hapus');
});
</script>
@endsection