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
        //
        Schema::table('users', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('org_id')->nullable();
            $table->foreign('org_id')->references('id')->on('organisasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('parent_id');
            $table->dropColumn('org_id');
        });
    }
};