<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Sdm;
use App\Models\Skema;
use App\Models\User;
use Illuminate\Http\Request;

class SkemaController extends Controller
{

    public function index()
    {

        $skema = Skema::all();
        return view('skema.index', compact('skema'));
    }

    public function create()

    {
        $project = Project::select('id', 'title')->get();
        $user = User::select('id', 'name')->get();
        return view('skema.add', compact('project', 'user'));
    }

    public function store(Request $request)
    {
        Skema::create($request->all());
        return redirect('project.index');
    }



    public function edit($id)
    {
        $project = Project::all();
        $user = User::all();
        $skema = Skema::findOrFail($id);
        return view('skema.edit', compact('project', 'user', 'skema'));
    }



    public function update($id, Request $request)
    {
        $data = Skema::findOrFail($id);
        $data->update($request->all());
        return redirect()->to('project.evaluasi/'.$id)->with('status', 'Data berhasil di update');
    }



    public function delete($id)
    {
        Skema::with('project', 'user')->findOrFail($id);
    }

    public function destroy($id)
    {
        $hapus = Skema::with('project', 'user')->findOrFail($id);
        $hapus->delete();
        return redirect()->to('project.evaluasi/'.$id);
    }
}
