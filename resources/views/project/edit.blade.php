@extends('layout.master')
@section('content')

<div class="container-xl container-fluid">
    <div class="content-wrapper">
        <h3 class="box-title">Form Edit Pegawai</h3>
    </div>
    @foreach ($users as $item)
        <form action="{{ url('project/update/'.$item->id)}}" method="POST">
            @csrf
            @method('PUT')
            {{-- <label class="form-label has-star" for="kegiatantahunan-id_kegiatan_aspek">Aspek</label>
            <select id="kegiatantahunan-id_kegiatan_aspek" class="form-control" name="KegiatanTahunan[id_kegiatan_aspek]">
            <option value="">- Pilih Aspek -</option>
            <option value="1">Kuantitas</option>
            <option value="2">Kualitas</option>
            <option value="3">Waktu</option>
            <option value="4">Biaya</option>
            </select> --}}

            <div class="form-group highlight-addon field-title required">
                <textarea id="name" class="form-control"  rows="5" aria-required="true" name="name">{{ $item->name }} </textarea>
            </div>
            @endforeach
            
            <div class="form-group highlight-addon field-target">
                <input type="text" id="nip" class="form-control" name="nip" value="{{ $item->nip }}">
            </div>

            <div class="form-group highlight-addon field-target">
                <input type="text" id="pangkat_gol" class="form-control" name="pangkat_gol" value="{{ $item->pangkat_gol }}">
            </div>

            <div class="form-group highlight-addon field-target">
                <input type="text" id="jabatan" class="form-control" name="jabatan" value="{{ $item->jabatan }}">
            </div>

            <div class="form-group highlight-addon field-target">
                <input type="text" id="unit_kerja" class="form-control" name="unit_kerja" value="{{ $item->unit_kerja }}">
            </div>

            <div class="col-sm-12 mt-3">
                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Simpan</button>
                <a href="{{ url('project.index') }}" class="btn btn-warning btn-flat"><i class="fa fa-remove"></i> Batal</a>   
            </div>
    </form>    
</div>
@endsection
