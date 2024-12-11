<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Trámites</title>
    <style>
        /* Estilos globales */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #343a40;
        }

        /* Contenedor principal */
        .report-container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            border: 1px solid #ced4da;
        }

        /* Encabezado */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 100px;
            height: auto;
        }

        .header .date {
            font-size: 14px;
            color: #6c757d;
        }

        /* Título */
        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 30px;
            color: #212529;
        }

        /* Marca de agua */
        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            z-index: -1;
        }

        .watermark img {
            max-width: 500px;
            height: auto;
        }

        /* Tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #495057;
            color: #fff;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #dee2e6;
            font-size: 14px;
        }

        tbody tr:nth-child(even) {
            background-color: #e9ecef;
        }

        tbody tr:hover {
            background-color: #dee2e6;
        }

        /* Pie de página */
        .footer {
            bottom: 10px;
            text-align: center;
            font-size: 14px;
            color: #6c757d;
            margin-top: 20px;
        }

        .page-number {
            position: fixed;
            bottom: 10px;
            right: 20px;
            font-size: 12px;
            color: #6c757d;
        }

        /* Configuración para impresión */
        @media print {
            body {
                margin: 0;
                background: none;
            }

            .report-container {
                box-shadow: none;
                border: none;
                margin: 0;
                width: 100%;
                max-width: 100%;
            }

            .watermark img {
                max-width: 700px;
            }

            .page-number {
                position: fixed;
                bottom: 10px;
                right: 20px;
            }

            .footer {
                position: fixed;
                bottom: 20px;
                left: 0;
                right: 0;
            }
        }
    </style>
</head>

<body>
    <div class="report-container">
        <!-- Marca de agua -->
        <div class="watermark">
            <img src="{{ public_path('imgs/crecer.jpg') }}" alt="Marca de agua">
        </div>

        <!-- Encabezado -->
        <div class="header">
            <img src="{{ public_path('imgs/escudococha.png') }}" alt="Logo izquierdo">
            <div class="date">Cochabamba {{ date('d/m/Y') }}</div>
        </div>

        <!-- Título -->
        <h2>Reporte de Trámites</h2>

        <!-- Tabla -->
        <table>
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Trámite</th>
                    <th>Establecimiento</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $cont = ($tramites->currentPage() - 1) * $tramites->perPage() + 1;
                @endphp
                @foreach ($tramites as $item)
                    <tr>
                        <td>{{ $cont++ }}</td>
                        <td>{{ $item->nombre_tramite }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->observacion }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <!-- Pie de página -->
        <div class="footer">
            Reporte generado automáticamente. Todos los derechos reservados.
        </div>
        <div class="page-number">
            Página <span class="page-number"></span>  {{ $tramites->lastPage() }}
        </div>

    </div>
</body>

</html>
