
<table class="table table-sm table-bordered border-primary">
    <tr class="text-center">
        <th>No.</th>
        <th>Nama/NIP</th>
        <th>Pangkat/Gol.</th>
        <th>Tanda Tangan</th>
    </tr>
    @foreach ($d['cat'] as $x) 
    <tr style="vertical-align: middle">
        @php
        $fullname = $x;
        $name = explode('-',$fullname);
        $a = $name [0];
        $b = $name [2];
        $c = $name [1];
        $d = $name [3];
        @endphp
        <td class="text-center" style="height: 1.2cm">{{$loop->iteration }}.</td>
        <td style="padding-left: 30px" >{{ $a }}
            <br>
            @if ($b =='')
            @else
            NIP. {{ $b }}
            @endif
        </td>
        <td class="text-center">
            @if ($c =='')
                {{ $d }}
                {{-- - --}}
            @else
            {{ $c }}
            @endif
        </td>
        <td class="text-center">   </td>
    </tr>
    @endforeach
</table>