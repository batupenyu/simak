<?php

namespace App\Http\Controllers;

use App\Models\Rk;
use App\Models\User;
use App\Models\Tugas;
use App\Models\Project;
use App\Models\Tupoksi;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;

class TupoksiController extends Controller

{
    public function create($id)
    {
        $cars = Tugas::with('user')->get();
        $carModels = $cars->groupBy('user_id');

        $results = Tugas:: orderBy('name', 'ASC')->get();
        $attributes = array();
        foreach ($results as $v) {
            if (!isset($attributes[$v->name]))
            {
                $attributes[$v->name] = array();
            }
            $attributes[$v->name][$v->value] = $v->value;
        }

        $tugasGroup = Tugas::with('user')->get()->groupBy('user');


        $product  =  Tugas::where('id', $id)->with('user')->first();// ok
        $data = $product->data;


        $user = User::where('id',$id)->first();
        $rk = Rk::all();
        $tugas = Tugas::all();
        return view('tupoksi.add',compact('tugas','rk','user','cars', 'carModels', 'results', 'attributes', 'tugasGroup','data','product'));
    }

    public function store (  Request $request)
    {
        // $request->validate([
        //     'tugas_id' => 'required',
        //     'name' => 'required',
        //     'indikator' => 'required',
        //     'aspek' => 'required',
        //     'target' => 'required',
        //     'satuan' => 'required',
        // ]);


        $tupoksi = Tupoksi::create([

            // 'user_id' => auth()->id(),
            'user_id' => request('user_id'),
            'tugas_id' => request('tugas_id'),
            'indikator' => request('indikator'),
            'aspek' => request('aspek'),
            'target' => request('target'),
            'satuan' => request('satuan')
        ]);

        // $tupoksi = Tupoksi::create($request->all( ));
        return redirect('project.main/'.request('user_id'));

        // $tupoksi = Tupoksi::findOrFail($id);
        // $tupoksi->create($request->all());
        // return redirect('project');
        // dd($tupoksi);
    }

    public function edit($id)
    {
        $tupoksi = Tupoksi::findOrFail($id);
        return view('project.edit_tupoksi',compact('tupoksi') );
    }

    public function update($id, Request $request)
    {
        $tupoksi = Tupoksi::findOrFail($id);
        $tupoksi->update($request->all());
        return redirect('project.evaluasi/'.$tupoksi->user_id);

    }

    public function editIndikator($id)
    {
        $tupoksi = Tupoksi::Where('id',$id)->get();
        return view('project.edit_indikator',compact('tupoksi') );
    }

    public function updateIndikator($id, Request $request)
    {
        $tupoksi = Tupoksi::findOrFail($id);
        $tupoksi->update($request->all());
        return redirect('project.evaluasi/'.$tupoksi->user_id);
    }

    public function editAspek($id)
    {
        $tupoksi = Tupoksi::Where('id',$id)->get();
        return view('project.edit_aspek',compact('tupoksi') );
    }

    public function updateAspek($id, Request $request)
    {
        $tupoksi = Tupoksi::findOrFail($id);
        $tupoksi->update($request->all());
        return redirect('project.evaluasi/'.$tupoksi->user_id);
    }

    public function editTarget($id)
    {
        $tupoksi = Tupoksi::Where('id',$id)->get();
        return view('project.edit_target',compact('tupoksi') );
    }

    public function updateTarget($id, Request $request)
    {
        $tupoksi = Tupoksi::findOrFail($id);
        $tupoksi->update($request->all());
        return redirect('project.evaluasi/'.$tupoksi->user_id);
    }

    public function delete($id)
    {
        Tupoksi::findOrFail($id);
    }

    public function destroy($id,)
    {
        $hapus = Tupoksi::findOrFail($id);
        $user_id = $hapus->user_id;
        $hapus->delete();
        return redirect('project.main/'.$user_id);
    }

    public function getAtasanProfileForReport($id)
    {
        $tupoksi = Tupoksi::with(['user', 'user.atasan', 'user.penilai'])->findOrFail($id);
        
        // Return data for the report
        $data = [
            'tupoksi' => $tupoksi,
            'user' => $tupoksi->user,
            'atasan' => $tupoksi->user->atasan ?? null,
            'penilai' => $tupoksi->user->penilai ?? null
        ];
        
        return view('tupoksi.report', $data);
    }
}
