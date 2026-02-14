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
    protected $casts = [
        'cat' => 'array',
        'selected' => 'boolean',
        'tgl_surat' => 'date',
        'tgl_surat_dasar' => 'date',
        'tgl_awal' => 'date',
        'tgl_akhir' => 'date',
    ];
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
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $this->path_bukti_pengajuan = $file->store('bukti_pengajuan');
            $this->save();
        }
    }

    public function bacaBuktiPengajuan()
    {
        return response()->file(Storage::path($this->path_bukti_pengajuan));
    }

    public function simpanBuktiPengajuanEdit(Request $request, $field)
    {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $this->path_bukti_pengajuan = $file->store('bukti_pengajuan');
            $this->save();
        }
    }

    public function bacaBuktiPengajuanEdit()
    {
        return response()->file(Storage::path($this->path_bukti_pengajuan));
    }
}
