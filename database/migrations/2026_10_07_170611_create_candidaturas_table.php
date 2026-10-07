<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('candidaturas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('bi_numero');
            $table->string('email');
            $table->string('telefone');
            $table->string('curso');
            $table->string('copia_bi');
            $table->string('comp_inscricao');
            $table->string('comp_pagamento');
            $table->string('requerimento');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('candidaturas');
    }
};