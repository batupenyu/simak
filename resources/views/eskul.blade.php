@extends('layout.master')

@section('content')
    
<div class="container">
  <h1>Halaman Eskul @section('title','eskul')</h1>
  <h4>Student List</h4>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama Eskul</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($eskullist as $item)
        <tr class="">
          <td scope="row">{{ $loop->iteration }}</td>
          <td scope="row">{{ $item->name }}</td>
          <td>
            <a href="/eskul-detail/{{ $item->id }}">Detail</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
</div>
@endsection