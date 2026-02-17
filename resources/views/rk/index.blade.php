@extends('layout.sidebar')
@section('content')

<body>
    
    <div class="container-fluid">
        <div class="w-75 center rounded mx-auto">
            <a href="{{ route('rk.create') }}" class="btn btn-sm btn-flat btn-success mt-5"><i class="fa fa-plus"></i> Tambah Data</a>
            <p style="text-align: center" >
                <strong>
                    RENCANA KERJA ATASAN
                </strong>
            </p>

            <table class="table topics">
                @foreach ($rk as $item)
                <tr>
                    {{-- <td style="text-align:center">{{ ($mapel ->currentpage()-1) * $mapel ->perpage() + $loop->index + 1 }}.</td> --}}
                    <td  style="text-align: center" >{{ $loop->iteration }}.</td>
                    <td>
                        <a href="{{ route('rk.edit',$item->id) }}"><i class="fa fa-edit"></i></a>
                        {{ $item->name}}</td>
                    <td style="text-align: center ">
                        <form onsubmit="return confirm('Yakin hapus data?')" class="d-inline" action="{{ route('rk.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-flat"><i class="fa fa-trash" style="color: red"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
@endsection