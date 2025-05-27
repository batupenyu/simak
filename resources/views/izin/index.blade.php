@extends('layout.master')

@section('content')
<div class=" container container-fluid py-5">
    @foreach ($data as $item)
    {{-- <p class="d-inline-flex gap-0">
        <a href="{{ url('izin.show/'.$item->id) }}" class="btn btn-outline-primary" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
    </p> --}}
        @if ($item->pangkat_gol == 'IX')
                
            <p class="d-inline-flex gap-0">
                <a href="{{ url('izin.show/'.$item->id) }}" class="btn btn-success tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
            
        @elseif ($item->nip =='')
            <p class="d-inline-flex gap-0">
                <a href="{{ url('izin.show/'.$item->id) }}" class="btn btn-outline-dark tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @elseif ($item->unit_kerja =='KEJAKSAAN TINGGI KEP. BANGKA BELITUNG')
            <p class="d-inline-flex gap-0">
                <a href="{{ url('izin.show/'.$item->id) }}" class="btn btn-secondary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @else
            
            <p class="d-inline-flex gap-0">
                <a href="{{ url('izin.show/'.$item->id) }}" class="btn btn-outline-primary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @endif
    @endforeach
    
</div> 
@endsection