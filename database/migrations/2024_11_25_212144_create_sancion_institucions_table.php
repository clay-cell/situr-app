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
        Schema::create('sancion_institucions', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_asignacion');
            $table->foreignId('item_sancion_id')->constrained('item_sancions')->onDelete('cascade');
            $table->foreignId('institucion_id')->constrained('institucions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sancion_institucions');
    }
};
