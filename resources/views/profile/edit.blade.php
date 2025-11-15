<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Editar Perfil Profesional') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-xl sm:rounded-lg">
                <h3 class="text-2xl font-bold mb-6 border-b pb-2">Información Pública y Experiencia</h3>
                
                @if (session('success'))<div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">{{ session('success') }}</div>@endif

                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf @method('PUT')
                    
                    {{-- Sección de Presentación --}}
                    <h4 class="text-lg font-semibold mb-3 text-accent">Datos Personales y Resumen</h4>
                    <div class="space-y-4 mb-6">
                        <input type="text" name="nombre" placeholder="Tu Nombre" value="{{ old('nombre', $profile->nombre) }}" required>
                        <input type="text" name="especializacion" placeholder="Tu Especialización" value="{{ old('especializacion', $profile->especializacion) }}">
                        <textarea name="resumen" rows="3" placeholder="Resumen Breve (Sección Inicio)" required>{{ old('resumen', $profile->resumen) }}</textarea>
                    </div>

                    {{-- Sección de Experiencia Laboral --}}
                    <h4 class="text-lg font-semibold mb-3 text-accent">Experiencia Profesional (Detallada)</h4>
                    <textarea name="experiencia_laboral" rows="10" placeholder="Escribe tu experiencia laboral en formato de lista o párrafos..." required>{{ old('experiencia_laboral', $profile->experiencia_laboral) }}</textarea>

                    {{-- Sección de Redes Sociales y Contacto --}}
                    <h4 class="text-lg font-semibold mb-3 mt-8 text-accent">Redes Sociales y Contacto</h4>
                    <div class="space-y-4">
                        <input type="email" name="email_contacto" placeholder="Email de Contacto" value="{{ old('email_contacto', $profile->email_contacto) }}">
                        <input type="url" name="linkedin_url" placeholder="LinkedIn URL" value="{{ old('linkedin_url', $profile->linkedin_url) }}">
                        <input type="url" name="github_url" placeholder="GitHub URL" value="{{ old('github_url', $profile->github_url) }}">
                        <input type="url" name="x_url" placeholder="X (Twitter) URL" value="{{ old('x_url', $profile->x_url) }}">
                    </div>

                    <button type="submit" class="mt-8 bg-accent text-white py-3 px-8 rounded-md hover:bg-primary transition duration-150">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
