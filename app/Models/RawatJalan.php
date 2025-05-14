<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RawatJalan extends Model
{

    use CrudTrait;

    protected $primaryKey = 'nomorregistrasi'; // Set custom primary key
    public $incrementing = false; // Disable auto-incrementing
    protected $keyType = 'string'; // Custom key type (string)
    protected $table = 'rawat_jalan';

    protected $fillable = [
        'nomorregistrasi', // Add this to fillable
        'pasien_id',
        'nama_pasien',
        'tanggal_kunjungan',
        'jenis_pasien',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($rawatJalan) {
            $latest = RawatJalan::latest('nomorregistrasi')->first();
            $lastId = $latest ? (int) substr($latest->nomorregistrasi, 3) : 0;
            $newId = 'RJ-' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);

            $rawatJalan->nomorregistrasi = $newId; // Assign the new ID
        });
    }

       public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function resep()
    {
        return $this->hasMany(\App\Models\Resep::class, 'rawat_jalan_nomorregistrasi', 'rawat_jalan_nomorregistrasi');
    }
    
    public function pemeriksaanPerawat()
    {
        return $this->hasOne(PemeriksaanPerawat::class, 'rawat_jalan_nomorregistrasi', 'nomorregistrasi');
    }
        public function pemeriksaanDokter()
    {
        return $this->hasOne(PemeriksaanDokter::class, 'rawat_jalan_nomorregistrasi', 'nomorregistrasi');
    }
        public function pemeriksaanLab()
    {
        return $this->hasOne(PemeriksaanLab::class, 'rawat_jalan_nomorregistrasi', 'nomorregistrasi');
    }

        public function getNamaPasienAttribute()
    {
        return $this->pasien ? $this->pasien->nama : null;
    }
}
