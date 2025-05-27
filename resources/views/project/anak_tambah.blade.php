@extends('layout.sidebar')

@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/anak.css') !!}">

<div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="card px-1 py-4">
        <div class="card-body">
            <h4 class=" mb-0 text-dark"> + Data @section('title','tambah anak')</h4>
            <div class="d-flex flex-row"> </div>

                {{-- <label class="radio mr-1"> 
                    <input type="radio" name="add" value="anz" checked> <span> <i class="fa fa-user"></i> Anz CMK </span> 
                </label> 
                <label class="radio"> 
                    <input type="radio" name="add" value="add"> <span> <i class="fa fa-plus-circle"></i> Add </span> 
                </label> </div> --}}

                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $eror)
                                    <li>{{ $eror }}</li>
                                @endforeach
                            </ul>
                        @endif

                <form action="{{ url('project.index') }}" method="POST">
                    @csrf
                    @method('POST')
                    {{-- <div class="mb-0">
                        <select name="project_id" id="project_id" class="form-control">
                            <option value="">User</option>
                            @foreach ($project as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="mb-0">
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="">Nama pegawai</option>
                            @foreach ($anak as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-0">
                        <select name="pasangan_id" id="pasangan_id" class="form-control">
                            <option value="">Nama pasangan</option>
                            @foreach ($pasangan as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-0">
                        <input type="text"class="form-control"name="name" id="name" placeholder="Nama anak">
                    </div>
                    <div class="mb-0">
                        <input type="date"class="form-control"name="tgl_lahir" id="tgl_lahir">
                    </div>
                    <div class="mb-0">
                        <select name="anak" id="anak" class="form-control">
                            <option value="aa">aa</option>
                            <option value="ak">ak</option>
                            <option value="at">at</option>
                            <option value="-">-</option>
                        </select>
                    </div>
                    <div class="mb-0">
                        <select name="perkawinan" id="perkawinan" class="form-control">
                            <option value="Kawin">Kawin</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="-">-</option>
                        </select>
                    </div>
                    <div class="mb-0">
                        <input type="text"class="form-control"name="status_sekolah" id="status_sekolah" placeholder="Nama sekolah">
                    </div>
                    <div class="mb-0">
                        <select name="status_beasiswa" id="status_beasiswa" class="form-control">
                            <option value="Beasiswa">Beasiswa</option>
                            <option value="Mendapat Beasiswa">Mendapat beasiswa</option>
                            <option value="-">-</option>
                        </select>
                    </div>

                    <div class="mb-0">
                        <input type="date"class="form-control"name="tgl_meninggal_cerai" id="tgl_meninggal_cerai">
                    </div>
                

                    <div class="mb-0">
                        <select name="pekerjaan" id="pekerjaan" class="form-control">
                            <option value="Belum bekerja">Belum bekerja</option>
                            <option value="Sudah bekerja">Sudah bekerja</option>
                            <option value="-">-</option>
                        </select>
                    </div>
                
                    <div class="mt-3">
                        <button class="btn btn-sm btn-success" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


