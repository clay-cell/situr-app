<?php

namespace App\Livewire;

use App\Models\Servicio;
use Livewire\Component;
use Livewire\WithPagination;

class ListaExternos extends Component
{
    use WithPagination;
    public $mostrar_nregistros = 10;
    public function render()
    {
        $tipos_servicios=Servicio::select('*')
        ->paginate($this->mostrar_nregistros);
        return view('livewire.lista-externos',compact('tipos_servicios'));
    }
}
