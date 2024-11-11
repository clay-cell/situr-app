<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TramitesNuevos extends Component
{

    use WithPagination;


    public $search="";
    public $cant=50;

    public function render()
    {
        $nuevos=DB::table('institucions')
            ->select('tramites.id','servicios.tipo_servicio','institucions.nombre','institucions.telefono','institucions.direccion','institucions.email','tramites.fecha_inicio','tipo_tramites.nombre_tramite')
            ->join('tramites','institucions.id','=','tramites.institucion_id')
            ->join('servicios','tramites.servicio_id','=','servicios.id')
            ->join('tipo_tramites','tramites.tipotramite_id','=','tipo_tramites.id')
            ->where('institucions.nombre','like','%'. $this->search.'%')
            ->Orwhere('tipo_tramites.nombre_tramite','like','%'. $this->search.'%')
            ->where('tramites.observacion','ingresado')
            ->orderBy('servicios.tipo_servicio')
            ->orderBy('institucions.nombre')
            ->paginate($this->cant);
            //->get();
        return view('livewire.tramites-nuevos',compact('nuevos'));
    }
    public function updatingSearch(){
      $this->resetPage();
  }
}
