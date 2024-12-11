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
        Schema::create('requisitos', function (Blueprint $table) {
            $table->id();
            $table->string('intitucion',100);
            $table->string('descripcion',200);
            $table->boolean('estado')->default(true);
            // Clave foránea para tipo_tramite
            $table->foreignId('tipo_tramite_id')->constrained('tipo_tramites')->onDelete('cascade');
            // Clave foránea para servicio
            $table->foreignId('servicio_id')->constrained('servicios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisitos');
    }
};
