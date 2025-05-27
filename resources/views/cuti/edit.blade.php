@extends('layout.sidebar')
@section('content')
<style>
    body{color: #000;overflow-x: hidden;height: 100%;background-image: url("https://i.imgur.com/GMmCQHC.png");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}
</style>

<div class=" container-xl container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3 class="blue-text">EDIT USULAN CUTI</h3>
            <div class="card">
                <form class="form-card" action="{{ url('cuti.update/'.$cuti->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nama Pegawai<span class="text-danger"> *</span></label> 
                            <select name="user_id" id="user_id" class="form-control">
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}" {{$item->id == $cuti->user->id ?'selected' :'' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Jenis Cuti<span class="text-danger"> *</span></label> 
                            <select name="jenis_cuti" id="jenis_cuti" class="form-control">Jenis Cuti
                                <option value="Cuti Tahunan"{{ $cuti->jenis_cuti === 'Cuti Tahunan' ?'selected':'' }} >Cuti Tahunan</option>
                                <option value="Cuti Besar"{{ $cuti->jenis_cuti === 'Cuti Besar' ?'selected':'' }} >Cuti Besar</option>
                                <option value="Cuti Sakit"{{ $cuti->jenis_cuti === 'Cuti Sakit' ?'selected':'' }} >Cuti Sakit</option>
                                <option value="Cuti Melahirkan"{{ $cuti->jenis_cuti === 'Cuti Melahirkan' ?'selected':'' }} >Cuti Melahirkan</option>
                                <option value="Cuti Karena Alasan Penting"{{ $cuti->jenis_cuti === 'Cuti Karena Alasan Penting' ?'selected':'' }} >Cuti Karena Alasan Penting</option>
                                <option value="Cuti diluar Tanggungan Negara"{{ $cuti->jenis_cuti === 'Cuti Diluar Tanggungan Negara' ?'selected':'' }} >Cuti diluar Tanggungan Negara</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">No.Telp<span class="text-danger"> *</span></label> <input type="text" id="no_telp" name="no_telp" placeholder="" onblur="validate(1)" value="{{ $cuti->no_telp }}" > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">No.Surat<span class="text-danger"> *</span></label> <input type="text" id="no_surat" name="no_surat" placeholder="" onblur="validate(2)"value="{{ $cuti->no_surat }}"  > </div>
                    </div>
                        
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tgl. Surat.<span class="text-danger"> *</span></label> <input type="date" id="tgl_surat" name="tgl_surat" placeholder="" onblur="validate(3)" value="{{ $cuti->tgl_surat }}" > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tgl.Awal<span class="text-danger"> *</span></label> <input type="date" id="tgl_awal" name="tgl_awal" placeholder="" onblur="validate(5)" value="{{ $cuti->tgl_awal }}"  > </div>
                    </div>

                    <div class="row justify-content-between text-left">
                        {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tgl.Akhir<span class="text-danger"> *</span></label> <input type="date" id="tgl_akhir" name="tgl_akhir" placeholder="" onblur="validate(5)" value="{{ $cuti->tgl_akhir }}" > </div> --}}
                        {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tgl. Masuk<span class="text-danger"> *</span></label> <input type="text" id="tglmasuk" name="tglmasuk" placeholder="" onblur="validate(7)" value=" {{ Carbon\Carbon::Parse($date2)->translatedFormat(' d F Y') }} "  > </div> --}}
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><span class="text-danger"> *</span></label> <input type="hidden" id="tglmasuk" name="tglmasuk" placeholder="" onblur="validate(7)" value=" {{ Carbon\Carbon::Parse($akhir)->translatedFormat(' d-m-Y') }} "  > </div>

                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Unit Kerja<span class="text-danger"> *</span></label> <input type="text" id="unit_kerja" name="unit_kerja" placeholder="" onblur="validate(6)" value="{{ $cuti->user->unit_kerja }}" > </div>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Alasan Cuti<span class="text-danger"> *</span></label> <input type="text" id="alasan cuti" name="alasan cuti" placeholder="Kosongkan" onblur="validate(7)" value="{{ $cuti->alasan_cuti }}"  > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Jumlah hari<span class="text-danger"> *</span></label> <input type="text" id="jlh_hari" name="jlh_hari" placeholder="" onblur="validate(8)" value="{{ $count}}"> </div>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tahun 1<span class="text-danger"> *</span></label> <input type="text" id="tahun_1" name="tahun_1" placeholder="Kosongkan" onblur="validate(7)" value="{{ $cuti->tahun_1}}" disabled> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Sisa Tahun 1<span class="text-danger"> *</span></label> <input type="text" id="sisa_1" name="sisa_1" placeholder="" onblur="validate(7)" value="{{ $cuti->sisa_1}}"  > </div>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tahun 2<span class="text-danger"> *</span></label> <input type="text" id="tahun_2" name="tahun_2" placeholder="Kosongkan" onblur="validate(7)" value="{{ $cuti->tahun_2}}"disabled > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Sisa Tahun 2<span class="text-danger"> *</span></label> <input type="text" id="sisa_2" name="sisa_2" placeholder="" onblur="validate(7)" value="{{ $cuti->sisa_2}}"  > </div>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tahun 3<span class="text-danger"> *</span></label> <input type="text" id="tahun_3" name="tahun_3" placeholder="Kosongkan" onblur="validate(7)" value="{{ $cuti->tahun_2}}"disabled > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Sisa Tahun 3<span class="text-danger"> *</span></label> <input type="text" id="sisa_3" name="sisa_3" placeholder="" onblur="validate(7)" value="{{ $cuti->sisa_3}}" > </div>
                    </div>
                    {{-- <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tgl. Masuk<span class="text-danger"> *</span></label> <input type="text" id="tglmasuk" name="tglmasuk" placeholder="" onblur="validate(7)" value="{{ (Carbon\Carbon::parse($tglmasuk)->translatedFormat('d-m-Y')) }}"  > </div>
                    </div> --}}

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
