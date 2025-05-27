<?php

namespace App\Http\Controllers;

use App\Models\Umpan;
use Illuminate\Http\Request;

class UmpanController extends Controller
{
    public function edit1($id)
    {
        $umpan = Umpan::findOrFail($id);
        return view('umpan.edit1', compact('umpan'));
    }
    public function edit2($id)
    {
        $umpan = Umpan::findOrFail($id);
        return view('umpan.edit2', compact('umpan'));
    }
    public function edit3($id)
    {
        $umpan = Umpan::findOrFail($id);
        return view('umpan.edit3', compact('umpan'));
    }
    public function edit4($id)
    {
        $umpan = Umpan::findOrFail($id);
        return view('umpan.edit4', compact('umpan'));
    }
    public function edit5($id)
    {
        $umpan = Umpan::findOrFail($id);
        return view('umpan.edit5', compact('umpan'));
    }
    public function edit6($id)
    {
        $umpan = Umpan::findOrFail($id);
        return view('umpan.edit6', compact('umpan'));
    }
    public function edit7($id)
    {
        $umpan = Umpan::findOrFail($id);
        return view('umpan.edit7', compact('umpan'));
    }
    
    public function update($id, Request $request)
    {
        $umpan = Umpan::findOrFail($id);
        $umpan->update($request->all());
        return redirect('project.evaluasi/'.$id);
    }


}
