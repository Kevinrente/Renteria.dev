<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hashedPassword = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

        // Crear el Administrador único (User ID 1)
        User::firstOrCreate(['email' => 'admin@renteria.dev'], [
        'name' => 'Kevin Rentería (Admin)',
        'password' => $hashedPassword, // <-- Usamos el hash fijo
        ]);
        
        // Crear el registro ÚNICO de Perfil (ID 1)
        Profile::firstOrCreate(['id' => 1], [
            'nombre' => 'Kevin Rentería',
            'especializacion' => 'Desarrollador Web Full Stack (Laravel/React)',
            'resumen' => 'Soy un desarrollador apasionado por la creación de soluciones robustas y escalables con énfasis en la eficiencia del backend.',
            'experiencia_laboral' => "Trabajo 1: Empresa X (2020-2022)\nResponsabilidades: Migración de datos, desarrollo de APIs.\n\nTrabajo 2: Freelancer (2022-Presente)\nResponsabilidades: Desarrollo de plataformas de gestión.",
            'linkedin_url' => 'https://linkedin.com/in/kevin',
            'github_url' => 'https://github.com/kevin',
            'email_contacto' => 'contacto@renteria.dev',
        ]);
    }
}
