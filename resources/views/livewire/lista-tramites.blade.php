<div class="p-6 bg-gray-100 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Trámites Realizados</h2>

    <!-- Datos Personales -->
    <div class="mb-8 bg-white p-5 rounded-lg shadow">
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Datos Personales</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <label class="text-gray-700">
                Contribuyente:
                <span class="font-semibold text-gray-900">
                    {{ $tramites_realizados[0]->name . ' ' . $tramites_realizados[0]->primer_apellido . ' ' . $tramites_realizados[0]->segundo_apellido }}
                </span>
            </label>
            <label class="text-gray-700">
                Cédula:
                <span class="font-semibold text-gray-900">
                    {{ $tramites_realizados[0]->cedula . ' - ' . $tramites_realizados[0]->extension }}
                </span>
            </label>
        </div>
    </div>

    <!-- Tabla de Trámites -->
    <div class="overflow-x-auto">
        <table class="w-full bg-white shadow-lg rounded-lg">
            <thead>
                <tr class="bg-blue-600 text-white uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Nº</th>
                    <th class="py-3 px-6 text-left">Establecimiento</th>
                    <th class="py-3 px-6 text-left">Inicio del Trámsite</th>
                    <th class="py-3 px-6 text-left">Tipo de Trámite</th>
                    <th class="py-3 px-6 text-left">Estado</th>
                    <th class="py-3 px-6 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach ($tramites_realizados as $index => $tramites)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $index + 1 }}</td>
                        <td class="py-3 px-6 uppercase">{{ $tramites->nombre }}</td>
                        <td class="py-3 px-6">{{ $tramites->fecha_inicio }}</td>
                        <td class="py-3 px-6">{{ $tramites->nombre_tramite }}</td>
                        <td class="py-3 px-6">
                            <span
                                class="px-2 py-1 rounded-lg
                                    {{ $tramites->tramites_state == '1' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                                {{ $tramites->tramites_state == '1' ? 'Completado' : 'Pendiente' }}
                            </span>

                        </td>
                        <td class="py-3 px-6 text-center flex justify-center space-x-4">
                            <a href="{{ route('documentos_subidos',$tramites->id) }}" class="text-blue-500 hover:text-blue-600 flex items-center">
                                <i class="fa-regular fa-file-word fa-lg mr-2"></i> Documentos
                            </a>
                            <a href="#" class="text-green-500 hover:text-green-600 flex items-center">
                                <i class="fa-regular fa-check-circle fa-lg mr-2"></i> Aceptar
                            </a>
                            <a href="#" class="text-red-500 hover:text-red-600 flex items-center">
                                <i class="fa-regular fa-times-circle fa-lg mr-2"></i> Rechazar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <!-- Paginación -->
    <div class="mt-6">
        {{ $tramites_realizados->links() }}
    </div> <!-- Paginación -->
</div>
