<!DOCTYPE html>
<html>
<head>
    <title>Laporan Cuti</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        @page {
            size: A4;
            margin: 1cm;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .signature-section {
            margin-top: 40px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN DATA CUTI PEGAWAI</h2>
        <p>Periode: {{ request()->get('tgl_awal') ? \Carbon\Carbon::parse(request()->get('tgl_awal'))->format('d M Y') : 'Semua Tanggal' }} 
           s.d {{ request()->get('tgl_akhir') ? \Carbon\Carbon::parse(request()->get('tgl_akhir'))->format('d M Y') : 'Semua Tanggal' }}</p>
    </div>

    <button class="btn btn-success mb-3 no-print" onclick="window.print();">Cetak Laporan</button>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Jenis Cuti</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
                <th>Durasi (Hari)</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cutiData as $cuti)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cuti->user->name ?? 'N/A' }}</td>
                <td>{{ $cuti->jenis_cuti ?? 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($cuti->tgl_awal)->translatedFormat('d F Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($cuti->tgl_akhir)->translatedFormat('d F Y') }}</td>
                <td>{{ $cuti->jlh_hari }} Hari</td>
                <td>
                    @if($cuti->status == 'disetujui')
                        <span class="badge bg-success">Disetujui</span>
                    @elseif($cuti->status == 'ditolak')
                        <span class="badge bg-danger">Ditolak</span>
                    @else
                        <span class="badge bg-warning">Menunggu</span>
                    @endif
                </td>
                <td>{{ $cuti->keterangan ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">Tidak ada data cuti</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="signature-section row">
        <div class="col-md-6 offset-md-6 text-center">
            <p>Pangkalpinang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <p>Mengetahui,</p>
            <br><br><br>
            <p><strong>(_______________________)</strong></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>