<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
    @foreach ($pists as $d)
        @foreach ($d['cat'] as $x) 
            @php
            $fullname = $x;
            $name = explode('-',$fullname);   
            $nama_pegawai = $name [0];
            $b = $name [2];
            $c = $name [1];
            $jabatan = $name [3];
            @endphp
            @if ($jabatan == "Kepala Sekolah")
            <img src="{{ public_path('image/kopcabdin1.png') }}">
            @else 
            <img src="{{ public_path('image/kopsmkn1koba.png') }}">
            @endif
        @endforeach
    @endforeach
<body>
    
    <table border="0" cellpadding="2" cellspasing="2">
    @foreach ($pists as $d)
        @foreach ($d['cat'] as $x) 
            @php
            $fullname = $x;
            $name = explode('-',$fullname);   
            $nama_pegawai = $name [0];
            $b = $name [2];
            $c = $name [1];
            $jabatan = $name [3];
            @endphp
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
                        <br>
                    </td>
                </tr>
                
            @endif
        @endforeach
    @endforeach
    @foreach ($pists as $d)
        {{-- @if ($jabatan ="Kepala Sekolah")
        
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
                    <br>
                </td>
            </tr>
        @endif --}}
    <tr>
        <td style="width: 45px"><b>DASAR</b></td>
        <td style="width: 15px">:</td>
        {{-- <td style="width: 440px; text-align: justify" >
            <ol>
                <li style="text-align:justify">Undang - Undang Nomor 27 Tahun 2000 tentang Pembentukan Provinsi Kepulauan Bangka Belitung (Lembaran Negara RI Tahun 2000 Nomor 217, Tambahan Lembaran Negara Nomor 4033);
                </li>
                <li style="text-align:justify">Undang - Undang Nomor 17 Tahun 2003 tentang Keuangan Negara (Lembaran Negara RI Tahun 2003 Nomor 5, Tambahan Lembaran Negara RI Nomor 4287);
                </li>
                <li style="text-align:justify">Undang-undang No 15 tahun 2004 tentang pemeriksaan Pengelolaan dan Tanggung Jawab Keuangan Negara (Lembaran Negara RI tahun 2004 no 66, Tambahan Lembaran negara No 4400);
                </li>
                <li style="text-align:justify">Peraturan Daerah Provinsi Kepulauan Bangka Belitung Nomor I Tahun 2025 tentang Anggaran Pendapatan dan Belanja Daerah Provinsi Kepulauan Bangka Belitung Tahun Anggaran 2025 (Lembaran Daerah Provinsi Kepulauan Bangka Belitung Tahun 2025 Nomor I Seri A);
                </li>
                <li style="text-align:justify">Peraturan Gubernur Kepulauan Bangka Belitung Nomor 1 tentang Penjabaran Anggaran Pendapatan dan Belanja Daerah Tahun Anggaran 2025 (Berita Daerah Provinsi Kepulauan Bangka Belitung Tahun 2025 Nomor I Seri A);
                </li>
                @if ($d->asal_surat !="-")
                <li style="text-align:justify">{{ $d->asal_surat }} 
                    Nomor: {{ $d->no_asal_surat }} 
                    hal: {{ $d->description }}.
                    tanggal {{ Carbon\Carbon::Parse($d->tgl_surat_dasar)->translatedFormat('d F Y') }}.
                </li>
                @else
                    -
                @endif
            </ol>
        </td> --}}
        <td style="width: 440px; text-align: justify" >{{ $d->asal_surat }} Nomor: {{ $d->no_asal_surat }}  hal: {{ $d->description }}. tanggal {{ Carbon\Carbon::Parse($d->tgl_surat_dasar)->translatedFormat('d F Y') }}.</td>
    </tr>
    </table>
        <tr nobr = "true">
            <td> </td>
        </tr>
    <table border="0" cellpadding="2"  >
        <tr>
            <td style="width: 55px"><b>KEPADA :</b></td>
            <td style="width: 445px">
                @if ($d->selected ==1)
                @include('pists.template21')
                @elseif ($d->selected ==2)
                @include('pists.template22')
                @elseif ($d->selected > 2)
                <a href="/pists.form4/{{ $d->id }}"style="text-decoration: none"><i ><strong>Daftar nama terlampir</strong></i></a>
                {{-- @include('pists.template22') --}}
                @endif
            </td>
        </tr>
    </table>
        <tr nobr = "true">
            <td> </td>
        </tr>
    <table border="0" cellpadding="2" >
        <tr>
            <td style="width: 60px"><b>UNTUK :</b></td>
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
            <td>2.</td>
            <td style="text-align: justify;width: 420px" colspan="2">Melaporkan hasil pelaksanaan kegiatan ini kepada Kepala SMK Negeri 1 Simpang Rimba.</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: justify" colspan="3">Demikian Surat Tugas ini diberikan kepada yang bersangkutan untuk dapat dilaksanakan dengan penuh rasa tanggung jawab.</td>
        </tr>
        @endforeach
    </table>
    <tr nobr = "true">
        <td> </td>
    </tr>
    <table border="0" >
        @foreach ($pists as $d)
            @foreach ($d['cat'] as $x) 
                @php
                $fullname = $x;
                $name = explode('-',$fullname);   
                $nama_pegawai = $name [0];
                $b = $name [2];
                $c = $name [1];
                $jabatan = $name [3];
                @endphp
                @if ($jabatan == "Kepala Sekolah")
                    <tr>
                        <td style="width: 240px"></td>
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
                        <td style="width: 240px"></td>
                        <td style="text-align: left">
                            Dikeluarkan di : Koba<br>
                            Pada tanggal   : {{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('d F Y') }}<br>
                            {{ $d->penilai->jabatan }}<br><br><br><br>
                            {{ $d->penilai->nama }}<br>
                            NIP. {{ $d->penilai->nip }}
                        </td>
                    </tr>
                @endif
            @endforeach
        @endforeach
    </table>
</body>
</html>