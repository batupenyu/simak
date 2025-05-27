<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilai extends Model
{
    use HasFactory;

    protected $table = "penilai";
    protected $guarded = ['id'];
    protected $fillable = ([
        'nama',
        'nip',
        'pangkat_gol',
        'jabatan',
        'unit_kerja',
    ]);

    public function penilai()
    {
        return $this->belongsTo(User::class);
    }

    public function pists()
    {
        return $this->hasOne(Pists::class);
    }

    public function tim()
    {
        return $this->hasOne(Tim::class);
    }

    public function angka_kredit()
    {
        return $this->hasOne(Angka_kredit::class);
    }
}
