<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Panel de Administración y Resumen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <h3 class="text-3xl font-extrabold text-white mb-6">Bienvenido, {{ Auth::user()->name }}</h3>

            {{-- 1. SECCIÓN DE ESTADÍSTICAS RÁPIDAS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                
                {{-- Tarjeta 1: Total de Proyectos --}}
                <div class="bg-gray-800 p-6 rounded-xl shadow-lg border-b-4 border-indigo-500">
                    <p class="text-sm font-semibold text-indigo-400">Proyectos Registrados</p>
                    <p class="text-4xl font-bold text-white mt-1">{{ $totalProjects }}</p>
                    <a href="{{ route('admin.projects.index') }}" class="text-indigo-400 text-sm hover:text-indigo-300 mt-2 block">Gestionar →</a>
                </div>

                {{-- Tarjeta 2: Perfil Configurado --}}
                <div class="bg-gray-800 p-6 rounded-xl shadow-lg border-b-4 {{ $redesConfiguradas >= 2 ? 'border-green-500' : 'border-yellow-500' }}">
                    <p class="text-sm font-semibold {{ $redesConfiguradas >= 2 ? 'text-green-400' : 'text-yellow-400' }}">Redes Esenciales Config.</p>
                    <p class="text-4xl font-bold text-white mt-1">{{ $redesConfiguradas }} / 2</p>
                    <a href="{{ route('admin.profile.edit') }}" class="text-indigo-400 text-sm hover:text-indigo-300 mt-2 block">Editar Perfil →</a>
                </div>
                
                {{-- Tarjeta 3: Visibilidad Pública --}}
                <div class="bg-gray-800 p-6 rounded-xl shadow-lg border-b-4 border-gray-500">
                    <p class="text-sm font-semibold text-gray-400">Página Pública</p>
                    <p class="text-2xl font-bold text-white mt-1">Renteria.dev</p>
                    <a href="{{ route('welcome') }}" target="_blank" class="text-indigo-400 text-sm hover:text-indigo-300 mt-2 block">Ver Portafolio (Live) →</a>
                </div>
            </div>

            {{-- 2. ACCIONES RÁPIDAS --}}
            <div class="bg-gray-800 p-8 rounded-xl shadow-lg">
                <h4 class="text-xl font-bold text-white mb-4">Acciones Rápidas</h4>
                <div class="flex space-x-4">
                    <a href="{{ route('admin.projects.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md shadow-md">
                        + Nuevo Proyecto
                    </a>
                    <a href="{{ route('admin.profile.edit') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md shadow-md">
                        Actualizar CV
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
