@extends('layout.sidebar')

@section('content')
<div class="container">
    <h1>Daftar Karyawan</h1>
    <a href="{{ route('karyawan.create') }}" class="btn btn-primary">Tambah Karyawan</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIP</th>
                <th>Nomor Karpeg</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Pangkat</th>
                <th>TMT Pangkat</th>
                <th>Jabatan</th>
                <th>TMT Jabatan</th>
                <th>Unit Kerja</th>
                <th>Instansi</th>
                <th>AK Integrasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawan as $k)
            <tr>
                <td>{{ $k->nama }}</td>
                <td>{{ $k->nip }}</td>
                <td>{{ $k->nomor_karpeg }}</td>
                <td>{{ $k->tempat_lahir }}</td>
                <td>{{ $k->tgl_lahir }}</td>
                <td>{{ $k->jenis_kelamin }}</td>
                <td>{{ $k->pangkat }}</td>
                <td>{{ $k->tmt_pangkat }}</td>
                <td>{{ $k->jabatan }}</td>
                <td>{{ $k->tmt_jabatan }}</td>
                <td>{{ $k->unit_kerja }}</td>
                <td>{{ $k->instansi }}</td>
                <td>{{ $k->ak_integrasi}}</td>
                <td>
                    <a href="{{ route('karyawan.edit', $k->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('karyawan.destroy', $k->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection