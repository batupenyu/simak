<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table ='barang';
    protected $fillable = ([
        'user_id',
        'nomor',
        'tgl_awal',
        'tgl_akhir',
        'jenis',
        'type',
        'tahun',
        'spek',
    ]);


    /**
     * Get all of the users for the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
