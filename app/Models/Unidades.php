<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidades extends Model
{
    use HasFactory;

    public function marcas()
    {
        return $this->belongsTo(Marcas::class, 'marca_id', 'id');
    }

    public function tipounit()
    {
        return $this->belongsTo(Tipo_Unidades::class, 'tipo_unidade_id', 'id');
    }

    public function tipostate()
    {
        return $this->belongsTo(Tipo_Estados::class, 'tipo_estado_id', 'id');
    }

    public function responsable()
    {
        return $this->belongsTo(Personas::class, 'persona_id', 'id');
    }
}
