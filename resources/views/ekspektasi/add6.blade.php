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
                        <form class="form-card" action="{{ url('/ekspektasi.store6') }}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="user_id">Pilih Pegawai : </label>
                                    <select name="user_id" id="user_id" class="form-control">
                                        @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <label for="eks6"><strong><u>Adaptif</u></strong></label> <br>
                                    <label class="mb-3" for="eks6">
                                        <ol style="margin-bottom: 0; padding-left: 22px;">
                                            <li>Cepat menyesuaikan diri menghadapi perubahan
                                            </li>
                                            <li>Terus berinovasi dan mengembangkan kreativitas
                                            </li>
                                            <li>Bertindak proaktif</li>
                                        </ol>
                                    </label>
                                    <textarea name="eks6" id="" cols="80" rows="5" placeholder="Perilaku 6"></textarea>
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
