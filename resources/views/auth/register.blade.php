{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
{{-- <x-guest-layout>
    <div class="container bg-gray-100 h-screen flex items-center justify-center bg-fixed"
        style="background: url({{ asset('imgs/fondo-colores.png') }}) no-repeat center center fixed; background-size: cover;">
        <div class="flex justify-center py-10" x-data="registroForm()">
            <!-- Container -->
            <div class="bg-white shadow-xl rounded-lg flex w-full overflow-hidden" style="max-width: 1200px;">
                <!-- Left Side: Steps -->
                <div class="w-1/3 bg-gray-50 p-6 border-r border-gray-200">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('imgs/logo_ministerio.png') }}" alt="Logo" class="mb-6">
                        <h1 class="text-center text-lg font-semibold text-gray-700 mb-4">Información de registro cuenta
                            SIRETUR</h1>

                        <!-- Steps -->
                        <div class="space-y-4">
                            <template x-for="(stepName, index) in steps" :key="index">
                                <div class="flex items-center space-x-3 cursor-pointer"
                                    @click="currentStep = index + 1">
                                    <div
                                        :class="{
                                            'w-8 h-8 flex items-center justify-center rounded-full font-bold': true,
                                            'bg-blue-500 text-white': currentStep >= index + 1,
                                            'bg-gray-200 text-gray-500': currentStep < index + 1
                                        }">
                                        <span x-text="index + 1"></span>
                                    </div>
                                    <div>
                                        <p class="text-gray-800 font-medium" x-text="stepName.title"></p>
                                        <p class="text-gray-500 text-sm" x-text="stepName.description"></p>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Form -->
                <div class="w-2/3 p-10">
                    <form method="POST" action="{{ route('solicitud_usuario.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Step 1: Configuración de cuenta -->
                        <div x-show="currentStep === 1">
                            <h2 class="text-2xl font-bold text-gray-700 mb-4">Crea tu cuenta SIRETUR</h2>
                            <p class="text-sm text-gray-500 mb-6">Por favor, complete la información de cuenta.</p>

                            <!-- Departamento -->
                            <div class="space-y-6">
                                <div>
                                    <label for="departamento" class="block text-gray-600">Departamento de
                                        registro</label>
                                    <select name="departamento" id="departamento" x-model="formData.departamento"
                                        class="w-full mt-1 px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                        <option value="" disabled selected>Seleccione un departamento</option>
                                        <option value="CBBA.">COCHABAMBA</option>
                                    </select>
                                    @error('departamento')
                                        <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Nombre -->
                                <div>
                                    <label for="nombre" class="block text-gray-600">Nombre(s):</label>
                                    <input type="text" id="nombre" name="nombre" placeholder="Ej. Yhovana Jhos"
                                        x-model="formData.nombre"
                                        class="w-full mt-1 px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    @error('nombre')
                                        <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Apellidos -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="primer_apellido" class="block text-gray-600">Primer
                                            apellido:</label>
                                        <input type="text" id="primer_apellido" name="primer_apellido"
                                            placeholder="Ej. Mamani" x-model="formData.primer_apellido"
                                            class="w-full mt-1 px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                        @error('primer_apellido')
                                            <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="segundo_apellido" class="block text-gray-600">Segundo
                                            apellido:</label>
                                        <input type="text" id="segundo_apellido" name="segundo_apellido"
                                            placeholder="Ej. Gutierrez" x-model="formData.segundo_apellido"
                                            class="w-full mt-1 px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                        @error('segundo_apellido')
                                            <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Nacionalidad -->
                                <div>
                                    <label for="nacionalidad" class="block text-gray-600">Nacionalidad:</label>
                                    <input type="text" id="nacionalidad" name="nacionalidad"
                                        placeholder="Ej. Boliviana" x-model="formData.nacionalidad"
                                        class="w-full mt-1 px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    @error('nacionalidad')
                                        <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Cédula y Extensión -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="cedula" class="block text-gray-600">Cédula de identidad o Nro. de
                                            pasaporte:</label>
                                        <input type="text" id="cedula" name="cedula" placeholder="Ej. 0000000"
                                            x-model="formData.cedula"
                                            class="w-full mt-1 px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                        @error('cedula')
                                            <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="extension" class="block text-gray-600">Extensión:</label>
                                        <select name="extension" id="extension" x-model="formData.extension"
                                            class="w-full mt-1 px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                            <option value="" selected disabled>Seleccione</option>
                                            <option value="CBBA.">COCHABAMBA</option>
                                            <option value="LP.">LA PAZ</option>
                                            <option value="OR.">ORURO</option>
                                            <option value="SCZ.">SANTA CRUZ</option>
                                            <option value="TJ.">TARIJA</option>
                                            <option value="CH.">CHUQUISACA</option>
                                            <option value="BN.">BENI</option>
                                            <option value="PN.">PANDO</option>
                                            <option value="PT.">POTOSI</option>
                                        </select>
                                        @error('extension')
                                            <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <label for="email" class="block text-gray-600">Correo electrónico: (activo o en
                                        uso):</label>
                                    <input type="email" id="email" name="email"
                                        placeholder="Ej. julio@gmail.com" x-model="formData.email"
                                        class="w-full mt-1 px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    @error('email')
                                        <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Botón de Siguiente -->
                            <div class="text-right mt-6">
                                <button type="button" @click="nextStep()"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    Próximo paso →
                                </button>
                            </div>
                        </div>

                        <!-- Step 2: Información Personal -->
                        <div x-show="currentStep === 2">
                            <h2 class="text-2xl font-bold text-gray-700 mb-6">Información personal</h2>
                            <p class="text-sm text-gray-500 mb-6">Complete sus datos personales.</p>

                            <div class="grid grid-cols-12 gap-10">
                                <!-- Dirección y Ciudad -->
                                <div class="col-span-6">
                                    <label for="direccion"
                                        class="block text-gray-700 font-semibold mb-2">Dirección:</label>
                                    <input type="text" id="direccion" name="direccion"
                                        x-model="formData.domicilio"
                                        placeholder="Ej: Zona Sur/ Calle Manzanos/ N° 1956"
                                        class="w-full px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    @error('direccion')
                                        <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-span-6 ">
                                    <label for="ciudad"
                                        class="block text-gray-700 font-semibold mb-2">Ciudad:</label>
                                    <input type="text" id="ciudad" name="ciudad" placeholder="Ej. La Paz"
                                        class="w-full px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"x-model="formData.ciudad">
                                    @error('ciudad')
                                        <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Teléfono y Celular -->
                                <div class="col-span-4 ">
                                    <label for="telefono" class="block text-gray-700 font-semibold mb-2"
                                        x-model="formData.telefono">Teléfono fijo:</label>
                                    <input type="text" id="telefono" name="telefono"
                                        placeholder="Ej. (591) (2) 2731566"
                                        class="w-full px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                        x-model="formData.telefono">
                                    @error('telefono')
                                        <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-span-4 ">
                                    <label for="celular" class="block text-gray-700 font-semibold mb-2">Número de
                                        celular:</label>
                                    <input type="text" id="celular" name="celular" placeholder="Ej. 75812456"
                                        class="w-full px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                        x-model="formData.celular">
                                    @error('celular')
                                        <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Lugar de Nacimiento y Fecha de Nacimiento -->
                                <div class="col-span-4">
                                    <label for="lugar_nacimiento" class="block text-gray-700 font-semibold mb-2"
                                        x-model="formData.lugar_nacimiento">Lugar de nacimiento:</label>
                                    <select name="lugar_nacimiento" id="lugar_nacimiento"
                                        x-model="formData.lugar_nacimiento"
                                        class="w-full mt-1 px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                        <option value="" selected disabled>Seleccione</option>
                                        <option value="CBBA.">COCHABAMBA</option>
                                        <option value="LP.">LA PAZ</option>
                                        <option value="OR.">ORURO</option>
                                        <option value="SCZ.">SANTA CRUZ</option>
                                        <option value="TJ.">TARIJA</option>
                                        <option value="CH.">CHUQUISACA</option>
                                        <option value="BN.">BENI</option>
                                        <option value="PN.">PANDO</option>
                                        <option value="PT.">POTOSI</option>
                                    </select>
                                    @error('lugar_nacimiento')
                                        <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-span-4">
                                    <label for="fecha_nacimiento" class="block text-gray-700 font-semibold mb-2"
                                        x-model="formData.fecha_nacimiento">Fecha de nacimiento:</label>
                                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                                        class="w-full px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    @error('fecha_nacimiento')
                                        <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Sexo -->
                                <div class="col-span-4">
                                    <label class="block text-gray-700 font-semibold mb-2">Sexo:</label>

                                    <div class="flex items-center mb-2">
                                        <input type="radio" name="sexo" id="masculino" value="masculino"
                                            class="mr-2 border-gray-300 focus:ring-2 focus:ring-blue-400">
                                        <label for="masculino" class="text-gray-700">Masculino</label>
                                    </div>

                                    <div class="flex items-center mb-2">
                                        <input type="radio" name="sexo" id="femenino" value="femenino"
                                            class="mr-2 border-gray-300 focus:ring-2 focus:ring-blue-400">
                                        <label for="femenino" class="text-gray-700">Femenino</label>
                                    </div>

                                    @error('sexo')
                                        <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-span-4">
                                    <input type="file" id="foto" name="foto" class="hidden"
                                        accept="image/*">
                                    <div
                                        class="relative w-24 h-24 bg-gray-200 border border-gray-300 rounded-full overflow-hidden">
                                        <img src="{{ asset('imgs/subirfoto.jpg') }}" alt="Foto de perfil"
                                            class="w-full h-full object-cover">
                                        <label for="foto"
                                            class="absolute inset-0 flex items-center justify-center cursor-pointer text-white text-lg "
                                            style="background-color: rgba(128, 128, 128, 0.505)">
                                            <i class="fas fa-camera"></i>
                                        </label>
                                        @error('foto')
                                            <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <p class="text-xs text-gray-500">Foto 3x3 y archivo máximo de 3MB.</p>
                                </div>
                                <div class="col-span-12">
                                    <p class="text-sm">Adjuntar carta de solicitud de Registro de Prestador de
                                        Servicios Turísticos <a
                                            href="https://siretur.produccion.gob.bo/recursos_metronic/modelo_carta/Carta_modelo_de_habilitacion_cuenta.docx"
                                            class="bg-blue-600 text-gray-50 hover:bg-blue-500 hover:text-white p-2 rounded-md">Descargar
                                            carta modelo</a></p>
                                    <input type="file"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none mt-3"
                                        id="file_input" accept=".pdf" name="carta_solicitud">
                                    @error('carta_solicitud')
                                        <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex justify-between items-center mt-6">
                                <button type="button" @click="prevStep()"
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400">
                                    ← Anterior
                                </button>
                                <button type="button" @click="nextStep()"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    Próximo paso →
                                </button>
                            </div>
                        </div>
                        <!-- Step 3: Confirmación de Datos -->
                        <div x-show="currentStep === 3">
                            <h2 class="text-xl font-bold text-gray-700 mb-2">Confirmación de Datos</h2>
                            <p class="text-sm text-gray-500 mb-6">Revise y confirme sus datos antes de enviar el
                                formulario.</p>

                            <div class="space-y-4">
                                <!-- Información de confirmación -->
                                <p><strong>Departamento:</strong> <span x-text="formData.departamento"></span></p>
                                <p><strong>Nombre:</strong> <span x-text="formData.nombre"></span></p>
                                <p><strong>Primer Apellido:</strong> <span x-text="formData.primer_apellido"></span>
                                </p>
                                <p><strong>Segundo Apellido:</strong> <span x-text="formData.segundo_apellido"></span>
                                </p>
                                <p><strong>Nacionalidad:</strong> <span x-text="formData.nacionalidad"></span></p>
                                <p><strong>Cédula:</strong> <span x-text="formData.cedula"></span></p>
                                <p><strong>Extensión:</strong> <span x-text="formData.extension"></span></p>
                                <p><strong>Domicilio:</strong> <span x-text="formData.domicilio"></span></p>
                                <p><strong>Ciudad:</strong> <span x-text="formData.ciudad"></span></p>
                                <p><strong>Teléfono:</strong> <span x-text="formData.telefono"></span></p>
                                <p><strong>Celular:</strong> <span x-text="formData.celular"></span></p>
                                <p><strong>Fecha de Nacimiento:</strong> <span
                                        x-text="formData.fecha_nacimiento"></span></p>
                            </div>

                            <!-- Botones de navegación -->
                            <div class="flex justify-between mt-6">
                                <button type="button" @click="prevStep()"
                                    class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400">
                                    ← Volver
                                </button>
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                                    Confirmar y Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function registroForm() {
            return {
                currentStep: 1,
                steps: [{
                        title: 'Configuración de cuenta',
                        description: 'Proporcione los detalles de la cuenta'
                    },
                    {
                        title: 'Información personal',
                        description: 'Complete sus datos personales'
                    },
                    {
                        title: 'Confirmación de Datos',
                        description: 'Revise y confirme los datos proporcionados'
                    }
                ],
                formData: {
                    departamento: '',
                    nombre: '',
                    primer_apellido: '',
                    segundo_apellido: '',
                    nacionalidad: '',
                    cedula: '',
                    extension: '',
                    domicilio: '',
                    ciudad: '',
                    telefono: '',
                    celular: '',
                    lugar_nacimiento: '',
                    fecha_nacimiento: '',
                    sexo: ''
                },
                nextStep() {
                    if (this.currentStep < this.steps.length) {
                        this.currentStep++;
                    }
                },
                prevStep() {
                    if (this.currentStep > 1) {
                        this.currentStep--;
                    }
                }
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif
        });
    </script>

</x-guest-layout> --}}
