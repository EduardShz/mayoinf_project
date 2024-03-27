<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Servicios_Unidades extends Model
{
    use HasFactory;
    
    public function servicio()
    {
        return $this->belongsTo(Servicios::class, 'servicio_id','id');
    }

    public function getLongTrabajoFormatAttribute()
    {
        return Carbon::parse($this->attributes['fecha_trabajo'])->format('Y-m-d h:i a');
    }

    protected $table = 'servicios_unidades';
}
