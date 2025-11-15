<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $project->titulo }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-xl sm:rounded-lg">
                <h3 class="text-2xl font-bold mb-4 text-indigo-700">Descripción Detallada</h3>
                
                {{-- Descripción --}}
                <p class="text-gray-700 whitespace-pre-wrap leading-relaxed mb-6">
                    {{ $project->descripcion_detallada }}
                </p>
                
                <h4 class="text-lg font-semibold border-t pt-4 mt-6">Tecnologías Utilizadas</h4>
                <div class="flex flex-wrap gap-2 mt-2">
                    @foreach ($project->tecnologias ?? [] as $tech)
                        <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">{{ $tech }}</span>
                    @endforeach
                </div>
                
                <div class="mt-8 flex space-x-4">
                    <a href="{{ $project->enlace_github }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 font-medium">Ver Código (GitHub)</a>
                    @if($project->enlace_demo)
                        <a href="{{ $project->enlace_demo }}" target="_blank" class="text-green-600 hover:text-green-800 font-medium">Ver Demo</a>
                    @endif
                </div>

                <a href="{{ route('welcome') }}" class="mt-8 block text-gray-600 hover:text-gray-800">&larr; Volver al Portafolio</a>
            </div>
        </div>
    </div>
</x-app-layout>