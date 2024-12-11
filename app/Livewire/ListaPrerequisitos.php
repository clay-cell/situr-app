<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Requisito;
use App\Models\PreRequisito;
use App\Models\ItemPrerequisito;
use Illuminate\Support\Facades\DB;

class ListaPrerequisitos extends Component
{
  public $visualizar=false;
  public $visualiza_actualizar=false;
  public $visualiza_item=false;
  public $requisitoid;
  public $pre_requisitoid;
  public $item_prequisito_id;
  public $descripcion="";
  public $grupo="";

  public function mostrar(){
    $this->visualizar=true;
  }
  public function ocultar(){
    $this->visualizar=false;
  }
  public function mostrar_prerequisito($id){
    $prerequisito=ItemPrerequisito::find($id);
    $this->item_prequisito_id=$id;
    $this->descripcion=$prerequisito->descripcion;
    $this->visualiza_actualizar=true;
  }
  public function ocultar_prerequisito(){
    $this->visualiza_actualizar=false;
  }

  public function registrar(){
    $this->validate([
      'descripcion' => 'required|string|min:5|max:200',
    ]);
    PreRequisito::create([
      "descripcion"=>mb_strtoupper($this->descripcion, 'UTF-8'),
      "requisito_id"=>$this->requisitoid,
    ]);
    $this->descripcion="";
    $this->visualizar=false;
  }
  public function cambiar_estado($id,$estado){
    DB::table('item_prerequisitos')
      ->where('id', $id)
      ->update(['estado' => $estado]);
  }

  public function mostrar_nuevo_item($id){
    $this->pre_requisitoid=$id;
    $this->visualiza_item=true;
  }
  public function ocultar_nuevo_item(){
    $this->visualiza_item=false;
  }
//registrando nuevo item
  public function nuevo_itemprerequisito(){
    $this->validate([
      'descripcion' => 'required|string|min:5|max:500',
    ]);
    ItemPrerequisito::create([
      "descripcion"=>$this->descripcion,
      "pre_requisito_id"=>$this->pre_requisitoid,
    ]);
    $this->descripcion="";
    $this->visualiza_item=false;
  }
//actualizando item
  public function actualizar_itemprerequisito(){
    $prerequisito=ItemPrerequisito::find($this->item_prequisito_id);
    $this->validate([
      'descripcion' => 'required|string|min:5|max:200',
    ]);
    $prerequisito->descripcion=$this->descripcion;
    $prerequisito->save();
    $this->descripcion="";
    $this->visualiza_actualizar=false;
  }

  public function mount($requisito_id){
    $this->requisitoid=$requisito_id;
  }

  public function render()
  {

    $requisitos = Requisito::select('id', 'descripcion')
    ->where('id', $this->requisitoid)
    ->where('estado', 1)
    ->get();
    $prerequisitos = PreRequisito::select('id', 'descripcion')
        ->where('requisito_id',$this->requisitoid)
        ->where('estado', 1)
        ->get();
    // Extraemos los primeros elementos
    $itemprerequisitos=DB::table('requisitos')
    ->select('item_prerequisitos.id','item_prerequisitos.descripcion','item_prerequisitos.pre_requisito_id','item_prerequisitos.estado')
    ->join('pre_requisitos','requisitos.id','=','pre_requisitos.requisito_id')
    ->join('item_prerequisitos','pre_requisitos.id','=','item_prerequisitos.pre_requisito_id')
    ->where('requisitos.id',$this->requisitoid)
    //->where('item_prerequisitos.estado',1)
    ->get();

    return view('livewire.lista-prerequisitos',compact('requisitos','prerequisitos','itemprerequisitos'));
  }
}
