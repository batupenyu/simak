<style>
    body {
        margin: 0;
        padding: 20px;
        font-family: Arial, sans-serif;
        font-size: 12px;
    }

    .page-break {
        page-break-after: always;
    }

    /* PENTING: Mencegah baris tabel terpecah */
    table {
        page-break-inside: auto;
        border-collapse: collapse;
        width: 100%;
    }

    tr {
        page-break-inside: avoid !important;
        page-break-after: auto;
    }
    
    /* Specific rule for perilaku kerja table rows to prevent page breaks */
    table.table-bordered tr {
        page-break-inside: avoid !important;
    }
    
    /* More specific rules for perilaku kerja table */
    table.table-bordered tbody tr {
        page-break-inside: avoid !important;
        page-break-after: auto;
    }
    
    /* Force no page breaks inside table cells */
    table.table-bordered td {
        page-break-inside: avoid !important;
    }
    
    /* Additional rule to prevent page breaks inside perilaku kerja rows */
    .perilaku-row {
        page-break-inside: avoid !important;
        break-inside: avoid !important;
    }

    td, th {
        page-break-inside: avoid !important;
        vertical-align: top;
        border: 1px solid #000;
        padding: 4px;
    }

    table.table-borderless,
    table.table-borderless th,
    table.table-borderless td {
        border: none !important;
    }

    /* Wrapper untuk konten agar tidak terpotong */
    .cell-content {
        page-break-inside: avoid !important;
        margin: 4px 0;
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
    
    /* Signature table specific styles for mPDF */
    .signature-table {
        page-break-inside: avoid !important;
    }
    
    .signature-table td {
        page-break-inside: avoid !important;
        width: 50% !important;
        vertical-align: top !important;
    }
</style>


<h4 style="text-align:center">SASARAN KINERJA PEGAWAI PEJABAT FUNGSIONAL <br>
    PENDEKATAN HASIL KERJA KUANTITATIF
</h4> 
<br><br><br>


<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td style="width: 50%; text-align: left; border: none;">Nama Instansi : {{ ucwords(strtolower($user->unit_kerja)) }}</td>
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

<table style="width: 100%; text-align: center;">
    <tr>
        <td colspan="6" style="text-align: center;">
            POLA DISTRIBUSI: KURVA DISTRIBUSI PREDIKAT KINERJA PEGAWAI DENGAN CAPAIAN KINERJA ORGANISASI BAIK <br><br>
            <div style="display: flex; justify-content: center; align-items: center; width: 100%;">
                <img src="{{ public_path('image/pola_1.jpg') }}" style="display: block; margin: 0 auto; max-width: 300px; height: auto;" alt="">
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
                <table class="table-borderless">
                    <tr>
                        <th style="width: 25%; border: none;">Aspek</th>
                        <th style="width: 55%; border: none;">Indikator Kinerja Individu</th>
                        <th style="width: 20%; border: none;">Target</th>
                    </tr>
                </table>
            </th>
            <th style="text-align: center; width: 150px;">Realisasi berdasar bukti dukung</th>
            <th style="text-align: center; width: 150px;">Umpan Balik</th>
        </tr>
        <tr>
            <th colspan="8" style="text-align: left; padding-left: 10px;">Utama </th>
        </tr>

        @php
            $firstRkName = $uniqueRkNames->first() ?? null;
            $overallIndex = 0;
        @endphp

        @foreach ($tugasChunks as $chunkIndex => $chunk)
            @foreach ($chunk as $data)
                @php
                    $overallIndex++;
                @endphp
                <tr>
                    <td style="text-align: center;">
                        {{ $overallIndex }}
                    </td>
                    <td style="text-align: justify">
                        @if ($overallIndex == 1 && $firstRkName)
                            {{ $firstRkName }}
                        @endif
                    </td>
                    <td style="text-align: justify">{{ $data->name }}</td>
                    <td colspan="3">
                        @foreach ($data->tupoksi as $item)
                            <table class="table-borderless">
                                <tr style="text-align: left;">
                                    <td style="width: 40%; border: none;">{{ $item->aspek }}</td>
                                    <td style="width: 55%; border: none;">{{ $item->indikator }}</td>
                                    <td style="width: 20%; border: none;">{{ $item->target }}</td>
                                </tr>
                            </table>
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
            
            {{-- Add page break after each chunk except the last one --}}
            @if (!$loop->last)
                <tr>
                    <td colspan="8" class="page-break"></td>
                </tr>
            @endif
        @endforeach

        <tr>
            <th colspan="8" style="text-align: left; padding-left: 10px;">Tambahan </th>
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

<!-- Page break to ensure Perilaku Kerja table starts on a new page -->
<div class="page-break"></div>

<table class="table table-bordered border-primary" style="width: 100%; border-collapse: collapse; page-break-inside: avoid;">
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
        <tr class="perilaku-row" style="page-break-inside: avoid !important;">
            <td style="text-align: center; width: 5%;" rowspan="2">
                1 </td>
            <td colspan="3">
                Berorientasi Pelayanan </td>
        </tr>
        <tr class="perilaku-row" style="page-break-inside: avoid !important;">
            <td>
                <ol style="margin-bottom: 0; padding-left: 17px;">
                    <li>Memahami dan memenuhi kebutuhan masyarakat
                    </li>
                    <li>Ramah, cekatan, solutif, dan dapat diandalkan
                    </li>
                    <li>Melakukan perbaikan tiada henti</li>
                </ol>
            </td>
            <td style="width: 30%;">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks1 ?? '' }}
            </td>
            <td style="width: 30%;">
                {{ optional($user->umpan)->umpan1 ?? '' }}
            </td>
        </tr>

        <tr class="perilaku-row" style="page-break-inside: avoid !important;">
            <td style="text-align: center; width: 5%;" rowspan="2">
                2 </td>
                <td colspan="3">
                    Akuntabel </td>
                </tr>
                <tr class="perilaku-row" style="page-break-inside: avoid !important;">
                    <td>
                        <ol style="margin-bottom: 0; padding-left: 17px;">
                            <li>Melaksanakan tugas dengan jujur bertanggung jawab cermat disiplin dan berintegritas tinggi
                            </li>
                            <li>Menggunakan kekayaan dan BMN secara bertanggung jawab efektif dan efisien
                            </li>
                            <li>Tidak menyalahgunakan kewenangan jabatan</li>
                        </ol>
                    </td>
                    <td style="width: 30%;">
                        Ekspektasi Khusus Pimpinan:
                        <br>
                        {{ optional($user->eks)->eks2 ?? '' }}
                    </td>
                    <td style="width: 30%;">
                        {{ optional($user->umpan)->umpan2 ?? '' }}
                    </td>
                </tr>
        <tr class="perilaku-row" style="page-break-inside: avoid !important;">
            <td style="text-align: center; width: 5%;" rowspan="2">
            3 </td>
        <td colspan="3">
            Kompeten </td>
        </tr>
        <tr class="perilaku-row" style="page-break-inside: avoid !important;">
            <td>
                <ol style="margin-bottom: 0; padding-left: 17px;">
                    <li>Meningkatkan kompetensi diri untuk menjawab tantangan yang selalu berubah
                    </li>
                    <li>Membantu orang lain belajar
                    </li>
                    <li>Melaksanakan tugas dengan kualitas terbaik</li>
                </ol>
            </td>
            <td style="width: 30%;">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks3 ?? '' }}
            </td>
            <td style="width: 30%;">
                {{ optional($user->umpan)->umpan3 ?? '' }}
            </td>
        </tr>
        <tr class="perilaku-row" style="page-break-inside: avoid !important;">
            <td style="text-align: center; width: 5%;" rowspan="2">
            4 </td>
        <td colspan="3">
            Harmonis </td>
        </tr>
        <tr class="perilaku-row" style="page-break-inside: avoid !important;">
            <td>
                <ol style="margin-bottom: 0; padding-left: 17px;">
                    <li>Menghargai setiap orang apapun latar belakangnya
                    </li>
                    <li>Suka menolong orang lain
                    </li>
                    <li>Membangun lingkungan kerja yang kondusif</li>
                </ol>
            </td>
            <td style="width: 30%;">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks4 ?? '' }}
            </td>
            <td style="width: 30%;">
                {{ optional($user->umpan)->umpan4 ?? '' }}
            </td>
        </tr>
        <tr class="perilaku-row" style="page-break-inside: avoid !important;">
            <td style="text-align: center; width: 5%;" rowspan="2">
            5 </td>
        <td colspan="3">
            Loyal </td>
        </tr>
        <tr class="perilaku-row" style="page-break-inside: avoid !important;">
            <td>
                <ol style="margin-bottom: 0; padding-left: 17px;">
                    <li>Memegah teguh ideologi Pancasila, Undang-Undang Dasar Negara Republik Indonesia Tahun 1945, setia pada NKRI serta pemerintahan yang sah
                    </li>
                    <li>Menjaga nama baik sesama ASN, Pimpinan, Instansi, dan Negara
                    </li>
                    <li>Menjaga rahasia jabatan dan negara</li>
                </ol>
            </td>
            <td style="width: 30%;">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks5 ?? '' }}
            </td>
            <td style="width: 30%;">
                {{ optional($user->umpan)->umpan5 ?? '' }}
            </td>
        </tr>
        <tr class="perilaku-row" style="page-break-inside: avoid !important;">
            <td style="text-align: center; width: 5%;" rowspan="2">
            6 </td>
        <td colspan="3">
            Adaptif </td>
        </tr>
        <tr class="perilaku-row" style="page-break-inside: avoid !important;">
            <td>
                <ol style="margin-bottom: 0; padding-left: 17px;">
                    <li>Cepat menyesuaikan diri menghadapi perubahan
                    </li>
                    <li>Terus berinovasi dan mengembangkan kreativitas
                    </li>
                    <li>Bertindak proaktif</li>
                </ol>
            </td>
            <td style="width: 30%;">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks6 ?? '' }}
            </td>
            <td style="width: 30%;">
                {{ optional($user->umpan)->umpan6 ?? '' }}
            </td>
        </tr>
        <tr class="perilaku-row" style="page-break-inside: avoid !important;">
            <td style="text-align: center; width: 5%;" rowspan="2">
            7 </td>
            <td colspan="3">
            Kolaboratif </td>
        </tr>
        <tr class="perilaku-row" style="page-break-inside: avoid !important;">
            <td>
                <ol style="margin-bottom: 0; padding-left: 17px;">
                    <li>Memberi kesempatan kepada berbagai pihak untuk berkontribusi
                    </li>
                    <li>Terbuka dalam pengurusama untuk menghasilkan nilai tambah
                    </li>
                    <li>Menggerakkan pemanfaatan berbagai sumber daya untuk tujuan bersama</li>
                </ol>
            </td>
            <td style="width: 30%;">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks7 ?? '' }}
            </td>
            <td style="width: 30%;">
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

<!-- <div style="border-top: 1px solid #000; padding-top: 10px; margin-top: 20px;">
    <h3>Lampiran SKP</h3>
</div> -->

<!-- Signature Section with improved layout for mPDF -->
<table class="signature-table" style="width: 100%; margin-top: 30px; border-collapse: collapse; border: none;">
    <tr style="border: none;">
        <td style="width: 50%; text-align: center; vertical-align: top; padding: 0; border: none;">
            <div class="text-center fw-bold" style="text-transform: uppercase;">
                <br><br>
                PEGAWAI YANG DINILAI <br><br><br><br><br>
                {{ $user->name }} <br>
                NIP.{{ $user->nip }}
            </div>
        </td>
        <td style="width: 50%; text-align: center; vertical-align: top; padding: 0; border: none;">
            <div class="text-center fw-bold">
                Pangkalpinang, {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }}
                <br><br>
                PEJABAT PENILAI KINERJA <br><br><br><br><br>
                {{ $user->penilai ? $user->penilai->nama : '' }} <br>
                NIP.{{ $user->penilai ? $user->penilai->nip : '' }}
                <br><br>
            </div>
        </td>
    </tr>
</table>

