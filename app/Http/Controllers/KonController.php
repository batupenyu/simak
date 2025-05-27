<?php

namespace App\Http\Controllers;

use App\Models\Kon;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class KonController extends Controller
{

    public function index()
    {

        $kon = Kon::all();
        return view('kon.index', compact('kon'));
    }

    public function create()

    {
        $project = Project::select('id', 'title')->get();
        $user = User::select('id', 'name')->get();
        return view('kon.add', compact('project', 'user'));
    }

    public function store(Request $request)
    {
        Kon::create($request->all());
        return redirect('project.index');
    }



    public function edit($id)
    {
        $project = Project::all();
        $user = User::all();
        $kon = Kon::findOrFail($id);
        return view('kon.edit', compact('project', 'user', 'kon'));
    }



    public function update($id, Request $request)
    {
        $data = Kon::findOrFail($id);
        $data->update($request->all());
        // return redirect('project.index');
        return redirect()->to('project.evaluasi/'. $id)->with('status', 'Data berhasil di update');
    }



    public function delete($id)
    {
        Kon::with('project', 'user')->findOrFail($id);
    }

    public function destroy($id)
    {
        $hapus = Kon::with('project', 'user')->findOrFail($id);
        $hapus->delete();
        return redirect()->to('project.evaluasi/' . $id);
    }
}
