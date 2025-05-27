@extends('layout.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/perilaku.css') !!}">

<div class="container register py-5">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3 class="register-heading mb-3">Skema
                <img src={{ asset('image/garuda.png') }} style="display:block; margin:auto;">
            </h3>
        </div>
        <div class="col-md-9 register-right">
            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row register-form">
                        <form action="{{ url('skema.index')  }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Project<span class="text-danger"> *</span></label> 
                                   <select class="form-control" name="project_id" id="">
                                    @foreach ($project as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                    </select>
                                   </div>
                                   
                                   <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">User<span class="text-danger"> *</span></label> 
                                    <select class="form-control" name="user_id" id="">
                                        @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                            </div>
                            <div class="row justify-content-between text-left mt-3">
                                <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"> <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="skema" id="" cols="30" rows="3"></textarea>
                                </div>
                            </div>

                            
                            <div class="row justify-content-end mt-3">
                                <div class="form-group col-sm-0 "> 
                                    <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Simpan</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
