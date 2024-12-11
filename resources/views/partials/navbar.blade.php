{{-- {{-- <!-- resources/views/partials/navbar.blade.php -->
<header class="py-4 bg-white shadow-md px-6 flex justify-between items-center">
    <!-- Botón para abrir/cerrar el sidebar en todos los dispositivos -->
    <button @click="sidebarOpen = !sidebarOpen" class="p-3 w-12 h-12 bg-blue-100 rounded-full text-blue-600 flex items-center justify-center">
        <i class="fas fa-bars"></i> <!-- Icono de hamburguesa -->
    </button>

    <!-- Título -->
    <h1 class="text-xl font-semibold">Sistema</h1>

    <!-- Opciones de perfil o menú de usuario -->
    <div class="flex items-center space-x-4">
        <!-- Imagen de perfil -->
        <div>
            <img src="https://via.placeholder.com/32" class="rounded-full" alt="profile">
        </div>

        <!-- Botón de cerrar sesión -->
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <button type="submit" class="p-3 w-12 h-12 bg-red-100 rounded-full text-red-600 flex items-center justify-center">
                <i class="fas fa-sign-out-alt"></i> <!-- Icono de cerrar sesión -->
            </button>
        </form>
    </div>
</header> --}}



<!-- resources/views/partials/navbar.blade.php -->
{{--<header class="py-4 bg-white shadow-md px-6 flex justify-between items-center">
    <!-- Botón para abrir/cerrar el sidebar en todos los dispositivos -->
    <button @click="sidebarOpen = !sidebarOpen"
        class="p-3 w-12 h-12 bg-blue-100 rounded-full text-blue-600 flex items-center justify-center">
        <i class="fas fa-bars"></i> <!-- Icono de hamburguesa -->
    </button>

    <!-- Título -->
    <img src="{{ asset('imgs/200anios.png') }}" alt="" class="w-28">
    <h1 class="text-xl font-semibold text-blue-600">Sistema de Registro Turistico</h1>
    <!-- Opciones de perfil o menú de usuario -->
    <div class="flex items-center space-x-4 relative" x-data="{ dropdownOpen: false }">
        <!-- Nombre de usuario y botón de menú -->
        <button @click="dropdownOpen = !dropdownOpen"
            class="flex items-center space-x-2 bg-gray-100 px-3 py-2 rounded-full hover:bg-gray-200 transition">
            <img class="h-12 w-12 rounded-full object-cover shadow-md"
                src="{{ Auth::user()->profile_photo_path ? asset(Auth::user()->profile_photo_path) : asset('imgs/subirfoto.jpg') }}"
                alt="Foto de perfil de {{ Auth::user()->name }}" />
            <span class="text-base font-medium text-gray-700">{{ Auth::user()->name }}
                {{ Auth::user()->primer_apellido }}</span>
            <i class="fas fa-chevron-down text-sm text-gray-500"></i> <!-- Flecha para desplegar -->
        </button>


        <!-- Menú desplegable de usuario -->
        <div x-show="dropdownOpen" x-transition @click.away="dropdownOpen = false"
            class="absolute right-0 top-14 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
            <a href="{{ route('users.perfil') }}"
                class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                <i class="fas fa-user mr-2"></i> Perfil
            </a>

            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <a href="{{ route('api-tokens.index') }}"
                    class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                    <i class="fas fa-key mr-2"></i> API Tokens
                </a>
            @endif

            <!-- Separador -->
            <div class="border-t border-gray-200 my-2"></div>

            <!-- Cerrar sesión -->
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <button type="submit"
                    class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 w-full text-left transition">
                    <i class="fas fa-sign-out-alt mr-2"></i> Cerrar sesión
                </button>
            </form>
        </div>

    </div>
</header> --}}
<header class="py-4 bg-white shadow-md px-6 flex justify-between items-center">
    <!-- Botón para abrir/cerrar el sidebar -->
    <button @click="sidebarOpen = !sidebarOpen"
        class="p-3 w-12 h-12 bg-blue-100 rounded-full text-blue-600 flex items-center justify-center">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Logo y Título -->
    <div class="flex-1 text-center">
        <img src="{{ asset('imgs/200anios.png') }}" alt="Logo" class="w-20 sm:w-28 mx-auto hidden sm:block">
        <h1 class="text-base sm:text-xl font-semibold text-blue-600">
            Sistema de Registro Turístico
        </h1>
    </div>

    <!-- Opciones de usuario -->
    <div class="flex items-center space-x-4 relative" x-data="{ dropdownOpen: false }">
        <!-- Menú móvil -->
        <button @click="dropdownOpen = !dropdownOpen"
            class="sm:hidden flex items-center space-x-2 bg-gray-100 px-3 py-2 rounded-full hover:bg-gray-200 transition">
            <i class="fas fa-user text-blue-600"></i>
        </button>

        <!-- Nombre de usuario y avatar en pantallas grandes -->
        <button @click="dropdownOpen = !dropdownOpen"
            class="hidden sm:flex items-center space-x-2 bg-gray-100 px-3 py-2 rounded-full hover:bg-gray-200 transition">
            <img class="h-10 w-10 sm:h-12 sm:w-12 rounded-full object-cover shadow-md"
                src="{{ Auth::user()->profile_photo_path ? asset(Auth::user()->profile_photo_path) : asset('imgs/subirfoto.jpg') }}"
                alt="Foto de perfil de {{ Auth::user()->name }}" />
            <span class="text-sm sm:text-base font-medium text-gray-700">{{ Auth::user()->name }}
                {{ Auth::user()->primer_apellido }}</span>
            <i class="fas fa-chevron-down text-sm text-gray-500"></i>
        </button>

        <!-- Menú desplegable -->
        <div x-show="dropdownOpen" x-transition @click.away="dropdownOpen = false"
            class="absolute right-0 top-14 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
            <a href="{{ route('users.perfil') }}"
                class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                <i class="fas fa-user mr-2"></i> Perfil
            </a>

            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <a href="{{ route('api-tokens.index') }}"
                    class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                    <i class="fas fa-key mr-2"></i> API Tokens
                </a>
            @endif

            <div class="border-t border-gray-200 my-2"></div>

            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <button type="submit"
                    class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 w-full text-left transition">
                    <i class="fas fa-sign-out-alt mr-2"></i> Cerrar sesión
                </button>
            </form>
        </div>
    </div>
</header>

