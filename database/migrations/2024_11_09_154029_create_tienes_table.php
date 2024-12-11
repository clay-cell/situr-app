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
        Schema::create('tienes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_asignacion');
            $table->date('fecha_declinacion')->nullable();
            $table->boolean('estado');
            $table->foreignId('institucion_id')->constrained('institucions')->onDelete('cascade');
            // Clave foránea para servicio
            $table->foreignId('representante_id')->constrained('representantes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tienes');
    }
};
