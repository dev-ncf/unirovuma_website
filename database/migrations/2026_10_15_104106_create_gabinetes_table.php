<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('gabinetes', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // Ex: "Gabinete de Comunicação e Imagem"
            $table->string('slug')->unique(); // Ex: "gabinete-de-comunicacao-e-imagem"
            $table->string('responsavel')->nullable(); // Nome do Chefe/Diretor do Gabinete
            $table->string('responsavel_foto')->nullable();
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->string('localizacao')->nullable(); // Ex: "Campus Universitário de Namuara, 1º Andar"
            $table->longText('sobre'); // Descrição completa das funções do gabinete
            $table->json('documentos')->nullable(); // Anexos úteis (regulamentos, formulários, etc.)
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('gabinetes');
    }
};