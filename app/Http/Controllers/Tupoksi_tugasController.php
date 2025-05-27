<?php

namespace App\Http\Controllers;

use App\Models\Tupoksi_tugas;
use Illuminate\Http\Request;

class Tupoksi_tugasController extends Controller
{
    public function index()
    {
        $cars = User::where('id', $id)->get();
        $carModels = $cars->groupBy('id');
        $data = Tupoksi_tugas::all();
        return view('tupoksi_tugas.index', compact('data', 'cars', 'carModels'));
    }
}
