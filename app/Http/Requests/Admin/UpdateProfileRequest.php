<?php

namespace App\Http\Requests\Admin;


use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Solo el Admin (usuario logueado) puede actualizar el perfil
        return auth()->check();
    }

    public function rules(): array
    {
        // Reglas de validación para el registro único Profile
        return [
            'nombre' => ['required', 'string', 'max:100'],
            'especializacion' => ['nullable', 'string', 'max:255'],
            'resumen' => ['required', 'string', 'max:500'],
            'experiencia_laboral' => ['nullable', 'string'],
            
            // Reglas de URL para redes sociales
            'email_contacto' => ['nullable', 'email', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'x_url' => ['nullable', 'url', 'max:255'],
            // Se puede agregar validación para 'foto_url' si se implementa la subida de archivos
        ];
    }
}
