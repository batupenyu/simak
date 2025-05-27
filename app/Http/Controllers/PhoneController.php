<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;

class PhoneController extends Controller
{

    public function index()
    {

        $phone = Phone::get();
        return view('phone.index', ['phonelist' => $phone]);

    }
}
