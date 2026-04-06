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

    /* ── 🔥 Page Header dengan Button ── */
    .page-header-wrapper {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .page-meta {
        flex: 1;
        font-size: 14px;
        color: var(--text-muted);
        line-height: 1.6;
        min-width: 0; /* Prevent flex item overflow */
    }

    .page-header-actions {
        flex-shrink: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .link-golongan {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 600;
        color: var(--primary-text);
        text-decoration: none;
        padding: 10px 18px;
        border-radius: 12px;
        border: 1.5px solid #c7d2fe;
        background: linear-gradient(135deg, #e0e7ff 0%, #f5f3ff 100%);
        transition: all 0.2s ease;
        box-shadow: 0 2px 6px rgba(67, 56, 202, 0.1);
    }

    .link-golongan:hover {
        background: linear-gradient(135deg, #c7d2fe 0%, #e0e7ff 100%);
        border-color: var(--primary);
        color: var(--primary);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(67, 56, 202, 0.2);
    }

    .link-golongan:active {
        transform: translateY(0);
    }

    .link-golongan i {
        font-size: 16px;
        color: var(--primary);
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

    /* 🔥 Interactive row */
    .table-premium tbody tr {
        cursor: pointer;
        transition: all 0.15s ease;
        position: relative;
    }

    .table-premium tbody tr:hover {
        background: #f8fafc !important;
        transform: translateX(3px);
        border-left: 3px solid var(--primary);
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

    /* ── Action Button ── */
    .btn-row-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 9px 18px;
        height: auto;
        min-height: 38px;
        border-radius: 20px;
        background: var(--primary);
        color: #ffffff;
        border: none;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.02em;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 3px 10px rgba(67, 56, 202, 0.25);
        white-space: nowrap;
        position: relative;
        z-index: 2;
        pointer-events: auto;
    }

    .btn-row-action:hover {
        background: var(--primary-text);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(67, 56, 202, 0.35);
    }

    .btn-row-action:active {
        transform: translateY(0) scale(0.97);
        transition: none;
    }

    .btn-row-action i {
        font-size: 14px;
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
        .page-header-wrapper {
            flex-direction: column;
            align-items: stretch;
        }

        .page-header-actions {
            justify-content: flex-start;
        }

        .table-premium th:nth-child(3),
        .table-premium td:nth-child(3),
        .table-premium th:nth-child(6),
        .table-premium td:nth-child(6) { display: none; }

        .stats-grid { grid-template-columns: 1fr; }

        .btn-row-action {
            padding: 8px 14px;
            font-size: 12px;
        }
    }

    /* ── Accessibility ─ */
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

{{-- 🔥 Page Header dengan Button di Kanan --}}
<div class="page-header-wrapper">
    <p class="page-meta">
        Kelola dan pantau pembayaran Uang Kuliah Tunggal (UKT) Anda.<br class="d-none d-md-inline">
        Klik pada baris atau tombol detail untuk melihat informasi lengkap.
    </p>
    <div class="page-header-actions">
        <a href="{{ route('golongan-ukt') }}" class="link-golongan">
            <i class="fas fa-layer-group"></i>
            Golongan UKT
        </a>
    </div>
</div>

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
        </div>
    </div>

    <div class="table-responsive">
        <table class="table-premium">
            <thead>
                <tr>
                    <th class="text-center" width="4%">No</th>
                    <th width="14%">No. Invoice</th>
                    <th width="17%">Semester</th>
                    <th width="16%">Tagihan</th>
                    <th width="16%">Terbayar</th>
                    <th width="11%">Jenis</th>
                    <th width="12%">Status</th>
                    <th width="14%" class="text-center">Aksi</th>
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
                    <tr onclick="window.location.href='{{ $detailUrl }}'">
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
                            <a href="{{ $detailUrl }}"
                               class="btn-row-action"
                               title="Lihat Detail Tagihan"
                               onclick="event.stopPropagation();">
                                <i class="fas fa-eye"></i>
                                <span>Detail</span>
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
@endsection