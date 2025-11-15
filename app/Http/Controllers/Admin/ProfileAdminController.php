<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Requests\Admin\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; // Se puede eliminar ya que no se usa

class ProfileAdminController extends Controller
{
    public static function middleware(): array
    {
        return ['auth'];
    }

    /**
     * Muestra el formulario para editar el perfil.
     * Carga el registro ÚNICO (ID 1) o lo crea si es la primera vez.
     */
    public function edit()
    {
        // 1. Usamos findOrNew para evitar crear el registro si no es necesario,
        // pero firstOrCreate es más directo para garantizar la existencia del ID 1.
        $profile = Profile::firstOrCreate(['id' => 1], [
            'nombre' => Auth::user()->name,
            'resumen' => 'Mi resumen profesional aquí.',
            'experiencia_laboral' => '',
        ]);
        
        return view('admin.profile.edit', compact('profile'));
    }

    /**
     * Actualiza el registro del perfil único (ID 1).
     */
    public function update(UpdateProfileRequest $request)
    {
        // 1. Buscamos el perfil por ID (sabemos que existe por el método edit/seeder)
        // Usamos findOrFail para ser estrictos.
        $profile = Profile::findOrFail(1); 
        
        // CORRECCIÓN: El bloque redundante de firstOrCreate se elimina.
        
        $validated = $request->validated();
        
        $profile->update($validated);
        
        return redirect()->route('admin.profile.edit')->with('success', 'Perfil profesional actualizado.');
    }
}