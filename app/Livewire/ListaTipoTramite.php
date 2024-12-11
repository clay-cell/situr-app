<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TipoTramite;



class ListaTipoTramite extends Component
{
  public $visualizar=false;
  public $visualiza_actualizar=false;
  public $nombre_tramite="";
  public $servicio="";
  public $id;


  public function mostrar(){
    $this->visualizar=true;
  }
  public function ocultar(){
    $this->visualizar=false;
  }
  public function registrar(){
    $this->validate([
      'nombre_tramite' => 'required|string|min:5|max:100',
    ]);
    TipoTramite::create([
      "nombre_tramite"=>mb_strtoupper($this->nombre_tramite, 'UTF-8')
    ]);
    $this->nombre_tramite="";
    $this->visualizar=false;
    //$this->emit('confirmacion','Se registro correctamente');
  }

  public function mostrar_actualizar(){
    $this->visualiza_actualizar=true;
  }
  public function ocultar_actualizar(){
    $this->visualiza_actualizar=false;
  }


  public function estado($id, $estado){
    $nuevo = !$estado;
    $servicio=TipoTramite::find($id);
    $servicio->estado=$nuevo;
    $servicio->save();
  }

  public function recupera($id){
    $this->id=$id;
    $tramite=TipoTramite::find($id);
    $this->nombre_tramite=$tramite->nombre_tramite;
    $this->visualiza_actualizar=true;
  }
  public function actualizar(){
    $tramite=TipoTramite::find($this->id);
    $this->validate([
      'nombre_tramite' => 'required|string|min:5|max:100',
    ]);
    $tramite->nombre_tramite=mb_strtoupper($this->nombre_tramite, 'UTF-8');
    $tramite->save();
    $this->visualiza_actualizar=false;
    $this->nombre_tramite="";
  }

  public function render()
  {   $tipotramite = TipoTramite::all();
    return view('livewire.lista-tipo-tramite',compact('tipotramite'));
  }
}
