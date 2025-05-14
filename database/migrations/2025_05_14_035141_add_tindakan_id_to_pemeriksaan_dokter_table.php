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
        Schema::table('pemeriksaan_dokter', function (Blueprint $table) {
        $table->unsignedBigInteger('tindakan_id')->nullable()->after('diagnosa');
        $table->foreign('tindakan_id')->references('id')->on('kode_tindakan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemeriksaan_dokter', function (Blueprint $table) {
            //
        });
    }
};
