<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateServicioRequest extends FormRequest
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
            'descripcion' => ['required', 'string', 'max:200'],
            'observaciones' => ['nullable', 'string', 'max:200'],
            'accesorios' => ['nullable', 'string', 'max:200'],
            'es_empresa' => ['required', 'boolean'],
            'fecha_entrada' => ['required', 'date'],
            'fecha_salida' => ['nullable', 'date'],
            'usuario' => ['required', 'exists:Personas,id'],
            'tecnico' => ['required', 'exists:Personas,id'],
            'tipo_estado_id' => ['required', 'exists:Tipo_Estados,id'],
            'tipo_servicio_id' => ['required', 'exists:Tipo_Servicios,id'],
            'unidade_id' => ['required', 'exists:Unidades,id'],
        ];
    }

    public function messages()
    {
        return [
            'descripcion.required' => 'Escribir una descripción es obligatorio.',
            'es_empresa.required' => 'Determinar si el servicio es empresarial o no es obligatorio.',
            'fecha_entrada.required' => 'Determinar la fecha de entrada es obligatorio.',
            'usuario.required' => 'Seleccionar a un usuario es obligatorio.',
            'tecnico.required' => 'Seleccionar a un técnico es obligatorio.',
            'tipo_estado_id.required' => 'Determinar el estado del servicio es obligatorio.',
            'tipo_servicio_id.required' => 'Determinar el tipo de servicio obligatorio.',
            'unidade_id.required' => 'Determinar una unidad es obligatorio.',
        ];
    }
}
