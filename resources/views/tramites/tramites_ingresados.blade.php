
  <x-menu>
    <div>
        {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
      @livewire('proceso-tramites',['estado'=>'ingresado'])
    </div>
  </x-menu>




