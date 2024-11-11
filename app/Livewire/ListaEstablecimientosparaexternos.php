<?php

namespace App\Livewire;

use App\Models\Institucion;
use Livewire\Component;
use Livewire\WithPagination;

class ListaEstablecimientosparaexternos extends Component
{
    public $servicio_id;
    use WithPagination;

    public $search = ''; // Definir el campo de búsqueda
    public $mostrar_nregistros = 10;

    public function mount($servicio_id = null)
    {
        $this->servicio_id = $servicio_id;
    }

    public function updatingSearch()
    {
        $this->resetPage(); // Reinicia la paginación al actualizar la búsqueda
        // Depuración: puedes usar logger o dd() para revisar si el método se está ejecutando
        //\Log::info("Actualizando búsqueda: {$this->search}");
    }


    public function render()
    {
        $establecimientos = Institucion::select('institucions.*', 'servicios.tipo_servicio')
            ->leftJoin('servicios', 'institucions.servicio_id', '=', 'servicios.id')
            ->where('servicios.id', $this->servicio_id)
            ->where('institucions.nombre', 'like', '%' . $this->search . '%')
            ->paginate($this->mostrar_nregistros);

        return view('livewire.lista-establecimientosparaexternos', compact('establecimientos'));
    }
}
