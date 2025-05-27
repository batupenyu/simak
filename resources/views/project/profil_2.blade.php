<style>
    .info-cell {
        display: grid;
        grid-template-columns: auto 1fr; /* Kolom pertama untuk label, kolom kedua untuk nilai */
        gap: 10px; /* Spasi antara label dan nilai */
        align-items: baseline; /* Memastikan alignment vertikal sesuai dengan teks */
    }
    .label {
        text-align: right; /* Mengatur label rata kanan agar titik dua sejajar */
        padding-right: 5px; /* Memberi sedikit spasi antara label dan titik dua */
    }
</style>

<table border="1" cellpadding="3">
    <tr>
        <td style="width: 30px; text-align: center"><b>I</b></td>
        <td colspan="3" style="width: 494px"><b>KETERANGAN PERORANGAN</b></td>
    </tr>
    <tr>
        <td style="text-align: center">1.</td>
        <td colspan="3" class="info-cell">
            <span class="label">Nama:</span>
            <span>{{ $akintegrasi->user->name }}</span>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">2.</td>
        <td colspan="3" class="info-cell">
            <span class="label">NIP:</span>
            <span>{{ $akintegrasi->user->nip }}</span>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">3.</td>
        <td colspan="3" class="info-cell">
            <span class="label">Nomor Seri Karpeg:</span>
            <span>{{ $akintegrasi->user->no_karpeg }}</span>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">4.</td>
        <td colspan="3" class="info-cell">
            <span class="label">Tempat tanggal lahir:</span>
            <span>{{ $akintegrasi->user->tempat_lahir }} / {{ Carbon\Carbon::parse($akintegrasi->user->tgl_lahir)->translatedFormat('d F Y') }}</span>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">5.</td>
        <td colspan="3" class="info-cell">
            <span class="label">Jenis Kelamin:</span>
            <span>{{ $akintegrasi->user->jk }}</span>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">6.</td>
        <td colspan="3" class="info-cell">
            <span class="label">Pangkat/Golongan ruang/TMT:</span>
            <span>{{ $akintegrasi->user->pangkat_gol }} / {{ Carbon\Carbon::parse($akintegrasi->user->tmt_pangkat)->translatedFormat('d F Y') }}</span>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">7.</td>
        <td colspan="3" class="info-cell">
            <span class="label">Jabatan/TMT:</span>
            <span>
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
            </span>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">8.</td>
        <td colspan="3" class="info-cell">
            <span class="label">Unit Kerja:</span>
            <span>{{ $akintegrasi->user->unit_kerja }}</span>
        </td>
    </tr>
</table>