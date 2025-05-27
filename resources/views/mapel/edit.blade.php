@extends('layout.master')
@section('content')
        
<div class="container-fluid">
    <div class="w-50 center rounded mx-auto">
        <form action="{{ route('mapel.update',$mapel->id) }}" method="POST"  >
            @csrf
            @method('put')
            <div class="form-outline mb-4">
            <label class="form-label mt-5" for="form4Example3">Mapel - Tugas</label>
            <textarea name="name"  class="form-control " id="form4Example3" rows="2">{{ $mapel->name }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block mb-4">Ubah</button>
        </form>
    </div>
</div>
@endsection