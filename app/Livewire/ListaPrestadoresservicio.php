<?php

namespace App\Livewire;

use App\Models\Institucion;
use App\Models\Tramite;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListaPrestadoresservicio extends Component
{
    use WithPagination;
    public $mostrar_nregistros = 10;
    public $search;

    public function render()
    {
        $solicitudes =User::role('Contribuyente')
            ->paginate($this->mostrar_nregistros);

        return view('livewire.lista-prestadoresservicio', compact('solicitudes'));
    }
}
