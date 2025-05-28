@extends('layout.sidebar')

@section('content')
<div class="container">
    <h1>Delete Penilai</h1>
    <p>Are you sure you want to delete the penilai: <strong>{{ $penilai->nama }}</strong>?</p>
    <form method="POST" action="{{ route('penilai.destroy', $penilai->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
        <a href="{{ route('penilai.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection