<?php

namespace App\Http\Controllers;

use App\Models\Umpan;
use App\Models\User;
use Illuminate\Http\Request;

class UmpanController extends Controller
{
    public function store1(Request $request)
    {
        $umpan = new Umpan();
        $umpan->user_id = $request->user_id;
        $umpan->umpan1 = $request->umpan1;
        $umpan->save();
        return redirect('project.evaluasi/'.$request->user_id);
    }
    public function store2(Request $request)
    {
        $umpan = new Umpan();
        $umpan->user_id = $request->user_id;
        $umpan->umpan2 = $request->umpan2;
        $umpan->save();
        return redirect('project.evaluasi/'.$request->user_id);
    }
    public function store3(Request $request)
    {
        $umpan = new Umpan();
        $umpan->user_id = $request->user_id;
        $umpan->umpan3 = $request->umpan3;
        $umpan->save();
        return redirect('project.evaluasi/'.$request->user_id);
    }
    public function store4(Request $request)
    {
        $umpan = new Umpan();
        $umpan->user_id = $request->user_id;
        $umpan->umpan4 = $request->umpan4;
        $umpan->save();
        return redirect('project.evaluasi/'.$request->user_id);
    }
    public function store5(Request $request)
    {
        $umpan = new Umpan();
        $umpan->user_id = $request->user_id;
        $umpan->umpan5 = $request->umpan5;
        $umpan->save();
        return redirect('project.evaluasi/'.$request->user_id);
    }
    public function store6(Request $request)
    {
        $umpan = new Umpan();
        $umpan->user_id = $request->user_id;
        $umpan->umpan6 = $request->umpan6;
        $umpan->save();
        return redirect('project.evaluasi/'.$request->user_id);
    }
    public function store7(Request $request)
    {
        $umpan = new Umpan();
        $umpan->user_id = $request->user_id;
        $umpan->umpan7 = $request->umpan7;
        $umpan->save();
        return redirect('project.evaluasi/'.$request->user_id);
    }
    public function create1()
    {
        $user = User::all();
        return view('umpan.create1', compact('user'));
    }
    public function create2()
    {
        $user = User::all();
        return view('umpan.create2', compact('user'));
    }
    public function create3()
    {
        $user = User::all();
        return view('umpan.create3', compact('user'));
    }
    public function create4()
    {
        $user = User::all();
        return view('umpan.create4', compact('user'));
    }
    public function create5()
    {
        $user = User::all();
        return view('umpan.create5', compact('user'));
    }
    public function create6()
    {
        $user = User::all();
        return view('umpan.create6', compact('user'));
    }
    public function create7()
    {
        $user = User::all();
        return view('umpan.create7', compact('user'));
    }
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
        return redirect('project.evaluasi/'.$umpan->user_id);
    }


}
