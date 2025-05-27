<table border="1" cellpadding="2" cellspacing="0" >
    <tr>
        <th style="text-align: center; background-color:rgb(171, 175, 179)" colspan="6">Rekap Berdasar Jenis Kelamin</th>
    </tr>
    <tr style="background-color:rgb(171, 175, 179); text-align:center">
        <th>Jenis Kelamin</th>
        <th style="text-align: center">Tenaga Pendidik</th>
        <th style="text-align: center">Tenaga Kependidikan</th>
        <th style="text-align: center">PPPK</th>
        <th style="text-align: center">PHL</th>
        <th style="text-align: center">Jumlah</th>
    </tr>
    <tr>
        <td>Laki-Laki</td>
        <td style="text-align: center">{{ $pnsgurulaki }}</td>
        <td style="text-align: center">{{ $pnstulaki }}</td>
        <td style="text-align: center">{{ $p3kgurulaki + $p3ktulaki }}</td>
        <td style="text-align: center">{{ $honorgurulaki + $honortulaki  }}</td>
        <td style="text-align: center">{{ $pnsgurulaki + $pnstulaki + $p3kgurulaki + $p3ktulaki + $honorgurulaki + $honortulaki  }}</td>
    </tr>
    <tr>
        <td>Perempuan</td>
        <td style="text-align: center">{{ $pnsgurupr }}</td>
        <td style="text-align: center">{{ $pnstupr}}</td>
        <td style="text-align: center">{{ $p3kgurupr + $p3ktupr }}</td>
        <td style="text-align: center">{{ $honorgurupr + $honortupr  }}</td>
        <td style="text-align: center">{{ $pnsgurupr + $pnstupr + $p3kgurupr + $p3ktupr + $honorgurupr + $honortupr  }}</td>
    </tr>
    <tr>
        <td><strong>Jumlah Total</strong></td>
        <td style="text-align: center">{{ $pnsgurulaki + $pnsgurupr }}</td>
        <td style="text-align: center">{{ $pnstulaki + $pnstupr }}</td>
        <td style="text-align: center">{{ $p3kgurulaki + $p3ktulaki + $p3kgurupr + $p3ktupr }}</td>
        <td style="text-align: center">{{ $honorgurulaki + $honortulaki  + $honorgurupr + $honortupr  }}</td>
        <td style="text-align: center">{{ $pnsgurulaki + $pnstulaki + $p3kgurulaki + $p3ktulaki + $honorgurulaki + $honortulaki  + $pnsgurupr + $pnstupr + $p3kgurupr + $p3ktupr + $honorgurupr + $honortupr  }}</td>
    </tr>
</table>
