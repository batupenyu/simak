<?php

namespace App\Http\Controllers;

use App\Models\MYPDF;
use App\Models\Penilai;
use App\Models\Rk;
use App\Models\Tim;
use App\Models\UnitKerja;
use App\Models\User;
use Elibyy\TCPDF\Facades\TCPDF;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class TimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tim = Tim::paginate(4);
        $unit = UnitKerja::first();
        $rkatasan = Rk::all();
        $penilai = Penilai::all();
        $anggota = User::all();
        return view('tim.index', compact('tim', 'unit', 'rkatasan', 'penilai', 'anggota'));
    }

    public function timpdf()
    {
        $tim = Tim::paginate(7);
        $unit = UnitKerja::first();
        $rkatasan = Rk::all();
        $penilai = Penilai::all();
        $anggota = User::all();
        $view = view()->make('tim.timpdf', compact('tim', 'unit', 'rkatasan', 'penilai', 'anggota'));
        $html = $view->render();

        $pdf = new Dompdf();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        return $pdf->stream('timpdf.pdf');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rkatasan = Rk::all();
        $penilai = Penilai::all();
        $anggota = User::all();
        return view('tim.create', compact('rkatasan', 'penilai', 'anggota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tim::create($request->all());
        return redirect()->route('tim.index');
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
        $pegawai = User::orderBy('nip', 'DESC')->get();
        $rkatasan = Rk::all();
        $penilai = Penilai::all();
        $tim = Tim::findOrFail($id);
        $servicesarray = Tim::select('anggota')->get()->toArray();
        $json = json_encode($servicesarray);
        $data = Tim::pluck('anggota')->toArray();
        return view('tim.edit', compact('tim', 'pegawai', 'json', 'servicesarray', 'data', 'penilai', 'rkatasan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $data = Tim::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('tim.index');
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
        return redirect()->route('tim.index');
    }
}
