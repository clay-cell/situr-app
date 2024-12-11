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
        Schema::create('documento_tramites', function (Blueprint $table) {
            $table->id();
            $table->string('documento');
            $table->date('fecha_asignacion');
            $table->boolean('vigencia')->default(true);
            $table->string('ruta');
            $table->foreignId('tramite_id')->constrained('tramites');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documento_tramites');
    }
};
