<div class="container mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <!-- visualizando al modal de mostrar -->
        <button wire:click="mostrar"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
            type="button">
            <i class="fa-solid fa-plus"></i> Nuevo requisito
        </button>
    </div>

    {{-- modal para registrar, ocupando el modal de jetstream --}}
    <x-dialog-modal wire:model="visualizar">
        <x-slot name="title">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-xl font-semibold text-gray-900 >
                    Nuevo requisito
                </h3>
                <button type="button"
                    wire:click="ocultar"
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
                    <label for="name">Nombre requisito</label>
                    <input type="text" wire:model="descripcion"
                        class="border-0 px-3 py-3 text-gray-800 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-transform: uppercase"
                        placeholder="requisito">
                    @error('descripcion')
                        <span class="text-red-600 text-xs">*{{ $message }}</span>
                    @enderror
                </div>
                <div class="py-2 text-base">
                </div>
            </div>
            <hr class="mt-6 border-b-0 border-gray-400">
        </x-slot>
        <x-slot name="footer">
            <button wire:click="registrar"
                class="text-sm md:text-sm lg:text-base font-semibold bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">Agregar
                requisito</button>
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
                    Actualizar Pre requisito
                </h3>
                <button type="button" wire:click="ocultar_prerequisito"
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
                    <label for="name">Pre requisito</label>
                    <textarea wire:model="descripcion" rows="5" cols="33"
                        class="border-0 px-3 py-3 text-gray-800 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-transform: uppercase">
                  </textarea>
                    @error('descripcion')
                        <span class="text-red-600 text-xs">*{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <hr class="mt-6 border-b-0 border-gray-400">
        </x-slot>
        <x-slot name="footer">
            <button wire:click="actualizar_itemprerequisito"
                class="text-sm md:text-sm lg:text-base font-semibold bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">Actualizar
                pre requisito</button>
            <button wire:click="ocultar_prerequisito"
                class="text-sm md:text-sm lg:text-base font-semibold bg-red-500 hover:bg-red-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
                Cancelar registro
            </button>
        </x-slot>
    </x-dialog-modal>
    {{-- fin modal para modificar --}}

    {{-- modal para registrar nuevo pre requisito --}}
    <x-dialog-modal wire:model="visualiza_item">
        <x-slot name="title">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Nuevo Pre requisito
                </h3>
                <button type="button" wire:click="ocultar_nuevo_item"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
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
                    <label for="name">Pre requisito</label>
                    <textarea wire:model="descripcion" rows="5" cols="33" placeholder="pre requisito"
                        class="border-0 px-3 py-3 text-gray-800 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-transform: uppercase">
                    </textarea>
                    @error('descripcion')
                        <span class="text-red-600 text-xs">*{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <hr class="mt-6 border-b-0 border-gray-400">
        </x-slot>
        <x-slot name="footer">
            <button wire:click="nuevo_itemprerequisito"
                class="text-sm md:text-sm lg:text-base font-semibold bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">Registrar
                pre requisito</button>
            <button wire:click="ocultar_nuevo_item"
                class="text-sm md:text-sm lg:text-base font-semibold bg-red-500 hover:bg-red-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
                Cancelar registro
            </button>
        </x-slot>
    </x-dialog-modal>
    {{-- fin modal para modificar --}}

    <div class="relative overflow-x-auto">
        @php
            $cont = 1;
        @endphp
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <tbody>
                @foreach ($prerequisitos as $grupo)
                    <tr>
                        <td class="font-semibold text-gray-900  whitespace-wrap">{{ $grupo->descripcion }}</td>
                    </tr>
                    @foreach ($itemprerequisitos as $item)
                        @if ($grupo->id == $item->pre_requisito_id)
                            <tr class="bg-white border-b">
                                @if ($item->estado == 1)
                                    <td class="px-6 font-medium text-gray-800 whitespace-wrap">
                                        {{ $cont . '.- ' . $item->descripcion }}</td>
                                    <td class="px-6 font-medium text-gray-800 whitespace-wrap">Vigente
                                    </td>
                                @else
                                    <td class="px-6 font-medium text-red-600 whitespace-wrap">
                                        {{ $cont . '.- ' . $item->descripcion }}</td>
                                    <td class="px-6 font-medium text-red-600 whitespace-wrap">Retirado
                                    </td>
                                @endif
                                <td>
                                    <div class="inline-flex">
                                        <button wire:click="mostrar_prerequisito({{ $item->id }})"
                                            title="Actualizar"
                                            class="text-gray-200 bg-cyan-500 hover:bg-cyan-700 hover:text-gray-100 font-bold py-2 px-4 rounded-l">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        @if ($item->estado == 1)
                                            <button wire:click="cambiar_estado({{ $item->id }},0)"
                                                title="Quitar pre requisito"
                                                class="text-gray-100 bg-rose-600 hover:bg-rose-700 font-bold py-2 px-4 rounded-r">
                                                <i class="fa-solid fa-circle-minus"></i>
                                            </button>
                                        @else
                                            <button wire:click="cambiar_estado({{ $item->id }},1)"
                                                title="Agregar pre requisito"
                                                class="text-gray-100 bg-green-600 hover:bg-green-700 font-bold py-2 px-4 rounded-r">
                                                <i class="fa-solid fa-circle-check"></i>
                                            </button>
                                        @endif

                                    </div>
                                </td>
                            </tr>
                            @php
                                $cont++;
                            @endphp
                        @endif
                    @endforeach
                    <tr class="bg-white border-b ">
                        <td class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{-- <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-500 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-1 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"><i class="fa-solid fa-plus"></i> Nuevo pre requisito</button> --}}
                            <button type="button" title="agregar nuevo pre requisito"
                                wire:click="mostrar_nuevo_item({{ $grupo->id }})"
                                class="text-blue-800  hover:text-blue-500  font-medium text-sm px-5 py-1 me-2 mb-2 "><i
                                    class="fa-solid fa-plus"></i> Nuevo pre requisito</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
