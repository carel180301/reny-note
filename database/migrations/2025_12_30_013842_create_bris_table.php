<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('bris', function (Blueprint $table) {
            $table->id();
            $table->string('unit')->nullable();
            $table->string('cabang_bank')->nullable();
            $table->string('nama_debitur')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('nilai_tuntutan_klaim')->nullable();
            $table->date('tanggal_klaim_diterima')->nullable();
            $table->date('tanggal_klaim_masuk_portal')->nullable();
            $table->string('status')->nullable();
            $table->string('tambahan_data')->nullable();
            $table->date('date_update')->nullable();
            $table->string('nomor_box')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('bris');
    }
};
