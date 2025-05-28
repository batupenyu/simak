@extends('layout.sidebar')

@section('content')
<div class="container">
    <h1>Create Atasan</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('store_atasan') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip') }}" required>
        </div>
        <div class="mb-3">
            <label for="pangkat_gol" class="form-label">Pangkat/Gol.</label>
            <input type="text" class="form-control" id="pangkat_gol" name="pangkat_gol" value="{{ old('pangkat_gol') }}" required>
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" required>
        </div>
        <div class="mb-3">
            <label for="unit_kerja" class="form-label">Unit Kerja</label>
            <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" value="{{ old('unit_kerja') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('index_atasan') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection