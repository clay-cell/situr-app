{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
<x-guest-layout>
    <!-- Background container with fixed background -->
    <div class="bg-gray-100 h-screen flex items-center justify-center bg-fixed"
        style="background: url({{ asset('imgs/fondo-colores.png') }}) no-repeat center center fixed; background-size: cover;">

        <div class="bg-white shadow-2xl rounded-lg flex w-full max-w-5xl mx-auto overflow-hidden border border-gray-200">

            <!-- Left Side: Image Carousel -->
            <div class="w-1/2 bg-white flex flex-col items-center justify-center p-6 space-y-6">
                <div class="w-56 h-32 flex items-center justify-center bg-white overflow-hidden rounded-lg shadow-md">
                    <img src="{{ asset('imgs/Sello_del_Bicentenario_de_Bolivia.svg.png') }}" alt="Sello Bicentenario"
                        class="object-contain w-full h-full">
                </div>
                <div class="w-56 h-32 flex items-center justify-center bg-white overflow-hidden rounded-lg shadow-md">
                    <img src="{{ asset('imgs/logoministerio.jpg') }}" alt="Logotipo Ministerio"
                        class="object-contain w-full h-full">
                </div>
                <p class="text-gray-800 uppercase text-center text-lg font-bold">Sistema de Registro, Categorización y
                    Certificación - SRCC</p>
                <div class="w-56 h-32 flex items-center justify-center bg-white overflow-hidden rounded-lg shadow-md">
                    <img src="{{ asset('imgs/logo.png') }}" alt="Logo" class="object-contain w-full h-full">
                </div>
            </div>

            <!-- Right Side: Login Form -->
            <div class="w-1/2 p-10 flex flex-col justify-center">
                <h2 class="text-3xl font-bold text-center text-gray-700 mb-2">Iniciar Sesión</h2>
                <p class="text-center text-gray-500 mb-8">Bienvenido de vuelta</p>
                <x-validation-errors class="mb-4" />
                @session('status')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ $value }}
                    </div>
                @endsession
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-gray-600">Correo Electrónico</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div>
                        <label for="password" class="block text-gray-600">Contraseña</label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <input type="checkbox" id="remember_me" name="remember"
                                class="text-blue-500 focus:ring-blue-400">
                            <label for="remember" class="ml-2 text-sm text-gray-600">Recordarme</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-blue-600 hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Olvidastaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Iniciar Sesión
                    </button>
                </form>

                <p class="mt-6 text-center text-gray-600">¿No tienes una cuenta?
                    @if (Route::has('register'))
                        <a href="{{ route('solicitud_usuario.index') }}" class="text-blue-500 hover:underline">Regístrate</a>
                </p>
            @endauth
            <p class="text-gray-400 text-justify text-sm">Nota.- Ingrese con su CORREO Y CONTRASEÑA, que le fueron
                enviados a su correo electrónico, para iniciar su registro SIRETUR.</p>
        </div>
    </div>
</div>

<script>
    // SweetAlert2 popup with custom animation and styling
    Swal.fire({
        title: "¡Bienvenido al sistema!",
        text: "En caso de ser la primera vez que ingresa, por favor cree su cuenta SIRETUR.",
        icon: "info",
        confirmButtonText: "OK",
        confirmButtonColor: "#1d4ed8",
        showClass: {
            popup: `
                    animate__animated
                    animate__fadeInDown
                    animate__faster
                `
        },
        hideClass: {
            popup: `
                    animate__animated
                    animate__fadeOutUp
                    animate__faster
                `
        },
        backdrop: `rgba(0, 0, 0, 0.5)`,
        allowOutsideClick: false,
    });
</script>

<!-- Include Animate.css for custom animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</x-guest-layout>
