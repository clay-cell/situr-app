<div class="p-6" x-data="{ selectedPdf: null }">
    <!-- Título y barra de búsqueda -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-800">Lista de Clientes de {{ $institucion->nombre }}</h2>
    </div>
    <x-buscar_clientes/>
    {{-- <div>
        <a href="" class="bg-gray-800 text-gray-50">Ocupacion</a>
    </div> --}}
    <div class="flex flex-col md:flex-row mt-6 space-y-4 md:space-y-0 md:space-x-6">
        <!-- Tabla de clientes -->
        <div class="flex-1 overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-gray-900 text-white text-left">
                    <tr>
                        <th class="py-3 px-6 font-semibold">Nombres</th>
                        <th class="py-3 px-6 font-semibold">Apellidos</th>
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
                            <td class="py-4 px-6 text-gray-600">{{ $cliente->nombres }}</td>
                            <td class="py-4 px-6 text-gray-600">{{ $cliente->paterno . ' ' . $cliente->materno }}</td>
                            <td class="py-4 px-6 text-gray-600">{{ $cliente->identificacion }}</td>
                            <td class="py-4 px-6 text-gray-600">{{ $cliente->expedido }}</td>
                            <td class="py-4 px-6 text-gray-600">{{ $cliente->fecha_ingreso }}</td>
                            <td class="py-4 px-6 text-gray-600">
                                @if ($cliente->fecha_salida == null)
                                    <p class="text-red-600">Aun no Sale</p>
                                @else
                                    <p class="text-gray-600">{{ $cliente->fecha_salida }}</p>
                                @endif
                            </td>
                            <td class="py-4 px-6">{{ $cliente->hora_entrada }}</td>
                            <td class="py-4 px-6">
                                @if ($cliente->hora_salida == null)
                                    <p class="text-red-600">Aun no sale</p>
                                @else
                                    <p class="text-gray-600">{{ $cliente->hora_salida }}</p>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-center">
                                <!-- Botón para descargar y previsualizar PDF -->
                                <button @click="selectedPdf = '{{ asset($cliente->pdf) }}'"
                                    class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-2 rounded-md shadow-md transition-transform transform hover:scale-105">
                                    <i class="fas fa-file-pdf mr-2"></i>PDF
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="py-6 px-4 text-center text-gray-500">No hay clientes disponibles</td>
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
        <div class="w-full md:w-1/3 bg-gray-100 shadow-lg rounded-lg p-4" x-show="selectedPdf" x-cloak>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Previsualización de Documento PDF</h3>
            <iframe :src="selectedPdf" class="w-full h-96 rounded-lg shadow-md"></iframe>
            <button @click="selectedPdf = null"
                class="mt-4 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md shadow-md transition">
                Cerrar Previsualización
            </button>
        </div>
    </div>
</div>

<!-- Notificación de éxito con SweetAlert -->
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
