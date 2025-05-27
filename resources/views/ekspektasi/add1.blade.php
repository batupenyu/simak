@extends('layout.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/perilaku.css') !!}">

<div class="container register py-5">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3 class="register-heading">Perilaku Kerja</h3>
        </div>
        <div class="col-md-9 register-right">
            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row register-form">
                        {{-- @foreach ($user as $item) --}}
                        <form class="form-card" action="{{ url('/ekspektasi.store') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="user_id"  >Pilih Pegawai : </label>
                                    <select name="user_id" id="user_id" class="form-control">
                                        @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <label for="eks1"><strong><u>Berorientasi Pelayanan</u></strong></label> <br>
                                    <label class="mb-3" for="eks1">
                                        <ol style="margin-bottom: 0; padding-left: 22px;">
                                            <li>Memahami dan memenuhi kebutuhan masyarakat
                                            </li>
                                            <li>Ramah, cekatan, solutif, dan dapat diandalkan
                                            </li>
                                            <li>Melakukan perbaikan tiada henti
                                            </li>
                                        </ol>
                                    </label>
                                    <textarea name="eks1" id="" cols="80" rows="5" placeholder="Perilaku 1"></textarea>
                                </div>
                            </div>
                            <div class="row justify-content-end mt-3">
                                <div class="form-group col-sm-0 "> 
                                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Simpan</button>
                            </div>
                        </form>    
                        {{-- @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
