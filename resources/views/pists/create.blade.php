@extends('layout.sidebar')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<style>
    .create-container {
        max-width: 900px;
        margin: 2rem auto;
    }
    .card-modern {
        border: none;
        border-radius: 16px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        overflow: hidden;
    }
    .card-header-modern {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 1.5rem;
        border: none;
    }
    .card-header-modern h5 {
        color: white;
        font-weight: 600;
        margin: 0;
        letter-spacing: 0.5px;
    }
    .form-label-modern {
        font-weight: 500;
        color: #4a5568;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }
    .form-control-modern {
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }
    .form-control-modern:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
    }
    .btn-modern {
        border-radius: 10px;
        padding: 0.75rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-primary-modern {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
    }
    .btn-primary-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
    }
    .btn-back {
        border-radius: 10px;
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    .btn-back:hover {
        background: #667eea;
        color: white;
    }
    .section-divider {
        border-top: 2px solid #e2e8f0;
        margin: 1.5rem 0;
        position: relative;
    }
    .section-divider::before {
        content: '';
        position: absolute;
        top: -2px;
        left: 0;
        width: 50px;
        height: 2px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .select2-container--default .select2-selection--multiple {
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        padding: 0.5rem;
    }
    .select2-container--default .select2-selection--multiple:focus-within {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
    }
    .file-upload-wrapper {
        position: relative;
        margin: 1rem 0;
    }
    .file-upload-label {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
    }
    .file-upload-label:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
    }
    .file-name-display {
        margin-top: 0.5rem;
        font-size: 0.85rem;
        color: #718096;
    }
    .required-field::after {
        content: ' *';
        color: #e53e3e;
    }
</style>

<div class="create-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0" style="color: #2d3748; font-weight: 600;">
            <i class="bi bi-file-earmark-plus me-2"></i>Input Surat Tugas
        </h4>
        <a href="{{ url('pists.index') }}" class="btn btn-outline-secondary btn-back">
            <i class="bi bi-house-door"></i>
        </a>
    </div>

    <div class="card card-modern">
        <div class="card-header card-header-modern">
            <h5><i class="bi bi-pencil-square me-2"></i>Formulir Perjalanan Dinas</h5>
        </div>
        <div class="card-body p-4">
            <form method="post" action="{{ route('pists.postData') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="form-label-modern required-field">Atasan / Penilai</label>
                    <select name="penilai_id" class="form-control form-control-modern select2-single">
                        @foreach ($penilai as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="section-divider"></div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label-modern required-field">No. Surat</label>
                        <input type="text" name="no_surat" class="form-control form-control-modern" placeholder="Masukkan nomor surat">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label-modern required-field">Tanggal Surat</label>
                        <input type="date" name="tgl_surat" class="form-control form-control-modern">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label-modern required-field">Asal Surat</label>
                    <textarea name="asal_surat" class="form-control form-control-modern" rows="2" placeholder="Masukkan asal surat"></textarea>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label-modern required-field">No. Surat Asal</label>
                        <input type="text" name="no_asal_surat" class="form-control form-control-modern" placeholder="Masukkan nomor surat asal">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label-modern required-field">Tanggal Surat Asal</label>
                        <input type="date" name="tgl_surat_dasar" class="form-control form-control-modern">
                    </div>
                </div>

                <div class="section-divider"></div>

                <div class="mb-3">
                    <label class="form-label-modern required-field">Hal / Perihal</label>
                    <textarea name="description" class="form-control form-control-modern" rows="3" placeholder="Masukkan perihal surat"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label-modern required-field">Maksud</label>
                    <textarea name="maksud" class="form-control form-control-modern" rows="3" placeholder="Masukkan maksud perjalanan dinas"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label-modern required-field">Tujuan</label>
                    <textarea name="tujuan" class="form-control form-control-modern" rows="3" placeholder="Masukkan tujuan perjalanan dinas"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label-modern required-field">Acara</label>
                    <textarea name="acara" class="form-control form-control-modern" rows="4" placeholder="Deskripsikan acara"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label-modern required-field">Ulasan</label>
                    <textarea name="ulasan" class="form-control form-control-modern" rows="4" placeholder="Masukkan ulasan tambahan"></textarea>
                </div>

                <div class="section-divider"></div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label-modern required-field">Tanggal Awal</label>
                        <input type="date" name="tgl_awal" class="form-control form-control-modern">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label-modern required-field">Tanggal Akhir</label>
                        <input type="date" name="tgl_akhir" class="form-control form-control-modern">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label-modern required-field">Jam Awal</label>
                        <input type="time" name="jam_1" class="form-control form-control-modern">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label-modern required-field">Jam Akhir</label>
                        <input type="time" name="jam_2" class="form-control form-control-modern">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label-modern required-field">Tempat</label>
                    <input type="text" name="tempat" class="form-control form-control-modern" placeholder="Masukkan tempat kegiatan">
                </div>

                <div class="section-divider"></div>

                <div class="mb-4">
                    <label class="form-label-modern required-field">Peserta Perjalanan Dinas</label>
                    <select class="form-control select2-multiple" name="cat[]" multiple>
                        @foreach ($pegawai as $item)
                            <option value="{{ $item->name }}-{{ $item->pangkat_gol }}-{{ $item->nip }}-{{ $item->jabatan }}">
                                {{ $item->name }} - {{ $item->jabatan }}
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="selected" id="selected-count">
                    <small class="text-muted mt-1 d-block"><i class="bi bi-info-circle me-1"></i>Pilih satu atau lebih peserta</small>
                </div>

                <div class="mb-4">
                    <label class="form-label-modern">Upload Surat Pengajuan</label>
                    <div class="file-upload-wrapper">
                        <label for="actual-button" class="file-upload-label">
                            <i class="bi bi-cloud-upload"></i>
                            <span>Pilih File Surat</span>
                        </label>
                        <input type="file" id="actual-button" name="surat-pengajuan" hidden>
                        <div id="file-chosen" class="file-name-display">Belum ada file dipilih</div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary-modern btn-modern">
                        <i class="bi bi-save me-2"></i>Simpan Data
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Select2
        $('.select2-single').select2({
            placeholder: "Pilih Atasan / Penilai",
            allowClear: true,
            width: '100%'
        });

        $('.select2-multiple').select2({
            placeholder: "Pilih Peserta",
            allowClear: true,
            width: '100%'
        });

        // Update selected count
        $('.select2-multiple').on('change', function() {
            var count = $(this).val() ? $(this).val().length : 0;
            $('#selected-count').val(count);
        });

        // File upload display
        $('#actual-button').on('change', function() {
            var fileName = this.files[0] ? this.files[0].name : 'Belum ada file dipilih';
            $('#file-chosen').text(fileName);
        });
    });
</script>

@endsection
