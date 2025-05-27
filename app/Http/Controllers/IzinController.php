<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use App\Models\User;

use Illuminate\Http\Request;

class IzinController extends Controller
{
    public function index ()
    {
        $data = User::get();
        return view('izin.index', compact('data'));
    }

    public function show($id)
    {
        
        $pegawai = User::all();
        $data = Izin:: with(['user'])->where('id', $id)->get(); 
        $izin = User:: with(['izin'])->where('id', $id)->get();
        $dat = User:: withCount(['izin'])->where('id', $id)->get();
        return view('izin.show', compact('izin','pegawai','data','dat'));
    }
    

    public function create()
    {
        $pegawai = User::all();
        return view('izin.create',compact('pegawai'));
        
    }


    public function store(Request $request)
    {
        $izin = Izin::create($request->all());
        return redirect('izin.index');
    }

    public function edit($id)
    {
        $user=User::all();
        $izin = Izin::with('user')->findOrFail($id);
        return view('izin.edit', compact('izin','user'));
    }

    public function update($id,Request $request)
    {
        $data = Izin::findOrFail($id);
        $data ->update($request->all());
        return redirect('izin.index');
    }

    public function delete($id)
    {
        Izin::findOrFail($id);
    }

    public function destroy($id)
    {
        $data = Izin::findOrFail($id);
        $data->delete();
        return redirect('project.index');
    }


    public function form($id)
    {
        $izin = izin::with(['user'])->where('id', $id)->get(); 
        $user = User:: with(['penilai','atasan'])->where('id', $id)->get(); 
        return view('izin.form', compact('izin','user'));
    }
    public function srtizin($id)
    {
        $izin = izin::with(['user'])->where('id', $id)->get(); 
        $user = User:: with(['penilai','atasan'])->where('id', $id)->get(); 
        return view('izin.srtizin', compact('izin','user'));
    }
    public function keluar($id)
    {
        $izin = izin::with(['user'])->where('id', $id)->get(); 
        $user = User:: with(['penilai','atasan'])->where('id', $id)->get(); 
        return view('izin.keluar', compact('izin','user'));
    }
    public function surat($id)
    {
        $izin = izin::with(['user'])->where('id', $id)->get(); 
        $user = User:: with(['penilai','atasan'])->where('id', $id)->get(); 
        return view('izin.surat', compact('izin','user'));
    }
    public function suket($id)
    {
        $izin = izin::with(['user'])->where('id', $id)->get(); 
        $user = User:: with(['penilai','atasan'])->where('id', $id)->get(); 

        return view('izin.suket', compact('izin','user'));
    }
}