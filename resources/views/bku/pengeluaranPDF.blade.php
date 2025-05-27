


    <h4 style="text-align: center">PEMERINTAH PROVINSI KEPULAUAN BANGKA BELITUNG</h4>
    <h2 style="text-align: center">BUKU KAS UMUM</h2>
    <h5 style="text-align: center">BENDAHARA PENGELUARAN</h5>
    <h6 style="text-align: center"><i>
            {{ Carbon\Carbon::Parse($start_date)->translatedFormat(' d F Y') }} s.d
            {{ Carbon\Carbon::Parse($end_date)->translatedFormat(' d F Y') }}
    </i></h6 style="text-align: center">
    <table border="0" cellpadding="2">
        <tr>
            <td>Urusan Pemerintahan</td>
            <td style="padding-left: 30px ;width:30px">:</td>
            <td style="padding-left: 30px ;width:100px">1.</td>
            <td style="padding-left: 30px">URUSAN WAJIB PELAYANAN DASAR</td>
        </tr>
        <tr>
            <td>Bidang Pemerintahan</td>
            <td style="padding-left: 30px">:</td>
            <td style="padding-left: 30px">1.01</td>
            <td style="padding-left: 30px">PENDIDIKAN</td>
        </tr>
        <tr>
            <td>Unit Organisasi</td>
            <td style="padding-left: 30px">:</td>
            <td style="padding-left: 30px">1.01.01</td>
            <td style="padding-left: 30px">DINAS PENDIDIKAN</td>
        </tr>
        <tr>
            <td>Sub Unit Organisasi</td>
            <td style="padding-left: 30px">:</td>
            <td style="padding-left: 30px">1.01.01.58</td>
            <td style="padding-left: 30px">SMK Negeri 1 Simpang Rimba</td>
        </tr>
    </table>
    <tr nobr = "true">
        <td> </td>
    </tr>
    <table border="0" cellpadding="2">
        <tr>
            <td>Pengguna Anggaran/Kuasa Pengguna Anggaran</td>
            <td style="padding-left: 30px ; width:30px">:</td>
            <td style="padding-left: 30px ; width:230px">Hariyanto, S.Pd</td>
        </tr>
        <tr>
            <td>Bendahara Penerimaan</td>
            <td style="padding-left: 30px">:</td>
            <td style="padding-left: 30px"> ........... </td>
        </tr>
    </table>
    <tr nobr = "true">
        <td> </td>
    </tr>
    <table border="1" cellpadding="2">
        <tr style="vertical-align: middle; text-align:center">
            <th>Tgl.</th>
            <th>Kode</th>
            <th>No. Bukti</th>
            <th>Kode Rek.</th>
            <th>Uraian</th>
            <th>Penerimaan</th>
            <th>Pengeluaran</th>
            <th>Saldo</th>
        </tr>
       
            @php
                $balance = 0;
                $hasil = $hasil->map(function($item) use(&$balance) {
                    $item->total = $item->nominal;
                    if ($item->type == "pengeluaran") {
                    $item->total *= -1;
                    }
                    $item->balance = ($balance += $item->total);
                    return $item;
                });
                @endphp

                @foreach($hasil as $item)
                    <tr>
                        <td style="text-align: center"><p class="mb-0">
                            {{ Carbon\Carbon::Parse($item->tgl_transaksi)->translatedFormat(' d/m/Y') }}
                        </p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right; padding-right:30px">
                            {{$item->uraian}}
                        </td>
                        <td style="text-align: right; padding-right:30px">
                            @if ($item->type == 'penerimaan')
                            @currency($item->nominal)
                            @else
                            @endif
                        </td>
                        <td style="text-align: right; padding-right:30px">
                            @if ($item->type == 'pengeluaran')
                            @currency($item->nominal)
                            @else
                            @endif
                        </td>
                        <td style="text-align: right; padding-right:30px">
                            @currency($item->balance)
                        </td>
                    </tr>
                @endforeach
                    <tr class="border-0 align-bottom " style="height: 40px">
                        <td colspan="2" class="border-0">
                            Jumlah periode ini  
                        </td>
                        <td class="border-0" colspan="4" style="text-align: right; padding-right:30px">
                            @currency($penerimaanini) 
                        </td>
                        <td class="border-0" style="text-align: right; padding-right:30px">
                            @currency($pengeluaranini) 
                        </td>
                        <td class="border-0"></td>
                    </tr>
                    <tr class="border-0">
                        <td colspan="2" class="border-0">
                            Jumlah periode lalu  
                        </td>
                        <td class="border-0" colspan="4" style="text-align: right; padding-right:30px">
                            @currency($penerimaan_lalu) 
                        </td>
                        <td class="border-0" style="text-align: right; padding-right:30px">
                            @currency($pengeluaran_lalu) 
                        </td>
                        <td class="border-0"></td>
                    </tr>
                    <tr class="border-0">
                        <td colspan="2" class="border-0">
                            Jumlah semua sampai periode ini
                        </td>
                        <td class="border-0" colspan="4" style="text-align: right; padding-right:30px">
                            @currency($penerimaan) 
                        </td>
                        <td class="border-0" style="text-align: right; padding-right:30px">
                            @currency($pengeluaran) 
                        </td>
                        <td class="border-0"></td>
                    </tr>
                    <tr class="border-0" >
                        <td colspan="2" class="border-0">
                            Sisa Kas
                        </td>
                        <td class="border-0" colspan="6" style="text-align: right; padding-right:30px">
                            @currency($penerimaan-$pengeluaran)
                        </td>
                    </tr>
                    </table>
    <tr nobr = "true">
        <td> </td>
    </tr>
    <table border="0" cellpadding="2">
                    <tr class="border-0" >
                        <td colspan="9" class="border-0">
                            Pada hari ini tanggal,  
                            <strong>
                                <i>
                                    {{ Carbon\Carbon::Parse($end_date)->translatedFormat(' d F Y') }} 
                                </i>
                            </strong>
                        </td>
                    </tr>
                    <tr class="border-0" >
                        <td colspan="9" class="border-0">
                            oleh kami di dapat dalam kas 
                            <strong><i>
                                Rp.@currency($penerimaan-$pengeluaran),-
                            </i></strong>
                        </td>
                    </tr>
                    <tr class="border-0" >
                        <td colspan="9" class="border-0">
                            Terbilang :
                            <strong class="capitalize">
                                <i>
                                ({{ Riskihajar\Terbilang\Facades\Terbilang::make($penerimaan-$pengeluaran) }} Rupiah)
                            </i>
                            </strong> 
                        </td>
                    </tr>
                    
    </table>
    <tr nobr = "true">
        <td> </td>
    </tr>
    <table border="0" cellpadding="2">
        <tr >
            <td colspan="2" style="width: 200px">
                Terdiri dari :
            </td>
        </tr>
        <tr >
            <td >
                a. Tunai
            </td>
            <td>
                Rp.@currency($penerimaan-$pengeluaran),-
            </td>
        </tr>
        <tr >
            <td>
                b. Saldo Bank
            </td>
            <td>
                Rp.
            </td>
        </tr>
        <tr >
            <td>
                c. Surat Berharga
            </td>
            <td>
                Rp. 
            </td>
        </tr>
    </table>

            <div class="row justify-content-around text-center fw-bold mt-5">
                <div class="col-4" >
                    <br>
                    Kepala Sekolah, <br><br><br>
                    Hariyanto, SPd
                    <br>
                    NIP. 197001202005011006
                </div>
                
            <div class="col-4">
                    Pangkalpinang, 
                    <br>
                    Bendahara <br><br><br>
                    ..............
                    <br>
                    NIP.
                <br>
                <br>
            </div>
        </div>


