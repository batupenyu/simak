<?php

namespace App\Http\Controllers;

use App\Models\Sk;
use App\Models\User;
use Doctrine\DBAL\Schema\Index;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;

class SkController extends Controller
{
    //
    public function index()

    {
        $data = Sk::all();
        $first = Sk::first();
        return view('sk.index', compact('data', 'first'));
    }

    public function spmt($id)
    {
        $data = Sk::with(['user'])->where('id', $id)->get();
        $alldata = Sk::all();
        return view('sk.form', compact('data', 'alldata'));
    }

    public function create()
    {
        $pegawai = User::orderBy('nip', 'ASC')->get();
        return view('sk.create', compact('pegawai'));
    }

    public function store(Request $request)
    {
        Sk::create($request->all());
        return redirect('sk.index');
    }

    public function edit($id)
    {
        $pegawai = User::orderBy('nip', 'ASC')->get();
        $data = Sk::findOrFail($id);
        return view('sk.edit', compact('data', 'pegawai'));
    }

    public function update($id, Request $request)
    {
        $data = Sk::findOrFail($id);
        $data->update($request->all());
        return redirect('sk.index');
    }

    public function delete($id)
    {
        Sk::findOrFail($id);
    }

    public function destroy($id)
    {
        $data = Sk::findOrFail($id);
        $data->delete();
        return redirect('sk.index');
    }

    public function spmtPdf($id)
    {

        $kop = [
            'imagePath' => public_path('image/kopsmk.png'),
        ];

        $data = Sk::with(['user'])->where('id', $id)->get();
        $first = Sk::with(['user'])->where('id', $id)->first();
        $alldata = Sk::all();
        foreach ($data as $item) {
            $nama = $item->user->name;
        }

        $view = view()->make('sk.spmtPdf', compact('alldata', 'data', 'kop', 'first'));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);

        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf::setLanguageArray($l);
        }


        $pdf::setHtmlVSpace(array('ul' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 0, 'n' => 0))));
        $pdf::AddPage();
        $pdf::setCellPaddings(0, '', '', 0);
        $font_size = $pdf::pixelsToUnits('27');
        $pdf::SetFont('dejavusansmono', '', $font_size);
        $pdf::SetTopMargin(0);
        $pdf::SetLeftMargin(15);
        $pdf::SetRightMargin(10);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetTitle('SPMT');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('SPMT an . ' . $nama . '.pdf');
        // $pdf::SetFont('zapfdingbats', '', 14);
        // $pdf::SetFont ('helvetica', '', $font_size , '', 'default', true );
        // $pdf::SetFont('bookmanoldstyle', '', 12);
        // $pdf::SetFont($fontname, '', 14, '', false);


    }
}
