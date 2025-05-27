@extends('layout.sidebar')

@section('content')
<div class="container">
    <h1>Detail Karyawan</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $karyawan->nama }}</h5>
            <p class="card-text"><strong>NIP:</strong> {{ $karyawan->nip }}</p>
            <p class="card-text"><strong>Nomor Karpeg:</strong> {{ $karyawan->nomor_karpeg }}</p>
            <p class="card-text"><strong>Tempat Lahir:</strong> {{ $karyawan->tempat_lahir }}</p>
            <p class="card-text"><strong>Tanggal Lahir:</strong> {{ $karyawan->tgl_lahir }}</p>
            <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $karyawan->jenis_kelamin }}</p>
            <p class="card-text"><strong>Pangkat:</strong> {{ $karyawan->pangkat }}</p>
            <p class="card-text"><strong>TMT Pangkat:</strong> {{ $karyawan->tmt_pangkat }}</p>
            <p class="card-text"><strong>Jabatan:</strong> {{ $karyawan->jabatan }}</p>
            <p class="card-text"><strong>TMT Jabatan:</strong> {{ $karyawan->tmt_jabatan }}</p>
            <p class="card-text"><strong>Unit Kerja:</strong> {{ $karyawan->unit_kerja }}</p>
            <p class="card-text"><strong>Instansi:</strong> {{ $karyawan->instansi }}</p>
            <p class="card-text"><strong>Ak integrasi:</strong> {{ $karyawan->ak_integrasi }}</p>
            <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection