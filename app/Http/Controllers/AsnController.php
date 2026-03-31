<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsnController extends Controller
{
    public function index()
    {
        return redirect('/pegawai');
    }

    public function create()
    {
        return view('asn.create');
    }

    public function store(Request $request)
    {
        // TODO: Implement store logic
        return redirect()->route('asn.index');
    }

    public function show($id)
    {
        return view('asn.show', compact('id'));
    }

    public function edit($id)
    {
        return view('asn.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update logic
        return redirect()->route('asn.index');
    }

    public function destroy($id)
    {
        // TODO: Implement delete logic
        return redirect()->route('asn.index');
    }
}
