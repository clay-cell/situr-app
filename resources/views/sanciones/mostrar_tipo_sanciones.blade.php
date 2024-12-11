<x-menu>
    @livewire('lista-tipo-sanciones')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Escuchar el evento global desde Livewire
            window.addEventListener('lw:sancion-registrada', event => {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: "Registro Exitoso!",
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        });
    </script>
</x-menu>
