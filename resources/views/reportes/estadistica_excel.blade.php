<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Estadístico</title>
    {{-- <style>
        body {
            font-family: Arial, sans-serif;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            text-align: center;
            padding: 5px;
            font-size: 7px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .footer {
            font-family: Arial, sans-serif;
            font-size: 8px;
            margin: 20px;
            margin-top: 10%;
        }

        .references {
            max-width: 50%;
        }

        .signatures {
            text-align: right;
            float: right;
        }

        .signatures table td {
            padding: 0 10px;
            text-align: center;
        }
    </style> --}}
</head>

<body>
    <div class="header">
        <div style="float: left">
            {{-- <img src="{{ public_path('imgs/Escudo_de_Bolivia.png') }}" alt="" width="55px" height="55px"> --}}
        </div>
        <h2>Estadísticas Hoteleras</h2>
        <p><strong>Nombre del Establecimiento:</strong> {{ $institucion->nombre }}</p>
        <p><strong>Dirección:</strong> {{ $institucion->direccion }}</p>
        @php
            setlocale(LC_TIME, 'es_ES.UTF-8'); // Asegúrate de que tu servidor tenga configurado el idioma español
            $nombreMes = strftime('%B', mktime(0, 0, 0, $mes, 1)); // $mes es el número del mes (1-12)
            //echo ucfirst($nombreMes); // Capitaliza la primera letra
        @endphp
        <p style="text-transform: capitalize"><strong>Mes:</strong> {{ $nombreMes }} / <strong>Año:</strong> {{ $anio }}</p>
    </div>

    <!-- Tabla con los datos de ingreso y permanencia por día -->
    <table class="table">
        <thead>
            <tr>
                <th>Día</th>
                @foreach ($paises as $pais)
                    <th colspan="2">{{ $pais->pais }}</th>
                @endforeach
            </tr>
            <tr>
                <th></th>
                @foreach ($paises as $pais)
                    <th>I</th>
                    <th>P</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @php
                // Crear un arreglo con los días del mes
                //$dias_del_mes = range(1, 31); // Esto genera un array con los números de 1 a 31
                $dias_del_mes = range(1, cal_days_in_month(CAL_GREGORIAN, $mes, $anio));

                // Inicializar los contadores para Ingreso y Permanente por tipo
                $countIngreso_Nal = 0;
                $countIngreso_Ext = 0;
                $countPermanente_Nal = 0;
                $countPermanente_Ext = 0;
                // Inicializar totales para ingresos y permanencias
                $totalesIngreso = [];
                $totalesPermanencia = [];
                foreach ($paises as $pais) {
                    $totalesIngreso[$pais->id] = 0;
                    $totalesPermanencia[$pais->id] = 0;
                }
            @endphp

            @foreach ($dias_del_mes as $dia)
                <tr>
                    <td>{{ str_pad($dia, 2, '0', STR_PAD_LEFT) }}</td>
                    @foreach ($paises as $pais)
                        <!-- Columna para Ingreso (I) -->
                        <td>
                            @php
                                $countIngreso = 0; // Variable para contar ingresos
                                foreach ($institucion_cliente as $cliente) {
                                    $fecha_salida = \Carbon\Carbon::parse($cliente->fecha_salida);
                                    if (
                                        $cliente->cliente_p_id === $pais->id &&
                                        $fecha_salida->day === $dia &&
                                        $cliente->estadia === 1
                                    ) {
                                        $countIngreso++; // Incrementar el contador de ingresos
                                        if ($cliente->cliente_nacionalidad === 1) {
                                            $countIngreso_Nal++; // Contar ingreso Nacional
                                        } else {
                                            $countIngreso_Ext++; // Contar ingreso Externo
                                        }
                                    }
                                }
                                $totalesIngreso[$pais->id] += $countIngreso;
                            @endphp
                            {{ $countIngreso }} <!-- Mostrar el conteo de ingresos -->
                        </td>

                        <!-- Columna para Permanencia (P) -->
                        <td>
                            @php
                                $countPermanencia = 0; // Variable para contar permanencias
                                foreach ($institucion_cliente as $cliente) {
                                    $fecha_salida = \Carbon\Carbon::parse($cliente->fecha_salida);
                                    if (
                                        $cliente->cliente_p_id === $pais->id &&
                                        $fecha_salida->day === $dia &&
                                        $cliente->estadia === 2
                                    ) {
                                        $countPermanencia++; // Incrementar el contador de permanencias
                                        if ($cliente->cliente_nacionalidad === 1) {
                                            $countPermanente_Nal++; // Contar permanencia Nacional
                                        } else {
                                            $countPermanente_Ext++; // Contar permanencia Externa
                                        }
                                    }
                                }
                                $totalesPermanencia[$pais->id] += $countPermanencia;
                            @endphp
                            {{ $countPermanencia }} <!-- Mostrar el conteo de permanencias -->
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td><strong>Total</strong></td>
                @foreach ($paises as $pais)
                    <td>{{ $totalesIngreso[$pais->id] ?? 0 }}</td> <!-- Total de ingresos por país -->
                    <td>{{ $totalesPermanencia[$pais->id] ?? 0 }}</td> <!-- Total de permanencias por país -->
                @endforeach
            </tr>
        </tfoot>
    </table>

    <!-- Tabla de Resumen -->
    <div>
        <table class="table" >
            <thead>
                <tr>
                    <th>RESUMEN</th>
                    <th>NAL.</th>
                    <th>EXT.</th>
                    <th>TOTAL.</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>INGRESO</th>
                    <td>{{ $countIngreso_Nal }}</td>
                    <td>{{ $countIngreso_Ext }}</td>
                    <td>{{ $countIngreso_Nal + $countIngreso_Ext }}</td>
                </tr>
                <tr>
                    <th>PERMANENTE</th>
                    <td>{{ $countPermanente_Nal }}</td>
                    <td>{{ $countPermanente_Ext }}</td>
                    <td>{{ $countPermanente_Nal + $countPermanente_Ext }}</td>
                </tr>
                <tr>
                    <th>TOTAL</th>
                    <td>{{ $countIngreso_Nal + $countPermanente_Nal }}</td>
                    <td>{{ $countIngreso_Ext + $countPermanente_Ext }}</td>
                    <td>{{ $countIngreso_Nal + $countIngreso_Ext + $countPermanente_Nal + $countPermanente_Ext }}</td>
                </tr>
            </tbody>
        </table>
    </div>


    <footer class="footer">
        <div>
            <div class="references" style="float: left">
                <p class="title">REFERENCIAS:</p>
                <div>
                    <p>I = INGRESO (ENTRADA)</p>
                    <p>P = PERMANENTES (PERNOPTARON)</p>
                </div>
                <div>
                    <p class="title">NOTA:</p>
                    <p>ESTE FORMULARIO DEBE SER ENTREGADO A LA REPRESENTACION</p>
                    <p>REGIONAL DE LA SECRETARIA NACIONAL DE TURISMO ANTES DEL</p>
                    <p>8 DEL MES SIGUIENTE</p>
                </div>
            </div>
            <div class="signatures">
                <table>
                    <tr>
                        <td>
                            <span>___________________________________</span>
                            <br>
                            <span>SELLO ESTABLECIMIENTO</span>
                        </td>
                        <td>
                            <span>___________________________________</span>
                            <br>
                            <span>PERSONA RESPONSABLE</span>
                        </td>
                        <td>
                            <span>___________________________________</span>
                            <br>
                            <span>FECHA RECEPCION SELLO</span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </footer>




</body>

</html>
