<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnidadeCurso extends Model
{
    //
    protected $guarded = [];
     public function unidade(): BelongsTo {
        return $this->belongsTo(UnidadeAcademica::class);
    }
}
