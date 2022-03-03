<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centros', function (Blueprint $table) {
            $table->id('id_centro');
            $table->string('nombre_centro');
            $table->string('telefono_empresa');
            $table->string('descripcion')->nullable();;
            $table->bigInteger('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete("cascade");
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
        Schema::dropIfExists('centros');
    }
}
