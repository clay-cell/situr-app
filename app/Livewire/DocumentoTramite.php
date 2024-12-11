<?php

namespace App\Livewire;

use App\Models\DocumentoTramite as ModelsDocumentoTramite;
use App\Models\Seguimiento;
use App\Models\TipoTramite;
use App\Models\Tramite;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class DocumentoTramite extends Component
{
    use WithFileUploads;

    public $tramite_id;
    public $visualizar_modal = false;
    public $documento_actual;
    public $archivo_pdf;
    public $pdfUrl; // URL del PDF existente
    public $mostrarPdf = false; // Controla si se debe mostrar el PDF
    public $tipoDocumento; // Tipo de documento en el modal
    // Archivo de configuración o en el componente
    protected $documentosRequeridos = [
        'OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL' => [
            'Informe Técnico',
            'Certificado de Validación de Categoría',
            'Informe Legal',
            'Resolución Administrativa para Otorgación Turística',
            'Licencia Turística Departamental',
        ],
        'RENOVACIÓN DE LA LICENCIA TURÍSTICA DEPARTAMENTAL' => [
            'Informe Técnico',
            'Certificado de Validación de Categoría',
            'Informe Legal',
            'Resolución Administrativa para Otorgación Turística',
            'Licencia Turística Departamental',
        ],
        'OTRO TRÁMITE' => [
            'Solicitud de Baja (Carta Formal)',
            'Informe Técnico',
            'Informe Legal',
            'Resolución Administrativa',
        ],
    ];

    public $documentosCompletos = false;
    public function mostrarModal($nombreDocumento)
    {
        // Resetear las variables del modal
        $this->reset(['mostrarPdf', 'pdfUrl', 'documento_actual', 'archivo_pdf']);

        // Asignar el documento actual seleccionado
        $this->documento_actual = $nombreDocumento;

        // Verificar si el documento ya existe en la base de datos
        $documento = \App\Models\DocumentoTramite::where('tramite_id', $this->tramite_id)
            ->where('documento', $nombreDocumento)
            ->first();

        if ($documento) {
            // Si el documento existe, configurar la visualización del PDF
            $this->pdfUrl = $documento->ruta; // Asegúrate de que 'ruta' sea el campo con la URL del PDF
            $this->mostrarPdf = true;
        } else {
            // Si no existe, mostrar el formulario para subir uno nuevo
            $this->mostrarPdf = false;
        }

        // Mostrar el modal
        $this->visualizar_modal = true;
    }


    public function cerrarModal()
    {
        $this->reset(['archivo_pdf', 'visualizar_modal', 'mostrarPdf', 'pdfUrl', 'tipoDocumento']);
    }
    public function guardarDocumento()
    {
        $this->validate([
            'archivo_pdf' => 'required|mimes:pdf|max:2048',
        ]);

        // Guardar el archivo PDF
        $fecha = now()->format('Ymd_His');
        $nombreArchivo = "{$this->documento_actual}_{$this->tramite_id}_{$fecha}.pdf";
        $ruta = $this->archivo_pdf->storeAs('tramites_pdf', $nombreArchivo, 'public');

        // Crear el registro en la base de datos
        ModelsDocumentoTramite::create([
            'documento' => $this->documento_actual,
            'ruta' => $ruta,
            'vigencia' => true,
            'fecha_asignacion' => now(),
            'tramite_id' => $this->tramite_id,
        ]);
        Seguimiento::create([
            "fecha_inicio" => Carbon::now(),
            "observacion" => "Procesamiento del documento " . $this->documento_actual,
            "instancia" => 'Encargado Tecnico',
            "responsable_id" => Auth::user()->id,
            "tramite_id" => $this->tramite_id,
        ]);
        // Mensaje de éxito
        session()->flash('success', "{$this->documento_actual} se ha guardado correctamente.");

        // Actualizar estado y cerrar modal
        $this->actualizarEstadoDocumentos();
        $this->cerrarModal();
    }

    public function verificarDocumento($tramite_id, $tipoDocumento)
    {
        // Limpiar estado previo
        $this->reset(['mostrarPdf', 'pdfUrl', 'documento_actual']);

        // Buscar el documento en la base de datos
        $documento = \App\Models\DocumentoTramite::where('tramite_id', $tramite_id)
            ->where('documento', $tipoDocumento)
            ->first();

        if ($documento) {
            // Si existe el documento, asignar URL y mostrar PDF
            $this->pdfUrl = $documento->ruta;
            $this->mostrarPdf = true;
        } else {
            // Si no existe, mostrar formulario para subir documento
            $this->documento_actual = $tipoDocumento;
            $this->mostrarPdf = false;
        }

        $this->visualizar_modal = true;
    }
    public function verificarDocumentosCompletos()
    {
        // Obtener el nombre del trámite asociado al ID
        $tipoTramite = Tramite::find($this->tramite_id);
        //dd($tipoTramite);
        $nombreTramite = TipoTramite::where('id', $tipoTramite->tipotramite_id)->first();
        $tramite = $nombreTramite->nombre_tramite;
        //dd($nombreTramite);
        // Si no se encuentra el trámite o el tipo, retorna incompleto
        if (!$tramite || !isset($this->documentosRequeridos[$tramite])) {
            return false;
        }
        //dd($this->documentosRequeridos[$tipoTramite]);
        // Lista de documentos requeridos
        $requeridos = collect(value: $this->documentosRequeridos[$tramite]);
        //dd($requeridos);
        // Verificar cuáles documentos faltan
        $documentosFaltantes = $requeridos->filter(function ($documento) {
            return !ModelsDocumentoTramite::where('tramite_id', $this->tramite_id)
                ->where('documento', $documento)
                ->exists();
        });


        // Si hay documentos faltantes, retorna false
        return $documentosFaltantes->isEmpty();
    }

    public function confirmarProcesarTramite()
    {
        $this->dispatch('confirmar-procesar-tramite');
    }

    // Método para finalizar el trámite
    public function culminarTramite()
    {
        $tramite = Tramite::find($this->tramite_id);

        if ($tramite) {
            $tramite->observacion = "culminado";
            $tramite->fecha_culminacion =Carbon::now();
            $tramite->save();

            // Emitir mensaje de éxito y redirigir
            $this->dispatch('tramite-procesado-exitosamente');
            return redirect()->route('show_finished.show');
        }
    }

    public function mount($tramite_id)
    {
        $this->tramite_id = $tramite_id;
        $this->actualizarEstadoDocumentos();
    }
    public function actualizarEstadoDocumentos()
    {
        $this->documentosCompletos = $this->verificarDocumentosCompletos();
    }
    public function render()
    {
        $tramites = Tramite::find($this->tramite_id);
        $tipo_tramite = TipoTramite::where('id', $tramites->tipotramite_id)->first();
        //dd($tramites);
        //dd($tipo_tramite);
        return view('livewire.documento-tramite', compact('tramites', 'tipo_tramite'));
    }
}
