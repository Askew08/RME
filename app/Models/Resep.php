<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'resep';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id','rawat_jalan_nomorregistrasi','id', 'rawat_jalan_id', 'tipe', 'obat_id', 'nama_racikan', 'aturan_pakai', 'jumlah'
    ];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function getNamaObat()
        {
            return $this->obat->nama ?? '-';
        }
        
    public function getAturanPakaiGabungAttribute()
        {
            return "{$this->aturan_jumlah} {$this->aturan_bentuk} {$this->aturan_frekuensi}";
        }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function rawatJalan()
        {
            return $this->belongsTo(\App\Models\RawatJalan::class, 'rawat_jalan_nomorregistrasi', 'nomorregistrasi');
        }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
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
