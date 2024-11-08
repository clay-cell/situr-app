<x-menu>
 Docuemntos Presentados
 <div class="overflow-x-auto mt-4">
    <table class="min-w-full bg-white rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">ID</th>
                <th class="py-3 px-6 text-left">Nombre del Documento</th>
                <th class="py-3 px-6 text-left">Fecha de Presentación</th>
                <th class="py-3 px-6 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-gray-700 text-sm font-light">
            @foreach ($documentos as $documento)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $documento->id }}</td>
                    <td class="py-3 px-6 text-left">{{ $documento->documento }}</td>
                    <td class="py-3 px-6 text-left">{{ $documento->fecha_presentacion }}</td>
                    <td class="py-3 px-6 text-left">
                        <div x-data="{ open: false }">
                            <button @click="open = !open" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                Acciones
                            </button>
                            <div x-show="open" @click.away="open = false" class="mt-2 bg-white shadow-lg rounded-md p-2">
                                <a href="{{ asset($documento->ruta) }}" target="_blank" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Ver</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Editar</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Eliminar</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-menu>
