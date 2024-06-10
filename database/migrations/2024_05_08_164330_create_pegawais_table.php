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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('app_email')->unique();
            $table->string('name_org')->nullable();
            $table->string('address_org')->nullable();
            $table->string('phone_org')->nullable();
            $table->string('fax_org')->nullable();
            $table->string('icon_app')->nullable();
            $table->string('icon_fav')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};