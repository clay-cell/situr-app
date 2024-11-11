<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">{{$titulo}}</h2>
    <x-busquedatabla mensaje="Busqueda por nombre de establecimiento"/>
    <!-- Users Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
      <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
          <tr>
            <th class="py-3 px-4 text-left text-sm font-semibold">#</th>
            <th class="py-3 px-4 text-left text-sm font-semibold">Servicio</th>
            <th class="py-3 px-4 text-left text-sm font-semibold">Establecimiento</th>
            <th class="py-3 px-4 text-left text-sm font-semibold">Tramite</th>
            <th class="py-3 px-4 text-left text-sm font-semibold">Fecha ingreso</th>
            @if ($titulo=='Tramites culminados')
              <th class="py-3 px-4 text-left text-sm font-semibold">Fecha finalización</th>
            @endif
            <th class="py-3 px-4 text-left text-sm font-semibold">Ver documentos</th>
          </tr>
        </thead>
        <tbody>
          @php
            $cont=1;
          @endphp
          @foreach ($datos as $dato)
            <tr class="hover:bg-gray-100 border-b border-gray-200">
              <td class="py-3 px-4 text-gray-700">{{$cont}}</td>
              <td class="py-3 px-4 text-gray-700">{{ $dato->tipo_servicio }}</td>
              <td class="py-3 px-4 text-gray-700 uppercase">{{ $dato->nombre }}</td>
              <td class="py-3 px-4 text-gray-700">{{ $dato->nombre_tramite }}</td>
              <td class="py-3 px-4 text-gray-700">{{ $dato->fecha_inicio }}</td> 
              @if ($titulo=='Tramites culminados')
                <td class="py-3 px-4 text-gray-700">{{ $dato->fecha_culminacion }}</td> 
              @endif
              <td class="py-3 px-4 text-gray-700">
                <a href="{{ route('revisar_tramite.show', [$dato->eid, $dato->tid]) }}" class="text-sm md:text-sm lg:text-base font-semibold bg-blue-600 hover:bg-blue-800 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
                  <i class="fa-solid fa-eye"></i></a>
              </td>    
            </tr>
            @php
                $cont++;
            @endphp
          @endforeach
        </tbody>
      </table>
    </div>
  
    <!-- Pagination Links -->
    <div class="mt-6">
        {{$datos->links()}}
    </div>
  </div>
  