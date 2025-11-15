<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Perfil Profesional (CV Dinámico)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-xl sm:rounded-lg">
                <h3 class="text-2xl font-bold mb-6 border-b pb-2">Información Pública y Experiencia</h3>
                
                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif
                
                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf 
                    @method('PUT')
                    
                    {{-- SECCIÓN DE PRESENTACIÓN --}}
                    <h4 class="text-lg font-semibold mb-3 text-indigo-600">Datos Principales y Resumen (Sección Inicio)</h4>
                    <div class="space-y-4 mb-8 border p-4 rounded-md bg-gray-50">
                        
                        {{-- Nombre --}}
                        <div>
                            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $profile->nombre) }}" required
                                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm p-2">
                            @error('nombre')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                        </div>

                        {{-- Especialización --}}
                        <div>
                            <label for="especializacion" class="block text-sm font-medium text-gray-700">Especialización/Título</label>
                            <input type="text" name="especializacion" id="especializacion" value="{{ old('especializacion', $profile->especializacion) }}" placeholder="Ej: Desarrollador Web Full Stack"
                                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm p-2">
                        </div>

                        {{-- Resumen Breve --}}
                        <div>
                            <label for="resumen" class="block text-sm font-medium text-gray-700">Resumen Breve (Aparece en el Hero)</label>
                            <textarea name="resumen" id="resumen" rows="3" placeholder="Describe brevemente tu especialidad y pasión." required
                                      class="w-full mt-1 border-gray-300 rounded-md shadow-sm p-2">{{ old('resumen', $profile->resumen) }}</textarea>
                            @error('resumen')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- SECCIÓN DE EXPERIENCIA LABORAL --}}
                    <h4 class="text-lg font-semibold mb-3 text-indigo-600">Experiencia Laboral (Sección Experiencia)</h4>
                    <p class="text-sm text-gray-500 mb-2">Usa saltos de línea para separar puestos de trabajo y responsabilidades. (Se mostrará el formato pre-formateado en la web).</p>
                    <textarea name="experiencia_laboral" id="experiencia_laboral" rows="10" placeholder="Trabajo 1: Empresa X (2020-2022)&#10;Responsabilidades: Migración de datos, desarrollo de APIs.&#10;&#10;Trabajo 2: Freelancer (2022-Presente)..." required
                              class="w-full mt-1 border-gray-300 rounded-md shadow-sm p-2 mb-8">{{ old('experiencia_laboral', $profile->experiencia_laboral) }}</textarea>
                    @error('experiencia_laboral')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror

                    {{-- SECCIÓN DE REDES SOCIALES Y CONTACTO --}}
                    <h4 class="text-lg font-semibold mb-3 mt-8 text-indigo-600">Enlaces de Contacto y Redes</h4>
                    <div class="space-y-4 border p-4 rounded-md bg-gray-50">
                        <input type="email" name="email_contacto" placeholder="Email de Contacto Público" value="{{ old('email_contacto', $profile->email_contacto) }}"
                               class="w-full border-gray-300 rounded-md shadow-sm p-2">
                        <input type="url" name="linkedin_url" placeholder="LinkedIn URL" value="{{ old('linkedin_url', $profile->linkedin_url) }}"
                               class="w-full border-gray-300 rounded-md shadow-sm p-2">
                        <input type="url" name="github_url" placeholder="GitHub URL" value="{{ old('github_url', $profile->github_url) }}"
                               class="w-full border-gray-300 rounded-md shadow-sm p-2">
                        <input type="url" name="x_url" placeholder="X (Twitter) URL" value="{{ old('x_url', $profile->x_url) }}"
                               class="w-full border-gray-300 rounded-md shadow-sm p-2">
                    </div>

                    <button type="submit" class="mt-8 bg-indigo-600 text-white py-3 px-8 rounded-md hover:bg-indigo-700 transition duration-150 shadow-md">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>