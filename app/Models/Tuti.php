<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuti extends Model
{
    use HasFactory;

    protected $table = 'tuti';

    protected $fillable = [
        'user_id',
        'tutam_id',
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

    public function tutam()
    {
        return $this->belongsTo(Tutam::class);
    }

    // public function tutam()
    // {
    //     return $this->belongsToMany(Tutam::class, 'tutam_tuti', 'tuti_id', 'tutam_id');
    // }

}
