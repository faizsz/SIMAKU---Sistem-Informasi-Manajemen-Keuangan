@extends('layouts.app')

@section('title', 'Daftar Ulang UKT - SIMAKU')

@section('header', 'Daftar Ulang')

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;600&display=swap');

    :root {
        --primary:       #4e73df;
        --primary-soft:  rgba(78, 115, 223, 0.1);
        --primary-text:  #4e73df;
        --success:       #1cc88a;
        --success-soft:  rgba(28, 200, 138, 0.1);
        --danger:        #e74a3b;
        --danger-soft:   rgba(231, 74, 59, 0.1);
        --warning:       #f6c23e;
        --warning-soft:  rgba(246, 194, 62, 0.1);
        --info:          #36b9cc;
        --info-soft:     rgba(54, 185, 204, 0.1);
        --surface:       #ffffff;
        --bg:            #f8f9fc;
        --text:          #5a5c69;
        --text-muted:    #858796;
        --text-hint:     #b7b9cc;
        --border:        #e3e6f0;
        --radius:        8px;
        --radius-lg:     10px;
        --shadow-sm:     0 2px 4px rgba(0,0,0,0.02);
        --shadow-md:     0 4px 12px rgba(58,59,69,0.06);
        --shadow-lg:     0 8px 24px rgba(58,59,69,0.1);
    }

    .content-wrapper {
        background-color: var(--bg) !important;
    }

    /* ── Section Wrapper ── */
    .section-wrapper {
        margin-bottom: 24px;
    }

    .section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
        flex-wrap: wrap;
        gap: 12px;
    }

    .section-title {
        font-size: 15px;
        font-weight: 700;
        color: var(--text);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .section-title i {
        color: var(--primary);
        font-size: 14px;
    }

    .section-subtitle {
        font-size: 13px;
        color: var(--text-muted);
        margin-top: 4px;
        font-weight: 500;
    }

    /* ── Table Card Premium ── */
    .table-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        margin-bottom: 24px;
        transition: box-shadow 0.2s ease;
    }

    .table-card:hover {
        box-shadow: var(--shadow-md);
    }

    .table-card-header {
        padding: 18px 24px;
        border-bottom: 1px solid var(--border);
        background-color: var(--bg);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .table-card-title {
        font-size: 15px;
        font-weight: 700;
        color: var(--text);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .table-card-title i {
        color: var(--primary);
        font-size: 14px;
    }

    .table-card-badge {
        font-size: 12px;
        font-weight: 600;
        color: var(--text-muted);
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 5px 13px;
    }

    .table-card-body {
        padding: 0;
    }

    /* ── Table Premium ── */
    .table-premium {
        width: 100%;
        border-collapse: collapse;
    }

    .table-premium thead th {
        background: var(--bg);
        padding: 13px 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: var(--text-muted);
        border-bottom: 2px solid var(--border);
        white-space: nowrap;
        text-align: left;
    }

    .table-premium thead th.text-center {
        text-align: center;
    }

    .table-premium tbody td {
        padding: 15px 20px;
        font-size: 14px;
        font-weight: 500;
        color: var(--text);
        border-bottom: 1px solid var(--border);
        vertical-align: middle;
        transition: background 0.15s ease;
    }

    .table-premium tbody td.text-center {
        text-align: center;
    }

    .table-premium tbody tr:last-child td {
        border-bottom: none;
    }

    .table-premium tbody tr:hover td {
        background: #f8fafc;
    }

    .table-premium .monospace {
        font-family: 'JetBrains Mono', monospace;
        font-size: 13px;
        font-weight: 600;
        color: #334155;
    }

    .text-success { color: var(--success) !important; }
    .text-danger { color: var(--danger) !important; }
    .text-muted { color: var(--text-muted) !important; }

    /* ── Badges Premium ── */
    .badge-premium {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 11px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.02em;
        white-space: nowrap;
    }

    .badge-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .badge-success {
        background: var(--success-soft);
        color: var(--success);
    }
    .badge-success .badge-dot { background: var(--success); }

    .badge-danger {
        background: var(--danger-soft);
        color: var(--danger);
    }
    .badge-danger .badge-dot { background: var(--danger); }

    .badge-warning {
        background: var(--warning-soft);
        color: var(--warning);
    }
    .badge-warning .badge-dot { background: var(--warning); }

    .badge-info {
        background: var(--info-soft);
        color: var(--info);
    }
    .badge-info .badge-dot { background: var(--info); }

    .badge-secondary {
        background: var(--bg);
        color: var(--text-muted);
    }
    .badge-secondary .badge-dot { background: var(--text-hint); }

    .badge-status-publish {
        background: var(--success-soft);
        color: var(--success);
    }
    .badge-status-publish .badge-dot { background: var(--success); }

    .badge-status-draft {
        background: var(--bg);
        color: var(--text-muted);
    }
    .badge-status-draft .badge-dot { background: var(--text-hint); }

    .badge-status-aktif {
        background: var(--primary-soft);
        color: var(--primary-text);
    }
    .badge-status-aktif .badge-dot { background: var(--primary); }

    .badge-status-nonaktif {
        background: var(--bg);
        color: var(--text-muted);
    }
    .badge-status-nonaktif .badge-dot { background: var(--text-hint); }

    /* ── Action Button (View Bukti) ── */
    .btn-view-bukti {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 14px;
        border-radius: 20px;
        background: var(--primary);
        color: #ffffff;
        border: none;
        text-decoration: none;
        transition: all 0.18s ease;
        cursor: pointer;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.02em;
        white-space: nowrap;
        box-shadow: 0 3px 8px rgba(78, 115, 223, 0.2);
    }

    .btn-view-bukti:hover {
        background: #2e59d9;
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 5px 14px rgba(78, 115, 223, 0.3);
        text-decoration: none;
    }

    .btn-view-bukti:active {
        transform: translateY(0) scale(0.97);
    }

    /* ── Empty State ── */
    .empty-state {
        padding: 56px 24px;
        text-align: center;
        color: var(--text-muted);
    }

    .empty-state-icon {
        width: 64px;
        height: 64px;
        border-radius: 14px;
        background: var(--bg);
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
        font-size: 24px;
        color: var(--text-hint);
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.5);
    }

    .empty-state-text {
        font-size: 14px;
        font-weight: 500;
        color: var(--text);
    }

    /* ── Pagination Premium ── */
    .pagination-premium {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 20px;
        padding: 0 20px 20px;
        flex-wrap: wrap;
        gap: 12px;
    }

    .pagination-info {
        font-size: 13px;
        color: var(--text-muted);
        font-weight: 500;
    }

    .pagination-nav {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .pagination-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: var(--radius);
        background: var(--surface);
        border: 1.5px solid var(--border);
        color: var(--text-muted);
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.15s ease;
        cursor: pointer;
    }

    .pagination-btn:hover:not(.disabled) {
        background: var(--primary-soft);
        border-color: var(--primary);
        color: var(--primary);
        transform: translateY(-1px);
    }

    .pagination-btn.disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .pagination-btn i {
        font-size: 12px;
    }

    /* ── Responsive ── */
    @media (max-width: 768px) {
        .section-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .table-premium thead {
            display: none;
        }

        .table-premium tbody tr {
            display: block;
            margin-bottom: 12px;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 8px;
        }

        .table-premium tbody td {
            display: flex;
            justify-content: space-between;
            padding: 10px 12px;
            border-bottom: 1px solid var(--border);
            text-align: right;
        }

        .table-premium tbody td::before {
            content: attr(data-label);
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.05em;
            text-align: left;
        }

        .table-premium tbody td:last-child {
            border-bottom: none;
        }

        .pagination-premium {
            flex-direction: column;
            align-items: stretch;
            text-align: center;
        }

        .pagination-nav {
            justify-content: center;
        }
    }

    /* ── Accessibility ── */
    .btn-view-bukti:focus-visible,
    .pagination-btn:focus-visible {
        outline: 2px solid var(--primary);
        outline-offset: 2px;
    }
</style>
@endsection

@section('content')

{{-- ══════════════════════════════
     SECTION 1: Detail Daftar Ulang
══════════════════════════════ --}}
<div class="section-wrapper">
    <div class="section-header">
        <div>
            <h2 class="section-title">
                <i class="fas fa-file-invoice-dollar"></i>
                Detail Daftar Ulang Mahasiswa
            </h2>
            <p class="section-subtitle">Pantau status dan informasi tagihan daftar ulang Anda</p>
        </div>
    </div>

    <div class="table-card">
        <div class="table-card-header">
            <h3 class="table-card-title">
                <i class="fas fa-list"></i>
                Riwayat Transaksi
            </h3>
            <span class="table-card-badge">{{ $dataTransaksi->count() }} data</span>
        </div>

        <div class="table-card-body">
            <div class="table-responsive">
                <table class="table-premium">
                    <thead>
                        <tr>
                            <th class="text-center" width="4%">No</th>
                            <th width="11%">No Tagihan</th>
                            <th width="10%">Tanggal Terbit</th>
                            <th width="10%">Jatuh Tempo</th>
                            <th width="18%">Semester</th>
                            <th width="12%" class="text-end">Total</th>
                            <th width="10%">Bank Tujuan</th>
                            <th width="10%">Status</th>
                            <th width="10%">Keterangan</th>
                            <th class="text-center" width="7%">Bukti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataTransaksi as $data)
                        <tr>
                            <td class="text-center" data-label="No">{{ $data['no'] }}</td>

                            <td class="monospace" data-label="No Tagihan">
                                {{ $data['no_tagihan'] }}
                            </td>

                            <td data-label="Tanggal Terbit">
                                {{ $data['tanggal_terbit'] }}
                            </td>

                            <td data-label="Jatuh Tempo">
                                {{ $data['jatuh_tempo'] }}
                            </td>

                            <td data-label="Semester">
                                {{ $data['semester'] }}
                            </td>

                            <td class="text-end monospace" data-label="Total">
                                {{ $data['total'] }}
                            </td>

                            <td class="text-uppercase" data-label="Bank Tujuan">
                                {{ $data['bank'] }}
                            </td>

                            <td data-label="Status">
                                @if($data['status_tagihan'] === 'publish')
                                    <span class="badge-premium badge-status-publish">
                                        <span class="badge-dot"></span>
                                        Publish
                                    </span>
                                @else
                                    <span class="badge-premium badge-status-draft">
                                        <span class="badge-dot"></span>
                                        {{ ucfirst($data['status_tagihan']) }}
                                    </span>
                                @endif
                            </td>

                            <td data-label="Keterangan">
                                {{ $data['keterangan'] ?: '-' }}
                            </td>

                            <td class="text-center" data-label="Bukti">
                                @if($data['bukti'] !== '-' && $data['bukti'] !== null)
                                    <a href="{{ asset('storage/' . $data['bukti']) }}"
                                       class="btn-view-bukti"
                                       title="Lihat Bukti"
                                       target="_blank">
                                        Bukti
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11">
                                <div class="empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-inbox"></i>
                                    </div>
                                    <div class="empty-state-text">Data tidak tersedia</div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="pagination-premium">
                <div class="pagination-info">
                    Menampilkan <strong>{{ $dataTransaksi->count() }}</strong> data
                </div>
                <nav class="pagination-nav" aria-label="Page navigation">
                    <a href="#" class="pagination-btn disabled" aria-disabled="true">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a href="#" class="pagination-btn">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════
     SECTION 2: Riwayat Daftar Ulang
