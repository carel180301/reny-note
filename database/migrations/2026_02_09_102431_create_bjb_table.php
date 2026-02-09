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
            // $table->string('tanggal_dokumen_diterima')->nullable();
            // $table->string('nomor_dokumen_diterima')->nullable();
            // $table->string('cabang_bank')->nullable();
            // $table->string('nama_debitur')->nullable();
            // $table->string('nomor_rekening')->nullable();
            // $table->string('nilai_tuntutan')->nullable();
            // $table->string('nilai_net_klaim')->nullable();
            // $table->string('jw_awal')->nullable();
            // $table->string('jw_akhir')->nullable();
            // $table->string('status')->nullable();       
            // $table->string('keterangan')->nullable();
            // $table->string('tanggal_cl')->nullable();
            // $table->string('nomor_cl')->nullable();
            // $table->string('nomor_memo_permohonan_pembayaran_klaim')->nullable();
            // $table->string('tanggal_memo_permohonan_pembayaran_klaim')->nullable();
            // $table->string('tanggal_pembayaran_klaim')->nullable();
            // $table->string('tanggal_pelunasan_di_bagian_keuangan')->nullable();
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
