<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('pantries', function (Blueprint $table) {
            $table->id();
            $table->string('produk')->nullable();
            $table->string('kategori')->nullable();
            $table->string('nama_brand')->nullable();

            // $table->string('tanggal_dokumen_diterima')->nullable();
            // $table->string('status')->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('datapantries');
    }
};
