{{-- @extends('customers.layout') --}}
{{-- @extends('layout.master') --}}
@extends('layout.sidebar')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">

<div class="row">
    <div class="col-lg-12" style="text-align: center">
        <div >
            {{-- <h2>Laravel 7 CRUD using Bootstrap Modal</h2> --}}
        </div>
        <br/>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
        <a href="javascript:void(0)" class="btn btn-success mb-2" id="new-customer" data-bs-toggle="modal" data-target="#crud-modal">+ Hari Libur</a>
        <a href="{{ url('pegawai.index') }}" class="btn btn-success mb-2"  >Dok Pegawai</a>
        </div>
    </div>
</div>
<br/>
{{-- @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p id="msg">{{ $message }}</p>
    </div>
@endif --}}
<table class="table table-sm table-bordered ">
    <tr class="text-center">
        <th >ID</th>
        <th>Keterangan</th>
        <th>Tanggal</th>
        <th  width="280px">Action</th>
        {{-- <th>Address</th> --}}
    </tr>

    @foreach ($customers as $customer)
    <tr id="customer_id_{{ $customer->id }}">
        {{-- <td>{{ $customer->id }}</td> --}}
        <td class="text-center">{{ $loop->iteration }}</td>
        <td>{{ $customer->hari_libur }}</td>
        <td class="text-center">{{ (Carbon\Carbon::Parse($customer->tgl_libur )->translatedFormat('d-m-Y'))}}</td>
        {{-- <td>{{ $customer->address }}</td> --}}
        <td class="text-center">
            <div class="dropdown dropdown-action">
                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
                        <a href="javascript:void(0)" class="btn btn-sm btn-success" id="edit-customer" data-bs-toggle="modal" data-id="{{ $customer->id }}">Edit </a>
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger">delete</button>
                        {{-- <a class="btn btn-sm btn-info" id="show-customer" data-toggle="modal" data-id="{{ $customer->id }}" >Show</a> --}}
                        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
                        {{-- <a id="delete-customer" data-id="{{ $customer->id }}" class="btn btn-sm btn-danger delete-user">Delete</a></td> --}}
                    </form>
                </div>
            </div>
        </td>
    </tr>

    </tr>
    @endforeach
</table>

{!! $customers->links() !!}
<!-- Add and Edit customer modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="customerCrudModal"></h4>
            </div>
            <div class="modal-body">
                <form name="custForm" action="{{ route('customers.store') }}" method="POST">
                    <input type="hidden" name="cust_id" id="cust_id" >
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="hari_libur" id="hari_libur" class="form-control" placeholder="hari_libur" onchange="validate()" >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Tgl. Libur:</strong>
                                <input type="date" name="tgl_libur" id="tgl_libur" class="form-control" placeholder="tgl_libur" onchange="validate()">
                            </div>
                        </div>
                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Address:</strong>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Address" onchange="validate()" onkeypress="validate()">
                            </div>
                        </div> --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" >Submit</button>
                            <a href="{{ route('customers.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Show customer modal -->
<div class="modal fade" id="crud-modal-show" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="customerCrudModal-show"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2"></div>
                    <div class="col-xs-10 col-sm-10 col-md-10 ">
                        @if(isset($customer->name))
                        <table>
                            <tr><td><strong>Name:</strong></td><td>{{$customer->hari_libur}}</td></tr>
                            <tr><td><strong>Tgl. libur:</strong></td><td>{{$customer->tgl_libur}}</td></tr>
                            {{-- <tr><td><strong>Address:</strong></td><td>{{$customer->address}}</td></tr> --}}
                            <tr><td colspan="2" style="text-align: right "><a href="{{ route('customers.index') }}" class="btn btn-danger">OK</a> </td></tr>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
error=false

function validate()
{
    if(document.custForm.hari_libur.value !='' && document.custForm.tgl_libur.value !='')
        document.custForm.btnsave.disabled=false
    else
        document.custForm.btnsave.disabled=true
}
</script>
