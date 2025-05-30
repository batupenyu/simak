<?php

namespace App\Http\Controllers;


use App\Models\Anak;
use App\Models\User;
use App\Models\Project;
use App\Models\Pasangan;
use App\Models\Penilai;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PasanganController extends Controller
{
    public function index()
    {
        $data = Pasangan::all();
        return view('pasangan.index', compact('data'));
    }

    public function kp4($id)
    {

        $data = User::with(['anak'])->findOrFail($id);
        $anak = User::withCount(['anak'])->findOrFail($id); // hitung jumlah data
        $tmt_pangkat = Carbon::parse($data->tmt_pangkat); // hitung masa kerja
        $tgl_lahir = Carbon::parse($data->tgl_lahir); //hitung umur

        $posts = User::withCount(['anak'])
            ->having('anak_count', '=', 1)
            ->count();

        return view('pasangan.kp4', compact('data', 'anak', 'tmt_pangkat', 'posts'));
    }

    public function kp4pdf($id)
    {

        $data = User::with(['anak'])->findOrFail($id);
        $anak = User::withCount(['anak'])->findOrFail($id); // hitung jumlah data

        $view = view()->make('pasangan.kp4pdf', compact('data', 'anak'));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);

        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        // $pdf::setHtmlVSpace(array('li' => array('h' => 5)));
        $pdf::setHtmlVSpace(array('ol' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 0, 'n' => 0))));
        $pdf::SetTopMargin(0);
        $pdf::setPrintHeader(false);
        $pdf::SetFooterMargin(0);
        $pdf::setPrintFooter(false);
        $pdf::SetFont('zapfdingbats', '', 14);
        $pdf::AddPage('P', 'A4');
        $pdf::SetLeftMargin(15);
        $pdf::SetAutoPageBreak(TRUE, 0);
        $pdf::setCellPaddings(0, '', '', 0);
        $pdf::SetFont('helvetica', '', 9);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetTitle('kp4 an. ' . $data->name);
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('kp4 an. ' . $data->name . 'pdf');
    }

    public function kp4newpdf($id)
    {

        $data = User::with(['anak'])->findOrFail($id);
        $anak = User::withCount(['anak'])->findOrFail($id); // hitung jumlah data

        $view = view()->make('pasangan.kp4newpdf', compact('data', 'anak'));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);

        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        $pdf::setHtmlVSpace(array('ol' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 0, 'n' => 0))));
        $pdf::SetTopMargin(0);
        $pdf::setPrintHeader(false);
        $pdf::SetFooterMargin(0);
        $pdf::setPrintFooter(false);
        $pdf::SetFont('zapfdingbats', '', 14);
        $pdf::AddPage('P', 'A4');
        $pdf::SetLeftMargin(15);
        $pdf::SetAutoPageBreak(TRUE, 0);
        $pdf::setCellPaddings(0, '', '', 0);
        $pdf::SetFont('helvetica', '', 10);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetTitle('kp4 an. ' . $data->name);
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('kp4 an.' . $data->name . '.pdf');
    }

    public function kp3($id)
    {

        $data = User::with(['anak'])->findOrFail($id);
        $anak = User::withCount(['anak'])->findOrFail($id); // hitung jumlah data
        $tmt_pangkat = Carbon::parse($data->tmt_pangkat); // hitung masa kerja
        $tgl_lahir = Carbon::parse($data->tgl_lahir); //hitung umur

        $posts = User::withCount(['anak'])
            ->having('anak_count', '=', 1)
            ->count();

        return view('pasangan.kp3', compact('data', 'anak', 'tmt_pangkat', 'posts'));
    }

    public function create()
    {
        $user = User::select('id', 'name')->get();
        $pasangan = Pasangan::all();
        return view('pasangan.add', compact('user', 'pasangan'));
    }

    public function store(Request $request)
    {
        Pasangan::create($request->all());
        return redirect('pasangan.index');
    }

    public function edit($id)
    {
        $data = Pasangan::findOrFail($id);
        $pasangan = Pasangan::all();
        return view('pasangan.edit', compact('data', 'pasangan'));
    }


    public function update($id, Request $request)
    {
        $pasangan = Pasangan::findOrFail($id);
        $pasangan->update($request->all());
        return redirect('pegawai.index');
    }
}
