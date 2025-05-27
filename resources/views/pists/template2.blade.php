<table>
    @foreach ($d['cat'] as $x) 
    <tr>
        <td style="padding-left: 30px; Padding-right:30px">
            Nama
            {{-- <li>{{ $x }}</li> --}}
            @php
                $fullname = $x;
                $name = explode('-',$fullname);
                $a = $name [0];
                $b = $name [2];
                $c = $name [1];
            @endphp
        </td>
        <td >:</td>
        <td style="padding-left: 20px"  > <strong>{{ $a }}</strong></td>
    </tr>
    <tr>
        <td style="padding-left: 30px; Padding-right:30px">
            Pangkat/Gol.
            {{-- <li>{{ $x }}</li> --}}
            @php
            $fullname = $x;
            $name = explode('-',$fullname);
            $a = $name [0];
            $b = $name [2];
            $c = $name [1];
            $count = array_sum(array($a));
            // echo $count;
            // $result3 = array_map(function () {
            //     return array_sum(func_get_args());
            // }, $fullname);

            // print_r($result3);
            @endphp
        </td>
        <td >:</td>
        <td style="padding-left: 20px">{{ $c }}</td>
    </tr>
    <tr>
        <td style="padding-left: 30px; Padding-right:30px">
            NIP
            {{-- <li>{{ $x }}</li> --}}
            @php
                $fullname = $x;
                $name = explode('-',$fullname);
                $a = $name [0];
                $b = $name [2];
                $c = $name [1];
                @endphp
        </td>
        <td >:</td>
        <td style="padding-left: 20px">{{ $b }}</td>
    </tr>
    <tr>
        <td style="padding-left: 30px; Padding-right:30px">
            Jabatan.
            {{-- <li>{{ $x }}</li> --}}
            @php
            $fullname = $x;
            $name = explode('-',$fullname);
            $a = $name [0];
            $b = $name [2];
            $c = $name [1];
            $d = $name [3];
            @endphp
        </td>
        <td >:</td>
        <td style="padding-left: 20px">{{ $d }}</td>
    </tr>
    @endforeach
</table>