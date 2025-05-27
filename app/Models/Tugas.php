<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rk_id',
        'name',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function tupoksi()
    // {
    //     return $this->belongsToMany(Tupoksi::class, 'tupoksi_tugas', 'tugas_id', 'tupoksi_id');
    // }

    public function tupoksi()
    {
        return $this->hasMany(Tupoksi::class);
    }

    public function rk()
    {
        return $this->belongsTo(Rk::class);
    }
}
