    <p style="text-align: center"><b>
        REKAP CUTI PEGAWAI <br>
        SMK NEGERI 1 SIMPANG RIMBA <br>
        <i>
            Periode {{ Carbon\Carbon::Parse($start_date)->translatedFormat(' d-m-Y') }} s.d {{ Carbon\Carbon::Parse($end_date)->translatedFormat(' d-m-Y') }}
        </i>
    </b>
    </p>
    <table border="1" cellpadding="3">
        <tr style=" text-align:center" class="align-middle">
            <th style="width:30px" >No.</th>
            <th>Nama Pegawai</th>
            <th style="width: 200px">Tanggal Cuti</th>
            <th>Jenis Cuti</th>
            <th>Lama Cuti </th>
        </tr>
        @foreach ($result as $item)
        <tr >
            <td style="text-align: center">{{ $loop->iteration }}</td>
            <td >{{ $item->user->name }}</td>
            <td style="text-align: center">{{ Carbon\Carbon::Parse($item->tgl_awal)->translatedFormat(' d-m-Y') }} s.d {{ Carbon\Carbon::Parse($item->tglmasuk)->translatedFormat(' d-m-Y') }}</td>
            <td style="text-align: center">{{ $item->jenis_cuti }}</td>
            <td style="text-align: center">
                @if ($item->jenis_cuti == "Cuti Melahirkan")
                    3 bulan
                @else
                    {{ $item->jlh_hari }} hari
                @endif
            </td>
        </tr>
        @endforeach
    </table>
    <tr nobr = "true">
        <td> </td>
    </tr>
    <table border="0" cellpadding="2">
        <tr>
            <td></td>
            <td style="width: 305px;text-align:center">
                <b>
                Koba, 
                {{ Carbon\Carbon::Parse($end_date)->translatedFormat(' d F Y') }} <br>
                Kepala Sekolah
                <br><br><br>
                {{ $ttd->user->penilai->nama }}
                <br>
                NIP. {{ $ttd->user->penilai->nip }}
                </b>
            </td>
        </tr>
    </table>
