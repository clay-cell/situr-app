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
        Schema::create('presentados', function (Blueprint $table) {
            $table->id();
            $table->year('gestion');
            $table->date('fecha_presentacion');
            $table->string('observacion',300);
            $table->string('documento',150)->nullable();
            $table->string('ruta');
            $table->boolean('aceptado')->default(false);
            //llave foranea para tramites
            $table->foreignId('tramite_id')->constrained('tramites');
            //llave foranea para pre_requisitos
            $table->foreignId('pre_requisito_id')->constrained('pre_requisitos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presentados');
    }
};