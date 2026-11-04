<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnidadeAcademica extends Model {
    protected $fillable = ['nome', 'slug', 'tipo', 'diretor', 'email', 'telefone', 'sobre', 'imagem_capa'];

    public function cursos(): HasMany {
        return $this->hasMany(UnidadeCurso::class);
    }

    public function noticias(): HasMany {
        return $this->hasMany(UnidadeNoticia::class);
    }

    public function projetos(): HasMany {
        return $this->hasMany(UnidadeProjeto::class);
    }
}