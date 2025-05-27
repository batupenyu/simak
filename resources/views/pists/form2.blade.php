
@extends('layout.master')
@section('content')
@include('layout.kopcabdin')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
@foreach ($pists as $d)
@section('title') 
@if ($d->tgl_akhir == $d->tgl_awal)
{{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat(' l / d F Y') }}
        @else
            @if (Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat('F') ==
                Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat('F'))
                sppd tgl.
                {{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat(' d') }}
                s.d
                {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat(' d F Y') }}
            @else
                sppd tgl.
                {{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat(' d F') }}
                s.d
                {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat(' d F Y') }}
            @endif
            - st
    @endif
@endsection
<div class="card-body">
    {{-- @foreach ($pists as $d) --}}
    <div class="container-xl container-fluid">
        <h4><a href="{{ url('pists.index') }}" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-home"></i></a></h4>
        <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print"></i></button>
        <button class="btn btn-sm btn-outline float-end tampil" type="submit"><a href="{{ url('pists.edit/'.$d->id) }}"><i class="fa fa-edit"></i> </a> </button>
        {{-- <img class="mt-0" src={{ asset('image/kop2.png') }} style="display:inline-block; width:100%"> --}}
        {{-- <a href="{{ url('pists.cetak') }}" class="btn btn-primary" target="_blank">CETAK PDF</a> --}}
        <p style="text-align: center" class="mt-2">
        <strong><u>SURAT TUGAS</u></strong><br>
        {{-- Nomor : ........................................................ --}}
        @if ($d->no_surat =="")
        Nomor : 094/........./CABDINDIK WIL.III
        {{-- {{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('Y') }}. --}}
        @else
        Nomor : 094/{{ $d->no_surat }}/CABDINDIN WIL.III
        {{-- {{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('Y') }}. --}}
        @endif
        </p>
    <table class="table table-sm table-borderless">
        <tr>
            <td><strong>Dasar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></td>
            <td style="text-align: justify" colspan="3">
                <ol>
                    <li>
                        Undang - Undang Nomor 27 Tahun 2000 tentang Pembentukan Provinsi Kepulauan
                        Bangka Belitung (Lembaran Negara RI Tahun 2000 Nomor 217, Tambahan Lembaran
                        Negara Nomor 4033); 
                    </li>
                    <li>
                        Undang - Undang Nomor 17 Tahun 2003 tentang Keuangan Negara (Lembaran Negara
                        RI Tahun 2003 Nomor 5, Tambahan Lembaran Negara RI Nomor 4287); <br>
                    </li>
                    <li>
                        Undang-undang No 15 tahun 2004 tentang pemeriksaan Pengelolaan dan Tanggung
                        Jawab Keuangan Negara (Lembaran Negara RI tahun 2004 no 66, Tambahan Lembaran
                        negara No 4400); 
                    </li>
                    <li>
                        Peraturan Daerah Provinsi Kepulauan Bangka Belitung Nomor I Tahun 2024 tentang
                        Anggaran Pendapatan dan Belanja Daerah Provinsi Kepulauan Bangka Belitung Tahun
                        Anggaran 2024 (Lembaran Daerah Provinsi Kepulauan Bangka Belitung Tahun 2024
                        Nomor I Seri A);
                    </li>
                    <li>
                        Peraturan Gubernur Kepulauan Bangka Belitung Nomor 2 tentang Penjabaran Anggaran
                        Pendapatan dan Belanja Daerah Tahun Anggaran 2024 (Berita Daerah Provinsi
                        Kepulauan Bangka Belitung Tahun 2024 Nomor I Seri A);
                    </li>
                    @if ($d->asal_surat !="-")
                        
                    <li>
                        {{ $d->asal_surat }} 
                        Nomor: {{ $d->no_asal_surat }} 
                        hal {{ $d->description }}.
                        tanggal {{ Carbon\Carbon::Parse($d->tgl_surat_dasar)->translatedFormat('d F Y') }}.
                    </li>
                    @else
                        
                    @endif
                </ol>
            </td>
        </tr>
        <tr>
            <td style="text-align: center" colspan="5"><strong>MEMERINTAHKAN :</strong><br><br></td>
        </tr>
        <tr>
            <td><strong>Kepada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></td>
            <td colspan="2">
                @if ($d->selected <= 1)
                    @include('pists.template2')
                @else
                    @include('pists.template1')
                @endif
            </td>
            
        </tr>
        
        <tr>
            <td><strong>Untuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></td>
            <td style="width: 30px"></td>
            <td style="text-align: justify" colspan="3">
                Melaksanakan Perjalanan Dinas dalam daerah dalam rangka 
                {{ $d->acara }} yang dilaksanakan pada:
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="3">
                <table  >
                    <tr>
                        <td style="padding-right: 10px">Hari/Tanggal</td>
                        <td style="padding-right: 10px">:</td>
                        <td>
                            @if ($d->tgl_akhir == $d->tgl_awal)
                            {{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat(' l / d F Y') }}
                            @else
                                @if (Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat('F') ==
                                    Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat('F'))

                                    {{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat(' l') }}
                                    s.d
                                    {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat(' l') }}
                                    /
                                    {{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat(' d') }}
                                    s.d
                                    {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat(' d F Y') }}
                                @else
                                    {{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat(' l') }}
                                    s.d
                                    {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat(' l') }}
                                    /
                                    {{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat(' d F') }}
                                    s.d
                                    {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat(' d F Y') }}
                                @endif
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Waktu</td>
                        <td style="padding-right: 10px">:</td>
                        <td>
                            {{ $d->jam_1 }} s.d {{ $d->jam_2 }}.
                        </td>
                    </tr>
                    <tr class="align-top">
                        <td>Tempat</td>
                        <td style="padding-right: 10px">:</td>
                        <td>{{ $d->tempat }}.</td>
                    </tr>
                </table>
            </td>
        </tr>
        {{-- <tr>
            <td></td>
            <td>2.</td>
            <td style="text-align: justify" colspan="3">
                Melaporkan hasil pelaksanaan kegiatan ini kepada Kepala SMK Negeri 1 Simpang Rimba.
            </td>
        </tr> --}}
        <tr>
            <td></td>
            <td></td>
            <td style="text-align: justify" colspan="3">
                Demikian Surat Tugas ini diberikan kepada yang bersangkutan agar dapat dilaksanakan dengan penuh rasa tanggung jawab.
            </td>
        </tr>
        <tr>
            <td>
                @php


                @endphp
            </td>
        </tr>
    </table>
    @endforeach
    </div>
</div>

<div  class="col-5 float-end" >
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Dikeluarkan di : &nbsp;Toboali <br>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;   Pada tanggal &nbsp;&nbsp;: &nbsp;{{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('d F Y') }} <br><br>
        <div class="float-start" style="text-align: center">
            Kepala Cabang Dinas Wil. III <br>
            Dinas Pendidikan Prov. Kep. Bangka Belitung
            <br><br><br>
            Dr. H. Wahyudi Himawan, S.Si, M.T <br>
            PembinaTK.I, IV/b <br>
            NIP. 197107232003121001
        </div>
</div>
{{-- <div class="col-5 float-end " style="font-size: 10pt">
    Dikeluarkan di : Toboali <br>
    Pada tanggal   : ..........................2024  <br>
    KEPALA CABANG DINAS WILAYAH III <br>
    DINAS PENDIDIKAN PROV. KEP BANGKA BELITUNG<br><br><br><br>
    Dr. H. Wahyudi Himawan, S.Si, M.T. <br>
    Pembina TK I, IV/b. <br>
    NIP. 19710723 200312 1 001 
</div> --}}

@endsection
