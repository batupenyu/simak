<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;
    protected $table = 'izin';

    protected $fillable = ([
        'user_id',
        'no_telp',
        'no_surat',
        'tgl_surat',
        'tgl_awal',
        'tgl_akhir',
        'alasan_izin',
        'pilih_izin',
        'jlh_hari',
        'jam',
        'jam_2',
    ]);

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function img(){
        return $this->hasMany(Img::class);
    }
}
