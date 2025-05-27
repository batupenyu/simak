@extends('layout.master')

@section('content')
    <div class="container mt-5">
        <h1>View - Student @section('title','student-detail')</h1>
        <table class="table table-sm table-bordered">
            <tr>
                <th>NAMA</th>
                <th>NIS</th>
                <th>GENDER</th>
                <th>CLASS</th>
                <th>GURU</th>
                <th>ESKUL</th>
            </tr>
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->nis }}</td>
                <td>
                        @if ($student->gender =='P')
                            Perempuan
                        @else
                            Laki-Laki
                        @endif
                </td>
                <td>{{ $student->class->name }}</td>
                <td>{{ $student->class->gurus->name }}</td>
                <td>
                    @foreach ($student->eskuls as $item)
                       - {{ $item->name }} <br>
                    @endforeach
                </td>
                {{-- <td>
                    @foreach ($student->class as $item)
                    - {{ $item->name }} <br>
                    @endforeach
                </td> --}}
            </tr>
        </table>
    </div>
@endsection