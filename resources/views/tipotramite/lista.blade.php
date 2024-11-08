    <x-menu>
        <div>
            <!-- Título -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Tipos de tramite</h2>
            </div>
        </div>
        <div>
            {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
            @livewire('lista-tipo-tramite')
        </div>
    </x-menu>
