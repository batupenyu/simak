<?php

namespace App\Http\Controllers;

use App\Models\Rk;
use App\Models\User;
use App\Models\Tugas;
use App\Models\Project;
use App\Models\Tutam;
use Illuminate\Http\Request;

class TugasController extends Controller
{

    public function create($id)
    {
        $project = Project::all();
        $user = User::where('id', $id)->first();
        $rk = Rk::all();
        return view('tugas.add', compact('project', 'user', 'rk'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'tugas' => 'required'
        // ]);

        Tugas::create($request->all());
        return redirect('project.main/' . $request->user_id)->with('status', 'Berhasil Simpan');
    }

    public function edit($id)
    {

        $tugas = Tugas::with(['user','rk'])->where('id',$id)->get();
        $rk = Rk::all();
        // $user = User::all();
        // $project = Project::all();
        // return view('project.edit_tugas', compact('rk','user' ,'tugas'));
        return view('project.edit_tugas', compact('tugas','rk'));
    }


    public function update($id, Request $request)
    {
        $tugas = Tugas::findOrFail($id);
        $tugas->update($request->all());
        return redirect('project.main/' . $request->user_id)->with('status', 'Data berhasil di update');
    }

    public function delete($id)
    {
        Tugas::findOrFail($id);
    }

    public function destroy($id)
    {
        $tugas = Tugas::findOrFail($id);
        $user_id = $tugas->user_id;
        $tugas->delete();
        return redirect('project.main/' . $user_id)->with('status', 'Berhasil Hapus');
    }
}
