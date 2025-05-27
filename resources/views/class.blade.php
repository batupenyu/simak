@extends('layout.master')

@section('content')
    
<div class="container">
  <h1>Halaman Class @section('title','class')</h1>
  <h4>Class List</h4>
  <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>Nama Kelas</th>
            <th>Action</th>
        </tr>
        @foreach ($classlist as $item)
        <tr>
          <td>{{ $loop->iteration	 }}</td>
          <td>{{ $item->name }}</td>
          <td>
            <a href="class-detail/{{ $item->id}}">Detail</a>
          </td>
        </tr>
        @endforeach
  </table>

</div>
@endsection