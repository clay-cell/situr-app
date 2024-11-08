    <x-menu>
        <div>
            <!-- Título -->
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 uppercase">Tramites </h2>
                <h2 class="text-2xl font-semibold text-gray-800 uppercase">servicio: {{$servicio[0]->tipo_servicio}}</h2>
            </div>
        </div>
        <div>
            {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
            @livewire('lista-requisitos',['servicio_id'=>$servicio[0]->id]){{----}}
        </div>
    </x-menu>
