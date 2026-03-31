<table>
    @foreach ($catArray as $catItem)
    @php
    $fullname = $catItem;
    $nameParts = explode('-',$fullname);
    $nama = $nameParts [0];
    $nip = $nameParts [2];
    $pangkat = $nameParts [1];
    $jabatan = $nameParts [3];
    @endphp
    <tr>
        <td style="width: 20px"></td>
        <td>Nama</td>
        <td style="width: 20px">:</td>
        <td style="width: 200px"><strong>{{ $nama }}</strong></td>
    </tr>
    <tr>
        <td></td>
        <td>Pangkat/Gol.</td>
        <td>:</td>
        <td>{{ $pangkat }}</td>
    </tr>
    <tr>
        <td></td>
        <td>NIP</td>
        <td>:</td>
        <td>{{ $nip }}</td>
    </tr>
    <tr>
        <td></td>
        <td>Jabatan</td>
        <td>:</td>
        <td>{{ $jabatan }}</td>
    </tr>
    <tr>
        <td></td>
        <td>Unit Kerja</td>
        <td>:</td>
        <td>SMK Negeri 1 Koba</td>
    </tr>
    @endforeach
</table>