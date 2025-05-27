<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    // protected $table = 'students';
    protected $fillable = [
        'name',
        'gender',
        'nis',
        'class_id',
    ];
    // protected $guarded = [];

    public function class()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function eskuls()
    {
        return $this->belongsToMany(Extracurricular::class, 'student_eskul', 'student_id', 'extracurricular_id');
    }
}
