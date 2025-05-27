@extends('layout.master')
@section('content')
<style>
    body{color: #000;overflow-x: hidden;height: 100%;background-image: url("https://i.imgur.com/GMmCQHC.png");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}
</style>    
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>UPDATE PASANGAN</h3>
            <div class="card">
                <form class="form-card" action="{{ url('pasangan.update/'.$data->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-between text-left">
                     
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Nama Pasangan<span class="text-danger"> *</span></label> 
                            <input type="text" id="name" name="name" placeholder="Enter your first name" onblur="validate(1)" value="{{ $data->name }}"> </div>

                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tgl Lahir<span class="text-danger"> *</span></label> <input type="date" id="tgl_lahir" name="tgl_lahir" placeholder="" onblur="validate(3)" value="{{ $data->tgl_lahir }}"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tgl. Kawin<span class="text-danger"> *</span></label> <input type="date" id="tgl_kawin" name="tgl_kawin" placeholder="" onblur="validate(4)" value="{{ $data->tgl_kawin }}"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Pekerjaan<span class="text-danger"> *</span></label> <input type="text" id="job" name="job" placeholder="" onblur="validate(5)"value="{{ $data->job }}"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-6 flex-column d-flex"> <label class="form-control-label px-3">Penghasilan<span class="text-danger"> *</span></label> <input type="text" id="net" name="net" placeholder="" onblur="validate(6)"value="{{ $data->net }}"> </div>

                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Status<span class="text-danger"> *</span></label> 
                                <select name="status" id="status" class="form-control">Jenis kelamin
                                    <option value="ditanggung"{{ $data->status === "ditanggung" ? 'selected':''}}>ditanggung</option>
                                    <option value="menanggung"{{ $data->status === "menanggung" ? 'selected':''}}>menanggung</option>
                                </select>
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
@endsection
