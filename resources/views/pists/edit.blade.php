@extends('layout.master')
@section('content')

<title>How to use select2 for multiple select in laravel 8</title>
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
    // alert("Selected Options '" + selected + "' Total Count "+ selected.length);
    document.getElementsByName("selected")[0].value = selected.length;
    }
</script>

<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 style="text-align: center" class="text-white">Edit Data</h6>
                    </div>
                    <h4><a href="{{ url('pists.index') }}" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-home"></i></a></h4>
                    <div class="card-body">
                        <form method="post" action="{{ url('pists.update/'.$pists->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- @if (count($pists->photo)>0)
                            <p>photo:</p>
                            @foreach ($pists->photo as $img)
                            <form action="/deleteimage/{{ $img->id }}" method="post">
                                <button class="btn text-danger">X</button>
                                @csrf
                                @method('delete')
                                </form>
                            <img src="/photo/{{ $img->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                            @endforeach
                            @endif --}}
                            
                            <div class="">
                                <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"><strong>Atasan</strong><span class="text-danger"> *</span></label> 
                                    <select name="penilai_id" id="penilai_id" class="form-control">
                                        @foreach ($penilai as $item)
                                            <option value="{{ $item->id }}" {{$item->id == $pists->penilai_id ?'selected' :'' }}>{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><strong>No.Surat</strong><span class="text-danger"> *</span></label> <input type="text" id="no_surat" name="no_surat" placeholder="" onblur="validate(1)" class="form-control" value="{{ $pists->no_surat }}"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><strong>Tgl. Surat</strong><span class="text-danger"> *</span></label> <input type="date" id="tgl_surat" name="tgl_surat" placeholder="" onblur="validate(1)" class="form-control"  value="{{ $pists->tgl_surat }}"  > </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"><strong>Asal Surat</strong><span class="text-danger"> *</span></label> <textarea class="ckeditor form-control"  type="text" id="asal_surat" name="asal_surat" placeholder="" onblur="validate(1)" class="form-control">{{ $pists->asal_surat }}</textarea> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><strong>No. Surat Asal</strong><span class="text-danger"> *</span></label> <input type="text" id="no_asal_surat" name="no_asal_surat" placeholder="" onblur="validate(1)" class="form-control" value="{{ $pists->no_asal_surat }}"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><strong>Tgl. Surat Asal</strong><span class="text-danger"> *</span></label> <input  type="date" id="tgl_surat_dasar" name="tgl_surat_dasar" placeholder="" onblur="validate(1)" class="form-control"value="{{ $pists->tgl_surat_dasar }}"> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"><strong>Hal Surat</strong><span class="text-danger"> *</span></label> <textarea class="ckeditor form-control" style="height:50pt"  type="text" id="description" name="description" placeholder="" onblur="validate(1)" class="form-control">{{ $pists->description }}</textarea> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"><strong>Maksud</strong><span class="text-danger"> *</span></label> <textarea class="ckeditor form-control" style="height:50pt"  type="text" id="maksud" name="maksud" placeholder="" onblur="validate(1)" class="form-control">{{ $pists->maksud }}</textarea> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"><strong>Tujuan</strong><span class="text-danger"> *</span></label> <textarea class="ckeditor form-control" style="height:50pt"  type="text" id="tujuan" name="tujuan" placeholder="" onblur="validate(1)" class="form-control">{{ $pists->tujuan }}</textarea> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"><strong>Acara</strong><span class="text-danger"> *</span></label> <textarea class="ckeditor form-control" style="height:100pt"  type="text" id="acara" name="acara" placeholder="" onblur="validate(1)" class="form-control">{{ $pists->acara }}</textarea> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"><strong>Ulasan</strong><span class="text-danger"> *</span></label> <textarea class="ckeditor form-control" style="height:100pt"  type="text" id="ulasan" name="ulasan" placeholder="" onblur="validate(1)" class="form-control">{{ $pists->ulasan }}</textarea> </div>
                            </div>
                            
                            {{-- <div class="form-group">
                                <label>Description</label>
                                <textarea class="ckeditor form-control" name="description"></textarea>
                            </div> --}}
                            
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><strong>Tgl.Awal</strong><span class="text-danger"> *</span></label> <input type="date" id="tgl_awal" name="tgl_awal" placeholder="" onblur="validate(1)" class="form-control" value="{{ $pists->tgl_awal }}"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><strong>Tgl.Akhir</strong><span class="text-danger"> *</span></label> <input type="date" id="tgl_akhir" name="tgl_akhir" placeholder="" onblur="validate(1)" class="form-control" value="{{ $pists->tgl_akhir }}"> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><strong>Jam Awal</strong><span class="text-danger"> *</span></label> <input type="text" id="jam_1" name="jam_1" placeholder="" onblur="validate(1)" class="form-control" value="{{ $pists->jam_1 }}"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"><strong>Jam Akhir</strong><span class="text-danger"> *</span></label> <input type="text" id="jam_2" name="jam_2" placeholder="" onblur="validate(1)" class="form-control" value="{{ $pists->jam_2 }}"> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"><strong>Tempat</strong><span class="text-danger"> *</span></label> <textarea class="ckeditor form-control" style="height:50pt"  type="text" id="tempat" name="tempat" placeholder="" onblur="validate(1)" class="form-control">{{ $pists->tempat }}</textarea> </div>
                            </div>
                            
                            <div class="">
                                <label class="form-control-label px-3"><strong>Peserta</strong><span class="text-danger"> *</span></label> <br>
                                <select class="select2-multiple form-control" name="cat[]" multiple="multiple" id="select2-multiple" multiple onchange="getCount()">
                                            @foreach ($pists->cat as $d)
                                                {{-- <option value="{{ $d }}"{{ $d ? 'selected' :'' }}>{{ $d }} </option> --}}
                                                {{-- @foreach (explode('-',$d) as $item)
                                                <option value="{{ $item }}"{{ $item ? 'selected' :'' }}>{{ trim($item) }}</option>
                                                @endforeach --}}
                                                @php
                                                    // $data = "foo:*:1023:1000::/home/foo:/bin/sh";
                                                    $data = $d;
                                                    list($nama, $nip, $pangkat_gol, $jabatan) = explode("-", $data);
                                                    echo $nama; // foo
                                                    echo $nip; // *
                                                    @endphp
                                                <option value="{{ $data }}"{{ $nama ? 'selected' :'' }}>{{ $nama }} </option>
                                            @endforeach
                                            {{-- @foreach($pists->cat as $xxx)
                                            @foreach(explode('-',$xxx) as $row)
                                            <option value="{{ $pists->id }}"{{ $row ? 'selected' :'' }}>
                                                @php
                                                $new = $row;
                                                explode ("-",$new);
                                                print_r($new);
                                                @endphp
                                            </option> 
                                            @endforeach
                                            @endforeach --}}
                                            @foreach  ($pegawai as $item)
                                            {{-- <option {{ $new   ? 'selected' :'' }}  value="{{ $item->name }}-{{ $item->pangkat_gol }}-{{ $item->nip }}-{{ $item->jabatan }}">{{ $item->name }}</option> --}}
                                            {{-- <option {{json_decode('cat') == $item->name || json_decode('cat') ? 'selected' : ''}}  value="{{ $item->name }}-{{ $item->pangkat_gol }}-{{ $item->nip }}-{{ $item->jabatan }}">{{ $item->name }}</option> --}}
                                            {{-- <option {{json_decode('cat') ? 'selected' : ''}}  value="{{ $item->name }}-{{ $item->pangkat_gol }}-{{ $item->nip }}-{{ $item->jabatan }}">{{ $item->name }}</option> --}}
                                            <option  value=" {{ $item->name}}-{{ $item->pangkat_gol }}-{{ $item->nip }}-{{ $item->jabatan }}">{{ $item->name }} </option>
                                            @endforeach
                                        </select>
                                <input class="form-control" type="text" id="selected" name="selected"  value="{{ $pists->selected }} " hidden>
                            </div>

                            <div class="form-group col-md-12" style="margin-bottom:15px; margin-top:30px;">
                                <label class="btn btn-sm btn-primary" for="actual-button" style="font-size:17px"><i class="bi bi-upload"></i> Surat</label>
                                <input type="file" id="actual-button" name="surat-pengajuan" hidden>
                                <div id="file-chosen" style="font-size: 13px; color: rgba(0, 0, 0, 0.637);">No file chosen</div>
                            </div>

                            {{-- <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="photo[]" multiple> --}}


                                    {{-- <option {{json_decode('cat') == $item->name || in_array(json_decode('cat'), $servicesarray) ? 'selected' : ''}}  value="{{ $item->name }}">{{ $item->name }}</option> --}}
                                    {{-- <option value="{{$item->id}}" @if($item->id === $pists->id) selected="selected" @endif>
                                        {{$item->name. " " . $item->provider->name}}
                                        {{ $item->name }}
                                    </option> --}}

                                    {{-- @foreach($pegawai as $item => $field_name)
                                    <option value = "{{ $item }}" selected >{{ $field_name->name }}</option>
                                    @endforeach --}}

                                    {{-- @foreach($pegawai as $key => $option)
                                    <option value="{{ $key }}">{{ $option }}</option>
                                    <option value="{{$key}}" @if ($option->id == $pists->id) {{'selected'}} @endif>{{ $option->name }}</option>
                                    @endforeach --}}




                            {{-- @php
                                $drugItems=[];
                                $doctor=auth()->id();
                                $patient= session()->get('id');
                                foreach ($data as $id => $details){
                                    $drugItems[]=array(
                                        'drug_id' => $id,
                                        'cat' => $details['1'],
                                        'patient_drug_id' => 1,
                                    );
                                }
                            @endphp

                            @foreach($drugItems as $drug => $d)
                                {{ $d['cat'] }} <br>
                            @endforeach


                            @php
                                $data = explode('-', $d ['cat']);
                                $accounts = [];

                                foreach ($data as $value=>$split) {
                                    $split = explode('-', $split);
                                    $accounts[$value]['cat'] = trim($split[0]);
                                    $accounts[$value]['cat'] = $split[0];
                                }

                                $x = json_encode($accounts);
                                echo $x;
                            @endphp --}}

                            <div class="text-center" style="margin-top: 10px;">
                                <button type="submit" class="btn btn-success" id="btnSelect" name="name">Save</button>
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
                allowClear: false
            });
        });

    </script>
    {{-- <script>
        $(function() {

        $('.select2-multiple').select2({
        theme: "classic",

        }).on('change', function(e) {
        var dataselected = $.map($(".select2-multiple option:selected"), function(el, i) {
            return el.value;
        });

        console.log(dataselected);

        });
        });
    </script> --}}
@endsection