@extends('layout.master')
@section('content')


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

{{-- selec2 cdn --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.2/select2.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.2/select2.js"></script>


<style>
    body{color: #000;overflow-x: hidden;height: 100%;background-image: url("https://i.imgur.com/GMmCQHC.png");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2); max-width: 900px; margin-left: auto; margin-right: auto;}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}

    /* Added styles for label-input alignment and spacing */
    .form-group.d-flex {
        flex-wrap: nowrap;
        justify-content: flex-start;
    }
    .form-group.d-flex > label {
        width: 150px;
        margin-bottom: 0;
        font-weight: 700; /* Make label text bold */
        text-align: left;
        display: block;
    }
    .form-group.d-flex > input,
    .form-group.d-flex > select {
        flex-grow: 1;
        min-width: 0;
    }
</style>    
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3 class="blue-text">UPDATE PEGAWAI</h3>
            <div class="card">
                    
                <form class="form-card" action="{{ url ('/project/update/'.$user->id) }}" method="post">
                    @csrf
                    @method('PUT')

              
                    <div class="row">
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-0 mb-0">Nama<span class="text-danger"> </span></label> <input type="text" id="name" name="name" placeholder="Enter your first name" onblur="validate(1)" value="{{ $user->name }}"> </div>
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-0 mb-0">NIP<span class="text-danger"> </span></label> <input type="text" id="nip" name="nip" placeholder="" onblur="validate(3)" value="{{ $user->nip }}" > </div>
                    </div>
                    <div class="row">
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Penilai<span class="text-danger"> </span></label> 
<select name="penilai_id" id="penilai_id" class="form-control">Penilai
                                @foreach ($penilai as $atas)
                                <option value="{{ $atas->id }}"{{ $user->penilai_id == $atas->id ? 'selected':'' }}>{{ $atas->nama }}</option>
                                @endforeach
                            </select>
                        </div>
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Atasan<span class="text-danger"> </span></label> 
<select name="atasan_id" id="atasan_id" class="form-control">Penilai
                                    @foreach ($atasan as $bos)
                                        <option value="{{ $bos->id }}"{{ $bos->id == $user->atasan_id ? 'selected':'' }}>{{ $bos->nama }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="row">
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Tgl.Lahir<span class="text-danger"> </span></label> <input type="date" id="tgl_lahir" name="tgl_lahir" placeholder="tgl. lahir" onblur="validate(2)" value="{{ $user->tgl_lahir }}"> </div>


<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Jenis Kelamin<span class="text-danger"> </span></label> 
<select name="jk" id="jk" class="form-control">Jenis kelamin
                                    <option value="Laki-Laki"{{ $user->jk === "Laki-Laki" ? 'selected':''}}>Laki-Laki</option>
                                    <option value="Perempuan"{{ $user->jk === "Perempuan" ? 'selected':''}}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
<div class="form-group col-sm-12 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Alamat<span class="text-danger"> </span></label> <input type="text" id="alamat" name="alamat" placeholder="  alamat" onblur="validate(3)"  value="{{ $user->alamat }}" > </div>

<div class="form-group col-sm-6 d-flex align-items-center"> 
                            <label class="form-control-label px-3 me-3 mb-0">Pasangan<span class="text-danger"> </span></label>
<select name="pasangan_id" id="pasangan_id" class="form-control">
                                @foreach ($pasangan as $item)
                                <option value="{{ $item->id }}" {{$item->id == $user->pasangan_id ?'selected' :'' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                            
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Email<span class="text-danger"> </span></label> <input type="text" id="email" name="email" placeholder="  email" onblur="validate(3)" value="{{ $user->email }}"  > </div>
                        </div>

                        <div class="row justify-content-between text-left">
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Agama<span class="text-danger"> </span></label> 
<select name="agama" id="agama" class="form-control">Agama
                                    <option value="Islam"{{ $user->agama === "Islam" ? 'selected':''}}>Islam</option>
                                    <option value="Kristen"{{ $user->agama === "Kristen" ? 'selected':''}}>Kristen</option>
                                    <option value="Khatolik"{{ $user->agama === "Khatolik" ? 'selected':''}}>Khatolik</option>
                                    <option value="Budha"{{ $user->agama === "Budha" ? 'selected':''}}>Budha</option>
                                    <option value="Hindu"{{ $user->agama === "Hindu" ? 'selected':''}}>Budha</option>
                                </select>
                        </div>
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Tgl. email<span class="text-danger"> </span></label> <input type="date" id="email_verified_at" name="email_verified_at" placeholder="" onblur="validate(3)" value="{{ $user->tgl_email }}" > </div>

<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Password<span class="text-danger"> </span></label> <input type="password" id="password" name="password" placeholder="" onblur="validate(3)"  value="{{ $user->password }}"> </div>

<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">TMT. Pangkat<span class="text-danger"> </span></label> <input type="date" id="tmt_pangkat" name="tmt_pangkat" placeholder="" onblur="validate(3)" value="{{ $user->tmt_pangkat }}" > </div>

<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">TMT. Jabatan<span class="text-danger"> </span></label> <input type="date" id="tmt_jabatan" name="tmt_jabatan" placeholder="" onblur="validate(3)" value="{{ $user->tmt_jabatan }}" > </div>

<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">No. Karpeg <span class="text-danger"> </span></label> <input type="text" id="no_karpeg" name="no_karpeg" placeholder="" onblur="validate(3)" value="{{ $user->no_karpeg }}" > </div>
                        </div>
                        
                        <div class="row justify-content-between text-left">
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Pekerjaan Lain<span class="text-danger"> </span></label> <input class=" @error ('job_lain') is-invalid @enderror " type="text" id="job_lain" name="job_lain" placeholder="" onblur="validate(4)" value="{{ $user->job_lain }}" > 
                                <div id="job_lainFeedback" class="invalid-feedback">
                                    isi data pekerjaan lain.
                                </div>
                            </div>
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Penghasilan Lain<span class="text-danger"> </span></label> <input type="text" id="net_lain" name="net_lain" placeholder="Rp." onblur="validate(5)" value="{{ $user->net_lain }}" > </div>
                        </div>

                        <div class="row justify-content-between text-left">

<div class="form-group col-sm-6 d-flex align-items-center"> 
    <label class="form-control-label px-3 me-3 mb-0">Pangkat/Gol<span class="text-danger"> </span></label> 
    <select name="pangkat_gol" id="pangkat_gol" class="form-control">Pangkat
        <option value="-" {{ $user->pangkat_gol === "-" ? 'selected':''}}>-</option>
        <option value="IX" {{ $user->pangkat_gol === "IX" ? 'selected':''}}>IX</option>
        <option value="Penata Muda, III/a" {{ $user->pangkat_gol === "Penata Muda, III/a" ? 'selected':''}}>Penata Muda, III/a</option>
        <option value="Penata Muda TK.I, III/b" {{ $user->pangkat_gol === "Penata Muda TK.I, III/b" ? 'selected':''}}>Penata Muda TK.I, III/b</option>
        <option value="Penata, III/c" {{ $user->pangkat_gol === "Penata, III/c" ? 'selected':''}}>Penata, III/c</option>
        <option value="Penata TK.I, III/d" {{ $user->pangkat_gol === "Penata TK.I, III/d" ? 'selected':''}}>Penata TK.I, III/d</option>
        <option value="Pembina, IV/a" {{ $user->pangkat_gol === "Pembina, IV/a" ? 'selected':''}}>Pembina, IV/a</option>
    </select> 
</div>

                            <div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Jabatan<span class="text-danger"> </span></label> <input type="text" id="jabatan" name="jabatan" placeholder="" onblur="validate(5)" value="{{ $user->jabatan }}"> </div>
                            <div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">AK Integrasi<span class="text-danger"> </span></label> <input type="text" id="ak_integrasi" name="ak_integrasi" placeholder="" onblur="validate(7)" value="{{ $user->ak_integrasi }}"> </div>
                            <div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Status<span class="text-danger"> </span></label> 
                                <select name="status" id="status" class="form-control">status
                                                                    <option value="PNS"{{ $user->status === "PNS" ? 'selected':''}}>PNS</option>
                                                                    <option value="P3K"{{ $user->status === "P3K" ? 'selected':''}}>P3K</option>
                                                                    <option value="HONOR"{{ $user->status === "HONOR" ? 'selected':''}}>HONOR</option>
                                                                </select>
                                                            </div>

                        </div>
                        <div class="row justify-content-between text-left">
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Tgl.kp4<span class="text-danger"> </span></label> <input type="date" id="tgl_kp4" name="tgl_kp4" placeholder="" onblur="validate(3)" value="{{ $user->tgl_kp4}}" > </div>

<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Unit Kerja<span class="text-danger"> </span></label> <input type="text" id="unit_kerja" name="unit_kerja" placeholder="" onblur="validate(7)" value="{{ $user->unit_kerja }}"> </div>

                        </div>
                        <div class="row justify-content-between text-left">
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Tgl.Awal SKP<span class="text-danger"> </span></label> <input type="date" id="tgl_awal" name="tgl_awal" placeholder="" onblur="validate(8)" value="{{ $user->tgl_awal}}" > </div>
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Tgl.Akhir SKP<span class="text-danger"> </span></label> <input type="date" id="tgl_akhir" name="tgl_akhir" placeholder="" onblur="validate(9)"value="{{ $user->tgl_akhir}}" > </div>
                        </div>

                        <div class="row justify-content-between text-left">
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Tgl.Pegawai<span class="text-danger"> </span></label> <input type="date" id="tgl_pegawai" name="tgl_pegawai" placeholder="" onblur="validate(10)" value="{{ $user->tgl_pegawai}}"   > </div>
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Tgl.Penilai<span class="text-danger"> </span></label> <input type="date" id="tgl_penilai" name="tgl_penilai" placeholder="" onblur="validate(11)" value="{{ $user->tgl_penilai}}"  > </div>
</div>
<div class="row justify-content-between text-left">
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Tgl.Atasan<span class="text-danger"> </span></label> <input type="date" id="tgl_atasan" name="tgl_atasan" placeholder="" onblur="validate(12)" value="{{ $user->tgl_atasan}}"  > </div>
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Sumber Gaji<span class="text-danger"> </span></label> 
<select name="sumber_gaji" id="sumber_gaji" class="form-control">sumber_gaji
                                    <option value="-"{{ $user->sumber_gaji === "-" ? 'selected':''}}>-</option>
                                    <option value="APBD"{{ $user->sumber_gaji === "APBD" ? 'selected':''}}>APBD</option>
                                    <option value="APBN"{{ $user->sumber_gaji === "APBN" ? 'selected':''}}>APBN</option>
                                    <option value="IPP"{{ $user->sumber_gaji === "IPP" ? 'selected':''}}>IPP</option>
                                </select>
                        </div>
</div>
<div class="row justify-content-between text-left">
<div class="form-group col-sm-6 d-flex align-items-center">
                        <label class="form-control-label px-3 me-3 mb-0">Pendidikan<span class="text-danger"> </span></label> 
<select name="pendidikan" id="pendidikan" class="form-control">pendidikan
                                    <option value="matematika"{{ $user->pendidikan === "D1" ? 'selected':''}}>D1</option>
                                    <option value="D2"{{ $user->pendidikan === "D2" ? 'selected':''}}>D2</option>
                                    <option value="D3"{{ $user->pendidikan === "D3" ? 'selected':''}}>D3</option>
                                    <option value="D4"{{ $user->pendidikan === "D4" ? 'selected':''}}>D4</option>
                                    <option value="S1"{{ $user->pendidikan === "S1" ? 'selected':''}}>S1</option>
                                    <option value="S2"{{ $user->pendidikan === "S2" ? 'selected':''}}>S2</option>
                                    <option value="S3"{{ $user->pendidikan === "S3" ? 'selected':''}}>S3</option>
                                    <option value="SLTA"{{ $user->pendidikan === "SLTA" ? 'selected':''}}>SLTA</option>
                                    <option value="SLTP"{{ $user->pendidikan === "SLTP" ? 'selected':''}}>SLTP</option>
                                    <option value="PEGAWAI TUBEL"{{ $user->pendidikan === "PEGAWAI TUBEL" ? 'selected':''}}>PEGAWAI TUBEL</option>
                                </select>
                        </div>
<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">NUPTK<span class="text-danger"> </span></label> <input type="text" id="nuptk" name="nuptk" placeholder="" onblur="validate(5)" value="{{ $user->nuptk }}"> </div>
                        </div>

                        <div class="row justify-content-between text-left">
<div class="form-group col-sm-6 d-flex align-items-center "> <label class="form-control-label px-3 me-3 mb-0">Tempat lahir<span class="text-danger"> </span></label> <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="" onblur="validate(5)" value="{{ $user->tempat_lahir }}"> </div>
<div class="form-group col-sm-6 d-flex align-items-center "> <label class="form-control-label px-3 me-3 mb-0">Tugas Tambahan<span class="text-danger"> </span></label> <input type="text" id="tugas_tambahan" name="tugas_tambahan" placeholder="" onblur="validate(5)" value="{{ $user->tugas_tambahan }}"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
<div class="form-group col-sm-6 d-flex align-items-center "> <label class="form-control-label px-3 me-3 mb-0">Jumlah jam<span class="text-danger"> </span></label> <input type="text" id="jlh_jam" name="jlh_jam" placeholder="" onblur="validate(5)" value="{{ $user->jlh_jam }}"> </div>

<div class="form-group col-sm-6 d-flex align-items-center"> <label class="form-control-label px-3 me-3 mb-0">Jenis<span class="text-danger"> </span></label> 
<select name="jenis" id="jenis" class="form-control">jenis
                                    <option value="GURU"{{ $user->jenis === "GURU" ? 'selected':''}}>GURU</option>
                                    <option value="TU"{{ $user->jenis === "TU" ? 'selected':''}}>TU</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
<div class="form-group col-sm-6 d-flex align-items-center ">  <label class="form-control-label px-3 me-3 mb-0">Kabupaten<span class="text-danger"> </span></label> <input type="text" id="kabupaten" name="kabupaten" placeholder="" onblur="validate(5)" value="{{ $user->kabupaten }}"> </div>
<div class="form-group col-sm-6 d-flex align-items-center ">  <label class="form-control-label px-3 me-3 mb-0">Kecamatan<span class="text-danger"> </span></label> <input type="text" id="kecamatan" name="kecamatan" placeholder="" onblur="validate(5)" value="{{ $user->kecamatan }}"> </div>
<div class="form-group col-sm-6 d-flex align-items-center ">  <label class="form-control-label px-3 me-3 mb-0">Desa/Kel<span class="text-danger"> </span></label> <input type="text" id="desa_kelurahan" name="desa_kelurahan" placeholder="" onblur="validate(5)" value="{{ $user->desa_kelurahan }}"> </div>
<div class="form-group col-sm-6 d-flex align-items-center">  <label class="form-control-label px-3 me-3 mb-0">Sertifikasi<span class="text-danger"> </span></label> 
    <select name="sertifikasi" id="sertifikasi" class="form-control">Sertifikasi
        <option value="nonsertifikasi" {{ $user->serftikasi == 'nonsertifikasi' ? 'selected' : '' }}>Nonsertifikasi</option>
        <option value="sertifikasi {{ $user->sertfikasi == "sertifikasi" ? 'selected' :'' }}">Sertifikasi</option>
    </select>
</div>
                        </div>
                        
<div class="row justify-content-between text-left">
    <div class="form-group col-sm-6 d-flex align-items-center ">  <label class="form-control-label px-3">NIK<span class="text-danger"> </span></label> <input type="text" id="nik" name="nik" placeholder="" onblur="validate(5)" value="{{ $user->nik }}" > </div>
    <div class="form-group col-sm-6 d-flex align-items-center ">  <label class="form-control-label px-3">Jurusan<span class="text-danger"> </span></label> <input type="text" id="jurusan" name="jurusan" placeholder="" onblur="validate(5)" value="{{ $user->jurusan }}" > </div>
</div>

<div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 d-flex align-items-center">  <label class="form-control-label px-3 me-3 mb-0">Mapel<span class="text-danger"> </span></label> 
                            @foreach ($user->mapel as $data)
                            <option value="{{ $data }}"{{ $data ? 'selected' :'' }}>{{ $data }} </option>
                        @endforeach
                        <select class="mySelect form-control" name="mapel[]" multiple="multiple" id="mySelect" onchange="getCount()">
                            @foreach ($mapel as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Select2
        $('#mySelect').select2();

        // Update Select2 on button click
        $('#updateButton').click(function() {
            // Clear existing options
            $('#mySelect').empty();

            // Add new options
            $('#mySelect').append('<option value="4">Option 4</option>');
            $('#mySelect').append('<option value="5">Option 5</option>');

            // Set selected values
            $('#mySelect').val(['4']);

            // Refresh Select2
            $('#mySelect').trigger('change');

            
        });

        
    });

    $('#mySelect').on('change', function() {
var selectedValues = $(this).val();
console.log('Selected values:', selectedValues);
});

</script>


<script>
    $(document).ready(function() {
    $('.select2').select2({
        placeholder: "Select",
        allowClear: true,
        // width: '100%'
    });
});
</script>

@endsection
