<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
{{-- <img src="{{ public_path('image/kopsmk.png') }}"> --}}
<img src="{{ public_path('image/kopsmkn1koba.png') }}">

<body>
    <P style="text-align: center"><strong><u>LAPORAN HASIL PELAKSANAAN TUGAS</u></strong>
        <br>
    </P>
    @foreach ($pists as $d)
    <table border="0">
        <tr>
            <td style="width: 30px"><b>A.</b>
            </td>
            <td colspan="2" style="width: 480px"><b>DASAR PELAKSANAAN</b>
            </td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: justify" colspan="2">@if ($d->asal_surat !="-")Surat {{ $d->asal_surat }}
                Nomor: {{ $d->no_asal_surat }} hal {{ $d->description }}.tanggal {{ Carbon\Carbon::Parse($d->tgl_surat_dasar)->translatedFormat('d F Y') }}.
                @elseif($d->no_asal_surat != '')Surat Tugas Nomor : 094/{{ $d->no_surat }}/SMKN1/SR/{{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('Y') }} tanggal {{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('d F Y') }}.
                {{-- @if ($d->no_surat =="")
            Surat Tugas Nomor : 094/........./SMKN1/SR/{{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('Y') }} tanggal {{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('d F Y') }}.
                @else
                Surat Tugas Nomor : 094/{{ $d->no_surat }}/SMKN1/SR/{{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('Y') }} tanggal {{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('d F Y') }}.
                @endif --}}
                @endif
                <br>
            </td>
            @endforeach
        </tr>

        <tr>
            <td style="width: 30px"><b>B.</b>
            </td>
            <td style="width: 480px"><b>MAKSUD DAN TUJUAN</b>
            </td>
        </tr>
        <tr>
            <td></td>
            <td style="width: 20px">1.
            </td>
            <td style="width: 460px"><i>Maksud</i></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="text-align: justify">{{$d->maksud }}</td>
        </tr>
        <tr>
            <td></td>
            <td style="width: 20px">2.
            </td>
            <td style="width: 460px"><i>Tujuan</i></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="text-align: justify">{{$d->tujuan }}
                <br>
            </td>
        </tr>
        <tr>
            <td style="width: 30px"><b>C.</b>
            </td>
            <td style="width: 480px"><b>WAKTU DAN TEMPAT PELAKSANAAN</u>
            </td>
        </tr>
        <tr>
            <td></td>
            <td style="width: 75px">Hari/Tanggal</td>
            <td style="width: 20px">:</td>
            {{-- <td style="width: 385px">@if($d->tgl_akhir == $d->tgl_awal){{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat('l / d F Y') }} @else @if (Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat('F') == Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat('F')){{Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat('l') }} s.d {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat('l') }} / {{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat('d') }} s.d {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat('d F Y') }} @else{{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat('l') }} s.d {{Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat('l') }}/{{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat('d F') }} s.d {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat('d F Y') }} @endif @endif</td> --}}
            <td>@if ($d->tgl_awal == $d->tgl_akhir){{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat('l / d F Y') }}.
                @elseif($d->tgl_awal != $d->tgl_akhir){{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat('l') }} s.d {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat('l') }} / {{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat('d') }} - {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat('d F Y') }}.
                @php
                $tahun1 = (Carbon\Carbon::Parse($d->tgl_awal))->format('Y') ;
                $tahun2 = (Carbon\Carbon::Parse($d->tgl_akhir))->format('Y');
                @endphp
                @elseif($tahun1 != $tahun2){{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat('l') }} s.d {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat('l') }} / {{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat('d F Y') }} - {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat('d F Y') }}.
                @endif
            </td>
        </tr>
        <tr>
            <td></td>
            <td>Waktu</td>
            <td>:</td>
            <td>@if ($d->jam_1 == '-')@else{{ $d->jam_1 }} s.d {{ $d->jam_2 }}.@endif</td>
        </tr>
        <tr>
            <td></td>
            <td>Tempat</td>
            <td>:</td>
            <td>{{$d->tempat}}
                <br>
            </td>
        </tr>
        <tr>
            <td style="width: 30px"><b>D.</b></td>
            <td style="width: 480px"><b>PELAKSANAAN KEGIATAN</b>
            </td>
        </tr>
        <tr>
            <td></td>
            <td style="width: 20px">1.</td>
            <td style="width: 460px">Tiba di lokasi kegiatan sesuai dengan jadwal kegiatan;
            </td>
        </tr>
        <tr>
            <td></td>
            <td>2.</td>
            <td>Menandatangani daftar hadir
            </td>
        </tr>
        <tr>
            <td></td>
            <td>3.</td>
            <td>Mengikuti Kegiatan {{ $d->acara }} s.d selesai
                <br>
            </td>
        </tr>
        <tr>
            <td style="width: 30px"><b>E.</b>
            </td>
            <td style="width: 480px"><b>PENUTUP</u>
            </td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: justify">{{ $d->ulasan }}
            </td>
        </tr>
    </table>
    <tr nobr="true">
        <td> </td>
    </tr>
    <table border="0" cellpadding="2">
        <tr style="text-align: center">
            <td style="width: 510px">
                Simpang Rimba,
                {{ Carbon\Carbon::Parse($d->tgl_akhir )->translatedFormat('d F Y')  }}.
                <br>
                Penyusun Laporan
            </td>
        </tr>
    </table>
    <tr nobr="true">
        <td> </td>
    </tr>
    <table border="1" cellpadding="2">
        <thead>
            <tr style="text-align: center">
                <th style="width: 30px">No.</th>
                <th style="width: 150px">Nama/NIP</th>
                <th style="width: 200px">Pangkat/Gol.</th>
                <th>Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($d['cat'] as $x)
            <tr style="vertical-align: middle">
                @php
                $fullname = $x;
                $name = explode('-',$fullname);
                $a = $name [0];
                $b = $name [2];
                $c = $name [1];
                $d = $name [3];
                @endphp
                <td style="text-align: center" style="height: 1.2cm; width:30px"> {{$loop->iteration }}.</td>
                <td style="padding-left: 30px; width:150px"> {{ $a }}
                    <br>
                    @if ($b =='')
                    @else
                    NIP. {{ $b }}
                    @endif
                </td>
                <td style="text-align: center; width:200px">
                    @if ($c =='')
                    {{ $d }}
                    {{-- - --}}
                    @else
                    {{ $c }}
                    @endif
                </td>
                <td style="text-align: center"> </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>