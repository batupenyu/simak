<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rk extends Model
{
    use HasFactory;
    protected $table ="rk";
    protected $guarded =(['user_id','project_id']);
    protected $fillable =(['name']);


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tim()
    {
        return $this->hasMany(Tim::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function tugas()
    {
        return $this->belongsToMany(Tugas::class);
    }

    // public function tupoksi()
    // {
    //     return $this->belongsToMany(Rk::class, 'tugas', 'rk_id', 'tupoksi_id');
    // }
}


