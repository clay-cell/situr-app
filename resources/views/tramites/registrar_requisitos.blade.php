  <x-menu>
    <div>
      <!-- Título -->
      <div class="mx-6">
          <h2 class="text-2xl font-semibold text-gray-800 uppercase">Registro de requisitos </h2>
          <h2 class="text-2xl font-semibold text-gray-800 uppercase">{{$establecimiento[0]->nombre}}</h2>
          <h2 class="text-2xl font-semibold text-gray-800 uppercase">{{$servicio[0]->tipo_servicio}}</h2>
      </div>
    </div>
    <div>
      {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
      {{--@livewire('registro-requisitos', ['institucion_id' => $eid,'tramite_id' => $tid,'servicio_id' => $servicio[0]->id,'n_tramiteid'=>$n_tramite])--}}
      @livewire('registro-requisitos', ['institucion_id' => $eid,'tramite_id' => $tid,'servicio_id' => $servicio[0]->id])
    </div>
  </x-menu>
