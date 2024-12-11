<?php
namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Institucion;
use App\Models\InstitucionCliente;
use Livewire\Component;
use Livewire\WithPagination;

class ListaClientesestablecimientos extends Component
{
    public $institucion_id;
    use WithPagination;

    public $searchIdentificacion = '';
    public $searchNombre = '';
    public $searchPaterno = '';
    public $searchMaterno = '';
    public $mostrar_nregistros = 10;
    public $searchFechaIngreso = '';
    public $searchFechaSalida = '';

    public function mount($institucion_id = null)
    {
        $this->institucion_id = $institucion_id;
    }

    public function buscarClientes()
    {
        // Trigger a re-render to refresh the query with new filters
    }

    public function render()
    {
        $clientes = InstitucionCliente::select('institucion_clientes.*', 'clientes.nombres', 'clientes.paterno', 'clientes.materno', 'clientes.identificacion', 'clientes.expedido', 'clientes.pdf')
            ->leftJoin('clientes', 'institucion_clientes.cliente_id', 'clientes.id')
            ->where('institucion_clientes.institucion_id', $this->institucion_id)
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

        $institucion = Institucion::find($this->institucion_id);

        return view('livewire.lista-clientesestablecimientos', compact('clientes', 'institucion'));
    }
}
