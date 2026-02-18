<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 20mm;
        }
        @page :first {
            size: A4 portrait;
            margin: 20mm;
        }
        .landscape-page {
            page-break-before: always;
            size: A4 landscape;
        }
    </style>
</head>
<body>
    <p style="text-align: right">KP4</p>
    <p style="text-align: center">SURAT KETERANGAN <br>
        UNTUK MENDAPATKAN PEMBAYARAN TUNJANGAN KELUARGA</p>
        <table border="0" cellpadding="2" cellspasing="1">
            <tr>
                <td style="width: 30px">1.</td>
                <td style="width: 200px">Nama</td>
                <td style="width: 20px">:</td>
                <td style="width: 130px">{{ $data->name }}</td> 
                <td style="width: 130px">NIP. {{ $data->nip }}</td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $data->tempat_lahir }}</td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $data->jk }}</td>
            </tr>
            <tr>
                <td>4.</td>
                <td>Agama</td>
                <td>:</td>
                <td>{{ $data->agama }}</td>
            </tr>
            <tr>
                <td>5.</td>
                <td>Kebangsaaan</td>
                <td>:</td>
                <td>Indonesia</td>
            </tr>
            <tr>
                <td>6.</td>
                <td>Pangkat / Golongan / Status <br>Kepegawaian</td>
                <td>:</td>
                <td>{{ $data->pangkat_gol }}</td>
            </tr>
            <tr>
                <td>7.</td>
                <td>Jabatan Struktural/Fungsional</td>
                <td>:</td>
                <td>{{ $data->jabatan }}</td>
            </tr>
            <tr>
                <td>8.</td>
                <td>Pada Instansi, Dept. Lembaga</td>
                <td>:</td>
                <td>{{ $data->unit_kerja }}</td>
            </tr>
            <tr>
                <td>9.</td>
                <td>Masa Kerja Golongan</td>
                <td>:</td>
                <td colspan="2">{{ \Carbon\Carbon::parse( $data->tmt_pangkat)->diff(\Carbon\Carbon::now())->format('%y tahun, %m bulan')}} Masa Kerja Tambahan 00 Tahun</td>
            </tr>
            <tr>
                <td>10.</td>
                <td>Digaji menurut</td>
                <td>:</td>
                <td colspan="2">PP Nomor 05 Tahun 2024 (CPNS dan PNS), Perpres Nomor 98 Tahun 2020 (PPPK)</td>
            </tr>
            <tr>
                <td></td>
                <td>Alamat / Tempat Tinggal</td>
                <td>:</td>
                <td colspan="2">{{ $data->alamat }}</td>
            </tr>
        </table>
        <tr nobr = "true">
            <td> </td>
        </tr>
        <table border="0" cellpadding="2" cellspasing="1" style="width: 724px">
            <tr>
                <td style="width: 30px"></td>
                <td colspan="2">Menerangkan dengan sesungguhnya bahwa saya : </td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 20px">a.</td>
                <td style="width: 180px">Disamping Jabatan Utama tersebut, bekerja pula sebagai :
                    dengan mendapat penghasilan sebesar
                </td>
                <td style="width: 20px">:</td>
            </tr>
            <tr>
                <td></td>
                <td>b.</td>
                <td>Mempunyai Pensiun / Pensiun Janda</td>
                <td>:</td>
            </tr>
            <tr>
                <td></td>
                <td>c.</td>
                <td>Kawin sah dengan :</td>
                <td>:</td>
            </tr>
        </table>
        <tr nobr = "true">
            <td> </td>
        </tr>
        <table border="1" cellpadding="2" cellspasing="1" >
        <tr style="text-align: center">
            <td rowspan="2">Nama Istri / Suami Tanggungan </td>
            <td colspan="2">Tanggal</td>
            <td rowspan="2">Pekerjaan</td>
            <td rowspan="2">Penghasilan Sebulan</td>
            <td rowspan="2" style="width: 75px">Keterangan</td>
        </tr>
        <tr style="text-align: center">
            <td>Kelahiran</td>
            <td>Perkawinan</td>
        </tr>
        @if ($data->pasangan && $data->pasangan->status == 'menanggung')
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
        @else
            <tr style="text-align: center">
                <td>{{ $data->pasangan ? $data->pasangan->name : '-' }}
                </td>
                <td>
                    @if ($data->pasangan && $data->pasangan->name !='-')
                    {{ Carbon\Carbon::parse($data->pasangan->tgl_lahir)->translatedFormat('d - m - Y ') }}
                    @endif
                </td>
                <td>
                    @if ($data->pasangan && $data->pasangan->name !='-')
                    {{ Carbon\Carbon::parse($data->pasangan->tgl_kawin)->translatedFormat('d - m - Y ') }}
                    @endif
                </td>
                <td>{{ $data->pasangan ? $data->pasangan->job : '-' }}</td>
                <td>
                    @if ($data->pasangan && $data->pasangan->name !='-')
                    {{number_format($data->pasangan->net,2)}}
                    @endif
                </td>
            </tr>
        @endif
        </table>
        <tr nobr = "true">
            <td> </td>
        </tr>
        <table border="0" cellpadding="2" cellspasing="1" >
            <tr>
                <td style="width: 10px"></td>
                <td style="width: 503px">
                    <ol type="a" start="4">
                        <li> Mempunyai anak – anak seperti dalam daftar sebelah ini, yaitu :</li>
                        <ol type="I">
                            <li style="text-align: justify">Anak Kandung ( Ak ) Anak Tiri ( At ) yang masih menjadi tanggungan, belum mempunyai pekerjaan sendiri dan masuk dalam daftar Gaji.</li>
                            <li style="text-align: justify">Anak Kandung ( Ak ), Anak Tiri ( At ) Anak Angkat ( Aa ) yang masih menjadi tanggungan, tetapi tidak termasuk dalam daftar Gaji.</li>
                            <li>Jumlah anak seluruh ({{ $anak->anak_count }} orang)  yang menjadi tanggungan termasuk yang tidak termasuk dalam daftar gaji </li>
                        </ol>
                    </ol>
                </td>
            </tr>
            <tr>
                <td style="text-align: justify" colspan="2">Keterangan ini saya buat dengan sesungguhnya dan apabila keterangan ini ternyata tidak benar/palsu, saya bersedia dituntut dimuka Pengadilan berdasarkan undang-undang yang berlaku, dan bersedia mengembalikan semua uang tunjangan anak yang telah saya terima yang seharusnya bukan menjadi hak saya.</td>
            </tr>
        </table>
        <tr nobr = "true">
            <td> </td>
        </tr>
        <div class="landscape-page">
        <p>I. Anak Kandung ( Ak ), Anak Tiri ( At ) dan Anak Angkat ( Aa ) yang masih menjadi tanggungan, belum mempunyai penghasilan sendiri dan masuk daftar gaji</p>
        <table border="1" cellpadding="2" cellspasing="2">
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
        <p>II. Anak Kandung ( Ak ), Anak Tiri ( At ) dan Anak Angkat ( Aa ) yang masih tanggungan, tetapi tidak masuk dalam daftar gaji</p>
        <table border="1" cellpadding="2" cellspasing="2">
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

        <p>A. Supaya dilampirkan salinan Surat Keputusan Pengadilan Negeri yang disahkan <br>B. Supaya diisi jika anak dilahirkan dari istri/suami yang telah meninggal dunia atau diceraikan
        </p>
        </div>
        <tr nobr = "true">
            <td> </td>
        </tr>
        <table border="0" cellpadding="2" cellspasing="1" >
            <tr style="text-align: center">
                <td>
                    @if ($data->penilai->jabatan == 'Kepala Dinas')
                        <a href="/penilai.edit_penilai/{{ $data->penilai->id }}" style="text-decoration: none"> <i class="fa fa-edit tampil"></i></a> 
                        Mengetahui,<br>
                            {{ $data->penilai->jabatan }} <br>
                            Dinas Pendidikan <br>
                            Provinsi Kepulauan Bangka Belitung <br><br><br>
                            {{ $data->penilai->nama }} <br>
                            NIP. {{ $data->penilai->nip }} 
                                
                            Simpang Rimba, {{ Carbon\Carbon::parse($data->tgl_kp4)->translatedFormat('d  F  Y ') }} 
                            <br>
                            <br>
                            Yang menerangkan,<br><br><br>
                            {{ $data->name }} <br>
                            NIP.
                            {{ $data->nip }}
                    @else
                        <a href="/penilai.edit_penilai/{{ $data->penilai->id }}" style="text-decoration: none"> <i class="fa fa-edit tampil"></i></a> 
                        Mengetahui,<br>
                        {{ Str::title($data->penilai->jabatan) }}
                            <br><br><br>
                            {{ $data->penilai->nama }} <br>
                            NIP. {{ $data->penilai->nip }} 
                            
                    @endif
                </td>
                <td>
                        Pangkalpinang, {{ Carbon\Carbon::parse($data->tgl_kp4)->translatedFormat('d  F  Y ') }} <br>
                        Yang menerangkan,<br><br><br>
                        {{ $data->name }} <br>
                        NIP.
                        {{ $data->nip }}
                </td>
            </tr>
        </table>
</body>
</html>