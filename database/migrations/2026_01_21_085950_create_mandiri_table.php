<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('mandiris', function (Blueprint $table) {
            $table->id();
            $table->string('uker')->nullable();
            $table->string('nama_debitur')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('tuntutan')->nullable();
            $table->string('net_klaim')->nullable();
            $table->date('tanggal_klaim_diajukan')->nullable();
            $table->string('status')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('kekurangan_data')->nullable();
            $table->date('tanggal_update')->nullable();

            // $table->string('cabang_bank')->nullable();
            // $table->string('nilai_tuntutan_klaim')->nullable();
            // $table->date('tanggal_klaim_diterima')->nullable();
            // $table->date('tanggal_klaim_masuk_portal')->nullable();
            
            // $table->string('tambahan_data')->nullable();
            // $table->date('date_update')->nullable();
            // $table->string('nomor_box')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('mandiris');
    }
};
