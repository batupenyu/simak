@extends('layout.master')
@section('content')
    <title>Foto Laporan Kegiatan </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

{{-- @foreach ($pists as $d)
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
                _photo
        @endif
    @endsection
@endforeach --}}
<div class="container container-xxl  mt-5"  >
    <h4><a href="{{ url('pists.index') }}" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-home"></i></a></h4>

    <div class="panel panel-primary" style="text-align: center">
        <div class="panel-heading">
        {{-- <h2>Foto Laporan Kegiatan </h2> --}}
        </div>
        <div class="panel-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center" >
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @foreach(Session::get('images') as $image)
                <img src="images/{{ $image['name'] }}" width="300px">
            @endforeach
        @endif
        <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data" class="tampil" >
            @csrf
            <div class="mb-3 col-sm-6  center mx-auto ">
                <label class="form-label tampil" for="inputImage">Pilih Foto :</label>
                <input 
                    type="file" 
                    name="images[]" 
                    id="inputImage"
                    multiple 
                    class="form-control   @error('images') is-invalid @enderror" >
                @error('images')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 tampil " >
                <button type="submit" class="btn btn-success ">Upload</button>
                <button onclick="window.print();" class="btn btn-primary  ">CETAK</button>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection