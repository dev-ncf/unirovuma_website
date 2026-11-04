<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');                // Ex: "Graduação", "Faculdade de Ciências"
            $table->string('url')->default('#');     // Ex: "/cursos", "https://..."
            $table->string('grupo');                 // Ex: "institucional", "ensino", "faculdades", etc.
            $table->string('coluna')->nullable();    // Para o Mega Menu (1 a 4)
            $table->integer('ordem')->default(0);    // Ordenação visual
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('menu_items');
    }
};