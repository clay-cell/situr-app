<?php

namespace App\Http\Controllers;

use App\Exports\TramitesExport;
use App\Models\Cliente;
use App\Models\Institucion;
use App\Models\Requisito;
use App\Models\PreRequisito;
use App\Models\Presentado;
use App\Models\Servicio;
use App\Models\TipoTramite;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use App\Exports\ClientesExport;
use App\Exports\InstitucionesExport;
use App\Models\Categoria;
use App\Models\InstitucionCliente;
use App\Models\item_sancion;
use App\Models\Pais;
use App\Models\sancion_institucion;
use App\Models\Tasa;
use App\Models\TipoServicio;
use App\Models\Tramite;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EstadisticaExport;

class ReportesController extends Controller
{
    public function requisitos_tramite($servicio_id, $tipo_tramite)
    {
        $servicio = Servicio::select('tipo_servicio')
            ->where('id', $servicio_id)
            //->where('estado', 1)
            ->get();
        //return $servicio;
        $tramite = TipoTramite::select('nombre_tramite')
            ->where('id', $tipo_tramite)
            //->where('estado', 1)
            ->get();
        //return $tramite;
        $requisitos = Requisito::select('id', 'descripcion')
            ->where('servicio_id', $servicio_id)
            ->where('tipo_tramite_id', $tipo_tramite)
            ->where('estado', 1)
            ->get();
        //return $requisitos;
        $prerequisitos = PreRequisito::select('id', 'descripcion')
            ->where('requisito_id', $requisitos[0]->id)
            ->where('estado', 1)
            ->get();
        //return $prerequisitos;
        /*$itemprerequisitos = ItemPreRequisito::select('id', 'descripcion')
            ->where('requisito_id', $requisitos[0]->id)
            ->where('estado', 1)
            ->get();*/
        // Extraemos los primeros elementos
        $itemprerequisitos = DB::table('requisitos')
            ->select('item_prerequisitos.descripcion', 'item_prerequisitos.pre_requisito_id')
            ->join('pre_requisitos', 'requisitos.id', '=', 'pre_requisitos.requisito_id')
            ->join('item_prerequisitos', 'pre_requisitos.id', '=', 'item_prerequisitos.pre_requisito_id')
            ->where('requisitos.id', $requisitos[0]->id)
            ->where('item_prerequisitos.estado', 1)
            ->get();
        //return $itemprerequisitos;

        /*$primerosElementos = [];
        foreach ($prerequisitos as $primeros) {
            $primerosElementos[] = $primeros->grupo;
        }*/
        // Eliminamos duplicados
        //$unicos = array_unique($primerosElementos);
        $fechahora = Carbon::now()->format('d/m/Y H:i:s');
        //return view('reportes.requisitosPDF',compact('servicio','tramite','requisitos','prerequisitos','unicos','fechahora'));
        //$requisitospdf = PDF::loadview('reportes.requisitosPDF', compact('servicio', 'tramite', 'requisitos', 'prerequisitos', 'unicos', 'fechahora'));
        $requisitospdf = PDF::loadview('reportes.requisitosPDF', compact('servicio', 'tramite', 'requisitos', 'prerequisitos', 'itemprerequisitos', 'fechahora'));
        $requisitospdf->setpaper("letter", "portrait"); //tamaño de papel y direccion vertical; landscape es horizontal
        return $requisitospdf->stream('requisitos.pdf'); //este comando, muestra el pdf en una ventana
    }
    public function seguimiento_tramite($servicio_id, $tipo_tramite, $tramite_id)
    {
        // return $tramite_id;
        $presentados = Presentado::select('observacion', 'pre_requisito_id')->where('tramite_id', $tramite_id)->get();
        //return $presentados;
        $servicio = Servicio::select('tipo_servicio')
            ->where('id', $servicio_id)
            //->where('estado', 1)
            ->get();
        //return $servicio;
        $tramite = TipoTramite::select('nombre_tramite')
            ->where('id', $tipo_tramite)
            //->where('estado', 1)
            ->get();
        //return $tramite;
        $requisitos = Requisito::select('id', 'tramite', 'descripcion')
            ->where('servicio_id', $servicio_id)
            ->where('tipo_tramite_id', $tipo_tramite)
            ->where('estado', 1)->get();
        //return $requisitos;
        $prerequisitos = PreRequisito::select('grupo', 'descripcion')
            ->where('requisito_id', $requisitos[0]->id)
            ->where('estado', 1)
            ->get();
        // Extraemos los primeros elementos
        $primerosElementos = [];
        foreach ($prerequisitos as $primeros) {
            $primerosElementos[] = $primeros->grupo;
        }
        // Eliminamos duplicados
        $unicos = array_unique($primerosElementos);
        $fechahora = Carbon::now()->format('d/m/Y H:i:s');
        //return view('reportes.requisitosPDF',compact('servicio','tramite','requisitos','prerequisitos','unicos','fechahora'));
        $requisitospdf = PDF::loadview('reportes.seguimientoPDF', compact('servicio', 'tramite', 'requisitos', 'prerequisitos', 'unicos', 'fechahora', 'presentados'));
        $requisitospdf->setpaper("letter", "portrait"); //tamaño de papel y direccion vertical; landscape es horizontal
        return $requisitospdf->stream('requisitos.pdf'); //este comando, muestra el pdf en una ventana
    }
    /*****************formulario solciitud******* */
    public function formulario_solicitud($institucion_id)
    {
        $institucion = Institucion::find($institucion_id);
        //return $institucion;
        $user = User::find($institucion->user_id);
        //return $user;
        $fechahora = Carbon::now()->format('d/m/Y H:i:s');
        //return view('reportes.requisitosPDF',compact('servicio','tramite','requisitos','prerequisitos','unicos','fechahora'));
        $requisitospdf = PDF::loadview('reportes.formulario_solicitud', compact('institucion', 'user', 'fechahora'));
        $requisitospdf->setpaper("letter", "portrait"); //tamaño de papel y direccion vertical; landscape es horizontal
        return $requisitospdf->stream('requisitos.pdf'); //este comando, muestra el pdf en una ventana
    }
    public function orden_trabajo($institucion_id)
    {
        $institucion = Institucion::find($institucion_id);
        /*$tasas = Tasa::select('*')
        ->leftJoin('')*/
        /*$tipo_institucion = TipoServicio::where('servicio_Id',$institucion->servicio_id)->first();
        $categorias = Categoria::where('tipo_servicio_id',$tipo_institucion->id)->first();*/
        $tasas = Tasa::where('tipo_servicio_id', $institucion->tipo_servicio_id)
            ->where('categoria_id', $institucion->categoria_id)
            ->get();
        //return $tasas;
        //return $categorias;
        //return $tipo_institucion;
        //return $institucion;
        $user = User::find($institucion->user_id);
        //return $user;
        $fechahora = Carbon::now();
        $masfecha = $fechahora->addDays(10)->format('Y-d-m');
        //return view('reportes.requisitosPDF',compact('servicio','tramite','requisitos','prerequisitos','unicos','fechahora'));
        $requisitospdf = PDF::loadview('reportes.orden_trabajo', compact('institucion', 'user', 'fechahora', 'tasas', 'masfecha'));
        $requisitospdf->setpaper("letter", "portrait"); //tamaño de papel y direccion vertical; landscape es horizontal
        return $requisitospdf->stream('requisitos.pdf'); //este comando, muestra el pdf en una ventana
    }
    /*******************REPORTE DE LOS EXTERNOS PARA VER  LOS CLIENTES PDF************************ */
    public function exportPDF(Request $request, $format)
    {
        // Filtrar clientes según fecha si están definidos
        $clientes = Cliente::select('clientes.*', 'institucion_clientes.fecha_ingreso', 'institucion_clientes.fecha_salida', 'institucion_clientes.hora_entrada', 'institucion_clientes.hora_salida', 'institucions.nombre')
            ->leftJoin('institucion_clientes', 'clientes.id', 'institucion_clientes.cliente_id')
            ->leftJoin('institucions', 'institucion_clientes.institucion_id', 'institucions.id');

        if ($request->has('startDate') && $request->has('endDate')) {
            $clientes->whereBetween('institucion_clientes.fecha_ingreso', [$request->startDate, $request->endDate]);
        }

        $clientes = $clientes->get();
        $clientesPorPagina = 20; // Número de clientes por página
        $fechahora = Carbon::now()->format('d/m/Y H:i:s');

        // Generar el archivo según el formato
        if ($format === 'pdf') {
            $clientespdf = PDF::loadview('reportes.clientes_busqueda', compact('clientes', 'fechahora', 'clientesPorPagina'));
            $clientespdf->setPaper("letter", "portrait");
            // Obtener el canvas del PDF para agregar el pie de página
            return $clientespdf->stream('clientes_reporte.pdf');
        } elseif ($format === 'excel') {
            // Aquí debes agregar la lógica para exportar a Excel
            // Necesitarás usar Laravel Excel u otra librería para generar el archivo Excel
            return Excel::download(new ClientesExport($clientes), 'clientes_reporte.xlsx');
        }
    }
    /******************************REPORTE LISTA DE INSTITUCIONES******************************/
    public function lista_instituciones(Request $request)
    {
        //$instituciones = Institucion::select('institucions.*', 'servicios.tipo_servicio', )
        //  ->leftJoin('servicios', 'institucions.servicio_id', 'servicios.id')->get();
        $reportType = $request->input('reportType');
        $selectedService = $request->input('selectedService');

        if ($reportType === 'all') {
            $data = Institucion::select('institucions.*', 'servicios.tipo_servicio')
                ->leftJoin('servicios', 'institucions.servicio_id', '=', 'servicios.id')
                ->get();
        } elseif ($reportType === 'service') {
            $data = DB::table('institucions')
                ->leftJoin('servicios', 'institucions.servicio_id', '=', 'servicios.id')
                ->select('institucions.*', 'servicios.tipo_servicio')
                ->when($selectedService, function ($query, $selectedService) {
                    return $query->where('servicios.id', $selectedService);
                })
                ->get();

            //return $data;
        } else {
            return response()->json(['message' => 'Tipo de reporte no válido'], 400);
        }

        if ($request->input('format') === 'pdf') {
            $pdf = PDF::loadView('reportes.instituciones', ['data' => $data]);
            //return $data;
            //return $selectedService;
            return $pdf->stream('reporte.pdf');
        }

        if ($request->input('format') === 'excel') {
            return Excel::download(new InstitucionesExport($data), 'reporte.xlsx');
        }

        return response()->json(['message' => 'Formato no válido'], 400);
    }
    public function formulario_sancion($id_institucion, $id_item_sancion)
    {
        $institucion = Institucion::find($id_institucion);
        $item_sancion = item_sancion::find($id_item_sancion);
        if (!$institucion || !$id_item_sancion) {
            return view('error404');
        }
        $user = User::find($institucion->user_id);
        $sanciones = sancion_institucion::where('institucion_id', $institucion->id)
            ->where('item_sancion_id', $item_sancion->id)
            ->leftJoin('item_sancions', 'sancion_institucions.item_sancion_id', 'item_sancions.id')
            ->leftJoin('sanciones', 'item_sancions.sancion_id', 'sanciones.id')
            ->select('sancion_institucions.*', 'item_sancions.nombre_sancion', 'sanciones.tipo_sancion')
            ->get();
        $fechahora = Carbon::now();
        $masfecha = $fechahora->addDays(10)->format('Y-d-m');
        $sanciones_pdf = PDF::loadview('reportes.formulario_sancion', compact('sanciones', 'institucion', 'user', 'fechahora', 'item_sancion', 'masfecha'));
        $sanciones_pdf->setpaper("letter", "portrait"); //tamaño de papel y direccion vertical; landscape es horizontal
        return $sanciones_pdf->stream('formulario_sanciones.pdf'); //este comando, muestra el pdf en una ventana
        //return $sanciones;
    }
    public function elegir()
    {
        $tramite = Tramite::all();
        return view('reportes.elegir_reporte', compact('tramite'));
    }
    public function tramites(Request $request)
    {
        /*$tramites = tramite::select('tramites.*', 'servicios.tipo_servicio', 'institucions.nombre', 'tipo_tramites.nombre_tramite')
            ->leftJoin('tipo_tramites', 'tramites.tipotramite_id', 'tipo_tramites.id')
            ->leftJoin('institucions', 'tramites.institucion_id', 'institucions.id')
            ->leftJoin('servicios', 'tramites.servicio_id', 'servicios.id')
            ->paginate(10);
        //return $tramites;
        $fechahora = Carbon::now();
        $masfecha = $fechahora->addDays(10)->format('Y-d-m');
        $tramite_pdf = PDF::loadview('reportes.tramites', compact('tramites', 'fechahora', 'masfecha'));
        $tramite_pdf->setpaper("letter", "portrait"); //tamaño de papel y direccion vertical; landscape es horizontal
        return $tramite_pdf->stream('formulario_sanciones.pdf'); //este comando, muestra el pdf en una ventana*/
        $request->validate([
            'start_date' => 'nullable|date',
            //'end_date' => 'nullable|date|after_or_equal:start_date',
            'observacion' => 'nullable|string|in:ingresado,en proceso,culminado',
        ]);

        $query = tramite::select('tramites.*', 'servicios.tipo_servicio', 'institucions.nombre', 'tipo_tramites.nombre_tramite')
            ->leftJoin('tipo_tramites', 'tramites.tipotramite_id', 'tipo_tramites.id')
            ->leftJoin('institucions', 'tramites.institucion_id', 'institucions.id')
            ->leftJoin('servicios', 'tramites.servicio_id', 'servicios.id');

        // Aplicar filtros
        if ($request->filled('start_date')) {
            $query->where('tramites.fecha_inicio', [$request->start_date]);
        }

        if ($request->filled('observacion')) {
            $query->where('tramites.observacion', $request->observacion);
        }

        $tramites = $query->paginate(10);

        $fechahora = Carbon::now();
        $masfecha = $fechahora->addDays(10)->format('Y-d-m');
        /*$tramite_pdf = PDF::loadview('reportes.tramites', compact('tramites', 'fechahora', 'masfecha'));
        $tramite_pdf->setPaper("letter", "portrait");*/
        // Generar el reporte en el formato solicitado
        if ($request->format === 'pdf') {
            $pdf = PDF::loadView('reportes.tramites', compact('tramites'));
            return $pdf->stream('reporte_tramites.pdf');
        } elseif ($request->format === 'excel') {
            return Excel::download(new TramitesExport($tramites), 'reporte_tramites.xlsx');
        }

        return $tramite_pdf->stream('formulario_sanciones.pdf');
    }
    public function estadistica_servicios(Request $request, $id)
    {
        $institucion = Institucion::find($id);
        if (!$institucion) {
            return view('error404');
        }

        $mes = $request->get('mes');
        $anio = $request->get('anio');
        $paises = Pais::all();

        // Obtener clientes de la institución según los parámetros
        $institucion_cliente = InstitucionCliente::select('institucion_clientes.*', 'clientes.pais_id as cliente_p_id', 'clientes.nacionalidad as cliente_nacionalidad')
            ->where('institucion_id', $institucion->id)
            ->whereYear('fecha_salida', $anio)
            ->whereMonth('fecha_salida', $mes)
            ->leftJoin('clientes', 'institucion_clientes.cliente_id', 'clientes.id')
            ->get();
        //return $institucion_cliente;
        $fechahora = Carbon::now();
        $masfecha = $fechahora->addDays(10)->format('Y-m-d');

        // Generar el PDF con los datos requeridos
        $institucion_cliente_pdf = PDF::loadView('reportes.estadistica', compact('institucion', 'paises', 'fechahora', 'institucion_cliente', 'masfecha', 'mes', 'anio'));
        $institucion_cliente_pdf->setPaper("letter", "landscape");
        return $institucion_cliente_pdf->stream('estadistica.pdf');
    }

    public function estadistica_servicios_excel(Request $request, $id)
    {
        $institucion = Institucion::find($id);
        if (!$institucion) {
            return view('error404');
        }

        $mes = $request->get('mes');
        $anio = $request->get('anio');
        $paises = Pais::all();

        $institucion_cliente = InstitucionCliente::select('institucion_clientes.*', 'clientes.pais_id as cliente_p_id', 'clientes.nacionalidad as cliente_nacionalidad')
            ->where('institucion_id', $institucion->id)
            ->whereYear('fecha_salida', $anio)
            ->whereMonth('fecha_salida', $mes)
            ->leftJoin('clientes', 'institucion_clientes.cliente_id', 'clientes.id')
            ->get();

        return Excel::download(new EstadisticaExport($institucion, $paises, $institucion_cliente, $mes, $anio), 'estadistica.xlsx');
    }
}
