@extends('layout.sidebar')

@section('title', 'Ajukan Cuti Pegawai')

@section('content')


<form method="POST" action="{{url('/ak.postData')}}" enctype="multipart/form-data">
    @csrf
    <div style="text-align: center" class="container w-50 mx-auto mt-5">
        <div class="row">
            <h4>Pengajuan Angka Kredit Pegawai</h4><br><br>
            <span class="line"></span>
            <div class="mb-2">
                <label for="user_id"><strong>Pilih Pegawai</strong></label>
                <select style="text-align: center" name="user_id" id="user_id" class="form-control">
                    {{-- <option value="">-- Pilih --</option> --}}
                    @foreach ($pegawai as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-0">
                <label for="penilai_id"><strong>Pilih Penilai</strong></label>
                <select style="text-align: center" name="penilai_id" id="penilai_id" class="form-control">
                    <option value="">-- Pilih --</option>
                    @foreach ($penilai as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <span class="line"></span>
            <div class="form-group col-md-6">
                <label for="awal-penilaian"><strong>Tanggal Awal penilaian</strong></label>
                <input type="date" class="form-control" name="tgl_awal_penilaian" >

                @error('tgl_awal_penilaian')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror       
            </div>
            <div class="form-group col-md-6">
                <label for="akhir-penilaian"><strong>Tanggal Akhir penilaian</strong></label>
                <input type="date" class="form-control" name="tgl_akhir_penilaian" >

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
                    <option hidden disabled selected>--Predikat--</option>
                    <option value="150">Sangat Baik</option>
                    <option value="100">Baik</option>
                    <option value="75">Butuh Perbaikan</option>
                    <option value="50">Kurang</option>
                    <option value="25">Sangat Kurang</option>
                </select>
                @error('predikat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-12 input-group mt-2 mb-auto">
            </div>
            <div class="form-group col-md-12">
                <label for="tgl_penetapan"><strong>Tanggal Penetapan</strong></label>
                <input type="date" class="form-control" name="tgl_penetapan" >

                @error('tgl_penetapan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror       
            </div>
            <br><br>
            <div class="form-group col-md-12 mt-2">
                <button type="submit" class="btn btn-success" style="font-size:18px">Ajukan</button>
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

