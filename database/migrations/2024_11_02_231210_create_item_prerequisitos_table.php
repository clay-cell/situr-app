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
        Schema::create('item_prerequisitos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion',500);
            $table->boolean('estado')->default(true);
            // Clave foránea para requisitos
            $table->foreignId('pre_requisito_id')->constrained('pre_requisitos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_prerequisitos');
    }
};
