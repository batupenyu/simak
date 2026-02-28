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
    public function store1(Request $request)
    {
        $eks = new Eks();
        $eks->user_id = $request->user_id;
        $eks->eks1 = $request->eks1;
        $eks->save();
        return redirect('project.main/'.$request->user_id);
    }
    public function store2(Request $request)
    {
        $eks = new Eks();
        $eks->user_id = $request->user_id;
        $eks->eks2 = $request->eks2;
        $eks->save();
        return redirect('project.main/'.$request->user_id);
    }
    public function store3(Request $request)
    {
        $eks = new Eks();
        $eks->user_id = $request->user_id;
        $eks->eks3 = $request->eks3;
        $eks->save();
        return redirect('project.main/'.$request->user_id);
    }
    public function store4(Request $request)
    {
        $eks = new Eks();
        $eks->user_id = $request->user_id;
        $eks->eks4 = $request->eks4;
        $eks->save();
        return redirect('project.main/'.$request->user_id);
    }
    public function store5(Request $request)
    {
        $eks = new Eks();
        $eks->user_id = $request->user_id;
        $eks->eks5 = $request->eks5;
        $eks->save();
        return redirect('project.main/'.$request->user_id);
    }
    public function store6(Request $request)
    {
        $eks = new Eks();
        $eks->user_id = $request->user_id;
        $eks->eks6 = $request->eks6;
        $eks->save();
        return redirect('project.main/'.$request->user_id);
    }
    public function store7(Request $request)
    {
        $eks = new Eks();
        $eks->user_id = $request->user_id;
        $eks->eks7 = $request->eks7;
        $eks->save();
        return redirect('project.main/'.$request->user_id);
    }
    public function create1()
    {
        $user = User::all();
        return view('ekspektasi.add1',compact('user'));

    }
    public function create2()
    {
        $user = User::all();
        return view('ekspektasi.add2',compact('user'));
    }
    public function create3()
    {
        $user = User::all();
        return view('ekspektasi.add3',compact('user'));
    }
    public function create4()
    {
        $user = User::all();
        return view('ekspektasi.add4',compact('user'));
    }
    public function create5()
    {
        $user = User::all();
        return view('ekspektasi.add5',compact('user'));
    }
    public function create6()
    {
        $user = User::all();
        return view('ekspektasi.add6',compact('user'));
    }
    public function create7()
    {
        $user = User::all();
        return view('ekspektasi.add7',compact('user'));
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
