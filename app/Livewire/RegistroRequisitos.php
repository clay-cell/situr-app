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
use Illuminate\Support\Facades\Storage;//para eliminar archivos
use Illuminate\Support\Facades\DB;

class RegistroRequisitos extends Component
{
  use WithFileUploads;

  public $institucionid;
  public $tramiteid;
  public $servicioid;
  public $tipotramiteid;
  public $documento_pdf;
  public $prerequisitoId;
  public $laruta="";
  public $elpdf="";
  public $idproveedor;
  public $presentadoId;


  public $visualizar=false;
  public $visualizarpdf=false;

  public function mostrar($id){
    $this->visualizar=true;
    $this->prerequisitoId=$id;
  }
  public function ocultar(){
    $this->visualizar=false;
    $this->prerequisitoId=0;
  }


  public function mount($institucion_id,$tramite_id,$servicio_id,$tipo_tramite_id){
    $this->institucionid=$institucion_id;
    $this->tramiteid=$tramite_id;
    $this->servicioid=$servicio_id;
    $this->tipotramiteid=$tipo_tramite_id;
  }

  public function mostrar_pdf($pre_requisito){
    $dato = Presentado::select('id','ruta')
    ->where('tramite_id', $this->tramiteid)
    ->where('pre_requisito_id', $pre_requisito)
    ->get();
    $this->elpdf=$dato[0]->ruta;
    $this->visualizarpdf=true;
    $this->presentadoId=$dato[0]->id;
  }
  public function ocultar_pdf(){
    $this->elpdf = "";
    $this->visualizarpdf=false;
  }
  public function subir(){
    $this->validate([
      'documento_pdf' => 'required|file|max:10024|mimes:pdf', // Validar que sea un archivo PDF y que no exceda los 2MB
    ]);

    //if ($this->hasFile('documento_pdf')) {
      $fileName = time() . '_' . $this->documento_pdf->getClientOriginalName();
      //$destino = public_path('pdf');
      //$this->documento_pdf->storeAs('subidosPDF', $fileName,'public');//public es la carpeta que contiene subidosPDF storage/public/subidosPDF
      $this->documento_pdf->storeAs('subidosPDF', $fileName);//public es la carpeta que contiene subidosPDF storage/public/subidosPDF
      //$destino = public_path('documentosPDF');
      $this->laruta = 'subidosPDF/'.$fileName;
      //$this->laruta=Storage::url($fileName);
      //$this->laruta = $ubicacion_archivo;

      Presentado::create([
        "gestion"=>Carbon::now()->year,
        "fecha_presentacion"=>Carbon::now(),
        "observacion"=>'presentado',
        "ruta"=>$this->laruta,
        "tramite_id"=>$this->tramiteid,
        "pre_requisito_id"=>$this->prerequisitoId
      ]);
      // Ruta a la carpeta que deseas vaciar
      //$carpeta = 'public/subidosPDF';

      // Elimina todos los archivos de la carpeta
      //Storage::deleteDirectory($carpeta);
    //}
    $this->laruta="";
    $this->documento_pdf="";
    $this->visualizar=false;
    $this->prerequisitoId=0;
  }
  public function eliminarPDF($id){
    $eliminarPDF = Presentado::select('id','ruta')
    ->where('tramite_id',$this->tramiteid)
    ->where('pre_requisito_id',$id)
    ->get();

    Storage::delete($eliminarPDF[0]->ruta);
    Presentado::destroy($eliminarPDF[0]->id);
  }
  public function validar(){
    $presentado = Presentado::find($this->presentadoId);
    $presentado->update(['observacion' => 'validado']);
    $this->visualizarpdf=false;
  }
  public function render(){
    $this->idproveedor=Tramite::select('user_id')->where('id',$this->tramiteid)->get();

    $tipo_tramite = TipoTramite::select('nombre_tramite')->where('id',$this->tipotramiteid)->get();

    $requisitos = Requisito::select('id','tramite','descripcion')
      ->where('servicio_id',$this->servicioid)
      ->where('tipo_tramite_id', $this->tipotramiteid)
      ->where('estado', 1)->get();

    $prerequisitos = PreRequisito::select('id','grupo','descripcion')
      ->where('requisito_id', $requisitos[0]->id)
      ->where('estado', 1)
      ->get();
    //$presentados=Presentado::select('id')
    $presentados=Presentado::select('pre_requisito_id')
    ->where('tramite_id',$this->tramiteid)
    ->get();

    // Extraemos los presentados
    $presentados_id = [];
    foreach ($presentados as $elemento) {
      $presentados_id[] = $elemento->pre_requisito_id;
    }
     // Extraemos los primeros elementos
     $primerosElementos = [];
     foreach ($prerequisitos as $primeros) {
      $primerosElementos[] = $primeros->grupo;
      //$primerosElementos[] = $primeros->id;
     }
     // Eliminamos duplicados
     $unicos = array_unique($primerosElementos);/**/
    return view('livewire.registro-requisitos',compact('tipo_tramite','prerequisitos','unicos','presentados_id'));
    //return view('livewire.registro-requisitos');
  }
}
