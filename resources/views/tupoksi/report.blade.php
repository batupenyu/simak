@extends('layout.master')

@section('content')
<div class="container">
    <h2>Laporan Tupoksi dengan Profil Atasan</h2>
    
    <div class="card">
        <div class="card-header">
            <h4>Data Pegawai</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Nama</td>
                    <td>{{ $user->name ?? '-' }}</td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>{{ $user->nip ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Pangkat/Golongan</td>
                    <td>{{ $user->pangkat_gol ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>{{ $user->jabatan ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Unit Kerja</td>
                    <td>{{ $user->unit_kerja ?? '-' }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h4>Profil Atasan</h4>
        </div>
        <div class="card-body">
            @if($atasan)
            <table class="table table-bordered">
                <tr>
                    <td>Nama</td>
                    <td>{{ $atasan->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>{{ $atasan->nip ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Pangkat/Golongan</td>
                    <td>{{ $atasan->pangkat_gol ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>{{ $atasan->jabatan ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Unit Kerja</td>
                    <td>{{ $atasan->unit_kerja ?? '-' }}</td>
                </tr>
            </table>
            @else
            <p>Tidak ada data atasan ditemukan.</p>
            @endif
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h4>Profil Penilai</h4>
        </div>
        <div class="card-body">
            @if($penilai)
            <table class="table table-bordered">
                <tr>
                    <td>Nama</td>
                    <td>{{ $penilai->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>{{ $penilai->nip ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Pangkat/Golongan</td>
                    <td>{{ $penilai->pangkat_gol ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>{{ $penilai->jabatan ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Unit Kerja</td>
                    <td>{{ $penilai->unit_kerja ?? '-' }}</td>
                </tr>
            </table>
            @else
            <p>Tidak ada data penilai ditemukan.</p>
            @endif
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h4>Data Tupoksi</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Indikator</th>
                    <th>Aspek</th>
                    <th>Target</th>
                    <th>Satuan</th>
                    <th>Realisasi</th>
                    <th>Umpan Balik</th>
                </tr>
                <tr>
                    <td>{{ $tupoksi->indikator ?? '-' }}</td>
                    <td>{{ $tupoksi->aspek ?? '-' }}</td>
                    <td>{{ $tupoksi->target ?? '-' }}</td>
                    <td>{{ $tupoksi->satuan ?? '-' }}</td>
                    <td>{{ $tupoksi->realisasi ?? '-' }}</td>
                    <td>{{ $tupoksi->umpanbalik ?? '-' }}</td>
                </tr>
            </table>
        </div>
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection