@extends('layout.sidebar')

@section('content')
<div class="container">
    <h1>Edit Karyawan</h1>
    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $karyawan->nama }}" required>
        </div>
        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ $karyawan->nip }}" required>
        </div>
        <div class="form-group">
            <label for="nomor_karpeg">Nomor Karpeg</label>
            <input type="text" name="nomor_karpeg" class="form-control" value="{{ $karyawan->nomor_karpeg }}" required>
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" value="{{ $karyawan->tempat_lahir }}" required>
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" value="{{ $karyawan->tgl_lahir }}" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="Laki-laki" {{ $karyawan->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $karyawan->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pangkat">Pangkat</label>
            <input type="text" name="pangkat" class="form-control" value="{{ $karyawan->pangkat }}" required>
        </div>
        <div class="form-group">
            <label for="tmt_pangkat">TMT Pangkat</label>
            <input type="date" name="tmt_pangkat" class="form-control" value="{{ $karyawan->tmt_pangkat }}" required>
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="{{ $karyawan->jabatan }}" required>
        </div>
        <div class="form-group">
            <label for="tmt_jabatan">TMT Jabatan</label>
            <input type="date" name="tmt_jabatan" class="form-control" value="{{ $karyawan->tmt_jabatan }}" required>
        </div>
        <div class="form-group">
            <label for="unit_kerja">Unit Kerja</label>
            <input type="text" name="unit_kerja" class="form-control" value="{{ $karyawan->unit_kerja }}" required>
        </div>
        <div class="form-group">
            <label for="instansi">Instansi</label>
            <input type="text" name="instansi" class="form-control" value="{{ $karyawan->instansi }}" required>
        </div>
        <div class="form-group">
            <label for="ak_integrasi">ak_integrasi</label>
            <input type="text" name="ak_integrasi" class="form-control" value="{{ $karyawan->ak_integrasi }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection