<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanPerawat extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'pemeriksaan_perawat';

    protected $fillable = [
        'rawat_jalan_nomorregistrasi',
        'suhu',
        'berat_badan',
        'tekanan_darah',
        'keluhan',
        'catatan_perawatan',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */    
    public function rawatJalan()
    {
        return $this->belongsTo(RawatJalan::class, 'rawat_jalan_nomorregistrasi', 'nomorregistrasi');
    }

    public function getNamaPasien()
    {
        return $this->rawatJalan->pasien->nama ?? '-';
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
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
