@extends('layout.sidebar')

@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Hari Libur</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('customers.index') }}"> Back</a>
        </div>
    </div>
</div>

<form action="{{ route('customers.store') }}" method="POST" name="custForm" onsubmit="return validateForm()">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hari Libur:</strong>
                <input type="text" name="hari_libur" id="hari_libur" class="form-control" placeholder="Hari Libur" onchange="validate()" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tgl. Libur:</strong>
                <input type="date" name="tgl_libur" id="tgl_libur" class="form-control" placeholder="Tgl. Libur" onchange="validate()">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Submit</button>
        </div>
    </div>
</form>

<script>
function validate() {
    var hariLibur = document.getElementById('hari_libur').value;
    var tglLibur = document.getElementById('tgl_libur').value;
    document.getElementById('btn-save').disabled = !(hariLibur && tglLibur);
}

function validateForm() {
    var hariLibur = document.getElementById('hari_libur').value;
    var tglLibur = document.getElementById('tgl_libur').value;
    if (!hariLibur || !tglLibur) {
        alert('Please fill in all required fields.');
        return false;
    }
    return true;
}
</script>
@endsection
