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


            $table->date('fecha_mantencion')->nullable();
            $table->date('fecha_diagnostico')->nullable();
            $table->date('fecha_dado_baja')->nullable();
            $table->string('descripcion_diagnostico')->nullable();;
            $table->string('descripcion_mantencion')->nullable();
            $table->string('descripcion_dado_baja')->nullable();

            $table->string('validacion')->default('Pendiente');

            $table->string('componentes_mantencion')->nullable();
            $table->string('diagnostico_corriente')->nullable();


            $table->string('estado_mantencion')->nullable();
            
            $table->string('imagen1')->nullable();
            $table->string('imagen2')->nullable();
            $table->string('imagen3')->nullable();
            $table->bigInteger('id_usuario0')->nullable()->unsigned();
            $table->foreign('id_usuario0')->references('id')->on('users');

            $table->bigInteger('id_usuario')->nullable()->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users');

            $table->bigInteger('id_usuario2')->nullable()->unsigned();
            $table->foreign('id_usuario2')->references('id')->on('users');

           
            
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
