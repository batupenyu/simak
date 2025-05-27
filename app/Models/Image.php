<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'pists_id',
        'image',
    ];

    public function pists(){
        return $this->belongsTo(Pists::class);
    }
}
