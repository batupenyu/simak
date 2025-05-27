@extends('layout.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">

<div class="container-xl container-fluid mt-5">
    <div class="col-6 float-end">
        <b>
            LAMPIRAN II <br>
            PERATURAN BADAN KEPEGAWAIAN  NEGARA <br>
            REPUBLIK INDONESIA <br>
            NOMOR 7 TAHUN 2022 <br>
            TENTANG <br>
            TATA CARA PEMBERIAN CUTI PEGAWAI PEMERINTAH  <br>
            DENGAN PERJANJIAN KERJA. <br><br>
        </b>
    </div>
    <table class="table table-sm table-borderless border-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
        <tr>
            <td style="text-align: center">
                Formulir Permintaan dan Pemberian Cuti Pegawai Pemerintah Dengan perjanjian Kerja  
            </td>
        </tr>
        <tr>
            <td class="float-end">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpang Rimba,
                @foreach ($cuti as $item)
                {{-- ...........................{{ Carbon\Carbon::Parse($item->tgl_awal)->format('Y') }}  --}}
                {{ Carbon\Carbon::Parse($item->tgl_surat)->translatedFormat(' d F Y') }} 
                @endforeach
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepada, <br>
                Yth.&nbsp;&nbsp;Kepala Cabang Dinas Wilayah III <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dinas Pendidikan Prov. Kep. Bangka Belitung  <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;di <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Toboali <br>
            </td>
        </tr>
    </table>
    <table class="table table-sm table-bordered border-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
        <thead>
            <tr>
                <th colspan="6" style="text-align: center">
                    <button onclick="window.print();" class="btn btn-sm btn-primary tampil float-end">Cetak</button>
                    @foreach ($cuti as $item)
                    <button class="btn btn-sm btn-outline-warning tampil float-end"">
                        <a href="{{ url('cuti.edit/'.$item->id) }}"><i class="fa fa-edit "></i> </a> 
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
                <td style="padding-left: 17px"  >{{ $item->user->nip}}</td>
            </tr>
            <tr>
                <td><strong>Jabatan</strong></td>
                <td>{{ $item->user->jabatan}}</td>
                <td><strong>Masa Kerja</strong></td>
                <td style="padding-left: 17px" >
                    {{ \Carbon\Carbon::parse( $item->user->tmt_pangkat)->diff(\Carbon\Carbon::now())->format('%y tahun, %m bulan')}}
                </td>
            </tr>
            <tr>
                <td><strong>Unit Kerja</strong></td>
                <td>{{ $item->user->unit_kerja}}</td>
                <td><strong>Pangkat/Gol.</strong></td>
                <td style="padding-left: 17px"  >{{ $item->user->pangkat_gol}}</td>
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
                <td style="text-align: center ; width : 50%">
                    @if ($item->jenis_cuti === "Cuti Tahunan")
                    <i class="fa fa-check"></i>
                    @else
                    -
                    @endif
                </td>
            </tr>
            <tr>
                <td>2. Cuti Sakit</td>
                <td style="text-align: center">
                    @if ($item->jenis_cuti === "Cuti Sakit")
                    <i class="fa fa-check"></i>
                    @else
                    -
                    @endif
                </td>
            </tr>
            <tr>
                <td>3. Cuti  Melahirkan</td>
                <td style="text-align: center">
                    @if ($item->jenis_cuti === "Cuti Melahirkan")
                    <i class="fa fa-check"></i>
                    @else
                    -
                    @endif
                </td>
            </tr>
    </table>
    <table class="table table-sm table-bordered border-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">

            <tr style="background-color: rgb(10, 136, 161)">
                <td class="text-light">
                    <strong>
                        III. ALASAN CUTI
                    </strong>
                </td>
            </tr>
            <tr>
                <td style="height: 30px">
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
                    <strong>
                        @if ($item->jenis_cuti == "Cuti Melahirkan")
                            3 bulan
                        @else
                            {{ $item->jlh_hari }} 
                            ({{Riskihajar\Terbilang\Facades\Terbilang::make($item->jlh_hari)}})
                            hari
                        @endif
                    </strong>
                    {{-- <strong>
                    <?php 
                        $formatted_dt1 = Carbon\Carbon::Parse($item->tgl_awal);
                        $formatted_dt2 = Carbon\Carbon::Parse($item->tglmasuk);
                        $date_diff = $formatted_dt1->diffInDays($formatted_dt2);
                    ?>
                        {{ $date_diff + 1 }}
                        ({{Riskihajar\Terbilang\Facades\Terbilang::make($date_diff + 1)}}) hari
                    </strong> --}}
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
                        {{ Carbon\Carbon::Parse($item->tgl_akhir)->translatedFormat(' d F Y') }} 
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
            <tr>
                <td style="text-align:center"><strong> Tahun</strong></td>
                <td style="text-align:center"><strong> Sisa</strong></td>
                <td style="text-align:center"><strong>Keterangan</strong></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="text-align:center">
                    N-2
                </td>
                <td style="text-align:center">
                    {{ Carbon\Carbon::Parse($item->tgl_awal)->format('Y')-2 }}
                </td>
                <td>
                    @if ($item->sisa_1 == 0)
                    &nbsp;Sisa : - hari
                    @else
                    &nbsp;Sisa : <strong> {{ $item->sisa_1 }}</strong> hari 
                    @endif
                </td>
                <td>1. CUTI TAHUNAN</td>
                <td style="text-align: center"> 
                    @if ($item->jenis_cuti === "Cuti Tahunan")
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
                    {{ Carbon\Carbon::Parse($item->tgl_awal)->format('Y')-1 }}
                </td>
                <td>
                    @if ($item->sisa_2 == 0)
                    &nbsp;Sisa : - hari
                    @else
                    &nbsp;Sisa : <strong> {{ $item->sisa_2 }}</strong> hari, 
                    diambil <b>  {{ $item->jlh_hari }} </b> sisa
                    <b>
                    {{ ($item['sisa_2'] -$item['jlh_hari'])}} hari
                    </b> 
                    @endif
                </td>
                <td>2. CUTI SAKIT</td>
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
                    N
                </td>
                <td style="text-align:center">
                    {{ Carbon\Carbon::Parse($item->tgl_awal)->format('Y') }}
                </td>
                <td>
                    @if ($item->sisa_3 == 0)
                    &nbsp;Sisa : - hari
                    @else
                    &nbsp;Sisa : <strong> {{ $item->sisa_3 }}</strong> hari
                    @endif
                </td>
                <td >3. CUTI MELAHIRKAN</td>
                <td style="text-align: center; width:35%">
                    @if ($item->jenis_cuti === "Cuti Melahirkan")
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
                            <td style="text-align: center" >
                                <button type="button" value="ok" class="btn btn-outline-dark" ><i class="fa fa-check" ></i></button>
                                <span>DISETUJUI</span>
                                &nbsp;
                                &nbsp;
                            </td>
                            <td style="text-align: center" >
                                <button type="button" class="btn btn-outline-dark">
                                    <span class="badge badge-sm badge-light">  </span>
                                </button>
                                <span>PERUBAHAN</span>
                                &nbsp;
                                &nbsp;
                            </td>
                            <td style="text-align: center" >
                                <button type="button" class="btn btn-outline-dark">
                                    <span class="badge badge-sm badge-light">  </span>
                                </button>
                                <span>DITANGGUHKAN</span>
                                &nbsp;
                                &nbsp;
                            </td>
                            <td style="text-align: center" >
                                <button type="button" class="btn btn-outline-dark">
                                    <span class="badge badge-sm badge-light">  </span>
                                </button>
                                <span>TIDAK DISETUJUI</span>
                            </td>
                        </tr>
                    </table>
                </td>
                <td  rowspan="9" style="text-align: center; width:35%">
                    <strong>
                        <div>
                            {{ $item->user->penilai->jabatan }}
                            <br>
                            {{ $item->user->penilai->unit_kerja }}
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
                            <td style="text-align: center" >
                                <button type="button" class="btn btn-outline-dark">
                                    <span class="badge badge-sm badge-light">  </span>
                                </button>
                                <span>DISETUJUI</span>
                                &nbsp;
                                &nbsp;
                            </td>
                            <td style="text-align: center" >
                                <button type="button" class="btn btn-outline-dark">
                                    <span class="badge badge-sm badge-light">  </span>
                                </button>
                                <span>PERUBAHAN</span>
                                &nbsp;
                                &nbsp;
                            </td>
                            <td style="text-align: center" >
                                <button type="button" class="btn btn-outline-dark">
                                    <span class="badge badge-sm badge-light">  </span>
                                </button>
                                <span>DITANGGUHKAN</span>
                                &nbsp;
                                &nbsp;
                            </td>
                            <td style="text-align: center" >
                                <button type="button" class="btn btn-outline-dark">
                                    <span class="badge badge-sm badge-light">  </span>
                                </button>
                                <span>TIDAK DISETUJUI</span>
                            </td>
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