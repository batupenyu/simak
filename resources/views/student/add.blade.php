@extends('layout.master')

@section('content')
<div class="container mt-t col-8 m-auto">
    <h4 class="mt-5 mb-3">Add Student @section('title','student-add')</h4 class="mt-5">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $eror)
                    <li>{{ $eror }}</li>
                @endforeach
            </ul>
        @endif
    <form action="student.index" method="POST">
        @csrf
        <div class="mb-0">
            <label for="name">Nama</label>
            <input type="text"class="form-control"name="name" id="name">
        </div>
        <div class="mb-0">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control">
                <option value="">Pilih</option>
                <option value="L">L</option>
                <option value="P">P</option>
            </select>
        </div>
        <div class="mb-0">
            <label for="nis">NIS</label>
            <input type="text"class="form-control" name="nis" id="nis">
        </div>
        <div class="mb-0">
            <label for="class">Class</label>
            <select name="class_id" id="class" class="form-control">
                <option value="">Pilih</option>
                @foreach ($class as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <button class="btn btn-sm btn-success" type="submit">Save</button>
        </div>
    </form>
</div>
  
@endsection