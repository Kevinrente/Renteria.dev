<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectAdminController; 
use App\Http\Controllers\Admin\ProfileAdminController; 
use App\Models\Project; 
use App\Models\Profile; 
use Illuminate\Support\Facades\Auth; // Needed for the dashboard logic

// ----------------------------------------------------
// 1. RUTAS PÚBLICAS
// ----------------------------------------------------

// RUTA PRINCIPAL (Home/Welcome): Carga dinámica de Perfil y Proyectos
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Rutas de Autenticación de Breeze
Route::get('/dashboard', function () {
    
    // 1. Cargar Contadores
    $totalProjects = Project::count();
    
    // 2. Cargar Perfil para verificación de redes (ID: 1)
    $profile = Profile::find(1);

    // 3. Calcular métricas (ej. Redes configuradas)
    $redesConfiguradas = 0;
    if ($profile) {
        if ($profile->linkedin_url) $redesConfiguradas++;
        if ($profile->github_url) $redesConfiguradas++;
    }

    // 4. Pasar las variables a la vista
    return view('dashboard', compact('totalProjects', 'redesConfiguradas'));

})->middleware(['auth', 'verified'])->name('dashboard');

// ----------------------------------------------------
// 2. RUTAS PROTEGIDAS (ADMIN PANEL)
// ----------------------------------------------------
Route::middleware(['auth'])->group(function () {
    
    // PERFIL DE USUARIO (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // GRUPO DE RUTAS DE ADMINISTRACIÓN: Usamos el prefijo 'admin'
    Route::prefix('admin')->group(function () {
        
        // GESTIÓN DE PROYECTOS (CRUD)
        Route::resource('projects', ProjectAdminController::class)->names([
            'index' => 'admin.projects.index',
            'create' => 'admin.projects.create',
            'store' => 'admin.projects.store',
            'edit' => 'admin.projects.edit',
            'update' => 'admin.projects.update',
            'destroy' => 'admin.projects.destroy',
            'show' => 'admin.projects.show', // <--- CORRECCIÓN CRÍTICA: Añadir ruta SHOW
        ]);

        // GESTIÓN DEL PERFIL PROFESIONAL (El registro único Profile ID: 1)
        Route::get('/profile', [ProfileAdminController::class, 'edit'])->name('admin.profile.edit');
        
        // CORRECCIÓN/OPTIMIZACIÓN: Usar Route::put para el método de actualización HTTP
        Route::put('/profile', [ProfileAdminController::class, 'update'])->name('admin.profile.update');
    });
    
});

require __DIR__.'/auth.php'; // Incluye las rutas de login/registro de Breeze