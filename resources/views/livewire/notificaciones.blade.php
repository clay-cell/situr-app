<div>
    <!-- Botón de notificaciones -->
    <button class="relative flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 shadow"
        wire:click="mostrarModal">
        <i class="fa-solid fa-bell text-gray-600"></i>
        @if ($notificaciones->where('nuevo', true)->count() > 0)
            <span
                class="absolute top-0 right-0 w-4 h-4 rounded-full bg-red-600 text-white text-xs flex items-center justify-center">
                {{ $notificaciones->where('nuevo', true)->count() }}
            </span>
        @endif
    </button>

    <!-- Modal de notificaciones -->
    @if ($modalVisible)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-lg">
                <div class="p-4 border-b flex justify-between items-center">
                    <h3 class="text-lg font-semibold">Notificaciones</h3>
                    <button class="text-gray-600 hover:text-gray-800" wire:click="cerrarModal">
                        <i class="fa-solid fa-times"></i>
                    </button>
                </div>
                <div class="p-4 max-h-80 overflow-y-auto">
                    @if ($notificaciones->isEmpty())
                        <p class="text-gray-500 text-center">No hay notificaciones.</p>
                    @else
                        <ul>
                            @foreach ($notificaciones as $notif)
                                <li class="flex items-start py-2 border-b last:border-none">
                                    <i
                                        class="fa-solid {{ $notif->nuevo ? 'fa-circle text-red-500' : 'fa-circle text-gray-400' }} mt-1"></i>
                                    <div class="ml-3">
                                        <p class="text-sm text-gray-800">{{ $notif->mensaje }}</p>
                                        <span
                                            class="text-xs text-gray-500">{{ $notif->created_at->diffForHumans() }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="p-4 border-t text-right">
                    <button wire:click="marcarComoLeido"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg shadow-md">
                        Marcar como leído
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
