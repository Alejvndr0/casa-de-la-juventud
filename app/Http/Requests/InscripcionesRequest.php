<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscripcionesRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
           'fecha_inscripcion' => 'required|date',
            'fecha_expiracion' => 'nullable|date',
            'fecha_nac' => 'required|date',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'email' => 'required|email',
            'pdf' => 'required|file|mimes:pdf|max:2048',
            'id_clase' => 'required|exists:clases,id',
        ];
    }
}
