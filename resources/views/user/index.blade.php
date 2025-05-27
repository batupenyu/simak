@extends('layout.master')

@section('content')
    <div class="container mt-5">
        <h1>Detail - user @section('title','user')</h1>
        <table class="table table-sm table-bordered">
            @foreach ($user as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    {{ $item->name }} <br>
                </td>
                <td>
                    {{ $item->email }} <br>
                </td>
            </tr>
                @endforeach
        </table>
    </div>
@endsection