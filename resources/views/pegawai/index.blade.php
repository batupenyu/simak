
@extends('layout.sidebar')
@section('content')

<ul class="nav nav-tabs mb-3" id="pegawaiTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pns-tab" data-bs-toggle="tab" data-bs-target="#pns" type="button" role="tab" aria-controls="pns" aria-selected="true">PNS</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="p3k-tab" data-bs-toggle="tab" data-bs-target="#p3k" type="button" role="tab" aria-controls="p3k" aria-selected="false">P3K</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="honor-tab" data-bs-toggle="tab" data-bs-target="#honor" type="button" role="tab" aria-controls="honor" aria-selected="false">Honor</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="skp-tab" data-bs-toggle="tab" data-bs-target="#skp" type="button" role="tab" aria-controls="skp" aria-selected="false">SKP</button>
    </li>
</ul>

<div class="tab-content" id="pegawaiTabContent">
    <div class="tab-pane fade show active" id="pns" role="tabpanel" aria-labelledby="pns-tab">
        @foreach ($pegawai as $item)
            <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-sm btn-outline-primary tampil" role="button" >{{ $loop->iteration }}.  {{ $item->name }}</a>
        @endforeach
    </div>
    <div class="tab-pane fade" id="p3k" role="tabpanel" aria-labelledby="p3k-tab">
        @foreach ($p3k as $item)
            <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-sm btn-outline-success tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
        @endforeach
    </div>
    <div class="tab-pane fade" id="honor" role="tabpanel" aria-labelledby="honor-tab">
        @foreach ($honor as $item)
            <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-sm btn-outline-secondary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
        @endforeach
    </div>
    <div class="tab-pane fade" id="skp" role="tabpanel" aria-labelledby="skp-tab">
        <a href="{{ url('project/') }}" class="btn btn-sm btn-outline-primary tampil" role="button"><i class="bi bi-123"></i> Rencana SKP</a>
        <a href="{{ url('ekspektasi/index') }}" class="btn btn-sm btn-outline-success tampil" role="button"><i class="bi bi-4-square-fill"></i> Ekspektasi</a>
        <p class="mt-3"><a href="{{ url('pegawai.create') }}"><i class="fa fa-plus btn btn-sm btn-warning"><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Pegawai</b></i></a></p>
    </div>
</div>

<hr>

<p class="mt-3"><a href="{{ url('pegawai.create') }}"><i class="fa fa-plus btn btn-sm btn-warning"><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Pegawai</b></i></a></p> <br>

<i style="padding-right: 30px"><strong>Keterangan :</strong> </i>
@include('pegawai.link')

@endsection
