@extends('layouts.app')

@section('title', 'Upload Bukti Pembayaran - SIMAKU')

@section('header', 'Upload Bukti')

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

    .btn-back i { font-size: 13px; }

    /* ── Form Card ── */
    .form-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        margin-bottom: 24px;
        box-shadow: var(--shadow-sm);
        max-width: 720px;
        margin-left: auto;
        margin-right: auto;
    }

    .form-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid var(--border);
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-card-title {
        font-size: 16px;
        font-weight: 700;
        color: var(--text);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .form-card-title i { color: var(--primary); font-size: 15px; }

    .form-card-subtitle {
        font-size: 13px;
        color: var(--text-muted);
        margin-top: 4px;
        font-weight: 500;
    }

    .form-card-body { padding: 24px; }

    /* ── Alert Premium ── */
    .alert-premium {
        padding: 14px 18px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 20px;
        display: flex;
        align-items: flex-start;
        gap: 10px;
        border: 1px solid transparent;
    }

    .alert-premium i {
        font-size: 16px;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .alert-premium ul {
        margin: 0;
        padding-left: 20px;
    }

    .alert-premium li { margin-bottom: 4px; }

    .alert-danger-premium {
        background: var(--danger-soft);
        color: var(--danger);
        border-color: #fecdd3;
    }

    .alert-success-premium {
        background: var(--success-soft);
        color: var(--success);
        border-color: #bbf7d0;
    }

    .alert-info-premium {
        background: var(--info-soft);
        color: var(--info);
        border-color: #bae6fd;
    }

    /* ── Form Group ── */
    .form-group-premium {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 8px;
        letter-spacing: 0.02em;
    }

    .form-label-required::after {
        content: '*';
        color: var(--danger);
        margin-left: 4px;
    }

    /* ── Input Premium ── */
    .form-control-premium {
        width: 100%;
        padding: 12px 16px;
        font-size: 14px;
        font-weight: 500;
        color: var(--text);
        background: var(--surface);
        border: 1.5px solid var(--border);
        border-radius: 10px;
        transition: all 0.2s ease;
        outline: none;
    }

    .form-control-premium::placeholder {
        color: var(--text-hint);
        font-weight: 400;
    }

    .form-control-premium:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(67, 56, 202, 0.1);
    }

    .form-control-premium:disabled,
    .form-control-premium[readonly] {
        background: var(--bg);
        color: var(--text-muted);
        cursor: not-allowed;
        opacity: 1;
    }

    .form-control-premium.monospace {
        font-family: 'JetBrains Mono', monospace;
        font-size: 13px;
    }

    .form-hint {
        font-size: 12px;
        color: var(--text-hint);
        margin-top: 6px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .form-hint i { font-size: 11px; }

    /* ── File Upload Premium ── */
    .file-upload-premium {
        position: relative;
        border: 2px dashed var(--border);
        border-radius: 12px;
        padding: 24px;
        text-align: center;
        background: var(--bg);
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .file-upload-premium:hover,
    .file-upload-premium.drag-over {
        border-color: var(--primary);
        background: var(--primary-soft);
    }

    .file-upload-premium.has-file {
        border-style: solid;
        border-color: var(--success);
        background: var(--success-soft);
    }

    .file-upload-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: var(--surface);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
        font-size: 20px;
        color: var(--primary);
        box-shadow: var(--shadow-sm);
    }

    .file-upload-premium.has-file .file-upload-icon {
        color: var(--success);
    }

    .file-upload-text {
        font-size: 14px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 4px;
    }

    .file-upload-subtext {
        font-size: 12px;
        color: var(--text-hint);
    }

    .file-upload-premium input[type="file"] {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0;
        cursor: pointer;
    }

    .file-name-preview {
        margin-top: 12px;
        padding: 10px 14px;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        color: var(--text);
        display: none;
        align-items: center;
        gap: 8px;
    }

    .file-name-preview.show { display: flex; }

    .file-name-preview i { color: var(--success); }

    .file-name-preview .remove-file {
        margin-left: auto;
        color: var(--danger);
        cursor: pointer;
        font-size: 14px;
        transition: opacity 0.15s;
    }

    .file-name-preview .remove-file:hover { opacity: 0.7; }

    /* ── Action Buttons ── */
    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 28px;
        padding-top: 20px;
        border-top: 1px solid var(--border);
        flex-wrap: wrap;
    }

    .btn-premium {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 24px;
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

    .btn-secondary-premium {
        background: var(--surface);
        color: var(--text-muted);
        border: 1.5px solid var(--border);
    }

    .btn-secondary-premium:hover {
        background: var(--bg);
        color: var(--text);
        border-color: var(--text-muted);
        transform: translateY(-1px);
    }

    .btn-premium:active {
        transform: translateY(0) scale(0.98);
        transition: none;
    }

    .btn-premium i { font-size: 14px; }

    /* ── Info Box (Readonly Field) ── */
    .info-box {
        padding: 14px 16px;
        background: var(--bg);
        border: 1px solid var(--border);
        border-radius: 10px;
        font-size: 13px;
        font-weight: 500;
        color: var(--text);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info-box i {
        color: var(--primary);
        font-size: 14px;
        flex-shrink: 0;
    }

    .info-box .monospace {
        font-family: 'JetBrains Mono', monospace;
        margin-left: 4px;
    }

    /* ── Responsive ── */
    @media (max-width: 768px) {
        .form-card { margin: 0 12px; }

        .form-actions {
            flex-direction: column;
        }

        .btn-premium {
            width: 100%;
        }

        .file-upload-premium {
            padding: 20px 16px;
        }
    }

    /* ── Accessibility ── */
    .form-control-premium:focus-visible,
    .btn-premium:focus-visible,
    .file-upload-premium:focus-within {
        outline: 2px solid var(--primary);
        outline-offset: 2px;
    }
</style>
@endsection

@section('content')
{{-- Back Button --}}
<div class="back-button-wrapper">
    <a href="{{ route('mahasiswa-dashboard') }}" class="btn-back">
        <i class="fas fa-arrow-left"></i>
        <span>Kembali</span>
    </a>
</div>

{{-- Form Card --}}
<div class="form-card">
    <div class="form-card-header">
        <i class="fas fa-cloud-upload-alt"></i>
        <div>
            <h5 class="form-card-title">Upload Bukti Pembayaran</h5>
            <p class="form-card-subtitle">Lengkapi data berikut untuk mengupload bukti transfer Anda</p>
        </div>
    </div>

    <div class="form-card-body">
        <form action="{{ route('upload-bukti-pembayaran.store') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
            @csrf

            {{-- Error Alert --}}
            @if($errors->any())
                <div class="alert-premium alert-danger-premium">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>
                        <strong>Terjadi kesalahan:</strong>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            {{-- ID Pembayaran (Readonly) --}}
            <div class="form-group-premium">
                <label class="form-label">ID Pembayaran</label>
                @php
                    $pembayaran = $pembayaranList[0];
                @endphp
                <div class="info-box">
                    <i class="fas fa-info-circle"></i>
                    <span>
                        <span class="monospace">#INV-{{ str_pad($pembayaran['id'], 5, '0', STR_PAD_LEFT) }}</span>
                        • Jatuh Tempo: {{ \Carbon\Carbon::parse($pembayaran['tanggal_jatuh_tempo'])->translatedFormat('d F Y') }}
                        • Nominal: <span class="monospace">Rp{{ number_format($pembayaran['nominal_tagihan'], 0, ',', '.') }}</span>
                    </span>
                </div>
                <input type="hidden" name="id_pembayaran" value="{{ $pembayaran['id'] }}">
            </div>

            {{-- Tanggal Transfer --}}
            <div class="form-group-premium">
                <label for="tanggal_transfer" class="form-label form-label-required">Tanggal Transfer</label>
                <input type="date"
                       class="form-control-premium"
                       id="tanggal_transfer"
                       name="tanggal_transfer"
                       value="{{ old('tanggal_transfer') }}"
                       max="{{ date('Y-m-d') }}"
                       required>
                <p class="form-hint">
                    <i class="fas fa-circle-info"></i>
                    Pilih tanggal sesuai dengan bukti transfer Anda
                </p>
            </div>

            {{-- Bank Pengirim --}}
            <div class="form-group-premium">
                <label for="bank_pengirim" class="form-label form-label-required">Bank Pengirim</label>
                <input type="text"
                       class="form-control-premium"
                       id="bank_pengirim"
                       name="bank_pengirim"
                       value="{{ old('bank_pengirim') }}"
                       placeholder="Contoh: BCA, Mandiri, BNI"
                       required>
                <p class="form-hint">
                    <i class="fas fa-building-columns"></i>
                    Masukkan nama bank tempat Anda melakukan transfer
                </p>
            </div>

            {{-- Jumlah Dibayar --}}
            <div class="form-group-premium">
                <label for="jumlah_dibayar" class="form-label form-label-required">Jumlah Dibayar</label>
                <input type="number"
                       class="form-control-premium monospace"
                       id="jumlah_dibayar"
                       name="jumlah_dibayar"
                       value="{{ old('jumlah_dibayar') }}"
                       placeholder="Contoh: 5000000"
                       min="1"
                       required>
                <p class="form-hint">
                    <i class="fas fa-triangle-exclamation"></i>
                    Tulis angka tanpa titik atau koma (contoh: 5000000)
                </p>
            </div>

            {{-- Upload File --}}
            <div class="form-group-premium">
                <label class="form-label form-label-required">Upload Bukti Pembayaran</label>

                <div class="file-upload-premium" id="dropZone">
                    <input type="file"
                           id="bukti_pembayaran_path"
                           name="bukti_pembayaran_path"
                           accept="image/png, image/jpeg"
                           required>

                    <div class="file-upload-icon">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="file-upload-text">Klik atau drag file ke sini</div>
                    <div class="file-upload-subtext">Format: JPG/PNG • Maksimal: 1MB</div>
                </div>

                {{-- File Preview --}}
                <div class="file-name-preview" id="fileNamePreview">
                    <i class="fas fa-file-image"></i>
                    <span id="fileNameText"></span>
                    <span class="remove-file" id="removeFile" title="Hapus file">
                        <i class="fas fa-times"></i>
                    </span>
                </div>

                <p class="form-hint">
                    <i class="fas fa-shield-halved"></i>
                    Pastikan bukti transfer jelas terbaca dan mencakup nominal, tanggal, dan nomor rekening tujuan
                </p>
            </div>

            {{-- Action Buttons --}}
            <div class="form-actions">
                <button type="submit" class="btn-premium btn-primary-premium">
                    <i class="fas fa-paper-plane"></i>
                    <span>Kirim Bukti Pembayaran</span>
                </button>
                <a href="{{ route('mahasiswa-dashboard') }}" class="btn-premium btn-secondary-premium">
                    <i class="fas fa-arrow-left"></i>
                    <span>Batal</span>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('bukti_pembayaran_path');
        const dropZone = document.getElementById('dropZone');
        const fileNamePreview = document.getElementById('fileNamePreview');
        const fileNameText = document.getElementById('fileNameText');
        const removeFileBtn = document.getElementById('removeFile');
        const form = document.getElementById('uploadForm');

        // Format angka dengan titik untuk display (optional UX enhancement)
        const jumlahInput = document.getElementById('jumlah_dibayar');
        jumlahInput?.addEventListener('input', function(e) {
            // Biarkan user input angka polos, validasi di backend
            const value = e.target.value.replace(/[^0-9]/g, '');
            e.target.value = value;
        });

        // Handle file selection
        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                validateAndPreviewFile(file);
            }
        });

        // Drag & Drop support
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => dropZone.classList.add('drag-over'), false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => dropZone.classList.remove('drag-over'), false);
        });

        dropZone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            if (files[0]) {
                fileInput.files = files;
                validateAndPreviewFile(files[0]);
            }
        }

        // Validate and preview file
        function validateAndPreviewFile(file) {
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            const maxSize = 1 * 1024 * 1024; // 1MB

            if (!validTypes.includes(file.type)) {
                alert('Format file tidak didukung. Gunakan JPG atau PNG.');
                fileInput.value = '';
                hidePreview();
                return;
            }

            if (file.size > maxSize) {
                alert('Ukuran file terlalu besar. Maksimal 1MB.');
                fileInput.value = '';
                hidePreview();
                return;
            }

            // Show preview
            fileNameText.textContent = file.name;
            fileNamePreview.classList.add('show');
            dropZone.classList.add('has-file');
        }

        // Remove file
        removeFileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            fileInput.value = '';
            hidePreview();
        });

        function hidePreview() {
            fileNamePreview.classList.remove('show');
            dropZone.classList.remove('has-file');
        }

        // Confirm before submit
        form.addEventListener('submit', function(e) {
            const jumlah = document.getElementById('jumlah_dibayar').value;
            const formattedJumlah = new Intl.NumberFormat('id-ID').format(jumlah);

            const confirmed = confirm(
                `Konfirmasi Pengiriman Bukti Pembayaran\n\n` +
                `• Jumlah: Rp${formattedJumlah}\n` +
                `• Bank: ${document.getElementById('bank_pengirim').value}\n\n` +
                `Yakin ingin mengirim bukti pembayaran ini?`
            );

            if (!confirmed) {
                e.preventDefault();
            }
        });

        // Auto-format date input placeholder hint
        const tanggalInput = document.getElementById('tanggal_transfer');
        if (tanggalInput) {
            tanggalInput.max = new Date().toISOString().split('T')[0];
        }
    });
</script>
@endsection