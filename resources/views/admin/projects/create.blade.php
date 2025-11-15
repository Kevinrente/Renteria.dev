<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Crear Nuevo Proyecto') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-xl sm:rounded-lg">
                <h3 class="text-2xl font-bold mb-6 border-b pb-2 text-indigo-700">Registro de Nuevo Trabajo</h3>
                
                {{-- Importante: enctype para subida de archivos --}}
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @include('admin.projects._form', ['project' => new App\Models\Project()])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>