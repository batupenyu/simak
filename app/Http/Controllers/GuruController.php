<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        // dd($guru);
        return view('guru', ['gurulist' => $guru]);
    }

    public function show($id)
    {
        $guru = Guru::with('class.students')
            ->findOrFail($id);
        return view('guru-detail', ['guru' => $guru]);
    }
}
