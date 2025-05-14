<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PemeriksaanPerawatCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PemeriksaanPerawatCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\PemeriksaanPerawat::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/pemeriksaan-perawat');
        CRUD::setEntityNameStrings('pemeriksaan perawat', 'pemeriksaan perawats');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('rawat_jalan_nomorregistrasi')->label('Nomor Registrasi');
        CRUD::column('suhu')->label('Suhu')->value(function($entry) {
            return $entry->suhu . ' °C';
        });

        CRUD::column('berat_badan')->label('Berat Badan')->value(function($entry) {
            return $entry->berat_badan . ' kg';
        });

        CRUD::column('tekanan_darah')->label('Tekanan Darah')->value(function($entry) {
            return $entry->tekanan_darah . ' mmHg';
        });
        CRUD::column('keluhan');
        CRUD::column('catatan_perawatan');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::field('rawat_jalan_nomorregistrasi')
            ->label('Nomor Registrasi Rawat Jalan')
            ->type('select_from_array')
            ->options(
                \App\Models\RawatJalan::all()->pluck('nomorregistrasi', 'nomorregistrasi')->toArray()
            )
            ->allows_null(false)
            ->default(null);

        CRUD::field('suhu')->type('text');
        CRUD::field('berat_badan')->type('text');
        CRUD::field('tekanan_darah')->type('text');
        CRUD::field('keluhan')->type('textarea');
        CRUD::field('catatan_perawatan')->type('textarea');
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
