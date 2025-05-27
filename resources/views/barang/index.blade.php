
@extends('layout.sidebar')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">

<body>
    <div class="container-fluid mt-3 w-50%">
            <p class='text-center mb-5 '><b>DAFTAR PENGGUNAAN/PEMAKAIAN <br> BARANG MILIK DAERAH</b></p>
            <p class="float-end">Download<a href="{{ url('lampiran/')}}"> <i class="bi-arrow-down-circle-fill"></i></a></p>
            <table class="table table-sm table-bordered border-black topics">
                <tr class="text-center" style="vertical-align: middle; text-transform:uppercase; background-color:rgb(208, 204, 204)">
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Nama/Jenis Barang</th>
                    <th rowspan="2">Type/Merk</th>
                    <th rowspan="2">Tahun peroleh</th>
                    <th colspan="2">Pemegang Inventaris</th>
                    <th rowspan="2">Spesifikasi</th>
                    <th rowspan="2">Ket</th>
                </tr>
                <tr class="text-center" style="vertical-align: middle; text-transform:uppercase; background-color:rgb(208, 204, 204)">
                    <th>Nama</th>
                    <th>Jabatan</th>
                </tr>
                @foreach ($data as $item)
                <tr>
                    <td style="text-align:center">{{ ($data ->currentpage()-1) * $data ->perpage() + $loop->index + 1 }}.</td>
                    {{-- <td>{{ Carbon\Carbon::parse($item->tgl)->translatedFormat('d-m-Y') }}</td> --}}
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->type }}</td>
                    <td class="text-center">{{ $item->tahun }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->user->jabatan }} - {{ $item->user->mapel[0] }}</td>
                    <td>{{ $item->spek}}</td>
                    <td class="text-center">
                        <a href="{{ url('bastb/'.$item->id) }}"><i class="bi-printer-fill"></i></a>
                    </td>
                </tr>
                @endforeach
                <?php 
                for($i=$count+1;$i<=10;$i++)
                {
                ?>
                <tr>
                    <td style="text-align: center"><?php echo $i; ?>.</td>
                    {{-- <td><?php echo "-".$i; ?></td> --}}
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                }
                ?>
            </table>
            {{ $data->links() }}
    </div>

    
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $('.collapseExample').collapse()
</script>
@endsection
