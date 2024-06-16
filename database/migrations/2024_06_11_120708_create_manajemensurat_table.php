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
        Schema::create('manajemensurat', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->string('perihal');
            $table->string('pengirim');
            $table->date('tanggal_surat');
            $table->enum('jenis_surat',['UNDANGAN','PEMBERITAHUAN']);
            $table->string('lampiran');
            $table->bigInteger('disposisi_ke')->unsigned();
            $table->foreign('disposisi_ke')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status',['terlaksana','belum-terlaksana'])->default('belum-terlaksana');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manajemensurat');
    }
};
