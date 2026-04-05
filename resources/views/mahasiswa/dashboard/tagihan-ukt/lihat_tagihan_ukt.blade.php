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
    }

    .content-wrapper {
        background-color: var(--bg) !important;
        font-family: 'Plus Jakarta Sans', sans-serif !important;
    }

    /* ── Page header area ── */
    .page-meta {
        font-size: 13px;
        color: var(--text-muted);
        margin-bottom: 24px;
    }

    /* ── Stat Cards ── */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
        margin-bottom: 20px;
    }

    @media (max-width: 900px) { .stats-grid { grid-template-columns: 1fr; } }

    .stat-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 20px 22px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        transition: box-shadow 0.2s, transform 0.2s;
    }

    .stat-card:hover {
        box-shadow: 0 4px 16px rgba(0,0,0,0.07);
        transform: translateY(-2px);
    }

    .stat-label {
        font-size: 11.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.07em;
        color: var(--text-muted);
        margin-bottom: 7px;
    }

    .stat-value {
        font-family: 'JetBrains Mono', monospace;
        font-size: 24px;
        font-weight: 700;
        letter-spacing: -0.02em;
        line-height: 1;
    }

    .stat-sub {
        font-size: 12px;
        font-weight: 500;
        color: var(--text-hint);
        margin-top: 6px;
    }

    .stat-icon {
        width: 48px; height: 48px; flex-shrink: 0;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 18px;
        transition: transform 0.2s;
    }

    .stat-card:hover .stat-icon { transform: scale(1.08) rotate(-4deg); }

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
    }

    .table-card-header {
        padding: 18px 22px;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .table-card-title {
        font-size: 15px;
        font-weight: 700;
        color: var(--text);
        display: flex;
        align-items: center;
        gap: 8px;
        margin: 0;
    }

    .table-card-title i { color: var(--primary); font-size: 14px; }

    .table-header-actions {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .badge-count {
        font-size: 12px;
        font-weight: 600;
        color: var(--text-muted);
        background: var(--bg);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 5px 13px;
    }

    /* Link Golongan UKT — subtle, in-table-header */
    .link-golongan {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        color: var(--primary);
        text-decoration: none;
        padding: 7px 14px;
        border-radius: 8px;
        border: 1px solid var(--primary-soft);
        background: var(--primary-soft);
        transition: background 0.15s, border-color 0.15s;
    }

    .link-golongan:hover {
        background: #c7d2fe;
        border-color: #a5b4fc;
        color: var(--primary-text);
    }

    .link-golongan i { font-size: 11px; }

    /* ── Table ── */
    .table-premium {
        width: 100%;
        border-collapse: collapse;
    }

    .table-premium thead th {
        background: var(--bg);
        padding: 12px 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.07em;
        color: var(--text-muted);
        border-bottom: 1px solid var(--border);
        white-space: nowrap;
    }

    .table-premium tbody td {
        padding: 15px 20px;
        font-size: 14px;
        font-weight: 500;
        color: var(--text);
        border-bottom: 1px solid var(--border);
        vertical-align: middle;
        transition: background 0.15s;
    }

    .table-premium tbody tr:last-child td { border-bottom: none; }
    .table-premium tbody tr:hover td { background: #f8fafc; }

    .td-no       { font-weight: 600; color: var(--text-hint); font-size: 13px; }
    .td-invoice  { font-family: 'JetBrains Mono', monospace; font-size: 13px; font-weight: 600; color: #334155; }
    .td-amount   { font-family: 'JetBrains Mono', monospace; font-weight: 700; }
    .td-paid     { color: var(--success); }

    /* ── Badges ── */
    .badge-pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 11px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.02em;
    }

    .badge-dot {
        width: 5px; height: 5px;
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

    /* ── Action button ── */
    .btn-row-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px; height: 32px;
        border-radius: 8px;
        background: var(--bg);
        color: var(--text-muted);
        border: 1px solid var(--border);
        text-decoration: none;
        transition: all 0.15s;
        font-size: 12px;
    }

    .btn-row-action:hover {
        background: var(--primary-soft);
        color: var(--primary);
        border-color: #a5b4fc;
    }

    /* ── Empty state ── */
    .empty-state {
        padding: 64px 24px;
        text-align: center;
        color: var(--text-muted);
    }

    .empty-state-icon {
        width: 64px; height: 64px;
        border-radius: 16px;
        background: var(--bg);
        border: 1px solid var(--border);
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 16px;
        font-size: 24px;
        color: var(--text-hint);
    }

    .empty-state h5 {
        font-size: 15px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 6px;
    }

    .empty-state p {
        font-size: 13px;
        margin: 0;
        max-width: 280px;
        margin: 0 auto;
    }

    /* ── Responsive ── */
    @media (max-width: 768px) {
        .table-premium th:nth-child(3),
        .table-premium td:nth-child(3),
        .table-premium th:nth-child(6),
        .table-premium td:nth-child(6) { display: none; }
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
<p class="page-meta">Kelola dan pantau pembayaran Uang Kuliah Tunggal (UKT) Anda.</p>

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

                        $badgeClass = match ($status_raw) {
                            'terbayar'    => 'badge-success',
                            'belum_bayar' => 'badge-danger',
                            'over'        => 'badge-warning',
                            'cancelled'   => 'badge-danger',
                            default       => 'badge-warning',
                        };
                    @endphp
                    <tr>
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
                            <a href="{{ route('mahasiswa-dashboard.show', ['id' => $item['id_ukt_semester']]) }}"
                               class="btn-row-action"
                               title="Lihat Detail">
                                <i class="fas fa-arrow-right"></i>
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