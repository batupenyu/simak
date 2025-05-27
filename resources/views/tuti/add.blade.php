@extends('layout.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/perilaku.css') !!}">

<div class="container register py-5">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="{{ asset('image/garuda.png') }}" alt="" style="display: block; margin:auto">
            <h3 class="register-heading">Rencana Kinerja <br>
            Pegawai </h3>
        </div>
        <div class="col-md-9 register-right">
            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row register-form">
                        <form class="form-card" action="{{ url('tuti.simpan') }} " method="post">
                            @csrf
                            <div class="row justify-content-between text-left">
                                <div>
                                    <label class="form-control-label px-3">Rencana Kerja<span class="text-danger"> *</span></label> 
                                    <select name="user_id" id="user_id" class="form-control mb-2">
                                        <option value="{{ $tutam->user->id }}">{{ $tutam->user->name }}</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="form-control-label px-3">Rencana Kerja<span class="text-danger"> *</span></label> 
                                    <select name="tutam_id" id="tutam_id" class="form-control mb-2">
                                        <option value="{{ $tutam->id }}" >{{ $tutam->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div>
                                    <label class="form-control-label px-3">Aspek<span class="text-danger"> *</span></label> 
                                    <select name="aspek" id="aspek" class="form-control mb-2">aspek
                                        <option value="Kuantitas"  >Kuantitas</option>
                                        <option value="Kualitas"  >Kualitas</option>
                                        <option value="Waktu"  >Waktu</option>
                                    </select>
                                    <label class="form-control-label px-3">Indikator<span class="text-danger"> *</span></label> 
                                    <textarea class="form-control mb-2" name="indikator" id="" cols="80" rows="3" placeholder="indikator"> </textarea>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Target<span class="text-danger"> *</span></label> <input class="form-control @error ('target') is-invalid @enderror" type="text" id="target" name="target" placeholder=" angka" onblur="validate(1)"  > </div>
                                @error('target')
                                <div class="div-alert-danger ">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Satuan<span class="text-danger"> *</span></label> <input class="form-control @error ('satuan') is-invalid @enderror" type="text" id="satuan" name="satuan" placeholder=" satuan" onblur="validate(2)" > </div>
                                <div id="satuanFeedback" class="invalid-feedback">
                                    isi data .
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div >
                                    <label class="form-control-label px-3">Realisasi<span class="text-danger"> *</span></label> 
                                    <textarea class="form-control mb-2" name="realisasi" id="" cols="80" rows="2" placeholder="realisasi"> </textarea>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div >
                                    <label class="form-control-label px-3">Umpan Balik<span class="text-danger"> *</span></label> 
                                    <textarea class="form-control mb-2" name="umpanbalik" id="" cols="80" rows="2" placeholder="umpanbalik"> </textarea>
                                </div>
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
