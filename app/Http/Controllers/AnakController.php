<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Anak;
use App\Models\Pasangan;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;

class AnakController extends Controller
{
    public function index()
    {
        $data = Project::with('user', 'anak', 'pasangan')->get();
        return view('project.index_anak', compact('data'));
    }

    public function show($id)
    {
        $data = User::with(['anak'])->findOrFail($id);

        $jumlah = array();
        foreach ($data->anak as $item) {
            if ($item->kat == 1) {
                $price = count(array($item['kat']));
                array_push($jumlah, $price);
            }
        }
        $total = array_sum($jumlah);


        $j = array();
        foreach ($data->anak as $item) {
            if ($item->kat == 2) {
                $price = count(array($item['kat']));
                array_push($j, $price);
            }
        }
        $t = array_sum($j);

        return view('project.index_anak', compact('data', 'total', 't'));
    }

    public function anakpdf($id)
    {
        $data = User::with(['anak'])->findOrFail($id);

        $jumlah = array();
        foreach ($data->anak as $item) {
            if ($item->kat == 1) {
                $hitung = count(array($item['kat']));
                array_push($jumlah, $hitung);
            }
        }
        $total = array_sum($jumlah);


        $j = array();
        foreach ($data->anak as $item) {
            if ($item->kat == 2) {
                $kategori = count(array($item['kat']));
                array_push($j, $kategori);
            }
        }
        $t = array_sum($j);

        $view = view()->make('project.anakpdf', compact('data', 'total', 't'));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);

        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        // $pdf::setHtmlVSpace(array('li' => array('h' => 5)));
        // $pdf::Cell(30, 0, 'Center-Center', 1, $ln=0, 'C', 0, '', 0, false, 'C', 'C');
        $pdf::setHtmlVSpace(array('ol' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 0, 'n' => 0))));
        $pdf::SetTopMargin(10);
        $pdf::setPrintHeader(false);
        $pdf::SetFooterMargin(0);
        $pdf::setPrintFooter(false);
        $pdf::SetFont('zapfdingbats', '', 14);
        $pdf::AddPage('L', 'A4');
        $pdf::SetLeftMargin(15);
        $pdf::SetAutoPageBreak(TRUE, 0);
        $pdf::setCellPaddings(0, '', '', 0);
        $pdf::SetFont('helvetica', '', 9);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetTitle('KP4 an. ' . $data->name);
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('KP4 an. ' . $data->name . 'pdf');
    }

    public function create()
    {
        $pasangan = Pasangan::select('id', 'name')->get();
        $project = Project::select('id', 'title')->get();
        $anak = User::select('id', 'name')->orderBy('name', 'ASC')->get();
        return view('project.anak_tambah', compact('project', 'anak', 'pasangan'));
    }
    public function store(Request $request)
    {
        Anak::create($request->all());
        return redirect('pegawai.index');
    }

    public function edit($id)
    {
        $project = Project::all();
        $user = User::all();
        $pasangan = Pasangan::select('id', 'name')->get();
        $anak = Anak::findOrFail($id);
        return view('project.edit_anak', compact('project', 'user', 'anak', 'pasangan'));
    }

    public function update($id, Request $request)
    {
        $anak = Anak::find($id);
        $anak->update($request->all());
        return redirect()->to('project')->with('status', 'Data berhasil di update');
        // return redirect()->to('pegawai.index');
    }

    public function delete($id)
    {
        $anak = Anak::with('user')->findOrFail($id);
        return view('project.hapus_anak', compact('anak'));
    }
    public function destroy($id)
    {
        $anak = Anak::with('project', 'user')->findOrFail($id);
        $anak->delete();
        return redirect()->to('project');
    }
}
