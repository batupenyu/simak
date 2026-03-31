<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @page { margin: 0.3cm 1cm 1cm 1cm; }
        body { margin: 0.3cm 1cm 1cm 1cm; font-family: Arial, sans-serif; }
        table { border-collapse: collapse; }
    </style>
</head>
<body>
    @foreach ($pists as $d)
        @php
            $catArray = is_array($d->cat) ? $d->cat : json_decode($d->cat, true);
            $jabatan = '';
        @endphp
        @foreach ($catArray as $catItem)
            @php
            $fullname = $catItem;
            $nameParts = explode('-',$fullname);
            $nama_pegawai = $nameParts [0];
            $nip_pegawai = $nameParts [2];
            $pangkat = $nameParts [1];
            $jabatan = $nameParts [3];
            @endphp
        @endforeach

        @if ($jabatan == "Kepala Sekolah")
        <img src="{{ public_path('image/kopcabdin1.png') }}" style="width: 100%;">
        @else
        <img src="{{ public_path('image/kopsmkn1koba.png') }}" style="width: 100%;">
        @endif

        <table border="0" cellpadding="2" style="width: 100%;">
            @if ($jabatan == "Kepala Sekolah")
                <tr>
                    <td style="text-align: center; width:500px" colspan="3"><b><u>SURAT TUGAS</u></b> <br>
                        @if ($d->no_surat =="")
                        Nomor : 421.5/........./CABDINDIK WIL I/{{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('Y') }}.
                        @else
                        Nomor : 421.5/{{ $d->no_surat }}/CABDINDIK WIL I/{{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('Y') }}.
                        @endif
                        <br>
                    </td>
                </tr>
            @else
                <tr>
                    <td style="text-align: center; width:500px" colspan="3"><b><u>SURAT TUGAS</u></b> <br>
                        @if ($d->no_surat =="")
                        Nomor : 094/........./SMKN 1 Kb/Dindik/{{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('Y') }}.
                        @else
                        Nomor : 094/{{ $d->no_surat }}/SMKN 1 Kb/Dindik/{{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('Y') }}.
                        @endif
                        <br> <br>
                    </td>
                </tr>
            @endif
            <tr>
                <td style="width: 100px; vertical-align: top;"><b>DASAR</b></td>
                <td style="vertical-align: top;width: 20px">:</td>
                <td style="width: 440px; text-align: justify" >{{ $d->asal_surat }} Nomor: {{ $d->no_asal_surat }}  hal: {{ $d->description }}. tanggal {{ Carbon\Carbon::Parse($d->tgl_surat_dasar)->translatedFormat('d F Y') }}.</td>
            </tr>
        </table>
        <br/>
        <table border="0" cellpadding="2" style="width: 100%;">
            <tr>
                <td style="width: 100px; vertical-align: top;"><b>KEPADA</b></td>
                <td style="width: 20px;vertical-align: top;">:</td>
                <td style="width: 445px">
                    @if ($d->selected ==1)
                    @include('pists.template21', ['catArray' => $catArray])
                    @elseif ($d->selected ==2)
                    @include('pists.template22', ['catArray' => $catArray])
                    @elseif ($d->selected > 2)
                    <a href="/pists.form4/{{ $d->id }}"style="text-decoration: none"><i ><strong>Daftar nama terlampir</strong></i></a>
                    @endif
                </td>
            </tr>
        </table>
        <br/>
        <table border="0" cellpadding="2" style="width: 100%;">
            <tr>
                <td style="width: 100px"><b>UNTUK</b></td>
                <td style="width: 20px">1.</td>
                <td style="text-align: justify; width:420px" colspan="3">{{ $d->acara }}, yang akan dilaksanakan pada:
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="width: 75px">Hari</td>
                <td style="width: 20px">:</td>
                <td style="width: 325px">@include('pists.tanggal3')</td>
            </tr>
            @if ($d->jam_1 == '-')
            @else
            <tr>
                <td></td>
                <td></td>
                <td>Waktu</td>
                <td>:</td>
                <td style="text-align: justify">{{ $d->jam_1 }} s.d {{ $d->jam_2 }}</td>
            </tr>
            @endif
            <tr>
                <td></td>
                <td></td>
                <td>Tempat</td>
                <td>:</td>
                <td style="text-align: justify">{{ $d->tempat }}.</td>
            </tr>
            <tr>
                <td></td>
                <td style="vertical-align: top;">2.</td>
                <td style="text-align: justify;width: 420px" colspan="3">Melaporkan hasil pelaksanaan kegiatan ini kepada Kepala SMK Negeri 1 Koba.</td>
            </tr>
            <br>
            <tr>
                <td></td>
                <td style="text-align: justify" colspan="4">Demikian Surat Tugas ini diberikan kepada yang bersangkutan untuk dapat dilaksanakan dengan penuh rasa tanggung jawab.</td>
            </tr>
        </table>
        <br/>
        <table border="0" style="width: 100%;">
            @if ($jabatan == "Kepala Sekolah")
                <tr>
                    <td style="width: 400px"></td>
                    <td style="text-align: left">
                        Dikeluarkan di : Koba<br>
                        Pada tanggal   : {{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('d F Y') }}<br><br>
                        Kepala Cabang Dinas Wilayah I <br>
                        Dinas Penedidikan Prov. Kep. Bangka Belitung
                        <br><br><br><br>
                        {{ $atasan->nama}} <br>
                        {{ $atasan->pangkat_gol}}<br>
                        NIP.{{ $atasan->nip }}
                    </td>
                </tr>
            @else
                <tr>
                    <td style="width: 400px"></td>
                    <td style="text-align: left">
                        Dikeluarkan di : Koba<br>
                        Pada tanggal   : {{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('d F Y') }}<br>
                        {{ $d->penilai->jabatan }}<br><br><br><br>
                        {{ $d->penilai->nama }}<br>
                        NIP. {{ $d->penilai->nip }}
                    </td>
                </tr>
            @endif
        </table>
    @endforeach
</body>
</html>
