<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanLab extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'pemeriksaan_lab';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
    'rawat_jalan_nomorregistrasi',
    'tipe_pemeriksaan',
    'nama_tes',
    'hemoglobin',
    'leukosit',
    'trombosit',
    'tanggal_pemeriksaan',
];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function getPemeriksaanDokterNama()
    {
        return $this->pemeriksaanDokter ? $this->pemeriksaanDokter->dokter->nama : '-';
    }
    public function getPemeriksaanDokterAnamnesis()
    {
        return $this->pemeriksaanDokter ? $this->pemeriksaanDokter->dokter->anamnesis : '-';
    }
    public function getTindakanNama()
    {
        return $this->tindakan ? $this->tindakan->nama : '-';
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

    public function tindakan()
    {
        return $this->belongsTo(Tindakan::class, 'tindakan_id');
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
