<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .header img {
            height: 50px;
        }

        .print-date {
            font-size: 9px;
            font-weight: 600;
            text-align: right;
            margin: 0;
        }

        h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
            text-align: center;
            padding-top: 10px;
        }

        .table-container {
            margin: 20px;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
            color: #333;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Salto de página para PDF */
        .page-break {
            page-break-after: always;
        }

        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            font-size: 100px;
            color: #ddd;
            z-index: -1;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('imgs/logo_ministerio.png') }}" alt="Logo">
        <p class="print-date">{{ 'Impreso: ' . $fechahora }}</p>
    </div>
    <h2>Reporte General de Clientes</h2>

    <div class="watermark">
        <img src="{{ public_path('imgs/logo_estado.png') }}" alt="Marca de agua" style="width: 500px;">
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Institución</th>
                    <th>Fecha Ingreso</th>
                    <th>Fecha Salida</th>
                    <th>Hora Entrada</th>
                    <th>Hora Salida</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $index => $cliente)
                    <tr>
                        <td>{{ $cliente->nombres . ' ' . $cliente->paterno . ' ' . $cliente->materno }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->fecha_ingreso ? \Carbon\Carbon::parse($cliente->fecha_ingreso)->format('d/m/Y') : 'Sin registro' }}
                        </td>
                        <td>{{ $cliente->fecha_salida ? \Carbon\Carbon::parse($cliente->fecha_salida)->format('d/m/Y') : 'Aún está en el establecimiento' }}
                        </td>
                        <td>{{ $cliente->hora_entrada ? \Carbon\Carbon::parse($cliente->hora_entrada)->format('H:i') : 'Sin registro' }}
                        </td>
                        <td>{{ $cliente->hora_salida ? \Carbon\Carbon::parse($cliente->hora_salida)->format('H:i') : 'Aún está en el establecimiento' }}
                        </td>
                    </tr>

                    @if ($clientesPorPagina > 0 && ($index + 1) % $clientesPorPagina === 0)
                        <div class="page-break"></div>
            </tbody>
        </table>
        <div class="page-break"></div>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Institución</th>
                    <th>Fecha Ingreso</th>
                    <th>Fecha Salida</th>
                    <th>Hora Entrada</th>
                    <th>Hora Salida</th>
                </tr>
            </thead>
            <tbody>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/php">
        if (isset($pdf)) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 820, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    </script>
</body>

</html>
