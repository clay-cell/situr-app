<x-menu>
    <div>
        <!-- Título -->
        <div class="container mx-auto p-6">
            <h2 class="text-2xl font-semibold text-gray-800 uppercase">{{ $titulo }} </h2>
            <h2 class="text-2xl font-semibold text-gray-800 uppercase">{{ $establecimiento[0]->nombre }}</h2>
            <h2 class="text-2xl font-semibold text-gray-800 uppercase">{{ $servicio[0]->tipo_servicio }}</h2>
            <h2 class="text-2xl font-semibold text-gray-800 uppercase">
                {{ $eid . ' ' . $tid . ' ' . $servicio[0]->id . ' ' . $tramite->tipotramite_id }}</h2>
        </div>
    </div>
    <div>
        {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
        {{-- @livewire('registro-requisitos', ['institucion_id' => $eid,'tramite_id' => $tid,'servicio_id' => $servicio[0]->id]) --}}
        @livewire('registro-requisitos', ['institucion_id' => $eid, 'tramite_id' => $tid, 'servicio_id' => $servicio[0]->id, 'tipo_tramite_id' => $tramite->tipotramite_id])

    </div>
    <h2 class="text-center">Generar Formularios</h2>
    <div class="text-center mt-4">
        <a href="{{ route('formulario_solicitud',$eid) }}" target="_blank"
            class="bg-green-600 text-gray-50 hover:bg-green-500 hover:text-white rounded-md px-3 py-2">Formulario de
            Solicitud</a>
        <a href="{{ route('orden_trabajo',$eid) }}" target="_blank"
            class="bg-orange-600 text-gray-50 hover:bg-orange-500 hover:text-white rounded-md px-3 py-2">Orden de Trabajo</a>
    </div>
</x-menu>
