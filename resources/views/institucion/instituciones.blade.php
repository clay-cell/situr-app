<x-menu>
    <!-- Título principal -->
    <div class="text-center my-8">
        <h2 class="text-4xl font-extrabold text-gray-700 tracking-wide" style="font-family: 'Oswald', sans-serif;">
            Establecimientos Registrados
        </h2>
    </div>

    <!-- Botón de nuevo trámite -->
    <div class="flex justify-center mt-6">
        <a href="{{ route('establecimiento.create') }}"
            class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-6 py-3 rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-200"
            title="Registrar nuevo establecimiento">
            <i class="fa-solid fa-plus mr-2"></i> Nuevo Establecimiento
        </a>
    </div>

    <!-- Grid de establecimientos -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-6 py-8">
        @foreach ($establecimientos as $establecimiento)
            @php
                // Configuración de iconos y colores basados en servicio_id
                $servicioConfig = [
                    1 => ['color' => 'text-blue-600 bg-blue-100', 'icon' => 'fa-bed', 'name' => 'Hospedaje Turístico'],
                    2 => ['color' => 'text-green-600 bg-green-100', 'icon' => 'fa-plane', 'name' => 'Viajes y Turismo'],
                    3 => [
                        'color' => 'text-yellow-600 bg-yellow-100',
                        'icon' => 'fa-bus',
                        'name' => 'Transporte Turístico',
                    ],
                    4 => [
                        'color' => 'text-purple-600 bg-purple-100',
                        'icon' => 'fa-calendar',
                        'name' => 'Organización de Eventos',
                    ],
                    5 => [
                        'color' => 'text-pink-600 bg-pink-100',
                        'icon' => 'fa-user-tie',
                        'name' => 'Guías de Turismo',
                    ],
                    6 => [
                        'color' => 'text-red-600 bg-red-100',
                        'icon' => 'fa-utensils',
                        'name' => 'Servicios Gastronómicos',
                    ],
                ];
                $config = $servicioConfig[$establecimiento->servicio_id] ?? [
                    'color' => 'text-gray-600 bg-gray-100',
                    'icon' => 'fa-building',
                    'name' => 'Otro Servicio',
                ];
            @endphp

            <div
                class="relative border border-gray-200 rounded-lg shadow-sm bg-white hover:shadow-md transition-shadow duration-200">
                <div class="p-6">
                    <!-- Icono del servicio -->
                    <div class="flex items-center space-x-4">
                        <div class="p-4 rounded-full {{ $config['color'] }} shadow-sm">
                            <i class="fa-solid {{ $config['icon'] }} text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700">{{ $establecimiento->nombre }}</h3>
                            <p class="text-sm text-gray-500">{{ $config['name'] }}</p>
                        </div>
                    </div>

                    <!-- Detalles y acciones -->
                    <div class="mt-4 border-t pt-4 flex justify-between items-center">
                        <a href="{{ route('establecimiento.show', $establecimiento->id) }}"
                            class="inline-flex items-center bg-gray-100 hover:bg-gray-200 text-gray-600 text-sm font-medium px-4 py-2 rounded-md shadow-sm transition-all"
                            title="Ver detalles del establecimiento">
                            <i class="fa-solid fa-eye mr-2"></i> Ver detalles
                        </a>
                        {{ $establecimiento->licencias_id }}
                        {{-- <livewire:notificaciones :licencia_id="$establecimiento->licencia_id" /> --}}
                        @livewire('notificaciones', ['licencia_id' => $establecimiento->licencias_id])

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Mensaje de sin registros -->
    @if ($establecimientos->isEmpty())
        <div class="mt-16 text-center">
            <p class="text-gray-500 text-lg">
                No tienes establecimientos registrados. <br>
                <i class="fa-solid fa-circle-info mt-2 text-2xl text-gray-400"></i>
            </p>
        </div>
    @endif
</x-menu>
