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

    public function create()
    {
        $project=Project::all();
        $user=User::all();
        $rk=Rk::all();
        return view('tugas.add',compact('project','user','rk'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'tugas' => 'required'
        // ]);

       Tugas::create($request->all());
        return redirect('project');
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
        return redirect()->to('project')->with('status', 'Data berhasil di update');
    }

    public function delete($id)
    {
        Tugas::findOrFail($id);
    }

    public function destroy($id, )
    {
        $hapus = Tugas::findOrFail($id);
        $hapus->delete();
        return redirect('project');
    }
}
