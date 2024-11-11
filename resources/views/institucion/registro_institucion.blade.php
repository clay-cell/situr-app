@extends('layouts.main-layout')

@section('content')
    <!-- Título -->
    <div class="text-4xl text-gray-700 text-center my-6">
        <h2 style="font-family: 'Oswald', sans-serif; font-weight: 700;">Nuevo Establecimiento</h2>
    </div>

    <h2 class="text-xl font-semibold mb-4 mx-5">Datos Generales</h2>
    <form action="{{ route('establecimiento.store') }}" method="POST" class="bg-white shadow-lg rounded-lg p-6 space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Campos del Formulario -->
            <div>
                <label for="nombre_comercial" class="block text-sm font-medium text-gray-700">Nombre del
                    Establecimiento</label>
                <input type="text" id="nombre_comercial" name="nombre_comercial" placeholder="Nombre del Establecimiento"
                    required value="{{ old('nombre_comercial') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 uppercase">
                @error('nombre_comercial')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" id="email" name="email" placeholder="Correo Electrónico" required
                    value="{{ old('email') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" required
                    value="{{ old('telefono') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 uppercase">
                @error('telefono')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                <input type="text" id="direccion" name="direccion" placeholder="Dirección" required
                    value="{{ old('direccion') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 uppercase">
                @error('direccion')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tipo de Servicio -->
            <div>
                <label for="servicio" class="block text-sm font-medium text-gray-700">Servicio</label>
                <select id="servicio" name="servicio_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    <option value="" disabled selected>Seleccione un Servicio</option>
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id }}" {{ old('servicio_id') == $servicio->id ? 'selected' : '' }}>
                            {{ $servicio->tipo_servicio }}</option>
                    @endforeach
                </select>
                @error('servicio_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tipo de Servicio -->
            <div>
                <label for="tipo_servicio" class="block text-sm font-medium text-gray-700">Tipo de Servicio</label>
                <select id="tipo_servicio" name="tipo_servicio_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    <option value="" disabled selected>Seleccione un Tipo de Servicio</option>
                    @foreach ($tiposServicios as $tipoServicio)
                        <option value="{{ $tipoServicio->id }}"
                            {{ old('tipo_servicio_id') == $tipoServicio->id ? 'selected' : '' }}>
                            {{ $tipoServicio->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('tipo_servicio_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <!-- Categoría -->
            <div>
                <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select id="categoria" name="categoria_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    <option value="" disabled selected>Seleccione una Categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <!-- Botón de Envío -->
        <div class="flex justify-center mt-6">
            <button type="submit"
                class="px-6 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-offset-2 focus:ring-indigo-500">
                Guardar Establecimiento
            </button>
        </div>
    </form>
@endsection
