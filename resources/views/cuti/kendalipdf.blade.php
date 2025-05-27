<div class="card-header" style="text-align: center">
    <strong>
        KARTU KENDALI CUTI PEGAWAI NEGERI SIPIL DAN PPPK <br>
        CABANG DINAS PENDIDIKAN WILAYAH III <br>
        DINAS PENDIDIKAN <br>
        PROVINSI KEPULAUAN BANGKA BELITUNG <br>
    </strong>
</div>
<table>
    @foreach ($cuti as $item)
    <tr>
        <th style="width: 100px">Nama</th>
        @if ($item->unit_kerja == "KEJAKSAAN TINGGI KEP. BANGKA BELITUNG")
        <th style="text-transform:uppercase">:&nbsp;&nbsp;{{ $item->name }}
        </th>
        @else
        <th>:&nbsp;&nbsp;{{ $item->name }}
            </th>
        @endif
    </tr>
    <tr>
        <th>NIP.</th>
        <th>:&nbsp;&nbsp;{{ $item->nip }}</th>
    </tr>
    <tr>
        <th>Jabatan</th>
        <th>:&nbsp;&nbsp;{{ $item->jabatan }}</th>
    </tr>
    <tr>
        <th>Pangkat/Gol.</th>
        <th>:&nbsp;&nbsp;{{ $item->pangkat_gol }}</th>
    </tr>
    <tr>
        <th>Unit Kerja.</th>
        <th>:&nbsp;&nbsp;{{ $item->unit_kerja }}</th>
    </tr>
    @endforeach
    
</table>
<tr nobr = "true">
    <td> </td>
</tr>
<table border="1" cellpadding="2" cellspacing="0" >
    <tr style="text-align: center ; background-color:#a69fa0">
        <th style="width: 40px" rowspan="2">&nbsp;<br> No.</th>
        <th style="width: 225px" colspan="2">SURAT IZIN/SURAT KEPUTUSAN</th>
        <th colspan="2">LAMANYA</th>
        <th style="width: 100px" rowspan="2">&nbsp;<br>JENIS CUTI</th>
        <th style="width: 75px" rowspan="2">&nbsp;<br>LAMA CUTI</th>
        <th rowspan="2">PARAF PEGAWAI <br>KEPEGAWAIAN</th>
        <th style="width: 50px" rowspan="2">&nbsp;<br>KET</th>
    </tr>
    <tr style="text-align: center; background-color:#a7a3a4">
        <th style="width: 150px">NOMOR</th>
        <th style="width: 75px">TANGGAL</th>
        <th>DARI TANGGAL</th>
        <th>SAMPAI TANGGAL</th>
    </tr>
    @foreach ($cuti as $item)
        @foreach ($item->cuti as $n)
            <tr style="text-align: center; vertical-align:middle">
                <td style="text-align: center">{{ $loop->iteration }}. </td>
                <td>
                    @if ($n->no_surat == "")
                    850/......./Cabdindik wil III/{{ Carbon\Carbon::Parse($n->tgl_awal)->format('Y') }} 
                    @else
                    850/ {{ $n->no_surat }}/Cabdindik wil III/{{ Carbon\Carbon::Parse($n->tgl_surat)->format('Y') }} 
                    @endif
                </td>
                <td>
                    @if ($n->no_surat == "")
                        -
                    @else
                        {{ Carbon\Carbon::Parse($n->tgl_surat)->format('d-m-Y') }} 
                    @endif
                </td>
                <td> {{ Carbon\Carbon::Parse($n->tgl_awal)->format('d-m-Y') }} </td>
                {{-- <td> {{ Carbon\Carbon::Parse($n->tglmasuk)->format('d-m-Y') }} </td> --}}
                <td>{{ $n->tglmasuk }}</td>
                
                <td>
                    @if ($n->jenis_cuti == 'Cuti Karena Alasan Penting')
                        Cuti alasan penting
                    @else
                        {{ $n->jenis_cuti }}
                    @endif
                </td>
                <td class="text-center">
                    @if ($n->jenis_cuti == "Cuti Melahirkan")
                        3 bulan
                    @elseif ( $n->jlh_hari >=20)
                        1 bulan
                    @else
                        {{ $n->jlh_hari }} hari
                    @endif
                </td>
                <td>
                    <button class="btn btn-sm  tampil" type="submit">
                        <a href="{{ url('cuti.edit/'.$n->id) }}"><i class="fa fa-edit"></i> </a> 
                    </button>
                
                    <form class="d-inline" onsubmit="return confirm('yakin hapus data?!!..')" action="/cuti.destroy/{{ $n->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm tampil" type="submit"><i class="fa fa-trash-o fa-lg" style="color: #ee1939"></i></button>
                    </form>
                </td>
                <td style="vertical-align: text-top" >
                    @if ($item->pangkat_gol == "IX")
                    <a href="/cuti.form_2/{{ $n->id }}"style="text-decoration: none"> <i class="fa fa-envelope-o fa-fw tampil" aria-hidden="true"></i></a>
                    @else
                    <a href="/cuti.form_1/{{ $n->id }}"style="text-decoration: none"> <i class="fa fa-envelope-o fa-fw tampil" aria-hidden="true"></i></a>
                    @endif
                    <a href="/cuti.sementara/{{ $n->id }}"style="text-decoration: none"> <i class="fa fa-eye tampil"></i></a>
                    <a href="/pdf/{{ $n->id }}"style="text-decoration: none"><i class="fa fa-regular fa-download tampil"></i></a>
                </td>
            </tr>
            
            
        @endforeach
    @endforeach
    <?php 
    for($i=$count+1;$i<=10;$i++)
    {
    ?>
    <tr>
        <td style="text-align: center"><?php echo $i; ?>.</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <?php
    }
    ?>
        {{-- @foreach ($dat as $item)
            @switch($item->cuti_count)
                @case($item->cuti_count <= 1)
                    @include('lam_kendalipdf.kdl_9')
                    @break
    
                @case($item->cuti_count <= 2)
                    @include('lam_kendalipdf.kdl_8')
                    @break

                @case($item->cuti_count <= 3)
                    @include('lam_kendalipdf.kdl_7')
                    @break
                    
                @case($item->cuti_count <= 4)
                    @include('lam_kendalipdf.kdl_6')
                    @break

                @case($item->cuti_count <= 5)
                    @include('lam_kendalipdf.kdl_5')
                    @break
    
                @default
                    @include('lam_kendalipdf.kdl_10')
            @endswitch
        @endforeach --}}

</table>
<tr nobr = "true">
    <td> </td>
</tr>
<table border="0" cellpadding="2" cellspacing="0" style="width: 778px">
    <tr>
        <td></td>
        <td></td>
        <td style="text-align: center"><strong> Kepala Sekolah <br> SMK Negeri 1 Simpang Rimba <br><br><br>
            @foreach ($cuti as $item){{ $item->penilai->nama }} <br>NIP. {{ $item->penilai->nip }}
                @endforeach
            </strong>
        </td>
    </tr>
</table>
</div> 