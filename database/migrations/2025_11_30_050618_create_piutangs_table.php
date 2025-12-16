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
        Schema::create('piutangs', function (Blueprint $table) {
            $table->id();
            $table->string('cob');
            $table->string('nomor_polis');
            $table->date('tanggal_polis');
            $table->string('broker');
            $table->string('nama_tertanggung');
            $table->date('wpc');
            $table->string('email');
            $table->string('currency');
            $table->string('outstanding');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piutangs');
    }
};
