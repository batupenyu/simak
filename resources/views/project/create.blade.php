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
            <select class="form-control" id="pangkat_gol" name="pangkat_gol" required>
                <option value="-">-</option>
                <option value="IX">IX</option>
                <option value="MADYA DARMA/II.C.">MADYA DARMA/II.c.</option>
                <option value="Penata Muda, III/a">Penata Muda, III/a</option>
                <option value="Penata Muda TK.I, III/b">Penata Muda TK.I, III/b</option>
                <option value="Penata, III/c">Penata, III/c</option>
                <option value="Penata TK.I, III/d">Penata TK.I, III/d</option>
                <option value="Pembina, IV/a">Pembina, IV/a</option>
            </select>
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