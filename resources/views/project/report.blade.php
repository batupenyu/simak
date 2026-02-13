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
<style>
    @page {
        size: A4;
        margin: 1cm 1.5cm;
    }
    @media print {
        .btn, .nav-tabs, .tampil { display: none !important; }
        body { font-size: 11px; }
        .table { font-size: 10px; }
        .table-sm { font-size: 10px; }
    }
    .table-custom { table-layout: fixed; word-wrap: break-word; }
    .table-custom td, .table-custom th { vertical-align: top; }
    .nested-table { margin: 0 !important; }
    .nested-table td { padding: 2px 4px !important; border: none !important; }
</style>

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

    <table class="table table-custom mb-0 table-sm table-bordered border-primary">
        <tr style="background-color:aliceblue;">
            <th class="text-center" style="width:50px" rowspan="6">1</th>
            <th colspan="2" style="background-color:aliceblue;">PEGAWAI YANG DINILAI</th>
        </tr>
        <tr>
            <th style="width:200px">NAMA</th>
            @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
                <td style="text-transform:uppercase"><b>{{ $user->name }}</b></td>
            @else
                <td><b>{{ $user->name }}</b></td>
            @endif
        </tr>
        <tr>
            <th>NIP</th>
            <td>{{ $user->nip }}</td>
        </tr>
        <tr>
            <th>PANGKAT/GOL. RUANG</th>
            <td>{{ $user->pangkat_gol }}</td>
        </tr>
        <tr>
            <th>JABATAN</th>
            <td>{{ $user->jabatan }}</td>
        </tr>
        <tr>
            <th>UNIT KERJA</th>
            <td>{{ $user->unit_kerja }}</td>
        </tr>
        <tr>
            <th class="text-center" style="width:50px" rowspan="6">2</th>
            <th colspan="2" style="background-color:aliceblue;">PEJABAT PENILAI KINERJA</th>
        </tr>
        <tr>
            <th>NAMA</th>
            <td><b>{{ optional($user->penilai)->nama ?? '' }}</b></td>
        </tr>
        <tr>
            <th>NIP</th>
            <td>{{ optional($user->penilai)->nip ?? '' }}</td>
        </tr>
        <tr>
            <th>PANGKAT/GOL. RUANG</th>
            <td>{{ optional($user->penilai)->pangkat_gol ?? '' }}</td>
        </tr>
        <tr>
            <th>JABATAN</th>
            <td>{{ optional($user->penilai)->jabatan ?? '' }}</td>
        </tr>
        <tr>
            <th>UNIT KERJA</th>
            <td>{{ optional($user->penilai)->unit_kerja ?? '' }}</td>
        </tr>
        <tr>
            <th class="text-center" style="width:50px" rowspan="6">3</th>
            <th colspan="2" style="background-color:aliceblue;">ATASAN PEJABAT PENILAI KINERJA</th>
        </tr>
        <tr>
            <th>NAMA</th>
            <td><b>{{ optional($user->atasan)->nama ?? '' }}</b>
                @if($user->atasan)
                <a href="{{ url('atasan.edit/'.$user->atasan->id) }}"><i class="fa fa-edit tampil"></i></a>
                @endif
            </td>
        </tr>
        <tr>
            <th>NIP</th>
            <td>{{ optional($user->atasan)->nip ?? '' }}</td>
        </tr>
        <tr>
            <th>PANGKAT/GOL. RUANG</th>
            <td>{{ optional($user->atasan)->pangkat_gol ?? '' }}</td>
        </tr>
        <tr>
            <th>JABATAN</th>
            <td>{{ optional($user->atasan)->jabatan ?? '' }}</td>
        </tr>
        <tr>
            <th>UNIT KERJA</th>
            <td>{{ optional($user->atasan)->unit_kerja ?? '' }}</td>
        </tr>
        @foreach ($user->tugas as $data)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->name }}</td>
            <td colspan="3">
                @foreach ($data->tupoksi as $item)
                <div class="d-flex mb-1">
                    <div style="width:15%">{{ $item->aspek }}</div>
                    <div style="width:5%">:</div>
                    <div style="width:55%; text-align:justify">{{ $item->indikator }}</div>
                    <div style="width:25%; text-align:center">{{ $item->target }}</div>
                </div>
                @endforeach
            </td>
        </tr>
        @endforeach

        @foreach ($user->tutam as $data)
        <tr style="background-color:aliceblue;">
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $data->rk->name }}</td>
            <td>{{ $data->name }}</td>
            <td colspan="3">
                @foreach ($data->tuti as $item)
                <div class="d-flex mb-1">
                    <div style="width:15%">{{ $item->aspek }}</div>
                    <div style="width:5%">:</div>
                    <div style="width:55%; text-align:justify">{{ $item->indikator }}</div>
                    <div style="width:25%; text-align:center">{{ $item->target }}</div>
                </div>
                @endforeach
            </td>
        </tr>
        @endforeach
        <tr style="background-color:aliceblue;">
            <th class="text-center" style="width:50px" rowspan="3">4</th>
            <th style="background-color:aliceblue;" colspan="2">EVALUASI KINERJA</th>
        </tr>
        <tr>
            <th style="background-color:aliceblue;">CAPAIAN KINERJA ORGANISASI</th>
            <td><b>BAIK</b></td>
        </tr>
        <tr>
            <th style="background-color:aliceblue;">PREDIKAT KINERJA PEGAWAI</th>
            <td><b>BAIK</b></td>
        </tr>
        <tr>
            <th class="text-center" style="width:50px" rowspan="2">5</th>
            <th style="background-color:aliceblue;" colspan="2">CATATAN/REKOMENDASI</th>
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
