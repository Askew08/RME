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
    Schema::create('pemeriksaan_lab', function (Blueprint $table) {
        $table->id();
        $table->string('rawat_jalan_nomorregistrasi');
        $table->foreign('rawat_jalan_nomorregistrasi') 
          ->references('nomorregistrasi') 
          ->on('rawat_jalan')               
          ->onDelete('cascade'); 
        $table->string('tipe_pemeriksaan')->default('Tes Darah');
        $table->string('nama_tes')->default('CBC');
        $table->text('hemoglobin')->nullable();
        $table->text('leukosit')->nullable();
        $table->text('trombosit')->nullable();
        $table->timestamp('tanggal_pemeriksaan')->useCurrent();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_lab');
    }
};
