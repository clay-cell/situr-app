    <x-menu>
        <!-- Título principal -->
        <div class="text-center my-6">
            <h2 class="text-4xl font-bold text-gray-800 tracking-wide" style="font-family: 'Oswald', sans-serif;">
                ESTABLECIMIENTOS REGISTRADOS
            </h2>
        </div>

        <!-- Botón de nuevo trámite -->
        <div class="text-center mt-6">
            <a href="{{ route('establecimiento.create') }}"
                class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-5 py-2 rounded-full shadow-md transition-transform transform hover:scale-105"
                title="Nuevo Trámite">
                <i class="fa-solid fa-plus mr-2"></i> Nuevo Establecimiento
            </a>
        </div>

        <!-- Grid de establecimientos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 p-6">
            @foreach ($establecimientos as $establecimiento)
                <div x-data="{ hovering: false }"
                    class="relative bg-white border border-gray-200 rounded-lg shadow-md p-6 transition-transform transform hover:scale-105 hover:shadow-xl hover:bg-gradient-to-br from-white to-gray-100"
                    @mouseenter="hovering = true" @mouseleave="hovering = false">

                    <!-- Icono del servicio con color dinámico y título del servicio -->
                    <div class="flex items-center space-x-4">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">{{ $establecimiento->nombre }}</h3>
                            <p>{{ $establecimiento->servicio }}</p>
                        </div>

                    </div>

                    <!-- Enlaces de acción -->
                    <div class="mt-6 flex justify-between items-center">
                        <a href="{{ route('establecimiento.show', $establecimiento->id) }}"
                            class="inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white text-xs font-semibold px-4 py-2 rounded-md shadow transition-transform transform hover:scale-105"
                            title="Nuevo Trámite">
                            <i class="fa-solid fa-plus mr-2"></i> Ver datos establecimiento
                        </a>

                    </div>
                </div>
            @endforeach
        </div>

        <!-- Mensaje de sin registros -->
        @if ($establecimientos->isEmpty())
            <div class="mt-12 text-center">
                <p class="text-gray-500 text-lg">
                    No tienes trámites registrados.
                    <i class="fa-solid fa-circle-info ml-2"></i>
                </p>
            </div>
        @endif
    </x-menu>
