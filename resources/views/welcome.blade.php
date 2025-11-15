<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->nombre ?? 'Kevin Rentería' }} - Desarrollador Web</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Definición de colores y estilos globales */
        :root {
            --primary-accent: #1976D2; /* Azul principal */
            --secondary-accent: #10B981; /* Verde (Éxito/Acento) */
        }
        .text-accent { color: var(--primary-accent); }
        .bg-accent { background-color: var(--primary-accent); }
        .border-accent { border-color: var(--primary-accent); }
        .hover\:text-secondary:hover { color: var(--secondary-accent); }
        .hover\:bg-secondary:hover { background-color: var(--secondary-accent); }
        .fade-in { animation: fadeIn 1.5s; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased font-sans">

    {{-- BARRA DE NAVEGACIÓN FIJA --}}
    <header class="sticky top-0 z-50 bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
            <h1 class="text-xl font-extrabold text-gray-800 tracking-wider">{{ $profile->nombre ?? 'Renteria.dev' }}</h1>
            <nav class="space-x-6 text-sm font-semibold tracking-wide">
                <a href="#inicio" class="text-gray-600 hover:text-accent transition duration-150">Inicio</a>
                <a href="#proyectos" class="text-gray-600 hover:text-accent transition duration-150">Proyectos</a>
                <a href="#experiencia" class="text-gray-600 hover:text-accent transition duration-150">Experiencia</a>
                <a href="#contacto" class="text-gray-600 hover:text-accent transition duration-150">Contacto</a>
                <a href="/dashboard" class="text-accent hover:text-secondary font-bold transition duration-150">Admin</a>
            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4">

        {{-- 1. SECCIÓN DE PRESENTACIÓN (HERO) --}}
        <section id="inicio" class="py-24 md:py-40 text-center fade-in">
            <div class="md:w-full max-w-4xl mx-auto">
                <h2 class="text-3xl md:text-5xl font-extrabold mb-3 leading-tight">
                    ¡Hola! Soy <span class="text-accent">{{ $profile->nombre ?? 'Kevin Rentería' }}</span>.
                </h2>
                <p class="text-xl text-gray-600 mb-6 font-medium">{{ $profile->especializacion ?? 'Desarrollador Web Full Stack' }}</p>
                
                <p class="text-lg text-gray-700 leading-relaxed max-w-3xl mx-auto mb-8">
                    {{ $profile->resumen ?? 'Soy un desarrollador apasionado por la creación de soluciones robustas y escalables con énfasis en la eficiencia del backend y la experiencia del usuario.' }}
                </p>

                <div class="mt-8 flex justify-center space-x-6">
                    <a href="{{ $profile->github_url ?? '#' }}" target="_blank" class="bg-gray-800 text-white py-3 px-8 rounded-full hover:bg-accent transition duration-300 transform hover:scale-105 shadow-md">Ver GitHub</a>
                    <a href="{{ $profile->linkedin_url ?? '#' }}" target="_blank" class="bg-accent text-white py-3 px-8 rounded-full hover:bg-secondary transition duration-300 transform hover:scale-105 shadow-md">Contáctame</a>
                </div>
            </div>
        </section>

        <hr class="my-16 border-gray-200">

        {{-- 2. SECCIÓN MIS PROYECTOS --}}
        <section id="proyectos" class="py-12">
            <h3 class="text-3xl font-bold text-center text-gray-800 mb-12">Proyectos Destacados</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse ($projects as $project)
                    <div class="bg-white rounded-xl shadow-custom overflow-hidden border border-gray-200 transform hover:-translate-y-1 transition duration-300 fade-in">
                        {{-- Placeholder de Imagen o Imagen Real --}}
                        <div class="h-40 bg-gray-100 flex items-center justify-center text-gray-500 font-medium border-b">
                            @if ($project->imagen_url)
                                <img src="{{ asset('storage/' . $project->imagen_url) }}" alt="{{ $project->titulo }}" class="w-full h-full object-cover">
                            @else
                                {{ $project->titulo }}
                            @endif
                        </div>
                        
                        <div class="p-5">
                            <h4 class="text-xl font-bold mb-1 text-accent">{{ $project->titulo }}</h4>
                            <p class="text-gray-600 text-sm mb-4">{{ $project->descripcion_corta }}</p>
                            
                            {{-- Tecnologías Usadas (JSON casted a array) --}}
                            <div class="mb-4 flex flex-wrap gap-2">
                                @foreach ($project->tecnologias ?? [] as $tech)
                                    <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-3 py-1 rounded-full">{{ $tech }}</span>
                                @endforeach
                            </div>

                            <a href="{{ route('admin.projects.show', $project) }}" class="text-accent hover:text-secondary font-semibold text-sm inline-flex items-center mt-3">
                                Ver detalles y Demo →
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500 italic p-10 border rounded-lg bg-white">No hay proyectos registrados aún. Usa el Panel Admin para agregarlos.</p>
                @endforelse
            </div>
        </section>

        <hr class="my-16 border-gray-200">

        {{-- 3. SECCIÓN EXPERIENCIA PROFESIONAL --}}
        <section id="experiencia" class="py-12">
            <h3 class="text-3xl font-bold text-center text-gray-800 mb-12">Experiencia Profesional</h3>
            
            <div class="max-w-4xl mx-auto bg-white p-10 rounded-xl shadow-lg border border-gray-100">
                {{-- whitespace-pre-wrap respeta los saltos de línea del textarea del Admin --}}
                <p class="whitespace-pre-wrap text-gray-700 leading-relaxed">
                    {{ $profile->experiencia_laboral ?? 'Experiencia laboral no definida. Use el panel Admin para editar.' }}
                </p>
            </div>
        </section>

        <hr class="my-16 border-gray-200">

        {{-- 4. SECCIÓN CONTACTO --}}
        
        <section id="contacto" class="py-12">
            <h3 class="text-3xl font-bold text-center text-gray-800 mb-12">Hablemos | Contacto</h3>
            
            <div class="max-w-2xl mx-auto text-center">
                <p class="text-lg text-gray-700 mb-8">
                    Estoy disponible para nuevos proyectos y colaboraciones. ¡Contáctame a través de mis redes o por correo!
                </p>

                <p class="text-2xl font-bold text-accent mb-10">
                    <a href="mailto:{{ $profile->email_contacto ?? 'contacto@ejemplo.com' }}" class="hover:text-secondary transition duration-150">{{ $profile->email_contacto ?? 'contacto@ejemplo.com' }}</a>
                </p>

                {{-- Iconos de Redes Sociales (SVG) --}}
                <div class="flex justify-center space-x-8 text-gray-600">
                    
                    {{-- Ícono GitHub --}}
                    <a href="{{ $profile->github_url ?? '#' }}" target="_blank" class="hover:text-accent transition duration-150" aria-label="GitHub">
                        <svg class="h-10 w-10 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 0C5.372 0 0 5.372 0 12c0 5.309 3.438 9.8 8.205 11.385.6.11.82-.26.82-.577 0-.285-.011-1.04-.017-2.04-3.344.726-4.042-1.61-4.042-1.61-.545-1.38-1.332-1.744-1.332-1.744-1.09-.745.083-.73.083-.73 1.205.085 1.838 1.24 1.838 1.24 1.07 1.835 2.809 1.306 3.493.998.107-.775.418-1.307.762-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.468-2.38 1.236-3.22-.124-.31-.537-1.523.117-3.176 0 0 1.008-.323 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.046.138 3.003.404 2.293-1.553 3.3-1.23 3.3-1.23.654 1.653.24 2.866.117 3.176.77.84 1.236 1.91 1.236 3.22 0 4.61-2.805 5.62-5.478 5.92-.403.347-.768.916-.768 1.848 0 1.334-.012 2.41-.012 2.73 0 .317.21.692.83.575C19.562 21.8 24 17.309 24 12c0-6.628-5.372-12-12-12z"/>
                        </svg>
                    </a>
                    
                    {{-- Ícono LinkedIn --}}
                    <a href="{{ $profile->linkedin_url ?? '#' }}" target="_blank" class="hover:text-accent transition duration-150" aria-label="LinkedIn">
                        <svg class="h-10 w-10 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.447 20.452h-3.554V13.883c0-1.644-.035-3.766-2.296-3.766-2.297 0-2.645 1.791-2.645 3.655v6.68h-3.552V9.242h3.418v1.564h.05a4.137 4.137 0 013.716-2.036c3.992 0 4.722 2.62 4.722 6.027v6.655h-3.554zm-17.702-1.956c-1.134 0-1.939-.823-1.939-1.847 0-1.02.805-1.847 1.939-1.847s1.94.827 1.94 1.847c0 1.024-.805 1.847-1.94 1.847zM3.73 9.242H.176V20.45h3.554V9.242zM22.846 0H1.153C.516 0 0 .516 0 1.153v21.694C0 23.484.516 24 1.153 24h21.694c.637 0 1.153-.516 1.153-1.153V1.153C24 .516 23.484 0 22.847 0z"/>
                        </svg>
                    </a>
                    
                    {{-- Ícono X/Twitter --}}
                    @if ($profile->x_url)
                    <a href="{{ $profile->x_url ?? '#' }}" target="_blank" class="hover:text-accent transition duration-150" aria-label="X">
                        <svg class="h-10 w-10 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M18.901 1.153h3.518L14.61 9.42 24 22.837H16.89L10.97 14.28 4.168 22.837H.65L9.61 13.064 0 1.153h8.337l6.096 7.747L18.901 1.153zM1.986 21.698h2.894L22.013 2.302H19.12L1.986 21.698z"/></svg>
                    </a>
                    @endif
                </div>
            </div>
        </section>

    </main>

    {{-- FOOTER --}}
    <footer class="bg-white border-t border-gray-200 mt-16 py-6">
        <div class="max-w-6xl mx-auto px-4 text-center text-sm text-gray-600">
            <p>&copy; {{ date('Y') }} Kevin Rentería — Desarrollador Web.</p>
            <p class="mt-1">Hecho con Laravel y Tailwind CSS.</p>
        </div>
    </footer>
</body>
</html>