<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasangan extends Model
{
    use HasFactory;
    protected $table ='pasangan';
    protected $fillable = ([
        'name',
        'status',
        'tgl_lahir',
        'tgl_kawin',
        'job',
        'net',
    ]);

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function anak()
    {
        return $this->hasManyThrough(Anak::class, User::class);
    }

}
