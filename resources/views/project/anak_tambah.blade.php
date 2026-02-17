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

                <form action="{{ route('anak.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $eror)
                                <li>{{ $eror }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <div class="mb-2">
                        @if(isset($selected_user_id))
                        <input type="hidden" name="user_id" id="user_id" value="{{ $selected_user_id }}">
                        <label class="form-label">Nama Pegawai</label>
                        <input type="text" class="form-control" value="{{ $anak->find($selected_user_id)->name ?? '' }}" readonly>
                        @else
                        <label class="form-label">Nama Pegawai <span class="text-danger">*</span></label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option value="">-- Pilih Pegawai --</option>
                            @foreach ($anak as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Nama Pasangan (Opsional)</label>
                        <select name="pasangan_id" id="pasangan_id" class="form-control">
                            <option value="">-- Tidak Ada --</option>
                            @foreach ($pasangan as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Nama Anak <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nama anak" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Kategori Anak</label>
                        <select name="anak" id="anak" class="form-control">
                            <option value="ak">AK (Anak Kandung)</option>
                            <option value="at">AT (Anak Tiri)</option>
                            <option value="aa">AA (Anak Angkat)</option>
                            <option value="-">-</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Status Perkawinan</label>
                        <select name="perkawinan" id="perkawinan" class="form-control">
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin">Kawin</option>
                            <option value="-">-</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Status Sekolah</label>
                        <input type="text" class="form-control" name="status_sekolah" id="status_sekolah" placeholder="Nama sekolah">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Status Beasiswa</label>
                        <select name="status_beasiswa" id="status_beasiswa" class="form-control">
                            <option value="-">Tidak Ada</option>
                            <option value="Beasiswa">Beasiswa</option>
                            <option value="Mendapat Beasiswa">Mendapat Beasiswa</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Tanggal Meninggal/Cerai</label>
                        <input type="date" class="form-control" name="tgl_meninggal_cerai" id="tgl_meninggal_cerai">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Pekerjaan</label>
                        <select name="pekerjaan" id="pekerjaan" class="form-control">
                            <option value="Belum bekerja">Belum bekerja</option>
                            <option value="Sudah bekerja">Sudah bekerja</option>
                            <option value="-">-</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">KAT</label>
                        <select name="kat" id="kat" class="form-control">
                            <option value="1">1 (Masuk Daftar Gaji)</option>
                            <option value="2">2 (Tidak Masuk Daftar Gaji)</option>
                            <option value="-">-</option>
                        </select>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        <a href="{{ url('pegawai.info/'.$selected_user_id) }}" class="btn btn-sm btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


