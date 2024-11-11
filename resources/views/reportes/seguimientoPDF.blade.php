<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      color: #333;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 100%;
      max-width: 700px;
      margin: 10px auto;
      border: 1px solid #ddd;
      padding: 10px 20px;
      box-sizing: border-box;
    }
    .logo {
      width: 45px;
      height: 45px;
      margin-right: 10px;
    }
    .header {
      display: flex;
      align-items: center;
      border-bottom: 1px solid #ddd;
      padding-bottom: 5px;
      margin-bottom: 8px;
    }
    .header-text {
      flex: 1;
      text-align: center;
    }
    .header-text p {
      margin: 0;
      font-size: 11px;
      font-weight: bold;
    }
    .header-date {
      font-size: 8px;
      text-align: right;
      margin-top: -5px;
    }
    .content {
      font-size: 9px;
      line-height: 1.4;
    }
    .title {
      font-size: 11px;
      font-weight: bold;
      margin-bottom: 4px;
      text-transform: uppercase;
    }
    .sub-title {
      font-size: 9px;
      font-weight: 600;
      color: #555;
      margin-bottom: 8px;
    }
    .table-container {
      width: 100%;
      border-collapse: collapse;
      margin-top: 5px;
    }
    .table-container th, .table-container td {
      padding: 6px 10px;
      border: 1px solid #ddd;
      font-size: 9px;
    }
    .table-container th {
      background-color: #f0f0f0;
      font-weight: bold;
      text-transform: uppercase;
    }
    .group-header {
      font-size: 9px;
      font-weight: bold;
      background-color: #f9f9f9;
      padding: 6px;
      color: #333;
      text-transform: uppercase;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Header Section -->
    <div class="header">
      <img class="logo" src="{{ public_path('imgs/logo.png') }}" alt="SITUR-CBBA">
      <div class="header-text">
        <p>SITUR COCHABAMBA</p>
        <p class="header-date">{{ "Impreso: " . $fechahora }}</p>
      </div>
    </div>

    <!-- Content Section -->
    <div class="content">
      <p class="title">Servicio: {{ $servicio[0]->tipo_servicio }}</p>
      <p class="sub-title">Requisitos: {{ $tramite[0]->nombre_tramite }}</p>
      <p>{{ $presentados[0]['pre_requisito_id'] . " - " . $presentados[0]['observacion'] }}</p>

      <!-- Table Section -->
      <div>
        <table class="table-container">
          @php
            $cont = 1;
          @endphp
          @foreach ($unicos as $grupo)
            <tr class="group-header">
              <td colspan="2">{{ $grupo }}</td>
            </tr>
            @foreach ($prerequisitos as $item)
              @if ($grupo == $item->grupo)
                <tr>
                  <td style="width: 60%;">{{ $cont . ".- " . $item->descripcion }}</td>
                  <td style="width: 40%;">
                    {{ isset($presentados[$cont - 1]['observacion']) ? $presentados[$cont - 1]['observacion'] : '' }}
                  </td>
                </tr>
                @php
                  $cont++;
                @endphp
              @endif
            @endforeach
          @endforeach
        </table>
      </div>
    </div>
  </div>
</body>
</html>
