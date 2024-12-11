<div class="flex space-x-4">
    <!-- Contenedor Alpine.js para manejo de estados -->
    <div x-data="{
        showModal: false,
        selectedFormat: 'pdf', // Por defecto PDF
        dateOption: 'all', // Por defecto 'todo'
        startDate: '',
        endDate: '',
        tooltip: false,
        exportData() {
            let url = `/export/clientes/${this.selectedFormat}`;

            if (this.dateOption === 'dateRange') {
                url += `?startDate=${this.startDate}&endDate=${this.endDate}`;
            }

            window.location.href = url; // Redirige para descargar el archivo
            this.showModal = false;
        }

    }" class="relative">

        <!-- Botón de Exportar (cualquiera sea el formato) -->
        <a href="#" @click.prevent="showModal = true" @mouseenter="tooltip = true" @mouseleave="tooltip = false"
            class="flex items-center justify-center p-3 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition duration-150 ease-in-out">
            <!-- Icono -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M6 2h9l5 5v13c0 1.1-.9 2-2 2h-12c-1.1 0-2-.9-2-2v-16c0-1.1.9-2 2-2zm9 2h-7v3h7v-3zm-6 11.414l2.707-2.707 2.586 2.586 4.707-4.707-1.414-1.414-3.293 3.293-2.586-2.586-4.707 4.707 1.414 1.414z" />
            </svg>
            <!-- Tooltip -->
            <div x-show="tooltip" class="absolute bg-gray-800 text-white text-xs rounded py-1 px-2 mt-8">
                Exportar
            </div>
        </a>

        <!-- Modal de Exportación -->
        <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50"
            x-cloak>
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-auto">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Opciones de Exportación</h2>

                <!-- Opción de elegir qué exportar -->
                <div class="mb-4">
                    <label class="block text-gray-600 text-sm font-medium mb-2">¿Qué deseas exportar?</label>
                    <div class="flex space-x-4">
                        <button type="button"
                            :class="{ 'bg-blue-500 text-white': dateOption === 'all', 'bg-gray-300': dateOption !== 'all' }"
                            @click="dateOption = 'all'" class="w-full p-2 rounded-lg">
                            Todo
                        </button>
                        <button type="button"
                            :class="{ 'bg-blue-500 text-white': dateOption === 'dateRange', 'bg-gray-300': dateOption !== 'dateRange' }"
                            @click="dateOption = 'dateRange'" class="w-full p-2 rounded-lg">
                            Por Fechas
                        </button>
                    </div>
                </div>

                <!-- Si se selecciona por fechas -->
                <div x-show="dateOption === 'dateRange'" class="mb-4">
                    <label class="block text-gray-600 text-sm font-medium mb-2" for="start_date">Desde:</label>
                    <input type="date" id="start_date" class="w-full p-2 border rounded-md" x-model="startDate">

                    <label class="block text-gray-600 text-sm font-medium mt-4" for="end_date">Hasta:</label>
                    <input type="date" id="end_date" class="w-full p-2 border rounded-md" x-model="endDate">
                </div>

                <!-- Opción de elegir el formato -->
                <div class="mb-4 mt-6">
                    <label class="block text-gray-600 text-sm font-medium mb-2">Formato</label>
                    <div class="flex space-x-4">
                        <button type="button"
                            :class="{ 'bg-red-500 text-white': selectedFormat === 'pdf', 'bg-gray-300': selectedFormat !== 'pdf' }"
                            @click="selectedFormat = 'pdf'" class="w-full p-2 rounded-lg">
                            PDF
                        </button>
                        <button type="button"
                            :class="{ 'bg-green-500 text-white': selectedFormat === 'excel', 'bg-gray-300': selectedFormat !== 'excel' }"
                            @click="selectedFormat = 'excel'" class="w-full p-2 rounded-lg">
                            Excel
                        </button>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex justify-end space-x-4">
                    <button type="button" @click="showModal = false"
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancelar</button>
                    <button type="submit" @click="exportData"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Exportar</button>
                </div>
            </div>
        </div>
    </div>
</div>
