<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;
    protected $table = 'class';
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id', 'id');
    }
    public function gurus()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }
}
