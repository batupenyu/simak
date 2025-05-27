
@extends('layout.sidebar')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">


<div class=" container container-fluid mt-4">
<a href="/tabelpdf/"style="text-decoration: none" class="float-end"><i class="fa fa-regular fa-download"></i></a>
    <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print tampil"></i></button>
        @include('pegawai.link')
        <p class="mt-3 text-center">
            <strong>
                DATA NAMA GURU DAN TENAGA KEPENDIDIKAN <br>
                SMK NEGERI 1 KOBA
            </strong>
        </p>
        <table class="table table-sm table-striped table-bordered border-primary  mt-4 topics" style="font-size: 10pt">
            <tr class="align-middle text-center thead-light">
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NIP</th>
                <th>Pangkat/Gol</th>
                <th>Jenis Kelamin</th>
                <th>Pendidikan</th>
                <th>Jabatan</th>
                {{-- <th>TMT</th> --}}
                <th>Ket</th>
            </tr>
            @foreach ($pns as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->name}}
                    <a href="/project.edit_user/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-edit"></i></a> 
                </td>
                <td class="text-center">
                    @php
                    $title = $item->nip;
                    $mytitle = trim($title)
                    @endphp
                    {{ $mytitle }}
                </td>
                <td class="text-center">{{ $item->pangkat_gol}}</td>
                <td class="text-center">{{ $item->jk}}</td>
                <td class="text-center">{{ $item->pendidikan}}</td>
                <td class="text-center">{{ $item->jabatan}}</td>
                {{-- <td class="text-center">{{ Carbon\Carbon::Parse($item->tmt_pangkat)->translatedFormat('d/m/Y') }}</td> --}}
                <td>-</td>
            </tr>
            @endforeach
        </table>
        <p class="mt-3 text-center">
            <strong>
                DATA NAMA GURU DAN TENAGA KEPENDIDIKAN PPPK<br>
                SMK NEGERI 1 KOBA
            </strong>
        </p>

        <table class="table table-sm table-striped table-bordered border-primary  mt-4 topics" style="font-size: 10pt">
            <tr class="align-middle text-center thead-light">
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NIP</th>
                <th>Pangkat/Gol</th>
                <th>Jenis Kelamin</th>
                <th>Pendidikan</th>
                <th>Jabatan</th>
                {{-- <th>TMT</th> --}}
                <th>Ket</th>
            </tr>
            @foreach ($p3k as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->name}}
                    <a href="/project.edit_user/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-edit"></i></a> 
                </td>
                <td class="text-center">{{ $item->nip}}</td>
                <td class="text-center">{{ $item->pangkat_gol}}</td>
                <td class="text-center">{{ $item->jk}}</td>
                <td class="text-center">{{ $item->pendidikan}}</td>
                <td class="text-center">{{ $item->jabatan}}</td>
                {{-- <td class="text-center">{{ Carbon\Carbon::Parse($item->tmt_pangkat)->translatedFormat('d/m/Y') }}</td> --}}
                <td>-</td>
            </tr>
            @endforeach
        </table>
        <p class="mt-3 text-center">
            <strong>
                DATA NAMA GURU DAN TENAGA KEPENDIDIKAN NON ASN<br>
                SMK NEGERI 1 KOBA
            </strong>
        </p>
        <table class="table table-sm table-striped table-bordered border-primary  mt-4 topics" style="font-size: 10pt">
            <tr class="align-middle text-center thead-light">
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Pendidikan</th>
                <th>Jabatan</th>
                <th>TMT</th>
                <th>Status Pembiayaan Non PNS <br>
                APBD/APBN/IPP</th>
            </tr>
            @foreach ($honor as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->name}}
                    <a href="/project.edit_user/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-edit"></i></a> 
                </td>
                <td class="text-center">{{ $item->jk}}</td>
                <td class="text-center">{{ $item->pendidikan}}</td>
                <td class="text-center">{{ $item->jabatan}}</td>
                <td class="text-center">{{ Carbon\Carbon::Parse($item->tmt_pangkat)->translatedFormat('d/m/Y') }}</td>
                <td class="text-center">{{ $item->sumber_gaji}}</td>
            </tr>
            @endforeach
        </table>

</div>
@endsection