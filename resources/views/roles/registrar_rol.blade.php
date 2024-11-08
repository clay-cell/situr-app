<x-menu>
    <h2 class="text-3xl font-semibold text-gray-700 mb-6 text-center">Lista de Roles</h2>

    <section class="py-8">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-white shadow-lg rounded-lg border border-gray-200">

                <!-- Header -->
                <div class="bg-blue-600 text-white rounded-t px-4 py-3 flex justify-between items-center">
                    <h6 class="text-lg font-bold">Nuevo Rol</h6>
                </div>

                <!-- Formulario -->
                <div class="p-6">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf

                        <!-- Nombre del rol -->
                        <div class="mb-5">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre de rol</label>
                            <input type="text" name="name"
                                class="mt-1 block w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-900 placeholder-gray-400"
                                placeholder="Introduzca nombre del nuevo rol">
                            @error('name')
                                <span class="text-red-500 text-sm">*{{ $message }}</span>
                            @enderror
                            <input type="hidden" name="guard_name" value="web">
                        </div>

                        <!-- Lista de permisos -->
                        <div class="mb-5">
                            <h2 class="text-gray-700 font-semibold text-sm mb-3">Lista de Permisos</h2>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach ($permisos as $permiso)
                                    <div class="flex items-center">
                                        <input type="checkbox" name="permisos[]" value="{{ $permiso->id }}" id="permiso_{{ $permiso->id }}"
                                            class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                        <label for="permiso_{{ $permiso->id }}" class="ml-2 text-sm text-gray-700">{{ $permiso->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Botón -->
                        <div class="text-right">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm py-2 px-6 rounded-md shadow-md transition duration-150 ease-in-out">
                                Asignar permisos a rol
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-menu>
