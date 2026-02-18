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
        // $atasan = Atasan::where('unit_kerja', '=', 'Cabang Dinas Wilayah I')->get();
        $atasan = Atasan::all();
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
        
        // If user_id is provided, also update user's atasan_id
        if ($request->has('user_id')) {
            $user = User::find($request->user_id);
            if ($user) {
                $user->atasan_id = $atasan->id;
                $user->save();
            }
        }
        
        return redirect('atasan.index');
    }

    public function create()
    {
        return view('project.create_atasan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'pangkat_gol' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'unit_kerja' => 'required|string|max:255',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $data = $request->all();
        
        // If user_id is provided, link it and also update user's atasan_id
        if (!empty($data['user_id'])) {
            $user = User::find($data['user_id']);
            $atasan = Atasan::create($data);
            $user->atasan_id = $atasan->id;
            $user->save();
        } else {
            Atasan::create($data);
        }

        return redirect()->route('index_atasan')->with('success', 'Atasan created successfully.');
    }

    public function destroy($id)
    {
        $atasan = Atasan::findOrFail($id);
        $atasan->delete();

        return redirect()->route('index_atasan')->with('success', 'Atasan deleted successfully.');
    }
}
