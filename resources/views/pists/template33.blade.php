<table border="1" cellpadding="5">
    <tr style="text-align: center;text-transform:capitalize; background-color:rgb(157, 158, 160)">
        <th style="width: 30px">No.</th>
        <th style="width: 120px">Nama</th>
        <th>NIP</th>
        <th style="width: 150px">Pangkat/Gol.</th>
        <th>Jabatan</th>
    </tr>
    @foreach ($d['cat'] as $x)
    <tr>
        @php
        $fullname = $x;
        $name = explode('-',$fullname);
        $a = $name [0];
        $b = $name [2];
        $c = $name [1];
        $d = $name [3];
        @endphp
        <td style="text-align: center">{{$loop->iteration }}.</td>
        <td>{{ $a }}</td>
        <td>{{ $b }}</td>
        <td>{{ $c }}</td>
        <td>{{ $d }}</td>
    </tr>
    @endforeach
</table>