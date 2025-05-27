<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kwitansi</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 0.8em; }

        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px none #0b0a0a; padding: none; text-align: left; }
        th { background-color: #f2f2f2; }
        .vertical-line {
            border-left: 1px solid #0b0a0a; /* Vertical line style */
            height: 30px; /* Full height of the table */
        }
        /* Custom CSS for horizontal line */
        .horizontal-line {
            width: 50%;
            height: none; /* Adjust height as needed */
            background-color: black; /* Change color as needed */
            margin: 20px 0; /* Left align the line */
        }
    </style>
</head>
<body>
    <div style="text-align: center;">
    {{-- <img src="{{ public_path('images/logo_prov.png') }}" style="display: block; margin: 0 auto; width: 60px; height: auto"> --}}
    </div>
        <p class="small-font">
        PEMERINTAH PROVINSI <br>
        KEPULAUAN BANGKA BELITUNG <br>
        SKPD CABANG DINAS PENDIDIKAN WILAYAH I <br>
        PROVINSI KEPULAUAN BANGKA BELITUNG
    </p>
    
    <hr class="horizontal-line">
    <table>
        <tr style="vertical-align: top;">
            <td style="width: 100px;text-align:right; padding-right:20px;border-left:#f2f2f2"><i>
                <br>
                <br>
                <br>
                <br> 
                Diperiksa oleh :</i></td>
            <td style="padding-left: 20px;border-right:#f2f2f2" class="vertical-line">
                <table>
                    <tr>
                        <td style="width: 150px">Tahun Anggaran</td>
                        <td style="width: 20px">:</td>
                        <td>{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('Y') : 'N/A' }}</td>

                    </tr>
                    <tr>
                        <td>Kode Rekening</td>
                        <td>:</td>
                        <td>{{ $item }}</td>
                    </tr>
                    <br>
                    <tr>
                        <td style="vertical-align: top">Sudah diterima dari</td>
                        <td style="vertical-align: top">:</td>
                        <td style="text-align: justify">
                            Pengguna Anggaran/Kuasa Pengguna Anggaran Bendahara Pengeluaran
                            Pembantu Cabang Dinas Pendidikan Wilayah I Provinsi Kepulauan
                            Bangka Belitung. Satker Cabang Dinas Pendidikan Wil. I Provinsi
                            Kepulauan Bangka Belitung.
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top">Banyaknya Uang </td>
                        <td style="vertical-align: top">:</td>
                        <td style="text-align: justify">
                           <i><b>({{ Riskihajar\Terbilang\Facades\Terbilang::make(5000) }} rupiah) </b></i>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top">Yaitu untuk </td>
                        <td style="vertical-align: top">:</td>
                        <td style="text-align: justify">
                            Pembayaran Belanja Perjalanan Dinas Biasa
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right; padding-right:10px">a.n.</td>
                        <td>:</td>
                        <td>
                          
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Berdasarkan</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Surat Tugas  <span style="padding-left: 20px">: {{ $item }}</span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Tanggal  <span style="padding-left: 43px">: {{ $item->created_at ? Carbon\Carbon::parse($item->created_at)->translatedFormat('d-m-Y') : 'N/A' }}</span></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <table>
                                <tr>
                                    <td style="vertical-align: top">
                                        <input type="text" style="width: 100px;" value="{{"Rp. ".number_format(5000,0,',','.').',-' }}" />
                                    </td>

                                    <td style="text-align: center" colspan="2" >
                                        {{ $item }}, 
                                        {{ Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }} <br>
                                        Penerima Uang <br>
                                        <br>
                                        <br>
                                        <br>
                                        Nama
                                        <br>
                                        NIP.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <hr>
    <table>
        <tr>
            <td style="text-align: center">
                Setuju dibebankan pada <br>
                rekening berkenaan <br>
                <br>
                <br>
                <br>
                <br>
                Nama
                <br>
                NIP. 
            </td>
            <td style="text-align: center">
                Yang membayar <br>
                bendahara pengeluaran <br>
                <br>
                <br>
                <br>
                <br>
                Nama
                <br>
                NIP. 
            </td>
            <td style="text-align: center">
                Pejabat Pelaksana <br>
                Teknis Kegiatan <br>
                <br>
                <br>
                <br>
                <br>
                Nama
                <br>
                NIP.
            </td>
        </tr>
    </table>
</body>
</html>
