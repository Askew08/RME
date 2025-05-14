<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemeriksaan_dokter', function (Blueprint $table) {
            $table->id();
            $table->string('rawat_jalan_nomorregistrasi');
            $table->foreignId('dokter_id')->constrained('dokter'); // Relasi ke model Dokter
            $table->foreign('rawat_jalan_nomorregistrasi')->references('nomorregistrasi')->on('rawat_jalan')->onDelete('cascade');
            $table->text('diagnosa')->nullable();
            $table->text('tindakan')->nullable();
            $table->text('catatan_dokter')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_dokter');
    }
};
