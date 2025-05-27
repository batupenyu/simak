<p style="text-align: center">
    @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
        SASARAN KINERJA PEGAWAI PEJABAT FUNGSIONAL <br>
        {{ $user->jabatan }} <br>
        PENDEKATAN HASIL KERJA KUANTITATIF 
    @else
        SASARAN KINERJA PEGAWAI<br>
    @endif
</p>
<table border="0" cellpadding="2">
<tr>
    <td>NAMA INSTANSI :<br>{{$user->unit_kerja }}
    </td>
    <td style="text-align: right">
        PERIODE PENILAIAN : <br> 
        {{ Carbon\Carbon::parse($user->tgl_awal)->translatedFormat('d F Y ') }} 
        s.d 
        {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }} 
    </td>
</tr>
</table>
<tr nobr='true'>
    <td></td>
</tr>
<table border="1" cellpadding="2">
    <tr>
        <th style="text-align: center; width:30px"><b>NO</b></th>
        <th style="text-align: center; width:335px" colspan="2"><b>PEGAWAI YANG DINILAI</b></th>
        <th style="text-align: center; width:30px"><b>NO</b></th>
        <th style="text-align: center; width:335px" colspan="2"><b>PEJABAT PENILAI KINERJA</b></th>
    </tr>
    <tr>
        <td style="text-align: center">1</td>
        <td style="width: 120px">NAMA</td>
        @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
            <td style="width: 215px">{{ $user->name }}</td>
        @else
            <td style="width: 215px">{{ $user->name }}</td>
        @endif
        <td style="text-align: center">1</td>
        <td style="width: 120px">NAMA</td>
        <td style="width: 215px" >{{ $user->penilai ->nama }}</td>
    </tr>
    <tr>
        <td style="text-align: center">2</td>
        <td>NIP</td>
        <td>{{ $user ->nip }}</td>
        <td style="text-align: center">2</td>
        <td>NIP</td>
        <td>{{ $user->penilai ->nip }}</td>
    </tr>
    <tr>
        <td style="text-align: center">3</td>
        <td>PANGKAT/GOL RUANG</td>
        <td>{{ $user ->pangkat_gol }}</td>
        <td style="text-align: center">3</td>
        <td>PANGKAT/GOL RUANG</td>
        <td>{{ $user->penilai ->pangkat_gol }}</td>
    </tr>
    <tr>
        <td style="text-align: center">4</td>
        <td>JABATAN</td>
        <td>{{ $user ->jabatan }}</td>
        <td style="text-align: center">4</td>
        <td>JABATAN</td>
        <td>{{ $user->penilai ->jabatan }}</td>
    </tr>
    <tr>
        <td style="text-align: center">5</td>
        <td>UNIT KERJA</td>
        <td>{{ $user ->unit_kerja }}</td>
        <td style="text-align: center">5</td>
        <td>UNIT KERJA</td>
        <td>{{ $user->penilai ->unit_kerja }}</td>
    </tr>
</table>
<tr nobr='true'>
    <td></td>
</tr>
<table border="1" cellpadding="2">
    <tr style="overflow-x: auto ">
        <th style="text-align: center; width:30px">No</th>
        <th style="text-align: center">Rencana Hasil Kerja Atasan Yang Diintervensi</th>
        <th style="text-align: center; width:215px">Rencana Hasil Kerja</th>
        <th colspan="3">
            <table border="0" cellpadding="2">
                <tr>
                    <td style=" text-align:center">Aspek</td>
                    <td style=" text-align:center; width:30px"></td>
                    <td style=" text-align:center; width:150px">Indikator Kinerja</td>
                    <td style=" text-align:center">Target</td>
                </tr>
            </table>
        </th>
    </tr>
    @foreach ($user->tugas as $data)
    <tr>
        <td style="text-align: center;" >{{ $loop->iteration }} </td>
        <td>{{ $data->name }} <br></td>
        <td>{{ $data->name }} <br></td>
        <td colspan="3"> 
            @foreach ($data->tupoksi as $item)
            <table border="0" cellpadding="2">
                <tr>
                    <td>{{ $item->aspek }} </td>
                    <td style="text-align:center; width:30px">:</td>
                    <td style="width:150px">{{ $item->indikator }} <br></td>
                    <td style="text-align: center">{{ $item->target }} </td>
                </tr>
            </table>
            @endforeach
        </td>
    </tr>
    @endforeach 

    @foreach ($user->tutam as $data)
    <tr>
        <th colspan="8">Tambahan</th>
    </tr>
    <tr>
        <td style="text-align: center;" >{{ $loop->iteration }} </td>
        <td>{{ $data->rk->name }}</td>
        <td>{{ $data->name }} <br></td>
        <td style="vertical-align:text-top" colspan="3"> 
            @foreach ($data->tuti as $item)
            <table border="0" cellpadding="2">
                <tr>
                    <td>{{ $item->aspek }} </td>
                    <td style="text-align:center; width:30px">:</td>
                    <td style="width: 150px">{{ $item->indikator }} <br></td>
                    <td style="text-align: center">{{ $item->target }} </td>
                </tr>
            </table>
            @endforeach
        </td>
        {{-- <td style="vertical-align:text-top" colspan="3"> 
            @foreach ($data->tuti as $item)
            <table border="1" cellpadding="2">
                <tr>
                    <td>{{ $item->aspek }}</td>
                    <td>:</td>
                    <td>{{ $item->indikator }} <br></td>
                    <td>{{ $item->target }} </td>
                </tr>
            </table>
            @endforeach
        </td> --}}
    </tr>
    @endforeach
</table>
<tr nobr='true'>
    <td></td>
</tr>
<table border="1" cellpadding="2">
    <tr>
        <td style="text-align: center; width:30px" rowspan="2">1 </td>
        <td style="width: 700px" colspan="2">Berorientasi Pelayanan </td>
    </tr>
    <tr>
        <td>
            <ol style="margin-bottom: 0">
                <li>Memahami dan memenuhi kebutuhan masyarakat
                </li>
                <li>Ramah, cekatan, solutif, dan dapat diandalkan
                </li>
                <li>Melakukan perbaikan tiada henti
                </li>
            </ol>
        </td>
        <td>Ekspektasi Khusus Pimpinan:<br>
            {{ $user->eks->eks1 }} <br>
        </td>
    </tr>
    
    <tr>
        <td style="text-align: center" rowspan="2">2 </td>
        <td colspan="2">Akuntabel </td>
    </tr>
    <tr>
        <td>
            <ol style="margin-bottom: 0">
                <li>Melaksanakan tugas dengan jujur bertanggung jawab cermat disiplin dan berintegritas tinggi
                </li>
                <li>Menggunakan kekayaan dan BMN secara bertanggung jawab efektif dan efisien
                </li>
                <li>Tidak menyalahgunakan kewenangan jabatan
                </li>
            </ol>
        </td>
        <td>Ekspektasi Khusus Pimpinan:<br>
            {{ $user->eks->eks2 }} <br>
        </td>
    </tr>
    <tr>
        <td style="text-align: center" rowspan="2">3 </td>
        <td colspan="2">Kompeten </td>
    </tr>
    <tr>
        <td>
            <ol style="margin-bottom: 0">
                <li>Meningkatkan kompetensi diri untuk menjawab tantangan yang selalu berubah
                </li>
                <li>Membantu orang lain belajar
                </li>
                <li>Melaksanakan tugas dengan kualitas terbaik</li>
            </ol>
        </td>
        <td>
            Ekspektasi Khusus Pimpinan:
            <br>
            {{ $user->eks->eks3 }} <br>
        </td>
    </tr>
    <tr>
        <td style="text-align: center" rowspan="2">
            4 </td>
        <td colspan="2">
            Harmonis </td>
    </tr>
    <tr>
        <td>
            <ol style="margin-bottom: 0">
                <li>Menghargai setiap orang apapun latar belakangnya
                </li>
                <li>Suka menolong orang lain
                </li>
                <li>Membangun lingkungan kerja yang kondusif</li>
            </ol>
        </td>
        <td>
            Ekspektasi Khusus Pimpinan:
            <br>
            {{ $user->eks->eks4 }} <br>
        </td>
    </tr>
    <tr>
        <td style="text-align: center" rowspan="2">
            5 </td>
        <td colspan="2">
            Loyal </td>
    </tr>
    <tr>
        <td>
            <ol style="margin-bottom: 0">
                <li>Memegang teguh ideologi Pancasila, Undang-Undang Dasar Negara Republik Indonesia Tahun 1945, setia pada NKRI serta pemerintahan yang sah
                </li>
                <li>Menjaga nama baik sesama ASN, Pimpinan, Instansi, dan Negara
                </li>
                <li>Menjaga rahasia jabatan dan negara</li>
            </ol>
        </td>
        <td>
            Ekspektasi Khusus Pimpinan:
            <br>
            {{ $user->eks->eks5 }} <br>
        </td>
    </tr>
    <tr>
        <td style="text-align: center" rowspan="2">
            6 </td>
        <td colspan="2">
            Adaptif </td>
    </tr>
    <tr>
        <td>
            <ol style="margin-bottom: 0">
                <li>Cepat menyesuaikan diri menghadapi perubahan
                </li>
                <li>Terus berinovasi dan mengembangkan kreativitas
                </li>
                <li>Bertindak proaktif</li>
            </ol>
        </td>
        <td>
            Ekspektasi Khusus Pimpinan:
            <br>
            {{ $user->eks->eks6 }} <br>
        </td>
    </tr>
    <tr>
        <td style="text-align: center" rowspan="2">
            7 </td>
        <td colspan="2">
            Kolaboratif </td>
    </tr>
    <tr>
        <td>
            <ol style="margin-bottom: 0">
                <li>Memberi kesempatan kepada berbagai pihak untuk berkontribusi
                </li>
                <li>Terbuka dalam bekerjasama untuk menghasilkan nilai tambah
                </li>
                <li>Menggerakkan pemanfaatan berbagai sumber daya untuk tujuan bersama</li>
            </ol>
        </td>
        <td>
            Ekspektasi Khusus Pimpinan:
            <br>
            {{ $user->eks->eks7 }} <br>
        </td>
    </tr>
</table>
<tr nobr='true'>
    <td></td>
</tr>
<table border="1">
    <tr>
        <td >
            Dukungan Sumber Daya 
            @foreach ($user->sdm as $item)
                - {{ $item->sdm }} 
            @endforeach
            </td>
        </tr>
        <tr>
            <td >
                Skema Pertanggungjawaban 
                    @foreach ($user->skema as $item)
                        - {{ $item->skema }} 
                    @endforeach
                </td>
            </tr>
            <tr>
                <td >
                    Konsekuensi 
                    @foreach ($user->kon as $item)
                        - {{ $item->kon }}
                    @endforeach
                </td>
    </tr>
</table>
<table>
    <tr nobr="true">
        <td></td>
        <td></td>
    </tr>
</table>
<table>
    <tr nobr="true" style="text-align: center">
        <td>&nbsp;
            @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
                PEGAWAI YANG DINILAI <br><br><br>
                {{ $user ->name }} <br>
                NIP.{{ $user ->nip }}
            @else
            &nbsp;
                PEGAWAI YANG DINILAI <br><br><br>
                {{ $user ->name }} <br>
                NIP.{{ $user ->nip }}
            @endif
        </td>
        <td>
            @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
                Pangkalpinang, {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }} 
                <br>
                <br>
                PEJABAT PENILAI KINERJA <br><br><br>
                {{ $user->penilai ->nama }} <br>
                NIP.{{ $user->penilai ->nip }}
                @else
                Simpang Rimba, {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }} 
                <br><br>
                PEJABAT PENILAI KINERJA <br><br><br>
                {{ $user->penilai ->nama }} <br>
                NIP.{{ $user->penilai ->nip }}
            @endif
        </td>
    </tr>
</table>
