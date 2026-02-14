<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use SplFileObject;
use App\Models\User;
use App\Models\Image;
use App\Models\Pists;
use App\Models\Penilai;
use RecursiveArrayIterator;
use Illuminate\Http\Request;
use RecursiveIteratorIterator;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreProductRequest;
use App\Models\Atasan;
use Illuminate\Foundation\Http\FormRequest;
use TCPDF_FONTS;

class PistController extends Controller
{




    public function form4($id)
    {
        $pists = Pists::where('id', $id)->get();
        $user = User::with(['penilai', 'atasan'])->orderBy('id', 'ASC')->get();
        $view = view()->make('pists.form4', compact('pists', 'user'));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);


        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        $pdf::SetFont('zapfdingbats', '', 14);
        foreach ($pists as $jaldis) {
            $x = (Carbon::parse($jaldis->tgl_awal)->format('d-m-Y'));
        }

        // $pdf::AddPage();
        $pdf::AddPage('P', 'A4');
        $pdf::SetMargins(10, 20, 10, true);
        $pdf::setCellPaddings(0, '', '', 0);
        $pdf::SetFont('dejavusansmono', '', 8);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetTitle('Lampiran ST');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('lampiran st tgl . ' . $x . '.pdf');
    }


    public function stPdf($id)
    {

        $data = [
            'imagePath' => public_path('image/kopsmk.png'),
        ];

        $pists = Pists::where('id', $id)->get();

        $user = User::with(['penilai', 'atasan'])->where('id', $id)->orderBy('nip', 'DESC')->get();
        $atasan = Atasan::first();
        $view = view()->make('pists.stPdf', compact('pists', 'user', 'data', 'atasan'));
        $html = $view->render();
        // $path = dirname(__DIR__).'/fonts/bookos.ttf';
        // $fontname = TCPDF_FONTS::addTTFfont($path,'TrueTypeUnicode','',32);
        // if ($fontname)
        // {
        //     echo 'ok';
        // }
        // else {
        //     echo 'no';
        // }
        // exit;

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);

        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        foreach ($pists as $jaldis) {
            $x = (Carbon::parse($jaldis->tgl_awal)->format('d-m-Y'));
        }

        $pdf::setHtmlVSpace(array('ul' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 0, 'n' => 0))));
        $pdf::AddPage();
        $pdf::setCellPaddings(0, '', '', 0);
        $font_size = $pdf::pixelsToUnits('25');
        $pdf::SetFont('dejavusansmono', '', $font_size);
        $pdf::SetTopMargin(0);
        $pdf::SetLeftMargin(15);
        $pdf::SetRightMargin(10);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetTitle('Surat Tugas');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('surat tugas an . ' . $x . '.pdf');
        // $pdf::SetFont('zapfdingbats', '', 14);
        // $pdf::SetFont ('helvetica', '', $font_size , '', 'default', true );
        // $pdf::SetFont('bookmanoldstyle', '', 12);
        // $pdf::SetFont($fontname, '', 14, '', false);


    }

    public function laporanpdf($id)
    {

        $data = [
            'imagePath' => public_path('image/kopsmk.png'),
        ];

        $pists = Pists::where('id', $id)->get();
        $user = User::with(['penilai', 'atasan'])->where('id', $id)->orderBy('nip', 'DESC')->get();
        $view = view()->make('pists.laporanpdf', compact('pists', 'user', 'data'));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);


        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf::setLanguageArray($l);
        }
        foreach ($pists as $jaldis) {
            $x = (Carbon::parse($jaldis->tgl_awal)->format('d-m-Y'));
        }

        $pdf::SetFont('zapfdingbats', '', 14);
        $pdf::AddPage();
        $pdf::setCellPaddings(0, '', '', 0);
        $pdf::SetFont('Helvetica', '', 10);
        $pdf::SetLeftMargin(15);
        $pdf::SetRightMargin(10);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetTitle('laporan jaldis tgl_' . $x);
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('laporan jaldis tgl. ' . $x . '.pdf');
    }

    public function postCreate()
    {
        $pegawai = User::orderBy('nip', 'ASC')->get();
        $penilai = Penilai::all();

        return view('pists.create', compact('pegawai', 'penilai'));
    }


    public function postData(Request $request)
    {
        // Explicitly validate and prepare data
        $data = [
            'penilai_id' => $request->penilai_id,
            'no_surat' => $request->no_surat,
            'tgl_surat' => $request->tgl_surat,
            'tgl_surat_dasar' => $request->tgl_surat_dasar,
            'asal_surat' => $request->asal_surat,
            'no_asal_surat' => $request->no_asal_surat,
            'description' => $request->description,
            'maksud' => $request->maksud,
            'tujuan' => $request->tujuan,
            'acara' => $request->acara,
            'ulasan' => $request->ulasan,
            'tgl_awal' => $request->tgl_awal,
            'tgl_akhir' => $request->tgl_akhir,
            'jam_1' => $request->jam_1,
            'jam_2' => $request->jam_2,
            'tempat' => $request->tempat,
            'cat' => $request->cat ?? [],
            'selected' => is_array($request->selected) ? count($request->selected) : (int) $request->selected,
        ];
        
        $ajukan = Pists::create($data);
        
        if ($request->hasFile('surat-pengajuan')) {
            $ajukan->simpanBuktiPengajuan($request, 'surat-pengajuan');
        }

        return redirect('pists.index')
            ->with([
                'status' => 'Cuti berhasil diajukan! Cek status pengajuan Anda secara berkala!'
            ]);
    }

    public function statusCutiBuktiPengajuanPDF(Pists $pists)
    {
        return $pists->bacaBuktiPengajuan();
        // return "bacaBuktiPengajuan";
    }

    // public function postData(Request $request)
    // {
    //     if($request->hasFile("images")){
    //         $file=$request->file("images");
    //         $imageName = $file[0]->getClientOriginalName();
    //         $file->move(public_path('cover'), $imageName);



    //         $pists =new pists([
    //             'penilai_id'=>$request->penilai_id,
    //             'no_surat'=>$request->no_surat,
    //             'tgl_surat'=>$request->tgl_surat,
    //             'tgl_surat_dasar'=>$request->tgl_surat_dasar,
    //             'asal_surat'=>$request->asal_surat,
    //             'no_asal_surat '=>$request->no_asal_surat,
    //             'description'=>$request->description,
    //             'maksud'=>$request->maksud,
    //             'tujuan'=>$request->tujuan,
    //             'acara'=>$request->acara,
    //             'ulasan'=>$request->ulasan,
    //             'image'=>$imageName,
    //             'tgl_awal'=>$request->tgl_awal,
    //             'tgl_akhir'=>$request->tgl_akhir,
    //             'cat'=>$request->cat,
    //             'selected'=>$request->selected,
    //             'jam_1'=>$request->jam_1,
    //             'jam_2'=>$request->jam_2,
    //             'tempat'=>$request->tempat,
    //         ]);
    //         $pists->save();
    //     }

    //         if($request->hasFile("images")){
    //             $files=$request->file("images");
    //             foreach($files as $file){
    //                 $imageName = $files[0]->getClientOriginalName();
    //                 $request['pists_id']=$pists->id;
    //                 $request['image']=$imageName;
    //                 $files->move(public_path('images'), $imageName);
    //                 Image::create($request->all());

    //             }
    //         }

    //     return redirect('pists.index');

    // }



    // public function postData(Request $request)
    // {
    //     $images = [];
    //     if($request->hasFile("images")){
    //         $file=$request->file("images");
    //         // $imageName=time().'_'.$file->getClientOriginalName();
    //         // $imageName = time().rand(1,99).'.'.$file->extension(); 
    //         // $imageName = $file->getClientOriginalName();
    //         // $imageName = time(). $file->getClientOriginalName();
    //         // $imageName = date('Y-m-d-H:i:s')."-".$file->getClientOriginalName();
    //         $imageName = $file[0]->getClientOriginalName();
    //         $file->move(public_path('images'), $imageName);
    //         $images[]['image'] = $imageName;
    //         // $file->move(\public_path("image/"),$imageName);
    //         // $file->move(public_path('/image'), end($imageName));
    //         // $file->move(public_path('image'), $imageName);
    //         // $file->move(\public_path("images/"),$imageName);
    //         // $file->move(storage_path('app/public/img'), $imageName);


    //         $pists =new Pists([
    //             'penilai_id'=>$request->penilai_id,
    //             'no_surat'=>$request->no_surat,
    //             'tgl_surat'=>$request->tgl_surat,
    //             'tgl_surat_dasar'=>$request->tgl_surat_dasar,
    //             'asal_surat'=>$request->asal_surat,
    //             'no_asal_surat '=>$request->no_asal_surat,
    //             'description'=>$request->description,
    //             'maksud'=>$request->maksud,
    //             'tujuan'=>$request->tujuan,
    //             'acara'=>$request->acara,
    //             'ulasan'=>$request->ulasan,
    //             'image'=>$imageName,
    //             'tgl_awal'=>$request->tgl_awal,
    //             'tgl_akhir'=>$request->tgl_akhir,
    //             'cat'=>$request->cat,
    //             'selected'=>$request->selected,
    //             'jam_1'=>$request->jam_1,
    //             'jam_2'=>$request->jam_2,
    //             'tempat'=>$request->tempat,
    //         ]);
    //         $pists->save();

    //     }

    //     if($request->hasFile("image")){
    //             $files=$request->file("image");
    //             foreach($files as $file){
    //                 // $imageName=time().'_'.$file->getClientOriginalName();
    //                 // $imageName = time().rand(1,99).'.'.$files->extension();  
    //                 // $imageName = $files->getClientOriginalName();
    //                 // $imageName = time(). $files->getClientOriginalName();
    //                 // $imageName = date('Y-m-d-H:i:s')."-".$files->getClientOriginalName();
    //                 $imageName = $files[0]->getClientOriginalName();
    //                 $request['pists_id']=$pists->id;
    //                 // $request['image']=$imageName;
    //                 $request[]['image'] = $imageName;
    //                 $files->move(public_path('images'), $imageName);
    //                 // $files->move(\public_path("/images"),$imageName);
    //                 // $file->move(storage_path('app/public/img'), $imageName);
    //                 Image::create($request->all());

    //             }
    //         }
    //     return redirect('pists.index')
    //     ->with('success','Foto Kegiatan');
    // }   

    public function index()
    {
        $data = Pists::orderBy('tgl_awal', 'DESC')->paginate(5);
        return view('pists.index', compact('data'));
    }

    public function edit($id)
    {
        $pegawai = User::orderBy('nip', 'DESC')->get();
        $penilai = Penilai::all();
        $pists = Pists::findOrFail($id);
        $servicesarray = Pists::where('id', $id)->select('cat')->get()->toArray();
        $json = json_encode($servicesarray);
        $data = Pists::where('id', $id)->pluck('cat')->toArray();

        return view('pists.edit', compact('pists', 'pegawai', 'json', 'servicesarray', 'data', 'penilai'));
    }

    public function update($id, Request $request)
    {
        $data = Pists::findOrFail($id);
        $data->update($request->all());
        $data->simpanBuktiPengajuanEdit($request, 'surat-pengajuan');
        return redirect('pists.index');
    }


    public function delete($id)
    {
        Pists::findOrFail($id);
    }

    public function destroy($id)
    {
        $data = Pists::findOrFail($id);
        $data->delete();
        return redirect('pists.index');
    }


    public function form($id)
    {
        $pists = Pists::where('id', $id)->get();
        $user = User::with(['penilai', 'atasan'])->where('id', $id)->orderBy('nip', 'DESC')->get();
        return view('pists.form', compact('pists', 'user'));
    }

    public function laporan($id)
    {
        $pists = Pists::where('id', $id)->get();
        $user = User::with(['penilai', 'atasan'])->where('id', $id)->orderBy('nip', 'DESC')->get();

        return view('pists.laporan', compact('pists', 'user'));
    }


    public function form2($id)
    {
        $pists = Pists::where('id', $id)->get();
        $user = User::with(['penilai', 'atasan'])->orderBy('nip', 'ASC')->get();
        return view('pists.form2', compact('pists', 'user'));
    }

    public function form3($id)
    {
        $pists = Pists::where('id', $id)->get();
        $user = User::with(['penilai', 'atasan'])->orderBy('nip', 'ASC')->get();
        return view('pists.form3', compact('pists', 'user'));
    }

    public function dispen($id)
    {
        $pists = Pists::where('id', $id)->get();
        return view('pists.dispen', compact('pists'));
    }


    public function cari(Request $request)
    {
        $cari = $request->cari;
        $data = DB::table('pists')
            ->where('tgl_surat', 'like', "%" . $cari . "%")
            ->paginate();
        return view('pists.index', compact('data'));
    }
}
