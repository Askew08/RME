<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('obat', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('bentuk');
        $table->string('satuan');
        $table->string('dosis');
        $table->string('kategori');
        $table->integer('stok')->default(0);
        $table->timestamps();
    }); 
    }
    
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
