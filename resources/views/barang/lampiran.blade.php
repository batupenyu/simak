<h4>
LAMPIRAN I <br>
KEPUTUSAN KEPALA SEKOLAH SMK NEGERI 1 SIMPANG RIMBA <br>
NOMOR : 188.4/ ......... / SMK/SR/ 2025 TAHUN 2025 <br>
TENTANG : PENUNJUKAN PEMEGANG/PEMAKAI BARANG MILIK DAERAH PADA SMK NEGERI 1 SIMPANG RIMBA <br>

</h4>
<p style="text-align: center"><b>DAFTAR PENGGUNAAN/PEMAKAIAN <br> BARANG MILIK DAERAH</b></p>
<table border="1" cellpadding="2">
    <tr style="text-align: center; background-color:rgb(219, 215, 215);height:1.5cm ">
        <th style="width: 30px" rowspan="2">&nbsp;<br>NO.</th>
        <th rowspan="2">NAMA/JENIS BARANG</th>
        <th rowspan="2">&nbsp;<br> TYPE/MERK</th>
        <th style="width: 75px" rowspan="2">TAHUN <br> PEROLEH</th>
        <th style="width: 230px" colspan="2">PEMEGANG INVENTARIS</th>
        <th style="width: 150px" rowspan="2">&nbsp;<br>SPESIFIKASI</th>
        <th style="width: 80px" rowspan="2">&nbsp;<br>KET</th>
    </tr>
    <tr style="text-align: center; background-color:rgb(219, 215, 215)">
        <th>NAMA</th>
        <th>JABATAN</th>
    </tr>
    @foreach ($data as $item)
    <tr>
        {{-- <td style="text-align:center">{{ ($data ->currentpage()-1) * $data ->perpage() + $loop->index + 1 }}.</td> --}}
        {{-- <td>{{ Carbon\Carbon::parse($item->tgl)->translatedFormat('d-m-Y') }}</td> --}}
        <td style="text-align: center">{{ $loop->iteration }}.</td>
        <td>{{ $item->jenis }}</td>
        <td>{{ $item->type }}</td>
        <td style="text-align: center">{{ $item->tahun }}</td>
        <td>{{ $item->user->name }}</td>
        <td>{{ $item->user->jabatan }}</td>
        <td>{{ $item->spek}}</td>
        <td style="text-align: center"></td>
    </tr>
    @endforeach
        <?php 
        for($i=$count+1;$i<=10;$i++)
        {
        ?>
        <tr>
            <td style="text-align: center"><?php echo $i; ?>.</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php
        }
        ?>
</table>
<tr nobr = "true">
    <td> </td>
</tr>
<table border="0" cellpadding="2" style="width: 760px">
    <tr style="text-align: center">
        <td></td>
        <td style="width: 50%">
            <br><br>
            Kepala Sekolah <br><br><br><br>
            
            
            
            Hariyanto, S.Pd <br>
            NIP. 197001202005011006.	
        </td>
    </tr>
</table>