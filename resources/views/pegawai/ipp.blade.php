<h5 class="mt-3 text-center">DAFTAR NAMA TENAGA HONORER (NON ASN) IPP <br>
    CABANG DINAS WILAYAH III DINAS PENDIDIKAN PROVINSI KEPULAUAN BANGKA BELITUNG <br>
    USULAN JULI-DESEMBER 2024</h5>
    <table class="table table-sm  table-bordered border-primary" style="font-size: 8pt">
            <tr class="align-middle text-center ">
                <td rowspan="2">No</td>
                <td rowspan="2">NIK</td>
                <td rowspan="2">NIPTK/NUPTK</td>
                <td rowspan="2">NAMA</td>
                <td rowspan="2">TGL.LAHIR</td>
                <td rowspan="2">UMUR</td>
                <td rowspan="2">JENIS <br> KELAMIN</td>
                <td colspan="3">ALAMAT (SESUAI KTP)</td>
                <td rowspan="2">STATUS</td>
                <td rowspan="2">TUGAS/MAPEL YANG DIAMPU</td>
                <td rowspan="2">BEBAN KERJA <br>(JP)</td>
                <td rowspan="2">PENDIDIKAN TERAKHIR</td>
                <td rowspan="2">SERTIFIKASI/ <br> NONSERTIFIKASI</td>
                <td rowspan="2">MULAI/LAMA <br> BERTUGAS</td>
                <td rowspan="2">SEKOLAH</td>
                <td rowspan="2">KET</td>
            </tr>
            <tr>
                <td>Kabupaten</td>
                <td>Kecamatan</td>
                <td>Desa/Kelurahan</td>
            </tr>
        @foreach ($ipp as $item)
        <tr>
            <td class="text-center">{{ $loop->iteration }}.</td>
            <td class="text-center">{{ $item->nik }}</td>
            <td class="text-center">{{ $item->nuptk }}</td>
            <td>{{ $item->name}}
                <a href="/project.edit_user/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-edit tampil"></i></a> 
            </td>
            <td>
                {{ Carbon\Carbon::Parse($item->tmt_pangkat)->translatedFormat('d/m/Y') }}
            </td>
            <td>
                {{ \Carbon\Carbon::parse( $item->tgl_lahir)->diff(\Carbon\Carbon::now())->format('%y th')}}
            </td>
            <td class="text-center">
                @if ($item->jk =='Perempuan')
                    p
                @elseif  ($item->jk =='Laki-Laki')
                    L
                @endif
            </td>
            <td class="text-center">{{ $item->kabupaten}}</td>
            <td class="text-center">{{ $item->kecamatan}}</td>
            <td class="text-center">{{ $item->desa_kelurahan}}</td>
            <td class="text-center">{{ $item->jabatan}}</td>
            <td class="text-center">
                @foreach ($item->mapel as $x)
                {{ $x }} <br>
                @endforeach
            </td>
            <td class="text-center">{{ $item->jlh_jam}}</td>
            <td >{{ $item->pendidikan}}
                {{ $item->jurusan }}
            </td>
            <td class="text-center">{{ $item->sertifikasi}}</td>
            <td class="text-center">
                {{ \Carbon\Carbon::parse( $item->tmt_pangkat)->diff(\Carbon\Carbon::now())->format('%y th, %m bl')}}
            </td>
            <td class="text-center">SMKN 1 Simpang Rimba</td>
            <td class="text-center">-</td>
        </tr>
        @endforeach
    </table>