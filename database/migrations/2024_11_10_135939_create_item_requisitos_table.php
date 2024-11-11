<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemRequisitosTable extends Migration
{
    public function up()
    {
        Schema::create('item_requisitos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion'); // Ejemplo: Espacio adecuado para área de planchado
            $table->float('valor_minimo'); // Ejemplo: 10
            $table->string('tipo_medida'); // Ejemplo: "número", "porcentaje", etc.
            $table->foreignId('sub_grupo_requisito_id')->constrained('sub_grupo_requisitos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_requisitos');
    }
}
