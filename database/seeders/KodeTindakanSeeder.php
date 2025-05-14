<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class KodeTindakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode' => '01.01', 'nama_tindakan' => 'Konsultasi Dokter Umum Tingkat 1'],
            ['kode' => '01.02', 'nama_tindakan' => 'Konsultasi Dokter Umum Tingkat 2)'],
            ['kode' => '02.01', 'nama_tindakan' => 'Pemeriksaan Laboratorium Umum'],
        ];
        DB::table('kode_tindakan')->insert($data);
    }
}
