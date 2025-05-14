<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ResepCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ResepCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation{
        \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation::store as traitStore;
    }
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
        CRUD::setModel(\App\Models\Resep::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/resep');
        CRUD::setEntityNameStrings('resep', 'reseps');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id')->label('ID Resep');
        CRUD::column('rawat_jalan_nomorregistrasi')->label('Nomor Registrasi');
        CRUD::column('obat_id')
        ->label('Obat')
        ->type('select')
        ->entity('obat')
        ->attribute('id');
        CRUD::column('jumlah');
        CRUD::column('aturan_pakai');
        CRUD::column('created_at');
    }

    protected function setupCreateOperation()
    {
    CRUD::setValidation([
            'rawat_jalan_nomorregistrasi' => 'required|string|exists:rawat_jalan,nomorregistrasi',
            'aturan_pakai' => 'required|string',
            'jumlah' => 'nullable|integer|min:1',
            'obat_id' => 'nullable|exists:obat,id',
            'nama_racikan' => 'nullable|string',
        ]);

        CRUD::field('rawat_jalan_nomorregistrasi')
            ->label('Nomor Registrasi Rawat Jalan')
            ->type('select_from_array')
            ->options(
                \App\Models\RawatJalan::all()->pluck('nomorregistrasi', 'nomorregistrasi')->toArray()
            )
            ->allows_null(false)
            ->default(null);

        CRUD::field('obat_id')
            ->label('Obat')
            ->type('select')
            ->entity('obat')  // The related model for obat (medicine)
            ->attribute('nama')  // This will make the dropdown show the 'nama_obat'
            ->model(\App\Models\Obat::class)  // Specify the Obat model for the relation
            ->allows_null(false)
            ->default(null);

        CRUD::field('jumlah')->label('Jumlah')->type('number')->wrapper(['id' => 'field-jumlah']);
        CRUD::addField([
            'name' => 'aturan_pakai',
            'type' => 'hidden',
        ]);
        CRUD::field('aturan_jumlah')->label('Jumlah')->type('select_from_array')->options([
            '½' => '½',
            '1' => '1',
            '2' => '2',
            '3' => '3',
        ])->allows_null(false)->default('1');

        CRUD::field('aturan_bentuk')->label('Bentuk Obat')->type('select_from_array')->options([
            'tablet' => 'tablet',
            'kapsul' => 'kapsul',
            'sendok' => 'sendok',
            'tetes' => 'tetes',
        ])->allows_null(false)->default('tablet');

        CRUD::field('aturan_frekuensi')->label('Frekuensi Minum')->type('select_from_array')->options([
            '1x sehari' => '1x sehari',
            '2x sehari' => '2x sehari',
            '3x sehari' => '3x sehari',
        ])->allows_null(false)->default('2x sehari');

    }
    
    public function store()
    {
        // Gabungkan aturan jadi satu string
        request()->merge([
            'aturan_pakai' => request('aturan_jumlah') . ' ' . request('aturan_bentuk') . ' ' . request('aturan_frekuensi')
        ]);

        
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
            
    protected function setupShowOperation()
    {
        CRUD::column('id')->label('ID Resep');
        CRUD::column('rawat_jalan_nomorregistrasi')->label('Nomor Registrasi Rawat Jalan');
        CRUD::column('obat_id')->label('ID Obat');
        CRUD::column('jumlah')->label('Jumlah Obat');
        CRUD::column('aturan_pakai')->label('Aturan Pakai');
    }

    public function update()
    {
        // Gabungkan aturan jadi satu string
        request()->merge([
            'aturan_pakai' => request('aturan_jumlah') . ' ' . request('aturan_bentuk') . ' ' . request('aturan_frekuensi')
        ]);

        return $this->traitUpdate();
    }

}
