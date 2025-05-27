@extends('layout.sidebar')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">

<div class="container mt-5">
    <h4 style="text-align: center">PEMERINTAH PROVINSI KEPULAUAN BANGKA BELITUNG</h4>
    <h2 style="text-align: center">BUKU KAS UMUM</h2>
    <h6 style="text-align: center"><i>
        {{ Carbon\Carbon::Parse($start_date)->translatedFormat(' d F Y') }} s.d
        {{ Carbon\Carbon::Parse($end_date)->translatedFormat(' d F Y') }}
    </i></h6>
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
    <form class="tampil mb-2 mt-3" action="{{ url('filterpenerimaan') }}" method="GET">
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

    <table class="table table-sm" style="border: 1px solid; height: 0;">
        <tr style="vertical-align: middle; text-align:center">
            <th>Tgl.
                <br> (1)
            </th>
            <th>Kode
                <br> (2)
            </th>
            <th>No. Bukti
                <br> (3)
            </th>
            <th>Kode Rek.
                <br> (4)
            </th>
            <th>Uraian
                <br> (5)
            </th>
            <th>Penerimaan
                <br> (6)
            </th>
            <th>Pengeluaran
                <br> (7)
            </th>
        </tr>
        <hr>

        @php
            $balance = 0;
            $hasil = $hasil->map(function($item) use(&$balance) {
                $item->total = $item->nominal;
                if ($item->type == "pengeluaran") 
                {
                    $item->total *= -1;
                }
                $item->balance = ($balance += $item->total);
                return $item;
            });
        @endphp

        @foreach($hasil as $item)
            <tr>
                <td style="text-align: center; width:100px">{{ $loop->iteration }}.</td>
                <td style="text-align: center"><p class="mb-0">
                    {{ Carbon\Carbon::Parse($item->tgl_transaksi)->translatedFormat(' d/m/Y') }}
                </p></td>
                <td></td>
                <td></td>
                <td style="text-align: right; padding-right:30px">
                    {{$item->uraian}}
                </td>
                <td style="text-align: right; padding-right:30px">
                    @if ($item->type == 'penerimaan')
                    {{ number_format($item->nominal, 2, ',', '.') }}
                    @else
                    @endif
                </td>
                <td style="text-align: right; padding-right:30px">
                    @if ($item->type == 'pengeluaran')
                    {{ number_format($item->nominal, 2, ',', '.') }}
                    @else
                    @endif
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="7">
                Jumlah periode ini
                <span style="text-align: right; padding-left:615px">{{ number_format($penerimaanini, 2, ',', '.') }} </span>
                <span style="text-align: right; padding-left:77px">{{ number_format($pengeluaranini, 2, ',', '.') }} </span> <br>
                Jumlah periode lalu
                <span style="text-align: right; padding-left:605px">{{ number_format($penerimaan_lalu, 2, ',', '.') }} </span>
                <span style="text-align: right; padding-left:77px">{{ number_format($pengeluaran_lalu, 2, ',', '.') }} </span> <br>
                Jumlah semua sampai periode ini
                <span style="text-align: right; padding-left:455px">{{ number_format($penerimaan, 2, ',', '.') }} </span>
                <span style="text-align: right; padding-left:35px">{{ number_format($pengeluaran, 2, ',', '.') }} </span> <br>
                Sisa Kas
                <span style="text-align: right; padding-left:750px">{{ number_format($penerimaan-$pengeluaran, 2, ',', '.') }} </span><br>
                Pada hari ini tanggal,
                <strong>
                    <i>
                        {{ Carbon\Carbon::Parse($end_date)->translatedFormat(' d F Y') }}
                    </i>
                </strong> <br>
                oleh kami di dapat dalam kas
                <strong><i>
                    Rp.{{ number_format($penerimaan-$pengeluaran, 2, ',', '.') }},-
                </strong> <br>
                terbilang :
                <strong class="capitalize">
                    <i>
                        ({{ Riskihajar\Terbilang\Facades\Terbilang::make($penerimaan-$pengeluaran) }} Rupiah)
                    </i>
            </td>
        </tr>
        {{-- <tr class="border-0 align-bottom " style="height: 40px">
            <td colspan="2" class="border-0">
                Jumlah periode ini  
            </td>
            <td class="border-0" colspan="4" style="text-align: right; padding-right:30px">
                {{ number_format($penerimaanini, 2, ',', '.') }} 

            </td>
            <td class="border-0" style="text-align: right; padding-right:30px">
                {{ number_format($pengeluaranini, 2, ',', '.') }} 
            </td>
        </tr>
        <tr class="border-0">
            <td colspan="2" class="border-0">
                Jumlah periode lalu  
            </td>
            <td class="border-0" colspan="4" style="text-align: right; padding-right:30px">
                {{ number_format($penerimaan_lalu, 2, ',', '.') }} 
            </td>
            <td class="border-0" style="text-align: right; padding-right:30px">
                {{ number_format($pengeluaran_lalu, 2, ',', '.') }} 
            </td>
        </tr>
        <tr class="border-0">
            <td colspan="2" class="border-0">Jumlah semua sampai periode ini</td>
            <td class="border-0" colspan="4" style="text-align: right; padding-right:30px"><u>@currency($penerimaan) </u></td>
            <td class="border-0" style="text-align: right; padding-right:30px"><u>@currency($pengeluaran) </u></td>
        </tr>
        <tr class="border-0" >
            <td class="border-0">
                Sisa Kas
            </td>
            <td class="border-0" colspan="6" style="text-align: right; padding-right:30px">
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
        </tr> --}}
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
            <br>
            Bendahara <br><br><br>
            ..............
            <br>
            NIP.
        <br>
        <br>
    </div>
</div>

@endsection
