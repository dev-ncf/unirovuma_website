<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('direccao_centrals', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // Ex: "Direcção de Recursos Humanos"
            $table->string('slug')->unique(); // Ex: "direccao-de-recursos-humanos"
            $table->string('diretor')->nullable(); // Nome do Diretor
            $table->string('diretor_foto')->nullable();
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->string('localizacao')->nullable(); // Ex: "Reitoria, Piso 2"
            $table->longText('sobre'); // Descrição e competências da direção
            $table->json('documentos')->nullable(); // Formulários, requerimentos ou minutas úteis (PDF)
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('direccao_centrals');
    }
};