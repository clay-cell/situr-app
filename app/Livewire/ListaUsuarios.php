<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListaUsuarios extends Component
{
    use WithPagination;
    public $mostrar_nregistros = 10;
    public $search;

    public function render()
    {
        /*$users = User::select('*')
        ->where('cedula', 'like', '%' . $this->search . '%')
        ->paginate($this->mostrar_nregistros);*/
        $users = User::with('roles') // Eager load roles to avoid N+1 query issues
        ->where('cedula', 'like', '%' . $this->search . '%')
        ->paginate($this->mostrar_nregistros);
        return view('livewire.lista-usuarios',compact('users'));
    }
}
