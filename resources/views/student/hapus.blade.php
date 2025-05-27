@extends('layout.master')

@section('title','hapus')
@section('content')
<div class="container mt-5">
    <h3>Apakah yakin menghapus data : {{ $student->name }} {{ $student->nis }}</h3>
    <form class="d-inline" action="/student.index/{{ $student->id }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class=" btn btn-sm btn-danger">Hapus</button>
    </form>
    <a href="/student.index"><button class="btn btn-sm btn-secondary">Cancel</button></a>
</div>

@endsection