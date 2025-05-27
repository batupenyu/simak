@extends('layout.sidebar')
@section('content')

<body>
    
    <div class="container-fluid">
        <div class="W-100 center rounded mx-auto">
            <a href="{{ url('/tim.create') }}" class="btn btn-sm btn-flat btn-success mt-5"><i class="fa fa-plus"></i> Tambah Data</a>
            <a href="{{ url('timpdf') }}"style="text-decoration: none" class="btn btn-sm btn-flat btn-primary mt-5"><i class="fa fa-regular fa-download"></i></a>
            <p style="text-align: center" >
                <strong>
                    TIM KERJA <br>
                    SMK NEGERI 1 SIMPANG RIMBA
                </strong>
            </p>

            <table class="table table-sm table-bordered border-primary table-striped">
                <tr style="text-align: center; vertical-align:middle">
                    <th style="width: 50px">No.</th>
                    <th style="width: 350px">Nama tim</th>
                    <th style="width: 350px">Sasaran</th>
                    <th style="width: 350px">Indikator <br>Output</th>
                    <th style="width: 150px">Ketua</th>
                    <th style="width: 200px">Anggota</th>
                    <th>aksi</th>
                </tr>
                @foreach ($tim as $item)

                <tr>
                    <td style="text-align:center">{{ ($tim ->currentpage()-1) * $tim ->perpage() + $loop->index + 1 }}.</td>
                    <td scope='row'>{{ $item->name}}</td>
                    <td scope='row'>{{ $item->rk->name}}</td>
                    <td scope='row'>{{ $item->indikator}}</td>
                    <td scope='row'>{{ $item->penilai->nama}}</td>
                    <td scope='row'>
                        @foreach ($item['anggota'] as $anggota)
                            {{ $loop->iteration }}. {{ $anggota }} <br>
                        @endforeach
                    </td>
                    <td style="text-align: center ">
                        <form onsubmit="return confirm('yakin hapus data?..')" class="d-inline" action="{{ url('tim.destroy',$item->id) }}" method="POST">
                            <a href="{{ url('tim.edit',$item->id) }}"><i class="fa fa-edit"></i></a>
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn"><i class="fa fa-trash-o" style="color: red"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
{{ $tim->links() }}
@endsection