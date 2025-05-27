<table border="1" cellpadding="2" cellspacing="0" >
    <tr class="align-middle text-center thead-light">
        <th style="text-align: center; background-color:rgb(171, 175, 179)" colspan="6">Rekap Berdasar Kualifikasi Pendidikan</th>
    </tr>
    <tr style="background-color:rgb(171, 175, 179); text-align:center">
        <th>Tingkat Pendidikan</th>
        <th style="text-align: center">Tenaga Pendidik</th>
        <th style="text-align: center">Tenaga Kependidikan</th>
        <th style="text-align: center">PPPK</th>
        <th style="text-align: center">PHL</th>
        <th style="text-align: center">Jumlah</th>
    </tr>
    <tr>
        <td>
            D1
        </td>
        <td style="text-align: center">{{ $pnsgurud1 }}</td>
        <td style="text-align: center">{{ $pnstud1 }}</td>
        <td style="text-align: center">{{ $p3kd1 }}</td>
        <td style="text-align: center">{{ $honord1 }}</td>
        <td style="text-align: center">
            {{ $pnstud1 + $pnsgurud1 + $p3kd1 + $honord1 }}
        </td>
    </tr>
    <tr>
        <td>
            D2
        </td>
        <td style="text-align: center">{{ $pnsgurud2 }}</td>
        <td style="text-align: center">{{ $pnstud2 }}</td>
        <td style="text-align: center">{{ $p3kd2 }}</td>
        <td style="text-align: center">{{ $honord2 }}</td>
        <td style="text-align: center">
            {{ $pnstud2 + $pnsgurud2 + $p3kd2 + $honord2 }}
        </td>
    </tr>
    <tr>
        <td>
            D3
        </td>
        <td style="text-align: center">{{ $pnsgurud3 }}</td>
        <td style="text-align: center">{{ $pnstud3 }}</td>
        <td style="text-align: center">{{ $p3kd3 }}</td>
        <td style="text-align: center">{{ $honord3 }}</td>
        <td style="text-align: center">
            {{ $pnstud3 + $pnsgurud3 + $p3kd3 + $honord3 }}
        </td>
    </tr>
    <tr>
        <td>
            D4
        </td>
        <td style="text-align: center">{{ $pnsgurud4 }}</td>
        <td style="text-align: center">{{ $pnstud4 }}</td>
        <td style="text-align: center">{{ $p3kd4 }}</td>
        <td style="text-align: center">{{ $honord4 }}</td>
        <td style="text-align: center">
            {{ $pnstud4 + $pnsgurud4 + $p3kd4 + $honord4 }}
        </td>
    </tr>
    <tr>
        <td>
            S1
        </td>
        <td style="text-align: center">{{ $pnsgurus1 }}</td>
        <td style="text-align: center">{{ $pnstus1 }}</td>
        <td style="text-align: center">{{ $p3ks1 }}</td>
        <td style="text-align: center">{{ $honors1 }}</td>
        <td style="text-align: center">
            {{ $pnstus1 + $pnsgurus1 + $p3ks1 + $honors1 }}
        </td>
    </tr>
    <tr>
        <td>
            S2
        </td>
        <td style="text-align: center">{{ $pnsgurus2 }}</td>
        <td style="text-align: center">{{ $pnstus2 }}</td>
        <td style="text-align: center">{{ $p3ks2 }}</td>
        <td style="text-align: center">{{ $honors2 }}</td>
        <td style="text-align: center">
            {{ $pnstus2 + $pnsgurus2 + $p3ks2 + $honors2 }}
        </td>
    </tr>
    <tr>
        <td>
            S3
        </td>
        <td style="text-align: center">{{ $pnsgurus3 }}</td>
        <td style="text-align: center">{{ $pnstus3 }}</td>
        <td style="text-align: center">{{ $p3ks3 }}</td>
        <td style="text-align: center">{{ $honors3 }}</td>
        <td style="text-align: center">
            {{ $pnstus3 + $pnsgurus3 + $p3ks3 + $honors3 }}
        </td>
    </tr>
    <tr>
        <td>
            SLTA
        </td>
        <td style="text-align: center">{{ $pnsguruslta }}</td>
        <td style="text-align: center">{{ $pnstuslta }}</td>
        <td style="text-align: center">{{ $p3kslta }}</td>
        <td style="text-align: center">{{ $honorslta }}</td>
        <td style="text-align: center">
            {{ $pnstuslta + $pnsguruslta + $p3kslta + $honorslta }}
        </td>
    </tr>
    <tr>
        <td>
            SLTP
        </td>
        <td style="text-align: center">{{ $pnsgurusltp }}</td>
        <td style="text-align: center">{{ $pnstusltp }}</td>
        <td style="text-align: center">{{ $p3ksltp }}</td>
        <td style="text-align: center">{{ $honorsltp }}</td>
        <td style="text-align: center">
            {{ $pnstusltp + $pnsgurusltp + $p3ksltp + $honorsltp }}
        </td>
    </tr>
    <tr>
        <td>
            <strong>Jumlah Total</strong>
        </td>
        <td style="text-align: center">{{ $pnsgurusltp + $pnsguruslta + $pnsgurus1 + $pnsgurus2 + $pnsgurus3 + $pnsgurud1 + $pnsgurud2 + $pnsgurud3 + $pnsgurud4}}</td>
        <td style="text-align: center">{{ $pnstusltp + $pnstuslta + $pnstus1 + $pnstus2 + $pnstus3 + $pnstud1 + $pnstud2 + $pnstud3 + $pnstud4}}</td>
        <td style="text-align: center">{{ $p3ksltp + $p3kslta + $p3ks1 + $p3ks2 + $p3ks3 + $p3kd1 + $p3kd2 + $p3kd3 + $p3kd4}}</td>
        <td style="text-align: center">{{ $honorsltp + $honorslta + $honors1 + $honors2 + $honors3 + $honord1 + $honord2 + $honord3 + $honord4}}</td>
        <td style="text-align: center">
            {{ $pnsgurusltp + $pnsguruslta + $pnsgurus1 + $pnsgurus2 + $pnsgurus3 + $pnsgurud1 + $pnsgurud2 + $pnsgurud3 + $pnsgurud4 +
            $pnstusltp + $pnstuslta + $pnstus1 + $pnstus2 + $pnstus3 + $pnstud1 + $pnstud2 + $pnstud3 + $pnstud4 +
            $p3ksltp + $p3kslta + $p3ks1 + $p3ks2 + $p3ks3 + $p3kd1 + $p3kd2 + $p3kd3 + $p3kd4 +
            $honorsltp + $honorslta + $honors1 + $honors2 + $honors3 + $honord1 + $honord2 + $honord3 + $honord4 
            }}
        </td>
    </tr>
</table>