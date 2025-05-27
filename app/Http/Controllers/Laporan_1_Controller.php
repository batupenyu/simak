<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class Laporan_1_Controller extends Controller
{
    // public function index()
    // {

    //     $project = Project::get();
    //     return view('project.index', ['projectlist' => $project]);
    // }


    public function show($id)
    {
        $user = User::with([ 'tugas',   'tutam' ])
        ->findOrFail($id);
        return view('project.report', ['user' => $user]);
    }
}
