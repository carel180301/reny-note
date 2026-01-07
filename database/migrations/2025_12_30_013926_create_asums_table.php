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
        Schema::create('asums', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tertanggung');
            $table->string('posisi');
            $table->string('cob');
            $table->string('nama_pekerjaan');;
            $table->string('nomor_polis');
            $table->string('tanggal_polis');
            $table->string('nomor_stgr');
            $table->string('tanggal_stgr');
            $table->string('bulan_stgr');
            $table->string('tanggal_dol');
            $table->string('jangka_waktu_awal');
            $table->string('jangka_waktu_akhir');
            $table->string('penyebab_klaim');
            $table->string('nilai_tsi');
            // $table->string('tanggal_dol');
            // $table->string('jangka_waktu_awal');
            // $table->string('jangka_waktu_akhir');
            // $table->string('penyebab_klaim');
            // $table->string('nilai_tsi');
            // $table->string('share_ask');
            // $table->string('nilai_share_ask');
            // $table->string('nilai_tuntutan_klaim');
            // $table->string('status');
            // $table->string('tindak_lanjut');
            // $table->string('nomor_surat_tambahan_data');
            // $table->string('tanggal_surat_tambahan_data');
            // $table->string('nomor_register_sistem');
            // $table->string('tanggal_register_sistem');
            // $table->string('status_sistem');
            // $table->string('keterangan');
            // $table->string('tanggal_persetujuan');
            // $table->string('nomor_claim_settlement');
            // $table->string('tanggal_claim_settlement');
            // $table->string('nomor_surat_persetujuan_atau_penolakan');
            // $table->string('tanggal_surat_persetujuan_atau_penolakan');
            // $table->string('nomor_memo_permintaan_dana');
            // $table->string('tanggal_memo_permintaan_dana');
            // $table->string('status_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asums');
    }
};
