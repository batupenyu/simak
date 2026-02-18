@extends('layout.master')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        --card-hover: 0 8px 30px rgba(0, 0, 0, 0.12);
    }

    body {
        background: #f8fafc;
    }

    /* Modern Tabs */
    .skp-tabs {
        background: white;
        border-radius: 16px;
        padding: 0.5rem;
        box-shadow: var(--card-shadow);
        margin-bottom: 2rem;
        border: none;
    }

    .skp-tabs .nav-link {
        border: none;
        color: #64748b;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        transition: all 0.3s ease;
        background: transparent;
    }

    .skp-tabs .nav-link:hover {
        background: #f1f5f9;
        color: #667eea;
    }

    .skp-tabs .nav-link.active {
        background: var(--primary-gradient);
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    /* Modern Cards */
    .card-modern {
        border: none;
        border-radius: 16px;
        box-shadow: var(--card-shadow);
        overflow: hidden;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
        background: white;
    }

    .card-modern:hover {
        box-shadow: var(--card-hover);
        transform: translateY(-2px);
    }

    .card-header-modern {
        background: var(--primary-gradient);
        padding: 1.5rem;
        border: none;
        color: white;
    }

    .card-header-modern h5 {
        margin: 0;
        font-weight: 700;
        font-size: 1.1rem;
        letter-spacing: 0.5px;
    }

    .card-body-modern {
        padding: 1.5rem;
    }

    /* Info Cards */
    .info-card {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 1rem;
        border-left: 4px solid #667eea;
    }

    .info-label {
        font-weight: 600;
        color: #64748b;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.25rem;
    }

    .info-value {
        color: #1e293b;
        font-weight: 500;
        font-size: 1rem;
    }

    /* Modern Tables */
    .table-modern {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .table-modern thead {
        background: var(--primary-gradient);
        color: white;
    }

    .table-modern thead th {
        border: none;
        padding: 1rem;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-modern tbody td {
        padding: 1rem;
        border-color: #f1f5f9;
        vertical-align: middle;
        color: #475569;
    }

    .table-modern tbody tr:hover {
        background: #f8fafc;
    }

    /* Profile Grid */
    .profile-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .profile-section {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        border-radius: 12px;
        padding: 1.25rem;
        border: 2px solid #f59e0b;
    }

    .profile-section h6 {
        color: #92400e;
        font-weight: 700;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .profile-item {
        display: flex;
        padding: 0.5rem 0;
        border-bottom: 1px solid rgba(245, 158, 11, 0.2);
    }

    .profile-item:last-child {
        border-bottom: none;
    }

    .profile-item .label {
        width: 180px;
        font-weight: 600;
        color: #78350f;
        font-size: 0.9rem;
    }

    .profile-item .value {
        flex: 1;
        color: #451a03;
        font-size: 0.9rem;
    }

    /* Buttons */
    .btn-modern {
        border-radius: 10px;
        padding: 0.6rem 1.25rem;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-print {
        background: var(--primary-gradient);
        color: white;
    }

    .btn-print:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        color: white;
    }

    .btn-add {
        background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
        color: white;
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(72, 187, 120, 0.4);
        color: white;
    }

    .btn-action-sm {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        border: none;
        font-size: 0.85rem;
    }

    .btn-edit-sm {
        background: linear-gradient(135deg, #f6ad55 0%, #ed8936 100%);
        color: white;
    }

    .btn-edit-sm:hover {
        transform: scale(1.1);
        box-shadow: 0 3px 10px rgba(237, 137, 54, 0.4);
        color: white;
    }

    .btn-delete-sm {
        background: linear-gradient(135deg, #fc8181 0%, #f56565 100%);
        color: white;
    }

    .btn-delete-sm:hover {
        transform: scale(1.1);
        box-shadow: 0 3px 10px rgba(245, 101, 101, 0.4);
        color: white;
    }

    .btn-add-sm {
        background: linear-gradient(135deg, #68d391 0%, #48bb78 100%);
        color: white;
    }

    .btn-add-sm:hover {
        transform: scale(1.1);
        box-shadow: 0 3px 10px rgba(72, 187, 120, 0.4);
        color: white;
    }

    /* Section Headers */
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e2e8f0;
    }

    .section-title {
        font-weight: 700;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 1rem;
    }

    .section-badge {
        background: var(--primary-gradient);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    /* Nested Tables */
    .nested-table {
        background: #f8fafc;
        border-radius: 8px;
        margin: 0.5rem 0;
    }

    .nested-table td {
        padding: 0.75rem !important;
        border: none !important;
    }

    /* Signature Section */
    .signature-section {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid #e2e8f0;
    }

    .signature-box {
        text-align: center;
        padding: 1rem;
    }

    .signature-box .title {
        font-weight: 700;
        color: #475569;
        margin-bottom: 3rem;
    }

    .signature-box .name {
        font-weight: 700;
        color: #1e293b;
    }

    .signature-box .nip {
        color: #64748b;
        font-size: 0.9rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .profile-grid {
            grid-template-columns: 1fr;
        }
        .signature-section {
            grid-template-columns: 1fr;
        }
    }

    /* Print Styles */
    @media print {
        .skp-tabs, .btn-modern, .btn-action-sm, .section-header .btn-add {
            display: none !important;
        }
        .card-modern {
            box-shadow: none;
            border: 1px solid #e2e8f0;
        }
    }
</style>

<div class="container-fluid" style="max-width: 1400px; margin: 2rem auto; padding: 0 1.5rem;">
    <!-- Modern Tabs -->
    <ul class="nav skp-tabs" id="skpTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="rencana-tab" data-bs-toggle="tab" data-bs-target="#rencana" type="button" role="tab">
                <i class="bi bi-bullseye me-2"></i>Rencana SKP
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="evaluasi-tab" data-bs-toggle="tab" data-bs-target="#evaluasi" type="button" role="tab">
                <i class="bi bi-clipboard-check me-2"></i>Evaluasi
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="report-tab" data-bs-toggle="tab" data-bs-target="#report" type="button" role="tab">
                <i class="bi bi-journal-text me-2"></i>Laporan
            </button>
        </li>
    </ul>

    <div class="tab-content" id="skpTabContent">
        <!-- RENCANA SKP TAB -->
        <div class="tab-pane fade show active" id="rencana" role="tabpanel">
            <div class="card-modern">
                <div class="card-header-modern d-flex justify-content-between align-items-center">
                    <h5><i class="bi bi-file-earmark-text me-2"></i>Sasaran Kinerja Pegawai</h5>
                    <a href="{{ url('project.rencana_pdf/'.$user->id) }}" target="_blank" class="btn btn-modern btn-print">
                        <i class="bi bi-printer-fill"></i>CETAK PDF
                    </a>
                </div>
                <div class="card-body-modern">
                    <!-- Header Info -->
                    <div class="text-center mb-4">
                        @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
                            <h4 class="fw-bold" style="color: #1e293b;">SASARAN KINERJA PEGAWAI PEJABAT FUNGSIONAL</h4>
                            <h5 class="fw-semibold" style="color: #667eea;">{{ $user->jabatan }}</h5>
                            <p class="text-muted">PENDEKATAN HASIL KERJA KUANTITATIF</p>
                        @else
                            <h4 class="fw-bold" style="color: #1e293b;">SASARAN KINERJA PEGAWAI</h4>
                        @endif
                    </div>

                    <!-- Instansi Info Cards -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-label"><i class="bi bi-building me-1"></i>Nama Instansi</div>
                                <div class="info-value">
                                    @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
                                        {{ $user->unit_kerja }}
                                    @else
                                        Dinas Pendidikan Pro. Kep. Bangka Belitung
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card" style="border-left-color: #f59e0b;">
                                <div class="info-label"><i class="bi bi-calendar-range me-1"></i>Periode Penilaian</div>
                                <div class="info-value">
                                    {{ Carbon\Carbon::parse($user->tgl_awal)->translatedFormat('d F Y') }} s.d {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Grid -->
                    <div class="profile-grid">
                        <!-- Pegawai Yang Dinilai -->
                        <div class="profile-section">
                            <h6>
                                <i class="bi bi-person-badge"></i>
                                PEGAWAI YANG DINILAI
                                <a href="/project.edit_user/{{ $user->id }}" class="btn btn-action-sm btn-edit-sm float-end">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </h6>
                            <div class="profile-item">
                                <span class="label">Nama</span>
                                <span class="value">{{ $user->name }}</span>
                            </div>
                            <div class="profile-item">
                                <span class="label">NIP</span>
                                <span class="value">{{ $user->nip }}</span>
                            </div>
                            <div class="profile-item">
                                <span class="label">Pangkat/Gol Ruang</span>
                                <span class="value">{{ $user->pangkat_gol }}</span>
                            </div>
                            <div class="profile-item">
                                <span class="label">Jabatan</span>
                                <span class="value">{{ $user->jabatan }}</span>
                            </div>
                            <div class="profile-item">
                                <span class="label">Unit Kerja</span>
                                <span class="value">{{ $user->unit_kerja }}</span>
                            </div>
                        </div>

                        <!-- Pejabat Penilai -->
                        <div class="profile-section" style="background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); border-color: #3b82f6;">
                            <h6 style="color: #1e40af;">
                                <i class="bi bi-person-check"></i>
                                PEJABAT PENILAI KINERJA
                                <a href="/penilai.edit_penilai/{{ $user->penilai->id }}" class="btn btn-action-sm btn-edit-sm float-end">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </h6>
                            <div class="profile-item" style="border-color: rgba(59, 130, 246, 0.2);">
                                <span class="label" style="color: #1e3a8a;">Nama</span>
                                <span class="value" style="color: #1e40af;">{{ $user->penilai->nama }}</span>
                            </div>
                            <div class="profile-item" style="border-color: rgba(59, 130, 246, 0.2);">
                                <span class="label" style="color: #1e3a8a;">NIP</span>
                                <span class="value" style="color: #1e40af;">{{ $user->penilai->nip }}</span>
                            </div>
                            <div class="profile-item" style="border-color: rgba(59, 130, 246, 0.2);">
                                <span class="label" style="color: #1e3a8a;">Pangkat/Gol Ruang</span>
                                <span class="value" style="color: #1e40af;">{{ optional($user->penilai)->pangkat_gol ?? '' }}</span>
                            </div>
                            <div class="profile-item" style="border-color: rgba(59, 130, 246, 0.2);">
                                <span class="label" style="color: #1e3a8a;">Jabatan</span>
                                <span class="value" style="color: #1e40af;">{{ $user->penilai->jabatan }}</span>
                            </div>
                            <div class="profile-item" style="border-color: rgba(59, 130, 246, 0.2);">
                                <span class="label" style="color: #1e3a8a;">Unit Kerja</span>
                                <span class="value" style="color: #1e40af;">{{ $user->penilai->unit_kerja }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Rencana Hasil Kerja -->
                    <div class="section-header">
                        <div class="section-title">
                            <i class="bi bi-list-check" style="color: #667eea;"></i>
                            Rencana Hasil Kerja
                        </div>
                        <div>
                            <a href="{{ url('tugas.tambah/' . $user->id) }}" class="btn btn-modern btn-add btn-sm">
                                <i class="bi bi-plus-lg"></i>RKU
                            </a>
                            <a href="{{ url('tutam.tambah/'.$user->id) }}" class="btn btn-modern btn-add btn-sm">
                                <i class="bi bi-plus-lg"></i>RKT
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-modern">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>Rencana Hasil Kerja Atasan</th>
                                    <th>Rencana Hasil Kerja</th>
                                    <th style="width: 40%;">Indikator Kinerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->tugas as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span>{{ $data->rk->name ?? '-' }}</span>
                                            <div class="btn-group">
                                                <a href="/tugas.edit_tugas/{{ $data->id }}" class="btn btn-action-sm btn-edit-sm">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="/tugas.delete/{{ $data->id }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                                    @csrf @method('delete')
                                                    <button class="btn btn-action-sm btn-delete-sm">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span>{{ $data->name }}</span>
                                            <a href="{{ url('tupoksi.tambah/'.$data->id) }}" class="btn btn-action-sm btn-add-sm">
                                                <i class="bi bi-plus-lg"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        @foreach ($data->tupoksi as $item)
                                        <div class="nested-table">
                                            <table class="table table-sm table-borderless mb-0">
                                                <tr>
                                                    <td style="width: 100px;"><strong>{{ $item->aspek }}</strong></td>
                                                    <td style="width: 20px;">:</td>
                                                    <td>
                                                        {{ $item->indikator }}
                                                        <div class="mt-2">
                                                            <a href="{{ url('tupoksi.edit_tupoksi/'.$item->id) }}" class="btn btn-action-sm btn-edit-sm">
                                                                <i class="bi bi-pencil"></i>
                                                            </a>
                                                            <form action="/tupoksi.destroy/{{ $item->id }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                                                @csrf @method('delete')
                                                                <button class="btn btn-action-sm btn-delete-sm">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td style="width: 100px;" class="text-center">
                                                        <span class="badge bg-primary">{{ $item->target }}</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach

                                @foreach ($user->tutam as $data)
                                <tr style="background: #fef3c7;">
                                    <td colspan="4" class="fw-bold">
                                        <i class="bi bi-plus-circle me-2"></i>TAMBAHAN
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span>{{ $data->rk->name }}</span>
                                            <div class="btn-group">
                                                <a href="{{ url('tutam.edit/'.$data->id) }}" class="btn btn-action-sm btn-edit-sm">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="/tutam.destroy/{{ $data->id }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                                    @csrf @method('delete')
                                                    <button class="btn btn-action-sm btn-delete-sm">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span>{{ $data->name }}</span>
                                            <a href="{{ url('tuti.tambah/'.$data->id) }}" class="btn btn-action-sm btn-add-sm">
                                                <i class="bi bi-plus-lg"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        @foreach ($data->tuti as $item)
                                        <div class="nested-table">
                                            <table class="table table-sm table-borderless mb-0">
                                                <tr>
                                                    <td style="width: 100px;"><strong>{{ $item->aspek }}</strong></td>
                                                    <td style="width: 20px;">:</td>
                                                    <td>
                                                        {{ $item->indikator }}
                                                        <div class="mt-2">
                                                            <a href="{{ url('tuti.edit/'.$item->id) }}" class="btn btn-action-sm btn-edit-sm">
                                                                <i class="bi bi-pencil"></i>
                                                            </a>
                                                            <form action="/tuti.destroy/{{ $item->id }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                                                @csrf @method('delete')
                                                                <button class="btn btn-action-sm btn-delete-sm">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td style="width: 100px;" class="text-center">
                                                        <span class="badge bg-primary">{{ $item->target }}</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @include('lampiran.perilaku')
                    @include('lampiran.lampiran')

                    <!-- Signature Section -->
                    <div class="signature-section">
                        <div class="signature-box">
                            <div class="title">PEGAWAI YANG DINILAI</div>
                            <div class="name">{{ $user->name }}</div>
                            <div class="nip">NIP. {{ $user->nip }}</div>
                        </div>
                        <div class="signature-box">
                            <div class="title">
                                @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
                                    Pangkalpinang, {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y') }}
                                @else
                                    Simpang Rimba, {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y') }}
                                @endif
                            </div>
                            <div class="title">PEJABAT PENILAI KINERJA</div>
                            <div class="name">{{ $user->penilai->nama }}</div>
                            <div class="nip">NIP. {{ $user->penilai->nip }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- EVALUASI TAB -->
        <div class="tab-pane fade" id="evaluasi" role="tabpanel">
            <div class="card-modern">
                <div class="card-header-modern d-flex justify-content-between align-items-center">
                    <h5><i class="bi bi-clipboard-check me-2"></i>Evaluasi Kinerja Pegawai</h5>
                    <a href="{{ url('project.evaluasi_pdf/'.$user->id) }}" target="_blank" class="btn btn-modern btn-print">
                        <i class="bi bi-printer-fill"></i>CETAK PDF
                    </a>
                </div>
                <div class="card-body-modern">
                    @include('lampiran.evaluasi')
                </div>
            </div>
        </div>

        <!-- LAPORAN TAB -->
        <div class="tab-pane fade" id="report" role="tabpanel">
            <div class="card-modern">
                <div class="card-header-modern d-flex justify-content-between align-items-center">
                    <h5><i class="bi bi-journal-text me-2"></i>Laporan Kinerja Pegawai</h5>
                    <a href="{{ url('project.report_pdf/'.$user->id) }}" target="_blank" class="btn btn-modern btn-print">
                        <i class="bi bi-printer-fill"></i>CETAK PDF
                    </a>
                </div>
                <div class="card-body-modern">
                    @include('project.report')
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Auto-open tab based on URL hash
    document.addEventListener('DOMContentLoaded', function() {
        const hash = window.location.hash;
        if (hash) {
            const tabTrigger = document.querySelector(`[data-bs-target="${hash}"]`);
            if (tabTrigger) {
                const tab = new bootstrap.Tab(tabTrigger);
                tab.show();
            }
        }
    });
</script>

@endsection
