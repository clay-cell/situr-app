<x-menu>
    <h2 class="text-xl font-bold mb-4">Editar información de un usuario</h2>
    <form action="{{ route('users.update',$users->id) }}" method="POST" class="space-y-4">
        @csrf <!-- Asegúrate de incluir esto si estás utilizando protección CSRF -->
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="nombres">
                    <i class="fas fa-user"></i> Nombres
                </label>
                <input type="text" id="nombres" name="nombres" value="{{ $users->name }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700" for="primer_apellido">
                    <i class="fas fa-user-tag"></i> Apellido Paterno
                </label>
                <input type="text" id="primer_apellido" name="primer_apellido" value="{{ $users->primer_apellido }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-500">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="segundo_apellido">
                    <i class="fas fa-user-tag"></i> Apellido Materno
                </label>
                <input type="text" id="segundo_apellido" name="segundo_apellido" value="{{ $users->segundo_apellido }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700" for="cedula">
                    <i class="fas fa-id-card"></i> Cédula
                </label>
                <input type="text" id="cedula" name="cedula" value="{{ $users->cedula }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-500">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="extension">
                    <i class="fas fa-map-marker-alt"></i> Expedito
                </label>
                <select id="extension" name="extension" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-500">
                    <option value="">Seleccione una opción</option>
                    <option value="LP." {{ $users->extension == 'LP.' ? 'selected' : '' }}>La Paz</option>
                    <option value="CB." {{ $users->extension == 'CB.' ? 'selected' : '' }}>Cochabamba</option>
                    <option value="CH." {{ $users->extension == 'CH.' ? 'selected' : '' }}>Chuquisaca</option>
                    <option value="OR." {{ $users->extension == 'OR.' ? 'selected' : '' }}>Oruro</option>
                    <option value="PT." {{ $users->extension == 'PT.' ? 'selected' : '' }}>Potosí</option>
                    <option value="TN." {{ $users->extension == 'TN.' ? 'selected' : '' }}>Tarija</option>
                    <option value="SC." {{ $users->extension == 'SC.' ? 'selected' : '' }}>Santa Cruz</option>
                    <option value="BZ." {{ $users->extension == 'BZ.' ? 'selected' : '' }}>Beni</option>
                    <option value="PD." {{ $users->extension == 'PD.' ? 'selected' : '' }}>Pando</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700" for="nacionalidad">
                    <i class="fas fa-flag"></i> Nacionalidad
                </label>
                <input type="text" id="nacionalidad" name="nacionalidad" value="{{ $users->nacionalidad }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-500">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="direccion">
                    <i class="fas fa-home"></i> Dirección
                </label>
                <input type="text" id="direccion" name="direccion" value="{{ $users->direccion }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700" for="ciudad">
                    <i class="fas fa-city"></i> Ciudad
                </label>
                <input type="text" id="ciudad" name="ciudad" value="{{ $users->ciudad }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-500">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="telefono">
                    <i class="fas fa-phone"></i> Teléfono
                </label>
                <input type="text" id="telefono" name="telefono" value="{{ $users->telefono }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700" for="celular">
                    <i class="fas fa-mobile-alt"></i> Celular
                </label>
                <input type="text" id="celular" name="celular" value="{{ $users->celular }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-500">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="lugar_nacimiento">
                    <i class="fas fa-birthday-cake"></i> Lugar de Nacimiento
                </label>
                <input type="text" id="lugar_nacimiento" name="lugar_nacimiento" value="{{ $users->lugar_nacimiento }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700" for="fecha_nacimiento">
                    <i class="fas fa-calendar-alt"></i> Fecha de Nacimiento
                </label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $users->fecha_nacimiento }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-500">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Género</label>
            <div class="mt-1">
                <label class="block inline-flex items-center mb-2">
                    <input type="radio" class="form-radio" name="sexo" value="V" {{ $users->sexo == 'V' ? 'checked' : '' }}>
                    <span class="ml-2">VARON</span>
                </label>
                <label class="block inline-flex items-center">
                    <input type="radio" class="form-radio" name="sexo" value="M" {{ $users->sexo == 'M' ? 'checked' : '' }}>
                    <span class="ml-2">MUJER</span>
                </label>
            </div>
        </div>



        <button type="submit" class="mt-4 bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
            <i class="fas fa-save"></i> Actualizar
        </button>
    </form>
</x-menu>
