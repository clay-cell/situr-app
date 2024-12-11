<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Trabajo</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            width: 100%;
            max-width: 850px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        ..header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 80%;
            /* Puedes ajustar este ancho según tu preferencia */
        }

        .left-image,
        .right-image {
            width: 50px;
            /* Ajusta el tamaño según sea necesario */
            height: 50px;
        }

        .title {
            flex: 1;
            text-align: center;
            margin: 0;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .title p {
            margin: 0;
        }

        .red-text {
            color: red;
            font-weight: bold;
        }




        .info-section {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            margin-top: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;

        }

        .info-item {
            flex: 1;
            text-align: center;
            padding: 0 5px;
        }

        .table-container {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table-container th,
        .table-container td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            font-size: 13px;
        }

        .table-container th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 40px;
        }

        .color-bar {
            height: 10px;
            background: repeating-linear-gradient(45deg,
                    #000,
                    #000 10px,
                    #ff0 10px,
                    #ff0 20px,
                    #0ff 20px,
                    #0ff 30px);
            margin-top: 10px;
        }

        /* Estilos de la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        /* Estilos de las celdas de la tabla */
        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        /* Estilos de las cabeceras */
        th {

            color: rgb(35, 35, 35);
            font-weight: bold;
        }

        /* Estilo de las filas */
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Estilos para las celdas de datos */
        td {
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <img src="{{ public_path('imgs/escudococha.png') }}" alt="Gobierno Autónomo Departamental de Cochabamba"
                class="left-image">
            <div class="title" style="">
                <p>ORDEN DE TRABAJO</p>
                <p class="red-text">ORIGINAL CONTRIBUYENTE</p>
            </div>
            <img src="{{ public_path('imgs/crecer.jpg') }}" alt="Cochabamba Turismo" class="right-image">
        </div>

        <!-- Identification Section -->
        <p class="small-text" style="text-align: center; font-weight: bold; margin-top: 10px;">
            B) TASAS POR PRESTACIÓN DE SERVICIOS ADMINISTRATIVOS Y TÉCNICOS DE TURISMO
        </p>
        <div class="info-section">
            <table>
                <thead style="border-bottom: #000;border: 1">
                    <tr>
                        <th>PERSONA NATURAL JURIDICA</th>
                        <th>CARNET DE IDENTIDAD</th>
                        <th>F. DE EMISION</th>
                        <th>F. LIM. DE PAGO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-block-color: black ; border: 1">
                        <td>{{ ' ' . $user->name . ' ' . $user->primer_apellido . ' ' . $user->segundo_apellido }}</td>
                        <td>{{ $user->cedula }}</td>
                        <td>{{ $fechahora }}</td>
                        <td>{{ $masfecha }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Table Section -->
        <table class="table-container">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Descripción</th>
                    <th>Cant.</th>
                    <th>P. Unit.</th>
                    <th>Total</th>
                </tr>
            </thead>
            {{-- <tbody>
                <tr>
                    <td>1</td>
                    <td>Timbres</td>
                    <td>3</td>
                    <td>5,00</td>
                    <td>15,00</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Folders</td>
                    <td>4</td>
                    <td>0,50</td>
                    <td>2,00</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Reposición de Formularios</td>
                    <td>1</td>
                    <td>15,00</td>
                    <td>15,00</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4"><strong>Total</strong></td>
                    <td><strong>35,00</strong></td>
                </tr>
            </tfoot> --}}
            <tbody>
                @php
                    $cant = 1;
                    $total = 0; // Inicializar la variable para la suma total
                @endphp
                @foreach ($tasas as $tasa)
                    <tr>
                        <td>{{ $cant }}</td>
                        <td>{{ $tasa->name }}</td>
                        <td>N/A</td>
                        <td>{{ $tasa->monto_fijo }}</td>
                        <td>{{ $tasa->monto_fijo }}</td>
                        @php
                            $total += $tasa->monto_fijo; // Acumular el monto fijo
                            $cant++;
                        @endphp
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4"><strong>Total</strong></td>
                    <td><strong>{{ $total }}</strong></td>
                </tr>
            </tfoot>

        </table>

        <!-- Footer Section -->
        <div class="footer">
            <p>____________________________</p>
            <p>INSTRUCTIVO DE TRABAJO</p>
        </div>

        <!-- Color Bar -->
        <div class="color-bar">
            <img src="{{ public_path('imgs/whipala.jpg') }}" alt="Gobierno Autónomo Departamental de Cochabamba"
                width="740px" height="20px">
        </div>
    </div>
    <div style="margin-top: 300px">
        <div class="container">
            <!-- Header Section -->
            <div class="header">
                <img src="{{ public_path('imgs/escudococha.png') }}"
                    alt="Gobierno Autónomo Departamental de Cochabamba" class="left-image">
                <div class="title" style="">
                    <p>ORDEN DE TRABAJO</p>
                    <p class="red-text">COPIA UNIDAD</p>
                </div>
                <img src="{{ public_path('imgs/crecer.jpg') }}" alt="Cochabamba Turismo" class="right-image">
            </div>

            <!-- Identification Section -->
            <p class="small-text" style="text-align: center; font-weight: bold; margin-top: 10px;">
                B) TASAS POR PRESTACIÓN DE SERVICIOS ADMINISTRATIVOS Y TÉCNICOS DE TURISMO
            </p>
            <div class="info-section">
                <table>
                    <thead style="border-bottom: #000;border: 1">
                        <tr>
                            <th>PERSONA NATURAL JURIDICA</th>
                            <th>CARNET DE IDENTIDAD</th>
                            <th>F. DE EMISION</th>
                            <th>F. LIM. DE PAGO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-block-color: black ; border: 1">
                            <td>{{ ' ' . $user->name . ' ' . $user->primer_apellido . ' ' . $user->segundo_apellido }}
                            </td>
                            <td>{{ $user->cedula }}</td>
                            <td>{{ $fechahora }}</td>
                            <td>{{ $masfecha }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table Section -->
            <table class="table-container">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Descripción</th>
                        <th>Cant.</th>
                        <th>P. Unit.</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <tr>
                        <td>1</td>
                        <td>Timbres</td>
                        <td>3</td>
                        <td>5,00</td>
                        <td>15,00</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Folders</td>
                        <td>4</td>
                        <td>0,50</td>
                        <td>2,00</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Reposición de Formularios</td>
                        <td>1</td>
                        <td>15,00</td>
                        <td>15,00</td>
                    </tr> --}}
                    @php
                        $cant = 1;
                        $total = 0; // Inicializar la variable para la suma total
                    @endphp
                    @foreach ($tasas as $tasa)
                        <tr>
                            <td>{{ $cant }}</td>
                            <td>{{ $tasa->name }}</td>
                            <td>N/A</td>
                            <td>{{ $tasa->monto_fijo }}</td>
                            <td>{{ $tasa->monto_fijo }}</td>
                            @php
                                $total += $tasa->monto_fijo; // Acumular el monto fijo
                                $cant++;
                            @endphp
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4"><strong>Total</strong></td>
                        <td><strong>{{ $total }}</strong></td>
                    </tr>
                </tfoot>
            </table>

            <!-- Footer Section -->
            <div class="footer">
                <p>____________________________</p>
                <p>INSTRUCTIVO DE TRABAJO</p>
            </div>

            <!-- Color Bar -->
            <div class="color-bar">
                <img src="{{ public_path('imgs/whipala.jpg') }}" alt="Gobierno Autónomo Departamental de Cochabamba"
                    width="740px" height="20px">
            </div>
        </div>
    </div>

</body>

</html>
