<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class Laporan_1_Controller extends Controller
{

    public function show($id)
    {
        $user = User::with([
            'tutam.rk', 
            'tutam.tuti', 
            'penilai', 
            'atasan'
        ])->findOrFail($id);
        return view('project.report', ['user' => $user]);
    }
}
