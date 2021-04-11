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
            $table->id();
            $table->string('direccion');
            $table->string('descripcion');
            $table->string('celular');
            $table->string('nombres');
            $table->dateTime('fecha_creacion')->default(new DateTime("now"));
            $table->integer('id_domicilio_estado');
            $table->foreign('id_domicilio_estado')->references('id')->on('domicilio_estados');
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
