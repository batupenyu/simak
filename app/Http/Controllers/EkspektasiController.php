<?php

namespace App\Http\Controllers;

use App\Models\Eks;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EkspektasiController extends Controller
{
    public function index()
    {
        $eks = Eks::all();
        return view('ekspektasi.index', compact('eks'));
    }
    public function create1()
    {
        $user = User::all();
        return view('ekspektasi.add1',compact('user'));

    }
    public function edit_1($id)
    {
        $ekspektasi = Eks::where('id', $id)->get();
        return view('lampiran.edit_perilaku_1',compact('ekspektasi'));
    }
    public function edit_2($id)
    {
        $ekspektasi = Eks::where('id', $id)->get();
        return view('lampiran.edit_perilaku_2',compact('ekspektasi'));
    }
    public function edit_3($id)
    {
        $ekspektasi = Eks::where('id', $id)->get();
        return view('lampiran.edit_perilaku_3',compact('ekspektasi'));
    }
    public function edit_4($id)
    {
        $ekspektasi = Eks::where('id', $id)->get();
        return view('lampiran.edit_perilaku_4',compact('ekspektasi'));
    }
    public function edit_5($id)
    {
        $ekspektasi = Eks::where('id', $id)->get();
        return view('lampiran.edit_perilaku_5',compact('ekspektasi'));
    }
    public function edit_6($id)
    {
        $ekspektasi = Eks::where('id', $id)->get();
        return view('lampiran.edit_perilaku_6',compact('ekspektasi'));
    }
    public function edit_7($id)
    {
        $ekspektasi = Eks::where('id', $id)->get();
        return view('lampiran.edit_perilaku_7',compact('ekspektasi'));
    }


    public function update($id,Request $request)
    {
        $eks = Eks::findOrFail($id);
        $eks->update($request->all());
        return redirect()->to('project.main/'.$id)->with('status', 'Data berhasil di update');
    }
}
