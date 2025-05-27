@extends('layout.sidebar')

@section('content')

    <p><a href="{{ url('pegawai.create') }}"><i class="fa fa-plus btn btn-sm btn-warning "  ><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Pegawai</b></i></a></p>
    
        @foreach ($pegawai as $item)
            <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-sm btn-outline-primary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a> 
        @endforeach

        {{-- <p class="d-inline-flex gap-0">
            <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-outline-primary" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
        </p>

        @if ($item->pangkat_gol == 'IX')
            
            <p class="d-inline-flex gap-0">
                <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-success tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
            
        @elseif ($item->nip =='')
            <p class="d-inline-flex gap-0">
                <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-outline-dark tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @elseif ($item->unit_kerja =='KEJAKSAAN TINGGI KEP. BANGKA BELITUNG')
            <p class="d-inline-flex gap-0">
                <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-secondary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @else
            
            <p class="d-inline-flex gap-0">
                <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-outline-primary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @endif --}}

    <hr>
    @foreach ($p3k as $item)
        <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-sm btn-outline-success tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
    @endforeach

    <hr>
    @foreach ($honor as $item)
        <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-sm btn-outline-dark tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
    @endforeach

    <p class="mt-3"><a  href="{{ url('/project.anak_tambah') }}" ><i class="fa fa-plus btn btn-sm btn-warning "  ><b style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Anak</b></i></a></p>


    {{-- @include('pegawai.link') --}}

    <table>
        <tr>
            <td style="vertical-align: text-top" >
                @foreach ($data as $item)
                    <ul>
                        <li><strong>{{ $item->name }}</strong>
                            <a href="/project.edit_user/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-edit"></i></a> 
                            <form onsubmit="return confirm('yakin hapus data?..')" class="d-inline" action="/pegawai.destroy/{{ $item->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn"><i class="fa fa-trash"></i></button>
                            </form>
                    </li>
                        <li>NIP. {{ $item->nip }}</li>
                        <li>Pangkat/Gol : {{ $item->pangkat_gol }}</li>
                        <li>Unit Kerja : {{ $item->unit_kerja }}</li>
                        <li>TMT Pangkat : {{ \Carbon\Carbon::parse( $item->tmt_pangkat)->translatedFormat('d - m - Y ') }}</li>
                        <li>TMT Jabatan : {{ \Carbon\Carbon::parse( $item->tmt_jabatan)->translatedFormat('d - m - Y ') }}</li>
                        <li>MK Seluruhnya : {{ \Carbon\Carbon::parse( $item->tmt_pangkat)->diff(\Carbon\Carbon::now())->format('%y tahun, %m bulan')}}</li>
                        <li>Jabatan : {{ $item->jabatan }}</li>
                        <li>
                            Mapel :
                            @foreach ($item->mapel as $x)
                                {{ $x }}
                            @endforeach
                        </li>
                    </ul>
                @endforeach
            </td>
            <td style="vertical-align: text-top; padding-left:50px" >
                <ul>
                    <li>
                        @if ($item->pasangan->name =='-')
                        {{-- @if (count(array($item->pasangan->name))==0) --}}
                            Belum ada Pasangan
                            <a href="/pasangan.kp4/{{ $item->id }}"style="text-decoration: none"> <i class="fa fa-hashtag tampil"></i></a>
                            <a href="/pasangan.kp3/{{ $item->id }}"style="text-decoration: none"> <i class="fa fa-hashtag tampil"></i></a>
                            <a href="/project.index_anak/{{ $item->id }}"style="text-decoration: none"> <i class="fa fa-users"></i></a>
                        @else
                        {{ $item->pasangan->name }} -
                        <a href="{{ url('pasangan.edit/'.$item->pasangan->id) }}" ><i class="fa fa-edit"></i></a></strong>
                        <a href="/pasangan.kp4/{{ $item->id }}"style="text-decoration: none"> <i class="fa fa-hashtag tampil"></i></a>
                        <a href="/pasangan.kp3/{{ $item->id }}"style="text-decoration: none"> <i class="fa fa-hashtag tampil"></i></a>
                        <a href="/project.index_anak/{{ $item->id }}"    style="text-decoration: none"> <i class="fa fa-users"></i></a>
                        @endif
                    </li>
                    @if ($item->pasangan->name =='-')
                    @else
                    <li>Tgl. Lahir : {{ Carbon\Carbon::parse($item->pasangan->tgl_lahir)->translatedFormat('d - m - Y ') }} </li>
                    <li>Tgl. Menikah : {{ Carbon\Carbon::parse($item->pasangan->tgl_kawin)->translatedFormat('d - m - Y ') }} </li>
                    <li>Pekerjaan : {{ $item->pasangan->job }}</li>
                    <li>Rp.{{number_format( $item->pasangan->net,2) }},-</li>
                    <li>Keterangan : <i>({{ $item->pasangan->status }}) </li>
                    @endif

                </ul>
            </td>
            <td style="vertical-align: text-top; padding-left:50px" >
                @if (count($anak->anak) ==0)
                {{-- <div class="badge bg-success text-wrap text-white" style="width: 12rem;">
                        Belum ada anak
                    </div> --}}
                    --- Belum ada anak ---
                @else
                    @foreach ($anak->anak as $item)
                        &nbsp; &nbsp;
                        {{ $loop->iteration}}. 
                        {{ $item->name }} - {{ \Carbon\Carbon::parse($item->tgl_lahir)->diff(\Carbon\Carbon::now())->format('%y th, %m bln.') }}
                        <a href={{ url('project.edit_anak/'.$item->id) }}> <i class="fa fa-edit"></i></button></a><br>
                    @endforeach
                @endif
                    {{-- <a href="{{ url('/project.anak_tambah') }}"><i class="fa fa-plus-circle"></i> </a> --}}
            </td>
        </tr>
    </table>

@endsection