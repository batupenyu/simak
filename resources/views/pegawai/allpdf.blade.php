
    <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print tampil"></i></button>
        <p style="text-align: center">
            <strong>
                DATA NAMA GURU DAN TENAGA KEPENDIDIKAN <br>
                SMK NEGERI 1 SIMPANG RIMBA
            </strong>
        </p>

        <table border="1" cellpadding="2" cellspacing="0" >
            <tr style="text-align: center; background-color:rgb(182, 188, 193)">
                <td style="width: 30px">No</td>
                <td style="width: 120px">Nama</td>
                <td style="width: 100px">Tempat Lahir</td>
                <td>Tgl.lahir</td>
                <td style="width: 50px">Status tugas <br> (induk/noninduk)</td>
                <td>Status Kepegawaian <br> (PNS/PPPK/HONORER)</td>
                <td style="width: 50px">Sumber Gaji <br> (APBN/APBD/IPP)</td>
                <td style="width: 30px">Mapel <br> diajarkan</td>
                <td style="width: 40px">Jumlah <br>Jam</td>
                <td>Tugas <br>Tambahan</td>
                <td>Total beban <br>Tugas</td>
            </tr>
            @foreach ($all as $item)
                <tr>
                    <td style="text-align:center">{{ ($all ->currentpage()-1) * $all ->perpage() + $loop->index + 1 }}.</td>
                    <td> {{ $item->name }}</td> 
                    <td> {{ $item->tempat_lahir }}</td>
                    <td style="text-align: center">{{ (Carbon\Carbon::Parse($item->tgl_lahir)->translatedFormat('d/m/Y')) }}</td>
                    <td style="text-align: center">Induk</td>
                    <td style="text-align: center">{{ $item->status }}</td>
                    <td style="text-align: center">{{ $item->sumber_gaji }}</td>
                    <td></td>
                    {{-- <td style="width: 200px">
                        @foreach ($item->mapel as $x)
                        <ul>
                            <li>{{ $x }} </li>
                        </ul>
                        @endforeach
                    </td> --}}
                    <td style="text-align: center">{{ $item->jlh_jam }}</td>
                    <td style="padding-left: 20px; text-align:center">{{ $item->tugas_tambahan }}</td>
                    <td></td>
                </tr>
            @endforeach
        </table>

        {{ $all->links() }}
        {{-- {{ $all->appends(Request::except('page'))->links() }} --}}