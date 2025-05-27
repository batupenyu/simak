@extends('layout.sidebar')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">

<div class="container-xl container-fluid mt-5">
    {{-- <span class="badge {{ $warna[$item->no_surat]}}" style="font-size:15px; height:30px; width:90px">{{$warna[$item->no_surat]}}</span> --}}
    <table class="table table-sm table-bordered border-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
        <thead>
            <tr>
                <th colspan="6" style="text-align: center">
                    <button onclick="window.print();" class="btn btn-sm btn-primary tampil float-end">Cetak</button>
                    @foreach ($cuti as $item)
                    <button class="btn btn-sm btn-outline-warning tampil float-end">
                        <a href="{{ url('cuti.edit/'.$item->id) }}"><i class="fa fa-edit "></i> </a> 
                        {{-- <a href="{{ url('cuti.kendali/'.$item->id) }}"><i class="fa fa-home "></i> </a>  --}}
                    </button>
                    FORMULIR PERMINTAAN DAN PEMBERIAN CUTI <br>
                    Nomor : 
                    
                    @if ($item->no_surat == "")
                    850/........./Cabdindik wil III/{{ Carbon\Carbon::Parse($item->tgl_awal)->format('Y') }} 
                    @else
                    850/ {{ $item->no_surat }}/Cabdindik wil III/{{ Carbon\Carbon::Parse($item->tgl_surat)->format('Y') }} 
                    @endif
                @endforeach
                </th>
            </tr>
        </thead>
    <tbody>
    @foreach ($cuti as $item)
            <tr style="background-color: rgb(10, 136, 161)">
                <td colspan="4" class="text-light" >
                    <strong>
                        I. DATA PEGAWAI
                    </strong>
                </td>
            </tr>
            <tr>
                <td><strong>Nama</strong></td>
                <td>{{ $item->user->name }}</td>
                <td><strong>NIP</strong></td>
                <td >{{ $item->user->nip}}</td>
            </tr>
            <tr>
                <td><strong>Jabatan</strong></td>
                <td>{{ $item->user->jabatan}}</td>
                <td><strong>Masa Kerja</strong></td>
                <td >
                    {{ \Carbon\Carbon::parse( $item->user->tmt_pangkat)->diff(\Carbon\Carbon::now())->format('%y tahun, %m bulan')}}
                </td>
            </tr>
            <tr>
                <td><strong>Unit Kerja</strong></td>
                <td>{{ $item->user->unit_kerja}}</td>
                <td><strong>Pangkat/Gol.</strong></td>
                <td >{{ $item->user->pangkat_gol}}</td>
            </tr>
    </table>
    <table class="table table-sm table-bordered border-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                
            <tr style="background-color: rgb(10, 136, 161)">
                <td colspan="4" class="text-light">
                    <strong>
                        II. JENI CUTI YANG DIAMBIL **
                    </strong>
                </td>
            </tr>
            <tr>
                <td>1. Cuti Tahunan</td>
                <td style="text-align: center ; width : 200px">
                    @if ($item->jenis_cuti === "Cuti Tahunan")
                    <i class="fa fa-check"></i>
                    @else
                    -
                    @endif
                </td>
                <td>2. Cuti Besar</td>
                <td style="text-align: center ; width : 200px">
                    @if ($item->jenis_cuti === "Cuti Besar")
                    <i class="fa fa-check"></i>
                    @else
                    -
                    @endif
                </td>
            </tr>
            <tr>
                <td>3. Cuti Sakit</td>
                <td style="text-align: center">
                    @if ($item->jenis_cuti === "Cuti Sakit")
                    <i class="fa fa-check"></i>
                    @else
                    -
                    @endif
                </td>
                <td>4. Cuti Melahirkan</td>
                <td style="text-align: center">
                    @if ($item->jenis_cuti === "Cuti Melahirkan")
                    <i class="fa fa-check"></i>
                    @else
                    -
                    @endif
                </td>
            </tr>
            <tr>
                <td>5. Cuti Karena Alasan Penting</td>
                <td style="text-align: center">
                    @if ($item->jenis_cuti === "Cuti Karena Alasan Penting")
                    <i class="fa fa-check"></i>
                    @else
                    -
                    @endif
                </td>
                <td>6. Cuti Diluar Tanggungan Negara</td>
                <td style="text-align: center">
                    @if ($item->jenis_cuti === "Cuti Diluar Tanggungan Negara")
                    <i class="fa fa-check"></i>
                    @else
                    -
                    @endif
                </td>
            </tr>
    </table>
    <table class="table table-sm table-bordered border-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">

            <tr style="background-color: rgb(10, 136, 161)">
                <td colspan="6" class="text-light">
                    <strong>
                        III. ALASAN CUTI
                    </strong>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    {{ $item->alasan_cuti }}
                </td>
            </tr>
    </table>
    <table class="table table-sm table-bordered border-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
        
            <tr style="background-color: rgb(10, 136, 161)">
                <td colspan="6" class="text-light ">
                    <strong>
                        IV. LAMANYA CUTI
                    </strong>
                </td>
            </tr>
            <tr>
                <td style="text-align: center">
                    Selama 
                </td>
                <td style="text-align: center">
                    @if (($item->jlh_hari >= 20))
                        <b>1 (satu) bulan</b>
                    @else
                        <b>{{ $item->jlh_hari  }}</b>
                        (<strong>{{Riskihajar\Terbilang\Facades\Terbilang::make($item->jlh_hari)}}</strong>)
                        hari
                    @endif
                </td>
                <td style="text-align: center">
                    &nbsp;
                    Mulai tanggal
                </td>
                <td style="text-align: center" >
                    <strong>
                        {{ Carbon\Carbon::Parse($item->tgl_awal)->translatedFormat(' d F Y') }} 
                    </strong>
                </td>
                <td style="text-align: center" >
                    s.d
                </td>
                <td style="text-align: center" >
                    
                    <strong>
                        {{-- {{ Carbon\Carbon::Parse($item->tglmasuk)->translatedFormat(' d F Y') }}  --}}
                        {{-- {{ Carbon\Carbon::Parse($final)->translatedFormat(' d F Y') }}   --}}
                        {{-- {{ Carbon\Carbon::Parse($date2)->translatedFormat(' d F Y') }}   --}}
                        {{ Carbon\Carbon::Parse($akhir)->translatedFormat(' d F Y') }}  
                    </strong>
                </td>
            </tr>
                
    </table>
    <table class="table table-sm table-bordered border-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">

            <tr style="background-color: rgb(10, 136, 161)">
                <td colspan="5" class="text-light">
                    <strong>
                        V. CATATAN CUTI***
                    </strong>
                </td>
            </tr>
            <tr >
                <td colspan="2">1. CUTI TAHUNAN</td>
                <td style="text-align: center" >
                    @if ($item->jenis_cuti === "Cuti Tahunan")
                    <i class="fa fa-check"></i>
                    @else
                    -
                    @endif
                </td>
                <td>2. CUTI BESAR</td>
                <td style="text-align: center">
                    @if ($item->jenis_cuti === "Cuti Besar")
                    <i class="fa fa-check"></i>
                    @else
                    -
                    @endif
                </td>
            </tr>
            <tr>
                <td style="text-align:center"><strong> Tahun</strong></td>
                <td style="text-align:center"><strong> Sisa</strong></td>
                <td style="text-align:center"><strong>Keterangan</strong></td>
                <td>3. CUTI SAKIT</td>
                <td style="text-align: center">
                    @if ($item->jenis_cuti === "Cuti Sakit")
                    <i class="fa fa-check"></i>
                    @else
                    -
                    @endif
                </td>
            </tr>
            <tr>
                <td style="text-align:center">
                    N-2
                </td>
                <td style="text-align:center">
                    {{-- {{ $item->tahun_1 }} --}}
                    {{ Carbon\Carbon::Parse($item->tgl_awal)->format('Y')-2 }}
                </td>
                <td>
                    @if ($item->sisa_1 == 0)
                    &nbsp;Sisa : - hari
                    @else
                    &nbsp;Sisa : <strong> {{ $item->sisa_1 }}</strong> hari
                    @endif
                </td>
                <td>4. CUTI MELAHIRKAN</td>
                <td style="text-align: center"> 
                    @if ($item->jenis_cuti === "Cuti Melahirkan")
                    <i class="fa fa-check"></i>
                    @else
                    -
                    @endif
                </td>
            </tr>
            <tr>
                <td style="text-align:center">
                    N-1
                </td>
                <td style="text-align:center">
                    {{-- {{ $item->tahun_2 }} --}}
                    {{ Carbon\Carbon::Parse($item->tgl_awal)->format('Y')-1 }}
                </td>
                <td>
                    @if ($item->sisa_2 == 0)
                    &nbsp;Sisa : - hari
                    @else
                    &nbsp;Sisa : <strong> {{ $item->sisa_2 }}</strong> hari
                    @endif
                </td>
                <td>5. CUTI KARENA ALASAN PENTING</td>
                <td style="text-align: center">
                    @if ($item->jenis_cuti === "Cuti Karena Alasan Penting")
                    <i class="fa fa-check"></i>
                    @else
                    -
                    @endif
                </td>
            </tr>
            <tr>
                <td style="text-align:center">
                    N
                </td>
                <td style="text-align:center">
                    {{-- {{ $item->tahun_3 }} --}}
                    {{ Carbon\Carbon::Parse($item->tgl_awal)->format('Y') }}
                </td>
                <td>
                    @if ($item->sisa_3 == 0)
                    &nbsp;Sisa : - hari
                    @else
                    &nbsp;Sisa : <strong> {{ $item->sisa_3 }}</strong> hari
                    @endif
                </td>
                <td >6. CUTI DI LUAR TANGGUNGAN NEGARA</td>
                <td style="text-align: center; width:35%">
                    @if ($item->jenis_cuti === "Cuti Diluar Tanggungan Negara")
                    <i class="fa fa-check"></i>
                    @else
                    -
                    @endif
                </td>
            </tr>
    </table>
    <table class="table table-sm table-bordered border-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
        
            <tr style="background-color: rgb(10, 136, 161)">
                <td colspan="4" class="text-light">
                    <strong>
                        VI. ALAMAT SELAMA MENJALANKAN CUTI
                    </strong>
                </td>
            </tr>
            <tr>
                <td colspan="3" rowspan="2">
                    <br>
                    {{ $item->user->alamat }}
                </td>
                <td colspan="2" style="text-align: center">TELP. &nbsp;&nbsp; {{ $item->no_telp }}</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center ; width:35%">
                    <strong>
                        <div>
                            Hormat saya,
                            <br>
                            <br>
                            <br>
                            <br>
                            <u>
                                {{ $item->user->name }}
                            </u>
                            <br>
                            NIP. {{ $item->user->nip }}
                        </div>
                    </strong>
                </td>
            </tr>
    </table>
    <table class="table table-sm table-bordered border-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
    @endforeach
            <tr style="background-color: rgb(10, 136, 161)">
                <td colspan="4" class="text-light">
                    <strong>
                    VII. PERTIMBANGAN ATASAN LANGSUNG**
                    </strong>
                </td>
            </tr>
            <tr>
                <td colspan="3" >
                    <table>
                        <tr>
                            @include('cuti.validasikepsek')
                        </tr>
                    </table>
                </td>
                <td  rowspan="9" style="text-align: center; width:35%">
                    <strong>
                        <div>
                            Kepala Sekolah
                            <br>
                            SMK Negeri 1 Simpang Rimba
                            <br>
                            <br>
                            <br>
                            <br>
                            <u>
                                {{ $item->user->penilai->nama }}
                            </u>
                            <br>
                            {{ $item->user->penilai->pangkat_gol }}
                            <br>
                            NIP. {{ $item->user->penilai->nip }}
                        </div>
                    </strong>
                </td>
            </tr>

            <tr>
                <td colspan="3" rowspan="8">
                    Catatan ............
                </td>
            </tr><tr>
            </tr><tr>
            </tr><tr>
            </tr><tr>
            </tr><tr>
            </tr><tr>
            </tr><tr>
            </tr><tr>
    </table>
    <table class="table table-sm table-bordered border-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
    
            <tr style="background-color: rgb(10, 136, 161)">
                <td colspan="4" class="text-light">
                    <strong>
                        VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI**
                    </strong>
                </td>
            </tr>
            <tr>
                <td colspan="3" >
                    <table>
                        <tr>
                            @include('cuti.validasicabdin')
                        </tr>
                    </table>
                </td>
                <td  rowspan="9" style="text-align: center; width:35%">
                    <strong>
                        <div>
                            Kepala Cabang Dinas Wilayah III
                            <br>
                            Dinas Pendidikan Prov. Kep. Babel
                            <br>
                            <br>
                            <br>
                            <br>
                            <u>
                                {{ $item->user->atasan->nama }}
                            </u>
                            <br>
                            {{ $item->user->atasan->pangkat_gol }}
                            <br>
                            NIP. {{ $item->user->atasan->nip }}
                        </div>
                    </strong>
                </td>
            </tr>

            <tr>
                <td colspan="3" rowspan="8">
                    Catatan ............
                </td>
            
            </tr><tr>
            </tr><tr>
            </tr><tr>
            </tr><tr>
            </tr><tr>
            </tr><tr>
            </tr><tr>
            </tr><tr>
    </table>
    </tbody>
</div>
@endsection