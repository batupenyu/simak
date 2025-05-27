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
        $user = User::with([ 'tugas', 'tutam'])->findOrFail($id);
        return view('project.evaluasi', compact('user'));
    }


    // public function displayImage($filename)

    // {

    //     $path = storage_public('images/' . $filename);

    //     if (!File::exists($path)) {
    //         abort(404);
    //     }

    //     $file = File::get($path);
    //     $type = File::mimeType($path);
    //     $response = Response::make($file, 200);
    //     $response->header("Content-Type", $type);

    //     return $response;
    // }
}
