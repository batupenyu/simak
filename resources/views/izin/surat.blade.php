@extends('layout.master')

@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
<div class="container-xl container-fluid mt-0">
        @foreach ($izin as $n)
        <h4><a href="{{ url('project') }}" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-home"></i></a></h4>
        <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print"></i></button>
        <button class="btn btn-sm btn-outline float-end tampil" type="submit">
            <a href="{{ url('izin.edit/'.$n->id) }}"><i class="fa fa-edit"></i> </a> 
        </button>
        
        <table class="table table-sm table-borderless w-75 center rounded mx-auto">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Simpang Rimba, {{ Carbon\Carbon::Parse($n->tgl_surat)->translatedFormat(' d F Y') }} <br><br></td>
            </tr>
            <tr >
                <td style="padding-right: 10px">
                    Nomor
                    </td>
                    <td>:</td>
                    <td style="padding-left: 10PX">
                        {{-- 800/ {{ $n->no_surat }}/SMKN1/SR/{{ Carbon\Carbon::Parse($n->tgl_surat)->format('Y') }} --}}
                    </td>
                <td></td>
                <td>Bapak Kepala Sekolah</td>
            </tr>
            <tr><td style="padding-right: 10px">Sifat</td><td>:</td><td style="padding-left: 10PX">-</td>
                <td>Yth,</td>
                <td>SMK Negeri 1 Simpang Rimba</td>
            </tr>
            <tr><td style="padding-right: 10px">Lampiran</td><td>:</td><td style="padding-left: 10PX">-</td>
                <td></td>
                <td>di -</td>
            </tr>
            <tr><td style="padding-right: 10px">Perihal</td><td>:</td><td style="padding-left: 10PX">Permohonan izin</td>
                <td></td>
                <td style="padding-left: 30px">Tempat <br><br><br></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="line-height: 1.0cm;" colspan="3">Yang bertanda tangan dibawah ini ;</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="3">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td >Nama</td>
                            <td>:</td>
                            <td>{{ $n->user->name }}</td>
                        </tr>
                        <tr>
                            <td >NIP</td>
                            <td>:</td>
                            <td>{{ $n->user->nip }}</td>
                        </tr>
                        <tr>
                            <td >Pangkat/Gol.</td>
                            <td>:</td>
                            <td>
                                {{ $n->user->pangkat_gol }}
                            </td>
                        </tr>
                        <tr>
                            <td >Jabatan</td>
                            <td>:</td>
                            <td>
                                {{ $n->user->jabatan }}
                            </td>
                        </tr>
                        <tr>
                            <td >Alamat</td>
                            <td>:</td>
                            <td style="text-align: justify">{{ $n->user->alamat }}.</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="text-align: justify" colspan="3"  >
                    {{ $n->alasan_izin }} pada tanggal @include('izin.tanggal')

                    {{-- dengan ini mengajukan permohonan izin tidak masuk kerja pada hari {{ Carbon\Carbon::Parse($n->tgl_awal)->translatedFormat(' l, d F Y') }} 
                    dikarenakan, {{$n->alasan_izin}}. --}}
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="text-align: justify" colspan="3">
                    Demikian surat permohonan ini disampaikan, atas perkenan Bapak di ucapkan terimakasih.
                </td>
            </tr>
        </table>
        
        <br>
        <div class="div col-8 float-end" style="text-align: center">
            <strong>
                <br>
                Pemohon, <br>
                <br><br><br>
                {{ $n->user->name }} <br>
                NIP. {{ $n->user->nip }} <br>
                <br>
            </strong>
        </div>
</div>
@endforeach
@endsection