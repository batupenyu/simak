
<p style="text-align: center" ><b>REKAPITULASI KP4 <br>
    SMK NEGERI 1 SIMPANG RIMBA</b></p  > <br>

<table border="1" cellpadding="2">
    <thead>
        <tr style="text-align: center; background-color:rgb(203, 207, 211)">
            <th style="width: 30px" rowspan="2">&nbsp;<br> No.</th>
            <th style="width: 80px"  rowspan="2">&nbsp;<br>NIP</th>
            <th style="width: 90px"  rowspan="2">&nbsp;<br>NAMA</th>
            <th style="width: 40px" rowspan="2">(KAWIN/ BELUM KAWIN <br> JANDA/ DUDA)</th>
            <th style="width: 210px" colspan="4">DATA SUAMI/ISTRI TANGGUNGAN</th>
            <th style="width: 200px" colspan="3">DATA ANAK TANGGUNGAN</th>
            <th style="width: 40px" rowspan="2">&nbsp;<br>KET</th>
        </tr>
        <tr style="text-align: center; background-color:rgb(203, 207, 211)">
            <th style="width: 90px">NAMA</th>
            <th style="width: 50px">TGL. <br> LAHIR</th>
            <th style="width: 30px">UMUR</th>
            <th style="width: 40px">PEKERJAAN</th>
            <th style="width: 110px">NAMA</th>
            <th style="width: 50px">TGL. <br> LAHIR</th>
            <th style="width: 40px">BERSEKOLAH/ <br> KULIAH PADA</th>
        </tr>
    </thead>
    @foreach ($hasil as $item)
    <tbody>
        <tr>
            <td style="text-align: center; width: 30px">{{ $loop->iteration }}.</td>
            <td style="width: 80px">{{ $item->nip }}</td>
            <td style="width: 90px">{{ $item->name }}</td>
            <td style="text-align: center; width:40px">{{ $item->pasangan->name != ''?'Kawin':'Belum Kawain' }}</td>
            <td style="width: 90px">@if ($item->pasangan->status == 'ditanggung' && $item->pasangan->name !=''){{ $item->pasangan->name }}
                @else
                @endif
            </td>
            <td style="width: 50px">
                @if ($item->pasangan->status == 'ditanggung' && $item->pasangan->name !='')
                {{ Carbon\Carbon::Parse($item->pasangan->tgl_lahir)->translatedFormat(' d/m/Y') }} <br>
                @else
                @endif
            </td>
            <td style="width: 30px">
                @if ($item->pasangan->status == 'ditanggung' && $item->pasangan->name !='')
                {{ \Carbon\Carbon::parse($item->pasangan->tgl_lahir)->diff(\Carbon\Carbon::now())->format('%y th') }}
                @else
                @endif
            </td>
            <td style="width: 40px">
                @if ($item->pasangan->status == 'ditanggung' && $item->pasangan->tgl_kawin !="0000-00-00" )
                {{ $item->pasangan->job }}
                @else
                @endif
            </td>
            <td style="width: 110px">
                @foreach ($item->anak as $dat)
                @if($dat->kat == '1')
                -{{$dat->name}}<br>
                @else
                @endif
                @endforeach
            </td>
            <td style="width: 50px">
                @foreach ($item->anak as $dat)
                @if ($dat->kat == '1')
                {{ Carbon\Carbon::Parse($dat->tgl_lahir)->translatedFormat(' d/m/Y') }} <br>
                @else
                @endif
                @endforeach
            </td>
            <td style="width: 40px">
                @foreach ($item->anak as $dat)
                @if ($dat->kat == '1')
                {{ $dat->status_sekolah }} <br>
                @else
                @endif
                @endforeach
            </td>
            <td style="width: 40px"></td>
        </tr>
    </tbody>
    @endforeach
</table>
<tr nobr = "true">
    <td> </td>
</tr>
<table border="0" cellpadding="2">
<tr>
    <td></td>
    <td style="text-align: center; width:325px">
        Simpang Rimba, 
        {{ (\Carbon\Carbon::now())->translatedFormat(' d F Y') }} <br>
        Kepala Sekolah
        <br><br><br><br>
        Hariyanto, S.Pd
        <br>
        NIP. 197001202005011006
    </td>
</tr>
</table>
