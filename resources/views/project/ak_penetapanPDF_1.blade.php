{{-- @if ($akintegrasi != null) --}}
    @forelse ($periodeAK as $data) 
        @forelse ($periodeAK as $kredit)
        @empty
        -
        @endforelse
        <p style="text-align: center">
            <b>PENETAPAN ANGKA KREDIT<br />
                NOMOR : 800/ ....... /SMKN 1 Kb/Dindik/{{ Carbon\Carbon::parse($kredit->tgl_penetapan)->translatedFormat('Y')}}/PAK</b>
        </p>
    <table border="0" cellpadding="2">
        @if ($periode !== null)
        <tr>
            <td>Instansi : Dinas Pendidikan Prov. Kep. Bangka Belitung</td>
            <td style="text-align: right">
                Periode :
                {{ Carbon\Carbon::parse($start_date)->translatedFormat('d F') }}
                - {{ Carbon\Carbon::parse($end_date)->translatedFormat('d F Y') }}
            </td>
        </tr>
        @else @endif
    </table>
    @include('project.profil_1')
    <table border="1" cellpadding="2">
        <tr>
            <td style="text-align: center"><b>HASIL PENILAIAN ANGKA KREDIT</b></td>
        </tr>
    </table>

    <table border="1" cellpadding="2">
        <tr style="text-align: center">
            <td style="width: 30px"><b>II</b></td>
            <td style="width: 218px"><b>PENETAPAN ANGKA KREDIT</b></td>
            <td style="width: 65px"><b>LAMA</b></td>
            <td style="width: 65px"><b>BARU</b></td>
            <td style="width: 70px"><b>JUMLAH</b></td>
            <td style="width: 76px"><b>KETERANGAN</b></td>
        </tr>
        <tr style="text-align: center">
            <td><b>1</b></td>
            <td><b>2</b></td>
            <td><b>3</b></td>
            <td><b>4</b></td>
            <td><b>5</b></td>
            <td><b>6</b></td>
        </tr>

        <?php

        //ak pangkat
        
        if ($akintegrasi->user->pangkat_gol == "Penata Muda, III/a") { // III/a ke III/b 
            $lama = 0;
        } elseif ($akintegrasi->user->pangkat_gol == "Penata Muda TK.I, III/b") { // III/b ke III/c 
            $lama = 50;
        } elseif ($akintegrasi->user->pangkat_gol == "Penata, III/c") { //III/c ke III/d 
            $lama = 0;
        } elseif ($akintegrasi->user->pangkat_gol == "Penata TK.I, III/d") { // III/d ke IV/a 
            $lama = 100;
        } elseif ($akintegrasi->user->pangkat_gol == "Pembina, IV/a") { // IV/a ke IV/b 
            $lama = 0;
        } elseif ($akintegrasi->user->pangkat_gol == "Pembina TK.I, IV/b") { //IV/b ke IV/c 
            $lama = 150;
        } else {
            echo '';
        }

    

        if ($akintegrasi->user->pangkat_gol == "Penata Muda, III/a") { // III/a ke III/b 
            $pangkat = 50;
        } elseif ($akintegrasi->user->pangkat_gol == "Penata Muda TK.I, III/b") { // III/b ke III/c 
            $pangkat = 50;
        } elseif ($akintegrasi->user->pangkat_gol == "Penata, III/c") { //III/c ke III/d 
            $pangkat = 100;
        } elseif ($akintegrasi->user->pangkat_gol == "Penata TK.I, III/d") { // III/d ke IV/a 
            $pangkat = 200;
        } elseif ($akintegrasi->user->pangkat_gol == "Pembina, IV/a") { // IV/a ke IV/b 
            $pangkat = 150;
        } elseif ($akintegrasi->user->pangkat_gol == "Pembina TK.I, IV/b") { //IV/b ke IV/c 
            $pangkat = 150;
        } else {
            echo '';
        }


        //ak jabatan ;

        if ($akintegrasi->user->pangkat_gol == "Penata Muda, III/a") { // ke Ahli Pertama 
            $jabatan = 100;
        } elseif ($akintegrasi->user->pangkat_gol == "Penata Muda TK.I, III/b") { // ke Ahli Muda 
            $jabatan = 100;
        } elseif ($akintegrasi->user->pangkat_gol == "Penata, III/c") { // ke Ahli Muda 
            $jabatan = 200;
        } elseif ($akintegrasi->user->pangkat_gol == "Penata TK.I, III/d") { // ke Ahli Madya 
            $jabatan = 200;
        } elseif ($akintegrasi->user->pangkat_gol == "Pembina, IV/a") { // ke Ahli Madya 
            $jabatan = 450;
        } else {
            echo '';
        }



        $ab = $pegawai->ak_baru;
        $tak = $total + $integrasi;
        $ap = $pegawai->ak_pangkat;
        $aj = $pegawai->ak_jenjang;
        ?>

