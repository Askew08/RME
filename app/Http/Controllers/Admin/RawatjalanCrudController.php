<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RawatJalanCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RawatJalanCrudController extends CrudController
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
        CRUD::setModel(\App\Models\RawatJalan::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/rawat-jalan');
        CRUD::setEntityNameStrings('rawat jalan', 'rawat jalan');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('nomorregistrasi')->label('Nomor Registrasi');
        CRUD::addColumn([
            'name' => 'pasien_id',
            'label' => 'Nama Pasien',
            'type' => 'select',
            'entity' => 'pasien',
            'model' => \App\Models\Pasien::class,
            'attribute' => 'nama',
        ]);
        CRUD::column('tanggal_kunjungan')->label('Tanggal Kunjungan');
        CRUD::column('jenis_pasien')->label('Jenis Pasien');
        CRUD::column('status')->label('Status');
    }   

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::field('nomorregistrasi')->type('text')->label('Nomor Registrasi')->attributes(['readonly' => 'readonly']);
        CRUD::addField([
            'name' => 'pasien_id',
            'label' => 'Pasien',
            'type' => 'select',
            'entity' => 'pasien', // relasi di model RawatJalan
            'model' => \App\Models\Pasien::class,
            'attribute' => 'nama', // yang ditampilkan di dropdown
            'wrapper' => [
            'class' => 'form-group col-md-6'
            ]
        ]);
        CRUD::field('tanggal_kunjungan')->type('datetime')->label('Tanggal Kunjungan')->validationRules('required');
        CRUD::field('jenis_pasien')
        ->type('select_from_array')
        ->label('Jenis Pasien')
        ->options([
            'umum' => 'Umum',
            'bpjs' => 'BPJS',
        ])
        ->allows_null(false)
        ->default('umum');
        CRUD::field('status')->type('select_from_array')->label('Status')
        ->options(['belum dilayani' => 'Belum Dilayani', 'sudah dilayani' => 'Sudah Dilayani'])
        ->default('belum dilayani');
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
