@extends('layout.sidebar')

@section('content')
<link rel="stylesheet" href="{!! asset('css/app.css') !!}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<div class=" container-xl container-fluid py-5">
    @foreach ($pegawai as $item)
    {{-- <a href="{{ url('cuti.kendali/'.$item->id) }}" class="btn btn-sm btn-outline-success tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a> --}}
        {{-- @if ($item->pangkat_gol == 'IX')
            <p class="d-inline-flex gap-0">
                <a href="{{ url('cuti.kendali/'.$item->id) }}" class="btn btn-success tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
            
        @elseif ($item->nip =='')
            <p class="d-inline-flex gap-0">
                <a href="{{ url('cuti.kendali/'.$item->id) }}" class="btn btn-primary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @elseif ($item->unit_kerja =='KEJAKSAAN TINGGI KEP. BANGKA BELITUNG')
            <p class="d-inline-flex gap-0">
                <a href="{{ url('cuti.kendali/'.$item->id) }}" class="btn btn-secondary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @else
            
            <p class="d-inline-flex gap-0">
                <a href="{{ url('cuti.kendali/'.$item->id) }}" class="btn btn-outline-primary tampil" role="button" >{{ $loop->iteration }}. {{ $item->name }}</a>
            </p>
        @endif --}}
    @endforeach


    
<h4 class="mx-auto" style="text-align: center">USULAN CUTI PEGAWAI</h4>
<select class="form-control col-sm-6 mx-auto mb-2" id="sampleSelect" >
    <option style="text-align: center" value="pilih">---Pilih Pegawai---</option>
    @foreach ($pegawai as $item)
    <option style="text-align: center" value="{{ url('cuti.kendali/'.$item->id)}} " >{{$loop->iteration}}. {{$item->name}}</option>
    @endforeach
</select>
<p class="text-center mb-5">
    {{-- <a class="btn btn-primary" href="{{ url('project.edit_user/'.$akintegrasi->user->id) }}">{{$akintegrasi->user->name}}  <i class="bi-pencil-square"></i> </a>
    <a class="btn btn-primary" href="{{url('ak.create')}}"><i class="bi bi-plus-circle"></i> AK</a> --}}
</p>


<script>
    $("select").click(function() {
  var open = $(this).data("isopen");
  if(open) {
    window.location.href = $(this).val()
  }
  $(this).data("isopen", !open);
});

</script>

<p class="mt-2"><i class="fa fa-plus-circle btn btn-outline-primary tampil" style="padding-block: 10px" > 
        <a href="{{ url('cuti.create') }}" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-decoration:none"> Usulan Cuti</a></i>
    {{-- <button onclick="window.print();" class="btn btn-sm btn-primary tampil float-end">CETAK</button> --}}
</p>

    <hr class="tampil">
    <div class="card-header" style="text-align: center">
        <strong>
            KARTU KENDALI CUTI PEGAWAI NEGERI SIPIL DAN PPPK <br>
            CABANG DINAS PENDIDIKAN WILAYAH III <br>
            DINAS PENDIDIKAN <br>
            PROVINSI KEPULAUAN BANGKA BELITUNG <br><br>
        </strong>
    </div>
    <br>
    <br>
    <table>
        @foreach ($cuti as $item)
        <a class="btn float-end" href="{{ url('kendalipdf/'.$item->id) }}" style="text-decoration: none"><i class="bi-printer-fill"></i></a>
        <tr>
            <th style="width: 200px">Nama</th>
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
            <th>:&nbsp;&nbsp;{{ $peg->unit_kerja }}</th>
        </tr>
        @endforeach
        
    </table>
    <table class="table table-sm table-bordered border-primary mt-3  " style="font-size: 14px">
        <tr style="text-align: center; vertical-align:middle">
            <th rowspan="2">No.</th>
            <th colspan="2">SURAT IZIN/SURAT KEPUTUSAN</th>
            <th colspan="2">LAMANYA</th>
            <th rowspan="2">JENIS CUTI</th>
            <th rowspan="2">LAMA CUTI</th>
            <th rowspan="2">PARAF PEGAWAI <br>KEPEGAWAIAN</th>
            <th rowspan="2">KET</th>
        </tr>
        <tr style="text-align: center; vertical-align:middle">
            <th>NOMOR</th>
            <th>TANGGAL</th>
            <th>DARI TANGGAL</th>
            <th>SAMPAI TANGGAL</th>
        </tr>
        @foreach ($cuti as $item)
            @foreach ($item->cuti as $n)
                <tr style="text-align: center; vertical-align:middle">
                    <td style="text-align: center"> {{ $loop->iteration }}. </td>
                    <td>
                        @if ($n->no_surat == "")
                        850/........./Cabdindik wil III/{{ Carbon\Carbon::Parse($n->tgl_awal)->format('Y') }} 
                        @else
                        850/ {{ $n->no_surat }}/Cabdindik wil III/{{ Carbon\Carbon::Parse($n->tgl_surat)->format('Y') }} 
                        @endif
                    </td>
                    <td style="width: 175px">
                        @if ($n->no_surat == "")
                            -
                        @else
                            {{ Carbon\Carbon::Parse($n->tgl_surat)->format('d-m-Y') }} 
                        @endif
                    </td>
                    <td> {{ Carbon\Carbon::Parse($n->tgl_awal)->format('d-m-Y') }} </td>
                    {{-- <td> {{ Carbon\Carbon::Parse($n->tglmasuk)->format('d-m-Y') }} </td> --}}
                    {{-- <td>{{ $n->tglmasuk }}</td> --}}
                    <td>
                       
                       <?php
                if (!function_exists('nextDate')) {
                            function nextDate($currentDate, $addDays, $holidays = []) {
                                // Convert the current date to a DateTime object
                                $date = new DateTime($currentDate);

                                // Loop until we add the required number of business days
                                $addedDays = 0;
                                while ($addedDays < $addDays) {
                                    // Move to the next day
                                    $date->modify('+1 day');

                                    // Check if the day is a weekend (Saturday or Sunday)
                                    $dayOfWeek = $date->format('N'); // 'N' gives the day of the week (1 for Monday, 7 for Sunday)
                                    if ($dayOfWeek >= 6) {
                                        continue; // Skip weekends
                                    }

                                    // Check if the day is a holiday
                                    $dateString = $date->format('Y-m-d');
                                    if (in_array($dateString, $holidays)) {
                                        continue; // Skip holidays
                                    }

                                    // If it's a valid business day, increment the counter
                                    $addedDays++;
                                }

                                // Return the final date as a string
                                return $date->format('Y-m-d');
                            }
                            }
// Call the function with the current date, the number of days to add, and an array
                            // Example usage
                            $currentDate = $n->tgl_awal; // Starting date
                            $addDays = $n->jlh_hari-1; // Number of business days to add
                            $holidays = $libur; // List of holidays

                            $nextDate = nextDate($currentDate, $addDays, $holidays);
                            // echo "Next date after $addDays business days: $nextDate";

                            ?>
                            {{ Carbon\Carbon::Parse($nextDate)->format('d-m-Y') }} 
                    </td>
                    {{-- <td>
                       @php
                       $hari = $n->jlh_hari;
                            $tanggalAwal = \Carbon\Carbon::parse($n->tgl_awal);
                            $tanggalBaru = $tanggalAwal->addDays($hari-1);
                        @endphp

                        {{ $tanggalBaru->format('d-m-Y') }} <!-- Output: 2023-10-06 -->
                    </td>                     --}}
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
                        @include('lam_kendali.kdl_9')
                        @break
        
                    @case($item->cuti_count <= 2)
                        @include('lam_kendali.kdl_8')
                        @break

                    @case($item->cuti_count <= 3)
                        @include('lam_kendali.kdl_7')
                        @break
                        
                    @case($item->cuti_count <= 4)
                        @include('lam_kendali.kdl_6')
                        @break

                    @case($item->cuti_count <= 5)
                        @include('lam_kendali.kdl_5')
                        @break
        
                    @default
                        @include('lam_kendali.kdl_10')
                @endswitch
            @endforeach --}}

    </table>
    <br>
    <div class="div col-6 float-end" style="text-align: center">
        <strong>
            Kepala Sekolah <br>
            {{$peg->unit_kerja}} <br><br><br>
            @foreach ($cuti as $item)
                {{ $item->penilai->nama }} <br>
                {{ $item->penilai->nip }}

            @endforeach
        </strong>
    </div>
</div> 

@endsection