@extends('layout.master')
@section('content')
@include('layout.kop2')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
<div class="container-xl container-fluid ">
    @foreach ($izin as $n)
    <h4><a href="{{ url('project') }}" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-home"></i></a></h4>
    <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print"></i></button>
    <button class="btn btn-sm btn-outline float-end tampil" type="submit"><a href="{{ url('izin.edit/'.$n->id) }}"><i class="fa fa-edit"></i> </a> </button>

    <table class="table table-sm table-borderless" >
        {{-- <tr>
            <td colspan="3">
                <img src={{ asset('image/kop2.png') }} style="display-inline:block" class="w-100">
            </td>
        </tr> --}}
        <tr>
            <th style="text-align: center" colspan="3">
            <u>
                SURAT KETERANGAN <br>
            </u>
            NOMOR : 800/ 
            @if ($n->no_surat == '')
                ..........
            @else
                {{ $n->no_surat }}
            @endif
            /SMKN1/SR/
            {{ Carbon\Carbon::Parse($n->tgl_surat)->format('Y') }} 
            <br> <br><br>
        </tr>
        <tr>
            <td colspan="3" style="height: 1cm">
                Yang bertanda tangan dibawah ini :
            </td>
        </tr>
        <br> <br> <br>
        <tr>
            <td style="padding-left: 30px">Nama</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px">{{ $n->user->penilai->nama }}</td>
        </tr>
        {{-- <tr>
            <td style="padding-left: 30px">NIP</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px">{{ $n->user->penilai->nip }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Pangkat/Gol.</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px">{{ $n->user->penilai->pangkat_gol }}</td>
        </tr> --}}
        <tr>
            <td style="padding-left: 30px; height:1cm">Jabatan</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px">{{ $n->user->penilai->jabatan }}</td>
        </tr>
        <tr>
            <td colspan="3" style="height: 1cm">dengan ini menerangkan bahwa ; </td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Nama</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px" >{{ $n->user->name }}</td>
        </tr>
        <tr class="align-top">
            <td style="padding-left: 30px">NIP</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px" >{{ $n->user->nip }}</td>
        </tr>
        <tr class="align-top">
            <td style="padding-left: 30px">Pangkat/Gol.</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px; height: 1cm" >{{ $n->user->pangkat_gol }}</td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Jabatan</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px" >{{ $n->user->jabatan }}</td>
        </tr>
        {{-- <tr class="align-top">
            <td style="padding-left: 30px; height:1cm">Untuk</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px ; text-align: justify">
                    {{ $n->alasan_izin }}
                    pada hari/tanggal, 
                        <?php 
                            $formatted_dt1 = Carbon\Carbon::Parse($n->tgl_awal);
                            $formatted_dt2 = Carbon\Carbon::Parse($n->tgl_akhir);
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
            <td colspan="3" >
                {{ $n->alasan_izin }}

                @if ($n->tgl_awal == '0000-00-00')
                {{ Carbon\Carbon::Parse($n->awal)->translatedFormat(' F Y') }} 
                @else
                    pada tanggal
                @include('izin.tanggal')

                @endif
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
                <div class="div col-6 float-end" style="text-align: center">
                    <strong>
                        Simpang Rimba,
                                <strong>
                                    {{ Carbon\Carbon::Parse($n->tgl_surat)->translatedFormat(' d F Y') }} 
                                </strong>
                        <br>
                        Kepala Sekolah, <br>
                        <br><br><br>
                            {{ $n->user->penilai->nama }} <br>
                            NIP. {{ $n->user->penilai->nip }} <br>
                        <br>
                    </strong>
                </div>
            </td>
        </tr>
    </table>
</div>
@endforeach
@endsection