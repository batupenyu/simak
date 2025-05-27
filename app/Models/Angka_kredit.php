<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angka_kredit extends Model
{
    use HasFactory;
    protected $table = 'angka_kredit';
    protected $fillable = ([
        'user_id',
        'penilai_id',
        'predikat',
        'tgl_awal_penilaian',
        'tgl_akhir_penilaian',
        'tgl_penetapan',
    ]);

    public function user()
    {
        return $this->belongsTo(User::class);
        // return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function penilai()
    {
        return $this->belongsTo(Penilai::class);
    }
}
