<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasasTable extends Migration
{
    public function up()
    {
        Schema::create('tasas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('descripcion');
            $table->decimal('monto_inicial', 10, 2); // Ejemplo: 100.00
            $table->decimal('monto_fijo', 10, 2); // Ejemplo: 50.00
            $table->foreignId('servicio_id')->constrained('servicios')->onDelete('cascade');
            $table->foreignId('tipo_servicio_id')->constrained('tipo_servicios')->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasas');
    }
}

