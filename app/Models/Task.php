<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'keterangan',
        'kuantitas',
        'waktu',
        'user_id',
    ];

    protected $guarded = [];

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
}
