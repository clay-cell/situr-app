<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PreRequisito;

class ListaPrerequisitos extends Component
{
  public $visualizar=false;
  public $requisitoid;
  public $descripcion="";
  public $grupo="";

  public function mostrar(){
    $this->visualizar=true;
  }
  public function ocultar(){
    $this->visualizar=false;
  }

  public function registrar(){
    $this->validate([
      'grupo' => 'required|string|min:5|max:200',
      'descripcion' => 'required|string|min:5|max:500',
    ]);
    //$tramite=TipoTramite::select('nombre_tramite')->where('id',$this->seleccion_tramite)->get();
    PreRequisito::create([
      "grupo"=>mb_strtoupper($this->grupo, 'UTF-8'),
      "descripcion"=>$this->descripcion,
      "requisito_id"=>$this->requisitoid,
    ]);
    $this->grupo="";
    $this->descripcion="";
    $this->visualizar=false;
  }

  public function mount($requisito_id){
    $this->requisitoid=$requisito_id;
  }

  public function render()
  {
    $prerequisitos=PreRequisito::select('id','grupo','descripcion')->where('estado',1)->where('requisito_id',$this->requisitoid)->get();
    $primerosElementos = [];
      foreach ($prerequisitos as $primeros) {
        $primerosElementos[] = $primeros->grupo;
      }
        // Eliminamos duplicados
    $unicos = array_unique($primerosElementos);
    return view('livewire.lista-prerequisitos',compact('prerequisitos','unicos'));
  }
}
