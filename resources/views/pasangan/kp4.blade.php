@extends('layout.sidebar')

@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">

<body>
    <div class=" container-xl container-fluid">
        {{-- <button onclick="window.print();" class="btn btn-sm btn-primary tampil float-end">Cetak</button> --}}
        <a class="btn btn-sm  float-end" href="{{ url('kp4pdf/'.$data->id) }}"><i class="bi-printer-fill"></i></a>
        <h4><a href="{{ url('pegawai.index') }}" class="btn btn-sm tampil float-end"><i class="bi-house-fill"></i></a></h4>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-borderless table-sm ">
                    <thead>
                        <tr>
                            <td colspan="4">
                                <h6 class="text-end">KP.4</h6>
                                <h5 class="text-center">SURAT KETERANGAN <br>
                                    <u>
                                        UNTUK MENDAPATKAN PEMBAYARAN TUNJANGAN KELUARGA
                                    </u>
                                </h5>
                                <h5 class="mt-5">Saya yang bertandatangan dibawah ini :</h5>
                            </td>
                        </tr>

                            <tr>
                                <td>1.</td>
                                <td width="400px">Nama Lengkap
                                </td>
                                <td>:</td>
                                <td>
                                    {{$data->name }}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    NIP.
                                    {{ $data->nip }}
                                    <a href="/project.edit_user/{{ $data->id }}" style="text-decoration: none"> <i class="fa fa-edit tampil"></i></a> 
                                    <a href="/project.index_anak/{{ $data->id }}" style="text-decoration: none"> <i class="fa fa-users tampil"></i></a>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Tempat / Tanggal Lahir</td>
                                <td>:</td>
                                <td>
                                    {{ Carbon\Carbon::parse($data->tgl_lahir)->translatedFormat('d - m - Y ') }} <br>
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>
                                    {{ $data->jk }}
                                </td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Agama</td>
                                <td>:</td>
                                <td>
                                    {{ $data->agama }}
                                </td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>Kebangsaaan</td>
                                <td>:</td>
                                <td>Indonesia</td>
                            </tr>
                            <tr class="align-top">
                                <td>6.</td>
                                <td>Pangkat / Golongan / Status <br>
                                    Kepegawaian
                                </td>
                                <td>:</td>
                                <td>
                                    {{ $data->pangkat_gol }}
                                </td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td>Jabatan Struktural/Fungsional</td>
                                <td>:</td>
                                <td>
                                    {{ $data->jabatan }}
                                </td>
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
                                
                                <td>
                                    {{-- {{ $years }} Tahun  --}}
                                    {{-- {{ \Carbon\Carbon::parse( $data->user->tgl_lahir)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days')}} --}}
                                    {{ \Carbon\Carbon::parse( $data->tmt_pangkat)->diff(\Carbon\Carbon::now())->format('%y tahun, %m bulan')}}
                                    Masa Kerja Tambahan 00 Tahun</td>
                            </tr>
                            <tr class="align-top">
                                <td>10.</td>
                                <td>Digaji menurut</td>
                                <td>:</td>
                                <td>PP Nomor 05 Tahun 2024 (CPNS dan PNS), Perpres Nomor 98 Tahun 2020 (PPPK)</td>
                            </tr>
                            <tr class="align-top">
                                <td></td>
                                <td>Alamat / Tempat Tinggal</td>
                                <td>:</td>
                                <td>
                                    {{ $data->alamat }}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Menerangkan dengan sesungguhnya bahwa saya </td>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <ol type="a">
                                        <li>
                                            Disamping Jabatan Utama tersebut, bekerja pula sebagai : <br>
                                            dengan mendapat penghasilan sebesar
                                        </li>
                                        <li>
                                            Mempunyai Pensiun / Pensiun Janda
                                        </li>
                                        <li>
                                            Kawin sah dengan :
                                        </li>
                                    </ol>
                                </td>
                                <td colspan="2">
                                    <table class="table table-borderless table-sm">
                                        <tr>
                                            <td>
                                                : -
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                : -
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                    </table>
                                </td>

                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <table class="table table-bordered">
                                        <tr class="text-center align-middle">
                                            <td rowspan="2">Nama Istri / Suami Tanggungan
                                                <a href="{{ url('pasangan.edit/'.$data->pasangan->id) }}"><i class="fa fa-edit tampil"></i></a>

                                            </td>
                                            <td colspan="2">Tanggal</td>
                                            <td rowspan="2">Pekerjaan </td>
                                            <td rowspan="2">Penghasilan <br> Sebulan </td>
                                            <td rowspan="2">Keterangan </td>
                                        </tr>
                                        <tr class="text-center">
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
                                        <tr class="text-center align-middle">
                                            <td>
                                                {{ $data->pasangan->name }}
                                            </td>
                                            <td width="150px">
                                                @if ($data->pasangan->name =='-')
                                                @else
                                                {{ Carbon\Carbon::parse($data->pasangan->tgl_lahir)->translatedFormat('d - m - Y ') }} 
                                                @endif
                                            </td>
                                            <td width="150px">
                                                @if ($data->pasangan->name =='-')
                                                @else
                                                {{ Carbon\Carbon::parse($data->pasangan->tgl_kawin)->translatedFormat('d - m - Y ') }} 
                                                @endif
                                                <td>
                                                    {{ $data->pasangan->job  }}
                                                </td>
                                                <td width="150px">
                                                {{-- {{ $data->pasangan->net  }} --}}
                                                @if ($data->pasangan->name =='-')
                                                @else
                                                {{number_format($data->pasangan->net,2)}}
                                                @endif

                                            </td>
                                            <td>-</td>
                                        </tr>
                                    @endif
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <ol type="a" start="4">
                                        <li>
                                            Mempunyai anak – anak seperti dalam daftar sebelah ini, yaitu :
                                        </li>
                                        <ol type="I">
                                            <li>
                                                Anak Kandung ( Ak ) Anak Tiri ( At ) yang masih menjadi tanggungan, belum mempunyai pekerjaan sendiri dan masuk dalam daftar Gaji.
                                            </li>
                                            <li>
                                                Anak Kandung ( Ak ), Anak Tiri ( At ) Anak Angkat ( Aa ) yang masih menjadi tanggungan, tetapi tidak termasuk dalam daftar Gaji.
                                            </li>
                                        </ol>
                                            <li>
                                                Jumlah anak seluruh (
                                                    @if ($anak->anak_count == 0)
                                                        - Orang
                                                    @else
                                                    <strong>
                                                        {{ $anak->anak_count }} Orang
                                                    </strong>
                                                    @endif
                                                )
                                                yang menjadi tanggungan termasuk yang tidak termasuk dalam daftar gaji 
                                                <br>
                                                {{-- <button >
                                                    @foreach ($data1 as $item)
                                                        {{ $item->title }} <br>
                                                    @endforeach
                                                </button> --}}
                                            </li>
                                    </ol>
                                </td>
                            </tr>
                    <tr>
                        <td style="text-align: justify" colspan="4">
                            Keterangan ini saya buat dengan sesungguhnya dan apabila keterangan ini ternyata tidak benar/palsu, saya bersedia dituntut dimuka Pengadilan berdasarkan undang-undang yang berlaku, dan bersedia mengembalikan semua uang tunjangan anak yang telah saya terima yang seharusnya bukan menjadi hak saya.
                        </td>
                    </tr>
                    </thead>

                </table><br>
                <tbody>

                    @if ($data->penilai->jabatan == 'Kepala Dinas')
                        <div class="row justify-content-around text-center fw-bold">
                            <div class="col-6"> 
                                <a href="/penilai.edit_penilai/{{ $data->penilai->id }}" style="text-decoration: none"> <i class="fa fa-edit tampil"></i></a> 
                                Mengetahui,<br>
                                    {{ $data->penilai->jabatan }} <br>
                                    Dinas Pendidikan <br>
                                    Provinsi Kepulauan Bangka Belitung <br><br><br>
                                    {{ $data->penilai->nama }} <br>
                                    NIP. {{ $data->penilai->nip }} 
                                </div>
                                <div class="col-6"><br>
                                    Simpang Rimba, {{ Carbon\Carbon::parse($data->tgl_kp4)->translatedFormat('d  F  Y ') }} 
                                    <br>
                                    <br>
                                    Yang menerangkan,<br><br><br>
                                    {{ $data->name }} <br>
                                    NIP.
                                    {{ $data->nip }}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row justify-content-around text-center fw-bold">
                            <div class="col-6"> 
                                <a href="/penilai.edit_penilai/{{ $data->penilai->id }}" style="text-decoration: none"> <i class="fa fa-edit tampil"></i></a> 
                                Mengetahui,<br>
                                {{ Str::title($data->penilai->jabatan) }}
                                    <br><br><br>
                                    {{ $data->penilai->nama }} <br>
                                    NIP. {{ $data->penilai->nip }} 
                            </div>
                                @if ($data->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
                                <div class="col-6">
                                Pangkalpinang, {{ Carbon\Carbon::parse($data->tgl_kp4)->translatedFormat('d  F  Y ') }} <br>
                                Yang menerangkan,<br><br><br>
                                    <div style="text-transform: uppercase">
                                        {{ $data->name }} <br>
                                        NIP.
                                        {{ $data->nip }}
                                    </div>
                                </div>
                                    @else
                                    <div class="col-6">
                                        Simpang Rimba, {{ Carbon\Carbon::parse($data->tgl_kp4)->translatedFormat('d  F  Y ') }} 
                                        <br>
                                        Yang menerangkan,<br><br><br>
                                        {{ $data->name }} <br>
                                        NIP.
                                        {{ $data->nip }}
                                    </div>
                                @endif
                                </div>
                        </div>
                    @endif
                </tbody>
            </div>
        </div>
    </div>
</body>
@endsection