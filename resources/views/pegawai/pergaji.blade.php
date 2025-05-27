
@extends('layout.sidebar')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">

<div class="container-fluid mt-4">
    <a href="/pergajipdf/"style="text-decoration: none" class="float-end"><i class="fa fa-regular fa-download"></i></a>
    <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print tampil"></i></button>
    @include('pegawai.link')
    @include('pegawai.apbd')
    @include('pegawai.apbn')
    @include('pegawai.ipp')


</div>
@endsection