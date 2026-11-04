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
        Schema::create('unidade_academicas', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // Ex: "Faculdade de Ciências"
            $table->string('slug')->unique(); // Ex: "faculdade-de-ciencias"
            $table->string('tipo'); // 'faculdade', 'instituto', 'centro', 'direccao'
            $table->string('diretor')->nullable(); // Nome do Diretor/Responsável
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->longText('sobre')->nullable(); // Descrição rica
            $table->string('imagem_capa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidade_academicas');
    }
};
