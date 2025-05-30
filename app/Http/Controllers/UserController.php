<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Angka_kredit;
use App\Models\User;
use App\Models\Atasan;
use App\Models\Mapel;
use App\Models\Penilai;
use App\Models\Project;
use Illuminate\Support\Carbon;
use App\Models\Pasangan;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UnitKerja;


class UserController extends Controller
{

    public function autocomplete(Request $request): JsonResponse
    {
        $data = [];

        if ($request->filled('q')) {
            $data = User::select("name", "id")
                ->where('name', 'LIKE', '%' . $request->get('q') . '%')
                ->take(10)
                ->get();
        }

        return response()->json($data);
    }

    public function index()
    {
        // $pegawai = User::where('nip', '!=', '')->where('pangkat_gol', '!=', 'IX')->get();
        $p3k = User::where('status', '=', 'p3k')->orderBy('name', 'ASC')->get();
        $honor = User::where('status', 'HONOR')->get();
        $pegawai = User::where('status', '!=', 'P3K')->where('status', '!=', 'HONOR')->orderBy('name', 'ASC')->get();
        $ak = Angka_kredit::with(['user'])->get();
        $akintegrasi = Angka_kredit::with(['user'])->orderBy('tgl_akhir_penilaian', 'DESC')->first();
        return view('project.index', compact('pegawai', 'ak', 'akintegrasi', 'p3k', 'honor'));
    }

    public function show_ak()
    {
        $pegawai = User::where('status', '!=', 'P3K')->where('status', '!=', 'HONOR')->orderBy('name', 'ASC')->get();
        return view('project.show_ak', compact('pegawai'));
    }

