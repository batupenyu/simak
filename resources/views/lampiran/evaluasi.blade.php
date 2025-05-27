
<table class="table table-bordered border-primary">
    <tbody>
        <tr>
            <td colspan="2" >
                <div  class="center">
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
                {{ $user->eks->eks1 }} 
                <a href="/ekspektasi.edit_perilaku_1/{{ $user->eks->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a> 

            </td>
            <td style="width: 300px;">
                {{ $user->umpan->umpan1 }}
                <a href="{{ url('umpan.edit1/'.$user->umpan->id) }}"><i class=" fa fa-edit tampil"></i> </a>
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
                        {{ $user->eks->eks2 }} <br>
                        <a href="/ekspektasi.edit_perilaku_2/{{ $user->eks->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a> 
                    </td>
                    <td style="width: 300px;">
                        {{ $user->umpan->umpan2 }}
                        <a href="{{ url('umpan.edit2/'.$user->umpan->id) }}"><i class=" fa fa-edit tampil "></i> </a>
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
                {{ $user->eks->eks3 }} 
                <a href="/ekspektasi.edit_perilaku_3/{{ $user->eks->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a> 
            </td>
            <td style="width: 300px;">
            {{ $user->umpan->umpan3 }}
            <a href="{{ url('umpan.edit3/'.$user->umpan->id) }}"><i class=" fa fa-edit tampil"></i> </a>
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
                {{ $user->eks->eks4 }} 
                <a href="/ekspektasi.edit_perilaku_4/{{ $user->eks->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a> 
                <td style="width: 300px;">
                {{ $user->umpan->umpan4 }}
                <a href="{{ url('umpan.edit4/'.$user->umpan->id) }}"><i class=" fa fa-edit tampil"></i> </a>
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
                {{ $user->eks->eks5 }} 
                <a href="/ekspektasi.edit_perilaku_5/{{ $user->eks->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a> 
                <td style="width: 300px;">
                {{ $user->umpan->umpan5 }}
                <a href="{{ url('umpan.edit5/'.$user->umpan->id) }}"><i class=" fa fa-edit tampil"></i> </a>
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
                {{ $user->eks->eks6 }} 
                <a href="/ekspektasi.edit_perilaku_6/{{ $user->eks->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a> 
            <td style="width: 300px;">
            {{ $user->umpan->umpan6 }}
            <a href="{{ url('umpan.edit6/'.$user->umpan->id) }}"><i class=" fa fa-edit tampil"></i> </a>
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
                    <li>Terbuka dalam bekerjasama untuk menghasilkan nilai tambah
                    </li>
                    <li>Menggerakkan pemanfaatan berbagai sumber daya untuk tujuan bersama</li>
                </ol>
            </td>
            <td style="width: 300px;">
                Ekspektasi Khusus Pimpinan:
                <br>
                {{ $user->eks->eks7 }} 
                <a href="/ekspektasi.edit_perilaku_7/{{ $user->eks->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a> 
                <td style="width: 300px;">
                {{ $user->umpan->umpan7 }}
                <a href="{{ url('umpan.edit7/'.$user->umpan->id) }}"><i class=" fa fa-edit tampil"></i> </a>
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