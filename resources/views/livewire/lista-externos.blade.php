<div class="p-6 bg-gray-100 min-h-screen">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Servicios Externos</h2>

    <!-- Contenedor de Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
            $iconos = [
                'ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO' => 'hotel',
                'EMPRESAS DE VIAJES Y TURISMO' => 'plane-departure',
                'EMPRESAS DE TRANSPORTE TURISTICO EXCLUSIVO' => 'bus',
                'EMPRESAS ORGANIZADORAS DE CONGRESOS Y FERIAS DE TURISMO' => 'calendar-alt',
                'GUIAS DE TURISMO' => 'location-dot',
                'SERVICIOS GASTRONOMICOS TURISTICOS' => 'utensils',
            ];

            $colores = ['bg-blue-500', 'bg-green-500', 'bg-orange-500', 'bg-purple-500', 'bg-teal-500', 'bg-red-500'];
        @endphp

        @foreach ($tipos_servicios as $servicio)
            @php
                $nombreServicio = $servicio->tipo_servicio;
                $icono = $iconos[$nombreServicio] ?? 'info-circle';
                $color = $colores[$loop->index % count($colores)];
            @endphp

            <div
                class="p-5 border rounded-lg shadow-lg {{ $color }} text-white flex items-center space-x-4 transform transition-transform hover:scale-105">
                <a href="{{route('uinstitucion.establecimientos',$servicio->id)}}">
                    <!-- Ícono -->
                    <div class="text-4xl">
                        <i class="fa-solid fa-{{ $icono }}"></i>
                    </div>
                    <!-- Nombre del Servicio -->
                    <div>
                        <h3 class="text-lg font-semibold">{{ $nombreServicio }}</h3>
                    </div>
                </a>

            </div>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="mt-8">
        {{ $tipos_servicios->links('pagination::tailwind') }}
    </div>
</div>
