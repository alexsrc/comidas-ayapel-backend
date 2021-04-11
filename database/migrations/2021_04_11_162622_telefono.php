<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Telefono extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefonos', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->integer('id_departamento');
            $table->integer('id_telefono_tipo');
            $table->foreign('id_departamento')->references('id')->on('departamentos');
            $table->foreign('id_telefono_tipo')->references('id')->on('telefono_tipos');
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
        Schema::drop('telefonos');
    }
}
