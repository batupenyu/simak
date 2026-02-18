@extends('layout.sidebar')

@section('content')
<div class="container">
    <h1>Edit Penilai</h1>
    <form method="POST" action="{{ route('penilai.update', $penilai->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Penilai</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $penilai->nama) }}" required>
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip', $penilai->nip) }}" required>
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
                <option value="JAKSA UTAMA PRATAMA (IV/b)">JAKSA UTAMA PRATAMA (IV/b)</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan', $penilai->jabatan) }}" required>
        </div>
        <div class="mb-3">
            <label for="unit_kerja" class="form-label">Unit Kerja</label>
            <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" value="{{ old('unit_kerja', $penilai->unit_kerja) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection