<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DomicilioDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilio_detalles', function (Blueprint $table) {
            $table->integer('id')->unique()->autoIncrement();
            $table->integer('id_producto');
            $table->integer('id_domicilio');
            $table->integer('cantidad');
            $table->float('valor');
            $table->float('valor_total');
            $table->integer('id_domicilio_detalle_estado');
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('id_domicilio')->references('id')->on('domicilios');
            $table->foreign('id_domicilio_detalle_estado')->references('id')->on('domicilio_detalle_estados');
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
        Schema::drop('domicilio_detalles');
    }
}
