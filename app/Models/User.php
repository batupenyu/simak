<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    use HasApiTokens, Notifiable;
    protected $fillable = ([
        'name',
        'nip',
        'penilai_id',
        'tgl_lahir',
        'tempat_lahir',
        'jk',
        'alamat',
        'email',
        'agama',
        'email_verified_at',
        'password',
        'tmt_pangkat',
        'tmt_jabatan',
        'no_karpeg',
        'job_lain',
        'net_lain',
        'pangkat_gol',
        'ak_integrasi',
        'tgl_kp4',
        'unit_kerja',
        'tgl_awal',
        'tgl_akhir',
        'tgl_pegawai',
        'tgl_penilai',
        'tgl_atasan',
        'pasangan_id',
        'pendidikan',
        'status',
        'jenis',
        'kabupaten',
        'kecamatan',
        'desa_kelurahan',
        'sertifikasi',
        'nik',
        'mapel',
        'jurusan',
        'sumber_gaji',
        'nuptk',
        'jabatan'
    ]);

    // public function setMapelAttribute($value)
    // {
    //     $this->attributes['mapel'] = json_encode($value);
    // }

    // public function getMapelAttribute($value)
    // {
    //     return $this->attributes['mapel'] = json_decode($value);
    // }

    public function setMapelAttribute($value)
    {
        $this->attributes['mapel'] = is_array($value) ? json_encode($value) : $value;
    }

    public function getMapelAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function penilai()
    {
        return $this->belongsTo(Penilai::class);
    }
    public function atasan()
    {
        return $this->belongsTo(Atasan::class);
    }
    public function phone()
    {
        return $this->belongsTo(Phone::class);
    }
    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
    public function tutam()
    {
        return $this->hasMany(Tutam::class);
    }
    public function anak()
    {
        return $this->hasMany(Anak::class);
    }
    public function pasangan()
    {
        return $this->belongsTo(Pasangan::class);
    }
    public function sdm()
    {
        return $this->hasMany(Sdm::class);
    }
    public function skema()
    {
        return $this->hasMany(Skema::class);
    }
    public function kon()
    {
        return $this->hasMany(Kon::class);
    }
    public function tupoksi()
    {
        return $this->hasMany(Tupoksi::class);
    }
    public function rk()
    {
        return $this->hasMany(Rk::class);
    }
    public function eks()
    {
        return $this->hasOne(Eks::class);
    }
    public function umpan()
    {
        return $this->hasOne(Umpan::class);
    }
    public function cuti()
    {
        return $this->hasMany(Cuti::class);
    }
    public function izin()
    {
        return $this->hasMany(Izin::class);
    }
    public function pists()
    {
        return $this->belongsTo(Pists::class);
    }
    public function sk()
    {
        return $this->hasOne(Sk::class);
    }
    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function angka_kredit()
    {
        return $this->hasMany(Angka_kredit::class);
    }
}
