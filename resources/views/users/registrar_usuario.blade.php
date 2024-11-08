<x-menu>
    <div x-data="{ formType: 'administrativo' }">
        <div class="flex justify-center space-x-4 mb-6">
            <button @click="formType = 'administrativo'"
                :class="{ 'bg-indigo-600 text-white': formType === 'administrativo', 'bg-gray-200': formType !== 'administrativo' }"
                class="px-6 py-4 rounded-lg h-48 w-48 shadow-lg hover:shadow-xl transition-transform transform hover:scale-105">
                <i class="fa-solid fa-user-tie text-5xl mb-2"></i>
                <span class="block text-lg font-semibold">Área Administrativa</span>
            </button>
            <button @click="formType = 'contribuyente'"
                :class="{ 'bg-indigo-600 text-white': formType === 'contribuyente', 'bg-gray-200': formType !== 'contribuyente' }"
                class="px-6 py-4 rounded-lg h-48 w-48 shadow-lg hover:shadow-xl transition-transform transform hover:scale-105">
                <i class="fa-solid fa-plane-up text-5xl mb-2"></i>
                <span class="block text-lg font-semibold">Contribuyente</span>
            </button>
        </div>
        <!--formulario Administrativo-->
        <form x-show="formType === 'administrativo'" action="{{ route('users.store') }}" method="POST"
            enctype="multipart/form-data" x-data="{ sexo: '' }"
            class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
            @csrf
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Formulario de Registro Administrativo</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- CITE -->
                <div>
                    <label for="cite" class="block text-sm font-medium text-gray-600">CITE</label>
                    <input type="text" id="cite" name="cite" value="{{ old('CITE') }}" required
                        maxlength="255"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('cite')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nombre -->
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-600">Nombre</label>
                    <input type="text" id="nombres" name="nombres" value="{{ old('nombres') }}" required
                        maxlength="255"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('nombres')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Primer Apellido -->
                <div>
                    <label for="primer_apellido" class="block text-sm font-medium text-gray-600">Primer Apellido</label>
                    <input type="text" id="primer_apellido" name="primer_apellido"
                        value="{{ old('primer_apellido') }}" maxlength="255"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('primer_apellido')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Segundo Apellido -->
                <div>
                    <label for="segundo_apellido" class="block text-sm font-medium text-gray-600">Segundo
                        Apellido</label>
                    <input type="text" id="segundo_apellido" name="segundo_apellido"
                        value="{{ old('segundo_apellido') }}" maxlength="255"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('segundo_apellido')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nacionalidad -->
                <div>
                    <label for="nacionalidad" class="block text-sm font-medium text-gray-600">Nacionalidad</label>
                    <input type="text" id="nacionalidad" name="nacionalidad" value="{{ old('nacionalidad') }}"
                        required maxlength="255"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('nacionalidad')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Cedula -->
                <div>
                    <label for="cedula" class="block text-sm font-medium text-gray-600">Cédula</label>
                    <input type="text" id="cedula" name="cedula" value="{{ old('cedula') }}" required
                        maxlength="8"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('cedula')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Extensión -->
                <div>
                    <label for="extension" class="block text-sm font-medium text-gray-600">Extensión</label>
                    <select id="extension" name="extension"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-500">
                        <option value="">Seleccione una opción</option>
                        <option value="LP." {{ old('extension') == 'LP.' ? 'selected' : '' }}>La Paz</option>
                        <option value="CB." {{ old('extension') == 'CB.' ? 'selected' : '' }}>Cochabamba</option>
                        <option value="CH." {{ old('extension') == 'CH.' ? 'selected' : '' }}>Chuquisaca</option>
                        <option value="OR." {{ old('extension') == 'OR.' ? 'selected' : '' }}>Oruro</option>
                        <option value="PT." {{ old('extension') == 'PT.' ? 'selected' : '' }}>Potosí</option>
                        <option value="TN." {{ old('extension') == 'TN.' ? 'selected' : '' }}>Tarija</option>
                        <option value="SC." {{ old('extension') == 'SC.' ? 'selected' : '' }}>Santa Cruz</option>
                        <option value="BZ." {{ old('extension') == 'BZ.' ? 'selected' : '' }}>Beni</option>
                        <option value="PD." {{ old('extension') == 'PD.' ? 'selected' : '' }}>Pando</option>
                    </select>
                    @error('extension')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Rol -->
                <div>
                    <label for="rol" class="block text-sm font-medium text-gray-600">Rol</label>
                    <select id="rol" name="rol"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-500">
                        <option value="" selected disabled>Selecciona un Rol</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" {{ old('rol') == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('rol')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Dirección -->
                <div>
                    <label for="direccion" class="block text-sm font-medium text-gray-600">Dirección</label>
                    <input type="text" id="direccion" name="direccion" required maxlength="255"
                        value="{{ old('direccion') }}"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('direccion')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Ciudad -->
                <div>
                    <label for="ciudad" class="block text-sm font-medium text-gray-600">Ciudad</label>
                    <input type="text" id="ciudad" name="ciudad" required maxlength="255"
                        value="{{ old('ciudad') }}"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('ciudad')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" id="email" name="email" required maxlength="255"
                        value="{{ old('email') }}"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Teléfono -->
                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-600">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" maxlength="8" pattern="[0-9]{1,8}"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('telefono')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Celular -->
                <div>
                    <label for="celular" class="block text-sm font-medium text-gray-600">Celular</label>
                    <input type="text" id="celular" name="celular" required maxlength="8"
                        value="{{ old('celular') }}" pattern="[0-9]{1,8}"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('celular')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Lugar de Nacimiento -->
                <div>
                    <label for="lugar_nacimiento" class="block text-sm font-medium text-gray-600">Lugar de
                        Nacimiento</label>
                    <input type="text" id="lugar_nacimiento" name="lugar_nacimiento" required maxlength="255"
                        value="{{ old('lugar_nacimiento') }}"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('lugar_nacimiento')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Fecha de Nacimiento -->
                <div>
                    <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-600">Fecha de
                        Nacimiento</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required
                        value="{{ old('fecha_nacimiento') }}"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('fecha_nacimiento')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Sexo -->
                <div>
                    <label class="block text-sm font-medium text-gray-600">Sexo</label>
                    <div class="mt-1 flex items-center space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="sexo" value="V" x-model="sexo" required
                                class="text-indigo-600 focus:ring-indigo-500 border-gray-300"
                                {{ old('sexo') === 'V' ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">VARON</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="sexo" value="M" x-model="sexo" required
                                class="text-indigo-600 focus:ring-indigo-500 border-gray-300"
                                {{ old('sexo') === 'M' ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">MUJER</span>
                        </label>
                    </div>
                    @error('sexo')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div x-data="{ previewUrl: null }">
                    <label for="foto" class="block text-sm font-medium text-gray-600">Foto</label>

                    <!-- Campo de archivo para cargar la foto -->
                    <input type="file" id="foto" name="foto" required accept="image/jpeg,image/png,image/jpg"
                           @change="previewUrl = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null"
                           class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                    <!-- Mensaje de error de validación -->
                    @error('foto')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror

                    <!-- Imagen de previsualización -->
                    <template x-if="previewUrl">
                        <img :src="previewUrl" alt="Previsualización de la foto" class="mt-4 w-32 h-32 object-cover border border-gray-300 rounded-md">
                    </template>
                </div>

            </div>

            <div class="mt-6">
                <button type="submit"
                    class="w-full md:w-auto px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Registrar</button>
            </div>
        </form>
        <!--Formulario Contribuyente-->
        <form x-show="formType === 'contribuyente'" action="{{ route('users.registrar_contribuyentes') }}" method="POST"
            enctype="multipart/form-data" x-data="{ sexo: '' }"
            class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
            @csrf
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Formulario de Registro</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Nombre -->
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-600">Nombre</label>
                    <input type="text" id="nombre" name="nombre" required maxlength="255"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Primer Apellido -->
                <div>
                    <label for="primer_apellido" class="block text-sm font-medium text-gray-600">Primer
                        Apellido</label>
                    <input type="text" id="primer_apellido" name="primer_apellido" maxlength="255"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Segundo Apellido -->
                <div>
                    <label for="segundo_apellido" class="block text-sm font-medium text-gray-600">Segundo
                        Apellido</label>
                    <input type="text" id="segundo_apellido" name="segundo_apellido" maxlength="255"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Nacionalidad -->
                <div>
                    <label for="nacionalidad" class="block text-sm font-medium text-gray-600">Nacionalidad</label>
                    <input type="text" id="nacionalidad" name="nacionalidad" required maxlength="255"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Cedula -->
                <div>
                    <label for="cedula" class="block text-sm font-medium text-gray-600">Cédula</label>
                    <input type="text" id="cedula" name="cedula" required maxlength="8"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Extensión -->
                <div>
                    <label for="extension" class="block text-sm font-medium text-gray-600">Extensión</label>
                    <select id="extension" name="extension"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-500">
                        <option value="">Seleccione una opción</option>
                        <option value="LP.">La Paz</option>
                        <option value="CB.">Cochabamba</option>
                        <option value="CH.">Chuquisaca</option>
                        <option value="OR.">Oruro</option>
                        <option value="PT.">Potosí</option>
                        <option value="TN.">Tarija</option>
                        <option value="SC.">Santa Cruz</option>
                        <option value="BZ.">Beni</option>
                        <option value="PD.">Pando</option>
                    </select>
                </div>

                <!-- Dirección -->
                <div>
                    <label for="direccion" class="block text-sm font-medium text-gray-600">Dirección</label>
                    <input type="text" id="direccion" name="direccion" required maxlength="255"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Ciudad -->
                <div>
                    <label for="ciudad" class="block text-sm font-medium text-gray-600">Ciudad</label>
                    <input type="text" id="ciudad" name="ciudad" required maxlength="255"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" id="email" name="email" required maxlength="255"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Teléfono -->
                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-600">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" maxlength="8" pattern="[0-9]{1,8}"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Celular -->
                <div>
                    <label for="celular" class="block text-sm font-medium text-gray-600">Celular</label>
                    <input type="text" id="celular" name="celular" required maxlength="8"
                        pattern="[0-9]{1,8}"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Lugar de Nacimiento -->
                <div>
                    <label for="lugar_nacimiento" class="block text-sm font-medium text-gray-600">Lugar de
                        Nacimiento</label>
                    <input type="text" id="lugar_nacimiento" name="lugar_nacimiento" required maxlength="255"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Fecha de Nacimiento -->
                <div>
                    <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-600">Fecha de
                        Nacimiento</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Sexo -->
                <div>
                    <label class="block text-sm font-medium text-gray-600">Sexo</label>
                    <div class="mt-1 flex items-center space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="sexo" value="V" x-model="sexo" required
                                class="text-indigo-600 focus:ring-indigo-500 border-gray-300">
                            <span class="ml-2 text-gray-700">VARON</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="sexo" value="M" x-model="sexo" required
                                class="text-indigo-600 focus:ring-indigo-500 border-gray-300">
                            <span class="ml-2 text-gray-700">MUJER</span>
                        </label>
                    </div>
                </div>


                <!-- Foto -->
                <div>
                    <label for="foto" class="block text-sm font-medium text-gray-600">Foto</label>
                    <input type="file" id="foto" name="foto" required
                        accept="image/jpeg,image/png,image/jpg"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Carta de Solicitud -->
                <div>
                    <label for="carta_solicitud" class="block text-sm font-medium text-gray-600">Carta de Solicitud
                        (PDF)</label>
                    <input type="file" id="carta_solicitud" name="carta_solicitud" required
                        accept="application/pdf"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="w-full md:w-auto px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Registrar</button>
            </div>
        </form>
    </div>
</x-menu>
@if (session('success'))
    <script>
        Swal.fire({
            title: 'Éxito',
            text: '{{ session('success') }}',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
@endif
