<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sk extends Model
{
    use HasFactory;
    protected $table ="sk";
    protected $fillable = ([
        'user_id',
        'sk_pejabat',
        'no_sk',
        'sk_tgl',
        'sk_tentang',
        'sk_sebagai',
        'no_surat',
        'tgl_surat'
    ]);

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
