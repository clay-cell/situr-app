<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Solicitud</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f3f3f3;
        }

        .container {
            width: 100%;
            max-width: 800px;
            background: white;
            border: 1px solid #ddd;
            padding: 20px;
        }

        .header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .logo {
            width: 80px;
            height: auto;
            margin-right: 10px;
        }

        .title {
            font-size: 14px;
            font-weight: bold;
            text-align: center;
        }

        .title p {
            margin: 0;
        }

        .title .main-title {
            font-size: 16px;
            color: #004080;
        }

        .title .secondary-title {
            font-size: 12px;
            color: #004080;
        }

        .form-title {
            text-align: center;
            color: #d2322d;
            font-weight: bold;
            font-size: 14px;
            margin: 10px 0;
        }

        .section-title {
            background-color: #004080;
            color: white;
            text-align: center;
            font-weight: bold;
            padding: 5px;
            margin-top: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 12px;
            text-align: left;
        }

        th {
            background-color: #f3f3f3;
            font-weight: bold;
            text-transform: uppercase;
        }

        .footer {
            margin-top: 20px;
            font-size: 10px;
            color: #333;
        }

        .footer p {
            margin: 0;
            line-height: 1.5;
        }

        .footer-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }

        .footer-row div {
            text-align: center;
        }

        .footer-row div p {
            font-size: 11px;
            margin: 0;
        }

        .footer-row div .signature {
            border-top: 1px solid #333;
            padding-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <img src="{{ public_path('imgs/escudococha.png') }}" alt="Logo" class="logo">
            <div class="title">
                <p class="main-title">FORMULARIO DE SOLICITUD</p>
                <p class="secondary-title">INICIO DE SERVICIO ADMINISTRATIVO Y/O TÉCNICO</p>
            </div>
            <div style="text-align: right;">
                <p style="font-weight: bold; color: red;">N-000000039</p>
            </div>
        </div>

        <div class="form-title">COPIA CONTRIBUYENTE</div>

        <!-- Identification Section -->
        <div class="section-title">IDENTIFICACIÓN DEL SUJETO PASIVO</div>
        <table>
            <tr>
                <th style="width: 30%;">Nombre Completo o Razón Social</th>
                <th style="width: 20%;">Cédula / NIT</th>
                <th style="width: 30%;">Correo Electrónico</th>
                <th style="width: 20%;">Celular y/o Fijo</th>
            </tr>
            <tr>
                <td>{{ $user->name . ' ' . $user->primer_apellido . ' ' . $user->segundo_apellido }}</td>
                <td>{{ $user->cedula }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->celular }}</td>
            </tr>
            <tr>
                <th colspan="2">Representante Legal (cuando corresponda)</th>
                <th colspan="2">Cédula de Identidad del Representante Legal</th>
            </tr>
            <tr>
                <td colspan="2">{{ $user->name . ' ' . $user->primer_apellido . ' ' . $user->segundo_apellido }}</td>
                <td colspan="2">{{ $user->cedula }}</td>
            </tr>
        </table>

        <!-- Service Identification Section -->
        <div class="section-title">IDENTIFICACIÓN DEL SERVICIO ADMINISTRATIVO Y/O TÉCNICO</div>
        <table>
            <tr>
                <th style="width: 50%;">Unidad Prestadora del Servicio</th>
                <th style="width: 50%;">Descripción del Servicio Requerido</th>
            </tr>
            <tr>
                <td>{{ $institucion->nombre }}</td>
                <td>NINGUNO</td>
            </tr>
        </table>

        <!-- Footer Section -->
        <div class="section-title">SOLICITUD DE INICIO DE SERVICIO ADMINISTRATIVO Y/O TÉCNICO</div>
        <div class="footer">
            <p>Mi persona, de los generales de ley precedentemente señalados, tengo a bien solicitar el servicio
                descrito en el presente formulario, protestando de mi parte cumplir con todos los requisitos
                establecidos en la normativa sectorial correspondiente, y realizar la cancelación de la tasa
                departamental y los valores establecidos para la prestación del servicio, en los plazos previstos en el
                Decreto Departamental Reglamentario a la Ley Nº 1043.</p>
            <p>Por lo que suscribo el presente en señal de conformidad.</p>
        </div>

        <div class="footer-row">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="width: 20%;"><p>*FECHA :</p></td>
                    <td style="width: 20%;"><p>{{ $fechahora }}</p></td>
                    <td style="width: 20%; text-align: center;"><p>FIRMA Y ACLARACIÓN - SUJETO PASIVO</p></td>
                    <td style="width: 40%;  height: 30px;"></td>
                </tr>
            </table>
        </div>
        <!-- Header Section -->
        <div class="header">
            <img src="{{ public_path('imgs/escudococha.png') }}" alt="Logo" class="logo">
            <div class="title">
                <p class="main-title">FORMULARIO DE SOLICITUD</p>
                <p class="secondary-title">INICIO DE SERVICIO ADMINISTRATIVO Y/O TÉCNICO</p>
            </div>
            <div style="text-align: right;">
                <p style="font-weight: bold; color: red;">N-000000039</p>
            </div>
        </div>

        <div class="form-title">ARCHIVO REACUDACIONES</div>

        <!-- Identification Section -->
        <div class="section-title">IDENTIFICACIÓN DEL SUJETO PASIVO</div>
        <table>
            <tr>
                <th style="width: 30%;">Nombre Completo o Razón Social</th>
                <th style="width: 20%;">Cédula / NIT</th>
                <th style="width: 30%;">Correo Electrónico</th>
                <th style="width: 20%;">Celular y/o Fijo</th>
            </tr>
            <tr>
                <td>{{ $user->name . ' ' . $user->primer_apellido . ' ' . $user->segundo_apellido }}</td>
                <td>{{ $user->cedula }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->celular }}</td>
            </tr>
            <tr>
                <th colspan="2">Representante Legal (cuando corresponda)</th>
                <th colspan="2">Cédula de Identidad del Representante Legal</th>
            </tr>
            <tr>
                <td colspan="2">{{ $user->name . ' ' . $user->primer_apellido . ' ' . $user->segundo_apellido }}</td>
                <td colspan="2">{{ $user->cedula }}</td>
            </tr>
        </table>

        <!-- Service Identification Section -->
        <div class="section-title">IDENTIFICACIÓN DEL SERVICIO ADMINISTRATIVO Y/O TÉCNICO</div>
        <table>
            <tr>
                <th style="width: 50%;">Unidad Prestadora del Servicio</th>
                <th style="width: 50%;">Descripción del Servicio Requerido</th>
            </tr>
            <tr>
                <td>{{ $institucion->nombre }}</td>
                <td>NINGUNO</td>
            </tr>
        </table>

        <!-- Footer Section -->
        <div class="section-title">SOLICITUD DE INICIO DE SERVICIO ADMINISTRATIVO Y/O TÉCNICO</div>
        <div class="footer">
            <p>Mi persona, de los generales de ley precedentemente señalados, tengo a bien solicitar el servicio
                descrito en el presente formulario, protestando de mi parte cumplir con todos los requisitos
                establecidos en la normativa sectorial correspondiente, y realizar la cancelación de la tasa
                departamental y los valores establecidos para la prestación del servicio, en los plazos previstos en el
                Decreto Departamental Reglamentario a la Ley Nº 1043.</p>
            <p>Por lo que suscribo el presente en señal de conformidad.</p>
        </div>

        <div class="footer-row">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="width: 20%;"><p>*FECHA :</p></td>
                    <td style="width: 20%;"><p>{{ $fechahora }}</p></td>
                    <td style="width: 20%; text-align: center;"><p>FIRMA Y ACLARACIÓN - SUJETO PASIVO</p></td>
                    <td style="width: 40%;  height: 30px;"></td>
                </tr>
            </table>
        </div>

</body>

</html>
