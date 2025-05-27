<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Rk;
use App\Models\Tugas;
use App\Models\Tutam;
use App\Models\User;
use Illuminate\Http\Request;

class TutamController extends Controller
{

    public function create($id)
    {
        $user = User:: where('id',$id)->first();
        $rk = Rk::all();
        return view('tutam.add', compact( 'user','rk'));
        // return $user;
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'tugas' => 'required'
        // ]);

        Tutam::create($request->all());

        return redirect('project');
    }

    public function editTutam($id)
    {
        // $user = User::all();
        // $tutam = Tutam::where('id',$id)->get();
        $tutam = Tutam::with(['user', 'rk'])->where('id', $id)->get();
        $rk = Rk::all();
        return view('tutam.edit', compact('tutam','rk'));
    }

    public function updateTutam($id, Request $request)
    {
        $tutam = Tutam::findOrFail($id);
        $tutam->update($request->all());
        return redirect('project')->with('status','Berhasil Update');
    }

    public function delete($id)
    {
        Tutam::findOrFail($id);
    }

    public function destroy($id,)
    {
        $hapus = Tutam::findOrFail($id);
        $hapus->delete();
        return redirect('project');
    }
}
