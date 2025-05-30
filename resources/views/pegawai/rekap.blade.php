@extends('layout.sidebar')
@section('content')
{{-- @include('layout.kop2') --}}
<style type="text/css">
    table {
        page-break-inside: auto
    }

    tr {
        page-break-inside: avoid;
        page-break-after: auto
    }

    thead {
        display: table-header-group
    }

    tfoot {
        display: table-footer-group
    }

    .page-number:before {
        content: "Page: " counter(page);
    }
</style>

<div class="container-fluid">
    {{-- <button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print tampil"></i></button> --}}
    <link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
    <p class="float-end"><a href="{{ url('rekap_kp4_pdf/')}}"> <i class="fa fa-print tampil"></i></a></p>
    <h5 style="text-align: center" class="mb-2 mt-3">REKAPITULASI KP4 <br>
        {{ $unitKerja->name ?? 'SMK NEGERI 1 SIMPANG RIMBA' }}
    </h5> <br>
    {{-- <table class="table table-sm table-bordered border-primary tinggi ">
    <tr style=" text-align:center" class="align-middle">
        <th>No.</th>
        <th>Nama Pegawai</th>
        <th>Nama Pasangan <br>
            Suami/Istri</th>
        <th>Daftar Anak</th>
        <th>Umur Anak (tahun)</th>
        <th>Ditanggung/ <br>
        Tidak di tanggung</th>
        <th>Keterangan</th>
    </tr>
        @foreach ($data as $item)
        @if ($item->nip != '' && $item->unit_kerja =="SMKN 1 Simpang Rimba")
    <tr>
        <td style="text-align: center">
            @if ($item->nip != '' && $item->unit_kerja =="SMKN 1 Simpang Rimba")
            {{ $loop->iteration }}.
    @else
    @endif
    </td>
    <td style="padding-left: 20px; width:300px">
        @if ($item->nip != '' && $item->unit_kerja =="SMKN 1 Simpang Rimba")
        {{ $item->name }} <br>
        NIP. {{ $item->nip }}
        @else
        @endif
    </td>
    <td style="padding-left: 20px; width:200px">
        @if ($item->nip != '' && $item->unit_kerja =="SMKN 1 Simpang Rimba")
        {{ $item->pasangan->name }} <br>
        @else
        @endif
    </td>
    <td style="padding-left: 50px; width:300px">
        @if ($item->nip != '' && $item->unit_kerja =="SMKN 1 Simpang Rimba")
        @foreach ($item->anak as $dat)
        {{ $loop->iteration }}. {{ $dat->name}}
        <br>
        @endforeach
        @else
        @endif
    </td>
    <td style="padding-right: 30px; text-align:right; width:100px">
        @if ($item->nip != '' && $item->unit_kerja =="SMKN 1 Simpang Rimba")
        @foreach ($item->anak as $dat)
        {{ \Carbon\Carbon::parse($dat->tgl_lahir)->diff(\Carbon\Carbon::now())->format('%y th') }}
        <br>
        @endforeach
        @else
        @endif
    </td>
    <td style="text-align: center">
        @if ($item->nip != '' && $item->unit_kerja =="SMKN 1 Simpang Rimba")
        @foreach ($item->anak as $dat)
        @if ($dat->kat == '1')
        <i class="fa fa-check"></i> <br>
        @else
        <strong>-</strong><br>
        @endif
        @endforeach
        @else
        @endif
    </td>
    <td>
        @if ($item->pasangan->status =="menanggung" )
        Ditanggung pasangan
        @else
        @endif
    </td>
    </tr>
    @else
    @endif
    @endforeach
    </table> --}}

    <table class="table table-sm table-bordered table-striped border-info mt-3" style="font-size: 12px">
        <tr class="align-middle text-center">
            <th rowspan="2">No.</th>
            <th rowspan="2">NIP</th>
            <th rowspan="2">NAMA</th>
            <th rowspan="2">(KAWIN/BELUM KAWIN <br> JANDA/DUDA)</th>
            <th colspan="4">DATA SUAMI/ISTRI TANGGUNGAN</th>
            <th colspan="3">DATA ANAK TANGGUNGAN</th>
            <th rowspan="2">KET</th>
        </tr>
        <tr class="align-middle text-center">
            <th>NAMA</th>
            <th>TGL.LAHIR</th>
            <th>UMUR</th>
            <th>PEKERJAAN</th>
            <th>NAMA</th>
            <th>TGL.LAHIR</th>
            <th>BERSEKOLAH/ <br> KULIAH PADA</th>
        </tr>
        @foreach ($hasil as $item)
        <tr>
            <td class="text-center">{{ $loop->iteration }}.</td>
            <td>{{ $item->nip }}</td>
            <td style="padding-left: 30px">{{ $item->name }}
                <a href="/project.edit_user/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-edit"></i></a>
            </td>
            <td class="text-center">{{ $item->pasangan->name != ''?'Kawin':'Belum Kawain' }}</td>
            <td>
                @if ($item->pasangan->status == 'ditanggung' && $item->pasangan->name !='')
                {{ $item->pasangan->name }}
                <a href="{{ url('pasangan.edit/'.$item->pasangan->id) }}"><i class="fa fa-edit"></i></a></strong>
                @else
                @endif
            </td>
            <td>
                @if ($item->pasangan->status == 'ditanggung' && $item->pasangan->name !='')
                {{ Carbon\Carbon::Parse($item->pasangan->tgl_lahir)->translatedFormat(' d/m/Y') }} <br>
                @else
                @endif

            </td>
            <td class="text-center">
                @if ($item->pasangan->status == 'ditanggung' && $item->pasangan->name !='')
                {{ \Carbon\Carbon::parse($item->pasangan->tgl_lahir)->diff(\Carbon\Carbon::now())->format('%y th') }}
                @else
                @endif
            </td>
            <td class="text-center">
                @if ($item->pasangan->status == 'ditanggung' && $item->pasangan->tgl_kawin !="0000-00-00" )
                {{ $item->pasangan->job }}
                @else
                @endif
            </td>
            <td>
                @foreach ($item->anak as $dat)
                @if ($dat->kat == '1')
                - {{ $dat->name}}
                <a href={{ url('project.edit_anak/'.$dat->id) }}> <i class="fa fa-edit"></i></button></a><br>
                @else
                @endif
                @endforeach
            </td>
            <td>
                @foreach ($item->anak as $dat)
                @if ($dat->kat == '1')
                {{ Carbon\Carbon::Parse($dat->tgl_lahir)->translatedFormat(' d/m/Y') }} <br>
                @else
                @endif

                @endforeach
            </td>
            <td style="padding-left: 30px">
                @foreach ($item->anak as $dat)
                @if ($dat->kat == '1')
                {{ $dat->status_sekolah }} <br>
                @else
                @endif
                @endforeach
            </td>
            <td></td>
        </tr>
        @endforeach
    </table>
    <br>
    <div class="col-5 float-end">
        <div class="float-start" style="text-align: center">
            {{$unitKerja->description}},
            {{ (\Carbon\Carbon::now())->translatedFormat(' d F Y') }} <br>
            Kepala Sekolah
            <br><br><br>
            {{$penilai->nama ?? 'Nama Kepala Sekolah'}} <br>
            NIP. {{$penilai->nip ?? '-'}}
        </div>
    </div>
</div>

@endsection