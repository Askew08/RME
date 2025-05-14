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
        Schema::create('resep', function (Blueprint $table) {
            $table->id();
            $table->string('rawat_jalan_nomorregistrasi');  // Gunakan string untuk foreign key sesuai dengan tipe primary key
            $table->foreign('rawat_jalan_nomorregistrasi')  // Definisikan foreign key dengan tipe string
              ->references('nomorregistrasi')  // Mengacu pada 'nomorregistrasi' di tabel 'rawat_jalan'
              ->on('rawat_jalan')  // Nama tabel yang menjadi referensi
              ->onDelete('cascade');  // Hapus jika 'rawat_jalan' dihapus
            $table->foreignId('obat_id')->nullable()->constrained('obat'); 
            $table->string('aturan_pakai');
            $table->integer('jumlah')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resep');
    }
};
