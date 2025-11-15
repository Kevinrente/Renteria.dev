<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Editar Proyecto: ' . $project->titulo) }}</h2>
    </x-slot>
    <div class="py-12"><div class="max-w-4xl mx-auto sm:px-6 lg:px-8"><div class="bg-white p-6 shadow-xl sm:rounded-lg">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.projects._form', ['project' => $project])
        </form>
    </div></div></div>
</x-app-layout>