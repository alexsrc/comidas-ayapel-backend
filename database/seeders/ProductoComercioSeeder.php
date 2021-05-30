<?php

namespace Database\Seeders;

use App\Models\Comercio;
use App\Models\Producto;
use App\Models\ProductoComercio;
use Illuminate\Database\Seeder;

class ProductoComercioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comercios      =   Comercio::all();
        $productos      =   Producto::all();

        foreach ($comercios as $comercio){
            for($i=0;$i<count($productos);$i++){
                $productoComercioModel              =   new ProductoComercio();
                $productoComercioModel->descripcion =   $productos[$i]->descripcion;
                $productoComercioModel->id_comercio =   $comercio->id;
                $productoComercioModel->id_producto =   $productos[$i]->id;
                $productoComercioModel->valor       =   rand(1000,45000);
                $productoComercioModel->save();
            }
        }

    }
}
