@extends('layouts.app')

@section('title', 'Tagihan UKT - SIMAKU')

@section('header', 'Informasi Tagihan UKT')

@section('header_button')
<a href="{{ route('golongan-ukt') }}" class="btn-premium">
    <i class="fas fa-sliders-h"></i><span>Lihat Golongan UKT</span>
</a>
@endsection

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap');

    /* CSS Reset & Variables */
    :root {
        --color-primary: #4338ca;
        --color-primary-soft: #e0e7ff;
        --color-success: #059669;
        --color-success-soft: #d1fae5;
        --color-danger: #e11d48;
        --color-danger-soft: #ffe4e6;
        --color-warning: #d97706;
        --color-warning-soft: #fef3c7;
        --color-surface: #ffffff;
        --color-bg: #f8fafc;
        --color-text: #0f172a;
        --color-text-muted: #64748b;
        --color-border: #e2e8f0;
        
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.04);
        --shadow-glow: 0 0 20px rgba(67, 56, 202, 0.15);
        
        --radius-md: 12px;
        --radius-lg: 20px;
        --radius-full: 9999px;
    }

    /* Page Override to hide AdminLTE default background */
    .content-wrapper {
        background-color: var(--color-bg) !important;
        font-family: 'Plus Jakarta Sans', sans-serif !important;
    }
    
    .header-subtitle {
        font-size: 0.95rem;
        color: var(--color-text-muted);
        margin-top: -5px;
        margin-bottom: 2rem;
        animation: fadeUp 0.6s ease-out 0.1s both;
    }

    /* Premium Button */
    .btn-premium {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%);
        color: white !important;
        padding: 10px 22px;
        border-radius: var(--radius-full);
        font-weight: 600;
        font-size: 0.9rem;
        text-decoration: none;
        box-shadow: var(--shadow-md);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(255,255,255,0.1);
        animation: fadeUp 0.6s ease-out 0.1s both;
    }
    .btn-premium:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-glow);
    }

    /* Layout & Animations */
    @keyframes fadeUp {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    
    .stagger-1 { animation: fadeUp 0.6s ease-out 0.1s both; }
    .stagger-2 { animation: fadeUp 0.6s ease-out 0.2s both; }
    .stagger-3 { animation: fadeUp 0.6s ease-out 0.3s both; }
    .stagger-4 { animation: fadeUp 0.6s ease-out 0.4s both; }

    /* Stat Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 2rem;
    }
    
    .stat-card-premium {
        background: var(--color-surface);
        border-radius: var(--radius-lg);
        padding: 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(255,255,255,0.8);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .stat-card-premium::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        backdrop-filter: blur(10px);
        z-index: 0;
        border-radius: var(--radius-lg);
    }

    .stat-card-premium::after {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 4px;
        z-index: 1;
    }
    
    .stat-card-premium:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }

    .stat-info {
        display: flex;
        flex-direction: column;
        gap: 8px;
        z-index: 2;
    }
    
    .stat-label {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--color-text-muted);
    }
    
    .stat-value {
        font-family: 'JetBrains Mono', monospace;
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--color-text);
        line-height: 1.2;
        letter-spacing: -0.02em;
    }

    .stat-icon-wrapper {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        z-index: 2;
        transition: transform 0.3s ease;
    }
    
    .stat-card-premium:hover .stat-icon-wrapper {
        transform: scale(1.1) rotate(-5deg);
    }

    /* Card Variants */
    .card-total { background: linear-gradient(145deg, #ffffff, #f1f5f9); }
    .card-total::after { background: var(--color-primary); }
    .card-total .stat-value { color: var(--color-primary); }
    .card-total .stat-icon-wrapper { background: var(--color-primary-soft); color: var(--color-primary); }

    .card-unpaid { background: linear-gradient(145deg, #ffffff, #fff1f2); }
    .card-unpaid::after { background: var(--color-danger); }
    .card-unpaid .stat-value { color: var(--color-danger); }
    .card-unpaid .stat-icon-wrapper { background: var(--color-danger-soft); color: var(--color-danger); }

    .card-paid { background: linear-gradient(145deg, #ffffff, #ecfdf5); }
    .card-paid::after { background: var(--color-success); }
    .card-paid .stat-value { color: var(--color-success); }
    .card-paid .stat-icon-wrapper { background: var(--color-success-soft); color: var(--color-success); }

    /* Table Section */
    .table-card {
        background: var(--color-surface);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md);
        border: 1px solid var(--color-border);
        overflow: hidden;
    }

    .table-header {
        padding: 24px;
        border-bottom: 1px solid var(--color-border);
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #ffffff;
    }

    .table-title {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--color-text);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .badge-count {
        background: var(--color-bg);
        color: var(--color-text-muted);
        padding: 6px 14px;
        border-radius: var(--radius-full);
        font-size: 0.8rem;
        font-weight: 600;
        border: 1px solid var(--color-border);
    }

    /* The Table */
    .table-premium {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        text-align: left;
    }

    .table-premium th {
        background: #fdfdfe;
        padding: 16px 24px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--color-text-muted);
        border-bottom: 1px solid var(--color-border);
        white-space: nowrap;
    }

    .table-premium td {
        padding: 18px 24px;
        font-size: 0.95rem;
        color: var(--color-text);
        border-bottom: 1px solid var(--color-border);
        vertical-align: middle;
        background: #ffffff;
        transition: background-color 0.2s ease;
    }

    .table-premium tbody tr:last-child td {
        border-bottom: none;
    }

    .table-premium tbody tr:hover td {
        background: #f8fafc;
    }

    .td-number {
        font-weight: 600;
        color: var(--color-text-muted);
    }

    .td-invoice {
        font-family: 'JetBrains Mono', monospace;
        font-weight: 600;
        letter-spacing: 0.02em;
        color: #334155;
    }

    .td-amount {
        font-family: 'JetBrains Mono', monospace;
        font-weight: 600;
        color: var(--color-text);
    }
    
    .td-amount-paid {
        color: var(--color-success);
    }

    /* Badges */
    .badge-premium {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        border-radius: var(--radius-full);
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.02em;
        text-transform: uppercase;
    }

    .badge-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
    }

    .badge-success { background: var(--color-success-soft); color: var(--color-success); }
    .badge-success .badge-dot { background: var(--color-success); box-shadow: 0 0 8px var(--color-success); }

    .badge-danger { background: var(--color-danger-soft); color: var(--color-danger); }
    .badge-danger .badge-dot { background: var(--color-danger); box-shadow: 0 0 8px var(--color-danger); }

    .badge-warning { background: var(--color-warning-soft); color: var(--color-warning); }
    .badge-warning .badge-dot { background: var(--color-warning); box-shadow: 0 0 8px var(--color-warning); }

    .badge-type {
        background: var(--color-primary-soft);
        color: var(--color-primary);
    }

    /* Actions */
    .btn-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: #f1f5f9;
        color: var(--color-text-muted);
        text-decoration: none;
        transition: all 0.2s ease;
        border: 1px solid transparent;
    }

    .btn-action:hover {
        background: #ffffff;
        color: var(--color-primary);
        border-color: var(--color-border);
        box-shadow: var(--shadow-sm);
        transform: translateY(-2px);
    }

    /* Empty State */
    .empty-state {
        padding: 60px 24px;
        text-align: center;
        color: var(--color-text-muted);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 16px;
    }

    .empty-state-icon {
        font-size: 48px;
        color: #cbd5e1;
        margin-bottom: 8px;
    }
    
    .empty-state h4 {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--color-text);
        margin: 0;
    }
    .empty-state p {
        font-size: 0.9rem;
        margin: 0;
        max-width: 300px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .table-premium th:nth-child(3),
        .table-premium td:nth-child(3),
        .table-premium th:nth-child(5),
        .table-premium td:nth-child(5),
        .table-premium th:nth-child(6),
        .table-premium td:nth-child(6) {
            display: none;
        }
    }
</style>
@endsection

@section('content')
@php
    $totalSemuaTagihan  = collect($dataTagihan)->sum('nominal_tagihan');
    $totalSudahTerbayar = collect($dataTagihan)->sum('total_terbayar');
    $totalBelumTerbayar = $totalSemuaTagihan - $totalSudahTerbayar;
@endphp

<p class="header-subtitle">Kelola dan pantau pembayaran Uang Kuliah Tunggal (UKT) Anda dengan mudah.</p>

<!-- Stat Cards -->
<div class="stats-grid">
    <!-- Semua Tagihan -->
    <div class="stat-card-premium card-total stagger-1">
        <div class="stat-info">
            <span class="stat-label">Total Tagihan</span>
            <span class="stat-value">Rp {{ number_format($totalSemuaTagihan, 0, ',', '.') }}</span>
        </div>
        <div class="stat-icon-wrapper">
            <i class="fas fa-wallet"></i>
        </div>
    </div>

    <!-- Belum Terbayar -->
    <div class="stat-card-premium card-unpaid stagger-2">
        <div class="stat-info">
            <span class="stat-label">Belum Dibayar</span>
            <span class="stat-value">Rp {{ number_format($totalBelumTerbayar, 0, ',', '.') }}</span>
        </div>
        <div class="stat-icon-wrapper">
            <i class="fas fa-exclamation-circle"></i>
        </div>
    </div>

    <!-- Sudah Terbayar -->
    <div class="stat-card-premium card-paid stagger-3">
        <div class="stat-info">
            <span class="stat-label">Sudah Dibayar</span>
            <span class="stat-value">Rp {{ number_format($totalSudahTerbayar, 0, ',', '.') }}</span>
        </div>
        <div class="stat-icon-wrapper">
            <i class="fas fa-check-circle"></i>
        </div>
    </div>
</div>

<!-- Table Card -->
<div class="table-card stagger-4 mb-5">
    <div class="table-header">
        <h5 class="table-title">
            <i class="fas fa-file-invoice" style="color: var(--color-primary);"></i>
            Riwayat Tagihan
        </h5>
        <span class="badge-count">{{ count($dataTagihan) }} Invoice</span>
    </div>

    <div class="table-responsive">
        <table class="table-premium">
            <thead>
                <tr>
                    <th class="text-center" width="5%">No</th>
                    <th width="15%">No. Invoice</th>
                    <th width="15%">Semester</th>
                    <th width="20%">Tagihan</th>
                    <th width="20%">Terbayar</th>
                    <th width="10%">Jenis</th>
                    <th width="10%">Status</th>
                    <th class="text-center" width="5%">Aksi</th>
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
                        <td class="text-center td-number">{{ $index + 1 }}</td>
                        
                        <td class="td-invoice">
                            #INV-{{ str_pad($item['id_ukt_semester'], 5, '0', STR_PAD_LEFT) }}
                        </td>
                        
                        <td>
                            <span style="font-weight: 500;">{{ $item['periode'] }}</span>
                        </td>
                        
                        <td class="td-amount">
                            Rp {{ number_format($total_tagihan, 0, ',', '.') }}
                        </td>
                        
                        <td class="td-amount td-amount-paid">
                            Rp {{ number_format($total_terbayar, 0, ',', '.') }}
                        </td>
                        
                        <td>
                            <span class="badge-premium badge-type">
                                {{ $item['jenis'] }}
                            </span>
                        </td>
                        
                        <td>
                            <span class="badge-premium {{ $badgeClass }}">
                                <span class="badge-dot"></span>
                                {{ $statusText }}
                            </span>
                        </td>
                        
                        <td class="text-center">
                            <a href="{{ route('mahasiswa-dashboard.show', ['id' => $item['id_ukt_semester']]) }}" 
                                class="btn-action" 
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
                                <h4>Tidak Ada Tagihan</h4>
                                <p>Anda belum memiliki riwayat tagihan UKT pada saat ini.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection