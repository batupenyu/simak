<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Laporan_1_Controller extends Controller
{

    public function show($id)
    {
        // Load user with penilai and atasan relationships
        $user = User::with(['penilai' => function($query) {
                $query->select(['id', 'nama', 'nip', 'pangkat_gol', 'jabatan', 'unit_kerja']);
            }, 'atasan' => function($query) {
                $query->select(['id', 'nama', 'nip', 'pangkat_gol', 'jabatan', 'unit_kerja']);
            }])
            ->select([
                'id', 'name', 'nip', 'pangkat_gol', 'jabatan', 'unit_kerja', 'penilai_id', 'atasan_id',
                'tgl_awal', 'tgl_akhir', 'tgl_pegawai', 'tgl_penilai', 'tgl_atasan'
            ])->findOrFail($id);
        
        return view('project.report', ['user' => $user]);
    }
}
