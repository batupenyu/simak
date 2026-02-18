@extends('layout.master')

@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/anak.css') !!}">

<style>
    .form-frame {
        background: #fff;
        border: 2px solid #dee2e6;
        border-radius: 8px;
        padding: 30px;
        margin: 20px auto;
        max-width: 1200px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
</style>

<div class="container-fluid mt-4 mb-4">
    <div class="form-frame">


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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="user_id" class="form-label">Pegawai / Orang Tua</label>
                                <select name="user_id" class="form-control" id="user_id">
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}"{{ $anak->user_id==$item->id ? 'selected':'' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pasangan_id" class="form-label">Pasangan</label>
                                <select name="pasangan_id" class="form-control" id="pasangan_id">
                                    @foreach ($pasangan as $item)
                                        <option value="{{ $item->id }}"{{ $anak->pasangan_id==$item->id ? 'selected':'' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Anak</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $anak->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="{{ $anak->tgl_lahir }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="anak" class="form-label">Status Anak</label>
                                <select class="form-control" id="anak" name="anak">
                                    <option value="-" {{($anak->anak ==='-') ? 'selected' : ''}}> - </option>
                                    <option value="aa" {{($anak->anak ==='aa') ? 'selected' : ''}}> aa </option>
                                    <option value="ak" {{($anak->anak ==='ak') ? 'selected' : ''}}> ak </option>
                                    <option value="at" {{($anak->anak ==='at') ? 'selected' : ''}}> at </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="perkawinan" class="form-label">Status Perkawinan</label>
                                <select class="form-control" id="perkawinan" name="perkawinan">
                                    <option value="-" {{($anak->perkawinan ==='-') ? 'selected' : ''}}> - </option>
                                    <option value="Kawin" {{($anak->perkawinan ==='Kawin') ? 'selected' : ''}}> Kawin </option>
                                    <option value="Belum Kawin" {{($anak->perkawinan ==='Belum Kawin') ? 'selected' : ''}}> Belum Kawin </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status_sekolah" class="form-label">Status Sekolah</label>
                                <input type="text" class="form-control" name="status_sekolah" id="status_sekolah" value="{{ $anak->status_sekolah }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status_beasiswa" class="form-label">Status Beasiswa</label>
                                <select class="form-control" id="status_beasiswa" name="status_beasiswa">
                                    <option value="-" {{($anak->status_beasiswa ==='-') ? 'selected' : ''}}> - </option>
                                    <option value="Mendapat Beasiswa" {{($anak->status_beasiswa ==='Mendapat Beasiswa') ? 'selected' : ''}}> Mendapat Beasiswa </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tgl_meninggal_cerai" class="form-label">Tanggal Meninggal/Cerai</label>
                                <input type="date" class="form-control" name="tgl_meninggal_cerai" id="tgl_meninggal_cerai" value="{{ $anak->tgl_meninggal_cerai }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <select class="form-control" id="pekerjaan" name="pekerjaan">
                                    <option value="-" {{($anak->pekerjaan ==='-') ? 'selected' : ''}}> - </option>
                                    <option value="Belum Bekerja" {{($anak->pekerjaan ==='Belum Bekerja') ? 'selected' : ''}}> Belum Bekerja </option>
                                    <option value="Sudah Bekerja" {{($anak->pekerjaan ==='Sudah Bekerja') ? 'selected' : ''}}> Sudah Bekerja </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kat" class="form-label">Kategori Tanggungan</label>
                                <select class="form-control" id="kat" name="kat">
                                    <option value="1" {{($anak->kat ==='1') ? 'selected' : ''}}> Ditanggung </option>
                                    <option value="2" {{($anak->kat ==='2') ? 'selected' : ''}}> Tidak ditanggung </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tgl_kp4" class="form-label">Tanggal KP4</label>
                                <input type="date" class="form-control" name="tgl_kp4" id="tgl_kp4" value="{{ $anak->tgl_kp4 }}">
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-sm btn-success" type="submit"><span> <i class="fa fa-plus-circle"></i> Simpan </span></button>
                    </div>
                </form>
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