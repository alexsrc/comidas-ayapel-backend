<?php

namespace Database\Seeders;

use App\Models\DomicilioEstado;
use App\Models\ProductoEstado;
use Illuminate\Database\Seeder;

class ProductoEstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productoEstado             =   new ProductoEstado();
        $productoEstado->nombre     =   "Activo";
        $productoEstado->estado     =   1;
        $productoEstado->save();

        $productoEstado             =   new ProductoEstado();
        $productoEstado->nombre     =   "Inactivo";
        $productoEstado->estado     =   1;
        $productoEstado->save();

        $productoEstado             =   new ProductoEstado();
        $productoEstado->nombre     =   "Eliminado";
        $productoEstado->estado     =   1;
        $productoEstado->save();
    }
}
