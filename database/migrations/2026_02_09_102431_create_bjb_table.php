<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('bjbs', function (Blueprint $table) {
            $table->id();
            $table->string('cabang_bank')->nullable();
            $table->string('nama_debitur')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('tuntutan')->nullable();
            $table->string('net_klaim')->nullable();
            $table->string('tanggal_dokumen_diterima')->nullable();
            $table->string('status')->nullable();  
            $table->string('keterangan')->nullable();
            $table->string('nomor_cl')->nullable();
            $table->string('date_update')->nullable();
            $table->string('nomor_memo_permohonan_pembayaran_klaim')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('bjbs');
    }
};
