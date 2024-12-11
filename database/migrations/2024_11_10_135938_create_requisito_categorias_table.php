<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitoCategoriasTable extends Migration
{
    public function up()
    {
        Schema::create('requisito_categorias', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',4);
            $table->string('nombre');
            $table->integer('categoria_id'); // Ejemplo: 1 Estrella, etc.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('requisito_categorias');
    }
}

