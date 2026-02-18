<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KP-4.2 - {{ $data->name }}</title>
    <style>
        body { font-family: helvetica, sans-serif; font-size: 10px; }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 3px; }
        .header { text-align: center; margin-bottom: 20px; }
        .title { font-weight: bold; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="header">
        <p><strong>KP-4.2</strong></p>
        <p class="title">SURAT KETERANGAN<br>UNTUK MENDAPATKAN PEMBAYARAN TUNJANGAN KELUARGA</p>
    </div>

    <table cellpadding="2" cellspacing="0">
        <tr>
            <td style="width: 30px">1.</td>
            <td style="width: 200px">Nama</td>
            <td style="width: 20px">:</td>
            <td>{{ $data->name }}</td>
            <td style="width: 130px">NIP. {{ $data->nip }}</td>
        </tr>
        <tr>
            <td>2.</td>
            <td>Tempat / Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $data->tempat_lahir ?? '-' }} / {{ \Carbon\Carbon::parse($data->tgl_lahir)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td>3.</td>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $data->jk }}</td>
        </tr>
        <tr>
            <td>4.</td>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $data->agama }}</td>
        </tr>
        <tr>
            <td>5.</td>
            <td>Kebangsaan</td>
            <td>:</td>
            <td>Indonesia</td>
        </tr>
        <tr>
            <td>6.</td>
            <td>Pangkat / Golongan / Status Kepegawaian</td>
            <td>:</td>
            <td>{{ $data->pangkat_gol ?? '-' }}<br>{{ $data->status ?? '-' }}</td>
        </tr>
        <tr>
            <td>7.</td>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{ $data->jabatan ?? '-' }}</td>
        </tr>
        <tr>
            <td>8.</td>
            <td>Instansi / Unit Kerja</td>
            <td>:</td>
            <td>{{ $data->unit_kerja ?? '-' }}</td>
        </tr>
        <tr>
            <td>9.</td>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $data->alamat ?? '-' }}</td>
        </tr>
    </table>

    <p class="mt-4"><strong>Menyatakan dengan sesungguhnya bahwa saya :</strong></p>

    @if(isset($pasanganData) && $pasanganData->count() > 0)
        @foreach($pasanganData as $pasangan)
        <table cellpadding="2" cellspacing="0" style="margin-top: 10px;">
            <tr>
                <td style="width: 30px">1.</td>
                <td style="width: 200px">Nama</td>
                <td style="width: 20px">:</td>
                <td>{{ $pasangan->name ?? '-' }}</td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $pasangan->tempat_lahir ?? '-' }} / {{ isset($pasangan->tgl_lahir) ? \Carbon\Carbon::parse($pasangan->tgl_lahir)->format('d-m-Y') : '-' }}</td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $pasangan->jk ?? '-' }}</td>
            </tr>
            <tr>
                <td>4.</td>
                <td>Agama</td>
                <td>:</td>
                <td>{{ $pasangan->agama ?? '-' }}</td>
            </tr>
            <tr>
                <td>5.</td>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{ $pasangan->pekerjaan ?? '-' }}</td>
            </tr>
            <tr>
                <td>6.</td>
                <td>Tanggal Perkawinan</td>
                <td>:</td>
                <td>{{ isset($pasangan->tgl_kawin) ? \Carbon\Carbon::parse($pasangan->tgl_kawin)->format('d-m-Y') : '-' }}</td>
            </tr>
            <tr>
                <td>7.</td>
                <td>Status</td>
                <td>:</td>
                <td>{{ $pasangan->status ?? '-' }}</td>
            </tr>
        </table>
        @endforeach
    @else
        <p><em>Belum ada data pasangan.</em></p>
    @endif

    <p class="mt-4">Demikian surat keterangan ini saya buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>

    <table style="margin-top: 30px; width: auto;">
        <tr>
            <td style="text-align: center; width: 250px;">
                {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM Y') }}<br>
                Yang Membuat Pernyataan,
            </td>
        </tr>
        <tr>
            <td style="height: 80px;"></td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <strong>{{ $data->name }}</strong><br>
                NIP. {{ $data->nip }}
            </td>
        </tr>
    </table>
</body>
</html>
