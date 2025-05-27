<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;

    protected $table ='anak';

    protected $guarded = ['id'];

    protected $fillable =([
        'user_id',
        'pasangan_id',
        'name',
        'tgl_lahir',
        'anak',
        'perkawinan',
        'status_sekolah',
        'status_beasiswa',
        'tgl_meninggal_cerai',
        'pekerjaan',
        'kat',
    ]);

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pasangan()
    {
        return $this->belongsTo(Pasangan::class);
    }
}
