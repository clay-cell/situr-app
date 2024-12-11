<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class Busquedacliente extends Component
{
    use WithPagination;

    public $searchIdentificacion = '';
    public $searchNombre = '';
    public $searchPaterno = '';
    public $searchMaterno = '';
    public $searchFechaIngreso = '';
    public $searchFechaSalida = '';
    public $mostrar_nregistros = 10;
    public $selectedPdf = null;

    public function buscarClientes()
    {
        // Trigger a re-render to refresh the query with new filters
    }
    public function showPdf($clienteId)
    {
        $cliente = Cliente::find($clienteId);

        // Asumimos que el campo `pdf` en la base de datos contiene la ruta del PDF.
        $this->selectedPdf = $cliente->pdf;
    }
    public function render()
    {
        $clientes = Cliente::select('clientes.*', 'institucion_clientes.fecha_ingreso', 'institucion_clientes.fecha_salida', 'institucion_clientes.hora_entrada', 'institucion_clientes.hora_salida', 'institucions.nombre')
            ->leftJoin('institucion_clientes', 'clientes.id', 'institucion_clientes.cliente_id')
            ->leftJoin('institucions', 'institucion_clientes.institucion_id', 'institucions.id')
            ->when($this->searchIdentificacion, function ($query) {
                $query->where('clientes.identificacion', 'like', '%' . $this->searchIdentificacion . '%');
            })
            ->when($this->searchNombre, function ($query) {
                $query->where('clientes.nombres', 'like', '%' . $this->searchNombre . '%');
            })
            ->when($this->searchPaterno, function ($query) {
                $query->where('clientes.paterno', 'like', '%' . $this->searchPaterno . '%');
            })
            ->when($this->searchMaterno, function ($query) {
                $query->where('clientes.materno', 'like', '%' . $this->searchMaterno . '%');
            })
            ->when($this->searchFechaIngreso, function ($query) {
                $query->whereDate('institucion_clientes.fecha_ingreso', $this->searchFechaIngreso);
            })
            ->when($this->searchFechaSalida, function ($query) {
                $query->whereDate('institucion_clientes.fecha_salida', $this->searchFechaSalida);
            })
            ->paginate($this->mostrar_nregistros);

        return view('livewire.busquedacliente', compact('clientes'));
    }

}
