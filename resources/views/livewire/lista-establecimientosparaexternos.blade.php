<div class="container p-6 bg-gray-100 min-h-screen">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Instituciones</h2>

    <!-- Campo de búsqueda -->
    <div class="mb-6 flex justify-center">
        <input type="text" placeholder="Buscar por nombre..." wire:model.live="search"
            class="px-4 py-2 w-full md:w-1/3 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">


    </div>
    <p>tu busqueda es :{{ $search }}</p>
    <!-- Contenedor de Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
            $iconos = [
                'ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO' => 'hotel',
                'EMPRESAS DE VIAJES Y TURISMO' => 'plane-departure',
                'EMPRESAS DE TRANSPORTE TURISTICO EXCLUSIVO' => 'bus-alt',
                'EMPRESAS ORGANIZADORAS DE CONGRESOS Y FERIAS DE TURISMO' => 'calendar-alt',
                'GUIAS DE TURISMO' => 'map-signs',
                'SERVICIOS GASTRONOMICOS TURISTICOS' => 'utensils',
            ];

            $colores = ['bg-blue-500', 'bg-green-500', 'bg-orange-500', 'bg-purple-500', 'bg-teal-500', 'bg-red-500'];
        @endphp

        @foreach ($establecimientos as $institucion)
            @php
                $tipoServicio = $institucion->tipo_servicio;
                $icono = $iconos[$tipoServicio] ?? 'info-circle';
                $color = $colores[$loop->index % count($colores)];
            @endphp

            <div
                class="p-5 border rounded-lg shadow-lg {{ $color }} text-white flex flex-col items-start space-y-4 transform transition-transform hover:scale-105">
                <!-- Ícono y Título -->
                <div class="flex items-center space-x-4">
                    <div class="text-4xl">
                        <i class="fa-solid fa-{{ $icono }}"></i>
                    </div>
                    <h3 class="text-xl font-semibold">{{ $institucion->nombre }}</h3>
                </div>

                <!-- Información de la Institución -->
                <p class="text-sm">
                    <strong>Tipo de Servicio:</strong> {{ $tipoServicio }}
                </p>
                <p class="text-sm">
                    <strong>Dirección:</strong> {{ $institucion->direccion }}
                </p>
                <p class="text-sm">
                    <a href=""><strong>Contacto:</strong> {{ $institucion->telefono }}</a>
                </p>

                <!-- Botón Ver Detalles -->
                <a href="{{ route('clientesestablecimeintos', $institucion->id) }}"
                    class="mt-auto inline-flex items-center bg-gray-50 hover:bg-gray-200 text-gray-800 font-medium px-4 py-2 rounded-md transition-transform transform hover:scale-105">
                    Ver Clientes
                    <i class="fa-solid fa-users-viewfinder ml-2"></i>
                </a>
            </div>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="mt-8">
        {{ $establecimientos->links() }}
    </div>
</div>
