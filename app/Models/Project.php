<?php

namespace App\Models;

use App\Models\Tugas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    protected $table = 'projects';

    // protected $primarykey ='project_id';

    // protected $guarded = [];

    protected $fillable =([
        'title',
    ]);

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function eks()
    {
        return $this->hasOne(Eks::class);
    }

    public function penilai()
    {
        return $this->hasOne(Penilai::class);
    }

    public function atasan()
    {
        return $this->hasOne(Atasan::class);
    }
    
    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
    
    public function tutam()
    {
        return $this->hasMany(Tutam::class);
    }
    public function anak()
    {
        return $this->hasMany(Anak::class);
    }

    public function tupoksi()
    {
        return $this->hasMany(Tupoksi::class);
    }

    public function tuti()
    {
        return $this->hasOne(Tuti::class);
    }

    public function tasks()
    {
        return $this->hasManyThrough(Task::class, User::class);
    }

    public function task()
    {
        return $this->hasOneThrough(Task::class, User::class);
    }

    public function pasangan()
    {
        return $this->hasOne(Pasangan::class);
    }

    public function sdm()
    {
        return $this->hasMany(Sdm::class);
    }
    public function skema()
    {
        return $this->hasMany(Skema::class);
    }
    public function kon()
    {
        return $this->hasMany(Kon::class);
    }

    public function umpan()
    {
        return $this->hasOne(Umpan::class);
    }

    public function rk()
    {
        return $this->hasMany(Rk::class);
    }
    

}
