@extends('layout.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/perilaku.css') !!}">

<div class="container register py-5">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="{{ asset('image/garuda.png') }}" alt="" style="display: block; margin:auto">
            <h3 class="register-heading">Rencana Kinerja <br>
            Pegawai </h3>
        </div>
        <div class="col-md-9 register-right">
            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row register-form">
                        <form class="form-card" action="{{ url('tugas.simpan') }} " method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="col-md-12 mt-2">
                                <label class="form-control-label px-3">Rencana kerja atasan<span class="text-danger"> *</span></label> 
                                    <select class="form-control" name="rk_id" id="">Rencana Kerja Atasan
                                        @foreach ($rk as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                <div>
                                    <label class="form-control-label px-3">Rencana Kerja Pegawai<span class="text-danger"> *</span></label> 
                                    <textarea class="form-control mb-2 @error('name') is-invalid @enderror" name="name" id="" cols="80" rows="3" placeholder="name">{{ old('name') }} </textarea>
                                </div>
                                    @error('name')
                                        <div class="div-alert-danger-mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            
                            <div class="row justify-content-end mt-3">
                                <div class="form-group col-sm-0 "> 
                                    <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Simpan</button>
                                </div>
                            </div>  
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
