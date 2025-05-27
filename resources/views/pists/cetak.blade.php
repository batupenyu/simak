
@extends('layout.master')
@section('content')
@include('layout.kop')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
<div class="card-body">
    @foreach ($pists as $d)
    <div class="container-xl container-fluid">
        <h4><a href="{{ url('pegawai.index') }}" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-home"></i></a></h4>
        <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print"></i></button>
        <button class="btn btn-sm btn-outline float-end tampil" type="submit"><a href="{{ url('pists.edit/'.$d->id) }}"><i class="fa fa-edit"></i> </a> </button>
        {{-- <img class="mt-0" src={{ asset('image/kop2.png') }} style="display:inline-block; width:100%"> --}}
        {{-- <a href="{{ url('pists.cetak') }}" class="btn btn-primary" target="_blank">CETAK PDF</a> --}}
        <p style="text-align: center" class="mt-2">
        <strong><u>SURAT TUGAS</u></strong><br>
        Nomor : 094/{{ $d->no_surat }}/SMKN1/SR/{{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('Y') }}.
        </p>
    <table class="table table-sm table-borderless">
        <tr>
            <td><strong>Kepada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></td>
            <td style="text-align: justify" colspan="3">
                {{ $d->asal_surat }} 
                Nomor: {{ $d->no_asal_surat }} 
                hal {{ $d->description }}.
                tanggal {{ Carbon\Carbon::Parse($d->tgl_surat_dasar)->translatedFormat('d F Y') }}.
                <br><br>
            </td>
        </tr>
        <tr>
            <td style="text-align: center" colspan="5"><strong>MEMERINTAHKAN :</strong><br><br></td>
        </tr>
        <tr>
            <td><strong>Kepada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></td>
            <td colspan="2">
                @include('pists.template1')
            </td>
            
        </tr>
        
        <tr>
            <td><strong>Untuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></td>
            <td style="width: 30px">1.</td>
            <td style="text-align: justify" colspan="3">
                Melaksanakan Perjalanan Dinas dalam daerah dalam rangka {{ $d->description }} yang akan dilaksanakan pada:
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
                            {{ Carbon\Carbon::Parse($d->tgl_awal)->translatedFormat(' l, d F Y') }}
                            s.d
                            {{ Carbon\Carbon::Parse($d->tgl_akhir)->translatedFormat(' l, d F Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td>Waktu</td>
                        <td style="padding-right: 10px">:</td>
                        <td>
                            {{ $d->jam_1 }} s.d {{ $d->jam_2 }}
                        </td>
                    </tr>
                    <tr class="align-top">
                        <td>Tempat</td>
                        <td style="padding-right: 10px">:</td>
                        <td>{{ $d->tempat }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>2.</td>
            <td style="text-align: justify" colspan="3">
                Melaporkan hasil pelaksanaan kegiatan ini kepada Kepala SMK Negeri 1 Simpang Rimba
            </td>
        </tr>
        <tr>
            <td></td>
            <td>3.</td>
            <td style="text-align: justify" colspan="3">
                Dilaksanakan dengan sebaik-baiknya dan penuh rasa tanggungjawab.
            </td>
        </tr>
    </table>
    @endforeach
    </div>
</div>
<div class="col-5 float-end">
    @foreach ($user as $item)
    Dikeluarkan di : Simpang Rimba <br>
    Pada tanggal   : {{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('d F Y') }} <br>
    Kepala Sekolah <br><br><br>

    {{ $item->penilai->nama }} <br>
    NIP. {{ $item->penilai->nip }}
    @endforeach
</div>
@endsection