
@extends('layout.master')
@section('content')
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
{{-- @foreach ($pists as $d) --}}

<div class="col-6 float-end card-body ">
    <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print"></i></button>
    <button class="btn btn-sm btn-outline float-end tampil" type="submit"><a href="{{ url('pists.edit/'.$d->id) }}"><i class="fa fa-edit"></i> </a> </button>
    <button class="btn btn-sm btn-outline float-end tampil" type="submit"><a href="{{ url('pists.index/')}}"><i class="fa fa-home"></i> </a> </button>

    LAMPIRAN I
    <br>
    SURAT TUGAS KEPALA SMKN 1 SIMPANG RIMBA
    <br>
    Nomor &nbsp;&nbsp;&nbsp;&nbsp;: 
    @if ($d->no_surat == '')
    094/............../SMKN1/SR/{{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('Y') }}.
    @else
    094/{{ $d->no_surat }}/SMKN1/SR/{{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('Y') }}.
    @endif
    <br>
    Tanggal &nbsp;&nbsp;&nbsp;: 
    {{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat(' d F Y') }}
</div>
<br><br><br><br><br><br>
<div class="col-md-12  card-body " style="text-align: center; text-transform:uppercase">
    <strong>DAFTAR NAMA KEGIATAN
        {{-- {{ $d->description }} --}}
        <br>
        {{ $d->acara }}

    </strong>
    <br><br>
    {{-- {{ $d->acara }} --}}
</div>

@endforeach


<div class="card-body  ">
    @include('pists.template3')
</div>
    
<div class="col-8 float-end text-center">
    Kepala Sekolah
    <br><br><br><br>
    {{ $d->penilai->nama }}
    <br>
    {{ $d->penilai->pangkat_gol }}
    <br>
    {{ $d->penilai->nip }}
</div>
@endsection
