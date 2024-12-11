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


    </div>
    @if (auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Tecnico'))
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
            <div class="p-6 bg-gray-100 min-h-screen">
                @if (auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Tecnico'))
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <!-- Header -->
                        <div class="px-6 py-4 bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                            <h2 class="text-2xl font-bold">Licencias</h2>
                        </div>
                        <!-- Table Container -->
                        <div class="overflow-x-auto">
                            <table class="w-full border-collapse text-left">
                                <!-- Table Head -->
                                <thead class="bg-blue-100 text-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 border-b text-sm font-semibold">N°</th>
                                        <th class="px-6 py-3 border-b text-sm font-semibold">Institución</th>
                                        <th class="px-6 py-3 border-b text-sm font-semibold">Fecha Emitido</th>
                                        <th class="px-6 py-3 border-b text-sm font-semibold">Fecha Vencimiento</th>
                                        <th class="px-6 py-3 border-b text-sm font-semibold">Días Restantes</th>
                                        <th class="px-6 py-3 border-b text-sm font-semibold">Acción</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody class="divide-y divide-gray-200" x-data="{ hoverRow: null }">
                                    @php $cont = 1; @endphp
                                    @foreach ($licencias as $item)
                                        @php
                                            $fecha_vencimiento = \Carbon\Carbon::parse($item->fecha_vencimiento);
                                            $dias_restantes = $fecha_vencimiento->diffInDays(today());
                                        @endphp
                                        <tr class="hover:bg-blue-50" @mouseover="hoverRow = {{ $loop->index }}"
                                            @mouseleave="hoverRow = null"
                                            :class="{ 'bg-gray-50': hoverRow === {{ $loop->index }} }">
                                            <td class="px-6 py-3">{{ $cont }}</td>
                                            <td class="px-6 py-3">{{ $item->nombre }}</td>
                                            <td class="px-6 py-3">{{ $item->fecha_emision }}</td>
                                            <td class="px-6 py-3">{{ $item->fecha_vencimiento }}</td>
                                            <td class="px-6 py-3">
                                                <span
                                                    class="@if ($dias_restantes <= 7) text-yellow-500 font-semibold
                                                            @else text-green-600 font-medium @endif">
                                                    {{ $dias_restantes }} días
                                                </span>
                                            </td>
                                            <td class="px-6 py-3">
                                                <button class="text-blue-600 hover:text-blue-800 focus:outline-none">
                                                    <i class="fa-solid fa-paper-plane"></i> Notificar
                                                </button>
                                            </td>
                                        </tr>
                                        @php $cont++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Footer -->
                        <div class="p-4 bg-gray-50 text-gray-600 text-center">
                            <p x-data="{ count: {{ $licencias->count() }} }" x-text="'Total de registros: ' + count"></p>
                        </div>
                    </div>
                @else
                    <div class="text-center py-10">
                        <p class="text-red-600 text-xl font-medium">No tienes permisos para esta sección.</p>
                    </div>
                @endif
            </div>
        @else
            <p>No tienes permisos para esta sección.</p>
    @endif
    </main>


</x-menu>
