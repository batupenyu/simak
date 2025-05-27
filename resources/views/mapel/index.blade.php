@extends('layout.sidebar')
@section('content')
<body>
    <div class="container-fluid">
        <div class="w-75 center rounded mx-auto">
            <a href="{{ route('mapel.create') }}" class="btn btn-sm btn-flat btn-success mt-5"><i class="fa fa-plus"></i> Tambah Data</a>
            <p style="text-align: center" >
                <strong>
                    {{-- Mata Pelajaran --}}
                </strong>
            </p>

            <table class="table topics">
                @foreach ($mapel as $item)
                <tr >
                    <td style="text-align:center">{{ ($mapel ->currentpage()-1) * $mapel ->perpage() + $loop->index + 1 }}.</td>
                    {{-- <td  style="text-align: center" >{{  $loop->iteration }}</td> --}}
                    <td  >
                        <a href="{{ route('mapel.edit',$item->id) }}" style="text-decoration: none"> <i class="fa fa-edit"></i></a> 
                        {{ $item->name}}
                    {{-- <form onsubmit="return confirm('yakin hapus mapel?..')" class="d-inline" action="{{ route('mapel.destroy',$item->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn"><i class="fa fa-trash-o" style="color: red"></i></button>
                    </form> --}}
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $mapel->links() }}
        </div>
    </div>
</body>
@endsection