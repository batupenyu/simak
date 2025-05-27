@extends('layout.sidebar')
@section('content')

<div class="container mt-5">
    <h4 style="text-align: center">PEMERINTAH PROVINSI KEPULAUAN BANGKA BELITUNG</h4>
    <h2 style="text-align: center">BUKU KAS UMUM</h2>
    <table>
        <tr>
            <td>Nama Sekolah</td><td style="padding-left: 30px">:</td><td style="padding-left: 30px">SMK Negeri 1 Simpang Rimba</td>
        </tr>
        <tr>
            <td>Desa/Kecamatan</td><td style="padding-left: 30px">:</td><td style="padding-left: 30px">Simpang Rimba</td>
        </tr>
        <tr>
            <td>Kabupaten</td><td style="padding-left: 30px">:</td><td style="padding-left: 30px">Bangka Selatan</td>
        </tr>
        <tr>
            <td>Provinsi</td><td style="padding-left: 30px">:</td><td style="padding-left: 30px">Kepulauan Bangka Belitung</td>
        </tr>
    </table>
    <br>
    <a href="{{ url('bku.create') }}"><span><i class="fa fa-plus-circle"></i></span>Add</a>
    <table class="table table-sm table-bordered border-primary">
        <tr style="vertical-align: middle; text-align:center">
            <th>Tgl.</th>
            <th>Kode</th>
            <th>No. Bukti</th>
            <th>Uraian</th>
            <th style="text-align: right; padding-right:20px">Penerimaan</th>
            <th style="text-align: right; padding-right:20px">Pengeluaran</th>
            <th style="text-align: right; padding-right:20px">Saldo</th>
            <th>Actions</th> <!-- New column for actions -->
        </tr>
        @php $saldoawal = 0; @endphp
        @foreach ($data as $item)
        
        <tr>
            <td>{{ Carbon\Carbon::Parse($item->tgl_transaksi)->translatedFormat(' d F Y') }}</td>
            <td>Data</td>
            <td>{{ $item->no_bukti }}</td>
            <td>{{ $item->uraian }}</td>
            <td style="text-align: right; padding-right:20px">
                @if ($item->type == 'penerimaan')
                    {{ number_format($item->nominal, 2, ',', '.') }}
                @else
                -
                @endif
            </td>
            <td style="text-align: right; padding-right:20px">
                @if ($item->type == 'pengeluaran')
                    {{ number_format($item->nominal, 2, ',', '.') }}
                @else
                -
                @endif
            </td>
            <td style="text-align: right; padding-right:20px">
                @php
                    $saldoawal += ($item->type === 'penerimaan' ? $item->nominal : -$item->nominal);
                @endphp
                {{ $saldoawal < 0 ? '-' . number_format(abs($saldoawal), 2, ',', '.') : number_format($saldoawal, 2, ',', '.') }}
            </td>
            <td>
                <a href="{{ url('bku/pdf/' . $item->id ) }}">View</a> <!-- Link to view details -->

            </td>
        </tr>
    @endforeach
    </table>

    <div class="row justify-content-around text-center fw-bold ">
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