@forelse ($periodeAK as $kredit)
        
        <?php

            $predikat = $kredit->predikat;

                if ($predikat = 'Sangat Baik') {
                    $level = 150;
                } elseif ($predikat = 'Baik') {
                    $level = 100;
                } elseif ($predikat = 'Butuh Perbaikan') {
                    $level = 75;
                } elseif ($predikat = 'Kurang') {
                    $level = 50;
                } elseif ($predikat = 'Sangat Kurang') {
                    $level = 25;
                }


            
            if ($kredit->user->pangkat_gol == 'Penata Muda, III/a') {
                $jenjang = 'Ahli Pertama';
            } elseif ($kredit->user->pangkat_gol == 'Penata Muda TK.I, III/b') {
                $jenjang = 'Ahli Pertama';
            } elseif ($kredit->user->pangkat_gol == 'Penata, III/c') {
                $jenjang = 'Ahli Muda';
            } elseif ($kredit->user->pangkat_gol == 'Penata TK.I, III/d') {
                $jenjang = 'Ahli Muda';
            } elseif ($kredit->user->pangkat_gol == 'Pembina, IV/a') {
                $jenjang = 'Ahli Madya';
            } else {
                echo '';
            }

            if ($jenjang == 'Ahli Pertama'){
                $koe = 12.5;
            } elseif ($jenjang == 'Ahli Muda') {
                $koe = 25;
            } else {
                $koe = 37.5;
            }

            $date1 = $kredit->tgl_awal_penilaian;
            $date2 = $kredit->tgl_akhir_penilaian;
            $predikat = $kredit->predikat;
            $ts1 =    strtotime($date1);
            $ts2 = strtotime($date2);
            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);
            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);
            $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
            $periodik = $diff + 1;
            $hasil = ($periodik / 12) * $koe * $level / 100;
            // echo number_format($hasil, 3); 
            ?>
        @empty
        @endforelse
        <tr>
            <td style="text-align: center">1.</td>
            <td> AK dasar yang diberikan</td>
            <td style="text-align: center">-</td>
            <td style="text-align: center">-</td>
            <td style="text-align: center">-</td>
            <td style="text-align: center">-</td>
        </tr>
        <tr>
            <td style="text-align: center">2.</td>
            <td> AK JF lama</td>
            <td style="text-align: center">-</td>
            <td style="text-align: center">-</td>
            <td style="text-align: center">-</td>
            <td style="text-align: center">-</td>
        </tr>
        <tr>
            <td style="text-align: center">3.</td>
            <td> AK Penyesuaian/Penyetaraan</td>
            <td style="text-align: center">-</td>
            <td style="text-align: center">-</td>
            <td style="text-align: center">-</td>
            <td style="text-align: center">-</td>
        </tr>
            
            
            <?php
            $date1 = $data->tgl_awal_penilaian;
            $date2 = $data->tgl_akhir_penilaian;
            $predikat = $data->predikat;
            $ts1 = strtotime($date1);
            $ts2 = strtotime($date2);
            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);
            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);
            $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
            $periodik = $diff + 1;
            $hasil = ($periodik / 12) * $koe * $level / 100;
            $ak_integrasi = $akintegrasi->user->ak_integrasi;
            ?> 
        
            @php
                // Akumulasi berdasarkan jenjang
            
            if ($kredit->user->pangkat_gol == 'Penata Muda, III/a') {
                $baru = ($total)-0;
            } elseif ($kredit->user->pangkat_gol == 'Penata Muda TK.I, III/b') {
                $baru = ($total)-50;
            } elseif ($kredit->user->pangkat_gol == 'Penata, III/c') {
                $baru = ($total)-0;
            } elseif ($kredit->user->pangkat_gol == 'Penata TK.I, III/d') {
                $baru = ($total+$ak_integrasi)-100;
            } else {
                echo '';
            }

            @endphp
        
        <tr>
            <td style="text-align: center">4.</td>
            <td> AK Konversi</td>
            <td style="text-align: center">
                @if ($integrasi == 0 )
                {{number_format($integrasi,3)}}
                @else
                    @if ($total+$ak_integrasi > $lama)
                        {{number_format($lama,3)}}
                    @else
                        {{number_format($ak_integrasi,3)}}
                    @endif
                @endif
            </td>
            <td style="text-align: center">
                @if ($integrasi == 0 )
                    {{number_format($total,3)}}
                @else
                    @if ($total+$ak_integrasi > $lama)
                        {{number_format($total+$ak_integrasi -$lama,3)}}
                    @else
                        {{number_format($total,3)}}
                    @endif
                @endif
            </td>
            <td style="text-align: center">
                @if ($integrasi == 0 )
                    {{number_format($total,3)}}
                @else
                    @if ($total+$ak_integrasi > $lama)
                        {{number_format($lama+($total+$ak_integrasi -$lama),3)}}
                    @else
                        {{number_format($ak_integrasi+$total,3)}}
                    @endif
                @endif
            </td>
            <td style="text-align: center">-
            </td>
        </tr>
        
        <tr>
            <td style="text-align: center">5.</td>
            <td> AK yang diperoleh dari peningkatan pendidikan</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center">6.</td>
            <td>.....................</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center" colspan="2">
                <b>TOTAL ANGKA KREDIT</b>
            </td>
            <td style="text-align: center">
                @if ($integrasi == 0 )
                    {{number_format($integrasi,3)}}
                @else
                    @if ($total+$ak_integrasi > $lama)
                        {{number_format($lama,3)}}
                    @else
                        {{number_format($ak_integrasi,3)}}
                    @endif
                @endif
            </td>
            <td style="text-align: center">
                @if ($integrasi == 0 )
                    {{number_format($total,3)}}
                @else
                    @if ($total+$ak_integrasi > $lama)
                        {{number_format($total+$ak_integrasi -$lama,3)}}
                    @else
                        {{number_format($total,3)}}
                    @endif
                @endif
            </td>
            <td style="text-align: center">
                @if ($integrasi == 0 )
                    {{number_format($total,3)}}
                @else
                    @if ($total+$ak_integrasi > $lama)
                        {{number_format($lama+($total+$ak_integrasi -$lama),3)}}
                    @else
                        {{number_format($ak_integrasi+$total,3)}}
                    @endif
                @endif
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="6" style="background-color: rgb(201, 196, 196)"></td>
        </tr>
    </table>
    <table border="1" cellpadding="2">
        <tr>
            <td style="text-align: center">
                <b>KONVERSI PREDIKAT KINERJA KE ANGKA KREDIT</b>
            </td>
        </tr>
    </table>
    <table border="1" cellpadding="2">
        <tr style="text-align: center">
            <td style="width: 252px"><b>Keterangan</b></td>
            <td style="width: 136px"><b>Pangkat</b></td>
            <td style="width: 136px"><b>Jenjang Jabatan</b></td>
        </tr>
        <tr>
            <td>Angka Kredit minimal yang harus dipenuhi untuk kenaikan pangkat /
                jenjang
            </td>
            <td style="text-align: right">
                <?php echo number_format($pangkat, 3) ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td style="text-align: right">
                <?php echo number_format($jabatan, 3) ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
        </tr>
        <tr>
            <style>
                .variablecolor{
                color: blue;}
            </style>
            @php
                if ($integrasi == 0) {
                    if (($total-$pangkat)>0 ) {
                        $x ='Kelebihan';
                    }else {
                        $x= 'Kekurangan';
                    }
                } else {
                    if ($total+$ak_integrasi > $lama) {
                        if (($lama+($total+$ak_integrasi -$lama))-$pangkat  >0 ) {
                            $x ='Kelebihan';
                        }else {
                            $x= 'Kekurangan';
                        }   
                    } else {
                        if (($ak_integrasi+$total)-$pangkat >0) {
                            $x ='Kelebihan';
                        } else {
                            $x= 'Kekurangan';
                        }
                    }
                }
            @endphp
            @php
                if ($integrasi == 0) {
                    if (($total-$jabatan)>0 ) {
                        $jab ='Kelebihan';
                    }else {
                        $jab= 'Kekurangan';
                    }
                } else {
                    if ($total+$ak_integrasi > $lama) {
                        if (($lama+($total+$ak_integrasi -$lama))-$jabatan  >0 ) {
                            $jab ='Kelebihan';
                        }else {
                            $jab= 'Kekurangan';
                        }   
                    } else {
                        if (($ak_integrasi+$total)-$jabatan >0) {
                            $jab ='Kelebihan';
                        } else {
                            $jab= 'Kekurangan';
                        }
                    }
                }
            @endphp
            <td><b><i>{{$x}}</i></b> /
                @if ($x=='Kelebihan')
                    <del><i>Kekurangan</i></del>*)
                @else
                    <del><i>Kelebihan</i></del>*)
                @endif
                Angka Kredit yang harus dicapai untuk kenaikan pangkat
            
            </td>
            <td style="text-align: right">
                @if ($integrasi == 0 )
                    {{number_format($total-$pangkat,3)}}
                @else
                    @if ($total+$ak_integrasi > $lama)
                        {{number_format(($lama+($total+$ak_integrasi -$lama))-$pangkat,3)}}
                    @else
                        {{number_format(($ak_integrasi+$total)-$pangkat,3)}}
                    @endif
                @endif
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td></td>
        </tr>
        <tr>
            
            <td><b><i>{{$jab}}</i></b> /
                @if ($jab=='Kelebihan')
                    <del><i>Kekurangan</i></del>*)
                @else
                    <del><i>Kelebihan</i></del>*) 
                @endif
                Angka Kredit yang harus dicapai untuk kenaikan jabatan
            
            </td>
            
            <td></td>
            <td style="text-align: right">
                @if ($integrasi == 0 )
                    {{number_format($total-$jabatan,3)}}
                @else
                    @if ($total+$ak_integrasi > $lama)
                        {{number_format(($lama+($total+$ak_integrasi -$lama))-$jabatan,3)}}
                    @else
                        {{number_format(($ak_integrasi+$total)-$jabatan,3)}}
                    @endif
                @endif
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
        </tr>
        <tr>
            <td style="text-align: justify" colspan="3"><?php
                if ($tak > $pangkat && $pegawai->pangkat_gol == "Penata Muda, III/a" && $jenjang == "Ahli Pertama") {
                    echo "<b><i>" . "Dapat " . "</i></b>" . "dipertimbangkan untuk kenaikan " . "<b><i>" . "Pangkat/Jabatan" . "</i></b>" . " setingkat lebih tinggi menjadi " . "<b><i>" . ($pegawai->jabatan) . " Jenjang Ahli Pertama " . "</i></b>" . " Pangkat/Golongan Ruang " . "<b><i>" . " Penata Muda TK.I, III/b" . "</i></b>";

                } elseif ($tak > $pangkat && $pegawai->pangkat_gol == "Penata Muda TK.I, III/b" && $jenjang == "Ahli Pertama") {
                    echo "<b><i>" . "Dapat" . "</i></b>" . " dipertimbangkan untuk kenaikan " . "<b><i>" . "Pangkat/Jabatan" . "</i></b>" . " setingkat lebih tinggi menjadi " . "<b><i>" . ($pegawai->jabatan) . " Jenjang Ahli Muda" . "</i></b>" . " Pangkat/Golongan Ruang " . "<b><i>" . "Penata, III/c" . "</i></b>";

                } elseif ($tak > $pangkat && $pegawai->pangkat_gol == "Penata, III/c" && $jenjang == "Ahli Muda") {
                    echo "<b><i>" . "Dapat" . "</i></b>" . " dipertimbangkan untuk kenaikan " . "<b><i>" . "Pangkat/Jabatan" . "</i></b>" . " setingkat lebih tinggi menjadi " . "<b><i>" . ($pegawai->jabatan) . " Jenjang Ahli Muda" . "</i></b>" . " Pangkat/Golongan Ruang " . "<b><i>" . "Penata TK.I, III/d" . "</i></b>";

                    // ------------------------------------------- BATAS  -------------------------------------------

                } elseif ($tak < $pangkat && $pegawai->pangkat_gol == "Penata TK.I, III/d" && $jenjang == "Ahli Muda") {
                    echo "<b><i>" . "Tidak dapat" . "</i></b>" . " dipertimbangkan untuk kenaikan " . "<b><i>" . "Pangkat/Jabatan" . "</i></b>" . " setingkat lebih tinggi menjadi " . "<b><i>" . ($pegawai->jabatan) . " Jenjang Ahli Madya" . "</i></b>" . " Pangkat/Golongan Ruang " . "<b><i>" . "Pembina, IV/a" . "</i></b>";
                    
                } elseif ($tak > $pangkat && $pegawai->pangkat_gol == "Penata TK.I, III/d" && $jenjang == "Ahli Muda" && $tak < $jabatan) {
                    echo "<b><i>" . "Tidak Dapat" . "</i></b>" . " dipertimbangkan untuk kenaikan " . "<b><i>" . "Pangkat/Jabatan" . "</i></b>" . " setingkat lebih tinggi menjadi " . "<b><i>" . ($pegawai->jabatan) . " Jenjang Ahli Madya" . "</i></b>" . " Pangkat/Golongan Ruang " . "<b><i>" . "Pembina, IV/a" . "</i></b>";

                } elseif ($tak > $jabatan && $pegawai->pangkat_gol == "Penata TK.I, III/d" && $jenjang == "Ahli Muda") {
                    echo "<b><i>" . "Dapat" . "</i></b>" . " dipertimbangkan untuk kenaikan " . "<b><i>" . "Pangkat/Jabatan" . "</i></b>" . " setingkat lebih tinggi menjadi " . "<b><i>" . ($pegawai->jabatan) . " Jenjang Ahli Madya" . "</i></b>" . " Pangkat/Golongan Ruang " . "<b><i>" . "Pembina, IV/a" . "</i></b>";

                } else {
                    echo "";
                } ?>
            </td>
        </tr>
    </table>
    <tr nobr="true">
        <td></td>
    </tr>

    <table border="0" cellpadding="2">
        <tr>
            <td style="width: 60%">ASLI disampaikan dengan hormat kepada: <br />
                Jabatan Fungsional yang bersangkutan. <br /><br />

                Tembusan disampaikan kepada: <br />
                1. Pimpinan Unit Kerja; <br />
                2. Pejabat Penilai Kinerja; <br />
                3. Sekretaris Tim Penilai yang bersangkutan; dan <br />
                4. Kepala Biro Kepegawaian dan Organisasi.
            </td>
            <td style="width: 40%">Ditetapkan di Koba. <br />
                Pada tanggal, {{ Carbon\Carbon::parse($kredit->tgl_penetapan)->translatedFormat('d F Y.')}}<br />
                Pejabat Penilai Kinerja,
                <br />
                <br />
                <br />
                <br />
                {{$akintegrasi->penilai->nama}}
                <br>NIP. {{$akintegrasi->penilai->nip}}
            </td>
        </tr>
    </table>

@empty 
@endforelse

{{-- @else
    <div class="btn btn-warning mt-3"><i><b>ZONK BRO... !!.. AK belum diusulkan, TENGKIW. </b></i></div>
@endif --}}
