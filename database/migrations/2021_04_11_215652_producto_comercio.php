<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductoComercio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_comercios', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->integer('id_comercio');
            $table->integer('id_producto');
            $table->float('valor')->default(0);
            $table->foreign('id_comercio')->references('id')->on('comercios');
            $table->foreign('id_producto')->references('id')->on('productos');
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
        Schema::drop('producto_comercios');
    }
}
