<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    .logo {
            width: 50px;
            height: 50px;
            padding: 0.8em;
            /*background: red;*/
            margin: 0px;
            padding: 0px;
        }
    .encabezado{
      display: flex; /* Establecemos un contenedor flex */
      align-items: center;
    }
    .tam_letra{
      font-size: 12px;
    }
    .titulos{
      margin: 0px;
      font-size: 12px;
      font-weight: 600;
    }
  </style>
</head>
<body>
  <div>
    <div class="encabezado">
      <img class="logo" src="{{public_path('imgs/logo.png')}}"  alt="SITUR-CBBA">
      <p style="margin: 0px;text-align: right;font-size: 9px;font-weight: 600;">{{"Impreso: ".$fechahora}}</p>
      <p style="margin: 0px;text-align: center;font-size: 15px;font-weight: 600;">SITUR COCHABAMBA"</p>
      <!--<img src="imagenes/instituto.png" alt="insco">-->
    </div>
    <div class="tam_letra">
      <p class="titulos">SERVICIO {{ $servicio[0]->tipo_servicio }}</p>
      <p class="titulos">REQUISITOS {{ $tramite[0]->nombre_tramite }}</p>
      {{$presentados[0]['pre_requisito_id']." ".$presentados[0]['observacion']}}
    </div>
    <div>
      <table>
        @php
          $cont=1;
        @endphp
        @foreach ($unicos as $grupo)
          <p class="titulos" style="font-family: 'Oswald', sans-serif; margin: 2px 0 0 2px;">
            {{$grupo}}
          </p>   
          @foreach ($prerequisitos as $item)
            @if ($grupo==$item->grupo)
              <tr>
                <td style="width: 60%">
                  <label class="tam_letra">{{$cont.".- ".$item->descripcion}}</label>
                </td>
                <td style="width: 40%">
                  <label class="tam_letra">{{$presentados[$cont-1]['observacion']}}</label>
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
</body>
</html>