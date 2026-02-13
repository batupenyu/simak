@extends('layout.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/perilaku.css') !!}">

<div class="container register py-5">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="{{ asset('image/garuda.png') }}" alt="" style="display: block; margin:auto">
            <h3 class="register-heading">Rencana Kerja Atasan (Tambahan)</h3>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row register-form">
                        @foreach ($tutam as $data)
                        <form class="form-card" action="{{ url('update_tutam/'.$data->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" value="{{ $data->user_id }}">
                            <div class="form-group">
                                <div class="form-group col-sm-12 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Rencana Kerja Atasan (tambahan)<span class="text-danger"> *</span></label>
                                    <select class="form-control" name="rk_id" id="">
                                        @foreach ($rk as $rkItem)
                                        <option value="{{ $rkItem->id }}" {{ $data->rk_id == $rkItem->id ? 'selected' : '' }}>
                                            {{ $rkItem->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label px-3">Rencana Kerja Pegawai<span class="text-danger"> *</span></label>
                                <textarea class="form-control" name="name" id="" cols="80" rows="3">{{ $data->name }}</textarea>
                            </div>
                            
                            <div class="row justify-content-end mt-3">
                                <div class="form-group col-sm-0 "> 
                                    <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Simpan</button>
                                </div>
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
