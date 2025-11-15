<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     * Incluye todos los campos que vienen del StoreProjectRequest.
     * @var array
     */
    protected $fillable = [
        'titulo',
        'descripcion_corta',
        'descripcion_detallada',
        'tecnologias', // Campo JSON
        'imagen_url',  // Campo para la ruta de la imagen
        'enlace_github',
        'enlace_demo',
    ];

    /**
     * El campo 'tecnologias' debe ser casteado a array para manejar JSON.
     * @var array
     */
    protected $casts = [
        'tecnologias' => 'array',
    ];

    // ... (rest of the model code)
}
