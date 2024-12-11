<?php

namespace App\Livewire;

use App\Models\DocumentoSancion;
use App\Models\Institucion;
use App\Models\sancion_institucion;
use Livewire\Component;
use Livewire\WithFileUploads;

class SancionInstitucion extends Component
{
    use WithFileUploads;

    public $institucion_id;
    public $visualizar = false;
    public $mostrarPdf = false;

    public $sancionId; // ID de la sanción seleccionada
    public $pdf;       // Archivo PDF cargado
    public $tipoDocumento; // Tipo de documento (ej. 'Formulario', 'Acta de Actuación', etc.)
    public $pdfUrl = "";   // URL del PDF a visualizar

    public $ver_resolucion = false;


    public function mount($institucionId)
    {
        $this->institucion_id = $institucionId;
    }

    public function verificarDocumento($sancionId, $tipoDocumento)
    {
        // Limpiar estado previo
        $this->reset(['pdfUrl', 'mostrarPdf', 'visualizar', 'tipoDocumento', 'pdf']);

        // Buscar el documento correspondiente
        $documento = DocumentoSancion::where('sancion_institucion_id', $sancionId)
            ->where('nombre', $tipoDocumento)
            ->first();

        if ($documento) {
            // Si el documento existe, muestra el PDF
            $this->pdfUrl =  $documento->ruta; // Genera la URL al archivo
            $this->tipoDocumento;
            $this->mostrarPdf = true;
        } else {
            // Si no existe, muestra el modal para subirlo
            $this->tipoDocumento = $tipoDocumento;
            $this->sancionId = $sancionId;
            $this->visualizar = true;
        }
    }

    public function guardar()
    {
        $this->validate([
            'pdf' => 'required|mimes:pdf|max:2048',
        ]);

        $fecha = now()->format('Ymd_His');
        $nombreArchivo = "{$this->tipoDocumento}_{$this->sancionId}_{$fecha}." . $this->pdf->getClientOriginalExtension();

        $ruta = $this->pdf->storeAs('/storage/sanciones_pdf', $nombreArchivo, 'public');

        DocumentoSancion::create([
            'nombre' => $this->tipoDocumento,
            'ruta' => $ruta,
            'fecha_asignacion' => now(),
            'sancion_institucion_id' => $this->sancionId,
        ]);

        // Reseteo de estado y cierre de modal
        $this->reset(['pdf', 'visualizar']);
        session()->flash('success', "{$this->tipoDocumento} se ha guardado correctamente.");
    }

    public function cerrarModalPdf()
    {
        $this->reset(['pdfUrl', 'mostrarPdf']);
    }

    public function mostrar_resolucion()
    {
        $this->ver_resolucion = true;
        $this->dispatch('abrirModalResolucion');
    }

    public function ocultar_resolucion()
    {
        $this->ver_resolucion = false;
        $this->dispatch('cerrarModalResolucion');
    }


    public function render()
    {
        $institucion = Institucion::find($this->institucion_id);
        $sanciones = sancion_institucion::where('institucion_id', $this->institucion_id)
            ->select('sancion_institucions.*', 'item_sancions.nombre_sancion')
            ->leftJoin('item_sancions', 'sancion_institucions.item_sancion_id', 'item_sancions.id')
            ->get();

        return view('livewire.sancion-institucion', compact('institucion', 'sanciones'));
    }
}
