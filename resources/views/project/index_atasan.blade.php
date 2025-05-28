@extends('layout.sidebar')

@section('content')
<div class="container">
    <h1> Index Atasan</h1>
    <a href="{{ route('create_atasan') }}" class="btn btn-primary mb-3">Create New Atasan</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Pangkat/Gol.</th>
                <th>Jabatan</th>
                <th>Unit Kerja</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($atasan as $project)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $project->nama }}</td>
                <td>{{ $project->nip }}</td>
                <td>{{ $project->pangkat_gol }}</td>
                <td>{{ $project->jabatan }}</td>
                <td>{{ $project->unit_kerja }}</td>
                <td>
                    {{-- <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info">View</a> --}}
                    <a href="{{ url('atasan.edit', $project->id) }}" class="btn btn-warning">Edit</a>
                    {{-- <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection