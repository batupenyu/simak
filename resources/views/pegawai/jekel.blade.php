
@extends('layout.sidebar')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">

<div class=" container container-fluid mt-4">
<a href="/jekelpdf/"style="text-decoration: none" class="float-end"><i class="fa fa-regular fa-download"></i></a>
<button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print tampil"></i></button>
        @include('pegawai.link')
        <p class="mt-3 text-center">
            <strong>
                REKAP PEGAWAI BERDASAR JENIS KELAMIN<br>
                SMK NEGERI 1 KOBA
            </strong>
        </p>

        <table class="table table-sm table-bordered border-primary  mt-4 " style="font-size: 10pt">
            <tr class="align-middle text-center thead-light">
                <th rowspan="2">No</th>
                <th rowspan="2">Nama Sekolah</th>
                <th colspan="3">Jumlah Guru</th>
                <th colspan="2">Jumlah Tenaga <br>Administrasi Sekolah</th>
            </tr>
            <tr class="align-middle text-center thead-light">
                <th>Guru PNS</th>
                <th>Guru P3K</th>
                <th>GTT</th>
                <th>PNS</th>
                <th>PTT</th>
            </tr>
            <tr>
                <td class="text-center">1.</td>
                <td>SMKN 1 Koba</td>
                <td class="text-center">{{ $pnsguru }}</td>
                <td class="text-center">{{ $p3k }}</td>
                <td class="text-center">{{ $gtt }}</td>
                <td class="text-center">{{ $pnstu }}</td>
                <td class="text-center">{{ $ptt}}</td>
            </tr>
        </table>

        <table class="table table-sm table-bordered border-primary  mt-4 " style="font-size: 10pt">
            <tr class="align-middle text-center thead-light">
                <th rowspan="2">No</th>
                <th rowspan="2">Nama Sekolah</th>
                <th colspan="3">Jumlah GTT</th>
                <th colspan="3">Jumlah PTT</th>
            </tr>
            <tr class="align-middle text-center thead-light">
                <th>APBN</th>
                <th>APBD</th>
                <th>IPP</th>
                <th>APBN</th>
                <th>APBD</th>
                <th>IPP</th>
            </tr>
            <tr>
                <td class="text-center">1.</td>
                <td>SMKN 1 Koba</td>
                <td class="text-center">{{ $gttapbn }}</td>
                <td class="text-center">{{ $gttapbd }}</td>
                <td class="text-center">{{ $gttipp }}</td>
                <td class="text-center">{{ $pttapbn }}</td>
                <td class="text-center">{{ $pttapbd }}</td>
                <td class="text-center">{{ $pttipp }}</td>
            </tr>
        </table>

</div>
@endsection