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
        Schema::create('pre_requisitos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion',500);
            $table->boolean('estado')->default(true);
            // Clave foránea para requisitos
            $table->foreignId('requisito_id')->constrained('requisitos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_requisitos');
    }
};
