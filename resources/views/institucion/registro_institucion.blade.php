<x-menu>
     <!-- Título -->
     <div class="text-4xl text-gray-700 text-center my-6">
        <h2 class="font-oswald font-bold">Nuevo Establecimiento</h2>
    </div>

    <form action="{{ route('establecimiento.store') }}" method="POST" class="bg-white shadow-lg rounded-lg p-6 space-y-6">
        @csrf
        <h2 class="text-xl font-semibold mb-4 mx-5">Datos Generales</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 bg-white shadow-lg rounded-lg p-6">
            <!-- Campos del Formulario -->

            <!-- Nombre del Establecimiento -->
            <div class="flex flex-col">
                <label for="nombre" class="text-sm font-medium text-gray-700 mb-2">Nombre del Establecimiento</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre del Establecimiento" required
                    value="{{ old('nombre') }}"
                    class="px-4 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                @error('nombre')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Correo Electrónico -->
            <div class="flex flex-col">
                <label for="email" class="text-sm font-medium text-gray-700 mb-2">Correo Electrónico</label>
                <input type="email" id="email" name="email" placeholder="Correo Electrónico" required
                    value="{{ old('email') }}"
                    class="px-4 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Teléfono -->
            <div class="flex flex-col">
                <label for="telefono" class="text-sm font-medium text-gray-700 mb-2">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" required
                    value="{{ old('telefono') }}"
                    class="px-4 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                @error('telefono')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Dirección -->
            <div class="flex flex-col">
                <label for="direccion" class="text-sm font-medium text-gray-700 mb-2">Dirección</label>
                <input type="text" id="direccion" name="direccion" placeholder="Dirección" required
                    value="{{ old('direccion') }}"
                    class="px-4 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                @error('direccion')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <h2 class="text-xl font-semibold mb-4 mx-5">Descripcion del Negocio</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 bg-blue-100 shadow-lg rounded-lg p-6 ">
            <!-- Servicio -->
            <div class="flex flex-col">
                <label for="servicio" class="text-sm font-medium text-gray-700 mb-2">Servicio</label>
                <select id="servicio" name="servicio_id" required
                    class="px-4 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" disabled selected>Seleccione un Servicio</option>
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id }}">{{ $servicio->tipo_servicio }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tipo de Servicio -->
            <div class="flex flex-col">
                <label for="tipo_servicio" class="text-sm font-medium text-gray-700 mb-2">Tipo de Servicio</label>
                <select id="tipo_servicio" name="tipo_servicio_id" required
                    class="px-4 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" disabled selected>Seleccione un Tipo de Servicio</option>
                </select>
            </div>

            <!-- Categoría -->
            <div class="flex flex-col">
                <label for="categoria" class="text-sm font-medium text-gray-700 mb-2">Categoría</label>
                <select id="categoria" name="categoria_id" required
                    class="px-4 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" disabled selected>Seleccione una Categoría</option>
                </select>
            </div>
        </div>
        <!-- Contenedor de la lista de tasas -->
        <h2 class="text-xl font-semibold mb-4 mx-5">Tasas Disponibles</h2>
        <ul id="tasa-list-container" class="space-y-2 bg-gray-100 p-4 rounded-lg shadow-md">
            <li class="text-gray-500">Seleccione los filtros para ver las tasas.</li>
        </ul>

        <!-- Botón de Envío -->
        <div class="flex justify-center mt-6">
            <button type="submit"
                class="px-6 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-offset-2 focus:ring-indigo-500">
                Guardar Establecimiento
            </button>
        </div>


    </form>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const servicioSelect = document.getElementById('servicio');
            const tipoServicioSelect = document.getElementById('tipo_servicio');
            const categoriaSelect = document.getElementById('categoria');

            servicioSelect.addEventListener('change', function() {
                const servicioId = this.value;

                // Limpiar el select de tipo de servicio y categoría
                tipoServicioSelect.innerHTML =
                    '<option value="" disabled selected>Seleccione un Tipo de Servicio</option>';
                categoriaSelect.innerHTML =
                    '<option value="" disabled selected>Seleccione una Categoría</option>';

                if (servicioId) {
                    // Obtener tipos de servicio
                    fetch(`/obtener-tipos-servicio/${servicioId}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(tipoServicio => {
                                const option = document.createElement('option');
                                option.value = tipoServicio.id;
                                option.textContent = tipoServicio.nombre;
                                tipoServicioSelect.appendChild(option);
                            });
                        });
                }
            });

            tipoServicioSelect.addEventListener('change', function() {
                const tipoServicioId = this.value;

                // Limpiar el select de categoría
                categoriaSelect.innerHTML =
                    '<option value="" disabled selected>Seleccione una Categoría</option>';

                if (tipoServicioId) {
                    // Obtener categorías
                    fetch(`/obtener-categorias/${tipoServicioId}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(categoria => {
                                const option = document.createElement('option');
                                option.value = categoria.id;
                                option.textContent = categoria.nombre;
                                categoriaSelect.appendChild(option);
                            });
                        });
                }
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const servicioSelect = document.getElementById('servicio');
            const tipoServicioSelect = document.getElementById('tipo_servicio');
            const categoriaSelect = document.getElementById('categoria');
            const tasaListContainer = document.getElementById('tasa-list-container');

            // Función para actualizar la lista de tasas
            function actualizarTasas() {
                const servicioId = servicioSelect.value;
                const tipoServicioId = tipoServicioSelect.value;
                const categoriaId = categoriaSelect.value;

                fetch(
                        `/obtener-tasas?servicio_id=${servicioId}&tipo_servicio_id=${tipoServicioId}&categoria_id=${categoriaId}`
                        )
                    .then(response => response.json())
                    .then(data => {
                        tasaListContainer.innerHTML = ''; // Limpiar la lista
                        if (data.length > 0) {
                            data.forEach(tasa => {
                                const listItem = document.createElement('li');
                                listItem.textContent =
                                    `${tasa.name} - ${tasa.descripcion}: ${tasa.monto_inicial} Bs.`;
                                tasaListContainer.appendChild(listItem);
                            });
                        } else {
                            tasaListContainer.innerHTML =
                                '<li class="text-gray-500">No se encontraron tasas.</li>';
                        }
                    });
            }

            servicioSelect.addEventListener('change', function() {
                // Actualizar tipos de servicio y categoría y también tasas
                actualizarTasas();
            });

            tipoServicioSelect.addEventListener('change', function() {
                // Actualizar categorías y también tasas
                actualizarTasas();
            });

            categoriaSelect.addEventListener('change', function() {
                // Actualizar tasas
                actualizarTasas();
            });
        });
    </script>
