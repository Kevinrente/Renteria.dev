<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\Admin\StoreProjectRequest;
use App\Http\Requests\Admin\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage; // Para subida de imágenes
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectAdminController extends Controller
{
    public static function middleware(): array
    {
        return ['auth']; // Solo usuarios logueados pueden acceder (Tú).
    }

    public function index()
    {
        // Se puede añadir un with(['user']) si el proyecto tuviera un usuario asociado.
        $projects = Project::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();
        
        // 1. Manejo de la subida de imagen (Almacenamiento seguro)
        // El disco 'public' crea un enlace simbólico que debes correr con 'php artisan storage:link'
        if ($request->hasFile('imagen')) {
            // La validación en el Request asegura que es una imagen válida.
            $validated['imagen_url'] = $request->file('imagen')->store('project_images', 'public');
        } else {
            // Asegurarse de que si el campo es opcional, no se intente acceder a él.
            unset($validated['imagen']); 
        }
        
        // 2. Procesar la cadena de tecnologías (Convierte 'Laravel, Postgre' a un ARRAY)
        $techsString = $request->input('tecnologias', ''); 
        
        // Separamos por comas, limpiamos espacios y guardamos como ARRAY (el modelo lo serializa a JSON)
        $validated['tecnologias'] = array_map('trim', explode(',', $techsString));
        
        // 3. Crear el Proyecto
        Project::create($validated);
        
        return redirect()->route('admin.projects.index')->with('success', 'Proyecto creado exitosamente.');
    }
    
    public function show(Project $project)
    {
        // Esta vista mostrará la descripción detallada.
        return view('admin.projects.show', compact('project'));
    }
    
    // ... (Métodos edit, update, destroy se implementan de forma similar)
}