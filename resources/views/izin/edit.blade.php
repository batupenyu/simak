@extends('layout.master')
@section('content')
<style>
    body{color: #000;overflow-x: hidden;height: 100%;background-image: url("https://i.imgur.com/GMmCQHC.png");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}
</style>    
<div class=" container-xl container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3 class="blue-text">EDIT USULAN IZIN</h3>
            <div class="card">
                <form class="form-card" action="{{ url('izin.update/'.$izin->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">No.Telp<span class="text-danger"> *</span></label> 
                            <select name="user_id" id="user_id" class="form-control">
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}" {{$item->id == $izin->user->id ?'selected' :'' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">No.Surat<span class="text-danger"> *</span></label> <input type="text" id="no_surat" name="no_surat" placeholder="" onblur="validate(2)"value="{{ $izin->no_surat }}"  > </div>
                    </div>
                        
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tgl. Surat.<span class="text-danger"> *</span></label> <input type="date" id="tgl_surat" name="tgl_surat" placeholder="" onblur="validate(3)" value="{{ $izin->tgl_surat }}" > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tgl.Awal<span class="text-danger"> *</span></label> <input type="date" id="tgl_awal" name="tgl_awal" placeholder="" onblur="validate(5)" value="{{ $izin->tgl_awal }}"  > </div>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tgl.Akhir<span class="text-danger"> *</span></label> <input type="date" id="tgl_akhir" name="tgl_akhir" placeholder="" onblur="validate(5)" value="{{ $izin->tgl_akhir }}"  > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Unit Kerja<span class="text-danger"> *</span></label> <input type="text" id="unit_kerja" name="unit_kerja" placeholder="" onblur="validate(6)" value="{{ $izin->user->unit_kerja }}" > </div>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Alasan izin<span class="text-danger"> *</span></label> 
                        <textarea name="alasan_izin" id="" cols="30" rows="3">{{ $izin->alasan_izin }}</textarea>
                        </div>
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex"> 
                        <label class="form-control-label px-3">Pilih Izin<span class="text-danger"> *</span></label> 
                        <select name="pilih_izin" id="pilih_izin" class="form-control mb-2">Pilih
                            <option value="UPACARA ATAU OLAHRAGA" @selected($izin->pilih_izin == 'UPACARA ATAU OLAHRAGA') >UPACARA ATAU OLAHRAGA</option>
                            <option value="PRESENSI SIDIK JARI" @selected($izin->pilih_izin == 'PRESENSI SIDIK JARI') >PRESENSI SIDIK JARI</option>
                            <option value="TIDAK MASUK KERJA" @selected($izin->pilih_izin == 'TIDAK MASUK KERJA') >TIDAK MASUK KERJA</option>

                        </select>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Jumlah hari<span class="text-danger"> *</span></label> <input type="text" id="jlh_hari" name="jlh_hari" placeholder="" onblur="validate(8)" value="{{ $izin->jlh_hari}}" > </div>
                        <div class="form-group col-sm-3 flex-column d-flex"> <label class="form-control-label px-3">Jam<span class="text-danger"> *</span></label> <input type="text" id="jam" name="jam" placeholder="" onblur="validate(8)" value="{{ $izin->jam}}" > </div>
                        <div class="form-group col-sm-3 flex-column d-flex"> <label class="form-control-label px-3">Jam<span class="text-danger"> *</span></label> <input type="text" id="jam_2" name="jam_2" placeholder="" onblur="validate(8)" value="{{ $izin->jam}}" > </div>
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
