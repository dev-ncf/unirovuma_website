<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DireccaoCentral extends Model
{
    //
      protected $fillable = [
        'nome', 'slug', 'diretor', 'diretor_foto', 
        'email', 'telefone', 'localizacao', 'sobre', 'documentos'
    ];

    protected $casts = [
        'documentos' => 'array',
    ];
}
