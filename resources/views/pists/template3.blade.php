
<table class="table table-sm table-bordered border-primary">
    <tr class="text-center">
        <th>No.</th>
        <th>Nama</th>
        <th>NIP</th>
        <th>Pangkat/Gol.</th>
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
        <td class="text-center">{{$loop->iteration }}.</td>
        <td style="padding-left: 30px">{{ $a }}</td>
        <td class="text-center">{{ $b }}</td>
        <td class="text-center">{{ $c }}</td>
        <td class="text-center">{{ $d }}</td>
    </tr>
    @endforeach
</table>