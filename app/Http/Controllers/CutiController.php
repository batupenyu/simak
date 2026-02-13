<?php

namespace App\Http\Controllers;

use DateTime;
use DatePeriod;
use DateInterval;
use App\Models\Cuti;
use App\Models\User;
use App\Models\Holiday;
use App\Models\Customer;
use Carbon\CarbonPeriod;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Elibyy\TCPDF\Facades\TCPDF;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Queue\Events\Looping;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;
use TCPDF_FONTS;

class CutiController extends Controller
{

    public function addWorkingDays($startDate, $daysToAdd)
    {
        $holidays = Customer::pluck('tgl_libur')->toArray(); // Fetch holidays from the database
        $currentDate = Carbon::parse($startDate);
        $addedDays = 0;

        while ($addedDays < $daysToAdd) {
            $currentDate->addDay(); // Move to the next day

            // Check if the current day is a weekend or a holiday
            if ($currentDate->isWeekend() || in_array($currentDate->toDateString(), $holidays)) {
                continue; // Skip weekends and holidays
            }

            $addedDays++; // Count this as a working day
        }

        return $currentDate; // Return the final date
    }

    public function generateCutiReport()
    {
        $cutiData = Cuti::with(['user'])->get(); // Fetch cuti data with user relations

        $view = view()->make('cuti.report', compact('cutiData')); // Create a view for the report
        $html = $view->render();

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::Output('cuti_report.pdf', 'D'); // Download the PDF
    }


    //


