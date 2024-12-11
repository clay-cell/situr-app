
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Informacion</title>
</head>
<body style="background: url({{ asset('imgs/fondo-colores.png') }})">
    <div class="flex items-center justify-center min-h-screen ">
        <div class="relative bg-white p-8 rounded-xl shadow-2xl max-w-4xl w-full overflow-hidden">
            <!-- Marca de agua dentro del card -->
            <div class="absolute inset-0 opacity-30">
                <img src="{{ asset('imgs/logo_ministerio.png') }}" alt="Marca de agua"
                     class="w-full h-full object-contain">
            </div>

            <!-- Contenido principal -->
            <div class="relative flex flex-col md:flex-row gap-8 items-start">
                <!-- Foto de la institución -->
                <div class="flex flex-col items-center md:items-start text-center md:text-left">
                    <div class="w-36 h-36 rounded-full overflow-hidden shadow-md border-4 border-gray-200">
                        @if ($institucion->foto)
                            <img src="{{ asset('storage/' . $institucion->foto) }}" alt="Foto de la institución"
                                 class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('imgs/subirfoto.jpg') }}" alt="Foto de la institución"
                                 class="w-full h-full object-cover">
                        @endif
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900 mt-4">{{ $institucion->nombre }}</h1>
                </div>

                <!-- Información del responsable -->
                <div class="flex-1">
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">Datos del Responsable</h2>
                    <p class="text-gray-600">
                        <strong>Nombre:</strong> {{ $institucion->name }} {{ $institucion->primer_apellido }}
                        {{ $institucion->segundo_apellido }}
                    </p>
                </div>

                <!-- Información del establecimiento -->
                <div class="flex-1">
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">Datos del Establecimiento</h2>
                    <p class="text-gray-600"><strong>Establecimiento:</strong> {{ $institucion->nombre }}</p>
                    <p class="text-gray-600"><strong>Email:</strong> {{ $institucion->email }}</p>
                    <p class="text-gray-600"><strong>Teléfono:</strong> {{ $institucion->telefono }}</p>
                    <p class="text-gray-600"><strong>Dirección:</strong> {{ $institucion->direccion }}</p>
                </div>

                <!-- Código QR -->
                <div class="flex flex-col items-center">
                    <div class="p-3 bg-gray-100 border border-gray-200 rounded-lg shadow-sm">
                        <img src="{{ asset('storage/' . $institucion->qr) }}" alt="Código QR de la institución"
                             class="w-32 h-32 object-contain">
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Escanea el código QR</p>
                </div>
            </div>

            <!-- Footer con la bandera -->
            <div class="absolute bottom-0 left-0 w-full">
                <div>
                    <!-- Franja Roja -->
                    <div class="bg-red-600 h-1 w-full"></div>
                    <!-- Franja Amarilla -->
                    <div class="bg-yellow-500 h-1 w-full"></div>
                    <!-- Franja Verde -->
                    <div class="bg-green-600 h-1 w-full"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
