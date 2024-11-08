{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}
<x-menu>
    <h2>BIENVENIDO AL SISTEMAS </h2>
    <!-- Main Content -->
    <div class="flex flex-col flex-1 w-full">
        <!-- Header -->
        <header class="z-10 py-4 bg-white shadow-md">
            <div class="flex items-center justify-between px-6">
                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-600 focus:outline-none lg:hidden">
                    <i class="fas fa-bars w-6 h-6"></i>
                </button>
                <div class="flex items-center ml-6 space-x-4">
                    <img src="https://via.placeholder.com/32" class="w-8 h-8 rounded-full" alt="profile">
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="h-full p-6 bg-gray-50">
            <!-- Stats Section -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <div class="p-4 bg-white shadow-lg rounded-lg flex items-center space-x-4">
                    <div class="p-3 bg-teal-100 rounded-full text-teal-600">
                        <i class="fas fa-briefcase fa-lg"></i>
                    </div>
                    <div>
                        <h4 class="text-gray-600">Empresas Registradas</h4>
                        <p class="text-3xl font-semibold text-teal-600">1,234</p>
                    </div>
                </div>
                <div class="p-4 bg-white shadow-lg rounded-lg flex items-center space-x-4">
                    <div class="p-3 bg-yellow-100 rounded-full text-yellow-600">
                        <i class="fas fa-tasks fa-lg"></i>
                    </div>
                    <div>
                        <h4 class="text-gray-600">Trámites Pendientes</h4>
                        <p class="text-3xl font-semibold text-yellow-600">56</p>
                    </div>
                </div>
                <div class="p-4 bg-white shadow-lg rounded-lg flex items-center space-x-4">
                    <div class="p-3 bg-green-100 rounded-full text-green-600">
                        <i class="fas fa-check-circle fa-lg"></i>
                    </div>
                    <div>
                        <h4 class="text-gray-600">Aperturas Recientes</h4>
                        <p class="text-3xl font-semibold text-green-600">24</p>
                    </div>
                </div>
                <div class="p-4 bg-white shadow-lg rounded-lg flex items-center space-x-4">
                    <div class="p-3 bg-purple-100 rounded-full text-purple-600">
                        <i class="fas fa-thumbs-up fa-lg"></i>
                    </div>
                    <div>
                        <h4 class="text-gray-600">Empresas Aprobadas</h4>
                        <p class="text-3xl font-semibold text-purple-600">780</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-menu>
