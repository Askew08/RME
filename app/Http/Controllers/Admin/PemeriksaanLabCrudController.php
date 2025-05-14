<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PemeriksaanLabCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PemeriksaanLabCrudController extends CrudController
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
        CRUD::setModel(\App\Models\PemeriksaanLab::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/pemeriksaan-lab');
        CRUD::setEntityNameStrings('pemeriksaan lab', 'pemeriksaan labs');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('rawat_jalan_nomorregistrasi')->label('Nomor Registrasi');
        CRUD::addColumn([
            'name' => 'pemeriksaan_dokter_nama',
            'label' => 'Dokter',
            'type' => 'model_function',
            'function_name' => 'getPemeriksaanDokterNama', 
        ]);
        CRUD::addColumn([
            'name' => 'pemeriksaan_dokter_anamnesis',
            'label' => 'Dokter',
            'type' => 'model_function',
            'function_name' => 'getPemeriksaanDokterAnamnesis', 
        ]);
        CRUD::column('tipe_pemeriksaan');
        CRUD::column('nama_tes');
        CRUD::column('hemoglobin');
        CRUD::column('leukosit');
        CRUD::column('trombosit');
        CRUD::column('tanggal_pemeriksaan');
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
        ->allows_null(false);

        CRUD::addField([
            'name' => 'custom_label_perawat',
            'type' => 'custom_html',
            'value' => '<label for="preview-perawat" style="margin-bottom: 0; padding-bottom: 0;">Preview Perawat</label>',
        ]);
         CRUD::addField([
            'name' => 'preview_perawat',
            'type' => 'custom_html',
            'value' => '<div id="preview-perawat" class="card card-body bg-light mt-2"></div>'   
        ]);

        CRUD::addField([
            'name' => 'custom_js_perawat',
            'type' => 'custom_html',
            'value' => '<script src="' . asset('js/perawat-preview.js') . '"></script>',
        ]);

        CRUD::addField([
            'name' => 'custom_label_dokter',
            'type' => 'custom_html',
            'value' => '<label for="preview-dokter" style="margin-bottom: 0; padding-bottom: 0;">Pemeriksaan Dokter</label>',
        ]);

        CRUD::addField([
            'name' => 'preview_dokter',
            'type' => 'custom_html',
            'value' => '<div id="preview-dokter" class="card card-body bg-light mt-2"></div>'   
            ]);

        CRUD::addField([
            'name' => 'custom_js_dokter',
            'type' => 'custom_html',
            'value' => '<script src="' . asset('js/dokter-preview.js') . '"></script>',
        ]);
        
        CRUD::field('tipe_pemeriksaan')
            ->label('Tipe Pemeriksaan')
            ->type('text')
            ->default('Tes Darah')
            ->attributes(['readonly' => 'readonly']);

        CRUD::field('nama_tes')
            ->label('Nama Tes')
            ->type('text')
            ->default('CBC')
            ->attributes(['readonly' => 'readonly']);

        CRUD::field('hemoglobin')->label('Hemoglobin');
        CRUD::field('leukosit')->label('Leukosit');
        CRUD::field('trombosit')->label('Trombosit');
        CRUD::field('tanggal_pemeriksaan')->label('Tanggal Pemeriksaan')->type('date')->default(now());
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
