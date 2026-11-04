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
        Schema::table('unidade_projetos', function (Blueprint $table) {
            //
            $table->json('anexos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('unidade_projetos', function (Blueprint $table) {
            //
            $table->dropColumn('anexos');
        });
    }
};
