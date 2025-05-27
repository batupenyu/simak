@extends('layout.master')

@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/anak.css') !!}">

<div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="card px-1 py-4">
        <div class="card-body">
            <div class="d-flex flex-row"> </div>


                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $eror)
                                    <li>{{ $eror }}</li>
                                @endforeach
                            </ul>
                        @endif
                <form action="{{ url('anak/update_anak/'.$anak->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- <div class="mb-0">
                        <select name="project_id" id="project_id" class="form-control">
                            @foreach ($project as $item)
                                <option value="{{ $item->id }}"{{ $anak->project_id == $item->id ? 'selected' : '' }}>{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="mb-0">
                        <select name="user_id" class="form-control" id="">
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}"{{ $anak->user_id==$item->id ? 'selected':'' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-0">
                        <select name="pasangan_id" class="form-control" id="">
                            @foreach ($pasangan as $item)
                                <option value="{{ $item->id }}"{{ $anak->pasangan_id==$item->id ? 'selected':'' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-0">
                        <input type="text"class="form-control"name="name" id="name"  value="{{ $anak->name }}">
                    </div>
                    
                    <div class="mb-0">
                        <input type="date" class="form-control"name="tgl_lahir" id="tgl_lahir"  value="{{ $anak->tgl_lahir }}">
                    </div>
                    
                    
                    <select class="form-control" id="anak" name="anak">
                        <option value="-" {{($anak->anak ==='-') ? 'selected' : ''}}> - </option>
                        <option value="aa" {{($anak->anak ==='aa') ? 'selected' : ''}}> aa </option>
                        <option value="ak" {{($anak->anak ==='ak') ? 'selected' : ''}}> ak </option>
                        <option value="at" {{($anak->anak ==='at') ? 'selected' : ''}}> at </option>
                    </select>

                    <select class="form-control" id="perkawinan" name="perkawinan">
                        <option value="-" {{($anak->perkawinan ==='-') ? 'selected' : ''}}> - </option>
                        <option value="Kawin" {{($anak->perkawinan ==='Kawin') ? 'selected' : ''}}> Kawin </option>
                        <option value="Belum Kawin" {{($anak->perkawinan ==='Belum Kawin') ? 'selected' : ''}}> Belum Kawin </option>
                    </select>

                    <div class="mb-0">
                        <input type="text" class="form-control"name="status_sekolah" id="status_sekolah"  value="{{ $anak->status_sekolah }}">
                    </div>

                    <select class="form-control" id="status_beasiswa" name="status_beasiswa">
                        <option value="-" {{($anak->status_beasiswa ==='-') ? 'selected' : ''}}> - </option>
                        <option value="Mendapat Beasiswa" {{($anak->status_beasiswa ==='Mendapat Beasiswa') ? 'selected' : ''}}> Mendapat Beasiswa </option>
                    </select>
                    
                    <div class="mb-0">
                        <input type="date" class="form-control"name="tgl_meninggal_cerai" id="tgl_meninggal_cerai"  value="{{ $anak->tgl_meninggal_cerai }}">
                    </div>
                    
                    <select class="form-control" id="pekerjaan" name="pekerjaan">
                        <option value="-" {{($anak->pekerjaan ==='-') ? 'selected' : ''}}> - </option>
                        <option value="Belum Bekerja" {{($anak->pekerjaan ==='Belum Bekerja') ? 'selected' : ''}}> Belum Bekerja </option>
                        <option value="Sudah Bekerja" {{($anak->pekerjaan ==='Sudah Bekerja') ? 'selected' : ''}}> Sudah Bekerja </option>
                    </select>
                    
                    <select class="form-control" id="kat" name="kat">
                        <option value="1" {{($anak->kat ==='1') ? 'selected' : ''}}> Ditanggung </option>
                        <option value="2" {{($anak->kat ==='2') ? 'selected' : ''}}> Tidak ditanggung </option>
                    </select>

                    <div class="mb-0">
                        <input type="date" class="form-control"name="tgl_kp4" id="tgl_kp4"  value="{{ $anak->tgl_kp4 }}">
                    </div>
                
                    <div class="mt-3">
                        <button class="btn btn-sm btn-success" type="submit"><span> <i class="fa fa-plus-circle"></i> Simpan </span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


                    {{-- <div class="form-group">
                        <select class="form-control" name="anak" id="anak">
                                <option value="{{ $anak->id }}"
                                    @if(old('anak',$anak->anak) == $anak->id) selected @endif >
                                    {{ $anak->anak }}
                                </option>
                        </select>
                    </div> --}}

                    {{-- <div class="form-group">
                        <select class="form-control" name="perkawinan" id="perkawinan">
                                <option value="{{ $anak->id }}"
                                    @if(old('perkawinan',$anak->perkawinan) == $anak->id) selected @endif >
                                    {{ $anak->perkawinan }}
                                </option>
                        </select>
                    </div> --}}

                    {{-- <div>
                        <select name="user_id" id="user_id" class="form-control">
                            @foreach($user as $item)
                            <option value="{{ $item->id }}" @if($anak->user_id=== $item->id) selected='selected' @endif> {{ ($item->name) }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    {{-- <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($category as $item)
                                <option value="{{ $item->id }}"
                                    @if(old('category_id',$post->category_id) == $item->id) selected @endif >
                                    {{ $item->name }}
                                </option>
                            @endforeach 
                        </select>
                    </div> --}}