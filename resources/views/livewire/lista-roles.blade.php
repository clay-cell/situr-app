<div class="container mx-auto p-4">
    <div class="bg-gray-100 p-6 rounded-lg shadow-md">
        <h1 class="text-4xl mb-4 font-semibold text-gray-800">Lista de Roles <i class="fa-solid fa-user-tie"></i></h1>

        <!-- Barra de búsqueda -->
        <div class="flex items-center justify-between mb-6">
            <div class="relative">
                <input type="text" wire:model="search" placeholder="Buscar roles..."
                       class="w-full p-2 pl-10 text-gray-700 bg-white rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-500"
                       aria-label="Buscar roles">
                <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
            </div>
            <a href="{{ route('roles.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm px-4 py-2 rounded-lg shadow-lg transition duration-200">
                Nuevo Rol
            </a>
        </div>

        <!-- Tabla de Roles -->
        <div class="overflow-x-auto">
            <div class="min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Nº</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Nombre completo</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Permisos</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Actualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr class="hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-5 py-4 border-b border-gray-200 text-sm text-gray-700">{{ $role->id }}</td>
                                <td class="px-5 py-4 border-b border-gray-200 text-sm capitalize text-gray-700">{{ $role->name }}</td>
                                <td class="px-5 py-4 border-b border-gray-200 text-sm">
                                    @foreach ($role->permissions as $permission)
                                        <span class="inline-block bg-blue-200 text-blue-800 text-xs font-semibold mr-2 mb-2 px-2 py-2 rounded shadow-md">
                                            {{ $permission->name }}
                                        </span>
                                    @endforeach
                                </td>
                                <td class="px-5 py-4 border-b border-gray-200 text-sm">
                                    <a href="{{ route('roles.edit', $role->id) }}" title="Actualizar"
                                       class="text-blue-600 hover:text-blue-900 transition duration-200">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $roles->links() }}
        </div>
    </div>
</div>
