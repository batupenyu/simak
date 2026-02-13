<!DOCTYPE html>
<html>
<head>
    <title>Generate PDF using Laravel TCPDF - ItSolutionStuff.com</title>
</head>
<body>
    {{-- <h1 style="color:red;">{!! $title !!}</h1> --}}
    
    <table border="0.5">
        @foreach ($cuti as $item)
        <tr>
            <td colspan="4" align="center">
                <b>FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</b>
                <br>
                @if ($item->no_surat == "")
                Nomor : 850/........./Cabdindik wil III/{{ Carbon\Carbon::Parse($item->tgl_awal)->format('Y') }} 
                @else
                Nomor : 850/ {{ $item->no_surat }}/Cabdindik wil III/{{ Carbon\Carbon::Parse($item->tgl_awal)->format('Y') }} 
                @endif
            </td>
        </tr>
        <tr style="background-color: rgb(120, 125, 125)">
            <td colspan="4" class="text-light" >
                <strong>
                    I. DATA PEGAWAI
                </strong>
            </td>
        </tr>
        <tr>
            <td> Nama</td>
            <td> {{ $item->user->name }}</td>
            <td> NIP</td>
            <td> {{ $item->user->nip }}</td>
        </tr>
        <tr>
            <td> Jabatan</td>
            <td> {{ $item->user->jabatan }}</td>
            <td> Masa Kerja</td>
            <td> {{ \Carbon\Carbon::parse( $item->user->tmt_pangkat)->diff(\Carbon\Carbon::now())->format('%y tahun, %m bulan')}}</td>
        </tr>
        <tr>
            <td> Unit Kerja</td>
            <td> {{ $item->user->unit_kerja}}</td>
            <td> Pangkat/Gol.</td>
            <td padding left="20"> {{ $item->user->pangkat_gol}}</td>
        </tr>
        
        @endforeach
    </table>
    <table>
        
        <tr nobr = "true">
            <td> </td>
        </tr>
    </table>
    <table border="0.5">
        @foreach ($cuti as $item)
        <tr style="background-color: rgb(120, 125, 125)">
            <td colspan="4" class="text-light">
                <strong>
                    II. JENI CUTI YANG DIAMBIL **
                </strong>
            </td>
        </tr>
        <tr>
            <td style="width: 175px"> 
                <ol start = "1">
                    <li>Cuti Tahunan</li>
                </ol>
            </td>
            <td style="text-align: center; width:90px ">
                @if ($item->jenis_cuti === "Cuti Tahunan")
                    <span style="font-family:zapfdingbats;">4</span>
                    {{-- <input type="checkbox" name="agree" value="1" checked="checked" readonly="true" />  --}}
                @else
                -
                @endif
            </td>
            <td style="width: 175px"> 
                <ol start = "4">
                    <li>Cuti Besar</li>
                </ol>
            </td>
            <td style="text-align: center; width:94px">
                @if ($item->jenis_cuti === "Cuti Besar")
                    <span style="font-family:zapfdingbats;">4</span>
                @else
                -
                @endif
            </td>
        </tr>
        <tr>
            <td> 
                <ol start = "2">
                    <li>Cuti Sakit</li>
                </ol>
            </td>
            <td style="text-align: center">
                @if ($item->jenis_cuti === "Cuti Sakit")
                    <span style="font-family:zapfdingbats;">4</span>
                @else
                -
                @endif
            </td>
            <td> 
                <ol start = "5">
                    <li>Cuti Melahirkan</li>
                </ol>
            </td>
            <td style="text-align: center">
                @if ($item->jenis_cuti === "Cuti Melahirkan")
                    <span style="font-family:zapfdingbats;">4</span>
                @else
                -
                @endif
            </td>
        </tr>
        <tr>
            <td> 
                <ol start = "3">
                    <li>Cuti karena alasan penting</li>
                </ol>
            </td>
            <td style="text-align: center">
                @if ($item->jenis_cuti === "Cuti Karena Alasan Penting")
                    <span style="font-family:zapfdingbats;">4</span>
                @else
                -
                @endif
            </td>
            <td> 
                <ol start = "6">
                    <li>Cuti diluar tanggungan negara</li>
                </ol>
            </td>
            <td style="text-align: center">
                @if ($item->jenis_cuti === "Cuti Diluar Tanggungan Negara")
                    <span style="font-family:zapfdingbats;">4</span>
                @else
                -
                @endif
            </td>
        </tr>
    </table>
        <tr nobr = "true">
            <td> </td>
        </tr>
    <table border="0.5">
        <tr style="background-color: rgb(120, 125, 125)">
            <td colspan="4" class="text-light">
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
        <tr nobr = "true">
            <td> </td>
        </tr>
    <table border="0.5">
        <tr style="background-color: rgb(120, 125, 125)">
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
            <td style="text-align: center; width:130px">
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
                    {{ Carbon\Carbon::Parse($item->tgl_awal)->translatedFormat(' d/m/Y') }} 
                </strong>
            </td>
            <td style="text-align: center; width:48px" >
                s.d
            </td>
            <td style="text-align: center" >
                
                <strong>
                    {{-- {{ Carbon\Carbon::Parse($item->tglmasuk)->translatedFormat(' d F Y') }}  --}}
                    {{-- {{ Carbon\Carbon::Parse($final)->translatedFormat(' d F Y') }}   --}}
                    {{-- {{ Carbon\Carbon::Parse($date2)->translatedFormat(' d F Y') }}   --}}
                    {{ Carbon\Carbon::Parse($akhir)->translatedFormat(' d/m/Y') }}  
                </strong>
            </td>
        </tr>
    </table>
        <tr nobr = "true">
            <td> </td>
        </tr>
    <table border="0.5">
        <tr style="background-color: rgb(120, 125, 125)">
            <td colspan="5" class="text-light">
                <strong>
                    V. CATATAN CUTI***
                </strong>
            </td>
        </tr>
        <tr >
            <td colspan="2" style="width: 100px"> <ol><li>Cuti Tahunan</li></ol></td>
            <td style="text-align: center" >
                @if ($item->jenis_cuti === "Cuti Tahunan")
                <span style="font-family:zapfdingbats;">4</span>
                @else
                -
                @endif
            </td>
            <td style="width: 220px"><ol start="2"><li>Cuti Besar</li></ol></td>
            <td style="text-align: center">
                @if ($item->jenis_cuti === "Cuti Besar")
                <span style="font-family:zapfdingbats;">4</span>
                @else
                -
                @endif
            </td>
        </tr>
        <tr>
            <td style="text-align:center"><strong> Tahun</strong></td>
            <td style="text-align:center"><strong> Sisa</strong></td>
            <td style="text-align:center"><strong>Keterangan</strong></td>
            <td><ol start="3"><li>Cuti Sakit</li></ol></td>
            <td style="text-align: center">
                @if ($item->jenis_cuti === "Cuti Sakit")
                <span style="font-family:zapfdingbats;">4</span>
                @else
                -
                @endif
            </td>
        </tr>
        <tr>
            <td style="text-align:center ">
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
            <td><ol start="4"><li>Cuti Melahirkan</li></ol></td>
            <td style="text-align: center"> 
                @if ($item->jenis_cuti === "Cuti Melahirkan")
                <span style="font-family:zapfdingbats;">4</span>
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
            <td><ol start="5"><li>Cuti Karena Alasan Penting</li></ol></td>
            <td style="text-align: center">
                @if ($item->jenis_cuti === "Cuti Karena Alasan Penting")
                <span style="font-family:zapfdingbats;">4</span>
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
            <td> <ol start="6">
                <li>Cuti Diluar Tanggungan Negara</li></ol></td>
            <td style="text-align: center">
                @if ($item->jenis_cuti === "Cuti Diluar Tanggungan Negara")
                <span style="font-family:zapfdingbats;">4</span>
                @else
                -
                @endif
            </td>
        </tr>
    </table>
        <tr nobr = "true">
            <td> </td>
        </tr>
    <table border="0.5" cellpadding="5" >
        {{-- <td bgcolor="#0000FF" color="yellow" align="center">A2 € &euro; &#8364; &amp; è &egrave;</td> --}}
        <tr style="background-color: rgb(120, 125, 125)">
            <td colspan="3" class="text-light"><strong>VI. ALAMAT SELAMA MENJALANKAN CUTI</strong></td>
        </tr>
        <tr>
            <td  style="width:65%" colspan="3" rowspan="2">{{ $item->user->alamat }}</td>
            <td style="width:35%" colspan="2" style="text-align: center">TELP. &nbsp;&nbsp; {{ $item->no_telp }}</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <strong>
                    <div>
                        Hormat saya,
                        <br>
                        <br>
                        <br>
                        <br>
                        <u>{{ $item->user->name }}</u>
                        <br>
                        NIP. {{ $item->user->nip }}
                    </div>
                </strong>
            </td>
        </tr>
    </table>
        <tr nobr = "true">
            <td> </td>
        </tr>
    <table border="0.5">
        <tr style="background-color: rgb(120, 125, 125)">
            <td colspan="2" class="text-light"><strong> VII. PERTIMBANGAN ATASAN LANGSUNG**</strong></td>
        </tr>
        <tr>
            <td style="width: 65%">
                <table>
                    <tr>
                            <td><input type="checkbox" name="agree" value="1" checked="checked" readonly="true" /><span style="font-family:zapfdingbats;">4</span>DISETUJUI</td>
                            <td><input type="checkbox" name="feature1" value="0"> PERUBAHAN</td>
                            <td><input type="checkbox" name="feature1" value="0"> DITANGGUHKAN</td>
                            <td><input type="checkbox" name="feature1" value="0"> TIDAK DISETUJUI</td>
                    </tr>
                </table>
            </td>
            <td  rowspan="9" style="text-align: center; width:35%">
            <strong>
                <div>
                    Kepala Sekolah
                    <br>
                    {{ optional($user->penilai)->unit_kerja ?? '' }}
                    <br>
                    <br>
                    <br>
                    <br>
                    <u>{{ optional($user->penilai)->nama ?? '' }}</u>
                    <br>
                    {{ optional($user->penilai)->pangkat_gol ?? '' }}
                    <br>
                    {{ optional($user->penilai)->nip ?? '' }}
                </div>
            </strong>
            </td>
        </tr>
    </table>
        <tr nobr = "true">
            <td> </td>
        </tr>
    <table border="0.5">
        <tr style="background-color: rgb(120, 125, 125)">
            <td colspan="2" class="text-light"><strong> VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI**</strong></td>
        </tr>
        <tr>
            <td style="width: 65%">
                <table>
                    <tr>
                            <td><input type="checkbox" name="feature1" value="0"> DISETUJUI</td>
                            <td><input type="checkbox" name="feature1" value="0"> PERUBAHAN</td>
                            <td><input type="checkbox" name="feature1" value="0"> DITANGGUHKAN</td>
                            <td><input type="checkbox" name="feature1" value="0"> TIDAK DISETUJUI</td>
                    </tr>
                </table>
            </td>
            <td  rowspan="9" style="text-align: center; width:35%">
            <strong>
                <div>
                    {{ optional($user->atasan)->unit_kerja ?? '' }}
                    <br>
                    Dinas Pendidikan Prov. Kep. Babel <br>
                    {{ optional($user->atasan)->jabatan ?? '' }}
                    <br>
                    <br>
                    <br>
                    <br>
                    {{ optional($user->atasan)->nama ?? '' }}
                    <br>
                    {{ optional($user->atasan)->pangkat_gol ?? '' }}
                    <br>
                    {{ optional($user->atasan)->nip ?? '' }}
                </div>
            </strong>
            </td>
        </tr>
    </table>
@endforeach
</body>
</html>