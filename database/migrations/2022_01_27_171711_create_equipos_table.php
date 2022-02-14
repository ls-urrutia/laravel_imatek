<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {

            $table->id('id_equipo');
            $table->string('cod_equipo')->unique();
            $table->string('tipo_documento');
            $table->integer('n_documento');
            $table->string('tipo_equipo');
            $table->string('modelo');
            $table->string('descripcion');
            $table->string('estado')->default('Operativa');
            $table->date('fecha_ingreso');
            $table->string('proveedor');
            $table->bigInteger('id_centro')->unsigned()->default('1');
            $table->foreign('id_centro')->references('id_centro')->on('centros');
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
        Schema::dropIfExists('equipos');
    }
}
