
    <p class="mt-5">I. Anak Kandung ( Ak ), Anak Tiri ( At ) dan Anak Angkat ( Aa ) yang masih menjadi tanggungan, belum mempunyai penghasilan sendiri dan masuk daftar gaji</p>
    <Table border="1" cellpadding ="2" cellspasing ="2">
    <?php $no = 1 ; ?>
    <tr style="text-align:center; background-color:rgb(187, 189, 191)">
        <th style="width: 30px" rowspan="2">&nbsp; <br><br><br><br> No.</th>
        <th style="width: 100px" rowspan="2">&nbsp;<br><br><br><br> Nama</th>
        <th rowspan="2">&nbsp;<br><br><br> Status <br> Anak (ak) <br> (at) (aa)</th>
        <th rowspan="2">&nbsp;<br><br><br><br> Tanggal Lahir</th>
        <th rowspan="2">&nbsp;<br><br><br> Belum <br> Pernah <br> Kawin</th>
        <th rowspan="2">&nbsp;<br><br><br>Bersekolah/ <br> Kuliah pada</th>
        <th rowspan="2">&nbsp;<br><br>Tidak mendapat <br>
            1. Beasiswa/ darmasiswa <br>
            2. Ikatan Dinas
        </th>
        <th colspan="2">Lahir dari Perkawinan</th>
        <th rowspan="2">&nbsp;<br><br>Tanggal Meninggal/ <br> diceraikannya <br> ayah/ibu</th>
        <th rowspan="2">Keterangan <br> diangkat menurut : <br>
            a. Putusan pengadilan <br>
            b. Hukum adopsi bagi <br> keturunan Cina
        </th>

        
    </tr>
    <tr style="text-align: center; background-color:rgb(187, 189, 191)">
        <th>&nbsp;<br><br><br>
            Nama Ayah
            {{-- @if ( $data->jk === "Perempuan")
            Nama Ibu
            @else
            Nama Ayah
            @endif --}}
        </th>
        <th>&nbsp;<br><br><br>
            Nama Ibu
            {{-- @if ( $data->jk === "Laki-Laki")
            Nama Ibu
            @else
            Nama Ayah
            @endif --}}
        </th>
    </tr>
    @if ($total ==0)
        <tr>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
    @endif
    @foreach ($data->anak as $item)
    @if ($item->kat ==1)
    <tr>
        <td style="text-align: center"><?php echo $no ++?>.</td>
        <td>{{$item->name }}</td>
        <td style="text-align: center">{{$item->anak }}</td>
        <td style="text-align: center">{{ Carbon\Carbon::parse($item->tgl_lahir )->translatedFormat('d-m-Y ') }}</td>
        <td>{{$item->perkawinan }}</td>
        <td>{{$item->status_sekolah }}</td>
        <td>{{$item->status_beasiswa }}</td>
        <td>{{ $data->jk == 'Laki-Laki' ?  $data->name  :  $data->pasangan->name  }}</td>
        <td>{{ $data->jk == 'Laki-Laki' ?  $data->pasangan->name : $data->name }}</td>
        <td>{{ $data->tgl_meninggal_cerai }}</td>
        <td></td>
    </tr>
    @endif
    @endforeach
    </table>
    <P class="mt-5">II. Anak Kandung ( Ak ), Anak Tiri ( At ) dan Anak Angkat ( Aa ) yang masih tanggungan, tetapi tidak masuk dalam daftar gaji</P>
    <Table border="1" cellpadding ="2" cellspasing ="2">
        <tr style="text-align: center; background-color:rgb(187, 189, 191)">
            <th style="width: 30px">&nbsp;<br><br><br>No.</th>
            <th  style="width: 130px">&nbsp;<br><br><br>Nama</th>
            <th>&nbsp;<br><br>Status <br> Anak (ak) <br> (at) (aa)</th>
            <th>&nbsp;<br><br><br>Tanggal Lahir</th>
            <th>&nbsp;<br><br>Belum <br> Pernah <br> Kawin</th>
            <th>&nbsp;<br><br><br>Bersekolah/ <br> Kuliah pada</th>
            <th>&nbsp;<br><br> mendapat <br>
                1. Beasiswa/ darmasiswa <br>
                2. Ikatan Dinas
            </th>
            <th>&nbsp;<br><br><br>bekerja atau <br> tidak bekerja</th>
            <th>Keterangan <br> diangkat menurut : <br>
                a. Putusan pengadilan <br>
                b. Hukum adopsi bagi <br> keturunan Cina
            </th>
        </tr>
        <?php $no = 1 ; ?>
        @if ($t ==0)
        <tr>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
        @endif
        @foreach ($data->anak as $item)
        @if ($item->kat ==2)
        <tr>
            <td style="text-align: center"><?php echo $no ++?>.</td>
            <td>{{$item->name }}</td>
            <td style="text-align: center">{{$item->anak }}</td>
            <td style="text-align: center">{{ Carbon\Carbon::parse($item->tgl_lahir )->translatedFormat('d-m-Y ') }}</td>
            <td style="text-align: center">{{$item->perkawinan }}</td>
            <td style="text-align: center">{{$item->status_sekolah }}</td>
            <td style="text-align: center">{{$item->status_beasiswa }}</td>
            <td style="text-align: center">{{$item->pekerjaan}}</td>
            <td></td>
            

        </tr>
        @endif
        @endforeach
    </table>

<P>A. Supaya dilampirkan salinan Surat Keputusan Pengadilan Negeri yang disahkan <br>B. Supaya diisi jika anak dilahirkan dari istri/suami yang telah meninggal dunia atau diceraikan
</P>