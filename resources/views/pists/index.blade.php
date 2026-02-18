@extends('layout.sidebar')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .index-container {
        max-width: 1400px;
        margin: 2rem auto;
        padding: 0 1.5rem;
    }
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 8px 30px rgba(102, 126, 234, 0.3);
    }
    .page-title {
        color: white;
        font-weight: 700;
        margin: 0;
        font-size: 1.5rem;
        letter-spacing: 0.5px;
    }
    .page-subtitle {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.9rem;
        margin-top: 0.5rem;
    }
    .header-actions {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }
    .btn-header {
        border-radius: 10px;
        padding: 0.6rem 1.2rem;
        font-weight: 500;
        transition: all 0.3s ease;
        border: 2px solid rgba(255, 255, 255, 0.3);
        background: rgba(255, 255, 255, 0.15);
        color: white;
    }
    .btn-header:hover {
        background: white;
        color: #667eea;
        transform: translateY(-2px);
    }
    .btn-add {
        background: #48bb78;
        border: none;
        color: white;
    }
    .btn-add:hover {
        background: #38a169;
        color: white;
    }
    .card-modern {
        border: none;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
    }
    .card-modern:hover {
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        transform: translateY(-2px);
    }
    .card-header-modern {
        background: linear-gradient(135deg, #f6f8fb 0%, #edf2f7 100%);
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .trip-number {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.9rem;
    }
    .trip-date {
        font-size: 0.85rem;
        color: #718096;
        font-weight: 500;
    }
    .participant-badge {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .card-body-modern {
        padding: 1.5rem;
    }
    .participant-list {
        list-style: none;
        padding: 0;
        margin: 0 0 1rem 0;
    }
    .participant-list li {
        padding: 0.5rem 0;
        border-bottom: 1px solid #f0f0f0;
        color: #4a5568;
        font-size: 0.9rem;
    }
    .participant-list li:last-child {
        border-bottom: none;
    }
    .participant-list i {
        color: #667eea;
        margin-right: 0.5rem;
    }
    .detail-section {
        background: #f8fafc;
        border-radius: 12px;
        padding: 1rem;
        margin-top: 1rem;
    }
    .detail-item {
        margin-bottom: 0.75rem;
        font-size: 0.9rem;
    }
    .detail-item:last-child {
        margin-bottom: 0;
    }
    .detail-label {
        font-weight: 600;
        color: #4a5568;
    }
    .detail-value {
        color: #718096;
    }
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
        flex-wrap: wrap;
    }
    .btn-action {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        border: none;
        font-size: 0.9rem;
    }
    .btn-photo {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    .btn-photo:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }
    .btn-form {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }
    .btn-form:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(245, 87, 108, 0.4);
    }
    .btn-report {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
    }
    .btn-report:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(79, 172, 254, 0.4);
    }
    .btn-pdf {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        color: white;
    }
    .btn-pdf:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(250, 112, 154, 0.4);
    }
    .btn-view {
        background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
        color: white;
    }
    .btn-view:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(72, 187, 120, 0.4);
    }
    .btn-no-file {
        background: #fed7d7;
        color: #c53030;
    }
    .btn-edit {
        background: linear-gradient(135deg, #f6ad55 0%, #ed8936 100%);
        color: white;
    }
    .btn-edit:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(237, 137, 54, 0.4);
    }
    .btn-delete {
        background: linear-gradient(135deg, #fc8181 0%, #f56565 100%);
        color: white;
    }
    .btn-delete:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(245, 101, 101, 0.4);
    }
    .collapse-modern {
        margin-top: 1rem;
    }
    .btn-toggle {
        background: transparent;
        border: 2px solid #e2e8f0;
        color: #4a5568;
        padding: 0.5rem 1rem;
        border-radius: 10px;
        font-size: 0.85rem;
        font-weight: 500;
        transition: all 0.3s ease;
        width: 100%;
        text-align: left;
    }
    .btn-toggle:hover {
        border-color: #667eea;
        color: #667eea;
        background: #f8fafc;
    }
    .btn-toggle[aria-expanded="true"] {
        border-color: #667eea;
        color: #667eea;
        background: #f8fafc;
    }
    .status-indicator {
        font-size: 1.2rem;
    }
    .pagination-modern .pagination {
        justify-content: center;
        margin-top: 2rem;
    }
    .pagination-modern .page-link {
        border: none;
        color: #4a5568;
        padding: 0.6rem 1rem;
        margin: 0 0.25rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    .pagination-modern .page-item.active .page-link {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    .pagination-modern .page-link:hover {
        background: #edf2f7;
        color: #667eea;
    }
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #a0aec0;
    }
    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
    @media print {
        .no-print {
            display: none !important;
        }
        .card-modern {
            box-shadow: none;
            border: 1px solid #e2e8f0;
        }
    }
</style>

<div class="index-container">
    <!-- Page Header -->
    <div class="page-header no-print">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h1 class="page-title">
                    <i class="bi bi-file-earmark-text me-2"></i>Surat Tugas Perjalanan Dinas
                </h1>
                <p class="page-subtitle">Daftar Perjalanan Dinas Dalam/Luar Daerah</p>
            </div>
            <div class="header-actions">
                <button onclick="window.print();" class="btn btn-header">
                    <i class="bi bi-printer me-1"></i>Print
                </button>
                <a href="{{ url('pists.create') }}" class="btn btn-header btn-add">
                    <i class="bi bi-plus-lg me-1"></i>Tambah Data
                </a>
            </div>
        </div>
    </div>

    <!-- Data List -->
    @if($data->count() > 0)
        @foreach($data as $d)
        <div class="card card-modern">
            <div class="card-header card-header-modern">
                <div class="d-flex align-items-center gap-3">
                    <div class="trip-number">{{ ($data->currentPage()-1) * $data->perPage() + $loop->index + 1 }}</div>
                    <div>
                        <div class="trip-date">
                            <i class="bi bi-calendar3 me-1"></i>
                            @include('pists.tanggal')
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    @if($d->selected > 1)
                        <span class="participant-badge">
                            <i class="bi bi-people-fill me-1"></i>{{ $d->selected }} Peserta
                        </span>
                    @endif
                    @if($d->asal_surat != '-')
                        <span class="status-indicator" title="Surat Lengkap">
                            <i class="bi bi-check-circle-fill text-success"></i>
                        </span>
                    @else
                        <span class="status-indicator" title="Surat Sederhana">
                            <i class="bi bi-feather text-muted"></i>
                        </span>
                    @endif
                </div>
            </div>
            <div class="card-body card-body-modern">
                <div class="row">
                    <div class="col-lg-7">
                        <h6 class="mb-3" style="color: #4a5568; font-weight: 600;">
                            <i class="bi bi-people me-2"></i>Peserta Perjalanan Dinas
                        </h6>
                        <ul class="participant-list">
                            @foreach ($d['cat'] as $x)
                                @php
                                    $fullname = $x;
                                    $name = explode('-', $fullname);
                                    $a = $name[0];
                                    $b = $name[2];
                                    $c = $name[1];
                                @endphp
                                <li>
                                    <i class="bi bi-person-circle"></i>
                                    <strong>{{ $a }}</strong> <small class="text-muted">({{ $b }})</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-5">
                        <button class="btn btn-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDetail{{ $d->id }}" aria-expanded="false">
                            <i class="bi bi-info-circle me-2"></i>Lihat Detail Perjalanan Dinas
                            <i class="bi bi-chevron-down float-end"></i>
                        </button>
                        <div class="collapse collapse-modern" id="collapseDetail{{ $d->id }}">
                            <div class="detail-section">
                                @if($d->asal_surat == '-')
                                    <div class="detail-item">
                                        <span class="detail-label"><i class="bi bi-calendar-event me-1"></i>Acara:</span>
                                        <div class="detail-value">{{ $d->acara }}</div>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label"><i class="bi bi-geo-alt me-1"></i>Tempat:</span>
                                        <div class="detail-value">{{ $d->tempat }}</div>
                                    </div>
                                @else
                                    <div class="detail-item">
                                        <span class="detail-label"><i class="bi bi-person-badge me-1"></i>Dasar Surat:</span>
                                        <div class="detail-value">Surat Kepala {{ $d->asal_surat }}</div>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label"><i class="bi bi-hash me-1"></i>Nomor:</span>
                                        <div class="detail-value">{{ $d->no_asal_surat }}</div>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label"><i class="bi bi-file-text me-1"></i>Hal:</span>
                                        <div class="detail-value">{{ $d->description }}</div>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label"><i class="bi bi-calendar-check me-1"></i>Tanggal:</span>
                                        <div class="detail-value">{{ Carbon\Carbon::Parse($d->tgl_surat_dasar)->translatedFormat('d F Y') }}</div>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label"><i class="bi bi-geo-alt me-1"></i>Tempat:</span>
                                        <div class="detail-value">{{ $d->tempat }}</div>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label"><i class="bi bi-calendar-event me-1"></i>Acara:</span>
                                        <div class="detail-value">{{ $d->acara }}</div>
                                    </div>
                                @endif
                                <div class="detail-item">
                                    <span class="detail-label"><i class="bi bi-people me-1"></i>Jumlah Peserta:</span>
                                    <div class="detail-value">{{ $d->selected }} orang</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-4 pt-3" style="border-top: 1px solid #e2e8f0;">
                    <div class="action-buttons">
                        <a href="/pists.photo/{{ $d->id }}" class="btn btn-action btn-photo" title="Foto">
                            <i class="bi bi-camera"></i>
                        </a>
                        <a href="/pists.form/{{ $d->id }}" class="btn btn-action btn-form" title="Formulir">
                            <i class="bi bi-envelope"></i>
                        </a>
                        <a href="/pists.laporan/{{ $d->id }}" class="btn btn-action btn-report" title="Laporan">
                            <i class="bi bi-journal-text"></i>
                        </a>
                        <a href="/stpdf/{{ $d->id }}" class="btn btn-action btn-pdf" title="Download PDF">
                            <i class="bi bi-file-earmark-pdf"></i>
                        </a>
                        @if ($d->path_bukti_pengajuan != "")
                            <a href="{{ route('pegawai.cuti.status.buktipengajuan', ['pists' => $d->id]) }}" target="_blank" class="btn btn-action btn-view" title="Lihat Bukti">
                                <i class="bi bi-eye"></i>
                            </a>
                        @else
                            <button class="btn btn-action btn-no-file" title="Tidak ada bukti" disabled>
                                <i class="bi bi-file-earmark-x"></i>
                            </button>
                        @endif
                        <a href="{{ url('pists.edit', $d->id) }}" class="btn btn-action btn-edit" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form onsubmit="return confirm('Yakin hapus data?..')" class="d-inline" action="{{ url('pists.destroy', $d->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-action btn-delete" type="submit" title="Hapus">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Pagination -->
        <div class="pagination-modern">
            {{ $data->links() }}
        </div>
    @else
        <div class="card card-modern">
            <div class="card-body">
                <div class="empty-state">
                    <i class="bi bi-inbox"></i>
                    <h5>Belum ada data perjalanan dinas</h5>
                    <p>Silakan tambahkan data perjalanan dinas baru</p>
                    <a href="{{ url('pists.create') }}" class="btn btn-header btn-add mt-2">
                        <i class="bi bi-plus-lg me-1"></i>Tambah Data Pertama
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Bootstrap collapse
        const collapseElementList = document.querySelectorAll('.collapse');
        collapseElementList.forEach(collapseEl => {
            new bootstrap.Collapse(collapseEl, {
                toggle: false
            });
        });
    });
</script>

@endsection
