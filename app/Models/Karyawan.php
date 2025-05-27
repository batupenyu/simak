<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $fillable = [
        'nama',
        'nip',
        'nomor_karpeg',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'pangkat',
        'tmt_pangkat',
        'jabatan',
        'tmt_jabatan',
        'unit_kerja',
        'instansi',
        'ak_integrasi',
    ];
}
