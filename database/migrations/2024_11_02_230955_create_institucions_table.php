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
        Schema::create('institucions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',200)->unique();
            $table->string('telefono');
            $table->string('direccion');
            $table->string('email')->unique();
            $table->boolean('estado')->default(true);
            $table->date('fecha_actividad');
            $table->integer('servicio_id');
             // Clave foránea para usuarios
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institucions');
    }
};
