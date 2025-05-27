
@extends('layout.sidebar')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">

<div class="container-fluid mt-4">
    <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print tampil"></i></button>

@include('pegawai.usulan.lampiran')
@include('pegawai.usulan.ippptt')

@include('pegawai.usulan.ttd')

</div>
@endsection
