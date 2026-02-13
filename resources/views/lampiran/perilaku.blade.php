

<br>
<b>PERILAKU KERJA</b>
<table class="table table-bordered border-dark">
        <tr>
            <td style="text-align: center; width: 5%;" rowspan="2">1 </td>
            <td colspan="2" style="width: 65%">Berorientasi Pelayanan </td>
        </tr>
        <tr>
            <td>
                <ol style="margin-bottom: 0; padding-left: 22px;">
                    <li>Memahami dan memenuhi kebutuhan masyarakat
                    </li>
                    <li>Ramah, cekatan, solutif, dan dapat diandalkan
                    </li>
                    <li>Melakukan perbaikan tiada henti
                    </li>
                </ol>
            </td>
            <td style="width: 300px;">Ekspektasi Khusus Pimpinan:<br>
                {{ optional($user->eks)->eks1 ?? '' }} <br>
                @if($user->eks)
                <a href="/ekspektasi.edit_perilaku_1/{{ $user->eks->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit "></i></a>
                @endif 
            </td>
        </tr>
        
        <tr>
            <td style="text-align: center; width: 50px;" rowspan="2">2 </td>
            <td colspan="2">Akuntabel </td>
        </tr>
        <tr>
            <td>
                <ol style="margin-bottom: 0; padding-left: 22px;">
                    <li>Melaksanakan tugas dengan jujur bertanggung jawab cermat disiplin dan berintegritas tinggi
                    </li>
                    <li>Menggunakan kekayaan dan BMN secara bertanggung jawab efektif dan efisien
                    </li>
                    <li>Tidak menyalahgunakan kewenangan jabatan
                    </li>
                </ol>
            </td>
            <td style="width: 30%;" >Ekspektasi Khusus Pimpinan:<br>
                {{ optional($user->eks)->eks2 ?? '' }} <br>
                @if($user->eks)
                <a href="/ekspektasi.edit_perilaku_2/{{ $user->eks->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a>
                @endif 
            </td>
        </tr>
        <tr>
            <td style="text-align: center; width: 50px;" rowspan="2">3 </td>
            <td colspan="2">Kompeten </td>
        </tr>
        <tr>
            <td>
                <ol style="margin-bottom: 0; padding-left: 22px;">
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
                {{ optional($user->eks)->eks3 ?? '' }} <br>
                @if($user->eks)
                <a href="/ekspektasi.edit_perilaku_3/{{ $user->eks->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a>
                @endif 
            </td>
        </tr>
        <tr>
            <td style="text-align: center; width: 50px;" rowspan="2">
                4 </td>
            <td colspan="2">
                Harmonis </td>
        </tr>
        <tr>
            <td>
                <ol style="margin-bottom: 0; padding-left: 22px;">
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
                {{ optional($user->eks)->eks4 ?? '' }} <br>
                @if($user->eks)
                <a href="/ekspektasi.edit_perilaku_4/{{ $user->eks->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a>
                @endif 
            </td>
        </tr>
        <tr>
            <td style="text-align: center; width: 50px;" rowspan="2">
                5 </td>
            <td colspan="2">
                Loyal </td>
        </tr>
        <tr>
            <td>
                <ol style="margin-bottom: 0; padding-left: 22px;">
                    <li>Memegang teguh ideologi Pancasila, Undang-Undang Dasar Negara Republik Indonesia Tahun 1945, setia pada NKRI serta pemerintahan yang sah
                    </li>
                    <li>Menjaga nama baik sesama ASN, Pimpinan, Instansi, dan Negara
                    </li>
                    <li>Menjaga rahasia jabatan dan negara</li>
                </ol>
            </td>
            <td style="width: 300px;">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks5 ?? '' }} <br>
                @if($user->eks)
                <a href="/ekspektasi.edit_perilaku_5/{{ $user->eks->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a>
                @endif 
            </td>
        </tr>
        <tr>
            <td style="text-align: center; width: 50px;" rowspan="2">
                6 </td>
            <td colspan="2">
                Adaptif </td>
        </tr>
        <tr>
            <td>
                <ol style="margin-bottom: 0; padding-left: 22px;">
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
                {{ optional($user->eks)->eks6 ?? '' }} <br>
                @if($user->eks)
                <a href="/ekspektasi.edit_perilaku_6/{{ $user->eks->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a>
                @endif 
            </td>
        </tr>
        <tr>
            <td style="text-align: center; width: 50px;" rowspan="2">
                7 </td>
            <td colspan="2">
                Kolaboratif </td>
        </tr>
        <tr>
            <td>
                <ol style="margin-bottom: 0; padding-left: 22px;">
                    <li>Memberi kesempatan kepada berbagai pihak untuk berkontribusi
                    </li>
                    <li>Terbuka dalam bekerjasama untuk menghasilkan nilai tambah
                    </li>
                    <li>Menggerakkan pemanfaatan berbagai sumber daya untuk tujuan bersama</li>
                </ol>
            </td>
            <td style="width: 300px;">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ optional($user->eks)->eks7 ?? '' }} <br>
                @if($user->eks)
                <a href="/ekspektasi.edit_perilaku_7/{{ $user->eks->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a>
                @endif 
            </td>
        </tr>
</table>