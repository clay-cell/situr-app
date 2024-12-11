<div class="container mx-auto p-6 bg-gray-100 rounded shadow">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Lista de Sanciones</h2>
            <h3 class="text-xl text-gray-600">{{ $servicio->tipo_servicio }}</h3>
        </div>
        <button wire:click="mostrar" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            Agregar
        </button>
    </div>
    {{-- modal para registrar, ocupando el modal de jetstream --}}
    <x-dialog-modal wire:model="visualizar">
        <x-slot name="title">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-xl font-semibold text-gray-900">
                    Datos nueva sancion
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
                    <label for="name">Nombre de la sancion</label>
                    <input type="text" wire:model="nombre_sancion"
                        class="border-0 px-3 py-3 text-gray-800 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-transform: uppercase"
                        placeholder="Nueva sancion">
                    @error('nombre_sancion')
                        <span class="text-red-600 text-xs">*{{ $message }}</span>
                    @enderror
                </div>
                <div class="py-2 text-base">
                    <label for="name">Tipo de Sancion</label>
                    <select name="" id="" wire:model="tipo_sancions"
                        class="border-0 px-3 py-3 text-gray-800 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-transform: uppercase">
                        <option value="" disabled selected>Seleccione un tipo</option>
                        @foreach ($tipo_sancion as $item)
                            <option value="{{ $item->id }}">{{ $item->tipo_sancion }}</option>
                        @endforeach
                    </select>
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
    {{-- fin modal para registrar --}}
    {{-- modal para actualizar, ocupando el modal de jetstream --}}
    <x-dialog-modal wire:model="visualiza_actualizar">
        <x-slot name="title">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-xl font-semibold text-gray-900 ">
                    Actualizar datos de sancion
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
                    <label for="name">Nombre de la sancion</label>
                    <input type="text" wire:model="nombre_sancion"
                        class="border-0 px-3 py-3 text-gray-800 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-transform: uppercase"
                        placeholder="Nuevo servicio">
                    @error('nombre_sancion')
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

    <div>
        <table class="w-full border-collapse bg-white shadow-md rounded overflow-hidden">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Sanción</th>
                    <th class="px-4 py-2">Tipo Sanción</th>
                    <th class="px-4 py-2">Estado</th>
                    <th class="px-4 py-2">Actualizar</th>
                </tr>
            </thead>
            <tbody>
                @php $cont = 1; @endphp
                @foreach ($item_sancion as $item)
                    <tr class="border-t hover:bg-gray-100 text-xs">
                        <td class="px-4 py-2 text-center">{{ $cont }}</td>
                        <td class="px-4 py-2 text-gray-500">{{ $item->nombre_sancion }}</td>
                        <td class="px-4 w-52 py-2 text-center">
                            <div x-data="{ sancion: '{{ $item->tipo_sancion }}' }">
                                <span class="px-3 py-1 rounded-full text-gray-50 text-xs"
                                    :class="{
                                        'bg-green-500': sancion === 'INFRACCION LEVE',
                                        'bg-yellow-500': sancion === 'INFRACCION GRAVE',
                                        'bg-red-500': sancion === 'INFRACCION MUY GRAVE',
                                        'bg-gray-400': !['INFRACCION LEVE', 'INFRACCION GRAVE', 'INFRACCION MUY GRAVE']
                                            .includes(sancion)
                                    }">
                                    {{ $item->tipo_sancion }}
                                </span>
                            </div>
                        </td>


                        <td class="px-4 py-2 text-center">
                            @if ($item->estado == 1)
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" class="sr-only peer" checked>
                                    <div wire:click="estado('{{ $item->id }}','{{ $item->estado }}')"
                                        class="relative w-11 h-6 bg-gray-200 rounded-full peer  peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </label>
                            @else
                                <label class="inline-flex items-center mb-5 cursor-pointer">
                                    <input type="checkbox" value="" class="sr-only peer">
                                    <div wire:click="estado('{{ $item->id }}','{{ $item->estado }}')"
                                        class="relative w-11 h-6 bg-gray-200 rounded-fullitem peer  peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </label>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-center">
                            @if ($item->estado == 1)
                                <button  wire:click="recupera('{{ $item->id }}')"
                                    class="bg-slate-100 px-3 py-2 rounded-md border shadow-md hover:bg-blue-600 hover:text-white"><i
                                        class="fa-regular fa-pen-to-square"></i></button>
                            @else
                                <button
                                    class="bg-gray-600 px-3 py-2 rounded-md border shadow-md text-white"><i
                                        class="fa-regular fa-pen-to-square"></i></button>
                            @endif

                        </td>
                    </tr>
                    @php $cont++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
