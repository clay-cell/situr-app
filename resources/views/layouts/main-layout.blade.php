{{-- <!-- resources/views/layouts/main-layout.blade.php -->
<x-guest-layout>
    <div class="flex h-screen w-screen" x-data="{ sidebarOpen: window.innerWidth >= 1024 ? true : false }">
        <!-- Sidebar -->
        <div class="w-64 bg-emerald-950 text-white"
            :class="{'block': sidebarOpen, 'hidden': !sidebarOpen}"
            x-show="sidebarOpen"
            x-transition:enter="transition transform ease-in-out duration-300"
            x-transition:enter-start="opacity-0 -translate-x-full"
            x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition transform ease-in-out duration-300"
            x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 -translate-x-full">
            @include('partials.sidebar') <!-- Incluir sidebar desde partials -->
        </div>


        <!-- Main content area -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            @include('partials.navbar') <!-- Incluir navbar desde partials -->

            <!-- Dynamic Content -->
            <main class="flex-1 p-6 overflow-y-auto">
                @yield('content') <!-- Aquí se carga el contenido dinámico de cada vista -->
            </main>
        </div>
    </div>
</x-guest-layout> --}}


<!-- resources/views/layouts/main-layout.blade.php -->
<x-guest-layout>
    <div class="flex h-screen w-screen" x-data="{ sidebarOpen: false }"
        style="background: url({{ asset('imgs/fondo-colores.png') }})">

        <!-- Overlay para cerrar el modal del sidebar -->
        <div class="w-full h-full fixed top-0 left-0 bg-white bg-opacity-30 backdrop-blur-sm z-50" x-show="sidebarOpen"
            x-transition:enter="transition transform ease-in-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition transform ease-in-out duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="sidebarOpen = false">
        </div>

        <!-- Sidebar flotante (tamaño dinámico según el dispositivo) -->
        <div class="h-full fixed top-0 left-0 bg-blue-950 text-white z-50 shadow-2xl shadow-blue-900"
            :class="{
                'w-4/5': window.innerWidth < 640, // 80% en dispositivos móviles (pantallas pequeñas)
                'w-1/5': window.innerWidth >= 640 // 20% en dispositivos más grandes
            }"
            x-show="sidebarOpen" x-transition:enter="transition transform ease-in-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition transform ease-in-out duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
            @include('partials.sidebar') <!-- Incluir sidebar desde partials -->
        </div>


        <!-- Main content area -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            @include('partials.navbar') <!-- Incluir navbar desde partials -->

            <!-- Dynamic Content -->
            <main class="flex-1 p-6 overflow-y-auto">
                @yield('content') <!-- Aquí se carga el contenido dinámico de cada vista -->
            </main>
        </div>
    </div>
</x-guest-layout>
