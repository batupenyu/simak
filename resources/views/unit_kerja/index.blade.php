@extends('layout.sidebar')

@section('content')
<div class="container mt-4">
    <h2>Unit Kerja List</h2>
    <a href="{{ route('unit_kerja.create') }}" class="btn btn-primary mb-3">Add New Unit Kerja</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unitKerjas as $unitKerja)
            <tr>
                <td>{{ $unitKerja->id }}</td>
                <td>{{ $unitKerja->name }}</td>
                <td>{{ $unitKerja->description }}</td>
                <td>
                    <a href="{{ route('unit_kerja.show', $unitKerja->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('unit_kerja.edit', $unitKerja->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('unit_kerja.destroy', $unitKerja->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure to delete this unit kerja?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection