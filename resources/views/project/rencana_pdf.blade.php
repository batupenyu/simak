<style>
    body {
        margin: 0;
        padding: 20px;
        font-family: Arial, sans-serif;
    }

    .page-break {
        page-break-before: always;
    }

    .page-break-after {
        page-break-after: always;
    }

    .avoid-page-break {
        page-break-inside: avoid;
    }

    table {
        page-break-inside: avoid;
    }

    tr {
        page-break-inside: avoid;
        page-break-after: avoid;
    }

    thead {
        display: table-header-group;
    }

    tfoot {
        display: table-footer-group;
    }
    
    /* Custom style to remove left and right borders from colon columns */
    .colon-column {
        border-left: none !important;
        border-right: none !important;
        border-top: 1px solid #000 !important;
        border-bottom: 1px solid #000 !important;
    }
</style>

<h4 style="text-align:center">SASARAN KINERJA PEGAWAI PEJABAT FUNGSIONAL <br>
    PENDEKATAN HASIL KERJA KUANTITATIF
</h4> 
<br><br><br>


<table style="width: 100%;">
    <tr>
        <td style="width: 50%; text-align: left;">Nama Instansi : {{ $user->unit_kerja }}</td>
        <td style="width: 50%; text-align: right;">Periode Penilaian : {{ Carbon\Carbon::parse($user->tgl_awal)->translatedFormat('d F Y ') }} s.d {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }}</td>
    </tr>
</table>

<table class="table table-sm mt-2" style="width: 100%; border-collapse: collapse; border: 1px solid #000;">
    <tr>
        <th style="border: 1px solid #000; padding: 4px; text-align: center;">NO</th>
        <th style="border: 1px solid #000; padding: 4px;" colspan="3">PEGAWAI YANG DINILAI</th>
        <th style="border: 1px solid #000; padding: 4px; text-align: center;">NO</th>
        <th style="border: 1px solid #000; padding: 4px;" colspan="3">PEJABAT PENILAI KINERJA</th>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 4px; text-align: center;">1.</td>
        <td style="border: 1px solid #000; border-right: none; padding: 4px;">NAMA</td>
        <td style="border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 4px; width: 20px; text-align: center;">:</td>
        <td style="border: 1px solid #000; border-left: none; padding: 4px;">{{ $user->name }}</td>
        <td style="border: 1px solid #000; padding: 4px; text-align: center;">1.</td>
        <td style="border: 1px solid #000; border-right: none; padding: 4px;">NAMA</td>
        <td style="border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 4px; width: 20px; text-align: center;">:</td>
        <td style="border: 1px solid #000; border-left: none; padding: 4px;">{{ $user->penilai ? $user->penilai->nama : '' }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 4px; text-align: center;">2.</td>
        <td style="border: 1px solid #000; border-right: none; padding: 4px;">NIP</td>
        <td style="border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 4px; width: 20px; text-align: center;">:</td>
        <td style="border: 1px solid #000; border-left: none; padding: 4px;">{{ $user->nip }}</td>
        <td style="border: 1px solid #000; padding: 4px; text-align: center;">2.</td>
        <td style="border: 1px solid #000; border-right: none; padding: 4px;">NIP</td>
        <td style="border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 4px; width: 20px; text-align: center;">:</td>
        <td style="border: 1px solid #000; border-left: none; padding: 4px;">{{ $user->penilai ? $user->penilai->nip : '' }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 4px; text-align: center;">3.</td>
        <td style="border: 1px solid #000; border-right: none; padding: 4px;">PANGKAT/GOL</td>
        <td style="border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 4px; width: 20px; text-align: center;">:</td>
        <td style="border: 1px solid #000; border-left: none; padding: 4px;">{{ $user->pangkat_gol }}</td>
        <td style="border: 1px solid #000; padding: 4px; text-align: center;">3.</td>
        <td style="border: 1px solid #000; border-right: none; padding: 4px;">PANGKAT/GOL</td>
        <td style="border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 4px; width: 20px; text-align: center;">:</td>
        <td style="border: 1px solid #000; border-left: none; padding: 4px;">{{ optional($user->penilai)->pangkat_gol ?? '' }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 4px; text-align: center;">4.</td>
        <td style="border: 1px solid #000; border-right: none; padding: 4px;">JABATAN</td>
        <td style="border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 4px; width: 20px; text-align: center;">:</td>
        <td style="border: 1px solid #000; border-left: none; padding: 4px;">{{ $user->jabatan }}</td>
        <td style="border: 1px solid #000; padding: 4px; text-align: center;">4.</td>
        <td style="border: 1px solid #000; border-right: none; padding: 4px;">JABATAN</td>
        <td style="border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 4px; width: 20px; text-align: center;">:</td>
        <td style="border: 1px solid #000; border-left: none; padding: 4px;">{{ $user->penilai ? $user->penilai->jabatan : '' }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 4px; text-align: center;">5.</td>
        <td style="border: 1px solid #000; border-right: none; padding: 4px;">UNIT KERJA</td>
        <td style="border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 4px; width: 20px; text-align: center;">:</td>
        <td style="border: 1px solid #000; border-left: none; padding: 4px;">{{ $user->unit_kerja }}</td>
        <td style="border: 1px solid #000; padding: 4px; text-align: center;">5.</td>
        <td style="border: 1px solid #000; border-right: none; padding: 4px;">UNIT KERJA</td>
        <td style="border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 4px; width: 20px; text-align: center;">:</td>
        <td style="border: 1px solid #000; border-left: none; padding: 4px;">{{ $user->penilai ? $user->penilai->unit_kerja : '' }}</td>
    </tr>
</table>
<br>

<table class="table table-sm table-bordered border-dark mt-2" style="width: 100%; border: 1px solid #000; border-collapse: collapse; page-break-inside: auto;">
    <thead>
        <tr>
            <th style="text-align: center; width: 50px; border: 1px solid #000;">No</th>
            <th style="text-align: center; width: 250px; border: 1px solid #000;">Rencana Hasil Kerja Atasan Yang Diintervensi</th>
            <th style="text-align: center; width: 300px; border: 1px solid #000;">Rencana Hasil Kerja</th>
            <th>Aspek</th>
            <th>Indikator Kinerja</th>
            <th>Target</th>
        </tr>
        <tr>
            <th colspan="6" style="border: 1px solid #000;">Utama</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user->tugas as $data)
        <tr style="page-break-inside: avoid;">
            <td style="text-align: justify; border: 1px solid #000; vertical-align: top;">{{ $loop->iteration }} </td>
            <td style="border: 1px solid #000; vertical-align: top; padding-left: 10px; padding-right: 0px; text-align: justify;">{{ $data->rk->name ?? '-' }}</td>
            <td style="border: 1px solid #000; vertical-align: top; padding-left: 10px; padding-right: 0px;">{{ $data->name }}</td>
            <td style="vertical-align:text-top; border: 1px solid #000;" colspan="3">
                @foreach ($data->tupoksi as $item)
                <table>
                    
                    <tr>
                        <td style="width:150px; padding-left: 10px; padding-right: 0px;">{{ $item->aspek }}</td>
                        <td style="width:150px">{{$item->indikator}}</td>
                        <td style="width:20%">{{$item->target}}</td>
                    </tr>
                </table>
                @endforeach
            </td>
        </tr>
        @endforeach

        @if(count($user->tutam) > 0)
        <tr style="page-break-before: auto;">
            <th colspan="6" style="border: 1px solid #000;">
                Tambahan
            </th>
        </tr>
        @endif

        @foreach ($user->tutam as $data)
        <tr style="page-break-inside: avoid;">
            <td style="text-align: center; border: 1px solid #000;" >{{ $loop->iteration }} </td>
            <td style="border: 1px solid #000;">{{ $data->rk->name }}</td>
            <td style="border: 1px solid #000;">{{ $data->name }} <br></td>

            <td style="vertical-align:text-top; border: 1px solid #000;" colspan="3">
                @foreach ($data->tuti as $item)
                <table class="table table-sm table-borderless" style="border-collapse: collapse;">
                    <tr>
                        <td style="width: 100px; border: 1px solid #000;">
                            {{ $item->aspek }}
                        </td>
                        <td style="width: 30px; border: 1px solid #000;">:</td>
                        <td style="width: 250px;text-align:justify; border: 1px solid #000;">
                            {{ $item->indikator }}
                        </td>
                        <td style="text-align: right; border: 1px solid #000;">
                            {{ $item->target }}
                        </td>
                    </tr>

                </table>
                @endforeach

            </td>
        </tr>

        @endforeach

    </tbody>
</table>
<br>

<b>PERILAKU KERJA</b>
<table class="table table-bordered border-dark" style="width: 100%; border-collapse: collapse; page-break-inside: avoid;">
    <tbody>
        <tr style="page-break-inside: avoid;">
            <td style="text-align: center; width: 5%; border: 1px solid #000; padding-left: 3px;" rowspan="2">1 </td>
            <td colspan="2" style="width: 65%; border: 1px solid #000; padding-left: 3px;">Berorientasi Pelayanan </td>
        </tr>
        <tr style="page-break-inside: avoid;">
            <td style="border: 1px solid #000; padding-left: 3px;">
                <ol style="margin-bottom: 0; padding-left: 22px;">
                    <li>Memahami dan memenuhi kebutuhan masyarakat
                    </li>
                    <li>Ramah, cekatan, solutif, dan dapat diandalkan
                    </li>
                    <li>Melakukan perbaikan tiada henti
                    </li>
                </ol>
            </td>
            <td style="width: 30%; border: 1px solid #000; padding-left: 3px;" >Ekspektasi Khusus Pimpinan:<br>
                {{ optional($user->eks)->eks1 ?? '' }} <br>
            </td>
        </tr>
    </tbody>
    
    <tbody>
        <tr style="page-break-inside: avoid;">
            <td style="text-align: center; width: 50px; border: 1px solid #000; padding-left: 3px;" rowspan="2">2 </td>
            <td colspan="2" style="border: 1px solid #000; padding-left: 3px;">Akuntabel </td>
        </tr>
        <tr style="page-break-inside: avoid;">
            <td style="border: 1px solid #000; padding-left: 3px;">
                <ol style="margin-bottom: 0; padding-left: 22px;">
                    <li>Melaksanakan tugas dengan jujur bertanggung jawab cermat disiplin dan berintegritas tinggi
                    </li>
                    <li>Menggunakan kekayaan dan BMN secara bertanggung jawab efektif dan efisien
                    </li>
                    <li>Tidak menyalahgunakan kewenangan jabatan
                    </li>
                </ol>
            </td>
            <td style="width: 30%; border: 1px solid #000; padding-left: 3px;" >Ekspektasi Khusus Pimpinan:<br>
                {{ optional($user->eks)->eks2 ?? '' }} <br>
            </td>
        </tr>
    </tbody>
    
    <tbody>
        <tr style="page-break-inside: avoid;">
            <td style="text-align: center; width: 50px; border: 1px solid #000; padding-left: 3px;" rowspan="2">3 </td>
            <td colspan="2" style="border: 1px solid #000; padding-left: 3px;">Kompeten </td>
        </tr>
        <tr style="page-break-inside: avoid;">
            <td style="border: 1px solid #000; padding-left: 3px;">
                <ol style="margin-bottom: 0; padding-left: 22px;">
                    <li>Meningkatkan kompetensi diri untuk menjawab tantangan yang selalu berubah
                    </li>
                    <li>Membantu orang lain belajar
                    </li>
                    <li>Melaksanakan tugas dengan kualitas terbaik</li>
                </ol>
            </td>
            <td style="width: 30%; border: 1px solid #000; padding-left: 3px;" >Ekspektasi Khusus Pimpinan:<br>
                {{ optional($user->eks)->eks3 ?? '' }} <br>
            </td>
        </tr>
    </tbody>
    
    <tbody>
        <tr style="page-break-inside: avoid;">
            <td style="text-align: center; width: 50px; border: 1px solid #000; padding-left: 3px;" rowspan="2">
                4 </td>
            <td colspan="2" style="border: 1px solid #000; padding-left: 3px;">
                Harmonis </td>
        </tr>
        <tr style="page-break-inside: avoid;">
            <td style="border: 1px solid #000; padding-left: 3px;">
                <ol style="margin-bottom: 0; padding-left: 22px;">
                    <li>Menghargai setiap orang apapun latar belakangnya
                    </li>
                    <li>Suka menolong orang lain
                    </li>
                    <li>Membangun lingkungan kerja yang kondusif</li>
                </ol>
            </td>
            <td style="width: 30%; border: 1px solid #000; padding-left: 3px;" >Ekspektasi Khusus Pimpinan:<br>
                {{ optional($user->eks)->eks4 ?? '' }} <br>
            </td>
        </tr>
    </tbody>
    
    <tbody>
        <tr style="page-break-inside: avoid;">
            <td style="text-align: center; width: 50px; border: 1px solid #000; padding-left: 3px;" rowspan="2">
                5 </td>
            <td colspan="2" style="border: 1px solid #000; padding-left: 3px;">
                Loyal </td>
        </tr>
        <tr style="page-break-inside: avoid;">
            <td style="border: 1px solid #000; padding-left: 3px;">
                <ol style="margin-bottom: 0; padding-left: 22px;">
                    <li>Memegang teguh ideologi Pancasila, Undang-Undang Dasar Negara Republik Indonesia Tahun 1945, setia pada NKRI serta pemerintahan yang sah
                    </li>
                    <li>Menjaga nama baik sesama ASN, Pimpinan, Instansi, dan Negara
                    </li>
                    <li>Menjaga rahasia jabatan dan negara</li>
                </ol>
            </td>
            <td style="width: 30%; border: 1px solid #000; padding-left: 3px;" >Ekspektasi Khusus Pimpinan:<br>
                {{ optional($user->eks)->eks5 ?? '' }} <br>
            </td>
        </tr>
    </tbody>
    
    <tbody>
        <tr style="page-break-inside: avoid;">
            <td style="text-align: center; width: 50px; border: 1px solid #000; padding-left: 3px;" rowspan="2">
                6 </td>
            <td colspan="2" style="border: 1px solid #000; padding-left: 3px;">
                Adaptif </td>
        </tr>
        <tr style="page-break-inside: avoid;">
            <td style="border: 1px solid #000; padding-left: 3px;">
                <ol style="margin-bottom: 0; padding-left: 22px;">
                    <li>Cepat menyesuaikan diri menghadapi perubahan
                    </li>
                    <li>Terus berinovasi dan mengembangkan kreativitas
                    </li>
                    <li>Bertindak proaktif</li>
                </ol>
            </td>
            <td style="width: 30%; border: 1px solid #000; padding-left: 3px;" >Ekspektasi Khusus Pimpinan:<br>
                {{ optional($user->eks)->eks6 ?? '' }} <br>
            </td>
        </tr>
    </tbody>
    
    <tbody>
        <tr style="page-break-inside: avoid;">
            <td style="text-align: center; width: 50px; border: 1px solid #000; padding-left: 3px;" rowspan="2">
                7 </td>
            <td colspan="2" style="border: 1px solid #000; padding-left: 3px;">
                Kolaboratif </td>
        </tr>
        <tr style="page-break-inside: avoid;">
            <td style="border: 1px solid #000; padding-left: 3px;">
                <ol style="margin-bottom: 0; padding-left: 22px;">
                    <li>Memberi kesempatan kepada berbagai pihak untuk berkontribusi
                    </li>
                    <li>Terbuka dalam bekerjasama untuk menghasilkan nilai tambah
                    </li>
                    <li>Menggerakkan pemanfaatan berbagai sumber daya untuk tujuan bersama</li>
                </ol>
            </td>
            <td style="width: 30%; border: 1px solid #000; padding-left: 3px;" >Ekspektasi Khusus Pimpinan:<br>
                {{ optional($user->eks)->eks7 ?? '' }} <br>
            </td>
        </tr>
    </tbody>
</table>
<br>

<div class="box-header with-border">
    <h3 class="box-title">Lampiran SKP</h3>
</div>

<div class="box-body">
    <table class="table table-bordered border-primary" style="width: 100%; border-collapse: collapse;">
        <tbody>
            <tr>
                <td style="border: 1px solid #000;">
                    Dukungan Sumber Daya 
                    @foreach ($user->sdm as $item)
                        - {{ $item->sdm }} 
                    @endforeach
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000;">
                Skema Pertanggungjawaban 
                <br>
                    @foreach ($user->skema as $item)
                        - {{ $item->skema }} 
                    @endforeach
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000;">
                    Konsekuensi 
                    @foreach ($user->kon as $item)
                        - {{ $item->kon }}
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
</div>
<br>

<div class="text-center fw-bold page-break-before" style="display: flex; justify-content: space-between; width: 100%;">
    <span style="width: 48%; text-transform: uppercase; vertical-align: top; display: inline-block; text-align: center;">
        <br><br>
        PEGAWAI YANG DINILAI <br><br><br><br><br>
        {{ $user->name }} <br>
        NIP.{{ $user->nip }}
        </span>
        <span style="width: 48%; vertical-align: top; display: inline-block; text-align: center;">
        Pangkalpinang, {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }}
        <br><br>
        PEJABAT PENILAI KINERJA <br><br><br><br><br>
        {{ $user->penilai ? $user->penilai->nama : '' }} <br>
        NIP.{{ $user->penilai ? $user->penilai->nip : '' }}
        <br><br>
        </span>
</div>
