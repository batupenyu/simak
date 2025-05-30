<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    public function index()
    {
        $unitKerjas = UnitKerja::all();
        return view('unit_kerja.index', compact('unitKerjas'));
    }

    public function create()
    {
        return view('unit_kerja.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:unit_kerja,name',
            'description' => 'nullable|string',
        ]);

        UnitKerja::create($request->all());

        return redirect()->route('unit_kerja.index')->with('success', 'Unit Kerja created successfully.');
    }

    public function show($id)
    {
        $unitKerja = UnitKerja::findOrFail($id);
        return view('unit_kerja.show', compact('unitKerja'));
    }

    public function edit($id)
    {
        $unitKerja = UnitKerja::findOrFail($id);
        return view('unit_kerja.edit', compact('unitKerja'));
    }

    public function update(Request $request, $id)
    {
        $unitKerja = UnitKerja::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:unit_kerja,name,' . $unitKerja->id,
            'description' => 'nullable|string',
        ]);

        $unitKerja->update($request->all());

        return redirect()->route('unit_kerja.index')->with('success', 'Unit Kerja updated successfully.');
    }

    public function destroy($id)
    {
        $unitKerja = UnitKerja::findOrFail($id);
        $unitKerja->delete();

        return redirect()->route('unit_kerja.index')->with('success', 'Unit Kerja deleted successfully.');
    }
}
