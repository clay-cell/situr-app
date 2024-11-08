<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solicitud_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('primer_apellido')->nullable();
            $table->string('segundo_apellido')->nullable();
            $table->string('nacionalidad');
            $table->string('cedula')->unique();
            $table->string('extension');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('email')->unique();
            $table->string('telefono')->unique();
            $table->string('celular')->unique();
            $table->string('lugar_nacimiento');
            $table->date('fecha_nacimiento');
            $table->boolean('estado')->default(false);
            $table->string('sexo',2);
            $table->string('foto', 2048)->nullable();
            $table->string('carta_solicitud');
            $table->date('fecha_solicitud');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_usuarios');
    }
};
