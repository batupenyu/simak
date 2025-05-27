<img src="{{ public_path('image/kopsmk.png') }}">
<table border ="0" cellspasing= "0" cellpadding ="1" style="width: 500px" >
    @foreach ($data as $item)
    <tr>
        <td style="text-align: center">
            <b>
                BERITA ACARA SERAH TERIMA <br>
                PENGGUNAAN/PEMAKAIAN BARANG MILIK DAERAH <br>
                Nomor : {{ $item->nomor }} /BASTPB/SMKN/SR /{{ Carbon\Carbon::parse($item->tgl)->translatedFormat('Y') }}. <br>
            </b>
        </td>
    </tr>
    <tr>
        <td style="text-align: justify">Pada hari ini, 
            @php
            $date = date('Y-m-d'); 
            $datetime = Terbilang::date($date);
            $orderdate= Carbon\Carbon::parse($item->tgl)->translatedFormat('d/m/Y');
            $orderdate = explode('/', $orderdate);
            $day   = $orderdate[0];
            $month = $orderdate[1];
            $year  = $orderdate[2];
            @endphp

            <b>{{ Carbon\Carbon::parse($item->tgl)->translatedFormat('l') }}</b> 
            tanggal <i><b style="text-transform: capitalize"> {{Riskihajar\Terbilang\Facades\Terbilang::make($day)}}</b> </i>
            bulan <i><b>{{ Carbon\Carbon::parse($item->tgl)->translatedFormat('F') }}</b></i>
            tahun <i><b style="text-transform: capitalize">{{Riskihajar\Terbilang\Facades\Terbilang::make($year)}}</b></i>, 
            bertempat di SMK Negeri 1 Simpang Rimba yang beralamat di Jl. Laut Gedong Dusun 1 Rt.01 Desa Permis, Kec. Simpang Rimba kami yang bertanda tangan di bawah ini: <br>
        </td>
    </tr>
    <tr>
        <td style="width: 30px">I.</td>
        <td style="width: 75px">Nama</td>
        <td style="width: 20px">:</td>
        <td style="width: 375px">Hariyanto, S.Pd </td>
    </tr>
    <tr>
        <td></td>
        <td>NIP</td>
        <td>:</td>
        <td>197001202005011006 </td>
    </tr>
    <tr>
        <td></td>
        <td>Jabatan</td>
        <td>:</td>
        <td>Kepala Sekolah SMK Negeri 1 Simpang Rimba</td>
    </tr>
    <tr>
        <td colspan="4" style="width: 500px">dalam hal ini bertindak selaku Pengguna Barang Milik Daerah, yang selanjutnya disebut PIHAK PERTAMA. </td>
    </tr>
    <tr>
        <td style="width: 30px">II.</td>
        <td style="width: 75px">Nama</td>
        <td style="width: 20px">:</td>
        <td style="width: 375px">{{ $item->user->name }}</td>
    </tr>
    <tr>
        <td></td>
        <td>NIP</td>
        <td>:</td>
        <td>{{ $item->user->nip }} </td>
    </tr>
    <tr>
        <td></td>
        <td>Jabatan</td>
        <td>:</td>
        <td>{{ $item->user->jabatan }}  
            {{ $item->user->mapel[0] }}
    </td>
    </tr>
    <tr>
        <td colspan="4" style="width: 500px; text-align:justify">dalam hal ini bertindak untuk dan atas nama diri sendiri selaku Pemakai Barang Milik Daerah, selanjutnya disebut PIHAK KEDUA. 
        </td>
    </tr>
    <tr>
        <td colspan="4" style="width: 500px; text-align:center"><b>Pasal 1</b></td>
    </tr>
    <tr>
        <td colspan="4" style="width: 500px; text-align:justify">PIHAK PERTAMA menyerahkan untuk digunakan dalam pelaksanaan tugas kedinasan Barang Milik Daerah berupa {{ $item->jenis }} dengan spesifikasi sebagai berikut:
        </td>
    </tr>
    <tr>
        <td style="width: 30px"></td>
        <td style="width: 160px">Jenis/Nama Barang Milik Daerah</td>
        <td style="width: 20px">:</td>
        <td style="width: 290px">{{ $item->jenis }}</td>
    </tr>
    <tr>
        <td></td>
        <td>Merk/Type</td>
        <td>:</td>
        <td>{{ $item->type }} </td>
    </tr>
    <tr>
        <td></td>
        <td>Tahun</td>
        <td>:</td>
        <td>{{ $item->tahun }}</td>
    </tr>
    <tr>
        <td></td>
        <td>Spesifikasi</td>
        <td>:</td>
        <td>{{ $item->spek }}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="4" style="text-align: center"><b>Pasal 2</b> </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: justify">PIHAK KEDUA menerima dan bertanggung jawab atas Barang Milik Daerah sebagaimana dimaksud Pasal 1 dengan seluruh resiko yang melekat atas penggunaan Barang Milik Daerah tersebut. 
        </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center"><b>Pasal 3</b></td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: justify">PIHAK KEDUA mengembalikan Barang Milik Daerah sebagaimana Pasal 1 selambat-lambatnya 1 (satu) bulan sebelum {{ Carbon\Carbon::parse($item->tgl_akhir)->translatedFormat('d F Y') }}. 
        </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: justify">Demikian Berita Acara ini dibuat dan ditandatangani dalam rangkap (tiga) untuk dapat digunakan sebagaimana mestinya, masing-masing untuk;<br>Lembar 1 untuk Pengguna Barang (PIHAK PERTAMA) <br>Lembar 2 untuk Pemakai Barang (PIHAK KEDUA) <br>Lembar 3 untuk Pengurus Barang SMK Negeri 1 Simpang Rimba. <br>
        </td>
    </tr>
    <tr style="text-align: center">
        <td style="width: 50%">
            <br><br>
            <b>
                PIHAK PERTAMA <br><br><br><br>
            
            
            
                Hariyanto, S.Pd <br>
                NIP. 197001202005011006.
            </b>
        </td>
        <td style="width: 50%">
            <b>
            Simpang Rimba, {{ Carbon\Carbon::parse($item->tgl)->translatedFormat('d F Y') }} <br>
            PIHAK KEDUA <br><br><br><br>
            
            
            
            {{ $item->user->name }}<br>
            NIP. {{ $item->user->nip }}.
            </b>
        </td>
    </tr>
</table>



