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

<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 style="text-align: center" class="text-white">Input Data</h6>
                    </div>
                    <h4><a href="{{ url('pists.index') }}" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-home"></i></a></h4>
                    <div class="card-body">

                        <form method="post" action="{{ route('postData') }}" enctype="multipart/form-data">
                                @csrf

                            <div class="">
                                <label><strong>Atasan :</strong></label><br/>
                                <select name="penilai_id" id="" class="form-control">
                                    @foreach ($penilai as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><strong>No.Surat</strong><span class="text-danger"> *</span></label> <input type="text" id="no_surat" name="no_surat" placeholder="" onblur="validate(1)" class="form-control"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><strong>Tgl. Surat.</strong><span class="text-danger"> *</span></label> <input type="date" id="" name="tgl_surat" placeholder="" onblur="validate(1)" class="form-control" > </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"><strong>Asal Surat</strong><span class="text-danger"> *</span></label> <textarea class="ckeditor form-control"  type="text" id="asal_surat" name="asal_surat" placeholder="" onblur="validate(1)" class="form-control"></textarea> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><strong>No. Surat Asal</strong><span class="text-danger"> *</span></label> <input type="text" id="no_asal_surat" name="no_asal_surat" placeholder="" onblur="validate(1)" class="form-control"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><strong>Tgl. Surat Asal</strong><span class="text-danger"> *</span></label> <input  type="date" id="tgl_surat_dasar" name="tgl_surat_dasar" placeholder="" onblur="validate(1)" class="form-control"> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"><strong>Hal Surat</strong><span class="text-danger"> *</span></label> <textarea class="ckeditor form-control" style="height: 50pt"  type="text" id="description" name="description" placeholder="" onblur="validate(1)" class="form-control"></textarea> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"><strong>Maksud</strong><span class="text-danger"> *</span></label> <textarea class="ckeditor form-control" style="height: 50pt"  type="text" id="maksud" name="maksud" placeholder="" onblur="validate(1)" class="form-control"></textarea> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"><strong>Tujuan</strong><span class="text-danger"> *</span></label> <textarea class="ckeditor form-control" style="height: 50pt"  type="text" id="tujuan" name="tujuan" placeholder="" onblur="validate(1)" class="form-control"></textarea> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"><strong>Acara</strong><span class="text-danger"> *</span></label> <textarea class="ckeditor form-control" style="height: 100pt"  type="text" id="acara" name="acara" placeholder="" onblur="validate(1)" class="form-control"></textarea> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"><strong>Ulasan</strong><span class="text-danger"> *</span></label> <textarea class="ckeditor form-control" style="height: 100pt"  type="text" id="ulasan" name="ulasan" placeholder="" onblur="validate(1)" class="form-control"></textarea> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><strong>Tgl.Awal</strong><span class="text-danger"> *</span></label> <input type="date" id="tgl_awal" name="tgl_awal" placeholder="" onblur="validate(1)" class="form-control"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><strong>Tgl.Akhir</strong><span class="text-danger"> *</span></label> <input type="date" id="tgl_akhir" name="tgl_akhir" placeholder="" onblur="validate(1)" class="form-control"> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><strong>Jam Awal</strong><span class="text-danger"> *</span></label> <input type="text" id="jam_1" name="jam_1" placeholder="" onblur="validate(1)" class="form-control"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><strong>Jam Akhir</strong><span class="text-danger"> *</span></label> <input type="text" id="jam_2" name="jam_2" placeholder="" onblur="validate(1)" class="form-control"> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"><strong>Tempat</strong><span class="text-danger"> *</span></label> <input type="text" id="tempat" name="tempat" placeholder="" onblur="validate(1)" class="form-control"> </div>
                            </div>
                            
                            <div class="">
                                <label><strong>Peserta :</strong></label><br/>
                                <select class="select2-multiple form-control" name="cat[]" multiple="multiple" id="select2-multiple" multiple onchange="getCount()">
                                    @foreach  ($pegawai as $item)
                                    <option value="{{ $item->name }}-{{ $item->pangkat_gol }}-{{ $item->nip }}-{{ $item->jabatan }}">{{ $item->jabatan }}</option>
                                    @endforeach
                                </select>
                                <input class="form-control" type="text" id="selected" name="selected" hidden>
                            </div>
                            <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple hidden>
                            
                            <div class="form-group col-md-12" style="margin-bottom:15px; margin-top:30px;">
                                <label class="btn btn-sm btn-primary" for="actual-button" style="font-size:17px"><i class="bi bi-upload"></i> Surat</label>
                                <input type="file" id="actual-button" name="surat-pengajuan" hidden>
                                <div id="file-chosen" style="font-size: 13px; color: rgba(0, 0, 0, 0.637);">No file chosen</div>
                            </div>
                            
                            <div class="text-center" style="margin-top: 10px;">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2-multiple').select2({
                placeholder: "Select",
                allowClear: true
            });
        });
    </script>

    

@endsection
