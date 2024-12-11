<?php

namespace App\Exports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class ClientesExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithEvents
{
    protected $clientes;

    public function __construct(Collection $clientes)
    {
        $this->clientes = $clientes;
    }

    public function collection()
    {
        return $this->clientes->map(function ($cliente) {
            return [
                $cliente->nombre,
                $cliente->apellido,
                $cliente->fecha_ingreso ? Carbon::parse($cliente->fecha_ingreso)->format('d/m/Y') : 'Sin registro',
                $cliente->fecha_salida ? Carbon::parse($cliente->fecha_salida)->format('d/m/Y') : 'Aún en el establecimiento',
                $cliente->hora_entrada ? Carbon::parse($cliente->hora_entrada)->format('H:i') : 'Sin registro',
                $cliente->hora_salida ? Carbon::parse($cliente->hora_salida)->format('H:i') : 'Aún en el establecimiento',
                $cliente->institucion_nombre, // Ajusta los campos según tu modelo
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Apellido',
            'Fecha de Ingreso',
            'Fecha de Salida',
            'Hora de Entrada',
            'Hora de Salida',
            'Institución',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:G1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => '333333'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'f2f2f2'],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        $sheet->getStyle('A:G')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        return $sheet;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:G' . ($this->clientes->count() + 1);
                $event->sheet->getStyle($cellRange)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => 'dddddd'],
                        ],
                    ],
                ]);

                $event->sheet->setCellValue('A1', 'Reporte General de Clientes');
                $event->sheet->mergeCells('A1:G1');
                $event->sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'size' => 16,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
            },
        ];
    }
}
