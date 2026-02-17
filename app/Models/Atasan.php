<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atasan extends Model
{
    use HasFactory;

    protected $table = "atasan";

    protected $fillable = ([
        'nama',
        'nip',
        'pangkat_gol',
        'jabatan',
        'unit_kerja',
        'user_id',
    ]);

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
