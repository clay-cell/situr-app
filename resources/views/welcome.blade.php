<x-guest-layout>
    <div class=" bg-gray-100">
        <header class="bg-blue-900 text-white py-4 shadow-lg">
            <div class="container mx-auto flex justify-between items-center px-4">
                <h1 class="text-2xl font-bold">SITUR</h1>
                <nav class="hidden md:flex space-x-4">
                    <a href="#overview" class="hover:text-yellow-400"><i class="fas fa-home mr-2"></i> Inicio</a>
                    <a href="#tramites" class="hover:text-yellow-400"> <i class="fas fa-file-alt mr-2"></i>Trámites</a>
                    <a href="#services" class="hover:text-yellow-400"><i
                            class="fas fa-concierge-bell mr-2"></i>Servicios</a>
                    <a href="#contact" class="hover:text-yellow-400"><i class="fas fa-envelope mr-2"></i> Contacto</a>
                    <a href="{{ route('login') }}" class="hover:text-yellow-400"><i
                            class="fas fa-sign-in-alt mr-2"></i>Login</a>
                </nav>
                <!-- Icono de menú para pantallas móviles -->
                <div class="md:hidden">
                    <button id="menuButton" class="text-white focus:outline-none">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
            <!-- Menú desplegable en móviles -->
            <div id="mobileMenu"
                class="hidden md:hidden transform transition-transform duration-300 ease-in-out translate-y-full">
                <a href="#overview" class="block py-2 px-4 hover:bg-yellow-400"><i
                        class="fas fa-home mr-2"></i>Inicio</a>
                <a href="#tramites" class="block py-2 px-4 hover:bg-yellow-400"><i
                        class="fas fa-file-alt mr-2"></i>Trámites</a>
                <a href="#services" class="block py-2 px-4 hover:bg-yellow-400"><i
                        class="fas fa-concierge-bell mr-2"></i>Servicios</a>
                <a href="#contact" class="block py-2 px-4 hover:bg-yellow-400"><i
                        class="fas fa-envelope mr-2"></i>Contacto</a>
                <a href="{{ route('login') }}" class="block py-2 px-4 hover:bg-yellow-400"><i
                        class="fas fa-sign-in-alt mr-2"></i>Login</a>
            </div>
        </header>


        <!-- Overview Section -->
        <section id="overview" class="bg-cover bg-center py-20"
            style="background-image: url('{{ asset('imgs/fondococha.jpg') }}');">
            <div
                class="bg-blue-900 bg-opacity-60 py-16 px-6 text-center text-white rounded-lg mx-auto max-w-screen-md sm:max-w-screen-lg">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4">Gestión de Trámites para el Turismo</h2>
                <p class="text-lg mb-6">Un sistema eficiente para gestionar los trámites necesarios para operar en el
                    sector turístico en Cochabamba.</p>
                <a href="#tramites" id="scrollToTramites"
                    class="bg-yellow-400 text-gray-900 px-6 py-3 rounded-full font-semibold hover:bg-yellow-500">Ver
                    Trámites</a>

            </div>
        </section>

        <!-- Tramites Section -->
        <section id="tramites" class="py-16 bg-white text-gray-800">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-center mb-8">Trámites Disponibles</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($tramites as $item)
                        @php
                            // Asociar íconos a cada trámite
                            $iconos = [
                                'OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL' => 'fas fa-id-card-alt',
                                'RENOVACIÓN DE LA LICENCIA TURÍSTICA DEPARTAMENTAL' => 'fas fa-sync-alt',
                                'CESE DE ACTIVIDAD O BAJA DEFINITIVA DE ACTIVIDAD' => 'fas fa-ban',
                            ];
                            // Asignar ícono correspondiente o un ícono por defecto
                            $icono = $iconos[$item->nombre_tramite] ?? 'fas fa-file-contract';
                        @endphp
                        <div class="bg-gray-50 rounded-lg shadow-lg p-6">
                            <i class="{{ $icono }} fa-3x text-blue-900 mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">{{ $item->nombre_tramite }}</h3>
                            <p class="text-gray-600">
                                @if ($item->nombre_tramite === 'OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL')
                                    Registra tu empresa para obtener una licencia turística departamental.
                                @elseif ($item->nombre_tramite === 'RENOVACIÓN DE LA LICENCIA TURÍSTICA DEPARTAMENTAL')
                                    Actualiza tu licencia para continuar ofreciendo servicios turísticos.
                                @elseif ($item->nombre_tramite === 'CESE DE ACTIVIDAD O BAJA DEFINITIVA DE ACTIVIDAD')
                                    Declara el cese de tus actividades turísticas oficialmente.
                                @else
                                    Tramite relacionado con servicios turísticos.
                                @endif
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Servicios Section -->
        <section id="services" class="py-16 bg-gray-100 text-gray-800">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold mb-8">Servicios para Empresas Turísticas</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <i class="fas fa-hands-helping fa-3x text-yellow-400 mb-4"></i>
                        <h3 class="text-xl font-bold mb-2">Asesoría Legal</h3>
                        <p>Recibe asesoría sobre los trámites y normativas vigentes en el sector turístico.</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <i class="fas fa-laptop fa-3x text-yellow-400 mb-4"></i>
                        <h3 class="text-xl font-bold mb-2">Portal de Trámites</h3>
                        <p>Accede a un portal en línea donde puedes gestionar tus trámites de manera rápida y segura.
                        </p>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <i class="fas fa-headset fa-3x text-yellow-400 mb-4"></i>
                        <h3 class="text-xl font-bold mb-2">Soporte Técnico</h3>
                        <p>Soporte técnico disponible para ayudarte a resolver cualquier duda o inconveniente en el
                            sistema.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Instituciones Section -->
        <section id="tramites" class="py-16 bg-white text-gray-800">
            <div class="container mx-auto text-center">
                @livewire('instituciones-registradas')
            </div>
        </section>


        <!-- Contact Section -->
        <section id="contact" class="py-16 bg-blue-900 text-white text-center">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold mb-4">Contáctanos</h2>
                <p class="mb-6">¿Tienes preguntas o necesitas más información? Nuestro equipo está aquí para
                    ayudarte.</p>
                <div class="flex justify-center space-x-4">
                    <a href="https://facebook.com" target="_blank" class="hover:text-yellow-400"><i
                            class="fab fa-facebook fa-2x"></i></a>
                    <a href="https://instagram.com" target="_blank" class="hover:text-yellow-400"><i
                            class="fab fa-instagram fa-2x"></i></a>
                    <a href="https://twitter.com" target="_blank" class="hover:text-yellow-400"><i
                            class="fab fa-twitter fa-2x"></i></a>
                </div>
            </div>
        </section>

        <footer class="bg-gray-900 text-gray-400 text-center py-4 px-2">
            <p>&copy; 2024 Sistema de Trámites Turísticos. Todos los derechos reservados.</p>
        </footer>
    </div>
</x-guest-layout>


{{-- Script para dispositivos Moviles --}}

<script>
    const menuButton = document.getElementById('menuButton');
    const mobileMenu = document.getElementById('mobileMenu');

    menuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden'); // Ocultar/mostrar el menú
        mobileMenu.classList.toggle('translate-y-0'); // Añadir/quitar animación
        mobileMenu.classList.toggle('translate-y-full');
    });
</script>

<script>
    document.getElementById('scrollToTramites').addEventListener('click', function(e) {
        e.preventDefault(); // Prevenir el comportamiento normal del enlace
        document.querySelector('#tramites').scrollIntoView({
            behavior: 'smooth'
        });
    });
</script>
