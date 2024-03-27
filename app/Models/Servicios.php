<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Servicios extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function usuariodata()
    {
        return $this->belongsTo(Personas::class, 'usuario','id');
    }

    public function tecnicodata()
    {
        return $this->belongsTo(Personas::class, 'tecnico','id');
    }

    public function tiposerv()
    {
        return $this->belongsTo(Tipo_Servicios::class, 'tipo_servicio_id','id');
    }

    public function tipostate()
    {
        return $this->belongsTo(Tipo_Estados::class, 'tipo_estado_id','id');
    }

    public function unidades()
    {
        return $this->belongsTo(Unidades::class, 'unidade_id', 'id');
    }

    public function servicio_unidad()
    {
        return $this->hasMany(Servicios_Unidades::class, 'servicio_id','id');
    }

    public function getShortEntradaFormatAttribute()
    {
        return Carbon::parse($this->attributes['fecha_entrada'])->format('Y-m-d');
    }

    public function getLongEntradaFormatAttribute()
    {
        return Carbon::parse($this->attributes['fecha_entrada'])->format('Y-m-d h:i a');
    }

    public function getFechaEntrada12hAttribute()
    {
        return Carbon::parse($this->attributes['fecha_entrada'])->format('h:i a');
    }

    public function getShortSalidaFormatAttribute()
    {
        return Carbon::parse($this->attributes['fecha_salida'])->format('Y-m-d');
    }

    public function getLongSalidaFormatAttribute()
    {
        return Carbon::parse($this->attributes['fecha_salida'])->format('Y-m-d h:i a');
    }

    public function getFechaSalida12hAttribute()
    {
        return Carbon::parse($this->attributes['fecha_salida'])->format('h:i a');
    }

    
    protected $fillable = [
        'descripcion',
        'observaciones',
        'accesorios',
        'es_empresa',
        'fecha_entrada',
        'fecha_salida',
        'usuario',
        'tecnico',
        'tipo_estado_id',
        'tipo_servicio_id',
        'unidade_id',
        'oculto',
    ];

    protected $dates = [
        'fecha_entrada',
        'fecha_salida'
    ];

}
