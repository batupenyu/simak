@extends('layout.master')
@section('content')

<div class="container-fluid">
    <div class="w-50 center rounded mx-auto">
        <div class="card-body">

        <form action="{{ route('mapel.store') }}" method="POST">
            @csrf
            
            <div class="form-outline mb-4">
                <label class="form-label mt-5" for="form4Example3">Mata Pelajaran</label>
                <textarea name="name"  class="form-control " id="form4Example3" rows="2" placeholder="Mata pelajaran yang di ampu ........"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block mb-4">Simpan</button>
        </form>
        </div>
    </div>
</div>
@endsection