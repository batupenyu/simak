@extends('layout.sidebar')

@section('title', 'Edit AK Pegawai')

@section('content')


<form method="POST" action="{{url('ak.update/'.$ak->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container w-50">
        <div class="row">
            <h4 style="text-align: center">Edit Angka Kredit Pegawai</h4><br><br>
            {{-- <span class="line"></span> --}}
            {{-- <div class="">
            <div class="form-group col-md-12">
                    <label class="form-control-label px-3"><strong>Pegawai</strong><span class="text-danger"> *</span></label> 
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach ($pegawai as $item)
                            <option value="{{ $item->id }}" {{$item->id == $ak->user_id ?'selected' :'' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
            <div class="">
            <div class="form-group col-md-12">
                    <label class="form-control-label px-3"><strong>Penilai</strong><span class="text-danger"> *</span></label> 
                    <select name="penilai_id" id="penilai_id" class="form-control">
                        @foreach ($penilai as $item)
                            <option value="{{ $item->id }}" {{$item->id == $ak->user_id ?'selected' :'' }}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div> --}}

            <div class="form-group col-md-6">
                <label class="form-control-label px-3"><strong>Pegawai</strong><span class="text-danger"> *</span></label> 
                    <select style="text-align: center" name="user_id" id="user_id" class="form-control">
                        @foreach ($pegawai as $item)
                            <option value="{{ $item->id }}" {{$item->id == $ak->user_id ?'selected' :'' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>

                @error('tgl_awal_penilaian')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror       
            </div>
            <div class="form-group col-md-6">
                <label class="form-control-label px-3"><strong>Penilai</strong><span class="text-danger"> *</span></label> 
                    <select style="text-align: center" name="penilai_id" id="penilai_id" class="form-control">
                        @foreach ($penilai as $item)
                            <option value="{{ $item->id }}" {{$item->id == $ak->user_id ?'selected' :'' }}>{{ $item->nama }}</option>
                        @endforeach
                    </select>

                @error('tgl_akhir_penilaian')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <span class="line"></span> --}}
            <div class="form-group col-md-6">
                <label class="form-control-label px-3" for="awal-penilaian"><strong>Tanggal Awal penilaian</strong></label>
                <input type="date" class="form-control" name="tgl_awal_penilaian" value="{{ ($ak->tgl_awal_penilaian)}}" >

                @error('tgl_awal_penilaian')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror       
            </div>
            <div class="form-group col-md-6">
                <label class="form-control-label px-3" for="akhir-penilaian"><strong>Tanggal Akhir penilaian</strong></label>
                <input type="date" class="form-control" name="tgl_akhir_penilaian" value="{{ $ak->tgl_akhir_penilaian }}" >

                @error('tgl_akhir_penilaian')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-12 input-group mt-2 mb-auto">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1" style="height: 100%"><i class="bi bi-file-text"></i></span>
                </div>
                <select class="form-select form-select" aria-label=".form-select " style="text-align: center;"
                @error('predikat') is-invalid @enderror name="predikat" value="{{ old('predikat') }}">
                    <option hidden disabled selected>--Predikat-</option>
                    <option value="150" @if($ak->predikat =='150') selected @endif>Sangat Baik</option>
                    <option value="100" @if($ak->predikat =='100') selected @endif>Baik</option>
                    <option value="75" @if($ak->predikat =='75') selected @endif>Butuh Perbaikan</option>
                    <option value="50" @if($ak->predikat =='50') selected @endif>Kurang</option>
                    <option value="25" @if($ak->predikat =='25') selected @endif>Sangat Kurang</option>
                </select>
                @error('predikat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label class="form-control-label px-3" for="tgl_penetapan"><strong>Tanggal Penetapan</strong></label>
                <input type="date" class="form-control" name="tgl_penetapan" value="{{ $ak->tgl_penetapan }}" >

                @error('tgl_penetapan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror       
            </div>
            <br><br>
            <div class="form-group col-md-12 mt-2">
                <button type="submit" class="btn btn-success" style="font-size:18px">Update</button>
            </div>
        </div>            
    </div>
</form>
@endsection

@push('header')

<style>
    .container{
        margin-top: 30px;
        border: solid 1px rgba(0, 0, 0, 0.267);
        padding: 40px;
        width: 450px;
        text-align: center;
        line-height: 2;

    }
    .line {
        display: inline-block;
        width: 100%;
        border-top: 0.2px solid rgba(0, 0, 0, 0.267);
        margin-bottom: 20px;
    }
    .form-group input, .form-group select {
        background-color: transparent;
    }

</style>

<script>
$(document).ready(function() {
    const actualBtn = document.getElementById('actual-button');

    const fileChosen = document.getElementById('file-chosen');

    actualBtn.addEventListener('change', function(){
    fileChosen.textContent = this.files[0].name
    })
});
</script>

@endpush
