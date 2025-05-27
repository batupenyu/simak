<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Sdm;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class SdmController extends Controller
{
    //

    public function index()
    {

        $sdm = Sdm::all();
        return view('sdm.index',compact('sdm'));
    }
    
    public function create()

    {
        $project = Project::select('id','title')->get();
        $user = User::select('id','name')->get();
        return view('sdm.add', compact('project','user'));
    }

    public function store(Request $request)
    {
        Sdm::create ($request->all());
        return redirect('project.index');
    }

    

    public function edit($id)
    {
        $project = Project::all();
        $user = User::all();
        $sdm = Sdm::findOrFail($id);
        return view('sdm.edit', compact('project','user','sdm' ));
    }
    


    public function update($id, Request $request)
    {
        $data = Sdm::findOrFail($id);
        $data->update($request->all());
        // return redirect('project.index');
        return redirect()->to('project.evaluasi/' . $id)->with('status', 'Data berhasil di update');
    }


    
    public function delete($id)
    {
        Sdm::with('project','user')->findOrFail($id);
    }
    
    public function destroy($id)
    {
        
    $hapus = Sdm::with('project','user')->findOrFail($id);
    $hapus->delete();
    return redirect()->to('project.evaluasi/'.$id);


    }

   

}
