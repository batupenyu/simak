@extends('layout.master')

@section('content')

<style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
    .page-number:before {
    content: "Page: " counter(page);}
</style>

<div class="container-xxl">
    <div class="container-fluid mt-3">
    @if ($project->user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
        <h4 style="text-align:center">SASARAN KINERJA PEGAWAI PEJABAT FUNGSIONAL <br>
            {{ $project->user->jabatan }} <br>
            PENDEKATAN HASIL KERJA KUANTITATIF
        </h4> <br><br><br>
        <div class="row justify-content-between fw-bold upper">
            <div class="col-5">
            Nama Instansi : <br> {{ $project->user->unit_kerja }}
        </div>
        <div class="col-4">
            Periode Penilaian : <br>
            {{ Carbon\Carbon::parse($project->user->tgl_awal)->translatedFormat('d F Y ') }}
            s.d
            {{ Carbon\Carbon::parse($project->user->tgl_akhir)->translatedFormat('d F Y ') }}
        </div>
    @else
        <h4 style="text-align:center">SASARAN KINERJA PEGAWAI</h4><br>
        <div class="row justify-content-between fw-bold upper">
            <div class="col-5">
        Nama Instansi : <br> Dinas Pendidikan Pro. Kep. Bangka Belitung
            </div>
            <div class="col-4">
                Periode Penilaian : <br>
                {{ Carbon\Carbon::parse($project->user->tgl_awal)->translatedFormat('d F Y ') }}
                s.d
                {{ Carbon\Carbon::parse($project->user->tgl_akhir)->translatedFormat('d F Y ') }}
            </div>
        </div>
    @endif
</div>
<table class="table table-sm table-bordered border-primary" style="background-color: beige">
    <tbody>
        <tr>
            <th style="text-align: center;">NO</th>
            <th style="text-align: center;" colspan="2">PEGAWAI YANG DINILAI &nbsp;
                <a href="/project.edit_user/{{ $project->user->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a>
            </th>
            <th style="text-align: center;">NO</th>
            <th style="text-align: center;" colspan="2">PEJABAT PENILAI KINERJA &nbsp;
                <a href="/penilai.edit_penilai/{{ $project->user->penilai->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a>
            </th>
        </tr>
        <tr>
            <td style="text-align: center; width: 3%">1</td>
            <td style="width: 200px">NAMA</td>
            @if ($project->user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
                <td style="width: 380px; text-transform:uppercase; padding-left: 30px"">
                    {{ $project->user->name }}
                </td>
            @else
                <td style="width: 380px; padding-left: 30px">
                    {{ $project->user->name }}
                </td>
            @endif
            <td style="text-align: center; width: 3%">1</td>
            <td style="width: 200px">NAMA</td>
            <td style="width: 380px; padding-left: 30px">
                {{ $project->user->penilai->nama }}
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">2</td>
            <td>NIP</td>
            <td style=" padding-left: 30px">
                {{ $project->user->nip }}
            </td>
            <td style="text-align: center;">2</td>
            <td>NIP</td>
            <td style=" padding-left: 30px">
                {{ $project->user->penilai->nip }}
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">3</td>
            <td>PANGKAT/GOL RUANG</td>
            <td style=" padding-left: 30px">
                {{ $project->user->pangkat_gol }}
            </td>
            <td style="text-align: center;">3</td>
            <td>PANGKAT/GOL RUANG</td>
            <td style=" padding-left: 30px">
                {{ optional($project->user->penilai)->pangkat_gol ?? '' }}
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">4</td>
            <td>JABATAN</td>
            <td style=" padding-left: 30px">
                {{ $project->user->jabatan }}
            </td>
            <td style="text-align: center;">4</td>
            <td>JABATAN</td>
            <td style=" padding-left: 30px">
                {{ $project->user->penilai->jabatan }}
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">5</td>
            <td>UNIT KERJA</td>
            <td style=" padding-left: 30px">
                {{ $project->user->unit_kerja }}
            </td>
            <td style="text-align: center;">5</td>
            <td>UNIT KERJA</td>
            <td style=" padding-left: 30px">
                {{ $project->user->penilai->unit_kerja }}
            </td>
        </tr>
    </tbody>
</table>


<div style="overflow-x: auto">
    <a href="{{ url('tugas.tambah/' . $project->user->id) }}" class="btn btn-sm btn-success btn-flat tampil" ><i class="fa fa-plus"></i> RKU</a>
    <a href="{{ url('tutam.tambah/'.$project->user->id ) }}" class="btn btn-sm btn-success btn-flat tampil" ><i class="fa fa-plus"></i> RKT</a>
    <table class="table table-sm table-bordered border-dark mt-2"  >
        <tbody>

            <tr style="overflow-x: auto ">
                <th style="text-align: center; width: 50px;">No</th>
                <th style="text-align: center; width: 250px;">Rencana Hasil Kerja Atasan Yang Diintervensi</th>
                <th style="text-align: center; width: 300px;">Rencana Hasil Kerja</th>
                <th colspan="3">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td style="width: 100px; text-align:center">Aspek
                            </td>
                            <td style="width: 30px; text-align:center"></td>
                            <td style="width: 250px;  text-align:center">Indikator Kinerja
                            </td>
                            <td style=" text-align:center">Target
                            </td>
                        </tr>
                    </table>
                </th>
            </tr>
            <tr>
                <th colspan="6">Utama
                </th>
            </tr>

            @foreach ($project->user->tugas as $data)
            <tr>
                <td style="text-align: center;" >{{ $loop->iteration }} </td>
                <td >
                    {{ $data->name }} <br>
                    <button class="btn btn-sm tampil">
                        <a href="/tugas.edit_tugas/{{ $data->id }}" style="text-decoration: none" > <i class="fa fa-edit"></i></a>
                    </button>
                    <form class="d-inline" onsubmit="return confirm('yakin hapus data?!!..')" action="/tugas.delete/{{ $data->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm tampil " type="submit"><i class="fa fa-trash-o fa-lg" style="color: #ee1939"></i></button>
                    </form>
                </td>
                <td>{{ $data->name }} <br>
                    <button class="btn btn-sm btn-light tampil ">
                        <a href=" {{ url('tupoksi.tambah/'.$data->id) }}" style="text-decoration: none" ><i class="fa fa-plus "><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Indikator</b></i></a>
                    </button>
                </td>

                <td style="vertical-align:text-top" colspan="3">
                    @foreach ($data->tupoksi as $item)
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td style="width: 100px">
                                {{ $item->aspek }}
                            </td>
                            <td style="width: 30px">:</td>
                            <td style="width: 250px;text-align:justify">
                                {{ $item->indikator }} <br>
                                <form class="d-inline" onsubmit="return confirm('yakin hapus data?!!..')" action="/tupoksi.destroy/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm  tampil"  type="submit"><i class="fa fa-trash-o fa-lg" style="color: #ee1939"></i></button>
                                </form>
                                    <button class="btn btn-sm  tampil">
                                        <a href=" {{ url('tupoksi.edit_tupoksi/'.$item->id) }}" style="text-decoration: none"><i class=" fa fa-edit" ><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> </b></i></a>
                                    </button>
                            </td>
                            <td style="text-align: center">
                                {{ $item->target }}
                            </td>
                        </tr>

                    </table>
                    @endforeach

                </td>
            </tr>
            @endforeach


            @foreach ($project->user->tutam as $data)
            <tr>
                <th colspan="8">
                    Tambahan
                </th>
            </tr>

            <tr>
                <td style="text-align: center;" >{{ $loop->iteration }} </td>
                <td >{{ $data->rk->name }}
                    <button class="btn btn-sm   tampil">
                        <a href="{{ url('tutam.edit/'.$data->id) }}" class="tampil"><i class="fa fa-edit"></i></a>
                    </button>
                    <form class="d-inline" onsubmit="return confirm('yakin hapus data?!!..')" action="/tutam.destroy/{{ $data->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm tampil" type="submit"><i class="fa fa-trash-o fa-lg " style="color: #ee1939"></i></button>
                    </form>
                </td>

                <td>{{ $data->name }} <br>

                    <button class="btn btn-sm btn-light tampil ">
                        <a href=" {{ url('tuti.tambah/'.$data->id) }}" style="text-decoration: none" ><i class="fa fa-plus "><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Indikator</b></i></a>
                    </button>
                </td>

                <td style="vertical-align:text-top" colspan="3">
                    @foreach ($data->tuti as $item)
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td style="width: 100px">
                                {{ $item->aspek }}
                            </td>
                            <td style="width: 30px">:</td>
                            <td style="width: 250px;text-align:justify">
                                {{ $item->indikator }} <br>
                                <form class="d-inline" onsubmit="return confirm('yakin hapus data?!!..')" action="/tuti.destroy/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm   tampil"  type="submit"><i class="fa fa-trash-o fa-lg" style="color: #ee1939" ><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> </b></i></button>
                                </form>
                                    <button class="btn btn-sm   tampil">
                                        <a href=" {{ url('tuti.edit/'.$item->id) }}" style="text-decoration: none"><i class=" fa fa-edit" ><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> </b></i></a>
                                    </button>
                            </td>
                            <td style="text-align: center">
                                {{ $item->target }}
                            </td>
                        </tr>

                    </table>
                    @endforeach

                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>


    @include('lampiran.perilaku')
    @include('lampiran.lampiran') <br>


    <div class="row justify-content-around text-center fw-bold ">
        @if ($project->user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
        <div class="col-4" style="text-transform: uppercase">
            <br><br>
            PEGAWAI YANG DINILAI <br><br><br>
            {{ $project->user->name }} <br>
            NIP.{{ $project->user->nip }}
        </div>
        @else
        <div class="col-4">
            <br><br>
            PEGAWAI YANG DINILAI <br><br><br>
            {{ $project->user->name }} <br>
            NIP.{{ $project->user->nip }}
        </div>
        @endif

    <div class="col-4">
        @if ($project->user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
            Pangkalpinang, {{ Carbon\Carbon::parse($project->user->tgl_akhir)->translatedFormat('d F Y ') }}
            <br><br>
            PEJABAT PENILAI KINERJA <br><br><br>
            {{ $project->user->penilai->nama }} <br>
            NIP.{{ $project->user->penilai->nip }}
            @else
            Simpang Rimba, {{ Carbon\Carbon::parse($project->user->tgl_akhir)->translatedFormat('d F Y ') }}
            <br><br>
            PEJABAT PENILAI KINERJA <br><br><br>
            {{ $project->user->penilai->nama }} <br>
            NIP.{{ $project->user->penilai->nip }}
        @endif
        <br><br>
    </div>
    </div>
</div>
<div class="page-number"></div>

@endsection