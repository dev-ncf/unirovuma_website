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
        Schema::table('unidade_academicas', function (Blueprint $table) {
            //
            $table->string('diretor_foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('unidade_academicas', function (Blueprint $table) {
            //
            $table->dropColumn('diretor_foto');
        });
    }
};
