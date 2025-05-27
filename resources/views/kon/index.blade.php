@extends('layout.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/sdm.css') !!}">

<div class="container register py-5">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3 class="register-heading">
                {{-- <img src={{ asset('image/garuda.png') }} style="display:block; margin:auto;"> --}}
            </h3>
        </div>
        <div class="col-md-9 register-right">
            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row register-form">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{-- <table class="table table-bordered">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Dukungan sumber daya</th>
                                        <th>Skema pertanggungjawaban</th>
                                        <th>Konsekuensi</th>
                                    </tr>
                                    @foreach ($sdm as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}. 
                                            {{ $item->user->name }}</td>
                                        <td>{{ $item->sdm_1 }}</td>
                                        <td>{{ $item->sdm_2 }}</td>
                                        <td>{{ $item->sdm_3 }}</td>
                                    </tr>
                                    @endforeach
                                </table> --}}
                            </div>
                        </div>
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 px-2">
    {{-- <div class="mb-2 d-flex justify-content-between align-items-center">
        
        <div class="position-relative">
            <span class="position-absolute search"><i class="fa fa-search"></i></span>
            <input class="form-control w-100" placeholder="Search by order#, name...">
        </div>
        
        <div class="px-2">
            <span>Filters <i class="fa fa-angle-down"></i></span>
            <i class="fa fa-ellipsis-h ms-3"></i>
        </div>
    </div> --}}

<div class="table-responsive">
        <div>
            <a href="{{ url('kon.add') }}"  ><i class="fa fa-plus-circle tampil"></i></a>
        </div>
        <table class="table table-responsive table-borderless">
            <thead>
                <tr class="bg-light">
                    <th scope="col" width="5%"><input class="form-check-input" type="checkbox"></th>
                    <th scope="col" width="5%">#</th>
                    <th scope="col" width="20%">Nama</th>
                    <th scope="col" width="25%">Dukungan sumber daya</th>
                    {{-- <th scope="col" width="25%">Skema pertangungjawaban</th> --}}
                    <th scope="col" width="25%">Konsekuensi</th>
                    {{-- <th scope="col" width="20%"> --}}
                        {{-- Action --}}
                    {{-- </th> --}}
                {{-- <th scope="col" class="text-end" width="20%"><span>Action</span></th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($kon as $item)
                <tr>
                <th scope="col" width="5%"><input class="form-check-input" type="checkbox"></th>
                <td>{{ $loop->iteration }}. </td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->kon }}
                    <a href="{{ url('kon.edit/'.$item->id) }}"><i class="fa fa-edit"></i></a>
                </td>
                <td>
                </td>
                {{-- <td class="text-end"><span class="fw-bolder">$0.99</span> <i class="fa fa-ellipsis-h  ms-2"></i></td> --}}
            </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
