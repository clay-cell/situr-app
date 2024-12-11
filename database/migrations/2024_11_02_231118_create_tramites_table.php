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
        Schema::create('tramites', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->date('fecha_inicio');
            $table->date('fecha_culminacion')->nullable();
            $table->boolean('estado')->default(false);
            // Clave foránea para usuarios
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');;
            // Clave foránea para institucion
            $table->foreignId('institucion_id')->constrained('institucions')->onDelete('cascade');
            // Clave foránea para servicio
            $table->foreignId('servicio_id')->constrained('servicios')->onDelete('cascade');
            // Clave foránea para requisitos
            $table->foreignId('requisito_id')->constrained('requisitos')->onDelete('cascade');
            // Clave foránea para tipo_tramite
            //$table->foreignId('tipotramite_id')->constrained('tipo_tramites')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramites');
    }
};
