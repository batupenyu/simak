<!DOCTYPE html>
<html>
<head>
    <title>Rekapitulasi KP4</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 5px;
        }
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                margin: 0;
                padding: 0;
            }
            table {
                page-break-inside: auto;
            }
            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
        }
        .no-print {
            margin: 10px;
            padding: 10px;
            background-color: #f0f0f0;
            text-align: center;
        }
        .btn-print {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
        }
        .btn-print:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="no-print">
        <button type="button" class="btn-print" id="printBtn">🖨️ Print</button>
    </div>

    <script>
        document.getElementById('printBtn').addEventListener('click', function() {
            window.print();
        });
    </script>

    <p style="text-align: center"><b>REKAPITULASI KP4 <br>
        {{ $unitKerja->name ?? 'SMK NEGERI 1 SIMPANG RIMBA' }}</b></p> <br>

<table>
    <thead>
        <tr style="text-align: center; background-color:rgb(203, 207, 211)">
            <th style="width: 30px" rowspan="2">&nbsp;<br> No.</th>
            <th style="width: 80px" rowspan="2">&nbsp;<br>NIP</th>
            <th style="width: 90px" rowspan="2">&nbsp;<br>NAMA</th>
            <th style="width: 40px" rowspan="2">(KAWIN/ BELUM KAWIN <br> JANDA/ DUDA)</th>
            <th style="width: 210px" colspan="3">DATA SUAMI/ISTRI TANGGUNGAN</th>
            <th style="width: 200px" colspan="3">DATA ANAK TANGGUNGAN</th>
            <th style="width: 0px" rowspan="2">&nbsp;<br>KET</th>
        </tr>
        <tr style="text-align: center; background-color:rgb(203, 207, 211)">
            <th style="width: 90px">NAMA</th>
            <th style="width: 50px">TGL. <br> LAHIR</th>
            <th style="width: 30px">UMUR</th>
            <th style="width: 40px">PEKERJAAN</th>
            <th style="width: 110px">NAMA</th>
            <th style="width: 50px">TGL. <br> LAHIR</th>
            <th style="width: 40px">BERSEKOLAH/ <br> KULIAH PADA</th>
        </tr>
    </thead>
    @forelse ($hasil as $item)
    <tbody>
        <tr>
            <td style="text-align: center; width: 30px">{{ $loop->iteration }}.</td>
            <td style="width: 80px">{{ $item->nip }}</td>
            <td style="width: 90px">{{ $item->name }}</td>
            <td style="text-align: center; width:40px">{{ $item->pasangan && $item->pasangan->name != '' ? 'Kawin' : 'Belum Kawain' }}</td>
            <td style="width: 90px">
                @if ($item->pasangan && $item->pasangan->status == 'ditanggung' && $item->pasangan->name !='')
                    {{ $item->pasangan->name }}
                @endif
            </td>
            <td style="width: 50px">
                @if ($item->pasangan && $item->pasangan->status == 'ditanggung' && $item->pasangan->name !='')
                    {{ Carbon\Carbon::Parse($item->pasangan->tgl_lahir)->translatedFormat(' d/m/Y') }} <br>
                @endif
            </td>
            <td style="width: 30px">
                @if ($item->pasangan && $item->pasangan->status == 'ditanggung' && $item->pasangan->name !='')
                    {{ \Carbon\Carbon::parse($item->pasangan->tgl_lahir)->diff(\Carbon\Carbon::now())->format('%y th') }}
                @endif
            </td>
            <td style="width: 40px">
                @if ($item->pasangan && $item->pasangan->status == 'ditanggung' && $item->pasangan->tgl_kawin != "0000-00-00" )
                    {{ $item->pasangan->job }}
                @endif
            </td>
            <td style="width: 110px">
                @if($item->anak)
                    @foreach ($item->anak as $dat)
                        @if($dat->kat == '1')
                            -{{$dat->name}}<br>
                        @endif
                    @endforeach
                @endif
            </td>
            <td style="width: 50px">
                @if($item->anak)
                    @foreach ($item->anak as $dat)
                        @if ($dat->kat == '1')
                            {{ Carbon\Carbon::Parse($dat->tgl_lahir)->translatedFormat(' d/m/Y') }} <br>
                        @endif
                    @endforeach
                @endif
            </td>
            <td style="width: 40px">
                @if($item->anak)
                    @foreach ($item->anak as $dat)
                        @if ($dat->kat == '1')
                            {{ $dat->status_sekolah }} <br>
                        @endif
                    @endforeach
                @endif
            </td>
        </tr>
    </tbody>
    @empty
    <tbody>
        <tr>
            <td colspan="11" style="text-align: center;">Tidak ada data</td>
        </tr>
    </tbody>
    @endforelse
</table>
<tr nobr="true">
    <td> </td>
</tr>
<div class="signature" style="margin-top: 20px;">
    <div style="display: flex;">
        <div style="width: 50%;"></div>
        <div style="width: 50%; text-align: center;">
            {{$unitKerja->description ?? ''}},
            {{ (\Carbon\Carbon::now())->translatedFormat(' d F Y') }} <br>
            Kepala Sekolah
            <br><br><br><br>
            {{$penilai->nama ?? 'Nama Kepala Sekolah'}} <br>
            NIP. {{$penilai->nip ?? '-'}}
        </div>
    </div>
</div>
</body>
</html>
