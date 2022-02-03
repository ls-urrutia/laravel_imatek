<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantencionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenciones', function (Blueprint $table) {
            $table->id('id_mantencion');
            
            
            $table->date('fecha_mantencion');
            $table->string('descripcion');
            $table->string('validacion');
            $table->string('imagen1');
            $table->string('imagen2');
            $table->string('imagen3');
            $table->bigInteger('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->bigInteger('id_equipo')->unsigned();
            $table->foreign('id_equipo')->references('id_equipo')->on('equipos');
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
        Schema::dropIfExists('mantenciones');
    }
}
