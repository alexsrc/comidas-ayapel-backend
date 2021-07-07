<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Domicilio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilios', function (Blueprint $table) {
            $table->integer('id')->unique()->autoIncrement();
            $table->string('direccion');
            $table->string('descripcion');
            $table->string('latitud');
            $table->string('longitud');
            $table->string('celular');
            $table->string('nombres');
            $table->dateTime('fecha_creacion');
            $table->integer('id_domicilio_estado');
            $table->integer('id_ciudad');
            $table->foreign('id_domicilio_estado')->references('id')->on('domicilio_estados');
            $table->foreign('id_ciudad')->references('id')->on('ciudades');
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
        Schema::drop('domicilios');
    }
}
