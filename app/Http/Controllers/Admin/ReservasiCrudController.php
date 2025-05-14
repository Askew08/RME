<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReservasiRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ReservasiCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Reservasi::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/reservasi');
        CRUD::setEntityNameStrings('reservasi', 'reservasi');
    }

    protected function setupListOperation()
    {
        CRUD::column('pasien_id')->label('Nama Pasien')->type('select')->entity('pasien')->attribute('nama')->model('App\Models\Pasien');
        CRUD::column('tanggal_reservasi');
        CRUD::column('status');
    }

    protected function setupCreateOperation()
    {
        CRUD::field('pasien_id')->label('Nama Pasien')->type('select')->entity('pasien')->attribute('nama')->model('App\Models\Pasien')->validationRules('required');
        CRUD::field('tanggal_reservasi')->type('datetime')->label('Tanggal Reservasi')->validationRules('required');
        CRUD::field('status')->type('select_from_array')->options([
            'pending' => 'Pending',
            'approved' => 'Approved',
            'cancelled' => 'Cancelled',
        ])->default('pending')->label('Status');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
