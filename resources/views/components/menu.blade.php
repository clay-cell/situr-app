<x-guest-layout>
    <div class="flex h-screen w-screen bg-gray-100" style="background: url({{ asset('imgs/fondo-colores.png') }})">
        <!-- Sidebar -->
        <div x-data="{ open: false, openSubMenu: false }" @mouseover="open = true" @mouseleave="open = false"
            :class="{ 'w-64': open, 'w-20': !open }"
            class="flex flex-col bg-emerald-950 text-white transition-all duration-300 ease-in-out">

            <!-- Logo -->
            <div class="flex items-center justify-center py-4">
                <img src="{{ asset('imgs/logo.png') }}" alt="Logo" class="w-12 h-12">
            </div>

            <!-- Navegación del Sidebar -->
            <nav class="flex flex-col mt-5 space-y-4">
                <!-- Menú desplegable de Gestión de Usuarios -->
                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen"
                        class="flex items-center px-3 py-2 space-x-2 hover:bg-emerald-800 rounded-lg transition">
                        <i class="fas fa-user-circle text-xl"></i>
                        <span class="text-base font-medium" x-show="open">{{ Auth::user()->name }}
                            {{ Auth::user()->primer_apellido }}</span>
                        <i class="fas fa-chevron-down text-sm" x-show="open"></i>
                    </button>

                    <!-- Contenido desplegable de usuario -->
                    <div x-show="dropdownOpen && open" x-transition @click.away="dropdownOpen = false"
                        class="mt-2 bg-gray-100 rounded-lg shadow-lg">
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>
                        <x-dropdown-link href="{{ route('users.perfil') }}">
                            <i class="fas fa-user mr-2"></i> {{ __('Profile') }}
                        </x-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                <i class="fas fa-key mr-2"></i> {{ __('API Tokens') }}
                            </x-dropdown-link>
                        @endif

                        <div class="border-t border-gray-200 my-2"></div>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
                <!-- Gestión de Usuarios con Submenú -->
                @can('Gestion_usuarios')
                    <div>
                        <a @click="openSubMenu = !openSubMenu"
                            class="flex items-center justify-between px-4 py-2 space-x-2 cursor-pointer hover:bg-emerald-800 rounded-lg">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-users"></i>
                                <span class="text-base font-medium" x-show="open">Gestión de Usuarios</span>
                            </div>
                            <i :class="{ 'rotate-180': openSubMenu }"
                                class="fas fa-angle-down transition-transform transform" x-show="open"></i>
                        </a>
                        <!-- Submenú -->
                        <div x-show="openSubMenu && open" x-transition x-cloak class="pl-6 space-y-2 bg-emerald-900">
                            <a href="{{ route('users.index') }}"
                                class="flex items-center px-4 py-2 text-sm hover:bg-emerald-800">
                                <i class="fas fa-user-friends mr-2"></i> Usuarios
                            </a>
                            <a href="{{ route('roles.index') }}"
                                class="flex items-center px-4 py-2 text-sm hover:bg-emerald-800">
                                <i class="fas fa-user-tag mr-2"></i> Roles
                            </a>
                            <a href="{{ route('permisos.index') }}"
                                class="flex items-center px-4 py-2 text-sm hover:bg-emerald-800">
                                <i class="fas fa-lock mr-2"></i> Permisos
                            </a>
                            <a href="{{ route('solicitud_usuario.solicitudes_pendientes') }}"
                                class="flex items-center px-4 py-2 text-sm hover:bg-emerald-800">
                                <i class="fas fa-clipboard-list mr-2"></i> Solicitudes
                            </a>
                        </div>
                    </div>
                @endcan

                @can('Prestadores_servicio')
                    <!-- Enlaces del menú principal -->
                    <a href="{{ route('prestadores_servicios.index') }}" class="flex items-center px-4 py-2 space-x-2 hover:bg-emerald-700">
                        <i class="fas fa-hands-helping"></i>
                        <span class="text-base font-medium" x-show="open">Prestadores de Servicio</span>
                    </a>
                @endcan
                @can('Servicios')
                    <a href="{{ route('servicio.index') }}"
                        class="flex items-center px-4 py-2 space-x-2 hover:bg-emerald-700">
                        <i class="fas fa-concierge-bell"></i>
                        <span class="text-base font-medium" x-show="open">Servicios</span>
                    </a>
                @endcan
                @can('Tipo_tramite')
                    <a href="{{ route('tipo_tramite') }}"
                        class="flex items-center px-4 py-2 space-x-2 hover:bg-emerald-700">
                        <i class="fas fa-file-alt"></i>
                        <span class="text-base font-medium" x-show="open">Tipos de Trámite</span>
                    </a>
                @endcan
                @can('Categorias')
                    <a href="{{-- route('categories.index') --}}" class="flex items-center px-4 py-2 space-x-2 hover:bg-emerald-700">
                        <i class="fas fa-tags"></i>
                        <span class="text-base font-medium" x-show="open">Categorías</span>
                    </a>
                @endcan
                @can('Tipo_institucion')
                    <a href="{{-- route('institutionTypes.index') --}}" class="flex items-center px-4 py-2 space-x-2 hover:bg-emerald-700">
                        <i class="fas fa-building"></i>
                        <span class="text-base font-medium" x-show="open">Tipo de Institución</span>
                    </a>
                @endcan
                @can('Mis_instituciones')
                    <a href="{{ route('establecimiento.index') }}" class="flex items-center px-4 py-2 space-x-2 hover:bg-emerald-700">
                        <i class="fa-solid fa-plane"></i>
                        <span class="text-base font-medium" x-show="open">Mis Instituciones</span>
                    </a>
                @endcan
            </nav>
        </div>

        <!-- Contenido principal -->
        <div class="flex-1 p-6 min-h-screen overflow-y-auto transition-all duration-300 ease-in-out"
            :class="{ 'ml-64': open, 'ml-20': !open }">
            {{ $slot }}
        </div>
    </div>
</x-guest-layout>
