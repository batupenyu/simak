@extends('layout.master')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.2/select2.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.2/select2.js"></script>

<div class="container-fluid w-50 mx-auto">
        <form method="post" action="{{ url('tim.update/'.$tim->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
        <div class="form-outline mb-0">
        <label class="form-label mt-3" for=""><b>Nama Tim</b></label>
        <textarea name="name"  class="form-control " id="" rows="3" >{{ $tim->name }}</textarea>
        </div>

        <div class="">
            <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"><strong>Atasan</strong><span class="text-danger"> *</span></label> 
                <select name="rk_id" id="rk_id" class="form-control">
                    @foreach ($rkatasan as $rk)
                        <option value="{{ $rk->id }}" {{$rk->id == $tim->rk_id ?'selected' :'' }}>{{ $rk->name}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        
        <div class="form-outline mb-2">
            <label class="form-label mt-0" for=""><b>Indikator</b></label>
            <textarea name="indikator"  class="form-control " id="" rows="3">{{ $tim->indikator }}</textarea>
        </div>
        
        <div class="">
            <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"><strong>Atasan</strong><span class="text-danger"> *</span></label> 
                <select name="penilai_id" id="penilai_id" class="form-control">
                    @foreach ($penilai as $penilai)
                        <option value="{{ $penilai->id }}" {{$penilai->id == $tim->penilai_id ?'selected' :'' }}>{{ $penilai->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="">
            <label><strong>Peserta :</strong></label><br/>
            <select class="select2-multiple form-control" name="anggota[]" multiple="multiple" id="select2-multiple" multiple onchange="getCount()">
                @foreach ($tim->anggota as $d)
                        {{-- @php
                        $data = $d;
                        list($nama, $nip, $pangkat_gol, $jabatan) = explode("-", $data);
                        echo $nama; // foo
                        echo $nip; // *
                        @endphp --}}
                    <option value="{{ $d }}"{{ $d ? 'selected' :'' }}>{{ $d }} </option>
                @endforeach
                @foreach  ($pegawai as $item)
                <option  value=" {{ $item->name}}">{{ $item->name }} </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4">Simpan</button>
    </form>
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