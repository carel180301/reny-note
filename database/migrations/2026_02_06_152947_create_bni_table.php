<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('bnis', function (Blueprint $table) {
            $table->id();
            $table->string('tahun')->nullable();
            $table->string('tanggal_dokumen_diterima')->nullable();
            $table->string('nomor_dokumen_diterima')->nullable();
            $table->string('cabang_bank')->nullable();
            $table->string('nama_debitur')->nullable();
            // $table->string('status')->nullable();       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('bnis');
    }
};
