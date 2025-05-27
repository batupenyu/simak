
<table border="1" cellpadding="3">
    <tr>
        <td style="width: 30px;text-align:center"><b>I</b></td>
        <td colspan="3" style="width: 494px"><b>KETERANGAN PERORANGAN</b></td>
    </tr>
    <tr>
        <td style="text-align: center">1</td>
        <td colspan="3">
            <table>
                <tr>
                    <td>Nama</td>
                    <td style="width: 20px">:</td>
                    <td style="width: 494px">{{ $kredit->user->name }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">2</td>
        <td colspan="3">
            <table>
                <tr>
                    <td>NIP</td>
                    <td style="width: 20px">:</td>
                    <td style="width: 494px">{{ $kredit->user->nip }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">3</td>
        <td colspan="3">
            <table>
                <tr>
                    <td>Nomor Seri Karpeg</td>
                    <td style="width: 20px">:</td>
                    <td style="width: 494px">{{ $kredit->user->no_karpeg }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">4</td>
        <td colspan="3">
            <table>
                <tr>
                    <td>Tempat tanggal lahir</td>
                    <td style="width: 20px">:</td>
                    <td style="width: 494px">{{ $kredit->user->tempat_lahir }} / {{ Carbon\Carbon::parse($kredit->user->tgl_lahir)->translatedFormat('d F Y') }}</td>
                </tr>
            </table>
        </td>
    </tr>
     <tr>
        <td style="text-align: center">5</td>
        <td colspan="3">
            <table>
                <tr>
                    <td>Jenis Kelamin </td>
                    <td style="width: 20px">:</td>
                    <td style="width: 494px">{{ $kredit->user->jk }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">6</td>
        <td colspan="3">
            <table>
                <tr>
                        @php
                            if ($kredit->user->pangkat_gol =='Penata Muda, III/a') {
                                $jenjang = 'Ahli Pertama';
                            } elseif ($kredit->user->pangkat_gol =='Penata Muda TK.I, III/b') {
                                $jenjang = 'Ahli Pertama';
                            } elseif ($kredit->user->pangkat_gol =='Penata, III/c') {
                                $jenjang = 'Ahli Muda';
                            } elseif ($kredit->user->pangkat_gol =='Penata TK.I, III/d') {
                                $jenjang = 'Ahli Muda';
                            } elseif ($kredit->user->pangkat_gol =='Pembina, IV/a') {
                                $jenjang = 'Ahli Madya';
                            } else {
                                echo '';
                            }
                        @endphp
                    <td>Pangkat/Golongan ruang/TMT </td>
                    <td style="width: 20px">:</td>
                    <td style="width: 494px">{{ $kredit->user->pangkat_gol }} / {{ Carbon\Carbon::parse($kredit->user->tmt_pangkat)->translatedFormat('d F Y') }}
                    </td>
                </tr>
             
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">7</td>
        <td colspan="3">
            <table>
                <tr>
                        @php
                            if ($kredit->user->pangkat_gol =='Penata Muda, III/a') {
                                $jenjang = 'Ahli Pertama';
                            } elseif ($kredit->user->pangkat_gol =='Penata Muda TK.I, III/b') {
                                $jenjang = 'Ahli Pertama';
                            } elseif ($kredit->user->pangkat_gol =='Penata, III/c') {
                                $jenjang = 'Ahli Muda';
                            } elseif ($kredit->user->pangkat_gol =='Penata TK.I, III/d') {
                                $jenjang = 'Ahli Muda';
                            } elseif ($kredit->user->pangkat_gol =='Pembina, IV/a') {
                                $jenjang = 'Ahli Madya';
                            } else {
                                echo '';
                            }

                         
                        @endphp
                    <td>Jabatan/TMT </td>
                    <td style="width: 20px">:</td>
                    <td style="width: 494px">{{ $jenjang }}/ {{ Carbon\Carbon::parse($kredit->user->tmt_jabatan)->translatedFormat('d F Y') }}
                    </td>
                </tr>
             
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">8</td>
        <td colspan="3">
            <table>
                
                <tr>
                    <td>Unit Kerja </td>
                    <td style="width: 20px">:</td>
                    <td style="width: 494px">{{ $kredit->user->unit_kerja }}</td>

                </tr>
              
            </table>
        </td>
    </tr>
</table>