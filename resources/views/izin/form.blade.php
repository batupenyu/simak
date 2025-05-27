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
            SURAT IZIN KEPALA SEKOLAH SMKN 1 SIMPANG RIMBA <br>
            PROVINSI KEPULAUAN BANGKA BELITUNG <br>
            NOMOR : 800/ 
            @if ($n->no_surat == '')
                ..........
            @else
                {{ $n->no_surat }}
            @endif
            /SMKN1/SR/
            {{ Carbon\Carbon::Parse($n->tgl_surat)->format('Y') }} 
            <br> <br><br>
            TENTANG PEMBERIAN IZIN TIDAK  
                @switch($n->pilih_izin)
                    @case($n->pilih_izin == 'UPACARA ATAU OLAHRAGA')
                        MENGIKUTI UPACARA ATAU OLAHRAGA/ 
                        <br>
                        <del>
                        PRESENSI SIDIK JARI/
                        TIDAK MASUK KERJA <br><br><br>
                        </del>
                    @break
        
                    @case($n->pilih_izin == 'PRESENSI SIDIK JARI')
                        <del>
                        MENGIKUTI UPACARA ATAU OLAHRAGA/ 
                        </del>    
                        <br>
                        PRESENSI SIDIK JARI/
                        <del>
                        TIDAK MASUK KERJA <br><br><br>
                        </del>
                    @break

                    @case($n->pilih_izin == 'TIDAK MASUK KERJA')
                        <del>
                        MENGIKUTI UPACARA ATAU OLAHRAGA/ 
                        </del>    
                        <br>
                        <del>
                        PRESENSI SIDIK JARI/
                        </del>
                        MASUK KERJA <br><br><br>
                    @break
                    @default
                    -
                @endswitch
            </th>
        </tr>
        <br> <br> <br>
        <tr>
            <td><strong>Dasar</strong></td>
            <td>:</td>
            <td>a. permohonan dari pegawai bersangkutan ; dan /atau</td>
        </tr>
        <tr class="align-top">
            <td> </td>
            <td>:</td>
            <td>b. surat persetujuan dispensasi <br><br><br></td>
        </tr>
        <tr>
            <td style="text-align: center" colspan="3">
                <strong>
                    MEMBERI IZIN
                </strong>
            </td>
        </tr>
        <tr>
            <td><strong>Kepada</strong></td>
            <td>:</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px" >{{ $n->user->name }}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px" >{{ $n->user->nip }}</td>
        </tr>
        <tr>
            <td>Pangkat/Gol.</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px" >{{ $n->user->pangkat_gol }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px" >{{ $n->user->jabatan }}</td>
        </tr>
        <tr class="align-top">
            <td>Alamat</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px" >{{ $n->user->alamat }}</td>
        </tr>
        <tr class="align-top">
            <td>Untuk</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; text-align: justify; padding-left: 17px">
                {{ $n->alasan_izin }}, tanggal
                @include('izin.tanggal')
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