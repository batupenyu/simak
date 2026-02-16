<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class Laporan_1_Controller extends Controller
{

    public function show($id)
    {
        $user = User::select([
            'id', 'name', 'nip', 'pangkat_gol', 'jabatan', 'unit_kerja', 
            'tgl_awal', 'tgl_akhir', 'tgl_pegawai', 'tgl_penilai', 'tgl_atasan'
        ])->with([
            'tutam:id,user_id,name,rk_id',
            'tutam.rk:id,name',
            'tutam.tuti:id,tutam_id,aspek,indikator,target,satuan,realisasi',
            'penilai:id,nama,nip,pangkat_gol,jabatan,unit_kerja',
            'atasan:id,nama,nip,pangkat_gol,jabatan,unit_kerja'
        ])->findOrFail($id);
        return view('project.report', ['user' => $user]);
    }
}
