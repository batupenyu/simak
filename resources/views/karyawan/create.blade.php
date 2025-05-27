@extends('layout.sidebar')

@section('content')
<div class="container">
    <h1>Tambah Karyawan</h1>
    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" name="nip" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nomor_karpeg">Nomor Karpeg</label>
            <input type="text" name="nomor_karpeg" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pangkat">Pangkat</label>
            <input type="text" name="pangkat" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tmt_pangkat">TMT Pangkat</label>
            <input type="date" name="tmt_pangkat" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tmt_jabatan">TMT Jabatan</label>
            <input type="date" name="tmt_jabatan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="unit_kerja">Unit Kerja</label>
            <input type="text" name="unit_kerja" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="instansi">Instansi</label>
            <input type="text" name="instansi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ak_integrasi">ak_integrasi</label>
            <input type="text" name="ak_integrasi" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection