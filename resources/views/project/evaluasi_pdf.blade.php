<style>
    body {
        margin: 0;
        padding: 20px;
        font-family: Arial, sans-serif;
        font-size: 12px;
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
        border-collapse: collapse;
        width: 100%;
    }

    tr {
        page-break-inside: avoid;
        page-break-after: avoid;
    }

    th, td {
        border: 1px solid #000;
        padding: 4px;
        vertical-align: top;
    }

    thead {
        display: table-header-group;
    }

    tfoot {
        display: table-footer-group;
    }
    
    .text-center { text-align: center; }
    .text-justify { text-align: justify; }
    .fw-bold { font-weight: bold; }
    .mb-3 { margin-bottom: 1rem; }
    .mt-2 { margin-top: 0.5rem; }
    .border-dark { border-color: #000 !important; }
</style>

<h4 style="text-align:center">SASARAN KINERJA PEGAWAI PEJABAT FUNGSIONAL <br>
    PENDEKATAN HASIL KERJA KUANTITATIF
</h4> 
<br><br><br>


<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td style="width: 50%; text-align: left; border: none;">Nama Instansi : {{ $user->unit_kerja }}</td>
        <td style="width: 50%; text-align: right; border: none;">Periode Penilaian : {{ Carbon\Carbon::parse($user->tgl_awal)->translatedFormat('d F Y ') }} s.d {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }}</td>
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

<table>
    <tr>
        <td colspan="6">
            POLA DISTRIBUSI: KURVA DISTRIBUSI PREDIKAT KINERJA PEGAWAI DENGAN CAPAIAN KINERJA ORGANISASI BAIK <br><br>
            <div style="text-align: center;">
                <img src="{{ public_path('image/pola_1.jpg') }}" style="display:block; margin:auto; max-width: 300px; height: auto;" alt="">
            </div>
            <br>
        </td>
    </tr>
</table>

<table class="table table-sm table-bordered border-dark">
    <tbody>
        <tr>
            <th style="text-align: center; width: 50px;">No</th>
            <th style="text-align: center; width: 250px;">Rencana Hasil Kerja Atasan Yang Diintervensi</th>
            <th style="text-align: center; width: 300px;">Rencana Hasil Kerja</th>
            <th colspan="3">
                <div style="display: flex; gap: 10px;">
                    <div style="flex: 0 0 25%; border-right: 1px solid #000;">Aspek</div>
                    <div style="flex: 0 0 60%; border-right: 1px solid #000;">Indikator Kinerja Individu</div>
                    <div style="flex: 0 0 15%; text-align: center;">Target</div>
                </div>
            </th>
            <th style="text-align: center; width: 150px;">Realisasi berdasar bukti dukung</th>
            <th style="text-align: center; width: 150px;">Umpan Balik</th>
        </tr>
        <tr>
            <th colspan="8">Utama </th>
        </tr>

        @php
            $firstRkName = $uniqueRkNames->first() ?? null;
        @endphp

        @foreach ($user->tugas as $data)
            <tr>
                <td style="text-align: center;">
                    {{ $loop->iteration }}
                </td>
                <td style="text-align: justify">
                    @if ($loop->first && $firstRkName)
                        {{ $firstRkName }}
                    @endif
                </td>
                <td style="text-align: justify">{{ $data->name }}</td>
                <td colspan="3">
                    @foreach ($data->tupoksi as $item)
                        <div style="display: flex; align-items: flex-start;">
                            <div style="flex: 0 0 25%;">{{ $item->aspek }}</div>
                            <div style="flex: 0 0 5%; text-align: center;"><strong>:</strong></div>
                            <div style="flex: 0 0 60%; text-align: justify;">{{ $item->indikator }}</div>
                            <div style="flex: 0 0 10%;">{{ $item->target }}</div>
                        </div>
                    @endforeach
                </td>
                <td style="text-align: center;">
                    @foreach ($data->tupoksi as $item)
                        {{ $item->realisasi }}<br>
                    @endforeach
                </td>
                <td>
                    @foreach ($data->tupoksi as $item)
                        @if($item->aspek == 'Kuantitas')
                            @if($item->realisasi > $item->target)
                                Diatas ekspektasi<br>
                            @elseif($item->realisasi == $item->target)
                                Sesuai ekspektasi<br>
                            @else
                                Dibawah ekspektasi<br>
                            @endif
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach

        <tr>
            <th colspan="8">Tambahan</th>
        </tr>

        @foreach ($user->tutam as $data)
            <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td>{{ $data->rk->name }}</td>
                <td>{{ $data->name }}</td>
                <td colspan="3">
                    @foreach ($data->tuti as $item)
                        <div style="display: flex; align-items: flex-start;">
                            <div style="flex: 0 0 25%;">{{ $item->aspek }}</div>
                            <div style="flex: 0 0 5%; text-align: center;"><strong>:</strong></div>
                            <div style="flex: 0 0 60%; text-align: justify;">{{ $item->indikator }}</div>
                            <div style="flex: 0 0 10%;">{{ $item->target }}</div>
                        </div>
                    @endforeach
                </td>
                <td style="text-align: center;">
                    @foreach ($data->tuti as $item)
                        {{ $item->realisasi }}<br>
                    @endforeach
                </td>
                <td>
                    @foreach ($data->tuti as $item)
                        @if($item->aspek == 'Kuantitas')
                            @if($item->realisasi > $item->target)
                                Diatas ekspektasi<br>
                            @elseif($item->realisasi == $item->target)
                                Sesuai ekspektasi<br>
                            @else
                                Dibawah ekspektasi<br>
                            @endif
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<table class="table table-bordered border-primary">
    <tbody>
        <tr>
            <td colspan="2">
                <div style="text-align: center;">
                    <b>PERILAKU KERJA</b>
                </div>
            </td>
            <td colspan="2" style="text-align: center"><b>UMPAN BALIK BERKELANJUTAN <br>
            BERDASARKAN BUKTI DUKUNG</b></td>
        </tr>
        <tr>
            <td style="text-align: center; width: 50px;" rowspan="2">
                1 </td>
            <td colspan="3">
                Berorientasi Pelayanan </td>
        </tr>
        <tr>
            <td>
                <ol style="margin-bottom: 0; padding-left: 17px;">
                    <li>Memahami dan memenuhi kebutuhan masyarakat
                    </li>
                    <li>Ramah, cekatan, solutif, dan dapat diandalkan
                    </li>
                    <li>Melakukan perbaikan tiada henti</li>
                </ol>
            </td>
            <td style="width: 300px;">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks1 ?? '' }}
            </td>
            <td style="width: 300px;">
                {{ optional($user->umpan)->umpan1 ?? '' }}
            </td>
        </tr>

        <tr>
            <td style="text-align: center; width: 50px;" rowspan="2">
                2 </td>
                <td colspan="3">
                    Akuntabel </td>
                </tr>
                <tr>
                    <td>
                        <ol style="margin-bottom: 0; padding-left: 17px;">
                            <li>Melaksanakan tugas dengan jujur bertanggung jawab cermat disiplin dan berintegritas tinggi
                            </li>
                            <li>Menggunakan kekayaan dan BMN secara bertanggung jawab efektif dan efisien
                            </li>
                            <li>Tidak menyalahgunakan kewenangan jabatan</li>
                        </ol>
                    </td>
                    <td style="width: 300px;">
                        Ekspektasi Khusus Pimpinan:
                        <br>
                        {{ optional($user->eks)->eks2 ?? '' }}
                    </td>
                    <td style="width: 300px;">
                        {{ optional($user->umpan)->umpan2 ?? '' }}
                    </td>
                </tr>
        <tr>
            <td style="text-align: center; width: 50px;" rowspan="2">
            3 </td>
        <td colspan="3">
            Kompeten </td>
        </tr>
        <tr>
            <td>
                <ol style="margin-bottom: 0; padding-left: 17px;">
                    <li>Meningkatkan kompetensi diri untuk menjawab tantangan yang selalu berubah
                    </li>
                    <li>Membantu orang lain belajar
                    </li>
                    <li>Melaksanakan tugas dengan kualitas terbaik</li>
                </ol>
            </td>
            <td style="width: 300px;">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks3 ?? '' }}
            </td>
            <td style="width: 300px;">
                {{ optional($user->umpan)->umpan3 ?? '' }}
            </td>
        </tr>
        <tr>
            <td style="text-align: center; width: 50px;" rowspan="2">
            4 </td>
        <td colspan="3">
            Harmonis </td>
        </tr>
        <tr>
            <td>
                <ol style="margin-bottom: 0; padding-left: 17px;">
                    <li>Menghargai setiap orang apapun latar belakangnya
                    </li>
                    <li>Suka menolong orang lain
                    </li>
                    <li>Membangun lingkungan kerja yang kondusif</li>
                </ol>
            </td>
            <td style="width: 300px;">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks4 ?? '' }}
            </td>
            <td style="width: 300px;">
                {{ optional($user->umpan)->umpan4 ?? '' }}
            </td>
        </tr>
        <tr>
            <td style="text-align: center; width: 50px;" rowspan="2">
            5 </td>
        <td colspan="3">
            Loyal </td>
        </tr>
        <tr>
            <td>
                <ol style="margin-bottom: 0; padding-left: 17px;">
                    <li>Memegah teguh ideologi Pancasila, Undang-Undang Dasar Negara Republik Indonesia Tahun 1945, setia pada NKRI serta pemerintahan yang sah
                    </li>
                    <li>Menjaga nama baik sesama ASN, Pimpinan, Instansi, dan Negara
                    </li>
                    <li>Menjaga rahasia jabatan dan negara</li>
                </ol>
            </td>
            <td style="width: 300px;">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks5 ?? '' }}
            </td>
            <td style="width: 300px;">
                {{ optional($user->umpan)->umpan5 ?? '' }}
            </td>
        </tr>
        <tr>
            <td style="text-align: center; width: 50px;" rowspan="2">
            6 </td>
        <td colspan="3">
            Adaptif </td>
        </tr>
        <tr>
            <td>
                <ol style="margin-bottom: 0; padding-left: 17px;">
                    <li>Cepat menyesuaikan diri menghadapi perubahan
                    </li>
                    <li>Terus berinovasi dan mengembangkan kreativitas
                    </li>
                    <li>Bertindak proaktif</li>
                </ol>
            </td>
            <td style="width: 300px;">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks6 ?? '' }}
            </td>
            <td style="width: 300px;">
                {{ optional($user->umpan)->umpan6 ?? '' }}
            </td>
        </tr>
        <tr>
            <td style="text-align: center; width: 50px;" rowspan="2">
            7 </td>
            <td colspan="3">
            Kolaboratif </td>
        </tr>
        <tr>
            <td>
                <ol style="margin-bottom: 0; padding-left: 17px;">
                    <li>Memberi kesempatan kepada berbagai pihak untuk berkontribusi
                    </li>
                    <li>Terbuka dalam pengurusama untuk menghasilkan nilai tambah
                    </li>
                    <li>Menggerakkan pemanfaatan berbagai sumber daya untuk tujuan bersama</li>
                </ol>
            </td>
            <td style="width: 300px;">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks7 ?? '' }}
            </td>
            <td style="width: 300px;">
                {{ optional($user->umpan)->umpan7 ?? '' }}
            </td>
        </tr>
        <tr>
            <td colspan="4"><b>RATING PERILAKU KERJA*</b><br>
                <del>
                    DIATAS EKSPEKTASI/
                </del><b>
                    SESUAI EKSPEKTASI/
                </b>
                <del>
                    DIBAWAH EKSPEKTASI**</small>
                </del>
            </td>
        </tr>
        <tr>
            <td colspan="4"><b>PREDIKAT KINERJA PEGAWAI* </b><br>
                <del>
                    ISTIMEWA/
                </del><b>
                    BAIK
                </b>
                <del>
                    /BUTUH PERBAIKAN/
                    KURANG(MISCONDUCT)/
                    SANGAT KURANG
                </del>
            </td>
        </tr>
    </tbody>
</table>

<div style="border-top: 1px solid #000; padding-top: 10px; margin-top: 20px;">
    <h3>Lampiran SKP</h3>
</div>

<div class="text-center fw-bold" style="display: flex; justify-content: space-between; width: 100%; margin-top: 30px;">
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

</body>
</html>