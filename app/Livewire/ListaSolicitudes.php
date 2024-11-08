<?php

namespace App\Livewire;

use App\Models\solicitud_usuario;
use Livewire\Component;
use Livewire\WithPagination;

class ListaSolicitudes extends Component
{
    use WithPagination;
    public $mostrar_nregistros = 10;
    public $search;
    public function render()
    {
        $solicitudes_pendientes = solicitud_usuario::select('*')
        ->where('estado',false)
        ->where('cedula', 'like', '%' . $this->search . '%')
        ->paginate($this->mostrar_nregistros);
        return view('livewire.lista-solicitudes',compact('solicitudes_pendientes'));
    }
}
