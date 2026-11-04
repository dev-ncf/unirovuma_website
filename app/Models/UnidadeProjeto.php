<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnidadeProjeto extends Model
{
    //
    protected $guarded = [];
     protected $casts = [
        'anexos' => 'array', // Essencial para múltiplos ficheiros
    ];

    public function unidade(): BelongsTo {
        return $this->belongsTo(UnidadeAcademica::class);
    }
}
