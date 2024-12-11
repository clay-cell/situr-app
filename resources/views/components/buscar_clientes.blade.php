@props(['title' => 'Buscar Clientes'])
<div class=" shadow-lg rounded-lg p-6 mb-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $title }}</h2>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <input type="text" wire:model="searchIdentificacion" placeholder="Identificación"
            class="rounded-full border-gray-400 shadow-md w-full focus:ring-2 focus:ring-teal-500">
        <input type="text" wire:model="searchNombre" placeholder="Nombre"
            class="rounded-full border-gray-400 shadow-md w-full focus:ring-2 focus:ring-teal-500">
        <input type="text" wire:model="searchPaterno" placeholder="Apellido Paterno"
            class="rounded-full border-gray-400 shadow-md w-full focus:ring-2 focus:ring-teal-500">
        <input type="text" wire:model="searchMaterno" placeholder="Apellido Materno"
            class="rounded-full border-gray-400 shadow-md w-full focus:ring-2 focus:ring-teal-500">
        <input type="date" wire:model="searchFechaIngreso"
            class="rounded-full border-gray-400 shadow-md w-full focus:ring-2 focus:ring-teal-500">
        <input type="date" wire:model="searchFechaSalida"
            class="rounded-full border-gray-400 shadow-md w-full focus:ring-2 focus:ring-teal-500">
    </div>
    <div class="mt-4 text-center">
        <button type="button" wire:click="buscarClientes"
            class="bg-blue-600 text-gray-50 hover:bg-blue-500 hover:text-white rounded-lg shadow-md px-3 py-2">
            <i class="fa-solid fa-magnifying-glass mr-3"></i>Buscar
        </button>
    </div>
</div>