    public function pdf($id)
    {

        $cuti = Cuti::with(['user'])->where('id', $id)->get();
        $user = User::with('atasan')->first();
        $libur = Customer::all()->pluck('tgl_libur')->toArray();

        foreach ($cuti as $hari) {
            $daysToAdd = ($hari->jlh_hari);
            $holidays = $libur;
            $days = [];
            $date = CarbonImmutable::make($hari->tgl_awal);
            $i = 1;

            while ($i <= $daysToAdd) {
                if ($date->isWeekend() or in_array($date->format('Y-m-d'), $holidays)) {
                    $date = $date->addDay();
                    continue;
                }
                $days[] = $date;
                $date = $date->addDay();
                $i++;
            }

            $dates = $days;
            $awal = (min($dates));
            $akhir = (max($dates));
        }


        $view = view()->make('cuti.pdfSample', ['cuti' => $cuti, 'akhir' => $akhir, 'user' => $user]);
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);
        // $pdf = new TCPDF();

        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf::setLanguageArray($l);
        }
        // $pdf::Ln(2);
        $pdf::SetFont('zapfdingbats', '', 14);
        $pdf::AddPage();
        $pdf::setCellPaddings(0, '', '', 0);
        $pdf::SetFont('helvetica', '', 8);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetTitle('Form Cuti');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('usulan cuti an. .pdf');
    }

    public function index()
    {

        $data = User::orderBy('name', 'ASC')->get();
        return view('cuti.index', compact('data'));
    }


    public function rekap()
    {
        $rekap = Cuti::with(['user'])->get();
        $ttd = Cuti::with(['user'])->first();
        return view('cuti.rekap', compact('rekap', 'ttd'));
    }

    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $result = Cuti::with(['user'])->whereBetween('tgl_awal', [$start_date, $end_date])->get();
        $ttd = Cuti::with(['user'])->whereBetween('tgl_awal', [$start_date, $end_date])->first();

        return view('cuti.rekap', compact('result', 'start_date', 'end_date', 'ttd'));
        // $result = Cuti::with(['user'])->whereDate('tgl_awal','>=',$start_date)->whereDate ('tgl_akhir','<=',$end_date)->get();
        // $result = Cuti::with('user')->whereDate('created_at','>=',$start_date)->whereDate ('created_at','<=',$end_date)->get();
        // $rekap = Cuti:: with(['user'])->get(); 
        // $result = Cuti::whereBetween('created_at', [$start_date->format('Y-m-d')." 00:00:00", $end_date->format('Y-m-d')." 23:59:59"])->get();
        // $result = Cuti::with(['user'])->where('created_at','>=',$start_date)->where('created_at','<=',$end_date)->get();
        // var_dump($result, DB::getQueryLog());
    }

    public function calculateWorkdays(Request $request)
    {

        $libur = Customer::all()->pluck('tgl_libur')->toArray();
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $holidays = $libur;

        $workdays = $this->countWorkdays($startDate, $endDate, $holidays);
    }



    private function countWorkdays($startDate, $endDate, $holidays = [])
    {

        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);

        $end = $end->modify('+1 day'); // Include end date in the range
        $workingDays = 0;

        while ($start < $end) {
            $dayOfWeek = $start->format('N'); // 1 (Monday) to 7 (Sunday)
            $dateString = $start->format('Y-m-d');

            // Check if the day is not Friday (5) or Saturday (6) and not a holiday
            if ($dayOfWeek != 5 && $dayOfWeek != 6 && !in_array($dateString, $holidays)) {
                $workingDays++;
            }

            $start->modify('+1 day');
        }

        // return $workingDays;
        echo $workingDays;
    }

    public function cutipdf(Request $request)
    {

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $result = Cuti::with(['user'])->whereBetween('tgl_awal', [$start_date, $end_date])->orderBy('tgl_awal', 'DESC')->get();
        $ttd = Cuti::with(['user'])->whereBetween('tgl_awal', [$start_date, $end_date])->orderBy('tgl_awal', 'DESC')->first();
        $view = view()->make('cuti.rekap_pdf', compact('result', 'start_date', 'end_date', 'ttd'));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);

        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        $tgl_awal = Carbon::parse($start_date)->format('d-m-Y');
        $tgl_akhir = Carbon::parse($end_date)->format('d-m-Y');

        $pdf::SetTopMargin(10);
        $pdf::setPrintHeader(false);
        $pdf::SetFooterMargin(0);
        $pdf::setPrintFooter(false);
        $pdf::SetFont('zapfdingbats', '', 14);
        $pdf::AddPage('L', 'A4');
        $pdf::SetLeftMargin(30);
        $pdf::SetAutoPageBreak(TRUE, 0);
        $pdf::setCellPaddings(0, '', '', 0);
        $pdf::SetFont('helvetica', '', 10);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetTitle('rekap_cuti');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('rekap_cuti ' . $tgl_awal . ' s.d ' . $tgl_akhir . '.pdf');
    }

    public function kendali($id)
    {


        $pegawai = User::orderBy('name', 'ASC')->get();
        $peg = User::orderBy('name', 'ASC')->first();
        $data = Cuti::with(['user'])->where('id', $id)->get();
        $count = Cuti::where('user_id', '=', $id)->count();
        $cuti = User::with(['cuti'])->where('id', $id)->get();
        $dat = User::withCount(['cuti'])->where('id', $id)->get();
        $libur = Customer::all()->pluck('tgl_libur')->toArray();



        return view('cuti.kendali', compact('cuti', 'pegawai', 'data', 'dat', 'libur', 'count', 'peg'));
    }

    public function kendaliPdf($id)
    {

        $pegawai = User::all();
        $data = Cuti::with(['user'])->where('id', $id)->get();
        $cuti = User::with(['cuti'])->where('id', $id)->get();
        $dat = User::withCount(['cuti'])->where('id', $id)->get();
        $libur = Customer::all()->pluck('tgl_libur')->toArray();
        $count = Cuti::where('user_id', '=', $id)->count();


        $view = view()->make('cuti.kendalipdf', compact('cuti', 'pegawai', 'data', 'dat', 'libur', 'count'));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);

        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        foreach ($cuti as $item) {
            $nama = ($item->name);
        }

        $pdf::SetTopMargin(6);
        $pdf::setPrintHeader(false);
        $pdf::SetFooterMargin(0);
        $pdf::setPrintFooter(false);
        $pdf::SetFont('zapfdingbats', '', 14);
        $pdf::AddPage('L', 'A4');
        $pdf::SetLeftMargin(15);
        $pdf::SetAutoPageBreak(TRUE, 0);
        $pdf::setCellPaddings(0, '', '', 0);
        $pdf::SetFont('helvetica', '', 10);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetTitle('Kartu kendali cuti an. ' . $nama);
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('kendali cuti an.pdf');
    }

    public function form_1(Request $request, Cuti $cuti, $id)
    // public function form_1(  $id)
    {
        $cuti = Cuti::with(['user'])->where('id', $id)->get();
        $user = User::with(['penilai', 'atasan'])->where('id', $id)->get();
        $libur = Customer::all()->pluck('tgl_libur')->toArray();
        $checked = true;

        $riwayat_cuti = $cuti;

        $warna['pending'] = 'bg-warning';
        $warna['rejected'] = 'bg-danger';
        $warna['approved'] = 'bg-success';

        // get jumlah hari
        foreach ($cuti as $hari) {
            $daysToAdd = ($hari->jlh_hari);
            $holidays = $libur;
            $days = [];
            $date = CarbonImmutable::make($hari->tgl_awal);
            $i = 1;

            while ($i <= $daysToAdd) {
                if ($date->isWeekend() or in_array($date->format('Y-m-d'), $holidays)) {
                    $date = $date->addDay();
                    continue;
                }
                $days[] = $date;
                $date = $date->addDay();
                $i++;
            }

            $dates = $days;
            $awal = (min($dates));
            $akhir = (max($dates));
        }

        // jumlah hari libur
        $hitung = count($libur);
        // echo $hitung;

        // get nama hari berikutnya
        foreach ($cuti as $hari) {


            $d = new DateTime($hari->tgl_awal);
            $t = $d->getTimestamp();

            // loop for X days
            for ($i = 0; $i < ($hari->jlh_hari); $i++) {

                // add 1 day to timestamp
                $addDay = 86400;

                // get what day it is next day
                $nextDay = date('w', ($t + $addDay));

                // if it's Saturday or Sunday get $i-1
                if ($nextDay == 0 || $nextDay == 6) {
                    $i--;
                }

                // modify timestamp, add 1 day
                $t = $t + $addDay;
            }

            $d->setTimestamp($t);
            $x = Carbon::parse($d)->translatedFormat('d F Y');
            // echo "Masuk tanggal " .$x;
        }

        // echo $d->format( 'd-m-Y' ). "\n";
        // echo "<br>";
        // echo $x;



        foreach ($cuti as $hari) {
            Carbon::setWeekendDays([Carbon::SUNDAY]);
            $date = Carbon::parse($hari->tgl_awal);
            $tat = ($hari->jlh_hari);
            $tat_date = Carbon::parse($hari->tgl_akhir)->addWeekdays($tat);
            $tat = Carbon::parse($tat_date)->format('d-m-Y');
            // echo $tat;
        }


        foreach ($cuti as $hari) {
            function number_of_working_dates($from, $days)
            {
                $workingDays = [1, 2, 3, 4, 5]; # date format = N (1 = Monday, ...)
                $libur = Customer::all()->pluck('tgl_libur')->toArray();
                $holidayDays = $libur; # variable and fixed holidays
                $cuti = Cuti::all();

                $from = new DateTime($from);
                $dates = [];
                $dates[] = $from->format('Y-m-d');
                while ($days) {
                    $from->modify('+1 day');

                    if (!in_array($from->format('N'), $workingDays)) continue;
                    if (in_array($from->format('Y-m-d'), $holidayDays)) continue;
                    if (in_array($from->format('*-m-d'), $holidayDays)) continue;

                    $dates[] = $from->format('Y-m-d');
                    $days--;
                }
                return $dates;
            }

            $print = (number_of_working_dates($hari->tgl_awal, $hari->jlh_hari - 1));
            usort($print, function ($a, $b) {
                $dateTimestamp1 = strtotime($a);
                $dateTimestamp2 = strtotime($b);

                return $dateTimestamp1 < $dateTimestamp2 ? -1 : 1;
            });

            $date1 = $print[0];
            $date2 = $print[count($print) - 1];
        }



        //..................................................

        foreach ($cuti as $hari) {
            $daysToAdd = ($hari->jlh_hari);
            $holidays = $libur;
            $date = today();
            for ($i = 0; $i <= $daysToAdd; $i++) {
                $date->addDay();
                while ($date->isWeekend()) {
                    $date->addDay();
                }
                while (in_array($date->toDateString(), $holidays)) {
                    $date->addDays($date->isFriday() ? 3 : 1);
                }
            }
            $date = Carbon::parse($date)->translatedFormat('d-m-Y');
        }


        //....................1
        foreach ($cuti as $hari) {
            $holidays = $libur;
            $awal = ($hari->tgl_awal);
            $MyDateCarbon = Carbon::parse($awal);
            $MyDateCarbon->addWeekdays($hari->jlh_hari);
            for ($i = 1; $i <= $hari->jlh_hari; $i++) {
                if (in_array(Carbon::parse($awal)->addWeekdays($i)->toDateString(), $holidays)) {
                    $MyDateCarbon->addDay();
                }
            }
        }
        $final = Carbon::parse($MyDateCarbon)->translatedFormat('d-m-Y');

        //....................2

        if (!function_exists('get_date_using_weekend_count')) {
            function get_date_using_weekend_count($date, $count, $holidays)
            {
                $MyDateCarbon = Carbon::parse($date);
                $MyDateCarbon->addWeekdays($count);
                for ($i = 1; $i <= $count; $i++) {
                    if (in_array(Carbon::parse($date)->addWeekdays($i)->toDateString(), $holidays)) {
                        $MyDateCarbon->addDay();
                    }
                }
                return $MyDateCarbon->toFormattedDateString();
            }
        }

        foreach ($cuti as $hari) {

            $startDate = Carbon::parse($hari->tgl_awal);
            // $endDate = Carbon::parse($hari->tgl_akhir);
            $jlh = ($hari->jlh_hari);

            // $holidays = ["2015-01-01", "2015-01-02"];
            $holidays = $libur;
            $count = $jlh;
            $date = $startDate;
            // dd(get_date_using_weekend_count($date,$count,$holidays));
            $tglmasuk = get_date_using_weekend_count($date, $count, $holidays);
        }


        //....................3

        $period = CarbonPeriod::create('2018-06-14', '2018-06-15');
        // $period = CarbonPeriod::create(array_push($date_array, \Carbon\Carbon::parse($dat["tgl_libur"])->format('Y-m-d')));
        foreach ($period as $date) {
            // echo $date->format('Y-m-d');
        }
        $dates = $period->toArray();



        //....................3.1
        foreach ($cuti as $hari) {


            $dateStrings = $libur;
            $carbonArray = [];
            foreach ($dateStrings as $dateString) {
                $carbonArray[] = Carbon::createFromFormat('Y-m-d', $dateString);
            }
            $holidays = $carbonArray;

            $startDate = Carbon::parse($hari->tgl_awal);
            // $endDate = Carbon::parse($hari->tgl_akhir);
            $jlh = ($hari->jlh_hari);

            // $holidays = ["2015-01-01", "2015-01-02"];
            $perai = $holidays;
            $count = $jlh;
            $date = $startDate;
            // dd(get_date_using_weekend_count($date,$count,$holidays));
            $tgl = get_date_using_weekend_count($date, $count, $perai);
        }


        //....................4
        foreach ($cuti as $hari) {
            $startDate = Carbon::parse($hari->tgl_awal);
            $endDate = Carbon::parse($hari->tgl_akhir);
            $dateStrings = $libur;
            $carbonArray = [];
            foreach ($dateStrings as $dateString) {
                $carbonArray[] = Carbon::createFromFormat('Y-m-d', $dateString);
            }

            $holidays = $carbonArray;
            $hasil = $startDate->diffInDaysFiltered(function (Carbon $date) use ($holidays) {
                return $date->isWeekday() && !in_array($date, $holidays);
            }, $endDate);
        }




        //....................4.2
        foreach ($cuti as $hari) {
            $startDate = Carbon::parse($hari->tgl_awal);
            $endDate = Carbon::parse($hari->tgl_akhir);

            $holidays = [
                Carbon::parse("2024-09-04"),
                Carbon::parse("2024-09-05"),
            ];

            $days = $startDate->diffInDaysFiltered(function (Carbon $date) use ($holidays) {
                return $date->isWeekday() && !in_array($date, $holidays);
            }, $endDate);
        }



        //....................4.3
        foreach ($cuti as $hari) {
            $from = Carbon::parse($hari->tgl_awal);
            $to = Carbon::parse($hari->tgl_akhir);
            $dates = CarbonPeriod::create(
                Carbon::parse($from),
                Carbon::parse($to),
            );
            $dateArray = [];
            foreach ($dates as $date) {
                $dateArray[] = $date->toDateString();
            }
        }


        //....................4.4
        $startDate = Carbon::parse("2024-09-02");
        $endDate = Carbon::parse("2024-09-07");

        $holidays = [
            Carbon::parse("2024-09-03"),
            Carbon::parse("2024-09-04"),
            Carbon::parse("2024-09-04")
        ];


        $days = $startDate->diffInDaysFiltered(function (Carbon $date) use ($holidays) {
            return $date->isWeekday() && !in_array($date, $holidays);
        }, $endDate);

        foreach ($cuti as $hari) {
            $start = Carbon::parse($hari->tgl_awal);
            $end = Carbon::parse($hari->tgl_akhir);
            // $end = new Carbon('2024-09-05');
            $known = collect($libur);


            $days = $start->diffInDaysFiltered(function (Carbon $date) {
                return !($date->isSunday() || $date->isSaturday());
            }, $end);


            $exclude = $known->reject(function ($date) use ($start, $end) {
                $date = Carbon::parse($date);
                if ($date->isSunday() || $date->isSaturday()) {
                    return true;
                }
                return ($date < $start || $date > $end);
            })->count();

            $totaldays = $days - $exclude;
        }

        // return $totaldays;

        foreach ($cuti as $hari) {
            $daysToAdd = ($hari->jlh_hari);
            $holidays = $libur;
            $perai = [];
            $end = Carbon::parse($hari->tgl_akhir);
            $date = CarbonImmutable::make(Carbon::parse($hari->tgl_awal));
            // $date = Carbon::parse($hari->tgl_awal);
            $i = 1;

            while ($i <= $daysToAdd) {
                if ($date->isWeekend() or in_array($date->format('Y-m-d'), $holidays)) {
                    $date = $date->addDay();
                    continue;
                }
                $perai[] = $date;
                $date = $date->addDay();
                $i++;
            }
        }

        return view('cuti.form_1', compact('riwayat_cuti', 'cuti', 'user', 'startDate', 'endDate', 'hasil', 'libur', 'tglmasuk', 'final', 'date', 'date2', 'awal', 'akhir', 'checked', 'warna'));
    }


    public function create()
    {

        $pegawai = User::where('status', '=', 'PNS')->orderBy('name', 'ASC')->get();
        $libur = Customer::all()->pluck('tgl_libur')->toArray();
        $cuti = Cuti::all();

        return view('cuti.add', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $cuti = Cuti::create($request->all());
        return redirect('cuti.index');
    }

    public function edit($id)
    {
        $user = User::all();
        $off = Cuti::with(['user'])->where('id', $id)->get();
        $cuti = Cuti::with('user')->findOrFail($id);
        $libur = Customer::all()->pluck('tgl_libur')->toArray();


        foreach ($off as $hari) {
            $daysToAdd = ($hari->jlh_hari);
            $holidays = $libur;
            $days = [];
            $date = CarbonImmutable::make($hari->tgl_awal);
            $i = 1;

            while ($i <= $daysToAdd) {
                if ($date->isWeekend() or in_array($date->format('Y-m-d'), $holidays)) {
                    $date = $date->addDay();
                    continue;
                }
                $days[] = $date;
                $date = $date->addDay();
                $i++;
            }
            $dates = $days;
            $awal = (min($dates));
            $akhir = (max($dates));
        }

        foreach ($off as $hari) {
            function numberdate($from, $days)
            {
                $workingDays = [1, 2, 3, 4, 5]; # date format = N (1 = Monday, ...)
                $libur = Customer::all()->pluck('tgl_libur')->toArray();
                $holidayDays = $libur; # variable and fixed holidays

                $from = new DateTime($from);
                $dates = [];
                $dates[] = $from->format('Y-m-d');
                while ($days) {
                    $from->modify('+1 day');

                    if (!in_array($from->format('N'), $workingDays)) continue;
                    if (in_array($from->format('Y-m-d'), $holidayDays)) continue;
                    if (in_array($from->format('*-m-d'), $holidayDays)) continue;

                    $dates[] = $from->format('Y-m-d');
                    $days--;
                }
                return $dates;
            }

            $print = (numberdate($hari->tgl_awal, $hari->jlh_hari - 1));
            usort($print, function ($a, $b) {
                $dateTimestamp1 = strtotime($a);
                $dateTimestamp2 = strtotime($b);

                return $dateTimestamp1 < $dateTimestamp2 ? -1 : 1;
            });

            $date1 = $print[0];
            $date2 = $print[count($print) - 1];
        }


        foreach ($off as $hari) {
            $daysToAdd = ($hari->jlh_hari);
            $holidays = $libur;
            $date = today();
            for ($i = 0; $i < $daysToAdd; $i++) {
                $date->addDay($hari->tgl_awal);
                while ($date->isWeekend()) {
                    $date->addDay();
                }
                while (in_array($date->toDateString(), $holidays)) {
                    $date->addDays($date->isFriday() ? 3 : 1);
                }
            }
        }
        $date = Carbon::parse($date)->translatedFormat('d-m-Y');


        //.......................................................................

        $holidays = $libur;
        foreach ($off as $hari) {
            $date = ($hari->tgl_awal);
            $MyDateCarbon = Carbon::parse($date);
            $MyDateCarbon->addWeekdays($hari->jlh_hari);
            for ($i = 1; $i <= 3; $i++) {
                if (in_array(Carbon::parse($date)->addWeekdays($i)->toDateString(), $holidays)) {
                    $MyDateCarbon->addDay();
                }
            }
        }
        $final = Carbon::parse($MyDateCarbon)->translatedFormat('d-m-Y');


        //.......................................................................
        if (!function_exists('get_date_using_weekend_count')) {
            function get_date_using_weekend_count($date, $count, $holidays)
            {
                $MyDateCarbon = Carbon::parse($date);
                $MyDateCarbon->addWeekdays($count);
                for ($i = 1; $i <= $count; $i++) {
                    if (in_array(Carbon::parse($date)->addWeekdays($i)->toDateString(), $holidays)) {
                        $MyDateCarbon->addDay();
                    }
                }
                return $MyDateCarbon->toFormattedDateString();
            }
        }

        foreach ($off as $hari) {

            $startDate = Carbon::parse($hari->tgl_awal);
            $endDate = Carbon::parse($hari->tgl_akhir);
            $jlh = ($hari->jlh_hari);

            // $holidays = ["2015-01-01", "2015-01-02"];
            $holidays = $libur;
            $count = $jlh;
            $date = $startDate;
            // dd(get_date_using_weekend_count($date,$count,$holidays));
            $tglmasuk = get_date_using_weekend_count($date, $count, $holidays);
            // return $tglmasuk;
        }
        return view('cuti.edit', compact('cuti', 'user', 'count', 'tglmasuk', 'final', 'date', 'off', 'date2', 'awal', 'akhir'));
    }

    public function update($id, Request $request)
    {
        $data = Cuti::findOrFail($id);
        $data->update($request->all());

        return redirect('cuti.index');
    }

    public function delete($id)
    {
        Cuti::findOrFail($id);
    }

    public function destroy($id)
    {
        $data = Cuti::findOrFail($id);
        $data->delete();
        return redirect('cuti.index');
    }

    public function form_2($id)
    {

        $cuti = Cuti::with(['user'])->where('id', $id)->get();
        $user = User::with(['penilai', 'atasan'])->where('id', $id)->get();
        $libur = Customer::all()->pluck('tgl_libur')->toArray();

        if (!function_exists('get_date_using_weekend_count')) {
            function get_date_using_weekend_count($date, $count, $holidays)
            {
                $MyDateCarbon = Carbon::parse($date);
                $MyDateCarbon->addWeekdays($count);
                for ($i = 1; $i <= $count; $i++) {
                    if (in_array(Carbon::parse($date)->addWeekdays($i)->toDateString(), $holidays)) {
                        $MyDateCarbon->addDay();
                    }
                }
                return $MyDateCarbon->toFormattedDateString();
            }
        }

        foreach ($cuti as $hari) {

            $startDate = Carbon::parse($hari->tgl_awal);
            // $endDate = Carbon::parse($hari->tgl_akhir);
            $jlh = ($hari->jlh_hari);

            // $holidays = ["2015-01-01", "2015-01-02"];
            $holidays = $libur;
            $count = $jlh;
            $date = $startDate;
            // dd(get_date_using_weekend_count($date,$count,$holidays));
            $tglmasuk = get_date_using_weekend_count($date, $count, $holidays);
            // return $tglmasuk;
        }
        return view('cuti.form_2', compact('cuti', 'user', 'tglmasuk'));
    }

    public function sementara($id)
    {
        $cuti = Cuti::with(['user'])->where('id', $id)->get();
        $user = User::with(['penilai', 'atasan'])->where('id', $id)->get();
        $cuti = Cuti::with(['user'])->where('id', $id)->get();
        $user = User::with(['penilai', 'atasan'])->where('id', $id)->get();
        $libur = Customer::all()->pluck('tgl_libur')->toArray();

        // get jumlah hari
        foreach ($cuti as $hari) {
            $daysToAdd = ($hari->jlh_hari);
            $holidays = $libur;
            $days = [];
            $date = CarbonImmutable::make($hari->tgl_awal);
            $i = 1;

            while ($i <= $daysToAdd) {
                if ($date->isWeekend() or in_array($date->format('Y-m-d'), $holidays)) {
                    $date = $date->addDay();
                    continue;
                }
                $days[] = $date;
                $date = $date->addDay();
                $i++;
            }
            $dates = $days;
            $awal = (min($dates));
            $akhir = (max($dates));
        }


        foreach ($cuti as $hari) {
            $startDate = Carbon::parse($hari->tgl_awal);
            $endDate = Carbon::parse($hari->tgl_akhir);
            $holidays = [
                Carbon::parse("2023-09-02"),
                Carbon::parse("2023-09-03"),
            ];
            $days = $startDate->diffInDaysFiltered(function (Carbon $date) use ($holidays) {
                return $date->isWeekday() && !in_array($date, $holidays);
            }, $endDate);
        }
        return view('cuti.sementara', compact('cuti', 'user', 'startDate', 'endDate', 'days', 'awal', 'akhir'));
    }

    public function approveCutiDB(Request $request, Cuti $cuti)
    {
        $cuti->no_surat != '';
        $cuti->save();

        return redirect()
            ->route('form_1', [$cuti->id])
            ->with([
                'status' => 'Cuti Approved!'
            ]);
    }
}
