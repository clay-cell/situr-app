<?php

namespace App\Livewire;
use App\Models\Servicio;
use Livewire\Component;

class ListaServicios extends Component
{
    public $visualizar=false;
    public $visualiza_actualizar=false;
    public $nombre_servicio="";
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
        'nombre_servicio' => 'required|string|min:5|max:100',
      ]);
      Servicio::create([
        "tipo_servicio"=>mb_strtoupper($this->nombre_servicio, 'UTF-8')
      ]);
      $this->nombre_servicio="";
      $this->visualizar=false;
    }


    public function mostrar_actualizar(){
      $this->visualiza_actualizar=true;
    }
    public function ocultar_actualizar(){
      $this->visualiza_actualizar=false;
    }


    public function estado($id, $estado){
      $nuevo = !$estado;
      $servicio=Servicio::find($id);
      $servicio->estado=$nuevo;
      $servicio->save();
    }
    public function recupera($id){
      $this->id=$id;
      $servicio=Servicio::find($id);
      $this->nombre_servicio=$servicio->tipo_servicio;
      $this->visualiza_actualizar=true;
    }
    public function actualizar(){
      $servicio=Servicio::find($this->id);
      $this->validate([
        'nombre_servicio' => 'required|string|min:5|max:100',
      ]);
      $servicio->tipo_servicio=mb_strtoupper($this->nombre_servicio, 'UTF-8');
      $servicio->save();
      $this->visualiza_actualizar=false;
      $this->nombre_servicio="";
    }

    public function render()
    {
      $servicios = Servicio::all();
      return view('livewire.lista-servicios',compact('servicios'));
    }
}
