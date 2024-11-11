@props(['mensaje'=>'nombre'])
<div class="container flex flex-col md:flex-row justify-between items-center mb-6 space-y-4 md:space-y-0">


    <input type="text" wire:model.live="search" placeholder="{{ $mensaje }}"
        class="px-4 py-2 w-full md:w-1/3 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
    <select wire:model="cant"
      class="md:ml-4 px-4 py-2 w-full md:w-auto rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
      <option value="50">50</option>
      <option value="100">100</option>
    </select>
</div>