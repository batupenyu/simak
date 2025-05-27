@extends('layout.master')

@section('title','hapus')
@section('content')
<div class="container mt-5">

    <h3>Apakah yakin menghapus  : "{{ $anak->name }}"</h3>
    <form class="d-inline" action="/project.hapus_anak/{{ $anak->id }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class=" btn btn-sm btn-danger">Hapus</button>
    </form>
    <a href="/project"><button class="btn btn-sm btn-secondary">Cancel</button></a>
</div>

@endsection