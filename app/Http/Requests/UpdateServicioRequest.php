<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServicioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'descripcion' => ['nullable', 'string', 'max:200'],
            'observaciones' => ['nullable', 'string', 'max:200'],
            'accesorios' => ['nullable', 'string', 'max:200'],
            'es_empresa' => ['nullable', 'boolean'],
            'fecha_entrada' => ['nullable', 'date'],
            'fecha_salida' => ['nullable', 'date'],
            'usuario' => ['nullable', 'exists:Personas,id'],
            'tecnico' => ['nullable', 'exists:Personas,id'],
            'tipo_estado_id' => ['nullable', 'exists:Tipo_Estados,id'],
            'tipo_servicio_id' => ['nullable', 'exists:Tipo_Servicios,id'],
            'unidade_id' => ['nullable', 'exists:Unidades,id'],
        ];
    }
}
