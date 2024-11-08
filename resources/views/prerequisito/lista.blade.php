
    <x-menu>
        <div>
            <!-- Título -->
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 uppercase">Requisitos</h2>
                <h2 class="text-2xl font-semibold text-gray-800 uppercase">servicio: {{$servicio->tipo_servicio}}</h2>
                <h2 class="text-2xl font-semibold text-gray-800 uppercase">tramite: {{$requisito->descripcion}}</h2>
            </div>
        </div>
        <div>
            {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
            @livewire('lista-prerequisitos',['requisito_id'=>$requisito->id]){{----}}
        </div>
    </x-menu>

