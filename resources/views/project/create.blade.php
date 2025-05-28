@extends('layout.sidebar')

@section('content')
<div class="container">
    <h1>Create Penilai</h1>
    <form method="POST" action="{{ route('penilai.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Penilai</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" required>
        </div>
        <div class="mb-3">
            <label for="pangkat_gol" class="form-label">Pangkat/Gol</label>
            <input type="text" class="form-control" id="pangkat_gol" name="pangkat_gol" required>
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
        </div>
        <div class="mb-3">
            <label for="unit_kerja" class="form-label">Unit Kerja</label>
            <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection