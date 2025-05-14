<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PemeriksaanDokterCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PemeriksaanDokterCrudController extends CrudController
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
        CRUD::setModel(\App\Models\PemeriksaanDokter::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/pemeriksaan-dokter');
        CRUD::setEntityNameStrings('pemeriksaan dokter', 'pemeriksaan dokters');
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

        CRUD::column('dokter_id')->label('Dokter')->type('select')->entity('dokter')->model(\App\Models\Dokter::class)->attribute('nama');

        CRUD::addColumn([
            'name' => 'pemeriksaan_perawat_keluhan',
            'label' => 'Keluhan Pasien',
            'type' => 'model_function',
            'function_name' => 'getPemeriksaanPerawatKeluhan', 
        ]);

        CRUD::addColumn([
            'name' => 'pemeriksaan_perawat_suhu',
            'label' => 'Suhu',
            'type' => 'model_function',
            'function_name' => 'getPemeriksaanPerawatSuhu', 
        ]);

        CRUD::addColumn([
            'name' => 'pemeriksaan_perawat_berat_badan',
            'label' => 'Berat Badan',
            'type' => 'model_function',
            'function_name' => 'getPemeriksaanPerawatBeratBadan',
        ]);
        
        CRUD::addColumn([
            'name' => 'pemeriksaan_perawat_tekanan_darah',
            'label' => 'Tekanan Darah',
            'type' => 'model_function',
            'function_name' => 'getPemeriksaanPerawatTekananDarah',
        ]);
        CRUD::column('anamnesis')->label('Anamnesis');
        CRUD::addColumn([
            'name' => 'kode_tindakan',
            'label' => 'Tindakan',
            'type' => 'model_function',
            'function_name' => 'getTindakanNama',
        ]);
        CRUD::column('diagnosa')->label('Diagnosis');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
    CRUD::addField([
    'name' => 'rawat_jalan_nomorregistrasi',
    'label' => 'Nomor Registrasi',
    'type' => 'select',
    'model' => \App\Models\RawatJalan::class,
    'attribute' => 'nomorregistrasi',
    'entity' => 'rawatJalan',
    ]);
    
    CRUD::field('dokter_id')->type('select')
        ->label('Dokter')
        ->entity('dokter')
        ->model(\App\Models\Dokter::class)
        ->attribute('nama');

    CRUD::addField([
        'name' => 'custom_label_perawat',
        'type' => 'custom_html',
        'value' => '<label for="preview-perawat" style="margin-bottom: 0; padding-bottom: 0;">Pemeriksaan Perawat</label>',
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
        'name' => 'custom_label_lab',
        'type' => 'custom_html',
        'value' => '<label for="preview-lab" style="margin-bottom: 0; padding-bottom: 0;">Pemeriksaan Lab</label>',
    ]);
     CRUD::addField([
        'name' => 'preview_lab',
        'type' => 'custom_html',
        'value' => '<div id="preview-lab" class="card card-body bg-light mt-2"></div>'   
    ]);    
    CRUD::addField([
        'name' => 'custom_js_lab',
        'type' => 'custom_html',
        'value' => '<script src="' . asset('js/lab-preview.js') . '"></script>',
    ]);  
    CRUD::field('anamnesis')->type('textarea');
    CRUD::field('kode_tindakan')->type('select')
        ->label('Tindakan')
        ->entity('kodeTindakan')
        ->model(\App\Models\KodeTindakan::class)
        ->attribute('nama_tindakan');
    CRUD::field('diagnosa')->type('textarea');
    }

    protected function setupShowOperation()
    {
        CRUD::column('rawat_jalan_nomorregistrasi')->label('Nomor Registrasi');
        CRUD::column('dokter_id')->label('Dokter')->type('select')->entity('dokter')->model(\App\Models\Dokter::class)->attribute('nama');
        CRUD::column('diagnosa');
        CRUD::column('terapi');

        CRUD::addColumn([
            'name' => 'pemeriksaan_perawat_suhu',
            'label' => 'Suhu',
            'type' => 'model_function',
            'function_name' => 'getPemeriksaanPerawatSuhu',
        ]);

        CRUD::addColumn([
            'name' => 'pemeriksaan_perawat_berat_badan',
            'label' => 'Berat Badan',
            'type' => 'model_function',
            'function_name' => 'getPemeriksaanPerawatBeratBadan',
        ]);
            CRUD::addColumn([
            'name' => 'pemeriksaan_perawat_tekanan_darah',
            'label' => 'Tekanan Darah',
            'type' => 'model_function',
            'function_name' => 'getPemeriksaanPerawatTekananDarah',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }


}
