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
        Schema::create('escala_sanciones', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_sancion');
            $table->string('ajuste_sancion');
            $table->foreignId('servicio_id')->constrained('servicios')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escala_sanciones');
    }
};
