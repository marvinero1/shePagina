<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->string('titulo');
            $table->string('descripcion');
            $table->string('sec_1');
            $table->string('sec_2')->nullable();
            $table->string('sec_3')->nullable();
            $table->string('descripcion_sec_1');
            $table->string('descripcion_sec_2')->nullable();
            $table->string('descripcion_sec_3')->nullable();
            $table->string('imagen_portada')->nullable();
            $table->string('imagen_seccion')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticias');
    }
}
