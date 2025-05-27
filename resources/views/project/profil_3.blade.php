<table style="width: 100%; border-collapse: collapse;">
    <colgroup>
        <col style="width: 30px;">
        <col style="width: 200px;">
        <col style="width: 10px;">
        <col style="width: auto;">
    </colgroup>
    <tr>
        <td style="text-align: center; border: 1px solid black; padding: 3px;"><b>I</b></td>
        <td colspan="3" style="border: 1px solid black; padding: 3px;"><b>KETERANGAN PERORANGAN</b></td>
    </tr>
    <tr>
        <td style="text-align: center; border: 1px solid black; padding: 3px;">1.</td>
        <td style="border: 1px solid black; border-right: none; padding: 3px 0 3px 3px;">Nama</td>
        <td style="text-align: center; padding: 3px 0;">:</td>
        <td style="border: 1px solid black; border-left: none; padding: 3px 3px 3px 5px;">{{ $akintegrasi->user->name }}</td>
    </tr>
    <tr>
        <td style="text-align: center; border: 1px solid black; padding: 3px;">2.</td>
        <td style="border: 1px solid black; border-right: none; padding: 3px 0 3px 3px;">NIP</td>
        <td style="text-align: center; padding: 3px 0;">:</td>
        <td style="border: 1px solid black; border-left: none; padding: 3px 3px 3px 5px;">{{ $akintegrasi->user->nip }}</td>
    </tr>
    <tr>
        <td style="text-align: center; border: 1px solid black; padding: 3px;">3.</td>
        <td style="border: 1px solid black; border-right: none; padding: 3px 0 3px 3px;">Nomor Seri Karpeg</td>
        <td style="text-align: center; padding: 3px 0;">:</td>
        <td style="border: 1px solid black; border-left: none; padding: 3px 3px 3px 5px;">{{ $akintegrasi->user->no_karpeg }}</td>
    </tr>
    <tr>
        <td style="text-align: center; border: 1px solid black; padding: 3px;">4.</td>
        <td style="border: 1px solid black; border-right: none; padding: 3px 0 3px 3px;">Tempat tanggal lahir</td>
        <td style="text-align: center; padding: 3px 0;">:</td>
        <td style="border: 1px solid black; border-left: none; padding: 3px 3px 3px 5px;">{{ $akintegrasi->user->tempat_lahir }} / {{ Carbon\Carbon::parse($akintegrasi->user->tgl_lahir)->translatedFormat('d F Y') }}</td>
    </tr>
    <tr>
        <td style="text-align: center; border: 1px solid black; padding: 3px;">5.</td>
        <td style="border: 1px solid black; border-right: none; padding: 3px 0 3px 3px;">Jenis Kelamin</td>
        <td style="text-align: center; padding: 3px 0;">:</td>
        <td style="border: 1px solid black; border-left: none; padding: 3px 3px 3px 5px;">{{ $akintegrasi->user->jk }}</td>
    </tr>
    <tr>
        <td style="text-align: center; border: 1px solid black; padding: 3px;">6.</td>
        <td style="border: 1px solid black; border-right: none; padding: 3px 0 3px 3px;">Pangkat/Golongan ruang/TMT</td>
        <td style="text-align: center; padding: 3px 0;">:</td>
        <td style="border: 1px solid black; border-left: none; padding: 3px 3px 3px 5px;">{{ $akintegrasi->user->pangkat_gol }} / {{ Carbon\Carbon::parse($akintegrasi->user->tmt_pangkat)->translatedFormat('d F Y') }}</td>
    </tr>
    <tr>
        <td style="text-align: center; border: 1px solid black; padding: 3px;">7.</td>
        <td style="border: 1px solid black; border-right: none; padding: 3px 0 3px 3px;">Jabatan/TMT</td>
        <td style="text-align: center; padding: 3px 0;">:</td>
        <td style="border: 1px solid black; border-left: none; padding: 3px 3px 3px 5px;">
            {{$akintegrasi->user->jabatan }} 
            @php
                if ($akintegrasi->user->pangkat_gol =='Penata Muda, III/a') {
                    $jenjang = 'Ahli Pertama';
                } elseif ($akintegrasi->user->pangkat_gol =='Penata Muda TK.I, III/b') {
                    $jenjang = 'Ahli Pertama';
                } elseif ($akintegrasi->user->pangkat_gol =='Penata, III/c') {
                    $jenjang = 'Ahli Muda';
                } elseif ($akintegrasi->user->pangkat_gol =='Penata TK.I, III/d') {
                    $jenjang = 'Ahli Muda';
                } elseif ($akintegrasi->user->pangkat_gol =='Pembina, IV/a') {
                    $jenjang = 'Ahli Madya';
                } else {
                    echo '';
                }
                echo $jenjang;
            @endphp
            /{{ Carbon\Carbon::parse($akintegrasi->user->tmt_jabatan)->translatedFormat('d F Y') }}
        </td>
    </tr>
    <tr>
        <td style="text-align: center; border: 1px solid black; padding: 3px;">8.</td>
        <td style="border: 1px solid black; border-right: none; padding: 3px 0 3px 3px;">Unit Kerja</td>
        <td style="text-align: center; padding: 3px 0;">:</td>
        <td style="border: 1px solid black; border-left: none; padding: 3px 3px 3px 5px;">{{ $akintegrasi->user->unit_kerja }}</td>
    </tr>
</table>