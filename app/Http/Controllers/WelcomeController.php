<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Carga el perfil único y los proyectos para la página principal.
     */
    public function index()
    {
        // 1. Obtener el perfil único (ID: 1)
        $profile = Profile::find(1);

        // 2. Obtener los proyectos (ordenados por el más reciente)
        $projects = Project::orderBy('created_at', 'desc')->get();

        return view('welcome', compact('profile', 'projects'));
    }
}