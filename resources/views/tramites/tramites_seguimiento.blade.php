<x-menu>
    <div>
        <!-- Título -->
        <div class="container mx-auto p-6">
            <h2 class="text-2xl font-semibold text-gray-800 uppercase">{{ $titulo }} </h2>
            <h2 class="text-2xl font-semibold text-gray-800 uppercase">{{ $establecimiento[0]->nombre }}</h2>
            <h2 class="text-2xl font-semibold text-gray-800 uppercase">{{ $servicio[0]->tipo_servicio }}</h2>
            <h2 class="text-2xl font-semibold text-gray-800 uppercase">
                {{--$eid . ' ' . $tid . ' ' . $servicio[0]->id . ' ' . $tramite[0]->id--}}</h2>
        </div>
    </div>
    <div>

    <div class="container mx-auto p-6">
      <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-800 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-1">
                      Fecha Ingreso
                    </th>
                    <th scope="col" class="px-6 py-1">
                      Observación
                    </th>
                    <th scope="col" class="px-6 py-1">
                      Procesado en
                    </th>
                    <th scope="col" class="px-6 py-1">
                      Fecha culminación
                    </th>
                </tr>
            </thead>
            <tbody>
              @foreach ($seguimiento as $presentado)
                <tr class="bg-white border-b ">
                  <td class="px-6 py-2">
                    {{$presentado->fecha_inicio}}
                  </td>
                  <td class="px-6 py-2">
                    {{$presentado->observacion}}
                  </td>
                  <td class="px-6 py-2">
                    {{$presentado->instancia}}
                  </td>
                  <td class="px-6 py-2">
                    {{$presentado->fecha_fin}}
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
    </div>


    </div>
</x-menu>
