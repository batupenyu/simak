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
                        @foreach ($ekspektasi as $item)
                        <form class="form-card" action="{{ url('/ekspektasi/update/'.$item->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="eks3"><strong><u>Kompeten</u></strong></label> <br>
                                    <label class="mb-3" for="eks3">
                                        <ol style="margin-bottom: 0; padding-left: 22px;">
                                            <li>Meningkatkan kompetensi diri untuk menjawab tantangan yang selalu berubah
                                            </li>
                                            <li>Membantu orang lain belajar
                                            </li>
                                            <li>Melaksanakan tugas dengan kualitas terbaik</li>
                                        </ol>
                                    </label>
                                    <textarea name="eks3" id="" cols="80" rows="5" placeholder="Perilaku 1">{{ $item->eks3 }}</textarea>
                                </div>
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="eks2" id="" cols="80" rows="2" placeholder="Perilaku 2">{{ $item->eks2 }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="eks3" id="" cols="80" rows="2" placeholder="Perilaku 3">{{ $item->eks3 }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="eks4" id="" cols="80" rows="2" placeholder="Perilaku 4">{{ $item->eks4 }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="eks5" id="" cols="80" rows="2" placeholder="Perilaku 5">{{ $item->eks5 }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="eks6" id="" cols="80" rows="2" placeholder="Perilaku 6">{{ $item->eks6 }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="eks7" id="" cols="80" rows="2" placeholder="Perilaku 7">{{ $item->eks7 }}</textarea>
                                </div>
                            </div> --}}
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
