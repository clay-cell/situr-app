<x-menu>
    <div x-data="pdfViewer" class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6">{{ $institucion->nombre }}</h2>
        <h2 class="text-2xl font-bold mb-6">Registro de Cliente</h2>
        <form action="{{ route('clientes.store',$institucion->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Nombres -->
                <div>
                    <label for="nombres" class="block text-sm font-medium text-gray-700">Nombres</label>
                    <input type="text" name="nombres" id="nombres" placeholder="Ingrese nombres" value="{{ old('nombres') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    @error('nombres') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Apellidos -->
                <div>
                    <label for="paterno" class="block text-sm font-medium text-gray-700">Apellido Paterno</label>
                    <input type="text" name="paterno" id="paterno"  placeholder="Ingrese su apellido Paterno" value="{{ old('paterno') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('paterno') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="materno" class="block text-sm font-medium text-gray-700">Apellido Materno</label>
                    <input type="text" name="materno" id="materno"  placeholder="Ingrese su apellido Materno" value="{{ old('materno') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('materno') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Identificación -->
                <div>
                    <label for="identificacion" class="block text-sm font-medium text-gray-700">Identificación</label>
                    <input type="text" name="identificacion" id="identificacion" required placeholder="Ingrese identificación" value="{{ old('identificacion') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('identificacion') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Expedido -->
                <div>
                    <label for="expedido" class="block text-sm font-medium text-gray-700">Expedido</label>
                    <input type="text" name="expedido" id="expedido" required placeholder="Lugar de expedición" value="{{ old('expedido') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('expedido') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Fecha de ingreso -->
                <div>
                    <label for="fecha_ingreso" class="block text-sm font-medium text-gray-700">Fecha de Ingreso</label>
                    <input type="date" name="fecha_ingreso" id="fecha_ingreso" required value="{{ old('fecha_ingreso') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        :min="new Date().toISOString().split('T')[0]">
                    @error('fecha_ingreso') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="time" class="block mb-2 text-sm font-medium text-gray-900">Select time:</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <input type="time" name="hora_entrada" id="fecha_ingreso" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "  value="00:00" required value="{{ old('hora_entrada') }}" />
                        @error('hora_entrada') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Subir PDF y Mostrar Previsualización -->
            <div class="mt-4">
                <label for="pdf" class="block text-sm font-medium text-gray-700">Subir PDF</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf"
                       @change="loadPdf($event)" class="block w-full mt-1 text-sm text-gray-500">
                @error('pdf') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror

                <!-- Previsualización del PDF -->
                <div x-show="pdfUrl" class="mt-4">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Previsualización de Documento PDF</h3>
                    <div class="border rounded-md shadow-md overflow-hidden" style="height: 500px;">
                        <iframe :src="pdfUrl" class="w-full h-full rounded-md border-none"></iframe>
                    </div>
                    <button @click="clearPdf" type="button" class="mt-4 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md shadow-md">
                        Cerrar Previsualización
                    </button>
                </div>
            </div>

            <!-- Botón de Enviar -->
            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-indigo-700">Registrar Cliente</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('pdfViewer', () => ({
                pdfUrl: null,

                loadPdf(event) {
                    const file = event.target.files[0];
                    if (file && file.type === "application/pdf") {
                        this.pdfUrl = URL.createObjectURL(file);
                    }
                },

                clearPdf() {
                    this.pdfUrl = null;
                }
            }));
        });
    </script>
</x-menu>
