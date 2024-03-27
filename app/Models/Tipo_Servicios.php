<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Servicios extends Model
{
    use HasFactory;

    public function servicio_unidad()
    {
        return $this->hasMany(Servicios_Unidades::class, 'tipo_servicio_id','id');
    }

    protected $table = 'tipo_servicios';
}
