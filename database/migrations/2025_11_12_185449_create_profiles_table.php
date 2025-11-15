<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('especializacion')->nullable();
            $table->text('resumen'); // Breve descripción para el Hero
            $table->text('experiencia_laboral')->nullable(); // Guardado como texto/Markdown simple
            $table->string('foto_url')->nullable();
            
            // Redes Sociales
            $table->string('linkedin_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('x_url')->nullable();
            $table->string('email_contacto')->nullable();

            // Aseguramos que solo haya un registro de perfil
            $table->unique('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
