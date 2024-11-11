{{-- <nav><!-- Fondo azul -->
    <!-- Logo -->
    <div class="flex p-4 space-y-4 items-center justify-center bg-white h-full"> <!-- Fondo blanco para la imagen y altura completa -->
        <img src="{{ asset('imgs/logo.png') }}" alt="Logo" class="w-12 h-12 object-contain">
    </div>
    <div class="p-4 space-y-4">
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-blue-800 rounded-lg">
            Dashboard
        </a>
    </div>
</nav> --}}

<!-- resources/views/partials/sidebar.blade.php -->
<nav>
    <!-- Logo -->
    <div class="flex  items-center justify-center bg-white h-full">
        <!-- Fondo blanco para la imagen y altura completa -->
        <img src="{{ asset('imgs/logo_ministerio.png') }}" alt="Logo-SITUR" class="w-40 h-20">
    </div>

    <!-- Gestión de Usuarios con Submenú -->
    @can('Gestion_usuarios')
        <div x-data="{ openSubMenu: false }" class="p-4 space-y-4">
            <a @click="openSubMenu = !openSubMenu"
                class="flex items-center justify-between px-4 py-2 cursor-pointer hover:bg-blue-800 rounded-lg">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-users"></i>
                    <span class="text-base font-medium">Gestión de Usuarios</span>
                </div>
                <i :class="{ 'rotate-180': openSubMenu }" class="fas fa-angle-down transition-transform transform"></i>
            </a>

            <!-- Submenú de Gestión de Usuarios -->
            <div x-show="openSubMenu" x-transition x-cloak class="pl-6 space-y-2 bg-blue-900 rounded-lg">
                <a href="{{ route('users.index') }}"
                    class="flex items-center px-4 py-2 text-sm hover:bg-blue-800 rounded-lg">
                    <i class="fas fa-user-friends mr-2"></i> Usuarios
                </a>
                <a href="{{ route('roles.index') }}"
                    class="flex items-center px-4 py-2 text-sm hover:bg-blue-800 rounded-lg">
                    <i class="fas fa-user-tag mr-2"></i> Roles
                </a>
                <a href="{{ route('permisos.index') }}"
                    class="flex items-center px-4 py-2 text-sm hover:bg-blue-800 rounded-lg">
                    <i class="fas fa-lock mr-2"></i> Permisos
                </a>
                <a href="{{ route('solicitud_usuario.solicitudes_pendientes') }}"
                    class="flex items-center px-4 py-2 text-sm hover:bg-blue-800 rounded-lg">
                    <i class="fas fa-clipboard-list mr-2"></i> Solicitudes
                </a>
            </div>
        </div>
    @endcan

    <div class="p-4 space-y-4">
        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 hover:bg-blue-700 rounded-lg">
            <div class="flex items-center space-x-2">
                <i class="fas fa-tachometer-alt"></i> <!-- Icono de Dashboard -->
                <span class="text-base font-medium">Dashboard</span>
            </div>
        </a>

        @can('Prestadores_servicio')
            <a href="{{ route('prestadores_servicios.index') }}"
                class="flex items-center px-4 py-2 hover:bg-blue-700 rounded-lg">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-hands-helping"></i>
                    <span class="text-base font-medium">Prestadores de Servicio</span>
                </div>
            </a>
        @endcan
        @can('Servicios')
            <a href="{{ route('servicio.index') }}" class="flex items-center px-4 py-2 hover:bg-blue-700 rounded-lg">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-concierge-bell"></i>
                    <span class="text-base font-medium">Servicios</span>
                </div>
            </a>
        @endcan
        @can('Tipo_tramite')
            <a href="{{ route('tipo_tramite') }}" class="flex items-center px-4 py-2 hover:bg-blue-700 rounded-lg">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-file-alt"></i>
                    <span class="text-base font-medium">Tipos de Trámite</span>
                </div>
            </a>
        @endcan
        @can('Categorias')
            <a href="#" class="flex items-center px-4 py-2 hover:bg-blue-700 rounded-lg">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-tags"></i>
                    <span class="text-base font-medium">Categorías</span>
                </div>
            </a>
        @endcan
        @can('Tipo_institucion')
            <a href="#" class="flex items-center px-4 py-2 hover:bg-blue-700 rounded-lg">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-building"></i>
                    <span class="text-base font-medium">Tipo de Institución</span>
                </div>
            </a>
        @endcan
        @can('Mis_instituciones')
            <a href="{{ route('establecimiento.index') }}" class="flex items-center px-4 py-2 hover:bg-blue-700 rounded-lg">
                <div class="flex items-center space-x-2">
                    <i class="fa-solid fa-plane"></i>
                    <span class="text-base font-medium">Mis Instituciones</span>
                </div>
            </a>
        @endcan
        @can('Instituciones')
            <a href="{{ route('uestablecimientos.index') }}"
                class="flex items-center px-4 py-2 hover:bg-blue-700 rounded-lg">
                <i class="fa-solid fa-city"></i>
                <span class="text-base font-medium" x-show="open">Extablecimientos Turisticos</span>
            </a>
        @endcan
        @can('Control_Tramites')
        <div x-data="{ openSubMenu1: false }" class=" space-y-4">
            <a @click="openSubMenu1 = !openSubMenu1"
                class="flex items-center justify-between px-4 py-2 space-x-2 cursor-pointer hover:bg-blue-800 rounded-lg">
                <div class="flex items-center space-x-2">
                    <i class="fa-regular fa-clipboard"></i>
                    <span class="text-base font-medium" x-show="open">Tramites</span>
                </div>
                <i :class="{ 'rotate-180': openSubMenu1 }" class="fas fa-angle-down transition-transform transform"
                    x-show="open"></i>
            </a>
            <!-- Submenú -->
            <div x-show="openSubMenu1" x-transition x-cloak  class="  bg-blue-900">
                <a href="{{ route('show_new.show') }}"
                    class="flex items-center px-4 py-2 text-sm hover:bg-blue-800">
                    <i class="fas fa-user-friends mr-2"></i> Ingresados
                </a>
                <a href="{{ route('show_process.show') }}"
                    class="flex items-center px-4 py-2 text-sm hover:bg-blue-800">
                    <i class="fas fa-user-tag mr-2"></i> En proceso
                </a>
                <a href="{{ route('show_finished.show') }}"
                    class="flex items-center px-4 py-2 text-sm hover:bg-blue-800">
                    <i class="fas fa-lock mr-2"></i> Culminados
                </a>
            </div>
        </div>
        @endcan
    </div>
</nav>
