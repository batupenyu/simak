@extends('layout.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/perilaku.css') !!}">

<div class="container register py-5">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3 class="register-heading">Aspek Kinerja</h3>
        </div>
        <div class="col-md-9 register-right">
            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row register-form">
                        @foreach ($tupoksi as $item)
                        <form class="form-card" action="{{ url('update_indikator/'.$item->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="aspek" class="mb-3"><strong>RENCANA KERJA PEGAWAI (ASPEK)</strong></label> <br>
                                    <select name="aspek" id="aspek" class="form-control">aspek
                                        <option value="Kuantitas" {{ $item->aspek === 'Kuantitas' ? 'selected' :'' }}>Kuantitas</option>
                                        <option value="Kualitas" {{ $item->aspek === 'Kualitas' ? 'selected' :'' }}>Kualitas</option>
                                        <option value="Waktu" {{ $item->aspek === 'Waktu' ? 'selected' :'' }}>Waktu</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row justify-content-end mt-3">
                                <div class="form-group col-sm-0 "> 
                                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Simpan</button>
                            </div>
                        </form>    
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
