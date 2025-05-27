<table>
    @foreach ($d['cat'] as $x) 
    @php
    $fullname = $x;
    $name = explode('-',$fullname);
    $a = $name [0];
    $b = $name [2];
    $c = $name [1];
    $d = $name [3];
    @endphp
    <tr>
        <td style="width: 20px">{{ $loop->iteration }}.</td>
        <td>Nama</td>
        <td style="width: 20px">:</td>
        <td style="width: 200px"><strong>{{ $a }}</strong></td>
    </tr>
    <tr>
        <td></td>
        <td>Pangkat/Gol.</td>
        <td>:</td>
        <td>{{ $c }}</td>
    </tr>
    <tr>
        <td></td>
        <td>NIP</td>
        <td>:</td>
        <td>{{ $b }}</td>
    </tr>
    <tr>
        <td></td>
        <td>Jabatan</td>
        <td>:</td>
        <td>{{ $d }}</td>
    </tr>
    @endforeach
</table>