<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'cuti';

    protected $fillable = ([
        'user_id',
        'no_telp',
        'no_surat',
        'tgl_surat',
        'tgl_awal',
        'tgl_akhir',
        'tglmasuk',
        'alasan_cuti',
        'jlh_hari',
        'jenis_cuti',
        'tahun_1',
        'tahun_2',
        'tahun_3',
        'sisa_1',
        'sisa_2',
        'sisa_3'
    ]);

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
