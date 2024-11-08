<x-guest-layout>
    <x-menu>
        <div class="flex flex-wrap justify-center gap-4 p-6" x-data="{ hoveredCard: null }">
            <!-- Representante Legal -->
            <a href="{{-- route('representante.show', $establecimiento->id) --}}"
                class="bg-white shadow-md rounded-lg p-6 w-full md:w-1/4 flex flex-col items-center hover:bg-indigo-100 transition duration-300"
                @mouseover="hoveredCard = 1" @mouseleave="hoveredCard = null">
                <div class="text-indigo-500 text-5xl mb-4">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2 text-center">Representante Legal</h3>
                <p class="text-gray-600 text-center">Información sobre el representante legal del establecimiento.</p>
            </a>
            
            <div>
              <div>
                <h2 class="text-xl font-semibold mb-2 text-center uppercase">{{$establecimiento->nombre}}</h2>
              </div>
              <div>
                @if ($n_tramites == 0)
                  <table class="border-collapse borderborder-slate-400">
                      <thead>
                          <tr>
                              <th class="border border-slate-300 px-2">
                                  Tipo de tramite
                              </th>
                              <th class="border border-slate-300 px-2">
                                  Ver requisitos
                              </th>
                              <th class="border border-slate-300 px-2">
                                  Empezar tramite
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($tipo_tramite as $item)
                              <tr>
                                  <td class="border border-slate-300 px-2">{{ $item->nombre_tramite }}</td>
                                  <td class="border border-slate-300">
                                      @if ($item->id == 1)
                                          <a href="{{ route('requisitosTramite', [$establecimiento->servicio_id, $item->id]) }}"
                                              target="_blank"
                                              class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-2 py-2 m-4 my-2 rounded-md shadow-md transition-transform transform hover:scale-105"><i
                                                  class="fa-regular fa-file-pdf"></i></a>{{--requisitoa en pdf--}}
                                      @else
                                          <a href=""
                                              class="inline-flex items-center bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold px-2 py-2 m-4 my-2 rounded-md shadow-md transition-transform transform hover:scale-105"><i
                                                  class="fa-regular fa-file-pdf"></i></a>
                                      @endif
                                  </td>
                                  <td class="border border-slate-300">
                                      @if ($item->id == 1)
                                          <a href="{{ route('tramite.create', [$establecimiento->id, $item->id]) }}"
                                              class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-2 py-2 m-4 my-2 rounded-md shadow-md transition-transform transform hover:scale-105"><i
                                                  class="fa-solid fa-plus mr-2"></i></a>{{--empieza tramite nuevo--}}
                                      @else
                                          <a href=""
                                              class="inline-flex items-center bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold px-2 py-2 m-4 my-2 rounded-md shadow-md transition-transform transform hover:scale-105"><i
                                                  class="fa-solid fa-plus mr-2"></i></a>
                                      @endif
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
                @else
                    <table class="border-collapse borderborder-slate-400">
                        <thead>
                            <tr>
                                <th class="border border-slate-300 px-2">
                                    Tipo de tramite
                                </th>
                                <th class="border border-slate-300 px-2">
                                    Ver requisitos
                                </th>
                                @if ($tramites_pendientes > 0)
                                    <th class="border border-slate-300 px-2">
                                        Subir documentos
                                    </th>
                                @else
                                    <th class="border border-slate-300 px-2">
                                        Empezar tramite
                                    </th>
                                @endif
                                <th class="border border-slate-300 px-2">
                                    Seguimiento
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tipo_tramite as $item)
                                <tr>
                                    <td class="border border-slate-300 px-2">{{ $item->nombre_tramite }}</td>
                                    <td class="border border-slate-300">
                                        @if ($tramites_pendientes > 0)
                                            @if ($item->id == $tramite[0]->tipotramite_id)
                                                <a href="{{ route('requisitosTramite', [$establecimiento->servicio_id, $item->id]) }}"
                                                    target="_blank"
                                                    class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-2 py-2 m-4 my-2 rounded-md shadow-md transition-transform transform hover:scale-105"><i
                                                        class="fa-regular fa-file-pdf"></i></a>
                                            @else
                                                <a href="#"
                                                    class="inline-flex items-center bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold px-2 py-2 m-4 my-2 rounded-md shadow-md transition-transform transform hover:scale-105"><i
                                                        class="fa-regular fa-file-pdf"></i></a>
                                            @endif
                                        @else
                                            @if ($item->id == 1)
                                                <a href="#"
                                                    class="inline-flex items-center bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold px-2 py-2 m-4 my-2 rounded-md shadow-md transition-transform transform hover:scale-105"><i
                                                        class="fa-regular fa-file-pdf"></i></a>
                                            @else
                                                <a href="{{ route('requisitosTramite', [$establecimiento->servicio_id, $item->id]) }}"
                                                    target="_blank"
                                                    class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-2 py-2 m-4 my-2 rounded-md shadow-md transition-transform transform hover:scale-105"><i
                                                        class="fa-regular fa-file-pdf"></i></a>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="border border-slate-300">
                                        @if ($tramites_pendientes > 0)
                                            @if ($item->id == $tramite[0]->tipotramite_id)
                                                <a href="{{ route('tramite.show',[$establecimiento->id,$item->id]) }}"
                                                    class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-2 py-2 m-4 my-2 rounded-md shadow-md transition-transform transform hover:scale-105"><i
                                                        class="fa-solid fa-plus mr-2"></i></a>
                                            @else
                                                <a href=""
                                                    class="inline-flex items-center bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold px-2 py-2 m-4 my-2 rounded-md shadow-md transition-transform transform hover:scale-105"><i
                                                        class="fa-solid fa-plus mr-2"></i></a>
                                            @endif
                                        @else
                                            @if ($item->id == 1)
                                                <a href="#"
                                                    class="inline-flex items-center bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold px-2 py-2 m-4 my-2 rounded-md shadow-md transition-transform transform hover:scale-105"><i
                                                        class="fa-solid fa-plus mr-2"></i></a>
                                            @else
                                                <a href="{{ route('tramite.show',[$establecimiento->id,$item->id]) }}"
                                                    class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-2 py-2 m-4 my-2 rounded-md shadow-md transition-transform transform hover:scale-105"><i
                                                        class="fa-solid fa-plus mr-2"></i></a>
                                            @endif
                                        @endif

                                    </td>
                                    <td class="border border-slate-300">
                                        @if ($tramites_pendientes > 0)
                                            @if ($item->id == $tramite[0]->tipotramite_id)
                                                <a href="{{ route('tramite.show',[$establecimiento->id,$item->id]) }}"
                                                    class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-2 py-2 m-4 my-2 rounded-md shadow-md transition-transform transform hover:scale-105"><i class="fa-solid fa-eye"></i></a>
                                            @else
                                                <a href=""
                                                    class="inline-flex items-center bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold px-2 py-2 m-4 my-2 rounded-md shadow-md transition-transform transform hover:scale-105"><i class="fa-solid fa-eye"></i></a>
                                            @endif
                                        @else
                                            @if ($item->id == 1)
                                                <a href="#"
                                                    class="inline-flex items-center bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold px-2 py-2 m-4 my-2 rounded-md shadow-md transition-transform transform hover:scale-105"><i class="fa-solid fa-eye"></i></a>
                                            @else
                                                <a href="{{ route('tramite.show',[$establecimiento->id,$item->id]) }}"
                                                    class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-2 py-2 m-4 my-2 rounded-md shadow-md transition-transform transform hover:scale-105"><i class="fa-solid fa-eye"></i></a>
                                            @endif
                                        @endif

                                    </td>
                                  
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
              </div>
            </div>
           
        </div>


    </x-menu>
</x-guest-layout>
