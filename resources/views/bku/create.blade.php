@extends('layout.sidebar')
@section('content')
<style>
    .div-wrapper {
    height: 500px;
    margin-top: 40px;
    border: 2px dashed #ddd;
    border-radius: 8px;
    }

    .div-to-align {
    width: 100%;
    padding: 40px 20px;

    /* .... */
    }
</style>

<div class="section-1-container section-container center">
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">
                <div class="div-to-align">
                    <form action="{{ url('bku.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="tgl_transaksi" class="col-sm-2 col-form-label" >Tanggal</label>
                            <div class="col-sm-10">
                            <input type="date" class="form-control" id=" " name="tgl_transaksi">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kode" class="col-sm-2 col-form-label" >Kode</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id=" " name="kode">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="no_bukti" class="col-sm-2 col-form-label" >No. bukti</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id=" " name="no_bukti">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="uraian" class="col-sm-2 col-form-label" >Uraian</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id=" " name="uraian">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type" class="col-sm-2 col-form-label" >Type</label>
                            <div class="col-sm-10">
                            <select name="type" id="type" class="form-control">type
                                <option value="saldobank"  >Saldobank</option>
                                <option value="penerimaan"  >Penerimaan</option>
                                <option value="pengeluaran"  >Pengeluaran</option>
                            </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nominal" class="col-sm-2 col-form-label" >Nominal</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id=" " name="nominal">
                            </div>
                        </div>
                        {{-- <div class="row mb-3">
                            <label for="saldobank" class="col-sm-2 col-form-label" >Saldobank</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id=" " name="saldobank">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="penerimaan" class="col-sm-2 col-form-label" >Penerimaan</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id=" " name="penerimaan">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pengeluaran" class="col-sm-2 col-form-label" >Pengeluaran</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id=" " name="pengeluaran">
                            </div>
                        </div> --}}
                        
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection