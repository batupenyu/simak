
@extends('layout.sidebar')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">

<div class=" container container-fluid mt-4">
<a href="/rekappdf/"style="text-decoration: none" class="float-end"><i class="fa fa-regular fa-download"></i></a>
<button onclick="window.print();" class="btn btn-sm btn-outline tampil float-end"><i class="fa fa-print tampil"></i></button>
    @include('pegawai.link')
    <p class="mt-3 text-center">
        <strong>
            REKAP PEGAWAI <br>
            SMK NEGERI 1 SIMPANG RIMBA
        </strong>
    </p>

        <table class="table table-sm table-striped table-bordered border-primary  mt-4 topics" style="font-size: 10pt">
            <tr class="align-middle text-center thead-light">
                <th colspan="6">Rekap Berdasar Jenis Kelamin</th>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <th class="text-center">Tenaga Pendidik</th>
                <th class="text-center">Tenaga Kependidikan</th>
                <th class="text-center">PPPK</th>
                <th class="text-center">PHL</th>
                <th class="text-center">Jumlah</th>
            </tr>
            <tr>
                <td>Laki-Laki</td>
                <td class="text-center">
                    {{ $pnsgurulaki }}
                </td>
                <td class="text-center">
                    {{ $pnstulaki }}
                </td>
                <td class="text-center">
                    {{ $p3kgurulaki + $p3ktulaki }}
                </td>
                <td class="text-center">
                    {{ $honorgurulaki + $honortulaki  }}
                </td>
                <td class="text-center">
                    {{ $pnsgurulaki + $pnstulaki + $p3kgurulaki + $p3ktulaki + $honorgurulaki + $honortulaki  }}
                </td>
            </tr>
            <tr>
                <td>Perempuan</td>
                <td class="text-center">
                    {{ $pnsgurupr }}
                </td>
                <td class="text-center">
                    {{ $pnstupr}}
                </td>
                <td class="text-center">
                    {{ $p3kgurupr + $p3ktupr }}
                </td>
                <td class="text-center">
                    {{ $honorgurupr + $honortupr  }}
                </td>
                <td class="text-center">
                    {{ $pnsgurupr + $pnstupr + $p3kgurupr + $p3ktupr + $honorgurupr + $honortupr  }}
            </tr>
            <tr>
                <td>
                    <strong>Jumlah Total</strong>
                </td>
                <td class="text-center">
                    {{ $pnsgurulaki + $pnsgurupr }}
                </td>
                <td class="text-center">
                    {{ $pnstulaki + $pnstupr }}
                </td>
                <td class="text-center">
                    {{ $p3kgurulaki + $p3ktulaki + $p3kgurupr + $p3ktupr }}
                </td>
                <td class="text-center">
                    {{ $honorgurulaki + $honortulaki  + $honorgurupr + $honortupr  }}
                </td>
                <td class="text-center">
                    {{ $pnsgurulaki + $pnstulaki + $p3kgurulaki + $p3ktulaki + $honorgurulaki + $honortulaki  + $pnsgurupr + $pnstupr + $p3kgurupr + $p3ktupr + $honorgurupr + $honortupr  }}
                </td>
            </tr>
        </table>

        <table class="table table-sm table-striped table-bordered border-primary  mt-4 topics" style="font-size: 10pt">
            <tr class="align-middle text-center thead-light">
                <th colspan="6">Rekap Berdasar Kualifikasi Pendidikan</th>
            </tr>
            <tr>
                <th>Tingkat Pendidikan</th>
                <th class="text-center">Tenaga Pendidik</th>
                <th class="text-center">Tenaga Kependidikan</th>
                <th class="text-center">PPPK</th>
                <th class="text-center">PHL</th>
                <th class="text-center">Jumlah</th>
            </tr>
            <tr>
                <td>
                    D1
                </td>
                <td class="text-center">{{ $pnsgurud1 }}</td>
                <td class="text-center">{{ $pnstud1 }}</td>
                <td class="text-center">{{ $p3kd1 }}</td>
                <td class="text-center">{{ $honord1 }}</td>
                <td class="text-center">
                    {{ $pnstud1 + $pnsgurud1 + $p3kd1 + $honord1 }}
                </td>
            </tr>
            <tr>
                <td>
                    D2
                </td>
                <td class="text-center">{{ $pnsgurud2 }}</td>
                <td class="text-center">{{ $pnstud2 }}</td>
                <td class="text-center">{{ $p3kd2 }}</td>
                <td class="text-center">{{ $honord2 }}</td>
                <td class="text-center">
                    {{ $pnstud2 + $pnsgurud2 + $p3kd2 + $honord2 }}
                </td>
            </tr>
            <tr>
                <td>
                    D3
                </td>
                <td class="text-center">{{ $pnsgurud3 }}</td>
                <td class="text-center">{{ $pnstud3 }}</td>
                <td class="text-center">{{ $p3kd3 }}</td>
                <td class="text-center">{{ $honord3 }}</td>
                <td class="text-center">
                    {{ $pnstud3 + $pnsgurud3 + $p3kd3 + $honord3 }}
                </td>
            </tr>
            <tr>
                <td>
                    D4
                </td>
                <td class="text-center">{{ $pnsgurud4 }}</td>
                <td class="text-center">{{ $pnstud4 }}</td>
                <td class="text-center">{{ $p3kd4 }}</td>
                <td class="text-center">{{ $honord4 }}</td>
                <td class="text-center">
                    {{ $pnstud4 + $pnsgurud4 + $p3kd4 + $honord4 }}
                </td>
            </tr>
            <tr>
                <td>
                    S1
                </td>
                <td class="text-center">{{ $pnsgurus1 }}</td>
                <td class="text-center">{{ $pnstus1 }}</td>
                <td class="text-center">{{ $p3ks1 }}</td>
                <td class="text-center">{{ $honors1 }}</td>
                <td class="text-center">
                    {{ $pnstus1 + $pnsgurus1 + $p3ks1 + $honors1 }}
                </td>
            </tr>
            <tr>
                <td>
                    S2
                </td>
                <td class="text-center">{{ $pnsgurus2 }}</td>
                <td class="text-center">{{ $pnstus2 }}</td>
                <td class="text-center">{{ $p3ks2 }}</td>
                <td class="text-center">{{ $honors2 }}</td>
                <td class="text-center">
                    {{ $pnstus2 + $pnsgurus2 + $p3ks2 + $honors2 }}
                </td>
            </tr>
            <tr>
                <td>
                    S3
                </td>
                <td class="text-center">{{ $pnsgurus3 }}</td>
                <td class="text-center">{{ $pnstus3 }}</td>
                <td class="text-center">{{ $p3ks3 }}</td>
                <td class="text-center">{{ $honors3 }}</td>
                <td class="text-center">
                    {{ $pnstus3 + $pnsgurus3 + $p3ks3 + $honors3 }}
                </td>
            </tr>
            <tr>
                <td>
                    SLTA
                </td>
                <td class="text-center">{{ $pnsguruslta }}</td>
                <td class="text-center">{{ $pnstuslta }}</td>
                <td class="text-center">{{ $p3kslta }}</td>
                <td class="text-center">{{ $honorslta }}</td>
                <td class="text-center">
                    {{ $pnstuslta + $pnsguruslta + $p3kslta + $honorslta }}
                </td>
            </tr>
            <tr>
                <td>
                    SLTP
                </td>
                <td class="text-center">{{ $pnsgurusltp }}</td>
                <td class="text-center">{{ $pnstusltp }}</td>
                <td class="text-center">{{ $p3ksltp }}</td>
                <td class="text-center">{{ $honorsltp }}</td>
                <td class="text-center">
                    {{ $pnstusltp + $pnsgurusltp + $p3ksltp + $honorsltp }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Jumlah Total</strong>
                </td>
                <td class="text-center">{{ $pnsgurusltp + $pnsguruslta + $pnsgurus1 + $pnsgurus2 + $pnsgurus3 + $pnsgurud1 + $pnsgurud2 + $pnsgurud3 + $pnsgurud4}}</td>
                <td class="text-center">{{ $pnstusltp + $pnstuslta + $pnstus1 + $pnstus2 + $pnstus3 + $pnstud1 + $pnstud2 + $pnstud3 + $pnstud4}}</td>
                <td class="text-center">{{ $p3ksltp + $p3kslta + $p3ks1 + $p3ks2 + $p3ks3 + $p3kd1 + $p3kd2 + $p3kd3 + $p3kd4}}</td>
                <td class="text-center">{{ $honorsltp + $honorslta + $honors1 + $honors2 + $honors3 + $honord1 + $honord2 + $honord3 + $honord4}}</td>
                <td class="text-center">
                    {{ $pnsgurusltp + $pnsguruslta + $pnsgurus1 + $pnsgurus2 + $pnsgurus3 + $pnsgurud1 + $pnsgurud2 + $pnsgurud3 + $pnsgurud4 +
                    $pnstusltp + $pnstuslta + $pnstus1 + $pnstus2 + $pnstus3 + $pnstud1 + $pnstud2 + $pnstud3 + $pnstud4 +
                    $p3ksltp + $p3kslta + $p3ks1 + $p3ks2 + $p3ks3 + $p3kd1 + $p3kd2 + $p3kd3 + $p3kd4 +
                    $honorsltp + $honorslta + $honors1 + $honors2 + $honors3 + $honord1 + $honord2 + $honord3 + $honord4 
                    }}
                </td>
            </tr>
        </table>
        <table class="table table-sm table-striped table-bordered border-primary  mt-4 topics" style="font-size: 10pt">
            <tr>
                <td>
                    @include('pegawai.gurupns') <br>
                </td>
                <td>
                    @include('pegawai.tu') <br>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    @include('pegawai.gurup3k') 
                </td>
            </tr>
        </table>


 

</div>
@endsection