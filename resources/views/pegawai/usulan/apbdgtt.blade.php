
<div class="mt-5 text-center mb-5" style="font-family: 'Bookman Old Style'; font-size:11pt">
    DAFTAR NAMA GURU TIDAK TETAP DAN TENAGA KEPENDIDIKAN TIDAK TETAP <br>
    PADA JENJANG PENDIDIKAN MENENGAH DAN PENDIDIKAN KHUSUS <br>
    PROGRAM PELAYANAN PENDIDIKAN <br>
    WILAYAH BANGKA SELATAN <br>
    KEGIATAN PENINGKATAN FUNGSI PELAYANAN PENDIDIKAN <br>
    DINAS PENDIDIKAN PROVINSI KEPULAUAN BANGKA BELITUNG <br>
    SEMESTER GANJILTAHUN PELAJARAN 2024/2025 <br>
    TAHUN ANGGARAN 2024 <br>
</div>

<div style="font-family: 'Bookman Old Style'; font-size:11pt">GURU TIDAK TETAP SMK NEGERI 1 SIMPANG RIMBA</div>

    <table class="table table-sm  table-bordered border-primary mt-3 " style="font-family: 'Bookman Old Style'; font-size:11pt ; " >
            <tr class="align-middle text-center ">
                <th>No</th>
                <th>NAMA</th>
                <th>JENIS <br> KELAMIN</th>
                <th>NIPTK/NUPTK</th>
                <th style="width: 400px">TUGAS/MAPEL YANG DIAMPU</th>
                <th>JUMLAH JAM <br> MENGAJAR</th>
                <th>HONORARIUM <br>PERBULAN (Rp)</th>
            </tr>
        @foreach ($apbdgtt as $item)
        <tr style="text-transform:uppercase">
            <td class="text-center">{{ $loop->iteration }}.</td>
            <td>{{ $item->name}}
                <a href="/project.edit_user/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-edit tampil"></i></a> 
            </td>
            <td class="text-center">
                @if ($item->jk =='Perempuan')
                    p
                @elseif  ($item->jk =='Laki-Laki')
                    L
                @endif
            </td>
            <td class="text-center">{{ $item->nuptk }}</td>
            <td class="text-center">
                {{-- @foreach ($item->mapel as $x)
                {{ $x }} <br>
                @endforeach --}}
                {{ $item->mapel }}
            </td>
            <td class="text-center">{{ $item->jlh_jam}}</td>
            <td class="text-center">2.900.000</td>
        </tr>
        @endforeach
    </table>