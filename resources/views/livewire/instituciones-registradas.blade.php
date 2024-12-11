<div class="container mx-auto p-6" x-data="{ servicioSeleccionado: null }">
    <!-- Título -->
    <h1 class="text-2xl font-extrabold text-gray-800 mb-6 text-center">
        Servicios Turísticos
    </h1>
    <!-- Input de búsqueda -->
    <div class="mb-6">
        <input type="text"
            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Buscar institución por nombre..." wire:model="buscarInstitucion" />
    </div>
    <!-- Servicios -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
        @foreach ($servicios as $servicio)
            <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-lg shadow-lg p-4 text-center hover:scale-105 transform transition-all duration-300 cursor-pointer"
                @click="servicioSeleccionado = {{ $servicio->id }}; $wire.seleccionarServicio({{ $servicio->id }})">
                <div class="text-5xl mb-3">
                    <!-- Icono basado en el tipo de servicio -->
                    <i class="{{ $iconos[$servicio->tipo_servicio] ?? 'fas fa-question-circle' }}"></i>
                </div>
                <h3 class="font-semibold text-lg">{{ $servicio->tipo_servicio }}</h3>
            </div>
        @endforeach

    </div>



    <!-- Instituciones -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" x-show="servicioSeleccionado !== null"
        x-transition>
        @forelse($instituciones as $institucion)
            <div
                class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-500 hover:scale-105 hover:shadow-2xl">
                <!-- Imagen de la institución -->
                <img src="https://via.placeholder.com/300" alt="{{ $institucion->nombre }}"
                    class="w-full h-48 object-cover">

                <!-- Contenido del card -->
                <div class="p-6">
                    <h3 class="text-3xl font-semibold mb-2 text-blue-900 uppercase pb-2">
                        {{ $institucion->nombre_comercial }}</h3>
                    <p class="text-gray-600 mb-2">
                        <a href="https://www.google.com/maps?q={{ urlencode($institucion->direccion) }}" target="_blank"
                            class="text-gray-600 hover:text-blue-600 flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            {{ $institucion->direccion }}
                        </a>
                    </p>

                    <p class="text-gray-600 mb-2">
                        <a href="tel:{{ $institucion->telefono }}"
                            class="text-gray-600 hover:text-blue-600 flex items-center">
                            <i class="fas fa-phone-alt mr-2"></i>
                            {{ $institucion->telefono }}
                        </a>
                    </p>

                    <p class="text-gray-600 mb-4">
                        <a href="mailto:{{ $institucion->email }}"
                            class="text-gray-600 hover:text-blue-600 flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            {{ $institucion->email }}
                        </a>
                    </p>

                    <button
                        class="mt-4 bg-yellow-400 text-gray-900 px-4 py-2 rounded-lg font-semibold hover:bg-yellow-500 transition">Ver
                        Más</button>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">
                No se encontraron instituciones para este servicio.
            </p>
        @endforelse
    </div>

    <!-- Mensaje si no se ha seleccionado un servicio -->
    <div class="text-center text-gray-500 mt-6" x-show="servicioSeleccionado === null" x-transition>
        <p>Selecciona un servicio para ver las instituciones asociadas.</p>
    </div>
</div>
