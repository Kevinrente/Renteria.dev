<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'titulo' => ['required', 'string', 'max:255', 'unique:projects,titulo'],
            
            // CORRECCIÓN CRÍTICA: Añadir las reglas para los campos obligatorios
            'descripcion_corta' => ['required', 'string', 'max:255'],
            'descripcion_detallada' => ['required', 'string'],

            // El resto de los campos...
            'tecnologias' => ['required', 'string'], 
            'imagen' => ['nullable', 'image', 'max:5000'], // Añadir validación para la imagen
            'enlace_github' => ['nullable', 'url', 'max:255'],
            'enlace_demo' => ['nullable', 'url', 'max:255'],
        ];
    }
}
