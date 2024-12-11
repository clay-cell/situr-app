<?php

namespace App\Livewire;

use App\Models\Institucion;
use App\Models\Licencia;
use App\Models\Servicio;
use Livewire\Component;
use Livewire\WithPagination;

class ListaInstituciones extends Component
{
    use WithPagination;
    public $mostrar_nregistros = 10;
    public $search;
    public $servicio = ''; // Nueva propiedad para el filtro de servicio
    public $selectedQR = null; // Propiedad para almacenar el QR seleccionado
    public $selectedLink = null; // Propiedad para almacenar el enlace seleccionado
    public $selectedInstitution = null; // Almacena la institución seleccionada
    public $mostrarModalLicencia = false; // Controla la visibilidad del modal
    public $fecha_emision;
    public $fecha_vencimiento;

    public function verificarLicencia($id)
    {
        $institucion = Institucion::find($id);
        $licencia = Licencia::where('institucion_id', $id)->first();

        $this->selectedInstitution = $institucion;

        if ($licencia) {
            $this->fecha_emision = $licencia->fecha_emision;
            $this->fecha_vencimiento = $licencia->fecha_vencimiento;
        } else {
            $this->fecha_emision = null;
            $this->fecha_vencimiento = null;
        }

        $this->mostrarModalLicencia = true;
    }

    public function guardarLicencia()
    {
        $this->validate([
            'fecha_emision' => 'required|date',
            'fecha_vencimiento' => 'required|date|after:fecha_emision',
        ]);

        Licencia::create([
            'institucion_id' => $this->selectedInstitution->id,
            'fecha_emision' => $this->fecha_emision,
            'fecha_vencimiento' => $this->fecha_vencimiento,
            'estado' => true,
        ]);

        $this->reset(['fecha_emision', 'fecha_vencimiento', 'mostrarModalLicencia']);
        session()->flash('message', 'Licencia registrada exitosamente.');
    }

    public function showQRModal($qr, $link)
    {
        $this->selectedQR = $qr;
        $this->selectedLink = $link;
    }
    public function render()
    {
        $instituciones = Institucion::select('institucions.*', 'servicios.tipo_servicio', 'categorias.nombre as categoria_nombre')
            ->leftJoin('servicios', 'institucions.servicio_id', 'servicios.id')
            ->leftJoin('categorias', 'institucions.categoria_id', 'categorias.id')
            ->when($this->search, function ($query) {
                $query->where('institucions.nombre', 'like', '%' . $this->search . '%');
            })
            ->when($this->servicio, function ($query) {
                $query->where('servicios.id', $this->servicio); // Filtrar por servicio
            })
            ->paginate($this->mostrar_nregistros);
        //dd($instituciones);
        $servicios = Servicio::select('*')->get();
        return view('livewire.lista-instituciones', compact('instituciones', 'servicios'));
    }
}
