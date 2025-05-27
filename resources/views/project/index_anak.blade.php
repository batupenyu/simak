@extends('layout.sidebar')

@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">

<body>
    <div class=" container-xxl container-fluid ">
        <div class="row">
            <div class="col-md-12">
                    <h4 class="text-center mb-3">
                        <a href="{{ url('/project.anak_tambah') }}" class=" btn  tampil float-end" ><i class="bi-file-plus-fill"></i></a>
                        <a href="{{ url('/pegawai.index') }}" class=" btn  tampil float-end"><i class="bi-house-fill"></i></a>
                        {{-- <button onclick="window.print()" class=" tampil float-end">Cetak</button> --}}
                        <a class="btn  float-end" href="{{ url('daftar.anak/'.$data->id) }}"><i class="bi-printer-fill"></i></a>
                    </h4>
            </div>
        </div>
        <div class="col-mt-12">
            <h5 class="text-center">
                <u>
                    DAFTAR ANAK – ANAK
                </u>
            </h5>
            <form action=" " method="POST">
                <h6 class="mt-5">I. Anak Kandung ( Ak ), Anak Tiri ( At ) dan Anak Angkat ( Aa ) yang masih menjadi tanggungan, belum mempunyai penghasilan sendiri dan masuk daftar gaji
                </h6>

                <Table class="table table-sm table-bordered border-primary   ">
                    <tr class="text-center align-middle">
                        <th rowspan="2">No.</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="2">Status <br> Anak (ak) <br> (at) (aa)</th>
                        <th rowspan="2">Tanggal Lahir</th>
                        <th rowspan="2">Belum <br> Pernah <br> Kawin</th>
                        <th rowspan="2">Bersekolah/ <br> Kuliah pada</th>
                        <th rowspan="2">Tidak mendapat <br>
                            1. Beasiswa/ darmasiswa <br>
                            2. Ikatan Dinas
                        </th>
                        <th colspan="2">Lahir dari Perkawinan</th>
                        <th rowspan="2">Tanggal Meninggal/ <br> diceraikannya <br> ayah/ibu</th>
                        <th rowspan="2">Keterangan <br> diangkat menurut : <br>
                            a. Putusan pengadilan <br>
                            b. Hukum adopsi bagi <br> keturunan Cina
                        </th>
                    </tr>
                    <tr class="text-center align-middle">
                        <th>
                            @if ( $data->jk === "Perempuan")
                            Nama Ibu
                            @else
                            Nama Ayah
                            @endif
                        </th>
                        <th>
                            @if ( $data->jk === "Laki-Laki")
                            Nama Ibu
                            @else
                            Nama Ayah
                            @endif
                        </th>
                    </tr>

                    {{-- @if ($loop->index < 1 ) --}}
                    {{-- {{ count(array($item['kat']== 1) )}} --}}
                    
                    
                    <?php $no = 1 ; ?>
                    @foreach ($data->anak as $item) 
                    <tr class="align-middle border-primary ">
                        {{-- @if ($total > 0 && $item->kat == 1) --}}
                        @if ($item->kat == 1 )
                        <td class=" text-center" height=" 50px" scope="row">
                            <?php echo $no ++?>.
                        </td>
                        <td scope="row">{{ $item->name }}   </td>
                        <td class="text-center" scope="row">{{ $item->anak }}    </td>
                        <td class="text-center" scope="row">
                            @if ($item->name == '-')
                            <section>-</section>
                            @else
                            {{ Carbon\Carbon::parse($item->tgl_lahir )->translatedFormat('d-m-Y ') }}  
                            @endif
                        </td>
                        <td class="text-center" scope="row">{{ $item->perkawinan }} </td>
                        <td class="text-center" scope="row">{{ $item->status_sekolah }} </td>
                        <td class="text-center" scope="row">{{ $item->status_beasiswa }} </td>
                        <td class="text-center">
                            @if ($item->name == '-')
                            <section>-</section>
                            @else
                            {{ $data->name}}
                            @endif
                        </td>
                        <td style="text-align: center">
                            @if ($item->name == '-')
                            <section>-</section>
                            @else
                            {{  ( $data->pasangan->name) }}
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($item->name == '-')
                            -
                            @else
                            {{ Carbon\Carbon::parse($item->tgl_meninggal_cerai )->translatedFormat('d-m-Y ') }}
                            @endif
                        </td>
                        <td class="text-center">
                            <a href={{ url('project.edit_anak/'.$item->id) }}> <button type="button" class="btn btn-sm  btn-sm tampil"><i class="bi-pencil-fill"></i></button></a>
                            <a href={{ url('hapus_anak/'.$item->id) }}> <button type="button" class="btn btn-sm btn-sm tampil"><i class="fa fa-trash-o fa-lg" style="color: #ee1939"></i></button></a>
                            <a href="/pasangan.kp4/{{ $data->id }}" style="text-decoration: none"> <i class="fa fa-hashtag tampil"></i></a>
                            {{-- <button>{{ $total }}</button> --}}
                        </td>
                    </tr>
                    
                    {{-- @else --}}
                    @endif
                    @endforeach
                    
                    {{-- @foreach ($data->anak as $item)  --}}
                    @if ($total == 0 )

                    <tr style="text-align: center ; height : 43px">
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
                    {{-- @endforeach --}}
                </table>

                <h6 class="mt-5">II. Anak Kandung ( Ak ), Anak Tiri ( At ) dan Anak Angkat ( Aa ) yang masih tanggungan, tetapi tidak masuk dalam daftar gaji</h6>
                <Table class="table table-sm table-bordered border-primary text-center ">
                    <tr class="text-center align-middle">

                        <th>No.</th>
                        <th>Nama</th>
                        <th>Status <br> Anak (ak) <br> (at) (aa)</th>
                        <th>Tanggal Lahir</th>
                        <th>Belum <br> Pernah <br> Kawin</th>
                        <th>Bersekolah/ <br> Kuliah pada</th>
                        <th> mendapat <br>
                            1. Beasiswa/ darmasiswa <br>
                            2. Ikatan Dinas
                        </th>
                        <th>bekerja atau <br> tidak bekerja</th>
                        <th>Keterangan <br> diangkat menurut : <br>
                            a. Putusan pengadilan <br>
                            b. Hukum adopsi bagi <br> keturunan Cina
                        </th>
                    </tr>

                    
                    <?php $no = 1 ; ?>
                    @foreach ($data->anak as $item)
                    @if ($item->kat == 2)
                        {{-- @if ($total == 0) --}}
                            <tr class=" align-middle">
                                <td height="50px" class="text-center" scope="row">
                                    <?php echo $no++ ?>.
                                </td>
                                <td style="text-align: left" scope="row">{{ $item->name }}</td>
                                <td class="text-center" scope="row">{{ $item->anak }}</td>
                                <td class="text-center" scope="row">
                                    {{ Carbon\Carbon::parse($item->tgl_lahir )->translatedFormat('d-m-Y ') }}  
                                </td>
                                <td class="text-center" scope="row">{{ $item->perkawinan }}</td>
                                <td class="text-center" scope="row">{{ $item->status_sekolah }}</td>
                                <td class="text-center" scope="row">{{ $item->status_beasiswa }}</td>
                                <td class="text-center" scope="row">{{ $item->pekerjaan }}</td>
                                <td class="text-center">
                                    <a href={{ url('project.edit_anak/'.$item->id) }}> <button type="button" class="btn  btn-sm tampil"><i class="fa fa-edit"></i></button></a>
                                    <a href={{ url('hapus_anak/'.$item->id) }}> <button type="button" class="btn  btn-sm tampil"><i class="fa fa-trash-o" style="color: #ee1939"></i></button></a>
                                    <a href="/pasangan.kp4/{{ $data->id }}" style="text-decoration: none"> <i class="fa fa-hashtag tampil"></i></a>
                                </td>
                            </tr>
                            {{-- @else --}}
                            @endif
                        @endforeach
                        
                        @if ($t == 0 )

                            <tr style="text-align: center ; height : 43px">
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
                        {{-- @endforeach --}}
                </table>

                <ul style="list-style-type: upper-alpha;">
                    <li>
                        Supaya dilampirkan salinan Surat Keputusan Pengadilan Negeri yang disahkan
                    </li>
                    <li>
                        Supaya diisi jika anak dilahirkan dari istri/suami yang telah meninggal dunia atau diceraikan
                    </li>
                </ul>
            </form>

        </div>
    </div>

</body>

@endsection
