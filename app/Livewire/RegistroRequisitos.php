<?php

namespace App\Livewire;

use App\Models\Plazo;
use Livewire\Component;
use App\Models\TipoTramite;
use App\Models\Tramite;
use App\Models\Requisito;
use App\Models\PreRequisito;
use App\Models\Presentado;
use App\Models\Seguimiento;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage; //para eliminar archivos
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
    public $laruta = "";
    public $elpdf = "";
    public $idproveedor;
    public $presentadoId;
    public $observacion = "";
    public $instancia = "";
    public $fecha_inicio;
    public $dias_plazo = 10;




    public $visualizar = false;
    public $visualizarpdf = false;
    public $visualizar_seguimiento = false;

    public function mostrar($id)
    {
        $this->visualizar = true;
        $this->prerequisitoId = $id;
    }
    public function ocultar()
    {
        $this->visualizar = false;
        $this->prerequisitoId = 0;
    }


    public function mount($institucion_id, $tramite_id, $servicio_id, $tipo_tramite_id)
    {
        $this->institucionid = $institucion_id;
        $this->tramiteid = $tramite_id;
        //$this->tramiteid=$tipo_tramite_id;
        $this->servicioid = $servicio_id;
        $this->tipotramiteid = $tipo_tramite_id;
        //$this->tipotramiteid=$tramite_id;
    }

    public function mostrar_pdf($pre_requisito)
    {
        $dato = Presentado::select('id', 'ruta')
            ->where('tramite_id', $this->tramiteid)
            ->where('item_prerequisito_id', $pre_requisito)
            ->get();
        $this->elpdf = $dato[0]->ruta;
        $this->visualizarpdf = true;
        $this->presentadoId = $dato[0]->id;
    }
    public function ocultar_pdf()
    {
        $this->elpdf = "";
        $this->visualizarpdf = false;
    }
    public function subir()
    {
        $this->validate([
            'documento_pdf' => 'required|file|max:10024|mimes:pdf', // Validar que sea un archivo PDF y que no exceda los 2MB
        ]);

        //if ($this->hasFile('documento_pdf')) {
        $fileName = time() . '_' . $this->documento_pdf->getClientOriginalName();
        //$destino = public_path('pdf');
        $this->documento_pdf->storeAs('subidosPDF', $fileName, 'public'); //public es la carpeta que contiene subidosPDF storage/public/subidosPDF
        //$this->documento_pdf->storeAs('subidosPDF', $fileName);//public es la carpeta que contiene subidosPDF storage/public/subidosPDF
        //$destino = public_path('documentosPDF');
        $this->laruta = '/storage/subidosPDF/' . $fileName;
        //$this->laruta=Storage::url($fileName);
        //$this->laruta = $ubicacion_archivo;

        Presentado::create([
            "gestion" => Carbon::now()->year,
            "fecha_presentacion" => Carbon::now(),
            "observacion" => 'presentado',
            "ruta" => $this->laruta,
            "tramite_id" => $this->tramiteid,
            "item_prerequisito_id" => $this->prerequisitoId
        ]);
        // Ruta a la carpeta que deseas vaciar
        //$carpeta = 'public/subidosPDF';

        // Elimina todos los archivos de la carpeta
        //Storage::deleteDirectory($carpeta);
        //}
        $this->laruta = "";
        $this->documento_pdf = "";
        $this->visualizar = false;
        $this->prerequisitoId = 0;
    }

    public function eliminarPDF($id)
    {
        $eliminarPDF = Presentado::select('id', 'ruta')
            ->where('tramite_id', $this->tramiteid)
            ->where('item_prerequisito_id', $id)
            ->get();

        Storage::delete($eliminarPDF[0]->ruta);
        Presentado::destroy($eliminarPDF[0]->id);
    }
    public function observar()
    {
        $presentado = Presentado::find($this->presentadoId);
        $presentado->update(['observacion' => 'observado']);
        $this->visualizarpdf = false;
    }
    public function validar()
    {
        $presentado = Presentado::find($this->presentadoId);
        $presentado->update(['observacion' => 'validado']);
        $this->visualizarpdf = false;
    }
    public function mostrar_seguimiento()
    {
        $this->visualizar_seguimiento = true;
    }
    public function ocultar_seguimiento()
    {
        $this->visualizar_seguimiento = false;
    }
    private function calculo_fecha_plazo($fecha_inicial, $dias)
    {
        $cont = 1;
        //$fecha = new DateTime($fecha_inicial);
        $fecha = Carbon::parse($fecha_inicial);
        while ($dias > 0) {
            $fecha->modify('+1 day');
            if ($fecha->format('N') <= 5) { // N devuelve el día de la semana (1-7, 1=Lunes)
                $dias--;
            }
        }
        return $fecha->format('Y-m-d');
    }
    public function crear_seguimiento()
    {

        DB::transaction(function () {

            $this->validate([
                'fecha_inicio' => 'required|date',
                'observacion' => 'required',
            ]);
            //dd($this->calculo_fecha_plazo($this->fecha_inicio, $this->dias_plazo));

            Seguimiento::create([
                "fecha_inicio" => $this->fecha_inicio,
                "observacion" => $this->observacion,
                "instancia" => 'Ventanilla Unica',
                //"fecha_plazo"=>$this->fecha_inicio,//esto se calcula
                "fecha_plazo" => $this->calculo_fecha_plazo($this->fecha_inicio, $this->dias_plazo), //esto se calcula
                "responsable_id" => Auth::user()->id,
                "tramite_id" => $this->tramiteid,
            ]);
            Plazo::create([
                "fecha_inicio" => $this->fecha_inicio,
                "dias" => $this->dias_plazo,
                //"fecha_fin"=>$instancia,//esto se calcula
                "fecha_fin" => $this->calculo_fecha_plazo($this->fecha_inicio, $this->dias_plazo), //esto se calcula
                "responsable_id" => Auth::user()->id,
                "tramite_id" => $this->tramiteid,
            ]);
            $tramite = Tramite::find($this->tramiteid);
            $tramite->fin_fecha_plazo = $this->calculo_fecha_plazo($this->fecha_inicio, $this->dias_plazo); //esto se calcula
            $tramite->save();

            $this->observacion = "";
            $this->instancia = "";
            $this->visualizar_seguimiento = false;
        });
    }
    public function aprobar()
    {
        Seguimiento::create([
            "fecha_inicio" => Carbon::now(),
            "observacion" => "aprobado",
            "instancia" => "tramite en proceso",
            "tramite_id" => $this->tramiteid,
        ]);

        $tramite = Tramite::find($this->tramiteid);
        if (!$tramite) {
            return view('error404');
        }

        $tramite->observacion = "proceso";
        $tramite->save();

        $this->dispatch('alert', 'El trámite fue aprobado correctamente.'); // Emitir evento para mostrar una alerta de éxito.
        return redirect()->route('show_new.show');
    }
    public function render()
    {
        $this->idproveedor = Tramite::select('user_id')->where('id', $this->tramiteid)->get();

        $tipo_tramite = TipoTramite::select('nombre_tramite')->where('id', $this->tipotramiteid)->get();

        $requisitos = Requisito::select('id', 'descripcion')
            ->where('servicio_id', $this->servicioid)
            ->where('tipo_tramite_id', $this->tipotramiteid)
            ->where('estado', 1)
            ->get();

        $prerequisitos = PreRequisito::select('id', 'descripcion')
            ->where('requisito_id', $requisitos[0]->id)
            ->where('estado', 1)
            ->get();

        $itemprerequisitos = DB::table('requisitos')
            ->select('item_prerequisitos.id', 'item_prerequisitos.descripcion', 'item_prerequisitos.pre_requisito_id')
            ->join('pre_requisitos', 'requisitos.id', '=', 'pre_requisitos.requisito_id')
            ->join('item_prerequisitos', 'pre_requisitos.id', '=', 'item_prerequisitos.pre_requisito_id')
            ->where('requisitos.id', $requisitos[0]->id)
            ->where('item_prerequisitos.estado', 1)
            ->get();
        //$presentados=Presentado::select('id')
        $presentados = Presentado::select('item_prerequisito_id', 'observacion')
            //$presentados=Presentado::select('item_prerequisito_id')
            ->where('tramite_id', $this->tramiteid)
            ->get();

        $validados = Presentado::where('observacion', 'validado')
            ->where('tramite_id', $this->tramiteid)
            ->count();


        // Extraemos los presentados
        $presentados_id = [];
        $entregados = [];
        foreach ($presentados as $elemento) {
            $presentados_id[] = $elemento->item_prerequisito_id;
            $entregados[$elemento->item_prerequisito_id] = $elemento->observacion; //array asociativo
        }
        return view('livewire.registro-requisitos', compact('tipo_tramite', 'prerequisitos', 'itemprerequisitos', 'presentados_id', 'entregados', 'validados'));
    }
}
