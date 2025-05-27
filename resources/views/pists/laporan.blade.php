
@extends('layout.master')
@section('content')
@include('layout.kop2')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<div class="container-fluid w-50">

@foreach ($pists as $d)
@section('title') 
@if ($d->tgl_akhir == $d->tgl_awal)
laporan sppd - 
{{ Str::lower (Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat(' l / d F Y')) }}
        @else
            @if (Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat('F') ==
                Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat('F'))
                sppd tgl.
                {{ Str::lower (Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat(' d')) }}
                s.d
                {{ Str::lower (Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat(' d F Y')) }}
            @else
                sppd tgl.
                {{ Str::lower (Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat(' d F')) }}
                s.d
                {{Str::lower ( Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat(' d F Y')) }}
            @endif
    @endif
@endsection
<div class="card-body">
    {{-- @foreach ($pists as $d) --}}
    <div class="container-xl container-fluid">
        <h4><a href="{{ url('pists.index') }}" class="btn btn-sm btn-outline tampil float-end"><i class="bi-house-fill"></i></a>
        <a class="btn btn-sm float-end" href="{{ url('pists.laporanpdf/'.$d->id) }}"><i class="bi-printer-fill"></i></a>
        <button class="btn btn-sm btn-outline float-end tampil" type="submit"><a href="{{ url('pists.edit/'.$d->id) }}"><i class="bi-pencil-fill"></i> </a> </button>
        </h4>
        {{-- <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="bi-printer-fill"></i></button> --}}
        {{-- <img class="mt-0" src={{ asset('image/kop2.png') }} style="display:inline-block; width:100%"> --}}
        {{-- <a href="{{ url('pists.cetak') }}" class="btn btn-primary" target="_blank">CETAK PDF</a> --}}
        <p style="text-align: center" class="mt-5">
        <strong><u>LAPORAN HASIL PELAKSANAAN TUGAS</u></strong>
        <br>
        <br>
        </p>
    <table class="table table-sm table-borderless">
        <tr>
            <td colspan="3"><strong>A. Dasar Pelaksanaan :</strong></td>
        </tr>
        <tr>
            <td style="text-align: justify" colspan="3">
                <ul>
                    
                    @if ($d->asal_surat !="-")
                        
                    <li>
                        Surat {{ $d->asal_surat }} 
                        Nomor: {{ $d->no_asal_surat }} 
                        hal {{ $d->description }}.
                        tanggal {{ Carbon\Carbon::Parse($d->tgl_surat_dasar)->translatedFormat('d F Y') }}.
                    </li>
                    @else
                    <li>
                        @if ($d->no_surat =="")
                        Surat Tugas Nomor : 094/........./SMKN1/SR/{{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('Y') }}.
                        tanggal {{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('d F Y') }}.
                        @else
                        Surat Tugas Nomor : 094/{{ $d->no_surat }}/SMKN1/SR/{{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('Y') }}.
                        tanggal {{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('d F Y') }}.
                        @endif
                    </li>
                        
                    @endif
                </ul>
            </td>
        </tr>
        <tr>
            <td colspan="3"><strong>B. Maksud dan Tujuan :</strong></td>
        </tr>
        <tr>
            <td style="padding-left: 30px;" colspan="3">
                <strong>1. Maksud</strong> <br>
                <tr>
                    <td colspan="3" style="padding-left: 50px;text-align:justify">
                        {{ $d->maksud }}
                    </td>
                </tr>
            </td>
        </tr>
        <tr>
            <td style="padding-left: 30px" colspan="3">
                <strong>2. Tujuan</strong> <br>
                <tr>
                    <td colspan="3" style="padding-left: 50px;text-align:justify">
                        {{ $d->tujuan }}
                    </td>
                </tr>
            </td>
        </tr>
        <tr>
            <td colspan="3"><strong>C. Waktu dan Tempat Pelaksanaan :</strong></td>
        </tr>
        <tr>
            <td colspan="3" style="padding-left: 30px">
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
                    @if ($d->jam_1 == '-')
                    @else
                        <tr>
                            <td>Waktu</td>
                            <td style="padding-right: 10px">:</td>
                            <td>
                                {{ $d->jam_1 }} s.d {{ $d->jam_2 }}.
                            </td>
                    </tr>
                    @endif
                    <tr class="align-top">
                        <td>Tempat</td>
                        <td style="padding-right: 10px">:</td>
                        <td>{{ $d->tempat }}.</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3"><strong>D. Pelaksanaan Kegiatan :</strong></td>
        </tr>
        <tr>
            <td colspan="3">
                <ol>
                    <li>
                        Tiba di lokasi kegiatan sesuai dengan jadwal kegiatan;
                    </li>
                    <li>
                        Menandatangani daftar hadir
                    </li>
                    <li>
                        Mengikuti Kegiatan {{ $d->acara }}  s.d selesai
                    </li>
                </ol>
            </td>
        </tr>
        <tr>
            <td colspan="3"><strong>E. Penutup :</strong></td>
        </tr>
        <tr>
            <td colspan="3" style="padding-left: 30px; text-align:justify">
                {{ $d->ulasan }}
            </td>
        </tr>
        <tr>
            <td style="text-align: center ; padding-top:30px" colspan="5" >
            <strong>
                Simpang Rimba, 
                {{-- {{ Carbon\Carbon::Parse($d->tgl_akhir )->subDays(1)->translatedFormat('d F Y')  }}. --}}
                {{-- {{ Carbon\Carbon::Parse($d->tgl_akhir )->addDays(1)->translatedFormat('d F Y')  }}. --}}
                {{ Carbon\Carbon::Parse($d->tgl_akhir )->translatedFormat('d F Y')  }}.
                <br>
                Penyusun Laporan
            </strong><br><br></td>
        </tr>
        
        <tr>
            <td colspan="3">
            @include('pists.template4')
            </td>
        </tr>
    </table>
    {{-- <strong><a href="{{ url('image-upload') }}" class="btn btn-sm btn-outline tampil float-start" style="color: blue">Photo Kegiatan <i class="fa fa-book"></i></a></strong> --}}
    <a href="/pists.photo/{{ $d->id }}"style="text-decoration: none">Photo Kegiatan <i class="fa fa-book " aria-hidden="true"></i></a>

    @endforeach
    </div>
</div>
{{-- <div class="col-5 float-end">
    Simpang Rimba, {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat('d F Y') }} <br>
    <div class="float-start" style="text-align: center">
        Mengetahui; <br>
        {{ $d->penilai->Jabatan }}
        <br><br><br>
        {{ $d->penilai->nama }}
        <br>
        NIP. {{ $d->penilai->nip }} <br>
    </div>
</div> --}}
{{-- <div class="col-5 float-end " style="font-size: 10pt">
    Dikeluarkan di : Toboali <br>
    Pada tanggal   : ..........................2024  <br>
    KEPALA CABANG DINAS WILAYAH III <br>
    DINAS PENDIDIKAN PROV. KEP BANGKA BELITUNG<br><br><br><br>
    Dr. H. Wahyudi Himawan, S.Si, M.T. <br>
    Pembina TK I, IV/b. <br>
    NIP. 19710723 200312 1 001 
</div> --}}
</div>

@endsection
