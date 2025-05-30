@extends('layout.sidebar')

@section('content')






@if ($ak != null)

<div class="container mt-5" style="font-size: 12px;">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h4 class="mx-auto" style="text-align: center">ANGKA KREDIT PEGAWAI</h4>
        @if(!$akintegrasi || !$akintegrasi->user)
        <a href="{{ url('ak.create') }}" class="btn btn-primary">Create</a>
        @endif
    </div>
    <select class="form-control col-sm-6 mx-auto mb-2" id="sampleSelect" style="font-size: 12px;">
        <option style="text-align: center" value="pilih">---Pilih Pegawai---</option>
        @foreach ($pegawai as $item)
        <option style="text-align: center" value="{{ url('angka_kredit/'.$item->id)}} ">{{$item->name}}</option>
        @endforeach
    </select>
    @if($akintegrasi && $akintegrasi->user)
    <p class="text-center mb-5">
        <a class="btn btn-primary" href="{{ url('project.edit_user/'.$akintegrasi->user->id) }}">{{$akintegrasi->user->name}} <i class="bi-pencil-square"></i> </a>
        <a class="btn btn-primary" href="{{url('ak.create')}}"><i class="bi bi-plus-circle"></i> AK</a>
    </p>
    @endif


    <script>
        $("select").click(function() {
            var open = $(this).data("isopen");
            if (open) {
                window.location.href = $(this).val()
            }
            $(this).data("isopen", !open);
        });
    </script>

    @if($akintegrasi && $akintegrasi->user)
    <form class="d- flex tampil mb-3" action="{{ route('akumulasi', [$akintegrasi->user->id]) }}" method="GET">
        <table>
            <tr>
                <td colspan="3" style="font-size: 10px"><strong><span class="text-danger">* </span>Pilih Tanggal Awal Penilaian</strong></td>
                <td></td>
                <td colspan="3" style="font-size: 10px"><strong><span class="text-danger">* </span>Pilih Tanggal Akhir Penilaian</strong></td>
            </tr>
            <tr>
                <td style="width: 50px;">
                    <select name="day_awal" id="day_awal" class="form-control">
                        @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </td>
                <td style="width: 150px;">
                    <select name="month_awal" id="month_awal" class="form-control">
                        @php
                        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        @endphp
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ $months[$i - 1] }}</option>
                            @endfor
                    </select>
                </td>
                <td style="width: 100px;">
                    <select name="year_awal" id="year_awal" class="form-control">
                        @for ($i = date('Y'); $i >= 2022; $i--)
                        <option value="{{ $i }}" @if($i==2022) selected @endif>{{ $i }}</option>
                        @endfor
                    </select>
                </td>
                <td style="width: 100px"></td>
                <td style="width: 50px;">
                    <select name="day_akhir" id="day_akhir" class="form-control">
                        @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}" @if($i==31) selected @endif>{{ $i }}</option>
                            @endfor
                    </select>
                </td>
                <td style="width: 150px;">
                    @php
                    $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    @endphp
                    <select name="month_akhir" id="month_akhir" class="form-control">
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" @if($i==12) selected @endif>{{ $months[$i - 1] }}</option>
                            @endfor
                    </select>
                </td>
                <td style="width: 100px;">
                    <select name="year_akhir" id="year_akhir" class="form-control">
                        @for ($i = date('Y'); $i >= 2022; $i--)
                        {{-- <option value="{{ $i }}" @if($i == 2022) selected @endif>{{ $i }}</option> --}}
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </td>
                <td style="width: 120px"></td>
                <td>
                    <!-- <label for="end_date">.</label> -->
                    <button type="submit" class="btn btn btn-primary ">AKUMULASI</button>
                </td>
            </tr>
        </table>
    </form>
    @endif
    <hr class="mt-4">
    @if($akintegrasi && $akintegrasi->user)
    <form class="d- flex tampil mb-4" action="{{ route('penetapan', [$akintegrasi->user->id]) }}" method="GET">
        <table>
            <tr>
                <td colspan="3" style="font-size: 10px"><strong><span class="text-danger">* </span>Pilih Tanggal Awal Penilaian</strong></td>
                <td></td>
                <td colspan="3" style="font-size: 10px"><strong><span class="text-danger">* </span>Pilih Tanggal Akhir Penilaian</strong></td>
            </tr>
            <tr>
                <td style="width: 50px;">
                    <select name="day_awal" id="day_awal" class="form-control">
                        @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </td>
                <td style="width: 150px;">
                    <select name="month_awal" id="month_awal" class="form-control">
                        @php
                        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        @endphp
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ $months[$i - 1] }}</option>
                            @endfor
                    </select>
                </td>
                <td style="width: 100px;">
                    <select name="year_awal" id="year_awal" class="form-control">
                        @for ($i = date('Y'); $i >= 2022; $i--)
                        {{-- <option value="{{ $i }}">{{ $i }}</option> --}}
                        <option value="{{ $i }}" @if($i==2022) selected @endif>{{ $i }}</option>
                        @endfor
                    </select>
                </td>
                <td style="width: 100px"></td>
                <td style="width: 50px;">
                    <select name="day_akhir" id="day_akhir" class="form-control">
                        @for ($i = 1; $i <= 31; $i++)
                            {{-- <option value="{{ $i }}">{{ $i }}</option> --}}
                            <option value="{{ $i }}" @if($i==31) selected @endif>{{ $i }}</option>
                            @endfor
                    </select>
                </td>
                <td style="width: 150px;">
                    @php
                    $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    @endphp
                    <select name="month_akhir" id="month_akhir" class="form-control">
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" @if($i==12) selected @endif>{{ $months[$i - 1] }}</option>
                            @endfor
                    </select>
                </td>
                <td style="width: 100px;">
                    <select name="year_akhir" id="year_akhir" class="form-control">
                        @for ($i = date('Y'); $i >= 2022; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </td>
                <td style="width: 120px"></td>
                <td>
                    <!-- <label for="end_date">.</label> -->
                    <button type="submit" class="btn btn btn-primary ">PENETAPAN</button>
                </td>
            </tr>
        </table>
    </form>
    @endif

    <div>
        {{-- <a href="{{ route('pdfReport',[$akintegrasi->user->id]) }}">Report</a> --}}
    </div>
    <table class="table table-sm">
        <tr style="text-align: center">
            <th>TAHUN</th>
            <th>PERIODIK <br>(BULAN)</th>
            <th>PREDIKAT</th>
            <th>PROSENTASE</th>
            <th>KOEFISIEN <br> PER TAHUN</th>
            <th style="text-align: right">JUMLAH</th>
            <th>VIEW</th>
        </tr>

        <tr style="text-align: center">
            @php
            if ($akintegrasi && $akintegrasi->user) {
            if ($akintegrasi->user->name == 'Ifhan Fuadi S.Pd.') {
            $tahunnya = '2023';
            } else {
            $tahunnya = '2022';
            }
            } else {
            $tahunnya = '';
            }
            @endphp
            <td>{{ $tahunnya }}</td>
            <td>AK Integrasi</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td style="text-align: right">
                {{ $akintegrasi && $akintegrasi->user ? number_format($akintegrasi->user->ak_integrasi,3) : '' }}
            </td>
            <td></td>
        </tr>
        @php
        $hasil = 0;
        @endphp
        @foreach ($ak as $item)
        @php
        $predikat = $item->predikat;

        // Compute $koe based on user's pangkat_gol
        $pangkat = $item->user ? $item->user->pangkat_gol : null;
        if ($pangkat == 'Penata Muda, III/a' || $pangkat == 'Penata Muda TK.I, III/b') {
        $koe = 12.5;
        } elseif ($pangkat == 'Penata, III/c' || $pangkat == 'Penata TK.I, III/d') {
        $koe = 25;
        } elseif ($pangkat == 'Pembina, IV/a') {
        $koe = 37.5;
        } else {
        $koe = 0;
        }

        $date1 = $item->tgl_awal_penilaian;
        $date2 = $item->tgl_akhir_penilaian;

        $ts1 = strtotime($date1);
        $ts2 = strtotime($date2);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        $period = $diff + 1;

        $hasil += ($period / 12) * $koe * $predikat / 100;
        $jumlah= ($period / 12) * $koe * $predikat / 100;

        @endphp
        <tr style="text-align: center">
            <td>{{Carbon\Carbon::parse($item->tgl_awal_penilaian)->translatedFormat('Y')}}</td>
            <td>{{$period}}</td>
            <td>
                @php
                if ($item->predikat == 150) {
                echo "Sangat Baik";
                } elseif ($item->predikat == 100) {
                echo "Baik";
                } else {
                echo "x";
                }
                @endphp

            </td>
            <td>{{$predikat}} %</td>
            <td style="text-align: center">{{$koe}}</td>
            <td style="text-align: right">{{number_format($jumlah,3)}}</td>
            <td>
                <a class="nav-menu" href="{{url('ak.konversi/'.$item->id)}}"><i class="bi bi-eye"></i></a>
                <form onsubmit="return confirm('yakin hapus data?..')" class="d-inline" action="{{url('ak.destroy/'.$item->id)}}" method="POST">
                    <a class="nav-menu" href="{{url('ak.edit/'.$item->id)}}"><i class="bi bi-pencil"></i></a>
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm" type="submit" class="btn"><i class="bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td style="text-align: center"><b>JUMLAH</b> </td>
            <td colspan="4"></td>
            <td style="text-align: right">
                {{ $akintegrasi && $akintegrasi->user ? number_format($hasil + $akintegrasi->user->ak_integrasi, 3) : '' }}
            </td>
            <td></td>
        </tr>
    </table>
</div>



@else
<div class="btn btn-warning mt-3"><i><b>ZONK BRO... !!.. AK belum diusulkan, TENGKIW. </b></i></div>
@endif

@endsection