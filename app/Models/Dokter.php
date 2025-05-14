<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use CrudTrait;

    protected $table = 'dokter'; 
    protected $fillable = [
        'nama',
        'spesialisasi',
        'nomor_telepon',
    ];
}
