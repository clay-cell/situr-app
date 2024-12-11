{{-- <div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center md:text-left">Lista de Usuarios</h2>

    <!-- Botón para crear un nuevo usuario -->
    <div class="p-3 text-center md:text-left">
        <a href="{{ route('users.create') }}"
           class="bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-md shadow-md text-white text-sm font-semibold inline-block">
            Nuevo Usuario <i class="fa-solid fa-user-plus ml-2"></i>
        </a>
    </div>

    <!-- Componente de búsqueda -->
    <x-busqueda />
    <p class="text-sm text-gray-600">Buscando: {{ $search }}</p>

    <!-- Contenedor responsivo para la tabla -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md mt-4">
        <table class="min-w-full text-sm leading-normal">
            <thead class="bg-gray-800 text-white text-xs uppercase font-semibold tracking-wider">
                <tr>
                    <th class="py-3 px-4 text-left">#</th>
                    <th class="py-3 px-4 text-left">Perfil</th>
                    <th class="py-3 px-4 text-left">Usuario</th>
                    <th class="py-3 px-4 text-left">Correo</th>
                    <th class="py-3 px-4 text-left hidden md:table-cell">Cédula</th>
                    <th class="py-3 px-4 text-left hidden lg:table-cell">Teléfono</th>
                    <th class="py-3 px-4 text-left">Celular</th>
                    <th class="py-3 px-4 text-left hidden lg:table-cell">Ciudad</th>
                    <th class="py-3 px-4 text-left">Rol</th>
                    <th class="py-3 px-4 text-left">Estado</th>
                    <th class="py-3 px-4 text-left">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr class="hover:bg-gray-100 border-b border-gray-200">
                        <td class="py-3 px-4 text-gray-700">{{ $users->firstItem() + $index }}</td>
                        <td class="py-3 px-4">
                            <img class="h-10 w-10 rounded-full object-cover shadow-md"
                                src="{{ $user->profile_photo_path ? asset($user->profile_photo_path) : asset('imgs/subirfoto.jpg') }}"
                                alt="Foto de perfil de {{ $user->name }}" />
                        </td>
                        <td class="py-3 px-4 text-gray-700">
                            {{ $user->name . ' ' . $user->primer_apellido . ' ' . $user->segundo_apellido }}
                        </td>
                        <td class="py-3 px-4 text-gray-700">{{ $user->email }}</td>
                        <td class="py-3 px-4 text-gray-700 hidden md:table-cell">
                            {{ $user->cedula . ' ' . $user->extension }}
                        </td>
                        <td class="py-3 px-4 text-gray-700 hidden lg:table-cell">{{ $user->telefono }}</td>
                        <td class="py-3 px-4 text-gray-700">{{ $user->celular }}</td>
                        <td class="py-3 px-4 text-gray-700 hidden lg:table-cell">{{ $user->ciudad }}</td>
                        <td class="py-3 px-4 text-gray-700">
                            @foreach ($user->roles as $role)
                                <span class="inline-block bg-blue-200 text-blue-800 px-2 py-1 rounded-full text-xs font-semibold">
                                    {{ $role->name }}
                                </span>
                            @endforeach
                        </td>
                        <td class="py-3 px-4">
                            @if ($user->estado == 0)
                                <a href="{{ route('users.estado', [$user->id, 1]) }}"
                                   class="rounded-lg shadow-md bg-red-200 text-red-600 px-2 py-1 text-xs font-semibold">INACTIVO</a>
                            @else
                                <a href="{{ route('users.estado', [$user->id, 0]) }}"
                                   class="rounded-lg shadow-md bg-emerald-200 text-emerald-600 px-2 py-1 text-xs font-semibold">ACTIVO</a>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-gray-700">
                            @if ($user->estado == 0)
                                <span class="text-gray-600 hover:text-gray-800" title="Editar">
                                    <i class="fa-regular fa-pen-to-square text-lg"></i>
                                </span>
                            @else
                                <a href="{{ route('users.edit', $user->id) }}"
                                   class="text-blue-600 hover:text-blue-800" title="Editar">
                                    <i class="fa-regular fa-pen-to-square text-lg"></i>
                                </a>
                                <a href="#" class="text-yellow-600 hover:text-yellow-800" title="Resetear Contraseña">
                                    <i class="fa-solid fa-lock"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-6 flex justify-center">
        {{ $users->links() }}
    </div>
</div> --}}

