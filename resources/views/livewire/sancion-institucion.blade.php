<div class="min-h-screen bg-gray-100 p-6">
    <!-- Título -->
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">
        Sanciones de la empresa: {{ $institucion->nombre }}
    </h2>

    <!-- Botón para asignar sanción -->
    <div class="flex justify-end mb-4">
        <a href="{{ route('sancion_institucion.create', $institucion->id) }}"
            class="px-4 py-2 bg-yellow-500 text-white rounded-lg shadow-md hover:bg-yellow-400 transition-all">
            <i class="fa-solid fa-triangle-exclamation mr-3"></i> Asignar Sanción
        </a>
    </div>

    <!-- Tabla de sanciones -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden" x-data="{ expandedRow: null }">
        <table class="min-w-full border-collapse border border-gray-200 text-sm sm:text-base">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="text-left text-gray-600 px-4 sm:px-6 py-3">Nº</th>
                    <th class="text-left text-gray-600 px-4 sm:px-6 py-3">Sanción</th>
                    <th class="text-left text-gray-600 px-4 sm:px-6 py-3">Fecha de Asignación</th>
                    <th class="text-left text-gray-600 px-4 sm:px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sanciones as $sancion)
                    <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100 transition">
                        <td class="text-gray-700 px-4 sm:px-6 py-4">{{ $loop->index + 1 }}</td>
                        <td class="text-gray-700 px-4 sm:px-6 py-4">{{ $sancion->nombre_sancion }}</td>
                        <td class="text-gray-700 px-4 sm:px-6 py-4">{{ $sancion->fecha_asignacion }}</td>
                        <td class="text-gray-700 px-4 sm:px-6 py-4">
                            <button
                                class="bg-slate-50 border px-3 py-2 rounded-md hover:bg-green-600 hover:text-white transition-all"
                                @click="expandedRow === {{ $loop->index }} ? expandedRow = null : expandedRow = {{ $loop->index }}">
                                <i class="fa-solid fa-list-ul mr-2"></i> Opciones
                            </button>
                        </td>
                    </tr>
                    <tr x-show="expandedRow === {{ $loop->index }}" x-cloak>
                        <td colspan="4" class="bg-gray-50 px-4 sm:px-6 py-4">
                            <div class="flex flex-wrap gap-3">
                                <!-- Formulario -->
                                <a href="{{ route('formulario_sancion', ['id_institucion' => $sancion->institucion_id, 'id_sancion' => $sancion->item_sancion_id]) }}"
                                    target="_blank"
                                    class="flex items-center gap-2 bg-blue-100 text-blue-800 border border-blue-200 px-3 py-2 rounded-md hover:bg-blue-200 transition-all">
                                    <i class="fa-solid fa-file-alt"></i> Formulario
                                </a>

                                <!-- Acta de Actuación -->
                                <button wire:click="verificarDocumento({{ $sancion->id }}, 'Acta de Actuación')"
                                    class="flex items-center gap-2 bg-green-100 text-green-800 border border-green-200 px-3 py-2 rounded-md hover:bg-green-200 transition-all">
                                    <i class="fa-solid fa-gavel"></i> Acta de Actuación
                                </button>

                                <!-- Informe Técnico -->
                                <button wire:click="verificarDocumento({{ $sancion->id }}, 'Informe Técnico')"
                                    class="flex items-center gap-2 bg-yellow-100 text-yellow-800 border border-yellow-200 px-3 py-2 rounded-md hover:bg-yellow-200 transition-all">
                                    <i class="fa-solid fa-tools"></i> Informe Técnico
                                </button>

                                <!-- Informe Legal -->
                                <button wire:click="verificarDocumento({{ $sancion->id }}, 'Informe Legal')"
                                    class="flex items-center gap-2 bg-red-100 text-red-800 border border-red-200 px-3 py-2 rounded-md hover:bg-red-200 transition-all">
                                    <i class="fa-solid fa-balance-scale"></i> Informe Legal
                                </button>

                                <!-- Resolución Administrativa -->
                                <button
                                    wire:click="verificarDocumento({{ $sancion->id }}, 'Resolución Administrativa')"
                                    class="flex items-center gap-2 bg-purple-100 text-purple-800 border border-purple-200 px-3 py-2 rounded-md hover:bg-purple-200 transition-all">
                                    <i class="fa-solid fa-file-contract"></i> Resolución Administrativa
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal para cargar PDF -->
    @if ($visualizar)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                <h2 class="text-lg font-bold mb-4">Subir {{ $tipoDocumento }}</h2>
                <div class="mb-4">
                    <label for="pdf" class="block text-sm font-medium text-gray-700">Subir PDF</label>
                    <input type="file" id="pdf" wire:model="pdf"
                        class="block w-full border-gray-300 rounded-md" accept=".pdf">
                    @error('pdf')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end gap-2">
                    <button wire:click="$set('visualizar', false)"
                        class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md">Cancelar</button>
                    <button wire:click="guardar" class="bg-green-500 text-white px-4 py-2 rounded-md">Guardar</button>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal para visualizar PDF -->
    @if ($mostrarPdf)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-2/3">
                <h2 class="text-lg font-bold mb-4">{{ $tipoDocumento }}</h2>

                <!-- Verificar que el PDF URL es válido antes de mostrar el iframe -->
                @if ($pdfUrl)
                    <iframe src="{{ asset($pdfUrl) }}" class="w-full h-[500px] border rounded-md"></iframe>
                    <p>{{ asset($pdfUrl) }}</p>
                @else
                    <p class="text-red-500">No se pudo cargar el PDF.</p>
                @endif

                <div class="flex justify-end mt-4">
                    <button wire:click="cerrarModalPdf"
                        class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md">Cerrar</button>
                </div>
            </div>
        </div>
    @endif

    <!-- Botón para abrir el modal -->
    <button type="button" title="Generar Resolución Administrativa" wire:click="mostrar_resolucion"
        class="text-white text-sm md:text-sm lg:text-sm bg-yellow-600 hover:bg-yellow-700 font-bold py-2 px-4 rounded-r">
        <i class="fa-solid fa-file-pen"></i> Generar Resolución
    </button>

    <x-dialog-modal wire:model="ver_resolucion">
        <x-slot name="title">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Resolución Administrativa
                </h3>
                <button type="button" wire:click="ocultar_resolucion"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Cerrar Modal</span>
                </button>
            </div>
        </x-slot>
        <x-slot name="content">
            <textarea id="editor"></textarea>
        </x-slot>
        <x-slot name="footer">
            <button wire:click="ocultar_resolucion"
                class="text-sm md:text-sm lg:text-sm font-semibold bg-red-500 hover:bg-red-700 text-white py-2 px-4 mt-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-100">
                Cerrar Ventana
            </button>
        </x-slot>
    </x-dialog-modal>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let editorInstance;

            // Escuchar evento para inicializar CKEditor
            window.addEventListener('abrirModalResolucion', () => {
                if (!editorInstance) {
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(editor => {
                            editorInstance = editor;
                        })
                        .catch(error => {
                            console.error(error);
                        });
                }
            });

            // Escuchar evento para destruir CKEditor
            window.addEventListener('cerrarModalResolucion', () => {
                if (editorInstance) {
                    editorInstance.destroy()
                        .then(() => {
                            editorInstance = null;
                        })
                        .catch(error => {
                            console.error(error);
                        });
                }
            });
        });
    </script>


</div>

<!-- SweetAlert -->
<script>
    // Verificar si hay un mensaje de éxito en la sesión
    @if (session('success'))
        Swal.fire({
            title: '¡Éxito!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
    @endif
</script>
