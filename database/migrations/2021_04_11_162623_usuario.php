<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->integer('id')->unique()->autoIncrement();
            $table->string('nombres');
            $table->string('apellidos');
            $table->dateTime('fecha_nacimiento');
            $table->string('imagen')->nullable();
            $table->integer('id_usuario_tipo');
            $table->integer('id_ciudad');
            $table->integer('id_usuario_estado');
            $table->foreign('id_usuario_tipo')->references('id')->on('usuario_tipos');
            $table->foreign('id_ciudad')->references('id')->on('ciudades');
            $table->foreign('id_usuario_estado')->references('id')->on('usuario_estados');
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
        Schema::drop('usuarios');
    }
}
