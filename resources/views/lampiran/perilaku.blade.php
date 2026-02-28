<style>
    .action-link {
        color: #1890ff !important;
        text-decoration: none !important;
        font-weight: 600 !important;
        padding: 2px 6px !important;
        border-radius: 3px !important;
        display: inline-block !important;
        visibility: visible !important;
        opacity: 1 !important;
    }
    .action-link:hover {
        background-color: #e6f7ff !important;
        text-decoration: underline !important;
    }
    .delete-link {
        color: #ee1939 !important;
    }
    .add-link {
        color: #52c41a !important;
    }
</style>

<table class="table table-bordered border-primary">
    <tbody>
        <tr>
            <td colspan="2">
                <div class="center">
                    <b>PERILAKU KERJA</b>
                </div>
            </td>
            <td colspan="2" style="text-align: center"><b>UMPAN BALIK BERKELANJUTAN <br>
            BERDASARKAN BUKTI DUKUNG</b></td>
        </tr>
        <tr>
            <td style="text-align: center; width: 5%;" rowspan="2">
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
            <td style="width: 30%; " colspan="2">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks1 ?? '' }}
                @if($user->eks)
                <a href="/ekspektasi.edit_perilaku_1/{{ $user->eks->id }}" class="action-link">[Edit]</a>
                @else
                <a href="/ekspektasi.add1" class="action-link add-link">[Tambah]</a>
                @endif
            </td>
            <!-- <td style="width: 30%;">
                {{ optional($user->umpan)->umpan1 ?? '' }}
                @if($user->umpan)
                <a href="{{ url('umpan.edit1/'.$user->umpan->id) }}" class="action-link">[Edit]</a>
                @else
                <a href="/umpan.create1" class="action-link add-link">[Tambah]</a>
                @endif
            </td> -->
        </tr>

        <tr>
            <td style="text-align: center; width: 5%;" rowspan="2">
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
                    <td style="width: 30%;" colspan="2">
                        Ekspektasi Khusus Pimpinan:
                        <br>
                        {{ optional($user->eks)->eks2 ?? '' }}
                        @if($user->eks)
                        <a href="/ekspektasi.edit_perilaku_2/{{ $user->eks->id }}" class="action-link">[Edit]</a>
                        @else
                        <a href="/ekspektasi.add2" class="action-link add-link">[Tambah]</a>
                        @endif
                    </td>
                    <!-- <td style="width: 30%;">
                        {{ optional($user->umpan)->umpan2 ?? '' }}
                        @if($user->umpan)
                        <a href="{{ url('umpan.edit2/'.$user->umpan->id) }}" class="action-link">[Edit]</a>
                        @else
                        <a href="/umpan.create2" class="action-link add-link">[Tambah]</a>
                        @endif
                    </td> -->
                </tr>
        <tr>
            <td style="text-align: center; width: 5%;" rowspan="2">
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
            <td style="width: 30%;" colspan="2">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks3 ?? '' }}
                @if($user->eks)
                <a href="/ekspektasi.edit_perilaku_3/{{ $user->eks->id }}" class="action-link">[Edit]</a>
                @else
                <a href="/ekspektasi.add3" class="action-link add-link">[Tambah]</a>
                @endif
            </td>
            <!-- <td style="width: 30%;">
                {{ optional($user->umpan)->umpan3 ?? '' }}
                @if($user->umpan)
                <a href="{{ url('umpan.edit3/'.$user->umpan->id) }}" class="action-link">[Edit]</a>
                @else
                <a href="/umpan.create3" class="action-link add-link">[Tambah]</a>
                @endif
            </td> -->
        </tr>
        <tr>
            <td style="text-align: center; width: 5%;" rowspan="2">
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
            <td style="width: 30%;" colspan="2">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks4 ?? '' }}
                @if($user->eks)
                <a href="/ekspektasi.edit_perilaku_4/{{ $user->eks->id }}" class="action-link">[Edit]</a>
                @else
                <a href="/ekspektasi.add4" class="action-link add-link">[Tambah]</a>
                @endif
            </td>
            <!-- <td style="width: 30%;">
                {{ optional($user->umpan)->umpan4 ?? '' }}
                @if($user->umpan)
                <a href="{{ url('umpan.edit4/'.$user->umpan->id) }}" class="action-link">[Edit]</a>
                @else
                <a href="/umpan.create4" class="action-link add-link">[Tambah]</a>
                @endif
            </td> -->
        </tr>
        <tr>
            <td style="text-align: center; width: 5%;" rowspan="2">
                5 </td>
            <td colspan="3">
                Loyal </td>
        </tr>
        <tr>
            <td>
                <ol style="margin-bottom: 0; padding-left: 17px;">
                    <li>Memegang teguh ideologi Pancasila, Undang-Undang Dasar Negara Republik Indonesia Tahun 1945, setia pada NKRI serta pemerintahan yang sah
                    </li>
                    <li>Menjaga nama baik sesama ASN, Pimpinan, Instansi, dan Negara
                    </li>
                    <li>Menjaga rahasia jabatan dan negara</li>
                </ol>
            </td>
            <td style="width: 30%;" colspan="2">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks5 ?? '' }}
                @if($user->eks)
                <a href="/ekspektasi.edit_perilaku_5/{{ $user->eks->id }}" class="action-link">[Edit]</a>
                @else
                <a href="/ekspektasi.add5" class="action-link add-link">[Tambah]</a>
                @endif
            </td>
            <!-- <td style="width: 30%;">
                {{ optional($user->umpan)->umpan5 ?? '' }}
                @if($user->umpan)
                <a href="{{ url('umpan.edit5/'.$user->umpan->id) }}" class="action-link">[Edit]</a>
                @else
                <a href="/umpan.create5" class="action-link add-link">[Tambah]</a>
                @endif
            </td> -->
        </tr>
        <tr>
            <td style="text-align: center; width: 5%;" rowspan="2">
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
            <td style="width: 30%;" colspan="2">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks6 ?? '' }}
                @if($user->eks)
                <a href="/ekspektasi.edit_perilaku_6/{{ $user->eks->id }}" class="action-link">[Edit]</a>
                @else
                <a href="/ekspektasi.add6" class="action-link add-link">[Tambah]</a>
                @endif
            </td>
            <!-- <td style="width: 30%;">
                {{ optional($user->umpan)->umpan6 ?? '' }}
                @if($user->umpan)
                <a href="{{ url('umpan.edit6/'.$user->umpan->id) }}" class="action-link">[Edit]</a>
                @else
                <a href="/umpan.create6" class="action-link add-link">[Tambah]</a>
                @endif
            </td> -->
        </tr>
        <tr>
            <td style="text-align: center; width: 5%;" rowspan="2">
                7 </td>
                <td colspan="3">
                Kolaboratif </td>
        </tr>
        <tr>
            <td>
                <ol style="margin-bottom: 0; padding-left: 17px;">
                    <li>Memberi kesempatan kepada berbagai pihak untuk berkontribusi
                    </li>
                    <li>Terbuka dalam bekerjasama untuk menghasilkan nilai tambah
                    </li>
                    <li>Menggerakkan pemanfaatan berbagai sumber daya untuk tujuan bersama</li>
                </ol>
            </td>
            <td style="width: 30%;" colspan="2">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks7 ?? '' }}
                @if($user->eks)
                <a href="/ekspektasi.edit_perilaku_7/{{ $user->eks->id }}" class="action-link">[Edit]</a>
                @else
                <a href="/ekspektasi.add7" class="action-link add-link">[Tambah]</a>
                @endif
            </td>
            <!-- <td style="width: 30%;">
                {{ optional($user->umpan)->umpan7 ?? '' }}
                @if($user->umpan)
                <a href="{{ url('umpan.edit7/'.$user->umpan->id) }}" class="action-link">[Edit]</a>
                @else
                <a href="/umpan.create7" class="action-link add-link">[Tambah]</a>
                @endif
            </td> -->
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
