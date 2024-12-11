<div class="container mx-auto p-6 bg-gray-100 min-h-screen">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>

    {{-- Título de la sección --}}
    <div class="mb-6 text-center">
        <h2 class="text-4xl font-semibold text-gray-800">Tipos de Sanciones</h2>
    </div>

    {{-- Botón para agregar --}}
    <div class="text-center mb-6">
        <button wire:click="mostrar"
            class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
            x-data="{ open: false }" @click="open = ! open">
            Agregar
        </button>
    </div>
    {{-- modal para registrar, ocupando el modal de jetstream --}}
    <x-dialog-modal wire:model="visualizar">
        <x-slot name="title">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-xl font-semibold text-gray-900">
                    Datos nuevo tipo de sancion
                </h3>
                <button type="button" wire:click="ocultar"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center ">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <div class="py-2 text-base">
                    <label for="name">Nombre del tipo de sancion</label>
                    <input type="text" wire:model="tipo_sancion"
                        class="border-0 px-3 py-3 text-gray-800 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-transform: uppercase"
                        placeholder="Nuevo tipo de sancion">
                    @error('tipo_sancion')
                        <span class="text-red-600 text-xs">*{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <hr class="mt-6 border-b-0 border-gray-400">
        </x-slot>
        <x-slot name="footer">
            <button wire:click="registrar"
                class="text-sm md:text-sm lg:text-base font-semibold bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">Registrar
                servicio</button>
            <button wire:click="ocultar"
                class="text-sm md:text-sm lg:text-base font-semibold bg-red-500 hover:bg-red-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
                Cancelar registro
            </button>
        </x-slot>
    </x-dialog-modal>
    {{-- Tabla de tipos de sanciones --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo
                        Sanción</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actualizar</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($tipos_sanciones as $tipo_sancion)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $tipo_sancion->tipo_sancion }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600 hover:text-blue-800">
                            <button wire:click="recupera('{{ $tipo_sancion->id }}')"
                                class="bg-blue-600 text-gray-50 hover:bg-blue-500 hover:text-white py-2 px-3 shadow-md rounded-lg hover:shadow-inner hover:text-base"><i
                                    class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- modal para actualizar, ocupando el modal de jetstream --}}
    <x-dialog-modal wire:model="visualiza_actualizar">
        <x-slot name="title">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-xl font-semibold text-gray-900 ">
                    Actualizar datos servicio
                </h3>
                <button type="button" wire:click="ocultar_actualizar"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center ">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <div class="py-2 text-base">
                    <label for="name">Nombre del servicio</label>
                    <input type="text" wire:model="tipo_sancion"
                        class="border-0 px-3 py-3 text-gray-800 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-transform: uppercase"
                        placeholder="Nuevo servicio">
                    @error('tipo_sancion')
                        <span class="text-red-600 text-xs">*{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <hr class="mt-6 border-b-0 border-gray-400">
        </x-slot>
        <x-slot name="footer">
            <button wire:click="actualizar()"
                class="text-sm md:text-sm lg:text-base font-semibold bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">Actualizar
                servicio</button>
            <button wire:click="ocultar_actualizar"
                class="text-sm md:text-sm lg:text-base font-semibold bg-red-500 hover:bg-red-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
                Cancelar registro
            </button>
        </x-slot>
    </x-dialog-modal>
    {{-- fin modal para modificar --}}

</div>
