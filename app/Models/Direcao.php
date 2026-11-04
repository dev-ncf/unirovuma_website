<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direcao extends Model
{
    //
    protected $fillable = ['cargo', 'slug', 'nome_completo', 'foto', 'email', 'telefone', 'biografia', 'mensagem'];
}
