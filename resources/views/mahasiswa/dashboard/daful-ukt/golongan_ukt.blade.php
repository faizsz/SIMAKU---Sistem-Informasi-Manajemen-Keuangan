@extends('layouts.app')

@section('title', 'Golongan UKT - SIMAKU')

@section('header', 'Golongan UKT')

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
    }

    .content-wrapper {
        background-color: var(--bg) !important;
        font-family: 'Plus Jakarta Sans', sans-serif !important;
    }

    /* ── Page Header ── */
    .page-description {
        font-size: 14px;
        color: var(--text-muted);
        margin-bottom: 24px;
        line-height: 1.6;
        max-width: 700px;
    }

    /* ── Table Card Premium ── */
    .table-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        margin-bottom: 24px;
    }

    .table-card-header {
        padding: 18px 24px;
        border-bottom: 1px solid var(--border);
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
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

    /* ── Matrix Table Premium ── */
    .table-matrix {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px; /* Prevent squish on small screens */
    }

    .table-matrix thead th {
        background: var(--bg);
        padding: 14px 16px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: var(--text-muted);
        border-bottom: 2px solid var(--border);
        white-space: nowrap;
        text-align: center;
        position: sticky;
        top: 0;
        z-index: 1;
    }

    /* Sticky first two columns (Jenjang & Prodi) */
    .table-matrix thead th:first-child,
    .table-matrix tbody td:first-child {
        position: sticky;
        left: 0;
        background: var(--surface);
        z-index: 2;
        border-right: 2px solid var(--border);
    }

    .table-matrix thead th:nth-child(2),
    .table-matrix tbody td:nth-child(2) {
        position: sticky;
        left: 90px; /* Adjust based on first column width */
        background: var(--surface);
        z-index: 2;
        border-right: 2px solid var(--border);
    }

    .table-matrix tbody td {
        padding: 14px 16px;
        font-size: 14px;
        font-weight: 500;
        color: var(--text);
        border-bottom: 1px solid var(--border);
        vertical-align: middle;
        transition: background 0.15s ease;
        text-align: center;
    }

    /* First two columns: left align */
    .table-matrix tbody td:first-child {
        font-weight: 700;
        color: var(--primary-text);
        text-align: center;
        background: var(--surface);
    }

    .table-matrix tbody td:nth-child(2) {
        font-weight: 600;
        text-align: left;
        background: var(--surface);
    }

    /* Money cells: monospace + right align */
    .table-matrix td.money {
        font-family: 'JetBrains Mono', monospace;
        font-size: 13px;
        font-weight: 600;
        color: #334155;
        text-align: right;
        white-space: nowrap;
    }

    .table-matrix tbody tr:hover td {
        background: #f8fafc;
    }

    .table-matrix tbody tr:hover td:first-child,
    .table-matrix tbody tr:hover td:nth-child(2) {
        background: #f8fafc;
    }

    /* ── Legend / Info Box ── */
    .table-legend {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 12px 24px;
        background: var(--bg);
        border-top: 1px solid var(--border);
        font-size: 12px;
        color: var(--text-muted);
        flex-wrap: wrap;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .legend-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--primary);
    }

    /* ── Pagination Premium ── */
    .pagination-premium {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 24px;
        border-top: 1px solid var(--border);
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
        border-radius: 9px;
        background: var(--surface);
        border: 1.5px solid var(--border);
        color: var(--text-muted);
        text-decoration: none;
        font-size: 12px;
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

    .pagination-btn.active {
        background: var(--primary);
        border-color: var(--primary);
        color: white;
    }

    .pagination-btn.disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .pagination-btn i {
        font-size: 11px;
    }

    .pagination-page {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 34px;
        height: 34px;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 600;
        color: var(--text);
        text-decoration: none;
        transition: all 0.15s;
    }

    .pagination-page:hover {
        background: var(--bg);
    }

    .pagination-page.active {
        background: var(--primary);
        color: white;
    }

    /* ── Responsive ── */
    @media (max-width: 768px) {
        .table-card-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .table-legend {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }

        .pagination-premium {
            flex-direction: column;
            align-items: stretch;
            text-align: center;
        }

        .pagination-nav {
            justify-content: center;
        }

        /* On mobile: hide some semester columns to prevent horizontal overflow */
        .table-matrix thead th:nth-child(7),
        .table-matrix tbody td:nth-child(7),
        .table-matrix thead th:nth-child(8),
        .table-matrix tbody td:nth-child(8),
        .table-matrix thead th:nth-child(9),
        .table-matrix tbody td:nth-child(9) {
            display: none;
        }
    }

    /* ── Accessibility ── */
    .pagination-btn:focus-visible,
    .pagination-page:focus-visible {
        outline: 2px solid var(--primary);
        outline-offset: 2px;
    }
</style>
@endsection

@section('content')

{{-- Page Description --}}
<p class="page-description">
    Berikut adalah referensi golongan Uang Kuliah Tunggal (UKT) per program studi dan semester.
    Nominal dapat berubah sesuai kebijakan universitas.
</p>

{{-- Table Card --}}
<div class="table-card">
    <div class="table-card-header">
        <h2 class="table-card-title">
            <i class="fas fa-table"></i>
            Daftar Golongan UKT per Semester
        </h2>
        <span class="table-card-badge">10 Program Studi</span>
    </div>

    <div class="table-card-body">
        <div class="table-responsive">
            <table class="table-matrix">
                <thead>
                    <tr>
                        <th width="10%">Jenjang</th>
                        <th width="20%">Program Studi</th>
                        <th width="10%">I</th>
                        <th width="10%">II</th>
                        <th width="10%">III</th>
                        <th width="10%">IV</th>
                        <th width="10%">V</th>
                        <th width="10%">VI</th>
                        <th width="10%">VII</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $prodis = [
                            ['nama' => 'Farmasi'],
                            ['nama' => 'Ilmu Hukum'],
                            ['nama' => 'Sastra Indonesia'],
                            ['nama' => 'Informatika'],
                            ['nama' => 'Ilmu Komunikasi'],
                            ['nama' => 'Psikologi'],
                            ['nama' => 'Agroteknologi'],
                            ['nama' => 'Akuntansi'],
                            ['nama' => 'Manajemen'],
                            ['nama' => 'Teknik Mesin'],
                        ];
                        // Sample UKT amounts per semester (I-VII)
                        $ukts = [500000, 1000000, 2600000, 3500000, 4400000, 5200000, 6100000];
                    @endphp

                    @foreach($prodis as $prodi)
                    <tr>
                        <td>S1</td>
                        <td>{{ $prodi['nama'] }}</td>
                        @foreach($ukts as $ukt)
                            <td class="money">Rp{{ number_format($ukt, 0, ',', '.') }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Legend --}}
        <div class="table-legend">
            <div class="legend-item">
                <span class="legend-dot"></span>
                <span>Angka dalam Rupiah (Rp)</span>
            </div>
            <div class="legend-item">
                <i class="fas fa-info-circle" style="font-size:12px;color:var(--text-hint)"></i>
                <span>UKT dapat berbeda berdasarkan kemampuan ekonomi mahasiswa</span>
            </div>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="pagination-premium">
        <div class="pagination-info">
            Menampilkan <strong>1-10</strong> dari <strong>10</strong> data
        </div>
        <nav class="pagination-nav" aria-label="Page navigation">
            <a href="#" class="pagination-btn disabled" aria-disabled="true">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a href="#" class="pagination-page active">1</a>
            <a href="#" class="pagination-btn disabled" aria-disabled="true">
                <i class="fas fa-chevron-right"></i>
            </a>
        </nav>
    </div>
</div>

@endsection