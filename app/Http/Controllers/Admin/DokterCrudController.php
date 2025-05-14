<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DokterCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DokterCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    public function setup()
    {
        CRUD::setModel(\App\Models\Dokter::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/dokter');
        CRUD::setEntityNameStrings('dokter', 'dokter');
    }

    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('nama');
        CRUD::column('spesialisasi');
        CRUD::column('nomor_telepon');
    }

    protected function setupCreateOperation()
    {
        CRUD::field('nama')->type('text')->label('Nama')->validationRules('required');
        CRUD::field('spesialisasi')->type('select_from_array')->options([
            'Umum' => 'Umum',
            'Poli A' => 'Poli A',
            'Poli B' => 'Poli B',
            'Poli C' => 'Poli C'])->default('Umum')->label('Poli')->validationRules('required');
        CRUD::field('nomor_telepon')->type('text')->label('Nomor Telepon')->validationRules('required|unique:dokter,nomor_telepon|min:10');
    }


    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
