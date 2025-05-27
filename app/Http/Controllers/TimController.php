<?php

namespace App\Http\Controllers;

use App\Models\MYPDF;
use App\Models\Penilai;
use App\Models\Rk;
use App\Models\Tim;
use App\Models\User;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;

class TimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tim = Tim::paginate(4);
        return view('tim.index',compact('tim')); 
    }

    public function timpdf()
    {

        

        // create new PDF document
        // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // set document information
        // $pdf::SetCreator('KUEN');
        // $pdf::SetAuthor('Nicola Asuni');
        // $pdf::SetTitle('TCPDF Example 003');
        // $pdf::SetSubject('TCPDF Tutorial');
        // $pdf::SetKeywords('TCPDF, PDF, example, test, guide');
        
        // set default header data
        // $pdf::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        
        // // set header and footer fonts
        // $pdf::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        // $pdf::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        
        // // set default monospaced font
        // $pdf::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        
        // // set margins
        // $pdf::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        // $pdf::SetHeaderMargin(PDF_MARGIN_HEADER);
        // $pdf::SetFooterMargin(PDF_MARGIN_FOOTER);
        
        // // set image scale factor
        // $pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        // set some language-dependent strings (optional)
        // if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        //     require_once(dirname(__FILE__).'/lang/eng.php');
        //     $pdf::setLanguageArray($l);
        // }
        
        // ---------------------------------------------------------
        
        // set font
        // $pdf::SetFont('times', 'BI', 12);
        
        // add a page
        // $pdf::AddPage('L');
        
        // set some text to print
        // $txt = <<<EOD
        // TCPDF Example 003
        // Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
        // EOD;
        
        // print a block of text using Write()
        // $pdf::Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
        
        // ---------------------------------------------------------
        
        //Close and output PDF document
        // $pdf::Output('example_003.pdf', 'I');


        // $tim= Tim::all();
        $tim = Tim::paginate(7);
        $view = view()->make('tim.timpdf',compact('tim'));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION,PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);
        
        
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf::setLanguageArray($l);
        }
        
        

        $pdf::SetAutoPageBreak(TRUE,10);
        $pdf::SetFont('zapfdingbats', '', 14);
        $pdf::setCellPaddings(2, 4, 6, 8);
        $pdf::AddPage('L','A4','C');
        $pdf::setCellPaddings(0,'','',0);
        // $pdf::SetFont('Helvetica', '', 9.5);
        // $pdf::SetFont('dejavusans', '', 9, '', true);
        $pdf::SetFont('freesans', '', 9, '', true);
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetLeftMargin(10);
        $pdf::SetTopMargin(5);
        $pdf::SetTitle('Timpdf');
        $pdf::lastPage();
        // $pdf::writeHTML($html,true, false, true, false, '');
        $pdf::writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf::Output('timpdf. .pdf');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rkatasan = Rk::all();
        $penilai = Penilai::all();
        $anggota = User::all();
        return view('tim.create',compact('rkatasan','penilai','anggota'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tim::create($request->all());
        return redirect('tim.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pegawai = User::orderBy('nip','DESC')->get();
        $rkatasan = Rk ::all();
        $penilai = Penilai ::all();
        $tim = Tim::findOrFail($id);
        $servicesarray = Tim::select('anggota')->get()->toArray();
        $json = json_encode($servicesarray);
        $data = Tim::pluck('anggota')->toArray();
        return view('tim.edit', compact('tim','pegawai','json','servicesarray','data','penilai','rkatasan'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,Request $request)
    {
        $data = Tim::findOrFail($id);
        $data ->update($request->all());
        return redirect('tim.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete($id)
    {
        Tim::findOrFail($id);
    }

    public function destroy($id)
    {
        $data = Tim::findOrFail($id);
        $data->delete();
        return redirect('tim.index');
    }
}
