<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gabinete extends Model {
    protected $fillable = [
        'nome', 'slug', 'responsavel', 'responsavel_foto', 
        'email', 'telefone', 'localizacao', 'sobre', 'documentos'
    ];

    protected $casts = [
        'documentos' => 'array',
    ];
}