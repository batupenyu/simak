@extends('layout.sidebar')

@section('content')
@section('title','kp4 new')

<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">

<style>
    p {
        text-align: justify;
        text-justify: inter-word;
    }
</style>

<body>
    <div class=" container-xl container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-borderless table-sm ">
                    <thead>
                        <tr>
                            <td colspan="4">
                                <button onclick="window.print();" class="btn btn-sm btn-primary tampil float-end">Cetak</button>
                                <button type="button" class="btn btn-sm btn-primary  float-end">FORM KP4</button>
                                <a class="btn btn-sm  float-end" href="{{ route('kp4newpdf', $data->id) }}"><i class="bi-printer-fill"></i></a>
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
                                <a href="/project.edit_user/{{ $data->id }}" style="text-decoration: none"> <i class="fa fa-edit tampil"></i></a>
                                <a href="/project.index_anak/{{ $data->id }}" style="text-decoration: none"> <i class="fa fa-users tampil"></i></a>
                            </td>
                        <tr>
                            <td>2.</td>
                            <td>NIP/NRK</td>
                            <td>:</td>
                            <td>{{ $data->nip }}</td>
                        </tr>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Tempat / Tanggal Lahir</td>
                            <td>:</td>
                            <td>
                                {{ Carbon\Carbon::parse($data->tgl_lahir)->translatedFormat('d - m - Y ') }} <br>
                            </td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>
                                {{ $data->jk }}
                            </td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td>Agama</td>
                            <td>:</td>
                            <td>
                                {{ $data->agama }}
                            </td>
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
                            <td>
                                {{ $data->jabatan }}
                            </td>
                        </tr>
                        <tr class="align-top">
                            <td>8.</td>
                            <td>Pangkat / Golongan
                            </td>
                            <td>:</td>
                            <td>
                                {{ $data->pangkat_gol }}
                            </td>
                        </tr>
                        <tr>
                            <td>9.</td>
                            <td>Pada Unit Kerja</td>
                            <td>:</td>
                            <td>SMK Negeri 1 Simpang Rimba</td>
                        </tr>
                        <tr>
                            <td>10.</td>
                            <td>Masa Kerja Golongan</td>
                            <td>:</td>

                            <td>
                                {{-- {{ $years }} Tahun --}}
                                {{-- {{ \Carbon\Carbon::parse( $data->user->tgl_lahir)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days')}} --}}
                                {{ \Carbon\Carbon::parse( $data->tmt_pangkat)->diff(\Carbon\Carbon::now())->format('%y tahun, %m bulan')}}
                                Masa Kerja Tambahan 00 Tahun
                            </td>
                        </tr>
                        <tr class="align-top">
                            <td>11.</td>
                            <td>Digaji menurut</td>
                            <td>:</td>
                            <td>PP Nomor 05 Tahun 2024 (CPNS dan PNS), Perpres Nomor 98 Tahun 2020 (PPPK)</td>
                        </tr>
                        <tr class="align-top">
                            <td>12.</td>
                            <td>Alamat / Tempat Tinggal</td>
                            <td>:</td>
                            <td>
                                {{ $data->alamat }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: justify" colspan="4">
                                menerangkan dengan sesungguhnya bahwa saya mempunyai susunan keluarga sebagai berikut : </td>
                        </tr>
                        <tr>
                            <table class="table table-sm table-bordered border-dark">
                                <tr style="text-align: center; vertical-align:middle">
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Nama</th>
                                    <th colspan="2">Tangggal</th>
                                    <th rowspan="2">Pekerjaan</th>
                                    <th rowspan="2">Keterangan</th>
                                    <th rowspan="2">Mendapatkan <br> Tunjangan</th>
                                </tr>
                                <tr style="text-align: center; vertical-align:middle">
                                    <th>Lahir</th>
                                    <th>Kawin</th>
                                </tr>
                                <tr>
                                    <?php $no = 1 ?>
                                    <td style="text-align: center;">
                                        @if ($data->pasangan && $data->pasangan->name == '-')

                                        @else
                                        <?php echo $no++ ?>.
                                        @endif
                                    </td>
                                    <td>&nbsp;{{ $data->pasangan ? $data->pasangan->name : '' }}
                                        @if($data->pasangan)
                                        <a href="{{ url('pasangan/edit/'.$data->pasangan->id) }}" class="tampil"><i class="fa fa-edit"></i></a>
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        @if ($data->pasangan && $data->pasangan->name =="-")
                                        @else
                                        {{ \Carbon\Carbon::parse( $data->pasangan ? $data->pasangan->tgl_lahir : null)->translatedFormat('d - m - Y ') }}
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        @if ($data->pasangan && $data->pasangan->name =="-")
                                        @else
                                        {{ \Carbon\Carbon::parse( $data->pasangan ? $data->pasangan->tgl_kawin : null)->translatedFormat('d - m - Y ') }}
                                        @endif
                                    </td>
                                    <td style="text-align: center">{{ $data->pasangan ? $data->pasangan->job : ''}}</td>
                                    <td style="text-align: center">
                                        @if ($data->pasangan && $data->pasangan->name =="-")
                                        @else
                                        @if ($data->jk ==='Perempuan' )
                                        Suami
                                        @else
                                        Istri
                                        @endif
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        @if ($data->pasangan && $data->pasangan->name == '-')
                                        @else
                                        @if ( $data->pasangan && $data->pasangan->status == 'menanggung')
                                        --
                                        @else
                                        <i class="fa fa-check"></i>
                                        @endif
                                        @endif
                                    </td>
                                </tr>
                                @foreach ($data->anak as $item)
                                <tr>
                                    <td style="text-align: center;"><?php echo $no++ ?>.</td>
                                    <td>&nbsp;{{ $item->name }}
                                        <a href={{ url('project.edit_anak/'.$item->id) }} class="tampil"> <i class="fa fa-edit"></i></button></a><br>
                                    </td>
                                    <td style="text-align: center">{{ \Carbon\Carbon::parse( $item->tgl_lahir)->translatedFormat('d - m - Y ') }}</td>
                                    <td style="text-align: center;"> {{ $item->perkawinan }}</td>
                                    <td style="text-align: center;"> {{ $item->pekerjaan }}</td>
                                    <td style="text-align: center;"> {{ $item->anak }}</td>
                                    <td style="text-align: center;">
                                        @if ($item->kat == '1')
                                        <i class="fa fa-check"></i>
                                        @else
                                        --
                                        @endif

                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </tr>
                        <tr>
                            <p>Keterangan ini saya buat dengan sesungguhnya dan apabila keterangan ini ternyata tidak benar (palsu), saya bersedia dituntut dimuka Pengadilan berdasarkan undang-undang yang berlaku, dan bersedia mengembalikan semua uang tunjangan anak yang telah saya terima yang seharusnya bukan menjadi hak saya.</p>
                        </tr>
                        <br>
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
                            {{-- Yang menerangkan, --}}
                            <br><br><br>
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