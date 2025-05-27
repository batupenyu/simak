@extends('layout.sidebar')
@section('content')
<style>
    body{color: #000;overflow-x: hidden;height: 100%;background-image: url("https://i.imgur.com/GMmCQHC.png");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}
</style>    
<div class="container-fluid px-1 py-5 mx-auto" style="font-size: 10px">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>UPDATE ATASAN</h3>
            <div class="card">

                @foreach ($atasan as $item)
                    
                <form class="form-card" action="{{ url('atasan.update/'.$item->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Nama Pegawai<span class="text-danger"> *</span></label> <input type="text" id="nama" name="nama" placeholder="Enter your first name" onblur="validate(1)" value="{{ $item->nama }}"> </div>

                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">NIP<span class="text-danger"> *</span></label> <input type="text" id="nip" name="nip" placeholder="" onblur="validate(3)" value="{{ $item->nip }}"> </div>

                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Pangkat/Gol.<span class="text-danger"> *</span></label> <input type="text" id="pangkat_gol" name="pangkat_gol" placeholder="" onblur="validate(4)" value="{{ $item->pangkat_gol }}"> </div>
                        
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Jabatan<span class="text-danger"> *</span></label> <input type="text" id="jabatan" name="jabatan" placeholder="" onblur="validate(5)"value="{{ $item->jabatan }}"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Unit Kerja<span class="text-danger"> *</span></label> <input type="text" id="unit_kerja" name="unit_kerja" placeholder="" onblur="validate(6)"value="{{ $item->unit_kerja }}"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
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
@endsection
