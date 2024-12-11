<x-guest-layout>
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
                            <h2 class="text-2xl font-bold text-gray-700 mb-4">Crea tu cuenta SITUR</h2>
                            <p class="text-sm text-gray-500 mb-6">Por favor, complete la información de cuenta.</p>

                            <!-- Departamento -->
                            <div class="space-y-6">
                                <div>
                                    <label for="departamento" class="block text-gray-600">Departamento de
                                        registro</label>
                                    <select name="departamento" id="departamento" x-model="formData.departamento"
                                        class="w-full mt-1 px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                        <option value="" disabled {{ old('departamento') ? '' : 'selected' }}>
                                            Seleccione un departamento</option>
                                        <option value="CBBA." {{ old('departamento') === 'CBBA.' ? 'selected' : '' }}>
                                            COCHABAMBA</option>
                                    </select>
                                    @error('departamento')
                                        <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Nombre -->
                                <div>
                                    <label for="nombre" class="block text-gray-600">Nombre(s):</label>
                                    <input type="text" id="nombre" name="nombre" placeholder="Ej. Yhovana Jhos"
                                        value="{{ old('nombre') }}" x-model="formData.nombre"
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
                                            class="w-full mt-1 px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                            value="{{ old('primer_apellido') }}">
                                        @error('primer_apellido')
                                            <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="segundo_apellido" class="block text-gray-600">Segundo
                                            apellido:</label>
                                        <input type="text" id="segundo_apellido" name="segundo_apellido"
                                            placeholder="Ej. Gutierrez" x-model="formData.segundo_apellido"
                                            class="w-full mt-1 px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                            value="{{ old('segundo_apellido') }}">
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
                                        class="w-full mt-1 px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                        value="{{ old('nacionalidad') }}">
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
                                            class="w-full mt-1 px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                            value="{{ old('cedula') }}">
                                        @error('cedula')
                                            <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="extension" class="block text-gray-600">Extensión:</label>
                                        <select name="extension" id="extension" x-model="formData.extension"
                                            class="w-full mt-1 px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                            <option value="" selected disabled>Seleccione</option>
                                            <option value="CBBA."
                                                {{ old('extension') === 'CBBA.' ? 'selected' : '' }}>COCHABAMBA
                                            </option>
                                            <option value="LP." {{ old('extension') === 'LP.' ? 'selected' : '' }}>
                                                LA PAZ</option>
                                            <option value="OR." {{ old('extension') === 'OR.' ? 'selected' : '' }}>
                                                ORURO</option>
                                            <option value="SCZ."
                                                {{ old('extension') === 'SCZ.' ? 'selected' : '' }}>SANTA CRUZ</option>
                                            <option value="TJ." {{ old('extension') === 'TJ.' ? 'selected' : '' }}>
                                                TARIJA</option>
                                            <option value="CH." {{ old('extension') === 'CH.' ? 'selected' : '' }}>
                                                CHUQUISACA</option>
                                            <option value="BN." {{ old('extension') === 'BN.' ? 'selected' : '' }}>
                                                BENI</option>
                                            <option value="PN." {{ old('extension') === 'PN.' ? 'selected' : '' }}>
                                                PANDO</option>
                                            <option value="PT." {{ old('extension') === 'PT.' ? 'selected' : '' }}>
                                                POTOSI</option>
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
                                        class="w-full mt-1 px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                        value="{{ old('email') }}">
                                    @error('extension')
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
                                        class="w-full px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                        value="{{ old('direccion') }}">
                                    @error('direccion')
                                        <span
                                            class="text-xs
                                    text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-span-6 ">
                                    <label for="ciudad"
                                        class="block text-gray-700 font-semibold mb-2">Ciudad:</label>
                                    <input type="text" id="ciudad" name="ciudad" placeholder="Ej. La Paz"
                                        class="w-full px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"x-model="formData.ciudad"
                                        value="{{ old('ciudad') }}">
                                    @error('ciudad')
                                        <span
                                            class="text-xs
                                        text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Teléfono y Celular -->
                                <div class="col-span-4 ">
                                    <label for="telefono" class="block text-gray-700 font-semibold mb-2"
                                        x-model="formData.telefono">Teléfono fijo:</label>
                                    <input type="text" id="telefono" name="telefono"
                                        placeholder="Ej. (591) (2) 2731566"
                                        class="w-full px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                        x-model="formData.telefono" value="{{ old('cedula') }}">
                                    @error('telefono')
                                        <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-span-4 ">
                                    <label for="celular" class="block text-gray-700 font-semibold mb-2">Número de
                                        celular:</label>
                                    <input type="text" id="celular" name="celular" placeholder="Ej. 75812456"
                                        class="w-full px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                        x-model="formData.celular" value="{{ old('cedula') }}">
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
                                        <option value="CBBA."
                                            {{ old('lugar_nacimiento') === 'CBBA.' ? 'selected' : '' }}>
                                            COCHABAMBA
                                        </option>
                                        <option value="LP."
                                            {{ old('lugar_nacimiento') === 'LP.' ? 'selected' : '' }}>
                                            LA PAZ</option>
                                        <option value="OR."
                                            {{ old('lugar_nacimiento') === 'OR.' ? 'selected' : '' }}>
                                            ORURO</option>
                                        <option value="SCZ."
                                            {{ old('lugar_nacimiento') === 'SCZ.' ? 'selected' : '' }}>
                                            SANTA CRUZ</option>
                                        <option value="TJ."
                                            {{ old('lugar_nacimiento') === 'TJ.' ? 'selected' : '' }}>
                                            TARIJA</option>
                                        <option value="CH."
                                            {{ old('lugar_nacimiento') === 'CH.' ? 'selected' : '' }}>
                                            CHUQUISACA</option>
                                        <option value="BN."
                                            {{ old('lugar_nacimiento') === 'BN.' ? 'selected' : '' }}>
                                            BENI</option>
                                        <option value="PN."
                                            {{ old('lugar_nacimiento') === 'PN.' ? 'selected' : '' }}>
                                            PANDO</option>
                                        <option value="PT."
                                            {{ old('lugar_nacimiento') === 'PT.' ? 'selected' : '' }}>
                                            POTOSI</option>
                                    </select>
                                    @error('lugar_nacimiento')
                                        <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-span-4">
                                    <label for="fecha_nacimiento" class="block text-gray-700 font-semibold mb-2"
                                        x-model="formData.fecha_nacimiento">Fecha de nacimiento:</label>
                                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                                        class="w-full px-4 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                        x-model="formData.fecha_nacimiento">
                                    @error('fecha_nacimiento')
                                        <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Sexo -->
                                <div class="col-span-4">
                                    <label class="block text-gray-700 font-semibold mb-2">Sexo:</label>

                                    <div class="flex items-center mb-2">
                                        <input type="radio" name="sexo" id="masculino" value="V"
                                            class="mr-2 border-gray-300 focus:ring-2 focus:ring-blue-400"
                                            {{ old('sexo') === 'V' ? 'checked' : '' }}>
                                        <label for="masculino" class="text-gray-700">Masculino</label>
                                    </div>

                                    <div class="flex items-center mb-2">
                                        <input type="radio" name="sexo" id="femenino" value="M"
                                            class="mr-2 border-gray-300 focus:ring-2 focus:ring-blue-400"
                                            {{ old('sexo') === 'M' ? 'checked' : '' }}>
                                        <label for="femenino" class="text-gray-700">Femenino</label>
                                    </div>

                                    @error('sexo')
                                        <span class="text-xs text-red-800 font-light">*{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-span-4">
                                    <input type="file" id="foto" name="foto" class="hidden"
                                        accept="image/*" onchange="previewImage(event)">
                                    <div
                                        class="relative w-24 h-24 bg-gray-200 border border-gray-300 rounded-full overflow-hidden">
                                        <img id="imagePreview" src="{{ asset('imgs/subirfoto.jpg') }}"
                                            alt="Foto de perfil" class="w-full h-full object-cover">
                                        <label for="foto"
                                            class="absolute inset-0 flex items-center justify-center cursor-pointer text-white text-lg"
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
    <script>
        // SweetAlert2 popup with custom animation and styling
        Swal.fire({
            title: "AVISO II",
            text: "“En condición de propietario o representante legal, de acuerdo al Art. 1322 del Código Civil, declaro expresamente que los datos proporcionados mediante el presente formulario son verídicos y fidedignos; para lo que manifiesto pleno consentimiento, entera conformidad y absoluta aceptación para que el Viceministerio de Turismo y las Gobernaciones Departamentales en uso de sus específicas funciones y atribuciones establecidas por ley para el control y fiscalización de los servicios turísticos declarados; así mismo, para que procedan a la verificación de la información documentada; las inspecciones y re-inspecciones en mi establecimiento y/o domicilio legal para la correspondiente certificación como un Prestador de Servicios Turísticos. Por consiguiente, autorizo y aseguro las máximas seguridades de ingreso, tránsito y permanencia al personal técnico designado a practicar las acciones anteriormente señaladas.”",
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
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result; // Actualiza la fuente de la imagen
                }
                reader.readAsDataURL(file); // Lee la imagen como una URL de datos
            }
        }
    </script>
</x-guest-layout>
