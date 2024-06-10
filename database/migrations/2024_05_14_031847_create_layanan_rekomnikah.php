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
        Schema::create('layanan_rekomnikah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon');
            $table->string('nik')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('gender')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('status_pernikahan');
            $table->string('keperluan_surat')->nullable();
            $table->string('nama_pasangan_lama')->nullable();
            // ayah
            $table->string('nama_ayah')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('tempat_lahir_ayah')->nullable();
            $table->date('tanggal_lahir_ayah')->nullable();
            $table->string('kewarganegaraan_ayah');
            $table->string('agama_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            // ibu
            $table->string('nama_ibu')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('tempat_lahir_ibu')->nullable();
            $table->date('tanggal_lahir_ibu')->nullable();
            $table->string('kewarganegaraan_ibu');
            $table->string('agama_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            // dokumen upload
            $table->string('foto_ktp')->nullable();
            $table->string('foto_kk')->nullable();
            $table->unsignedBigInteger('transaksi_id')->nullable();
            $table->foreign('transaksi_id')->references('id')->on('transaksi_layanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_rekomnikah');
    }
};
