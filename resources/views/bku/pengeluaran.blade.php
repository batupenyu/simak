@extends('layout.sidebar')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">


<div class="container mt-5">



    <h4 style="text-align: center">PEMERINTAH PROVINSI KEPULAUAN BANGKA BELITUNG</h4>
    <h2 style="text-align: center">BUKU KAS UMUM</h2>
    <h5 style="text-align: center">BENDAHARA PENGELUARAN</h5>
    {{-- <h6 style="text-align: center"><i>periode : {{ $tglawalperiode->translatedFormat('d F Y') }} s.d {{ $tglakhirperiode->translatedFormat('d F Y') }} </i></h6 style="text-align: center"> --}}
    <h6 style="text-align: center"><i>
            {{ Carbon\Carbon::Parse($start_date)->translatedFormat(' d F Y') }} s.d
            {{ Carbon\Carbon::Parse($end_date)->translatedFormat(' d F Y') }}
    </i></h6 style="text-align: center">
    <table class="mt-5 tinggi">
        <tr>
            <td>Urusan Pemerintahan</td>
            <td style="padding-left: 30px">:</td>
            <td style="padding-left: 30px">1.</td>
            <td style="padding-left: 30px">URUSAN WAJIB PELAYANAN DASAR</td>
        </tr>
        <tr>
            <td>Bidang Pemerintahan</td>
            <td style="padding-left: 30px">:</td>
            <td style="padding-left: 30px">1.01</td>
            <td style="padding-left: 30px">PENDIDIKAN</td>
        </tr>
        <tr>
            <td>Unit Organisasi</td>
            <td style="padding-left: 30px">:</td>
            <td style="padding-left: 30px">1.01.01</td>
            <td style="padding-left: 30px">DINAS PENDIDIKAN</td>
        </tr>
        <tr>
            <td>Sub Unit Organisasi</td>
            <td style="padding-left: 30px">:</td>
            <td style="padding-left: 30px">1.01.01.58</td>
            <td style="padding-left: 30px">SMK Negeri 1 Simpang Rimba</td>
        </tr>
    </table>
    <table class="mt-3 tinggi">
        <tr>
            <td>Pengguna Anggaran/Kuasa Pengguna Anggaran</td>
            <td style="padding-left: 30px">:</td>
            <td style="padding-left: 30px">Hariyanto, S.Pd</td>
        </tr>
        <tr>
            <td>Bendahara Penerimaan</td>
            <td style="padding-left: 30px">:</td>
            <td style="padding-left: 30px"> ........... </td>
        </tr>
    </table>
    <br>
    <a class="btn btn-sm btn-primary tampil" href="{{ url('bku.create') }}"><span><i class="fa fa-plus-circle"></i></span> ADD</a>
    <button onclick="window.print();" class="btn btn-sm btn-primary tampil ">CETAK</button>
    <form class="tampil mb- mt-3" action="{{ url('filterpengeluaran') }}" method="GET">
        <div class="row">
            <div class="col-6">
                <input type="date" class="form-control" name="start_date">
            </div>
            <div class="col-5">
                <input type="date" class="form-control" name="end_date">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"> </i> Filter</button>
            </div>
        </div>
    </form>
    <form class="tampil mb- mt-3" action="{{ url('filterpengeluaranPDF') }}" method="GET">
        <div class="row">
            <div class="col-6">
                <input type="date" class="form-control" name="start_date">
            </div>
            <div class="col-5">
                <input type="date" class="form-control" name="end_date">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"> </i> Filter</button>
            </div>
        </div>
    </form>
    <table class="table table-sm table-bordered border-primary mt-3 topics">
        <tr style="vertical-align: middle; text-align:center">
            <th>Tgl.</th>
            <th>Kode</th>
            <th>No. Bukti</th>
            <th>Kode Rek.</th>
            <th>Uraian</th>
            <th>Penerimaan</th>
            <th>Pengeluaran</th>
            <th>Saldo</th>
        </tr>
        {{-- <?php $cumulative = 0; ?>
        @foreach ($data as $item)
        <?php $cumulative += $item->nominal; ?>
        <tr>
            <td style="text-align: center">{{ $loop->iteration }}.</td>
            <td style="text-align: center" >{{ Carbon\Carbon::Parse($item->tgl_transaksi)->translatedFormat(' d/m/Y') }}</td>
            <td style="text-align: center">No.Bukti</td>
            <td style="text-align: center">Kode Rek</td>
            <td>{{ $item->uraian }}</td>
            <td style="text-align: right; padding-right:30px">
                @if ($item->type == 'penerimaan')
                @currency($item->nominal)
                @else
                @endif
            </td>
            <td style="text-align: right; padding-right:30px">
                @if ($item->type == 'pengeluaran')
                @currency($item->nominal)
                @else
                @endif
            </td>
            
            <td style="text-align: right; padding-right:30px">
                @currency($cumulative)
            </td>
            
            @endforeach --}}

            @php
                $balance = 0;
                $hasil = $hasil->map(function($item) use(&$balance) {
                    $item->total = $item->nominal;
                    if ($item->type == "pengeluaran") {
                    $item->total *= -1;
                    }
                    $item->balance = ($balance += $item->total);
                    return $item;
                });
                // ->reverse();
                @endphp

                @foreach($hasil as $item)
                    <tr>
                        <td style="text-align: center; width:100px">{{ $loop->iteration }}.</td>
                        <td style="text-align: center"><p class="mb-0">
                            {{-- {{ $item->created_at->format('d/m/Y') }} --}}
                            {{-- {{ Carbon\Carbon::Parse($item->tgl_transaksi)->translatedFormat(' d F Y') }} --}}
                            {{ Carbon\Carbon::Parse($item->tgl_transaksi)->translatedFormat(' d/m/Y') }}
                        </p></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right; padding-right:30px">
                            {{$item->uraian}}
                        </td>
                        <td style="text-align: right; padding-right:30px">
                            @if ($item->type == 'penerimaan')
                            @currency($item->nominal)
                            @else
                            @endif
                        </td>
                        <td style="text-align: right; padding-right:30px">
                            @if ($item->type == 'pengeluaran')
                            @currency($item->nominal)
                            @else
                            @endif
                        </td>
                        <td style="text-align: right; padding-right:30px">
                            @currency($item->balance)
                        </td>
                    </tr>
                @endforeach
                    <tr class="border-0 align-bottom " style="height: 40px">
                        <td colspan="2" class="border-0">
                            Jumlah periode ini  
                        </td>
                        <td class="border-0" colspan="4" style="text-align: right; padding-right:30px">
                            @currency($penerimaanini) 
                        </td>
                        <td class="border-0" style="text-align: right; padding-right:30px">
                            @currency($pengeluaranini) 
                        </td>
                        <td class="border-0"></td>
                    </tr>
                    <tr class="border-0">
                        <td colspan="2" class="border-0">
                            Jumlah periode lalu  
                        </td>
                        <td class="border-0" colspan="4" style="text-align: right; padding-right:30px">
                            @currency($penerimaan_lalu) 
                        </td>
                        <td class="border-0" style="text-align: right; padding-right:30px">
                            @currency($pengeluaran_lalu) 
                        </td>
                        <td class="border-0"></td>
                    </tr>
                    <tr class="border-0">
                        <td colspan="2" class="border-0">
                            Jumlah semua sampai periode ini
                        </td>
                        <td class="border-0" colspan="4" style="text-align: right; padding-right:30px">
                            <u>
                            @currency($penerimaan) 
                            </u>
                        </td>
                        <td class="border-0" style="text-align: right; padding-right:30px">
                            <u>
                                @currency($pengeluaran) 
                            </u>
                        </td>
                        <td class="border-0"></td>
                    </tr>
                    <tr class="border-0" >
                        <td class="border-0">
                            Sisa Kas
                        </td>
                        <td class="border-0" colspan="7" style="text-align: right; padding-right:30px">
                            @currency($penerimaan-$pengeluaran)
                        </td>
                    </tr>
                    <tr class="border-0" >
                        <td colspan="3" class="border-0">
                            Pada hari ini tanggal,  
                            <strong>
                                <i>
                                    {{ Carbon\Carbon::Parse($end_date)->translatedFormat(' d F Y') }} 
                                </i>
                            </strong>
                        </td>
                    </tr>
                    <tr class="border-0" >
                        <td colspan="3" class="border-0">
                            oleh kami di dapat dalam kas 
                            <strong><i>
                                Rp.@currency($penerimaan-$pengeluaran),-
                            </i></strong>
                        </td>
                    </tr>
                    <tr class="border-0" >
                        <td colspan="3" class="border-0">
                            Terbilang :
                            <strong class="capitalize">
                                <i>
                                ({{ Riskihajar\Terbilang\Facades\Terbilang::make($penerimaan-$pengeluaran) }} Rupiah)
                            </i>
                            </strong> 
                        </td>
                    </tr>
                    
    </table>
    <table class="tinggi">
        <tr >
            <td style="width: 200px">
                Terdiri dari :
            </td>
        </tr>
        <tr >
            <td >
                a. Tunai
            </td>
            <td>
                Rp.@currency($penerimaan-$pengeluaran),-
            </td>
        </tr>
        <tr >
            <td>
                b. Saldo Bank
            </td>
            <td>
                Rp.
            </td>
        </tr>
        <tr >
            <td>
                c. Surat Berharga
            </td>
            <td>
                Rp. 
            </td>
        </tr>
    </table>

            <div class="row justify-content-around text-center fw-bold mt-5">
                <div class="col-4" >
                    <br>
                    Kepala Sekolah, <br><br><br>
                    Hariyanto, SPd
                    <br>
                    NIP. 197001202005011006
                </div>
                
            <div class="col-4">
                    Pangkalpinang, 
                    {{-- {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }}  --}}
                    <br>
                    Bendahara <br><br><br>
                    ..............
                    <br>
                    NIP.
                    {{-- {{ $user->penilai ->nip }} --}}
                <br>
                <br>
            </div>
        </div>

{{-- 
<table class="table table-hover table-striped">
    <thead>
        <th>Values</th>
        <th>Cumulative Values</th>
    </thead>
    <tbody>
        @foreach($driverAccounts as $dataValue)
            <tr>
                <td>{{$dataValue['nominal']}}</td>
                <td>{{$dataValue['volume']}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<table class="table table-hover table-striped">
<?php $cumulative = 0; ?>
@foreach ($data as $object)
    <?php $cumulative += $object->nominal; ?>
    <tr>
        <td>
            @if ($object->type == 'penerimaan')
            {{ $object->nominal }} 
            @else
            @endif
        </td>
        <td>
            @if ($object->type == 'pengeluaran')
            {{ $object->nominal }} 
            @else
            @endif
        </td>
        <td>{{ $cumulative }}</td>
    </tr>
@endforeach
</table> --}}
@endsection


