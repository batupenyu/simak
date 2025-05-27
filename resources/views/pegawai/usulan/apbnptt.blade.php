
<div style="font-family: 'Bookman Old Style'; font-size:11pt">TENAGA KEPENDIDIKAN TIDAK TETAP SMK SIMPANG RIMBA</div>

    <table class="table table-sm  table-bordered border-primary mt-3" style="font-family: 'Bookman Old Style'; font-size:11pt ; " >
            <tr class="align-middle text-center ">
                <th>No</th>
                <th>NAMA</th>
                <th>JENIS <br> KELAMIN</th>
                <th>NIPTK/NUPTK</th>
                <th>TUGAS</th>
                <th>HONORARIUM <br>PERBULAN (Rp)</th>
            </tr>
        @foreach ($apbnptt as $item)
        <tr style="text-transform:uppercase">
            <td class="text-center">{{ $loop->iteration }}.</td>
            <td>{{ $item->name}}
                <a href="/project.edit_user/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-edit tampil"></i></a> 
            </td>
            <td class="text-center">
                @if ($item->jk =='Perempuan')
                    P
                @elseif  ($item->jk =='Laki-Laki')
                    L
                @endif
            </td>
            <td class="text-center">{{ $item->nuptk }}</td>
            <td class="text-center">
                {{-- @foreach ($item->mapel as $x)
                {{ $x }} <br>
                @endforeach --}}
                {{-- {{ $item->mapel }} --}}
            </td>
            <td class="text-center">2.900.000</td>
        </tr>
        @endforeach
    </table>