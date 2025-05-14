<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Requests\PasienCrudRequest;

/**
 * Class PasienCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PasienCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Pasien::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/pasien');
        CRUD::setEntityNameStrings('pasien', 'pasien');
    }

    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('nik');
        CRUD::column('nama');
        CRUD::column('jenis_kelamin');
        CRUD::column('tempat_lahir');
        CRUD::column('tanggal_lahir');
        CRUD::column('alamat');
        CRUD::column('nomor_telepon');

    }

    protected function setupCreateOperation()
    {
        CRUD::field('nik')->type('text')->label('NIK')->validationRules('required|unique:pasien,nik|min:16');
        CRUD::field('nama')->type('text')->label('Nama')->validationRules('required');
        CRUD::field('jenis_kelamin')->type('select_from_array')->options(['L' => 'Laki-laki', 'P' => 'Perempuan'])->label('Jenis Kelamin')->validationRules('required');
        CRUD::field('tempat_lahir')->type('text')->label('Tempat Lahir');
        CRUD::field('tanggal_lahir')->type('date')->label('Tanggal Lahir');
        CRUD::field('alamat')->type('textarea')->label('Alamat');
        CRUD::field('nomor_telepon')->type('text')->label('Nomor Telepon')->validationRules('required|unique:pasien,nomor_telepon|min:10');

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
