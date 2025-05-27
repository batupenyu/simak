<head>
    <style>
        @page { margin-top: 50px; }
        #header { position: fixed; top: -50px; left: 0px; right: 0px; padding: 10px; text-align: center; font-weight: bold; }
    </style>
</head>
<body>
    
    {{-- <p style="text-align: center" >
        <strong>
            TIM KERJA <br>
            SMK NEGERI 1 SIMPANG RIMBA
        </strong>
    </p> --}}
    <table  border="1" cellpadding="3" nobr="true ">
        <thead>
            <tr style="text-align: center">
                <th style="width: 30px">No.</th>
                <th>Nama tim</th>
                <th style="width: 230px">Sasaran</th>
                <th>Indikator <br>Output</th>
                <th style="width: 100px">Ketua</th>
                <th style="width: 150px">Anggota</th>
            </tr>
        </thead>
        @foreach ($tim as $item)
        <tbody>
            <tr>
                {{-- <td>{{ $loop->iteration }}</td> --}}
                <td style="width: 30px;text-align: center">{{ ($tim ->currentpage()-1) * $tim ->perpage() + $loop->index + 1 }}.</td>
                <td>{{ $item->name}}</td>
                <td style="width: 230px" >{{ $item->rk->name}}</td>
                <td>{{ $item->indikator}}</td>
                <td style="width: 100px">{{ $item->penilai->nama}}</td>
                <td style="width: 150px">
                    @foreach ($item['anggota'] as $anggota)
                        {{ $loop->iteration }}. {{ $anggota }} <br>
                    @endforeach
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
{{ $tim->links() }}
</body>