<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p style="text-align: right">KP4</p>
    <p style="text-align: center"><b>SURAT KETERANGAN <br>
        UNTUK MENDAPATKAN PEMBAYARAN TUNJANGAN KELUARGA</b></p>
        <table border="0" cellpadding="2" cellspasing="1">
            <tr>
                <td style="width: 30px">1.</td>
                <td style="width: 200px">Nama Lengkap</td>
                <td style="width: 20px">:</td>
                <td style="width: 260px">{{ $data->name }}</td> 
            </tr>
            <tr>
                <td>2.</td>
                <td>NIP/NRK</td>
                <td>:</td>
                <td>{{ $data->nip }}</td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $data->tempat_lahir }}</td>
            </tr>
            <tr>
                <td>4.</td>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $data->jk }}</td>
            </tr>
            <tr>
                <td>5.</td>
                <td>Agama</td>
                <td>:</td>
                <td>{{ $data->agama }}</td>
            </tr>
            <tr>
                <td>6.</td>
                <td>Status Kepegawaian</td>
                <td>:</td>
                <td>PNS Daerah</td>
            </tr>
            <tr>
                <td>7.</td>
                <td>Jabatan Struktural/Fungsional</td>
                <td>:</td>
                <td>{{ $data->jabatan }}</td>
            </tr>
            <tr>
                <td>8.</td>
                <td>Pangkat/Golongan</td>
                <td>:</td>
                <td>{{ $data->pangkat_gol }}</td>
            </tr>
            <tr>
                <td>9.</td>
                <td>Pada Unit Kerja</td>
                <td>:</td>
                <td>{{ $data->unit_kerja }}</td>
            </tr>
            <tr>
                <td>10.</td>
                <td>Masa Kerja Golongan</td>
                <td>:</td>
                <td>{{ \Carbon\Carbon::parse( $data->tmt_pangkat)->diff(\Carbon\Carbon::now())->format('%y tahun, %m bulan')}} Masa Kerja Tambahan 00 Tahun</td>
            </tr>
            <tr>
                <td>11.</td>
                <td>Digaji menurut</td>
                <td>:</td>
                <td style="text-align: justify">PP Nomor 05 Tahun 2024 (CPNS dan PNS), Perpres Nomor 98 Tahun 2020 (PPPK)</td>
            </tr>
            <tr>
                <td>12.</td>
                <td>Alamat / Tempat Tinggal</td>
                <td>:</td>
                <td style="text-align: justify" >{{ $data->alamat }}</td>
            </tr>
        </table>
        <p>Menerangkan dengan sesungguhnya bahwa saya mempunyai susunan keluarga sebagai berikut :</p>
        <table border="1" cellpadding="2" cellspasing="2" >
        <tr style="text-align: center; background-color: rgb(196, 186, 186)">
            <td style="width: 30px" rowspan="2">No.</td>
            <td style="width: 130px" rowspan="2">Nama Istri / Suami Tanggungan </td>
            <td colspan="2">Tanggal</td>
            <td style="width: 60px" rowspan="2">Pekerjaan</td>
            <td style="width: 65px" rowspan="2">Keterangan</td>
            <td rowspan="2">Mendapat <br> tunjangan</td>
        </tr>
        <tr style="text-align: center; background-color: rgb(196, 186, 186)">
            <td>Kelahiran</td>
            <td>Perkawinan</td>
        </tr>
        @if ($data->pasangan->status == 'menanggung')
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
        @else
            <tr>
                <?php $no =1 ?>
                <td style="text-align: center">
                    @if ($data->pasangan->name == '-')
                    @else
                    <?php echo $no++ ?>.
                    @endif
                </td>
                <td>{{$data->pasangan->name }}</td>
                <td style="text-align: center">
                    @if ($data->pasangan->name =='-')
                    @else
                    {{ Carbon\Carbon::parse($data->pasangan->tgl_lahir)->translatedFormat('d - m - Y ') }} 
                    @endif
                </td>
                <td>
                    @if ($data->pasangan->name =='-')
                    @else
                    {{ Carbon\Carbon::parse($data->pasangan->tgl_kawin)->translatedFormat('d - m - Y ') }} 
                    @endif
                </td>
                <td style="text-align: center">{{ $data->pasangan->job  }}</td>
                <td style="text-align: center">
                    @if ($data->pasangan->name =="-")
                    @else
                    @if ($data->jk ==='Perempuan' )
                    Suami
                    @else
                    Istri
                    @endif
                    @endif
                </td>
                <td style="text-align: center">
                    @if ($data->pasangan->name == '-')
                    @else
                        @if ( $data->pasangan->status == 'menanggung') 
                            --
                        @else
                            <span style="font-family:zapfdingbats;">4</span>
                        @endif
                    @endif
                </td>
            </tr>
            <?php $no =2 ?>
            @foreach ($data->anak as $item)
            <tr>
                <td style="text-align: center"><?php echo $no++; ?>.</td>
                <td>{{$item->name }}</td>
                <td>  {{ Carbon\Carbon::parse($item->tgl_lahir)->translatedFormat('d - m - Y ') }}</td>
                <td style="text-align: center">{{ $item->perkawinan }}</td>
                <td style="text-align: center">{{ $item->pekerjaan }}</td>
                <td style="text-align: center">{{ $item->anak }}</td>
                <td style="text-align: center;">
                    @if ($item->kat ==1)
                    <span style="font-family:zapfdingbats;">4</span>
                    @else
                        -- 
                    @endif
                </td>
            </tr>
            @endforeach
        @endif
        </table>
        <p style="text-align: justify">Keterangan ini saya buat dengan sesungguhnya dan apabila keterangan ini ternyata tidak benar (palsu), saya bersedia dituntut dimuka Pengadilan berdasarkan undang-undang yang berlaku, dan bersedia mengembalikan semua uang tunjangan anak yang telah saya terima yang seharusnya bukan menjadi hak saya.</p>
        
        <table border="0" cellpadding="2" cellspasing="1" >
            <tr style="text-align: center">
                <td>
                    @if ($data->penilai->jabatan == 'Kepala Dinas')
                        <a href="/penilai.edit_penilai/{{ $data->penilai->id }}" style="text-decoration: none"> <i class="fa fa-edit tampil"></i></a> 
                        Mengetahui,<br>
                            {{ $data->penilai->jabatan }} <br>
                            Dinas Pendidikan <br>
                            Provinsi Kepulauan Bangka Belitung <br><br><br><br>
                            {{ $data->penilai->nama }} <br>
                            NIP. {{ $data->penilai->nip }} 
                                
                            Simpang Rimba, {{ Carbon\Carbon::parse($data->tgl_kp4)->translatedFormat('d  F  Y ') }} 
                            <br>
                            <br>
                            Yang menerangkan,<br><br><br><br>
                            {{ $data->name }} <br>
                            NIP.
                            {{ $data->nip }}
                    @else
                        <a href="/penilai.edit_penilai/{{ $data->penilai->id }}" style="text-decoration: none"> <i class="fa fa-edit tampil"></i></a> 
                        <br>
                        Mengetahui,<br>
                        {{ Str::title($data->penilai->jabatan) }}
                            <br><br><br>
                            {{ $data->penilai->nama }} <br>
                            NIP. {{ $data->penilai->nip }} 
                            
                    @endif
                </td>
                <td>
                    @if ($data->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
                        Pangkalpinang, {{ Carbon\Carbon::parse($data->tgl_kp4)->translatedFormat('d  F  Y ') }} <br>
                        Yang menerangkan,<br><br><br>
                        {{ $data->name }} <br>
                        NIP.
                        {{ $data->nip }}
                    @else
                        Simpang Rimba, {{ Carbon\Carbon::parse($data->tgl_kp4)->translatedFormat('d  F  Y ') }} 
                        <br>
                        Yang menerangkan,<br><br><br><br>
                        {{ $data->name }} <br>
                        NIP.
                        {{ $data->nip }}
                    @endif
                </td>
            </tr>
        </table>
</body>
</html>