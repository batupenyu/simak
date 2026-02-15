@extends('layout.master')

@section('content')

{{-- <script src="js/paged.polyfill.js"></script> --}}
{{-- <script defer src="https://unpkg.com/pagedjs/dist/paged.polyfill.js"></script> --}}

{{-- <style>
    @page {
        @bottom-left {
            content: 'Hal.' counter(page) 'of' counter(pages);
        }
    }
</style> --}}

{{-- <style>
    .avoidBreak { 
    border: 2px solid;
    page-break-inside:avoid;
}
</style> --}}

{{-- <style type="text/css">
    table { page-break-inside:auto }
    div   { page-break-inside:avoid; } /* This is the key */
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style> --}}

<style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
    .page-number:before {
    content: "Page: " counter(page);}
</style>

<ul class="nav nav-tabs mb-3" id="skpTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link" href="{{ url('project.main/'.$user->id) }}">Rencana SKP</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link active" href="{{ url('project.evaluasi/'.$user->id) }}">Evaluasi</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" href="{{ url('project.report/'.$user->id) }}">Laporan</a>
    </li>
</ul>

<div class="container-xxl">

    <link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
    <div class="container-fluid mt-3">
        <button onclick="window.print();" class="btn btn-success tampil btn-flat mb-3 float-end" media="print">Cetak</button>
        {{-- <a href="/user.main/{user_id}/cetak" class="btn btn-primary mb-3" target="_blank">CETAK</a> --}}
        @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
            <h4 style="text-align:center">SASARAN KINERJA PEGAWAI PEJABAT FUNGSIONAL <br>
                {{ $user->jabatan }} <br>
                PENDEKATAN HASIL KERJA KUANTITATIF
            </h4> <br><br><br>
            <div class="row align-items-start fw-bold upper">
                <div class="col-5 text-start">
                Nama Instansi : <br> {{ $user->unit_kerja }}
            </div>
            <div class="col-4 text-end">
                Periode Penilaian : <br>
                {{ Carbon\Carbon::parse($user->tgl_awal)->translatedFormat('d F Y ') }}
                s.d
                {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }}
            </div>
        @else
            <h4 style="text-align:center">SASARAN KINERJA PEGAWAI</h4><br>
            <div class="row align-items-start fw-bold upper">
                <div class="col-5 text-start">
            Nama Instansi : <br> Dinas Pendidikan Pro. Kep. Bangka Belitung
            </div>
            <div class="col-4 text-end">
                Periode Penilaian : <br>
                {{ Carbon\Carbon::parse($user->tgl_awal)->translatedFormat('d F Y ') }}
                s.d
                {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }}
            </div>
        @endif
    </div>
        <table class="table table-sm table-bordered border-primary" style="background-color: beige">
            <tbody>
                <tr>
                    <th style="text-align: center;">NO</th>
                    <th style="text-align: center;" colspan="2">PEGAWAI YANG DINILAI </th>
                    <th style="text-align: center;">NO</th>
                    <th style="text-align: center;" colspan="2">PEJABAT PENILAI KINERJA</th>
                </tr>
                <tr>
                    <td style="text-align: center; width: 3%">1</td>
                    <td style="width: 200px">NAMA</td>
                    @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
                        <td style="width: 380px; text-transform:uppercase ; padding-left:30px">
                            {{ $user->name }}
                        </td>
                    @else
                        <td style="width: 380px;padding-left:30px"">
                            {{ $user->name }}
                        </td>
                    @endif
                    <td style="text-align: center; width: 3%">1</td>
                    <td style="width: 200px">NAMA</td>
                    <td style="width: 380px; padding-left:30px">
                        {{ $user->penilai ->nama }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">2</td>
                    <td>NIP</td>
                    <td style="padding-left: 30px">
                        {{ $user ->nip }}
                    </td>
                    <td style="text-align: center;">2</td>
                    <td>NIP</td>
                    <td style="padding-left: 30px">
                        {{ $user->penilai ->nip }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">3</td>
                    <td>PANGKAT/GOL RUANG</td>
                    <td style="padding-left: 30px">
                        {{ $user ->pangkat_gol }}
                    </td>
                    <td style="text-align: center;">3</td>
                    <td>PANGKAT/GOL RUANG</td>
                    <td style="padding-left: 30px">
                        {{ optional($user->penilai)->pangkat_gol ?? '' }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">4</td>
                    <td>JABATAN</td>
                    <td style="padding-left: 30px">
                        {{ $user ->jabatan }}
                    </td>
                    <td style="text-align: center;">4</td>
                    <td>JABATAN</td>
                    <td style="padding-left: 30px">
                        {{ $user->penilai ->jabatan }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">5</td>
                    <td>UNIT KERJA</td>
                    <td style="padding-left: 30px">
                        {{ $user ->unit_kerja }}
                    </td>
                    <td style="text-align: center;">5</td>
                    <td>UNIT KERJA</td>
                    <td style="padding-left: 30px">
                        {{ $user->penilai ->unit_kerja }}
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        POLA DISTRIBUSI: KURVA DISTRIBUSI PREDIKAT KINERJA PEGAWAI DENGAN CAPAIAN KINERJA ORGANISASI BAIK <br><br>
                        <img src="{{ asset('image/pola_1.jpg') }}" style="display:block; margin:auto" class="d-block w-50" alt=""><br>
                    </td>
                </tr>
            </tbody>
        </table>


        <div style="overflow-x: auto">
            <table class="table table-sm table-bordered border-dark"  >
                <tbody>
                    <tr>
                        <th style="text-align: center; width: 50px;">No</th>
                        <th style="text-align: center; width: 250px;">Rencana Hasil Kerja Atasan Yang Diintervensi</th>
                        <th style="text-align: center; width: 300px;">Rencana Hasil Kerja</th>
                        <th colspan="3">
                            <div class="hstack gap-3">
                            <div class="container">
                            <div class="row">
                                <div class="col-3 border-end">Aspek</div>
                                <div class="col-7 border-end"><small></small>Indikator Kinerja Individu</div>
                                <div class="col-2" style="align-content: center">Target</div>
                            </div>
                            </div>
                            </div>
                        </th>
                        {{-- <th style="text-align: center; width: 80px;">Aspek</th>
                        <th style="text-align: center;">Indikator Kinerja Individu</th>
                        <th style="text-align: center; width: 150px;">Target</th> --}}
                        <th style="text-align: center; width: 150px;">Realisasi berdasar bukti dukung</th>
                        <th style="text-align: center; width: 150px;">Umpan Balik</th>
                    </tr>
                    <tr>
                        <th colspan="8">Utama </th>
                    </tr>
                    
                            @php
                            //  First Store data in $arr
                            $arr = array();
                            foreach ($user->tugas as $address) {
                                $arr[] = $address->rk->name;
                            }
                            $unique_data = array_unique($arr);
                            // now use foreach loop on unique data
                            foreach($unique_data as $val) {
                                // echo $val;;
                            }
                            @endphp



                    @foreach ($user->tugas as $data)
                        <tr>
                            <td style="text-align: center;" >
                                {{ $loop->iteration }} 
                            </td>
                            <td style="text-align: justify">
                                @if ($loop->first)
                                        {{ $val }}
                                @endif
                            
                                {{-- <button class="btn btn-sm btn-warning tampil">
                                    <a href="/tugas.edit_tugas/{{ $data->id }}" style="text-decoration: none" > <i class="fa fa-edit"></i></a> 
                                </button>
                                <form class="d-inline" onsubmit="return confirm('yakin hapus data?!!..')" action="/tugas.delete/{{ $data->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger tampil " type="submit"><i class="fa fa-trash "></i></button>
                                </form> --}}
                            </td>
                            <td style="text-align: justify">{{ $data->name }} <br>
                                {{-- <button class="btn btn-sm btn-warning tampil ">
                                    <a href=" {{ url('/tupoksi.tambah') }}" style="text-decoration: none" ><i class="fa fa-plus "><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Indikator</b></i></a>
                                </button>
                                @foreach ($data->tupoksi as $item)
                                <form class="d-inline" onsubmit="return confirm('yakin hapus data?!!..')" action="/tupoksi.destroy/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-success tampil"  type="submit"><i  ><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Hapus</b></i></button>
                                </form>
                                <button class="btn btn-sm btn-warning tampil">
                                    <a href=" {{ url('tupoksi.edit_tupoksi/'.$item->id) }}" style="text-decoration: none"><i  ><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Edit</b></i></a>
                                </button>
                                @endforeach --}}
                            </td>
                            {{-- <td>
                                @if(count($data->tupoksi) < 1)
                                <a href="/tupoksi.tambah" class="btn btn-sm btn-success btn-flat tampil" ><i class="fa fa-plus"></i> </a>
                                @else
                                    @foreach ($data->tupoksi as $item)
                                        {{ $item->name }} &nbsp;
                                        <a href="/tupoksi.edit_tupoksi/{{ $item->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a> 
                                        <form onsubmit="return confirm('yakin hapus data?!!..')" action="/tupoksi.destroy/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger tampil" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                        @endforeach
                                @endif
                            </td> --}}
                            
                            {{-- <td colspan="3">
                                @foreach ($data->tupoksi as $item)
                                    <div class="row g-0">
                                        <div class="col-md-2">
                                            {{ $item->aspek }}
                                        </div>
                                            <div class="col-md-10">
                                                <table class="table table-sm table-borderless">
                                                    <tr>
                                                        <td style="width: 75%" class="card-text">{{ $item->indikator }}</td>
                                                        <td style="vertical-align: top" class="card-text; float-end">{{ $item->target }}</td>
                                                    </tr>
                                                </table>
                                                
                                            </div>
                                    </div>
                                @endforeach
                            </td> --}}
                            
                            {{-- <td colspan="3">
                                @foreach ($data->tupoksi as $item)
                                <div class="row g-0 position-relative">
                                    <div class="col-md-3 mb-md-0 p-md-0">
                                        {{ $item->aspek }}
                                    </div>
                                    <div class="col-md-8 p-0 ps-md-0">
                                        <table class="table table-sm table-borderless">
                                            <tr>
                                                <td style="width: 75%" class="card-text">{{ $item->indikator }}</td>
                                                <td style="vertical-align: top" class="card-text; float-end">{{ $item->target }} <br>
                                                        <a href=" {{ url('tupoksi.edit_tupoksi/'.$item->id) }}" class="float-end tampil" style="text-decoration: none"><i class="fa fa-edit"><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"></b></i></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    </div>
                                    @endforeach
                            </td> --}}
                            
                            <td colspan="3">
                                @foreach ($data->tupoksi as $item)
                                <div class="container ">
                                <div class="row">
                                    <div class="col-6 col-sm-3 ">{{ $item->aspek }}</div>
                                    <div class="col-6 col-sm-1 "><strong style="padding-left: 17px">:</strong></div>
                                    <div class="col-6 col-sm-6" style="text-align: justify">{{ $item->indikator }}</div>
                                    <div class="col-6 col-sm-1">{{ $item->target }}</div>
                                
                                    <!-- Force next columns to break to new line -->
                                    <div class="w-100">
                                    </div>
                                
                                </div>
                                </div>
                                @endforeach
                                {{-- @foreach ($data->tupoksi as $item)
                                <div class="hstack gap-3">
                                <div class="container">
                                <div class="row">
                                    <div class="col-3 border-end ">{{ $item->aspek }}</div>
                                    <div class="col-6 border-end ">
                                        <ul>
                                            <li>
                                                {{ $item->indikator }} 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-2 " style="align-content: center">{{ $item->target }}</div>
                                </div>
                                </div>
                                </div>
                                @endforeach --}}
                            </td>
                        
                            {{-- <td style="vertical-align:text-top; font-size:75%" colspan="3"> 
                                @foreach ($data->tupoksi as $item)
                                <table class="table mb-0 table-sm table-borderless">
                                    <tr>
                                        <td style="width: 80px">
                                            {{ $item->aspek }} 
                                            
                                        </td>
                                        <td style="width: 300px;text-align:justify">
                                            {{ $item->indikator }} 
                                        </td>
                                        <td style="text-align: center">
                                            {{ $item->target }} 
                                        </td>
                                    </tr>
                                    @endforeach
    
                                </table>
                            </td> --}}
                            
                            {{-- <td style="vertical-align:text-top"> 
                                @foreach ($data->tupoksi as $item)
                                            {{ $item->aspek }} 
                                            <a href="/edit_aspek/{{ $item->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a> 
                                            <br>
                                            @endforeach
                            </td>
                            <td >
                                @foreach ($data->tupoksi as $item)
                                            {{ $item->indikator }} 
                                            <a href="/edit_indikator/{{ $item->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a> 
                                            <br>
                                            @endforeach
                            </td>
                            <td style="text-align: center;">
                                @foreach ($data->tupoksi as $item)
                                {{ $item->target }} 
                                {{ $item->satuan }} 
                                <a href="/edit_target/{{ $item->id }}" style="text-decoration: none" class="tampil"> <i class="fa fa-edit"></i></a> 
                                <br>
                                @endforeach
                            </td> --}}

                            <td style="text-align: center">
                                @foreach ($data->tupoksi as $item)
                                {{ $item->realisasi }} 
                                @if ($item->aspek == 'Kuantitas')
                                    <a href=" {{ url('tupoksi.edit_tupoksi/'.$item->id) }}" class="float-end tampil" style="text-decoration: none"><i class="fa fa-edit"><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"></b></i></a>
                                @else
                                    
                                @endif
                                @endforeach
                            </td>

                            {{-- <td>
                                @foreach ($data->tupoksi as $item)
                                @if (($item->aspek == 'Kuantitas') && ($item->realisasi >= $item->target))
                                    Diatas ekspektasi
                                @elseif ($item->aspek == 'Waktu')
                                    
                                @else
                                    Sesuai ekspektasi
                                @endif
                                @endforeach
                            
                            </td> --}}

                            <td>
                                @foreach ($data->tupoksi as $item)
                                    @switch($item)
                                    @case(($item->aspek == 'Kuantitas')&&($item->realisasi > $item->target))
                                    Diatas ekspektasi
                                        @break
                                
                                    @case(($item->aspek == 'Kuantitas')&&($item->realisasi == $item->target))
                                    Sesuai ekspektasi
                                        @break

                                    @case(($item->aspek == 'Kuantitas')&&($item->realisasi < $item->target))
                                    Dibawah ekspektasi
                                        @break
                                
                                    @default
                                        
                                    @endswitch
                                @endforeach
                            </td>

                            {{-- <td>
                                @foreach ($data->tupoksi as $item)
                                {{ $item->umpanbalik }}
                                @if (($item->aspek == 'Kuantitas')&&($item->realisasi >= $item->target))
                                    ok
                                @endif
                                @endforeach
                            </td> --}}
                        </tr>
                    @endforeach

                    <tr>
                        <th colspan="8">Tambahan</th>
                    </tr>

                    @foreach ($user->tutam as $data)
                        <tr>
                            <td style="text-align: center;" >{{ $loop->iteration }} </td>
                            <td >{{ $data->rk->name }}
                                {{-- <button class="btn btn-sm btn-warning tampil">
                                    <a href="{{ url('tutam.edit/'.$data->id) }}" class="tampil"><i class="fa fa-edit"></i></a>
                                </button>
                                <form class="d-inline" onsubmit="return confirm('yakin hapus data?!!..')" action="/tutam.destroy/{{ $data->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger tampil" type="submit"><i class="fa fa-trash"></i></button>
                                </form> --}}
                            </td>
                                
                            <td>{{ $data->name }} <br>

                                {{-- <button class="btn btn-sm btn-warning tampil ">
                                    <a href=" {{ url('/tuti.tambah') }}" style="text-decoration: none" ><i class="fa fa-plus "><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Indikator</b></i></a>
                                </button>

                                @foreach ($data->tuti as $item)
                                    <form class="d-inline" onsubmit="return confirm('yakin hapus data?!!..')" action="/tuti.destroy/{{ $item->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-success tampil"  type="submit"><i  ><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Hapus</b></i></button>
                                    </form>
                                    <button class="btn btn-sm btn-warning tampil">
                                        <a href=" {{ url('tuti.edit/'.$item->id) }}" style="text-decoration: none"><i  ><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Edit</b></i></a>
                                    </button>
                                @endforeach --}}

                            </td>

                            <td colspan="3">
                                @foreach ($data->tuti as $item)
                                <div class="container ">
                                <div class="row">
                                    <div class="col-6 col-sm-2 ">{{ $item->aspek }}</div>
                                    <div class="col-6 col-sm-1 "><strong style="padding-left: 15px">:</strong></div>
                                    <div class="col-6 col-sm-7 " style="text-align: justify">{{ $item->indikator }}</div>
                                    <div class="col-6 col-sm-1">{{ $item->target }}</div>
                                
                                    <!-- Force next columns to break to new line -->
                                    <div class="w-100">
                                    </div>
                                
                                </div>
                                </div>
                                @endforeach
                            </td>
                            <td style="text-align: center">
                                @foreach ($data->tuti as $item)
                                {{ $item->realisasi }} 
                                @if ($item->aspek == 'Kuantitas')
                                    <a href=" {{ url('tuti.edit/'.$item->id) }}" class="float-end tampil" style="text-decoration: none"><i class="fa fa-edit"><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"></b></i></a>
                                @else
                                    
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($data->tuti as $item)
                                    @switch($item)
                                    @case(($item->aspek == 'Kuantitas')&&($item->realisasi > $item->target))
                                    Diatas ekspektasi
                                        @break
                                
                                    @case(($item->aspek == 'Kuantitas')&&($item->realisasi == $item->target))
                                    Sesuai ekspektasi
                                        @break

                                    @case(($item->aspek == 'Kuantitas')&&($item->realisasi < $item->target))
                                    Dibawah ekspektasi
                                        @break
                                
                                    @default
                                        
                                    @endswitch
                                @endforeach
                            </td>
                        </tr>
                        
                        @endforeach

                </tbody>
            </table>
        </div>
                        
        
        @include('lampiran.evaluasi')
        @include('lampiran.lampiran') <br>

        <div class="row justify-content-around text-center fw-bold ">
            @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
            <div class="col-4" style="text-transform: uppercase">
                <br><br>
                PEGAWAI YANG DINILAI <br><br><br>
                {{ $user ->name }} <br>
                NIP.{{ $user ->nip }}
            </div>
            @else
            <div class="col-4">
                <br><br>
                PEGAWAI YANG DINILAI <br><br><br>
                {{ $user ->name }} <br>
                NIP.{{ $user ->nip }}
            </div>
            @endif

            <div class="col-4">
                @if ($user->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
                    Pangkalpinang, {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }} 
                    <br><br>
                    PEJABAT PENILAI KINERJA <br><br><br>
                    {{ $user->penilai ->nama }} <br>
                    NIP.{{ $user->penilai ->nip }}
                    @else
                    Simpang Rimba, {{ Carbon\Carbon::parse($user->tgl_akhir)->translatedFormat('d F Y ') }} 
                    <br><br>
                    PEJABAT PENILAI KINERJA <br><br><br>
                    {{ $user->penilai ->nama }} <br>
                    NIP.{{ $user->penilai ->nip }}
                @endif
                <br><br>
            </div>
        </div>
    </div>
</div>
<div class="page-number"></div>

@endsection

{{-- <script>
    function Print(){
    $(".tableToPrint td, .tableToPrint th").each(function(){ $(this).css("width",  $(this).width() + "px")  });
    $(".tableToPrint tr").wrap("<div class='avoidBreak'></div>");
    window.print();
}
</script> --}}

