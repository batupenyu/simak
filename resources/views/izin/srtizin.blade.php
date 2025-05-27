@extends('layout.master')
@section('content')
@include('layout.kop2')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
<div class="container-xl container-fluid">
    @foreach ($izin as $n)
    <h4><a href="{{ url('project') }}" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-home"></i></a></h4>
    <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print"></i></button>
    <button class="btn btn-sm btn-outline float-end tampil" type="submit"><a href="{{ url('izin.edit/'.$n->id) }}"><i class="fa fa-edit"></i></a></button>
        <table class="table table-sm table-borderless" >
            {{-- <tr>
                <th colspan="3">
                    <img src={{ asset('image/kop2.png') }} style="display-inline:block" class="w-100">
                </th>
            </tr> --}}
            <tr>
                <th style="text-align: center" colspan="3">
                    <u>
                        SURAT KETERANGAN IZIN <br>
                    </u>
                </th>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center ">
                    NOMOR : 800/ 
                    @if ($n->no_surat == '')
                        ..........
                    @else
                        {{ $n->no_surat }}
                    @endif
                    /SMKN1/SR/{{ Carbon\Carbon::Parse($n->tgl_surat)->format('Y') }} 
                <br><br>
                </td>
            </tr>
            <tr>
                <td  colspan="3">
                    Yang bertanda tangan dibawah ini, kepala sekolah SMK Negeri 1 Simpang Rimba dengan ini menerangkan:
                    <br>
                </td>
            </tr>
            <br> <br> <br>
            <tr style="line-height: 1.0cm">
                <td style="margin-bottom: 0; padding-left: 50px; width:200px">Nama</td>
                <td>&nbsp;&nbsp;&nbsp;:</td>
                <td style="margin-bottom: 0; padding-left: 17px" >{{ $n->user->name }}</td>
            </tr>
            <tr style="line-height: 1.0cm">
                <td style="margin-bottom: 0; padding-left: 50px">NIP</td>
                <td>&nbsp;&nbsp;&nbsp;:</td>
                <td style="margin-bottom: 0; padding-left: 17px" >{{ $n->user->nip }}</td>
            </tr>
            <tr style="line-height: 1.0cm">
                <td style="margin-bottom: 0; padding-left: 50px">Pangkat</td>
                <td>&nbsp;&nbsp;&nbsp;:</td>
                <td style="margin-bottom: 0; padding-left: 17px" >{{ $n->user->pangkat_gol }}</td>
            </tr>
            <tr style="line-height: 1.0cm">
                <td style="margin-bottom: 0; padding-left: 50px">Jabatan</td>
                <td>&nbsp;&nbsp;&nbsp;:</td>
                <td style="margin-bottom: 0; padding-left: 17px" >{{ $n->user->jabatan }} </td>
            </tr>
            <tr>
                <td colspan="3">Bahwa nama tersebut di atas izin untuk tidak hadir/tidak melakukan presensi pada: <br></td>
            </tr>
            <tr style="line-height: 1.0cm">
                <td style="margin-bottom: 0; padding-left: 50px">Hari/Tanggal</td>
                <td>&nbsp;&nbsp;&nbsp;:</td>
                <td style="margin-bottom: 0; padding-left: 17px" >{{ Carbon\Carbon::Parse($n->tgl_awal)->translatedFormat(' l, d F Y') }}</td>
            </tr>
            <tr style="line-height: 1.0cm">
                <td style="margin-bottom: 0; padding-left: 50px">Keterangan</td>
                <td>&nbsp;&nbsp;&nbsp;:</td>
                <td style="margin-bottom: 0; padding-left: 17px">{{ $n->alasan_izin }}</td>
            </tr>
            <tr style="line-height: 1.0cm">
                <td style="margin-bottom: 0; padding-left: 50px">Jam</td>
                <td>&nbsp;&nbsp;&nbsp;:</td>
                <td style="margin-bottom: 0; padding-left: 17px">{{ $n->jam }} s.d {{ $n->jam_2 }}  </td>
            </tr>
            <tr>
                <td colspan="3">
                    Demikian surat keterangan ini dibuat untuk dapat di pergunakan sebagaimana mestinya,atas perhatian di ucapkan terima kasih.
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <br><br><br>
                    <div class="div col-6 float-end" style="text-align: center">
                        <strong>
                            Simpang Rimba,
                                    <strong>
                                        {{ Carbon\Carbon::Parse($n->tgl_surat)->translatedFormat(' d F Y') }} 
                                    </strong>
                            <br>
                            Kepala Sekolah, <br>
                            SMK Negeri 1 Simpang Rimba <br><br><br>
                                    {{ $n->user->penilai->nama }} <br>
                                    NIP. {{ $n->user->penilai->nip }} <br>
                                <br>
                        </strong>
                    </div>
                </td>
            </tr>
        </table>
    @endforeach
</div>
@endsection