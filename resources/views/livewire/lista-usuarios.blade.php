<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Lista de Usuarios</h2>
    <div class="p-3">
        <a href="{{ route('users.create') }}" class="bg-blue-600 hover:bg-blue-500 px-2 py-2 rounded-md shadow-md text-gray-50 hover:text-white">Nuevo
            Usuario <i class="fa-solid fa-user-plus mr-3"></i></a>
    </div>
    <x-busqueda />
    <!-- Users Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 text-left text-sm font-semibold">#</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Perfil</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Usuario</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Correo</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Cédula</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Teléfono</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Celular</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Ciudad</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Rol</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Estado</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr class="hover:bg-gray-100 border-b border-gray-200">
                        <td class="py-3 px-4 text-gray-700">{{ $users->firstItem() + $index }}</td>
                        <td class="py-3 px-4">
                            <img class="h-12 w-12 rounded-full object-cover shadow-md"
                                src="{{ $user->profile_photo_path ? asset($user->profile_photo_path) : asset('imgs/subirfoto.jpg') }}"
                                alt="Foto de perfil de {{ $user->name }}" />
                        </td>
                        <td class="py-3 px-4 text-gray-700">
                            {{ $user->name . ' ' . $user->primer_apellido . ' ' . $user->segundo_apellido }}</td>
                        <td class="py-3 px-4 text-gray-700">{{ $user->email }}</td>
                        <td class="py-3 px-4 text-gray-700">{{ $user->cedula . ' ' . $user->extension }}</td>
                        <td class="py-3 px-4 text-gray-700">{{ $user->telefono }}</td>
                        <td class="py-3 px-4 text-gray-700">{{ $user->celular }}</td>
                        <td class="py-3 px-4 text-gray-700">{{ $user->ciudad }}</td>
                        <td class="py-3 px-4 text-gray-700">
                            @foreach ($user->roles as $role)
                                @if ($role->name == 'Contribuyente')
                                    <span
                                        class="inline-block bg-purple-200 text-purple-800 px-2 py-1 rounded-full text-xs font-semibold">
                                        {{ $role->name }}
                                    </span>
                                @else
                                    <span
                                        class="inline-block bg-blue-200 text-blue-800 px-2 py-1 rounded-full text-xs font-semibold">
                                        {{ $role->name }}
                                    </span>
                                @endif
                            @endforeach
                        </td>
                        <td class="py-3 px-4">
                            @if ($user->estado == 0)
                                <a href="{{ route('users.estado', [$user->id, 1]) }}"
                                    class="rounded-lg shadow-md bg-red-200 text-red-600 px-2 py-1 text-xs inline-block font-semibold">INACTIVO</a>
                            @else
                                <a href="{{ route('users.estado', [$user->id, 0]) }}"
                                    class="rounded-lg shadow-md bg-emerald-200 text-emerald-600 px-2 py-1 text-xs inline-block font-semibold">ACTIVO</a>
                            @endif
                        </td>

                        <td class="py-3 px-4 text-gray-700">
                            @if ($user->estado == 0)
                                <p href="#" class="text-gray-600 hover:text-gray-800" title="Editar">
                                    <i class="fa-regular fa-pen-to-square text-lg"></i>
                                </p>
                            @else
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="text-blue-600 hover:text-blue-800" title="Editar">
                                    <i class="fa-regular fa-pen-to-square text-lg"></i>
                                </a>
                                <a href="{{-- route('users.edit',$user->id) --}}" class="text-blue-600 hover:text-blue-800"
                                    title="Resetear Contraseña">
                                    <i class="fa-solid fa-lock text-yellow-600"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="mt-6">
        {{ $users->links() }}
    </div>
</div>
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
