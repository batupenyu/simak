@extends('layout.sidebar')

@section('content')

    <div class="container mt-5 w-75">

        <p><b>DAFTAR SPMT PEGAWAI</b></p>
        <h4><a href="{{ url('sk.create') }}" class="btn btn-sm btn-outline-primary tampil float-end mb-3"><i class="fa fa-plus-circle"></i> DATA</a></h4>

        <table class="table">
        @foreach ($data as $item)
            <tr>
                <td>
                    <a class="btn btn-sm btn-outline-dark font-weight-bold tampil" href="{{ url('sk.cetak/'.$item->id) }}" style="text-decoration: none">{{ $item->user->name }}</a>
                </td>
                <td>
                    <form onsubmit="return confirm('yakin hapus data?..')" class="d-inline float-end " action="{{ url('sk.destroy',$item->id) }}" method="POST">
                        <a href="{{ url('sk.edit',$item->id) }}"><i class="fa fa-pencil tampil"></i></a>
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm" type="submit" class="btn "><i  class="fa fa-trash-o fa-lg tampil " style="color: #ee1939"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

    </div>

{{-- @include('layout.kop2')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
<div class="container-xl container-fluid ">
    <h4><a href="{{ url('sk.index') }}" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-home"></i></a></h4>
    <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print"></i></button> --}}

   
{{-- </div> --}}
@endsection
