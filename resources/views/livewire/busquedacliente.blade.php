<div class="container mx-auto p-4  min-h-screen">
    <x-buscar_clientes title="Buscar Clientes" />
    <x-reporte_clientes />
    <div class="shadow-lg rounded-lg overflow-x-auto">
        <!-- Tabla de clientes -->
        <table class="table-auto w-full text-left">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2">Identificación</th>
                    <th class="px-4 py-2">Cliente</th>
                    <th class="px-4 py-2">Institución</th>
                    <th class="px-4 py-2">Fecha Ingreso</th>
                    <th class="px-4 py-2">Fecha Salida</th>
                    <th class="px-4 py-2">Hora Ingreso</th>
                    <th class="px-4 py-2">Hora Salida</th>
                    <th class="px-4 py-2">Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clientes as $cliente)
                    <tr class="hover:bg-blue-100 text-gray-600">
                        <td class="border px-4 py-2">{{ $cliente->identificacion }}</td>
                        <td class="border px-4 py-2">
                            {{ $cliente->nombres . ' ' . $cliente->paterno . ' ' . $cliente->materno }}
                        </td>
                        <td class="border px-4 py-2">{{ $cliente->nombre }}</td>
                        <td class="border px-4 py-2">
                            {{ $cliente->fecha_ingreso ? \Carbon\Carbon::parse($cliente->fecha_ingreso)->format('d/m/Y') : 'Sin registro' }}
                        </td>
                        <td class="border px-4 py-2">
                            {{ $cliente->fecha_salida ? \Carbon\Carbon::parse($cliente->fecha_salida)->format('d/m/Y') : 'Aún está en el establecimiento' }}
                        </td>
                        <td class="border px-4 py-2">
                            {{ $cliente->hora_entrada ? \Carbon\Carbon::parse($cliente->hora_entrada)->format('H:i') : 'Sin registro' }}
                        </td>
                        <td class="border px-4 py-2">
                            {{ $cliente->hora_salida ? \Carbon\Carbon::parse($cliente->hora_salida)->format('H:i') : 'Aún está en el establecimiento' }}
                        </td>
                        <td class="border px-4 py-2">
                            <button wire:click="showPdf({{ $cliente->id }})" class="text-gray-800 underline">
                                <i class="fa-solid fa-file-pdf"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-gray-500 py-4">No se encontraron resultados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Modal para previsualizar el PDF -->
        @if ($selectedPdf)
            <div
                class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-60 transition-opacity duration-300">
                <div
                    class="bg-white w-11/12 md:w-3/4 h-4/5 rounded-lg shadow-2xl p-6 relative flex flex-col transition-transform duration-500 transform-gpu scale-95 hover:scale-100">
                    <!-- Botón Cerrar -->
                    <button wire:click="$set('selectedPdf', null)"
                        class="absolute top-4 right-4 bg-red-600 text-gray-50 rounded-full p-2 hover:bg-red-500 hover:text-white focus:outline-none transition duration-300 shadow-md">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <!-- Visor de PDF -->
                    <iframe src="{{ asset($selectedPdf) }}" class="w-full h-full rounded-lg border border-gray-300"
                        style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"></iframe>
                    <!-- Botón Cerrar Visor -->
                    <div class="mt-4 text-right">
                        <button
                            class="bg-red-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-500 focus:outline-none transition duration-300"
                            wire:click="$set('selectedPdf', null)">Cerrar Visor</button>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
