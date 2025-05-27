<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eks extends Model
{
    use HasFactory;

    protected $table ="eks";
    protected $guarded = ['id'];
    protected $filable = ([
        'user_id',
        'eks1',
        'eks2',
        'eks3',
        'eks4',
        'eks5',
        'eks6',
        'eks7',
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
