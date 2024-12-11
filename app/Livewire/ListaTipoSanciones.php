<?php

namespace App\Livewire;

use App\Models\sanciones;
use Livewire\Component;
use Livewire\WithPagination;

class ListaTipoSanciones extends Component
{
    use WithPagination;
    public $mostrar_nregistros = 10;
    public $visualizar = false;
    public $visualiza_actualizar = false;
    public $tipo_sancion = "";
    public $id;

    public function mostrar()
    {
        $this->visualizar = true;
    }
    public function ocultar()
    {
        $this->visualizar = false;
    }
    public function registrar()
    {
        $this->validate([
            'tipo_sancion' => 'required|string|min:5|max:100',
        ]);
        sanciones::create([
            "tipo_sancion" => mb_strtoupper($this->tipo_sancion, 'UTF-8')
        ]);
        $this->tipo_sancion = "";
        $this->visualizar = false;
        // Enviar evento para mostrar SweetAlert
        // Enviar evento global para mostrar SweetAlert
        $this->dispatch('sancion-registrada', '¡Sanción registrada exitosamente!');
    }
    public function mostrar_actualizar()
    {
        $this->visualiza_actualizar = true;
    }
    public function ocultar_actualizar()
    {
        $this->visualiza_actualizar = false;
    }
    public function recupera($id)
    {
        $this->id = $id;
        $sancion = sanciones::find($id);
        $this->tipo_sancion = $sancion->tipo_sancion;
        $this->visualiza_actualizar = true;
    }
    public function render()
    {
        $tipos_sanciones = sanciones::select('*')
            ->paginate($this->mostrar_nregistros);
        return view('livewire.lista-tipo-sanciones', compact('tipos_sanciones'));
    }
}
