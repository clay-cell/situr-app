<x-menu>
    <div class="w-full max-w-7xl mx-auto p-4 bg-white shadow rounded-lg">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Perfil</h2>

        <!-- Etiquetas fijas para mostrar información -->
        <div class="space-y-2">
            <div class="flex justify-between items-center border-b border-gray-200 py-2">
                <span class="text-gray-600 font-medium">Usuario:</span>
                <span class="text-gray-800">{{ $user->name . ' ' . $user->primer_apellido . ' ' . $user->segundo_apellido }}</span>
            </div>
            <div class="flex justify-between items-center border-b border-gray-200 py-2">
                <span class="text-gray-600 font-medium">Correo:</span>
                <span class="text-gray-800">{{ $user->email }}</span>
            </div>
            <div class="flex justify-between items-center border-b border-gray-200 py-2">
                <span class="text-gray-600 font-medium">Cédula de Identidad:</span>
                <span class="text-gray-800">{{ $user->cedula . ' - ' . $user->extension }}</span>
            </div>
            <div class="flex justify-between items-center border-b border-gray-200 py-2">
                <span class="text-gray-600 font-medium">Nacionalidad:</span>
                <span class="text-gray-800">{{ $user->nacionalidad }}</span>
            </div>
            <div class="flex justify-between items-center border-b border-gray-200 py-2">
                <span class="text-gray-600 font-medium">Dirección:</span>
                <span class="text-gray-800">{{ $user->direccion }}</span>
            </div>
            <div class="flex justify-between items-center border-b border-gray-200 py-2">
                <span class="text-gray-600 font-medium">Contacto:</span>
                <span class="text-gray-800">{{ $user->telefono . ' / ' . $user->celular }}</span>
            </div>
            <div class="flex justify-between items-center border-b border-gray-200 py-2">
                <span class="text-gray-600 font-medium">Fecha de Nacimiento:</span>
                <span class="text-gray-800">{{ $user->fecha_nacimiento }}</span>
            </div>
            <div class="flex justify-between items-center border-b border-gray-200 py-2">
                <span class="text-gray-600 font-medium">Género:</span>
                <span class="text-gray-800">{{ $user->sexo == 'V' ? 'Varón' : 'Mujer' }}</span>
            </div>
        </div>

        @if (Auth::user()->hasRole('Contribuyente'))
            <div x-data="{ editMode: false }" class="mt-4">
                <button
                    @click="editMode = !editMode"
                    class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-400 transition">
                    <span x-show="!editMode">Editar Información</span>
                    <span x-show="editMode">Cancelar</span>
                </button>

                <form x-show="editMode" action="" method="POST" class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-4" x-cloak>
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-gray-600">Teléfono</label>
                        <input type="text" name="telefono" value="{{ $user->telefono }}"
                            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block text-gray-600">Celular</label>
                        <input type="text" name="celular" value="{{ $user->celular }}"
                            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="col-span-full">
                        <label class="block text-gray-600">Dirección</label>
                        <input type="text" name="direccion" value="{{ $user->direccion }}"
                            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <button type="submit" class="col-span-full w-full bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-400 transition">
                        Actualizar
                    </button>
                </form>
            </div>
        @else
            <form action="" method="POST" class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Campos de entrada con etiquetas a la izquierda -->
                <div>
                    <img id="profileImage"
                         src="{{ $user->profile_photo_path ? asset($user->profile_photo_path) : asset('imgs/subirfoto.jpg') }}"
                         alt="Profile Photo"
                         style="cursor: pointer;"
                         onclick="document.getElementById('imageUpload').click();" class="w-20 h-20 rounded-full shadow-md">
                    <input type="file" id="imageUpload" style="display: none;" accept="image/*" onchange="previewImage(event)">
                </div>

                <script>
                    function previewImage(event) {
                        const file = event.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                document.getElementById('profileImage').src = e.target.result;
                            }
                            reader.readAsDataURL(file);
                        }
                    }
                </script>
                <div>
                    <label class="block text-gray-600">Nombres:</label>
                    <input type="text" name="nombres" value="{{ $user->name }}" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-gray-600">Apellido Paterno</label>
                    <input type="text" name="primer_apellido" value="{{ $user->primer_apellido }}" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-gray-600">Apellido Materno</label>
                    <input type="text" name="segundo_apellido" value="{{ $user->segundo_apellido }}" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-gray-600">Nacionalidad</label>
                    <input type="text" name="nacionalidad" value="{{ $user->nacionalidad }}" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-gray-600">Cédula</label>
                    <input type="text" name="cedula" value="{{ $user->cedula }}" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-gray-600">Expedido</label>
                    <select id="extension" name="extension" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">Seleccione una opción</option>
                        <option value="LP." {{ $user->extension == 'LP.' ? 'selected' : '' }}>La Paz</option>
                        <!-- Resto de opciones aquí -->
                    </select>
                </div>
                <!-- Otros campos de contacto y dirección -->
                <div>
                    <label class="block text-gray-600">Dirección</label>
                    <input type="text" name="direccion" value="{{ $user->direccion }}"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block text-gray-600">Teléfono</label>
                    <input type="text" name="telefono" value="{{ $user->telefono }}"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block text-gray-600">Celular</label>
                    <input type="text" name="celular" value="{{ $user->celular }}"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-gray-600">Password</label>
                    <input type="password" name="password"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-gray-600">Confirmar Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <!-- Continuar con los demás campos, todos en el mismo estilo -->
                <div class="col-span-full">
                    <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-400 transition">
                        Actualizar
                    </button>
                </div>
            </form>
        @endif
    </div>
    <hr class="mt-4">
    <div class="flex justify-between mt-4">
        <p class="text-gray-600">Esto es algo</p>
        <div>
            @livewire('profile.logout-other-browser-sessions-form')
        </div>
    </div>

</x-menu>

