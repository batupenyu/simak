@extends('layout.master')
@section('content')
    <title>Foto Laporan Kegiatan </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    @section('title') 
        @if ($izin->tgl_akhir == $izin->tgl_awal)
        izin tgl.
        {{ Carbon\Carbon::Parse($izin->tgl_awal)->translatedFormat('  d F Y') }}
        - an. {{ $izin->user->name }}
            @else
                @if (Carbon\Carbon::Parse($izin->tgl_awal)->translatedFormat('F') ==
                    Carbon\Carbon::Parse($izin->tgl_akhir)->translatedFormat('F'))
                    izin tgl.
                    {{ Carbon\Carbon::Parse($izin->tgl_awal)->translatedFormat(' d') }}
                    s.d
                    {{ Carbon\Carbon::Parse($izin->tgl_akhir)->translatedFormat(' d F Y') }}
                @else
                    izin tgl.
                    {{ Carbon\Carbon::Parse($izin->tgl_awal)->translatedFormat(' d F') }}
                    s.d
                    {{ Carbon\Carbon::Parse($izin->tgl_akhir)->translatedFormat(' d F Y') }}
                    {{ Carbon\Carbon::Parse($izin->tgl_akhir)->translatedFormat(' d F Y') }}
                @endif
                - an. {{ $izin->user->name }}
        @endif
    @endsection
    
    <div class="container container-xxl  mt-5"  >
        <h4><a href="{{ url('izin.index') }}" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-home tampil"></i></a></h4>
        
        <div class="panel panel-primary" style="text-align: center">
            <div class="panel-heading">
                {{-- <h2>Foto Laporan Kegiatan </h2> --}}
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center" >
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                @foreach(Session::get('images') as $image)
                <img src="images/img/{{ $image['image'] }}" width="300px">
                @endforeach
                @endif

        <form action="{{ url('izin.store/'.$izin->id) }}" method="POST" enctype="multipart/form-data" class="tampil" >
            @csrf

            <div class="mb-3 col-sm-6  center mx-auto ">
                
                <label class="form-label tampil" for="inputImage">Pilih Foto </label>
                {{-- Kegiatan pada : 
                @if ($izin->tgl_akhir == $izin->tgl_awal)
                {{ Carbon\Carbon::Parse($izin->tgl_awal)->translatedFormat(' l / d F Y') }}
                @else
                    @if (Carbon\Carbon::Parse($izin->tgl_awal)->translatedFormat('F') ==
                        Carbon\Carbon::Parse($izin->tgl_akhir)->translatedFormat('F'))

                        {{ Carbon\Carbon::Parse($izin->tgl_awal)->translatedFormat(' l') }}
                        s.d
                        {{ Carbon\Carbon::Parse($izin->tgl_akhir)->translatedFormat(' l') }}
                        /
                        {{ Carbon\Carbon::Parse($izin->tgl_awal)->translatedFormat(' d') }}
                        s.d
                        {{ Carbon\Carbon::Parse($izin->tgl_akhir)->translatedFormat(' d F Y') }}
                    @else
                        {{ Carbon\Carbon::Parse($izin->tgl_awal)->translatedFormat(' l') }}
                        s.d
                        {{ Carbon\Carbon::Parse($izin->tgl_akhir)->translatedFormat(' l') }}
                        /
                        {{ Carbon\Carbon::Parse($izin->tgl_awal)->translatedFormat(' d F') }}
                        s.d
                        {{ Carbon\Carbon::Parse($izin->tgl_akhir)->translatedFormat(' d F Y') }}
                    @endif
                @endif --}}
                <br>
                {{-- {{ $pists->description }} --}}
                {{-- {{ $pists->acara }} --}}
                @if (session('status'))
                <div class="alert alert-success">{{session('status')}}</div>
                {{-- <span class="badge bg-secondary "></span> --}}
                @endif
                {{-- <button class="btn btn-primary" >
                </button> --}}
                <input 
                    type="file" 
                    name="images[]" 
                    id="inputImage"
                    multiple 
                    class="form-control mt-3 @error('images') is-invalid @enderror" >
                @error('images')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 tampil " >
                <button type="submit" class="btn btn-success ">Upload</button>
                <button onclick="window.print();" class="btn btn-primary  ">CETAK</button>
            </div>
        </form>
        <button class="btn btn-primary mx-auto " style="text-align: center; ">
            Photo/bukti fisik izin an. 
            {{ $izin->user->name }} <br>
            Keterangan : {{ $izin->alasan_izin }}
            {{-- {{ $izin->acara }}  --}}
            <br>
            @if ($izin->tgl_akhir == $izin->tgl_awal)
            {{ Carbon\Carbon::Parse($izin->tgl_awal)->translatedFormat(' l / d F Y') }}
            @else
                @if (Carbon\Carbon::Parse($izin->tgl_awal)->translatedFormat('F') ==
                    Carbon\Carbon::Parse($izin->tgl_akhir)->translatedFormat('F'))

                    {{ Carbon\Carbon::Parse($izin->tgl_awal)->translatedFormat(' l') }}
                    s.d
                    {{ Carbon\Carbon::Parse($izin->tgl_akhir)->translatedFormat(' l') }}
                    /
                    {{ Carbon\Carbon::Parse($izin->tgl_awal)->translatedFormat(' d') }}
                    s.d
                    {{ Carbon\Carbon::Parse($izin->tgl_akhir)->translatedFormat(' d F Y') }}
                @else
                    {{ Carbon\Carbon::Parse($izin->tgl_awal)->translatedFormat(' l') }}
                    s.d
                    {{ Carbon\Carbon::Parse($izin->tgl_akhir)->translatedFormat(' l') }}
                    /
                    {{ Carbon\Carbon::Parse($izin->tgl_awal)->translatedFormat(' d F') }}
                    s.d
                    {{ Carbon\Carbon::Parse($izin->tgl_akhir)->translatedFormat(' d F Y') }}
                @endif
            @endif
        </button>
        </div>
        <div class="col-md-12 " style="text-align: center">
            @foreach ($img as $item)
                <img src="{{ asset($item->image) }}" class="p-2 m-3 " style="width: 200px; height:400px" alt="img"/>
                <a href="{{ url('img.hapus/'.$item->id) }}"><i class=" fa fa-trash-o fa-fw tampil" style="color: red"></i></a>
            @endforeach
        </div>
    </div>
</div>

@endsection