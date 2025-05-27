@extends('layout.master')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.2/select2.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.2/select2.js"></script>
<script>
    function getCount() {
        var comboBoxes = document.querySelectorAll("select");
        var selected = [];
        for (var i = 1, len = comboBoxes.length; i < len; i++) {
        var combo = comboBoxes[i];
        var options = combo.children;
        for (var j = 0, length = options.length; j < length; j++) {
        var option = options[j];
        if (option.selected) {
            selected.push(option.text);
        }
        }
    }
    document.getElementsByName("selected")[0].value = selected.length;
    }
</script>
    <style type="text/css">
        body{color: #000;overflow-x: hidden;height: 100%;background-image: url("https://i.imgur.com/GMmCQHC.png");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0; font-weight: bold;}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}
    </style>    
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3 class="blue-text">TAMBAH PEGAWAI</h3>
            {{-- <p class="blue-text">Just answer a few questions<br> so that we can personalize the right experience for you.</p> --}}
            <div class="card">
                {{-- <h5 class="text-center mb-4">Powering world-class companies</h5> --}}
                    
                <form class="form-card" action="{{ url('/pegawai.store') }}" method="post">
                    @csrf
                    @method('post')
                    
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            {{-- <label class="form-control-label px-3">Nama<span class="text-danger"> *</span></label>  --}}
                            <input class=" @error ('name') is-invalid @enderror "  type="text" id="name" name="name" placeholder="Nama" onblur="validate(1)" >
                            <div id="nameFeedback" class="invalid-feedback">
                                isi nama
                            </div>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <input id="nip" type="text" placeholder="NIP" name="nip" class="@error('nip') is-invalid @enderror"/>
                            @error('nip')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Penilai<span class="text-danger"> *</span></label> 
                            <select name="penilai_id" id="penilai_id"  class="form-control">Penilai
                                @foreach ($penilai as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Atasan<span class="text-danger"> *</span></label> 
                            <select name="atasan_id" id="atasan_id" class="form-control">Penilai
                                @foreach ($atasan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Tgl.Lahir<span class="text-danger"> *</span></label> 
                            <input type="date" id="tgl_lahir" name="tgl_lahir"  onblur="validate(2)"  > </div>


                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Jenis Kelamin<span class="text-danger"> *</span></label> 
                            <select name="jk" id="jk" class="form-control">Jenis kelamin
                                <option value="Laki-Laki" >Laki-laki</option>
                                <option value="Perempuan" >Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex "> 
                            {{-- <label class="form-control-label px-3">Tempat lahir<span class="text-danger"> *</span></label>  --}}
                            <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat lahir" onblur="validate(5)" > </div>
                        <div class="form-group col-sm-6 flex-column d-flex "> 
                            {{-- <label class="form-control-label px-3">Tugas Tambahan<span class="text-danger"> *</span></label>  --}}
                            <input type="text" id="tugas_tambahan" name="tugas_tambahan" placeholder="Tugas Tambahan" onblur="validate(5)"  > </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> 
                            {{-- <label class="form-control-label px-3">Alamat<span class="text-danger"> *</span></label>  --}}
                            <input type="text" id="alamat" name="alamat" placeholder="  alamat" onblur="validate(3)"   > </div>
                        <div class="form-group col-sm-12 flex-column d-flex"> 
                            {{-- <label class="form-control-label px-3">Email<span class="text-danger"> *</span></label>  --}}
                            <input type="text" id="email" name="email" placeholder="  email" onblur="validate(3)"   > </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Agama<span class="text-danger"> *</span></label> 
                                <select name="agama" id="agama" class="form-control">Agama
                                    <option value="Islam" >Islam</option>
                                    <option value="Kristen" >Kristen</option>
                                    <option value="Khatolik" >Khatolik</option>
                                    <option value="Budha" >Budha</option>
                                    <option value="Hindu" >Budha</option>
                                </select>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            {{-- <label class="form-control-label px-3">Tgl. email<span class="text-danger"> *</span></label> --}}
                            <input type="hidden" id="email_verified_at" name="email_verified_at" placeholder="" onblur="validate(3)"  > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Password<span class="text-danger"> *</span></label> 
                            <input type="password" id="password" name="password" placeholder="Password" onblur="validate(3)"  > </div>

                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">TMT. Pangkat<span class="text-danger"> *</span></label> <input type="date" id="tmt_pangkat" name="tmt_pangkat" placeholder="" onblur="validate(3)"  > </div>

                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">TMT. Jabatan<span class="text-danger"> *</span></label> <input type="date" id="tmt_jabatan" name="tmt_jabatan" placeholder="" onblur="validate(3)" > </div>

                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            {{-- <label class="form-control-label px-3">No. Karpeg <span class="text-danger"> *</span></label>  --}}
                            <input type="text" id="no_karpeg" name="no_karpeg" placeholder="No.Karpeg" onblur="validate(3)" > </div>
                    </div>
                    
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            {{-- <label class="form-control-label px-3">Pekerjaan Lain<span class="text-danger"> *</span></label>  --}}
                            <input class=" @error ('job_lain') is-invalid @enderror " type="text" id="job_lain" name="job_lain" placeholder="Pekerjaan Lain" onblur="validate(4)"  > 
                            <div id="job_lainFeedback" class="invalid-feedback">
                                isi data pekerjaan lain.
                            </div>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            {{-- <label class="form-control-label px-3">Penghasilan Lain<span class="text-danger"> *</span></label>  --}}
                            <input type="text" id="net_lain" name="net_lain" placeholder="Penghasilan lain" onblur="validate(5)" > </div>
                    </div>
                    <div class="row justify-content-between text-left">

                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Pangkat/Gol<span class="text-danger"> *</span></label> 
                            <select name="pangkat_gol" id="pangkat_gol" class="form-control">Agama
                                <option value="-" >-</option>
                                <option value="IX" >IX</option>
                                <option value="Penata Muda, III/a" >Penata Muda, III/a</option>
                                <option value="Penata Muda TK.I, III/b" >Penata Muda TK.I, III/b</option>
                                <option value="Penata, III/c" >Penata, III/c</option>
                                <option value="Penata TK.I, III/d" >Penata TK.I, III/d</option>
                                <option value="Pembina, IV/a" >Pembina, IV/a</option>
                            </select> 
                        </div>
                    <div class="form-group col-sm-6 flex-column d-flex "> <label class="form-control-label px-3">Jabatan<span class="text-danger"> *</span></label> <input type="text" id="jabatan" name="jabatan" placeholder="" onblur="validate(5)"> </div>
                        {{-- <div class="form-group col-sm-4 flex-column d-flex"> <label class="form-control-label px-3">Jenjang<span class="text-danger"> *</span></label> 
                            <select name="jenjang" id="jenjang" class="form-control">jenjang
                                <option value="Ahli Pertama" >Ahli Pertama</option>
                                <option value="Ahli Muda" >Ahli Muda</option>
                                <option value="Ahli Madya" >Ahli Madya</option>
                            </select>
                        </div> --}}
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            {{-- <label class="form-control-label px-3">AK Integrasi<span class="text-danger"> *</span></label>  --}}
                            <input type="text" id="ak_integrasi" name="ak_integrasi" placeholder="ak_integrasi" onblur="validate(7)" > </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tgl.kp4<span class="text-danger"> *</span></label> <input type="date" id="tgl_kp4" name="tgl_kp4" placeholder="" onblur="validate(8)"  > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            {{-- <label class="form-control-label px-3">Unit Kerja<span class="text-danger"> *</span></label>  --}}
                            <input type="text" id="unit_kerja" name="unit_kerja" placeholder="Unit Kerja" onblur="validate(7)" > </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tgl.Awal SKP<span class="text-danger"> *</span></label> <input type="date" id="tgl_awal" name="tgl_awal" placeholder="" onblur="validate(9)"  > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tgl.Akhir SKP<span class="text-danger"> *</span></label> <input type="date" id="tgl_akhir" name="tgl_akhir" placeholder="" onblur="validate(10)" > </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-4 flex-column d-flex"> <label class="form-control-label px-3">Tgl.Pegawai<span class="text-danger"> *</span></label> <input type="date" id="tgl_pegawai" name="tgl_pegawai" placeholder="" onblur="validate(9)"  > </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> <label class="form-control-label px-3">Tgl.Penilai<span class="text-danger"> *</span></label> <input type="date" id="tgl_penilai" name="tgl_penilai" placeholder="" onblur="validate(10)" > </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> <label class="form-control-label px-3">Tgl.Atasan<span class="text-danger"> *</span></label> <input type="date" id="tgl_atasan" name="tgl_atasan" placeholder="" onblur="validate(10)" > </div>
                    </div>
                    <div class="form-group col-sm-12 flex-column d-flex"> 
                        <label class="form-control-label px-3">Pasangan<span class="text-danger"> *</span></label>
                        <select name="pasangan_id" id="pasangan_id" class="form-control">
                            @foreach ($pasangan as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-4 flex-column d-flex"> <label class="form-control-label px-3">Sumber Gaji<span class="text-danger"> *</span></label> 
                            <select name="sumber_gaji" id="sumber_gaji" class="form-control">sumber_gaji
                                <option value="-">-</option>
                                <option value="APBD">APBD</option>
                                <option value="APBN">APBN</option>
                                <option value="IPP">IPP</option>
                            </select>
                    </div>
                    <div class="form-group col-sm-4 flex-column d-flex"> <label class="form-control-label px-3">Pendidikan<span class="text-danger"> *</span></label> 
                            <select name="pendidikan" id="pendidikan" class="form-control">sumber_gaji
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                                <option value="D1">D1</option>
                                <option value="D2">D2</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="SLTA">SLTA</option>
                                <option value="SLTP">SLTP</option>
                                <option value="TUGAS BELAJAR">TUGAS BELAJAR</option>
                            </select>
                    </div>
                        <div class="form-group col-sm-4 flex-column d-flex "> 
                            {{-- <label class="form-control-label px-3">NUPTK<span class="text-danger"> *</span></label>  --}}
                            <input type="text" id="nuptk" name="nuptk" placeholder="NUTPK" onblur="validate(5)" > </div>
                    </div>

                    

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex "> <label class="form-control-label px-3">Mapel<span class="text-danger"> *</span></label> 
                        <select class="select2 form-control" name="mapel[]" multiple="multiple" id="select2" multiple onchange="getCount()">
                            @foreach ($mapel as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                        
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-4 flex-column d-flex ">  
                            {{-- <label class="form-control-label px-3">Jumlah jam<span class="text-danger"> *</span></label>  --}}
                            <input type="text" id="jlh_jam" name="jlh_jam" placeholder="Jumlah jam " onblur="validate(5)" > </div>
                        
                        <div class="form-group col-sm-4 flex-column d-flex ">  <label class="form-control-label px-3">Status<span class="text-danger"> *</span></label> 
                            <select name="status" id="status" class="form-control">status
                                <option value="-">-</option>
                                <option value="PNS">PNS</option>
                                <option value="P3K">P3K</option>
                                <option value="HONOR">HONOR</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 flex-column d-flex ">  <label class="form-control-label px-3">Jenis<span class="text-danger"> *</span></label> 
                            <select name="jenis" id="jenis" class="form-control">Jenis
                                <option value="GURU">GURU</option>
                                <option value="TU">TU</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex ">  
                            {{-- <label class="form-control-label px-3">Kabupaten<span class="text-danger"> *</span></label>  --}}
                            <input type="text" id="kabupaten" name="kabupaten" placeholder="Kabupaten" onblur="validate(5)" > </div>
                        <div class="form-group col-sm-6 flex-column d-flex ">  
                            {{-- <label class="form-control-label px-3">Kecamatan<span class="text-danger"> *</span></label>  --}}
                            <input type="text" id="kecamatan" name="kecamatan" placeholder="Kecamatan" onblur="validate(5)" > </div>
                        <div class="form-group col-sm-6 flex-column d-flex ">  
                            {{-- <label class="form-control-label px-3">Desa/Kelurahan<span class="text-danger"> *</span></label>  --}}
                            <input type="text" id="desa_kelurahan" name="desa_kelurahan" placeholder="Desa/Kelurahan" onblur="validate(5)" > </div>
                    </div>
                    
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex ">  <label class="form-control-label px-3">Sertifikasi/Belum<span class="text-danger"> *</span></label> 
                            <select name="sertifikasi" id="sertifikasi" class="form-control">Sertifikasi
                                <option value="sertifikasi">Sertifikasi</option>
                                <option value="nonsertifikasi">Nonsertifikasi</option>
                            </select>
                        </div>
                    
                        <div class="form-group col-sm-6 flex-column d-flex ">  
                            <label class="form-control-label px-3">Jurusan<span class="text-danger"> *</span></label> 
                            <input type="text" id="jurusan" name="jurusan" placeholder="" onblur="validate(5)" > </div>
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select",
                allowClear: true
            });
        });
    </script>
@endsection
