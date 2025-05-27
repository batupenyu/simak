<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $table ='photo';
    protected $fillable = [
        'pists_id',
        'image',
    ];

    public function pists(){
        return $this->belongsTo(Pists::class);
    }
}
