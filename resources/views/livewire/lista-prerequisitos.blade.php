<div class="container mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <!-- visualizando al modal de mostrar -->
        <button wire:click="mostrar"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            <i class="fa-solid fa-plus"></i> Agregar nuevo grupo y requisito
        </button>
    </div>

    {{-- modal para registrar, ocupando el modal de jetstream --}}
    <x-dialog-modal wire:model="visualizar">
      <x-slot name="title">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                  Nuevo requisito
              </h3>
              <button type="button" wire:click="ocultar"
                  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
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
              <label for="name">Grupo</label>
              <input type="text" wire:model="grupo"
                    class="border-0 px-3 py-3 text-gray-800 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-transform: uppercase"
                    placeholder="grupo">
              @error('grupo')
                <span class="text-red-600 text-xs">*{{ $message }}</span>
              @enderror
            </div>
            <div class="py-2 text-base">
              <label for="name">Requisito</label>
              <textarea wire:model="descripcion" rows="5" cols="50" class="border-0 px-3 py-3 text-gray-800 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
              </textarea>
              @error('descripcion')
                <span class="text-red-600 text-xs">*{{ $message }}</span>
              @enderror
              {{--<input type="text" wire:model="descripcion"
                    class="border-0 px-3 py-3 text-gray-800 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-transform: uppercase"
                    placeholder="descripcion">
              @error('nombre_servicio')
                <span class="text-red-600 text-xs">*{{ $message }}</span>
              @enderror--}}
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
    {{-- <x-dialog-modal wire:model="visualiza_actualizar">
      <x-slot name="title">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                  Actualizar datos tramite
              </h3>
              <button type="button" wire:click="ocultar_actualizar"
                  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
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
                  <label for="name">Nombre del tramite</label>
                  <input type="text" wire:model="descripcion"
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
              tramite</button>
          <button wire:click="ocultar_actualizar"
              class="text-sm md:text-sm lg:text-base font-semibold bg-red-500 hover:bg-red-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
              Cancelar registro
          </button>
      </x-slot>
  </x-dialog-modal> --}}
    {{-- fin modal para modificar --}}


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            {{--<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        N°
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descripcion
                    </th>
                </tr>
            </thead>--}}
            <tbody>
                @foreach ($unicos as $grupo)
                <div class="flex">
                    <h2 class="text-md font-bold text-gray-800 tracking-wide" style="font-family: 'Oswald', sans-serif;">
                    {{ $grupo }}
                    </h2>
                    
                    <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm mx-2 my-2 px-2 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    <i class="fa-solid fa-plus"></i>Actualizar nombre grupo
                    </button>
                    <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm mx-2 my-2 px-2 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    <i class="fa-solid fa-plus"></i>nuevo requisito
                    </button>
                </div>
                    
                    @php
                        $cont = 1;
                    @endphp
                    <table class="border-collapse borderborder-slate-400">
                        <tbody>
                            @foreach ($prerequisitos as $item)
                                @if ($grupo == $item->grupo)
                                    <tr>
                                        <td class="border border-slate-300">{{ $cont . '.- ' }}</td>
                                        <td class="border border-slate-300">{{ $item->descripcion }}</td>
                                        <td class="border border-slate-300">actualizar</td>
                                    </tr>
                                    @php
                                        $cont++;
                                    @endphp
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endforeach


                {{-- @foreach ($prerequisitos as $requisito)
                  <tr class="text-xs bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <th scope="row"
                          class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          {{ $requisito->grupo }}
                      </th>
                      <th scope="row"
                          class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          {{ $requisito->descripcion }}
                      </th>
                      <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @if ($requisito->estado == 1)
                          <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer" checked>
                            <div wire:click="estado('{{ $requisito->id }}','{{ $requisito->estado }}')"
                                class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                          </label>
                        @else
                          <label class="inline-flex items-center mb-5 cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer">
                            <div wire:click="estado('{{ $requisito->id }}','{{ $requisito->estado }}')"
                                class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                          </label> 
                        @endif
                      </td>
                      <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          @if ($requisito->estado == 1)
                            <a href="{{route('pre_requisitos.show',$requisito->id)}}" class="text-sm md:text-sm lg:text-base font-semibold bg-green-500 hover:bg-green-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
                              <i class="fa-solid fa-eye"></i>
                            </a>   
                          @else
                            <a href="" style="pointer-events: none;" class="text-sm md:text-sm lg:text-base font-semibold bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
                               <i class="fa-solid fa-eye"></i>
                            </a>  
                          @endif
                        </td>
                      <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          @if ($requisito->estado == 1)
                            <button wire:click="recupera('{{ $requisito->id }}')"
                              class="text-sm md:text-sm lg:text-base font-semibold bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100"><i
                                  class="fa-regular fa-pen-to-square"></i></button>
                          @else
                            <button 
                            class="text-sm md:text-sm lg:text-base font-semibold bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100"><i
                                class="fa-regular fa-pen-to-square"></i></button>
                          @endif
                      </td>
                  </tr>
              @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
