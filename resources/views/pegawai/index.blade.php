
@extends('layout.sidebar')
@section('content')
    
    @foreach ($pegawai as $item)
        <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-sm btn-outline-primary tampil" role="button" >{{ $loop->iteration }}.  {{ $item->name }}</a>
    @endforeach

    <hr>
    @foreach ($p3k as $item)
    <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-sm btn-outline-success tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
    @endforeach
    
    <hr>
    @foreach ($honor as $item)
        <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-sm btn-outline-secondary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
    @endforeach
{{--     
        @if ($item->pangkat_gol == 'IX')
            <p class="d-inline-flex gap-0">
                <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-success tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
            
        @elseif ($item->nip !='')
            <p class="d-inline-flex gap-0">
                <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-outline-dark tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @elseif ($item->unit_kerja =='KEJAKSAAN TINGGI KEP. BANGKA BELITUNG' && $item->pangkat_gol == 'SENA DARMA, II/d')
            <p class="d-inline-flex gap-0">
                <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-secondary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @elseif ($item->jabatan == 'PTT')
            
            <p class="d-inline-flex gap-0">
                <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-outline-warning tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @else
            <p class="d-inline-flex gap-0">
                <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-outline-primary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @endif --}}
    <p class="mt-3"><a href="{{ url('pegawai.create') }}"><i class="fa fa-plus btn btn-sm btn-warning"><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Pegawai</b></i></a></p> <br>

    <i style="padding-right: 30px"><strong>Keterangan :</strong> </i>
    @include('pegawai.link')

@endsection