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
        Schema::create('akms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_debitur');
            $table->string('cabang_bank');
            $table->string('nomor_rekening');
            $table->string('nomor_polis');
            $table->string('tanggal_polis');
            $table->string('nomor_stgr');
            $table->string('tanggal_stgr');
            $table->string('bulan_stgr');
            $table->string('tanggal_dol');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akms');
    }
};
