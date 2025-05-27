@extends('layout.master')

@section('content')
<link rel="stylesheet" href="{!! asset('css/app.css') !!}">
<div class=" container-xl container-fluid py-5">
    @foreach ($pegawai as $item)
    {{-- <p class="d-inline-flex gap-0">
        <a href="{{ url('izin.show/'.$item->id) }}" class="btn btn-outline-primary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
    </p> --}}
        @if ($item->pangkat_gol == 'IX')
            
            <p class="d-inline-flex gap-0">
                <a href="{{ url('izin.show/'.$item->id) }}" class="btn btn-success tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
            
        @elseif ($item->nip =='')
            <p class="d-inline-flex gap-0">
                <a href="{{ url('izin.show/'.$item->id) }}" class="btn btn-outline-dark tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @elseif ($item->unit_kerja =='KEJAKSAAN TINGGI KEP. BANGKA BELITUNG')
            <p class="d-inline-flex gap-0">
                <a href="{{ url('izin.show/'.$item->id) }}" class="btn btn-secondary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @else
            
            <p class="d-inline-flex gap-0">
                <a href="{{ url('izin.show/'.$item->id) }}" class="btn btn-outline-primary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @endif
    @endforeach
    {{-- <p><a href="{{ url('izin.create') }}"><i class="fa fa-plus btn btn-sm btn-warning tampil"><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Izin Pegawai</b></i></a></p> --}}
    <p><i class="fa fa-plus-circle btn-sm btn-warning tampil" style="padding-block: 10px" > <a href="{{ url('izin.create') }}" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-decoration:none"> Surat izin</a></i><button onclick="window.print();" class="btn btn-sm btn-primary tampil float-end">CETAK</button></p>
    @foreach ($izin as $item)
    <hr class="tampil">
    <div class="card-header" style="text-align: center">
        <strong>
            KARTU KENDALI <br> IZIN JAM KERJA DAN HARI KERJA  PNS DAN PPPK <br> 
            <span style="text-transform: uppercase">{{ $item->unit_kerja }}</span>
        </strong>
    </div>
    <br>
    <br>
    <table>

        <tr>
            <th style="width: 200px">Nama</th>
            <th>:&nbsp;&nbsp;{{ $item->name }}</th>
        </tr>
        <tr>
            <th>NIP.</th>
            <th>:&nbsp;&nbsp;{{ $item->nip }}</th>
        </tr>
        <tr>
            <th>Jabatan</th>
            <th>:&nbsp;&nbsp;{{ $item->jabatan }}</th>
        </tr>
        <tr>
            <th>Pangkat/Gol.</th>
            <th>:&nbsp;&nbsp;{{ $item->pangkat_gol }}</th>
        </tr>
        <tr>
            <th>Unit Kerja.</th>
            <th>:&nbsp;&nbsp;{{ $item->unit_kerja }}</th>
        </tr>
        @endforeach
        
    </table>
    <table class="table table-sm table-bordered border-primary mt-3">
        <tr style="text-align: center; vertical-align:middle">
            <th rowspan="2">No.</th>
            <th colspan="2">SURAT IZIN/SURAT KEPUTUSAN</th>
            <th colspan="2">LAMANYA</th>
            <th rowspan="2">PARAF PEGAWAI <br>KEPEGAWAIAN</th>
            <th style="width: 100px" rowspan="2">KET</th>
        </tr>
        <tr style="text-align: center; vertical-align:middle">
            <th>NOMOR</th>
            <th>TANGGAL</th>
            <th>DARI TANGGAL</th>
            <th>SAMPAI TANGGAL</th>
        </tr>
        @foreach ($izin as $item)
            @foreach ($item->izin as $n)
                <tr style="text-align: center; vertical-align:middle">
                    <td style="text-align: center"> {{ $loop->iteration }}. </td>
                    <td>
                        @if ($n->no_surat == "")
                        800/ ......./SMKN1/SR/{{ Carbon\Carbon::Parse($n->tgl_surat)->format('Y') }}  
                        @else
                        800/ {{ $n->no_surat }}/SMKN1/SR/{{ Carbon\Carbon::Parse($n->tgl_surat)->format('Y') }}                         
                        @endif
                    </td>
                    <td style="width: 175px">
                        @if ($n->no_surat == "")
                            -
                        @else
                            {{ Carbon\Carbon::Parse($n->tgl_surat)->format('d-m-Y') }} 
                        @endif
                    </td>
                    <td> {{ Carbon\Carbon::Parse($n->tgl_awal)->format('d-m-Y') }} </td>
                    <td> {{ Carbon\Carbon::Parse($n->tgl_akhir)->format('d-m-Y') }} </td>
                    <td>
                        <button class="btn btn-sm tampil" type="submit">
                            <a href="{{ url('izin.edit/'.$n->id) }}"><i class="fa fa-edit"></i> </a> 
                        </button>
                    
                        <form class="d-inline" onsubmit="return confirm('yakin hapus data?!!..')" action="/izin.destroy/{{ $n->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm tampil" type="submit"><i class="fa fa-trash-o fa-lg" style="color:red"></i></button>
                        </form>
                    </td>
                    <td style="vertical-align: text-top" >
                        <div class="btn-group dropend mt-1">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle tampil" data-bs-toggle="dropdown" aria-expanded="false">
                                <strong>Pilih</strong>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark ">
                                <li><a href="javascript:void(0)" id="show-user" style="text-decoration: none"class="dropdown-item"></a></li>
                                <li><a class="dropdown-item" href="/izin.surat/{{ $n->id }}"style="text-decoration: none"> Surat Pemohon</a></li>
                                <li><a class="dropdown-item" href="/izin.form/{{ $n->id }}"style="text-decoration: none"> Izin Kepsek</a></li>
                                <li><a class="dropdown-item" href="/izin.srtizin/{{ $n->id }}"style="text-decoration: none"> Izin Presensi</a></li>
                                <li><a class="dropdown-item" href="/izin.keluar/{{ $n->id }}"style="text-decoration: none"> Izin Keluar</a></li>
                                <li><a class="dropdown-item" href="/izin.suket/{{ $n->id }}"style="text-decoration: none"> Surat Ket</a></li>
                                <li><a class="dropdown-item" href="/izin.img/{{ $n->id }}"style="text-decoration: none"> Photo</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                
                
            @endforeach
        @endforeach

            
            @foreach ($dat as $item)
                @switch($item->izin_count)
                    @case($item->izin_count <= 1)
                        @include('lamp_izin.kdl_9')
                        @break
        
                    @case($item->izin_count <= 2)
                        @include('lamp_izin.kdl_8')
                        @break

                    @case($item->izin_count <= 3)
                        @include('lamp_izin.kdl_7')
                        @break
                        
                    @case($item->izin_count <= 4)
                        @include('lamp_izin.kdl_6')
                        @break
        
                    @default
                        @include('lamp_izin.kdl_10')
                @endswitch
            @endforeach

    </table>
    <br>
    <div class="div col-6 float-end" style="text-align: center">
        <strong>
            Kepala Sekolah <br>
            SMK Negeri 1 Simpang Rimba <br><br><br>
            @foreach ($izin as $item)
                {{ $item->penilai->nama }} <br>
                {{ $item->penilai->nip }}

            @endforeach
        </strong>
    </div>
</div> 
@endsection