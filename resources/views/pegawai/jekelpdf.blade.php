
    <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print tampil"></i></button>
        @include('pegawai.link')
        <p style="text-align: center"><strong>REKAP PEGAWAI BERDASAR JENIS KELAMIN<br>
                SMK NEGERI 1 SIMPANG RIMBA
            </strong>
        </p>

        <table border="1" cellpadding="2" cellspacing="0" >
            <tr style="text-align: center; background-color:rgb(182, 188, 193)">
                <th style="width: 30px" rowspan="2">No</th>
                <th style="width: 150px" rowspan="2">Nama Sekolah</th>
                <th colspan="3">Jumlah Guru</th>
                <th colspan="2">Jumlah Tenaga <br>Administrasi Sekolah</th>
            </tr>
            <tr style="text-align: center; background-color:rgb(182, 188, 193)">
                <th>Guru PNS</th>
                <th>Guru P3K</th>
                <th>GTT</th>
                <th>PNS</th>
                <th>PTT</th>
            </tr>
            <tr>
                <td style="text-align: center">1.</td>
                <td>SMKN 1 Simpang Rimba</td>
                <td style="text-align: center">{{ $pnsguru }}</td>
                <td style="text-align: center">{{ $p3k }}</td>
                <td style="text-align: center">{{ $gtt }}</td>
                <td style="text-align: center">{{ $pnstu }}</td>
                <td style="text-align: center">{{ $ptt}}</td>
            </tr>
        </table>
        <tr nobr = "true">
            <td> </td>
        </tr>
        <table border="1" cellpadding="2" cellspacing="0" style="width: 695px" >
            <tr style="text-align: center; background-color:rgb(182, 188, 193)">
                <th style="width: 30px" rowspan="2">No</th>
                <th style="width: 150px" rowspan="2">Nama Sekolah</th>
                <th colspan="3">Jumlah GTT</th>
                <th colspan="3">Jumlah PTT</th>
            </tr>
            <tr style="text-align: center; background-color:rgb(182, 188, 193)">
                <th>APBN</th>
                <th>APBD</th>
                <th>IPP</th>
                <th>APBN</th>
                <th>APBD</th>
                <th>IPP</th>
            </tr>
            <tr>
                <td style="text-align: center">1.</td>
                <td>SMKN 1 Simpang Rimba</td>
                <td style="text-align: center">{{ $gttapbn }}</td>
                <td style="text-align: center">{{ $gttapbd }}</td>
                <td style="text-align: center">{{ $gttipp }}</td>
                <td style="text-align: center">{{ $pttapbn }}</td>
                <td style="text-align: center">{{ $pttapbd }}</td>
                <td style="text-align: center">{{ $pttipp }}</td>
            </tr>
        </table>
