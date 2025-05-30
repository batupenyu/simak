@extends('layout.sidebar')

@section('content')
<div class="container mt-4">
    <h2>Edit Unit Kerja</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('unit_kerja.update', $unitKerja->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $unitKerja->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description (optional)</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $unitKerja->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('unit_kerja.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection