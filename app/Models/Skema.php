<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    use HasFactory;

    protected $table ="skema";
    protected $fillable = ([
        'user_id',
        'skema',
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
