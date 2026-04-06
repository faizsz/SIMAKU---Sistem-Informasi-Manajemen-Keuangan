@extends('layouts.app')

@section('title', 'Daftar Ulang UKT - SIMAKU')

@section('header', 'Daftar Ulang')

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap');

    :root {
        --primary:       #4338ca;
        --primary-soft:  #e0e7ff;
        --primary-text:  #3730a3;
        --success:       #059669;
        --success-soft:  #d1fae5;
        --danger:        #e11d48;
        --danger-soft:   #ffe4e6;
        --warning:       #d97706;
        --warning-soft:  #fef3c7;
        --info:          #0284c7;
        --info-soft:     #e0f2fe;
        --surface:       #ffffff;
        --bg:            #f1f5f9;
        --text:          #0f172a;
        --text-muted:    #64748b;
        --text-hint:     #94a3b8;
        --border:        #e2e8f0;
        --radius:        12px;
        --radius-lg:     16px;
        --shadow-sm:     0 1px 2px rgba(0,0,0,0.04);
        --shadow-md:     0 4px 12px rgba(0,0,0,0.08);
        --shadow-lg:     0 8px 24px rgba(0,0,0,0.12);
    }

    .content-wrapper {
        background-color: var(--bg) !important;
        font-family: 'Plus Jakarta Sans', sans-serif !important;
    }

    /* ── Section Wrapper ── */
    .section-wrapper {
        margin-bottom: 28px;
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
        font-size: 16px;
        font-weight: 700;
        color: var(--text);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .section-title i {
        color: var(--primary);
        font-size: 15px;
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
    }

    .table-card-header {
        padding: 18px 24px;
        border-bottom: 1px solid var(--border);
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
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
        background: var(--bg);
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
        padding: 14px 20px;
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
        padding: 16px 20px;
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
        padding: 6px 13px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.02em;
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
        color: var(--primary);
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
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: var(--primary-soft);
        color: var(--primary);
        border: none;
        text-decoration: none;
        transition: all 0.2s ease;
        cursor: pointer;
        font-size: 13px;
    }

    .btn-view-bukti:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(67, 56, 202, 0.25);
    }

    .btn-view-bukti:active {
        transform: translateY(0) scale(0.96);
    }

    .btn-view-bukti i {
        font-size: 14px;
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
        border-radius: 16px;
        background: var(--bg);
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
        font-size: 24px;
        color: var(--text-hint);
    }

    .empty-state-text {
        font-size: 14px;
        font-weight: 500;
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
        width: 36px;
        height: 36px;
        border-radius: 10px;
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
            margin-bottom: 16px;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 12px;
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
                            <th class="text-center" width="5%">No</th>
                            <th width="12%">No Tagihan</th>
                            <th width="12%">Tanggal Terbit</th>
                            <th width="12%">Jatuh Tempo</th>
                            <th width="10%">Semester</th>
                            <th width="12%" class="text-end">Total</th>
                            <th width="12%">Bank Tujuan</th>
                            <th width="10%">Status</th>
                            <th width="10%">Keterangan</th>
                            <th class="text-center" width="8%">Bukti</th>
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
                                        <i class="fas fa-eye"></i>
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
                            <th width="12%">Kelas</th>
                            <th width="12%">Semester</th>
                            <th width="15%">Daftar Ulang</th>
                            <th width="18%">Tanggal Daftar Ulang</th>
                            <th width="12%">Status</th>
                            <th width="12%">Urutan Semester</th>
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
    // Smooth hover effect for action buttons
    $('.btn-view-bukti').on('mouseenter', function() {
        $(this).css('transform', 'translateY(-2px)');
    }).on('mouseleave', function() {
        $(this).css('transform', 'translateY(0)');
    });

    // Confirm before opening bukti in new tab (optional UX)
    $('.btn-view-bukti').on('click', function(e) {
        // Biarkan default behavior (open in new tab), cuma buat logging/analytics kalau perlu
        console.log('Viewing bukti:', $(this).attr('href'));
    });
});
</script>
@endsection