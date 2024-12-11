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
        Schema::create('institucion_clientes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_ingreso');
            $table->date('fecha_salida')->nullable();
            $table->time('hora_entrada');
            $table->time('hora_salida')->nullable();
            $table->year('gestion');
            $table->string('mes');
            $table->integer('estadia');
            $table->foreignId('institucion_id')->constrained('institucions')->onDelete('cascade');
            // Clave foránea para servicio
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institucion_clientes');
    }
};
