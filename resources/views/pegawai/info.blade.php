@extends('layout.sidebar')

@section('content')

<p><a href="{{ url('pegawai.create') }}"><i class="fa fa-plus btn btn-sm btn-warning"><b>Pegawai</b></i></a></p>

@foreach ($pegawai as $item)
<a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-sm btn-outline-primary" role="button">{{ $loop->iteration }}. {{ $item->name }}</a>
@endforeach

<!-- <hr> -->

@foreach ($p3k as $item)
<a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-sm btn-outline-success" role="button">{{ $loop->iteration }}. {{ $item->name }}</a>
@endforeach

<!-- <hr> -->

@foreach ($honor as $item)
<a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-sm btn-outline-dark" role="button">{{ $loop->iteration }}. {{ $item->name }}</a>
@endforeach

<!-- <hr> -->

@foreach ($data as $item)
<h3>Profil Pegawai 
    <a href="{{ url('/project.edit_user/'.$item->id) }}" class="btn btn-sm btn-primary float-end">
        <i class="fa fa-pencil"></i> Edit
    </a>
</h3>
<ul>
    <li><strong>Nama:</strong> {{ $item->name }}</li>
    <li><strong>NIP:</strong> {{ $item->nip }}</li>
    <li><strong>Pangkat/Gol:</strong> {{ $item->pangkat_gol }}</li>
    <li><strong>Unit Kerja:</strong> {{ $item->unit_kerja }}</li>
    <li><strong>TMT Pangkat:</strong> {{ \Carbon\Carbon::parse($item->tmt_pangkat)->translatedFormat('d - m - Y') }}</li>
    <li><strong>TMT Jabatan:</strong> {{ \Carbon\Carbon::parse($item->tmt_jabatan)->translatedFormat('d - m - Y') }}</li>
    <li><strong>MK Seluruhnya:</strong> {{ \Carbon\Carbon::parse($item->tmt_pangkat)->diff(\Carbon\Carbon::now())->format('%y tahun, %m bulan') }}</li>
    <li><strong>Jabatan:</strong> {{ $item->jabatan }}</li>
    <li><strong>Mapel:</strong>
        @foreach ($item->mapel as $x)
        {{ $x }}
        @endforeach
    </li>
</ul>

<h3>Profil Pasangan
    @php
        $hasPasangan = isset($item->pasangan) && $item->pasangan && isset($item->pasangan->name) && $item->pasangan->name && $item->pasangan->name != '-';
    @endphp
    <div class="float-end">
        <a href="{{ url('pasangan.add/'.$item->id) }}" class="btn btn-sm btn-success">
            <i class="fa fa-plus"></i> Tambah
        </a>
        @if ($hasPasangan)
        <a href="{{ url('pasangan.edit/'.$item->pasangan->id) }}" class="btn btn-sm btn-primary ms-1">
            <i class="fa fa-pencil"></i> Edit
        </a>
        <form action="{{ url('pasangan.delete/'.$item->pasangan->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger ms-1" onclick="return confirm('Yakin hapus data pasangan?')">
                <i class="fa fa-trash"></i>
            </button>
        </form>
        @endif
    </div>
    @if(session('success_pasangan'))
    <span class="text-success">{{ session('success_pasangan') }}</span>
    @endif
</h3>
@if ($hasPasangan)
<ul>
    <li><strong>Nama:</strong> {{ $item->pasangan->name }}</li>
    <li><strong>Tgl. Lahir:</strong> {{ \Carbon\Carbon::parse($item->pasangan->tgl_lahir)->translatedFormat('d - m - Y') }}</li>
    <li><strong>Tgl. Menikah:</strong> {{ \Carbon\Carbon::parse($item->pasangan->tgl_kawin)->translatedFormat('d - m - Y') }}</li>
    <li><strong>Pekerjaan:</strong> {{ $item->pasangan->job }}</li>
    <li><strong>Penghasilan:</strong> Rp.{{ number_format($item->pasangan->net, 2) }},-</li>
    <li><strong>Keterangan:</strong> <i>({{ $item->pasangan->status }})</i></li>
</ul>
@else
<p>Belum ada Pasangan</p>
@endif

<h3>Profil Anak
    <div class="float-end">
        <a href="{{ url('anak.create/'.$item->id) }}" class="btn btn-sm btn-success">
            <i class="fa fa-plus"></i> Tambah
        </a>
    </div>
    @if(session('success_anak'))
    <span class="text-success">{{ session('success_anak') }}</span>
    @endif
</h3>
@if (count($anak->anak) == 0)
<p>Belum ada anak</p>
@else
<ul>
    @foreach ($anak->anak as $anakItem)
    <li>
        <div class="d-inline">
            {{ $loop->iteration }}. {{ $anakItem->name }} - {{ \Carbon\Carbon::parse($anakItem->tgl_lahir)->diff(\Carbon\Carbon::now())->format('%y th, %m bln.') }}
            <a href="{{ url('project.edit_anak/'.$anakItem->id) }}" class="btn btn-sm btn-primary ms-2">
                <i class="fa fa-edit"></i> Edit
            </a>
            <form action="{{ url('project.hapus_anak/'.$anakItem->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger ms-1" onclick="return confirm('Yakin hapus data anak?')">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        </div>
    </li>
    @endforeach
</ul>
@endif
@endforeach

@endsection