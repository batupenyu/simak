@extends('layout.sidebar')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 style="text-align: center" class="text-white">Input Data SK</h6>
                    </div>
                    <h4><a href="{{ url('sk.index') }}" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-home"></i></a></h4>
                    <div class="card-body">
                        
                        <form method="post" action="{{ url('sk.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <label><strong>Peserta :</strong></label><br/>
                                <select name="user_id" id="" class="form-control">
                                    @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Pejabat yang menerbitkan SK<span class="text-danger"> *</span></label> <textarea class="ckeditor form-control"  type="text" id="sk_pejabat" name="sk_pejabat" placeholder="" onblur="validate(1)" class="form-control"></textarea> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">No.SK<span class="text-danger"> *</span></label> <input type="text" id="no_sk" name="no_sk" placeholder="" onblur="validate(2)" class="form-control"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tgl. SK<span class="text-danger"> *</span></label> <input type="date" id="tgl_sk" name="tgl_sk" placeholder="" onblur="validate(1)" class="form-control" > </div>
                            </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Tentang<span class="text-danger"> *</span></label> <textarea class="ckeditor form-control"  type="text" id="sk_tentang" name="sk_tentang" placeholder="" onblur="validate(3)" class="form-control"></textarea> </div>
                            </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Sebagai<span class="text-danger"> *</span></label> <textarea class="ckeditor form-control"  type="text" id="sk_sebagai" name="sk_sebagai" placeholder="" onblur="validate(4)" class="form-control"></textarea> </div>
                            </div>
                            
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">No. Surat<span class="text-danger"> *</span></label> <input type="text" id="no_surat" name="no_surat" placeholder="" onblur="validate(5)" class="form-control"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tgl. Surat<span class="text-danger"> *</span></label> <input  type="date" id="tgl_surat" name="tgl_surat" placeholder="" onblur="validate(6)" class="form-control"> </div>
                            </div>
                                
                            <div class="text-center" style="margin-top: 10px;">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection
