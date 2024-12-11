<div class="container mx-auto p-6  rounded-lg shadow-lg">
    {{-- The best athlete wants his opponent at his best. --}}
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Lista Prestadores de Servicios</h2>

    <x-busqueda />

    <!-- Contenedor de tarjetas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($solicitudes as $solicitud)
            <div x-data="{ open: false }"
                class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105">
                <!-- Imagen de la solicitud -->
                <div class="h-40 bg-cover bg-center"
                    style="background-image: url('{{ $solicitud->profile_photo_path ? asset($solicitud->profile_photo_path) : asset('imgs/subirfoto.jpg') }}')">
                </div>


                <!-- Información principal -->
                <div class="p-4 space-y-2">
                    <div class="flex justify-end">
                        <a href="#" class="text-gray-500 hover:text-blue-500 p-2" title="Editar Usuario">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        {{ $solicitud->name }} {{ $solicitud->primer_apellido }} {{ $solicitud->segundo_apellido }}
                    </h3>
                    <h3 class="text-lg font-semibold text-gray-800">
                        {{ $solicitud->nombre }}
                    </h3>
                    <p class="text-sm text-gray-600"><strong>Cédula:</strong> {{ $solicitud->cedula }}
                        {{ $solicitud->extension }}</p>
                    <p class="text-sm text-gray-600"><strong>Nacionalidad:</strong> {{ $solicitud->nacionalidad }}</p>

                    <!-- Botón para mostrar más detalles -->
                    <button @click="open = !open" class="text-blue-500 hover:underline focus:outline-none mt-2">
                        <span x-text="open ? 'Ocultar detalles' : 'Ver más detalles'"></span>
                    </button>

                    <!-- Detalles adicionales (con Alpine.js para expandir/colapsar) -->
                    <div x-show="open" x-collapse class="mt-4 text-sm text-gray-700 space-y-2">
                        <p><strong>Dirección:</strong> {{ $solicitud->direccion }}</p>
                        <p><strong>Ciudad:</strong> {{ $solicitud->ciudad }}</p>
                        <p><strong>Email:</strong> {{ $solicitud->email }}</p>
                        <p><strong>Teléfono:</strong> {{ $solicitud->telefono }} / {{ $solicitud->celular }}</p>
                        <p><strong>Lugar de nacimiento:</strong> {{ $solicitud->lugar_nacimiento }}</p>
                        <p><strong>Fecha de nacimiento:</strong> {{ $solicitud->fecha_nacimiento }}</p>
                        <p><strong>Estado:</strong> {{ $solicitud->estado }}</p>
                        @if ($solicitud->sexo == 'V')
                            <p><strong>Sexo:</strong> VARON</p>
                        @else
                            <p><strong>Sexo:</strong> MUJER </p>
                        @endif
                        <p class="text-right mt-2">
                            <a href="{{ route('tramites_realizados.index', $solicitud->id) }}"
                                class="bg-blue-600 text-white p-2 rounded-lg shadow-md hover:bg-blue-500">
                                Ver Intituciones <i class="fa-solid fa-check"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="mt-6">
        {{ $solicitudes->links() }}
    </div>
</div>
