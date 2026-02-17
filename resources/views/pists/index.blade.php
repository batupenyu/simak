@extends('layout.sidebar')
@section('content')

<body>
    
    <div class="container-fluid w-75">
        <div class=" center rounded mx-auto">
            
            <h4><a href="{{ url('pists.index') }}" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-home"></i></a></h4>
            <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print"></i></button>

            <a href="{{ url('pists.create') }}" class="btn btn-sm btn-flat btn-success mt-3"><i class="fa fa-plus"></i> Tambah Data</a>
            <h4 class="mt-3 text-center mb-4">DAFTAR PERJALANAN DINAS DALAM/LUAR DAERAH</h4>
            <hr class="noshade">
            {{-- <form  action="/pists.cari" method="GET">
                <input  type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
                <input type="submit" value="CARI">
            </form> --}}
            <table class="table table-sm  mt-3">
                
                @foreach($data as $d)
                <tr>
                    {{-- <td style="text-align: center">{{ $data->count() * ($data->currentPage()-1) + $loop->iteration }}</td> --}}
                    <td style="text-align:center">{{ ($data ->currentpage()-1) * $data ->perpage() + $loop->index + 1 }}.</td>
                    <td style="text-align: end; width:250px">
                        <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="dropdown" aria-expanded="false">
                            <a style="text-decoration:none"  data-bs-toggle="collapse" href="#collapseExample{{ $d->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <i>@include('pists.tanggal')</i> 
                            </a>
                            @if ($d->selected  <= 1)
                                -
                            @else
                            <span class="btn btn-sm btn-danger">{{ $d->selected }}</span>
                            @endif
                        </button>
                    </td>
                    <td style=" vertical-align:middle; width:500px">
                                @foreach ($d['cat'] as $x) 
                                        @php
                                            $fullname = $x;
                                            $name = explode('-',$fullname);
                                            $a = $name [0];
                                            $b = $name [2];
                                            $c = $name [1];
                                        @endphp
                                            - {{ $a }} <br>

                                        @if ($d->asal_surat == '-')
                                        {{-- <i class="fa fa-spinner fa-spin"></i>     --}}
                                        {{-- <i class="fa fa-check-square"></i>    --}}
                                        @else
                                        
                                        @endif
                                @endforeach
                            @if ($d->asal_surat == '-')
                                {{-- <a style="text-decoration:none"  data-toggle="collapse" href="#collapseExample{{ $d->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <i>@include('pists.tanggal')</i>
                                </a> --}}
                                <div class="collapse" id="collapseExample{{ $d->id }}">
                                    <strong>Acara</strong> : {{ $d->acara }} <br>
                                    <strong>Tempat</strong> : {{ $d->tempat }} <br>
                                    <strong>Jumlah peserta</strong> : {{ $d->selected }}  <br>
                                    
                                    
                                </div>
                            @else
                                {{-- <a style="text-decoration:none"  data-toggle="collapse" href="#collapseExample{{ $d->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <i>@include('pists.tanggal')</i>
                                </a> --}}
                                <div class="collapse" id="collapseExample{{ $d->id }}">
                                    <div class="text-primary">
                                        <strong>Dasar : Surat Kepala</strong> {{ $d->asal_surat }} <br>
                                    </div>
                                        <strong>Nomor</strong> :  {{ $d->no_asal_surat }} <br>
                                        <strong>Hal</strong> : {{ $d->description }} <br>
                                        <strong>Tanggal</strong> : {{ Carbon\Carbon::Parse($d->tgl_surat_dasar)->translatedFormat('d F Y') }}. <br>
                                        <strong>Tempat</strong> : {{ $d->tempat }} <br>
                                        <strong>Acara</strong> : {{ $d->acara }} <br>
                                        <strong>Jumlah peserta</strong> : {{ $d->selected }}  <br>

                                </div>
                            @endif
                    {{-- </td> --}}
                    {{-- <td style="padding-left: 30px"> --}}
                        {{-- <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="dropdown" aria-expanded="false">
                            <a style="text-decoration:none"  data-toggle="collapse" href="#collapseExample{{ $d->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <i>@include('pists.tanggal')</i> 
                            </a>
                        </button> --}}
                        @if ($d->asal_surat == '-')
                            <i class="fa fa-feather"></i>
                        @else
                            
                        @endif
                            
                    </td>

                    <td class="text-center" style="width: 350px">
                            <a href="/pists.photo/{{ $d->id }}"style="text-decoration: none"><i class="fa fa-camera-retro" aria-hidden="true"></i></a>
                            <a href="/pists.form/{{ $d->id }}"style="text-decoration: none"><i class="fa fa-envelope-o fa-fw"></i></a>
                            {{-- <a href="/pists.dispen/{{ $d->id }}"style="text-decoration: none"><i class="fa fa-print"></i></a> --}}
                            <a href="/pists.laporan/{{ $d->id }}"style="text-decoration: none"><i class="fa fa-book fa-fw"></i></a>
                            <a href="/stpdf/{{ $d->id }}"style="text-decoration: none"><i class="fa fa-regular fa-download"></i></a>
                            @if ($d->path_bukti_pengajuan !="")
                                <a href="{{ route('pegawai.cuti.status.buktipengajuan', ['pists' => $d->id]) }}" target="_blank">
                                <button type="submit" class="btn btn-sm "><i class="fa fa-eye"></i></a></button>
                                {{-- <span style="margin-left:6px"></span>Bukti</button> --}}
                                @else
                                {{-- <button class="btn btn-sm"><i class="fa fa-check fa-file-word-o"></i></button> --}}
                                <button class="btn btn-sm" type="submit" class="btn"><i class="fa fa-ban fa-fw" style="color: #ee1939"></i></button>
                                @endif
                            <form onsubmit="return confirm('yakin hapus data?..')" class="d-inline" action="{{ url('pists.destroy',$d->id) }}" method="POST">
                                <a href="{{ url('pists.edit',$d->id) }}"><i class="fa fa-edit"></i></a>
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm" type="submit" class="btn"><i class="fa fa-trash-o fa-lg" style="color: #ee1939"></i></button>
                            </form>
                    </td>

                </tr>
                @endforeach
            </table>
            {{ $data->links() }}
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
