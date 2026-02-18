@extends('layout.sidebar')

@section('content')

<style>
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    .table-container {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }
    .table-custom thead {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    .btn-action {
        margin-right: 5px;
    }
</style>

<div class="container-fluid mt-4">
    <!-- Page Header -->
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h3 class="fw-bold mb-1"><i class="fa fa-file-invoice me-2"></i>KP-4.1 - Daftar Pegawai</h3>
            <p class="mb-0 opacity-75">Daftar Pegawai untuk Pencetakan KP-4.1 (Data Anak)</p>
        </div>
        <a href="{{ url('pegawai.create') }}" class="btn btn-light">
            <i class="fa fa-plus me-2"></i>Tambah Pegawai
        </a>
    </div>

    <!-- Table -->
    <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Daftar Pegawai</h5>
            <div class="d-flex gap-2">
                <input type="text" class="form-control" id="searchTable" placeholder="Cari pegawai..." style="width: 250px;">
                <button class="btn btn-success" onclick="printAll()">
                    <i class="fa fa-print me-1"></i>Print All
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-custom" id="pegawaiTable">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="25%">Nama</th>
                        <th width="15%">NIP</th>
                        <th width="15%">Jabatan</th>
                        <th width="15%">Pangkat/Gol</th>
                        <th width="15%">Jml Anak</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pegawai as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <strong>{{ $item->name }}</strong>
                            <br>
                            <small class="text-muted">{{ $item->jenis }} - {{ $item->status }}</small>
                        </td>
                        <td>{{ $item->nip ?? '-' }}</td>
                        <td>{{ $item->jabatan ?? '-' }}</td>
                        <td>{{ $item->pangkat_gol ?? '-' }}</td>
                        <td>
                            @php
                                $jumlahAnak = $item->anak ? $item->anak->where('kat', 1)->count() : 0;
                            @endphp
                            <span class="badge bg-{{ $jumlahAnak > 0 ? 'success' : 'secondary' }}">
                                {{ $jumlahAnak }} Anak
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('kp4', $item->id) }}" class="btn btn-sm btn-info btn-action" title="Lihat Detail">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('kp4pdf', $item->id) }}" class="btn btn-sm btn-danger btn-action" title="Cetak PDF" target="_blank">
                                <i class="fa fa-file-pdf"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <i class="fa fa-inbox fa-3x text-muted mb-3 d-block"></i>
                            <p class="text-muted">Belum ada data pegawai</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Info Card -->
    <div class="alert alert-info mt-3">
        <i class="fa fa-info-circle me-2"></i>
        <strong>Informasi:</strong> KP-4.1 adalah daftar riwayat hidup anak pegawai. 
        Klik tombol <i class="fa fa-file-pdf text-danger"></i> untuk mencetak PDF individual.
    </div>
</div>

<script>
    // Search functionality
    document.getElementById('searchTable').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#pegawaiTable tbody tr');
        rows.forEach(row => {
            let name = row.cells[1]?.innerText.toLowerCase();
            row.style.display = name && name.includes(filter) ? '' : 'none';
        });
    });

    // Print all (open all PDFs in new tabs)
    function printAll() {
        let links = document.querySelectorAll('a[title="Cetak PDF"]');
        if (links.length === 0) {
            alert('Tidak ada data untuk dicetak');
            return;
        }
        
        if (confirm('Akan membuka ' + links.length + ' tab PDF. Izinkan popup untuk melanjutkan.')) {
            links.forEach((link, index) => {
                setTimeout(() => {
                    window.open(link.href, '_blank');
                }, index * 500); // Stagger opening to avoid popup blocker
            });
        }
    }
</script>

@endsection
