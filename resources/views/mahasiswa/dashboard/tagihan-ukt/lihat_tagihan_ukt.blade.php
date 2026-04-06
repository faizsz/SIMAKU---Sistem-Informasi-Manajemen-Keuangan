@extends('layouts.app')

@section('title', 'Tagihan UKT - SIMAKU')

@section('header', 'Tagihan UKT')

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

    /* ── Page header area ── */
    .page-meta {
        font-size: 14px;
        color: var(--text-muted);
        margin-bottom: 24px;
        line-height: 1.5;
    }

    /* ── Stat Cards ── */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        margin-bottom: 24px;
    }

    @media (max-width: 900px) { .stats-grid { grid-template-columns: 1fr; } }

    .stat-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 22px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        transition: all 0.2s ease;
        cursor: default;
        box-shadow: var(--shadow-sm);
    }

    .stat-card:hover {
        box-shadow: var(--shadow-lg);
        transform: translateY(-3px);
        border-color: #c7d2fe;
    }

    .stat-card:active {
        transform: translateY(-1px);
        transition: none;
    }

    .stat-label {
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: var(--text-muted);
        margin-bottom: 8px;
    }

    .stat-value {
        font-family: 'JetBrains Mono', monospace;
        font-size: 26px;
        font-weight: 700;
        letter-spacing: -0.02em;
        line-height: 1.1;
    }

    .stat-sub {
        font-size: 13px;
        font-weight: 500;
        color: var(--text-hint);
        margin-top: 6px;
    }

    .stat-icon {
        width: 52px; height: 52px; flex-shrink: 0;
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 20px;
        transition: transform 0.25s ease;
    }

    .stat-card:hover .stat-icon {
        transform: scale(1.1) rotate(-3deg);
    }

    .stat-card.total  .stat-value { color: var(--primary); }
    .stat-card.total  .stat-icon  { background: var(--primary-soft); color: var(--primary); }

    .stat-card.unpaid .stat-value { color: var(--danger); }
    .stat-card.unpaid .stat-icon  { background: var(--danger-soft); color: var(--danger); }

    .stat-card.paid   .stat-value { color: var(--success); }
    .stat-card.paid   .stat-icon  { background: var(--success-soft); color: var(--success); }

    /* ── Table Card ── */
    .table-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        margin-bottom: 28px;
        box-shadow: var(--shadow-sm);
    }

    .table-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    }

    .table-card-title {
        font-size: 16px;
        font-weight: 700;
        color: var(--text);
        display: flex;
        align-items: center;
        gap: 9px;
        margin: 0;
    }

    .table-card-title i { color: var(--primary); font-size: 15px; }

    .table-header-actions {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .badge-count {
        font-size: 12px;
        font-weight: 600;
        color: var(--text-muted);
        background: var(--bg);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 6px 14px;
    }

    /* Link Golongan UKT */
    .link-golongan {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        color: var(--primary);
        text-decoration: none;
        padding: 8px 16px;
        border-radius: 9px;
        border: 1px solid var(--primary-soft);
        background: var(--primary-soft);
        transition: all 0.15s ease;
    }

    .link-golongan:hover {
        background: #c7d2fe;
        border-color: #a5b4fc;
        color: var(--primary-text);
        transform: translateY(-1px);
    }

    .link-golongan:active {
        transform: translateY(0);
    }

    .link-golongan i { font-size: 11px; }

    /* ── Table ── */
    .table-premium {
        width: 100%;
        border-collapse: collapse;
    }

    .table-premium thead th {
        background: var(--bg);
        padding: 14px 20px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: var(--text-muted);
        border-bottom: 2px solid var(--border);
        white-space: nowrap;
    }

    .table-premium tbody td {
        padding: 18px 20px;
        font-size: 15px;
        font-weight: 500;
        color: var(--text);
        border-bottom: 1px solid var(--border);
        vertical-align: middle;
        transition: background 0.15s ease;
    }

    .table-premium tbody tr:last-child td { border-bottom: none; }

    /* 🔥 Interactive row: clickable feel */
    .table-premium tbody tr {
        cursor: pointer;
        transition: all 0.15s ease;
        position: relative;
    }

    .table-premium tbody tr:hover {
        background: #f8fafc !important;
        transform: translateX(3px);
    }

    .table-premium tbody tr:hover::after {
        content: '›';
        position: absolute;
        right: 18px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
        color: var(--primary);
        font-weight: 300;
        opacity: 1;
        transition: all 0.15s;
        pointer-events: none;
    }

    .table-premium tbody tr::after {
        content: '›';
        position: absolute;
        right: 18px;
        top: 50%;
        transform: translateY(-50%) translateX(8px);
        font-size: 20px;
        color: var(--text-hint);
        opacity: 0;
        transition: all 0.15s;
        pointer-events: none;
        font-weight: 300;
    }

    /* Highlight border kiri saat hover */
    .table-premium tbody tr:hover {
        border-left: 3px solid var(--primary);
        margin-left: 0;
    }

    .td-no       { font-weight: 600; color: var(--text-hint); font-size: 14px; }
    .td-invoice  { font-family: 'JetBrains Mono', monospace; font-size: 14px; font-weight: 600; color: #334155; }
    .td-amount   { font-family: 'JetBrains Mono', monospace; font-weight: 700; }
    .td-paid     { color: var(--success); }

    /* ── Badges ── */
    .badge-pill {
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
        width: 6px; height: 6px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .badge-success { background: var(--success-soft); color: var(--success); }
    .badge-success .badge-dot { background: var(--success); }

    .badge-danger  { background: var(--danger-soft);  color: var(--danger); }
    .badge-danger  .badge-dot { background: var(--danger); }

    .badge-warning { background: var(--warning-soft); color: var(--warning); }
    .badge-warning .badge-dot { background: var(--warning); }

    .badge-type {
        background: var(--primary-soft);
        color: var(--primary-text);
    }

    /* ── Action button — 🔥 ENHANCED ── */
    .btn-row-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 42px; height: 42px;
        border-radius: 11px;
        background: var(--surface);
        color: var(--primary);
        border: 1.5px solid var(--primary-soft);
        text-decoration: none;
        transition: all 0.2s ease;
        font-size: 15px;
        cursor: pointer;
        box-shadow: var(--shadow-sm);
        position: relative;
        z-index: 2;
        pointer-events: auto;
    }

    .btn-row-action:hover {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(67, 56, 202, 0.3);
    }

    .btn-row-action:active {
        transform: scale(0.96) translateY(0);
        transition: none;
        box-shadow: 0 2px 8px rgba(67, 56, 202, 0.2);
    }

    /* Tooltip sederhana pakai CSS */
    .btn-row-action[data-tooltip]:hover::before {
        content: attr(data-tooltip);
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%) translateY(-6px);
        background: #1e293b;
        color: white;
        font-size: 11px;
        font-weight: 500;
        padding: 5px 10px;
        border-radius: 6px;
        white-space: nowrap;
        z-index: 10;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .btn-row-action[data-tooltip]:hover::after {
        content: '';
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%) translateY(1px);
        border: 5px solid transparent;
        border-top-color: #1e293b;
        z-index: 10;
    }

    /* ── Empty state ── */
    .empty-state {
        padding: 72px 24px;
        text-align: center;
        color: var(--text-muted);
    }

    .empty-state-icon {
        width: 72px; height: 72px;
        border-radius: 18px;
        background: var(--bg);
        border: 1px solid var(--border);
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 18px;
        font-size: 28px;
        color: var(--text-hint);
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.5);
    }

    .empty-state h5 {
        font-size: 16px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 8px;
    }

    .empty-state p {
        font-size: 14px;
        margin: 0;
        max-width: 300px;
        margin: 0 auto;
        line-height: 1.5;
    }

    /* ── Responsive ── */
    @media (max-width: 768px) {
        .table-premium th:nth-child(3),
        .table-premium td:nth-child(3),
        .table-premium th:nth-child(6),
        .table-premium td:nth-child(6) { display: none; }

        .stats-grid { grid-template-columns: 1fr; }

        .btn-row-action {
            width: 38px; height: 38px;
            font-size: 14px;
        }
    }

    /* ── Accessibility: Focus states ── */
    .btn-row-action:focus-visible,
    .link-golongan:focus-visible {
        outline: 2px solid var(--primary);
        outline-offset: 2px;
    }
