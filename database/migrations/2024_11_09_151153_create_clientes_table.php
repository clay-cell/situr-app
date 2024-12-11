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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 255);
            $table->string('paterno', 255)->nullable();
            $table->string('materno', 255)->nullable();
            $table->string('identificacion', 255)->unique();
            $table->string('expedido', 255)->nullable();
            $table->boolean('nacionalidad');
            $table->string('pdf', 255);
            $table->integer('pais_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
