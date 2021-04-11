<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comercio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comercios', function (Blueprint $table) {
            $table->integer('id')->unique()->autoIncrement();
            $table->string('nombre');
            $table->string('razon_social');
            $table->string('direccion');
            $table->string('imagen');
            $table->integer('id_ciudad');
            $table->integer('id_comercio_estado');
            $table->integer('id_comercio_tipo');
            $table->integer('id_propietario');
            $table->integer('id_telefono');
            $table->foreign('id_ciudad')->references('id')->on('ciudades');
            $table->foreign('id_comercio_estado')->references('id')->on('comercio_estados');
            $table->foreign('id_comercio_tipo')->references('id')->on('comercio_tipos');
            $table->foreign('id_propietario')->references('id')->on('usuarios');
            $table->foreign('id_telefono')->references('id')->on('telefonos');
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
        Schema::drop('comercios');
    }
}
