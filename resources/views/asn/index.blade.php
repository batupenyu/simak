@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('ASN') }}
                    <a href="{{ route('asn.create') }}" class="btn btn-primary btn-sm float-end">Add New</a>
                </div>

                <div class="card-body">
                    <p>ASN management page.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
