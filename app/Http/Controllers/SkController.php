<?php

namespace App\Http\Controllers;

use App\Models\Sk;
use App\Models\User;
use Doctrine\DBAL\Schema\Index;
use Elibyy\TCPDF\Facades\TCPDF;
use Dompdf\Dompdf;
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

        $pdf = new Dompdf();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('SPMT an ' . $nama . '.pdf');
    }
}
