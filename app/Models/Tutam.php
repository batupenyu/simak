<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutam extends Model
{
    use HasFactory;

    protected $table ="tutam";

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

    public function rk()
    {
        return $this->belongsTo(Rk::class);
    }

    public function tuti ()
    {
        return $this->hasMany(Tuti::class);
    }

    // public function tuti()
    // {
    //     return $this->belongsToMany(Tuti::class, 'tutam_tuti', 'tutam_id', 'tuti_id');
    // }

   
}
