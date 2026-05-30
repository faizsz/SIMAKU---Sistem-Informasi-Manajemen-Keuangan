@extends('layouts.app')
@section('title', 'Detail Tagihan UKT - SIMAKU')
@section('header', 'Detail Tagihan')
@section('styles')
<style>
@import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;600&display=swap');
:root {
    --primary:      #4e73df;
    --primary-soft: rgba(78,115,223,0.1);
    --primary-text: #4e73df;
    --success:      #1cc88a;
    --success-soft: rgba(28,200,138,0.1);
    --danger:       #e74a3b;
    --danger-soft:  rgba(231,74,59,0.1);
    --warning:      #f6c23e;
    --warning-soft: rgba(246,194,62,0.1);
    --info:         #36b9cc;
    --info-soft:    rgba(54,185,204,0.1);
    --surface:      #ffffff;
    --bg:           #f8f9fc;
    --text:         #5a5c69;
    --text-dark:    #3a3b45;
    --text-muted:   #858796;
    --text-hint:    #b7b9cc;
    --border:       #e3e6f0;
    --radius:       8px;
    --radius-lg:    10px;
    --shadow-sm:    0 2px 4px rgba(0,0,0,0.02);
    --shadow-md:    0 4px 12px rgba(58,59,69,0.06);
    --shadow-lg:    0 8px 24px rgba(58,59,69,0.1);
}
.content-wrapper { background-color: var(--bg) !important; }
.back-button-wrapper { margin-bottom: 20px; }
.btn-back {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 9px 16px; background: var(--surface);
    color: var(--text-muted); border: 1.5px solid var(--border);
    border-radius: var(--radius); text-decoration: none;
    font-size: 13px; font-weight: 600; transition: all 0.2s ease;
    box-shadow: var(--shadow-sm);
}
.btn-back:hover {
    background: var(--bg); border-color: var(--primary);
    color: var(--primary); transform: translateX(-2px);
    box-shadow: var(--shadow-md); text-decoration: none;
}
.btn-back i { font-size: 12px; }
.detail-card, .table-card {
    background: var(--surface); border: 1px solid var(--border);
    border-radius: var(--radius-lg); overflow: hidden;
    margin-bottom: 20px; box-shadow: var(--shadow-sm);
    transition: box-shadow 0.2s ease;
}
.detail-card:hover, .table-card:hover { box-shadow: var(--shadow-md); }
.detail-card-header, .table-card-header {
    padding: 18px 24px; border-bottom: 1px solid var(--border);
    background-color: var(--bg); display: flex; align-items: center;
    justify-content: space-between; gap: 12px;
}
.detail-card-title, .table-card-title {
    font-size: 15px; font-weight: 700; color: var(--text-dark);
    margin: 0; display: flex; align-items: center; gap: 9px;
}
.detail-card-title i, .table-card-title i { color: var(--primary); font-size: 14px; }
.detail-card-body { padding: 24px; }
.badge-count {
    font-size: 12px; font-weight: 600; color: var(--text-muted);
    background: var(--surface); border: 1px solid var(--border);
    border-radius: 20px; padding: 4px 12px;
}
.info-grid {
    display: grid; grid-template-columns: repeat(2,1fr);
    gap: 20px; margin-bottom: 0;
}
@media (max-width:768px) { .info-grid { grid-template-columns: 1fr; } }
.info-item { display: flex; flex-direction: column; gap: 5px; }
.info-label {
    font-size: 11px; font-weight: 700; text-transform: uppercase;
    letter-spacing: 0.08em; color: var(--text-muted);
}
.info-value { font-size: 14px; font-weight: 600; color: var(--text-dark); }
.info-value.monospace {
    font-family: 'JetBrains Mono', monospace;
    font-size: 13px; color: #334155;
}
.summary-row {
    display: grid; grid-template-columns: repeat(3,1fr);
    gap: 14px; margin-top: 20px; padding-top: 20px;
    border-top: 1px solid var(--border);
}
@media (max-width:768px) { .summary-row { grid-template-columns: 1fr; } }
.summary-item {
    background: var(--bg); border: 1px solid var(--border);
    border-radius: var(--radius); padding: 14px 16px;
    display: flex; align-items: center; gap: 12px;
}
.summary-icon {
    width: 38px; height: 38px; flex-shrink: 0; border-radius: 50%;
    display: flex; align-items: center; justify-content: center; font-size: 15px;
}
.summary-icon.total  { background: var(--primary-soft); color: var(--primary); }
.summary-icon.paid   { background: var(--success-soft); color: var(--success); }
.summary-icon.unpaid { background: var(--danger-soft);  color: var(--danger); }
.summary-label {
    font-size: 10px; font-weight: 700; text-transform: uppercase;
    letter-spacing: 0.08em; color: var(--text-muted); margin-bottom: 3px;
}
.summary-value { font-family: 'JetBrains Mono', monospace; font-size: 15px; font-weight: 700; }
.summary-value.total  { color: var(--primary); }
.summary-value.paid   { color: var(--success); }
.summary-value.unpaid { color: var(--danger); }
.badge-pill {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 6px 13px; border-radius: 20px;
    font-size: 12px; font-weight: 700; letter-spacing: 0.02em;
}
.badge-dot { width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }
.badge-success { background: var(--success-soft); color: var(--success); }
.badge-success .badge-dot { background: var(--success); }
.badge-danger  { background: var(--danger-soft);  color: var(--danger); }
.badge-danger  .badge-dot { background: var(--danger); }
.badge-warning { background: var(--warning-soft); color: #b45309; }
.badge-warning .badge-dot { background: var(--warning); }
.badge-info    { background: var(--info-soft);    color: var(--info); }
.badge-info    .badge-dot { background: var(--info); }
.badge-secondary { background: var(--bg); color: var(--text-muted); }
.badge-secondary .badge-dot { background: var(--text-hint); }
.action-buttons {
    display: flex; flex-wrap: wrap; gap: 10px;
    margin-top: 20px; padding-top: 20px; border-top: 1px solid var(--border);
}
.btn-premium {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 10px 20px; border-radius: 20px; font-size: 13px;
    font-weight: 600; text-decoration: none; transition: all 0.2s ease;
    cursor: pointer; border: none; white-space: nowrap; letter-spacing: 0.02em;
}
.btn-primary-premium {
    background: var(--primary); color: white;
    box-shadow: 0 3px 10px rgba(78,115,223,0.2);
}
.btn-primary-premium:hover {
    background: #2e59d9; transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(78,115,223,0.3); color: white; text-decoration: none;
}
.btn-success-premium {
    background: var(--success); color: white;
    box-shadow: 0 3px 10px rgba(28,200,138,0.2);
}
.btn-success-premium:hover {
    background: #17a673; transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(28,200,138,0.3); color: white; text-decoration: none;
}
.btn-outline-premium {
    background: var(--surface); color: var(--primary);
    border: 1.5px solid #bac8f3; box-shadow: var(--shadow-sm);
}
.btn-outline-premium:hover {
    background: var(--primary-soft); border-color: var(--primary);
    transform: translateY(-2px); box-shadow: var(--shadow-md);
    color: var(--primary); text-decoration: none;
}
.btn-premium:active { transform: translateY(0) scale(0.98); }
.alert-premium {
    padding: 12px 16px; border-radius: var(--radius); font-size: 13px;
    font-weight: 500; margin-top: 16px; display: flex;
    align-items: center; gap: 10px; border: 1px solid;
}
.alert-premium i { font-size: 14px; flex-shrink: 0; }
.alert-warning-premium { background: var(--warning-soft); color: #92400e; border-color: #fde68a; }
.alert-info-premium    { background: var(--info-soft); color: #0e7490; border-color: rgba(54,185,204,0.3); }
.table-premium { width: 100%; border-collapse: collapse; }
.table-premium thead th {
    background: var(--bg); padding: 13px 18px; font-size: 11px;
    font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em;
    color: var(--text-muted); border-bottom: 2px solid var(--border);
    white-space: nowrap; text-align: left;
}
.table-premium thead th.text-center { text-align: center; }
.table-premium tbody td {
    padding: 16px 18px; font-size: 14px; font-weight: 500;
    color: var(--text); border-bottom: 1px solid var(--border); vertical-align: middle;
}
.table-premium tbody td.text-center { text-align: center; }
.table-premium tbody tr:last-child td { border-bottom: none; }
.table-premium tbody tr:hover td { background: #f8fafc; }
.td-monospace { font-family: 'JetBrains Mono', monospace; font-size: 13px; font-weight: 600; color: #334155; }
.text-success-val { color: var(--success) !important; font-weight: 700; }
.text-danger-val  { color: var(--danger)  !important; font-weight: 700; }
.text-muted-val   { color: var(--text-muted) !important; }
.btn-group-sm { display: inline-flex; gap: 5px; }
.btn-icon-sm {
    display: inline-flex; align-items: center; justify-content: center;
    width: 30px; height: 30px; border-radius: var(--radius); font-size: 12px;
    text-decoration: none; transition: all 0.15s ease; border: none; cursor: pointer;
}
.btn-icon-primary { background: var(--primary-soft); color: var(--primary); }
.btn-icon-primary:hover { background: var(--primary); color: white; transform: translateY(-1px); }
.btn-icon-success { background: var(--success-soft); color: var(--success); }
.btn-icon-success:hover { background: var(--success); color: white; transform: translateY(-1px); }
.btn-icon-danger  { background: var(--danger-soft);  color: var(--danger); }
.btn-icon-danger:hover  { background: var(--danger);  color: white; transform: translateY(-1px); }
.empty-state { padding: 48px 24px; text-align: center; color: var(--text-muted); }
.empty-state-icon {
    width: 56px; height: 56px; border-radius: 14px; background: var(--bg);
    border: 1px solid var(--border); display: flex; align-items: center;
    justify-content: center; margin: 0 auto 12px; font-size: 22px; color: var(--text-hint);
}
.empty-state-text { font-size: 14px; font-weight: 500; }
@media (max-width:768px) {
    .action-buttons { flex-direction: column; }
    .btn-premium { width: 100%; justify-content: center; }
    .table-premium thead { display: none; }
    .table-premium tbody tr {
        display: block; margin-bottom: 12px;
        border: 1px solid var(--border); border-radius: var(--radius); padding: 8px;
    }
    .table-premium tbody td {
        display: flex; justify-content: space-between;
        padding: 9px 12px; border-bottom: 1px solid var(--border); text-align: right;
    }
    .table-premium tbody td::before {
        content: attr(data-label); font-weight: 700; color: var(--text-muted);
        text-transform: uppercase; font-size: 10px; letter-spacing: 0.05em;
    }
    .table-premium tbody td:last-child { border-bottom: none; }
}
.btn-premium:focus-visible, .btn-back:focus-visible, .btn-icon-sm:focus-visible {
    outline: 2px solid var(--primary); outline-offset: 2px;
}
</style>
@endsection

@section('content')

<div class="back-button-wrapper">
    <a href="/lihat-tagihan-ukt" class="btn-back">
        <i class="fas fa-arrow-left"></i>
        <span>Kembali ke Tagihan</span>
    </a>
</div>

{{-- CARD 1: Informasi Tagihan --}}
<div class="detail-card">
    <div class="detail-card-header">
        <h5 class="detail-card-title">
            <i class="fas fa-file-invoice-dollar"></i>
            Informasi Tagihan
        </h5>
        @php
            $statusLunas = 'terbayar';
            if (!empty($uktSemester['pembayaran'])) {
                foreach ($uktSemester['pembayaran'] as $p) {
                    if ($p['status'] != 'terbayar') { $statusLunas = 'belum_bayar'; break; }
                }
            } else { $statusLunas = '-'; }
        @endphp
        @if($statusLunas == 'terbayar')
            <span class="badge-pill badge-success"><span class="badge-dot"></span>Sudah Lunas</span>
        @elseif($statusLunas == 'belum_bayar')
            <span class="badge-pill badge-danger"><span class="badge-dot"></span>Belum Bayar</span>
        @else
            <span class="badge-pill badge-secondary"><span class="badge-dot"></span>-</span>
        @endif
    </div>
    <div class="detail-card-body">
        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">No. Invoice</span>
                <span class="info-value monospace">{{ isset($uktSemester['id']) ? '#INV-'.str_pad($uktSemester['id'],5,'0',STR_PAD_LEFT) : '-' }}</span>
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
                <span class="info-label">Semester / Periode</span>
                <span class="info-value">{{ $uktSemester['periode_pembayaran']['nama_periode'] ?? '-' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Tanggal Terbit</span>
                <span class="info-value">{{ isset($uktSemester['periode_pembayaran']['tanggal_mulai']) ? \Carbon\Carbon::parse($uktSemester['periode_pembayaran']['tanggal_mulai'])->translatedFormat('d F Y') : '-' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Tanggal Jatuh Tempo</span>
                <span class="info-value">{{ isset($uktSemester['periode_pembayaran']['tanggal_selesai']) ? \Carbon\Carbon::parse($uktSemester['periode_pembayaran']['tanggal_selesai'])->translatedFormat('d F Y') : '-' }}</span>
            </div>
        </div>

        {{-- Summary Row --}}
        @php
            $totalTagihanAll = 0; $totalTerbayarAll = 0;
            if (!empty($uktSemester['pembayaran'])) {
                foreach ($uktSemester['pembayaran'] as $p) {
                    $totalTagihanAll += $p['nominal_tagihan'] ?? 0;
                    foreach ($p['detail_pembayaran'] as $d) {
                        if (strtolower($d['status'] ?? '') === 'verified') $totalTerbayarAll += $d['nominal'];
                    }
                }
            }
            $totalBelumAll = $totalTagihanAll - $totalTerbayarAll;
        @endphp
        <div class="summary-row">
            <div class="summary-item">
                <div class="summary-icon total"><i class="fas fa-wallet"></i></div>
                <div>
                    <div class="summary-label">Total Tagihan</div>
                    <div class="summary-value total">Rp {{ number_format($totalTagihanAll,0,',','.') }}</div>
                </div>
            </div>
            <div class="summary-item">
                <div class="summary-icon paid"><i class="fas fa-check-circle"></i></div>
                <div>
                    <div class="summary-label">Sudah Dibayar</div>
                    <div class="summary-value paid">Rp {{ number_format($totalTerbayarAll,0,',','.') }}</div>
                </div>
            </div>
            <div class="summary-item">
                <div class="summary-icon unpaid"><i class="fas fa-exclamation-circle"></i></div>
                <div>
                    <div class="summary-label">Belum Dibayar</div>
                    <div class="summary-value unpaid">Rp {{ number_format($totalBelumAll,0,',','.') }}</div>
                </div>
            </div>
        </div>

        {{-- Action Buttons --}}
        @php
            $sudahAjukanCicilan = false;
            if (!empty($uktSemester['pembayaran'])) {
                if (count($uktSemester['pembayaran']) > 1) $sudahAjukanCicilan = true;
                if ($totalTerbayarAll >= $totalTagihanAll && $totalTagihanAll > 0) $sudahAjukanCicilan = true;
            }
        @endphp
        <div class="action-buttons">
            <a href="#" class="btn-premium btn-primary-premium">
                <i class="fas fa-credit-card"></i><span>Pembayaran Langsung</span>
            </a>
            @if(!$sudahAjukanCicilan)
                <a href="{{ route('pengajuan.cicilan', ['id' => $uktSemester['id']]) }}" class="btn-premium btn-success-premium">
                    <i class="fas fa-hand-holding-usd"></i><span>Ajukan Cicilan</span>
                </a>
            @endif
            <a href="#" class="btn-premium btn-outline-premium">
                <i class="fas fa-download"></i><span>Download Invoice</span>
            </a>
        </div>

        @if (!empty($uktSemester['pengajuan_cicilan']) && isset($uktSemester['pengajuan_cicilan'][0]['id']))
            <div class="alert-premium alert-warning-premium">
                <i class="fas fa-info-circle"></i>
                <span>Pengajuan cicilan Anda sudah masuk, silahkan lanjutkan proses selanjutnya.</span>
            </div>
        @else
            <div class="alert-premium alert-info-premium">
                <i class="fas fa-info-circle"></i>
                <span>Silahkan pilih metode pembayaran Anda di atas.</span>
            </div>
        @endif
    </div>
</div>

{{-- CARD 2: Detail Pembayaran --}}
<div class="table-card">
    <div class="table-card-header">
        <h5 class="table-card-title"><i class="fas fa-list-alt"></i>Detail Pembayaran</h5>
        @if (!empty($uktSemester['pembayaran']))
            <span class="badge-count">{{ count($uktSemester['pembayaran']) }} item</span>
        @endif
    </div>
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
                            $nominalTagihan   = $pembayaran['nominal_tagihan'];
                            $det              = $pembayaran['detail_pembayaran'][0] ?? null;
                            $terbayar         = 0;
                            $statusVerifikasi = $det['status'] ?? null;
                            $metodePembayaran = $det['metode_pembayaran'] ?? '-';
                            if ($det && strtolower($statusVerifikasi) === 'verified') $terbayar = $det['nominal'];
                            $belumDibayar = $nominalTagihan - $terbayar;
                        @endphp
                        <tr>
                            <td class="td-monospace" data-label="ID Pembayaran">{{ $pembayaran['id'] }}</td>
                            <td class="td-monospace" data-label="Tagihan">Rp {{ number_format($nominalTagihan,0,',','.') }}</td>
                            <td class="td-monospace text-success-val" data-label="Terbayar">Rp {{ number_format($terbayar,0,',','.') }}</td>
                            <td class="td-monospace text-danger-val"  data-label="Belum Dibayar">Rp {{ number_format($belumDibayar,0,',','.') }}</td>
                            <td data-label="Status Verifikasi">
                                @if($statusVerifikasi === 'verified')
                                    <span class="badge-pill badge-success"><span class="badge-dot"></span>Berhasil diverifikasi</span>
                                @elseif($statusVerifikasi === 'rejected')
                                    <span class="badge-pill badge-danger"><span class="badge-dot"></span>Pembayaran ditolak</span>
                                @elseif($statusVerifikasi === 'pending')
                                    <span class="badge-pill badge-warning"><span class="badge-dot"></span>Menunggu verifikasi</span>
                                @else
                                    <span class="badge-pill badge-secondary"><span class="badge-dot"></span>Belum ada pembayaran</span>
                                @endif
                            </td>
                            <td data-label="Dibayar Melalui">
                                @if($metodePembayaran !== '-')
                                    <span class="badge-pill badge-info">{{ $metodePembayaran }}</span>
                                @else
                                    <span class="text-muted-val">-</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="6">
                        <div class="empty-state">
                            <div class="empty-state-icon"><i class="fas fa-inbox"></i></div>
                            <div class="empty-state-text">Belum ada data pembayaran</div>
                        </div>
                    </td></tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

{{-- CARD 3: Upload Bukti Pembayaran --}}
<div class="table-card">
    <div class="table-card-header">
        <h5 class="table-card-title"><i class="fas fa-cloud-upload-alt"></i>Upload Bukti Pembayaran</h5>
        <a href="{{ route('upload-bukti-pembayaran', ['id' => $uktSemester['id']]) }}"
           class="btn-premium btn-primary-premium" style="padding:8px 16px;font-size:12px;">
            <i class="fas fa-plus"></i><span>Tambah Bukti</span>
        </a>
    </div>
    <div class="table-responsive">
        <table class="table-premium">
            <thead>
                <tr>
                    <th class="text-center" width="5%">No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Bank Pengirim</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th class="text-center" width="12%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $adaBukti = false; @endphp
                @if (!empty($uktSemester['pembayaran']) && count($uktSemester['pembayaran']) > 0)
                    @foreach ($uktSemester['pembayaran'] as $index => $pembayaran)
                        @if (!empty($pembayaran['detail_pembayaran']) && count($pembayaran['detail_pembayaran']) > 0)
                            @php $det2 = $pembayaran['detail_pembayaran'][0]; $adaBukti = true; @endphp
                            <tr>
                                <td class="text-center" data-label="No">{{ $index + 1 }}</td>
                                <td data-label="Nama Mahasiswa">{{ $uktSemester['enrollment']['mahasiswa']['nama_lengkap'] }}</td>
                                <td data-label="Bank Pengirim">BANK {{ strtoupper($det2['metode_pembayaran']) }}</td>
                                <td data-label="Tanggal Pembayaran">{{ \Carbon\Carbon::parse($det2['tanggal_pembayaran'])->translatedFormat('d F Y') }}</td>
                                <td class="td-monospace" data-label="Jumlah">Rp {{ number_format($det2['nominal'],0,',','.') }}</td>
                                <td data-label="Keterangan">{{ $det2['catatan'] ?? '-' }}</td>
                                <td class="text-center" data-label="Aksi">
                                    <div class="btn-group-sm">
                                        <a href="{{ asset('storage/'.$det2['bukti_pembayaran_path']) }}"
                                           class="btn-icon-sm btn-icon-primary" title="Lihat Bukti" target="_blank">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn-icon-sm btn-icon-success" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn-icon-sm btn-icon-danger" title="Hapus"
                                           onclick="return confirm('Yakin ingin menghapus bukti pembayaran ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                @if (!$adaBukti)
                    <tr><td colspan="7">
                        <div class="empty-state">
                            <div class="empty-state-icon"><i class="fas fa-file-upload"></i></div>
                            <div class="empty-state-text">Belum ada bukti pembayaran yang diunggah</div>
                        </div>
                    </td></tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection
