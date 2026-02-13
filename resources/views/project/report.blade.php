@extends('layout.master')
@section('content')

<ul class="nav nav-tabs mb-3" id="skpTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link" href="{{ url('project.main/'.$user->id) }}">Rencana SKP</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" href="{{ url('project.evaluasi/'.$user->id) }}">Evaluasi</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link active" href="{{ url('project.report/'.$user->id) }}">Laporan</a>
    </li>
</ul>

<button onclick="window.print();" class="btn btn-success tampil btn-flat mb-3 mt-3 float-end" media="print">Cetak</button>
<img src={{ asset('image/garuda.png') }} style="display:block; margin:auto;">
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">

<div class="container-xl container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h4 style="text-align: center">DOKUMEN EVALUASI KINERJA PEGAWAI
                    <br>
                    PERIODE : TAHUN
                    {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat(' Y ') }} 
                </h4>
                <hr>
            </div>
        </div>
    </div>


    <div class="container-fluid mt-5">

    <div class="row justify-content-between fw-bold upper">
        <div class="col-5">
            @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
            Nama Instansi : <br> KEJAKSAAN TINGGI KEP. BANGKA BELITUNG
            @else
            Nama Instansi : <br> Dinas Pendidikan Prov. Kep. Bangka Belitung
            @endif

        </div>
        <div class="col-4">
            Periode Penilaian : <br> 
            {{ Carbon\Carbon::parse($user->tgl_awal)->translatedFormat('d F Y ') }} 
            s.d 
            {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }} 
        </div>
    </div>

    <table class="table mb-0 table-sm  table-responsive-sm table-bordered border-primary ">
        <tr style="background-color:aliceblue;" class="text-center">
        </tr>


        <tr>
            <th class="text-center" width="50px" rowspan="6">1</th>
            <th colspan="2" style="background-color:aliceblue;" width="500px">PEGAWAI YANG DINILAI</th>
        </tr>
        <tr>
            <th width="500px">NAMA</th>
            @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
                <td style="width: 380px; text-transform:uppercase">
                    <b>{{ $user->name }}</b>
                </td>
                @else
                <td style="width: 380px">
                    <b>{{ $user->name }}</b>
                </td>
            @endif
        </tr>
        <tr>
            <th width="500px">NIP</th>
            <td scope="row">{{ $user->nip }}</td>
        </tr>
        <tr>
            <th width="500px">PANGKAT/GOL. RUANG</th>
            <td scope="row">{{ $user->pangkat_gol }}</td>
        </tr>
        <tr>
            <th width="500px">JABATAN</th>
            <td scope="row">{{ $user->jabatan }}</td>
        </tr>
        <tr>
            <th width="500px">UNIT KERJA</th>
            <td scope="row">{{ $user->unit_kerja }}</td>
        </tr>
        <tr>
            <th class="text-center" width="50px" rowspan="6">2</th>
            <th colspan="2" style="background-color:aliceblue;" width="500px">PEJABAT PENILAI KINERJA</th>
        </tr>
        <tr>
            <th width="500px">NAMA</th>
            <td scope="row"><b>{{ optional($user->penilai)->nama ?? '' }}</b></td>
        </tr>
        <tr>
            <th width="500px">NIP</th>
            <td scope="row">{{ optional($user->penilai)->nip ?? '' }}</td>
        </tr>
        <tr>
            <th width="500px">PANGKAT/GOL. RUANG</th>
            <td scope="row">{{ optional($user->penilai)->pangkat_gol ?? '' }}</td>
        </tr>
        <tr>
            <th width="500px">JABATAN</th>
            <td scope="row">{{ optional($user->penilai)->jabatan ?? '' }}</td>
        </tr>
        <tr>
            <th width="500px">UNIT KERJA</th>
            <td scope="row">{{ optional($user->penilai)->unit_kerja ?? '' }}</td>
        </tr>
        <tr>
            <th class="text-center" width="50px" rowspan="6">3</th>
            <th colspan="2" style="background-color:aliceblue;" width="500px">ATASAN PEJABAT PENILAI KINERJA</th>
        </tr>
        <tr>
            <th width="500px">NAMA</th>
            <td scope="row"><b>{{ optional($user->atasan)->nama ?? '' }}</b>
                @if($user->atasan)
                <a href="{{ url('atasan.edit/'.$user->atasan->id) }}"><i class="fa fa-edit tampil"></i></a>
                @endif
            </td>
        </tr>
        <tr>
            <th width="500px">NIP</th>
            <td scope="row">{{ optional($user->atasan)->nip ?? '' }}</td>
        </tr>
        <tr>
            <th width="500px">PANGKAT/GOL. RUANG</th>
            <td scope="row">{{ optional($user->atasan)->pangkat_gol ?? '' }}</td>
        </tr>
        <tr>
            <th width="500px">JABATAN</th>
            <td scope="row">{{ optional($user->atasan)->jabatan ?? '' }}</td>
        </tr>
        <tr>
            <th width="500px">UNIT KERJA</th>
            <td scope="row">{{ optional($user->atasan)->unit_kerja ?? '' }}</td>
        </tr>
    </table>

    <!-- Rencana Kinerja Table -->
    <table class="table mb-0 table-sm table-responsive-sm table-bordered border-primary mt-3">
        <tr style="background-color:aliceblue;">
            <th style="text-align: center; width:30px"><b>NO</b></th>
            <th style="text-align: center;" colspan="2"><b>RENCANA HASIL KERJA ATASAN YANG DIINTERVENSI</b></th>
            <th style="text-align: center;" colspan="2"><b>RENCANA HASIL KERJA</b></th>
            <th colspan="3" style="text-align: center;"><b>INDIKATOR KINERJA</b></th>
        </tr>
        <tr>
            <th style="text-align: center;">&nbsp;</th>
            <th style="text-align: center;" colspan="2">&nbsp;</th>
            <th style="text-align: center;" colspan="2">&nbsp;</th>
            <th style="text-align: center;">ASPEK</th>
            <th style="text-align: center;">INDIKATOR</th>
            <th style="text-align: center;">TARGET</th>
        </tr>
        @foreach ($user->tugas as $data)
        <tr>
            <td style="text-align: center;">{{ $loop->iteration }}</td>
            <td colspan="2">{{ $data->name }}</td>
            <td colspan="2">{{ $data->name }}</td>
            <td colspan="3">
                @foreach ($data->tupoksi as $item)
                <table class="table table-sm table-borderless">
                    <tr>
                        <td style="width: 100px">{{ $item->aspek }}</td>
                        <td style="width: 30px">:</td>
                        <td style="width: 250px; text-align:justify">{{ $item->indikator }}</td>
                        <td style="text-align: center">{{ $item->target }}</td>
                    </tr>
                </table>
                @endforeach
            </td>
        </tr>
        @endforeach

        @foreach ($user->tutam as $data)
        <tr style="background-color:aliceblue;">
            <td style="text-align: center;">{{ $loop->iteration }}</td>
            <td colspan="2">{{ $data->rk->name }}</td>
            <td colspan="2">{{ $data->name }}</td>
            <td colspan="3">
                @foreach ($data->tuti as $item)
                <table class="table table-sm table-borderless">
                    <tr>
                        <td style="width: 100px">{{ $item->aspek }}</td>
                        <td style="width: 30px">:</td>
                        <td style="width: 250px; text-align:justify">{{ $item->indikator }}</td>
                        <td style="text-align: center">{{ $item->target }}</td>
                    </tr>
                </table>
                @endforeach
            </td>
        </tr>
        @endforeach
    </table>

    <table class="table mb-0 table-sm table-responsive-sm table-bordered border-primary mt-3">
        <tr style="background-color:aliceblue;">
            <th class="text-center" width="50px" rowspan="2">4</th>
            <th colspan="2" style="background-color:aliceblue;">EVALUASI KINERJA</th>
        </tr>
        <tr>
            <th style="background-color:aliceblue;" width="500px">CAPAIAN KINERJA ORGANISASI</th>
            <td scope="row"><b>BAIK</b></td>
        </tr>
        <tr>
            <th style="background-color:aliceblue;">PREDIKAT KINERJA PEGAWAI</th>
            <td scope="row"><b>BAIK</b></td>
        </tr>

        <tr>
            <th class="text-center" width="50px" rowspan="2">5</th>
            <th colspan="2" style="background-color:aliceblue;" width="500px">CATATAN/REKOMENDASI</th>
        </tr>
        <tr>
            <td colspan="2" height="100px"></td>
        </tr>
    </table>
    
    <div class="row justify-content-around text-center fw-bold mt-5 ">
        @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
        <div class="col-4" >
            Pangkalpinang, {{ Carbon\Carbon::parse($user->tgl_pegawai)->translatedFormat('d F Y ') }} 
            <a href="/project.edit_user/{{ $user->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a> 
            <br>
                <div   style="text-transform: uppercase">
                    PEGAWAI YANG DINILAI <br><br><br><br>
                    <b><u>{{ $user->name }}</u></b>
                    <br>
                    NIP.{{ $user ->nip }}
                </div>
            </div>
        @else
            <div class="col-4">
                <br>
                PEGAWAI YANG DINILAI <br><br><br><br>
                <b>{{ $user->name }}</b>
                <br>
                NIP.{{ $user ->nip }}
            </div>
        @endif
            
        @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
        <div class="col-4">
            Pangkalpinang, {{ Carbon\Carbon::parse($user->tgl_penilai)->translatedFormat('d F Y ') }} 
            <br>
            PEJABAT PENILAI KINERJA <br><br><br><br>
            <u>{{ $user->penilai ->nama }}</u> <br>
            NIP.{{ $user->penilai ->nip }}
        @else
        <div class="col-4">
            Simpang Rimba, {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }} 
            <br>
            PEJABAT PENILAI KINERJA <br><br><br><br>
            {{ $user->penilai ->nama }} <br>
            NIP.{{ $user->penilai ->nip }}
        @endif
        </div>
    </div>
        @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
        <div class="container text-center fw-bold">
            <div class="row">
                <div class="col align-self-center">
                    <br><br>
                    Pangkalpinang, {{ Carbon\Carbon::parse($user->tgl_atasan)->translatedFormat('d F Y ') }} 
                    <br>
                    ATASAN PEJABAT PENILAI KINERJA <br><br><br><br>
                    <u>{{ $user->atasan ->nama }} </u><br>
                    NIP.{{ $user->atasan ->nip }}
                </div>
            </div>
        </div>
        @else
        @endif
</div>
@endsection
