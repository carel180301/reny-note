<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('bukopins', function (Blueprint $table) {
            $table->id();
            $table->string('nama_debitur')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('cabang_bank')->nullable();
            $table->string('nilai_tuntutan')->nullable();
            $table->string('nilai_net_klaim')->nullable();
            $table->string('jw_awal')->nullable();
            $table->string('jw_akhir')->nullable();
            $table->string('tanggal_dokumen_diterima')->nullable();
            $table->string('status')->nullable();       
            $table->string('tanggal_cl')->nullable();
            $table->string('keterangan_usaha')->nullable();
            $table->string('nomor_cl')->nullable();
            $table->string('kekurangan_data')->nullable();
            $table->string('nomor_box')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('bukopins');
    }
};
