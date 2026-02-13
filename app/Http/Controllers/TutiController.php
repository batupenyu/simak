<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Rk;
use App\Models\Tutam;
use App\Models\Tuti;
use App\Models\User;
use Illuminate\Http\Request;

class TutiController extends Controller
{

    public function create($id)
    {
        $tutam = Tutam::with('user')->where('id',$id)->first();
        return view('tuti.add', compact(   'tutam'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'indikator' => 'required',
        //     'target' => 'required',
        //     'satuan' => 'required'
        // ]);

        $tuti = Tuti::create($request->all());
        return redirect('project.main/'.$tuti->tutam->user_id);
    }

    public function editTuti($id)
    {
        $tuti = Tuti::with('tutam')->findOrFail($id);
        return view('tuti.edit',compact('tuti'));
    }

    public function updateTuti($id, Request $request)
    {
        $tuti = Tuti::findOrFail($id);
        $tuti->update($request->all());
        return redirect('project.main/'.$tuti->tutam->user_id)->with('status','Update Berhasil');
    }

    public function delete($id)
    {
        Tuti::findOrFail($id);
    }

    public function destroy($id,)
    {
        $hapus = Tuti::findOrFail($id);
        $user_id = $hapus->tutam->user_id;
        $hapus->delete();
        return redirect('project.main/'.$user_id);
    }
}
