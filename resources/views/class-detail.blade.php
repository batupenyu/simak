@extends('layout.master')

@section('content')
<div class="container mt-5">
    <h1>Detail - Class @section('title','class')</h1>
    <table class="table table-sm table-bordered">
        <tr>
            <th>CLASS</th>
            <th>GURU</th>
            <th>SISWA</th>
        </tr>
        <tr>
            <td>{{ $class->name }}</td>
            <td>{{ $class->gurus->name }}</td>
            <td>
                @foreach ($class->students as $item)
                   - {{ $item->name }} <br>
                @endforeach
            </td>
        </tr>
    </table>
</div>
@endsection