</x-menu>

    <!-- Título -->
    {{-- <div class="text-4xl text-gray-700 text-center my-6">
        <h2 style="font-family: 'Oswald', sans-serif; font-weight: 700;">Nuevo Establecimiento</h2>
    </div>

    <h2 class="text-xl font-semibold mb-4 mx-5">Datos Generales</h2>
    <form action="{{ route('establecimiento.store') }}" method="POST" class="bg-white shadow-lg rounded-lg p-6 space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Campos del Formulario -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del
                    Establecimiento</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre del Establecimiento"
                    required value="{{ old('nombre') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 uppercase">
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" id="email" name="email" placeholder="Correo Electrónico" required
                    value="{{ old('email') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" required
                    value="{{ old('telefono') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 uppercase">
                @error('telefono')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                <input type="text" id="direccion" name="direccion" placeholder="Dirección" required
                    value="{{ old('direccion') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 uppercase">
                @error('direccion')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tipo de Servicio -->
            <div>
                <label for="servicio" class="block text-sm font-medium text-gray-700">Servicio</label>
                <select id="servicio" name="servicio_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    <option value="" disabled selected>Seleccione un Servicio</option>
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id }}" {{ old('servicio_id') == $servicio->id ? 'selected' : '' }}>
                            {{ $servicio->tipo_servicio }}</option>
                    @endforeach
                </select>
                @error('servicio_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tipo de Servicio -->
            <div>
                <label for="tipo_servicio" class="block text-sm font-medium text-gray-700">Tipo de Servicio</label>
                <select id="tipo_servicio" name="tipo_servicio_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    <option value="" disabled selected>Seleccione un Tipo de Servicio</option>
                    @foreach ($tiposServicios as $tipoServicio)
                        <option value="{{ $tipoServicio->id }}"
                            {{ old('tipo_servicio_id') == $tipoServicio->id ? 'selected' : '' }}>
                            {{ $tipoServicio->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('tipo_servicio_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <!-- Categoría -->
            <div>
                <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select id="categoria" name="categoria_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    <option value="" disabled selected>Seleccione una Categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <!-- Botón de Envío -->
        <div class="flex justify-center mt-6">
            <button type="submit"
                class="px-6 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-offset-2 focus:ring-indigo-500">
                Guardar Establecimiento
            </button>
        </div>
    </form> --}}
