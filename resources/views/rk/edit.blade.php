@extends('layout.master')
@section('content')
        
<div class="container-fluid">
    <div class="w-50 center rounded mx-auto">
        <form action="{{ route('rk.update',$rk->id) }}" method="POST"  >
            @csrf
            @method('put')
            <div class="form-outline mb-4">
            <label class="form-label mt-5" for="form4Example3">Rencana Kerja Atasan</label>
            <textarea name="name"  class="form-control " id="form4Example3" rows="4">{{ $rk->name }}</textarea>
            </div>
            
            {{-- <textarea name="name" id="" cols="30" rows="3">{{ $rk->name }}</textarea> --}}
            {{-- <div class="form-outline mb-4">
                <input type="text" id="form4Example1" class="form-control" />
            <label class="form-label" for="form4Example1">Name</label>
            </div>

            <div class="form-outline mb-4">
            <input type="email" id="form4Example2" class="form-control" />
            <label class="form-label" for="form4Example2">Email address</label>
            </div> --}}


            {{-- <div class="form-check d-flex justify-content-center mb-4">
            <input class="form-check-input me-2" type="checkbox" value="" id="form4Example4" checked />
            <label class="form-check-label" for="form4Example4">
                Send me a copy of this message
            </label>
            </div> --}}

            <button type="submit" class="btn btn-primary btn-block mb-4">Ubah</button>
        </form>
    </div>
</div>
@endsection