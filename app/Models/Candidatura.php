<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidatura extends Model {
    use HasFactory;

    protected $fillable = [
        'nome', 'bi_numero', 'email', 'telefone', 'curso',
        'copia_bi', 'comp_inscricao', 'comp_pagamento', 'requerimento'
    ];
}
