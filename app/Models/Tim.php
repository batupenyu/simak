<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    use HasFactory;
    protected $table = 'tim';
    protected $fillable =[
        'name',
        'rk_id',
        'indikator',
        'penilai_id',
        'anggota',
    ];

    public function setAnggotaAttribute($value)
    {
        $this->attributes['anggota'] = json_encode($value);
    }

    public function getAnggotaAttribute($value)
    {
        return $this->attributes['anggota'] = json_decode($value);
    }

    public function rk()
    {
        return $this->belongsTo(Rk::class);
    }

    public function penilai()
    {
        return $this->belongsTo(Penilai::class);
    }

}
