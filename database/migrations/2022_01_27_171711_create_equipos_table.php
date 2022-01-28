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
            $table->string('cod_equipo');
            $table->integer('n_factura');
            $table->string('tipo_equipo');
            $table->string('modelo');
            $table->string('ubicacion');
            $table->string('descripcion');
            $table->string('estado');
            $table->date('fecha_compra');
            $table->string('proveedor');
            $table->bigInteger('id_centro')->unsigned();
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
