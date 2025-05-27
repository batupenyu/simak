@extends('layout.sidebar')


@section('content')
    
    @foreach ($pegawai as $item)
        @if ($item->jabatan =='GTT')
            <p class="d-inline-flex gap-0">
                <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-outline-primary tampil" role="button" >{{ ++$i }}. {{ $item->name }}</a>
            </p> 
        @else

        @endif
    @endforeach
    <button class="btn btn-secondary">{{$total}}</button>
    <p><a href="{{ url('pegawai.create') }}"><i class="fa fa-plus btn btn-sm btn-warning"><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Pegawai</b></i></a></p> <br>

    <i style="padding-right: 30px"><strong>Keterangan :</strong> </i>
    
    @include('pegawai.link')

@endsection