@extends('layout.sidebar')
@section('content')
{{-- @include('layout.kop2') --}}
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
@section('title') 
    {{-- laporan cuti periode {{ Carbon\Carbon::Parse($start_date)->translatedFormat(' d-m-Y') }} s.d {{ Carbon\Carbon::Parse($end_date)->translatedFormat(' d-m-Y') }} --}}
    laporan cuti Tahun {{ Carbon\Carbon::Parse($end_date)->translatedFormat(' Y') }}
@endsection
<div class="container mt-4">
    <h5 style="text-align: center">REKAP CUTI PEGAWAI <br>
        SMK NEGERI 1 SIMPANG RIMBA <br>
    </h5>
    <h6 style="text-align: center">
        <i>
            Periode {{ Carbon\Carbon::Parse($start_date)->translatedFormat(' d-m-Y') }} s.d {{ Carbon\Carbon::Parse($end_date)->translatedFormat(' d-m-Y') }}
        </i>
    </h6>
    <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print tampil"></i></button>
    {{-- <a class="float-end" href="{{ url('cutipdf') }}"><i class="fa fa-print tampil"></i></a> --}}
    {{-- <form class="tampil" action="{{ url('filter') }}" method="GET">
        <div class="col-md-3">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="end_date">To Date</label>
            <input type="date" name="end_date" class="form-control">
        </div>
        <div class="col-md-1 pt-4">
            <button type="submit" class="btn btn-sm btn-primary">Filter</button>
        </div>
    </form> --}}
    <form class="tampil" action="{{ url('cutipdf') }}" method="GET">
        <table>
            <tr>
                <td>

                    <div>
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" class="form-control">
                    </div>
                </td>
                <td>

                    <div>
                        <label for="end_date">To Date</label>
                        <input type="date" name="end_date" class="form-control">
                    </div>
                </td>
                <td>

                    <div class="col-md-1 mt-4">
                        <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
    {{-- <a class="btn btn sm btn-success mt-2" href="{{ url('cuti.report') }}">Laporan</a> --}}

    <hr>
{{-- 
    <form class="tampil" action="{{ url('calculate-workdays') }}" method="GET">
        <div class="col-md-3">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="end_date">To Date</label>
            <input type="date" name="end_date" class="form-control">
        </div>
        <div class="col-md-4 pt-4">
            <button type="submit" class="btn btn-sm btn-primary">Hari Kerja</button>
        </div>
    </form> --}}


    <table class="table table-sm table-bordered border-info mt-3">
        <tr style=" text-align:center" class="align-middle">
            <th>No.</th>
            <th>Nama Pegawai</th>
            <th>Tanggal Cuti</th>
            <th>Jenis Cuti</th>
            <th>Lama Cuti </th>
        </tr>
        @foreach ($result as $item)
        <tr >
            <td class="text-center">{{ $loop->iteration }}</td>
            <td style="padding-left: 30pt">{{ $item->user->name }}</td>
            <td style="width: 300px" class="text-center">{{ Carbon\Carbon::Parse($item->tgl_awal)->translatedFormat(' d-m-Y') }} s.d {{ Carbon\Carbon::Parse($item->tglmasuk)->translatedFormat(' d-m-Y') }}</td>
            <td class="text-center">{{ $item->jenis_cuti }}</td>
            <td class="text-center">
                @if ($item->jenis_cuti == "Cuti Melahirkan")
                    3 bulan
                @else
                    {{ $item->jlh_hari }} hari
                @endif
            </td>
        </tr>
        @endforeach
    </table>

    

    <br><br>
    {{-- <div class="col-5 float-end">
        <div class="float-start" style="text-align: center">
            Koba, 
            {{ Carbon\Carbon::Parse($end_date)->translatedFormat(' d F Y') }} <br>
            Kepala Sekolah
            <br><br><br>
            Hariyanto, S.Pd
            <br>
            NIP. 197001202005011006
            <br>
        </div>
    </div> --}}
</div>
@endsection