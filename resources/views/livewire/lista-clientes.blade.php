<div class="p-6" x-data="{ selectedPdf: null }">
    <!-- Título y barra de búsqueda -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-800">Lista de Clientes de {{ $institucion->nombre }}</h2>
    </div>
    <div class="flex items-center space-x-2">
        <a href="{{ route('clientes.create', $institucion->id) }}"
            class="bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-md shadow-md text-white font-medium inline-flex items-center">
            Nuevo Cliente
            <i class="fas fa-user-plus ml-2"></i>
        </a>
    </div>
    <div class="mt-4">
        <x-busqueda />
    </div>
    <div class="flex">
        <!-- Botón para abrir el modal -->
        <div x-data="{ open: false }" class="mx-4">
            <!-- Botón para abrir el modal -->
            <button type="button"
                class="inline-flex items-center bg-red-600 text-white px-3 py-2 rounded-md shadow-md border border-red-700 hover:bg-red-700 hover:shadow-lg transition-all duration-200"
                @click="open = true">
                <span class="mr-2">Estadística PDF</span>
                <i class="fa-solid fa-file-pdf"></i>
            </button>

            <!-- Modal -->
            <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                style="display: none;">
                <div class="bg-white rounded-lg shadow-lg p-6 w-96" @click.away="open = false">
                    <!-- Header del modal -->
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Seleccionar Mes y Año</h2>

                    <!-- Formulario -->
                    <form action="{{ route('estadistica_servicios', $institucion->id) }}" method="GET">
                        @csrf
                        <!-- Selección de Mes -->
                        <div class="mb-4">
                            <label for="mes" class="block text-gray-600 mb-2">Mes:</label>
                            <select name="mes" id="mes" class="w-full border-gray-300 rounded-md shadow-sm">
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">
                                        {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <!-- Selección de Año -->
                        <div class="mb-4">
                            <label for="anio" class="block text-gray-600 mb-2">Año:</label>
                            <input type="number" name="anio" id="anio" min="2000" max="{{ date('Y') }}"
                                value="{{ date('Y') }}" class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-end space-x-4">
                            <button type="button" @click="open = false"
                                class="px-4 py-2 bg-gray-300 rounded-md text-gray-700 hover:bg-gray-400">
                                Cancelar
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                                Generar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- <div x-data="{ open: false }">
            <button type="button"
                class="inline-flex items-center bg-green-600 text-white px-3 py-2 rounded-md shadow-md border border-green-700 hover:bg-green-700 hover:shadow-lg transition-all duration-200"
                @click="open = true">
                <span class="mr-2">Estadistica Excel</span>
                <i class="fa-solid fa-chart-pie"></i>
            </button>
            <!-- Modal -->
            <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                style="display: none;">
                <div class="bg-white rounded-lg shadow-lg p-6 w-96" @click.away="open = false">
                    <!-- Header del modal -->
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Seleccionar Mes y Año</h2>

                    <!-- Formulario -->
                    <form action="{{ route('estadistica.excel', $institucion->id) }}" method="GET">
                        @csrf
                        <!-- Selección de Mes -->
                        <div class="mb-4">
                            <label for="mes" class="block text-gray-600 mb-2">Mes:</label>
                            <select name="mes" id="mes" class="w-full border-gray-300 rounded-md shadow-sm">
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">
                                        {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <!-- Selección de Año -->
                        <div class="mb-4">
                            <label for="anio" class="block text-gray-600 mb-2">Año:</label>
                            <input type="number" name="anio" id="anio" min="2000"
                                max="{{ date('Y') }}" value="{{ date('Y') }}"
                                class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-end space-x-4">
                            <button type="button" @click="open = false"
                                class="px-4 py-2 bg-gray-300 rounded-md text-gray-700 hover:bg-gray-400">
                                Cancelar
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                                Generar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

    </div>
    <div class="flex space-x-6 mt-3">
        <!-- Tabla de clientes -->
        <div class="flex-1 overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-indigo-600 text-white text-left">
                    <tr>
                        <th class="py-3 px-6 font-semibold">Cliente</th>
                        <th class="py-3 px-6 font-semibold">Identificación</th>
                        <th class="py-3 px-6 font-semibold">Expedido</th>
                        <th class="py-3 px-6 font-semibold">Fecha de Ingreso</th>
                        <th class="py-3 px-6 font-semibold">Fecha de Salida</th>
                        <th class="py-3 px-6 font-semibold">Hora de Entrada</th>
                        <th class="py-3 px-6 font-semibold">Hora de Salida</th>
                        <th class="py-3 px-6 font-semibold text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($clientes as $cliente)
                        <tr class="border-t hover:bg-gray-100 transition duration-200">
                            <td class="py-4 px-6">
                                {{ $cliente->nombres . ' ' . $cliente->paterno . ' ' . $cliente->materno }}</td>
                            <td class="py-4 px-6">{{ $cliente->identificacion }}</td>
                            <td class="py-4 px-6">{{ $cliente->expedido }}</td>
                            <td class="py-4 px-6">{{ $cliente->fecha_ingreso }}</td>
                            <td class="py-4 px-6">
                                {{ $cliente->fecha_salida ? \Carbon\Carbon::parse($cliente->fecha_salida)->format('d/m/Y') : 'Aún está en el establecimiento' }}
                            </td>
                            <td class="py-4 px-6">{{ $cliente->hora_entrada }}</td>
                            <td class="py-4 px-6">
                                {{ $cliente->hora_salida ? \Carbon\Carbon::parse($cliente->hora_salida)->format('H:i:s') : 'Aún está en el establecimiento' }}
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex justify-center space-x-4">
                                    <!-- Botón de Salida -->
                                    @if ($cliente->fecha_salida == null && $cliente->fecha_salida == null)
                                        <a href="{{ route('clientes.salida', $cliente->institucion_clientes_id) }}"
                                            onclick="confirmSalida(event)"
                                            class="flex items-center bg-yellow-600 text-white hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-medium rounded-full px-4 py-2 transition transform hover:scale-105">
                                            <i class="fa-solid fa-door-open mr-2"></i>
                                            Salida
                                        </a>
                                    @endif
                                    <!-- Botón para Descargar y Previsualizar PDF -->
                                    <button @click="selectedPdf = '{{ asset($cliente->pdf) }}'"
                                        class="flex items-center bg-indigo-600 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 font-medium rounded-md px-4 py-2 shadow-md transition transform hover:scale-105">
                                        <i class="fas fa-file-pdf mr-2"></i>
                                        PDF
                                    </button>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="py-6 px-4 text-center text-gray-500">No hay servicios
                                disponibles
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Paginación -->
            <div class="mt-4">
                {{ $clientes->links('pagination::tailwind') }}
            </div>
        </div>

        <!-- Sección de previsualización de PDF -->
        <div class="w-1/3 bg-gray-100 shadow-lg rounded-lg p-4" x-show="selectedPdf" x-cloak>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Previsualización de Documento PDF</h3>
            <iframe :src="selectedPdf" class="w-full h-96 rounded-lg shadow-md"></iframe>
            <button @click="selectedPdf = null"
                class="mt-4 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md shadow-md transition">
                Cerrar Previsualización
            </button>
        </div>
    </div>
    <script>
        function confirmSalida(event) {
            event.preventDefault(); // Evita que el enlace se ejecute inmediatamente
            const url = event.currentTarget.href; // Obtiene la URL del enlace

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción registrará la salida del cliente.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, confirmar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirige a la URL del enlace si se confirma la acción
                    window.location.href = url;
                }
            });
        }
    </script>
</div>
@if (session('success'))
    <script>
        Swal.fire({
            title: 'Éxito',
            text: '{{ session('success') }}',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
@endif
<!-- Script para SweetAlert -->