══════════════════════════════ --}}
<div class="section-wrapper">
    <div class="section-header">
        <div>
            <h2 class="section-title">
                <i class="fas fa-clipboard-check"></i>
                Riwayat Daftar Ulang Mahasiswa
            </h2>
            <p class="section-subtitle">Catatan status pendaftaran ulang per semester</p>
        </div>
    </div>

    <div class="table-card">
        <div class="table-card-header">
            <h3 class="table-card-title">
                <i class="fas fa-history"></i>
                Log Aktivitas
            </h3>
        </div>

        <div class="table-card-body">
            <div class="table-responsive">
                <table class="table-premium">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No</th>
                            <th width="18%">Kelas</th>
                            <th width="22%">Semester</th>
                            <th width="13%">Daftar Ulang</th>
                            <th width="20%">Tanggal Daftar Ulang</th>
                            <th width="13%">Status</th>
                            <th class="text-center" width="9%">Urutan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataDaftarUlang as $item)
                        <tr>
                            <td class="text-center monospace" data-label="No">
                                {{ str_pad($item['no'], 2, '0', STR_PAD_LEFT) }}
                            </td>

                            <td data-label="Kelas">
                                {{ $item['kelas'] }}
                            </td>

                            <td data-label="Semester">
                                {{ $item['semester'] }}
                            </td>

                            <td data-label="Daftar Ulang">
                                <span class="badge-premium badge-success">
                                    <span class="badge-dot"></span>
                                    {{ $item['daftar_ulang'] }}
                                </span>
                            </td>

                            <td data-label="Tanggal Daftar Ulang">
                                {{ $item['tanggal_daftar_ulang'] }}
                            </td>

                            <td data-label="Status">
                                @if($item['status'] === 'aktif')
                                    <span class="badge-premium badge-status-aktif">
                                        <span class="badge-dot"></span>
                                        Aktif
                                    </span>
                                @else
                                    <span class="badge-premium badge-status-nonaktif">
                                        <span class="badge-dot"></span>
                                        {{ ucfirst($item['status']) }}
                                    </span>
                                @endif
                            </td>

                            <td class="monospace" data-label="Urutan Semester">
                                {{ $item['urutan_semester'] }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <div class="empty-state-text">Belum ada data daftar ulang</div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Confirm before opening bukti in new tab
    $('.btn-view-bukti').on('click', function(e) {
        console.log('Viewing bukti:', $(this).attr('href'));
    });
});
</script>
@endsection