@extends('layout.master')

@section('content')
    
<div class="container">
  <h1>Halaman Guru @section('title','guru')</h1>
  <h4>Guru List</h4>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama Guru</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($gurulist as $item)
        <tr class="">
          <td scope="row">{{ $loop->iteration }}</td>
          <td scope="row">{{ $item->name }}</td>
          <td>
            <a href="/guru-detail/{{ $item->id }}">Detail</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
</div>
@endsection