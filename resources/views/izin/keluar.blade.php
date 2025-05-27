@extends('layout.master')
@section('content')
@include('layout.kop2')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
<div class="container-xl container-fluid mt-0">
    @foreach ($izin as $n)
    <h4><a href="{{ url('project') }}" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-home"></i></a></h4>
    <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print"></i></button>
    <button class="btn btn-sm btn-outline float-end tampil" type="submit">
        <a href="{{ url('izin.edit/'.$n->id) }}"><i class="fa fa-edit"></i> </a> 
    </button>
    <table class="mt-3 table table-sm table-borderless " >
        <tr>
            {{-- <tr>
                <th colspan="5">
                    <img src={{ asset('image/kop2.png') }} style="display-inline:block" class="w-100">
                </th>
            </tr> --}}
            <td colspan="5" style="text-align: center">
                <strong><u>SURAT IZIN KELUAR <br></u></strong>
                NOMOR : 800/ 
                @if ($n->no_surat == '')
                    ..........
                @else
                    {{ $n->no_surat }}
                @endif
                /SMKN1/SR/{{ Carbon\Carbon::Parse($n->tgl_surat)->format('Y') }} 
                <br> <br> <br>
            </td>
        </tr>
        <tr style="line-height: 1.0cm">
            <td style="margin-bottom: 0; padding-left: 50px">Nama</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td colspan="3" style="margin-bottom: 0; padding-left: 17px" >{{ $n->user->name }}</td>
        </tr>
        <tr style="line-height: 1.0cm">
            <td style="margin-bottom: 0; padding-left: 50px">NIP</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td colspan="3" style="margin-bottom: 0; padding-left: 17px" >{{ $n->user->nip }}</td>
        </tr>
        <tr style="line-height: 1.0cm">
            <td style="margin-bottom: 0; padding-left: 50px">Pangkat</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td colspan="3" style="margin-bottom: 0; padding-left: 17px" >{{ $n->user->pangkat_gol }}</td>
        </tr>
        <tr style="line-height: 1.0cm">
            <td style="margin-bottom: 0; padding-left: 50px">Jabatan</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td colspan="3" style="margin-bottom: 0; padding-left: 17px" >{{ $n->user->jabatan }} </td>
        </tr>
        <tr style="line-height: 1.0cm">
            <td style="margin-bottom: 0; padding-left: 50px">Unit Kerja</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td colspan="3" style="margin-bottom: 0; padding-left: 17px" >{{ $n->user->unit_kerja }} </td>
        </tr>
        <tr style="line-height: 1.0cm">
            <td style="margin-bottom: 0; padding-left: 50px">Hari/Tanggal</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td colspan="3" style="margin-bottom: 0; padding-left: 17px" >{{ Carbon\Carbon::Parse($n->tgl_awal)->translatedFormat(' l, d F Y') }}</td>
        </tr>
        <tr style="line-height: 1.0cm">
            <td style="margin-bottom: 0; padding-left: 50px">Tujuan</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td colspan="3" style="margin-bottom: 0; padding-left: 17px">{{ $n->alasan_izin }}</td>
        </tr>
        <tr >
            <td style="margin-bottom: 0; padding-left: 50px">Waktu</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px; width:30%">Meninggalkan tempat pukul</td>
            <td style="width: 1%">&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px">{{ $n->jam }}</td>
        </tr>
        <tr>
            <td ></td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td style="margin-bottom: 0; padding-left: 17px">Kembali pukul</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px">{{ $n->jam_2 }}</td>
        </tr>
        {{-- <tr >
            <td ></td>
            <td>&nbsp;&nbsp;&nbsp;
            <td style="margin-bottom: 0; padding-left: 17px">Hari/tanggal</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px" >{{ Carbon\Carbon::Parse($n->tgl_awal)->translatedFormat(' l, d F Y') }}</td>
        </tr> --}}
        <tr>
            <td colspan="5">
                <br><br><br>
                <div class="div col-6 float-end" style="text-align: center">
                    <strong>
                        Simpang Rimba,
                                <strong>
                                    {{ Carbon\Carbon::Parse($n->tgl_surat)->translatedFormat(' d F Y') }} 
                                </strong>
                        <br>
                        Kepala Sekolah, <br>
                        SMK Negeri 1 Simpang Rimba <br><br><br>
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