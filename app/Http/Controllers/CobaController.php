<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function index($user)
    {
        return ['nama' => "anis", 'age' => 30];
    }
}
