@extends('layout.master')
@section('content')

<style type="text/css">
    @media print {
        .btn, .nav-tabs, .tampil { display: none !important; }
    }
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
    .page-number:before {
        content: "Page: " counter(page);
    }
    .text-center { text-align: center; }
    .w-50px { width: 50px; }
    .w-250px { width: 250px; }
    .w-300px { width: 300px; }
    .w-100px { width: 100px; }
    .w-30px { width: 30px; }
    .w-3pct { width: 3%; }
    .w-200px { width: 200px; }
    .w-380px { width: 380px; }
    .pd-left-30 { padding-left: 30px; }
    .upper { text-transform: uppercase; }
    
    /* Action buttons styling */
    .btn-sm {
        padding: 0 !important;
        font-size: 14px !important;
        display: inline-block !important;
        visibility: visible !important;
        opacity: 1 !important;
        background: transparent !important;
        border: none !important;
        min-width: auto !important;
        min-height: auto !important;
        cursor: pointer !important;
    }
    .btn-sm .fa-trash-o {
        color: #ee1939 !important;
        font-size: 16px !important;
        cursor: pointer !important;
        display: inline-block !important;
    }
    .btn-sm .fa-edit {
        color: #1890ff !important;
        font-size: 16px !important;
        cursor: pointer !important;
        display: inline-block !important;
    }
</style>

<ul class="nav nav-tabs mb-3" id="skpTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" href="{{ url('project.main/'.$user->id) }}">Rencana SKP</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" href="{{ url('project.evaluasi/'.$user->id) }}">Evaluasi</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" href="{{ url('project.report/'.$user->id) }}">Laporan</a>
    </li>
</ul>

<div class="container-xxl">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
    <div class="container-fluid mt-3">
        <!-- <button onclick="window.print();" class="btn btn-success tampil btn-flat mb-3 float-end" media="print">Cetak</button> -->
        <a href="{{ url('project.rencana_pdf/'.$user->id) }}" class="btn btn-primary tampil btn-flat mb-3" style="margin-right: 10px;">Cetak</a>
    @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
        <h4 style="text-align:center">SASARAN KINERJA PEGAWAI PEJABAT FUNGSIONAL <br>
            {{ $user->jabatan }} <br>
            PENDEKATAN HASIL KERJA KUANTITATIF
        </h4> <br><br><br>
        <div class="row justify-content-between fw-bold upper">
            <div class="col-6">
                <span>Nama Instansi : {{ $user->unit_kerja }}</span>
            </div>
            <div class="col-6 text-end">
                <span>Periode Penilaian : {{ Carbon\Carbon::parse($user->tgl_awal)->translatedFormat('d F Y ') }} s.d {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }}</span>
            </div>
        </div>
    @else
        <h4 style="text-align:center">SASARAN KINERJA PEGAWAI</h4><br>
        <div class="row justify-content-between fw-bold upper">
            <div class="col-6">
                <span>Nama Instansi : Dinas Pendidikan Pro. Kep. Bangka Belitung</span>
            </div>
            <div class="col-6 text-end">
                <span>Periode Penilaian : {{ Carbon\Carbon::parse($user->tgl_awal)->translatedFormat('d F Y ') }} s.d {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }}</span>
            </div>
        </div>
    @endif
</div>
<table class="table table-sm table-bordered border-primary" style="background-color: beige">
    <tbody>
        <tr>
            <th style="text-align: center;">NO</th>
            <th style="text-align: center;" colspan="2">PEGAWAI YANG DINILAI &nbsp;
                <a href="/project.edit_user/{{ $user->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a> 
            </th>
            <th style="text-align: center;">NO</th>
            <th style="text-align: center;" colspan="2">PEJABAT PENILAI KINERJA &nbsp;
                <a href="/penilai.edit_penilai/{{ $user->penilai->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a> 
            </th>
        </tr>
        <tr>
            <td style="text-align: center; width: 3%">1</td>
            <td style="width: 200px">NAMA</td>
            @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
                <td style="width: 380px; text-transform:uppercase; padding-left: 30px"">
                    {{ $user->name }}
                </td>
            @else
                <td style="width: 380px; padding-left: 30px">
                    {{ $user->name }}
                </td>
            @endif
            <td style="text-align: center; width: 3%">1</td>
            <td style="width: 200px">NAMA</td>
            <td style="width: 380px; padding-left: 30px">
                {{ $user->penilai->nama }}
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">2</td>
            <td>NIP</td>
            <td style=" padding-left: 30px">
                {{ $user->nip }}
            </td>
            <td style="text-align: center;">2</td>
            <td>NIP</td>
            <td style=" padding-left: 30px">
                {{ $user->penilai->nip }}
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">3</td>
            <td>PANGKAT/GOL RUANG</td>
            <td style=" padding-left: 30px">
                {{ $user->pangkat_gol }}
            </td>
            <td style="text-align: center;">3</td>
            <td>PANGKAT/GOL RUANG</td>
            <td style=" padding-left: 30px">
                {{ optional($user->penilai)->pangkat_gol ?? '' }}
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">4</td>
            <td>JABATAN</td>
            <td style=" padding-left: 30px">
                {{ $user->jabatan }}
            </td>
            <td style="text-align: center;">4</td>
            <td>JABATAN</td>
            <td style=" padding-left: 30px">
                {{ $user->penilai->jabatan }}
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">5</td>
            <td>UNIT KERJA</td>
            <td style=" padding-left: 30px">
                {{ $user->unit_kerja }}
            </td>
            <td style="text-align: center;">5</td>
            <td>UNIT KERJA</td>
            <td style=" padding-left: 30px">
                {{ $user->penilai->unit_kerja }}
            </td>
        </tr>
    </tbody>
