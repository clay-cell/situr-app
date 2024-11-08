<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\solicitud_usuario;
use Livewire\WithPagination;

class ListaPrestadoresservicio extends Component
{
    use WithPagination;
    public $mostrar_nregistros = 10;
    public $search;

    public function render()
    {
        $solicitudes = solicitud_usuario::select('*', 'users.id as user_id')
    ->leftJoin('users', 'solicitud_usuarios.cedula', '=', 'users.cedula')
    ->where('solicitud_usuarios.estado', true)
    ->where('solicitud_usuarios.cedula', 'like', '%' . $this->search . '%') // especificar la tabla para `cedula`
    ->paginate($this->mostrar_nregistros);

        return view('livewire.lista-prestadoresservicio',compact('solicitudes'));
    }
}
