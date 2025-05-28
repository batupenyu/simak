@extends('layout.sidebar')

@section('content')
<div class="container">
    <h1>Index Penilai</h1>
    <a href="{{ route('penilai.create') }}" class="btn btn-primary mb-3">Create Penilai</a>
    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Penilai</th>
                <th>NIP</th>
                <th>Pangkat/Gol</th>
                <th>Jabatan</th>
                <th>Unit Kerja</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penilai as $project)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $project->nama }}</td>
                <td>{{ $project->nip }}</td>
                <td>{{ $project->pangkat_gol }}</td>
                <td>{{ $project->jabatan }}</td>
                <td>{{ $project->unit_kerja }}</td>
                <td>
                    {{-- <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info">View</a> --}}
                    <a href="{{ url('penilai.edit', $project->id) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <form action="{{ route('penilai.destroy', $project->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this penilai?');">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection