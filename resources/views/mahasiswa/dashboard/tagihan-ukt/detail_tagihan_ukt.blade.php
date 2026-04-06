@extends('layouts.app')

@section('title', 'Lihat Tagihan UKT - SIMAKU')

@section('header', 'Detail Tagihan')

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

    /* ── Back Button ── */
    .back-button-wrapper {
        margin-bottom: 24px;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        background: var(--surface);
        color: var(--text-muted);
        border: 1.5px solid var(--border);
        border-radius: 10px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .btn-back:hover {
        background: var(--bg);
        border-color: var(--text-muted);
        color: var(--text);
        transform: translateX(-2px);
    }

    .btn-back i {
        font-size: 13px;
    }

    /* ── Detail Card ── */
    .detail-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        margin-bottom: 24px;
        box-shadow: var(--shadow-sm);
    }

    .detail-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid var(--border);
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    }

    .detail-card-title {
        font-size: 16px;
        font-weight: 700;
        color: var(--text);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .detail-card-title i {
        color: var(--primary);
        font-size: 15px;
    }

    .detail-card-body {
        padding: 24px;
    }

    /* ── Info Grid ── */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 24px;
    }

    @media (max-width: 768px) {
        .info-grid { grid-template-columns: 1fr; }
    }

    .info-item {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .info-label {
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--text-muted);
    }

    .info-value {
        font-size: 15px;
        font-weight: 600;
        color: var(--text);
    }

    .info-value.monospace {
        font-family: 'JetBrains Mono', monospace;
        font-size: 14px;
    }

    /* ── Badges ── */
    .badge-premium {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
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

    /* ── Action Buttons ── */
    .action-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid var(--border);
    }

    .btn-premium {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 20px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
        cursor: pointer;
        border: none;
        white-space: nowrap;
    }

    .btn-primary-premium {
        background: var(--primary);
        color: white;
        box-shadow: 0 3px 10px rgba(67, 56, 202, 0.25);
    }

    .btn-primary-premium:hover {
        background: var(--primary-text);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(67, 56, 202, 0.35);
    }

    .btn-success-premium {
        background: var(--success);
        color: white;
        box-shadow: 0 3px 10px rgba(5, 150, 105, 0.25);
    }

    .btn-success-premium:hover {
        background: #047857;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(5, 150, 105, 0.35);
    }

    .btn-premium:active {
        transform: translateY(0) scale(0.98);
    }

    /* ── Alerts ── */
    .alert-premium {
        padding: 14px 18px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 500;
        margin-top: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-premium i {
        font-size: 16px;
        flex-shrink: 0;
    }

    .alert-warning-premium {
        background: var(--warning-soft);
        color: var(--warning);
        border: 1px solid #fde68a;
    }

    .alert-info-premium {
        background: var(--info-soft);
        color: var(--info);
        border: 1px solid #bae6fd;
    }

    /* ── Table Premium ── */
    .table-premium {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table-premium thead th {
        background: var(--bg);
        padding: 14px 16px;
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
        padding: 16px;
        font-size: 14px;
        font-weight: 500;
        color: var(--text);
        border-bottom: 1px solid var(--border);
        vertical-align: middle;
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

    .text-success { color: var(--success) !important; }
    .text-danger { color: var(--danger) !important; }
    .text-muted { color: var(--text-muted) !important; }

    /* ── Upload Section ── */
    .upload-section {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
    }

    .upload-section-header {
        padding: 18px 24px;
        border-bottom: 1px solid var(--border);
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    }

    .upload-section-title {
        font-size: 15px;
        font-weight: 700;
        color: var(--text);
        margin: 0;
    }

    .upload-section-body {
        padding: 24px;
    }

    /* ── Button Group Actions (Edit/Delete) ── */
    .btn-group-sm {
        display: inline-flex;
        gap: 6px;
    }

    .btn-icon-sm {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        font-size: 12px;
        text-decoration: none;
        transition: all 0.15s ease;
        border: none;
        cursor: pointer;
    }

    .btn-icon-primary {
        background: var(--primary-soft);
        color: var(--primary);
    }

    .btn-icon-primary:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-1px);
    }

    .btn-icon-success {
        background: var(--success-soft);
        color: var(--success);
    }

    .btn-icon-success:hover {
        background: var(--success);
        color: white;
        transform: translateY(-1px);
    }

    .btn-icon-danger {
        background: var(--danger-soft);
        color: var(--danger);
    }

    .btn-icon-danger:hover {
        background: var(--danger);
        color: white;
        transform: translateY(-1px);
    }

    /* ── Empty State ── */
    .empty-state {
        padding: 48px 24px;
        text-align: center;
        color: var(--text-muted);
    }

    .empty-state-icon {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        background: var(--bg);
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 14px;
        font-size: 22px;
        color: var(--text-hint);
    }

    .empty-state-text {
        font-size: 14px;
        font-weight: 500;
    }

    /* ── Responsive ── */
    @media (max-width: 768px) {
        .action-buttons {
            flex-direction: column;
        }

        .btn-premium {
            width: 100%;
            justify-content: center;
        }

        .table-premium thead {
            display: none;
        }

        .table-premium tbody tr {
            display: block;
            margin-bottom: 16px;
            border: 1px solid var(--border);
            border-radius: 10px;
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
        }

        .table-premium tbody td:last-child {
            border-bottom: none;
        }
    }
</style>
@endsection

@section('content')
{{-- Back Button --}}
<div class="back-button-wrapper">
    <a href="/lihat-tagihan-ukt" class="btn-back">
        <i class="fas fa-arrow-left"></i>
        <span>Kembali</span>
    </a>
</div>

{{-- Detail Card --}}
<div class="detail-card">
    <div class="detail-card-header">
        <h5 class="detail-card-title">
            <i class="fas fa-file-invoice-dollar"></i>
            Informasi Tagihan
        </h5>
    </div>
    <div class="detail-card-body">
        {{-- Info Grid --}}
        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">No. Tagihan</span>
                <span class="info-value monospace">
                    {{ isset($uktSemester['id']) ? '#INV-' . str_pad($uktSemester['id'], 5, '0', STR_PAD_LEFT) : '-' }}
                </span>
            </div>

            <div class="info-item">
                <span class="info-label">Mahasiswa</span>
                <span class="info-value">{{ $uktSemester['enrollment']['mahasiswa']['nama_lengkap'] ?? '-' }}</span>
            </div>

            <div class="info-item">
                <span class="info-label">NIM</span>
                <span class="info-value monospace">{{ $uktSemester['enrollment']['mahasiswa']['nim'] ?? '-' }}</span>
            </div>

            <div class="info-item">
                <span class="info-label">Semester</span>
                <span class="info-value">{{ $uktSemester['periode_pembayaran']['nama_periode'] ?? '-' }}</span>
            </div>

            <div class="info-item">
                <span class="info-label">Status Pembayaran</span>
                @php
                    $statusLunas = 'terbayar';
                    if (!empty($uktSemester['pembayaran'])) {
                        foreach ($uktSemester['pembayaran'] as $pembayaran) {
                            if ($pembayaran['status'] != 'terbayar') {
                                $statusLunas = 'belum_bayar';
                                break;
                            }
                        }
                    } else {
                        $statusLunas = '-';
                    }
                @endphp
                @if($statusLunas == 'terbayar')
                    <span class="badge-premium badge-success">
                        <span class="badge-dot"></span>
                        Sudah Lunas
                    </span>
                @elseif($statusLunas == 'belum_bayar')
                    <span class="badge-premium badge-danger">
                        <span class="badge-dot"></span>
                        Belum Bayar
                    </span>
                @else
                    <span class="badge-premium badge-secondary">
                        <span class="badge-dot"></span>
                        -
                    </span>
                @endif
            </div>

            <div class="info-item">
                <span class="info-label">Tanggal Terbit</span>
                <span class="info-value">
                    {{ isset($uktSemester['periode_pembayaran']['tanggal_mulai'])
                        ? \Carbon\Carbon::parse($uktSemester['periode_pembayaran']['tanggal_mulai'])->translatedFormat('d F Y')
                        : '-'
                    }}
                </span>
            </div>

            <div class="info-item">
                <span class="info-label">Tanggal Jatuh Tempo</span>
                <span class="info-value">
                    {{ isset($uktSemester['periode_pembayaran']['tanggal_selesai'])
                        ? \Carbon\Carbon::parse($uktSemester['periode_pembayaran']['tanggal_selesai'])->translatedFormat('d F Y')
                        : '-'
                    }}
                </span>
            </div>

            <div class="info-item">
                <span class="info-label">Download Tagihan</span>
                <a href="#" class="btn-premium btn-primary-premium" style="padding: 8px 16px; font-size: 13px;">
                    <i class="fas fa-download"></i>
                    <span>Download</span>
                </a>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="action-buttons">
            @php
                $sudahAjukanCicilan = false;
                $totalTagihan = 0;
                $totalTerbayar = 0;

                if (!empty($uktSemester['pembayaran'])) {
                    foreach ($uktSemester['pembayaran'] as $pembayaran) {
                        $totalTagihan += $pembayaran['nominal_tagihan'];

                        foreach ($pembayaran['detail_pembayaran'] as $detail) {
                            if (strtolower($detail['status'] ?? '') === 'verified') {
                                $totalTerbayar += $detail['nominal'];
                            }
                        }
                    }

                    if (count($uktSemester['pembayaran']) > 1) {
                        $sudahAjukanCicilan = true;
                    }

                    if ($totalTerbayar >= $totalTagihan) {
                        $sudahAjukanCicilan = true;
                    }
                }
            @endphp

            <a href="#" class="btn-premium btn-primary-premium">
                <i class="fas fa-credit-card"></i>
                <span>Pembayaran Langsung</span>
            </a>

            @if(!$sudahAjukanCicilan)
                <a href="{{ route('pengajuan.cicilan', ['id' => $uktSemester['id']]) }}" class="btn-premium btn-success-premium">
                    <i class="fas fa-hand-holding-usd"></i>
                    <span>Ajukan Cicilan</span>
                </a>
            @endif
        </div>

        {{-- Alert Messages --}}
        @if (!empty($uktsemester['pengajuan_cicilan']) && isset($uktsemester['pengajuan_cicilan'][0]['id']))
            <div class="alert-premium alert-warning-premium">
                <i class="fas fa-info-circle"></i>
                <span>Pengajuan cicilan anda sudah masuk, silahkan lanjutkan proses selanjutnya.</span>
            </div>
        @else
            <div class="alert-premium alert-info-premium">
                <i class="fas fa-exclamation-triangle"></i>
                <span>Silahkan pilih untuk metode pembayaran anda.</span>
            </div>
        @endif
    </div>
</div>

{{-- Payment Table --}}
<div class="detail-card">
    <div class="detail-card-header">
        <h5 class="detail-card-title">
            <i class="fas fa-list"></i>
            Detail Pembayaran
        </h5>
    </div>
    <div class="detail-card-body">
        <div class="table-responsive">
            <table class="table-premium">
                <thead>
                    <tr>
                        <th>ID Pembayaran</th>
                        <th>Tagihan</th>
                        <th>Terbayar</th>
                        <th>Belum Dibayar</th>
                        <th>Status Verifikasi</th>
                        <th>Dibayar Melalui</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($uktSemester['pembayaran']))
                        @foreach($uktSemester['pembayaran'] as $pembayaran)
                            @php
                                $totalTagihan = $pembayaran['nominal_tagihan'];
                                $detail = $pembayaran['detail_pembayaran'][0] ?? null;
                                $terbayar = 0;
                                $statusVerifikasi = $detail['status'] ?? null;
                                $metodePembayaran = $detail['metode_pembayaran'] ?? '-';

                                if ($detail && strtolower($statusVerifikasi) === 'verified') {
                                    $terbayar = $detail['nominal'];
                                }

                                $belumDibayar = $totalTagihan - $terbayar;
                            @endphp
                            <tr>
                                <td class="monospace" data-label="ID Pembayaran">{{ $pembayaran['id'] }}</td>
                                <td class="monospace" data-label="Tagihan">Rp{{ number_format($totalTagihan, 0, ',', '.') }}</td>
                                <td class="text-success monospace" data-label="Terbayar">Rp{{ number_format($terbayar, 0, ',', '.') }}</td>
                                <td class="text-danger monospace" data-label="Belum Dibayar">Rp{{ number_format($belumDibayar, 0, ',', '.') }}</td>
                                <td data-label="Status Verifikasi">
                                    @if($statusVerifikasi === 'verified')
                                        <span class="badge-premium badge-success">
                                            <span class="badge-dot"></span>
                                            Berhasil diverifikasi
                                        </span>
                                    @elseif($statusVerifikasi === 'rejected')
                                        <span class="badge-premium badge-danger">
                                            <span class="badge-dot"></span>
                                            Pembayaran ditolak
                                        </span>
                                    @elseif($statusVerifikasi === 'pending')
                                        <span class="badge-premium badge-warning">
                                            <span class="badge-dot"></span>
                                            Menunggu diverifikasi
                                        </span>
                                    @else
                                        <span class="badge-premium badge-secondary">
                                            <span class="badge-dot"></span>
                                            Belum ada pembayaran
                                        </span>
                                    @endif
                                </td>
                                <td data-label="Dibayar Melalui">
                                    @if($metodePembayaran !== '-')
                                        <span class="badge-premium badge-info">{{ $metodePembayaran }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-inbox"></i>
                                    </div>
                                    <div class="empty-state-text">Belum ada data pembayaran</div>
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Upload Bukti Pembayaran Section --}}
<div class="upload-section">
    <div class="upload-section-header">
        <h5 class="upload-section-title">
            <i class="fas fa-cloud-upload-alt" style="color: var(--primary); margin-right: 8px;"></i>
            Upload Bukti Pembayaran
        </h5>
    </div>
    <div class="upload-section-body">
        {{-- Upload Button --}}
        <div class="mb-4">
            <a href="{{ route('upload-bukti-pembayaran', ['id' => $uktSemester['id']]) }}" class="btn-premium btn-primary-premium">
                <i class="fas fa-plus"></i>
                <span>Tambah Bukti Pembayaran</span>
            </a>
        </div>

        {{-- Upload Table --}}
        <div class="table-responsive">
            <table class="table-premium">
                <thead>
                    <tr>
                        <th class="text-center" width="5%">No</th>
                        <th>Nama Mahasiswa</th>
                        <th>Bank Pengirim</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Keterangan</th>
                        <th class="text-center" width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($uktSemester['pembayaran']) && count($uktSemester['pembayaran']) > 0)
                        @php $adaBukti = false; @endphp

                        @foreach ($uktSemester['pembayaran'] as $index => $pembayaran)
                            @if (!empty($pembayaran['detail_pembayaran']) && count($pembayaran['detail_pembayaran']) > 0)
                                @php
                                    $detail = $pembayaran['detail_pembayaran'][0];
                                    $adaBukti = true;
                                @endphp
                                <tr>
                                    <td class="text-center" data-label="No">{{ $index + 1 }}</td>
                                    <td data-label="Nama Mahasiswa">{{ $uktSemester['enrollment']['mahasiswa']['nama_lengkap'] }}</td>
                                    <td data-label="Bank Pengirim">BANK {{ $detail['metode_pembayaran'] }}</td>
                                    <td data-label="Tanggal Pembayaran">
                                        {{ \Carbon\Carbon::parse($detail['tanggal_pembayaran'])->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="monospace" data-label="Jumlah Pembayaran">
                                        Rp{{ number_format($detail['nominal'], 0, ',', '.') }}
                                    </td>
                                    <td data-label="Keterangan">{{ $detail['catatan'] ?? '-' }}</td>
                                    <td class="text-center" data-label="Aksi">
                                        <div class="btn-group-sm">
                                            <a href="{{ asset('storage/' . $detail['bukti_pembayaran_path']) }}"
                                               class="btn-icon-sm btn-icon-primary"
                                               title="Lihat Bukti"
                                               target="_blank">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn-icon-sm btn-icon-success" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn-icon-sm btn-icon-danger"
                                               title="Hapus"
                                               onclick="return confirm('Yakin ingin menghapus bukti pembayaran ini?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        @if (!$adaBukti)
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <div class="empty-state-icon">
                                            <i class="fas fa-file-upload"></i>
                                        </div>
                                        <div class="empty-state-text">Belum ada bukti pembayaran</div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @else
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-file-upload"></i>
                                    </div>
                                    <div class="empty-state-text">Belum ada bukti pembayaran</div>
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection