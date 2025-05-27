<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    public function index()
    {
        // $eskul = Extracurricular::all();
        // $eskul = Extracurricular::with('students')->get();
        $eskul = Extracurricular::get();
        return view('eskul', ['eskullist' => $eskul]);
        // dd($eskul);
    }

    public function show($id)
    {
        $eskul = Extracurricular::with('students')
            ->findOrFail($id);
        return view('eskul-detail', ['eskul' => $eskul]);
    }
}
