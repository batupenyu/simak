<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session ;

class SessionController extends Controller
{
    public function index()
    {
        return view('sesi/index');
    }

    public function login(Request $request)
    {

        Session::flash ('email', $request->email);

        $request->validate([

            'email'=>'required',
            'password'=>'required'
        ],
        [
            'email.required'=>'email wajib diisi',
            'password.required'=>'password wajib diisi',
        ]);


        $infologin = [

            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if (Auth::attempt($infologin)) {
            return redirect('project');
        } else {
            return redirect('sesi')->withErrors('Username dan Password Invalid');
        }
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('sesi')->with('success','Berhasil logout');
    }

    public function register()
    {
        return view('sesi/register');
    }

    public function create(Request $request)
    {

        Session::flash('name', $request->name);
        Session::flash('email', $request->email);

        $request->validate([
            
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ],
        [
            'name.required'=>'name wajib di isi',
            'email.required'=>'email wajib di isi',
            'email.email'=>'email harus valid',
            'email.unique'=>'email sudah terdaftar',
            'password.required'=>'password wajib di isi',
            'password.min'=>'password harus berisi 6 karakter'
        ]);

        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ];

        User::create ($data);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if (Auth::attempt($infologin)) {
            return redirect('project')->with('success', Auth::user()->name.'Berhasil login');
        } else {
            return redirect('sesi')->withErrors('Username dan Password Invalid');
        }
        
    }

}
