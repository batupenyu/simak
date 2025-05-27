    <img src="{{ public_path('image/kopsmkn1koba.png') }}">
    <table border="0" cellpadding="2" cellspasing="2">
        <tr>
            <td></td>
        </tr>
        @foreach ($data as $n)
        <tr>
            <td style="text-align: center">
            <b><u>SURAT PERNYATAAN MELAKSANAKAN TUGAS</u> <br>
            Nomor : {{$n->no_surat}}</b>
            <br>
            <br>
            </td>
        </tr>
        <tr>
            <td>Yang bertanda tangan dibawah ini: <br></td>
        </tr>
        <tr>
            <td style="width: 100px">Nama</td>
            <td style="width: 30px">&nbsp;&nbsp;&nbsp;:</td>
            <td>
                {{ $n->user->penilai->nama }}
            </td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td>
                {{ $n->user->penilai->nip }}
            </td>
        </tr>
        <tr>
            <td>Pangkat/Gol.</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td>
                {{ $n->user->penilai->pangkat_gol }}
            </td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td >
                {{ $n->user->penilai->jabatan }}
            </td>
        </tr>
    </table>
    <tr nobr = "true">
        <td> </td>
    </tr>
    <table border="0" cellpadding="2" >
        <tr>
            <td>dengan ini menyatakan dengan sesungguhnya bahwa: 
            </td>
        </tr>
    </table>
    <tr nobr = "true">
        <td> </td>
    </tr>
    <table border="0" cellpadding="2" >
        <tr>
            <td style="width: 100px">Nama</td>
            <td style="width: 30px">&nbsp;&nbsp;&nbsp;:</td>
            <td style="width: 385px">
                {{ $n->user->name }}
            </td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td  >
                {{ $n->user->nip }}
            </td>
        </tr>
        <tr>
            <td>Pangkat/Gol.</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td>
                {{ $n->user->pangkat_gol }}
            </td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td>
                {{ $n->user->jabatan }}
                @if ($n->user->pangkat_gol == 'Penata TK.I, III/b')
                Ahli Pertama
                @elseif ($n->user->pangkat_gol == 'Penata, III/c')
                Ahli Muda
                @elseif ($n->user->pangkat_gol == 'Penata TK.I, III/d')
                Ahli Muda
                @endif
            </td>
        </tr>
    </table>
    <tr nobr = "true">
        <td> </td>
    </tr>
    <table border="0" cellpadding="2" >
                        <?php 
                            $formatted_dt1 = Carbon\Carbon::Parse($n->tgl_awal);
                            $formatted_dt2 = Carbon\Carbon::Parse($n->tgl_akhir);
                            $date_diff = $formatted_dt1->diffInDays($formatted_dt2);
                        ?>
        
        <tr>
            <td style="text-align: justify">Yang diangkat berdasarkan {{ $n->sk_pejabat }} Nomor {{ $n->no_sk }} Tahun {{ Carbon\Carbon::Parse($n->sk_tgl)->format('Y') }} tanggal {{ Carbon\Carbon::Parse($n->sk_tgl)->translatedFormat(' d F Y') }} tentang {{ $n->sk_tentang }}, terhitung tanggal {{ Carbon\Carbon::Parse($n->tgl_surat)->translatedFormat(' d F Y') }} telah nyata menjalankan tugas sebagai {{ $n->sk_sebagai }} pada unit kerja {{ $n->user->unit_kerja }}.
            </td>
        </tr>
    </table>
    <tr nobr = "true">
        <td> </td>
    </tr>
    <table border="0" cellpadding="2" >
        <tr>
            <td style="text-align: justify">Demikian surat pernyataan melaksanakan tugas ini saya buat dengan sesungguhnya dengan mengingat sumpah jabatan/pegawai negeri sipil dan apabila dikemudian hari isi surat pernyataan ini temyata tidak benar yang berakibat kerugian bagi negara, maka saya bersedia menanggung kerugian tersebut. 
            </td>
        </tr>
    </table>
    <tr nobr = "true">
        <td> </td>
    </tr>
    <table border="0" cellpadding="2" >
        <br>
        <tr>
            <td style="width: 50%"></td>
            <td>
                <div class="div col-6 float-end" style="text-align: center">
                    <strong>
                        Koba,<strong>{{ Carbon\Carbon::Parse($n->tgl_surat)->translatedFormat(' d F Y') }} </strong>
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
            
        @endforeach
    
    </table>
</body>
</html>