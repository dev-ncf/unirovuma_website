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
            $table->boolean('tem_estrutura_completa')->default(false)->after('descricao');
            $table->longText('sobre')->nullable()->after('tem_estrutura_completa');
            $table->json('cursos_desenvolvidos')->nullable()->after('sobre');
            $table->json('laboratorio')->nullable()->after('cursos_desenvolvidos');
            $table->json('atividades')->nullable()->after('laboratorio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('unidade_projetos', function (Blueprint $table) {
            //
            $table->dropColumn('tem_estrutura_completa');
            $table->dropColumn('sobre');
            $table->dropColumn('cursos_desenvolvidos');
            $table->dropColumn('laboratorio');
            $table->dropColumn('atividades');
        });
    }
};
