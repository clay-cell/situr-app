<div class="container mx-auto p-4 space-y-6">
    <!-- Título -->
    <div>
        <h2 class="text-2xl font-semibold text-gray-800">Lista de Instituciones</h2>
    </div>

    <!-- Filtros -->
    <div class="grid gap-4 md:grid-cols-3 md:items-center">
        <!-- Campo de búsqueda -->
        <div class="flex flex-col">
            <label for="search" class="text-gray-600 font-medium">Nombre Institución</label>
            <input wire:model.live="search" id="search" type="search"
                class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm"
                placeholder="Ingrese el nombre">
        </div>

        <!-- Selección de servicio -->
        <div class="flex flex-col">
            <label for="servicio" class="text-gray-600 font-medium">Servicio</label>
            <select wire:model.live="servicio" id="servicio"
                class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm">
                <option value="">Seleccionar un Servicio</option>
                @foreach ($servicios as $servicio)
                    <option value="{{ $servicio->id }}">{{ $servicio->tipo_servicio }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Botón para Reporte -->
    <div class="flex justify-end">
        <button @click="showModal = true"
            class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-md shadow flex items-center">
            <i class="fas fa-chart-line mr-2"></i> Generar Reporte
        </button>
    </div>

    <!-- Tabla -->
    <div x-data="{ expandedIndex: null }" class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Establecimiento</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Dirección</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase hidden md:table-cell">
                        Correo</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase hidden md:table-cell">
                        Contacto</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Servicio</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase hidden lg:table-cell">
                        Estado</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase hidden lg:table-cell">
                        Sanciones</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase hidden lg:table-cell">
                        QR</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase hidden lg:table-cell">
                        Licencias</th>
                    {{-- <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase hidden lg:table-cell">
                        Acciones</th> --}}
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if ($instituciones->isEmpty())
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-sm text-gray-500">No hay registros</td>
                    </tr>
                @else
                    @foreach ($instituciones as $index => $institucion)
                        <tr class="hover:bg-gray-50 cursor-pointer"
                            @click="expandedIndex === {{ $index }} ? expandedIndex = null : expandedIndex = {{ $index }}">
                            <td class="px-4 py-2 text-sm text-gray-500">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 text-sm font-medium text-gray-900">{{ $institucion->nombre }}</td>
                            <td class="px-4 py-2 text-sm text-gray-500">{{ $institucion->direccion }}</td>
                            <td class="px-4 py-2 text-sm text-gray-500 hidden md:table-cell">{{ $institucion->email }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-500 hidden md:table-cell">
                                {{ $institucion->telefono }}</td>
                            <td class="px-4 py-2 text-sm text-gray-500">{{ $institucion->tipo_servicio }}</td>
                            <td class="px-4 py-2 text-sm text-gray-500 hidden lg:table-cell">
                                <span
                                    class="px-2 py-1 rounded-full text-white {{ $institucion->estado ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ $institucion->estado ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-500 hidden lg:table-cell">
                                <a href="{{ route('sancion_institucion.index', $institucion->id) }}"
                                    class="bg-slate-50 border px-4 py-2 rounded-md shadow-md text-red-600 hover:bg-red-600 hover:text-white">
                                    <i class="fas fa-exclamation-triangle"></i></a>
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-500 hidden lg:table-cell">
                                <button
                                    @click="$wire.showQRModal('{{ asset('storage/' . $institucion->qr) }}', '{{ $institucion->enlace }}')"class="bg-slate-100 text-gray-600 px-4 py-2 rounded shadow hover:bg-blue-600 hover:text-white hover:text-lg shadow-sm border">
                                    <i class="fa-solid fa-qrcode"></i>
                                </button>
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-500 hidden lg:table-cell">
                                <button wire:click="verificarLicencia({{ $institucion->id }})"
                                    class="bg-orange-600 text-gray-50 px-4 py-2 rounded-md hover:bg-orange-500">
                                    Verificar Licencia
                                </button>
                            </td>
                        </tr>
                        <!-- Detalles móviles -->
                        <tr x-show="expandedIndex === {{ $index }}" class="md:hidden">
                            <td colspan="8" class="bg-gray-50 px-4 py-2">
                                <div class="space-y-2">
                                    <p><strong>Correo:</strong> {{ $institucion->email }}</p>
                                    <p><strong>Contacto:</strong> {{ $institucion->telefono }}</p>
                                    <p><strong>Estado:</strong>
                                        <span
                                            class="px-2 py-1 rounded-full text-white {{ $institucion->estado ? 'bg-green-500' : 'bg-red-500' }}">
                                            {{ $institucion->estado ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </p>
                                    <p><strong>Sancion:</strong>
                                        <a href="{{ route('sancion_institucion.index', $institucion->id) }}"
                                            class="bg-slate-50 border px-4 py-2 rounded-md shadow-md text-red-600 hover:bg-red-600 hover:text-white">
                                            <i class="fas fa-exclamation-triangle"></i></a>
                                    </p>
                                    <p><strong>QR:</strong>
                                        <button
                                            @click="$wire.showQRModal('{{ asset('storage/' . $institucion->qr) }}', '{{ $institucion->enlace }}')"class="bg-slate-100 text-gray-600 px-4 py-2 rounded shadow hover:bg-blue-600 hover:text-white hover:text-lg shadow-sm border">
                                            <i class="fa-solid fa-qrcode"></i>
                                        </button>
                                    </p>
                                    <p><strong>Licencias:</strong>
                                        <button
                                            class="bg-orange-600 text-gray-50 px-4 py-2 rounded-md  hover:bg-orange-500 hover:text-white hover:text-lg shadow-sm border"><i
                                                class="fa-solid fa-address-card"></i></button>
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <!-- Modal QR -->
    <div x-data="{ open: @entangle('selectedQR') }" x-show="open" x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Código QR</h2>
            <div class="flex justify-center">
                <img :src="$wire.selectedQR" alt="Código QR" class="w-40 h-40">
            </div>
            <div class="mt-4 space-y-3">
                <a :href="$wire.selectedQR" download
                    class="block text-center bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-600">
                    Descargar QR
                </a>
                {{-- <a :href="$wire.selectedLink" target="_blank"
             class="block text-center bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
             Ir al Enlace
         </a> --}}
                <div x-data>
                    <a href="#"
                        @click.prevent="window.open($wire.selectedLink, '_blank', 'width=800,height=600,scrollbars=yes,resizable=yes')"
                        class="block text-center bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                        Ir al Enlace
                    </a>
                </div>



            </div>
            <button @click="$wire.selectedQR = null; $wire.selectedLink = null"
                class="mt-4 px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                Cerrar
            </button>
        </div>
    </div>
     <!-- Modal -->
     <x-dialog-modal wire:model="mostrarModalLicencia">
        <x-slot name="title">
            @if ($fecha_emision && $fecha_vencimiento)
                Licencia de {{ $selectedInstitution->nombre }}
            @else
                Registrar Licencia
            @endif
        </x-slot>

        <x-slot name="content">
            @if ($fecha_emision && $fecha_vencimiento)
                <p><strong>Fecha de Emisión:</strong> {{ $fecha_emision }}</p>
                <p><strong>Fecha de Vencimiento:</strong> {{ $fecha_vencimiento }}</p>
            @else
                <form wire:submit.prevent="guardarLicencia">
                    <div class="mb-4">
                        <x-label for="fecha_emision" value="Fecha de Emisión" />
                        <x-input type="date" id="fecha_emision" wire:model="fecha_emision" class="mt-1 block w-full" />
                        @error('fecha_emision') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <x-label for="fecha_vencimiento" value="Fecha de Vencimiento" />
                        <x-input type="date" id="fecha_vencimiento" wire:model="fecha_vencimiento" class="mt-1 block w-full" />
                        @error('fecha_vencimiento') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </form>
            @endif
        </x-slot>

        <x-slot name="footer">
            @if (!$fecha_emision || !$fecha_vencimiento)
                <x-button wire:click="guardarLicencia" class="ml-2">
                    Guardar
                </x-button>
            @endif
            <x-secondary-button wire:click="$set('mostrarModalLicencia', false)">
                Cerrar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    <!-- Paginación -->
    <div class="mt-4">
        {{ $instituciones->links() }}
    </div>
</div>
