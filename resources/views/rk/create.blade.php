@extends('layout.master')
@section('content')

<div class="container-fluid w-50 mx-auto">
    <form action="{{ route('rk.store') }}" method="POST">
        @csrf
        
        <div class="form-outline mb-4">
        <label class="form-label mt-5" for="form4Example3">Rencana Kerja Atasan</label>
        <textarea name="name"  class="form-control " id="form4Example3" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4">Simpan</button>
    </form>
</div>
@endsection