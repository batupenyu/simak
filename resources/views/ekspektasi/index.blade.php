@extends('layout.master')

@section('content')
<div class=" container container-fluid py-5">
    {{-- <a href="{{ url('ekspektasi.add1') }}"><i class="fa fa-home" style="color: #ee1939"></i></a><br> --}}
    @foreach ($eks as $item)
        {{-- {{ $item->user }} --}}
    {{-- <hr> --}}
    @endforeach
    
</div> 
@endsection