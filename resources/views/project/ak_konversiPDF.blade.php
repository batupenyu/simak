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

    // Check if weekend or holiday
    if ($tglPenetapan->isWeekend() || isHoliday($tglPenetapan, $holidays)) {
        $tglPenetapan = $tglPenetapan->addDay();
    }
@endphp

<p style="text-align: center">
    <b>KONVERSI PREDIKAT KINERJA KE ANGKA KREDIT <br>
        NOMOR : 800/ ....... /SMKN 1 Kb/Dindik/{{ $tglPenetapan->translatedFormat('Y') }}/PAK</b>
</p>
<table border="0" cellpadding="2">
    <tr>
        <td>Instansi: Dinas Pendidikan Prov. Kep. Bangka Belitung</td>
        @php
            $startDate = \Carbon\Carbon::parse($kredit->tgl_awal_penilaian);
            $endDate = \Carbon\Carbon::parse($kredit->tgl_akhir_penilaian);
            $holidays = \Illuminate\Support\Facades\DB::table('customers')->pluck('tgl_libur')->map(function($item) {
                return \Carbon\Carbon::parse($item)->format('Y-m-d');
            })->toArray();

            function isHoliday($date, $holidays) {
                return in_array($date->format('Y-m-d'), $holidays);
            }

            if ($startDate->isWeekend() || isHoliday($startDate, $holidays)) {
                $startDate = $startDate->addDay();
            }
            if ($endDate->isWeekend() || isHoliday($endDate, $holidays)) {
                $endDate = $endDate->addDay();
            }
        @endphp
        <td style="text-align: right">Periode : {{ $startDate->translatedFormat('d F') }} - {{ $endDate->translatedFormat('d F Y') }}</td>
    </tr>
</table>
@include('project.profil_4')

<table border="1" cellpadding="2">
    <tr>
        <td style="text-align: center"><b>KONVERSI PREDIKAT KINERJA KE ANGKA KREDIT</b></td>
    </tr>
</table>
<table border="1" cellpadding="2">
    <tr style="text-align: center">
        <td style="width: 250px" colspan="2">HASIL PENILAIAN KINERJA</td>
        <td rowspan="2">&nbsp;<br>KOEFISIEN <br> PER TAHUN</td>
        <td style="width: 143px">ANGKA KREDIT <br> YANG DI DAPAT</td>
    </tr>
    <tr style="text-align: center">
        <td>PREDIKAT</td>
        <td>PROSENTASE</td>
        <td>(KOLOM 2 x KOLOM 3)</td>
    </tr>
    <tr style="text-align: center">
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
    </tr>
    <tr style="text-align: center">
        <td>
            @php
                if ($jenjang == 'Ahli Pertama'){
                    $koe = 12.5;
                } elseif ($jenjang == 'Ahli Muda') {
                    $koe = 25;
                } else {
                    $koe = 37.5;
                }


                if ($kredit->predikat == '150' ){
                    echo "Sangat Baik";
                } elseif ($kredit->predikat == '100'){
                    echo "Baik";
                } else {
                    echo "";
                }

            @endphp
        </td>
        <td>{{ $kredit->predikat }}</td>
        <td>{{ $koe }}</td>
        <td>
            <?php
            $predikat = $kredit->predikat;


            $date1 = $kredit->tgl_awal_penilaian;
            $date2 = $kredit->tgl_akhir_penilaian;

            $ts1 = strtotime($date1);
            $ts2 = strtotime($date2);

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);

            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);

            $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
            $periodik = $diff + 1;

            $hasil = ($periodik / 12) * $koe * $predikat / 100;

            echo number_format($hasil, 3);

            // $origin = new DateTime($kredit->tgl_awal_penilaian);
            // $target = new DateTime($kredit->tgl_akhir_penilaian);
            // $interval = $origin->diff($target);
            // $bulan = $interval->format('%m');
            // echo $bulan+1;
            ?>
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
        <td style="width: 40%">
            Ditetapkan di Koba. <br>
            Pada tanggal, {{ $tglPenetapan->translatedFormat('d F Y') }}. <br>
            Pejabat Penilai Kinerja,
            <br>
            <br>
            <br>
            <br>
            {{$kredit->penilai->nama}}
            <br>
            NIP. {{ $kredit->penilai->nip }} <br><br><br>

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