<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.


Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('pasien', 'PasienCrudController');
    Route::crud('reservasi', 'ReservasiCrudController');
    Route::crud('dokter', 'dokterCrudController');
    Route::crud('rawat-jalan', 'RawatJalanCrudController');
    Route::crud('pemeriksaan-perawat', 'PemeriksaanPerawatCrudController');
    Route::crud('pemeriksaan-dokter', 'PemeriksaanDokterCrudController');
    Route::crud('obat', 'ObatCrudController');
    Route::crud('resep', 'ResepCrudController');
    Route::crud('detail-resep', 'DetailResepCrudController');
    Route::crud('rekam-medis', 'RekamMedisCrudController');
    Route::crud('kode-tindakan', 'KodeTindakanCrudController');
    Route::crud('pemeriksaan-lab', 'PemeriksaanLabCrudController');
}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */
