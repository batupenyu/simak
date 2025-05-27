<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:karyawan',
            'nomor_karpeg' => 'required|unique:karyawan',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'pangkat' => 'required',
            'tmt_pangkat' => 'required|date',
            'jabatan' => 'required',
            'tmt_jabatan' => 'required|date',
            'unit_kerja' => 'required',
            'instansi' => 'required',
            'ak_integrasi' => 'required',
        ]);

        Karyawan::create($request->all());

        return redirect()->route('karyawan.index')
            ->with('success', 'Karyawan created successfully.');
    }

    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:karyawan,nip,' . $karyawan->id,
            'nomor_karpeg' => 'required|unique:karyawan,nomor_karpeg,' . $karyawan->id,
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'pangkat' => 'required',
            'tmt_pangkat' => 'required|date',
            'jabatan' => 'required',
            'tmt_jabatan' => 'required|date',
            'unit_kerja' => 'required',
            'instansi' => 'required',
            'ak_integrasi' => 'required',
        ]);

        $karyawan->update($request->all());

        return redirect()->route('karyawan.index')
            ->with('success', 'Karyawan updated successfully');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->route('karyawan.index')
            ->with('success', 'Karyawan deleted successfully');
    }
}
