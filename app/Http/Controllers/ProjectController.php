<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Rk;
use App\Models\Sdm;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Tugas;
use App\Models\Project;
use App\Models\Tupoksi;
use Illuminate\Http\Request;
use App\Models\Tupoksi_tugas;
use GuzzleHttp\Handler\Proxy;
use Elibyy\TCPDF\Facades\TCPDF;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Auth\Events\Validated;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;

class ProjectController extends Controller
{
    public function index()
    {

        $pegawai = User::where('status', '!=', 'P3K')->where('status', '!=', 'honor')->orderBy('name', 'ASC')->get();
        $p3k = User::where('status', 'P3K')->get();

        // use Carbon\Carbon;

        // Assuming you have start and end dates stored in variables
        $startDate = Carbon::parse('2024-10-01');
        $endDate = Carbon::parse('2024-10-31');
        // Array of holiday dates
        $holidays = ['2024-10-12', '2024-10-26'];
        // Calculate days excluding weekends
        $workDays = $startDate->diffInDaysFiltered(function (Carbon $date) {
            return !$date->isWeekend();
        }, $endDate);

        // Filter out holidays from the calculated workdays
        foreach ($holidays as $holiday) {
            $holidayDate = Carbon::parse($holiday);
            if ($holidayDate->between($startDate, $endDate) && !$holidayDate->isWeekend()) {
                $workDays--;
            }
        }

        // dd ($workDays);
        // $workDays now contains the count of days excluding weekends and specified holidays
        $honor = User::where('status', 'honor')->get();

        return view('pegawai.index', compact('pegawai', 'p3k', 'honor'));
    }

    public function all()
    {
        $all = User::where('name', '!=', 'Ullfah Kharisma')->orderBy('name', 'ASC')->paginate(9);
        $mapel = Mapel::all();
        // $all = User::where('name','=','Eka Primiyanti, S.Pd')->get();
        // $mapel = ['mapel'];
        return view('pegawai.all', compact('all', 'mapel'));
    }