</style>
@endsection

@section('content')
@php
    $totalSemuaTagihan  = collect($dataTagihan)->sum('nominal_tagihan');
    $totalSudahTerbayar = collect($dataTagihan)->sum('total_terbayar');
    $totalBelumTerbayar = $totalSemuaTagihan - $totalSudahTerbayar;
@endphp

{{-- Subtitle --}}
<p class="page-meta">Kelola dan pantau pembayaran Uang Kuliah Tunggal (UKT) Anda. <br class="d-none d-md-inline">Klik pada baris untuk melihat detail tagihan.</p>

{{-- ══ Stat Cards ══ --}}
<div class="stats-grid">

    <div class="stat-card total">
        <div>
            <div class="stat-label">Total Tagihan</div>
            <div class="stat-value">Rp {{ number_format($totalSemuaTagihan, 0, ',', '.') }}</div>
            <div class="stat-sub">Keseluruhan tagihan UKT</div>
        </div>
        <div class="stat-icon"><i class="fas fa-wallet"></i></div>
    </div>

    <div class="stat-card unpaid">
        <div>
            <div class="stat-label">Belum Dibayar</div>
            <div class="stat-value">Rp {{ number_format($totalBelumTerbayar, 0, ',', '.') }}</div>
            <div class="stat-sub">Sisa yang harus dilunasi</div>
        </div>
        <div class="stat-icon"><i class="fas fa-exclamation-circle"></i></div>
    </div>

    <div class="stat-card paid">
        <div>
            <div class="stat-label">Sudah Dibayar</div>
            <div class="stat-value">Rp {{ number_format($totalSudahTerbayar, 0, ',', '.') }}</div>
            <div class="stat-sub">Total yang telah terbayar</div>
        </div>
        <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
    </div>

