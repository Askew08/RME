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
            Schema::create('pemeriksaan_perawat', function (Blueprint $table) {
            $table->id();
            $table->string('rawat_jalan_nomorregistrasi');
            $table->foreign('rawat_jalan_nomorregistrasi') 
              ->references('nomorregistrasi') 
              ->on('rawat_jalan') 
              ->onDelete('cascade'); 
            $table->text('suhu')->nullable();
            $table->text('berat_badan')->nullable();
            $table->text('tekanan_darah')->nullable();
            $table->text('keluhan')->nullable();
            $table->text('catatan_perawatan')->nullable(); 
            $table->timestamps();
        });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
