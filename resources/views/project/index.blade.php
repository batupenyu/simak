@extends('layout.sidebar')

@section('content')

<div class="btn-group">
    @foreach ($pegawai as $item)
    <button type="button" class="btn btn-outline-danger dropdown-toggle dropend mt-3 me-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{$item->name}}
    </button>
    <div class="dropdown-menu">
        <!-- <a class="dropdown-item" href="/project.main/{{ $item->id }}" style="text-decoration: none;color:blueviolet"><i class="bi bi-123">Rencana SKP</i></a>
        <a class="dropdown-item" href="/project.evaluasi/{{ $item->id }}" style="text-decoration: none;color:blueviolet"><i class="bi bi-4-square-fill">Evaluasi SKP</i></a>
        <a class="dropdown-item" href="/project.report/{{ $item->id }}" style="text-decoration: none;color:blueviolet"> <i class="bi bi-123">Laporan SKP</i></a> -->
        <a class="dropdown-item" href="/project.edit_user/{{ $item->id }}" style="text-decoration: none;color:blueviolet">Edit Pegawai</a>
        <a class="dropdown-item" href="/project.index_anak/{{ $item->id }}" style="text-decoration: none;color:blueviolet">Data Anak</a>
        <a class="dropdown-item" href="/pasangan.kp4/{{ $item->id }}" style="text-decoration: none;color:blueviolet">KP-4.1</a>
        <a class="dropdown-item" href="/pasangan.kp3/{{ $item->id }}" style="text-decoration: none;color:blueviolet">KP-4.2</a>
        <a class="dropdown-item" href="{{ url('cuti.kendali/'.$item->id) }}" style="text-decoration: none;color:blueviolet">Data Cuti</a>
        <a class="dropdown-item" href="{{ url('izin.show/'.$item->id) }}" style="text-decoration: none;color:blueviolet">Surat Izin</a>
        <a class="dropdown-item" href="{{ url('angka_kredit/'.$item->id)}} " style="text-decoration: none;color:blueviolet">Angka Kredit</a>
        <!-- <hr class="dropdown-divider"> -->
    </div>
    @endforeach
</div>

@endsection