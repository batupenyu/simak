<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sdm extends Model
{
    use HasFactory;

    protected $table ="sdm";

    protected $fillable = ([
        'user_id',
        'sdm',
    ]);

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
