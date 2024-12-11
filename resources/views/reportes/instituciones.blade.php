<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Instituciones</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #0f1113;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #dbe0e6ac;
            color: rgba(126, 126, 126, 0.63);
        }

        header img {
            height: 50px;
        }

        header .date {
            font-size: 14px;
            text-align: right;
        }

        .container {
            padding: 20px;
            max-width: 100%;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        table thead {
            background-color: #343a40;
            color: white;
        }

        table th,
        table td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: center;
            word-wrap: break-word;
            font-size: 10px;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            z-index: 0;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #343a40;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer .page-number:after {
            content: counter(page);
        }

        @page {
            margin: 20mm;
            counter-reset: page;
        }
    </style>
</head>

<body>
    <header>
        <img src="{{ public_path('imgs/escudococha.png')}}" alt="Logo">
        <div class="date">Cochabamba {{ date('d/m/Y') }}</div>
    </header>

    <div class="container">
        <img src="{{ public_path('imgs/crecer.jpg') }}" alt="Watermark" class="watermark">
        <h2 style="text-align: center; margin-top: 0;">Lista de Instituciones</h2>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Establecimiento</th>
                    <th>Dirección</th>
                    <th>Correo</th>
                    <th>Contacto</th>
                    <th>Servicio</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->direccion }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->telefono }}</td>
                        <td>{{ $item->tipo_servicio }}</td>
                        <td>
                            @if ($item->estado == true)
                                <span style="color: green;">Activo</span>
                            @else
                                <span style="color: red;">Inactivo</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <footer>
        Página <span class="page-number"></span>
    </footer>
</body>

</html>
