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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('imagen_url')->nullable(); // Para la tarjeta
            $table->string('descripcion_corta', 255);
            $table->text('descripcion_detallada');
            $table->json('tecnologias'); // Almacenado como JSON: ['Laravel', 'PostgreSQL', 'Tailwind']
            $table->string('enlace_github')->nullable();
            $table->string('enlace_demo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