</table>


<div style="overflow-x: auto">
    <a href="{{ url('tugas.tambah/' . $user->id) }}" class="btn btn-sm btn-success btn-flat tampil" ><i class="fa fa-plus"></i> RKU</a>
    <a href="{{ url('tutam.tambah/'.$user->id ) }}" class="btn btn-sm btn-success btn-flat tampil" ><i class="fa fa-plus"></i> RKT</a>
    <table class="table table-sm table-bordered border-dark mt-2"  >
        <tbody>
            
            <tr>
                    <th class="text-center w-50px">No</th>
                    <th class="text-center w-250px">Rencana Hasil Kerja Atasan Yang Diintervensi</th>
                    <th class="text-center w-300px">Rencana Hasil Kerja</th>
                    <th colspan="3">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td class="w-100px text-center">Aspek</td>
                                <td class="w-30px text-center"></td>
                                <td class="w-250px text-center">Indikator Kinerja</td>
                                <td class="text-center">Target</td>
                            </tr>
                        </table>
                    </th>
                </tr>
            <tr>
                <th colspan="6">Utama
                </th>
            </tr>

            @php $previousRkName = null; @endphp
            @foreach ($user->tugas as $data)
            <tr>
                <td style="text-align: center;" >{{ $loop->iteration }} </td>
                <td >
                    @if($previousRkName != ($data->rk->name ?? null))
                        {{ $data->rk->name ?? '-' }}
                        <button class="btn btn-sm">
                            <a href="/tugas.edit_tugas/{{ $data->id }}" style="text-decoration: none; color: #1890ff;" >[Edit]</a>
                        </button>
                        <form class="d-inline" onsubmit="return confirm('yakin hapus data?!!..')" action="/tugas.delete/{{ $data->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm" type="submit" style="color: #ee1939; background: none; border: none; cursor: pointer;">[Hapus]</button>
                        </form>
                        @php $previousRkName = $data->rk->name ?? null; @endphp
                    @endif
                </td>
                <td>{{ $data->name }} <br>
                    <button class="btn btn-sm btn-light">
                        <a href=" {{ url('tupoksi.tambah/'.$data->id) }}" style="text-decoration: none; color: #1890ff;" ><i class="fa fa-plus "><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Indikator</b></i></a>
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
                                    <button class="btn btn-sm" type="submit" style="color: #ee1939; background: none; border: none; cursor: pointer;">[Hapus]</button>
                                </form>
                                    <button class="btn btn-sm">
                                        <a href=" {{ url('tupoksi.edit_tupoksi/'.$item->id) }}" style="text-decoration: none; color: #1890ff;"><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">[Edit]</b></a>
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
            
        
            @foreach ($user->tutam as $data)
            <tr>
                <th colspan="8">
                    Tambahan
                </th>
            </tr>

            <tr>
                <td style="text-align: center;" >{{ $loop->iteration }} </td>
                <td >{{ $data->rk->name }}
                    <button class="btn btn-sm">
                        <a href="{{ url('tutam.edit/'.$data->id) }}" style="text-decoration: none; color: #1890ff;">[Edit]</a>
                    </button>
                    <form class="d-inline" onsubmit="return confirm('yakin hapus data?!!..')" action="/tutam.destroy/{{ $data->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm" type="submit" style="color: #ee1939; background: none; border: none; cursor: pointer;">[Hapus]</button>
                    </form>
                </td>

                <td>{{ $data->name }} <br>

                    <button class="btn btn-sm btn-light">
                        <a href=" {{ url('tuti.tambah/'.$data->id) }}" style="text-decoration: none; color: #1890ff;" ><i class="fa fa-plus "><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Indikator</b></i></a>
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
                                    <button class="btn btn-sm" type="submit" style="color: #ee1939; background: none; border: none; cursor: pointer;">[Hapus]</button>
                                </form>
                                    <button class="btn btn-sm">
                                        <a href=" {{ url('tuti.edit/'.$item->id) }}" style="text-decoration: none; color: #1890ff;"><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">[Edit]</b></a>
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
                        

        @include('lampiran.perilaku') <br>
        @include('lampiran.lampiran') <br>


    <div class="row justify-content-around text-center fw-bold ">
        @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
        <div class="col-4" style="text-transform: uppercase">
            <br><br>
            PEGAWAI YANG DINILAI <br><br><br>
            {{ $user->name }} <br>
            NIP.{{ $user->nip }}
        </div>
        @else
        <div class="col-4">
            <br><br>
            PEGAWAI YANG DINILAI <br><br><br>
            {{ $user->name }} <br>
            NIP.{{ $user->nip }}
        </div>
        @endif

    <div class="col-4">
        @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
            Pangkalpinang, {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }} 
            <br><br>
            PEJABAT PENILAI KINERJA <br><br><br>
            {{ $user->penilai->nama }} <br>
            NIP.{{ $user->penilai->nip }}
            @else
            Simpang Rimba, {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }} 
            <br><br>
            PEJABAT PENILAI KINERJA <br><br><br>
            {{ $user->penilai->nama }} <br>
            NIP.{{ $user->penilai->nip }}
        @endif
        <br><br>
    </div>
    </div>
</div>
<div class="page-number"></div>
@endsection
