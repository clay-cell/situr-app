<x-menu>
    <div class="p-6 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                Asignar Sanción a la Empresa:
            </h2>

            <!-- Filtro y selección -->
            <div x-data="{
                selectedType: null,
                selectedSanciones: {}, // Almacena las selecciones por tipo
                toggleSancion(tipo, id, nombre) {
                    if (!this.selectedSanciones[tipo]) this.selectedSanciones[tipo] = [];
                    const index = this.selectedSanciones[tipo].findIndex(s => s.id === id);
                    if (index === -1) {
                        this.selectedSanciones[tipo].push({ id, nombre });
                    } else {
                        this.selectedSanciones[tipo].splice(index, 1);
                    }
                },
                isSelected(tipo, id) {
                    return this.selectedSanciones[tipo]?.some(s => s.id === id);
                }
            }" class="space-y-6">

                <!-- Selección del tipo de sanción -->
                <div>
                    <label for="sanciones" class="block text-sm font-medium text-gray-700 mb-1">
                        Selecciona el Tipo de Sanción:
                    </label>
                    <select x-model="selectedType" id="sanciones"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Seleccione un tipo de sanción</option>
                        @foreach ($tipo_sancion as $t_sancion)
                            <option value="{{ $t_sancion->id }}">
                                {{ $t_sancion->tipo_sancion }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Lista de sanciones dinámicas -->
                <div x-show="selectedType" x-cloak>
                    <form action="{{ route('sancion_institucion.store', $institucion->id) }}" class="space-y-4"
                        method="POST">
                        @csrf
                        @foreach ($sancion as $item)
                            <template x-if="{{ $item->sancion_id }} == selectedType">
                                <div class="flex items-center space-x-3">
                                    <input type="checkbox"
                                        name="sanciones[]"
                                        value="{{ $item->id }}"
                                        :checked="isSelected(selectedType, {{ $item->id }})"
                                        @change="toggleSancion(selectedType, {{ $item->id }}, '{{ $item->nombre_sancion }}')"
                                        id="sancion-{{ $item->id }}"
                                        class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                    <label for="sancion-{{ $item->id }}" class="text-gray-700">
                                        {{ $item->nombre_sancion }}
                                    </label>
                                </div>

                            </template>
                        @endforeach
                        <button type="submit" class="bg-green-600 text-gray-50 rounded-md shadow-md px-3 py-2">
                            Guardar
                        </button>
                    </form>
                </div>

                <!-- Sanciones seleccionadas dinámicas -->
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Sanciones Seleccionadas:</h3>
                    <template x-for="(sanciones, tipo) in selectedSanciones" :key="tipo">
                        <div>
                            <h4 class="text-md font-medium text-gray-600 mb-1">
                                Tipo: <span x-text="tipo"></span>
                            </h4>
                            <ul class="list-disc list-inside text-gray-700">
                                <template x-for="sancion in sanciones" :key="sancion.id">
                                    <li x-text="sancion.nombre"></li>
                                </template>
                            </ul>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</x-menu>
