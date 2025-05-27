@extends('layout.master')

@section('content')
    <div class="container mt-5">
        <h1>Detail - guru @section('title','guru')</h1>
        <table class="table table-sm table-bordered">
            <tr>
                <th>NAMA</th>
                <th>CLASS</th>
                <th>SISWA</th>
            </tr>
            <tr>
                <td>{{ $guru->name }}</td>
                <td>
                    @if ($guru->class)
                        {{ $guru->class->name }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if ($guru->class)
                        @foreach ($guru->class->students as $item)
                        - {{ $item->name }} <br>
                        @endforeach
                    @else
                            -
                    @endif
                </td>
            </tr>
        </table>
    </div>
@endsection