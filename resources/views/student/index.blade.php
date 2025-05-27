@extends('layout.master')

@section('content')
    
<div class="container">
  <h1>Halaman Student @section('title','student')</h1>
  <h4>Student List</h4>
  @if (Session::has('status'))
      <div class="alert alert-dark" role="alert">
        {{ Session::get('message') }}
      </div>
  @else
  <div class="my-5">
    <a href="student.add"><button class="btn btn-sm btn-primary">Add</button></a>
  </div>
      
  @endif
  <div class="table-responsive">
    <table class="table table-sm table-striped">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama</th>
          <th scope="col">JK</th>
          <th scope="col">NIS</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($studentlist as $item)
        <tr class="">
          <td scope="row">{{ $loop->iteration }}</td>
          <td scope="row">{{ $item->name }}</td>
          <td scope="row">{{ $item->gender }}</td>
          <td scope="row">{{ $item->nis }}</td>
          <td>
            <a href="/student.detail/{{ $item->id }}">View</a>-
            <a href="/student.edit/{{ $item->id }}">Edit</a>-
            <a href="/student.hapus/{{ $item->id }}">Del</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
</div>
@endsection