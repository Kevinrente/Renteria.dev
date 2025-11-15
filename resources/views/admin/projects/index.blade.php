<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Gestión de Proyectos') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">{{ session('success') }}</div>
                @endif

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">Catálogo de Proyectos</h3>
                    <a href="{{ route('admin.projects.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md shadow-md">
                        + Agregar Nuevo Proyecto
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tecnologías</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($projects as $project)
                                <tr>
                                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $project->titulo }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{-- CORRECCIÓN CLAVE: El modelo ya casteó el campo a array; usamos implode() directamente. --}}
                                        {{ implode(', ', $project->tecnologias ?? []) }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{-- La ruta 'admin.projects.show' no existe, usamos 'edit' para gestionar --}}
                                        <a href="{{ route('admin.projects.edit', $project) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                                        
                                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este proyecto?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="px-6 py-4 text-center text-gray-500 italic">No hay proyectos registrados.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">{{ $projects->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout><x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Gestión de Proyectos') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">{{ session('success') }}</div>
                @endif

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">Catálogo de Proyectos</h3>
                    <a href="{{ route('admin.projects.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md shadow-md">
                        + Agregar Nuevo Proyecto
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tecnologías</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($projects as $project)
                                <tr>
                                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $project->titulo }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{-- Muestra las tecnologías separadas por coma --}}
                                        {{ implode(', ', json_decode($project->tecnologias ?? '[]')) }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.projects.edit', $project) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                                        
                                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este proyecto?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="px-6 py-4 text-center text-gray-500 italic">No hay proyectos registrados.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">{{ $projects->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>