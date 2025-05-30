@extends('layout.sidebar')

@section('content')
<div class="container mt-4">
    <h2>Unit Kerja Details</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $unitKerja->name }}</h5>
            <p class="card-text">{{ $unitKerja->description }}</p>
            <a href="{{ route('unit_kerja.edit', $unitKerja->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('unit_kerja.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection