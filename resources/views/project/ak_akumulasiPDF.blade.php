@if ($periodeAK !== null)
@forelse ($periodeAK as $kredit)
@empty
-
@endforelse
@php
    // Assume isHoliday function exists, otherwise define a placeholder
    $holidays = \Illuminate\Support\Facades\DB::table('customers')->pluck('tgl_libur')->map(function($item) {
        return \Carbon\Carbon::parse($item)->format('Y-m-d');
    })->toArray();

    if (!function_exists('isHoliday')) {
        function isHoliday($date, $holidays) {
            return in_array($date->format('Y-m-d'), $holidays);
        }
    }

    $tglPenetapan = \Carbon\Carbon::parse($kredit->tgl_penetapan);

    // Check if weekday (Mon-Fri) and holiday
    if ($tglPenetapan->isWeekday() && isHoliday($tglPenetapan, $holidays)) {
        $tglPenetapan = $tglPenetapan->addDay();
    }
@endphp

<p style="text-align: center">
    <b>AKUMULASI ANGKA KREDIT <br>
    NOMOR : 800/ ....... /SMKN 1 Kb/Dindik/{{ Carbon\Carbon::parse($kredit->tgl_penetapan)->translatedFormat('Y')}}/PAK</b>
</p>
<table border="0" cellpadding="2">
    @if ($periode !== null)
    <tr>
        {{-- <td>Instansi: {{ $unitkerjaAtasan }}</td> --}}
        <td>Instansi : Dinas Pendidikan Prov. Kep. Bangka Belitung</td>
        @php
            $startDate = \Carbon\Carbon::parse($start_date);
            $endDate = \Carbon\Carbon::parse($end_date);
            $holidays = \Illuminate\Support\Facades\DB::table('customers')->pluck('tgl_libur')->map(function($item) {
                return \Carbon\Carbon::parse($item)->format('Y-m-d');
            })->toArray();

            // Removed redundant isHoliday function declaration here

            if ($startDate->isWeekend() || isHoliday($startDate, $holidays)) {
                $startDate = $startDate->addDay();
            }
            if ($endDate->isWeekend() || isHoliday($endDate, $holidays)) {
                $endDate = $endDate->addDay();
            }
        @endphp
        <td style="text-align: right">Periode : {{ $startDate->translatedFormat('d F') }} - {{ $endDate->translatedFormat('d F Y') }}</td>
    </tr>
    @else

    @endif
</table>

<table border="1" cellpadding="3">
    <tr>
        <td style="width: 30px;text-align:center"><b>I</b></td>
        <td colspan="3" style="width: 494px"><b>KETERANGAN PERORANGAN</b></td>
    </tr>
    <tr>
        <td style="text-align: center">1</td>
        <td colspan="3">
            <table>
                <tr>
                    <td>Nama</td>
                    <td style="width: 20px">:</td>
                    <td style="width: 494px">{{ $akintegrasi->user->name }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">2</td>
        <td colspan="3">
            <table>
                <tr>
                    <td>NIP</td>
                    <td style="width: 20px">:</td>
                    <td style="width: 494px">{{ $akintegrasi->user->nip }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">3</td>
        <td colspan="3">
            <table>
                <tr>
                    <td>Nomor Seri Karpeg</td>
                    <td style="width: 20px">:</td>
                    <td style="width: 494px">{{ $akintegrasi->user->no_karpeg }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">4</td>
        <td colspan="3">
            <table>
                <tr>
                    <td>Tempat tanggal lahir</td>
                    <td style="width: 20px">:</td>
                    <td style="width: 494px">{{ $akintegrasi->user->tempat_lahir}} / {{ Carbon\Carbon::parse($akintegrasi->user->tgl_lahir)->translatedFormat('d F Y') }}</td>
                </tr>
            </table>
        </td>
    </tr>
     <tr>
        <td style="text-align: center">5</td>
        <td colspan="3">
            <table>
                <tr>
                    <td>Jenis Kelamin </td>
                    <td style="width: 20px">:</td>
                    <td style="width: 494px">{{ $akintegrasi->user->jk }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">6</td>
        <td colspan="3">
            <table>
                <tr>
                        @php
                            if ($akintegrasi->user->pangkat_gol =='Penata Muda, III/a') {
                                $jenjang = 'Ahli Pertama';
                            } elseif ($akintegrasi->user->pangkat_gol =='Penata Muda TK.I, III/b') {
                                $jenjang = 'Ahli Pertama';
                            } elseif ($akintegrasi->user->pangkat_gol =='Penata, III/c') {
                                $jenjang = 'Ahli Muda';
                            } elseif ($akintegrasi->user->pangkat_gol =='Penata TK.I, III/d') {
                                $jenjang = 'Ahli Muda';
                            } elseif ($akintegrasi->user->pangkat_gol =='Pembina, IV/a') {
                                $jenjang = 'Ahli Madya';
                            } else {
                                echo '';
                            }
                        @endphp
                    <td>Pangkat/Golongan ruang/TMT </td>
                    <td style="width: 20px">:</td>
                    <td style="width: 494px">{{ $akintegrasi->user->pangkat_gol }} / {{ Carbon\Carbon::parse($akintegrasi->user->tmt_pangkat)->translatedFormat('d F Y') }}
                    </td>
                </tr>
             
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">7</td>
        <td colspan="3">
            <table>
                <tr>
                        @php
                            if ($akintegrasi->user->pangkat_gol =='Penata Muda, III/a') {
                                $jenjang = 'Ahli Pertama';
                            } elseif ($akintegrasi->user->pangkat_gol =='Penata Muda TK.I, III/b') {
                                $jenjang = 'Ahli Pertama';
                            } elseif ($akintegrasi->user->pangkat_gol =='Penata, III/c') {
                                $jenjang = 'Ahli Muda';
                            } elseif ($akintegrasi->user->pangkat_gol =='Penata TK.I, III/d') {
                                $jenjang = 'Ahli Muda';
                            } elseif ($akintegrasi->user->pangkat_gol =='Pembina, IV/a') {
                                $jenjang = 'Ahli Madya';
                            } else {
                                echo '';
                            }
                        @endphp
                    <td>Jabatan/TMT </td>
                    <td style="width: 20px">:</td>
                    <td style="width: 494px">{{ $jenjang }}/ {{ Carbon\Carbon::parse($akintegrasi->user->tmt_jabatan)->translatedFormat('d F Y') }}
                    </td>
                </tr>
             
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">8</td>
        <td colspan="3">
            <table>
                <tr>
                    <td>Unit Kerja </td>
                    <td style="width: 20px">:</td>
                    <td style="width: 494px">{{ $akintegrasi->user->unit_kerja }}</td>
                </tr>
            </table>
        </td>
    </tr>
   
    <tr>
        <td style="text-align: center">9</td>
        <td colspan="3">
            <table>
              
                <tr>
                    <td>Instansi </td>
                    <td style="width: 20px">:</td>
                    <td style="width: 494px">Dinas Pendidikan Prov. Kep. Bangka Belitung</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table border="1" cellpadding="2">
    <tr>
        <td style="text-align: center"><b>KONVERSI PREDIKAT KINERJA KE ANGKA KREDIT</b></td>
    </tr>
</table>
<style>
.vertical-middle {
    padding-top: 15px;
    padding-bottom: 15px;
    text-align: center;
}
</style>
<table border="1" cellpadding="2">
    <tr style="text-align: center">
        <td style="width: 310px" colspan="4">HASIL PENILAIAN KINERJA</td>
        <td rowspan="2" style="padding:0;">
            <div style="display:flex; align-items:center; justify-content:center; height:0%;">
                KOEFISIEN <br> PER TAHUN
            </div>
        </td>
        <td rowspan="2" style="padding:0;width: 127px">
            <div style="display:flex; align-items:center; justify-content:center; height:0%;">
                ANGKA KREDIT <br> YANG DI DAPAT
            </div>
        </td>
        {{-- <td class="vertical-middle" style="width: 127px" rowspan="2">ANGKA KREDIT <br> YANG DI DAPAT</td> --}}
    </tr>
    <tr style="text-align: center">
        <td style="width: 55px">TAHUN</td>
        <td>PERIODIK <br>BULAN</td>
        <td style="width: 100px">PREDIKAT</td>
        <td>PROSENTASE</td>
    </tr>
    <tr style="text-align: center; background-color:gray">
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
    </tr>
    @if ($start_date == $tglintegrasi)
    <tr style="text-align: center">
            @php
                if ($akintegrasi->user->name == 'Ifhan Fuadi S.Pd.') {
                    $tahunnya = '2023';
                } else {
                    $tahunnya = '2022';
                }
            @endphp
        <td style=text-align: center>{{ $tahunnya }}</td>
        <td> AK Integrasi</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td style="text-align: right">
            {{ number_format($akintegrasi->user->ak_integrasi,3) }}
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
    </tr>
    @else
    @endif

    @forelse ($periodeAK as $kredit)
    <?php

    $date1 = $kredit->tgl_awal_penilaian;
    $date2 = $kredit->tgl_akhir_penilaian;
    $predikat = $kredit->predikat;

    $ts1 = strtotime($date1);
    $ts2 = strtotime($date2);

    $year1 = date('Y', $ts1);
    $year2 = date('Y', $ts2);

    $month1 = date('m', $ts1);
    $month2 = date('m', $ts2);

    $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
    $periodik = $diff + 1;
    $hasil = ($periodik / 12) * $koe * $kredit->predikat / 100;

    // koefisien berdasarkan jenjang

    if($kredit->user->pangkat_gol == 'Penata Muda, III/a' || $kredit->user->pangkat_gol == 'Penata Muda TK.I, III/b'){
        $jenjang = 'Ahli Pertama';
    } elseif ($kredit->user->pangkat_gol == 'Penata, III/c' || $kredit->user->pangkat_gol == 'Penata TK.I, III/d') {
        $jenjang = 'Ahli Muda';
    } else {
        $jenjang = 'Ahli Madya';
    }   

    $predikat = $kredit->predikat;

            if ($predikat = 'Sangat Baik') {
                $level = 150;
            } elseif ($predikat = 'Baik') {
                $level = 100;
            } elseif ($predikat = 'Butuh Perbaikan') {
                $level = 75;
            } elseif ($predikat = 'Kurang') {
                $level = 50;
            } elseif ($predikat = 'Sangat Kurang') {
                $level = 25;
            }

    if ($jenjang == 'Ahli Pertama'){
        $koe = 12.5;
    } elseif ($jenjang == 'Ahli Muda') {
        $koe = 25;
    } else {
        $koe = 37.5;
    }
    ?>

    <tr style="text-align: center">
        <td>{{ Carbon\Carbon::parse($kredit->tgl_awal_penilaian)->translatedFormat('Y') }}</td>
        <td>
            <?php
            echo $periodik;
            ?>
        </td>
        <td>
            <?php
                    if ($kredit->predikat == 150) {
                        echo "Sangat Baik";
                    } elseif ($kredit->predikat == 100) {
                        echo "Baik";
                    } else {
                        echo "x";
                    }
            ?>
        </td>
        <td>{{ $kredit->predikat}} %</td>
        <td>{{ $koe }}</td>
        <td style="text-align: right">
            <?php
            echo number_format($hasil, 3);
            ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
    </tr>
    @empty
    @endforelse

    <tr>
        <td style="text-align: center" colspan="5">JUMLAH ANGKA KREDIT YANG DIPEROLEH</td>
        <td style="text-align: right">
            @if ($start_date == $tglintegrasi)
            {{number_format($total + $akintegrasi->user->ak_integrasi,3)}}
            @else
            {{number_format($total,3)}}
            @endif

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
    </tr>
</table>
<tr nobr="true">
    <td> </td>
</tr>
<br>
<table border="0" cellpadding="2">
    <tr>
        <td style="width: 60%"></td>
        @php
           $tglttd = \Carbon\Carbon::parse($endDate)->addDays(1);
            $tglttd->locale('id_ID');

            if (!function_exists('isHoliday')) {
                function isHoliday($date, $holidays) {
                    return in_array($date->format('Y-m-d'), $holidays);
                }
            }

            $holidays = \Illuminate\Support\Facades\DB::table('customers')->pluck('tgl_libur')->map(function($item) {
                return \Carbon\Carbon::parse($item)->format('Y-m-d');
            })->toArray();

            while ($tglttd->isWeekend() || isHoliday($tglttd, $holidays)) {
                $tglttd = $tglttd->addDay();
            }
        @endphp
        <td style="width: 40%">
            Ditetapkan di Koba. <br>
            @forelse ($periodeAK as $kredit)
            @empty
            -
            @endforelse
            Pada tanggal, {{ $tglttd->translatedFormat('d F Y') }}.<br>
            Pejabat Penilai Kinerja,
            <br>
            <br>
            <br>
            <br>
            {{$akintegrasi->penilai->nama}}
            <br>
            NIP. {{$akintegrasi->penilai->nip}}
        </td>
    </tr>

</table>
<caption>
    Tembusan disampaikan kepada: <br>
    1. Jabatan Fungsional yang bersangkutan; <br>
    2. Ketatausahaan unit kerja; <br>
    3. Kepala Biro Kepegawaian dan Organisasi <br>
    4. Pejabat lain yang dianggap perlu.
</caption>

@else {
}
@endif