@extends('layout.sidebar')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
<div class="container-xl container-fluid mt-0">
    @foreach ($cuti as $n)
    <h4><a href="{{ url('pegawai.index') }}" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-home"></i></a></h4>
    <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print"></i></button>
    <button class="btn btn-sm btn-outline float-end tampil" type="submit">
        <a href="{{ url('cuti.edit/'.$n->id) }}"><i class="fa fa-edit"></i> </a> 
    </button>
    
    <div class="col-6 float-end mt-5">
        ANAK LAMPIRAN l.c <br>
        PERATURAN BADAN KEPEGAWAIAN NEGARA <br>
        REPUBLIK INDONESIA <br>
        NOMOR 24 TAHUN 2017 <br>
        TENTANG <br>
        TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL
        <br><br><br><br>
    </div>
    <table class="table table-sm table-borderless " >
        {{-- <tr>
            <th colspan="3">
                <img src={{ asset('image/kop2.png') }} style="display-inline:block" class="w-100">
            </th>
        </tr> --}}
        <tr>
            <th style="text-align: center" colspan="3">
                <u>
                    IZIN SEMENTARA PELAKSANAAN CUTI KARENA ALASAN PENTING <br>
                </u>
            </th>
        </tr>
        <tr>
            <td style="text-align: center" colspan="3">
                @if ($n->no_surat == "")
                Nomor : 850/........./SMKN1/SR/{{ Carbon\Carbon::Parse($n->tgl_awal)->format('Y') }} 
                @else
                Nomor : 850/ {{ $n->no_surat }}/SMKN1/SR/{{ Carbon\Carbon::Parse($n->tgl_surat)->format('Y') }} 
                @endif
            </td>
        </tr>
        <tr>
            <td style="width: 30px">1.</td>
            <td colspan="2">
                Diberikan izin sementara untuk melaksanakan cuti karena alasan penting kepada Pegawai Negeri Sipil:
            </td>
        </tr>
        <tr >
            <td></td>
            <td >Nama </td>
            <td >: {{ $n->user->name }}</td>
        </tr>
        <tr >
            <td></td>
            <td >NIP</td>
            <td >: {{ $n->user->nip }}</td>
        </tr>
        <tr >
            <td></td>
            <td >Pangkat</td>
            <td >: {{ $n->user->pangkat_gol }}</td>
        </tr>
        <tr >
            <td></td>
            <td >Jabatan</td>
            <td >: {{ $n->user->jabatan }} </td>
        </tr>
        <tr style="text-align: justify">
            <td></td>
            <td colspan="2">
                selama 
                <strong>
                    {{ $n->jlh_hari }}
                    ({{Riskihajar\Terbilang\Facades\Terbilang::make($n->jlh_hari)}})
                    {{-- {{ $days +1 }} --}}
                    {{-- (<strong>{{Riskihajar\Terbilang\Facades\Terbilang::make($days+1)}}</strong>) --}}
                </strong>
                hari, terhitung mulai tanggal  
                <strong>
                    {{ Carbon\Carbon::Parse($n->tgl_awal)->translatedFormat('  d F Y') }} 
                </strong>
                sampai dengan tanggal 
                <strong>
                    {{-- {{ Carbon\Carbon::Parse($n->tglmasuk)->translatedFormat('  d F Y') }}  --}}
                    {{ Carbon\Carbon::Parse($akhir)->translatedFormat('  d F Y') }} 
                </strong>
                , dengan ketentuan sebagai berikut: <br>
                <table>
                    <tr>
                        <td style="padding-right: 20px; vertical-align:top ">a.</td>
                        <td>
                            Sebelum menjalankan cuti karena alasan penting, wajib menyerahkan pekerjaannya kepada atasan langsungnya atau pejabat lain yang ditunjuk.
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-right: 20px; vertical-align:top ">b.</td>
                        <td>
                            Setelah selesai menjalankan cuti karena alasan penting, wajib melaporkan diri kepada atasan langsungnya dan bekerja kembali sebagaimana biasa. 
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>2.</td>
            <td colspan="2">
                Demikian izin sementara melaksanakan cuti karena alasan penting ini dibuat untuk dapat digunakan sebagaimana mestinya. 
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
    <caption>
        TEMBUSAN : <br>
        1.
    </caption>
</div>
@endforeach
@endsection