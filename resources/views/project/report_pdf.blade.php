

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

    /* PENTING: Mencegah baris tabel terpecah */
    table {
        page-break-inside: auto;
        border-collapse: collapse;
        width: 100%;
    }

    tr {
        page-break-inside: avoid !important;
        page-break-after: auto;
    }
    
    /* Specific rule for perilaku kerja table rows to prevent page breaks */
    table.table-bordered tr {
        page-break-inside: avoid !important;
    }
    
    /* More specific rules for perilaku kerja table */
    table.table-bordered tbody tr {
        page-break-inside: avoid !important;
        page-break-after: auto;
    }
    
    /* Force no page breaks inside table cells */
    table.table-bordered td {
        page-break-inside: avoid !important;
    }
    
    /* Additional rule to prevent page breaks inside perilaku kerja rows */
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
    }

    /* Wrapper untuk konten agar tidak terpotong */
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
    .text-justify { text-align: justify; }
    .fw-bold { font-weight: bold; }
    .mb-3 { margin-bottom: 1rem; }
    .mt-2 { margin-top: 0.5rem; }
    .border-dark { border-color: #000 !important; }
    
    /* Signature table specific styles for mPDF */
    .signature-table {
        page-break-inside: avoid !important;
    }
    
    .signature-table td {
        page-break-inside: avoid !important;
        width: 50% !important;
        vertical-align: top !important;
    }
</style>

<img src="{{ asset('image/garuda.png') }}" style="display:block; margin:auto;">


<div class="row">
    <div class="col-md-12">
        <div class="card-header">
            <h4 style="text-align: center">DOKUMEN EVALUASI KINERJA PEGAWAI
                <br>
                PERIODE : TAHUN
                {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat(' Y ') }}
            </h4>
            <hr>
        </div>
    </div>
</div>



<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td style="width: 50%; text-align: left; border: none;">Nama Instansi : {{ ucwords(strtolower($user->unit_kerja)) }}</td>
        <td style="width: 50%; text-align: right; border: none;">Periode Penilaian : {{ Carbon\Carbon::parse($user->tgl_awal)->translatedFormat('d F Y ') }} s.d {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }}</td>
    </tr>
</table>

<table class="table table-custom mb-0 table-sm table-bordered border-primary" style="background-color: beige">
    <tr style="background-color:aliceblue;">
        <th class="text-center" style="width:1cm" rowspan="6">1</th>
        <th colspan="2" style="width:100%; background-color:aliceblue;">PEGAWAI YANG DINILAI</th>
    </tr>
    <tr>
        <th style="width:20%">NAMA</th>
        <td style="text-transform:uppercase"><b>{{ $user->name }}</b></td>
    </tr>
    <tr>
        <th>NIP</th>
        <td>{{ $user->nip }}</td>
    </tr>
    <tr>
        <th>PANGKAT/GOL. RUANG</th>
        <td>{{ $user->pangkat_gol }}</td>
    </tr>
    <tr>
        <th>JABATAN</th>
        <td>{{ $user->jabatan }}</td>
    </tr>
    <tr>
        <th>UNIT KERJA</th>
        <td>{{ $user->unit_kerja }}</td>
    </tr>
    <tr>
        <th class="text-center" style="width:2cm" rowspan="6">2</th>
        <th colspan="2" style="width:42%; background-color:aliceblue;">PEJABAT PENILAI KINERJA</th>
    </tr>
    <tr>
        <th>NAMA</th>
        <td><b>{{ optional($user->penilai)->nama ?? '' }}</b></td>
    </tr>
    <tr>
        <th>NIP</th>
        <td>{{ optional($user->penilai)->nip ?? '' }}</td>
    </tr>
    <tr>
        <th>PANGKAT/GOL. RUANG</th>
        <td>{{ optional($user->penilai)->pangkat_gol ?? '' }}</td>
    </tr>
    <tr>
        <th>JABATAN</th>
        <td>{{ optional($user->penilai)->jabatan ?? '' }}</td>
    </tr>
    <tr>
        <th>UNIT KERJA</th>
        <td>{{ optional($user->penilai)->unit_kerja ?? '' }}</td>
    </tr>
    <tr>
        <th class="text-center" style="width:2cm" rowspan="6">3</th>
        <th colspan="2" style="width:42%; background-color:aliceblue;">ATASAN PEJABAT PENILAI KINERJA</th>
    </tr>
    <tr>
        <th>NAMA</th>
        <td><b>{{ optional($user->atasan)->nama ?? '' }}</b></td>
    </tr>
    <tr>
        <th>NIP</th>
        <td>{{ optional($user->atasan)->nip ?? '' }}</td>
    </tr>
    <tr>
        <th>PANGKAT/GOL. RUANG</th>
        <td>{{ optional($user->atasan)->pangkat_gol ?? '' }}</td>
    </tr>
    <tr>
        <th>JABATAN</th>
        <td>{{ optional($user->atasan)->jabatan ?? '' }}</td>
    </tr>
    <tr>
        <th>UNIT KERJA</th>
        <td>{{ optional($user->atasan)->unit_kerja ?? '' }}</td>
    </tr>

    @if($user->tutam)
        @foreach ($user->tutam as $data)
        <tr style="background-color:aliceblue;">
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $data->rk ? $data->rk->name : '' }}</td>
            <td>{{ $data->name }}</td>
            <td colspan="3">
                @if($data->tuti)
                    @foreach ($data->tuti as $item)
                    <div class="d-flex mb-1">
                        <div style="width:15%">{{ $item->aspek }}</div>
                        <div style="width:5%">:</div>
                        <div style="width:55%; text-align:justify">{{ $item->indikator }}</div>
                        <div style="width:30%; text-align:center">{{ $item->target }}</div>
                    </div>
                    @endforeach
                @endif
            </td>
        </tr>
        @endforeach
    @endif
    <tr style="background-color:aliceblue;">
        <th class="text-center" style="width:2cm" rowspan="3">4</th>
        <th style="background-color:aliceblue;" colspan="2">EVALUASI KINERJA</th>
    </tr>
    <tr>
        <th style="background-color:aliceblue;">CAPAIAN KINERJA ORGANISASI</th>
        <td><b>BAIK</b></td>
    </tr>
    <tr>
        <th style="background-color:aliceblue;">PREDIKAT KINERJA PEGAWAI</th>
        <td><b>BAIK</b></td>
    </tr>
    <tr>
        <th class="text-center" style="width:2cm" rowspan="2">5</th>
        <th style="background-color:aliceblue;" colspan="2">CATATAN/REKOMENDASI</th>
    </tr>
    <tr>
        <td colspan="2" height="100px"></td>
    </tr>
</table>

<div class="row justify-content-around text-center fw-bold mt-5 ">
    <div class="col-4" >
        Pangkalpinang, {{ Carbon\Carbon::parse($user->tgl_pegawai)->translatedFormat('d F Y ') }}
        <br>
        <div   style="text-transform: uppercase">
            PEGAWAI YANG DINILAI <br><br><br><br>
            <b><u>{{ $user->name }}</u></b>
            <br>
            NIP.{{ $user ->nip }}
        </div>
    </div>

    <div class="col-4">
        Pangkalpinang, {{ Carbon\Carbon::parse($user->tgl_penilai)->translatedFormat('d F Y ') }}
        <br>
        PEJABAT PENILAI KINERJA <br><br><br><br>
        <u>{{ $user->penilai ->nama }}</u> <br>
        NIP.{{ $user->penilai ->nip }}
    </div>
</div>
    







