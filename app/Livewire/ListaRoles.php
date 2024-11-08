<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;


class ListaRoles extends Component
{
    use WithPagination;
    public $mostrar_nregistros = 10;
    public $search;
    
    public function render()
    {
        $roles = Role::with('permissions')
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate($this->mostrar_nregistros);
        return view('livewire.lista-roles',compact('roles'));
    }
}
