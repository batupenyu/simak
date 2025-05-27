<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function show($id)
    {
        $data = Barang::with(['user'])->where('id',$id)->get();
        $view = view()->make('barang.bastb',compact('data'));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);


        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        $pdf::setHtmlVSpace(array('ol'=>array(0=>array('h'=>0,'n'=>0),1=>array('h'=>0,'n'=>0))));
        $pdf::SetTopMargin(5);
        $pdf::setPrintHeader(false);
        $pdf::SetFooterMargin(0);
        $pdf::setPrintFooter(false);
        $pdf::SetFont('zapfdingbats', '', 14);
        $pdf::AddPage('P','A4');
        $pdf::SetLeftMargin(15);
        $pdf::SetAutoPageBreak(TRUE, 0);
        $pdf::setCellPaddings(0,'','',0);
        $pdf::SetFont('helvetica', '',10);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetTitle('bastb');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('bastb.pdf');
    }

    public function lampiran()
    {
        $data = Barang::with(['user'])->get();
        $count = Barang::with(['user'])->count();

        $view = view()->make('barang.lampiran',compact('data','count'));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);


        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        $pdf::setHtmlVSpace(array('ol'=>array(0=>array('h'=>0,'n'=>0),1=>array('h'=>0,'n'=>0))));
        $pdf::SetTopMargin(15);
        $pdf::setPrintHeader(false);
        $pdf::SetFooterMargin(0);
        $pdf::setPrintFooter(false);
        $pdf::SetFont('zapfdingbats', '', 14);
        $pdf::AddPage('L','A4');
        $pdf::SetLeftMargin(15);
        $pdf::SetAutoPageBreak(TRUE, 0);
        $pdf::setCellPaddings(0,'','',0);
        $pdf::SetFont('helvetica', '',10);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetTitle('lampiran');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('lampiran.pdf');
    }

    public function index()
    {
        $data = Barang::with(['user'])->paginate(5);
        $count = Barang::with(['user'])->count();
        return view('barang.index',compact('data','count'));

    }
}
