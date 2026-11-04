<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CentroEstudo extends Model
{
    //
    protected $fillable = [
        'nome', 'slug', 'coordenador', 'coordenador_foto', 
        'email', 'telefone', 'localizacao', 'sobre', 'areas_pesquisa', 'documentos'
    ];

    protected $casts = [
        'areas_pesquisa' => 'array',
        'documentos' => 'array',
    ];
}
