<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Reservasi extends Model
{
    use CrudTrait;

    protected $table = 'reservasi'; 

    protected $fillable = [
        'pasien_id',
        'tanggal_reservasi',
        'status',
    ];

    public function pasien()
    {
        return $this->belongsTo(\App\Models\Pasien::class);
    }
}