{{-- @if (session('success'))
    <script>
        Swal.fire({
            title: 'Éxito',
            text: '{{ session('success') }}',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
@endif --}}
<div class="container mx-auto p-6" x-data="{ expandedRows: [] }">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center md:text-left">Lista de Usuarios</h2>

    <!-- Botón para crear un nuevo usuario -->
    <div class="p-3 text-center md:text-left">
        <a href="{{ route('users.create') }}"
            class="bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-md shadow-md text-white text-sm font-semibold">
            Nuevo Usuario
        </a>
    </div>

    <!-- Tabla responsiva -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md mt-4">
        <table class="min-w-full text-sm leading-normal">
            <!-- Encabezado -->
            <thead class="bg-gray-800 text-white text-xs uppercase font-semibold tracking-wider">
                <tr>
                    <th class="py-3 px-4 text-left">Foto</th>
                    <th class="py-3 px-4 text-left">Usuario</th>
                    <th class="py-3 px-4 text-left hidden md:table-cell">Correo</th>
                    <th class="py-3 px-4 text-left hidden lg:table-cell">Cédula</th>
                    <th class="py-3 px-4 text-left hidden lg:table-cell">Teléfono</th>
                    <th class="py-3 px-4 text-left hidden lg:table-cell">Ciudad</th>
                    <th class="py-3 px-4 text-left hidden lg:table-cell">Estado</th>
                    <th class="py-3 px-4 text-left hidden md:table-cell">Rol</th>
                    <th class="py-3 px-4 text-left">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr class="hover:bg-gray-100 border-b border-gray-200">
                        <!-- Foto -->
                        <td class="py-3 px-4">
                            <img class="h-10 w-10 rounded-full object-cover"
                                src="{{ $user->profile_photo_path ? asset($user->profile_photo_path) : asset('imgs/subirfoto.jpg') }}"
                                alt="Foto de {{ $user->name }}" />
                        </td>

                        <!-- Nombre del usuario -->
                        <td class="py-3 px-4 text-gray-700">
                            {{ $user->name . ' ' . $user->primer_apellido . ' ' . $user->segundo_apellido }}
                        </td>

                        <!-- Correo -->
                        <td class="py-3 px-4 text-gray-700 hidden md:table-cell">
                            {{ $user->email }}
                        </td>

                        <!-- Cédula -->
                        <td class="py-3 px-4 text-gray-700 hidden lg:table-cell">
                            {{ $user->cedula }}
                        </td>

                        <!-- Teléfono -->
                        <td class="py-3 px-4 text-gray-700 hidden lg:table-cell">
                            {{ $user->telefono }}
                        </td>

                        <!-- Ciudad -->
                        <td class="py-3 px-4 text-gray-700 hidden lg:table-cell">
                            {{ $user->ciudad }}
                        </td>
                        <td class="py-3 px-4 text-gray-700 hidden lg:table-cell">
                            @if ($user->estado == 0)
                                <a href="{{ route('users.estado', [$user->id, 1]) }}"
                                    class="rounded-lg shadow-md bg-red-200 text-red-600 px-2 py-1 text-xs font-semibold">INACTIVO</a>
                            @else
                                <a href="{{ route('users.estado', [$user->id, 0]) }}"
                                    class="rounded-lg shadow-md bg-emerald-200 text-emerald-600 px-2 py-1 text-xs font-semibold">ACTIVO</a>
                            @endif
                        </td>

                        <!-- Roles -->
                        <td class="py-3 px-4 text-gray-700 hidden md:table-cell">
                            @foreach ($user->roles as $role)
                                <span
                                    class="inline-block bg-blue-200 text-blue-800 px-2 py-1 rounded-full text-xs font-semibold">
                                    {{ $role->name }}
                                </span>
                            @endforeach
                        </td>
                        <td class="py-3 px-4 text-gray-700 hidden md:table-cell">
                            @if ($user->estado == 0)
                                <span class="text-gray-600 hover:text-gray-800" title="Editar">
                                    <i class="fa-regular fa-pen-to-square text-lg"></i>
                                </span>
                            @else
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="text-blue-600 hover:text-blue-800" title="Editar">
                                    <i class="fa-regular fa-pen-to-square text-lg"></i>
                                </a>
                                {{-- <a href="#" class="text-yellow-600 hover:text-yellow-800"
                                    title="Resetear Contraseña">
                                    <i class="fa-solid fa-lock"></i>
                                </a> --}}
                            @endif
                        </td>

                        <!-- Botón para expandir/ocultar detalles -->
                        <td class="py-3 px-4 text-gray-700 lg:hidden ">
                            <button
                                @click="expandedRows.includes({{ $index }})
                                        ? expandedRows = expandedRows.filter(id => id !== {{ $index }})
                                        : expandedRows.push({{ $index }})"
                                class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 rounded-md text-xs font-semibold">
                                <span
                                    x-text="expandedRows.includes({{ $index }}) ? 'Ocultar' : 'Detalles'"></span>
                            </button>
                        </td>
                    </tr>

                    <!-- Detalles ocultos en pantallas pequeñas -->
                    <tr x-show="expandedRows.includes({{ $index }})" class="bg-gray-50">
                        <td colspan="8" class="px-4 py-3">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div><strong>Correo:</strong> {{ $user->email }}</div>
                                <div><strong>Cédula:</strong> {{ $user->cedula }}</div>
                                <div><strong>Teléfono:</strong> {{ $user->telefono }}</div>
                                <div><strong>Celular:</strong> {{ $user->celular }}</div>
                                <div><strong>Ciudad:</strong> {{ $user->ciudad }}</div>
                                <div>
                                    <strong>Rol:</strong>
                                    @foreach ($user->roles as $role)
                                        <span
                                            class="inline-block bg-blue-200 text-blue-800 px-2 py-1 rounded-full text-xs font-semibold">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach
                                </div>
                                <div>
                                    <strong>Estado:</strong>
                                    @if ($user->estado == 0)
                                        <a href="{{ route('users.estado', [$user->id, 1]) }}"
                                            class="rounded-lg shadow-md bg-red-200 text-red-600 px-2 py-1 text-xs font-semibold">INACTIVO</a>
                                    @else
                                        <a href="{{ route('users.estado', [$user->id, 0]) }}"
                                            class="rounded-lg shadow-md bg-emerald-200 text-emerald-600 px-2 py-1 text-xs font-semibold">ACTIVO</a>
                                    @endif
                                </div>
                                <div>
                                    <strong>Accion:</strong>
                                    @if ($user->estado == 0)
                                        <span class="text-gray-600 hover:text-gray-800" title="Editar">
                                            <i class="fa-regular fa-pen-to-square text-lg"></i>
                                        </span>
                                    @else
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="text-blue-600 hover:text-blue-800" title="Editar">
                                            <i class="fa-regular fa-pen-to-square text-lg"></i>
                                        </a>
                                        {{-- <a href="#" class="text-yellow-600 hover:text-yellow-800"
                                    title="Resetear Contraseña">
                                    <i class="fa-solid fa-lock"></i>
                                </a> --}}
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-6 flex justify-center">
        {{ $users->links() }}
    </div>
</div>
