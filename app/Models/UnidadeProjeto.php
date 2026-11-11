<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnidadeProjeto extends Model
{
    //
    protected $guarded = [];
     protected $casts = [
        'anexos' => 'array', 
        'cursos_desenvolvidos' => 'array',
        'laboratorio' => 'array',
        'atividades' => 'array',
        'tem_estrutura_completa' => 'boolean',
    ];

    public function unidade(): BelongsTo {
        return $this->belongsTo(UnidadeAcademica::class);
    }
}
