@extends('layout.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/perilaku.css') !!}">

<div class="container register py-5">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="{{ asset('image/garuda.png') }}" alt="" style="display: block; margin:auto">
            <h3 class="register-heading">Rencana Kinerja (tambahan)</h3>
        </div>
        <div class="col-md-9 register-right">
            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row register-form">
                        <form class="form-card" action="{{ url('tuti.update/'.$tuti->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <label class="form-control-label px-3">Rencana Kerja<span class="text-danger"> *</span></label> 
                                        <select name="tutam_id" id="tutam_id" class="form-control mb-2">
                                            <option value="{{ $tuti->tutam->id }}" >{{ $tuti->tutam->name }}</option>
                                        </select>
                                    </div>
                                    <select name="aspek" id="aspek" class="form-control mb-2">aspek
                                        <option value="Kuantitas" {{ $tuti->aspek === 'Kuantitas' ? 'selected' :'' }}>Kuantitas</option>
                                        <option value="Kualitas" {{ $tuti->aspek === 'Kualitas' ? 'selected' :'' }}>Kualitas</option>
                                        <option value="Waktu" {{ $tuti->aspek === 'Waktu' ? 'selected' :'' }}>Waktu</option>
                                    </select>
                                    <textarea class="form-control" name="indikator" id="" cols="80" rows="2" placeholder="Indikator Kerja Pegawai">{{ $tuti->indikator }}</textarea>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Target<span class="text-danger"> *</span></label> <input class="form-control" type="text" id="target" name="target" placeholder="" onblur="validate(4)" value="{{ $tuti->target }}"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Satuan<span class="text-danger"> *</span></label> <input class="form-control" type="text" id="satuan" name="satuan" placeholder="Rp." onblur="validate(5)"value="{{ $tuti->satuan }}"> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Realisasi<span class="text-danger"> *</span></label> <input class="form-control" type="text" id="realisasi" name="realisasi" placeholder="" onblur="validate(4)" value="{{ $tuti->realisasi }}"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">umpanbalik<span class="text-danger"> *</span></label> <input class="form-control" type="text" id="umpanbalik" name="umpanbalik" placeholder="" onblur="validate(5)"value="{{ $tuti->umpanbalik }}"> </div>
                            </div>
                            <div class="row justify-content-end mt-3">
                                <div class="form-group col-sm-0 "> 
                                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Simpan</button>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
