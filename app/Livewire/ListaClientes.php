<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Institucion;
use Livewire\Component;
use Livewire\WithPagination;

class ListaClientes extends Component
{
    use WithPagination;
    public $mostrar_nregistros = 10;
    public $search;
    public $institucion_id;

    public function mount($institucion_id)
    {
        $this->institucion_id = $institucion_id;
    }
    public function render()
    {
        $clientes = Cliente::select('clientes.*', 'institucion_clientes.fecha_ingreso', 'institucion_clientes.fecha_salida', 'institucion_clientes.hora_entrada', 'institucion_clientes.hora_salida')
            ->leftJoin('institucion_clientes', 'clientes.id', 'institucion_clientes.cliente_id')
            ->where('institucion_clientes.institucion_id', $this->institucion_id) // Filtro por institucion_id
            ->where('clientes.identificacion', 'like', '%' . $this->search . '%') // Filtro por identificación
             ->paginate($this->mostrar_nregistros);
        $institucion = Institucion::find($this->institucion_id);
        return view('livewire.lista-clientes', compact('clientes','institucion'));
    }
}
