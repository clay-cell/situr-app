<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documento Formal</title>
    <style>
        @page {
            margin: 50px 25px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        .content {
            margin: 50px 30px;
            max-width: 700px;
            /* Limita el ancho máximo del contenido */
        }

        .encabezado {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }

        .logo {
            width: 70px;
            height: 70px;
            margin: 0 auto;
        }

        .titulo-principal {
            font-size: 15px;
            font-weight: bold;
            margin: 10px 0;
        }

        .impreso {
            font-size: 10px;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .tam-letra {
            font-size: 12px;
            line-height: 1.5;
        }

        .titulos {
            font-size: 13px;
            font-weight: bold;
            margin: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            font-size: 12px;
            word-wrap: break-word;
            line-height: 1.5;
            padding: 4px 0;
            max-width: 650px;
            /* Ajuste para que las líneas no se extiendan más allá de la hoja */
            overflow-wrap: break-word;
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
            filter: grayscale(1);

        }
    </style>
</head>

<body>
    <div class="marca-agua"></div>

    <div class="encabezado">
        <img class="logo" src="{{ public_path('imgs/logo_estado.png') }}" alt="SITUR-CBBA">
        <p class="impreso">Impreso: {{ $fechahora }}</p>
        <p class="titulo-principal">SITUR COCHABAMBA</p>
    </div>
    <div class="watermark">
        <img src="{{ public_path('imgs/logo_estado.png') }}" alt="Marca de agua" style="width: 500px; filter: grayscale(1);">
    </div>
    <div class="content">
        <div class="tam-letra">
            <p class="titulos">SERVICIO: {{ $servicio[0]->tipo_servicio }}</p>
            <p class="titulos">REQUISITOS: {{ $tramite[0]->nombre_tramite }}</p>
        </div>

        <table>
            <tbody>
                @php $cont = 1; @endphp
                @foreach ($prerequisitos as $grupo)
                    <p class="titulos">{{ $grupo->descripcion }}</p>
                    @foreach ($itemprerequisitos as $item)
                        @if ($grupo->id == $item->pre_requisito_id)
                            <tr>
                                <td>{{ $cont }}.- {{ $item->descripcion }}</td>
                            </tr>
                            @php $cont++; @endphp
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
