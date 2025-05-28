<?php

namespace App\Http\Controllers;

use App\Models\Penilai;
use Illuminate\Http\Request;

class PenilaiController extends Controller
{

    public function index()
    {
        // $penilai = Penilai::where('unit_kerja', '=', 'SMK Negeri 1 Koba')->get();
        $penilai = Penilai::all();
        return view('project.index_penilai', compact('penilai'));
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'pangkat_gol' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'unit_kerja' => 'required|string|max:255',
        ]);

        Penilai::create($validatedData);

        return redirect()->route('penilai.index')->with('success', 'Penilai created successfully.');
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

    public function delete($id)
    {
        $penilai = Penilai::findOrFail($id);
        return view('project.delete_penilai', compact('penilai'));
    }

    public function destroy($id)
    {
        $penilai = Penilai::findOrFail($id);
        $penilai->delete();
        return redirect()->route('penilai.index')->with('success', 'Penilai deleted successfully.');
    }
}
