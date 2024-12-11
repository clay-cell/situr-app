<div class="container mx-auto px-6 py-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center uppercase">
        Gestión de Documentos {{ $tipo_tramite->nombre_tramite }}
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @if (
            $tipo_tramite->nombre_tramite === 'OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL' ||
                $tipo_tramite->nombre_tramite === 'RENOVACIÓN DE LA LICENCIA TURÍSTICA DEPARTAMENTAL')
            @foreach ([['icon' => 'file-pdf', 'color' => 'indigo-600', 'label' => 'Informe Técnico'], ['icon' => 'certificate', 'color' => 'emerald-600', 'label' => 'Certificado de Validación de Categoría'], ['icon' => 'balance-scale', 'color' => 'blue-800', 'label' => 'Informe Legal'], ['icon' => 'gavel', 'color' => 'slate-700', 'label' => 'Resolución Administrativa para Otorgación Turística'], ['icon' => 'address-card', 'color' => 'teal-600', 'label' => 'Licencia Turística Departamental']] as $doc)
                <div class="group relative p-8 bg-gray-50 shadow-md rounded-lg hover:shadow-xl transform hover:scale-105 transition duration-300 ease-in-out cursor-pointer"
                    wire:click="mostrarModal('{{ $doc['label'] }}')">
                    <i class="fas fa-{{ $doc['icon'] }} text-7xl text-{{ $doc['color'] }} mb-4"></i>
                    <p class="text-xl font-bold text-gray-800 group-hover:text-{{ $doc['color'] }}">
                        {{ $doc['label'] }}
                    </p>
                </div>
            @endforeach
        @else
            @foreach ([['icon' => 'envelope', 'color' => 'indigo-600', 'label' => 'Solicitud de Baja (Carta Formal)'], ['icon' => 'file-pdf', 'color' => 'blue-800', 'label' => 'Informe Técnico'], ['icon' => 'balance-scale', 'color' => 'emerald-600', 'label' => 'Informe Legal'], ['icon' => 'gavel', 'color' => 'slate-700', 'label' => 'Resolución Administrativa']] as $doc)
                <div class="group relative p-8 bg-gray-50 shadow-md rounded-lg hover:shadow-xl transform hover:scale-105 transition duration-300 ease-in-out cursor-pointer"
                    wire:click="mostrarModal('{{ $doc['label'] }}')">
                    <i class="fas fa-{{ $doc['icon'] }} text-7xl text-{{ $doc['color'] }} mb-4"></i>
                    <p class="text-xl font-bold text-gray-800 group-hover:text-{{ $doc['color'] }}">
                        {{ $doc['label'] }}
                    </p>
                </div>
            @endforeach
        @endif
    </div>

    @if ($documentosCompletos)
        <div x-data="{
            confirmarTramite() {
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: 'Esta acción procesará el trámite.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, procesar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            @this.culminarTramite()
                        }
                    });
                },

                mostrarExito() {
                    Swal.fire({
                        title: 'Trámite procesado',
                        text: 'El trámite fue procesado exitosamente.',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Aceptar'
                    });
                }
        }" x-on:confirmar-procesar-tramite.window="confirmarTramite"
            x-on:tramite-procesado-exitosamente.window="mostrarExito">

            <!-- Botón para procesar trámite -->
            <button wire:click="confirmarProcesarTramite"
                class="bg-blue-800 text-white px-4 py-2 rounded-md hover:bg-blue-900 transition duration-300 mt-8">
                Procesar Trámite
            </button>
        </div>
    @else
        <p class="text-red-600 font-semibold mt-6">
            Faltan documentos por subir para completar el trámite.
        </p>
    @endif

    {{-- Modal Jetstream --}}
    <x-dialog-modal wire:model="visualizar_modal">
        <x-slot name="title">
            <h3 class="text-2xl font-semibold text-gray-800">
                {{ $mostrarPdf ? 'Ver Documento Existente' : 'Subir Documento' }}
            </h3>
        </x-slot>

        <x-slot name="content">
            @if ($mostrarPdf)
                <div>
                    <h4 class="text-lg text-gray-700 mb-4">Documento existente:</h4>
                    <iframe src="{{ asset('storage/' . $pdfUrl) }}"
                        class="w-full h-96 border rounded-md shadow-md"></iframe>
                </div>
            @else
                <form wire:submit.prevent="guardarDocumento" class="space-y-6">
                    <div>
                        <x-label for="titulo" value="Título del Documento" class="text-gray-700 font-semibold" />
                        <x-input type="text" id="titulo" wire:model="documento_actual" readonly
                            class="w-full mt-2 uppercase border-gray-300 rounded-md" />
                    </div>

                    <div>
                        <x-label for="archivo_pdf" value="Archivo PDF" class="text-gray-700 font-semibold" />
                        <input type="file" id="archivo_pdf" wire:model="archivo_pdf" accept=".pdf"
                            class="w-full mt-2 border rounded-md p-2">
                        @error('archivo_pdf')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </form>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="cerrarModal"
                class="bg-gray-600 hover:text-white px-4 py-2 rounded-md hover:bg-red-600 transition">
                Cerrar
            </x-secondary-button>
            @if (!$mostrarPdf)
                <x-button wire:click="guardarDocumento"
                    class="bg-green-700 text-white px-4 py-2 rounded-md ml-2 hover:bg-green-800 transition">
                    Subir
                </x-button>
            @endif
        </x-slot>
    </x-dialog-modal>
</div>
