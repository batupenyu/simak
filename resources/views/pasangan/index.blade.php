@extends('layout.sidebar')
@section('content')

<div class="container-sm mt-5">
    <div class="card">
        <div class="card-body">
            <div class="container-fluid mt-5">
                <div class="card-header">
                    <div class="card-title">
                <button class="btn btn-sm btn-warning float-end mb-3">
                    <a style="text-decoration: none" class="float-end" href="{{ url('pasangan.add/') }}">
                        <i class="fa fa-plus-circle"></i></a>
                </button>

                        <h4 style="text-align: center">DAFTAR PASANGAN-PEGAWAI</h4>
                    </div>
                </div>
            <br>
            {{-- @foreach ($data as $item) --}}
            {{-- @endforeach --}}
            {{-- <table class="table table-sm table-bordered table-striped">
                @foreach ($data as $item)
                <tr>
                    <td>
                        {{ $loop->iteration }}. 
                        {{ $item->name }} <br>
                        <a href="/pasangan.kp4/{{ $item->id }}"  class=" btn btn-sm btn-success btn-flat"> KP.4 <i class="fa fa-eye">
                            <strong>
                                @if ($item->status =='ditanggung')
                                <?= '-> Menanggung' ?>
                                @else
                                <?= ' -> Ditanggung' ?>
                                @endif
                            </strong>
                        </i></a>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td >Nama</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td>
                                    <strong>
                                        {{  $item->pasangan->name }} 
                                    </strong>
                                    <a href="{{ url('pasangan.edit/'.$item->id) }}"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Tgl. Lahir</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td style="width: 250px">
                                    {{ Carbon\Carbon::parse($item->pasangan->tgl_lahir)->translatedFormat('d - m - Y ') }} 
                                </td>
                                <td>Pekerjaan</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td>
                                    {{ $item->job }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tgl. Nikah</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td>
                                    {{ Carbon\Carbon::parse($item->pasangan->tgl_kawin)->translatedFormat('d - m - Y ') }} 
                                </td>
                                <td>Penghasilan</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td>
                                    {{number_format($item->net,2)}}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                @endforeach
            </table> --}}
                <table class="table table-sm table-striped">
                    <tr>
                        <th>Nama</th>
                        <th>Tgl. Lahir</th>
                        <th>Tgl. Menikah</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($data as $item)
                    <tr>
                        <td>
                            {{ $loop->iteration }}. {{ $item->name }} 
                        </td>
                        <td>
                            {{ Carbon\Carbon::parse($item->tgl_lahir)->translatedFormat('d - m - Y ') }}
                        </td>
                        <td>
                            {{ Carbon\Carbon::parse($item->tgl_kawin)->translatedFormat('d - m - Y ') }}
                        </td>
                        <td>
                            <a href="{{ url('pasangan.edit/'.$item->id) }}"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


@endsection