</div>

{{-- ══ Table Card ══ --}}
<div class="table-card">
    <div class="table-card-header">
        <h5 class="table-card-title">
            <i class="fas fa-file-invoice"></i>
            Riwayat Tagihan
        </h5>
        <div class="table-header-actions">
            <span class="badge-count">{{ count($dataTagihan) }} invoice</span>
            <a href="{{ route('golongan-ukt') }}" class="link-golongan">
                <i class="fas fa-layer-group"></i>
                Golongan UKT
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table-premium">
            <thead>
                <tr>
                    <th class="text-center" width="4%">No</th>
                    <th width="14%">No. Invoice</th>
                    <th width="18%">Semester</th>
                    <th width="18%">Tagihan</th>
                    <th width="18%">Terbayar</th>
                    <th width="12%">Jenis</th>
                    <th width="10%">Status</th>
                    <th class="text-center" width="6%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dataTagihan as $index => $item)
                    @php
                        $total_tagihan  = $item['nominal_tagihan'] ?? 0;
                        $total_terbayar = $item['total_terbayar']  ?? 0;
                        $status_raw     = strtolower($item['status_raw'] ?? '');
                        $statusText     = $item['status'] ?? '-';
                        $detailUrl      = route('mahasiswa-dashboard.show', ['id' => $item['id_ukt_semester']]);

                        $badgeClass = match ($status_raw) {
                            'terbayar'    => 'badge-success',
                            'belum_bayar' => 'badge-danger',
                            'over'        => 'badge-warning',
                            'cancelled'   => 'badge-danger',
                            default       => 'badge-warning',
                        };
                    @endphp
                    {{-- 🔥 Row clickable: onclick redirect, tapi tombol aksi tetap prioritas --}}
                    <tr onclick="window.location.href='{{ $detailUrl }}'" style="cursor: pointer;">
                        <td class="text-center td-no">{{ $index + 1 }}</td>

                        <td class="td-invoice">
                            #INV-{{ str_pad($item['id_ukt_semester'], 5, '0', STR_PAD_LEFT) }}
                        </td>

                        <td style="font-weight:500;">{{ $item['periode'] }}</td>

                        <td class="td-amount">
                            Rp {{ number_format($total_tagihan, 0, ',', '.') }}
                        </td>

                        <td class="td-amount td-paid">
                            Rp {{ number_format($total_terbayar, 0, ',', '.') }}
                        </td>

                        <td>
                            <span class="badge-pill badge-type">{{ $item['jenis'] }}</span>
                        </td>

                        <td>
                            <span class="badge-pill {{ $badgeClass }}">
                                <span class="badge-dot"></span>
                                {{ $statusText }}
                            </span>
                        </td>

                        <td class="text-center">
                            {{-- 🔥 Tombol aksi: stopPropagation biar nggak double redirect --}}
                            <a href="{{ $detailUrl }}"
                               class="btn-row-action"
                               data-tooltip="Lihat Detail"
                               title="Lihat Detail Tagihan"
                               onclick="event.stopPropagation();">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">
                            <div class="empty-state">
                                <div class="empty-state-icon">
                                    <i class="fas fa-box-open"></i>
                                </div>
                                <h5>Tidak Ada Tagihan</h5>
                                <p>Anda belum memiliki riwayat tagihan UKT saat ini.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- 🔥 Optional: Simple JS untuk tooltip kalau mau lebih smooth --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Kalau mau tooltip Bootstrap, aktifin ini:
        // $('[data-toggle="tooltip"]').tooltip();

        // Efek ripple sederhana untuk tombol aksi (opsional)
        document.querySelectorAll('.btn-row-action').forEach(btn => {
            btn.addEventListener('click', function(e) {
                // Biarkan link bekerja normal, cuma buat feedback visual
                this.style.transform = 'scale(0.94)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 100);
            });
        });
    });
</script>
@endsection