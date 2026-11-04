<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnidadeNoticia extends Model
{
    //
    protected $guarded = [];

    protected $casts = [
        'imagens' => 'array', // <-- ADICIONE ESTA LINHA
        'data' => 'date',
    ];

     public function unidade(): BelongsTo {
        return $this->belongsTo(UnidadeAcademica::class);
    }
}
