<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ApiController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['web', 'admin'])->group(function () {
    Route::get('/admin/api/perawat-info/{nomor}', [ApiController::class, 'perawatInfo']);
    Route::get('/admin/api/dokter-info/{nomor}', [ApiController::class, 'dokterInfo']);
    Route::get('/admin/api/lab-info/{nomor}', [ApiController::class, 'labInfo']);
    Route::get('/admin/api/rawat-jalan-info/{nomor}', [ApiController::class, 'rawatJalanInfo']);
    Route::get('/admin/rekam-medis/print/{id}', function ($id) {
    $rekam = \App\Models\RekamMedis::findOrFail($id);
    $pasien = \App\Models\Pasien::find($rekam->pasien_id);
    $dokter = \App\Models\Dokter::find($rekam->dokter_id);
    $rawatJalan = \App\Models\RawatJalan::where('nomorregistrasi', $rekam->rawat_jalan_nomorregistrasi)->first();

    return view('admin.print.rekam-medis', compact('rekam', 'pasien', 'dokter','rawatJalan'));
    });
});



