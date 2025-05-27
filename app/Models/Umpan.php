<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umpan extends Model
{
    use HasFactory;
    protected $table ='umpan';
    protected $guarded = ['id'];
    protected $fillable = ([
        'user_id',
        'umpan1',
        'umpan2',
        'umpan3',
        'umpan4',
        'umpan5',
        'umpan6',
        'umpan7',

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
