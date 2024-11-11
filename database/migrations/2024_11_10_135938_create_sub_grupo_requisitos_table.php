<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubGrupoRequisitosTable extends Migration
{
    public function up()
    {
        Schema::create('sub_grupo_requisitos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('requisito_categoria_id')->constrained('requisito_categorias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sub_grupo_requisitos');
    }
}