    public function allpdf()
    {
        $all = User::where('name', '!=', 'Ullfah Kharisma')->paginate(20);
        $mapel = Mapel::all();

        $view = view()->make('pegawai.allpdf', compact('all', 'mapel'));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);


        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        $pdf::SetFont('zapfdingbats', '', 14);
        $pdf::setCellPaddings(0, 0, 0, 0);
        $pdf::AddPage('L', 'A4');
        $pdf::setCellPaddings(0, '', '', 0);
        $pdf::SetFont('Helvetica', '', 9.5);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetLeftMargin(30);
        $pdf::SetTopMargin(5);
        $pdf::SetTitle('allpdf');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('allpdf. .pdf');
    }


    public function usulanapbd()
    {
        $apbdgtt = User::where('status', '=', 'honor')->where('jabatan', '=', 'GTT')->where('sumber_gaji', '=', 'APBD')->get();
        $apbdptt = User::where('status', '=', 'honor')->where('jabatan', '=', 'PTT')->where('sumber_gaji', '=', 'APBD')->get();
        return view('pegawai.usulan.usulanapbd', compact('apbdgtt', 'apbdptt'));
    }

    public function usulanapbn()
    {
        $apbngtt = User::where('status', '=', 'honor')->where('jabatan', '=', 'GTT')->where('sumber_gaji', '=', 'APBN')->get();
        $apbnptt = User::where('status', '=', 'honor')->where('jabatan', '=', 'PTT')->where('sumber_gaji', '=', 'APBN')->get();
        return view('pegawai.usulan.usulanapbn', compact('apbngtt', 'apbnptt'));
    }

    public function usulanipp()
    {
        $ippptt = User::where('status', '=', 'honor')->where('jabatan', '=', 'PTT')->where('sumber_gaji', '=', 'IPP')->get();
        return view('pegawai.usulan.usulanipp', compact('ippptt'));
    }

    public function pergaji()
    {
        $apbd = User::where('status', '=', 'honor')->where('sumber_gaji', '=', 'APBD')->get();
        $apbn = User::where('status', '=', 'honor')->where('sumber_gaji', '=', 'APBN')->get();
        $ipp = User::where('status', '=', 'honor')->where('sumber_gaji', '=', 'IPP')->get();
        return view('pegawai.pergaji', compact('apbd', 'apbn', 'ipp'));
    }
    public function pergajipdf()
    {
        $gttapbd = User::where('jabatan', '=', 'GTT')->where('sumber_gaji', '=', 'APBD')->count();
        $gttapbn = User::where('jabatan', '=', 'GTT')->where('sumber_gaji', '=', 'APBN')->count();
        $gttipp = User::where('jabatan', '=', 'GTT')->where('sumber_gaji', '=', 'IPP')->count();
        $pttapbd = User::where('jabatan', '=', 'PTT')->where('sumber_gaji', '=', 'APBD')->count();
        $pttapbn = User::where('jabatan', '=', 'PTT')->where('sumber_gaji', '=', 'APBN')->count();
        $pttipp = User::where('jabatan', '=', 'PTT')->where('sumber_gaji', '=', 'IPP')->count();
        $view = view()->make('pegawai.pergajipdf', compact('gttapbd', 'gttapbn', 'gttipp', 'pttapbd', 'pttapbn', 'pttipp'));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);


        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        $pdf::SetFont('zapfdingbats', '', 14);
        $pdf::setCellPaddings(0, 0, 0, 0);
        $pdf::AddPage('L', 'A4');
        $pdf::setCellPaddings(0, '', '', 0);
        $pdf::SetFont('Helvetica', '', 9.5);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetLeftMargin(30);
        $pdf::SetTopMargin(5);
        $pdf::SetTitle('pergajipdf');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('pergajipdf. .pdf');
    }

    public function tabel()
    {

        $pns = User::where('status', '!=', 'honor')->where('status', '!=', 'P3K')->orderBy('name', 'ASC')->get();
        $p3k = User::where('status', '=', 'P3K')->orderBy('name', 'ASC')->get();
        $honor = User::where('status', '=', 'honor')->orderBy('tmt_pangkat', 'ASC')->get();
        return view('pegawai.tabel', compact('pns', 'p3k', 'honor'));
    }

    public function tabelPdf()
    {

        $pns = User::where('unit_kerja', '=', 'SMK Negeri 1 Koba')->where('pangkat_gol', '!=', 'IX')->orderBy('nip', 'ASC')->get();
        $p3k = User::where('unit_kerja', '=', 'SMK Negeri 1 Koba')->where('pangkat_gol', '=', 'IX')->orderBy('nip', 'ASC')->get();
        $honor = User::where('status', '=', 'honor')->orderBy('tmt_pangkat', 'ASC')->get();

        $view = view()->make('pegawai.tabelpdf', compact('pns', 'p3k', 'honor'));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);


        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        $pdf::SetFont('zapfdingbats', '', 14);
        $pdf::setCellPaddings(0, 0, 0, 0);
        $pdf::AddPage('L', 'A4');
        $pdf::setCellPaddings(0, '', '', 0);
        $pdf::SetFont('Helvetica', '', 9.5);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetLeftMargin(30);
        $pdf::SetTopMargin(5);
        $pdf::SetTitle('Tabelpdf');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('tabel_pegawai. .pdf');
        // $pdf::Cell(30, 0, 'Center-Center', 1, $ln=0, 'C', 0, '', 0, false, 'C', 'C');
    }

    public function jekel()
    {
        $pnsguru = User::where('status', '=', 'PNS')->orderBy('nip', 'ASC')->where('jenis', '=', 'GURU')->count();
        $pnstu = User::where('status', '=', 'PNS')->orderBy('nip', 'ASC')->where('jenis', '=', 'TU')->count();
        $p3k = User::where('status', '=', 'P3K')->orderBy('nip', 'ASC')->count();
        $gtt = User::where('jabatan', '=', 'GTT')->count();
        $ptt = User::where('jabatan', '=', 'PTT')->count();
        $gttapbd = User::where('jabatan', '=', 'GTT')->where('sumber_gaji', '=', 'APBD')->count();
        $gttapbn = User::where('jabatan', '=', 'GTT')->where('sumber_gaji', '=', 'APBN')->count();
        $gttipp = User::where('jabatan', '=', 'GTT')->where('sumber_gaji', '=', 'IPP')->count();
        $pttapbd = User::where('jabatan', '=', 'PTT')->where('sumber_gaji', '=', 'APBD')->count();
        $pttapbn = User::where('jabatan', '=', 'PTT')->where('sumber_gaji', '=', 'APBN')->count();
        $pttipp = User::where('jabatan', '=', 'PTT')->where('sumber_gaji', '=', 'IPP')->count();

        return view('pegawai.jekel', compact('pnsguru', 'p3k', 'gtt', 'pnstu', 'ptt', 'gttapbd', 'gttapbn', 'gttipp', 'pttapbd', 'pttapbn', 'pttipp'));
    }


    public function jekelpdf()
    {

        $pnsguru = User::where('status', '=', 'PNS')->orderBy('nip', 'ASC')->where('jenis', '=', 'GURU')->count();
        $pnstu = User::where('status', '=', 'PNS')->orderBy('nip', 'ASC')->where('jenis', '=', 'TU')->count();
        $p3k = User::where('status', '=', 'P3K')->orderBy('nip', 'ASC')->count();
        $gtt = User::where('jabatan', '=', 'GTT')->count();
        $ptt = User::where('jabatan', '=', 'PTT')->count();
        $gttapbd = User::where('jabatan', '=', 'GTT')->where('sumber_gaji', '=', 'APBD')->count();
        $gttapbn = User::where('jabatan', '=', 'GTT')->where('sumber_gaji', '=', 'APBN')->count();
        $gttipp = User::where('jabatan', '=', 'GTT')->where('sumber_gaji', '=', 'IPP')->count();
        $pttapbd = User::where('jabatan', '=', 'PTT')->where('sumber_gaji', '=', 'APBD')->count();
        $pttapbn = User::where('jabatan', '=', 'PTT')->where('sumber_gaji', '=', 'APBN')->count();
        $pttipp = User::where('jabatan', '=', 'PTT')->where('sumber_gaji', '=', 'IPP')->count();

        $view = view()->make('pegawai.jekelpdf', compact('pnsguru', 'p3k', 'gtt', 'pnstu', 'ptt', 'gttapbd', 'gttapbn', 'gttipp', 'pttapbd', 'pttapbn', 'pttipp'));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);


        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        $pdf::SetFont('zapfdingbats', '', 14);
        $pdf::setCellPaddings(0, 0, 0, 0);
        $pdf::AddPage('L', 'A4');
        $pdf::setCellPaddings(0, '', '', 0);
        $pdf::SetFont('Helvetica', '', 9.5);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetLeftMargin(30);
        $pdf::SetTopMargin(5);
        $pdf::SetTitle('jekelpdf');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('jekelpdf. .pdf');
    }
    public function rekapPdf()
    {

        $pnsgurulaki = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '!=', 'IX')->count();
        $p3kgurulaki = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'IX')->count();
        $honorgurulaki = User::where('jenis', '=', 'GURU')->where('status', '=', 'honor')->where('jk', '=', 'Laki-Laki')->count();

        $pnstulaki = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '!=', 'IX')->count();
        $p3ktulaki = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'IX')->count();
        $honortulaki = User::where('jenis', '=', 'TU')->where('status', '=', 'honor')->where('jk', '=', 'Laki-Laki')->count();

        $pnsgurupr = User::where('jenis', '=', 'GURU')->where('jk', '=', 'perempuan')->where('pangkat_gol', '!=', 'IX')->count();
        $p3kgurupr = User::where('jenis', '=', 'GURU')->where('jk', '=', 'perempuan')->where('pangkat_gol', '=', 'IX')->count();
        $honorgurupr = User::where('jenis', '=', 'GURU')->where('status', '=', 'honor')->where('jk', '=', 'perempuan')->count();

        $pnstupr = User::where('jenis', '=', 'TU')->where('jk', '=', 'perempuan')->where('pangkat_gol', '!=', 'IX')->count();
        $p3ktupr = User::where('jenis', '=', 'TU')->where('jk', '=', 'perempuan')->where('pangkat_gol', '=', 'IX')->count();
        $honortupr = User::where('jenis', '=', 'TU')->where('status', '=', 'honor')->where('jk', '=', 'perempuan')->count();

        $jlhp3k = ($p3kgurulaki + $p3kgurupr + $p3ktulaki + $p3ktupr);
        $jlhhonor = ($honorgurulaki + $honorgurupr + $honortulaki + $honortupr);
        $jlhpns = ($pnsgurulaki + $pnsgurupr + $pnstulaki + $pnstupr);
        $total = ($jlhp3k + $jlhpns + $jlhhonor);

        $pnsgurud1 = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'D1')->where('pangkat_gol', '!=', 'IX')->count();
        $pnstud1 = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'D1')->where('pangkat_gol', '!=', 'IX')->count();
        $p3kd1 = User::where('pendidikan', '=', 'D1')->where('pangkat_gol', '=', 'IX')->count();
        $honord1 = User::where('pendidikan', '=', 'D1')->where('status', '=', 'honor')->count();

        $pnsgurud2 = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'D2')->where('pangkat_gol', '!=', 'IX')->count();
        $pnstud2 = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'D2')->where('pangkat_gol', '!=', 'IX')->count();
        $p3kd2 = User::where('pendidikan', '=', 'D2')->where('pangkat_gol', '=', 'IX')->count();
        $honord2 = User::where('pendidikan', '=', 'D2')->where('status', '=', 'honor')->count();

        $pnsgurud3 = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'D3')->where('pangkat_gol', '!=', 'IX')->count();
        $pnstud3 = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'D3')->where('pangkat_gol', '!=', 'IX')->count();
        $p3kd3 = User::where('pendidikan', '=', 'D3')->where('pangkat_gol', '=', 'IX')->count();
        $honord3 = User::where('pendidikan', '=', 'D3')->where('status', '=', 'honor')->count();

        $pnsgurud4 = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'D4')->where('pangkat_gol', '!=', 'IX')->count();
        $pnstud4 = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'D4')->where('pangkat_gol', '!=', 'IX')->count();
        $p3kd4 = User::where('pendidikan', '=', 'D4')->where('pangkat_gol', '=', 'IX')->count();
        $honord4 = User::where('pendidikan', '=', 'D4')->where('status', '=', 'honor')->count();

        $pnsgurus1 = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'S1')->where('pangkat_gol', '!=', 'IX')->count();
        $pnstus1 = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'S1')->where('pangkat_gol', '!=', 'IX')->count();
        $p3ks1 = User::where('pendidikan', '=', 'S1')->where('pangkat_gol', '=', 'IX')->count();
        $honors1 = User::where('pendidikan', '=', 'S1')->where('status', '=', 'honor')->count();

        $pnsgurus2 = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'S2')->where('pangkat_gol', '!=', 'IX')->count();
        $pnstus2 = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'S2')->where('pangkat_gol', '!=', 'IX')->count();
        $p3ks2 = User::where('pendidikan', '=', 'S2')->where('pangkat_gol', '=', 'IX')->count();
        $honors2 = User::where('pendidikan', '=', 'S2')->where('status', '=', 'honor')->count();

        $pnsgurus3 = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'S3')->where('pangkat_gol', '!=', 'IX')->count();
        $pnstus3 = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'S3')->where('pangkat_gol', '!=', 'IX')->count();
        $p3ks3 = User::where('pendidikan', '=', 'S3')->where('pangkat_gol', '=', 'IX')->count();
        $honors3 = User::where('pendidikan', '=', 'S3')->where('status', '=', 'honor')->count();

        $pnsguruslta = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'SLTA')->where('pangkat_gol', '!=', 'IX')->count();
        $pnstuslta = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'SLTA')->where('pangkat_gol', '!=', 'IX')->count();
        $p3kslta = User::where('pendidikan', '=', 'SLTA')->where('pangkat_gol', '=', 'IX')->count();
        $honorslta = User::where('pendidikan', '=', 'SLTA')->where('status', '=', 'honor')->count();

        $pnsgurusltp = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'SLTP')->where('pangkat_gol', '!=', 'IX')->count();
        $pnstusltp = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'SLTP')->where('pangkat_gol', '!=', 'IX')->count();
        $p3ksltp = User::where('pendidikan', '=', 'SLTP')->where('pangkat_gol', '=', 'IX')->count();
        $honorsltp = User::where('pendidikan', '=', 'SLTP')->where('status', '=', 'honor')->count();

        $golgurupnslaki2a = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur Muda, II/a')->count();
        $golgurupnslaki2b = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur Muda TK.I, II/b')->count();
        $golgurupnslaki2c = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur, II/c')->count();
        $golgurupnslaki2d = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur TK.I, II/d')->count();
        $golgurupnslaki3a = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata Muda , III/a')->count();
        $golgurupnslaki3b = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata Muda TK.I, III/b')->count();
        $golgurupnslaki3c = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata, III/c')->count();
        $golgurupnslaki3d = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata TK.I, III/d')->count();
        $golgurupnslaki4a = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina, IV/a')->count();
        $golgurupnslaki4b = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina TK.I, IV/b')->count();
        $golgurupnslaki4c = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina Utama Muda, IV/c')->count();
        $golgurupnslaki4d = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina Utama Madya, IV/d')->count();
        $totalgurupnslaki = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '!=', 'IX')->count();

        $golgurupnspr2a = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur Muda, II/a')->count();
        $golgurupnspr2b = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur Muda TK.I, II/b')->count();
        $golgurupnspr2c = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur, II/c')->count();
        $golgurupnspr2d = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur TK.I, II/d')->count();
        $golgurupnspr3a = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata Muda , III/a')->count();
        $golgurupnspr3b = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata Muda TK.I, III/b')->count();
        $golgurupnspr3c = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata, III/c')->count();
        $golgurupnspr3d = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata TK.I, III/d')->count();
        $golgurupnspr4a = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina, IV/a')->count();
        $golgurupnspr4b = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina TK.I, IV/b')->count();
        $golgurupnspr4c = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina Utama Muda, IV/c')->count();
        $golgurupnspr4d = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina Utama Madya, IV/d')->count();
        $totalgurupnspr = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '!=', 'IX')->count();

        $golTUpnslaki2a = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur Muda, II/a')->count();
        $golTUpnslaki2b = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur Muda TK.I, II/b')->count();
        $golTUpnslaki2c = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur, II/c')->count();
        $golTUpnslaki2d = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur TK.I, II/d')->count();
        $golTUpnslaki3a = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata Muda , III/a')->count();
        $golTUpnslaki3b = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata Muda TK.I, III/b')->count();
        $golTUpnslaki3c = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata, III/c')->count();
        $golTUpnslaki3d = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata TK.I, III/d')->count();
        $golTUpnslaki4a = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina, IV/a')->count();
        $golTUpnslaki4b = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina TK.I, IV/b')->count();
        $golTUpnslaki4c = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina Utama Muda, IV/c')->count();
        $golTUpnslaki4d = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina Utama Madya, IV/d')->count();
        $totalTUpnslaki = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '!=', 'IX')->count();

        $golTUpnspr2a = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur Muda, II/a')->count();
        $golTUpnspr2b = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur Muda TK.I, II/b')->count();
        $golTUpnspr2c = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur, II/c')->count();
        $golTUpnspr2d = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur TK.I, II/d')->count();
        $golTUpnspr3a = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata Muda , III/a')->count();
        $golTUpnspr3b = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata Muda TK.I, III/b')->count();
        $golTUpnspr3c = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata, III/c')->count();
        $golTUpnspr3d = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata TK.I, III/d')->count();
        $golTUpnspr4a = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina, IV/a')->count();
        $golTUpnspr4b = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina TK.I, IV/b')->count();
        $golTUpnspr4c = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina Utama Muda, IV/c')->count();
        $golTUpnspr4d = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina Utama Madya, IV/d')->count();
        $totalTUpnspr = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '!=', 'IX')->count();

        $golP3Klaki2a = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur Muda, II/a')->count();
        $golP3Klaki2b = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur Muda TK.I, II/b')->count();
        $golP3Klaki2c = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur, II/c')->count();
        $golP3Klaki2d = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur TK.I, II/d')->count();
        $golP3Klaki3a = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata Muda , III/a')->count();
        $golP3Klaki3b = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata Muda TK.I, III/b')->count();
        $golP3Klaki3c = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata, III/c')->count();
        $golP3Klaki3d = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata TK.I, III/d')->count();
        $golP3Klaki4a = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina, IV/a')->count();
        $golP3Klaki4b = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina TK.I, IV/b')->count();
        $golP3Klaki4c = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina Utama Muda, IV/c')->count();
        $golP3Klaki4d = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina Utama Madya, IV/d')->count();
        $totalP3Klaki = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'IX')->count();

        $golP3Kpr2a = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur Muda, II/a')->count();
        $golP3Kpr2b = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur Muda TK.I, II/b')->count();
        $golP3Kpr2c = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur, II/c')->count();
        $golP3Kpr2d = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur TK.I, II/d')->count();
        $golP3Kpr3a = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata Muda , III/a')->count();
        $golP3Kpr3b = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata Muda TK.I, III/b')->count();
        $golP3Kpr3c = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata, III/c')->count();
        $golP3Kpr3d = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata TK.I, III/d')->count();
        $golP3Kpr4a = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina, IV/a')->count();
        $golP3Kpr4b = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina TK.I, IV/b')->count();
        $golP3Kpr4c = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina Utama Muda, IV/c')->count();
        $golP3Kpr4d = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina Utama Madya, IV/d')->count();
        $totalP3Kpr = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'IX')->count();



        $view = view()->make('pegawai.rekappdf', compact('honord1', 'p3kd1', 'pnstud1', 'pnsgurud1', 'total', 'jlhp3k', 'jlhhonor', 'jlhpns', 'pnsgurulaki', 'p3kgurulaki', 'honorgurulaki', 'pnstulaki', 'p3ktulaki', 'honortulaki', 'pnsgurupr', 'p3kgurupr', 'honorgurupr', 'pnstupr', 'p3ktupr', 'honortupr', 'pnsgurud2', 'pnstud2', 'p3kd2', 'honord2', 'pnsgurud3', 'pnstud3', 'p3kd3', 'honord3', 'pnsgurud4', 'pnstud4', 'p3kd4', 'honord4', 'pnsgurus1', 'pnstus1', 'p3ks1', 'honors1', 'pnsgurus2', 'pnstus2', 'p3ks2', 'honors2', 'pnsgurus3', 'pnstus3', 'p3ks3', 'honors3', 'honorslta', 'pnsguruslta', 'pnstuslta', 'p3kslta', 'honorslta', 'pnsgurusltp', 'pnstusltp', 'p3ksltp', 'honorsltp', 'golgurupnslaki2a', 'golgurupnslaki2b', 'golgurupnslaki2c', 'golgurupnslaki2d', 'golgurupnslaki3a', 'golgurupnslaki3b', 'golgurupnslaki3c', 'golgurupnslaki3d', 'golgurupnslaki4a', 'golgurupnslaki4b', 'golgurupnslaki4c', 'golgurupnslaki4d', 'golgurupnspr2a', 'golgurupnspr2b', 'golgurupnspr2c', 'golgurupnspr2d', 'golgurupnspr3a', 'golgurupnspr3b', 'golgurupnspr3c', 'golgurupnspr3d', 'golgurupnspr4a', 'golgurupnspr4b', 'golgurupnspr4c', 'golgurupnspr4d', 'totalgurupnslaki', 'totalgurupnspr', 'golTUpnslaki2a', 'golTUpnslaki2b', 'golTUpnslaki2c', 'golTUpnslaki2d', 'golTUpnslaki3a', 'golTUpnslaki3b', 'golTUpnslaki3c', 'golTUpnslaki3d', 'golTUpnslaki4a', 'golTUpnslaki4b', 'golTUpnslaki4c', 'golTUpnslaki4d', 'golTUpnspr2a', 'golTUpnspr2b', 'golTUpnspr2c', 'golTUpnspr2d', 'golTUpnspr3a', 'golTUpnspr3b', 'golTUpnspr3c', 'golTUpnspr3d', 'golTUpnspr4a', 'golTUpnspr4b', 'golTUpnspr4c', 'golTUpnspr4d', 'totalTUpnslaki', 'totalTUpnspr', 'golP3Klaki2a', 'golP3Klaki2b', 'golP3Klaki2c', 'golP3Klaki2d', 'golP3Klaki3a', 'golP3Klaki3b', 'golP3Klaki3c', 'golP3Klaki3d', 'golP3Klaki4a', 'golP3Klaki4b', 'golP3Klaki4c', 'golP3Klaki4d', 'golP3Kpr2a', 'golP3Kpr2b', 'golP3Kpr2c', 'golP3Kpr2d', 'golP3Kpr3a', 'golP3Kpr3b', 'golP3Kpr3c', 'golP3Kpr3d', 'golP3Kpr4a', 'golP3Kpr4b', 'golP3Kpr4c', 'golP3Kpr4d', 'totalP3Klaki', 'totalP3Kpr',));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);


        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        $pdf::SetFont('zapfdingbats', '', 14);
        $pdf::AddPage('L', 'A4');
        $pdf::setCellPaddings(0, '', '', 0);
        $pdf::SetFont('Helvetica', '', 9.5);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetLeftMargin(20);
        $pdf::SetTitle('RekapPdf');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('tabel_rekap. .pdf');
    }

    public function tabelrekap()
    {

        $pnsgurulaki = User::where('jenis', '=', 'GURU')->where('status', '=', 'PNS')->where('jk', '=', 'Laki-Laki')->count();
        $p3kgurulaki = User::where('jenis', '=', 'GURU')->where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->count();
        $honorgurulaki = User::where('jenis', '=', 'GURU')->where('status', '=', 'honor')->where('jk', '=', 'Laki-Laki')->count();

        $pnstulaki = User::where('jenis', '=', 'TU')->where('status', '=', 'PNS')->where('jk', '=', 'Laki-Laki')->count();
        $p3ktulaki = User::where('jenis', '=', 'TU')->where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->count();
        $honortulaki = User::where('jenis', '=', 'TU')->where('status', '=', 'honor')->where('jk', '=', 'Laki-Laki')->count();

        $pnsgurupr = User::where('jenis', '=', 'GURU')->where('status', '=', 'PNS')->where('jk', '=', 'perempuan')->count();
        $p3kgurupr = User::where('jenis', '=', 'GURU')->where('status', '=', 'P3K')->where('jk', '=', 'perempuan')->count();
        $honorgurupr = User::where('jenis', '=', 'GURU')->where('status', '=', 'honor')->where('jk', '=', 'perempuan')->count();

        $pnstupr = User::where('jenis', '=', 'TU')->where('status', '=', 'PNS')->where('jk', '=', 'perempuan')->count();
        $p3ktupr = User::where('jenis', '=', 'TU')->where('status', '=', 'P3K')->where('jk', '=', 'perempuan')->count();
        $honortupr = User::where('jenis', '=', 'TU')->where('status', '=', 'honor')->where('jk', '=', 'perempuan')->count();

        $jlhp3k = ($p3kgurulaki + $p3kgurupr + $p3ktulaki + $p3ktupr);
        $jlhhonor = ($honorgurulaki + $honorgurupr + $honortulaki + $honortupr);
        $jlhpns = ($pnsgurulaki + $pnsgurupr + $pnstulaki + $pnstupr);
        $total = ($jlhp3k + $jlhpns + $jlhhonor);

        $pnsgurud1 = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'D1')->where('status', '=', 'PNS')->count();
        $pnstud1 = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'D1')->where('status', '=', 'PNS')->count();
        $p3kd1 = User::where('pendidikan', '=', 'D1')->where('pangkat_gol', '=', 'IX')->count();
        $honord1 = User::where('pendidikan', '=', 'D1')->where('status', '=', 'honor')->count();

        $pnsgurud2 = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'D2')->where('status', '=', 'PNS')->count();
        $pnstud2 = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'D2')->where('status', '=', 'PNS')->count();
        $p3kd2 = User::where('pendidikan', '=', 'D2')->where('pangkat_gol', '=', 'IX')->count();
        $honord2 = User::where('pendidikan', '=', 'D2')->where('status', '=', 'honor')->count();

        $pnsgurud3 = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'D3')->where('status', '=', 'PNS')->count();
        $pnstud3 = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'D3')->where('status', '=', 'PNS')->count();
        $p3kd3 = User::where('pendidikan', '=', 'D3')->where('pangkat_gol', '=', 'IX')->count();
        $honord3 = User::where('pendidikan', '=', 'D3')->where('status', '=', 'honor')->count();

        $pnsgurud4 = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'D4')->where('status', '=', 'PNS')->count();
        $pnstud4 = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'D4')->where('status', '=', 'PNS')->count();
        $p3kd4 = User::where('pendidikan', '=', 'D4')->where('pangkat_gol', '=', 'IX')->count();
        $honord4 = User::where('pendidikan', '=', 'D4')->where('status', '=', 'honor')->count();

        $pnsgurus1 = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'S1')->where('status', '=', 'PNS')->count();
        $pnstus1 = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'S1')->where('status', '=', 'PNS')->count();
        $p3ks1 = User::where('pendidikan', '=', 'S1')->where('pangkat_gol', '=', 'IX')->count();
        $honors1 = User::where('pendidikan', '=', 'S1')->where('status', '=', 'honor')->count();

        $pnsgurus2 = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'S2')->where('status', '=', 'PNS')->count();
        $pnstus2 = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'S2')->where('status', '=', 'PNS')->count();
        $p3ks2 = User::where('pendidikan', '=', 'S2')->where('pangkat_gol', '=', 'IX')->count();
        $honors2 = User::where('pendidikan', '=', 'S2')->where('status', '=', 'honor')->count();

        $pnsgurus3 = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'S3')->where('status', '=', 'PNS')->count();
        $pnstus3 = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'S3')->where('status', '=', 'PNS')->count();
        $p3ks3 = User::where('pendidikan', '=', 'S3')->where('pangkat_gol', '=', 'IX')->count();
        $honors3 = User::where('pendidikan', '=', 'S3')->where('status', '=', 'honor')->count();

        $pnsguruslta = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'SLTA')->where('status', '=', 'PNS')->count();
        $pnstuslta = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'SLTA')->where('status', '=', 'PNS')->count();
        $p3kslta = User::where('pendidikan', '=', 'SLTA')->where('pangkat_gol', '=', 'IX')->count();
        $honorslta = User::where('pendidikan', '=', 'SLTA')->where('status', '=', 'honor')->count();

        $pnsgurusltp = User::where('jenis', '=', 'GURU')->where('pendidikan', '=', 'SLTP')->where('status', '=', 'PNS')->count();
        $pnstusltp = User::where('jenis', '=', 'TU')->where('pendidikan', '=', 'SLTP')->where('status', '=', 'PNS')->count();
        $p3ksltp = User::where('pendidikan', '=', 'SLTP')->where('pangkat_gol', '=', 'IX')->count();
        $honorsltp = User::where('pendidikan', '=', 'SLTP')->where('status', '=', 'honor')->count();

        $golgurupnslaki2a = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur Muda, II/a')->count();
        $golgurupnslaki2b = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur Muda TK.I, II/b')->count();
        $golgurupnslaki2c = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur, II/c')->count();
        $golgurupnslaki2d = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur TK.I, II/d')->count();
        $golgurupnslaki3a = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata Muda , III/a')->count();
        $golgurupnslaki3b = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata Muda TK.I, III/b')->count();
        $golgurupnslaki3c = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata, III/c')->count();
        $golgurupnslaki3d = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata TK.I, III/d')->count();
        $golgurupnslaki4a = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina, IV/a')->count();
        $golgurupnslaki4b = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina TK.I, IV/b')->count();
        $golgurupnslaki4c = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina Utama Muda, IV/c')->count();
        $golgurupnslaki4d = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina Utama Madya, IV/d')->count();
        $totalgurupnslaki = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Laki-Laki')->where('status', '=', 'PNS')->count();

        $golgurupnspr2a = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur Muda, II/a')->count();
        $golgurupnspr2b = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur Muda TK.I, II/b')->count();
        $golgurupnspr2c = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur, II/c')->count();
        $golgurupnspr2d = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur TK.I, II/d')->count();
        $golgurupnspr3a = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata Muda , III/a')->count();
        $golgurupnspr3b = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata Muda TK.I, III/b')->count();
        $golgurupnspr3c = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata, III/c')->count();
        $golgurupnspr3d = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata TK.I, III/d')->count();
        $golgurupnspr4a = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina, IV/a')->count();
        $golgurupnspr4b = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina TK.I, IV/b')->count();
        $golgurupnspr4c = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina Utama Muda, IV/c')->count();
        $golgurupnspr4d = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina Utama Madya, IV/d')->count();
        $totalgurupnspr = User::where('jenis', '=', 'GURU')->where('jk', '=', 'Perempuan')->where('status', '=', 'PNS')->count();

        $golTUpnslaki2a = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur Muda, II/a')->count();
        $golTUpnslaki2b = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur Muda TK.I, II/b')->count();
        $golTUpnslaki2c = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur, II/c')->count();
        $golTUpnslaki2d = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pengatur TK.I, II/d')->count();
        $golTUpnslaki3a = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata Muda , III/a')->count();
        $golTUpnslaki3b = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata Muda TK.I, III/b')->count();
        $golTUpnslaki3c = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata, III/c')->count();
        $golTUpnslaki3d = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata TK.I, III/d')->count();
        $golTUpnslaki4a = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina, IV/a')->count();
        $golTUpnslaki4b = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina TK.I, IV/b')->count();
        $golTUpnslaki4c = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina Utama Muda, IV/c')->count();
        $golTUpnslaki4d = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina Utama Madya, IV/d')->count();
        $totalTUpnslaki = User::where('jenis', '=', 'TU')->where('jk', '=', 'Laki-Laki')->where('status', '=', 'PNS')->count();

        $golTUpnspr2a = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur Muda, II/a')->count();
        $golTUpnspr2b = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur Muda TK.I, II/b')->count();
        $golTUpnspr2c = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur, II/c')->count();
        $golTUpnspr2d = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pengatur TK.I, II/d')->count();
        $golTUpnspr3a = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata Muda , III/a')->count();
        $golTUpnspr3b = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata Muda TK.I, III/b')->count();
        $golTUpnspr3c = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata, III/c')->count();
        $golTUpnspr3d = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata TK.I, III/d')->count();
        $golTUpnspr4a = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina, IV/a')->count();
        $golTUpnspr4b = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina TK.I, IV/b')->count();
        $golTUpnspr4c = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina Utama Muda, IV/c')->count();
        $golTUpnspr4d = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina Utama Madya, IV/d')->count();
        $totalTUpnspr = User::where('jenis', '=', 'TU')->where('jk', '=', 'Perempuan')->where('status', '=', 'PNS')->count();

        $golP3Klaki2a = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'PengaP3Kr Muda / II a')->count();
        $golP3Klaki2b = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'PengaP3Kr Muda Tingkat I / II b')->count();
        $golP3Klaki2c = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'PengaP3Kr / II c')->count();
        $golP3Klaki2d = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'PengaP3Kr Tingkat I / II d')->count();
        $golP3Klaki3a = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata Muda , III/a')->count();
        $golP3Klaki3b = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata Muda TK.I, III/b')->count();
        $golP3Klaki3c = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata, III/c')->count();
        $golP3Klaki3d = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Penata TK.I, III/d')->count();
        $golP3Klaki4a = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina, IV/a')->count();
        $golP3Klaki4b = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina TK.I, IV/b')->count();
        $golP3Klaki4c = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina Utama Muda, IV/c')->count();
        $golP3Klaki4d = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('pangkat_gol', '=', 'Pembina Utama Madya, IV/d')->count();
        $totalP3Klaki = User::where('status', '=', 'P3K')->where('jk', '=', 'Laki-Laki')->where('status', '=', 'P3K')->count();

        $golP3Kpr2a = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'PengaP3Kr Muda / II a')->count();
        $golP3Kpr2b = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'PengaP3Kr Muda Tingkat I / II b')->count();
        $golP3Kpr2c = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'PengaP3Kr / II c')->count();
        $golP3Kpr2d = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'PengaP3Kr Tingkat I / II d')->count();
        $golP3Kpr3a = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata Muda , III/a')->count();
        $golP3Kpr3b = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata Muda TK.I, III/b')->count();
        $golP3Kpr3c = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata, III/c')->count();
        $golP3Kpr3d = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Penata TK.I, III/d')->count();
        $golP3Kpr4a = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina, IV/a')->count();
        $golP3Kpr4b = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina TK.I, IV/b')->count();
        $golP3Kpr4c = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina Utama Muda, IV/c')->count();
        $golP3Kpr4d = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('pangkat_gol', '=', 'Pembina Utama Madya, IV/d')->count();
        $totalP3Kpr = User::where('status', '=', 'P3K')->where('jk', '=', 'Perempuan')->where('status', '=', 'P3K')->count();


        return view('pegawai.tabelrekap', compact('honord1', 'p3kd1', 'pnstud1', 'pnsgurud1', 'total', 'jlhp3k', 'jlhhonor', 'jlhpns', 'pnsgurulaki', 'p3kgurulaki', 'honorgurulaki', 'pnstulaki', 'p3ktulaki', 'honortulaki', 'pnsgurupr', 'p3kgurupr', 'honorgurupr', 'pnstupr', 'p3ktupr', 'honortupr', 'pnsgurud2', 'pnstud2', 'p3kd2', 'honord2', 'pnsgurud3', 'pnstud3', 'p3kd3', 'honord3', 'pnsgurud4', 'pnstud4', 'p3kd4', 'honord4', 'pnsgurus1', 'pnstus1', 'p3ks1', 'honors1', 'pnsgurus2', 'pnstus2', 'p3ks2', 'honors2', 'pnsgurus3', 'pnstus3', 'p3ks3', 'honors3', 'honorslta', 'pnsguruslta', 'pnstuslta', 'p3kslta', 'honorslta', 'pnsgurusltp', 'pnstusltp', 'p3ksltp', 'honorsltp', 'golgurupnslaki2a', 'golgurupnslaki2b', 'golgurupnslaki2c', 'golgurupnslaki2d', 'golgurupnslaki3a', 'golgurupnslaki3b', 'golgurupnslaki3c', 'golgurupnslaki3d', 'golgurupnslaki4a', 'golgurupnslaki4b', 'golgurupnslaki4c', 'golgurupnslaki4d', 'golgurupnspr2a', 'golgurupnspr2b', 'golgurupnspr2c', 'golgurupnspr2d', 'golgurupnspr3a', 'golgurupnspr3b', 'golgurupnspr3c', 'golgurupnspr3d', 'golgurupnspr4a', 'golgurupnspr4b', 'golgurupnspr4c', 'golgurupnspr4d', 'totalgurupnslaki', 'totalgurupnspr', 'golTUpnslaki2a', 'golTUpnslaki2b', 'golTUpnslaki2c', 'golTUpnslaki2d', 'golTUpnslaki3a', 'golTUpnslaki3b', 'golTUpnslaki3c', 'golTUpnslaki3d', 'golTUpnslaki4a', 'golTUpnslaki4b', 'golTUpnslaki4c', 'golTUpnslaki4d', 'golTUpnspr2a', 'golTUpnspr2b', 'golTUpnspr2c', 'golTUpnspr2d', 'golTUpnspr3a', 'golTUpnspr3b', 'golTUpnspr3c', 'golTUpnspr3d', 'golTUpnspr4a', 'golTUpnspr4b', 'golTUpnspr4c', 'golTUpnspr4d', 'totalTUpnslaki', 'totalTUpnspr', 'golP3Klaki2a', 'golP3Klaki2b', 'golP3Klaki2c', 'golP3Klaki2d', 'golP3Klaki3a', 'golP3Klaki3b', 'golP3Klaki3c', 'golP3Klaki3d', 'golP3Klaki4a', 'golP3Klaki4b', 'golP3Klaki4c', 'golP3Klaki4d', 'golP3Kpr2a', 'golP3Kpr2b', 'golP3Kpr2c', 'golP3Kpr2d', 'golP3Kpr3a', 'golP3Kpr3b', 'golP3Kpr3c', 'golP3Kpr3d', 'golP3Kpr4a', 'golP3Kpr4b', 'golP3Kpr4c', 'golP3Kpr4d', 'totalP3Klaki', 'totalP3Kpr',));
    }

    public function show($id)
    {
        $user = User::with(['tugas', 'tupoksi', 'tutam.tuti', 'eks', 'skema', 'kon', 'sdm', 'penilai', 'atasan'])->findOrFail($id);
        // return $user;
        return view('project.rencana_skp', compact('user'));
    }

    public function rencana_pdf($id)
    {
        $user = User::with(['tugas', 'tupoksi', 'tutam.tuti', 'eks', 'skema', 'kon', 'sdm'])->findOrFail($id);
        $view = view()->make('project.rencana_skp', compact('user'));
        $html = $view->render();
        $pdf = new \Elibyy\TCPDF\TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);


        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        $pdf->SetFont('zapfdingbats', '', 14);
        $pdf->setCellPaddings(0, 0, 0, 0);
        $pdf->AddPage('L', 'A4');
        $pdf->setCellPaddings(0, '', '', 0);
        $pdf->SetFont('Helvetica', '', 9.5);
        $pdf->lastPage();
        $pdf->setCellHeightRatio(1.5);
        $pdf->SetLeftMargin(30);
        $pdf->SetTopMargin(5);
        $pdf->SetTitle('rencana_skp');
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->Output('rencana_skp.pdf', 'I');
    }


    public function edit($id)
    {
        $projects = Project::where('id', $id)->get();
        $rk = Rk::all();
        $mapel = Mapel::orderBy('name', 'ASC')->get();
        return view('project.edit', ['projects' => $projects, 'rk' => $rk, 'mapel' => $mapel]);
    }

    public function update(Request $request)
    {

        Project::where('id', $request->id)->update([
            'title' => $request->title
        ]);
        return redirect('pegawai.index')
            ->with(['succes', 'data berhasil diupdate']);
    }

    public function cetak($id)
    {
        // This method should work with user ID like rencana_pdf, not project ID
        // First, try to find as a user ID (most likely scenario based on route)
        $user = User::with(['tugas', 'tupoksi', 'tutam.tuti', 'eks', 'skema', 'kon', 'sdm', 'penilai'])->findOrFail($id);
        
        // Create a dummy project object to match the expected variable in the view
        $dummyProject = (object) ['user' => $user];
        
        $view = view()->make('project.main_pdf', ['project' => $dummyProject, 'user' => $user]);
        $html = $view->render();
        $pdf = new \Elibyy\TCPDF\TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);


        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        $pdf->SetFont('zapfdingbats', '', 14);
        $pdf->setCellPaddings(0, 0, 0, 0);
        $pdf->AddPage('L', 'A4');
        $pdf->setCellPaddings(0, '', '', 0);
        $pdf->SetFont('Helvetica', '', 9.5);
        $pdf->lastPage();
        $pdf->setCellHeightRatio(1.5);
        $pdf->SetLeftMargin(30);
        $pdf->SetTopMargin(5);
        $pdf->SetTitle('rencana_skp_cetak');
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->Output('rencana_skp_cetak.pdf', 'I');
    }
}
