<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanDokter extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'pemeriksaan_dokter';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function getNamaPasien()
        {
            return $this->rawatJalan?->pasien?->nama ?? '-';
        }

    public function getPemeriksaanPerawatKeluhan()
        {
            return $this->pemeriksaanPerawat ? $this->pemeriksaanPerawat->keluhan : '-';
        }

    public function getPemeriksaanPerawatSuhu()
        {
            return $this->pemeriksaanPerawat ? $this->pemeriksaanPerawat->suhu. 'c' : '-';
        }

    public function getPemeriksaanPerawatBeratBadan()
        {
            return $this->pemeriksaanPerawat ? $this->pemeriksaanPerawat->berat_badan. 'KG' : '-';
        }

    public function getPemeriksaanPerawatTekananDarah()
        {
            return $this->pemeriksaanPerawat ? $this->pemeriksaanPerawat->tekanan_darah. 'mmHg' : '-';
        }

    public function getPemeriksaanPerawatCatatan()
        {
            return $this->pemeriksaanPerawat ? $this->pemeriksaanPerawat->catatan_perawatan : '-';
        }
    public function getTindakanNama()
        {
            return $this->kodeTindakan ? $this->kodeTindakan->nama_tindakan : '404';
        }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function rawatJalan()
        {
            return $this->belongsTo(RawatJalan::class, 'rawat_jalan_nomorregistrasi', 'nomorregistrasi');
        }

    public function dokter()
        {
            return $this->belongsTo(Dokter::class);
        }
    public function pemeriksaanPerawat()
        {
            return $this->hasOne(\App\Models\PemeriksaanPerawat::class, 'rawat_jalan_nomorregistrasi', 'rawat_jalan_nomorregistrasi');
        }
    public function kodeTindakan()
        {
            return $this->belongsTo(\App\Models\KodeTindakan::class, 'tindakan_id');
        }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
