@csrf

<div class="space-y-6">
    
    {{-- Título y Descripción Corta --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="titulo" class="block text-sm font-semibold text-gray-700 mb-1">Título:</label>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $project->titulo ?? '') }}" required
                   class="w-full border-gray-300 rounded-md shadow-sm @error('titulo') border-red-500 @enderror">
            @error('titulo')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="descripcion_corta" class="block text-sm font-semibold text-gray-700 mb-1">Descripción Corta (Máx 255 chars):</label>
            <input type="text" name="descripcion_corta" id="descripcion_corta" value="{{ old('descripcion_corta', $project->descripcion_corta ?? '') }}" required maxlength="255"
                   class="w-full border-gray-300 rounded-md shadow-sm @error('descripcion_corta') border-red-500 @enderror">
            @error('descripcion_corta')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    {{-- Imagen y Tecnologías --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="imagen" class="block text-sm font-semibold text-gray-700 mb-1">Imagen de Portada:</label>
            <input type="file" name="imagen" id="imagen" class="w-full border p-1 rounded-md">
            @if(isset($project) && $project->imagen_url)
                <p class="text-xs text-gray-500 mt-1">Imagen actual: {{ $project->imagen_url }}</p>
            @endif
            @error('imagen')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="tecnologias" class="block text-sm font-semibold text-gray-700 mb-1">Tecnologías (Separar por comas):</label>
            @php
                // Prepara el string de tecnologías para edición/creación
                $techs = isset($project) && is_array($project->tecnologias) 
                    ? implode(', ', $project->tecnologias) 
                    : old('tecnologias');
            @endphp
            <input type="text" name="tecnologias" id="tecnologias" value="{{ $techs }}" placeholder="Ej: Laravel, PostgreSQL, Tailwind" required
                   class="w-full border-gray-300 rounded-md shadow-sm @error('tecnologias') border-red-500 @enderror">
            @error('tecnologias')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    {{-- Enlaces --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="enlace_github" class="block text-sm font-semibold text-gray-700 mb-1">Enlace GitHub:</label>
            <input type="url" name="enlace_github" id="enlace_github" value="{{ old('enlace_github', $project->enlace_github ?? '') }}" placeholder="URL del Repositorio">
        </div>
        <div>
            <label for="enlace_demo" class="block text-sm font-semibold text-gray-700 mb-1">Enlace Demo/Live:</label>
            <input type="url" name="enlace_demo" id="enlace_demo" value="{{ old('enlace_demo', $project->enlace_demo ?? '') }}" placeholder="URL de Demostración">
        </div>
    </div>

    {{-- Descripción Detallada --}}
    <div>
        <label for="descripcion_detallada" class="block text-sm font-semibold text-gray-700 mb-1">Descripción Detallada (Ver Más):</label>
        <textarea name="descripcion_detallada" id="descripcion_detallada" rows="8" required
                  class="w-full border-gray-300 rounded-md shadow-sm @error('descripcion_detallada') border-red-500 @enderror">{{ old('descripcion_detallada', $project->descripcion_detallada ?? '') }}</textarea>
        @error('descripcion_detallada')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="flex justify-end space-x-3 pt-4 border-t">
        <a href="{{ route('admin.projects.index') }}" class="py-2 px-4 text-sm font-medium text-gray-600 border rounded-md hover:bg-gray-100">Cancelar</a>
        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md shadow-md">
            {{ isset($project) ? 'Actualizar Proyecto' : 'Crear Proyecto' }}
        </button>
    </div>
</div>