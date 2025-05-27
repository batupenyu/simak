<?php

namespace App\Http\Controllers;

use App\Models\Atasan;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class AtasanController extends Controller
{

    public function index()
    {
        $atasan = Atasan::where('unit_kerja', '=', 'Cabang Dinas Wilayah I')->get();
        return view('project.index_atasan', compact('atasan'));
    }

    public function edit($id)
    {
        $atasan = Atasan::where('id', $id)->get();
        // $atasan = Atasan::findOrFail($id);
        return view('project.edit_atasan', compact('atasan'));
    }

    public function update($id, Request $request)

    {
        $atasan = Atasan::findOrFail($id);
        $atasan->update($request->all());
        return redirect('atasan.index');
    }
}
