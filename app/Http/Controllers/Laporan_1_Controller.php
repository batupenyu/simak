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
        // Load user with only essential relationships to avoid circular references
        $user = User::select([
            'id', 'name', 'nip', 'pangkat_gol', 'jabatan', 'unit_kerja', 'penilai_id',
            'tgl_awal', 'tgl_akhir', 'tgl_pegawai', 'tgl_penilai', 'tgl_atasan'
        ])->findOrFail($id);
        
        // Load relationships individually to prevent circular references
        $user->setRelation('penilai', $user->penilai()->select(['id', 'nama', 'nip', 'pangkat_gol', 'jabatan', 'unit_kerja'])->first());
        $user->setRelation('atasan', $user->atasan()->select(['id', 'nama', 'nip', 'pangkat_gol', 'jabatan', 'unit_kerja'])->first());
        
        return view('project.report', ['user' => $user]);
    }
}
