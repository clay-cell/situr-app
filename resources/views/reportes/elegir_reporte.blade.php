<x-menu>
    <div class="container mx-auto p-4" x-data="{ showModal: false }">
        <div class="flex flex-wrap justify-center gap-6">
            <!-- Card -->
            <div class="w-full sm:w-1/2 lg:w-1/3 p-4">
                <div class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transform transition hover:scale-105"
                    x-data="{ isHovered: false }" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-green-100 text-green-600 rounded-full">
                        <i class="fas fa-file-alt fa-lg"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800 text-center">Reporte de Trámites</h2>
                    <p class="mt-2 text-sm text-gray-600 text-center">
                        Obtén un desglose detallado de los trámites realizados.
                    </p>
                    <div class="mt-4">
                        <button
                            class="w-full py-2 px-4 text-white bg-green-500 rounded-lg shadow-md hover:bg-green-600 transition"
                            x-on:click="showModal = true">
                            Ver Reporte
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <!-- Modal -->
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" x-show="showModal"
            x-cloak>
            <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Generar Reporte</h3>
                <p class="text-sm text-gray-600 text-center mb-6">Selecciona los parámetros y el formato del reporte.
                </p>

                <!-- Formulario -->
                <form x-data="{ format: '' }" method="GET" action="{{ route('generarReporte') }}">
                    <div class="mb-4">
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Fecha inicio</label>
                        <input type="date" id="start_date" name="start_date"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div class="mb-4">
                        <label for="observacion" class="block text-sm font-medium text-gray-700">Estado del
                            trámite</label>
                        <select id="observacion" name="observacion"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                            <option value="">Todos</option>
                            <option value="ingresado">Ingresado</option>
                            <option value="en proceso">En proceso</option>
                            <option value="culminado">Culminado</option>
                        </select>
                    </div>

                    <!-- Selección de formato -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Formato</label>
                        <div class="flex items-center space-x-4 mt-2">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="format" value="pdf" x-model="format"
                                    class="form-radio text-green-500 focus:ring-green-500">
                                <span>PDF</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="format" value="excel" x-model="format"
                                    class="form-radio text-green-500 focus:ring-green-500">
                                <span>Excel</span>
                            </label>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex justify-center space-x-4">
                        <button type="submit"
                            class="flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition"
                            x-bind:disabled="format === ''">
                            Generar
                        </button>
                        <button type="button"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition"
                            x-on:click="showModal = false">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <!-- Card 2 -->
        <div class="w-full sm:w-1/2 lg:w-1/3 p-4">
            <div class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transform transition hover:scale-105"
                x-data="{ isHovered: false }" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                <div
                    class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-blue-100 text-blue-600 rounded-full">
                    <i class="fas fa-chart-pie fa-lg"></i>
                </div>
                <h2 class="text-xl font-semibold text-gray-800 text-center">Estadísticas</h2>
                <p class="mt-2 text-sm text-gray-600 text-center">
                    Analiza las estadísticas y tendencias.
                </p>
                <div class="mt-4">
                    <button
                        class="w-full py-2 px-4 text-white bg-blue-500 rounded-lg shadow-md hover:bg-blue-600 transition"
                        x-bind:class="isHovered ? 'scale-105' : ''">
                        Ver Estadísticas
                    </button>
                </div>
            </div>
        </div>

        {{-- <!-- Card 3 -->
            <div class="w-full sm:w-1/2 lg:w-1/3 p-4">
                <div class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transform transition hover:scale-105"
                    x-data="{ isHovered: false }" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-yellow-100 text-yellow-600 rounded-full">
                        <i class="fas fa-cogs fa-lg"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800 text-center">Configuración</h2>
                    <p class="mt-2 text-sm text-gray-600 text-center">
                        Ajusta las opciones de los trámites y optimiza procesos.
                    </p>
                    <div class="mt-4">
                        <button
                            class="w-full py-2 px-4 text-white bg-yellow-500 rounded-lg shadow-md hover:bg-yellow-600 transition"
                            x-bind:class="isHovered ? 'scale-105' : ''">
                            Configurar
                        </button>
                    </div>
                </div>
            </div> --}}
</x-menu>
