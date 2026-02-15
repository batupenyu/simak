<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Rk;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluasiController extends Controller
{
    //
    public function index()
    {

        $project = User::get();
        return view('project.index', ['projectlist' => $project]);
    }


    public function show($id)
    {
        $user = User::with([
            'tugas.rk', 
            'tugas.tupoksi', 
            'tutam.rk', 
            'tutam.tuti', 
            'penilai'
        ])->findOrFail($id);
        return view('project.evaluasi', compact('user'));
    }


}
