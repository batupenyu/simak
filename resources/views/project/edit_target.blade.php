@extends('layout.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/perilaku.css') !!}">

<div class="container register py-5">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3 class="register-heading">Target dan Satuan Hasil Kerja</h3>
        </div>
        <div class="col-md-9 register-right">
            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row register-form">
                        @foreach ($tupoksi as $item)
                        <form class="form-card" action="{{ url('update_target/'.$item->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Target<span class="text-danger"> *</span></label> <input class="form-control" type="text" id="target" name="target" placeholder="" onblur="validate(4)" value="{{ $item->target }}"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Satuan<span class="text-danger"> *</span></label> <input class="form-control" type="text" id="satuan" name="satuan" placeholder="Rp." onblur="validate(5)"value="{{ $item->satuan }}"> </div>
                            </div>
                           
                            <div class="row justify-content-end mt-3">
                                <div class="form-group col-sm-0 "> 
                                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Simpan</button>
                            </div>
                        </form>    
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
