<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Pists extends Model
{
    use HasFactory;
    protected $table = 'pists';
    protected $fillable = [
        'penilai_id',
        'path_bukti_pengajuan',
        'no_surat',
        'tgl_surat',
        'tgl_surat_dasar',
        'asal_surat',
        'no_asal_surat',
        'description',
        'maksud',
        'tujuan',
        'acara',
        'ulasan',
        'photo',
        'tgl_awal',
        'tgl_akhir',
        'cat',
        'selected',
        'jam_1',
        'jam_2',
        'tempat'
    ];

    /**
     * Set the categories
     *
     */
    public function setCatAttribute($value)
    {
        $this->attributes['cat'] = json_encode($value);
    }

    /**
     * Get the categories
     *
     */

    public function getCatAttribute($value)
    {
        return json_decode($value);
        // return $this->attributes['cat'] = json_decode($value);
        // return explode(',', $this->attributes['cat']);
    }


    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function numberOf()
    {
        return count($this->attributes['cat']);
    }

    public function penilai()
    {
        return $this->belongsTo(Penilai::class);
    }

    // public function images(){
    //     return $this->hasMany(Image::class);
    // }

    public function images()
    {
        return $this->hasMany(Photo::class);
    }


    public function simpanBuktiPengajuan(Request $request, $field)
    {
        $file = $request->file($field);
        $this->path_bukti_pengajuan = $file->store('bukti_pengajuan');
        $this->save();
    }

    public function bacaBuktiPengajuan()
    {
        return response()->file(Storage::path($this->path_bukti_pengajuan));
    }

    public function simpanBuktiPengajuanEdit(Request $request, $field)
    {
        $file = $request->file($field);
        $this->path_bukti_pengajuan = $file->store('bukti_pengajuan');
        $this->save();
    }

    public function bacaBuktiPengajuanEdit()
    {
        return response()->file(Storage::path($this->path_bukti_pengajuan));
    }
}
