 <div class="container mx-auto p-6">
     <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
         <table class="w-full text-sm text-left rtl:text-right text-gray-800 ">
             <thead>
                 <tr class="bg-white border-b ">
                     <th class="border border-slate-300 uppercase">Requisitos</th>
                     <th class="border border-slate-300 uppercase">Observacion</th>
                     <th class="border border-slate-300 uppercase">Acciones</th>
                 </tr>
             </thead>
             @php
                 $cont = 1;
             @endphp
             <tbody>
                 @foreach ($prerequisitos as $grupo)
                     <tr class="bg-white border-b  font-semibold">
                         <td>
                             {{ $grupo->descripcion }}
                         </td>
                     </tr>
                     @foreach ($itemprerequisitos as $item)
                         @if ($grupo->id == $item->pre_requisito_id)
                             <tr class="bg-white border-b">
                                 <td class="border border-slate-300">{{ $cont . '.- ' . $item->descripcion }}</td>
                                 @if (isset($entregados[$item->id]))
                                     <td class="border border-slate-300">{{ $entregados[$item->id] }}</td>
                                 @else
                                     <td class="border border-slate-300">Sin envio</td>
                                 @endif

                                 <!-- visualizando al modal de mostrar -->
                                 @if (!in_array($item->id, $presentados_id))
                                     <td class="border border-slate-300">
                                         <button wire:click="mostrar('{{ $item->id }}')" type="button"
                                             class=" text-white bg-blue-700 hover:bg-blue-800 font-bold py-2 px-4 rounded-l">
                                             <i class="fa-solid fa-circle-plus"></i><span> PDF{{ $item->id }}</span>
                                         </button>
                                     </td>
                                 @else
                                     <td class="border border-slate-300">
                                         <div class="inline-flex">
                                             <button wire:click="mostrar_pdf('{{ $item->id }}')"
                                                 class=" text-white bg-sky-600 hover:bg-sky-700 font-bold py-2 px-4 rounded-l">
                                                 <i class="fa-regular fa-eye"></i> PDF{{-- $item->id --}}
                                             </button>
                                             @if ($entregados[$item->id] == 'observado')
                                                 <button wire:click="eliminarPDF('{{ $item->id }}')"
                                                     class="text-white bg-rose-600 hover:bg-rose-700 font-bold py-2 px-4 rounded-r">
                                                     <i class="fa-regular fa-trash-can"></i> PDF{{-- $item->id --}}
                                                 </button>
                                             @endif

                                         </div>
                                     </td>
                                 @endif
                             </tr>
                             @php
                                 $cont++;
                             @endphp
                         @endif
                     @endforeach
                 @endforeach
             </tbody>
         </table>
     </div>
     @if ($idproveedor[0]->user_id != Auth::user()->id)

         {{-- $validados.' '.$itemprerequisitos->count() --}}
         <div>

             @if ($validados == $itemprerequisitos->count())
                 <div x-data="{
                     aprobarTramite() {
                         Swal.fire({
                             title: '¿Estás seguro?',
                             text: 'Esta acción aprobará el trámite.',
                             icon: 'warning',
                             showCancelButton: true,
                             confirmButtonColor: '#3085d6',
                             cancelButtonColor: '#d33',
                             confirmButtonText: 'Sí, aprobar',
                             cancelButtonText: 'Cancelar'
                         }).then((result) => {
                             if (result.isConfirmed) {
                                 @this.aprobar(); // Llamar al método Livewire
                             }
                         });
                     }
                 }"
                     @alert.window="Swal.fire({
                    title: 'Éxito',
                    text: $event.detail.message,
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                })">
                     <button @click="aprobarTramite" type="button"
                         class="text-white bg-lime-700 hover:bg-lime-800 font-bold py-2 px-4 mt-4 rounded-full">
                         <i class="fa-solid fa-circle-plus mr-2"></i><span>Aprobar</span>
                     </button>
                 </div>
                 <div class="flex flex-col items-center text-center">
                     <div class="text-center mt-4 mr-3">
                         <h2 class="text-center my-4">Generar Formularios</h2>
                         <a href="{{ route('formulario_solicitud', $institucionid) }}" target="_blank"
                             class="bg-green-600 text-gray-50 hover:bg-green-500 hover:text-white rounded-md px-3 py-2">Formulario
                             de
                             Solicitud</a>
                         <a href="{{ route('orden_trabajo', $institucionid) }}" target="_blank"
                             class="bg-orange-600 text-gray-50 hover:bg-orange-500 hover:text-white rounded-md px-3 py-2">Orden
                             de Trabajo</a>
                     </div>
                     <div class="text-center mt-4">
                         <h2 class="text-center my-4">Inspeccion Ocular</h2>
                         <a href="{{ route('formulario_solicitud', $institucionid) }}" target="_blank"
                             class="bg-purple-600 text-gray-50 hover:bg-purple-500 hover:text-white rounded-md px-3 py-2"><i
                                 class="fa-solid fa-arrows-to-eye mr-3"></i>Inspeccion</a>
                     </div>
                 </div>
             @else
                 <button wire:click="mostrar_seguimiento" type="button"
                     class=" text-white bg-blue-700 hover:bg-blue-800 font-bold py-2 px-4 mt-4 rounded-l">
                     <i class="fa-solid fa-circle-plus mr-2"></i><span>Seguimiento</span>
                 </button>
             @endif

         </div>
     @endif

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
                     <label class="block text-gray-700 font-medium mb-2">Subir Documento <i
                             class="fa-solid fa-file-pdf"></i></label>
                     <input type="file" wire:model="documento_pdf"
                         class="w-full text-gray-700 border border-gray-300 p-2 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                         accept=".pdf">
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
                     PDF enviado{{-- $elpdf --}}
                 </h3>
                 <button type="button" wire:click="ocultar_pdf"
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
             {{-- <input type="text" wire:model="elpdf" width="100%"> --}}
             <iframe src="{{ asset($elpdf) }}" width="100%" height="600"></iframe>{{-- --}}
             {{-- <iframe src="/storage/1731633174_perfil de monografia.pdf" width="100%" height="600"></iframe> --}}
         </x-slot>
         <x-slot name="footer">

             @if ($idproveedor[0]->user_id != Auth::user()->id)
                 <button wire:click="validar"
                     class="text-sm md:text-sm lg:text-base font-semibold bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
                     Validar
                 </button>
                 <button wire:click="observar"
                     class="text-sm md:text-sm lg:text-sm font-semibold bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
                     Observar requisito
                 </button>
             @endif

             <button wire:click="ocultar_pdf"
                 class="text-sm md:text-sm lg:text-base font-semibold bg-red-500 hover:bg-red-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
                 Cerrar ventana
             </button>
         </x-slot>
     </x-dialog-modal>
     {{-- fin modal para registrar --}}

     {{-- modal para registrar seguimiento --}}
     <x-dialog-modal wire:model="visualizar_seguimiento">
         <x-slot name="title">
             <!-- Modal header -->
             <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                 <h3 class="text-xl font-semibold text-gray-900">
                     Observaciones al tramite
                 </h3>
                 <button type="button" wire:click="ocultar_seguimiento"
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

             @if ($validados == $itemprerequisitos->count())
                 <div>
                     <label class="block text-sm font-medium text-gray-600">Se enviara a:</label>
                     <input type="text" value="A la sub unidad de {{-- $destino_sub_unidad[0]->sub_unidad --}}" readonly
                         class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                     @error('instancia')
                         <span class="text-red-500 text-sm">{{ $message }}</span>
                     @enderror
                 </div>
             @else
                 <div>
                     <label class="block text-sm font-medium text-gray-600">Fecha observación</label>
                     <input type="date" wire:model="fecha_inicio" value='2024-05-24' required
                         class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                     @error('fecha_inicio')
                         <span class="text-red-500 text-sm">{{ $message }}</span>
                     @enderror
                 </div>
                 <div>
                     <label class="block text-sm font-medium text-gray-600">Observación</label>
                     <textarea wire:model="observacion" required cols="30" rows="10"
                         class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
               </textarea>
                     @error('observacion')
                         <span class="text-red-500 text-sm">{{ $message }}</span>
                     @enderror
                 </div>
                 <div>
                     <label class="block text-sm font-medium text-gray-600">Plazo de presentación observaciones en
                         dias:</label>
                     <select wire:model="dias_plazo"
                         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-16 p-2">
                         <option value="10">10</option>
                         <option value="15">15</option>
                     </select>
                 </div>
             @endif
         </x-slot>
         <x-slot name="footer">
             @if ($validados == $itemprerequisitos->count())
                 <button type="button" wire:click="enviar_subunidad"
                     class=" text-sm md:text-sm lg:text-sm font-semibold bg-teal-600 hover:bg-teal-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
                     Enviar tramite
                 </button>
             @else
                 <button wire:click="crear_seguimiento"
                     class="text-sm md:text-sm lg:text-sm font-semibold bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
                     Registrar observación
                 </button>
             @endif
             <button wire:click="ocultar_seguimiento"
                 class="text-sm md:text-sm lg:text-sm font-semibold bg-red-500 hover:bg-red-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
                 Cerrar ventana
             </button>
         </x-slot>
     </x-dialog-modal>
     {{-- fin modal para registrar --}}

 </div>
