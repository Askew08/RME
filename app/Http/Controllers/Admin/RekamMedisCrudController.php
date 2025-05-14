<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\RawatJalan;
use App\Models\PemeriksaanPerawat;
use App\Models\PemeriksaanDokter;
use App\Models\PemeriksaanLab;
use Illuminate\Http\Request;

/**
 * Class RekamMedisCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RekamMedisCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation::store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    

    public function setup()
    {
        CRUD::setModel(\App\Models\RekamMedis::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/rekam-medis');
        CRUD::setEntityNameStrings('rekam medis', 'rekam medis');

        $this->crud->addButtonFromModelFunction('line', 'print', 'printButton', 'beginning');
    }

    protected function setupListOperation()
    {
        CRUD::column('rawat_jalan_nomorregistrasi')->label('Nomor Registrasi')
            ->type('select')
            ->entity('rawatJalan')  // Pastikan relasi sudah ada di model RekamMedis
            ->attribute('nomorregistrasi') // Nama kolom yang ditampilkan dari model RawatJalan
            ->model('App\Models\RawatJalan');

        CRUD::column('pasien_id')->label('Pasien')->type('select')
            ->entity('pasien') // relasi di model RekamMedis
            ->attribute('nama') // nama kolom yang ditampilkan dari model Pasien
            ->model('App\Models\Pasien');

        CRUD::column('dokter_id')->label('Dokter')->type('select')
            ->entity('dokter')
            ->attribute('nama')
            ->model('App\Models\Dokter');

        CRUD::column('tanggal_pemeriksaan')->label('Tanggal Pemeriksaan')->type('datetime');

        CRUD::column('keluhan')->label('Keluhan')->type('text')
            ->value(function($entry) {
                return $entry->keluhan ?? '-';
            });

        CRUD::column('diagnosa_dokter')->label('Diagnosa Dokter')->type('text');

        CRUD::column('hasil_asesmen_perawat')->label('Hasil Asesmen Perawat')->type('text')
            ->value(function($entry) {
                $asesmen = json_decode($entry->hasil_asesmen_perawat, true);
                if ($asesmen) {
                    return "Suhu: {$asesmen['suhu']}°C, Berat Badan: {$asesmen['berat_badan']} kg, Tekanan Darah: {$asesmen['tekanan_darah']} mmHg";
                }
                return '-';
            });

        CRUD::column('hasil_asesmen_dokter')->label('Hasil Asesmen Dokter')->type('text')
            ->value(function($entry) {
                $asesmenDokter = json_decode($entry->hasil_asesmen_dokter, true);
                if ($asesmenDokter) {
                    return "Anamnesis: {$asesmenDokter['anamnesis']}, Tindakan: " . (isset($asesmenDokter['tindakan']) ? $asesmenDokter['tindakan'] : 'Umum 1   ');

                }
                return '-';
            });
        CRUD::column('hasil_asesmen_lab')->label('Hasil Asesmen Lab')->type('text')
            ->value(function($entry) {
                $asesmenDokter = json_decode($entry->hasil_asesmen_dokter, true);
                if ($asesmenDokter) {
                    return "Hemoglobin: {$asesmenDokter['diagnosa']}, Leukosit: " . (isset($asesmenDokter['tindakan']) ? $Trombosit['tindakan'] : 'Tidak Ada');

                }
                return '-';
            });
    }

protected function setupCreateOperation()
{
    $nomorRegistrasi = request()->get('rawat_jalan_nomorregistrasi');
    $rawatJalan = \App\Models\RawatJalan::where('nomorregistrasi', $nomorRegistrasi)->first();
    

    $pemeriksaanPerawat = \App\Models\PemeriksaanPerawat::where('rawat_jalan_nomorregistrasi', $nomorRegistrasi)->first();
    $pemeriksaanDokter = \App\Models\PemeriksaanDokter::where('rawat_jalan_nomorregistrasi', $nomorRegistrasi)->first();
    $pemeriksaanLab = \App\Models\PemeriksaanLab::where('rawat_jalan_nomorregistrasi', $nomorRegistrasi)->first();
    

    $resep = \App\Models\Resep::where('rawat_jalan_nomorregistrasi', $nomorRegistrasi)->first();
    $obatWithDosage = $resep ? $resep->obat->nama . ' ' . $resep->aturan_pakai : 'Tidak ada obat';

    CRUD::field('rawat_jalan_nomorregistrasi')
        ->label('Nomor Registrasi Rawat Jalan')
        ->type('select_from_array')
        ->options(
            \App\Models\RawatJalan::all()->pluck('nomorregistrasi', 'nomorregistrasi')->toArray()
        )
        ->allows_null(false)
        ->default(null);

    CRUD::field('pasien_id')
        ->type('hidden')
        ->default($rawatJalan->pasien_id ?? null);

    CRUD::field('dokter_id')
        ->type('hidden')
        ->default($pemeriksaanDokter ? $pemeriksaanDokter->dokter_id : null);

    CRUD::field('tanggal_pemeriksaan')
        ->type('hidden')
        ->default(now());

    CRUD::field('keluhan')
        ->type('hidden')
        ->default($pemeriksaanPerawat->keluhan ?? '-');

    CRUD::field('hasil_asesmen_perawat')
        ->type('hidden')
        ->default($pemeriksaanPerawat ? json_encode($pemeriksaanPerawat->toArray(), JSON_PRETTY_PRINT) : null);

    CRUD::field('hasil_asesmen_lab')
        ->type('hidden')
        ->default($pemeriksaanLab ? json_encode($pemeriksaanLab->toArray(), JSON_PRETTY_PRINT) : null);  

    CRUD::field('hasil_asesmen_dokter')
        ->type('hidden')
        ->default($pemeriksaanDokter ? json_encode($pemeriksaanDokter->toArray(), JSON_PRETTY_PRINT) : null);

    CRUD::field('diagnosa_dokter')
        ->type('hidden')
        ->default($pemeriksaanDokter ? $pemeriksaanDokter->diagnosa : null);

    CRUD::field('obat')
        ->type('hidden')
        ->default($obatWithDosage);
}

    public function store()
    {
    $nomorRegistrasi = request()->input('rawat_jalan_nomorregistrasi');

    // Ambil data RawatJalan berdasarkan nomor registrasi
    $rawatJalan = \App\Models\RawatJalan::where('nomorregistrasi', $nomorRegistrasi)->first();
    if (!$rawatJalan) {
        dd('Rawat jalan tidak ditemukan');
    }

    // Ambil data pemeriksaan perawat, dokter, dan lab
    $pemeriksaanPerawat = \App\Models\PemeriksaanPerawat::where('rawat_jalan_nomorregistrasi', $nomorRegistrasi)->first();
    $pemeriksaanDokter = \App\Models\PemeriksaanDokter::where('rawat_jalan_nomorregistrasi', $nomorRegistrasi)->first();
    $pemeriksaanLab = \App\Models\PemeriksaanLab::where('rawat_jalan_nomorregistrasi', $nomorRegistrasi)->first();

    // Periksa apakah data pemeriksaan ada
    if (!$pemeriksaanPerawat || !$pemeriksaanDokter || !$pemeriksaanLab) {
        dd('Pemeriksaan tidak ditemukan');
    }

    $resep = \App\Models\Resep::where('rawat_jalan_nomorregistrasi', $nomorRegistrasi)->get();

    // Inisialisasi array untuk menyimpan obat dan anjuran pakaiannya
    $obatList = [];

    // Loop melalui semua resep dan gabungkan nama obat serta aturan pakaiannya
    foreach ($resep as $item) {
        $obatNama = $item->obat->nama ?? 'Tidak ada nama obat';
        $aturanPakai = $item->aturan_pakai ?? 'Tidak ada aturan pakai';
        
        // Gabungkan nama obat dan aturan pakaiannya
        $obatList[] = "{$obatNama} ({$aturanPakai})";
    }

    $obatGabungan = implode(', ', $obatList);

    request()->merge([
        'pasien_id' => $rawatJalan->pasien_id ?? null,
        'dokter_id' => $pemeriksaanDokter->dokter_id ?? null,
        'tanggal_pemeriksaan' => $pemeriksaanDokter->updated_at ?? now(),
        'keluhan' => $pemeriksaanPerawat->keluhan ?? '-',
        'hasil_asesmen_perawat' => $pemeriksaanPerawat ? 
            "Suhu: {$pemeriksaanPerawat->suhu} °C, Berat Badan: {$pemeriksaanPerawat->berat_badan} kg, Tekanan Darah: {$pemeriksaanPerawat->tekanan_darah} mmHg" 
            : null,

        'hasil_asesmen_dokter' => $pemeriksaanDokter ? 
            "Anamnesis: {$pemeriksaanDokter->anamnesis}, Tindakan: {$pemeriksaanDokter->tindakan}" 
            : null,

        'hasil_asesmen_lab' => $pemeriksaanLab ? 
            "Hemoglobin: {$pemeriksaanLab->hemoglobin}, Leukosit: {$pemeriksaanLab->leukosit}, Trombosit: {$pemeriksaanLab->trombosit}" 
            : null,
    'diagnosa_dokter' => $pemeriksaanDokter->diagnosa ?? null,
    'obat' => $obatGabungan,
    ]);

    return $this->traitStore();
}

    protected function setupShowOperation()
    {
        CRUD::column('rawat_jalan_nomorregistrasi')->label('Nomor Registrasi Rawat Jalan');
        CRUD::column('pasien_id')->label('Pasien ID');
        CRUD::column('dokter_id')->label('Dokter ID');
        CRUD::column('tanggal_pemeriksaan')->label('Tanggal Pemeriksaan');
        CRUD::column('keluhan')->label('Keluhan');
        CRUD::column('hasil_asesmen_perawat')->label('Hasil Asesmen Perawat')->type('textarea');
        CRUD::column('hasil_asesmen_lab')->label('Hasil Asesmen Lab')->type('textarea');
        CRUD::column('hasil_asesmen_dokter')->label('Hasil Asesmen Dokter')->type('textarea');
        CRUD::column('diagnosa_dokter')->label('Diagnosa Dokter');
        CRUD::column('obat')->label('Obat')->type('textarea'); 
    }

}
