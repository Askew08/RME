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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->string('rawat_jalan_nomorregistrasi');
            $table->foreign('rawat_jalan_nomorregistrasi')
            ->references('nomorregistrasi')
            ->on('rawat_jalan')
            ->onDelete('cascade');
            $table->foreignId('pasien_id')->constrained('pasien')->onDelete('cascade');
            $table->foreignId('dokter_id')->constrained('dokter')->onDelete('cascade');
            $table->dateTime('tanggal_pemeriksaan');
            $table->text('keluhan');
            $table->text('hasil_asesmen_perawat')->nullable();
            $table->text('hasil_asesmen_dokter')->nullable();
            $table->text('diagnosa_dokter')->nullable()->after('hasil_asesmen_dokter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
