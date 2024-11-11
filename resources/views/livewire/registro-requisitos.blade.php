 <div class="container mx-auto p-6">
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <tbody>

        @foreach ($unicos as $grupo)
          <div class="flex">
            <h2 class="text-md font-bold text-gray-800 tracking-wide" style="font-family: 'Oswald', sans-serif;"> {{ $grupo }} </h2>
          </div>
          @php
            $cont = 1;
          @endphp
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <tbody>
              @foreach ($prerequisitos as $item)
                @if ($grupo == $item->grupo)
                  <tr>
                    <td class="border border-slate-300">{{ $cont . '.- ' }}</td>
                    <td class="border border-slate-300">{{ $item->descripcion }}</td>
                    <td class="border border-slate-300">
                      <!-- visualizando al modal de mostrar -->

                      @if (!in_array($item->id,$presentados_id))
                        <button wire:click="mostrar('{{$item->id}}')" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center " type="button">
                          <i class="fa-solid fa-plus"></i> PDF{{--$item->id--}}
                        </button>
                      @else
                        <button wire:click="mostrar_pdf('{{$item->id}}')" class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center " type="button">
                          <i class="fa-regular fa-eye"></i> Ver PDF{{--$item->id--}}
                        </button>

                        <button wire:click="eliminarPDF('{{$item->id}}')" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center " type="button">
                          <i class="fa-solid fa-eraser"></i> Eliminar PDF{{--$item->id--}}
                        </button>

                      @endif
                    </td>
                  </tr>
                  @php
                    $cont++;
                  @endphp
                @endif
              @endforeach
            </tbody>
          </table>
        @endforeach
      </tbody>
    </table>
  </div>
  {{-- modal para registrar, ocupando el modal de jetstream --}}
  <x-dialog-modal wire:model="visualizar">
    <x-slot name="title">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
            <h3 class="text-xl font-semibold text-gray-900">
              Subir en PDF
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
        <label class="block text-gray-700 font-medium mb-2">Subir Documento <i class="fa-solid fa-file-pdf"></i></label>
        <input type="file" wire:model="documento_pdf" class="w-full text-gray-700 border border-gray-300 p-2 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500" accept=".pdf">
        @error('documento_pdf')
          <span class="text-red-600 text-xs">*{{ $message }}</span>
        @enderror
            </div>
        </div>
        <hr class="mt-6 border-b-0 border-gray-400">
    </x-slot>
    <x-slot name="footer">
        <button wire:click="subir()"
            class="text-sm md:text-sm lg:text-base font-semibold bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">Subir
            PDF</button>
        <button wire:click="ocultar"
            class="text-sm md:text-sm lg:text-base font-semibold bg-red-500 hover:bg-red-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
            Cancelar registro
        </button>
    </x-slot>
  </x-dialog-modal>
  {{-- fin modal para registrar --}}

  {{-- modal para mostrar el pdf subido, ocupando el modal de jetstream --}}
  <x-dialog-modal wire:model="visualizarpdf">
    <x-slot name="title">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
            <h3 class="text-xl font-semibold text-gray-900">
              PDF enviado
            </h3>
            <button type="button" wire:click="ocultar_pdf"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center ">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
    </x-slot>
    <x-slot name="content">
      <iframe src="{{ asset($elpdf) }}" width="100%" height="600"></iframe>
    </x-slot>
    <x-slot name="footer">

      @if ($idproveedor[0]->user_id != Auth::user()->id)
        <button wire:click="validar"
        class="text-sm md:text-sm lg:text-base font-semibold bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
        Validar
        </button>
      @endif

      <button wire:click="ocultar_pdf"
            class="text-sm md:text-sm lg:text-base font-semibold bg-red-500 hover:bg-red-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
            Cerrar ventana
        </button>
    </x-slot>
  </x-dialog-modal>
  {{-- fin modal para registrar --}}

</div>





{{--<div class="container mx-auto p-6" x-data="{ showModal: false, requisitoId: null , descripcion: ''}">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <tbody>
                @foreach ($unicos as $grupo)
                    <div class="flex">
                        <h2 class="text-md font-bold text-gray-800 tracking-wide"
                            style="font-family: 'Oswald', sans-serif;">
                            {{ $grupo }}
                        </h2>
                    </div>
                    {{ $tid }}
                    {{ $eid }}
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody>
                            @foreach ($prerequisitos as $item)
                                @if ($grupo == $item->grupo)
                                    <tr>
                                        <td class="border border-slate-300">{{ $loop->iteration }}.-</td>
                                        <td class="border border-slate-300">{{ $item->descripcion }}</td>

                                        <td class="border border-slate-300">
                                            <button
                                                @click="showModal = true; requisitoId = {{ $item->id }}; descripcion = '{{ $item->descripcion }}'"
                                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 mx-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button">
                                                <i class="fa-solid fa-plus"></i> PDF
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <!-- Modal -->
    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Detalles del Prerequisito</h2>

            <!-- Formulario -->
            <form class="space-y-4" action="{{ route('tramites.subirdoc') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Input oculto para ID del Prerequisito -->
                <div class="hidden">
                    <label class="block text-gray-700 font-medium mb-2" for="requisitoId">ID del Prerequisito</label>
                    <input type="text" id="requisitoId" x-bind:value="requisitoId" name="requisito_id"
                        class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Input oculto para ID del Trámite -->
                <div class="hidden">
                    <label class="block text-gray-700 font-medium mb-2" for="tramiteId">ID del Trámite</label>
                    <input type="text" id="tramiteId" value="{{ $n_tramite->id }}" name="tramite_id"
                        class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Input para Descripción del Prerequisito -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="descripcion">Descripción del
                        Prerequisito</label>
                    <input type="text" id="descripcion" x-bind:value="descripcion" name="descripcion"
                        class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        readonly>
                </div>

                <!-- Subir Documento -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="documento">Subir Documento <i
                            class="fa-solid fa-file-pdf"></i></label>
                    <input type="file" id="documento" name="documento"
                        class="w-full text-gray-700 border border-gray-300 p-2 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500" accept=".pdf">
                </div>

                <!-- Botón para Subir -->
                <div class="text-center mt-4">
                    <button type="submit"
                        class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded shadow-md transition duration-200">
                        Subir
                    </button>
                </div>
            </form>

            <!-- Botones para Cerrar y Guardar -->
            <div class="flex justify-end mt-6 space-x-2">
                <button @click="showModal = false"
                    class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded shadow-md transition duration-200">
                    Cerrar
                </button>

            </div>
        </div>
    </div>

</div> --}}
