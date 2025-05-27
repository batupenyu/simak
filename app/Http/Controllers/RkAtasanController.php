<?php

namespace App\Http\Controllers;

use App\Models\Rk;
use Illuminate\Http\Request;

class RkAtasanController extends Controller
{
    public function index()
    {
        $rk = Rk::all();
        return view('rk.index', compact('rk'));
    }

    public function create()
    {
        return view('rk.create');
    }

    public function store(Request $request)
    {
        Rk::create($request->all());
        return redirect()->route('rk.index');
    }

    public function show(Rk $rk)
    {
        //
    }

    public function edit(Rk $rk)
    {
        return view('rk.edit',compact('rk'));
    }

    public function update(Request $request, Rk $rk)
    {
        $rk->update($request->all());
        return redirect()->route('rk.index');
    }

    public function destroy(Rk $rk)
    {
        $rk->delete();
        return redirect()->route('rk.index');
    }
}
