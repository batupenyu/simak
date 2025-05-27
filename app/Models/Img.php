<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table ='img';
    protected $fillable = [
        'izin_id',
        'image',
    ];

    public function izin(){
        return $this->belongsTo(Izin::class);
    }
}
