<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ProcesoTramites extends Component
{

    use WithPagination;


    public $search = "";
    public $cant = 50;
    public $estado_tramite;

    public function mount($estado)
    {
        $this->estado_tramite = $estado;
    }
    public function render()
    {

        /*if($this->estado_tramite=='ingresado'){
        $titulo='Tramites nuevos ingresados';
      }
      if($this->estado_tramite=='proceso'){
        $titulo='Tramites en proceso';
      }
      if($this->estado_tramite=='culminado'){
        $titulo='Tramites culminados';
      }*/
        if ($this->estado_tramite == 'ingresado') {
            $titulo = 'Tramites nuevos ingresados';
        }
        if ($this->estado_tramite == 'proceso') {
            $titulo = 'Tramites en proceso';
        }
        if ($this->estado_tramite == 'fuera_plazo') {
            $titulo = 'Tramites fuera de plazo';
        }
        if ($this->estado_tramite == 'eliminado') {
            $titulo = 'Tramites anulados';
        }
        if ($this->estado_tramite == 'culminado') {
            $titulo = 'Tramites culminados';
        }
        /*$datos = DB::table('institucions')
            ->select('institucions.id as eid', 'tramites.id as tid', 'servicios.tipo_servicio', 'institucions.nombre', 'institucions.telefono', 'institucions.direccion', 'institucions.email', 'tramites.fecha_inicio', 'tramites.fecha_culminacion', 'tipo_tramites.id as tipoTramite', 'tipo_tramites.nombre_tramite')
            ->join('tramites', 'institucions.id', '=', 'tramites.institucion_id')
            ->join('servicios', 'tramites.servicio_id', '=', 'servicios.id')
            ->join('requisitos', 'servicios.id', '=', 'requisitos.servicio_id')
            ->join('tipo_tramites', 'requisitos.tipo_tramite_id', '=', 'tipo_tramites.id')
            ->where('tramites.observacion', $this->estado_tramite)
            ->where('institucions.nombre', 'like', '%' . $this->search . '%')
            //->Orwhere('tipo_tramites.nombre_tramite','like','%'. $this->search.'%')
            ->orderBy('servicios.tipo_servicio')
            ->orderBy('institucions.nombre')
            ->paginate($this->cant);*/
        $datos = DB::table('institucions')
            ->select('institucions.id as eid', 'tramites.id as tid', 'servicios.tipo_servicio', 'institucions.nombre', 'institucions.telefono', 'institucions.email', 'tramites.fecha_inicio', 'tramites.fin_fecha_plazo', 'tramites.fecha_culminacion', 'tramites.servicio_id',  'tramites.observacion', 'tipo_tramites.id as tipoTramite', 'tipo_tramites.nombre_tramite')
            ->join('tramites', 'institucions.id', '=', 'tramites.institucion_id')
            ->join('servicios', 'tramites.servicio_id', '=', 'servicios.id')
            //->join('requisitos','servicios.id','=','requisitos.servicio_id')
            ->join('requisitos', 'tramites.requisito_id', '=', 'requisitos.id')
            ->join('tipo_tramites', 'requisitos.tipo_tramite_id', '=', 'tipo_tramites.id')
            ->where('tramites.observacion', $this->estado_tramite)
            ->where('institucions.nombre', 'like', '%' . $this->search . '%')
            //->Orwhere('tipo_tramites.nombre_tramite','like','%'. $this->search.'%')
            ->orderBy('servicios.tipo_servicio')
            ->orderBy('institucions.nombre')
            ->paginate($this->cant);
        //dd($datos);
        return view('livewire.proceso-tramites', compact('datos', 'titulo'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
