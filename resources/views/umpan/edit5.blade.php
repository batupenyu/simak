@extends('layout.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/perilaku.css') !!}">

<div class="container register py-5">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <img src="{{ asset('image/garuda.png') }}" alt="" style="display: block; margin:auto">
            <h3 class="register-heading">Umpan Balik</h3>
        </div>
        <div class="col-md-9 register-right">
            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row register-form">
                        <form class="form-card" action="{{ url('umpan.update/'.$umpan->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="eks5"><strong><u>Loyal</u></strong></label> <br>
                                    <label class="mb-3" for="eks5">
                                        <ol style="margin-bottom: 0; padding-left: 22px;">
                                            <li>Memegang teguh ideologi Pancasila, Undang-Undang Dasar Negara Republik Indonesia Tahun 1945, setia pada NKRI serta pemerintahan yang sah
                                            </li>
                                            <li>Menjaga nama baik sesama ASN, Pimpinan, Instansi, dan Negara
                                            </li>
                                            <li>Menjaga rahasia jabatan dan negara</li>
                                        </ol>
                                    </label>
                                    <textarea name="umpan5" id="" cols="80" rows="5" >{{ $umpan->umpan5 }}</textarea>
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
    </div>
</div>
@endsection
