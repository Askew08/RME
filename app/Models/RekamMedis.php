<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'rekam_medis';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'rawat_jalan_nomorregistrasi',
        'pasien_id',
        'dokter_id',
        'tanggal_pemeriksaan',
        'keluhan',
        'hasil_asesmen_perawat',
        'hasil_asesmen_lab',
        'hasil_asesmen_dokter',
        'diagnosa_dokter',
        'obat',
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
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }

    public function pemeriksaanPerawat()
    {
        return $this->hasOne(PemeriksaanPerawat::class, 'rawat_jalan_nomorregistrasi', 'rawat_jalan_nomorregistrasi');
    }

    public function pemeriksaanDokter()
    {
        return $this->hasOne(PemeriksaanDokter::class, 'rawat_jalan_nomorregistrasi', 'rawat_jalan_nomorregistrasi');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function rawatJalan()
    {
        return $this->belongsTo(RawatJalan::class, 'rawat_jalan_nomorregistrasi', 'nomorregistrasi');
    }

    public function printButton()
    {
        return '<a class="btn btn-sm btn-primary" target="_blank" href="' . url("/admin/rekam-medis/print/{$this->id}") . '"><i class="la la-print"></i> Print</a>';
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
