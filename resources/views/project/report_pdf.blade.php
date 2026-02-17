

<style>
    body {
        margin: 0;
        padding: 20px;
        font-family: Arial, sans-serif;
        font-size: 12px;
    }

    .page-break {
        page-break-after: always;
    }

    table {
        page-break-inside: auto;
        border-collapse: collapse;
        width: 100%;
    }

    tr {
        page-break-inside: avoid !important;
        page-break-after: auto;
    }

    table.table-bordered tr {
        page-break-inside: avoid !important;
    }

    table.table-bordered tbody tr {
        page-break-inside: avoid !important;
        page-break-after: auto;
    }

    table.table-bordered td {
        page-break-inside: avoid !important;
    }

    .perilaku-row {
        page-break-inside: avoid !important;
        break-inside: avoid !important;
    }

    td, th {
        page-break-inside: avoid !important;
        vertical-align: top;
        border: 1px solid #000;
        padding: 4px;
    }

    table.table-borderless,
    table.table-borderless th,
    table.table-borderless td {
        border: none !important;
        background-color: transparent !important;
    }

    .cell-content {
        page-break-inside: avoid !important;
        margin: 4px 0;
    }

    thead {
        display: table-header-group;
    }

    tfoot {
        display: table-footer-group;
    }

    .text-center { text-align: center; }
    .text-left { text-align: left; }
    .text-justify { text-align: justify; }
    .fw-bold { font-weight: bold; }
    .mb-3 { margin-bottom: 1rem; }
    .mt-2 { margin-top: 0.5rem; }
    .border-dark { border-color: #000 !important; }

    .signature-table {
        page-break-inside: avoid !important;
        width: 100%;
        border: none;
    }

    .signature-table td {
        page-break-inside: avoid !important;
        width: 50%;
        vertical-align: top;
        border: none;
    }

    .signature-content {
        text-align: center;
        width: 100%;
    }

    .signature-content b {
        display: block;
    }
</style>


<div style="text-align: center; margin-bottom: 10px;">
    <img src="{{ public_path('image/garuda.png') }}" style="display: inline-block; width: 80px; height: 80px;">
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card-header">
            <h4 style="text-align: center">DOKUMEN EVALUASI KINERJA PEGAWAI
                <br>
                PERIODE : TAHUN
                {{ \Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat(' Y ') }}
            </h4>
            <hr>
        </div>
    </div>
</div>

<table style="width: 100%; border-collapse: collapse; margin-bottom: 10px;">
    <tr>
        <td style="width: 50%; text-align: left; border: none;">Nama Instansi : {{ ucwords(strtolower($user->unit_kerja)) }}</td>
        <td style="width: 50%; text-align: right; border: none;">Periode Penilaian : {{ \Carbon\Carbon::parse($user->tgl_awal)->translatedFormat('d F Y ') }} s.d {{ \Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }}</td>
    </tr>
</table>

<table class="table table-custom mb-0 table-sm table-bordered border-primary">
    <tr>
        <th class="text-center" style="width:1cm" rowspan="6">1</th>
        <th style="text-align: left;" colspan="2" >PEGAWAI YANG DINILAI</th>
    </tr>
    <tr>
        <th style=" text-align: left;">NAMA</th>
        <td style="text-transform:uppercase"><b>{{ $user->name }}</b></td>
    </tr>
    <tr>
        <th style="text-align: left;">NIP</th>
        <td>{{ $user->nip }}</td>
    </tr>
    <tr>
        <th style="text-align: left;">PANGKAT/GOL. RUANG</th>
        <td>{{ $user->pangkat_gol }}</td>
    </tr>
    <tr>
        <th style="text-align: left;">JABATAN</th>
        <td>{{ $user->jabatan }}</td>
    </tr>
    <tr>
        <th style="text-align: left;">UNIT KERJA</th>
        <td>{{ $user->unit_kerja }}</td>
    </tr>
    <tr>
        <th class="text-center" style="width:2cm" rowspan="6">2</th>
        <th style="text-align: left;" colspan="2">PEJABAT PENILAI KINERJA</th>
    </tr>
    <tr>
        <th style=" text-align: left;">NAMA</th>
        <td><b>{{ optional($user->penilai)->nama ?? '' }}</b></td>
    </tr>
    <tr>
        <th style="text-align: left;">NIP</th>
        <td>{{ optional($user->penilai)->nip ?? '' }}</td>
    </tr>
    <tr>
        <th style="text-align: left;">PANGKAT/GOL. RUANG</th>
        <td>{{ optional($user->penilai)->pangkat_gol ?? '' }}</td>
    </tr>
    <tr>
        <th style="text-align: left;">JABATAN</th>
        <td>{{ optional($user->penilai)->jabatan ?? '' }}</td>
    </tr>
    <tr>
        <th style="text-align: left;">UNIT KERJA</th>
        <td>{{ optional($user->penilai)->unit_kerja ?? '' }}</td>
    </tr>
    <tr>
        <th class="text-center" style="width:2cm" rowspan="6">3</th>
        <th style="text-align: left;" colspan="2">ATASAN PEJABAT PENILAI KINERJA</th>

    </tr>
    <tr>
        <th style=" text-align: left;">NAMA</th>
        <td><b>{{ optional($user->atasan)->nama ?? '' }}</b></td>
    </tr>
    <tr>
        <th style="text-align: left;">NIP</th>
        <td>{{ optional($user->atasan)->nip ?? '' }}</td>
    </tr>
    <tr>
        <th style="text-align: left;">PANGKAT/GOL. RUANG</th>
        <td>{{ optional($user->atasan)->pangkat_gol ?? '' }}</td>
    </tr>
    <tr>
        <th style="text-align: left;">JABATAN</th>
        <td>{{ optional($user->atasan)->jabatan ?? '' }}</td>
    </tr>
    <tr>
        <th style="text-align: left;">UNIT KERJA</th>
        <td>{{ optional($user->atasan)->unit_kerja ?? '' }}</td>
    </tr>

    <!-- <tr>
        <td class="text-center" colspan="3">TUGAS TAMBAHAN (TUTAM) DATA NOT LOADED FOR PERFORMANCE</td>
    </tr> -->
    <tr>
        <th class="text-center" style="width:2cm" rowspan="3">4</th>
        <th style="text-align: left;" colspan="2">EVALUASI KINERJA</th>
    </tr>
    <tr>
        <th style="text-align: left;">CAPAIAN KINERJA ORGANISASI</th>
        <td><b>BAIK</b></td>
    </tr>
    <tr>
        <th style="text-align: left;">PREDIKAT KINERJA PEGAWAI</th>
        <td><b>BAIK</b></td>
    </tr>
    <tr>
        <th class="text-center" style="width:2cm" rowspan="2">5</th>
        <th style="text-align: left;" colspan="2">CATATAN/REKOMENDASI</th>
    </tr>
    <tr>
        <td colspan="2" height="100px"></td>
    </tr>
</table>
<br><br>
<table class="signature-table">
    <tr>
        <td style="text-align: center;">
            <div class="signature-content">
                Pangkalpinang, {{ \Carbon\Carbon::parse($user->tgl_pegawai)->translatedFormat('d F Y ') }}
                <br><br>
                <div style="text-transform: uppercase; margin-top: 50px;">
                    <b>PEGAWAI YANG DINILAI</b><br><br><br><br>
                    <u>{{ $user->name }}</u>
                    <br>
                    NIP.{{ $user->nip }}
                </div>
            </div>
        </td>
        <td style="text-align: center;">
            <div class="signature-content">
                Pangkalpinang, {{ \Carbon\Carbon::parse($user->tgl_penilai)->translatedFormat('d F Y ') }}
                <br><br>
                <div style="text-transform: uppercase; margin-top: 50px;">
                    <b>PEJABAT PENILAI KINERJA</b><br><br><br><br>
                    <u>{{ $user->penilai ? $user->penilai->nama : '_____________________' }}</u>
                    <br>
                    NIP.{{ $user->penilai ? $user->penilai->nip : '_____________________' }}
                </div>
            </div>
        </td>
    </tr>
</table>
    