    public function pns(Request $request)
    {

        $pegawai = User::all();
        $jumlah = array();
        foreach ($pegawai as $item) {
            if ($item->status == 'PNS') {
                $price = count(array($item->pangkat_gol));
                array_push($jumlah, $price);
            }
        }
        $total = array_sum($jumlah);

        $pagination = 20;
        $nomor   = User::orderBy('pangkat_gol', 'desc')->paginate($pagination);

        return view('pegawai.pns', compact('pegawai', 'total', 'nomor'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function p3k(Request $request)
    {
        $pegawai = User::all();
        $jumlah = array();
        foreach ($pegawai as $item) {
            if ($item->pangkat_gol == 'IX') {
                $price = count(array($item->pangkat_gol));
                array_push($jumlah, $price);
            }
        }
        $total = array_sum($jumlah);

        $pagination = 20;
        $nomor   = User::orderBy('pangkat_gol', 'desc')->paginate($pagination);

        return view('pegawai.p3k', compact('pegawai', 'total', 'nomor'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }
    public function gtt(Request $request)
    {
        $pegawai = User::all();
        $jumlah = array();
        foreach ($pegawai as $item) {
            if ($item->jabatan == 'GTT') {
                $price = count(array($item->pangkat_gol));
                array_push($jumlah, $price);
            }
        }
        $total = array_sum($jumlah);

        $pagination = 20;
        $nomor   = User::orderBy('pangkat_gol', 'desc')->paginate($pagination);

        return view('pegawai.gtt', compact('pegawai', 'total', 'nomor'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }
    public function ptt(Request $request)
    {
        $pegawai = User::all();
        $jumlah = array();
        foreach ($pegawai as $item) {
            if ($item->jabatan == 'PTT') {
                $price = count(array($item->pangkat_gol));
                array_push($jumlah, $price);
            }
        }
        $total = array_sum($jumlah);

        $pagination = 20;
        $nomor   = User::orderBy('pangkat_gol', 'desc')->paginate($pagination);

        return view('pegawai.ptt', compact('pegawai', 'total', 'nomor'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function create()
    {
        $penilai = Penilai::all();
        $atasan = Atasan::all();
        $pasangan = Pasangan::orderBy('name', 'ASC')->get();
        $user = User::all();
        $mapel = Mapel::orderBy('name', 'ASC')->get() ?? [];
        return view('pegawai.add', compact('user', 'pasangan', 'penilai', 'atasan', 'mapel'));
    }

    // public function store(Request $request)
    // {
    //     $input = User::create($request->all());
    //     $input['mapel'] = json_encode($input['mapel']);
    //     User::create($input);
    //     return redirect('project');
    // }

    public function store(Request $request)
    {
        $data = $request->all();
        if (isset($data['mapel'])) {
            $data['mapel'] = json_encode($data['mapel']);
        } else {
            $data['mapel'] = null;
        }
        User::create($data);
        // $ajukan->simpanBuktiPengajuan($request, 'surat-pengajuan');

        return redirect('project');
        // return redirect('pists.index')->with('status', 'Data berhasil di tambahkan');
    }

    // public function postCreate()
    // {
    //     $pegawai = User::orderBy('nip', 'ASC')->get();
    //     $penilai = Penilai::all();

    //     return view('pists.create', compact('pegawai', 'penilai'));
    // }




    public function pegawai()
    {
        $pegawai = User::where('status', '!=', 'P3K')->orderBy('name', 'ASC')->get();
        $p3k = User::where('status', 'P3K')->get();
        $atasan = Atasan::all();
        return view('pegawai.index', compact('pegawai', 'p3k', 'atasan'));
    }

    public function info($id)
    {
        $pegawai = User::where('status', '!=', 'P3K')->where('status', '!=', 'HONOR')->orderBy('name', 'ASC')->get();
        $p3k = User::where('status', 'P3K')->get();
        $honor = User::where('status', 'HONOR')->get();
        $data = User::where('id', $id)->get(); // tampilkan data pegawai dan pasangan
        $anak = User::with(['anak'])->findOrFail($id); //tampilkan data anak
        return view('pegawai.info', compact('data', 'anak', 'pegawai', 'p3k', 'honor'));
    }


    public function rekap()
    {
        $data = User::with(['anak', 'pasangan'])->get();
        $hasil = User::with(['anak', 'pasangan'])->where('status', '=', 'PNS')->where('status', '=', 'P3K')->get();
        $unitKerja = UnitKerja::first(); // or fetch as needed
        $penilai = Penilai::first(); // or fetch as needed
        return view('pegawai.rekap', compact('data', 'hasil', 'unitKerja', 'penilai'));
    }

    public function rekap_pdf()
    {
        $data = User::with(['anak', 'pasangan'])->get();
        $hasil = User::with(['anak', 'pasangan'])->where('status', '=', 'PNS')->where('status', '=', 'P3K')->get();
        $unitKerja = UnitKerja::first(); // or fetch as needed
        $penilai = Penilai::first(); // or fetch as needed
        $view = view()->make('pegawai.rekap_pdf', compact('data', 'hasil', 'unitKerja', 'penilai'));
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
        $pdf::SetFont('Helvetica', '', 7);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetLeftMargin(30);
        $pdf::SetTopMargin(20);
        $pdf::SetTitle('rekap_kp4');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('rekap_kp4. .pdf');
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }


    public function edit($id)
    {
        $penilai = Penilai::get();
        $atasan = Atasan::get();
        $user = User::findOrfail($id);
        $pasangan = Pasangan::get();
        $mapel = Mapel::orderBy('name', 'ASC')->get();
        // $pasangan = Pasangan::where('id',$id)->get();
        $recommended_foods = [
            "American Black Bear",
            "Asiatic Black Bear",
            "Brown Bear",
            "Giant Panda"
        ];
        return view('project.edit_user', compact('user', 'pasangan', 'penilai', 'atasan', 'recommended_foods', 'mapel'));
    }

    public function update($id, Request $request)
    {
        // DB::table('users')->where('id', $request->id)->update([
        //     'name' => $request->name,
        //     'nip' => $request->nip,
        //     'pangkat_gol' => $request->pangkat_gol,
        //     'jabatan' => $request->jabatan,
        //     'unit_kerja' => $request->unit_kerja,
        // ]);

        // $this->validate($request, [
        //     'job_lain' => 'required'
        // ]);

        $request->validate([
            'job_lain' => 'required'
        ]);

        $data = User::findOrFail($id);
        $data->update($request->all());
        return redirect()->to('pegawai.info/' . $id)->with('status', 'Data berhasil di update');
        // return redirect()->back()->with('status', 'data berhasil diupdate');
        // return redirect('project.index')->with('status', 'data berhasil diupdate');
    }

    public function delete($id)
    {
        User::findOrFail($id);
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect('project');
    }
}
