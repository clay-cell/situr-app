<?php

namespace App\Livewire;

use App\Models\Requisito;
use App\Models\TipoTramite;
use Livewire\Component;

class ListaRequisitos extends Component
{

  public $visualizar=false;
  public $visualiza_actualizar=false;
  public $seleccion_tramite=1;
  public $descripcion="";
  public $servicioId;
  public $id;
  public $nombre_sancion="";


  public function mostrar(){
    $this->visualizar=true;
  }
  public function ocultar(){
    $this->visualizar=false;
  }


  public function mount($servicio_id){
    $this->servicioId=$servicio_id;
  }

  public function estado($id, $estado){
    $nuevo = !$estado;
    $requisito=Requisito::find($id);
    $requisito->estado=$nuevo;
    $requisito->save();
  }
  public function recupera($id){
    $this->id=$id;
    $requisito=Requisito::find($id);
    $this->descripcion=$requisito->descripcion;
    $this->visualiza_actualizar=true;
  }
  public function registrar(){
    $this->validate([
      'descripcion' => 'required|string|min:5|max:200',
    ]);
    $tramite=TipoTramite::select('nombre_tramite')->where('id',$this->seleccion_tramite)->get();
    Requisito::create([
      "tramite"=>$tramite[0]->nombre_tramite,
      "descripcion"=>mb_strtoupper($this->descripcion, 'UTF-8'),
      "tipo_tramite_id"=>$this->seleccion_tramite,
      "servicio_id"=>$this->servicioId,
    ]);
    $this->descripcion="";
    $this->visualizar=false;
  }

  public function render(){
    $requisitos=Requisito::select('requisitos.id','requisitos.descripcion','requisitos.estado','tipo_tramites.nombre_tramite')
    ->leftJoin('tipo_tramites','requisitos.tipo_tramite_id','tipo_tramites.id')
    ->where('servicio_id',$this->servicioId)
    ->get();
    $tipo_tramites=TipoTramite::select('id','nombre_tramite')
    ->where('estado',1)
    ->get();
    return view('livewire.lista-requisitos',compact('requisitos','tipo_tramites'));
  }
}
