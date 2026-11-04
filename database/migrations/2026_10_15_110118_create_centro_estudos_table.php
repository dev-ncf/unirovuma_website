<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('centro_estudos', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // Ex: "Centro de Estudos em Governação, Conflitos e Direitos Humanos"
            $table->string('slug')->unique(); // Ex: "centro-de-estudos-em-governacao..."
            $table->string('coordenador')->nullable(); // Nome do Coordenador/Diretor do Centro
            $table->string('coordenador_foto')->nullable();
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->string('localizacao')->nullable(); // Ex: "Campus Universitário de Nacala"
            $table->longText('sobre'); // Descrição, missão e objetivos do centro
            $table->json('areas_pesquisa')->nullable(); // Áreas ou linhas de investigação (Array/Tags)
            $table->json('documentos')->nullable(); // Relatórios, brochuras ou publicações (PDF)
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('centro_estudos');
    }
};