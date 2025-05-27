<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tupoksi extends Model
{
    use HasFactory;

    protected $table ='tupoksi';
    protected $fillable = [
        'user_id',
        'tugas_id',
        'indikator',
        'aspek',
        'target',
        'satuan',
        'realisasi',
        'umpanbalik'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }


    // public function tugas()
    // {
    //     return $this->belongsToMany(Tugas::class, 'tupoksi_tugas', 'tupoksi_id', 'tugas_id');
    // }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rk()
    {
        return $this->belongsToMany(Rk::class, 'tugas', 'tupoksi_id', 'rk_id');
    }

}
