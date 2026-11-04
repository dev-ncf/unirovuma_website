<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('direcaos', function (Blueprint $table) {
            $table->id();
            $table->string('cargo'); // Ex: "Reitor", "Vice-Reitor Académico", "Vice-Reitor Administrativo"
            $table->string('slug')->unique(); // Ex: "reitor", "vice-reitor-academico"
            $table->string('nome_completo'); // Ex: "Prof. Dr. ..."
            $table->string('foto')->nullable();
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->longText('biografia'); // Biografia rica com editor de texto
            $table->longText('mensagem')->nullable(); // Mensagem institucional opcional
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('direcaos');
    }
};