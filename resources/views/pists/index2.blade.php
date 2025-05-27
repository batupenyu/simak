@extends('layout.master')
@section('content')

<body>
    
    <div class="container">
        <div class="center rounded mx-auto">
            
            <h4><a href="{{ url('pists.index') }}" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-home"></i></a></h4>
            <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print"></i></button>

            <a href="{{ url('pists.create') }}" class="btn btn-sm btn-flat btn-success mt-5"><i class="fa fa-plus"></i> Tambah Data</a>

            <table class="table table-sm table-bordered border-primary table-striped; mt-3">
                <tr style="text-align: center; " >
                    <th>No.</th>
                    <th>Dasar Surat</th>
                    <th>Tempat <br> pelaksanaan</th>
                    <th>Tanggal & lama<br> pelaksanaan</th>
                    <th>Acara</th>
                    <th>Pegawai <br> Peserta</th>
                    <th>aksi</th>
                </tr>
                @foreach($data as $d)
                <tr>
                    <td style="text-align: center">{{ $loop->iteration }}.</td>
                    <td style="font-size:75%; width:20%">
                        @if ($d->asal_surat == '-')
                        @else
                            <a style="text-decoration:none"  data-toggle="collapse" href="#collapseExample{{ $d->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                            {{ $d->no_asal_surat }}
                            </a>
                            <div class="collapse" id="collapseExample{{ $d->id }}">
                                <div class="card card-body">
                                    {{ $d->asal_surat }} <br>
                                    <strong>Hal</strong> : {{ $d->description }} <br>
                                    <strong>Tanggal</strong> : {{ Carbon\Carbon::Parse($d->tgl_surat_dasar)->translatedFormat('d F Y') }}. 
                                </div>
                            </div>
                        @endif
                    </td>
                    <td style="font-size: 75%">
                                    {{ $d->tempat }}
                    </td>
                    <td style="width: 150px; font-size:75%; text-align:center; vertical-align:middle">
                        @include('pists.tanggal')
                    </td>
                    <td style="font-size: 75% ; vertical-align:middl  ">
                                    {{ $d->acara }}
                    </td>
                    <td style="width: 15%; vertical-align:middle">
                        <table>
                            @foreach ($d['cat'] as $x) 
                            <tr>
                                <td style="padding-right: 10px ;font-size:75%; ">{{ $loop->iteration }}.</td>
                                    @php
                                        $fullname = $x;
                                        $name = explode('-',$fullname);
                                        $a = $name [0];
                                        $b = $name [2];
                                        $c = $name [1];
                                    @endphp
                                <td style="width: 310px ;font-size:75%">{{ $a }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </td>
                    <td style="text-align: center; width:150px ">
                        @if ($a == 'Hariyanto, S.Pd')
                            <a href="/pists.form2/{{ $d->id }}"style="text-decoration: none"><i class="fa fa-eye"></i></a>
                            <form onsubmit="return confirm('yakin hapus data?..')" class="d-inline" action="{{ url('pists.destroy',$d->id) }}" method="POST">
                                <a href="{{ url('pists.edit',$d->id) }}"><i class="fa fa-pencil-alt"></i></a>
                                @csrf
                                @method('delete')

                                    <button class="btn btn-sm" type="submit" class="btn"><i class="fa fa-trash " style="color: #ee1939"></i></button>
                            </form>
                            <br>
                            <b style="color: red">{{ $d->selected }} </b> orang
                        @else
                            <a href="/pists.form/{{ $d->id }}"style="text-decoration: none"><i class="fa fa-eye"></i></a>
                            <form onsubmit="return confirm('yakin hapus data?..')" class="d-inline" action="{{ url('pists.destroy',$d->id) }}" method="POST">
                                <a href="{{ url('pists.edit',$d->id) }}"><i class="fa fa-pencil-alt"></i></a>
                                @csrf
                                @method('delete')

                                    <button class="btn btn-sm" type="submit" class="btn"><i class="fa fa-trash " style="color: #ee1939"></i></button>
                            </form>
                            <br>
                            <b style="color: red">{{ $d->selected }} </b> orang
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $('.collapseExample').collapse()
</script>
@endsection
