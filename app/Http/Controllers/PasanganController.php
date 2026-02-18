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

    // KP-4.1 List (Daftar Pegawai untuk KP-4.1)
    public function kp4List()
    {
        $pegawai = User::where('status', '!=', 'honor')
            ->where('status', '!=', 'P3K')
            ->orderBy('name', 'ASC')
            ->get();
        
        return view('pasangan.kp4_list', compact('pegawai'));
    }

    // KP-4.1 Individual
    public function kp4($id)
    {
        $data = User::with(['anak'])->findOrFail($id);
        $anak = User::withCount(['anak'])->findOrFail($id);
        $tmt_pangkat = Carbon::parse($data->tmt_pangkat);
        $tgl_lahir = Carbon::parse($data->tgl_lahir);
        $posts = User::has('anak', '=', 1)->count();

        return view('pasangan.kp4', compact('data', 'anak', 'tmt_pangkat', 'posts'));
    }

    // KP-4.1 PDF
    public function kp4pdf($id)
    {
        $data = User::with(['anak'])->findOrFail($id);
        $anak = User::withCount(['anak'])->findOrFail($id);

        $total = $data->anak->where('kat', 1)->count();
        $t = $data->anak->where('kat', 2)->count();

        $view = view()->make('pasangan.kp4pdf', compact('data', 'anak', 'total', 't'));
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
        $pdf::SetFont('helvetica', '', 9);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetTitle('kp4 an. ' . $data->name);
        
        // Split HTML at landscape-page div
        $parts = explode('<div class="landscape-page">', $html);
        $firstPage = $parts[0];
        $secondPage = isset($parts[1]) ? '<div class="landscape-page">' . $parts[1] : '';
        
        // Write first page (portrait)
        $pdf::writeHTML($firstPage, true, false, true, false, '');
        
        // Add landscape page for children tables
        if (!empty($secondPage)) {
            $pdf::AddPage('L', 'A4');
            $pdf::writeHTML($secondPage, true, false, true, false, '');
        }
        
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('kp4 an. ' . $data->name . 'pdf');
    }

    // KP-4.2 List (Daftar Pegawai untuk KP-4.2 / KP-3)
    public function kp3List()
    {
        $pegawai = User::where('status', '!=', 'honor')
            ->where('status', '!=', 'P3K')
            ->orderBy('name', 'ASC')
            ->get();
        
        return view('pasangan.kp3_list', compact('pegawai'));
    }

    // KP-4.2 Individual
    public function kp3($id)
    {
        $data = User::with(['pasangan'])->findOrFail($id);
        return view('pasangan.kp3', compact('data'));
    }

    // KP-4.2 PDF
    public function kp3pdf($id)
    {
        $data = User::with(['anak'])->findOrFail($id);
        $anak = User::withCount(['anak'])->findOrFail($id);

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

    public function create($user_id = null)
    {
        $user = User::select('id', 'name')->get();
        $pasangan = Pasangan::all();
        $selected_user_id = $user_id;
        return view('pasangan.add', compact('user', 'pasangan', 'selected_user_id'));
    }

    public function store(Request $request)
    {
        // Debug: log the request data
        \Log::info('Pasangan store request:', $request->all());
        
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'name' => 'nullable',
            'pasangan_name' => 'required',
            'tgl_lahir' => 'required|date',
            'tgl_kawin' => 'required|date',
            'job' => 'nullable',
            'net' => 'nullable|numeric',
            'status' => 'nullable|in:ditanggung,menanggung',
        ]);

        // Map pasangan_name to name for database
        $validated['name'] = $validated['pasangan_name'];
        unset($validated['pasangan_name']);
        
        // Debug: log validated data
        \Log::info('Validated data:', $validated);

        Pasangan::create($validated);

        // Redirect back to pegawai info with success message
        if ($request->user_id) {
            return redirect('pegawai.info/' . $request->user_id)->with('success_pasangan', 'Pasangan berhasil ditambahkan!');
        }

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

    public function destroy($id)
    {
        $pasangan = Pasangan::findOrFail($id);
        $user_id = $pasangan->user_id;
        $pasangan->delete();
        
        if ($user_id) {
            return redirect('pegawai.info/' . $user_id)->with('success_pasangan', 'Pasangan berhasil dihapus!');
        }
        
        return redirect('pasangan.index');
    }
}
