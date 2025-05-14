<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ObatCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ObatCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Obat::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/obat');
        CRUD::setEntityNameStrings('obat', 'obats');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
    CRUD::column('id')->label('ID Obat');
    CRUD::column('nama')->label('Nama Obat');
    CRUD::column('dosis')->label('Dosis');
    CRUD::column('bentuk')->label('Bentuk Obat');
    CRUD::column('satuan')->label('Satuan Obat');
    CRUD::column('kategori')->label('Kategori');
    CRUD::column('stok')->label('Stok');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
    CRUD::field('nama')->label('Nama Obat')->type('text');
    CRUD::field('dosis')->label('Dosis')->type('text');
    CRUD::field('bentuk')->label('Bentuk Obat')->type('select_from_array')->options([
        'Tablet' => 'Tablet',
        'Kapsul' => 'Kapsul',
        'Sirup' => 'Sirup',
        'Salep' => 'Salep',
        'Injeksi' => 'Injeksi',
        'Puyer' => 'Puyer'
    ]);
    CRUD::field('satuan')->label('Satuan')->type('text');    
    CRUD::field('kategori')->label('Kategori');
    CRUD::field('stok')->label('Stok');
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
