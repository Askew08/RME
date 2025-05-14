<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('rawat_jalan', function (Blueprint $table) {
        $table->string('nomorregistrasi')->primary();
        $table->foreignId('pasien_id')->constrained('pasien')->onDelete('cascade');
        $table->date('tanggal_kunjungan');
        $table->enum('jenis_pasien', ['umum', 'bpjs'])->nullable()->change();
        $table->enum('status', ['belum dilayani', 'sudah dilayani'])->default('belum dilayani');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rawat_jalan');
    }
};
