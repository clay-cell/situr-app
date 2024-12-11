<?php

namespace App\Livewire;

use App\Models\item_sancion;
use App\Models\sanciones;
use App\Models\Servicio;
use Livewire\Component;

class ListaSanciones extends Component
{
    public $servicioId;
    public $visualizar = false;
    public $visualiza_actualizar = false;
    public $id;
    public $nombre_sancion='';
    public $tipo_sancions='';
    public function mount($servicio_id)
    {
        $this->servicioId = $servicio_id;
    }
    public function mostrar()
    {
        $this->visualizar = true;
    }
    public function ocultar()
    {
        $this->visualizar = false;
    }
    public function estado($id, $estado){
        $nuevo = !$estado;
        $requisito=item_sancion::find($id);
        $requisito->estado=$nuevo;
        $requisito->save();
      }

      public function registrar(){
        $this->validate([
          'nombre_sancion' => 'required|string',
          'tipo_sancions' => 'required|numeric',
        ]);
        item_sancion::create([
          "nombre_sancion"=>$this->nombre_sancion,
          "estado"=>true,
          "servicio_id"=>$this->servicioId,
          "sancion_id"=>$this->tipo_sancions,
        ]);
        $this->nombre_sancion="";
        $this->visualizar=false;
      }
      public function mostrar_actualizar(){
        $this->visualiza_actualizar=true;
      }
      public function ocultar_actualizar(){
        $this->visualiza_actualizar=false;
      }
      public function recupera($id){
        $this->id=$id;
        $requisito=item_sancion::find($id);
        $this->nombre_sancion=$requisito->nombre_sancion;
        $this->visualiza_actualizar=true;
      }
      public function actualizar(){
        $servicio=item_sancion::find($this->id);
        $this->validate([
          'nombre_sancion' => 'required|string',
        ]);
        $servicio->nombre_sancion=$this->nombre_sancion;
        $servicio->save();
        $this->visualiza_actualizar=false;
        $this->nombre_sancion="";
      }
    public function render()
    {
        $item_sancion = item_sancion::where('servicio_id', $this->servicioId)
        ->select('item_sancions.*','sanciones.tipo_sancion')
        ->leftJoin('sanciones','item_sancions.sancion_id','sanciones.id')
        ->get();
        $servicio = Servicio::find($this->servicioId);
        $tipo_sancion = sanciones::all();
        //dd($item_sancion);
        return view('livewire.lista-sanciones', compact('item_sancion', 'servicio','tipo_sancion'));
    }
}
