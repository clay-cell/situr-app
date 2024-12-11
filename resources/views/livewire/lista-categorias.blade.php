<div class="container mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <!-- visualizando al modal de mostrar -->
        <button wire:click="mostrar"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
            type="button">
            <i class="fa-solid fa-plus"></i> Nueva Categoria
        </button>
    </div>

    {{-- modal para registrar, ocupando el modal de jetstream --}}
    <x-dialog-modal wire:model="visualizar">
        <x-slot name="title">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-xl font-semibold text-gray-900">
                    Datos nuevo categoria
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
                    <label for="name">Nombre de categoria</label>
                    <input type="text" wire:model="nombre_categoria"
                        class="border-0 px-3 py-3 text-gray-800 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-transform: uppercase"
                        placeholder="Nueva Categoria">
                    @error('nombre_categoria')
                        <span class="text-red-600 text-xs">*{{ $message }}</span>
                    @enderror
                </div>
                <div class="py-2 text-base">
                    <label for="name">Descripcion</label>
                    <input type="text" wire:model="descripcion"
                        class="border-0 px-3 py-3 text-gray-800 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-transform: uppercase"
                        placeholder="Descripcion">
                    @error('descripcion')
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
                    Actualizar datos categoria
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
                    <label for="name">Nombre de la categoria</label>
                    <input type="text" wire:model="nombre_servicio"
                        class="border-0 px-3 py-3 text-gray-800 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-transform: uppercase"
                        placeholder="Nuevo servicio">
                    @error('nombre_servicio')
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


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Categoria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descripcion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actualizar
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr class="text-xs bg-white border-b ">
                        <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $categoria->nombre }}
                        </th>
                        <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $categoria->descripcion }}
                        </th>
                        <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap ">
                            <button wire:click="recupera('{{ $categoria->id }}')"
                                class="text-sm md:text-sm lg:text-base font-semibold bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100"><i
                                    class="fa-regular fa-pen-to-square"></i></button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div class="mt-6">
            {{ $categorias->links() }}
        </div>
    </div>
</div>
