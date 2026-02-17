@extends('layout.master')
@section('content')
<style>
    body{color: #000;overflow-x: hidden;height: 100%;background-image: url("https://i.imgur.com/GMmCQHC.png");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}
</style>    
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>TAMBAH DATA PASANGAN</h3>
            @if(session('success_pasangan'))
            <div class="alert alert-success mt-3">
                {{ session('success_pasangan') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">
                    
                <form class="form-card" action="{{ route('pasangan.store') }}" method="post">
                    @csrf
                    @method('post')
                    
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nama Pegawai<span class="text-danger"> *</span></label>
                            @if(isset($selected_user_id))
                            <input type="hidden" id="user_id" name="user_id" value="{{ $selected_user_id }}">
                            <input type="text" id="name" name="name" placeholder="Enter your first name" onblur="validate(1)" value="{{ $user->find($selected_user_id)->name ?? '' }}" readonly>
                            @else
                            <input type="text" id="name" name="name" placeholder="Enter your first name" onblur="validate(1)" >
                            @endif
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nama Pasangan<span class="text-danger"> *</span></label> <input type="text" id="pasangan_name" name="pasangan_name" placeholder="Nama Pasangan" onblur="validate(7)"  > </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tgl Lahir<span class="text-danger"> *</span></label> <input type="date" id="tgl_lahir" name="tgl_lahir" placeholder="" onblur="validate(2)"  > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tgl. Kawin<span class="text-danger"> *</span></label> <input type="date" id="tgl_kawin" name="tgl_kawin" placeholder="" onblur="validate(3)" > </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Pekerjaan</label> <input type="text" id="job" name="job" placeholder="Pekerjaan" onblur="validate(4)" > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Penghasilan</label> <input type="number" id="net" name="net" placeholder="Penghasilan" onblur="validate(5)" > </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-6 flex-column d-flex"> <label class="form-control-label px-3">Status</label>
                            <select name="status" id="status" onblur="validate(6)" class="form-control">status
                                <option value="ditanggung">ditanggung</option>
                                <option value="menanggung">menanggung</option>
                            </select>
                        </div>

                    </div>
                    <div class="row justify-content-end mt-3">
                        <div class="form-group col-sm-0 ">
                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Simpan</button>
                        <a href="{{ url('pegawai.info/'.$selected_user_id) }}" class="btn btn-secondary btn-flat ms-2">Batal</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
