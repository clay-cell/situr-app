<x-menu>
    <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Roles del Sistema</h2>

    <section class="py-8">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-white shadow-md rounded-lg border border-gray-200">

                <!-- Encabezado -->
                <div class="bg-indigo-600 text-white rounded-t px-4 py-3 flex justify-between items-center">
                    <h6 class="text-lg font-semibold">Actualizar Rol</h6>
                </div>

                <!-- Formulario -->
                <div class="p-6">
                    <form action="{{ route('roles.update', $roles->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nombre del Rol -->
                        <div class="mb-5">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Rol</label>
                            <input type="text" name="name"
                                class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-gray-900"
                                value="{{ $roles->name }}" placeholder="Introduzca nombre del rol">
                            @error('name')
                                <span class="text-red-500 text-sm">*{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Lista de Permisos -->
                        <div class="mb-5">
                            <h2 class="text-gray-800 font-semibold text-sm mb-3">Permisos Asignados</h2>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach ($permisos as $permiso)
                                    <div class="flex items-center">
                                        <input type="checkbox" name="permisos[]" value="{{ $permiso->id }}"
                                            id="permiso_{{ $permiso->id }}"
                                            @if (in_array($permiso->id, $permisos_roles)) checked @endif
                                            class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="permiso_{{ $permiso->id }}" class="ml-2 text-sm text-gray-700">{{ $permiso->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <input type="hidden" name="guard_name" value="web">
                        </div>

                        <!-- Botón de Guardar Cambios -->
                        <div class="text-right">
                            <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-md shadow-md transition duration-150 ease-in-out">
                                Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-menu>
