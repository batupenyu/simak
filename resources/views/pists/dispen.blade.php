@extends('layout.master')
@section('content')
@include('layout.kop2')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
<div class="container-xl container-fluid ">
    @foreach ($pists as $d)
    <h4><a href="{{ url('pists.index') }}" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-home"></i></a></h4>
    <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print"></i></button>
    <button class="btn btn-sm btn-outline float-end tampil" type="submit"><a href="{{ url('pists.edit/'.$d->id) }}"><i class="fa fa-edit"></i> </a> </button>


    <table class="table table-sm table-borderless" >
        {{-- <tr>
            <td colspan="3">
                <img src={{ asset('image/kop2.png') }} style="display-inline:block" class="w-100">
            </td>
        </tr> --}}
        <tr>
            <th style="text-align: center" colspan="3">
            <u>
                SURAT DISPENSASI <br>
            </u>
            NOMOR : 800/ 
            @if ($d->no_surat == '')
                ..........
            @else
                {{ $d->no_surat }}
            @endif
            /SMKN1/SR/
            {{ Carbon\Carbon::Parse($d->tgl_surat)->format('Y') }} 
            <br> <br><br>
        </tr>
        <tr>
            <td colspan="3" style="height: 1cm">
                Yang bertanda tangan dibawah ini :
            </td>
        </tr>
        <br> <br> <br>
        <tr>
            <td colspan="3">
                <table>
                    <tr>
                        <td style="padding-left: 30px; Padding-right:30px">Nama</td>
                        <td>:</td>
                        <td style="padding-left: 20px">{{ $d->penilai->nama }}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 30px; Padding-right:30px">NIP</td>
                        <td>:</td>
                        <td style="padding-left: 20px">{{ $d->penilai->nip }}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 30px; Padding-right:30px">Pangkat/Gol.</td>
                        <td>:</td>
                        <td style="padding-left: 20px">{{ $d->penilai->pangkat_gol }}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 30px; Padding-right:30px">Jabatan</td>
                        <td>:</td>
                        <td style="padding-left: 20px">{{ $d->penilai->jabatan }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    
        <tr>
            <td colspan="3" style="height: 1cm;text-align:justify"> berdasarkan 
                {{ $d->asal_surat }} 
                Nomor: {{ $d->no_asal_surat }} 
                hal {{ $d->description }}.
                tanggal {{ Carbon\Carbon::Parse($d->tgl_surat_dasar)->translatedFormat('d F Y') }},
                dengan ini memberikan izin kepada ; </td>
        </tr>
        <tr>
            <td colspan="3">
                @switch($d->selected)
                @case($d->selected <= 1)
                    @include('pists.template2')
                    @break
                @case($d->selected <= 2)
                    @include('pists.template1')
                    @break
                @case($d->selected >= 3)
                    @include('pists.template3')
                    @break
                @default
                -
                @endswitch
            </td>
        </tr>
        {{-- <tr class="align-top">
            <td style="padding-left: 30px; height:1cm">Untuk</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px ; text-align: justify">
                    {{ $d->alasan_izin }}
                    pada hari/tanggal, 
                        <?php 
                            $formatted_dt1 = Carbon\Carbon::Parse($d->tgl_awal);
                            $formatted_dt2 = Carbon\Carbon::Parse($d->tgl_akhir);
                            $date_diff = $formatted_dt1->diffInDays($formatted_dt2);
                        ?>
                    @if ($formatted_dt2 == $formatted_dt1)
                    {{ Carbon\Carbon::Parse($formatted_dt1)->translatedFormat(' l / d F Y') }}
                    @else
                        @if (Carbon\Carbon::Parse($formatted_dt1)->translatedFormat('F') ==
                            Carbon\Carbon::Parse($formatted_dt2)->translatedFormat('F'))
                            <strong>
                                {{ Carbon\Carbon::Parse($formatted_dt1)->translatedFormat(' d') }}
                            </strong>
                                s.d
                            <strong>
                                {{ Carbon\Carbon::Parse($formatted_dt2)->translatedFormat(' d F Y') }}
                            </strong>
                        @else
                            <strong>
                                
                                {{ Carbon\Carbon::Parse($formatted_dt1)->translatedFormat(' d F') }}
                            </strong>
                                s.d
                            <strong>
                                {{ Carbon\Carbon::Parse($formatted_dt2)->translatedFormat(' d F Y') }}
                            </strong>
                        @endif
                        selama
                        <strong>
                            {{ $date_diff + 1 }}
                            ({{Riskihajar\Terbilang\Facades\Terbilang::make($date_diff + 1)}})
                        </strong>
                        hari.
                    @endif
            </td>
        </tr> --}}
        <tr>
            <td colspan="3" style="text-align: justify" >
                untuk mengikuti
                {{ $d->acara }}
                yang akan dilaksanakan pada tanggal
                @include('pists.tanggal')
                di {{ $d->tempat }}.
            </td>
        </tr>
        <tr>
            <td colspan="3">
                Demikian surat ini dibuat untuk dipergunakan sebagaimana mestinya.
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <br><br><br>
                <div class="col-5 float-end">
                    Dikeluarkan di : Simpang Rimba <br>
                    Pada tanggal   : {{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('d F Y') }} <br>
                    <div class="float-start" style="text-align: center">
                        {{ $d->penilai->jabatan }}
                        <br><br><br>
                        {{ $d->penilai->nama }}
                        <br>
                        NIP. {{ $d->penilai->nip }} <br>
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
            </td>
        </tr>
    </table>
</div>
@endforeach
@endsection