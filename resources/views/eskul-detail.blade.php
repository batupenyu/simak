@extends('layout.master')

@section('content')
    <div class="container mt-5">
        <h1>Detail - Eskul @section('title','eskul')</h1>
        <table class="table table-sm table-bordered">
            <tr>
                <th>ESKUL</th>
                <th>NAMA SISWA</th>
            </tr>
            <tr>
                <td>{{ $eskul->name }}</td>
                <td>
                    @foreach ($eskul->students as $item)
                        - {{ $item->name }} <br>
                    @endforeach
                </td>
            </tr>
        </table>
    </div>
@endsection