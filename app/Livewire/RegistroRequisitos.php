<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TipoTramite;
use App\Models\Tramite;
use App\Models\Requisito;
use App\Models\PreRequisito;
use App\Models\Presentado;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class RegistroRequisitos extends Component
{
  use WithFileUploads;

  public $institucionid;
  public $tramiteid;
  public $servicioid;
  public $documento_pdf;
  public $prerequisitoId;
  public $laruta="";


  public $visualizar=false;

  public function mostrar($id){
    $this->visualizar=true;
    $this->prerequisitoId=$id;
  }
  public function ocultar(){
    $this->visualizar=false;
    $this->prerequisitoId=0;
  }


  public function mount($institucion_id,$tramite_id,$servicio_id){
    $this->institucionid=$institucion_id;
    $this->tramiteid=$tramite_id;
    $this->servicioid=$servicio_id;
  } 
  public function subir(){
    $this->validate([
      'documento_pdf' => 'required|file|max:10024|mimes:pdf', // Validar que sea un archivo PDF y que no exceda los 2MB
    ]);
    
    //if ($this->hasFile('documento_pdf')) {
      $fileName = time() . '_' . $this->documento_pdf->getClientOriginalName();
      //$destino = public_path('pdf');
      $this->documento_pdf->storeAs('myspdf', $fileName);
      //$this->documento_pdf->move('C:\xampp\htdocs\siretur-app\storage\app\private\mispdfs', $fileName);
      $this->laruta = 'pdf/'.$fileName;

      Presentado::create([
        "gestion"=>Carbon::now()->year,
        "fecha_presentacion"=>Carbon::now(),
        "observacion"=>'presentado',
        "ruta"=>$this->laruta,
        "tramite_id"=>$this->tramiteid,
        "pre_requisito_id"=>$this->prerequisitoId
      ]);
    //} 
    $this->laruta="";
    $this->visualizar=false;
    $this->prerequisitoId=0;
  }
  public function render(){

    $tipo_tramite = TipoTramite::select('nombre_tramite')->where('id',$this->tramiteid)->get();
    $requisitos = Requisito::select('id','tramite','descripcion')
      ->where('servicio_id',$this->servicioid)
      ->where('tipo_tramite_id', $this->tramiteid)
      ->where('estado', 1)->get();
    $prerequisitos = PreRequisito::select('id','grupo','descripcion')
      ->where('requisito_id', $requisitos[0]->id)
      ->where('estado', 1)
      ->get();
     // Extraemos los primeros elementos
     $primerosElementos = [];
     foreach ($prerequisitos as $primeros) {
      $primerosElementos[] = $primeros->grupo;
     }
     // Eliminamos duplicados
     $unicos = array_unique($primerosElementos);/**/
    return view('livewire.registro-requisitos',compact('prerequisitos','unicos','tipo_tramite','prerequisitos','unicos'));
    //return view('livewire.registro-requisitos');
  }
}
