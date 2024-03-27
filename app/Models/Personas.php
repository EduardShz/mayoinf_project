<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;

    public function empresa()
    {
        return $this->belongsTo(Empresas::class, 'empresa_id','id');
    }

    public function tipopers()
    {
        return $this->belongsTo(Tipo_Personas::class, 'tipo_persona_id','id');
    }
}
