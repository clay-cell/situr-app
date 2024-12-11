<div x-data="ListaPermisos()" class="p-6 bg-gray-50 rounded-lg shadow-lg container">
    <div class="flex flex-col sm:flex-row justify-between items-center" x-data="{ modal: null }" @confirmacion.window="modal = null">
        <!-- Título Responsivo -->
        <h1 class="text-3xl font-semibold text-gray-800 mb-4 sm:mb-0 sm:text-4xl flex-1">
            Lista de Permisos
            <i class="fas fa-shield-alt text-gray-600 ml-2"></i>
        </h1>

        <!-- Botón Responsivo -->
        <button @click="modal = 'registrar'" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm sm:text-base">
            Agregar Permiso <i class="fas fa-plus ml-2"></i>
        </button>

        <!-- Registration Modal -->
        <div x-show="modal === 'registrar'"
            class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50" x-cloak>
            <div class="bg-white rounded-lg shadow-lg w-11/12 sm:w-10/12 md:w-1/3 lg:w-1/4 p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Registrar Permiso</h2>
                <form wire:submit.prevent="registrar">
                    <input type="text" wire:model="permiso.name" placeholder="Nombre del permiso"
                        class="w-full p-2 border rounded focus:outline-none focus:ring focus:ring-blue-200 mb-2">
                    @error('permiso.name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="flex justify-end space-x-2 mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Registrar</button>
                        <button type="button" @click="modal = null"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Table and Search Bar -->
    <div class="my-4">
        <input type="text" wire:model="search" placeholder="Buscar permiso..."
            class="w-full p-2 border rounded focus:outline-none focus:ring focus:ring-blue-200">
    </div>

    <div class="overflow-x-auto mt-4">
        <table class="min-w-full bg-white rounded-lg shadow">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="py-3 px-6 text-left">Nombre</th>
                    <th class="py-3 px-6 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($permisos as $permiso)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-6 text-gray-800">{{ $permiso->name  }}</td>
                        <td class="py-3 px-6 text-center space-x-4">
                            <!-- Modal Trigger for Editing -->
                            <button class="text-blue-500 hover:text-blue-700" wire:click="edit({{ $permiso->id }})">
                                <i class="fas fa-edit"></i> Editar
                            </button>

                            <!-- Modal Structure -->
                            @if ($modal === 'editar')
                                <div class="fixed inset-0 flex items-center justify-center  bg-opacity-75">
                                    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                                        <h2 class="text-xl font-bold mb-4">Editar Permiso</h2>

                                        <!-- Form for Editing -->
                                        <form wire:submit.prevent="actualizar">
                                            <div class="mb-4">
                                                <label for="name" class="block text-gray-700">Nombre del
                                                    Permiso:</label>
                                                <input type="text" id="name" wire:model="permiso.name"
                                                    class="border-gray-300 rounded mt-1 w-full">
                                                @error('permiso.name')
                                                    <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="flex justify-end">
                                                <button type="button" wire:click="$set('modal', null)"
                                                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded mr-2">Cancelar</button>
                                                <button type="submit"
                                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endif

                            <button class="text-red-500 hover:text-red-700" onclick="confirmDelete({{ $permiso->id }})">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>



                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="py-4 text-center text-gray-600">No hay permisos registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modals -->
    <div x-show="modal === 'registrar'"
        class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50" x-cloak>
        <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-1/3 p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Registrar Permiso</h2>
            <form wire:submit.prevent="registrar">
                <input type="text" wire:model="permiso.name" placeholder="Nombre del permiso"
                    class="w-full p-2 border rounded focus:outline-none focus:ring focus:ring-blue-200 mb-2">
                @error('permiso.name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <div class="flex justify-end space-x-2 mt-4">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Registrar</button>
                    <button type="button" @click="closeModal"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function ListaPermisos() {
            return {
                modal: null,
                openModal(name, id = null) {
                    this.modal = name;
                    if (name === 'editar' && id) {
                        Livewire.dispatch('edit', {
                            id
                        });
                    }
                },
                closeModal() {
                    this.modal = null;
                },
                /*confirmDelete(id) {
                    if (confirm('¿Seguro que deseas eliminar este permiso?') && id) {
                        Livewire.dispatch('delete', {
                            id
                        });
                    }
                }*/
            }
        }

        document.addEventListener('livewire:load', function() {
            Livewire.on('confirmacion', () => {
                ListaPermisos().closeModal();
            });
        });
    </script>
    <script>
        function confirmDelete(permisoId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Emitir el evento a Livewire
                    Livewire.dispatch('deleteConfirmed', {permisoId}); // Emite el evento 'deleteConfirmed' con el permisoId
                }
            });
        }
    </script>




</div>
