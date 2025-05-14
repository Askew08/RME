<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PemeriksaanPerawat;
use App\Models\PemeriksaanDokter;
use App\Models\PemeriksaanLab;
use Illuminate\Support\Facades\DB; 

class ApiController extends Controller
{
    public function perawatInfo($nomor)
    {
        $data = PemeriksaanPerawat::where('rawat_jalan_nomorregistrasi', $nomor)->first();

        if ($data) {
            return response()->json([
                'exists' => true,
                'keluhan' => $data->keluhan,
                'suhu' => $data->suhu,
                'berat_badan' => $data->berat_badan,
                'tekanan_darah' => $data->tekanan_darah,
                'keluhan' => $data->keluhan,
                'catatan_perawatan' => $data->catatan_perawatan,
            ]);
        }

        return response()->json(['exists' => false]);
    }

    public function dokterInfo($nomor)
    {
        $data = PemeriksaanDokter::where('rawat_jalan_nomorregistrasi', $nomor)->first();

        if ($data) {
            return response()->json([
                'exists' => true,
                'anamnesis' => $data->anamnesis,
                'tindakan' => $data->tindakan ? $data->tindakan->nama : '-',
                'catatan_dokter' => $data->catatan_dokter,
            ]);
        }

        return response()->json(['exists' => false]);
    }
    
    public function labInfo($nomor)
    {
        $data = PemeriksaanLab::where('rawat_jalan_nomorregistrasi', $nomor)->first();

        if ($data) {
            return response()->json([
                'exists' => true,
                'hemoglobin' => $data->hemoglobin,
                'leukosit' => $data->leukosit,
                'trombosit' => $data->trombosit,
            ]);
        }

        return response()->json(['exists' => false]);
    }
    
    public function rawatJalanInfo($nomor)
    {
        $rawat = RawatJalan::where('nomorregistrasi', $nomor)->first();
        $dokter = PemeriksaanDokter::where('rawat_jalan_nomorregistrasi', $nomor)->first();

        if ($rawat && $dokter) {
            return response()->json([
                'exists' => true,
                'pasien_id' => $rawat->pasien_id,
                'dokter_id' => $dokter->dokter_id,
                'keluhan' => $dokter->keluhan,
            ]);
        }

        return response()->json(['exists' => false]);
    }
}
