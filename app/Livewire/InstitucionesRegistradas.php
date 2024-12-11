<?php

namespace App\Livewire;

use App\Models\Institucion;
use App\Models\Servicio;
use Livewire\Component;

class InstitucionesRegistradas extends Component
{

    public $servicioSeleccionado = null;
    public $buscarInstitucion = '';

    public function seleccionarServicio($id)
    {
        $this->servicioSeleccionado = $id;
    }
    public function render()
    {
        $iconos = [
            'ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO' => 'fas fa-hotel',
            'EMPRESAS DE VIAJES Y TURISMO' => 'fas fa-plane',
            'EMPRESAS DE TRANSPORTE TURISTICO EXCLUSIVO' => 'fas fa-bus',
            'EMPRESAS ORGANIZADORAS DE CONGRESOS Y FERIAS DE TU' => 'fas fa-handshake',
            'GUIAS DE TURISMO' => 'fas fa-map-signs',
            'SERVICIOS GASTRONOMICOS TURISTICOS' => 'fas fa-utensils',
        ];
        $servicios = Servicio::all();
        $instituciones = Institucion::query()
            ->when($this->servicioSeleccionado, function ($query) {
                $query->where('servicio_id', $this->servicioSeleccionado);
            })
            ->when($this->buscarInstitucion, function ($query) {
                $query->where('nombre', 'like', '%' . $this->buscarInstitucion . '%');
            })
            ->get();

        return view('livewire.instituciones-registradas', compact('servicios', 'instituciones','iconos'));
    }
}
