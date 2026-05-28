@extends('layouts.admin-app')

@section('title', 'Kelola Enrollment Mahasiswa')

@section('styles')
<style>
    .table-container .card-header {
        padding: 15px 20px;
    }

    .header-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
        width: 100%;
    }

    .header-top {
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

    .filter-row-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
        width: 100%;
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

    /* Mahasiswa info styling */
    .mahasiswa-info {
        display: flex;
        flex-direction: column;
    }

    .mahasiswa-name {
        font-weight: 600;
        color: #2d3748;
    }

    .mahasiswa-nim {
        font-size: 14px;
        color: #5a5c69;
        font-weight: 500;
    }

    /* Unified Premium Badges */
    .prodi-badge, .kelas-badge, .tingkat-badge, .ukt-badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }

    .prodi-badge {
        background-color: #d1f2eb;
        color: #0f5132;
        border: 1px solid #a3e3d0;
    }

    .kelas-badge {
        background-color: #cff4fc;
        color: #087990;
        border: 1px solid #b6effb;
    }

    .tingkat-badge {
        background-color: #fff3cd;
        color: #664d03;
        border: 1px solid #ffecb5;
    }

    .ukt-badge {
        background-color: #f8d7da;
        color: #842029;
        border: 1px solid #f5c2c7;
    }

    /* Tahun akademik styling */
    .tahun-akademik {
        font-size: 14px;
        color: #4a5568;
        font-weight: 500;
        white-space: nowrap;
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

    @media (max-width: 992px) {
        .filter-row-container {
            flex-direction: column;
            align-items: stretch;
            gap: 8px;
        }

        .filter-select, .search-box {
            width: 100% !important;
        }
    }
</style>
@endsection

@section('header', 'Dashboard Kelola Enrollment Mahasiswa')

@section('header_button')
<a href="{{ route('admin.enrollment-mahasiswa.create') }}" class="btn-add">
    <i class="fas fa-plus"></i>
    Tambah Enrollment
</a>
@endsection

@section('content')
<div class="table-container">
    <div class="card-header">
        <div class="header-container">
            <div class="header-top">
                <h3 class="card-title">Semua Enrollment Mahasiswa</h3>
            </div>
            <form method="GET" action="{{ route('admin.enrollment-mahasiswa') }}" id="filterForm" style="margin: 0; width: 100%;">
                <div class="filter-row-container">
                    @if(request('search') || request('prodi_filter') || request('kelas_filter') || request('tingkat_filter') || request('tahun_akademik_filter'))
                        <a href="{{ route('admin.enrollment-mahasiswa') }}" class="btn btn-secondary" style="padding: 8px 15px; text-decoration: none; background-color: #6c757d; color: white; border-radius: 5px; font-size: 14px; margin: 0; white-space: nowrap;">
                            Reset
                        </a>
                    @endif

                    <select name="prodi_filter" class="filter-select" id="prodiFilter" style="margin: 0;">
                        <option value="">Semua Program Studi</option>
                        @foreach($prodiList as $prodi)
                            <option value="{{ $prodi['id'] }}" {{ request('prodi_filter') == $prodi['id'] ? 'selected' : '' }}>
                                {{ $prodi['nama_prodi'] }}
                            </option>
                        @endforeach
                    </select>

                    <select name="kelas_filter" class="filter-select" id="kelasFilter" style="margin: 0;">
                        <option value="">Semua Kelas</option>
                        @foreach($kelasList as $kelas)
                            <option value="{{ $kelas['id'] }}" {{ request('kelas_filter') == $kelas['id'] ? 'selected' : '' }}>
                                {{ $kelas['nama_kelas'] }}
                            </option>
                        @endforeach
                    </select>

                    <select name="tingkat_filter" class="filter-select" id="tingkatFilter" style="margin: 0;">
                        <option value="">Semua Tingkat</option>
                        @foreach($tingkatList as $tingkat)
                            <option value="{{ $tingkat['id'] }}" {{ request('tingkat_filter') == $tingkat['id'] ? 'selected' : '' }}>
                                {{ $tingkat['nama_tingkat'] }}
                            </option>
                        @endforeach
                    </select>

                    <select name="tahun_akademik_filter" class="filter-select" id="tahunAkademikFilter" style="margin: 0;">
                        <option value="">Semua Tahun Akademik</option>
                        @foreach($tahunAkademikList as $tahunAkademik)
                            <option value="{{ $tahunAkademik['id'] }}" {{ request('tahun_akademik_filter') == $tahunAkademik['id'] ? 'selected' : '' }}>
                                {{ $tahunAkademik['tahun_akademik'] }} - {{ $tahunAkademik['semester'] }}
                            </option>
                        @endforeach
                    </select>

                    <input type="text" name="search" placeholder="Cari nama, NIM, kelas..." class="search-box" id="searchInput" value="{{ request('search') }}" style="margin: 0; margin-left: auto;">
                </div>
            </form>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 70px; text-align: center;">No</th>
                        <th>Mahasiswa</th>
                        <th style="text-align: center;">Program Studi</th>
                        <th style="text-align: center;">Kelas</th>
                        <th style="text-align: center;">Tingkat</th>
                        <th style="text-align: center;">Golongan UKT</th>
                        <th style="text-align: center;">Tahun Akademik</th>
                        <th style="width: 180px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enrollments as $index => $enrollment)
                        <tr>
                            <td style="text-align: center;">{{ ($enrollments->firstItem() ?? 0) + $index }}</td>
                            <td>
                                <div class="mahasiswa-info">
                                    <span class="mahasiswa-name">{{ $enrollment['nama_mahasiswa'] ?? 'N/A' }}</span>
                                    <span class="mahasiswa-nim">{{ $enrollment['nim'] ?? 'N/A' }}</span>
                                </div>
                            </td>
                            <td style="text-align: center;">
                                <span class="prodi-badge">{{ $enrollment['nama_prodi'] ?? 'N/A' }}</span>
                            </td>
                            <td style="text-align: center;">
                                <span class="kelas-badge">{{ $enrollment['nama_kelas'] ?? 'N/A' }}</span>
                            </td>
                            <td style="text-align: center;">
                                <span class="tingkat-badge">{{ $enrollment['nama_tingkat'] ?? 'N/A' }}</span>
                            </td>
                            <td style="text-align: center;">
                                <span class="ukt-badge">{{ $enrollment['golongan_ukt_info'] ?? 'N/A' }}</span>
                            </td>
                            <td style="text-align: center;">
                                <span class="tahun-akademik">{{ $enrollment['tahun_akademik_info'] ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.enrollment-mahasiswa.edit', $enrollment['id']) }}" class="btn-action-edit" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <button type="button" class="btn-action-delete" onclick="confirmDelete({{ $enrollment['id'] }}, '{{ $enrollment['nama_mahasiswa'] ?? 'N/A' }}')" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                @if(request('search') || request('prodi_filter') || request('kelas_filter') || request('tingkat_filter') || request('tahun_akademik_filter'))
                                    Tidak ada enrollment mahasiswa yang sesuai dengan filter yang dipilih.
                                @else
                                    Tidak ada data enrollment mahasiswa.
                                  @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer">
        <div class="pagination-wrapper">
            <div class="pagination-info">
                @if($enrollments->total() > 0)
                    Showing {{ $enrollments->firstItem() ?? 0 }}-{{ $enrollments->lastItem() ?? 0 }} of {{ $enrollments->total() }}
                    @if(request('search'))
                        (filtered by Search: "{{ request('search') }}")
                    @endif
                    @if(request('prodi_filter'))
                        (filtered by Program Studi)
                    @endif
                    @if(request('kelas_filter'))
                        (filtered by Kelas)
                    @endif
                    @if(request('tingkat_filter'))
                        (filtered by Tingkat)
                    @endif
                    @if(request('tahun_akademik_filter'))
                        (filtered by Tahun Akademik)
                    @endif
                @else
                    No enrollment found
                @endif
            </div>
            <div class="page-controls">
                @if ($enrollments->onFirstPage())
                    <button class="page-btn" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                @else
                    <a href="{{ $enrollments->previousPageUrl() }}" class="page-btn">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @endif

                @foreach ($enrollments->getUrlRange(1, $enrollments->lastPage()) as $page => $url)
                    @if ($page == $enrollments->currentPage())
                        <button class="page-btn active">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($enrollments->hasMorePages())
                    <a href="{{ $enrollments->nextPageUrl() }}" class="page-btn">
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
                <p>Apakah Anda yakin ingin menghapus enrollment mahasiswa <strong id="enrollmentName"></strong>?</p>
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

    // Filter change handlers
    $('#prodiFilter').on('change', function() {
        $('#filterForm').submit();
    });

    $('#kelasFilter').on('change', function() {
        $('#filterForm').submit();
    });

    $('#tingkatFilter').on('change', function() {
        $('#filterForm').submit();
    });

    $('#tahunAkademikFilter').on('change', function() {
        $('#filterForm').submit();
    });

    // Clear search when clicking reset
    $('a[href*="admin.enrollment-mahasiswa"]:contains("Reset")').on('click', function() {
        $('#searchInput').val('');
        $('#prodiFilter').val('');
        $('#kelasFilter').val('');
        $('#tingkatFilter').val('');
        $('#tahunAkademikFilter').val('');
    });
});

// Delete confirmation function
function confirmDelete(id, name) {
    $('#enrollmentName').text(name);
    $('#deleteForm').attr('action', '/admin/enrollment-mahasiswa/' + id);
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
                console.log('Enrollment berhasil dihapus');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error deleting enrollment:', error);

            // Reset button state
            submitBtn.prop('disabled', false);
            submitBtn.html(originalText);

            // Show error message
            alert('Terjadi kesalahan saat menghapus enrollment. Silakan coba lagi.');
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