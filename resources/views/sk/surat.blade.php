 <table class="table table-sm table-borderless" >
        <tr>
            <th style="text-align: center" colspan="3">
            <u>
                SURAT PERNYATAAN MELAKSANAKAN TUGAS <br>
            </u>
            NOMOR : 800/ 
            @if ($n->no_surat == '')
                ..........
            @else
                {{ $n->no_surat }}
            @endif
            /SMKN1/SR/
            {{ Carbon\Carbon::Parse($n->tgl_surat)->format('Y') }} 
            <br> <br><br>
        </tr>
        <tr>
            <td colspan="3" style="height: 1cm">
                Yang bertanda tangan dibawah ini: 
            </td>
        </tr>
        <br> <br> <br>
        <tr>
            <td style="padding-left: 30px">Nama</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px">
                {{ $n->user->penilai->nama }}
            </td>
        </tr>
        <tr>
            <td style="padding-left: 30px">NIP</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px">
                {{ $n->user->penilai->nip }}
            </td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Pangkat/Gol.</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px">
                {{ $n->user->penilai->pangkat_gol }}
            </td>
        </tr>
        <tr>
            <td style="padding-left: 30px; height:1cm">Jabatan</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px">
                {{ $n->user->penilai->jabatan }}
            </td>
        </tr>
        <tr>
            <td colspan="3" style="height: 1cm">
                dengan ini menyatakan dengan sesungguhnya bahwa: 
            </td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Nama</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px" >
                {{ $n->user->name }}
            </td>
        </tr>
        <tr class="align-top">
            <td style="padding-left: 30px">NIP</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px" >
                {{ $n->user->nip }}
            </td>
        </tr>
        <tr class="align-top">
            <td style="padding-left: 30px">Pangkat/Gol.</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px; height: 1cm" >
                {{ $n->user->pangkat_gol }}
            </td>
        </tr>
        <tr>
            <td style="padding-left: 30px">Jabatan</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td style="margin-bottom: 0; padding-left: 17px" >
                {{ $n->user->jabatan }}
            </td>
        </tr>
                        <?php 
                            $formatted_dt1 = Carbon\Carbon::Parse($n->tgl_awal);
                            $formatted_dt2 = Carbon\Carbon::Parse($n->tgl_akhir);
                            $date_diff = $formatted_dt1->diffInDays($formatted_dt2);
                        ?>
        
        <tr>
            <td colspan="3" style="text-align: justify">
                Yang diangkat berdasarkan {{ $n->sk_pejabat }} Nomor {{ $n->no_sk }} Tahun 
                {{ Carbon\Carbon::Parse($n->sk_tgl)->format('Y') }} tanggal {{ Carbon\Carbon::Parse($n->sk_tgl)->translatedFormat(' d F Y') }} 
                tentang {{ $n->sk_tentang }}, terhitung tanggal {{ Carbon\Carbon::Parse($n->tgl_surat)->translatedFormat(' d F Y') }} 
                telah nyata menjalankan tugas sebagai {{ $n->sk_sebagai }} pada unit kerja {{ $n->user->unit_kerja }}.
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: justify">
                Demikian surat pernyataan melaksanakan tugas ini saya buat 
                dengan sesungguhnya dengan mengingat sumpah jabatan/pegawai 
                negeri sipil dan apabila dikemudian hari isi surat pernyataan ini
                temyata tidak benar yang berakibat kerugian bagi negara, maka saya
                bersedia menanggung kerugian tersebut. 
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <br><br><br>
                <div class="div col-6 float-end" style="text-align: center">
                    <strong>
                        Simpang Rimba,
                                <strong>
                                    {{ Carbon\Carbon::Parse($n->tgl_surat)->translatedFormat(' d F Y') }} 
                                </strong>
                        <br>
                        Kepala Sekolah, <br>
                        <br><br><br>
                                {{ $n->user->penilai->nama }} <br>
                                NIP. {{ $n->user->penilai->nip }} <br>
                        <br>
                    </strong>
                </div>
            </td>
        </tr>
    </table>
    