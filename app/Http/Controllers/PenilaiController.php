<?php

namespace App\Http\Controllers;

use App\Models\Penilai;
use App\Models\User;
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
            'user_id' => 'nullable|exists:users,id',
        ]);

        $data = $validatedData;
        
        // If user_id is provided, link it and also update user's penilai_id
        if (!empty($data['user_id'])) {
            $user = User::find($data['user_id']);
            $penilai = Penilai::create($data);
            $user->penilai_id = $penilai->id;
            $user->save();
        } else {
            Penilai::create($data);
        }

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
        
        // If user_id is provided, also update user's penilai_id
        if ($request->has('user_id')) {
            $user = User::find($request->user_id);
            if ($user) {
                $user->penilai_id = $penilai->id;
                $user->save();
            }
        }
        
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
