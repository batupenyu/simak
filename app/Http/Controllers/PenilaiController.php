<?php

namespace App\Http\Controllers;

use App\Models\Penilai;
use Illuminate\Http\Request;

class PenilaiController extends Controller
{

    public function index()
    {
        $penilai = Penilai::where('unit_kerja', '=', 'SMK Negeri 1 Koba')->get();
        return view('project.index_penilai', compact('penilai'));
    }

    public function edit($id)
    {
        $penilai = Penilai::findOrFail($id);
        return view('project.edit_penilai', compact('penilai'));
        // return $penilai;
    }


    public function update($id, Request $request)
    {
        $penilai = Penilai::findOrFail($id);
        $penilai->update($request->all());
        // return redirect()->to('project.main/' . $id)->with('status', 'Data berhasil di update');
        return redirect('penilai.index');
    }
}
