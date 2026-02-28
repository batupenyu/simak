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
                        <form class="form-card" action="{{ url('umpan.store2') }}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="umpan"><strong><u>Akuntabel</u></strong></label> <br>
                                    <label class="mb-3" for="umpan">
                                        <ol style="margin-bottom: 0; padding-left: 22px;">
                                            <li>Melaksanakan tugas dengan jujur bertanggung jawab cermat disiplin dan berintegritas tinggi
                                            </li>
                                            <li>Menggunakan kekayaan dan BMN secara bertanggung jawab efektif dan efisien
                                            </li>
                                            <li>Tidak menyalahgunakan kewenangan jabatan
                                            </li>
                                        </ol>
                                    </label>
                                    <textarea name="umpan2" id="" cols="80" rows="5"></textarea>
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
