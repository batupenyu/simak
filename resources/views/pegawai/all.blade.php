
@extends('layout.sidebar')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">

<div class="  container-fluid mt-4">
<a href="/allpdf/"style="text-decoration: none" class="float-end"><i class="fa fa-regular fa-download"></i></a>
<button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print tampil"></i></button>
        @include('pegawai.link')
        <p class="mt-3 text-center">
            <strong>
                DATA NAMA GURU DAN TENAGA KEPENDIDIKAN <br>
                SMK NEGERI 1 SIMPANG RIMBA
            </strong>
        </p>

        <table class="table table-sm table-striped table-bordered  border-primary mt-4 " style="font-size: 12px">
            <tr class="align-middle text-center topics">
                <td>No</td>
                <td>Nama</td>
                <td>Tempat Lahir</td>
                <td>Tgl.lahir</td>
                <td>Status tugas <br> (induk/noninduk)</td>
                <td>Status Kepegawaian <br> (PNS/PPPK/HONORER)</td>
                <td>Sumber Gaji <br> (APBN/APBD/IPP)</td>
                <td>Mapel <br> diajarkan</td>
                <td>Jumlah <br>Jam</td>
                <td>Tugas <br>Tambahan</td>
                <td>Total beban <br>Tugas</td>
            </tr>
            @foreach ($all as $item)
                <tr>
                    <td style="text-align:center">{{ ($all ->currentpage()-1) * $all ->perpage() + $loop->index + 1 }}.</td>
                    <td>
                        <a href="/project.edit_user/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-edit"></i></a> 
                        {{ $item->name }}
                    </td> 
                    <td>{{ $item->tempat_lahir }}</td>
                    <td class="text-center">
                        {{ (Carbon\Carbon::Parse($item->tgl_lahir)->translatedFormat('d/m/Y')) }}
                    </td>
                    <td class="text-center">Induk</td>
                    <td class="text-center">{{ $item->status }}</td>
                    <td class="text-center">{{ $item->sumber_gaji }}</td>
                    <td style="padding-left: 20px">
                        @foreach ($item->mapel as $x)
                            {{ $x }}
                        @endforeach
                    </td>
                    <td class="text-center">{{ $item->jlh_jam }}</td>
                    <td style="padding-left: 20px">{{ $item->tugas_tambahan }}</td>
                    <td></td>
                </tr>
                @endforeach
        </table>

        {{ $all->links() }}


</div>
@endsection