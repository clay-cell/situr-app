<?php

namespace App\Exports;

use App\Models\InstitucionCliente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EstadisticaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $institucion;
    public $paises;
    public $institucion_cliente;
    public $mes;
    public $anio;
    /*public function collection()
    {
        return InstitucionCliente::all();
    }*/
    public function __construct($institucion, $paises, $institucion_cliente, $mes, $anio)
    {
        $this->institucion = $institucion;
        $this->paises = $paises;
        $this->institucion_cliente = $institucion_cliente;
        $this->mes = $mes;
        $this->anio = $anio;
    }
    public function view(): View
    {
        return view('reportes.estadistica_excel', [
            'institucion' => $this->institucion,
            'paises' => $this->paises,
            'institucion_cliente' => $this->institucion_cliente,
            'mes' => $this->mes,
            'anio' => $this->anio,
        ]);
    }
}
