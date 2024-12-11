<?php

namespace App\Exports;

use App\Models\Tramite;
use Maatwebsite\Excel\Concerns\FromCollection;

class TramitesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }
    public function collection()
    {
        //return Tramite::all();
        $query = Tramite::select('tramites.id', 'tramites.observacion', 'tramites.created_at', 'tipo_tramites.nombre_tramite', 'institucions.nombre', 'servicios.tipo_servicio')
        ->leftJoin('tipo_tramites', 'tramites.tipotramite_id', 'tipo_tramites.id')
        ->leftJoin('institucions', 'tramites.institucion_id', 'institucions.id')
        ->leftJoin('servicios', 'tramites.servicio_id', 'servicios.id');

    // Aplicar filtros
    if (!empty($this->filters['start_date']) && !empty($this->filters['end_date'])) {
        $query->where('tramites.fecha_inicio', [$this->filters['start_date']]);
    }

    if (!empty($this->filters['observacion'])) {
        $query->where('tramites.observacion', $this->filters['observacion']);
    }

    return $query->get();
    }
    public function headings(): array
    {
        return ['ID', 'Observación', 'Fecha de Creación', 'Tipo de Trámite', 'Institución', 'Tipo de Servicio'];
    }
}
